<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ParksController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware(['auth','isadmin']);
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest')->name('login');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');

Route::get('/console/parks/list', [ParksController::class, 'list'])->middleware(['auth', 'isadmin']);
Route::get('/console/parks/delete/{park:id}', [ParksController::class, 'deleteConfirm'])->where('park', '[0-9]+')->middleware(['auth', 'isadmin']);
Route::post('/console/parks/deleted/{park:id}', [ParksController::class, 'deleted'])->where('park', '[0-9]+')->middleware(['auth', 'isadmin']);
Route::get('/console/parks/add', [ParksController::class, 'addForm'])->middleware(['auth', 'isadmin']);
Route::post('/console/parks/add', [ParksController::class, 'add'])->middleware(['auth', 'isadmin']);
Route::get('/console/parks/edit/{park:id}', [ParksController::class, 'editForm'])->where('park', '[0-9]+')->middleware(['auth', 'isadmin']);
Route::post('/console/parks/edit/{park:id}', [ParksController::class, 'edit'])->where('park', '[0-9]+')->middleware(['auth', 'isadmin']);
