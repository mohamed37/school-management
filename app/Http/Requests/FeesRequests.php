<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeesRequests extends FormRequest
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
           'title_ar' => 'required|string',
           'title_en' => 'required|string',
           'amount' => 'required|numeric',
           'grade_id' => 'required|exists:grades,id',
           'classroom_id' => 'required|exists:classrooms,id',
           'description' => 'required',
           'year' => 'required',
           'fee_type' => 'required|integer'
        ];
    }

    public function messages()
    {
        return[
            'required' => trans('validation.required'),
            'string' => trans('validation.string'),
            'numeric' => trans('validation.numeric'),
            'integer' => trans('validation.integer'),
        ];
    }
}
