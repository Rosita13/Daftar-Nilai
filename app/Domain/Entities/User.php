<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package App\Domain\Entities
 */
class User extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name','class','email', 'phone','password'//,'guru_id'
    ];

    // protected $with = ['teacher'];
    // public function teacher()
    // {
    //     return $this->belongsTo('App\Domain\Entities\Teacher', 'guru_id');
    // }
    

    
}