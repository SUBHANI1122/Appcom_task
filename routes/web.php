<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/categories', [CategoryController::class, 'store']);
Route::delete('tasks/bulk-delete', [TaskController::class, 'destroy'])->name('tasks.bulkDelete');
Route::get('tasks/filter', [TaskController::class, 'filter'])->name('tasks.filter');
Route::get('tasks/export', [TaskController::class, 'export'])->name('tasks.export');
Route::resource('tasks', TaskController::class);



