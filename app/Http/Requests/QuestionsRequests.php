<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsRequests extends FormRequest
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
            'quizze_id' => 'required|exists:quizzes,id',
            'title' => 'required|string',
            'answers' => 'required|string', 
            'right_answer' => 'required|string', 
            'score' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'string' => trans('validation.string'),
            'integer' => trans('validation.integer'),
            'quizze_id.exists' => trans('validation.exists'),
        ];
    }
}
