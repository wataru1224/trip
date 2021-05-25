<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelController;

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

Route::get('/', [TravelController::class, 'home']);

Route::get('/travel/{id}', [TravelController::class, 'show'])
    ->where('id', '[0-9]+');
    
Route::get('/travel/self/', [TravelController::class,'self'])
    ->middleware('auth');

Route::get('/travel/new/', [TravelController::class, 'new'])
    ->middleware('auth');

Route::get('/travel/edit/{id}', [TravelController::class, 'edit']);

//new.blade.phpのformからの情報を受け取る
///travel/createに Post リクエストが来たら
//HomeController の create アクションが作動
Route::post('/travel/create', [TravelController::class, 'create']);

Route::get('/travel/pass', [TravelController::class,'pass'])
    ->name('travel.pass');

Route::get('/travel/register', [TravelController::class,'register']);

//ログイン後ページ設定
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('travel/new', [TravelController::class, 'store']);
