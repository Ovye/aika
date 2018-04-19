<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Models\Auths\UserVerifications;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mockery\Exception;

class RegisterController extends Controller
{
    protected $request, $user, $verifications, $role, $permission;

    public function __construct(User $user, UserVerifications $verifications)
    {
        $this->user = $user;
        $this->verifications = $verifications;
    }

    public function showForm()
    {
        $this->assign['title'] = 'Register';
        $this->assign['only_body'] = true;
        $this->assign['body'] = 'auths.register';

        return view('frontend.wrapper', $this->assign);
    }

    public function doRegistration(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = $this->user::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'password' => bcrypt($request->password),
                'fullname' => "{$request->fname} {$request->lname}",
                'phone' => $request->phone,
                'social_credentials' => $this->fillSocialCredentialsWithEmptyData()
            ]);

            $token = Str::uuid();
            $code = random_numbers(6);

            // Let's send user verification code to phone number
            $sendSms = aikasms('Aika')->to($user->phone)
                ->send("Your Aika verification code is {$code}.");

            // Rollback registration if verification code is not sent to user
            if (false == $sendSms->response) {
                $this->alert('e', "Registration failed. You don't have active internet connection!");
                DB::rollback();

                return back()->withInput();
            }

            // Assign roles and give permissions to user
            $user->assignRole($this->roles());
            $user->givePermissionTo($this->permissions());

            // Create user verifications data
            $this->verifications::createOrUpdate([
                'user_id' => $user->id,
                'phone' => 0,
                'email' => 0,
                'code' => $code,
                'token' => $token,
                'expired_at' => time() + 604800 //Keep verification code valid for a week
            ]);

            $this->alert('w', "Your registration is almost complete. Fill this form to finalize. NB: Your verification code will be invalid if you failed to complete this process after a week.");
            DB::commit();

            return redirect()->action('Auths\RegisterController@completeReg', $user->id . '_' . $token);
        }
        catch (Exception $exception) {
            $this->alert('error', "Failed to create your account. Reasons: {$exception->getMessage()}");
            DB::rollback();

            return back()->withInput();
        }

    }

    public function completeReg($token)
    {
        $explodedParam = explode('_', $token);
        $user = $this->user::findOrFail($explodedParam[0]);
        if (!$user) {
            $this->alert('e', "Access denied.");

            return redirect('register')->withInput();
        }

        $userVerifications = $this->verifications::getByUserId($user->id);
        if ($userVerifications->phone == 1) {
            $this->alert('i', "Your account has already been verified. Please login to continue.");

            return redirect('login');
        }

        $this->assign['user'] = $user;
        $this->assign['userVerifications'] = $userVerifications;
        $this->assign['only_body'] = true;
        $this->assign['body'] = 'auths.complete-reg';
        $this->assign['title'] = "Complete Registration";

        return view('frontend.wrapper', $this->assign);
    }

    public function test()
    {
        return dd(aikasms()->send([
            'to' => '08131600400',
            'sender' => 'Aika',
            'message' => 'This is just a test again.'
        ])->response);
    }

    public function permissions()
    {
        return [
            'add parcels', 'edit parcels', 'delete parcels', 'send parcels', 'pick parcels'
        ];
    }

    public function roles()
    {
        return [
            'traveller', 'sender'
        ];
    }

    public function fillSocialCredentialsWithEmptyData()
    {
        return json_encode(
            [
                [
                    'name' => 'facebook',
                    'id' => '',
                    'token' => '',
                    'photo' => '',
                    'email' => '',
                    'username' => '',
                ],
                [
                    'name' => 'twitter',
                    'id' => '',
                    'token' => '',
                    'photo' => '',
                    'email' => '',
                    'username' => '',
                ],
                [
                    'name' => 'google',
                    'id' => '',
                    'token' => '',
                    'photo' => '',
                    'email' => '',
                    'username' => '',
                ]
            ]
        );
    }

}
