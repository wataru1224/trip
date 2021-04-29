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

Route::get('hello', [HomeController::class, 'home']);

Route::get('/hello/{id}', [HomeController::class, 'show'])->where('id', '[0-9]+');

Route::get('/hello/new/', [HomeController::class, 'new']);

//new.blade.phpのformからの情報を受け取る
///hello/createに Post リクエストが来たら
//HomeController の create アクションが作動
Route::post('/hello/create', [HomeController::class, 'create']);

Route::get('/hello/edit/{id}', [HomeController::class, 'edit'])->where('id', '[0-9]+');

Route::get('/hello/pass', function () {
    return view('home.pass');
});

//ログイン後ページ設定
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/hello/pass', [HomeController::class,'pass']);

Route::get('/hello/self', [HomeController::class,'self']);
