<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_Kategori extends Model
{
    protected $table = 'task_kategoris';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;
    protected $fillable = ['nama_kategori'];
}
