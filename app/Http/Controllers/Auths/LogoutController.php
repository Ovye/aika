<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function index()
    {
        session()->remove('redirect.url');
        auths()->logout();

        return redirect('login');
    }
}
