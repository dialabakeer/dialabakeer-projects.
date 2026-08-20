<?php
require_once "dbconnect.php";

$sql = "
    SELECT * FROM hotels
    WHERE country_id = 2
";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maldives Resorts</title>

    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: linear-gradient(180deg, #f8ede6, #f6dac8);
            font-family: "Poppins", sans-serif;
            text-align: center;
        }

        h1 {
            font-family: "Great Vibes", cursive;
            font-size: 60px;
            color: #c27845;
            margin-top: 45px;
            margin-bottom: 8px;
        }

        h2 {
            margin: 0;
            color: #a67751;
            font-size: 19px;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        .hotels-container {
            width: 90%;
            max-width: 1400px;
            margin: 60px auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 45px;
        }

        .hotel-card {
            position: relative;
            height: 460px;
            border-radius: 24px;
            overflow: hidden;
            cursor: pointer;
            background: #fff;
            box-shadow: 0 20px 50px rgba(0,0,0,0.18);
            transition: all .5s ease;
        }

        .hotel-card:hover {
            transform: translateY(-14px) scale(1.04);
            box-shadow: 0 35px 75px rgba(0,0,0,0.28);
        }

        .hotel-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hotel-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, rgba(0,0,0,0.55), transparent 45%);
            opacity: 0.9;
            transition: .4s ease;
        }

        .hotel-card:hover::after {
            opacity: 0.6;
        }

        .hotel-info {
            position: absolute;
            bottom: 25px;
            left: 25px;
            text-align: left;
            color: #fff;
        }

        .hotel-name {
            font-size: 27px;
            font-weight: 600;
            margin-bottom: 6px;
            text-shadow: 0 3px 6px rgba(0,0,0,0.6);
        }

        .hotel-rating {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 6px;
        }

        .hotel-price {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .hotel-desc {
            font-size: 14px;
            color: #f3f3f3;
            margin-bottom: 12px;
            opacity: 0.95;
            max-width: 280px;
        }

        .hotel-btn {
            display: inline-block;
            padding: 10px 22px;
            background: rgba(255,255,255,0.25);
            border: 2px solid rgba(255,255,255,0.75);
            color: #fff;
            border-radius: 25px;
            font-size: 14px;
            backdrop-filter: blur(6px);
            text-decoration: none;
            transition: .3s ease;
        }

        .hotel-btn:hover {
            background: rgba(255,255,255,0.45);
            border-color: #fff;
        }
    </style>
</head>

<body>

<h1>Resorts in Maldives</h1>
<h2>Luxury • Romance • Overwater Villas</h2>

<div class="hotels-container">

    <?php while ($hotel = mysqli_fetch_assoc($result)) { ?>

        <div class="hotel-card" onclick="openHotel(<?php echo $hotel['id']; ?>)">
            <img src="img/<?php echo $hotel['image']; ?>" alt="<?php echo $hotel['name']; ?>">
            <div class="hotel-info">
                <div class="hotel-name"><?php echo $hotel['name']; ?></div>
                <div class="hotel-rating">⭐⭐⭐⭐⭐</div>
                <div class="hotel-price">From $<?php echo $hotel['price']; ?>/night</div>
                <p class="hotel-desc"><?php echo $hotel['description']; ?></p>
                <a href="javascript:void(0)" class="hotel-btn">View Details</a>
            </div>
        </div>

    <?php } ?>


</div>

<script>
    function openHotel(id) {
        window.location.href = "hotel1.php?id=" + id;
    }
</script>

</body>
</html>
