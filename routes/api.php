<?php

use App\Http\Controllers\InstallController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\WilayaController;
use App\Http\Controllers\UserSettingController;
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


// Route::middleware("auth:api")->get("/user", function (Request $request) {
// Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
//     return new UserResource($request->user());
// });


Route::middleware(["auth:sanctum"])->group(function () {

    Route::get("/user", function (Request $request) {
        return new UserResource($request->user());
    });

    Route::get("/wilayas", [WilayaController::class, "index"]);
    Route::get("/wilayas/{wilaya_id}", [WilayaController::class, "show"]);
    Route::get("wilayas/{wilaya_id}/towns/", [TownController::class, "getByWilayaId"]);

    Route::post("/towns", [TownController::class, "store"]);
    Route::patch("/towns/{town_id}", [TownController::class, "update"]);
    Route::delete("/towns/{town_id}", [TownController::class, "destroy"]);


    Route::get("/schedules/{town_id}", [ScheduleController::class, "show"]);
    Route::post("/schedules", [ScheduleController::class, "store"]);

    // user settings
    // TODO: rate limit the amount of resets per hours to 5
    Route::patch("/settings/reset-password", [UserSettingController::class, "resetPassword"]);
    // user settings
    Route::post("/settings/user-settings", [UserSettingController::class, "storeUserAppSettings"]);
    Route::patch("/settings/user-settings", [UserSettingController::class, "updateUserAppSettings"]);
});

// register first account routes
Route::middleware(["throttle:install", "not-auth"])->group(function () {
    Route::post("/install",  [InstallController::class, "store"])->middleware('can-install');
    Route::get("/can-install", [InstallController::class, "canInstall"]);
});


// public routes
Route::middleware((["throttle:app-requests"]))->prefix("v1")->group((function () {
    Route::get("/wilayas", [WilayaController::class, "index"]);
    Route::get("/towns/{wilaya_code}", [TownController::class, "getByWilayaId"]);
    Route::get("/schedules/{town_id}/current", [ScheduleController::class, "getCurrentWeekSchedule"]);
    Route::get("/schedules/{town_id}/next", [ScheduleController::class, "getNextWeekSchedule"]);
}));
