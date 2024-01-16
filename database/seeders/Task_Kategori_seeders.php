<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Task_Kategori_seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('task_kategoris')->insert([
            ["nama_kategori" => "web"],
            ["nama_kategori" => "mobile"],
        ]);
    }
}
