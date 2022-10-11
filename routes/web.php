<?php

use App\Http\Controllers\Organizations;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VisitController;
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

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('organizations')->controller(Organizations::class)->group(function() {
        Route::get('/', 'index')->name('organizations');
        Route::post('/create', 'store')->name('organizations.store');
    });

    Route::prefix('teams')->controller(TeamController::class)->group(function() {
        Route::get('/', 'index')->name('teams');
        Route::post('/create', 'store')->name('teams.store');
    });

    Route::prefix('visits')->controller(VisitController::class)->group(function() {
        Route::get('/', 'index')->name('visits');
    });
});
