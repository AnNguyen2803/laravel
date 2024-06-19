@extends('admin.main')

@section('content')
    <h2>Chỉnh sửa vé: {{ $ticket->madatcho }}</h2>
    <form action="{{ route('admin.transaction.update', $ticket->madatcho) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="danhxung">Danh xưng</label>
            <input type="text" class="form-control" id="danhxung" name="danhxung" value="{{ $ticket->danhxung }}" required>
        </div>
        <div class="form-group">
            <label for="Ho">Họ</label>
            <input type="text" class="form-control" id="Ho" name="Ho" value="{{ $ticket->Ho }}" required>
        </div>
        <div class="form-group">
            <label for="Tendemvaten">Tên đệm và tên</label>
            <input type="text" class="form-control" id="Tendemvaten" name="Tendemvaten" value="{{ $ticket->Tendemvaten }}" required>
        </div>
        <div class="form-group">
            <label for="ngaysinh">Ngày sinh</label>
            <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" value="{{ $ticket->ngaysinh }}" required>
        </div>
        <div class="form-group">
            <label for="quoctich">Quốc tịch</label>
            <input type="text" class="form-control" id="quoctich" name="quoctich" value="{{ $ticket->quoctich }}" required>
        </div>
        <div class="form-group">
            <label for="tinhtrangthanhtoan">Tình trạng thanh toán</label>
            <select class="form-control" id="tinhtrangthanhtoan" name="tinhtrangthanhtoan" required>
                <option value="chưa thanh toán" {{ $ticket->tinhtrangthanhtoan == 'Chưa thanh toán' ? 'selected' : '' }}>Chưa thanh toán</option>
                <option value="đã thanh toán" {{ $ticket->tinhtrangthanhtoan == 'Đã thanh toán' ? 'selected' : '' }}>Đã thanh toán</option>
                <option value="chờ xác nhận" {{ $ticket->tinhtrangthanhtoan == 'Chờ xác nhận' ? 'selected' : '' }}>Chờ xác nhận</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
