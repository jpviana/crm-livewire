<?php

use App\Livewire\Auth\{Login, Logout, Password\Recovery, Password\Reset, Register};
use App\Livewire\Welcome;
use Illuminate\Support\Facades\{Auth, Route};

Route::middleware('auth')->group(function () {
    Route::get('/', Welcome::class)->name('dashboard');
    Route::get('/logout', Logout::class)->name('logout');
});

Route::get('/register', Register::class)->name('auth.register');
Route::get('/login', Login::class)->name('auth.login');
Route::get('/recovery', Recovery::class)->name('password.recovery');
Route::get('/reset', Reset::class)->name('password.reset');
