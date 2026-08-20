<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body{
            margin:0;
            font-family: Arial;
            background: linear-gradient(135deg,#f8ede6,#f6dac8);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .box{
            background:white;
            padding:40px;
            border-radius:20px;
            text-align:center;
            box-shadow:0 20px 40px rgba(0,0,0,.2);
        }
        h1{ color:#c27845; }
        a{
            display:inline-block;
            margin-top:20px;
            text-decoration:none;
            background:#b88f63;
            color:white;
            padding:10px 25px;
            border-radius:25px;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>👋 أهلاً <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
    <p>تم تسجيل الدخول بنجاح</p>
    <a href="logout.php">Logout</a>
</div>

</body>
</html>
