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
use App\Http\Controllers\AuthController;

// Resource Controllers
Route::resource('users', UsersController::class);
Route::resource('children', ChildrenController::class);
Route::resource('feedback', FeedbackController::class);
Route::resource('usercontact', UserContactController::class);
Route::resource('vaccine', VaccineController::class);
Route::resource('appointment', AppointmentController::class);

// General Routes
Route::get('/', [UserController::class, 'home']); // By Default
Route::get('/home', [UserController::class, 'home']); // Home
Route::get('/about', [UserController::class, 'about']); // About
Route::get('/vaccines', [UserController::class, 'vaccines']); // Vaccine
Route::get('/contact', [UserController::class, 'contact']); // Contact

Route::get('/profile', [UserController::class, 'profile']); // Profile
Route::get('/logout', [AuthController::class, 'logout']); // Logout
Route::get('/updateAppoint', [UserController::class, 'updateAppoint']); // 
Route::get('/children', [UserController::class, 'children']); // 



// Hospital Routes under Hospital Middleware
Route::middleware(['checkUser:Hospital'])->group(function () {// Hospital dashboard route
    
    Route::get('/hospitalDashboard', [UserController::class, 'hospital']);
    Route::get('/register', [UserController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin']);
    
});

// Parent Middleware Routes
Route::get('/hospitalDashboard', [UserController::class, 'hospital']); 
Route::get('/register', [UserController::class, 'register']); // Register
Route::get('/login', [AuthController::class, 'showLogin']); // Login
Route::middleware(['checkUser:Parent'])->group(function () {
    

    Route::get('/updateAppoint', [UserController::class, 'updateAppoint']);
});

// Authentication Route (Outside Middleware since it's a login function)
Route::post('authLogin', [AuthController::class, 'authLogin']);

// Admin Routes with a Prefix
// Route::middleware(['checkUser:Admin'])->prefix('admin')->group(function () {
    // Route::get('/dashboard', [AdminController::class, 'home']);
    // Route::get('/childrenDetail', [AdminController::class, 'childrenDetail']);
    // Route::get('/editChildren', [AdminController::class, 'editChildren']);
    // Route::get('/addChildren', [AdminController::class, 'addChildren']);
    // Route::get('/userDetail', [AdminController::class, 'userDetail']);
    // Route::get('/vaccinationSchedule', [AdminController::class, 'vaccinationSchedule']);
    // Route::get('/hospital', [AdminController::class, 'hospital']);
    // Route::get('/addUser', [AdminController::class, 'addUser']);
    Route::get('/appointmentDetail', [AdminController::class, 'bookAppoint']);
// });


// Admin Routing

Route::get('vaxicare',[AdminController::class,'home']);

Route::get('childrenDetail',[AdminController::class,'childrenDetail']);

Route::get('editChildren',[AdminController::class,'editChildren']);

Route::get('addChildren',[AdminController::class,'addChildren']);

Route::get('userDetail',[AdminController::class,'userDetail']);

Route::get('vaccinationShedule',[AdminController::class,'vaccinationShedule']);

Route::get('hospital',[AdminController::class,'hospital']);

Route::get('addUser',[AdminController::class,'addUser']);

Route::get('/adminlogin', [AdminController::class, 'showLogin']);


Route::get('/admin', [AdminController::class, 'authLogin']);