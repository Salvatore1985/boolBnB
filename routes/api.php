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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('api')->group(function(){
/*      Route::get('/posts','PostController@index');
    Route::get('/posts/{post}','PostController@show');
    Route::delete('/posts/{post}','PostController@destroy'); /

    / **OPPURE**/
    Route::get('/apartments/search', 'ApartmentController@search');
    Route::get('/services','ServicesController@index');
    Route::get('/messages','MessaggesController@store');
    Route::get('payments/token', 'PaymentController@token');
    Route::get('/user','UsersController@index');
    Route::resource('apartments','ApartmentController');
});
