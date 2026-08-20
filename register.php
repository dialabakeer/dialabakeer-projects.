<?php
require_once __DIR__ . "/dbconnect.php";

$error = "";
$success = "";

if (isset($_POST["register"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "" || $password == "") {
        $error = "Please fill in all fields";
    } else {

        // تشفير كلمة السر
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password_hash) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $username, $password_hash);

            if (mysqli_stmt_execute($stmt)) {
                $success = "Account created successfully!";
            } else {
                $error = "Username already exists";
            }

            mysqli_stmt_close($stmt);
        } else {
            $error = "Database error";
        }
    }
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>

    <h2>Register</h2>

    <?php
    if ($error != "") echo "<p style='color:red;'>$error</p>";
    if ($success != "") echo "<p style='color:green;'>$success</p>";
    ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <button type="submit" name="register">Register</button>
    </form>

    <br>
    <a href="login.php">Go to Login</a>

    </body>
    </html>
<?php
