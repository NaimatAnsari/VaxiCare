<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function about()
    {
        return view('user.about');
    }

    public function service()
    {
        return view('user.service');
    }

    public function vaccines()
    {
        return view('user.vaccines');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function register()
    {
        return view('user.register');
    }

    public function login()
    {
        return view('user.login');
    }

    public function forgetPassword()
    {
        return view('user.forgetPassword');
    }

    public function resetPassword()
    {
        return view('user.resetPassword');
    }
}
