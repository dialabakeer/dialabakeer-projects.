<?php
require_once "dbconnect.php";

$decor_id = (int)$_POST['decor_id'];
$name     = $_POST['customer_name'];
$email    = $_POST['email'];
$date     = $_POST['event_date'];
$notes    = $_POST['notes'];

/* نجيب السعر من جدول decor_styles */
$q = "SELECT base_price FROM decor_styles WHERE id = ?";
$s = mysqli_prepare($conn,$q);
mysqli_stmt_bind_param($s,"i",$decor_id);
mysqli_stmt_execute($s);
$r = mysqli_stmt_get_result($s);
$row = mysqli_fetch_assoc($r);

$total = $row['base_price'];

/* حفظ الطلب */
$sql = "INSERT INTO decor_requests
(decor_id, customer_name, email, event_date, notes, total_price)
VALUES (?,?,?,?,?,?)";

$stmt = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param(
    $stmt,"issssd",
    $decor_id,$name,$email,$date,$notes,$total
);
mysqli_stmt_execute($stmt);

header("Location: thankyou.php");
