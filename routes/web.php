<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('home', function () {
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('service', function () {
    return view('service');
});

Route::get('vaccines', function () {
    return view('vaccines');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('register', function () {
    return view('register');
});

Route::get('login', function () {
    return view('login');
});