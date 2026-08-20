
<?php
require_once "dbconnect.php";

$hotel_id   = (int) $_GET['hotel_id'];
$booking_id = (int) $_GET['booking_id'];

/* بيانات الفندق */
$sqlHotel = "SELECT * FROM hotels WHERE id = ?";
$stmtH = mysqli_prepare($conn, $sqlHotel);
mysqli_stmt_bind_param($stmtH, "i", $hotel_id);
mysqli_stmt_execute($stmtH);
$hotel = mysqli_fetch_assoc(mysqli_stmt_get_result($stmtH));

/* بيانات الحجز */
$sqlBooking = "SELECT * FROM bookings WHERE id = ?";
$stmtB = mysqli_prepare($conn, $sqlBooking);
mysqli_stmt_bind_param($stmtB, "i", $booking_id);
mysqli_stmt_execute($stmtB);
$booking = mysqli_fetch_assoc(mysqli_stmt_get_result($stmtB));

if (!$hotel || !$booking) {
    die("Booking not found");
}
// حساب عدد الليالي
$check_in  = new DateTime($booking['check_in']);
$check_out = new DateTime($booking['check_out']);

$nights = $check_in->diff($check_out)->days;
if ($nights < 1) {
    $nights = 1;
}

// السعر
$price_per_night = (float) $hotel['price'];
$total_price = $nights * $price_per_night;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>

    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: #f8ede6;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            border-radius: 28px;
            box-shadow: 0 30px 80px rgba(0,0,0,.25);
            overflow: hidden;
        }

        .hero img {
            width: 100%;
            height: 420px;
            object-fit: cover;
        }

        .content {
            padding: 30px;
        }

        h1 {
            margin-top: 0;
            font-family: "Playfair Display", serif;
        }

        .info {
            font-size: 15px;
            margin: 8px 0;
        }

        .price {
            font-size: 22px;
            font-weight: 600;
            color: #c27845;
            margin-top: 16px;
        }

        .success {
            background: #e6f6ea;
            color: #2f6b3f;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="hero">
        <img src="../img/<?php echo htmlspecialchars($hotel['image']); ?>" alt="Hotel Image">
    </div>

    <div class="content">
        <div class="success"> ✔ Your booking has been confirmed successfully.
            We will contact you shortly 🤍
        </div>

        <h1><?php echo htmlspecialchars($hotel['name']); ?></h1>

        <p><?php echo htmlspecialchars($hotel['description']); ?></p>

        <div class="info"><strong>Guest:</strong> <?php echo htmlspecialchars($booking['full_name']); ?></div>
        <div class="info"><strong>Email:</strong> <?php echo htmlspecialchars($booking['email']); ?></div>
        <div class="info"><strong>Check-in:</strong> <?php echo $booking['check_in']; ?></div>
        <div class="info"><strong>Check-out:</strong> <?php echo $booking['check_out']; ?></div>
        <div class="info"><strong>Guests:</strong> <?php echo $booking['guests']; ?></div>
        <div class="info"><strong>Nights:</strong> <?php echo $nights; ?></div>

        <div class="info">
            <strong>Price per night:</strong>
            $<?php echo number_format($price_per_night, 2); ?>
        </div>

        <div class="price">
            Total price: $<?php echo number_format($total_price, 2); ?>
        </div>


    </div>

</div>

</body>
</html>
