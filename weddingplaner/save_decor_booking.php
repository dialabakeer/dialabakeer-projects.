<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Method Not Allowed");
}

$full_name = trim(isset($_POST["full_name"]) ? $_POST["full_name"] : "");
$email     = trim(isset($_POST["email"]) ? $_POST["email"] : "");
$decor     = trim(isset($_POST["decor"]) ? $_POST["decor"] : "");
$event_date= trim(isset($_POST["event_date"]) ? $_POST["event_date"] : "");
$venue_type= trim(isset($_POST["venue_type"]) ? $_POST["venue_type"] : "");
$guests    = trim(isset($_POST["guests"]) ? $_POST["guests"] : "");
$customize = trim(isset($_POST["customize"]) ? $_POST["customize"] : "");
$opinion   = trim(isset($_POST["opinion"]) ? $_POST["opinion"] : "");
$total     = (int)(isset($_POST["total_price"]) ? $_POST["total_price"] : 0);
$styling   = trim(isset($_POST["selected_styling"]) ? $_POST["selected_styling"] : "");


if ($full_name === "" || $email === "" || $decor === "" || $event_date === "" || $venue_type === "" || $guests === "") {
    die("Please fill required fields.");
}

$sql = "INSERT INTO decor_bookings
(full_name, email, decor_name, event_date, venue_type, guests, customize, opinion, total_price, selected_styling)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) die("DB error: " . mysqli_error($conn));

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssis",
    $full_name, $email, $decor, $event_date, $venue_type, $guests, $customize, $opinion, $total, $styling
);

if (mysqli_stmt_execute($stmt)) {
    header("Location: decor_confirmation.php");
    exit;
    exit;
} else {
    die("Insert failed: " . mysqli_stmt_error($stmt));
}
