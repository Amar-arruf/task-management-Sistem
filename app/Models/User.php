<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTraits;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use AuthenticableTraits;

    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = ['nama', 'email', 'password', 'img'];
}
