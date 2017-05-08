<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Entities implements AuthenticatableContract, CanResetPasswordContract
{
    use SoftDeletes, Authenticatable, CanResetPassword;

    /**
     * @var array
     */
    protected $fillable = [
        'name','email', 'phone','password'//,'guru_id'
    ];

    protected $primaryKey = 'id';

    protected $hidden = [
    'password', 'remember_token',
    ];
    // protected $with = ['teacher'];
    // public function teacher()
    // {
    //     return $this->belongsTo('App\Domain\Entities\Teacher', 'guru_id');
    // }
    

    
}