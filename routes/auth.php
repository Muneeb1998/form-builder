<?php

use App\Livewire\Pages\Auth\Registration;
use App\Livewire\Pages\Auth\Login;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Route::get('/register', Registration::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});