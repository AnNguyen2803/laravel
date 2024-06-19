@extends('admin.main')

@section('head') 
<!-- Thêm các file CSS hay JS cần thiết nếu có -->
@endsection

@section('content')

    <form action="{{ route('admin.flights.update', ['flight' => $flight->id_cb]) }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_cb">Mã chuyến bay</label>
                        <input type="text" name="id_cb" value="{{ $flight->id_cb }}" class="form-control" id="id_cb" placeholder="Nhập mã chuyến bay">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="chuyenbay">Số Chuyến Bay</label>
                        <input type="text" name="chuyenbay" value="{{ $flight->chuyenbay }}" class="form-control" id="chuyenbay" placeholder="Nhập số chuyến bay">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="diemkhoihanh">Sân Bay Xuất Phát</label>
                        <input type="text" name="diemkhoihanh" value="{{ $flight->quangduong->diemkhoihanh }}" class="form-control" id="diemkhoihanh" placeholder="Nhập sân bay xuất phát">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="diemketthuc">Sân Bay Đến</label>
                        <input type="text" name="diemketthuc" value="{{ $flight->quangduong->diemketthuc }}" class="form-control" id="diemketthuc" placeholder="Nhập sân bay đến">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="thoigianbd">Thời Gian Xuất Phát</label>
                        <input type="datetime-local" name="thoigianbd" value="{{ $flight->thoigianbd }}" class="form-control" id="thoigianbd">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="thoigiankt">Thời Gian Đến</label>
                        <input type="datetime-local" name="thoigiankt" value="{{ $flight->thoigiankt }}" class="form-control" id="thoigiankt">
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($flight->banggia as $banggia)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gia_{{ $banggia->id_hangcho }}">Giá ({{ $banggia->hangcho->hang }})</label>
                            <input type="text" name="gia_{{ $banggia->id_hangcho }}" value="{{ $banggia->gia }}" class="form-control" id="gia_{{ $banggia->id_hangcho }}" placeholder="Nhập giá">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="socho_{{ $banggia->id_hangcho }}">Số Lượng Chỗ Trống ({{ $banggia->hangcho->hang }})</label>
                            <input type="number" name="socho_{{ $banggia->id_hangcho }}" value="{{ $banggia->socho }}" class="form-control" id="socho_{{ $banggia->id_hangcho }}" placeholder="Nhập số lượng chỗ trống">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="id_hang">Hãng máy bay</label>
                    <select name="id_hang" id="id_hang" class="form-control">
                        <option value="1" {{ $flight->id_hang == 1 ? 'selected' : '' }}>Bamboo Airways</option>
                        <option value="2" {{ $flight->id_hang == 2 ? 'selected' : '' }}>Vietnam Airlines</option>
                        <option value="3" {{ $flight->id_hang == 3 ? 'selected' : '' }}>VietJet Air</option>
                        <option value="4" {{ $flight->id_hang == 4 ? 'selected' : '' }}>Vietravel Airlines</option>
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
<!-- Thêm các file JS cần thiết nếu có -->
@endsection
