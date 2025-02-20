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
use App\Http\Controllers\ReportController;

// Public Show Routes
Route::get('/', [UserController::class, 'home']); // By Default
Route::get('/home', [UserController::class, 'home']); // Home
Route::get('/about', [UserController::class, 'about']); // About
Route::get('/vaccines', [UserController::class, 'vaccines']); // Vaccine
Route::resource('feedback', FeedbackController::class); // Feedback
Route::get('/contact', [UserController::class, 'contact']); // Contact
Route::get('/register', [UserController::class, 'register']); // Register
Route::get('/login', [AuthController::class, 'showLogin']); // Login

Route::get('/Adminlogin', [AdminController::class, 'showLogin']); // Login



// Parent Show Routes
Route::get('/appointment', [UserController::class, 'appoint']); // Profile
Route::get('/profile', [UserController::class, 'profile']); // Profile
Route::get('/logout', [AuthController::class, 'logout']); // Logout
Route::get('/childrenDashborad', [UserController::class, 'childrenDashborad']); // 
Route::get('/RegisterChildren', [UserController::class, 'childrenRegister']); // 
Route::get('/bookAppointment', [UserController::class, 'bookAppointment']); //




// Hospital Show Routes
Route::get('/hospitalDashboard', [UserController::class, 'hospital']);
Route::get('/updateAppoint', [UserController::class, 'updateAppoint']);// Update Vaccination Update
Route::get('/profile', [UserController::class, 'profile']); // Profile
Route::get('/logout', [AuthController::class, 'logout']); // Logout




// Hospital Routes under Hospital Middleware
Route::middleware(['checkUser:Hospital'])->group(function () {// Hospital dashboard route
    
    
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

// Admin Authentication Route (Outside Middleware since it's a login function)
Route::post('/authLogin', [AuthController::class, 'authLogin'])->name('authLogin');


// User Authentication Route (Outside Middleware since it's a login function)
Route::post('/adminAuthLogin', [AuthController::class, 'adminAuthLogin'])->name('adminAuthLogin');

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

Route::get('/report',[ReportController::class,'generateVaccinationReport']); 

Route::get('childrenDetail',[AdminController::class,'childrenDetail']);

Route::get('editChildren',[AdminController::class,'editChildren']);

Route::get('addChildren',[AdminController::class,'addChildren']);

Route::get('userDetail',[AdminController::class,'userDetail']);

Route::get('vaccinationShedule',[AdminController::class,'vaccinationShedule']);

Route::get('hospital',[AdminController::class,'hospital']);

Route::get('addUser',[AdminController::class,'addUser']);

Route::get('/adminlogin', [AdminController::class, 'showLogin']);


Route::get('/admin', [AdminController::class, 'authLogin']);


// Resource Controllers
Route::resource('users', UsersController::class);
Route::resource('children', ChildrenController::class);

Route::resource('usercontact', UserContactController::class);
Route::resource('vaccine', VaccineController::class);
Route::resource('appointment', AppointmentController::class);
