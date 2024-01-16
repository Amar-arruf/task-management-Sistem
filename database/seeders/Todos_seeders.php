<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Todos_seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('todos')->insert([
            ["deskripsi" => "testing web"],
            ["deskripsi" => "testing backend"],
            ["deskripsi" => "development frontend"],
            ["deskripsi" => "develop aplikasi ios"],
            ["deskripsi" => "develop aplikasi android"]
        ]);
    }
}
