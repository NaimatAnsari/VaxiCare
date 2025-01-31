<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Vaccine;
use Illuminate\Support\Facades\DB;
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

    public function hospital()
    {
        $users = DB::table('bookings')
        ->join('childrens as c', 'bookings.child_id', '=', 'c.id')
        ->join('hospitals as h', 'bookings.hospital_id', '=', 'h.id')
        ->select('bookings.*', 'c.name as child_name', 'h.name as hospital_name')
        ->get();

    return view('user.hospital', compact('users'));

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

    public function updateAppoint(){
        $users = DB::table('bookings')
        ->join('childrens as c', 'bookings.child_id', '=', 'c.id')
        ->join('hospitals as h', 'bookings.hospital_id', '=', 'h.id')
        ->select('bookings.*', 'c.name as child_name', 'h.name as hospital_name')
        ->get();

        return view('user.edit-appointment',compact('users'));
    }
    
    public function forgetPassword()
    {
        return view('user.forgetPassword');
    }

    public function resetPassword()
    {
        return view('user.resetPassword');
    }

    public function register()
    {
        return view('user.register');
    }

    }