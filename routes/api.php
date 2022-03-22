<?php

use App\Http\Controllers\Api\PassportAuthController;

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

Route::post('login', [PassportAuthController::class, 'login']);
 
Route::middleware('auth:api')->group(function () {
    Route::get('info', [PassportAuthController::class, 'userInfo']);
    Route::resource('/schools', 'Api\SchoolsController')->names('schools');
    Route::resource('/students', 'Api\StudentsController')->names('students');
});