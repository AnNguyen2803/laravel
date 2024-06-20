<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChuyenBay;
use App\Models\Hang;
use App\Models\Quangduong;
use App\Models\Hangcho;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Flight\CreateFormRequest;
use App\Http\Requests\Flight\FlightRequest;
use App\Http\Services\Flight\FlightAdminService;
use App\Http\Services\Menu\MenuService;


class FlightController extends Controller
{
    public function __construct(FlightAdminService $flightAdminService)
    {
        $this->flightAdminService = $flightAdminService;
    }

    public function index()
    {
        $flights = $this->flightAdminService->get();

       return view('admin.flight.list', [
           'title' => 'Danh sách chuyến bay',
           'flights' => $this->flightAdminService->get()
       ]);
    }
    
    public function create()
    {
        $hangs = Hang::all();
        $quangduongs = Quangduong::all();
        $hangchos = Hangcho::all();
        $title = "Thêm chuyến bay mới";
        return view('admin.flight.add', compact('hangs', 'quangduongs', 'hangchos', 'title'));
    }

    public function store(FlightRequest $request)
    {
        $result = $this->flightAdminService->insert($request);

        if($result){
            return redirect()->back();
        }
    }

    public function show(Chuyenbay $flight)
    {
        return view('admin.flight.edit', [
            'title' => 'Chỉnh sửa chuyến bay',
            'flight' => $flight->load('quangduong', 'banggia.hangcho')
        ]);
    }

    public function update(Request $request,Chuyenbay $flight)
    {
        $result = $this->flightAdminService->update($request, $flight);
        if($result){
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $result = $this->flightAdminService->delete($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công chuyến bay'
            ]);
        }

        return response()->json(['error' => true]);
    }


}
