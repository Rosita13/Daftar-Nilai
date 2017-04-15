<?php

namespace App\Domain\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
   protected $table = 'users';
    protected $fillable = [
        'name','class','email', 'phone','password','guru_id','siswa_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
