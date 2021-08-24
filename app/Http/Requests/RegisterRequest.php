<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'sex' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'email không được để trống',
            'email.email' => 'email chưa nhập đúng',
            'email.unique' => 'email đã trùng lặp',
            'password.required' => 'password không được để trống',
            'password.min' => 'password phải từ 5 kí tự trở lên',
            'name.required' => 'name không được để trống',
            'phone.required' => 'phone không được để trống',
            'sex.required' => 'sex không được để trống',
            'address.required' => 'address không được để trống',
        ];
    }
}
