<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // استلام البيانات من الفورم
    $dj_id        = $_POST['dj_id'];
    $full_name    = $_POST['full_name'];
    $email        = $_POST['email'];
    $phone        = $_POST['phone'];
    $wedding_date = $_POST['wedding_date'];
    $details      = $_POST['details'];

    // إدخال البيانات في جدول dj_requests
    $sql = "INSERT INTO dj_requests
            (dj_id, full_name, email, phone, wedding_date, details)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param(
        $stmt,
        "isssss",
        $dj_id,
        $full_name,
        $email,
        $phone,
        $wedding_date,
        $details
    );

    mysqli_stmt_execute($stmt);

    // بعد الحفظ نرجع لصفحة قائمة الحجوزات
    header("Location: bookings.php");
    exit;
}
