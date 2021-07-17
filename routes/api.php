<?php

use App\Http\Controllers\PeriodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\WilayaController;

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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/schedules", [ScheduleController::class, 'index']);
Route::post("/schedules", [ScheduleController::class, 'store']);


Route::get("/periods", [PeriodController::class, 'index']);
Route::post("/periods", [PeriodController::class, 'store']);


Route::get("/wilayas", [WilayaController::class, 'index']);
// Route::post("/wilayas", [WilayaController::class, 'store']);





Route::get("/towns", [TownController::class, 'index']);
Route::post("/towns", [TownController::class, 'store']);
