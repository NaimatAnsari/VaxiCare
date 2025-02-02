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

            if(Auth::user()->role == "Admin"){
                return redirect('/vaxicare'); 
            }else{

                return redirect('/home'); // Successfully logged in, redirect to home
            }
        } else {
            
    session()->flash('Wrong', 'Email or Password is incorrect. Please try again.');
    return redirect()->back(); // Stay on the same page with an error message
        }
    }
     
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }


    

}
