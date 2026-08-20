<?php
require_once "dbconnect.php";

$bride = $_POST['bride'];
$groom = $_POST['groom'];
$date  = $_POST['date'];
$time  = $_POST['time'];
$venue = $_POST['venue'];

$sql = "INSERT INTO invitations (bride_name, groom_name, event_date, event_time, venue)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssss", $bride, $groom, $date, $time, $venue);
mysqli_stmt_execute($stmt);

echo "success";
