<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banggia;
use App\Models\Datvemaybay;
use App\Models\Chuyenbay;


class TransactionController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu từ bảng datvemaybay, banggia và hangcho
        $tickets = Datvemaybay::join('banggia', 'datvemaybay.id_cb', '=', 'banggia.id_cb')
            ->join('hangcho', 'banggia.id_hangcho', '=', 'hangcho.id_hangcho')
            ->select(
                'datvemaybay.madatcho',
                'datvemaybay.id_kh',
                'datvemaybay.id_cb',
                'datvemaybay.danhxung',
                'datvemaybay.Ho',
                'datvemaybay.Tendemvaten',
                'datvemaybay.ngaysinh',
                'datvemaybay.quoctich',
                'datvemaybay.tinhtrangthanhtoan',
                'datvemaybay.ngaydat',
                'banggia.socho',
                'banggia.gia',
                'hangcho.hang'
            )
            ->paginate(10);
        $title = "Danh sách giao dịch";
        return view('admin.transaction.list', compact('tickets' ,'title'));
    }
    public function edit($madatcho)
    {
        // Lấy dữ liệu của vé cần chỉnh sửa
        $ticket = Datvemaybay::where('madatcho', $madatcho)
            ->join('banggia', 'datvemaybay.id_cb', '=', 'banggia.id_cb')
            ->join('hangcho', 'banggia.id_hangcho', '=', 'hangcho.id_hangcho')
            ->select(
                'datvemaybay.madatcho',
                'datvemaybay.id_kh',
                'datvemaybay.id_cb',
                'datvemaybay.danhxung',
                'datvemaybay.Ho',
                'datvemaybay.Tendemvaten',
                'datvemaybay.ngaysinh',
                'datvemaybay.quoctich',
                'datvemaybay.tinhtrangthanhtoan',
                'datvemaybay.ngaydat',
                'banggia.socho',
                'banggia.gia',
                'hangcho.hang',
                'hangcho.id_hangcho'
            )
            ->first();

        if (!$ticket) {
            return redirect()->route('admin.transaction.list')->with('error', 'Vé không tồn tại');
        }
        $title = "Chỉnh sửa đặt vé";

        return view('admin.transaction.edit', compact('ticket', 'title'));
    }
    public function update(Request $request, $madatcho)
    {
        $request->validate([
            'danhxung' => 'required|string|max:10',
            'Ho' => 'required|string|max:10',
            'Tendemvaten' => 'required|string|max:30',
            'ngaysinh' => 'required|date',
            'quoctich' => 'required|string|max:20',
            'tinhtrangthanhtoan' => 'required|string|max:30',
            // Thêm các trường cần validate khác nếu cần
        ]);

        // Lấy vé cần cập nhật
        $ticket = Datvemaybay::where('madatcho', $madatcho)->first();
        if (!$ticket) {
            return redirect()->route('admin.transaction.list')->with('error', 'Vé không tồn tại');
        }

        // Cập nhật thông tin vé
        $ticket->danhxung = $request->input('danhxung');
        $ticket->Ho = $request->input('Ho');
        $ticket->Tendemvaten = $request->input('Tendemvaten');
        $ticket->ngaysinh = $request->input('ngaysinh');
        $ticket->quoctich = $request->input('quoctich');
        $ticket->tinhtrangthanhtoan = $request->input('tinhtrangthanhtoan');
        $ticket->save();

        return redirect('admin/transaction/list')->with('success', 'Cập nhật vé thành công');
    }

    public function destroy(Request $request)
    {
        \Log::info($request->all());

        $madatcho = $request->input('id_cb');
        \Log::info('Mã đặt chỗ: ' . $madatcho);

        $ticket = Datvemaybay::where('madatcho', $madatcho)->first();

        if (!$ticket) {
            \Log::info('Vé không tồn tại');
            return response()->json(['error' => true, 'message' => 'Vé không tồn tại'], 404);
        }

        $ticket->delete();
        \Log::info('Vé đã bị xóa');

        return response()->json(['error' => false, 'message' => 'Xóa vé thành công']);
    }

}
