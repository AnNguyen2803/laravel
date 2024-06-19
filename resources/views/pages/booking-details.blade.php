<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xác nhận thông tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:history.back()">Quay lại</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ms-auto">
                    <div class="d-flex flex-row align-items-center gap-2">
                        <div class="p-2 fw-semibold text-primary">
                            <i class="bi bi-1-circle-fill"></i>
                            Đặt vé
                        </div>
                        <i class="bi bi-arrow-right"></i>
                        <div class="p-2 fw-semibold">
                            <i class="bi bi-2-circle-fill"></i>
                            Thanh toán
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main -->
    <main class="bg-body-tertiary">
    <div class="container-md py-5">
        <div class="row g-0">
            <form class="row g-0" action="{{ route('payment') }}" method = "post">
                <div class="col-lg-7 col-xl-8 p-3 mt-1">
                    <div class="row">
                        <div class="col-xl-12">
                            <h4 class="mb-3 fw-bold">Thông tin liên hệ</h4>
                            <div class="card border-0 p-4">
                                <h6 class="mb-3 pb-3 border-bottom">Thông tin liên hệ (nhận vé/phiếu thanh toán)</h6>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label text-secondary fw-semibold">Họ (vd: Nguyen)<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="firstName" name="Ho" value="@auth {{ isset(Auth::user()->name) ? explode(' ', Auth::user()->name)[0] : '' }} @endauth" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label text-secondary fw-semibold">Tên Đệm & Tên (vd: Thi Ngoc Anh)<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="lastName" name="Tendemvaten" value="@auth {{ isset(Auth::user()->name) ? implode(' ', array_slice(explode(' ', Auth::user()->name), 1)) : '' }} @endauth" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="phoneNumber" class="form-label text-secondary fw-semibold">Điện thoại di động<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="phoneNumber" name="sdt" value="@auth {{ isset(Auth::user()->phone) ? Auth::user()->phone : '' }} @endauth" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="email" class="form-label text-secondary fw-semibold">Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" value="@auth {{ isset(Auth::user()->email) ? Auth::user()->email : '' }} @endauth" required>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-xl-12 mt-5">
                            <h4 class="mb-3 fw-bold">Thông tin hành khách</h4>
                            @for ($i = 0; $i < $total_p; $i++)
                                <div class="card border-0 p-4 mb-3">
                                    <h6 class="mb-3 pb-3 border-bottom">Hành khách {{ $i + 1 }}</h6>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label for="danhxung_{{ $i }}" class="form-label text-secondary fw-semibold">Danh xưng<span class="text-danger">*</span></label>
                                            <select class="form-select" id="danhxung_{{ $i }}" name="danhxung[]">
                                                <option selected></option>
                                                <option value="Ông">Ông</option>
                                                <option value="Bà">Bà</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="passengerFirstName_{{ $i }}" class="form-label text-secondary fw-semibold">Họ (vd: Nguyen)<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="passengerFirstName_{{ $i }}" name="passengerFirstName[]" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="passengerLastName_{{ $i }}" class="form-label text-secondary fw-semibold">Tên Đệm & Tên (vd: Thi Ngoc Anh)<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="passengerLastName_{{ $i }}" name="passengerLastName[]" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="birthday_{{ $i }}" class="form-label text-secondary fw-semibold">Ngày sinh<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="birthday_{{ $i }}" name="birthday[]" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="nationality_{{ $i }}" class="form-label text-secondary fw-semibold">Quốc tịch<span class="text-danger">*</span></label>
                                            <select class="form-select" id="nationality_{{ $i }}" name="nationality[]">
                                                <option selected></option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Eastern-Laos">Eastern-Laos</option>
                                                <option value="Northern-Vietnam">Northern-Vietnam</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            <input type="hidden" name="flight_code" value="{{ $flight->id_cb }}">
                            <input type="hidden" name="depature_name" value="{{ $departure_name }}">
                            <input type="hidden" name="destination_name" value="{{ $destination_name }}">
                            <input type="hidden" name="departure_date" value="{{ $departure_date }}">
                            <input type="hidden" name="departure_time" value="{{ $departure_time }}">
                            <input type="hidden" name="departure_code" value="{{ $departure_code }}">
                            <input type="hidden" name="arrival_time" value="{{ $arrival_time }}">
                            <input type="hidden" name="destination_code" value="{{ $destination_code }}">
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            @csrf
                            <button class="btn btn-success mt-2 fw-semibold px-4" type="submit">
                                Tiếp tục
                                <i class="bi bi-arrow-right fw-bold pt-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4 p-3 mt-1">
                    <div class="card border-0 p-4">
                        <div class="d-flex gap-2 align-items-center pb-3 border-bottom">
                            <h6 class="mb-0">{{ $departure_name }}</h6>
                            <i class="bi bi-arrow-right fw-bold"></i>
                            <h6 class="mb-0">{{ $destination_name }}</h6>
                        </div>
                        <div class="pt-3">
                            <h6>Thời gian khởi hành • {{ $departure_date }}</h6>
                        </div>
                        <div class="d-flex gap-4 text-center mt-3">
                            <div>
                                <h6>{{$departure_time}}</h6>
                                <p>{{ $departure_code }}</p>
                            </div>
                            <div>
                                <i class="bi bi-arrows w-100" style="width: 100px;"></i>
                                <!-- <p>Khứ hồi</p> -->
                            </div>
                            <div>
                                <h6>{{$arrival_time}}</h6>
                                <p>{{ $destination_code }}</p>
                            </div>
                        </div>
                        <div class="text-success">
                            <i class="bi bi-check-circle-fill"></i>
                            <span class="fw-semibold">Có thể hoàn vé</span>
                        </div>
                        <div class="text-success">
                            <i class="bi bi-check-circle-fill"></i>
                            <span class="fw-semibold">Có áp dụng đổi lịch bay</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>