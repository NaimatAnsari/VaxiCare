<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Children;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function home(){
        return view('admin.home');   
    }

    public function childrenDetail(){
        
        $childrens = Children::all();
        return view('admin.childrenDetail',compact('childrens')); 
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
            ->join('hospitals as h', 'bookings.hospital_id', '=', 'h.id')
            ->select('bookings.*', 'c.name as child_name', 'h.name as hospital_name')
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

    
    
}
