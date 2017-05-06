<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subjects
 * @package App\Domain\Entities
 */
class Subject extends Entities
{
    use SoftDeletes;

    /**
     * @var array
     */
      protected $table = 'subjects';
    protected $fillable = [
        'name','guru_id'
    ];
     protected $primaryKey = 'id';

     protected $with = ['teacher'];
    public function teacher()
    {
        return $this->belongsTo('App\Domain\Entities\Teacher', 'guru_id');
    }

}
