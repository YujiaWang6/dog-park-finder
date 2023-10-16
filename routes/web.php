<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ParksController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\FrontController;

use App\Http\Middleware\AdminMiddleware;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*-- HOME --*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/contact', function(){
    return view('contact');
});
/*-- PARK DETAIL --*/
Route::get('/parksresult', [FrontController::class, 'parks']);

Route::get('/parks/{park:id}', [FrontController::class, 'parkDetail'])->where('park', '[0-9]+');

/*-- USER - ADD REPORT & REVIEW --*/
Route::get('/parks/{park:id}/review/add', [FrontController::class, 'addReviewForm'])->where('park', '[0-9]+')->middleware('auth');
Route::post('/parks/{park:id}/review/add', [FrontController::class, 'addReview'])->where('park', '[0-9]+')->middleware('auth');
Route::get('/parks/{park:id}/report/add', [FrontController::class, 'addReportForm'])->where('park', '[0-9]+')->middleware('auth');
Route::post('/parks/{park:id}/report/add', [FrontController::class, 'addReport'])->where('park', '[0-9]+')->middleware('auth');

/*-- CMS --*/
Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware(['auth','isadmin']);
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest')->name('login');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');

/*-- PARKS --*/
Route::get('/console/parks/list', [ParksController::class, 'list'])->middleware(['auth', 'isadmin']);
Route::get('/console/parks/delete/{park:id}', [ParksController::class, 'deleteConfirm'])->where('park', '[0-9]+')->middleware(['auth', 'isadmin']);
Route::post('/console/parks/deleted/{park:id}', [ParksController::class, 'deleted'])->where('park', '[0-9]+')->middleware(['auth', 'isadmin']);
Route::get('/console/parks/add', [ParksController::class, 'addForm'])->middleware(['auth', 'isadmin']);
Route::post('/console/parks/add', [ParksController::class, 'add'])->middleware(['auth', 'isadmin']);
Route::get('/console/parks/edit/{park:id}', [ParksController::class, 'editForm'])->where('park', '[0-9]+')->middleware(['auth', 'isadmin']);
Route::post('/console/parks/edit/{park:id}', [ParksController::class, 'edit'])->where('park', '[0-9]+')->middleware(['auth', 'isadmin']);

/*-- USERS --*/
Route::get('/console/users/list', [UsersController::class, 'list'])->middleware(['auth', 'isadmin']);
Route::get('/console/users/delete/{user:id}', [UsersController::class, 'deleteConfirm'])->where('user', '[0-9]+')->middleware(['auth', 'isadmin']);
Route::post('/console/users/deleted/{user:id}', [UsersController::class, 'deleted'])->where('user', '[0-9]+')->middleware(['auth', 'isadmin']);
/*-- User registration --*/
Route::get('/console/users/add', [UsersController::class, 'addFrom']);
Route::post('/console/users/add', [UsersController::class, 'add']);
Route::get('/console/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/console/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/console/users/profile/{user:id}', [UsersController::class, 'profile'])->where('user', '[0-9]+');

/*-- REVIEWS --*/
Route::get('/console/reviews/list', [ReviewsController::class, 'list'])->middleware(['auth', 'isadmin']);
Route::get('/console/reviews/delete/{review:id}', [ReviewsController::class, 'deleteConfirm'])->where('review', '[0-9]+')->middleware(['auth', 'isadmin']);
Route::post('/console/reviews/deleted/{review:id}', [ReviewsController::class, 'deleted'])->where('review', '[0-9]+')->middleware(['auth', 'isadmin']);
/*-- Add review ADMIN--*/
Route::get('/console/reviews/add', [ReviewsController::class, 'addForm'])->middleware(['auth', 'isadmin']);
Route::post('/console/reviews/add', [ReviewsController::class, 'add'])->middleware(['auth', 'isadmin']);
Route::get('/console/reviews/edit/{review:id}', [ReviewsController::class, 'editForm'])->where('review', '[0-9]+')->middleware(['auth','isadmin']);
Route::post('/console/reviews/edit/{review:id}', [ReviewsController::class, 'edit'])->where('review', '[0-9]+')->middleware(['auth','isadmin']);

/*-- REPORTS --*/
Route::get('/console/reports/list', [ReportsController::class, 'list'])->middleware(['auth', 'isadmin']);
Route::get('/console/reports/delete/{report:id}', [ReportsController::class, 'deleteConfirm'])->where('report', '[0-9]+')->middleware(['auth', 'isadmin']);
Route::post('/console/reports/deleted/{report:id}', [ReportsController::class, 'deleted'])->where('report', '[0-9]+')->middleware(['auth', 'isadmin']);
/*-- Add report ADMIN--*/
Route::get('/console/reports/add', [ReportsController::class, 'addForm'])->middleware(['auth', 'isadmin']);
Route::post('/console/reports/add', [ReportsController::class, 'add'])->middleware(['auth', 'isadmin']);
Route::get('/console/reports/edit/{report:id}', [ReportsController::class, 'editForm'])->where('report', '[0-9]+')->middleware(['auth', 'isadmin']);
Route::post('/console/reports/edit/{report:id}', [ReportsController::class, 'edit'])->where('report', '[0-9]+')->middleware(['auth', 'isadmin']);