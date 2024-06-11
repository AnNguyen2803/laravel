@extends('admin.main')



@section('content')
    <table class = "table">
        <thead>
            <tr>
                <th>Mã Thuê Xe</th>
                <th>Tên Model</th>
                <th>Giá thuê mỗi giờ</th>
                <th>Số lượng xe </th>
                <th style = "width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carRentals as $key => $carRental)
                <tr>
                    <td>{{ $carRental->id}}</td>
                    <td>{{ $carRental->car_model }}</td>
                    <td>{{ number_format($carRental->price_per_day, 0, ',', '.') }}</td>
                    <th>{{ $carRental->availability }}</th>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/carRental/edit/{{$carRental->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="removeRow('{{$carRental->id}}', '/admin/carRental/destroy')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $carRentals->links('admin.carRental.my-paginate') }}
@endsection
