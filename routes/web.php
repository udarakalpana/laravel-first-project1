<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [UserController::class, 'registrationView'])->name('register-view');

Route::post('/user-register', [UserController::class, 'userRegister'])->name('user-register');
