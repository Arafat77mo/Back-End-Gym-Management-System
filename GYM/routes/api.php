<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\api\ClassesController;
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



Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);


///classes

Route::post('addclass',[ClassesController::class,'store']); // create
Route::get('allclass',[ClassesController::class,'index']); // getall
Route::put('newClass/{id}',[ClassesController::class,'update']); //update
Route::get('yourClass/{id}',[ClassesController::class,'show']); //show
Route::delete('delClass/{id}',[ClassesController::class,'destory']); //destory
Route::get('gettrainer/{id}',[ClassesController::class,'getTrainer']); //getTrainer

