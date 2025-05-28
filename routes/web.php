<?php

use App\Http\Controllers\FRONT\AboutController;
use App\Http\Controllers\FRONT\BookingController;
use App\Http\Controllers\FRONT\ContactController;
use App\Http\Controllers\FRONT\HomepageController;
use App\Http\Controllers\Front\PropertyController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');

// Route::get('/', function(){
//     return Inertia::render('Front/Home');
// });

Route::get('/', [HomepageController::class, 'index'])->name('front.home');
Route::get('/properties', [PropertyController::class, 'index'])->name('front.property.index');
Route::get('/room/{slug}', [HomepageController::class, 'roomDetails'])->name('front.room.details');

//FRONT BOOKING
Route::post('/property/store', [BookingController::class, 'book_room'])->name('front.property.booking');
Route::post('/check-availability', [BookingController::class, 'checkAvailability'])->name('bookings.check-availability');

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
