<?php

namespace App\Http\Controllers\Backends;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auths');
    }

    public function index()
    {
        $this->assign['body'] = 'dashboard.index';

        return view('backend.wrapper', $this->assign);
    }
}
