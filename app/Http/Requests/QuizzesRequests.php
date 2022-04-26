<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizzesRequests extends FormRequest
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
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'teacher_id' => 'required|exists:teachers,id',
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
            'section_id' => 'required|exists:sections,id',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'string' => trans('validation.string'),
            'teacher_id.exists' => trans('validation.exists'),
            'grade_id.exists' => trans('validation.exists'),
            'classroom_id.exists' => trans('validation.exists'),
            'section_id.exists' => trans('validation.exists'),
           
        ];
    }
}
