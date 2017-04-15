<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Classes
 * @package App\Domain\Entities
 */
class Kelas extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $table = 'classes';
    protected $fillable = [
        'guru_id'
    ];

}
