<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone' => 'required',
            'password' => 'required'
        ];
    }
    public function messages() {
        return [
            'phone.required' => 'Nhập số điện thoại',
            'password.required' => 'Nhập mật khẩu'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if(!User::where('phone', $this->request->get('phone'))->exists()) {
                $validator->errors()->add('phone', 'Số điện thoại không tồn tại');
            } else if(!User::where('phone', $this->request->get('phone'))->where('password', $this->request->get('password'))->exists()) {
                $validator->errors()->add('password', 'Mật khẩu không đúng');
            } else {
                $user = User::where('phone', $this->request->get('phone'))->where('password', $this->request->get('password'))->first();
                Auth::login($user);
            }
        });
    }
}
