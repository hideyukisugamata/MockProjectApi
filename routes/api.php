<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\FavoritesV2Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\ReservationsV2Controller;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ManagerController;

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

Route::post('/v1/register',[RegisterController::class,'post']);
Route::post('/v1/login',[LoginController::class,'post']);
Route::post('/v1/logout',[LogoutController::class,'post']);
Route::get('/v1/users/{users_id}',[UsersController::class,'get']);
Route::get('/v1/restaurants',[RestaurantsController::class,'getRestaurants']);
Route::get('/v1/restaurants/{restaurants_id}',[RestaurantsController::class,'getrestaurant']);
Route::get('v1/users/{users_id}/favorites',[FavoritesV2Controller::class,'get']);
Route::put('v1/users/{users_id}/favorites', [FavoritesV2Controller::class, 'put']);
Route::delete('v1/users/{users_id}/favorites', [FavoritesV2Controller::class, 'delete']);
Route::get('/v1/users/{users_id}/reservations',[ReservationsV2Controller::class,'get']);
Route::post('/v1/users/{users_id}/reservations',[ReservationsV2Controller::class, 'post']);
Route::delete('/v1/users/{users_id}/reservations',[ReservationsV2Controller::class, 'delete']);
Route::put('v1/users/{users_id}/reservations',[ReservationsV2Controller::class,'put']);
Route::get('v1/users/{users_id}/reviews',[ReviewsController::class,'getReviews']);
Route::get('v1/users/{users_id}/review', [ReviewsController::class, 'getReview']);
Route::post('v1/users/{users_id}/review',[ReviewsController::class,'postReview']);
Route::put('v1/users/{users_id}/review',[ReviewsController::class,'putReview']);
Route::delete('v1/users/{users_id}/review',[ReviewsController::class,'deleteReview']);
Route::get('v1/users/{users_id}/softdeletereview',[ReviewsController::class,'getSoftDeletedReview']);
Route::post('v1/managers',[ManagerController::class,'postManager']);
Route::get('v1/managers', [ManagerController::class, 'getManager']);
Route::put('v1/managers', [ManagerController::class, 'putManager']);
// Route::apiResource('/v1/users/{users_id}/favorites',FavoritesController::class);
// Route::apiResource('v1/users/{users_id}/reservations',ReservationsController::class);
