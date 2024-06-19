<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="font-family: Arial, sans-serif; max-width: 400px; margin: 0 auto;">
    <h1 style="font-size: 24px; color: #333; text-align: center;">Chỉnh sửa thông tin cá nhân</h1>
    <form method="POST" action="{{ route('user.updateInformation') }}">
        @csrf

        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; font-size: 16px; color: #666; margin-bottom: 5px;">Tên:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('name')
                <p style="color: red; font-size: 14px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="email" style="display: block; font-size: 16px; color: #666; margin-bottom: 5px;">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('email')
                <p style="color: red; font-size: 14px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Add more fields as needed -->

        <button type="submit" style="background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; display: block; width: 105%; font-size: 16px;">Cập nhật</button>
    </form>
    <a href="/" style="background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; display: block; width: 95%; font-size: 16px;text-align: center;margin-top: 20px;">Quay về trang chủ</a>
</div>

</body>
</html>
