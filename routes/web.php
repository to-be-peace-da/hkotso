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

// Show Admin Panel
Route::get('/admin/sign-in', [AdminController::class, 'index'])
    ->name('admin.index');

// Login Admin
Route::post('/admin/authenticate', [AdminController::class, 'authenticate'])
    ->name('admin.authenticate');

// Show All News
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

// Show Single News
Route::get('/news/{singleNews:slug}', [NewsController::class, 'show'])
    ->name('news.show');

// Show All Advertisements
Route::get('/advertisements', [AdvertisementController::class, 'index'])
    ->name('advertisement.index');

// Show Single Advertisement
Route::get('/advertisements/{advertisement:slug}', [AdvertisementController::class, 'show'])
    ->name('advertisement.show');
