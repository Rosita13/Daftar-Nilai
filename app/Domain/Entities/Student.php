<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Student
 * @package App\Domain\Entities
 */
class Student extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'class', 'email', 'phone','users_id'
    ];

    protected $with = ['user'];
    public function user()
    {
        return $this->belongsTo('App\Domain\Entities\User', 'users_id');
    }

}
