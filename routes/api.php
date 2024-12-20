<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EducationalExperienceController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
    Route::resource('experiencia-educativa', EducationalExperienceController::class);
});*/

Route::middleware('auth:sanctum')->group(function (){

});
Route::resource('experiencia-educativas', EducationalExperienceController::class);
Route::resource('grupos', GroupController::class);
Route::resource('usuarios', UserController::class);


