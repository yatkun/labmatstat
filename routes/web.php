<?php

use Illuminate\Support\Facades\Route;



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::livewire('/jadwal', 'pages::jadwal.view')
    ->middleware(['auth', 'verified'])
    ->name('jadwal');

Route::livewire('/', 'pages::landing.view')
    ->name('home');

require __DIR__.'/settings.php';
