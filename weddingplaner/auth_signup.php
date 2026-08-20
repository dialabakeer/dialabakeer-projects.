<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $full_name = trim($_POST["full_name"]);
    $email     = trim($_POST["email"]);
    $password  = $_POST["password"];

    if ($full_name === "" || $email === "" || $password === "") {
        die("All fields are required");
    }

    // 🔒 تشفير كلمة المرور
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO wedding_accounts (full_name, email, password_hash)
            VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $full_name, $email, $password_hash);

    if (mysqli_stmt_execute($stmt)) {
        // ✅ تسجيل ناجح → تحويل لصفحة الدخول
        header("Location: login2.php");
        exit;
    } else {
        // ❌ فحص تكرار الإيميل
        if (mysqli_errno($conn) == 1062) {
            echo "Email already exists. Please login.";
        } else {
            echo "Signup error. Please try again.";
        }
    }
}
