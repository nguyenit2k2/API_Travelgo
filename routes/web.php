<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
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
/*
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('table');
});
Route::get('/table', [AdminController::class, 'table'] );
Route::get('/place', [AdminController::class, 'placeindex']);
Route::get('/shop', [AdminController::class, 'shopindex']);
Route::get('/fun', [AdminController::class, 'funindex']);
Route::get('/hotel', [AdminController::class, 'hotelindex']);
Route::get('/res', [AdminController::class, 'resindex']);
Route::get('/food', [AdminController::class, 'foodindex']);
Route::get('/home', [AdminController::class, 'homestayindex']);
Route::get('/showusers/{id?}',[AdminController::class,'userindex']);
Route::get('/cart/{id}',[AdminController::class,'cartindex']);

Route::get('/addplace',function(){
    return view('addplace');
});
Route::get('/addshop', function(){
    return view('addshop');
});
Route::get('/addfun', function(){
    return view('addfun');
});
Route::get('/addhotel', function(){
    return view('addhotel');
});
Route::get('/addres', function(){
    return view('addres');
});
Route::get('/addfood',function(){
    return view('addfood');
});
Route::get('/addhomestay', function(){
    return view('addhome');
});


Route::get('/delete-place/{id}', [AdminController::class, 'deleteplace']);
Route::get('/delete-food/{id}', [AdminController::class, 'deletefood']);
Route::get('/delete-fun/{id}', [AdminController::class, 'deletefun']);
Route::get('/delete-shop/{id}', [AdminController::class, 'deleteshop']);
Route::get('/delete-hotel/{id}', [AdminController::class, 'deletehotel']);
Route::get('/delete-res/{id}', [AdminController::class, 'deleteres']);
Route::get('/delete-home/{id}', [AdminController::class, 'deletehome']);
//insert
Route::post('/insert-place', [AdminController::class, 'insertplace']);
Route::get('/insert-food', [AdminController::class, 'insertfood']);
Route::post('/insert-hotel', [AdminController::class, 'inserthotel']);
Route::post('/insert-res', [AdminController::class, 'insertres']);
Route::post('/insert-fun', [AdminController::class, 'insertfun']);
Route::post('/insert-shop', [AdminController::class, 'insertshop']);
Route::post('/insert-home', [AdminController::class, 'inserthome']);

//User



