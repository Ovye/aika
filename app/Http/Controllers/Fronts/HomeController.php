<?php

namespace App\Http\Controllers\Fronts;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->assign['body'] = 'frontend.home.index';
        $this->assign['title'] = "Welcome";

        return view('frontend.wrapper', $this->assign);

    }
}
