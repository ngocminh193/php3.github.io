<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:100',
            'address' => 'required',
            'role' => 'required',
            'gender' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'name.max' => 'Họ tên không được vượt quá 100 ký tự',
            'email.email' => 'Sai định dạng email',
            'email.unique' => 'Email đã tồn tại',
        ];
    }
    public function attributes() {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'address' => 'Địa chỉ',
            'role' => 'Role',
            'gender' => 'Giới tính',
        ];
    }
}
