<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt chỗ của tôi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #a1c4fd, #c2e9fb);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 40px;
        }
        .ticket {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            margin: 15px 0;
            background: linear-gradient(to right, #d4fc79, #96e6a1);
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }
        .ticket.expired {
            background: linear-gradient(to right, #ffecd2, #fcb69f);
            color: #333;
        }
        .ticket-details {
            flex: 1;
            padding-right: 20px;
        }
        .ticket-details p {
            margin: 8px 0;
            font-size: 16px;
        }
        .ticket-details p strong {
            color: #555;
        }
        .actions {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .btn {
            padding: 10px 20px;
            margin: 5px 0;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-primary {
            background-color: #007bff;
            color: #ffffff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .btn-secondary {
            background-color: #6c757d;
            color: #ffffff;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }
        .btn-danger {
            background-color: #dc3545;
            color: #ffffff;
        }
        .btn-danger:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }
        .btn[disabled] {
            background-color: #adb5bd;
            cursor: not-allowed;
        }
        .back-button {
            display: block;
            text-align: center;
            margin: 30px 0;
        }
        .back-button button {
            font-size: 16px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Đặt chỗ của tôi</h1>
        @if ($bookings->isEmpty())
            <p>Bạn chưa có vé máy bay nào.</p>
        @else
            @foreach ($bookings as $booking)
                @php
                    $isExpired = $booking->thoigiankt->lt($now);
                @endphp
                <div class="ticket {{ $isExpired ? 'expired' : '' }}">
                    <div class="ticket-details">
                        <p><strong>Mã đặt chỗ:</strong> {{ $booking->madatcho }}</p>
                        <p><strong>Chuyến bay:</strong> {{ $booking->chuyenbay }}</p>
                        <p><strong>Thời gian bắt đầu:</strong> {{ $booking->thoigianbd->format('d/m/Y H:i') }}</p>
                        <p><strong>Thời gian kết thúc:</strong> {{ $booking->thoigiankt->format('d/m/Y H:i') }}</p>
                        <p><strong>Giá vé:</strong> {{ $booking->gia }}</p>
                        <p><strong>Hạng ghế:</strong> {{ $booking->hangghe }}</p>
                        <p><strong>Ngày đặt:</strong> {{ $booking->ngaydat }}</p>
                        <p><strong>Tình trạng thanh toán:</strong> {{ $booking->tinhtrangthanhtoan }}</p>
                    </div>
                    <div class="actions">
                        @if ($isExpired)
                            <button class="btn btn-secondary" disabled>Hủy</button>
                        @else
                            <form action="{{ url('/cancel-booking', ['id' => $booking->madatcho]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hủy</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
        <div class="back-button">
            <button class="btn btn-primary" onclick="goBack()">Quay lại</button>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>
