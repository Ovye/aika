<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Models\Auths\SocialiteUser;
use App\Models\Auths\UserVerifications;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    protected $request;
    protected $provider;

    public function __construct()
    {
        return $this->request = new Request();
    }

    /**
     * @param Request $request
     * @param $provider string
     * @return $this
     */
    public function redirectToProvider(Request $request, $provider)
    {
        if (false == $this->isValidCompleteRegData($request)) {
            return back()->withInput();
        }

        if (isset($request->complete_reg)) {
            $requestData = json_encode([
                'user_id' => $request->user_id,
                'code' => $request->code,
                'token' => $request->token,
                'email' => $request->email,
                'use_fb_email' => $request->use_fb_email,
                'redirect' => $request->redirect,
            ]);

            Session::put('socialite.requestdata', URL::previous() . "||{$requestData}");
        }

        $socialite = Socialite::driver($provider);

        if ($provider == 'facebook') {
            return $socialite->with([
                'scope' => $this->facebookPermissions()
            ])->redirect();
        }

        return $socialite->redirect();
    }

    /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($provider)
    {
        $this->provider = $provider;
        if ($this->socialiteHasErrors($provider)) {
            if (session()->exists('socialite.requestdata')) {
                return redirect($this->getSocialiteRequestData('url'));
            }

            return redirect('login');
        }

        $socialiteUser = Socialite::driver($provider)->user();
        if ($provider != 'twitter') {
            $twitterUser = Socialite::driver($provider)->userFromToken($socialiteUser->token);
            $socialiteUser = $twitterUser;
        }

        DB::beginTransaction();

        try {
            DB::commit();

            auths()->logout(); //Logout previous session first.

            if ($this->getSocialiteRequestData('url')) {
                $user = User::findOrFail($this->getSocialiteRequestData('user_id'));
                $this->updateSocialCredentials($user, $socialiteUser, $provider);
                $userVerification = UserVerifications::getByUserId($user->id);
                $userVerification->phone = 1;
                $userVerification->save();
                Session::forget('socialite.requestdata');

                return $this->authenticateRegSocialiteVerification($user);
            }

            return $this->authenticateSocialiteUser($socialiteUser);
        }
        catch (\Exception $exception) {
            $this->alert('e', "An error occured: " . $exception);

            DB::rollback();

            if ($this->getSocialiteRequestData('url')) {
                return redirect($this->getSocialiteRequestData('url'));
            }

            return redirect('login');

        }
    }

    /**
     * @param $user User
     * @param $socialiteUser Socialite
     * @param $provider string Could be facebook, twitter or any available social network
     * @return mixed
     */
    public function updateSocialCredentials($user, $socialiteUser, $provider)
    {
        $socialCredentials = json_decode($user->social_credentials);

        if ($this->getSocialiteRequestData('use_fb_email') == 'on') {
            $user->email = $socialiteUser->getEmail();
            $user->use_fb_email = 'yes';
        }

        if ($this->getSocialiteRequestData('email') != ''
            && $this->getSocialiteRequestData('use_fb_email') != 'on' ) {
            $user->email = $this->getSocialiteRequestData('email');
            $user->use_fb_email = 'no';
        }


        foreach ($socialCredentials as $credential) {
            if ($credential->name == $provider) {
                $credential->id = $socialiteUser->getId();
                $credential->token = $socialiteUser->token;
                $credential->photo = $socialiteUser->getAvatar();
                $credential->username = $socialiteUser->getNickname();
                $credential->email = $socialiteUser->getEmail();
            }
        }

        $user->fb_email = $socialiteUser->getEmail();
        $user->social_credentials = json_encode($socialCredentials);
        $user->save();

        return $user;
    }

    /**
     * @param null $option
     * @return bool
     */
    public function getSocialiteRequestData($option = null)
    {
        if (session()->exists('socialite.requestdata')) {
            $rawRequestData = Session::get('socialite.requestdata');
            $explodedData = explode('||', $rawRequestData);

            if ($option == 'url') {
                return $explodedData[0];
            }

            foreach (json_decode($explodedData[1]) as $key => $value) {
                if ($key == $option) {
                    return $value;
                }
            }

            return $rawRequestData;
        }

        return false;
    }

    /**
     * @param $provider
     * @return bool
     */
    public function socialiteHasErrors($provider)
    {
        if ($provider == 'twitter' && get('denied') != ''
            || $provider == 'facebook' && get('error') != ''
            || $provider == 'facebook' && get('error_code') != '') {

            if (get('error_code')
                && get('error_reason') != 'user_denied') {
                alert('error', 'Sorry for the error. 
                Please try other options or click the facebook button later. Let us know if it persist.');
            }
            elseif (get('denied')
                || get('error')
                && get('error_reason') == 'user_denied') {
                alert('error', "We noticed you've just cancelled 
                your authentication with {$provider}. Don't worry. You can always come back to it.");
            }

            return true;
        }

        return false;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function isValidCompleteRegData(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        if ($user) {
            $userVerification = UserVerifications::getByUserId($user->id);
            if ($userVerification->code != $request->code) {
                $this->alert('e', "Invalid code entered. Try again!");

                return false;
            }

            if (time() > $userVerification->expired_at) {
                $formData['user_id'] = $request->user_id;
                $formData['token'] = $request->token;
                $this->alert('e', "This verification code has expired. "
                    . (new VerifyAccountController())->getNewCodeForm($formData)
                );

                return false;
            }
        }

        return true;
    }

    /**
     * @return string
     */
    public function facebookPermissions()
    {
        return 'user_friends,email,user_posts,user_about_me,publish_actions';
    }

    /**
     * @return string
     */
    public function facebookFields()
    {
        return 'id,name,first_name,last_name,email,gender,birthday,hometown,posts,about,location,picture.width(100)';
    }

    /**
     * This authentication is for users who creates account with us and finalized their social verifications
     * Here, data are retreived from a session and destroyed if successfully loggedin
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function authenticateRegSocialiteVerification($user)
    {
        Auth::guard('web')->login($user, true);
        Session::put('login.type', 'phone');

        if ($this->getSocialiteRequestData()
            && $this->getSocialiteRequestData('redirect') != '') {
            return redirect($this->getSocialiteRequestData('redirect'));
        }

        return redirect('dashboard');
    }

    /**
     * Collet user data coming from any social network available and login the user.
     * Roles and permissions are also assigned to this user.
     * @param $socialiteUser
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function authenticateSocialiteUser($socialiteUser)
    {
        $name = explode(' ', $socialiteUser->getName());

        $user = SocialiteUser::findOrCreate($socialiteUser->getId(), [
            'provider' => $this->provider,
            'provider_id' => $socialiteUser->getId(),
            'fullname' => $socialiteUser->getName(),
            'fname' => $name[0],
            'mname' => count($name) > 2 ? $name[1] : '',
            'lname' => count($name) > 1 ? count($name) > 2 ? $name[2] : $name[1] : $name[1],
            'photo' => $socialiteUser->getAvatar(),
            'email' => $socialiteUser->getEmail(),
            'username' => $socialiteUser->getNickname(),
            'status' => 'active',
            'token' => $socialiteUser->token,
            'password' => bcrypt($this->provider.$socialiteUser->getId())
        ]);

        if ($user) {
            $credentials = ['provider_id' => $socialiteUser->getId(), 'password' => $this->provider.$socialiteUser->getId()];
            if (Auth::guard('socialite')->attempt($credentials)) {
                $redirectUrl = Session::get('redirect.url');

                if (!$user->hasAllRoles($this->roles())) {
                    $user->assignRole($this->roles());
                }

                $user->revokePermissionTo($this->permissions()); // Revoke permissions.
                $user->givePermissionTo($this->permissions()); // Give back permissions

                return redirect($redirectUrl != '' ? $redirectUrl : 'dashboard');
            }
        }

        $this->alert('e', "Failed to log you in now. Please, try again later!");

        return redirect('login');
    }

    /**
     * The permissions to give incoming user
     * @return array
     */
    public function permissions()
    {
        return [
            'add parcels', 'edit parcels', 'delete parcels', 'send parcels', 'pick parcels'
        ];
    }

    /**
     * The roles to assign to the incoming user
     * @return array
     */
    public function roles()
    {
        return [
            'traveller', 'sender'
        ];
    }
}
