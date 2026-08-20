<?php
require_once "dbconnect.php";

$q = "SELECT * FROM decor_bookings ORDER BY id DESC LIMIT 1";
$r = mysqli_query($conn, $q);

if (!$r || mysqli_num_rows($r) == 0) {
    die("No decor booking found.");
}

$b = mysqli_fetch_assoc($r);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Decor Booking Confirmation</title>
    <style>
        body{
            font-family: Poppins, Arial;
            background:#f8f4f1;
            padding:60px;
        }
        .card{
            max-width:600px;
            margin:auto;
            background:#fff;
            padding:30px;
            border-radius:20px;
            box-shadow:0 10px 40px rgba(0,0,0,.15);
        }
        h1{color:#c98a6f}
        p{margin:10px 0}
    </style>
</head>
<body>

<div class="card">
    <h1>Booking Confirmed ✨</h1>

    <p><strong>Name:</strong> <?= htmlspecialchars($b['full_name']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($b['email']) ?></p>
    <p><strong>Decor:</strong> <?= htmlspecialchars($b['decor_name']) ?></p>
    <p><strong>Date:</strong> <?= htmlspecialchars($b['event_date']) ?></p>
    <p><strong>Venue:</strong> <?= htmlspecialchars($b['venue_type']) ?></p>
    <p><strong>Guests:</strong> <?= htmlspecialchars($b['guests']) ?></p>

    <p><strong>Styling:</strong><br>
        <?= nl2br(htmlspecialchars($b['selected_styling'])) ?>
    </p>

    <p><strong>Total Price:</strong> $<?= (int)$b['total_price'] ?></p>

    <hr>
    <p>Thank you for choosing our wedding decor services 🤍</p>
</div>

</body>
</html>
