<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/home');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/articles_admin', [App\Http\Controllers\ArticleController::class, 'articleShowList'])->middleware('auth','is_admin')->name('articles_admin');
Route::get('/admin/articles_admin/create', [App\Http\Controllers\ArticleController::class, 'create'])->middleware('auth','is_admin')->name('articles_admin_create');
Route::post('/admin/articles_admin', [App\Http\Controllers\ArticleController::class, 'saveArticle'])->middleware('auth','is_admin')->name('articles_admin_store');
Route::get('/admin/articles_admin/{article}/edit', [App\Http\Controllers\ArticleController::class, 'edit'])->middleware('auth','is_admin')->name('articles_admin_edit');
Route::put('/admin/articles_admin/{article}', [App\Http\Controllers\ArticleController::class, 'saveArticle'])->middleware('auth','is_admin')->name('articles_admin_update');
Route::delete('/admin/articles_admin/{article}', [App\Http\Controllers\ArticleController::class, 'destroy'])->middleware('auth','is_admin')->name('articles_admin_destroy');
Route::get('user/notice',[App\Http\Controllers\ArticleController::class, 'userArticleShowList'])->name('user_notice');
Route::get('user/notice_list/{id}',[App\Http\Controllers\ArticleController::class, 'noticeList'])->name('notice_list');
Route::get('/profile-image/{filename}', function ($filename) {
    $path = storage_path('app/public/images/' . $filename);
    return response()->file($path);
})->name('profile_image');
Route::get('user/change_profile',[App\Http\Controllers\UserController::class, 'changeProfile'])->name('profile')->middleware('auth');
Route::patch('user/change_profile',[App\Http\Controllers\UserController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');
Route::get('user/change_password',[App\Http\Controllers\UserController::class, 'changePassword'])->name('changePassword')->middleware('auth');
Route::patch('user/change_password',[App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatePassword')->middleware('auth');
Route::get('user/curriculum_progress',[App\Http\Controllers\CurriculumProgressController::class, 'curriculumProgress'])->name('curriculumProgress')->middleware('auth');
