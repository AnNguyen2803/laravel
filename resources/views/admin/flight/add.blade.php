@extends('admin.main')

@section('head')
@endsection

@section('content')
<form action="{{ route('flights.store') }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id">Mã chuyến bay</label>
                    <input type="text" name="id" value="{{ old('id') }}" class="form-control" id="id" placeholder="Nhập mã chuyến bay">
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
                    <label for="provider_id">Hãng Máy Bay</label>
                    <select name="provider_id" id="provider_id" class="form-control">
                        @foreach($hangs as $hang)
                            <option value="{{ $hang->id_hang }}">{{ $hang->tenhang }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="departure_id">Điểm Khởi Hành</label>
                    <select name="departure_airport" id="departure_id" class="form-control">
                        @foreach($quangduongs as $quangduong)
                            <option value="{{ $quangduong->diemkhoihanh }}">{{ $quangduong->diemkhoihanh }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="arrival_id">Điểm Kết Thúc</label>
                    <select name="arrival_airport" id="arrival_id" class="form-control">
                        @foreach($quangduongs as $quangduong)
                            <option value="{{ $quangduong->diemketthuc }}">{{ $quangduong->diemketthuc }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($hangchos as $hangcho)
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="hangcho_{{ $hangcho->id_hangcho }}">Hạng Chỗ {{ $hangcho->hang }}</label>
                        <input type="number" name="hangcho[{{ $hangcho->id_hangcho }}][availability]" value="{{ old('hangcho.'.$hangcho->id_hangcho.'.availability') }}" class="form-control" id="hangcho_{{ $hangcho->id_hangcho }}" placeholder="Số lượng chỗ trống" min="0">
                        <input type="text" name="hangcho[{{ $hangcho->id_hangcho }}][price]" value="{{ old('hangcho.'.$hangcho->id_hangcho.'.price') }}" class="form-control" id="hangcho_{{ $hangcho->id_hangcho }}" placeholder="Giá">
                    </div>
                </div>
            @endforeach
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
