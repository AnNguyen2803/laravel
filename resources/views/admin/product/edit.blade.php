@extends('admin.main')

@section('head') 
    <script src="/ckeditor/ckeditor.js"></script>
@endsection


@section('content')
    <form action method = "POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                        <input type="text" name="name" value = "{{ $product->name}}" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="parent_id">Tên Danh Mục</label>
                        <select id="parent_id" class="form-control" name="menu_id">
                            <option value="0">Danh Mục Cha</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" {{$product->menu_id == $menu->id ? 'selected' : ''}}>{{ $menu->name }}

                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá Gốc</label>
                        <input type="number" name="price" value = "{{ $product->price}}" class="form-control" id="exampleInputEmail1" placeholder="Nhập Giá gốc">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá Giảm</label>
                        <input type="number" name="price_sale" class="form-control" value = "{{ $product->price_sale}}" id="exampleInputEmail1" placeholder="Nhập Giá Giảm">
                    </div>
                </div>
                
            </div>

            <div class="form-group">
                <label>Mô Tả Ngắn</label>
                <textarea name="description" class="form-control">{{ $product->description}}</textarea>
            </div>
            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" id = "content" class="form-control">{{ $product->content}}</textarea>
            </div>

            <div class = "form-group">
                <label for="menu" >Ảnh sản phẩm</label>
                    <input type="file" name = "thumb" class = "form-control" id = "upload">
                    <input type="hidden" name = "thumb" id = "thumb" value = "{{$product->thumb}}">
                <div id = "image_show">
                    <a href="" target="_blank">
                        <img src = "{{$product->thumb}}" width= "100px">
                    </a>
                </div>
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value= "1" type ="radio" id="active" name ="active" 
                        {{$product->active == 1 ? 'checked' : ''}}
                    >
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value = "0" type="radio" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection