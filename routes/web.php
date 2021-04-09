<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
//Route::get('/パス', [コントローラー名::class, 'アクション名']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [HomeController::class, 'top']);
