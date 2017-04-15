<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subjects
 * @package App\Domain\Entities
 */
class Subject extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
      protected $table = 'subjects';
    protected $fillable = [
        'name','guru_id'
    ];

}
