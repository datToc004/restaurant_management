<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableEditRequest extends FormRequest
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
            'code' => 'required|unique:tables,code,' . $this->table,
            'max' => 'required',
            'img' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('messages.name_required'),
            'code.required' => __('messages.code_required'),
            'code.unique' => __('messages.code_unique'),
            'max.required' => __('messages.max_required'),
            'img.image' => __('messages.img_image'),
        ];
    }
}
