<?php

// app/Http/Controllers/Admin/MainController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banggia;
use App\Models\Datvemaybay;

class MainController extends Controller
{
    public function index()
    {
        $datVeMayBay = Datvemaybay::all();

        $totalTickets = 0;
        $totalAmount = 0;

        foreach ($datVeMayBay as $datVe) {
            $totalTickets += $datVe->countTickets();
            $totalAmount += $datVe->totalAmount();
        }

        $formattedTotalAmount = number_format($totalAmount, 0, ',', '.');

        return view('admin.home', [
            'title' => 'Trang quản trị Admin',
            'totalTickets' => $totalTickets,
            'totalAmount' => $formattedTotalAmount,
        ]);
    }
}

