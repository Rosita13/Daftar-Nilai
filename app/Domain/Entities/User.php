<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package App\Domain\Entities
 */
class User extends Entities
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name','email', 'phone','password'//,'guru_id'
    ];

    protected $primaryKey = 'id';
    // protected $with = ['teacher'];
    // public function teacher()
    // {
    //     return $this->belongsTo('App\Domain\Entities\Teacher', 'guru_id');
    // }
    

    
}