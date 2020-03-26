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

Route::get('/', 'FrontController@index');
Route::get('/basic_info/{id}', 'FrontController@basic_info');
Route::get('/history/{id}', 'FrontController@history');

// Route::post('/ajax/checkID', 'FrontController@stock_ID_check');


// Route::get('/basic_info', 'FrontController@historical_stock');
// Route::get('/stock', 'FrontController@stock');
// Route::get('/bband', 'PythonController@bband'); //布林通道
// //發財通道
// Route::get('/BBands', 'PythonController@BBands');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
