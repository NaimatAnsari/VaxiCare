<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Vaccine;
class UserController extends Controller
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
        $vaccines = Vaccine::all();
        return view('user.vaccines' , compact('vaccines'));
    }

    public function profile()
    {   
        $users = User::all();
        return view('user.profile', compact('users'));
    }

    public function appoint()
    {
        return view('user.appointment');
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