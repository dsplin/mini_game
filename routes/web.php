<?php

use App\Http\Controllers\PageAController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RegistrationController::class, 'showRegistrationForm'])->name('registration.form');
Route::post('/register', [RegistrationController::class, 'register'])->name('register');

Route::prefix('page-a')->group(function () {
    Route::get('/{link}',  [PageAController::class, 'showPageA'])->name('page.a');
    Route::put('/{link}', [PageAController::class, 'updateLink'])->name('generate.link');
    Route::delete('/{link}', [PageAController::class, 'deleteLink'])->name('deactivate.link');
    Route::post('/{link}/play-game', [PageAController::class, 'playGame'])->name('play.game');
    Route::get('/{link}/history-game', [PageAController::class, 'gameHistory'])->name('game.history');
});
