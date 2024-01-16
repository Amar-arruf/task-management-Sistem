<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = ['nama', 'email', 'password', 'img'];
}
