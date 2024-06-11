<?php

namespace App\Http\Controllers\Admin;

use App\Models\Flight;
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
       return view('admin.flight.list', [
           'title' => 'Danh sách chuyến bay',
           'flights' => $this->flightAdminService->get()
       ]);
    }

    public function create(MenuService $menuService)
    {
        $this->menuService = $menuService;
        return view('admin.flight.add', [
            'title' => 'Danh sách chuyến bay mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(FlightRequest $request)
    {
        $this->flightAdminService->insert($request);

        return redirect()->back();
    }

    public function show(Flight $flight)
    {
        return view('admin.flight.edit', [
            'title' => 'Chỉnh sửa chuyến bay',
            'flight' => $flight
        ]);
    }

    public function update(Request $request,Flight $flight)
    {
        $result = $this->flightAdminService->update($request, $flight);
        if($result){
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $result = $this->flightAdminService->delete($request);

        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json(['error' => true]);
    }


}
