<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Classes
 * @package App\Domain\Entities
 */
class Kelas extends Entities
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $table = 'classes';
    protected $fillable = [
        'guru_id','class'
    ];
     protected $primaryKey = 'id';
    
     protected $with = ['teacher'];
    public function teacher()
    {
        return $this->belongsTo('App\Domain\Entities\Teacher', 'guru_id');
    }

}
