<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'password1' => 'required'
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Nhập tên',
            'phone.required' => 'Nhập số điện thoại',
            'password.required' => 'Nhập mật khẩu',
            'password1.required' => 'Nhập xác nhận mật khẩu'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if(User::where('phone', '=', $this->request->get('phone'))->exists()) {
                $validator->errors()->add('phone', 'Số điện thoại đã được sử dụng');
            }
            if($this->request->get('password') != '' && ($this->request->get('password') != $this->request->get('password1'))) {
                $validator->errors()->add('password1', 'Mật khẩu không khớp');
            }
        });
    }
}
