<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'id_tugas';
    public $timestamps = false;
    protected $fillable = ['id_user', 'id_kategori', 'judul_tugas', 'pemberi_tugas', 'deskripsi', 'id_todo', 'status', 'progress', 'date'];
}
