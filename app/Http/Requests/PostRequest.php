<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'id_dt' => 'required|numeric',
            'id_w' => 'numeric',
            'dientich' => 'required',
            'giaphong' => 'required',
            'gianuoc' => 'required',
            'giadien' => 'required'
        ];
    }
    public function messages() {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'id_dt.numeric' => 'Vui lòng chọn huyện.',
            'id_w.numeric' => 'Vui lòng chọn xã.',
            'dientich.required' => 'Vui lòng nhập diện tích.',
            'giaphong.required' => 'Vui lòng nhập giá phòng.',
            'gianuoc.required' => 'Vui lòng nhập giá nước.',
            'giadien.required' => 'Vui lòng nhập giá điện.',
        ];
    }
}
