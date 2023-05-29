<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ContentPlaceController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ContentRestaurantController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ContentFoodController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ContentHotelController;
use App\Http\Controllers\FunController;
use App\Http\Controllers\HomeStayController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

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
//User
Route::get('users/{id?}',[UserController::class, 'index'] );

//Places
Route::get('place/{id?}',[PlaceController::class, 'index'] );
Route::post('place',[PlaceController::class, 'create'] );
Route::put('place/{id}',[PlaceController::class, 'update'] );
Route::delete('place/{id}',[PlaceController::class, 'delete'] );

//ContentPlace
Route::get('contentplace/{id?}',[ContentPlaceController::class, 'index'] );
Route::post('contentplace',[ContentPlaceController::class, 'create'] );
Route::put('contentplace/{id}',[ContentPlaceController::class, 'update'] );
Route::delete('contentplace/{id}',[ContentPlaceController::class, 'delete'] );

//Restaurant

Route::get('restaurant/{id?}',[RestaurantController::class, 'index'] );
Route::post('restaurant',[RestaurantController::class, 'create'] );
Route::put('restaurant/{id}',[RestaurantController::class, 'update'] );
Route::delete('restaurant/{id}',[RestaurantController::class, 'delete'] );

//ContentRestaurant
Route::get('postrestaurant/{id?}',[ContentRestaurantController::class, 'index'] );
Route::post('postrestaurant',[ContentRestaurantController::class, 'create'] );
Route::put('postrestaurant/{id}',[ContentRestaurantController::class, 'update'] );
Route::delete('postrestaurant/{id}',[ContentRestaurantController::class, 'delete'] );

//Food

Route::get('food/{id?}',[FoodController::class, 'index'] );
Route::post('food',[FoodController::class, 'create'] );
Route::put('food/{id}',[FoodController::class, 'update'] );
Route::delete('food/{id}',[FoodController::class, 'delete'] );

//ContentFood
Route::get('contentfood/{id?}',[ContentFoodController::class, 'index'] );
Route::post('contentfood',[ContentFoodController::class, 'create'] );
Route::put('contentfood/{id}',[ContentFoodController::class, 'update'] );
Route::delete('contentfood/{id}',[ContentFoodController::class, 'delete'] );

//Shopping

Route::get('shopping/{id?}',[ShoppingController::class, 'index'] );
Route::post('shopping',[ShoppingController::class, 'create'] );
Route::put('shopping/{id}',[ShoppingController::class, 'update'] );
Route::delete('shopping/{id}',[ShoppingController::class, 'delete'] );


//Hotel

Route::get('hotel/{id?}',[HotelController::class, 'index'] );
Route::post('hotel',[HotelController::class, 'create'] );
Route::put('hotel/{id}',[HotelController::class, 'update'] );
Route::delete('hotel/{id}',[HotelController::class, 'delete'] );

//Hotel

Route::get('fun/{id?}',[FunController::class, 'index'] );
Route::post('fun',[FunController::class, 'create'] );
Route::put('fun/{id}',[FunController::class, 'update'] );
Route::delete('fun/{id}',[FunController::class, 'delete'] );

//HomeStay
Route::get('homestay/{id?}',[HomeStayController::class, 'index'] );
Route::post('homestay',[HomeStayController::class, 'create'] );
Route::put('homestay/{id}',[HomeStayController::class, 'update'] );
Route::delete('homestay/{id}',[HomeStayController::class, 'delete'] );



// BookingTour

Route::get('bookingtour/{id?}',[LocationController::class, 'index'] );

//Tour
Route::get('/booking-hotel/{id?}',[TourController::class, 'cartHotel'] );
Route::post('/save-tour', [TourController::class, 'saveTour'])->name('saveTour');
Route::get('/cart/{id?}', [TourController::class, 'index']);
Route::delete('/delete-booking-hotel/{id}', [TourController::class, 'deleteBookingHotel']);


Route::get('/location', [TourController::class, 'flightLocation']);

Route::get('/booking-flight/{id?}',[TourController::class, 'cartFlight'] );
Route::get('/flight', [TourController::class, 'flight']);
Route::post('/save-flight', [TourController::class, 'save_flight']);
Route::delete('/delete-booking-flight/{id}', [TourController::class, 'deleteBookingFlight']);

Route::get('/booking-car/{id?}',[TourController::class, 'cartCar'] );
Route::get('/list-car', [TourController::class, 'listCar']);
Route::post('/save-car', [TourController::class, 'save_car']);
Route::delete('/delete-rentcar/{id}', [TourController::class, 'deleteRentCar']);