<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		@include('head')
        <style>
        /* body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        } */
        .container-2 {
            display: flex;
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
        }
        .contact-form, .map {
            flex: 1;
            margin: 10px;
        }
        .contact-form form {
            display: flex;
            flex-direction: column;
        }
        .contact-form label {
            margin-top: 10px;
        }
        .contact-form input, .contact-form textarea {
            padding: 10px;
            margin-top: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        .contact-form button {
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .contact-form button:hover {
            background-color: #45a049;
        }
        .map iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
	</head>
		@include('header')
		<body>	
			<!-- start banner Area -->
			<section class="banner-area relative">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="" style="height: 200px !important;">
					</div>
				</div>					
			</section>
            <div class="container-2">
    <div class="contact-form">
        <h2>Liên hệ</h2>
        <form action="submit_form.php" method="post">
            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone">

            <label for="message">Lời nhắn:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Gửi</button>
        </form>
    </div>
    <div class="map">
        <h2>Địa chỉ của chúng tôi</h2>
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.742068965609!2d108.2206293146835!3d16.04707878889292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219b5e407e6c9%3A0xe4b18f0d4b0bdc4a!2sDanang!5e0!3m2!1sen!2s!4v1608692878100!5m2!1sen!2s" 
            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>
    </div>
</div>

			@include('footer');
		</body>
	</html>