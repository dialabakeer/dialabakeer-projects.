
<?php
require_once __DIR__ . "/dbconnect.php";

$error = "";

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "" || $password == "") {
        $error = "Please fill in all fields";
    } else {

        $query = "SELECT password_hash FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $password_hash);

            if (mysqli_stmt_fetch($stmt)) {

                if (password_verify($password, $password_hash)) {
                    header("Location: dash.php");
                    exit;

                } else {
                    $error = "Wrong password";
                }
            }
            else {
                $error = "User not found";
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
    <title>Dream Wedding Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('img/login.jpg') center/cover no-repeat fixed;
            font-family: 'Montserrat', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.35);
            backdrop-filter: blur(3px);
            z-index: -1;
        }

        .login-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 10;
            animation: fadeStart 1.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeStart {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* نص ترحيبي */
        .wedding-text {
            font-family: 'Great Vibes', cursive;
            font-size: 38px;
            color: #fff;
            margin-bottom: 25px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.6);
            animation: floatTxt 3s ease-in-out infinite;
        }

        @keyframes floatTxt {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }

        /* باندا مصغرة */
        .panda {
            position: relative;
            width: 200px;
            height: 170px;
            margin-bottom: -15px;
            filter: drop-shadow(0px 6px 12px rgba(0,0,0,0.25));
            animation: floatPanda 4s ease-in-out infinite;
        }

        @keyframes floatPanda {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .face {
            background: white;
            width: 200px;
            height: 160px;
            border-radius: 50%;
            box-shadow: 0 12px 28px rgba(0,0,0,0.18);
            position: relative;
        }

        .ear {
            width: 50px;
            height: 50px;
            background: #333;
            border-radius: 50%;
            position: absolute;
            top: -20px;
        }
        .ear.left { left: 14px; }
        .ear.right { right: 14px; }

        .eye {
            width: 60px;
            height: 66px;
            background: #333;
            border-radius: 50%;
            position: absolute;
            top: 35px;
            transition: .3s ease;
        }
        .eye.left { left: 20px; }
        .eye.right { right: 20px; }

        .eyeball {
            width: 18px;
            height: 18px;
            background: white;
            border-radius: 50%;
            position: absolute;
            top: 22px;
            left: 22px;
            transition: .3s ease;
        }

        .eye.closed {
            height: 15px !important;
            border-radius: 30px;
            top: 60px !important;
        }

        .nose {
            width: 18px;
            height: 14px;
            background: #333;
            border-radius: 50%;
            position: absolute;
            top: 83px;
            left: 50%;
            transform: translateX(-50%);
        }

        .hand {
            width: 65px;
            height: 70px;
            background: #333;
            border-radius: 50px;
            position: absolute;
            top: 70px;
            opacity: 0;
            transform: translateY(-25px);
            transition: .4s ease;
        }

        .hand.left { left: -5px; }
        .hand.right { right: -5px; }

        .hand.show {
            opacity: 1;
            transform: translateY(5px);
        }

        /* صندوق تسجيل الدخول */
        .login-box {
            background: rgba(255,255,255,0.7);
            width: 360px;
            padding: 32px 30px;
            border-radius: 20px;
            box-shadow: 0 18px 48px rgba(0,0,0,0.25);
            text-align: center;
            backdrop-filter: blur(10px);
            animation: fadeIn 1.5s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-box h2 {
            margin-bottom: 22px;
            color: #654e31;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .login-box input {
            width: 100%;
            padding: 12px;
            margin: 8px 0 15px 0;
            border-radius: 8px;
            border: 1px solid #b88f63;
            font-size: 15px;
            outline: none;
            transition: .35s;
            font-family: 'Montserrat';
        }

        .login-box input:focus {
            border-color: #a97d4f;
            box-shadow: 0 0 0 4px rgba(201,169,121,0.25);
            transform: translateY(-1px);
        }

        /* زر login احترافي */
        .login-box button {
            background: linear-gradient(135deg, #d9c4a0, #c9a979);
            color: #fff;
            padding: 12px 35px;
            border-radius: 30px;
            border: none;
            cursor: pointer;
            font-size: 17px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: .4s ease;
            box-shadow: 0 4px 20px rgba(201,169,121,0.45);
            width: 100%;
        }

        .login-box button:hover {
            transform: scale(1.08);
            background: linear-gradient(135deg, #c9a979, #b88f63);
            box-shadow: 0 9px 28px rgba(201,169,121,0.55);
        }

    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="wedding-text">Dream weddings start here ✨</div>

    <div class="panda">
        <div class="ear left"></div>
        <div class="ear right"></div>

        <div class="face">
            <div class="eye left"><div class="eyeball"></div></div>
            <div class="eye right"><div class="eyeball"></div></div>
            <div class="nose"></div>
        </div>

        <div class="hand left"></div>
        <div class="hand right"></div>
    </div>

    <form class="login-box"   action="login.php"  method="POST" autocomplete="off">
        <h2>LOGIN</h2>
        <?php if ($error != "") echo "<p style='color:red; font-weight:600;'>$error</p>"; ?>

        <input type="text" name="username" placeholder="Username" id="username">
        <input type="password" name="password" placeholder="Password" id="password">
        <button type="submit" name="login">Login</button>

    </form>

</div>

<script>
    const username = document.getElementById("username");
    const password = document.getElementById("password");

    const eyes = document.querySelectorAll(".eye");
    const hands = document.querySelectorAll(".hand");

    username.addEventListener("input", (e) => {
        const len = e.target.value.length;
        document.querySelectorAll(".eyeball").forEach(ball => {
            ball.style.transform = `translateX(${len * 2}px)`;
        });
    });

    password.addEventListener("focus", () => {
        eyes.forEach(eye => eye.classList.add("closed"));
        hands.forEach(hand => hand.classList.add("show"));
    });

    password.addEventListener("blur", () => {
        eyes.forEach(eye => eye.classList.remove("closed"));
        hands.forEach(hand => hand.classList.remove("show"));
    });

    function goToWelcome() {
        window.location.href = "dash.php";
    }
</script>

</body>
</html>
