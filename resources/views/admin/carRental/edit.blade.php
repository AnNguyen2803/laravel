@extends('admin.main')

@section('content')

    <form action="" method="POST"><!-- Sử dụng route đúng cho việc thêm mới xe -->
        @csrf

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="car_model">Mã thuê xe</label>
                        <input type="text" name="id" value="{{ $carRental->id }}" class="form-control" id="car_model" placeholder="Nhập model xe">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="car_model">Model Xe</label>
                        <input type="text" name="car_model" value="{{ $carRental->car_model }}" class="form-control" id="car_model" placeholder="Nhập model xe">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price_per_day">Giá Thuê mỗi Ngày</label>
                        <input type="text" name="price_per_day" value="{{ $carRental->price_per_day }}" class="form-control" id="price_per_day" placeholder="Nhập giá thuê mỗi ngày">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="availability">Số Lượng Xe Trống</label>
                        <input type="number" name="availability" value="{{ $carRental->availability }}" class="form-control" id="availability" placeholder="Nhập số lượng xe trống">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="provider_id">Nhà Cung Cấp</label>
                    <select name="provider_id" id="provider_id" class="form-control">
                        <option value="PRO006">Thuê Xe của Rent-A-Car Co.</option>
                        <option value="PRO007">Thuê Xe sang trọng của Rent-A-Car Co.</option>
                        <option value="PRO008">Thuê Xe giá rẻ của Rent-A-Car Co.</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>
@endsection
