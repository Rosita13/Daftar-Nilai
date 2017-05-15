<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Student
 * @package App\Domain\Entities
 */
class Student extends Entities
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'nis','name', 'class_id', 'email', 'phone','users_id'
    ];
     protected $primaryKey = 'id';

    protected $with = ['user','kelas'];
    public function user()
    {
        return $this->belongsTo('App\Domain\Entities\User', 'users_id');
    }
     public function kelas()
    {
        return $this->belongsTo('App\Domain\Entities\Kelas', 'class_id');
    }

}
