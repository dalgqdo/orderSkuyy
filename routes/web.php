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
    return view('user/dashboard');
});

Route::get('/loginAdmin','authController@index');
Route::post('/login/proccess','authController@login');

Route::get('/admin','AdminController@index');
Route::get('/admin/dataOrder', 'AdminController@dataOrder');
Route::get('/admin/addData', 'AdminController@addData');
Route::get('/admin/logout', 'AdminController@logout');


