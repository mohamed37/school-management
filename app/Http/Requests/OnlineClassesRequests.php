<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnlineClassesRequests extends FormRequest
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
            'integration' => 'required',
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
            'teacher_id' => 'required|exists:teachers,id',
            'section_id' => 'required|exists:sections,id',
            'meeting_id' => 'required|integer',
            'topic' => 'required|string',
            'start_at' => 'required|date',
            'duration' => 'required|integer',
            'password' => 'required',
            'start_url' => 'required|url',
            'join_url' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'string' => trans('validation.string'),
            'date' => trans('validation.date'),
            'integer' => trans('validation.integer'),
            'grade_id.exists' => trans('validation.exists'),
            'classroom_id.exists' => trans('validation.exists'),
            'teacher_id.exists' => trans('validation.exists'),
            'section_id.exists' => trans('validation.exists'),
            'user_id.exists' => trans('validation.exists'),
        ];
    }
}
