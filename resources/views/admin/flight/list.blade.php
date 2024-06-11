@extends('admin.main')



@section('content')
    <table class = "table">
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
                <th style = "width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flights as $key => $flight)
                <tr>
                    <td>{{ $flight->id}}</td>
                    <td>{{ $flight->flight_number }}</td>
                    <td>{{ $flight->departure_airport}}</td>
                    <td>{{ $flight->arrival_airport }}</td>
                    <td>{{ $flight->departure_time }}</td>
                    <td>{!! $flight->arrival_time !!}</td>
                    <td>{{ number_format($flight->price, 0, ',', '.') }}</td>
                    <th>{{ $flight->availability }}</th>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/flights/edit/{{$flight->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="removeRow('{{$flight->id}}', '/admin/flights/destroy')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $flights->links('admin.flight.my-paginate') }}
@endsection
