<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SectionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sort_id' => 'numeric',
            'service_id' => 'required|numeric',
            'title' => 'required|min:5|max:80',
            'slug' => 'min:5|max:80',
            'lang' => 'required|min:2|max:4',
        ];
    }
}
