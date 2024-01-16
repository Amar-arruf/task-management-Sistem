<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';
    protected $primaryKey = 'id_todo';
    public $timestamps = false;
    protected $fillable = ['deskripsi'];
}
