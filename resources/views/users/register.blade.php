<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body class="hold-transition login-page" style="background: url(&quot;https://nordicapis.com/wp-content/uploads/10-APIs-For-Flights-Prices-and-Booking.jpg&quot;) no-repeat center center fixed; background-size: cover;">
<div class="login-box" style="margin: auto; max-width: 400px;">
  <div class="login-logo" style="margin-bottom: 10px;">
    <a href="" style="color: #333; text-decoration: none;"><b>User</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <div class="card-body login-card-body" style="background: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px;">
      <p class="login-box-msg" style="font-size: 18px; font-weight: bold; text-align: center;">Đăng ký tài khoản ngay</p>
      @include('admin.alert')
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Tên người dùng" style="border-radius: 5px;">
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: #fff; border-left: none;">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" style="border-radius: 5px;">
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: #fff; border-left: none;">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Mật khẩu" style="border-radius: 5px;">
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: #fff; border-left: none;">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="cpassword" class="form-control" placeholder="Xác nhận mật khẩu" style="border-radius: 5px;">
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: #fff; border-left: none;">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div style="font-size: 14px; margin-bottom: 10px;">Đã có tài khoản? <a href="login" style="color: #007bff; text-decoration: none;">Đăng nhập ngay</a></div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" style="border-radius: 5px;">Đăng ký tài khoản</button>
          </div>
          <!-- /.col -->
        </div>
        @csrf
      </form>
    </div>
  </div>
</div>
@include('admin.footer')
</body>
</html>
