<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;



Route::get('/',[userController::class,'home']);

Route::get('home',[userController::class,'home']);

Route::get('about',[userController::class,'about']);

Route::get('service',[userController::class,'service']);

Route::get('vaccines',[userController::class,'vaccines']);

Route::get('contact',[userController::class,'contact']);

Route::get('register',[userController::class,'register']);

Route::get('login',[userController::class,'login']);