<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // استقبال البيانات
    $hotel_id = (int) $_POST['hotel_id'];
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $guests = (int) $_POST['guests'];
    $special = trim($_POST['special_requests']);

    // إدخال الحجز
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

    // تنفيذ الحجز
    mysqli_stmt_execute($stmt);

    // رقم آخر حجز
    $booking_id = mysqli_insert_id($conn);

    // ===============================
    // ✉️ إرسال إيميل تأكيد (اختياري)
    // ===============================
    $to = $email;
    $subject = "Booking Confirmation";

    $message = "
Dear $full_name,

Your booking has been confirmed successfully 🤍

Check-in: $check_in
Check-out: $check_out
Guests: $guests

Thank you for choosing us.
Wedding Planner Team
";

    $headers = "From: weddingplanner@example.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    @mail($to, $subject, $message, $headers);

    // ===============================
    // ➜ التحويل إلى صفحة التأكيد
    // ===============================
    header("Location: booking_confirmation.php?hotel_id=$hotel_id&booking_id=$booking_id");
    exit;
}
?>
