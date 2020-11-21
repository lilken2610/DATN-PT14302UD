<?php

namespace App\Http\Requests\Shoes;

use Illuminate\Foundation\Http\FormRequest;

class ActiveRequest extends FormRequest
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
            'acitve' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'acitve.required' => 'Bạn chưa nhập mã xác nhận'
        ];
    }
}
