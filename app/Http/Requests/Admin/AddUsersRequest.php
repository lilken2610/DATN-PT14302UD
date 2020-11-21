<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddUsersRequest extends FormRequest
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
            'username'  => 'required|unique:users,username|min:6',
            'fullname'  => 'required',
            'email'  => 'required|unique:users,email|email',
            'phone'  => 'required',
            'pwd'  => 'required',
            'address'  => 'required',
            'level'  => 'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required'  => 'Vui lòng nhập tên đăng nhập',
            'username.unique'     => 'Tên đăng nhập bị trùng',
            'username.min'     => 'Nhập ít nhất 6 ký tự',
            'fullname.required'  => 'Vui lòng nhập họ tên',
            'email.required'  => 'Vui lòng nhập email',
            'email.unique'  => 'Email này đã được sử dụng',
            'email.email'  => 'Vui lòng nhập đúng định dạng email',
            'phone.required'  => 'Vui lòng nhập số điện thoại',
            'pwd.required'  => 'Vui lòng nhập mật khẩu',
            'address.required'  => 'Vui lòng nhập địa chỉ',
            'level.required'  => 'Vui lòng chọn cấp độ',
        ];
    }
}
