<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Student
 * @package App\Domain\Entities
 */
class Values extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
      protected $table = 'values';
    protected $fillable = [
        'siswa_id', 'type', 'status'
    ];

}
