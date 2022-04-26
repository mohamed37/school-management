<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'email' => 'required_without:id|email|unique:students,email,'.$this->id,
            'password' => 'required_without:id',
            'academic_year' => 'required',
            'date_birth' => 'required|date',
            'grade_id' => 'required|exists:grades,id',
            'gender_id' => 'required|exists:genders,id',
            'nationalitie_id' => 'required|exists:nationalities,id',
            'blood_id' => 'required|exists:typebloods,id',
            'classroom_id' => 'required|exists:classrooms,id',
            'section_id' => 'required|exists:sections,id',
            'parent_id' => 'required|exists:my_parents,id'
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'string' => trans('validation.string'),
            'email.unique' => trans('validation.unique'),
            'date' => trans('validation.date'),
            'grade_id.exists' => trans('validation.exists'),
            'nationalitie_id.exists' => trans('validation.exists'),
            'blood_id.exists' => trans('validation.exists'),
            'classroom_id.exists' => trans('validation.exists'),
            'section_id.exists' => trans('validation.exists'),
            'parent_id.exists' => trans('validation.exists'),

            'password.required_without' => trans('validation.password'),
        ];
    }
}
