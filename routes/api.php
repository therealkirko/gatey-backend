<?php

use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\VisitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(LoginController::class)->group(function() {
    Route::post('/login', 'index');
});

Route::middleware('auth:sanctum')->controller(VisitController::class)->group(function() {
    Route::post('/visits', 'store');
});
