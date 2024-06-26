@extends('admin.main')

@section('content')
    <h2>Edit User</h2>

    <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Sử dụng method PUT để update người dùng -->

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control">
        </div>

        <div class="form-group">
        <label for="quyen">Quyền</label>
        <select id="quyen" name="quyen" class="form-control">
            <option value="0" {{ $user->quyen == 0 ? 'selected' : '' }}>User</option>
            <option value="1" {{ $user->quyen == 1 ? 'selected' : '' }}>Admin</option>
        </select>
        </div>

        <!-- Các trường dữ liệu khác cần chỉnh sửa -->

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
@endsection
