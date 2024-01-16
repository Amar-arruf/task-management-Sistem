<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Task_Seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'id_user' => 2,
                'id_kategori' => 3,
                'judul_tugas' => 'membuat aplikasi ios',
                "pemberi_tugas" => "Google",
                'deskripsi' => 'membuat aplikasi ios untuk client',
                'id_todo' => 5,
                'status' => 'not started',
                'progress' => 0,
                'date' => date('Y-m-d')
            ],
            [
                'id_user' => 2,
                'id_kategori' => 4,
                'judul_tugas' => 'Task Management Sistem',
                'pemberi_tugas' => "Facebook",
                'deskripsi' => 'bikin aplikasi Task Management Sistem',
                'id_todo' => 2,
                'status' => 'progress',
                'progress' => 29,
                'date' => date('Y-m-d')
            ],
            [
                'id_user' => 2,
                'id_kategori' => 5,
                'judul_tugas' => 'Food App',
                'pemberi_tugas' => 'Amar Ma\'ruf',
                'deskripsi' => 'membuat pemesanan makanan android',
                'id_todo' => 6,
                'status' => 'progress',
                'progress' => 50,
                'date' => date('Y-m-d')
            ],
        ]);
    }
}
