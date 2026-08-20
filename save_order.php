<?php
require_once "dbconnect.php";

$data = json_decode(file_get_contents("php://input"), true);
if (!$data) {
    echo json_encode(["success" => false]);
    exit;
}

$name  = $data['name'];
$email = $data['email'];
$total = $data['total'];
$items = json_encode($data['items']);

$sql = "INSERT INTO shop_orders
(customer_name, customer_email, total_price, items)
VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssds", $name, $email, $total, $items);
mysqli_stmt_execute($stmt);

echo json_encode(["success" => true]);
