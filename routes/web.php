<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UserContactController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\AppointmentController;


// Resouce Controller 

Route::resource('users', UsersController::class);
Route::resource('children', ChildrenController::class);
Route::resource('feedback', FeedbackController::class);
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::resource('usercontact', UserContactController::class);
Route::resource('vaccine', VaccineController::class);
Route::resource('appointment', AppointmentController::class);









Route::get('/',[UserController::class,'home']);

Route::get('/home',[UserController::class,'home']);

Route::get('/about',[UserController::class,'about']);

Route::get('/service',[UserController::class,'service']);

Route::get('/vaccines',[UserController::class,'vaccines']);

Route::get('/profile',[UserController::class,'profile']);



Route::get('child',[UserController::class,'dashboard']);


Route::get('/bookAppoint',[AdminController::class,'bookAppoint']);


// Route::get('bookappoint',[UserController::class,'bookappoint']);








// Route::get('login',[UserController::class,'login']);

Route::get('forgetPassword',[UserController::class,'forgetPassword']);

Route::get('resetPassword',[UserController::class,'resetPassword']);

Route::get('dashboard',[UserController::class,'dashboard']);




// Admin Routing

Route::get('vaxicare',[AdminController::class,'home']);

Route::get('childrenDetail',[AdminController::class,'childrenDetail']);

Route::get('editChildren',[AdminController::class,'editChildren']);

Route::get('addChildren',[AdminController::class,'addChildren']);

Route::get('userDetail',[AdminController::class,'userDetail']);

Route::get('vaccinationShedule',[AdminController::class,'vaccinationShedule']);

Route::get('hospital',[AdminController::class,'hospital']);

Route::get('addUser',[AdminController::class,'addUser']);

