<?php

namespace App\Http\Middleware;

use App\Models\Auths\UserVerifications;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticateLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $redirectUrl = url()->current();
        Session::put('redirect.url', $redirectUrl);

        if (!auths()->check()) {
            return redirect("login");
        }

        if (Auth::guard('web')->check()) {
            $user = auths()->user();
            $userVerifications = UserVerifications::getByUserId($user->id);
            if ($user && $userVerifications) {
                $loginType = Session::get('login.type');
                if ($userVerifications->phone == 0 && $loginType == 'phone') {
                    auths()->logout();
                    return redirect("complete-reg/{$user->id}_{$userVerifications->token}");
                }
                elseif ($userVerifications->email == 0 && $loginType == 'email') {
                    auths()->logout();
                    return redirect("verify-email/{$user->id}_{$userVerifications->token}");
                }
            }
        }

        return $next($request);
    }
}
