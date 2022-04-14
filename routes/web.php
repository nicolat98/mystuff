<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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


Route::group(['middleware' => 'lang'], function() {
    Route::get('/', ['as' => 'home', 'uses' => 'App\Http\Controllers\FrontController@getHome']);

    Route::group(['middleware' => 'authCustom'], function() {
        
        Route::get('/payment/check', ['as' => 'payment.check', 'uses' =>'App\Http\Controllers\paymentController@checkPayment']);
        Route::get('/cart/{id}/purchase', ['as' => 'cart.purchase', 'uses' => 'App\Http\Controllers\cartController@showPurchase']);
        //Route::get('/order/{shipment}/update/{status}', ['as'=>'order.update', 'uses' => 'App\Http\Controllers\ordersController@updateOrder']);
        Route::get('/cart/order', ['as' => 'cart.order', 'uses' => 'App\Http\Controllers\cartController@order']);
        Route::get('/cart/removeLine', 'App\Http\Controllers\cartController@removeLine');
        Route::get('/order/updateOrder/', 'App\Http\Controllers\ordersController@updateOrder');

        Route::resource('cart', 'App\Http\Controllers\cartController');
        Route::get('/cartLine/{id}/destroy', ['as' => 'cartLine.destroy', 'uses' => 'App\Http\Controllers\cartLineController@destroy']);
        Route::resource('mail', 'App\Http\Controllers\mailController');
        


        Route::resource('orders', 'App\Http\Controllers\ordersController');

        Route::post('/mail/send', ['as' => 'mail.send', 'uses' => 'App\Http\Controllers\mailController@send']);
        Route::post('/feedback/add', ['as' => 'feedback.add', 'uses' => 'App\Http\Controllers\feedbackController@add']);
    });

    Route::resource('faq', 'App\Http\Controllers\faqController');
    Route::get('/lang/{lang}', ['as' => 'setLang', 'uses' => 'App\Http\Controllers\LangController@changeLanguage']);
    Route::get('/home', ['as' => 'home', 'uses' => 'App\Http\Controllers\FrontController@getHome']);
    Route::resource('smartphone', 'App\Http\Controllers\smartphoneController');
    Route::resource('computer', 'App\Http\Controllers\computerController');
    Route::resource('watch', 'App\Http\Controllers\watchController');



    Auth::routes();
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

