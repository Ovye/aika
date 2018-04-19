<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Mail\ValidatedAccountEmailMailable;
use App\Mail\VerifyEmailMailable;
use App\Models\Auths\UserVerifications;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;

class VerifyAccountController extends Controller
{
    protected $user, $token, $request, $userId;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function verifyCode($token)
    {
        $explodedToken = explode('_', $token);
        $this->token = $explodedToken[1];
        $this->userId = $explodedToken[0];

        if ($this->validateToken() == false) {
            return $this->redirectInvalidToken();
        }

        $this->assign['userId'] = $this->userId;
        $this->assign['token'] = $this->token;
        $this->assign['only_body'] = true;
        $this->assign['title'] = 'Verify Account Code';
        $this->assign['body'] = 'auths.verify-code-form';

        return view('frontend.wrapper', $this->assign);
    }

    public function validateAccountCode(Request $request)
    {
        $this->request = $request;
        $this->userId = $request->user_id;
        $this->token = $request->token;
        if (!$this->validateToken()) {
            return $this->redirectInvalidToken();
        }

        $user = UserVerifications::getByUserId($this->userId);
        $this->user = $user;

        if ($request->code == $this->user->code) {
            if (time() > $user->expired_at) {
                $this->alert('e', "This code has expired. Please request a new one.");

            }
            UserVerifications::createOrUpdate(['user_id' => $this->userId, 'phone' => 1]);
            $this->alert('success', "Your account is now verified! Please login.");

            return redirect('login');
        }

        $formData['user_id'] = $this->userId;
        $formData['token'] = $this->token;

        $this->alert('e', "Invalid verification code! {$this->getNewCodeForm($formData)}");
        return back()->withInput();

    }

    public function validateToken()
    {
        return UserVerifications::where('user_id', $this->userId)
            ->where('token', $this->token)
            ->first() == true ? true : false;
    }

    public function redirectInvalidToken()
    {
        if ($this->validateToken() == false) {
            $this->alert('error', "Invalid credentials detected");

            return redirect('login');
        }

        return true;
    }

    public function getAccountCode(Request $request)
    {
        $this->request = $request;
        $user = User::findOrFail($this->request->user_id);
        $userVerifications = UserVerifications::getByUserId($user->id);

        if ($userVerifications) {
            session()->put('can_request_new_code', true);
            $this->alert('success', "We have sent you a new code. Enter it below.");
        }

        return back()->withInput();

    }

    public function getNewCodeForm($data = null, $raw_inputs=null)
    {
        return "
            <form action='".url('get-account-code')."' method='post' class='ml-2'>
                ".csrf_field()."
                {$raw_inputs}
                <input type='hidden' name='user_id' value='{$data['user_id']}' >
                <input type='hidden' name='token' value='{$data['token']}'>
                <button type='submit' class='c-badge c-badge--danger ak-no-border u-color-danger u-bg-secondary'>Get
                 New 
                Code</button>
            </form>
        ";
    }

    public function verifyEmail($token)
    {
        $explodedToken = explode('_', $token);
        $this->token = $explodedToken[1];
        $this->userId = $explodedToken[0];

        if ($this->validateToken() == false) {
            return $this->redirectInvalidToken();
        }

        $this->assign['userId'] = $this->userId;
        $this->assign['token'] = $this->token;
        $this->assign['only_body'] = true;
        $this->assign['title'] = 'Verify Account Email';
        $this->assign['body'] = 'auths.verify-email-form';

        return view('frontend.wrapper', $this->assign);
    }

    public function sendNewVerificationLink(Request $request, Mailer $mailer)
    {
        $user = User::findOrFail($request->user_id);
        $userVerifications = UserVerifications::getByUserId($user->id);

        if ($request->email != '') {
            $user->email = $request->email;
            $user->save();
        }

        $userEmail = $user->email;

        if ($user->use_fb_email == 'yes') {
            $userEmail = $user->fb_email;
        }

        if ($request->email != '') {
            $userEmail = $user->email;
        }

        $data['userFname'] = $user->fname;
        $data['url'] = url("validate-account-email/{$user->id}_{$userVerifications->token}");

        $mail = $mailer->to($userEmail)->send( new VerifyEmailMailable($data));

        if (is_null($mail)) {
            $this->alert('s', "A new verification link was sent to {$userEmail}. Open your inbox to continue.");
        }
        else {
            $this->alert('e', "Failed sending new verification link to you. Please, try again later!");

            return back()->withInput();
        }

        return redirect('login');

    }

    public function validateAccountEmail(Mailer $mailer, $token)
    {
        $explodedToken = explode('_', $token);
        $this->token = $explodedToken[1];
        $this->userId = $explodedToken[0];

        if ($this->validateToken() == false) {
            return $this->redirectInvalidToken();
        }

        $user = User::findOrFail($this->userId);
        $userVerifications = UserVerifications::getByUserId($user->id);

        if ($userVerifications->email == 1) {
            $this->alert('i', "Your account email is already verified.");
            return redirect('login');
        }

        $userVerifications->email = 1;

        if ($userVerifications->save()) {
            $data['userFname'] = $user->fname;
            $data['url'] = url('login');

            $mail = $mailer->to($user->email)->send( new ValidatedAccountEmailMailable($data) );
            if (is_null($mail)) {
                $this->alert('s', "<h2 style='color: #fff;'>Congratulations!</h2><br/> Your account email is now verified. You may now login.");
            }
            else {
                $this->alert('w', "Failed to send validation email to your inbox now. However, your account email has been verified.");
            }
        }
        else {
            $this->alert('e', "Failed to verify your account email now. Please, try to visit that link later!");
        }

        return redirect('login');
    }
}
