<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoomRequest extends FormRequest
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
           'list_class.*.name' => 'required|string',
           'list_class.*.name_en' => 'required|string',
           'list_class.*.grade_id' => 'required|exists:grades,id'
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'string' => trans('validation.string'),
            'grade_id.exists' => trans('validation.exists'),
            
        ];
    }
}
