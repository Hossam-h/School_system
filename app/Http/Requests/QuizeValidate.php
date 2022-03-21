<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizeValidate extends FormRequest
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

            'Name_en'=>'required',
            'Name_ar'=>'required',
            'subject_id'=>'required',
            'Grade_id'=>'required',
            'Classroom_id'=>'required',
            'section_id'=>'required',
            'teacher_id'=>'required',
        ];
    }
}
