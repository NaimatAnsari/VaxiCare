<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLogin(){

        return view('user.login');

    } 

    public function authLogin(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect('/home'); // Successfully logged in, redirect to home
        } else {
            return back()->with('error', 'Please enter correct email or password'); // Stay on the same page with an error message
        }
    }
     



}
