<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Classroom extends FormRequest
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

            //we write Arrya_name.*.Key to validte array
            'List_Classes.*.Name'=>'required|unique:classrooms,name->ar'.$this->id,
            'List_Classes.*.Name_en'=>'required|unique:classrooms,name->en'.$this->id,
            

        ];
    }

    public function messages()
    {
        return [
            'Name_en.required'=>trans('validation.required'),
            'Name_en.unique'=>trans('validation.unique'),
            'Name.required'=>trans('validation.required'),
            'Name.unique'=>trans('validation.unique'),
        ];
    }




}
