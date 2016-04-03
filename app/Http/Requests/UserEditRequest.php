<?php

namespace App\Http\Requests;


class UserEditRequest extends Request
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array(
            'name' => 'required|min:2',
            'lastname' => '',
            'dni' => '',
            'telephone' => '',
            'email' => 'required|unique:users,id,'.$this->get('id'),
            'role' =>  'required|in:cliente,comercial,admin',
            'password' => 'confirmed|min:6',
        );
    }
}
