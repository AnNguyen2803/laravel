<?php

namespace App\Http\Requests\Flight;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class FlightRequest extends FormRequest
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
                'id' => 'required|unique:chuyenbay,id_cb|max:30',
                'flight_number' => 'required|max:15',
                'departure_airport' => 'required|max:100',
                'arrival_airport' => 'required|max:100',
                'departure_time' => 'required|date',
                'arrival_time' => 'required|date|after:departure_time',
                'provider_id' => 'required|exists:hang,id_hang',
                'hangcho.*.availability' => 'required|integer|min:0',
                'hangcho.*.price' => 'required|numeric'
            ];
    }
    public function messages()
    {
        return [
            'id.required' => 'Trường ID là bắt buộc.',
            'id.unique' => 'ID này đã tồn tại.',
            'id.max' => 'ID không được dài quá 30 ký tự.',
            
            'flight_number.required' => 'Trường số hiệu chuyến bay là bắt buộc.',
            'flight_number.max' => 'Số hiệu chuyến bay không được dài quá 15 ký tự.',
            
            'departure_airport.required' => 'Trường sân bay khởi hành là bắt buộc.',
            'departure_airport.max' => 'Tên sân bay khởi hành không được dài quá 100 ký tự.',
            
            'arrival_airport.required' => 'Trường sân bay đến là bắt buộc.',
            'arrival_airport.max' => 'Tên sân bay đến không được dài quá 100 ký tự.',
            
            'departure_time.required' => 'Trường thời gian khởi hành là bắt buộc.',
            'departure_time.date' => 'Thời gian khởi hành phải là ngày hợp lệ.',
            
            'arrival_time.required' => 'Trường thời gian đến là bắt buộc.',
            'arrival_time.date' => 'Thời gian đến phải là ngày hợp lệ.',
            'arrival_time.after' => 'Thời gian đến phải sau thời gian khởi hành.',
            
            'provider_id.required' => 'Trường nhà cung cấp là bắt buộc.',
            'provider_id.exists' => 'Nhà cung cấp không tồn tại.',
            
            'route_id.required' => 'Trường tuyến đường là bắt buộc.',
            'route_id.exists' => 'Tuyến đường không tồn tại.',
            
            'hangcho.*.availability.required' => 'Trường số lượng ghế trống là bắt buộc.',
            'hangcho.*.availability.integer' => 'Số lượng ghế trống phải là số nguyên.',
            'hangcho.*.availability.min' => 'Số lượng ghế trống phải lớn hơn hoặc bằng 0.',
            
            'hangcho.*.price.required' => 'Trường giá vé là bắt buộc.',
            'hangcho.*.price.numeric' => 'Giá vé phải là số.'
        ];
    }
}
