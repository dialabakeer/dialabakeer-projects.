<?php
$conn = mysqli_connect("localhost","root","","wedding_db");

$cake   = $_POST['cake'];
$tiers  = $_POST['tiers'];
$flavor = $_POST['flavor'];
$price  = $_POST['price'];

$sql = "INSERT INTO cake_orders (cake_name, tiers, flavor, price)
        VALUES (?,?,?,?)";

$stmt = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"ssss",$cake,$tiers,$flavor,$price);
mysqli_stmt_execute($stmt);
?>
<?php
