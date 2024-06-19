<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelove</title>
    <link rel="stylesheet" href="styles.css">
    @include('./head')
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

.container {
    width: 80%;
    margin: 0 auto;
    background-color: #ffffff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

header {
    text-align: center;
    margin-bottom: 20px;
}

header h1 {
    font-size: 36px;
    margin: 0;
}

header h2 {
    font-size: 24px;
    color: #555555;
    margin: 10px 0 0 0;
}

.content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.content .text {
    flex: 1;
    margin-right: 20px;
}

.content .text p {
    font-size: 16px;
    line-height: 1.5;
    color: #333333;
}

.content .image-container {
    flex: 1;
    text-align: center;
}

.content .image-container img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><a href="/">Travelove</a></h1>
            <h2>Bay, theo cách riêng của bạn</h2>
        </header>
        <section class="content">
            <div class="image-container">
                <img src="https://ik.imagekit.io/tvlk/image/imageResource/2022/10/31/1667232016060-4b5babb4a860fb692d969ae3480cc6a1.png?tr=q-75" alt="Traveloka Image 1">
            </div>
            <div class="text">
                <p>Travelove là hệ thống đặt vé máy bay mới, đầy sáng tạo, hướng đến việc mang lại trải nghiệm bay tối ưu cho bạn. Chúng tôi giúp bạn khám phá và mua vé cho mọi chuyến bay, từ các hãng hàng không giá rẻ đến các hãng hàng không quốc tế cao cấp, với giao diện thân thiện và dễ sử dụng. Danh mục sản phẩm của chúng tôi bao gồm các chuyến bay nội địa và quốc tế từ nhiều hãng hàng không, giúp bạn dễ dàng lựa chọn chuyến bay phù hợp với nhu cầu và ngân sách của mình.
                </p>
            </div>
        </section>
        <section class="content">
            <div class="text">
                <p>Mặc dù mới được thành lập, nhưng Travelove đã nhanh chóng khẳng định mình với mục tiêu mang đến sự tiện lợi và tối ưu cho khách hàng. Chúng tôi hiểu rằng mỗi chuyến bay là một phần quan trọng trong cuộc sống của bạn, vì vậy chúng tôi luôn nỗ lực để cung cấp dịch vụ đặt vé đơn giản, nhanh chóng và an toàn. Với đội ngũ nhân viên nhiệt tình và hệ thống hỗ trợ khách hàng 24/7, Travelove cam kết mang đến cho bạn sự hài lòng tối đa trong mỗi hành trình.
                </p>
                <p>Dù bạn đang lên kế hoạch cho một chuyến công tác, một kỳ nghỉ gia đình hay một chuyến phiêu lưu cá nhân, Travelove luôn sẵn sàng cung cấp nhiều lựa chọn bay phong phú và linh hoạt. Với dịch vụ chăm sóc khách hàng đa ngôn ngữ và nhiều phương thức thanh toán thuận tiện, Travelove đang dần trở thành ứng dụng đặt vé máy bay phổ biến hơn và được truy cập nhiều hơn.</p>
                <p>Bạn còn chờ gì nữa? Đặt ngay vé máy bay cho chuyến đi của bạn với Travelove, và trải nghiệm sự tiện lợi, dễ dàng trong mỗi chuyến bay. Với Travelove, mỗi hành trình bay của bạn sẽ trở nên đặc biệt và đáng nhớ hơn bao giờ hết.
                </p>
            </div>
            <div class="image-container">
                <img src="https://ik.imagekit.io/tvlk/image/imageResource/2022/10/31/1667232268871-776cfde10b5577c7b2d483fb04ced52f.png?tr=q-75" alt="Traveloka Image 2">
            </div>
        </section>
    </div>
</body>
</html>
