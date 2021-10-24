<?php

use App\Http\Controllers\PeriodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\WilayaController;
use App\Http\Resources\UserResource;

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


// Route::middleware('auth:api')->get('/user', function (Request $request) {
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return new UserResource($request->user());
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get("/wilayas", [WilayaController::class, 'index']);
    Route::get("/wilayas/{wilaya_id}", [WilayaController::class, 'show']);
    Route::get("wilayas/{wilaya_id}/towns/", [TownController::class, 'getByWilayaId']);

    Route::post("/towns", [TownController::class, 'store']);

    // Route::get("/schedules", [ScheduleController::class, 'index']);
    Route::get("/schedules/{town_id}", [ScheduleController::class, 'show']);
    Route::post("/schedules", [ScheduleController::class, 'store']);
    Route::patch("/schedules/{schedule_id}", [ScheduleController::class, 'update']);
});
