<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiptRequest extends FormRequest
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
            "debit" => 'required|numeric|min:1',
            "student_id" => 'exists:students,id',
            "description" => 'required'
        ];
    }

    public function messages()
    {
        return [
           'required' => trans('validation.required'),
           'exists' => trans('validation.exists'),
           'numeric' => trans('validation.numeric'),
        ];
    }
}
