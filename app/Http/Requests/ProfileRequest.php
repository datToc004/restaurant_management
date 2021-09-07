<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user()->id,
            'phone' => 'required',
            'sex' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('messages.email_required'),
            'email.email' => __('messages.email_email'),
            'email.unique' => __('messages.email_unique'),
            'name.required' => __('messages.name_required'),
            'phone.required' => __('messages.phone_required'),
            'sex.required' => __('messages.sex_required'),
            'address.required' => __('messages.address_required'),
        ];
    }
}
