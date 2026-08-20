<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name    = trim($_POST["name"]);
    $email   = trim($_POST["email"]);
    $address = trim($_POST["address"]);
    $service = trim($_POST["service"]);
    $message = trim($_POST["message"]);

    $sql = "INSERT INTO contact_messages (name, email, address, service, message)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss",
        $name, $email, $address, $service, $message
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: cont.php?success=1");
        exit;
    } else {
        echo "Error saving message";
    }
}
?>
