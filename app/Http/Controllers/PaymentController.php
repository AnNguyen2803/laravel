<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChuyenBay;
use App\Models\Banggia;
use App\Models\Datvemaybay;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
{
    // Lấy dữ liệu từ form
    $flightid = $request->input('flight_code');
    $danhxung = $request->input('danhxung');    
    $departureName = $request->input('depature_name');
    $destinationName = $request->input('destination_name');
    $departureDate = $request->input('departure_date');
    $departureTime = $request->input('departure_time');
    $departureCode = $request->input('departure_code');
    $arrivalTime = $request->input('arrival_time');
    $destinationCode = $request->input('destination_code');
    
    $firstName = $request->input('Ho');
    $lastName = $request->input('Tendemvaten');
    $phoneNumber = $request->input('sdt');
    $email = $request->input('email');

    // Lấy thông tin hành khách và lưu vào mảng
    $passengerFirstName = $request->input('passengerFirstName');
    $passengerLastName = $request->input('passengerLastName');
    $birthday = $request->input('birthday');
    $nationality = $request->input('nationality');

    

    $passengers = [];
    for ($i = 0; $i < count($passengerFirstName); $i++) {
        $passengers[] = [
            'danhxung' => $danhxung[$i],
            'firstName' => $passengerFirstName[$i],
            'lastName' => $passengerLastName[$i],
            'birthday' => $birthday[$i],
            'nationality' => $nationality[$i]
        ];
    }

    $totalPassengers = count($passengerFirstName);

    // Fetch price per passenger based on flight ID
    $price = Banggia::where('id_cb', $flightid)->value('gia');

    // Calculate total price
    $totalPrice = $totalPassengers * $price;

    // Format the price for display
    $formattedPrice = number_format($totalPrice, 0, ',', '.') . ' VNĐ';

    // Truyền dữ liệu tới view
    return view('pages.payment', compact(
        'flightid', 'departureName', 'destinationName', 'departureDate', 
        'departureTime', 'departureCode', 'arrivalTime', 'firstName', 'lastName', 
        'phoneNumber', 'email', 'passengers', 'destinationCode', 'formattedPrice'
    ));
}
public function successPayment(Request $request)
{
    // Lấy thông tin người dùng từ yêu cầu
    $customerInfo = $request->all();
    $flightId = $customerInfo['flightId'];
    $passengers = $customerInfo['passengers'];

    // Truy xuất thông tin từ các bảng liên quan
    $chuyenbay = DB::table('chuyenbay')
        ->where('id_cb', $flightId)
        ->first();

    $banggia = DB::table('banggia')
        ->where('id_cb', $flightId)
        ->first();

    $hangcho = DB::table('hangcho')
        ->where('id_hangcho', $banggia->id_hangcho)
        ->first();

    $quangduong = DB::table('quangduong')
        ->where('id_qd', $chuyenbay->id_qd)
        ->first();

    $hang = DB::table('hang')
        ->where('id_hang', $chuyenbay->id_hang)
        ->first();

    $flightDetails = [
        'machuyenbay' => $chuyenbay->chuyenbay,
        'hangve' => $hangcho->hang,
        'hang' => $hang->tenhang,
        'thoigianbd' => $chuyenbay->thoigianbd,
        'thoigiankt' => $chuyenbay->thoigiankt,
        'gia' => $banggia->gia,
        'diemkhoihanh' => $quangduong->diemkhoihanh,
        'diemketthuc' => $quangduong->diemketthuc,
        'hanhlyxachtay' => $hang->hanhlyxachtay,
        'hanhlykygui' => $hang->hanhlykygui,
    ];

    // Lưu thông tin khách hàng và chuyến bay vào session
    $request->session()->put('customerInfo', $customerInfo);
    $request->session()->put('flightDetails', $flightDetails);
    // Thông tin hành khách
    $passengerInfo = [];
    foreach ($passengers as $passenger) {
        $passengerInfo[] = [
            'danhXung' => $passenger['danhXung'],
            'passengerName' => $passenger['passengerName'],
            'passengerBirthday' => $passenger['passengerBirthday'],
            'passengerNationality' => $passenger['passengerNationality'],
        ];
    }
    $request->session()->put('passengerInfo', $passengerInfo);

    // Lấy ngày giờ hiện tại
    $currentDateTime = now();

    // Tạo mã đặt chỗ duy nhất
    $lastmadatcho = DatVeMayBay::max('madatcho');
    $madatcho = $lastmadatcho ? $lastmadatcho + 1 : 1;


    // Ma khách hàng gần nhất 
    $lastCustomerId = DatVeMayBay::max('id_kh');
    $newCustomerId = $lastCustomerId ? $lastCustomerId + 1 : 1;

    // Cập nhật số chỗ trong bảng banggia
    if ($banggia->socho >= count($passengers)) {
        DB::table('banggia')
            ->where('id_cb', $flightId)
            ->update(['socho' => $banggia->socho - count($passengers)]);
    } else {
        return response()->json(['success' => false, 'message' => 'Not enough available seats'], 400);
    }

    // Lưu thông tin của từng hành khách vào cơ sở dữ liệu
    foreach ($passengers as $passenger) {
        // Split full name (passengerName) into 'Ho' and 'Tendemvaten'
        $nameParts = explode(' ', $passenger['passengerName']);
        $ho = array_shift($nameParts); // First part is 'Ho'
        $tendemvaten = implode(' ', $nameParts); // Remaining parts are 'Tendemvaten'

        // Save information to the database
        $datVe = Datvemaybay::create([
            'madatcho' => $madatcho,
            'id_kh' => $newCustomerId,
            'id_cb' => $flightId,
            'danhxung' => $passenger['danhXung'],
            'Ho' => $ho,
            'Tendemvaten' => $tendemvaten,
            'ngaysinh' => $passenger['passengerBirthday'],
            'quoctich' => $passenger['passengerNationality'],
            'tinhtrangthanhtoan' => 'Đã thanh toán',
            'ngaydat' => $currentDateTime,
        ]);

        $madatcho++;
        $newCustomerId++;

        return response()->json(['success' => true]);
    }
}
public function showTicketPage(Request $request) {
    $customerInfo = $request->session()->get('customerInfo');
    $flightDetails = $request->session()->get('flightDetails');
    $passengerInfo = $request->session()->get('passengerInfo');

    // Kiểm tra xem session có tồn tại hay không
    if (!$customerInfo || !$flightDetails) {
        // Xử lý khi session không tồn tại, ví dụ như redirect hoặc thông báo lỗi
        return redirect()->route('route_name_for_redirect_or_error');
    }

    return view('pages.ticket', [
        'customerInfo' => $customerInfo,
        'flightDetails' => $flightDetails,
        'passengerInfo' => $passengerInfo,
    ]);

}


}




