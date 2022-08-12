<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\api\ClassesController;
use App\Http\Controllers\api\MemeberShipController;
use App\Http\Controllers\api\verification;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingleWorkoutController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\SingleWorkourUsersController;
use App\Http\Controllers\FoodController;
// use App\Http\Controllers\MemberController;
use App\Http\Controllers\CommentController;


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

//   -------------------------------------------------------------------- //




// Relationships
//middleware Admin
Route::group(['prefix' => 'admin' ],function (){
    Route::post('messages', [MessagesController::class, 'sendMessage']);
    Route::post('messageDirect', [MessagesController::class, 'sendDirectMessage']); 
    Route::post('messageDirect', [MessagesController::class, 'sendDirectMessage']);
//users
Route::get('/users/status/{user_id}/{status_code}',[AuthController::class,'updateStatus'])->name('users.status.update');
Route::get('/users',[AuthController::class,'index']);
//classes
Route::post('addclass',[ClassesController::class,'store']); // create
Route::put('newClass/{id}',[ClassesController::class,'update']); //update
Route::delete('delClass/{id}',[ClassesController::class,'destory']); //destory
// memberships
Route::post('addmembership',[MemeberShipController::class,'store']); // create
Route::put('newmembership/{id}',[MemeberShipController::class,'update']); //update
Route::delete('delmembership/{id}',[MemeberShipController::class,'destory']); //destory
//trainer
Route::post('/trainers',[TrainerController::class,'store']);
Route::put('/trainer/{id}',[TrainerController::class,'update']);
Route::delete('/trainers/{id}',[TrainerController::class,'destroy']);
//product

});
Route::group(['prefix' => 'auth'],function (){ 
    //   -------------------------------------------------------------------- // 
    //products
    Route::get('/products',[ProductController::class,'index']);
    Route::get('/products/{id}',[ProductController::class,'show']);
    Route::post('/products',[ProductController::class,'store']);
    Route::put('/products/{id}',[ProductController::class,'updateproduct']);
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
    ///classes
    Route::get('allclass',[ClassesController::class,'index']); // getall
    Route::get('yourClass/{id}',[ClassesController::class,'show']); //show
    Route::get('gettrainer/{id}',[ClassesController::class,'getTrainer']); //getTrainer
    Route::get('todayclass',[ClassesController::class,'TodayClass']);
    Route::get('tomorrowClass',[ClassesController::class,'NextDayClass']);
    /// membership
    Route::get('allmembership',[MemeberShipController::class,'index']); // getall
    Route::get('yourmembership/{id}',[MemeberShipController::class,'show']); //show
    // RelatedProducts
    Route::get('reProducts/{id}',[ProductController::class,'RelatedProducts']);
    // VerificationEmail
    Route::post('emailVerification',[verification::class,'verifyEmail']);
    Route::get('verify-email/{id}/{hash}',[verification::class,'verify'])->name('verification.verify');
    // Route::get('test',[ClassesController::class,'test']); // for testing
    //member
    Route::post('/addmember',[MemberController::class,'store']);
    //trainer
    Route::get('/trainers',[TrainerController::class,'index']);
    Route::get('/trainer/{id}',[TrainerController::class,'show']);
    // counting
    Route::get('countClass',[ClassesController::class,'classesCount']); // get class Count
    Route::get('CountTrainer',[ClassesController::class,'counttrainer']); // get class Count
    Route::get('Countusers',[ClassesController::class,'countusers']); // get class Count
    Route::get('CountMember',[ClassesController::class,'countmember']); // get class Count
    /// get records with relationship
    Route::get('getclassMember',[ClassesController::class,'getclassMember']);
//products
// get products by category id
Route::get('/products/category/{id}',[ProductController::class,'productByCategory']);
// all categories
Route::get('/category',[ProductController::class,'allCtegory']);
Route::get('/exercies',[ExerciseController::class,'gitAllExercies']);
// get exercises by category id
// Route::get('/exercies/{id}',[ExerciseController::class,'listexercies']);
Route::get('/exercies/details/{id}',[ExerciseController::class,'exerciesdatails']);
// save/get singleworkout category in wishlist
Route::get('/mycategory',[SingleWorkourUsersController::class,'showcategory']);
Route::post('/mycategory',[SingleWorkourUsersController::class,'addMySingleworkout']);
// food table
Route::get('food',[FoodController::class,'index']);//all foods
Route::post('food',[FoodController::class,'storeFood']);//create new food
Route::get('food/{id}',[FoodController::class,'getFoodById']);// get food by id
Route::put('food/{id}',[FoodController::class,'updateFood']);//add new food
Route::delete('food/{id}',[FoodController::class,'deleteFood']);//update food by id
// RelatedProducts
Route::get('reProducts/{id}',[ProductController::class,'RelatedProducts']);
// VerificationEmail
Route::post('emailVerification',[verification::class,'verifyEmail']);
Route::get('verify-email/{id}/{hash}',[verification::class,'verify'])->name('verification.verify');
// Route::get('test',[ClassesController::class,'test']); // for testing
Route::get('todayclass',[ClassesController::class,'TodayClass']);
Route::get('tomorrowClass',[ClassesController::class,'NextDayClass']);
//member
Route::post('/member',[MemberController::class,'store']);
});
//comment
Route::get('/comment',[CommentController::class,'index']);
Route::get('/comment/{id}',[CommentController::class,'show']);
Route::post('/comments',[CommentController::class,'store']);
Route::delete('/comments/{id}',[CommentController::class,'destory']);
