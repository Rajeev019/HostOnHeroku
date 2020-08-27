<?php

use Illuminate\Support\Facades\Route;

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
// Clients Side//
Route::get('/', 'PublicController@Index');
Route::get('send', 'PublicController@mail');

//End Clients side//





//      Admin Section //
Route::get('adminlog', function () {
    return view('Admin.index');
});


// Introduction //
Route::get('adminlog/introduction','IntroductionController@index');
Route::post('adminlog/introduction','IntroductionController@store');
Route::post('adminlog/introduction/update/{id}','IntroductionController@update');
Route::get('adminlog/introduction/delete/{id}','IntroductionController@destroy');
// End Introduction //


// Services //
Route::get('adminlog/service','ServiceController@index');
Route::post('adminlog/service','ServiceController@store');
Route::post('adminlog/service/update/{id}','ServiceController@update');
Route::get('adminlog/service/delete/{id}','ServiceController@destroy');
// End Service //

// About //
Route::get('adminlog/about','AboutController@index');
Route::post('adminlog/about','AboutController@store');
Route::post('adminlog/about/update/{id}','AboutController@update');
Route::get('adminlog/about/delete/{id}','AboutController@destroy');
// End About //

// Testimonial //
Route::get('adminlog/testimonial','TestimonialController@index');
Route::post('adminlog/testimonial','TestimonialController@store');
Route::post('adminlog/testimonial/update/{id}','TestimonialController@update');
Route::get('adminlog/testimonial/delete/{id}','TestimonialController@destroy');
// End Testimonial //

// Testimonial //
Route::get('adminlog/photo','PhotoController@index');
Route::post('adminlog/photo','PhotoController@store');
Route::post('adminlog/photo/update/{id}','PhotoController@update');
Route::get('adminlog/photo/delete/{id}','PhotoController@destroy');
// End Testimonial //



//  End Admin Section //