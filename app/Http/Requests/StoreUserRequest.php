<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:225|unique:users',
            'name' => 'required|string',
            'user_catalogue_id' => 'required|gt:0',
            'password' => 'required|string|min:6',
            're_password' => 'string|same:password',
        ];
    }
    public function messages(): array
    {
        return [
            'email.max' => 'Bạn Nhập quá 255 ký tự',
            'email.unique' => 'Email đã tồn tại',
            'email.string' => 'Email phải là ký tự',
            'email.email' => 'Email chưa đúng định dạng! ví dụ "acb@gmail.com"',
            'email.required' => 'Bạn chưa nhập Email',
            'name.required' => 'Bạn chưa nhập tên',
            'name.string' => 'Tên phải là ký tự',

            'user_catalogue_id.required' => 'Bạn chưa chọn thành viên',
            'user_catalogue_id.gt' => 'Bạn chưa chọn thành viên',

            'password.required' => 'Bạn chưa nhập mật khẩu',
            // 'password.string' => 'Mật khẩu phải là dạng ký tự',
            're_password.same' => 'Mật khẩu không trùng khớp',
            're_password.string' => 'Mật khẩu nhập lại phải là dạng ký tự',
            // 're_password.required' => 'Bạn phải nhập lại mật khẩu',
        ];
    }
}
