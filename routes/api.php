<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\FavController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DietController;
use Illuminate\Routing\Route as RoutingRoute;

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

Route::post('/register', [UserController::class ,'register']);
Route::post('/login', [UserController::class ,'login']);
Route::get('/menu', [MenuController::class,'index']);
Route::get('/food', [FoodController::class,'index']);
Route::get('/food/search/{name}', [FoodController::class,'search']);
//-------------------Rating-----------------------
Route::post('avgrate/{id}',[RateController::class,'avgrate']);
Route::get('/top_rate',[RateController::class,'show']);
//------------------F00d---------------------
Route::get('/show_food/{id}',[FoodController::class,'show']);
//------------------Menu---------------------
Route::get('/menu_show/{id}', [MenuController::class,'show']);
//------------------Reservation-------------------
Route::post('/reserve',[ReservationController::class,'create']);
Route::get('/showtable',[ReservationController::class,'show']);
Route::get('/showreserv/{id}',[ReservationController::class,'showreseerv']);
Route::post('/reservations/{id}', [ReservationController::class,'update']);
Route::get('/reservationsdelet/{id}', [ReservationController::class,'delete']);
 //------------------Order--------------------
Route::get('/showorder/{id}',[OrderController::class,'show']);
Route::post('/update_order/{id}', [OrderController::class,'update']);
Route::get('/delete_order/{id}', [OrderController::class,'delete']);
Route::get('/userorder/{id}',[OrderController::class,'showorder']);

//-------------------Location-----------------
Route::post('locations/{id}', [LocationController::class, 'store']);
Route::post('update_locations/{order_id}', [LocationController::class, 'update']);

//------------------Auth---------------------
Route::group(['middleware'=>['auth:sanctum']] , function () { 
    Route::get('logout', [UserController::class ,'logout']);
    Route::post('rate/{food_id}',[RateController::class,'create']);
    //-----------------Favourite-----------------
    Route::get('/show_fav', [FavController::class,'show']);
    Route::get('/delete/{id}', [FavController::class,'update']);
    Route::get('/fav/{id}', [FavController::class,'create']);
    Route::post('/customerinfo',[ReservationController::class,'profile']);

    //------------------Order--------------------
    Route::post('order',[OrderController::class,'create']);
    Route::post('addorder',[OrderController::class,'addorder']);
    Route::get('/pay/{id}',[OrderController::class,'pay']);
    Route::get('/updateprice/{id}',[OrderController::class,'updateprice']);
  
    });

    //----------------------diet---------------
    Route::get('/diet-systems',[DietController::class,'index']);
    Route::post('/diets', [DietController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
