<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Teachers
 * @package App\Domain\Entities
 */
class Teacher extends Entities
{
    use SoftDeletes;

    /**
     * @var array
     */
      protected $table = 'teachers';
    protected $fillable = [
        'name','nip'
    ];
     protected $primaryKey = 'id';

}
