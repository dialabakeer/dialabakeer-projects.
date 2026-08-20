<?php
require_once "dbconnect.php";

$id = $_GET['id'];

$sql = "SELECT * FROM hotels WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$hotel = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $hotel['name']; ?></title>
</head>
<body>

<h1><?php echo $hotel['name']; ?></h1>
<img src="img/<?php echo $hotel['image']; ?>" width="400">
<p><?php echo $hotel['description']; ?></p>
<p>Price: $<?php echo $hotel['price']; ?> / night</p>

</body>
</html>
