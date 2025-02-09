<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Livewire\Pages\Dashboard\Profile;
use App\Livewire\Pages\Dashboard\Support;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', Profile::class)->name('profile');
    Route::get('profile', Profile::class)->name('profile');
    Route::get('contact', Support::class)->name('contact');
    Route::get('logout', function (Request $request) {
        Auth::guard('web')->logout();
        return redirect('/');
    })->name('logout');
});
require __DIR__ . '/auth.php';
