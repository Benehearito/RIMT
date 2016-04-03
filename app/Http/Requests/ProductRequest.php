<?php

namespace App\Http\Requests;

class ProductRequest extends Request
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
            'category_id'  => '',
            'title_es'  => 'required|min:2',
            'text_es'   => '',
            'price'  => 'required|numeric',
            'discount'  => 'required|numeric',
            'stock'  => 'required|numeric',
            'dimension'  => 'required|numeric',
            'order'  => '',
            'active'    => '',
        ];
    }
}
