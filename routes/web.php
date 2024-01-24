<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\page\ProjectController;
use App\Http\Controllers\Page\ScheduleController;
use App\Http\Controllers\Page\TugasController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskKategoriController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [loginController::class, 'index'])->name("login");
Route::post('/authenticate', [loginController::class, 'authenticate'])->name('auth');
Route::get('/logout', [loginController::class,'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('authCheck');
Route::get('/project', [ProjectController::class, 'index'])->middleware('authCheck');
Route::get('/task', [TugasController::class, 'index'])->middleware('authCheck');
Route::resource('schedules', ScheduleController::class)->middleware('authCheck');

// user
Route::post('/user-create', [UserController::class, 'tambah_user'])->middleware('authCheck');
Route::get('/user-getuser/{id}', [UserController::class, 'mendapatkan_data_user'])->middleware('authCheck');
Route::patch('/user-edit/{id}', [UserController::class, 'edit_user'])->middleware('authCheck');
Route::delete('/user-delete/{id}', [UserController::class, 'hapus_user'])->middleware('authCheck');

//task Kategory
Route::post('/task-kategori-create', [TaskKategoriController::class, 'tambah_data_kategori'])->middleware('authCheck');
Route::get('/task-kategoris', [TaskKategoriController::class, 'mendapatkan_data_kategori'])->middleware('authCheck');
Route::patch('/task-kategori-edit/{id}', [TaskKategoriController::class, 'edit_task_kategori'])->middleware('authCheck');
Route::delete('/task-kategori-delete/{id}', [TaskKategoriController::class, 'hapus_data_kategori'])->middleware('authCheck');

//Task
Route::post('/task-create', [TaskController::class, 'menambahkan_data_task'])->middleware('authCheck');
Route::get('/task/{id}', [TaskController::class, 'mengambil_data_task'])->middleware('authCheck');
Route::get('/form-task-edit/{id}', [TaskController::class, 'form_edit'])->middleware('authCheck');
Route::patch('/task-update-status', [TaskController::class, 'update_status'])->middleware('authCheck');
Route::patch('/task-edit/{id}', [TaskController::class, 'edit_data_task'])->middleware('authCheck');
Route::delete('/task-delete/{id} ', [TaskController::class, 'hapus_data_Task'])->middleware('authCheck');


//Todo
Route::resource('todos', TodoController::class)->middleware('authCheck');
Route::patch('update-todo/{id}', [TodoController::class,'update_completed'])->middleware('authCheck');
