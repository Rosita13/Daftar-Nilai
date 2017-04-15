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
      protected $table = 'students';
    protected $fillable = [
        'name', 'class', 'email', 'phone','users_id'
    ];

}
