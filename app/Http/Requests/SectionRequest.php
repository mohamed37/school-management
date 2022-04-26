<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'name' => 'required_without:id|string',
            'name_en' => 'required',
            'grade_id' => 'required|exists:grades,id',
            'class_id' => 'required|exists:classrooms,id',


        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'string' => trans('validation.string'),
            'grade_id.exists' => trans('validation.exists'),
            'class_id.exists' => trans('validation.exists'),
            
        ];
    }
}
