<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
use Illuminate\Routing\Route as RoutingRoute;

Route::get('/',[UserController::class,'home']);

Route::get('home',[UserController::class,'home']);

Route::get('about',[UserController::class,'about']);

Route::get('service',[UserController::class,'service']);

Route::get('vaccines',[UserController::class,'vaccines']);

Route::get('contact',[UserController::class,'contact']);

Route::resource('users', UsersController::class);


Route::get('login',[UserController::class,'login']);

Route::get('forgetPassword',[UserController::class,'forgetPassword']);

Route::get('resetPassword',[UserController::class,'resetPassword']);


// Admin Routing

Route::get('vaxicare',[AdminController::class,'home']);

Route::get('childrenDetail',[AdminController::class,'childrenDetail']);

Route::get('editChildren',[AdminController::class,'editChildren']);

Route::get('addChildren',[AdminController::class,'addChildren']);

Route::get('userDetail',[AdminController::class,'userDetail']);

Route::get('vaccinationShedule',[AdminController::class,'vaccinationShedule']);

Route::get('hospital',[AdminController::class,'hospital']);

Route::get('addUser',[AdminController::class,'addUser']);

