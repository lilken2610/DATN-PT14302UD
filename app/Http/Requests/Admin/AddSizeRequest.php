<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddSizeRequest extends FormRequest
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
            'size' => 'required|unique:size,size'
        ];
    }
    public function messages()
    {
        return [
            'size.required' => 'Vui lòng nhập size',
            'size.unique'   => 'Size đã tồn tại'
        ];
    }
}
