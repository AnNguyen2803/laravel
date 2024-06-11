<div class="col-lg-12 col-md-10 banner-right" style="padding-top: 50px">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true"><i class="fa-solid fa-plane"></i> Vé máy bay</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false">Khách sạn</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="holiday-tab" data-toggle="tab" href="#holiday" role="tab" aria-controls="holiday" aria-selected="false"><i class="fa-solid fa-car"></i> Cho thuê xe</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
        <form class="form-wrap" method="post" action="{{ route('booking.submit') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="from" class="form-label">
                        <i class="fa-solid fa-plane-departure"></i> Sân khởi hành
                    </label>
                    <input type="text" class="form-control" id="from" name="from" placeholder="From" autocomplete="off">
                    <div id="from-suggestions" class="suggestions">
                        <div data-value="Nội bài (Hà Nội)"><i class="fa-solid fa-plane-up"></i> Nội bài(Hà Nội)</div>
                        <div data-value="Tân Sơn Nhất (Tp.Hồ Chí Minh)"><i class="fa-solid fa-plane-up"></i> Tân Sơn Nhất (Tp.Hồ Chí Minh)</div>
                        <div data-value="Đà Nẵng"><i class="fa-solid fa-plane-up"></i> Đà Nẵng</div>
                        <div data-value="Phú Quốc"><i class="fa-solid fa-plane-up"></i> Phú Quốc</div>
                        <div data-value="Cam Ranh"><i class="fa-solid fa-plane-up"></i> Cam Ranh</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="to" class="form-label">
                        <i class="fa-solid fa-plane-arrival"></i> Sân bay đến
                    </label>
                    <input type="text" class="form-control" id="to" name="to" placeholder="To" autocomplete="off">
                    <div id="to-suggestions" class="suggestions">
                        <div data-value="Nội bài (Hà Nội)"> <i class="fa-solid fa-plane-up"></i>Nội bài(Hà Nội)</div>
                        <div data-value="Tân Sơn Nhất (Tp.Hồ Chí Minh)"><i class="fa-solid fa-plane-up"></i> Tân Sơn Nhất (Tp.Hồ Chí Minh)</div>
                        <div data-value="Đà Nẵng"><i class="fa-solid fa-plane-up"></i> Đà Nẵng</div>
                        <div data-value="Phú Quốc"><i class="fa-solid fa-plane-up"></i> Phú Quốc</div>
                        <div data-value="Cam Ranh"><i class="fa-solid fa-plane-up"></i> Cam Ranh</div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="from" class="form-label">Ngày Đi</label>
                    <input type="date" class="form-control" name="start" placeholder="Start" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start'" id = "start">
                </div>
                <div class="col-md-6">
                    <div class = "d-flex align-items-center">
                    <label for="return-checkbox" class="form-label">Khứ hồi</label>
                    <input type="checkbox" id="return-checkbox">
                    </div>
                    <input type="date" class="form-control disabled-input" name="return" placeholder="Return" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return'" id = "return">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="to" class="form-label">
                    <i class="fa-solid fa-child"></i> Người lớn
                    </label>    
                    <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults'">
                </div>
                <div class="col-md-6">
                    <label for="to" class="form-label">
                    <i class="fa-solid fa-baby"></i> Trẻ em
                    </label>
                    <input type="number" min="1" max="20" class="form-control" name="child" placeholder="Child" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child'">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="class" class="form-label">Loại Chuyến Bay</label>
                    <select class="form-control" id="class" name="class">
                        <option value="economy" selected>Phổ thông</option>
                        <option value="business">Thương gia</option>
                        <option value="first">Hạng nhất</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button name="submit" class="primary-btn text-uppercase">Tìm kiếm chuyến bay</button>
                </div>
            </div>
        </form>
        </div>
        <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
        <div class="container">
        <form class="form-wrap">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="from" class="form-label">Thành phố, địa điểm hoặc tên khách sạn: </label>
                    <input type="text" class="form-control" name="name" placeholder="From " onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '" autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                    <label for="start" class="form-label">Ngày nhận phòng</label>
                    <input type="date" class="form-control" name="start" placeholder="Start " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
                </div>
                <div class="form-group col-md-4">
                    <label for="return" class="form-label">Ngày trả phòng</label>
                    <input type="date" class="form-control" name="return" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="" class = "form-label">Số lượng người</label>
                    <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Số người " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Số người '">
                </div>
                <div class="form-group col-md-6">
                    <label for="" class = "form-label">Số phòng</label>
                    <input type="number" min="1" max="20" class="form-control" name="quantity-room" placeholder="Số phòng " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Số phòng '">
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <a href="#" class="btn primary-btn btn-block text-uppercase">Tìm kiếm khách sạn</a>
                </div>
            </div>
        </form>
    </div>			  	
        </div>
        <div class="tab-pane fade" id="holiday" role="tabpanel" aria-labelledby="holiday-tab">
        <div class="container">
        <form class="form-wrap">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="from" class="form-label">Địa điểm thuê xe</label>
                    <input type="text" class="form-control" name="name" placeholder="From " onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <label for="start" class="form-label">Ngày bắt đầu</label>
                    <input type="date" class="form-control" name="start" placeholder="Start " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
                </div>
                <div class="form-group col-md-3">
                    <label for="return" class="form-label">Giờ bắt đầu</label>
                    <input type="time" class="form-control" name="return" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                </div>
                <div class="form-group col-md-3">
                    <label for="return" class="form-label">Ngày kết thúc</label>
                    <input type="date" class="form-control" name="return" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                </div>
                <div class="form-group col-md-3">
                    <label for="return" class="form-label">Giờ kết thúc</label>
                    <input type="time" class="form-control" name="return" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <a href="#" class="btn primary-btn btn-block text-uppercase">Tìm kiếm xe</a>
                </div>
            </div>
        </form>			  	
        </div>
    </div>
</div>