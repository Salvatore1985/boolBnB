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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')
->namespace('User')
->name('user.')
->prefix('user')
->group(function () {
    Route::resource('apartments', ApartmentsController::class);
    Route::get('sponsorships', 'SponsorshipsController@index');
    Route::get('sponsorships/payment', 'SponsorshipsController@payment');
});
Route::get('/payment/make', 'PaymentController@make')->name('payment.make');
Route::get('/payment/make', 'PaymentController@make')->name('payment.make');
Route::get('payments/{apartment}/{sponsorship}', 'PaymentsController@index')->name('payments.index');
Route::post('payments/{apartment}/{sponsorship}/transaction', 'PaymentsController@transaction')->name('payments.transaction');

/*
Route::get('/send-mail', function () {

    Mail::to('newuser@example.com')->send(new MailtrapExample());

    return 'A message has been sent to Mailtrap!';

});
*/

// Route::get('/contact', 'guest\ContactController@contact')->name('guest.contact');
// Route::post('/contact', 'guest\ContactController@contactMailSender')->name('guest.send');
// Route::get('/thanks', 'guest\ContactController@thanks')->name('guest.thanks');

