<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking Interface</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Arial', sans-serif;
        }
        .header {
            background-color: #007bff;
            border-bottom: 2px solid #0056b3;
            padding: 20px 0;
            color: #fff;
        }
        .header a {
            color: #fff;
        }
        .promo-banner {
            background-color: #eef7ff;
            padding: 10px;
            border: 1px solid #d1eaff;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .promo-banner span {
            font-weight: bold;
        }
        .filter-section {
            margin-bottom: 20px;
        }
        .filter-section h5 {
            margin-bottom: 15px;
        }
        .flight-card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .flight-card:hover {
            transform: scale(1.02);
        }
        .flight-card .details {
            margin-bottom: 10px;
        }
        .flight-card .price {
            font-weight: bold;
            color: #d9534f;
            font-size: 1.2em;
        }
        .search-criteria {
            background-color: #d4edff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .search-criteria h5 {
            margin: 0;
            font-weight: bold;
        }
        .search-criteria p {
            margin: 0;
            color: #666;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-link {
            color: #007bff;
        }
        .btn-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <header class="header">
        <div class="row align-items-center">
            <div class="col-md-2">
                <a href="/"><img src="/template/img/logo.png" alt="Traveloka Logo" class="img-fluid" style="height: 80px;padding-left: 20px;"></a>
            </div>
            <div class="col-md-8">
                <nav class="nav justify-content-center">
                    <!-- Add your navigation items here if needed -->
                </nav>
            </div>
            <div class="col-md-2 text-right">
                @auth
                    <form action="{{ url('/my-bookings') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Đặt chỗ của tôi</button>
                    </form>
                @else
                    <a href="/login" class="btn btn-primary" style="padding-right: 20px;">Đăng nhập</a>
                @endauth
            </div>
        </div>
    </header>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="search-criteria">
                <h5>@if (empty($from) && empty($to))
                    Tất cả chuyến bay trong ngày
                @else
                    {{ $from }} → {{ $to }}
                @endif
                </h5>
                <p>{{ date('l, d F Y', strtotime($startDate)) }} | {{ $total }} người | {{ $class }}</p>
            </div>
            <div class="flight-search-result">
                <div class="d-flex justify-content-between mb-3">
                    <h5>@if (empty($from) && empty($to))
                        Tất cả chuyến bay trong ngày
                    @else
                        {{ $from }} → {{ $to }}
                    @endif
                    </h5>
                    <button class="btn btn-link">Chọn ngày khác</button>
                </div>
                @if ($flights->isEmpty())
                    <p>Không có chuyến bay nào được tìm thấy.</p>
                @else
                    @foreach ($flights as $flight)
                        <div class="flight-card mb-3">
                            <div class="row">
                                <div class="col-md-8 details">
                                    <p><strong>Tên hãng:</strong> {{ $flight->tenhang }}</p>
                                    <p><strong>Điểm khởi hành:</strong> {{ $flight->diemkhoihanh }} - {{ $flight->thoigianbd }}</p>
                                    <p><strong>Điểm kết thúc:</strong> {{ $flight->diemketthuc }} - {{ $flight->thoigiankt }}</p>

                                    
                                    <p><strong>Hạng ghế:</strong> {{ $flight->hang }}</p>
                                </div>
                                <div class="col-md-4 text-right">
                                    <p class="price">{{ number_format($flight->gia, 0, ',', '.') }} VND</p>
                                    <form action="{{ route('booking.process', ['flight_id' => $flight->id_cb]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="flight_id" value="{{ $flight->id_cb }}">
                                        <input type="hidden" name = "total_P" value = "{{ $total }}">
                                        <button type="submit" class="btn btn-primary">Chọn</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
