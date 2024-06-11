<?php 

namespace App\Http\Services\Flight;


use App\Models\Flight;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Log;
class FlightAdminService
{

    public function get()
    {
        return Flight::paginate(10);
    }


    public function checkDepartureBeforeArrival($request)
    {
        $departure_time = $request->input('departure_time');
        $arrival_time = $request->input('arrival_time');

        // Chuyển đổi ngày xuất phát và ngày đến thành đối tượng DateTime
        $departureDateTime = new \DateTime($departure_time);
        $arrivalDateTime = new \DateTime($arrival_time);

        // So sánh ngày xuất phát và ngày đến
        if ($departureDateTime < $arrivalDateTime) {
            return true; // Ngày xuất phát nhỏ hơn ngày đến
        } else {
            Session::flash('error', 'Ngày xuất phát lớn hơn hoặc bằng ngày đến');
            return false;
        }
    }

    public function insert($request)
    {
        $check = $this->checkDepartureBeforeArrival($request);
        if($check == false) return false;

        try{
            $data = $request->except('_token');
            Flight::create($data);

            Session::flash('success', 'Thêm chuyến bay thành công');
        } catch (\Exception $err)
        {
            Session::flash('error', 'Thêm chuyến bay lỗi');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function delete($request)
    {
        // Tìm chuyến bay dựa trên ID
        $flight = Flight::where('id', $request->input('id'))->first();
        
        // Kiểm tra xem chuyến bay có tồn tại không
        if($flight) {
            // Xóa chuyến bay
            $flight->delete();
            return true;
        }
        Log::info("Không tìm thấy chuyến bay với ID: " . $request->input('id'));
        return false;
    }

    public function update($request, $flight)
    {
        $check = $this->checkDepartureBeforeArrival($request);
        if($check == false) return false;

        try{
            $flight->fill($request->input());
            $flight->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch(\Exception $err){
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }
}

?>