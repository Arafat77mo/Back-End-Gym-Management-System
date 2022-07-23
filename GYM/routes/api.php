<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrainerController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/trainers',[TrainerController::class,'index']);
Route::get('/trainer/{id}',[TrainerController::class,'show']);
Route::post('/trainers',[TrainerController::class,'store']);
Route::post('/trainer/{id}',[TrainerController::class,'update']);
Route::post('/trainers/{id}',[TrainerController::class,'destroy']);


// Relationships

Route::get('/getTrainer/{id}',[TrainerController::class,'getTrainer']);


