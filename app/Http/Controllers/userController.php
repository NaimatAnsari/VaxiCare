<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Auth;
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

    public function children(){
        $childrens = DB::table('childrens')
        ->join('users as u', 'childrens.parent_id', '=', 'u.id') // Correct table and column
        ->select('childrens.*', 'u.fullname as parent_id') // Replace 'name' with 'full_name' or correct column name
        ->where('childrens.parent_id', Auth::id()) // Filtering by parent_id
        ->get();
    

        return view('user.children',compact('childrens'));
    }

    public function app()
    {
        return view('admin.bookAppointment');
    }

    public function hospital()
    {
        $users = DB::table('bookings')
        ->join('childrens as c', 'bookings.child_id', '=', 'c.id')
        ->join('users as h', 'bookings.hospital_id', '=', 'h.id')
        ->join('vaccines as v', 'bookings.vaccine_type', '=', 'v.id')
        ->select('bookings.*', 'c.name as child_name', 'h.fullname as h_name', 'v.vaccine_name as vaccine_name') // Correct field
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
        ->where('childrens.parent_id', Auth::id()) // Filtering by parent_id
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

    public function contact()
    {
        return view('user.contact');
    }

    }