<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\api\ClassesController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessagesController;




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





// Relationships
Route::get('/getTrainer/{id}',[TrainerController::class,'getTrainer']);

//middleware Admin



Route::group(['prefix' => 'admin' ,'middleware' => 'checkAdminToken:admin-api'],function (){
    Route::post('messages', [MessagesController::class, 'sendMessage']);
    Route::post('messageDirect', [MessagesController::class, 'sendDirectMessage']); 

//users
Route::get('/users/status/{user_id}/{status_code}',[AuthController::class,'updateStatus'])->name('users.status.update');
Route::get('/users',[AuthController::class,'index']);

//classes
Route::post('addclass',[ClassesController::class,'store']); // create

Route::put('newClass/{id}',[ClassesController::class,'update']); //update

Route::delete('delClass/{id}',[ClassesController::class,'destory']); //destory

//trainer
Route::post('/trainers',[TrainerController::class,'store']);
Route::post('/trainer/{id}',[TrainerController::class,'update']);
Route::post('/trainers/{id}',[TrainerController::class,'destroy']);


}) ;


////middleware user
Route::group(['prefix' => 'auth' ,'middleware' => 'checkAdminToken:api'],function (){

//products
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);


///classes
Route::get('allclass',[ClassesController::class,'index']); // getall
Route::get('yourClass/{id}',[ClassesController::class,'show']); //show
Route::get('gettrainer/{id}',[ClassesController::class,'getTrainer']); //getTrainer

// Route::get('test',[ClassesController::class,'test']); // for testing
Route::get('todayclass',[ClassesController::class,'TodayClass']);
Route::get('tomorrowClass',[ClassesController::class,'NextDayClass']);
//member
Route::post('/member',[MemberController::class,'store']);
//trainer

}) ;

Route::get('/trainers',[TrainerController::class,'index']);
Route::get('/trainer/{id}',[TrainerController::class,'show']);


