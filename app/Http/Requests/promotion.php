<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class promotion extends FormRequest
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

            'Grade_id'=>'required',
            'Classroom_id'=>'required',
            'section_id'=>'required',
            'Grade_id_new'=>'required',
            'Classroom_id_new'=>'required',
            'section_id_new'=>'required',
            'academic_year'=>'required',
            'academic_year_new'=>'required',
        ];
    }
}
