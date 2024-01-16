<?php

use App\Http\Controllers\page\ProjectController;
use App\Http\Controllers\Page\ScheduleController;
use App\Http\Controllers\Page\TugasController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskKategoriController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('page.dashboard');
});

Route::get('/project', [ProjectController::class, 'index']);
Route::get('/task', [TugasController::class, 'index']);
Route::resource('schedules', ScheduleController::class);

// user
Route::post('/user-create', [UserController::class, 'tambah_user']);
Route::get('/user-getuser/{id}', [UserController::class, 'mendapatkan_data_user']);
Route::patch('/user-edit/{id}', [UserController::class, 'edit_user']);
Route::delete('/user-delete/{id}', [UserController::class, 'hapus_user']);

//task Kategory
Route::post('/task-kategori-create', [TaskKategoriController::class, 'tambah_data_kategori']);
Route::get('/task-kategoris', [TaskKategoriController::class, 'mendapatkan_data_kategori']);
Route::patch('/task-kategori-edit/{id}', [TaskKategoriController::class, 'edit_task_kategori']);
Route::delete('/task-kategori-delete/{id}', [TaskKategoriController::class, 'hapus_data_kategori']);

//Task
Route::post('/task-create', [TaskController::class, 'menambahkan_data_task']);
Route::get('/task/{id}', [TaskController::class, 'mengambil_data_task']);
Route::get('/form-task-edit/{id}', [TaskController::class, 'form_edit']);
Route::patch('/task-update-status', [TaskController::class, 'update_status']);
Route::patch('/task-edit/{id}', [TaskController::class, 'edit_data_task']);
Route::delete('/task-delete/{id} ', [TaskController::class, 'hapus_data_Task']);


//Todo
Route::resource('todos', TodoController::class);
