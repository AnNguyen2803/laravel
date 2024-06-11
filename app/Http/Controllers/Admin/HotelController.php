<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
//use App\Http\Requests\CarRental\CreateFormRequest;
use App\Http\Requests\CarRental\CarRentalRequest;
use App\Http\Services\CarRental\CarRentalAdminService;
use App\Http\Services\Menu\MenuService;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function create()
    {
        return view('admin.hotel.add', [
            'title' => 'Danh sách xe thuê',
        ]);
    }
}
