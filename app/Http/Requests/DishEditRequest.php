<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishEditRequest extends FormRequest
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
            'code' => 'required|unique:dishes,code,' . $this->dish,
            'type' => 'required',
            'img' => 'image',
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('messages.name_required'),
            'code.required' => __('messages.code_required'),
            'code.unique' => __('messages.code_unique'),
            'type.required' => __('messages.type_required'),
            'img.image' => __('messages.img_image'),
            'price.required' => __('messages.price_required'),
            'price.numeric' => __('messages.price_numeric'),
        ];
    }
}
