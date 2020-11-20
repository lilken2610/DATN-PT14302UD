<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddNewRequest extends FormRequest
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
            'namenew'       => 'required|unique:news,title',
            'previewnew'    => 'required'
        ];
    }
    public function messages()
    {
        return [
            'namenew.required'       => 'Vui lòng nhập tiêu đề tin',
            'namenew.unique'         => 'Tiêu đề bị trùng',
            'previewnew.required'    => 'Vui lòng nhập mô tả'
        ];
    }
}
