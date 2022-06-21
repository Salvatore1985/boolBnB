<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;

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

/* Route::get('/', function () {
   return view('welcome');
}); */

Auth::routes();

Route::get('/', function(){
    return view('guests.home');
});

Route::get('/home', "User\ApartmentsController@dashboard")->name('user.home');

//function(){
//     return view('User.home');
// })->name('user.home');
Route::middleware('auth')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function () {
    Route::get('/home', "AdminController@index")->name('admin.home');
    Route::resource('services', ServicesController::class);
});
Route::middleware('auth')
->namespace('User')
->name('user.')
->prefix('user')
->group(function () {
    Route::resource('apartments', ApartmentsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('sponsorships', SponsorshipsController::class);
    Route::delete('/image/{id}', 'ImagesController@destroy')->name("image.destroy");
});

Route::get('/send-mail', function () {

    Mail::to('newuser@example.com')->send(new MailtrapExample());

    return 'A message has been sent to Mailtrap!';

});


Route::get('/contact', 'guest\ContactController@contact')->name('guest.contact');
Route::post('/contact', 'guest\ContactController@contactMailSender')->name('guest.send');
Route::get('/thanks', 'guest\ContactController@thanks')->name('guest.thanks');

Route::get('{any?}',function(){
    return view('404');
})->where('any','.*');

