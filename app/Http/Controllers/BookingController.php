<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function submitBooking(Request $request)
    {
        // Lấy dữ liệu từ form
        $data = $request->all();

        // In ra dữ liệu để kiểm tra
        dd($data);

        // Hoặc có thể trả về dữ liệu để hiển thị trên trang
        // return view('result', compact('data'));
    }
}
