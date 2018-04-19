<?php

namespace App\Http\Controllers\Auths;

use App\Aika\Repositories\PasswordRecoveryRepository;
use App\Aika\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{

    protected $userId, $type, $token, $code, $request, $recovery, $user;

    public function __construct(PasswordRecoveryRepository $recovery, UserRepository $user)
    {
        $this->recovery = $recovery;
        $this->user = $user;
    }

    public function index($token)
    {
        if ($this->validateUserToken($token) == false) {
            return redirect('login');
        }

        $recoveryLog = $this->validateUserToken($token);

        $this->assign['only_body'] = true;
        $this->assign['title'] = "Change your password";
        $this->assign['body'] = 'auths.change-password';
        $this->assign['log'] = $recoveryLog;
        $this->assign['user'] = $this->user->findOrFail($recoveryLog->user_id);

        return view('frontend.wrapper', $this->assign);
    }

    public function validateUserToken($token)
    {
        $this->userId = string($token)->segment('_', 0);
        $this->token = string($token)->segment('_', 1);

        $userPasswordRecoveryLog = $this->recovery->getUserRecovery($this->userId);
        if (false == $userPasswordRecoveryLog) {
            $this->alert('e', "Cross-site forgery detected.");

            return false;
        }

        return $userPasswordRecoveryLog;
    }

    public function validatePasswordChange(Request $request)
    {
        $this->type = $request->type;
        $this->token = $request->token;
        $this->userId = $request->user_id;
        $this->code = $request->code;
        $this->request = $request;

        if ($this->type == 'phone') {
            return $this->validationForPhone();
        }

        if ($this->type == 'email') {
            return $this->validateForEmail();
        }

        return redirect()->action('Auths\ChangePasswordController@index', $this->userId . '_' . $this->token);
    }

    public function validationForPhone()
    {
        $userLog = $this->recovery->getUserRecovery($this->userId);
        $user = $this->user->findOrFail($this->userId);

        if ($userLog->code == $this->code) {
            if (time() > $userLog->expired_at) {
                $this->alert('e', "This code has expired. <a href='" . url("recover-password") . "/' class='badge badge-warning ml-2'>Request New One</a>");

                return back()->withInput();
            }

            if ($userLog->status == 'completed') {
                $this->alert('e', "You've recently changed your password. Please, login with it or request a new one.");

                return back()->withInput();
            }

            $userLog->status = 'completed';
            $userLog->save();

            $user->password = bcrypt($this->request->password);
            $user->save();

            if (Auth::guard('web')->attempt([
                'phone' => $user->phone,
                'password' => $this->request->password
            ])) {
                session()->put('login.type', 'phone');

                return redirect('dashboard');
            }
        }
        $this->alert('e', "Invalid code entered. Try again!");

        return back()->withInput();
    }

    public function validateForEmail()
    {
        $userLog = $this->recovery->getUserRecovery($this->userId);
        $user = $this->user->findOrFail($this->userId);

        if ($userLog->token == $this->token) {
            if (time() > $userLog->expired_at) {
                $this->alert('e', "This token has expired. <a href='" . url("recover-password") . "/' class='badge badge-warning ml-2'>Request New One</a>");

                return back()->withInput();
            }

            if ($userLog->status == 'completed') {
                $this->alert('e', "You've recently changed your password. Please, login with it or request a new one.");

                return back()->withInput();
            }

            $userLog->status = 'completed';
            $userLog->save();

            $user->password = bcrypt($this->request->password);
            $user->save();

            if (Auth::guard('web')->attempt([
                'email' => $user->email,
                'password' => $this->request->password
            ])) {
                session()->put('login.type', 'email');

                return redirect('dashboard');
            }
        }
        $this->alert('e', "Invalid token detected. Try again!");

        return redirect('recover-password');
    }
}
