<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
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
            "username"=>"required|min:4|max:30|unique:tai_khoans",
            "password"=>"required|min:6",
            "ho_ten"=>"required|min:4",
            "email"=>"required|unique:tai_khoans",
            "phone"=>"required|min:8|max:10",
            'confirm_password' => 'required|min:6|same:password',

        ];
    }
    public function messages()
    {
        return [
            "username.required"=>"Vui lòng nhập tên đăng nhập",
            "password.required"=>"Vui lòng nhập mặt khẩu",
            "ho_ten.required"=>"Vui lòng nhập họ tên",
            "email.required"=>"Vui lòng nhập Email",
            "phone.required"=>"Vui lòng nhập số điện thoại",
            
            "username.min"=>"Tên đăng nhập phải ít nhất :min kí tự",
            "password.min"=>"Mật khẩu phải ít nhất :min kí tự",
            "ho_ten.min"=>"Họ tên phải ít nhất :min kí tự",
            "phone.min"=>"Số điện thoại phải ít nhất :min số",

            "username.max"=>" Tên đăng nhập không quá :max kí tự",
            "phone.max"=>"Số điện thoại không quá :max số",

            "username.unique"=>"Tên đăng nhập đã tồn tại",
            "email.unique"=>"Email này đã được đăng ký tài khoản! Vui lòng nhập lại",

            "confirm_password.same"=>"Xác nhận mật khẩu không khớp"


        ]; 
    }
}
