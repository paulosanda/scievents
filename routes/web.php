<?php

use App\Http\Controllers\CoffeeLoungeController;
use App\Http\Controllers\ConferenceRoomController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;
use App\Models\ConferenceRoom;
use App\Models\Participation;
use Database\Factories\ParticipationFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BenchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/conference-rooms', [ConferenceRoomController::class, 'index'])
        ->name('conference.room.index');
    Route::post('/conference-rooms', [ConferenceRoomController::class, 'store'])
        ->name('conference.room.store');
    Route::get('/conference-room/{id}', [ConferenceRoomController::class, 'show'])
        ->name('conference.room.show');

    Route::get('/coffee-lounges', [CoffeeLoungeController::class, 'index'])
        ->name('coffee.lounges.index');
    Route::post('/coffee-lounges', [CoffeeLoungeController::class, 'store'])
        ->name('coffee.lounges.store');
    Route::get('/coffee-lounge/{id}', [CoffeeLoungeController::class, 'show'])
        ->name('coffee.lounge.show');

    Route::get('/participation', [ParticipationController::class, 'create'])
        ->name('participations.create');
    Route::post('/participations', [ParticipationController::class, 'store'])
        ->name('participations.store');

    Route::get('persons', [PersonController::class, 'index'])
        ->name('persons.index');
});

Route::get('/benchmark', [BenchController::class, 'index']);

require __DIR__ . '/auth.php';
