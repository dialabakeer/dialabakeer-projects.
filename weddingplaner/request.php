<?php
require_once __DIR__ . "/dbconnect.php";

$success = "";
$error = "";

if (isset($_POST["send"])) {

    $name = trim(isset($_POST["name"]) ? $_POST["name"] : "");
    $email = trim(isset($_POST["email"]) ? $_POST["email"] : "");
    $service = trim(isset($_POST["service"]) ? $_POST["service"] : "");
    $message = trim(isset($_POST["message"]) ? $_POST["message"] : "");

    if ($name === "" || $email === "" || $service === "" || $message === "") {
        $error = "Please fill all fields";
    } else {

        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO requests (name, email, service, message)
             VALUES (?, ?, ?, ?)"
        );

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss",
                $name, $email, $service, $message
            );
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            $success = "Your request has been sent successfully 💍";
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
    <title>Send Request</title>
    <style>
        body{
            margin:0;
            font-family:Montserrat, sans-serif;
            background:#f6efe7;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }
        .box{
            width:380px;
            background:#fff;
            padding:25px;
            border-radius:18px;
            box-shadow:0 15px 40px rgba(0,0,0,.15);
            text-align:center;
        }
        input, textarea{
            width:100%;
            padding:12px;
            margin:8px 0;
            border-radius:8px;
            border:1px solid #b88f63;
            font-family:Montserrat;
        }
        button{
            margin-top:10px;
            width:100%;
            padding:12px;
            border:none;
            border-radius:25px;
            background:linear-gradient(135deg,#d9c4a0,#c9a979);
            color:#fff;
            font-size:16px;
            cursor:pointer;
        }
        .error{color:red;font-weight:600;}
        .success{color:green;font-weight:600;}
    </style>
</head>
<body>

<div class="box">
    <h2>Send Request</h2>

    <?php if($error) echo "<p class='error'>$error</p>"; ?>
    <?php if($success) echo "<p class='success'>$success</p>"; ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Your Name">
        <input type="email" name="email" placeholder="Your Email">
        <input type="text" name="service" placeholder="Service">
        <textarea name="message" placeholder="Message"></textarea>

        <button type="submit" name="send">Send</button>
    </form>
</div>

</body>
</html>
