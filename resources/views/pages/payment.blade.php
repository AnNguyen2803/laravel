<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .d-flex{
            align-items: center;
        }
        .d-flex label{
            font-size : 30px;
        }
    </style>
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
                        <div class="p-2 fw-semibold">
                            <i class="bi bi-1-circle-fill"></i>
                            Đặt vé
                        </div>
                        <i class="bi bi-arrow-right"></i>
                        <div class="p-2 fw-semibold text-primary">
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
            <form class="row g-0" id="paymentForm">
                <div class="col-lg-12 col-xl-12 p-3">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card border-0">
                                <div
                                    class="p-4 border-bottom bg-primary rounded-top-3 justify-content-center align-items-center d-flex gap-2">
                                    <h6 class="mb-0 text-white">Đừng lo lắng, giá vẫn giữ nguyên. Hoàn tất thanh toán
                                        của bạn trong
                                    </h6>
                                    <h6 class="mb-0 text-warning" id="countdown">01:00:00</h6>
                                    <i class="bi bi-alarm-fill text-warning"></i>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h4 class="fw-bold mt-3 ms-3">Bạn muốn thanh toán thế nào?</h4>
                                    <img class="mx-3 p-2" src="https://ik.imagekit.io/tvlk/image/imageResource/2023/12/12/1702364449716-d0093df3166e4ba84c56ad9dd75afcda.webp?tr=dpr-2,h-23,q-75" alt="">
                                </div>
                                <div>
                                    <div class="d-flex">
                                        <div>
                                        <div class="d-flex justify-content-between p-4">
                                            <div class="d-flex">
                                                <div class="d-flex">
                                                    <input type="checkbox" id="vietqrCheckbox">
                                                    <label for = "vietqrCheckbox" class="fw-bold ms-1 p-1">VietQR</label>
                                                </div>
                                                <!-- <div class=" bg-warning-subtle text-success mt-1 p-1">Ưu đãi giảm giá</div> -->
                                            </div>
                                            <img class="w-25 p-1 ms-4" src="https://vietqr.io/img/vietqr%20api%20-%20payment%20kit.png" alt="">
                                        </div>
                                        </div>
                                        
                                    </div>
                                    <div class="payment-details" id="vietqrDetails" style="display: none;">
                                        <!-- Nội dung chi tiết cho VietQR -->
                                        <ul class="card border-1 p-4 mx-3 bg-info-subtle">
                                            <li>Đảm bảo bạn có ví điện tử hoặc ứng dụng ngân hàng di động hỗ trợ thanh toán bằng VietQR.</li>
                                            <li>Mã QR sẽ xuất hiện sau khi bạn nhấp vào nút 'Thanh toán'. Chỉ cần lưu hoặc chụp màn hình mã QR để hoàn tất thanh toán của bạn trong thời hạn.</li>
                                            <li>Vui lòng sử dụng mã QR mới nhất được cung cấp để hoàn tất thanh toán của bạn.</li>
                                        </ul>
                                        <img class="w-25 p-1" src="https://img.vietqr.io/image/vietinbank-113366668888-compact.jpg" alt="">
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex">
                                        <div>
                                        <div class="d-flex justify-content-between p-4">
                                            <div class="d-flex">
                                                <div class="d-flex">
                                                    <input type="checkbox" id="bankTransferCheckbox">
                                                    <label for = "bankTransferCheckbox" class="fw-bold ms-1 p-1">Chuyển khoản ngân hàng</label>
                                                </div>
                                            </div>
                                            <img class="w-25 p-1 ms-4" src="https://rubicmarketing.com/wp-content/uploads/2022/11/y-nghia-logo-mb-bank-2.jpg" alt="">
                                        </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between">
                                    <div class="payment-details" id="bankTransferDetails" style="display: none;">
                                        <div style = "margin: 20px">
                                            Số tài khoản: <h3 class = "text-info"> 0001401443246</h3>
                                            Chủ tài khoản: <h3 class = "text-info"> Nguyen Ngoc An</h3>
                                            Nội dung: <h3 class = "text-info"> [HỌ VÀ TÊN NGƯỜI ĐẶT] - [SỐ ĐIỆN THOẠI] - [NGÀY BAY] - [Mã sân bay đi] - [Mã sân bay đến]</h3>
                                        </div>
                                    <!-- Nội dung chi tiết cho Chuyển khoản ngân hàng -->
                                    <ul class="card border-1 p-4 mx-3 bg-info-subtle">
                                        <li>Chuyển khoản ngân hàng áp dụng 24/7. Bạn có thể chuyển khoản qua kênh ngân hàng điện tử của MB và các ngân hàng thương mại khác.</li>
                                        <li>Chuyển khoản liên ngân hàng qua ATM hoặc Internet Banking khả dụng.</li>
                                        <li><em class="text-success">Hãy lựa chọn Dịch vụ Chuyển tiền Nhanh 24/7</em> để chuyển tiền từ các ngân hàng khác ngoài MB Bank.</li>
                                    </ul>
                                </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="ms-3">Tổng giá tiền</h5>
                                    <h5 class="fw-bold mx-3">{{$formattedPrice}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button id="confirmPaymentButton" class="btn btn-success mt-2 fw-semibold px-4 w-100 p-3 mx-1" type="button">
                                Xác nhận đã thanh toán
                                <i class="bi bi-arrow-right fw-bold pt-1"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4 p-3">
                        <div class="card border-0 p-2 ">
                            <div class="d-flex gap-2 bg-primary-subtle mb-2 ">
                                <img class="w-25 p-2" src="https://th.bing.com/th/id/OIP.kgj1A0owXzMeulkwvrhlZQHaEh?rs=1&pid=ImgDetMain" alt="">
                                <!-- <i class="bi bi-airplane mt-3"></i> -->
                                <div class="">
                                    <h3 class="fw-bold mb-0">Tóm tắt vé bay</h3>
                                </div>
                            </div>
                            <div class="d-flex gap-2 align-items-center pb-3 border-bottom">
                                <h6 class="mb-0">{{ $departureName }}</h6>
                                <i class="bi bi-arrow-right fw-bold"></i>
                                <h6 class="mb-0">{{ $destinationName }}</h6>
                            </div>
                            <div class="pt-3">
                                <h6>Thời gian khởi hành • {{ $departureDate }}</h6>
                            </div>
                            <div class="d-flex gap-4 text-center mt-3">
                                <div>
                                    <h6>{{$departureTime}}</h6>
                                    <p>{{ $departureCode }}</p>
                                </div>
                                <div>
                                    <i class="bi bi-arrows w-100" style="width: 100px;"></i>
                                    <!-- <p>Khứ hồi</p> -->
                                </div>
                                <div>
                                    <h6>{{$arrivalTime}}</h6>
                                    <p>{{ $destinationCode }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between text-primary">
                                <p class="fw-semibold">Chi tiết chuyến bay</p>
                                <i class="bi bi-chevron-down fw-semibold"></i>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="fw-semibold">Vé hạng phổ thông</h5>
                                <p class="text-success fw-semibold">Bao gồm 7 kg hành lý xách tay</p>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
    
                            <!-- Đây là chỗ điền thông tin khách hàng -->
                            <div class="pt-3">
                                <div style = "display:none"><p>Mã chuyến bay: <span id = "flight_id">{{$flightid}}</span></p></div>
                                <h5 class="fw-bold">Thông tin người đặt</h5>
                                <p>Họ và tên: <span id="customerName">{{ $firstName }} {{ $lastName }}</span></p>
                                <p>Số điện thoại: <span id="customerPhone">{{ $phoneNumber }}</span></p>
                                <p>Email: <span id="customerEmail">{{ $email }}</span></p>
                                <h5 class="fw-bold mt-3">Thông tin hành khách</h5>
                                @foreach ($passengers as $passenger)
                                    <div class="passenger-info">
                                        <h6 class="fw-bold">Hành khách {{ $loop->iteration }}</h6>
                                        <p>Danh xưng: <span id="danhxung{{ $loop->iteration }}">{{ $passenger['danhxung'] }}</span></p>
                                        <p>Họ và tên: <span id="passengerName{{ $loop->iteration }}">{{ $passenger['firstName'] }} {{ $passenger['lastName'] }}</span></p>
                                        <p>Ngày sinh: <span id="passengerBirthday{{ $loop->iteration }}">{{ $passenger['birthday'] }}</span></p>
                                        <p>Quốc tịch: <span id="passengerNationality{{ $loop->iteration }}">{{ $passenger['nationality'] }}</span></p>
                                    </div>
                                @endforeach

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Countdown Box -->
        <div class="modal fade" id="countdownModal" tabindex="-1" aria-labelledby="countdownModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="countdownModalLabel">Vui lòng chờ xác nhận</h5>
                    </div>
                    <div class="modal-body text-center">
                        <p id="countdownText">Đang xử lý...</p>
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        // Lắng nghe sự kiện khi checkbox VietQR được thay đổi
    document.getElementById('vietqrCheckbox').addEventListener('change', function() {
        var details = document.getElementById('vietqrDetails');
        if (this.checked) {
            details.style.display = 'block'; // Hiển thị chi tiết
        } else {
            details.style.display = 'none'; // Ẩn chi tiết
        }
    });

    // Lắng nghe sự kiện khi checkbox Chuyển khoản ngân hàng được thay đổi
    document.getElementById('bankTransferCheckbox').addEventListener('change', function() {
        var details = document.getElementById('bankTransferDetails');
        if (this.checked) {
            details.style.display = 'block'; // Hiển thị chi tiết
        } else {
            details.style.display = 'none'; // Ẩn chi tiết
        }
    });
        // Set the time we're counting down to (1 hour from now)
        const endTime = new Date().getTime() + 3600000; // 1 hour in milliseconds

        // Update the countdown every 1 second
        const interval = setInterval(function () {
            // Get the current time
            const now = new Date().getTime();

            // Find the distance between now and the end time
            const distance = endTime - now;

            // Time calculations for hours, minutes and seconds
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="countdown"
            document.getElementById("countdown").innerHTML =
                ("0" + hours).slice(-2) + ":" +
                ("0" + minutes).slice(-2) + ":" +
                ("0" + seconds).slice(-2);

            // If the countdown is over, write some text
            if (distance < 0) {
                clearInterval(interval);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);

        document.getElementById('confirmPaymentButton').addEventListener('click', function() {
    // Show the countdown modal
    var countdownModal = new bootstrap.Modal(document.getElementById('countdownModal'));
    countdownModal.show();

    // Simulate processing for 3 seconds
    setTimeout(function() {
        // Hide the modal
        countdownModal.hide();

        // Thu thập thông tin khách hàng
        const customerInfo = {
            flightId: document.getElementById('flight_id').innerText,
            customerName: document.getElementById('customerName').innerText,
            customerPhone: document.getElementById('customerPhone').innerText,
            customerEmail: document.getElementById('customerEmail').innerText,
            passengers: []
        };

        // Lặp qua từng hành khách để lấy thông tin
        document.querySelectorAll('.passenger-info').forEach(function(passengerElement) {
            let passengerInfo = {
                danhXung: passengerElement.querySelector('[id^=danhxung]').innerText,
                passengerName: passengerElement.querySelector('[id^=passengerName]').innerText,
                passengerBirthday: passengerElement.querySelector('[id^=passengerBirthday]').innerText,
                passengerNationality: passengerElement.querySelector('[id^=passengerNationality]').innerText
            };
            customerInfo.passengers.push(passengerInfo);
        });

        // Gửi thông tin mã vé tới server
        fetch('/payment/process', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(customerInfo)
        }).then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to ticket page
                window.location.href = "/ticket";
            } else {
                alert('Something went wrong. Please try again.');
            }
        }).catch(error => {
            console.error('Error:', error);
            alert('Something went wrong. Please try again.');
        });

    }, 3000); // Simulate processing time of 3 seconds
});


    </script>
</body>

</html>
