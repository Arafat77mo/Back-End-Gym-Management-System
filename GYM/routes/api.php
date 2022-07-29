<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingleWorkoutController;
use App\Http\Controllers\ExerciseController;

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



Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);

Route::post('/products',[ProductController::class,'store']);
Route::post('/products/{id}',[ProductController::class,'update']);
Route::delete('/products/{id}',[ProductController::class,'deleteproduct']);



// single workout category
Route::get('/singleworkout',[SingleWorkoutController::class,'list']);
Route::get('/singleworkout/{id}',[SingleWorkoutController::class,'show']);
Route::post('/singleworkout',[SingleWorkoutController::class,'store']);
Route::delete('/singleworkout/{id}',[SingleWorkoutController::class,'deletecategory']);
Route::post('/singleworkout/{id}',[SingleWorkoutController::class,'updatecategory']);

// get exercises by category id

Route::get('/exercies/{id}',[ExerciseController::class,'listexercies']);
Route::post('/exercies',[ExerciseController::class,'store']);
Route::delete('/exercies/{id}',[ExerciseController::class,'deleteexercise']);
Route::post('/exercies/{id}',[ExerciseController::class,'updateExercies']);


