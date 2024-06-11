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
            'id' => 'required',
            'flight_number' => 'required',
            'departure_airport' => 'required',
            'arrival_airport' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required',
            'availability' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'id' => 'required',
            'flight_number.required' => 'Bạn cần nhập số chuyến bay.',
            'departure_airport.required' => 'Bạn cần nhập sân bay xuất phát.',
            'arrival_airport.required' => 'Bạn cần nhập sân bay đến.',
            'departure_time.required' => 'Bạn cần nhập thời gian xuất phát.',
            'arrival_time.required' => 'Bạn cần nhập thời gian đến.',
            'price.required' => 'Bạn cần nhập giá.',
            'availability.required' => 'Bạn cần nhập số lượng chỗ trống.',
        ];
    }
}
