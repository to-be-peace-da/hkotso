<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubstitutionController;
use App\Http\Controllers\TeacherController;
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

// News Creation Page
Route::get('/admin-panel/news-create', [AdminController::class, 'newsCreate'])
    ->middleware('admin')
    ->name('admin.news-create');

// Advertisement Creation Page
Route::get('/admin-panel/advertisement-create', [AdminController::class, 'advertisementCreate'])
    ->middleware('admin')
    ->name('admin.advertisement-create');

// Schedule Creation Page
Route::get('/admin-panel/schedule-create', [AdminController::class, 'scheduleCreate'])
    ->middleware('admin')
    ->name('admin.schedule-create');

// Substitution Creation Page
Route::get('/admin-panel/substitution-create', [AdminController::class, 'substitutionCreate'])
    ->middleware('admin')
    ->name('admin.substitution-create');

// Group Creation Page
Route::get('/admin-panel/group-create', [AdminController::class, 'groupCreate'])
    ->middleware('admin')
    ->name('admin.group-create');

// Subject Creation Page
Route::get('/admin-panel/subject-create', [AdminController::class, 'subjectCreate'])
    ->middleware('admin')
    ->name('admin.subject-create');

// Teacher Creation Page
Route::get('/admin-panel/teacher-create', [AdminController::class, 'teacherCreate'])
    ->middleware('admin')
    ->name('admin.teacher-create');

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

// Advertisement Store
Route::post('/advertisements', [AdvertisementController::class, 'store'])
    ->middleware('admin')
    ->name('advertisements.store');

// Advertisement Edit
Route::get('/advertisements/{advertisement}/edit', [AdvertisementController::class, 'edit'])
    ->middleware('admin')
    ->name('advertisement.edit');

// News Update
Route::put('/advertisements/{advertisement}', [AdvertisementController::class, 'update'])
    ->middleware('admin')
    ->name('advertisement.update');

// Advertisement Destroy
Route::delete('/advertisements/{advertisement}', [AdvertisementController::class, 'destroy'])
    ->middleware('admin')
    ->name('advertisement.destroy');

//! SCHEDULE

// Show Schedule
Route::get('/schedules', [ScheduleController::class, 'index'])
    ->name('schedule.index');

// Show Schedule For Group
Route::get('/schedule', [ScheduleController::class, 'show'])
    ->name('schedule.show');

// Schedule Store
Route::post('/schedules', [ScheduleController::class, 'store'])
    ->middleware('admin')
    ->name('schedule.store');

// Schedule Edit
Route::get('/schedule/{schedule}/edit', [ScheduleController::class, 'edit'])
    ->middleware('admin')
    ->name('schedule.edit');

// Schedule Update
Route::put('/schedule/{schedule}', [ScheduleController::class, 'update'])
    ->middleware('admin')
    ->name('schedule.update');

// Schedule Destroy
Route::delete('/schedule/{schedule}', [ScheduleController::class, 'destroy'])
    ->middleware('admin')
    ->name('schedule.destroy');

//! SUBSTITUTIONS

// Substitution Store
Route::post('/substitutions', [SubstitutionController::class, 'store'])
    ->middleware('admin')
    ->name('substitution.store');

//! GROUPS

// Group Store
Route::post('/groups', [GroupController::class, 'store'])
    ->middleware('admin')
    ->name('group.store');

//! SUBJECTS

// Subject Store
Route::post('/subjects', [SubjectController::class, 'store'])
    ->middleware('admin')
    ->name('subject.store');

//! TEACHERS

// Teacher Store
Route::post('/teachers', [TeacherController::class, 'store'])
    ->middleware('admin')
    ->name('teacher.store');

// Show Single Teacher
Route::get('/teachers/{teacher:slug}', [TeacherController::class, 'show'])
    ->name('teacher.show');
