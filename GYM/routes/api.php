<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\api\ClassesController;
use App\Http\Controllers\api\MemeberShipController;
use App\Http\Controllers\api\verification;
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
// Route::get('test',[ClassesController::class,'test']); // for testing
Route::get('todayclass',[ClassesController::class,'TodayClass']);
Route::get('tomorrowClass',[ClassesController::class,'NextDayClass']);

/// membership
Route::post('addmembership',[MemeberShipController::class,'store']); // create   
Route::get('allmembership',[MemeberShipController::class,'index']); // getall
Route::put('newmembership/{id}',[MemeberShipController::class,'update']); //update
Route::get('yourmembership/{id}',[MemeberShipController::class,'show']); //show
Route::delete('delmembership/{id}',[MemeberShipController::class,'destory']); //destory

// RelatedProducts
Route::get('reProducts/{id}',[ProductController::class,'RelatedProducts']);

// VerificationEmail
Route::post('emailVerification',[verification::class,'verifyEmail']);
Route::get('verify-email/{id}/{hash}',[verification::class,'verify'])->name('verification.verify');






