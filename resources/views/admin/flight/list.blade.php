@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Mã Chuyến Bay</th>
                <th>Số hiệu chuyến bay</th>
                <th>Sân bay khởi hành</th>
                <th>Sân bay hạ cánh</th>
                <th>Thời gian khởi hành</th>
                <th>Thời gian hạ cánh</th>
                <th>Giá vé</th>
                <th>Số lượng ghế</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flights as $flight)
                <tr>
                    <td>{{ $flight->id_cb }}</td>
                    <td>{{ $flight->chuyenbay }}</td>
                    <td>{{ $flight->quangduong->diemkhoihanh }}</td>
                    <td>{{ $flight->quangduong->diemketthuc }}</td>
                    <td>{{ $flight->thoigianbd }}</td>
                    <td>{{ $flight->thoigiankt }}</td>
                    <td>
                        @foreach ($flight->banggia as $banggia)
                            {{ $banggia->hangcho->hang }}: {{ number_format($banggia->gia, 0, ',', '.') }} VND <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($flight->banggia as $banggia)
                            {{ $banggia->hangcho->hang }}: {{ $banggia->socho }} <br>
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/flights/edit/{{ $flight->id_cb }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="removeRow('{{ $flight->id_cb }}', '/admin/flights/destroy')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $flights->links('admin.flight.my-paginate') }}
@endsection
