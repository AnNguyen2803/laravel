<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Các loại xe của Golden Bird</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container-car {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 20px 100px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 200px;
            margin: 10px;
            text-align: center;
            padding: 10px;
        }
        .card img {
            width: 100%;
            height: 150px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .card h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .card p {
            margin: 5px 0;
            color: gray;
        }
        .card .details {
            display: flex;
            justify-content: space-evenly;
            margin-top: 10px;
        }
        .card .details span {
            display: flex;
            align-items: center;
        }
        .card .details img {
            width: 16px;
            height: 16px;
            margin-right: 5px;
        }
    </style>
</head>
<body>

<h1>Các loại xe của Travel love</h1>

<div class="container-car">
    <div class="card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToAV0TAPQ5fhrLzliwIhGEyouYk3RSLqbCWw&s" alt="Toyota Alvis">
        <h3>Toyota Alvis</h3>
        <p>Standard</p>
        <div class="details">
            <span><i class="fa-solid fa-user"></i>5</span>
            <span><i class="fa-solid fa-suitcase"></i>2</span>
        </div>
    </div>
    <div class="card">
        <img src="https://www.toyota.com.vn//Resources/Images/857B9F1B9E30282B4BCFF37B18BA8F6A.jpg" alt="Toyota Yaris">
        <h3>Toyota Yaris</h3>
        <p>Standard</p>
        <div class="details">
            <span><i class="fa-solid fa-user"></i>5</span>
            <span><i class="fa-solid fa-suitcase"></i>1</span>
        </div>
    </div>
    <div class="card">
        <img src="https://www.iihs.org/cdn-cgi/image/width=636/api/ratings/model-year-images/3138/" alt="Toyota Camry">
        <h3>Toyota Camry</h3>
        <p>Premium</p>
        <div class="details">
            <span><i class="fa-solid fa-user"></i>3</span>
            <span><i class="fa-solid fa-suitcase"></i>4</span>
        </div>
    </div>
    <div class="card">
        <img src="https://i1-vnexpress.vnecdn.net/2023/05/10/Vios-2023-10_1683690128.jpg?w=2400&h=0&q=100&dpr=1&fit=crop&s=LPsTjgivZ2T5xKJYQiVjHg&t=image" alt="Toyota Vios">
        <h3>Toyota Vios</h3>
        <p>Standard</p>
        <div class="details">
            <span><i class="fa-solid fa-user"></i>4</span>
            <span><i class="fa-solid fa-suitcase"></i>2</span>
        </div>
    </div>
    <div class="card">
        <img src="https://vcdn1-vnexpress.vnecdn.net/2023/06/22/ToyotaAlphard1-1687408647-6887-1687409002.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=2p1dLdaRdNgk95hrd1V8XA" alt="Alphard">
        <h3>Alphard</h3>
        <p>Minivan</p>
        <div class="details">
            <span><i class="fa-solid fa-user"></i>6</span>
            <span><i class="fa-solid fa-suitcase"></i>3</span>
        </div>
    </div>
</div>

</body>
</html>
