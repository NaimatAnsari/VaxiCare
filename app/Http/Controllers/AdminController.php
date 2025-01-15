<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return view('admin.home');   
    }

    public function childrenDetail(){
        return view('admin.childrenDetail');   
    }

    public function addChildren(){
        return view('admin.add-childrenDetail');   
    }

    public function editChildren(){
        return view('admin.edit-childrenDetail');   
    }

    
}
