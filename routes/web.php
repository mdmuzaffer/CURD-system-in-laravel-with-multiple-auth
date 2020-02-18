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

Route::get('/', function () {
    return view('front.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//front view 
Route::get('/front', 'FrontController@front');
Route::Match(['get', 'post'],'/user/login', 'FrontController@userLogin');
Route::Match(['get', 'post'],'/user/logout', 'FrontController@userLogout');

Route::group(['middleware' => 'FrontAdmin'], function(){
    Route::Match(['get', 'post'],'/user/dashboard', 'FrontController@userDashboard');
    Route::Match(['get', 'post'],'/user/sign-up', 'FrontController@userSignUp');
    Route::Match(['get', 'post'],'/user/delete/{id}', 'FrontController@userDelete');
    Route::Match(['get', 'post'],'/user/update/{id}', 'FrontController@userUpdate');
});

//admin user 
Route::Match(['get', 'post'],'/admin/login', 'AdminController@adminUser');
Route::group(['middleware' => 'BackendAdmin'], function(){
    Route::Match(['get', 'post'],'/admin/dashboard', 'AdminController@adminDashboard');
});
