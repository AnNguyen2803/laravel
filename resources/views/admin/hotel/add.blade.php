@extends('admin.main')

@section('head') 
    
@endsection

@section('content')
    <form action="" method="POST">
        @csrf
        <div class="card-body">
            <!-- Tên khách sạn -->
            <div class="form-group">
                <label for="name">Tên Khách Sạn</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Enter hotel name">
            </div>
            
            <!-- Địa điểm -->
            <div class="form-group">
                <label for="location">Địa Điểm</label>
                <input type="text" name="location" value="{{ old('location') }}" class="form-control" id="location" placeholder="Enter location">
            </div>
            
            <!-- Mô tả -->
            <div class="form-group">
                <label for="description">Mô Tả</label>
                <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
            </div>
            
            <!-- Giá mỗi đêm -->
            <div class="form-group">
                <label for="price_per_night">Giá phòng mỗi đêm</label>
                <input type="text" name="price_per_night" value="{{ old('price_per_night') }}" class="form-control" id="price_per_night" placeholder="Enter price per night">
            </div>
            
            <!-- Số lượng phòng trống -->
            <div class="form-group">
                <label for="availability">Phòng trống</label>
                <input type="number" name="availability" value="{{ old('availability') }}" class="form-control" id="availability" placeholder="Enter availability">
            </div>
            
            <!-- Nhà cung cấp -->
            <div class="form-group">
                <label for="provider_id">Nhà Cung Cấp</label>
                <select name="provider_id" id="provider_id" class="form-control">
                    <option value="PR0001">Khách sạn Majestic</option>
                    <option value="PR0002">Khách sạn Metropole</option>
                    <option value="PR0003">Khách sạn Furama</option>
                    <option value="PR0004">Khách sạn Hương Sen</option>
                    <option value="PR0005">Khách sạn Mường Thanh</option>
                    <option value="PR0006">Khách sạn Victoria</option>
                    <option value="PR0007">Khách sạn Imperial</option>
                    <option value="PR0008">Khách sạn Sapa Horizon</option>
                    <option value="PR0009">Khách sạn Paradise</option>
                    <option value="PR0010">Khách sạn Bamboo</option>
                </select>
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