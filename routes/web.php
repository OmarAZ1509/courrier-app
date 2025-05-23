<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\ServiceController;
use App\Models\PieceJointe;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CertificatController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('courriers', CourrierController::class);


Route::resource('services', ServiceController::class);



Route::get('/certificats/create', [CertificatController::class, 'create'])->name('certificats.create');
Route::post('/certificats', [CertificatController::class, 'store'])->name('certificats.store');
Route::get('/certificats/{id}/pdf', [CertificatController::class, 'generatePDF'])->name('certificats.pdf');




require __DIR__.'/auth.php';
