<?php

namespace App\Http\Requests\CarRental;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class CarRentalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'car_model' => 'required|string|max:100',
            'price_per_day' => 'required|numeric|min:0',
            'availability' => 'required|integer|min:0',
            'provider_id' => 'required|string|max:36', // Đảm bảo mã nhà cung cấp không vượt quá 36 ký tự
        ];
    }

    public function messages()
    {
        return [
            'car_model.required' => 'Vui lòng nhập model xe.',
            'car_model.max' => 'Model xe không được vượt quá 100 ký tự.',
            'price_per_day.required' => 'Vui lòng nhập giá thuê mỗi ngày.',
            'price_per_day.numeric' => 'Giá thuê mỗi ngày phải là số.',
            'price_per_day.min' => 'Giá thuê mỗi ngày phải lớn hơn hoặc bằng 0.',
            'availability.required' => 'Vui lòng nhập số lượng xe trống.',
            'availability.integer' => 'Số lượng xe trống phải là số nguyên.',
            'availability.min' => 'Số lượng xe trống phải lớn hơn hoặc bằng 0.',
            'provider_id.required' => 'Vui lòng chọn nhà cung cấp.',
            'provider_id.max' => 'Mã nhà cung cấp không được vượt quá 36 ký tự.',
        ];
    }
}
