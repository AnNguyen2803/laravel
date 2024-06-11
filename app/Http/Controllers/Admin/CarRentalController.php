<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
//use App\Http\Requests\CarRental\CreateFormRequest;
use App\Http\Requests\CarRental\CarRentalRequest;
use App\Http\Services\CarRental\CarRentalAdminService;
use App\Http\Services\Menu\MenuService;
use App\Models\CarRental;
class CarRentalController extends Controller
{
    public function __construct(CarRentalAdminService $carRentalAdminService)
    {
        $this->carRentalAdminService = $carRentalAdminService;
    }

    public function create(MenuService $menuService)
    {
        $this->menuService = $menuService;
        return view('admin.carRental.add', [
            'title' => 'Danh sách xe thuê',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CarRentalRequest $request)
    {
        $result = $this->carRentalAdminService->insert($request);

        if($result){
            return redirect()->back();
        }
    }

    public function index()
    {
       return view('admin.carRental.list', [
           'title' => 'Danh sách các xe cho thuê',
           'carRentals' => $this->carRentalAdminService->get()
       ]);
    }

    public function show($id)
    {
        $carRental = CarRental::findOrFail($id);
        return view('admin.carRental.edit', [
            'title' => 'Chỉnh sửa chuyến bay',
            'carRental' => $carRental
        ]);
    }
    public function update(Request $request,$id)
    {
        $carRental = CarRental::findOrFail($id);
        $result = $this->carRentalAdminService->update($request, $carRental);
        if($result){
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $result = $this->carRentalAdminService->delete($request);

        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
