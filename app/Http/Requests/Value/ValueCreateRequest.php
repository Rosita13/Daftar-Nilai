<?php

namespace App\Http\Requests\Value;

use App\Http\Requests\Request;

/**
 * Class UserCreateRequest
 *
 * @package App\Http\Requests\User
 */
class ValueCreateRequest extends Request
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
        'siswa_id'=> 'siswa_id',
        'class_id'=> 'class_id',
        'type'    => 'type',
        'status'  => 'status',
        'nilai'   => 'nilai',
        'semester'=> 'semester',
        'mapel_id'=> 'mapel_id'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'siswa_id'=> 'required|max:225',
        'class_id'=> 'required|max:60',
        'type'    => 'required|max:225',
        'status'  => 'required|max:60',
        'nilai'   => 'required|max:60',
        'semester'=> 'required|max:60',
        'mapel_id'=> 'required|max:60'
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
