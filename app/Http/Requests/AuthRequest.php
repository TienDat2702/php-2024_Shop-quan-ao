<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => 'required|email|max:225',
            'password' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'email.max' => 'Bạn Nhập quá 255 ký tự',
            'email.email' => 'Email chưa đúng định dạng! ví dụ "acb@gmail.com"',
            'email.required' => 'Bạn chưa nhập Email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
        ];
    }
}
