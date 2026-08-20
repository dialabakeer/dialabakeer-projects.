<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "wedding_db";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("DB connection failed: " . mysqli_connect_error());
}
