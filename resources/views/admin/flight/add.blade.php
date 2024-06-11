@extends('admin.main')

@section('head') 
    
@endsection

@section('content')

    <form action="{{ route('flights.store') }}" method="POST"><!-- Sử dụng route đúng cho việc thêm mới chuyến bay -->
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id">Mã chuyến bay</label>
                        <input type="text" name="id" value="{{ old('id') }}" class="form-control" id="flight_number" placeholder="Nhập số chuyến bay">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="flight_number">Số Chuyến Bay</label>
                        <input type="text" name="flight_number" value="{{ old('flight_number') }}" class="form-control" id="flight_number" placeholder="Nhập số chuyến bay">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="departure_airport">Sân Bay Xuất Phát</label>
                        <input type="text" name="departure_airport" value="{{ old('departure_airport') }}" class="form-control" id="departure_airport" placeholder="Nhập sân bay xuất phát">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="arrival_airport">Sân Bay Đến</label>
                        <input type="text" name="arrival_airport" value="{{ old('arrival_airport') }}" class="form-control" id="arrival_airport" placeholder="Nhập sân bay đến">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="departure_time">Thời Gian Xuất Phát</label>
                        <input type="datetime-local" name="departure_time" value="{{ old('departure_time') }}" class="form-control" id="departure_time">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="arrival_time">Thời Gian Đến</label>
                        <input type="datetime-local" name="arrival_time" value="{{ old('arrival_time') }}" class="form-control" id="arrival_time">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="price" placeholder="Nhập giá">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="availability">Số Lượng Chỗ Trống</label>
                        <input type="number" name="availability" value="{{ old('availability') }}" class="form-control" id="availability" placeholder="Nhập số lượng chỗ trống">
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="airline">Hãng máy bay:</label>
                    <select name="provider_id" id="airline">
                        <option value="PR0001">Vietnam Airlines</option>
                        <option value="PR0002">VietJet Air</option>
                        <option value="PR0003">Bamboo Airways</option>
                        <!-- Thêm các hãng hàng không khác nếu cần -->
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

@section('footer')
    
@endsection