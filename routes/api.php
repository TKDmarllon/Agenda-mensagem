<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
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

Route::group(['prefix'=> '/contact'], function(){
Route::get("/home", [ContactController::class, "index"]);
Route::post("/cadastro",[ContactController::class, "store"]);
Route::put("/{id}",[ContactController::class, "update"]);
Route::delete("/{id}",[ContactController::class, "destroy"]);
Route::get("/{id}", [ContactController::class, "show"]);
});

Route::group(['prefix'=> '/message'], function(){
Route::post("/", [MessageController::class, "send"]);
Route::get("/", [MessageController::class, "index"]);
Route::get("/{id}", [MessageController::class, "show"]);
Route::put("/{id}",[MessageController::class, "update"]);
Route::delete("/{id}",[MessageController::class, "destroy"]);
});
