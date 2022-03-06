<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class feeValidate extends FormRequest
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
            'title_en'=>'required',
            'title_ar'=>'required',
            'amount'=>'required',
            'Grade_id'=>'required',
            'Classroom_id'=>'required',
            'description'=>'required',
            'year'=>'required',
            'Fee_type'=>'required'
        ];
    }
}
