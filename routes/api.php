<?php



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







Route::middleware('api')->get('/user', function (Request $request) {

    return $request->user();



});

Route::get('/businesses/{type}',[App\Http\Controllers\Api\BookingController::class, 'businesses']);

Route::get('/business_details/{id}',[App\Http\Controllers\Api\BookingController::class, 'business_details']);

Route::get('/products/{id}',[App\Http\Controllers\Api\BookingController::class, 'products']);

Route::get('/reservations/{id}/{type}/{business_type?}',[App\Http\Controllers\Api\BookingController::class, 'reservations']);

Route::get('/customer_dashbord/{id}',[App\Http\Controllers\Api\DashboardController::class, 'customer_dashbord']);

Route::post('/update_info',[App\Http\Controllers\Api\DashboardController::class, 'update_info']);

Route::post('/userlog',[App\Http\Controllers\Api\LoginController::class, 'userlog']);

Route::post('/customerregister',[App\Http\Controllers\Api\LoginController::class, 'customerregister']);

Route::post('/save_reservation',[App\Http\Controllers\Api\BookingController::class, 'save_reservation']);

Route::post('/savecontact',[App\Http\Controllers\Api\ContactController::class, 'savecontact']);


Route::get('/home',[App\Http\Controllers\Api\HomeController::class, 'home']);

Route::get('/types',[App\Http\Controllers\Api\HomeController::class, 'types']);









//Maxhype

