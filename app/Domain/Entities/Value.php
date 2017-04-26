<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Student
 * @package App\Domain\Entities
 */
class Value extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
      protected $table = 'values';
    protected $fillable = [
        'siswa_id', 'type', 'status'
    ];

     protected $with = ['student'];
    public function student()
    {
        return $this->belongsTo('App\Domain\Entities\student', 'siswa_id');
    }

}
