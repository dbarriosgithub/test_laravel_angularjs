<?php

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
Auth::routes();

Route::get('/', function () {
    return View('auth.login');
});


Route::prefix('api')->group(function () {
  Route::get('person/index','PersonController@index');
  Route::post('person/store','PersonController@store');
  Route::delete('person/destroy/{id}','PersonController@destroy');
  Route::get('person/show/{person}','PersonController@show');
  Route::put('person/update/{person}','PersonController@update');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/person/mail','PersonController@mailer');

// CATCH ALL ROUTE =============================  
// all routes that are not home or api will be redirected to the frontend 
// this allows angular to route them 
// 
/*Route::any('{all}', function(){
    return View('auth.login');
})->where('all', '.*');*/








