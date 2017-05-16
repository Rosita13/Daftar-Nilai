<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

/**
 * Class UserCreateRequest
 *
 * @package App\Http\Requests\User
 */
class UserCreateRequest extends Request
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
        'name'    => 'Name',
        //  'class'    => 'class',
        'email'   => 'Email',
        // 'phone'   => 'Phone',
        'password' => 'password',
        // 'guru_id' => 'guru_id',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required|max:225',
            //  'class'    => 'required|max:225',
            'email'   => 'required|email|unique:users,email|max:225',
            // 'phone'   => 'required|max:30',
            'password' => 'required|max:60',
            // 'guru_id' => 'required|max:60',
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
