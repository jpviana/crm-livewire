<?php

use App\Livewire\Auth\{Login, Register};
use App\Livewire\Welcome;
use Illuminate\Support\Facades\{Auth, Route};

Route::middleware('auth')->group(function () {
    Route::get('/', Welcome::class)->name('dashboard');
});

Route::get('/register', Register::class)->name('auth.register');
Route::get('/login', Login::class)->name('auth.login');
Route::get('/logout', fn () => Auth::logout())->name('auth.logout');
