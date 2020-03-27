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

// 公司基本資料
Route::get('/basic_info/{id}', 'FrontController@basic_info');

// 法說會
Route::get('/concall/{id}', 'FrontController@concall');

// 歷史資料
Route::get('/history/{id}', 'FrontController@history');

// 交易回測
Route::get('/backtrade_input/{id}', 'FrontController@backtrade_input');
Route::post('/backtrade/{id}', 'FrontController@backtrade');



// Route::post('/ajax/checkID', 'FrontController@stock_ID_check');


// Route::get('/basic_info', 'FrontController@historical_stock');
// Route::get('/stock', 'FrontController@stock');
// Route::get('/bband', 'PythonController@bband'); //布林通道
// //發財通道
// Route::get('/BBands', 'PythonController@BBands');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
