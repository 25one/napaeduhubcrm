<?php

namespace App\Http\Requests;

class StudentRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $rules = [
            'name' => 'bail|required|max:255',
            'contacts' => 'bail|required|max:255',   
            //'email' => 'bail|nullable|email|max:255',
            'datelesson' => 'bail|nullable|date|date_format:Y-m-d',

        ];
    }
}
