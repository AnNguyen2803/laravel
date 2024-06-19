<?php

namespace App\Http\Controllers;
use App\Models\Chuyenbay;
use Illuminate\Http\Request;
use App\Models\Quangduong;
use App\Models\Hang;
use App\Models\Hangcho;
use App\Models\Banggia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class BookingController extends Controller
{
    public function submitBooking(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $startDate = $request->input('start');
        $returnDate = $request->input('return');
        $class = $request->input('class');
        $total = $request->input('adults');


        $startOfDay = date('d-m-Y 00:00:00', strtotime($startDate));
        $endOfDay = date('d-m-Y 23:59:59', strtotime($startDate));

        if ($returnDate) {
            $endOfReturnDay = date('d-m-Y 23:59:59', strtotime($returnDate));
            $flights = Chuyenbay::join('hang', 'chuyenbay.id_hang', '=', 'hang.id_hang')
                                ->join('quangduong', 'chuyenbay.id_qd', '=', 'quangduong.id_qd')
                                ->join('banggia', 'chuyenbay.id_cb', '=', 'banggia.id_cb')
                                ->join('hangcho', 'banggia.id_hangcho', '=', 'hangcho.id_hangcho')
                                ->where('quangduong.diemkhoihanh', 'LIKE', '%' . $from . '%')
                                ->where('quangduong.diemketthuc', 'LIKE', '%' . $to . '%')
                                ->whereBetween('chuyenbay.thoigianbd', [$startOfDay, $endOfReturnDay])
                                ->where('hangcho.hang', $class)
                                ->select('chuyenbay.*', 'hang.tenhang', 'quangduong.diemkhoihanh', 'quangduong.diemketthuc', 'banggia.gia', 'hangcho.hang')
                                ->get();
        } else {
            $flights = Chuyenbay::join('hang', 'chuyenbay.id_hang', '=', 'hang.id_hang')
                                ->join('quangduong', 'chuyenbay.id_qd', '=', 'quangduong.id_qd')
                                ->join('banggia', 'chuyenbay.id_cb', '=', 'banggia.id_cb')
                                ->join('hangcho', 'banggia.id_hangcho', '=', 'hangcho.id_hangcho')
                                ->where('quangduong.diemkhoihanh', 'LIKE', '%' . $from . '%')
                                ->where('quangduong.diemketthuc', 'LIKE', '%' . $to . '%')
                                ->whereBetween('chuyenbay.thoigianbd', [$startOfDay, $endOfDay])
                                ->where('hangcho.hang', $class)
                                ->select('chuyenbay.*', 'hang.tenhang', 'quangduong.diemkhoihanh', 'quangduong.diemketthuc', 'banggia.gia', 'hangcho.hang')
                                ->get();
        }

        return view('pages.listflight', [
            'title' => 'Danh sách chuyến bay',
            'flights' => $flights,
            'from' => $from,
            'to' => $to,
            'startDate' => $startDate,
            'class' => $class,
            'total' => $total
        ]);
    }
    public function process(Request $request, $flight_id)
    {

        $total_P = $request->input('total_P');
        // Lấy thông tin chi tiết của chuyến bay
        $flight = Chuyenbay::findOrFail($flight_id);

        // Lấy thông tin quãng đường
        $route = Quangduong::findOrFail($flight->id_qd);

        // Lấy thông tin hãng
        $airline = Hang::findOrFail($flight->id_hang);
        

        // Lấy thông tin hạng chỗ
        $class = Banggia::where('id_cb', $flight_id)
                        ->join('hangcho', 'banggia.id_hangcho', '=', 'hangcho.id_hangcho')
                        ->select('hangcho.hang', 'banggia.gia')
                        ->first();

        // Tách mã sân bay
        $departure_code = $this->extractAirportCode($route->diemkhoihanh);
        $destination_code = $this->extractAirportCode($route->diemketthuc);

        // Tách ngày và giờ từ thời gian khởi hành và kết thúc
        $departure_datetime = $this->splitDateTime($flight->thoigianbd);
        $arrival_datetime = $this->splitDateTime($flight->thoigiankt);

        // Tách tên sân bay
        $departure_name = $this->extractAirportName($route->diemkhoihanh);
        $destination_name = $this->extractAirportName($route->diemketthuc);
        // Trả về view với thông tin chi tiết của chuyến bay
        return view('pages.booking-details', [
            'title' => 'Thông tin chi tiết chuyến bay',
            'flight' => $flight,
            'route' => $route,
            'airline' => $airline,
            'class' => $class,
            'departure_code' => $departure_code,
            'destination_code' => $destination_code,
            'departure_name' => $departure_name,
            'destination_name' => $destination_name,
            'departure_date' => $departure_datetime['date'],
            'departure_time' => $departure_datetime['time'],
            'arrival_date' => $arrival_datetime['date'],
            'arrival_time' => $arrival_datetime['time'],
            'total_p' => $total_P,

        ]);
    }

    private function extractAirportCode($full_location)
    {
        $parts = explode(' - ', $full_location);
        return end($parts);
    }
    private function extractAirportName($full_location)
    {
        $parts = explode(' - ', $full_location);
        return $parts[0];
    }

    private function splitDateTime($datetime)
    {
        $date_time_array = explode(' ', $datetime);
        return [
            'date' => $date_time_array[0],
            'time' => $date_time_array[1]
        ];
    }

    public function show(Request $request)
    {
        // Lấy thông tin người dùng đã đăng nhập
        $userId = Auth::user()->id_kh;

        // Truy vấn cơ sở dữ liệu để lấy thông tin đặt vé của người dùng
        $bookings = DB::table('datvemaybay')
            ->join('chuyenbay', 'datvemaybay.id_cb', '=', 'chuyenbay.id_cb')
            ->join('banggia', 'chuyenbay.id_cb', '=', 'banggia.id_cb')
            ->join('hangcho', 'banggia.id_hangcho', '=', 'hangcho.id_hangcho')
            ->where('datvemaybay.id_kh', $userId)
            ->select(
                'datvemaybay.madatcho',
                'datvemaybay.danhxung',
                'datvemaybay.Ho',
                'datvemaybay.Tendemvaten',
                'datvemaybay.ngaysinh',
                'datvemaybay.quoctich',
                'datvemaybay.tinhtrangthanhtoan',
                'datvemaybay.ngaydat',
                'chuyenbay.chuyenbay',
                'chuyenbay.thoigianbd',
                'chuyenbay.thoigiankt',
                'banggia.gia',
                'hangcho.hang as hangghe'
            )
            ->get();

        // Thời gian hiện tại
        $now = Carbon::now();

        // Chuyển đổi định dạng thời gian bắt đầu và kết thúc chuyến bay
        foreach ($bookings as $booking) {
            $booking->thoigianbd = Carbon::createFromFormat('d/m/Y H:i', $booking->thoigianbd);
            $booking->thoigiankt = Carbon::createFromFormat('d/m/Y H:i', $booking->thoigiankt);
        }

        // Trả về view với dữ liệu và thời gian hiện tại
        return view('bookings.index', ['bookings' => $bookings, 'now' => $now]);
    }



    
}
