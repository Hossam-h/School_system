<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Section extends FormRequest
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
            'Name_Section_Ar'=>'required|unique:sections,Name_section->ar'.$this->id,
            'Name_Section_En'=>'required|unique:sections,Name_section->en'.$this->id,
             'Grade_id'=>'required',
             //'Status'=>'required',
             'Class_id'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'Name_Section_Ar.required'=>trans('validation.required'),
            'Name_Section_En.required'=>trans('validation.required'),
            'Name_Section_Ar.unique'=>trans('validation.unique'),
            'Name_Section_En.unique'=>trans('validation.unique'),
             //'Status.required'=>trans('validation.required'),
             'Grade_id.required'=>trans('validation.required'),
             'Class_id.required'=>trans('validation.required'),
        ];
    }
}
