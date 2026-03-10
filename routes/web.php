<?php

use Illuminate\Support\Facades\Route;



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::livewire('/jadwal', 'pages::jadwal.view')
    ->middleware(['auth', 'verified'])
    ->name('jadwal');

Route::get('/jadwal/pdf/{hari}', function ($hari) {
    $jadwals = \App\Models\Jadwal::where('hari', $hari)->get();
    $pdf = \PDF::loadView('pdf.jadwal', [
        'hari' => $hari,
        'jadwals' => $jadwals,
    ]);
    return $pdf->download('jadwal-' . strtolower($hari) . '.pdf');
})->middleware(['auth', 'verified'])->name('jadwal.pdf');

Route::get('/jadwal/pdf-all', function () {
    $jadwals = \App\Models\Jadwal::all()->groupBy('hari');
    $pdf = \PDF::loadView('pdf.jadwal-all', [
        'jadwals' => $jadwals,
    ]);
    return $pdf->download('jadwal-lengkap.pdf');
})->middleware(['auth', 'verified'])->name('jadwal.pdf.all');

Route::livewire('/', 'pages::landing.view')
    ->name('home');

require __DIR__.'/settings.php';
