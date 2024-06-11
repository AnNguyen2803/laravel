<?php 

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Str;
use Session;
use Log;
use Storage;
class SliderService
{
    public function insert($request)
    {
        try {
            //$request->except('_token');
            Slider::create($request->input());
            Session::flash('success', 'Thêm Slider mới thành công');

        }catch(\Exception $err)
        {
            Session::flash('error', 'Thêm Slider Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }
    public function get()
    {
        return Slider::orderByDesc('id')->paginate(15);
    }

    public function update($request,Slider $slider)
    {
        try{
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Cập nhật Slider thành công');
        } catch(\Exception $err)
        {
            Session::flash('error', 'Cập nhật slider lỗi');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $slider = Slider::where('id', $request->input('id'))->first();
        if($slider){
            $path = str_replace('storage', 'public', $slider->thumb);
            Storage::delete($path);
            $slider->delete();
            return true;
        }

        return false;
    }

}

?>