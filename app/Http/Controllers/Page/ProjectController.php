<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Task_Kategori;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(): View
    {
        $task = Task::join('task_kategoris', 'tasks.id_kategori', '=', 'task_kategoris.id_kategori')
            ->select('Tasks.*', 'task_kategoris.nama_kategori')->get();
        $data_user = User::select('id_user', 'nama')->get();
        $kategori = Task_Kategori::all();
        $todo = Todo::all();
        return view('page.project', [
            'tasks' => $task,
            'data_users' => $data_user,
            'task_kategoris' => $kategori,
            'todos' => $todo
        ]);
    }
}
