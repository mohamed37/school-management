<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'grade_id '=>'required|integer|exists:grades,id',
            'classroom_id '=>'required|exists:classrooms,id|integer',
            'teacher_id '=>'required|exists:teachers,id|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'string' => trans('validation.string'),
            'grade_id.exists' => trans('validation.exists'),
            'classroom_id.exists' => trans('validation.exists'),
            'teacher_id.exists' => trans('validation.exists'),
        ];
    }



}
