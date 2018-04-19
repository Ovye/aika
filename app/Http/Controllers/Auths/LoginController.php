<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Models\Auths\UserVerifications;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $credentials = [], $user, $request,
        $verified = false, $verifications, $loginType;

    public function showForm()
    {
        auths()->logout();
        $this->assign['title'] = "Login";
        $this->assign['only_body'] = true;
        $this->assign['body'] = 'auths.login';

        return view('frontend.wrapper', $this->assign);
    }

    public function validateLogin(Request $request)
    {
        $this->request = $request;

        return $this->validateLoginWithEmail()
            ->validateLoginWithPhone()
            ->allowOrRefuseLogin($this->request);
    }

    public function validateLoginWithEmail()
    {
        $user = User::whereEmail($this->request->email_or_phone)->first();

        if ($user && password_verify($this->request->password, $user->password)) {
            $this->credentials = ['email' => $this->request->email_or_phone, 'password' => $this->request->password];
            $this->user = $user;
            $this->loginType = 'email';
        }

        return $this;
    }

    public function validateLoginWithPhone()
    {
        $user = User::wherePhone($this->request->email_or_phone)->first();

        if ($user && password_verify($this->request->password, $user->password)) {
            $this->credentials = ['phone' => $this->request->email_or_phone, 'password' => $this->request->password];
            $this->user = $user;
            $this->loginType = 'phone';
        }

        return $this;
    }

    public function checkUserVerifications()
    {

        if (!is_null($this->user)) {
            $verifications = UserVerifications::getByUserId($this->user->id);
            $this->verifications = $verifications;
            if ($verifications->phone == 0 && $this->loginType == 'phone') {
                $this->alert('error', "You need to complete this step to continue.");
                $this->verified = false;
            }
            elseif ($verifications->email == 0 && $this->loginType == 'email') {
                $this->alert('error', "You need to complete this step to continue.");
                $this->verified = false;
            }
            else {
                $this->verified = true;
            }
        }

        return $this->verified;
    }

    public function allowOrRefuseLogin(Request $request)
    {
        $this->request = $request;
        $rememberMe = $request->remember_me;
        $remember = false;

        if ($rememberMe == 'on') {
            $remember = true;
        }

        if (!is_null($this->user)
            && false == $this->checkUserVerifications()
            && $this->loginType == 'phone') {
            return redirect("complete-reg/{$this->user->id}_{$this->verifications->token}");
        }

        if (!is_null($this->user)
            && false == $this->checkUserVerifications()
            && $this->loginType == 'email') {
            return redirect("verify-email/{$this->user->id}_{$this->verifications->token}");
        }


        if (Auth::guard('web')->attempt($this->credentials, $remember)) {
            session()->put('login.type', $this->loginType);
            if (session('redirect.url') == '')
                return redirect('/dashboard');

            return redirect(session('redirect.url'));
        }
        else {
            $this->alert('error', "We didn't find any matched records with these credentials.");

            return back()->withInput();
        }
    }
}
