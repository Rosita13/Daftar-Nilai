<?php

namespace App\Http\Requests\Student;

use App\Http\Requests\Request;

/**
* Class UserCreateRequest
*
* @package App\Http\Requests\User
*/
class StudentEditRequest extends Request
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return true;
    }
    
    /**
    * Declaration an attributes
    *
    * @var array
    */
    protected $attrs = [
    'nis'    => 'Nis',
    'name'    => 'Name',
    'class_id'    => 'Class_id',
    'email'   => 'Email',
    'phone'   => 'Phone',
    // 'users_id' => 'users_id'
    ];
    
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
        'nis'    => 'required|max:225',
        'name'    => 'required|max:225',
        'class_id'    => 'required|max:225',
        'email'   => 'required|email|max:225',
        'phone'   => 'required|max:30',
        ];
    }
    
    /**
    * @param $validator
    *
    * @return mixed
    */
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }
    
}