<?php

use App\Http\Controllers\FRONT\HomepageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');

// Route::get('/', function(){
//     return Inertia::render('Front/Home');
// });

Route::get('/', [HomepageController::class, 'index'])->name('front.home');
Route::get('/room/{slug}', [HomepageController::class, 'roomDetails'])->name('front.room.details');



Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
