<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Children;
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

    public function bookAppoint(){
        return view('admin.appointment');   
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
