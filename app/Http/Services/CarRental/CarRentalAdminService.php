<?php 

namespace App\Http\Services\CarRental;


use App\Models\CarRental;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Log;
class CarRentalAdminService
{

    public function get()
    {
        return CarRental::paginate(10);
    }
    public function insert($request)
    {
        try{
            $data = $request->except('_token');
            CarRental::create($data);

            Session::flash('success', 'Thêm dịch vụ cho thuê xe thành công');
        } catch (\Exception $err)
        {
            Session::flash('error', 'Thêm lỗi');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function delete($request)
    {
        // Tìm chuyến bay dựa trên ID
        $carRental = CarRental::where('id', $request->input('id'))->first();
        
        // Kiểm tra xem chuyến bay có tồn tại không
        if($carRental) {
            // Xóa chuyến bay
            $carRental->delete();
            return true;
        }
        Log::info("Không tìm thấy chuyến bay với ID: " . $request->input('id'));
        return false;
    }

    public function update($request, $carRental)
    {
        try{
            $carRental->fill($request->input());
            $carRental->save();
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