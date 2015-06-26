<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request
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
            'title' => 'required|min:5|max:80',
            'section_id' => 'required|numeric|min:1|max:3',
            'price' => 'max:10',
            'city_id' => 'required|numeric|max:2',
            'address' => 'required|max:80',
            'phone' => 'required|min:5|max:40',
            'email' => 'required|max:40'
        ];
    }
}
