<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
            'student_id' => 'required|exists:students,id',

            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id', 
            'section_id' => 'required|exists:sections,id',

            'grade_id_new' => 'required|exists:grades,id',
            'classroom_id_new' => 'required|exists:classrooms,id',
            'section_id_new' => 'required|exists:sections,id'
        ];
    }

    public function messages()
    {
       return [
        'required' => trans('validation.required'),
        'student_id.exists' => trans('validation.exists'),

        'grade_id.exists' => trans('validation.exists'),
        'classroom_id.exists' => trans('validation.exists'), 
        'section_id.exists' => trans('validation.exists'),

        'grade_id_new.exists' => trans('validation.exists'),
        'classroom_id_new.exists' => trans('validation.exists'),
        'section_id_new.exists' => trans('validation.exists')

       ];
    }
}
