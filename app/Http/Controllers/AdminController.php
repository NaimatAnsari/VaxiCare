<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Children;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home(){
        return view('admin.home');   
    }

    public function childrenDetail(){
     
        
        $childrens = DB::table('childrens')
        ->join('users as u', 'childrens.parent_id', '=', 'u.id') // Correct table and column
        ->select('childrens.*', 'u.fullname as parent_id') // Replace 'name' with 'full_name' or correct column name
        ->get();
    

        
        return view('admin.childrenDetail' , compact('childrens')); 
    }

    public function addChildren(){
        return view('admin.add-childrenDetail');   
    }

    public function editChildren(){
        return view('admin.edit-childrenDetail');   
    }

    public function bookAppoint() {
        $bookings = DB::table('bookings')
        ->join('childrens as c', 'bookings.child_id', '=', 'c.id')
        ->join('users as h', 'bookings.hospital_id', '=', 'h.id')
        ->join('vaccines as v', 'bookings.vaccine_type', '=', 'v.id')
        ->join('users as p', 'bookings.parent_id', '=', 'p.id')
        ->select('bookings.*', 'c.name as child_name', 'h.fullname as h_name', 'v.vaccine_name as vaccine_name', 'p.fullname as parent_name') // Correct field
        ->get();

        return view('admin.appointment', compact('bookings'));
    }
    
    
    
    // public function userDetail()
    // {
    //     $users = User::all();
    //     return view('admin.user', compact('users'));
    // }

    public function addUser(){
        return view('admin.add-user');   
    }

    public function vaccinationShedule(){
        return view('admin.vaccinationShedule');   
    }

    public function hospital(){
        return view('admin.hospital');   
    }

    public function showLogin(){
        return view('admin.login');   
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
   
    
    
}
