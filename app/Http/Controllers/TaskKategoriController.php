<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Task_Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskKategoriController extends Controller
{
    public function mendapatkan_data_kategori()
    {
        $data = Task_Kategori::all();
        $res = [];
        foreach ($data as $key => $value) {
            $res[] = $value;
        }
        return $res;
    }

    public function edit_data_kategori($id, Request $req): string
    {
        $data = Task_Kategori::where('id_kategori', intval($id))
            ->update([
                'nama_kategori' => $req->input('nama_kategori')
            ]);

        return 'data berhasil di ubah dengan id: ' . $id;
    }

    public function tambah_data_kategori(Request $req): string
    {
        $data = Task_Kategori::create([
            'nama_kategori' => $req->post('nama_kategori')
        ]);
        if ($data) {
            return "data berhasil ditambahkan";
        }
    }

    public function hapus_data_kategori($id): string
    {
        $data = Task_Kategori::destroy(intval($id));
        return 'data berhasil dihapus dengan id: ' . $id;
    }
}
