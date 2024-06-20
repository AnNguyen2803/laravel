<?php 

namespace App\Http\Services\Flight;


use App\Models\Chuyenbay;
use App\Models\Quangduong;
use App\Models\Banggia;
use Illuminate\Support\Str;
use Session;
use DB;
use Illuminate\Support\Facades\Log;
class FlightAdminService
{

    public function get($perPage = 10)
    {
        return Chuyenbay::with(['hang', 'quangduong', 'banggia.hangcho'])->paginate($perPage);
    }
    public function insert($request)
    {
        DB::beginTransaction();
        
        try {
            // Lấy dữ liệu từ request, bỏ qua token
            $data = $request->except('_token');

            // Chuyển đổi định dạng ngày giờ
            $departure_time = \DateTime::createFromFormat('Y-m-d\TH:i', $data['departure_time'])->format('d/m/Y H:i');
            $arrival_time = \DateTime::createFromFormat('Y-m-d\TH:i', $data['arrival_time'])->format('d/m/Y H:i');

            $departure_dt = \DateTime::createFromFormat('d/m/Y H:i', $departure_time);
            $arrival_dt = \DateTime::createFromFormat('d/m/Y H:i', $arrival_time);
            $interval = $arrival_dt->diff($departure_dt);
            $flight_duration_minutes = ($interval->h * 60) + $interval->i; // Tổng số phút

            // Lấy id_qd lớn nhất hiện tại
            $max_id_qd = Quangduong::max('id_qd');
            $new_id_qd = $max_id_qd ? $max_id_qd + 1 : 1;  // Nếu không có bản ghi nào thì bắt đầu từ 1

            // Tạo mảng dữ liệu cho bảng quangduong
            $quangduongData = [
                'id_qd' => $new_id_qd,
                'diemkhoihanh' => $data['departure_airport'],
                'diemketthuc' => $data['arrival_airport'],
                'thoigian' => $flight_duration_minutes
            ];

            // Thêm quang duong vào bảng quangduong
            Quangduong::create($quangduongData);

            // Tạo mảng dữ liệu cho bảng chuyenbay
            $chuyenbayData = [
                'id_cb' => $data['id'],
                'chuyenbay' => $data['flight_number'],
                'thoigianbd' => $departure_time,
                'thoigiankt' => $arrival_time,
                'id_hang' => $data['provider_id'],
                'id_qd' => $new_id_qd
            ];

            // Thêm chuyến bay vào bảng chuyenbay
            Chuyenbay::create($chuyenbayData);

            // Lặp qua từng phần tử trong mảng hangcho và thêm vào bảng banggia
            foreach ($data['hangcho'] as $id_hangcho => $hangcho) {
                $banggiaData = [
                    'id_cb' => $data['id'],
                    'id_hangcho' => $id_hangcho,
                    'socho' => $hangcho['availability'],
                    'gia' => $hangcho['price']
                ];

                Banggia::create($banggiaData);
            }

            // Commit transaction
            DB::commit();

            Session::flash('success', 'Thêm chuyến bay thành công');
        } catch (\Exception $err) {
            // Rollback transaction nếu có lỗi
            DB::rollBack();

            Session::flash('error', 'Thêm chuyến bay lỗi');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function delete($request)
    {
        try {
            // Lấy id_cb từ request
            $flightId = $request->input('id_cb');

            // Tìm chuyến bay trong bảng chuyenbay
            $flight = Chuyenbay::find($flightId);

            if (!$flight) {
                Log::info("Không tìm thấy chuyến bay với ID: " . $flightId);
                return false;
            }

            // Bắt đầu transaction để đảm bảo tính nhất quán của dữ liệu
            DB::beginTransaction();

            // Xóa các bản ghi trong bảng banggia liên quan đến chuyến bay
            DB::table('banggia')->where('id_cb', $flightId)->delete();

            // Xóa chuyến bay trong bảng chuyenbay
            $flight->delete();

            // Kiểm tra xem quãng đường này có liên quan đến chuyến bay nào khác không
            $otherFlights = Chuyenbay::where('id_qd', $flight->id_qd)->exists();

            // Nếu không còn chuyến bay nào khác liên quan đến quãng đường này, thì xóa quãng đường
            if (!$otherFlights) {
                DB::table('quangduong')->where('id_qd', $flight->id_qd)->delete();
            }

            DB::commit(); // Hoàn thành transaction nếu thành công

            return true;
        } catch (\Exception $err) {
            DB::rollBack(); // Rollback transaction nếu có lỗi
            Log::error("Lỗi khi xóa chuyến bay: " . $err->getMessage());
            return false;
        }
    }

    public function update($request,$flight)
    {

        try {
            // Cập nhật thông tin chuyến bay
            $flight->fill($request->only([
                'id_cb', 
                'chuyenbay', 
                'thoigianbd', 
                'thoigiankt', 
                'id_hang', 
                'id_qd'
            ]));
            $flight->save();
    
            // Cập nhật các thông tin liên quan đến banggia cho chuyến bay hiện tại
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'gia_') === 0) {
                    // Lấy id_hangcho từ key
                    $id_hangcho = substr($key, strlen('gia_'));
    
                    // Lấy giá và số chỗ tương ứng
                    $gia = $value;
                    $socho = $request['socho_' . $id_hangcho];
    
                    // Tìm hoặc tạo mới bản ghi trong bảng banggia chỉ cho chuyến bay hiện tại
                    $banggia = Banggia::firstOrNew([
                        'id_cb' => $flight->id_cb,
                        'id_hangcho' => $id_hangcho
                    ]);
    
                    // Cập nhật thông tin
                    $banggia->gia = $gia;
                    $banggia->socho = $socho;
                    $banggia->save();
                }
            }
    
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::error($err->getMessage());
            return redirect()->back()->withErrors(['message' => 'Có lỗi xảy ra trong quá trình cập nhật']);
        }
    
        return redirect()->back();
    }
}

?>