<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Admin;
use App\Http\Controllers\AdminController;


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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('checkAdminToken:api');
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);   
    
     
});


Route::group([
   
    'prefix' => 'admin','namespace'=>'Admin'
], function ($router) {

    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/register', [AdminController::class, 'register']);


    Route::post('/logout', [AdminController::class, 'logout'])->middleware('checkAdminToken:admin-api');
});


//middleware Admin

Route::group(['prefix' => 'admin' ,'middleware' => 'checkAdminToken:admin-api'],function (){

//



}) ;


////middleware user
Route::group(['prefix' => 'user' ,'middleware' => 'checkAdminToken:api'],function (){

Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);



}) ;