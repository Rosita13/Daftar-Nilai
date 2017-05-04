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
        'siswa_id', 'type', 'status','nilai','semester','mapel_id','class_id'
    ];

     protected $with = ['student','subject','kelas'];
    public function student()
    {
        return $this->belongsTo('App\Domain\Entities\Student', 'siswa_id');
    }
      public function subject()
    {
        return $this->belongsTo('App\Domain\Entities\Subject', 'mapel_id');
    }
      public function kelas()
    {
        return $this->belongsTo('App\Domain\Entities\Kelas', 'class_id');
    }

}
