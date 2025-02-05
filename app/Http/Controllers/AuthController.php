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
        // Attempt to authenticate the user
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            // Check the user's role and redirect accordingly
            if (Auth::user()->role == "Parent" ||  Auth::user()->role == "Hospital") {
                return redirect('/home'); // For debugging (replace with actual logic)
            }  // Redirect to hospital dashboard
             else {
                return redirect('/home'); // Redirect to home for parents
            }
        }
    
        // If authentication fails, show an error message
        session()->flash('Wrong', 'Email or Password is incorrect. Please try again.');
        return redirect()->back(); // Stay on the same page with an error message
    }


    //     if (Auth::attempt([
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ])) {

    //         if(Auth::user()->role == "Admin"){
    //             dd($request->all()); 
    //         }else{

    //             return redirect('/home'); // Successfully logged in, redirect to home
    //         }
    //     } else {
            
    // session()->flash('Wrong', 'Email or Password is incorrect. Please try again.');
    // return redirect()->back(); // Stay on the same page with an error message
    //     }

    public function adminAuthLogin(Request $request)
    {
        // Attempt to authenticate the user
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            // Check the user's role and redirect accordingly
            if (Auth::user()->role == "Admin") {
                return redirect('/vaxicare'); // For debugging (replace with actual logic)
            }  // Redirect to hospital dashboard
            } else {
                return redirect('/home'); // Redirect to home for parents
            }
        
    
        // If authentication fails, show an error message
        session()->flash('Wrong', 'Email or Password is incorrect. Please try again.');
        return redirect()->back(); // Stay on the same page with an error message
    }

     
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }


    

}
