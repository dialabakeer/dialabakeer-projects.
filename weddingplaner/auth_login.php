<?php
session_start();
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email    = trim($_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT id, full_name, email, password_hash
            FROM wedding_accounts
            WHERE email = ?
            LIMIT 1";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row["password_hash"])) {

            $_SESSION["user_id"]   = $row["id"];
            $_SESSION["full_name"] = $row["full_name"];
            $_SESSION["email"]     = $row["email"];

            header("Location: h1.php");
            exit;
        }
    }

    echo "Wrong email or password";
}
