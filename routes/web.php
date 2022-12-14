<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

Route::resource('reg', RegisterController::class); //註冊相關功能都放這路徑下
Route::get('/search', 'App\Http\Controllers\RegisterController@search')->name('search');

Route::get('/feedback', function () {
  return view('feedback');
})->name('feedbackForm'); //使用者輸入的表單內容