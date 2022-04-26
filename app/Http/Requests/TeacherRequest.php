<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'email' => 'required_without:id|email|unique:teachers,email,'.$this->id,
            'password' => 'required_without:id',
            'name_ar' => 'required|string',
            'name_en' => 'required|string', 
            'specialization_id' => 'required|exists:specializations,id',
            'gender_id' => 'required|exists:genders,id',
            'joining_Date' => 'required|date',
            'address' => 'required|string'


        ];
    }


    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'string' => trans('validation.string'),
            'email.unique' => trans('validation.unique'),
            'specialization_id.exists' => trans('validation.exists'),
            'gender_id.exists' => trans('validation.exists'),
            'password.required_without' => trans('validation.password'),
        ];
    }
}
