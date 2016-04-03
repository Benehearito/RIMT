<?php

namespace App\Http\Requests;

class AcountDataRequest extends Request
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
        return [
            'name' => 'required|min:2',
            'lastname' => 'required|min:2',
            'dni' => 'required|min:5',
            'telephone' => 'required|min:5',
        ];

    }
}
