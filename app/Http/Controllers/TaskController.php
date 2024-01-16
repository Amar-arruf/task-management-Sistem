<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Task_Kategori;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TaskController extends Controller
{
  public function mengambil_data_task($id): array
  {
    $data = Task::where('id_user', intval($id))->get();
    $res = [];
    foreach ($data as $key => $value) {
      $res[] = $value;
    }

    return $res;
  }

  public function update_status(Request $req)
  {
    $id = $req->input('idTugas');
    try {
      Task::where('id_tugas', intval($id))
        ->update([
          'status' => $req->input('status'),
        ]);
      return response()->json(['Status sudah mengalami perubahan']);
    } catch (\Exception $e) {
      return response()->json(['error' => $e->getMessage()], 500);
    }
  }

  public function menambahkan_data_task(Request $req)
  {
    // id_users hanya sementara selebihnya harus authentication
    $data = Task::create([
      'id_user' => intval($req->input('id_user')),
      'id_kategori' => intval($req->input('id_kategori')),
      'judul_tugas' => $req->input('judul_tugas'),
      'pemberi_tugas' => $req->input('pemberi_tugas'),
      'deskripsi' => $req->input('deskripsi'),
      'id_todo' => $req->input('id_todo'),
      'status' => $req->input('status'),
      'progress' => 0,
      'date' => $req->input('date')
    ]);
    return redirect('/project');
  }

  public function form_edit($id)
  {
    $data = Task::find($id);
    $data_user = User::select('id_user', 'nama')->get();
    $kategori = Task_Kategori::all();
    $todo = Todo::all();

    return view('form_edit_task', [
      'data' => $data,
      'data_users' => $data_user,
      'task_kategoris' => $kategori,
      'todos' => $todo
    ]);
  }

  public function edit_data_task($id, Request $req)
  {
    $data = Task::where('id_tugas', $id)
      ->update([
        'id_kategori' => $req->input('id_kategori'),
        'judul_tugas' => $req->input('judul_tugas'),
        'pemberi_tugas' => $req->input('pemberi_tugas'),
        'deskripsi' => $req->input('deskripsi'),
        'id_todo' => $req->input('id_todo'),
      ]);

    return redirect('/project');
  }

  public function hapus_data_Task($id)
  {
    $data = Task::find($id);
    $res = $data->delete();
    if ($res) {
      return 'data task berhasil di hapus';
    }
  }
}
