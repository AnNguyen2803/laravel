<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xác nhận đặt vé</title>
    <style>
        /* Reset styles */
        body, h1, p, ul, li {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
            margin-bottom: 20px;
        }
        li {
            margin-bottom: 10px;
        }
        p {
            margin-bottom: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cảm ơn bạn đã đặt vé!</h1>
        <p>Thông tin chuyến bay của bạn như sau:</p>
        <ul>
            <li>Mã chuyến bay: {{ $flightDetails['machuyenbay'] }}</li>
            <li>Hãng vé: {{ $flightDetails['hangve'] }}</li>
            <li>Hãng: {{ $flightDetails['hang'] }}</li>
            <li>Thời gian bắt đầu: {{ $flightDetails['thoigianbd'] }}</li>
            <li>Thời gian kết thúc: {{ $flightDetails['thoigiankt'] }}</li>
            <li>Giá: {{ $flightDetails['gia'] }}</li>
            <li>Điểm khởi hành: {{ $flightDetails['diemkhoihanh'] }}</li>
            <li>Điểm kết thúc: {{ $flightDetails['diemketthuc'] }}</li>
            <li>Hành lý xách tay: {{ $flightDetails['hanhlyxachtay'] }}</li>
            <li>Hành lý ký gửi: {{ $flightDetails['hanhlykygui'] }}</li>
        </ul>
        <p>Thông tin hành khách:</p>
        <ul>
            @foreach ($passengerInfo as $passenger)
                <li>{{ $passenger['danhXung'] }} {{ $passenger['passengerName'] }}, Ngày sinh: {{ $passenger['passengerBirthday'] }}, Quốc tịch: {{ $passenger['passengerNationality'] }}</li>
            @endforeach
        </ul>
        <p>Chúc bạn có một chuyến đi vui vẻ!</p>
    </div>
    <div class="footer">
        <p>Email này được gửi tự động. Vui lòng không trả lời email này.</p>
    </div>
</body>
</html>
