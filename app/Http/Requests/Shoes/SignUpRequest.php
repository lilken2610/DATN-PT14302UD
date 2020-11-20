<?php

namespace App\Http\Requests\Shoes;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'fullname' => 'required',
            'username' => 'required|unique:users,username|min:6',
            'pwd'      => 'required',
            'pwdreturn' => 'required|same:pwd',
            'email'     => 'required|email|unique:users,email',
            'phone'     => 'required',
            'address'   => 'required'
        ];
    }
    public function messages()
    {
        return [
            'fullname.required' => 'Vui lòng nhập họ tên',
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'username.unique'   => 'Tên đăng nhập này đã được sử dụng',
            'username.min'   => 'Vui lòng nhập tên 6 ký tự',
            'pwd.required'      => 'Vui lòng nhập mật khẩu',
            'pwdreturn.same'     => 'Mật khẩu không trùng khớp',
            'pwdreturn.required' => 'Vui lòng nhập lại mật khẩu',
            'email.required'     => 'Vui lòng nhập email',
            'email.email'        => 'Vui lòng nhập đúng định dạng email',
            'email.unique'        => 'Email này đã được sử dụng',
            'phone.required'     => 'Vui lòng nhập số điện thoại',
            'address.required'   => 'Vui lòng nhập địa chỉ'
        ];
    }
}
