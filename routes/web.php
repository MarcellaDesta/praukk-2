<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TodoController;

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

// Halaman Welcome
Route::get('/', function () {
    return view('welcome');
});

// Halaman Dashboard Utama Laravel
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group Middleware Auth (hanya user login yang bisa akses)
Route::middleware('auth')->group(function () {

    // Profile User (Laravel Breeze/Jetstream)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard Project User
    Route::get('/user-dashboard', [ProjectController::class, 'index'])->name('user-dashboard');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('user-create');
    Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
    // Route::get('/project/setting', [TodoController::class, 'setting'])->name('project.setting');
    Route::delete('user-destroy/{id}', [ProjectController::class, 'destroy'])->name('user-destroy');

    Route::get('/setting/{id}', [TodoController::class, 'setting'])->name('project.setting');
    Route::post('/todo/store', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/todos', [TodoController::class, 'index'])->name('todos');
    Route::delete('/todo/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
    Route::get('/todo/{id}/review', [TodoController::class, 'review'])->name('todo.review');
    Route::PATCH('/todo/update-status/{id}', [TodoController::class, 'updateStatus'])->name('todo-update-status');




});

require __DIR__.'/auth.php';
