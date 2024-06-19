@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Mã Đặt Chỗ</th>
                <th>Danh xưng</th>
                <th>Họ</th>
                <th>Tên đệm và tên</th>
                <th>Ngày sinh</th>
                <th>Quốc tịch</th>
                <th>Tình trạng thanh toán</th>
                <th>Ngày đặt</th>
                <th>Hạng chỗ</th>
                <th>Giá vé</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->madatcho }}</td>
                    <td>{{ $ticket->danhxung }}</td>
                    <td>{{ $ticket->Ho }}</td>
                    <td>{{ $ticket->Tendemvaten }}</td>
                    <td>{{ $ticket->ngaysinh }}</td>
                    <td>{{ $ticket->quoctich }}</td>
                    <td>{{ $ticket->tinhtrangthanhtoan }}</td>
                    <td>{{ $ticket->ngaydat }}</td>
                    <td>{{ $ticket->hang }}</td>
                    <td>{{ number_format($ticket->gia, 0, ',', '.') }} VND</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/transaction/edit/{{ $ticket->madatcho }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="removeRow('{{ $ticket->madatcho }}', '/admin/transaction/destroy')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tickets->links('admin.flight.my-paginate') }}
@endsection
