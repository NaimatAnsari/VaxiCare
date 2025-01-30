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

    public function vaccines()
    {
        $vaccines = Vaccine::all();
        return view('user.vaccines' , compact('vaccines'));
    }

    public function app()
    {
        return view('admin.bookAppointment');
    }


    public function profile()
    {   
        $users = User::all();
        return view('user.profile', compact('users'));
    }

    public function appoint()
    {
        return view('user.Appointment');
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