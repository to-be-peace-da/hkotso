<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
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

// Main Page
Route::get('/', [MainController::class, 'index'])
    ->name('main.index');

//! ADMIN

// Admin Authorisation Form
Route::get('/admin/sign-in', [AdminController::class, 'login'])
    ->middleware('guest')
    ->name('admin.login');

// Login Admin
Route::post('/admin/authenticate', [AdminController::class, 'authenticate'])
    ->name('admin.authenticate');

// Logout Admin
Route::post('/admin/logout', [AdminController::class, 'logout'])
    ->name('admin.logout');

// Show Admin Panel
Route::get('/admin-panel', [AdminController::class, 'index'])
    ->middleware('admin')
    ->name('admin.index');

//! NEWS

// Show All News
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

// Show Single News
Route::get('/news/{singleNews:slug}', [NewsController::class, 'show'])
    ->name('news.show');

// News Store
Route::post('/news', [NewsController::class, 'store'])
    ->middleware('admin')
    ->name('news.store');


// News Edit
Route::get('/news/{singleNews}/edit', [NewsController::class, 'edit'])
    ->middleware('admin')
    ->name('news.edit');

// News Update
Route::put('/news/{singleNews}', [NewsController::class, 'update'])
    ->middleware('admin')
    ->name('news.update');

// News Destroy
Route::delete('/news/{singleNews}', [NewsController::class, 'destroy'])
    ->middleware('admin')
    ->name('news.destroy');

//! ADVERTISEMENTS

// Show All Advertisements
Route::get('/advertisements', [AdvertisementController::class, 'index'])
    ->name('advertisement.index');

// Show Single Advertisement
Route::get('/advertisements/{advertisement:slug}', [AdvertisementController::class, 'show'])
    ->name('advertisement.show');

// Advertisement Destroy
Route::delete('/advertisements/{advertisement}', [AdvertisementController::class, 'destroy'])
    ->middleware('admin')
    ->name('advertisement.destroy');
