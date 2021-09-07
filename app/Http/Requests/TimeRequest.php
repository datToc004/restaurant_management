<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeRequest extends FormRequest
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
            'time_start' => 'date_format:Y-m-d\TH:i|required|before:time_end',
            'time_end' => 'required|date_format:Y-m-d\TH:i',
        ];
    }

    public function messages()
    {
        return [
            'time_start.required' => __('messages.time_start_required'),
            'time_start.date_format' => __('messages.time_start_date_format'),
            'time_start.before' => __('messages.time_start_before'),
            'time_end.required' => __('messages.time_end_required'),
            'time_end.date_format' => __('messages.time_end_date_format'),
        ];
    }
}
