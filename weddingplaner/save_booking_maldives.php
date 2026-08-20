<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $hotel_id = (int) $_POST['hotel_id'];
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $guests = (int) $_POST['guests'];
    $special = trim($_POST['special_requests']);

    $sql = "INSERT INTO bookings
            (hotel_id, full_name, email, check_in, check_out, guests, special_requests)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "issssis",
        $hotel_id,
        $full_name,
        $email,
        $check_in,
        $check_out,
        $guests,
        $special
    );

    mysqli_stmt_execute($stmt);
    $booking_id = mysqli_insert_id($conn);

    // ✅ تحويل لصفحة تأكيد المالديف
    header("Location: booking_confirmation_maldives.php?hotel_id=$hotel_id&booking_id=$booking_id");
    exit;
}
?>
