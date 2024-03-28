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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/curriculums.list/{id}', [App\Http\Controllers\CurriculumController::class, 'curriculumsList'])->name('curriculums_list');

Route::get('/curriculums.setting/{id}', [App\Http\Controllers\CurriculumController::class, 'curriculumsSetting'])->name('curriculums_setting');
Route::put('/curriculums.edit/{id}', [App\Http\Controllers\CurriculumController::class, 'curriculumsEdit'])->name('curriculums_edit');


Route::get('/delivery.times/{id}', [App\Http\Controllers\DeliveryTimeController::class, 'deliveryTimes'])->name('delivery_times');
Route::put('/times.set/{id}', [App\Http\Controllers\DeliveryTimeController::class, 'timesSet'])->name('times_set');
