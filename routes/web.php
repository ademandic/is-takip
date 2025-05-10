<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IsController;
use App\Http\Controllers\MusteriController;
use App\Http\Controllers\TeklifController;
use App\Http\Controllers\TeknikDataController;
use App\Http\Controllers\FileController;


Route::get('/', [HomeController::class, 'index'])->middleware(['auth']);

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');

Route::resource('musteriler', MusteriController::class)->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::resource('isler.teklifler', TeklifController::class)->parameters([
        'teklifler' => 'teklif'
    ]);
});

Route::get('isler/{isler}/teklifler/{teklif}/pdf', [TeklifController::class, 'pdf'])->name('isler.teklifler.pdf');

Route::middleware(['auth'])->group(function () {
    Route::get('/isler', [IsController::class, 'index'])->name('isler.index');
    Route::get('/isler/create', [IsController::class, 'create'])->name('isler.create');
    Route::post('/isler', [IsController::class, 'store'])->name('isler.store');
    Route::get('/isler/{is}/edit', [IsController::class, 'edit'])->name('isler.edit');
    Route::put('/isler/{is}', [IsController::class, 'update'])->name('isler.update');
    Route::delete('/isler/{is}', [IsController::class, 'destroy'])->name('isler.destroy');
});


Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('isler.teknikdata', TeknikDataController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('isler.files', FileController::class)->only(['index', 'create', 'store', 'destroy']);
});

require __DIR__.'/auth.php';
