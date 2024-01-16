<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Task_Kategori;
use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    protected $task;
    protected $kategori;
    protected $todos;

    public function index(): View
    {
        $this->task = new Task();
        $this->kategori = new Task_Kategori();
        $this->todos = new Todo();
        $data = $this->task::limit(2)->orderBy('id_tugas', 'desc')->get();
        $kategori = $this->kategori::all();
        $todo =  $this->todos::all();
        return view('page.dashboard', ['tasks' => $data, 'kategori' => $kategori , 'todos' => $todo]);
    }
}
