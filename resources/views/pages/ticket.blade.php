<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Flight Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .ticket-header {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff; /* Blue color for header text */
        }

        .ticket-header h1 {
            margin: 20px 0;
            font-size: 36px; /* Larger font size */
        }
        .ticket-details {
            margin-bottom: 30px;
            background-color: #f9f9f9; /* Light gray background */
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        .ticket-details p {
            margin: 10px 0;
        }

        .ticket-details p:nth-child(even) {
            background-color: #e9ecef; /* Alternate background color */
            padding: 8px;
            border-radius: 4px;
        }
        .button-container {
            text-align: center;
        }
        .button-container button {
            padding: 12px 24px; /* Increased padding */
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px; /* Slightly larger font */
            transition: background-color 0.3s ease;
        }
        .button-container .home{
            background-color: red;
        }

        .button-container button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        .ticket {
            background-color: #fff;
            max-width: 600px;
            margin: 40px auto; /* Increased top margin */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.15); /* Slightly stronger shadow */
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="ticket-header">
            <h1>Vé máy bay của bạn</h1>
            <p>Cảm ơn đã tin tưởng dịch vụ của chúng tôi!</p>
        </div>
        @foreach ($passengerInfo as $passenger)
        <div class="ticket-details">
            <p><strong>Tên hành khách:</strong> {{ $passenger['danhXung'] }} {{ $passenger['passengerName'] }}</p>
            <p><strong>Mã chuyến bay:</strong> {{ $flightDetails['machuyenbay'] }}</p>
            <p><strong>Sân bay khởi hành:</strong> {{ $flightDetails['diemkhoihanh'] }}</p>
            <p><strong>Sân bay hạ cánh:</strong> {{ $flightDetails['diemketthuc'] }}</p>
            <p><strong>Thời gian khởi hành:</strong> {{ $flightDetails['thoigianbd'] }}</p>
            <p><strong>Thời gian hạ cánh:</strong> {{ $flightDetails['thoigiankt'] }}</p>
            <p><strong>Hạng vé:</strong> {{ $flightDetails['hangve'] }}</p>
            <p><strong>Hãng máy bay:</strong> {{ $flightDetails['hang'] }}</p>
            <p><strong>Hành lý xách tay:</strong> {{ $flightDetails['hanhlyxachtay'] }}</p>
            <p><strong>Hành lý ký gửi:</strong> {{ $flightDetails['hanhlykygui'] }}</p>
            <p><strong>Giá vé:</strong> {{ number_format($flightDetails['gia']) }} VND</p>
        </div>
        @endforeach
        <div class="button-container">
            <button onclick="printTicket()">In vé</button>
            <button onclick="window.location.href='/'" class="home">Trang chủ</button>
        </div>
    </div>

    <script>
        function printTicket() {
            window.print();
        }
    </script>
</body>
</html>
