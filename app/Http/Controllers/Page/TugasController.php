<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index(): View
    {
        $data = DB::table('todos')
            ->join('tasks', 'tasks.id_todo', "=", 'todos.id_todo', 'left')
            ->join('task_kategoris', 'task_kategoris.id_kategori', '=', 'tasks.id_kategori', 'left')
            ->select(['todos.*', 'tasks.status', 'tasks.date', 'task_kategoris.nama_kategori', 'tasks.pemberi_tugas', 'tasks.date'])
            ->get();

        return view('page.task', ['todos' => $data]);
    }
}
