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

Route::get('/', function () {
    return view('welcome');
});

//管理_ログイン画面
Route::get('/home', [App\Http\Controllers\CurriculumController::class, 'index'])->name('home');



//ユーザー＿時間割　画面のルーティング
Route::get('/curriculum', [App\Http\Controllers\CurriculumController::class, 'curriculum'])->name('curriculum');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//学年詳細画面の表示ルーティング
Route::get('/curriculum/{id}', [App\Http\Controllers\CurriculumController::class, 'curriculum'])->name('grade');
// Route::post('/detail/{id}', [App\Http\Controllers\CurriculumController::class, 'curriculum'])->name('detail');

