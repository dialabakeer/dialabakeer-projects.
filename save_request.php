<?php
require_once __DIR__ . "/dbconnect.php";

$success = "";
$error = "";

if (isset($_POST["send"])) {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $service = trim($_POST["service"]);
    $message = trim($_POST["message"]);

    if ($name == "" || $email == "" || $service == "" || $message == "") {
        $error = "Please fill all fields";
    } else {

        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO requests (name, email, service, message) VALUES (?, ?, ?, ?)"
        );

        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $service, $message);

        if (mysqli_stmt_execute($stmt)) {
            $success = "Your request has been sent successfully 💍";
        } else {
            $error = "Something went wrong";
        }

        mysqli_stmt_close($stmt);
    }
}
?>
