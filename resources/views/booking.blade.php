<div class="col-lg-12 col-md-10 banner-right" style="padding-top: 50px">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true"><i class="fa-solid fa-plane"></i> Vé máy bay</a>
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
                        <div data-value="Sân bay Nội Bài, Hà Nội, Việt Nam - HAN"><i class="fa-solid fa-plane-up"></i>Sân bay Nội Bài, Hà Nội, Việt Nam - HAN</div>
                        <div data-value="Sân bay Tân Sơn Nhất, Hồ Chí Minh, Việt Nam - SGN"><i class="fa-solid fa-plane-up"></i>Sân bay Tân Sơn Nhất, Hồ Chí Minh, Việt Nam - SGN</div>
                        <div data-value="Sân bay Đà Nẵng, Việt Nam - DAD"><i class="fa-solid fa-plane-up"></i>Sân bay Đà Nẵng, Việt Nam - DAD</div>
                        <div data-value="Sân bay Phú Quốc, Phú Quốc, Việt Nam - PQC"><i class="fa-solid fa-plane-up"></i>Sân bay Phú Quốc, Phú Quốc, Việt Nam - PQC</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="to" class="form-label">
                        <i class="fa-solid fa-plane-arrival"></i> Sân bay đến
                    </label>
                    <input type="text" class="form-control" id="to" name="to" placeholder="To" autocomplete="off">
                    <div id="to-suggestions" class="suggestions">
                    <div data-value="Sân bay Nội Bài, Hà Nội, Việt Nam - HAN"><i class="fa-solid fa-plane-up"></i>Sân bay Nội Bài, Hà Nội, Việt Nam - HAN</div>
                        <div data-value="Sân bay Tân Sơn Nhất, Hồ Chí Minh, Việt Nam - SGN"><i class="fa-solid fa-plane-up"></i>Sân bay Tân Sơn Nhất, Hồ Chí Minh, Việt Nam - SGN</div>
                        <div data-value="Sân bay Đà Nẵng, Việt Nam - DAD"><i class="fa-solid fa-plane-up"></i>Sân bay Đà Nẵng, Việt Nam - DAD</div>
                        <div data-value="Sân bay Phú Quốc, Phú Quốc, Việt Nam - PQC"><i class="fa-solid fa-plane-up"></i>Sân bay Phú Quốc, Phú Quốc, Việt Nam - PQC</div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="from" class="form-label">Ngày Đi</label>
                    <input type="date" class="form-control" name="start" placeholder="Start" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start'" id = "start" required = "true">
                </div>
                <div class="col-md-6">
                    <div class = "d-flex align-items-center">
                    <label for="return-checkbox" class="form-label">Khứ hồi</label>
                    <input type="checkbox" id="return-checkbox">
                    </div>
                    <input type="date" class="form-control disabled-input" name="return" placeholder="Return" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return'" id = "return" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="to" class="form-label">
                    <i class="fa-solid fa-child"></i> Người lớn
                    </label>    
                    <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults'" value = "1">
                </div>
                <div class="col-md-6">
                    <label for="to" class="form-label">
                    <i class="fa-solid fa-baby"></i> Trẻ em
                    </label>
                    <input type="number" min="0" max="20" class="form-control" name="child" placeholder="Child" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child'" value = "0">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="class" class="form-label">Loại Chuyến Bay</label>
                    <select class="form-control" id="class" name="class">
                        <option value="Phổ thông" selected>Phổ thông</option>
                        <option value="Thương gia">Thương gia</option>
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

    </div>			  	
        </div>

    </div>
</div>