<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamsRequests extends FormRequest
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
            'trem' => 'required|integer',
            'academic_year' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'required' => trans('validation.required'),
            'string' => trans('validation.string'),
            'integer' => trans('validation.integer'),
        ];
    }
}
