<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đánh giá</title>
    @include('./head')
    <!-- Link CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        textarea,
        select,
        button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            margin-top: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .back-btn {
            margin-top: 10px;
            text-decoration: none;
            display: inline-block;
            color: #333;
            background-color: #ddd;
            border: 1px solid #ccc;
            padding: 10px 20px;
            border-radius: 4px;
        }

        .back-btn:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Đánh giá của bạn</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Nội dung đánh giá:</label>
                <textarea id="content" name="content" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="rating">Xếp hạng (1 đến 5 sao):</label>
                <select id="rating" name="rating" required>
                    <option value="1">1 sao</option>
                    <option value="2">2 sao</option>
                    <option value="3">3 sao</option>
                    <option value="4">4 sao</option>
                    <option value="5">5 sao</option>
                </select>
            </div>
            <button type="submit" class="btn">Gửi đánh giá</button>
        </form>
        <a href="/" class="back-btn">Quay lại trang chủ</a>
    </div>

</body>
</html>
