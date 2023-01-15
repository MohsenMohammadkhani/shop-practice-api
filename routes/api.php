<?php
use App\Http\Controllers\Auth\Register\UserRegisterWithCredentialsController;
use App\Http\Controllers\Auth\Login\UserLoginWithCredentialsController;
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
Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post("/register-with-credentials", [UserRegisterWithCredentialsController::class, 'userRegister']);
        Route::post("/login-with-credentials", [UserLoginWithCredentialsController::class, 'userLogin']);
    });
});
