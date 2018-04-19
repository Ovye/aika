<?php

namespace App\Http\Controllers\Auths;

use App\Aika\Configs\SMSConfig\SMSConfig;
use App\Http\Controllers\Controller;
use App\Mail\PasswordRecoveryMailable;
use App\Models\Auths\PasswordRecovery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;

class PasswordRecoveryController extends Controller
{
    protected $request, $token, $code,
        $recoveryType, $redirectUrl, $sms,
        $userId, $user, $requestTimes;

    public function __construct(SMSConfig $sms)
    {
        $this->sms = $sms;
    }

    public function index()
    {
        $this->assign['only_body'] = true;
        $this->assign['title'] = "Password Recovery";
        $this->assign['body'] = 'auths.recover-password';

        return view('frontend.wrapper', $this->assign);
    }

    public function validateRecoveryData(Request $request, Mailer $mailer)
    {
        $this->request = $request;

        return $this->validateRecoveryByPhone()
            ->validateRecoveryByEmail($mailer)
            ->runValidations();
    }

    protected function validateRecoveryByPhone()
    {
        $user = User::wherePhone($this->request->email_or_phone)->first();

        if ($user) {
            return $this->sendPhoneRecoveryMessage($user);
        }

        return $this;
    }

    protected function sendPhoneRecoveryMessage($user)
    {
        $code = random_numbers(6);
        $data['name'] = $user->fname;
        $data['code'] = $code;

        $this->code = $code;
        $this->userId = $user->id;
        $this->requestTimes = 1;

        $this->alert('e', "Failed to recover password by phone now. Please, try again later!");

        $logData = [
            'code' => $code,
            'recovery_type' => 'phone',
            'status' => 'pending',
            'expired_at' => time() + 3600,
            'user_id' => $this->userId,
        ];

        $log = PasswordRecovery::createOrUpdate($user->id, $logData);

        if ($log) {
            $this->recoveryType = 'phone';

            if ($log->code_request_times < 5) {

                $this->sms->from('Aika')
                    ->to($user->phone)
                    ->view('sms.auths.password-recovery', $data)
                    ->send();

                if (!$this->sms->response) {
                    alert('e', "Password recovery failed. Possibly because you are not connected to an active internet connection. Check your connection and try again!");
                    $this->redirectUrl = back()->withInput();

                    return $this;
                }

                $token = $log->token;
                $log->code_request_times = $log->code_request_times + 1;
                $log->save();

                $this->alert('s', "We've sent recovery code to your phone. The code will expire after one hour.");
                $this->redirectUrl = redirect("change-password/{$user->id}_{$token}");
            }
            else {
                $this->alert('e', "You've exhausted your phone recovery requests. Please, use email.");
                $this->redirectUrl = back()->withInput();
            }
        }
        else {
            $this->redirectUrl = back()->withInput();
        }

        return $this;

    }

    public function validateRecoveryByEmail(Mailer $mailer)
    {
        $user = User::whereEmail($this->request->email_or_phone)->first();
        if ($user) {
            return $this->sendEmailRecoveryMessage($user, $mailer);
        }

        return $this;
    }

    public function sendEmailRecoveryMessage($user, Mailer $mailer)
    {
        $this->token = str_random(30);
        $data['url'] = url("change-password/{$user->id}_$this->token");
        $data['name'] = $user->fname;
        $this->userId = $user->id;

        $recoveryData = [
            'token' => $this->token,
            'recovery_type' => 'email',
            'status' => 'pending',
            'expired_at' => time() + 3600,
            'user_id' => $this->userId,
        ];

        $log = PasswordRecovery::createOrUpdate($user->id, $recoveryData);

        if ($log) {
            $this->recoveryType = 'email';
            $sendMail = $mailer->to($user->email)->send(new PasswordRecoveryMailable($data));
            if (!is_null($sendMail)) {
                $this->alert('e', "Failed to send recovery link to you. Please, try again later.");
                $this->redirectUrl = back()->withInput();

                return $this;
            }

            $this->alert('s', "We have sent recovery instructions to your mailbox. This request expires after one hour. Please, open it to continue.");
        }

        $this->redirectUrl = back();

        return $this;

    }

    public function runValidations()
    {
        if ($this->recoveryType == '') {
            $this->alert('e', "Invalid credential provided. Please, try again later!");

            return back()->withInput();
        }

        return $this->redirectUrl;

    }

}
