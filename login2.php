<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dream Wedding</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{
            --textColor:#D6C3A8;
        }
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            background-color: #f4f6fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 900px;
            height: 550px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            position: relative;
            animation: containerEntry 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        @keyframes containerEntry {
            0% {
                opacity: 0;
                transform: scale(0.8) translateY(50px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .forms-wrapper {
            display: flex;
            width: 1800px;
            height: 100%;
            transition: transform 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .container.signup-mode .forms-wrapper {
            transform: translateX(-900px);
        }

        .form-box {
            width: 900px;
            height: 100%;
            display: flex;
        }

        .form-section {
            width: 50%;
            padding: 45px 40px;
            margin-top: 0;
            position: relative;
            overflow: hidden;
        }

        /* أنيميشن للنصوص */
        .form-section > * {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        .form-section > *:nth-child(1) { animation-delay: 0.1s; }
        .form-section > *:nth-child(2) { animation-delay: 0.2s; }
        .form-section > *:nth-child(3) { animation-delay: 0.3s; }
        .form-section > form { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* عند التبديل - إعادة الأنيميشن */
        .container.signup-mode .form-section > * {
            animation: fadeInUp 0.6s ease forwards;
        }

        .image-section {
            width: 50%;
            position: relative;
            overflow: hidden;
        }

        .image-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(214,195,168,0.3), rgba(214,195,168,0.1));
            z-index: 1;
            transition: opacity 0.5s;
        }

        .image-section:hover::before {
            opacity: 0.5;
        }

        .image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .image-section:hover img {
            transform: scale(1.1);
        }

        /* نصوص */
        h3 {
            color: var(--textColor);
            font-size: 20px;
            font-weight: 600;
            position: relative;
            display: inline-block;
        }

        h3::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -5px;
            left: 0;
            background: linear-gradient(90deg, var(--textColor), transparent);
            animation: expandLine 1s ease forwards;
            animation-delay: 0.5s;
        }

        @keyframes expandLine {
            to { width: 100%; }
        }

        h2 {
            color: #1e1e2f;
            margin-bottom: 8px;
            font-size: 26px;
        }

        p {
            font-size: 14px;
            color: #777;
        }

        p a {
            color: var(--textColor);
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            position: relative;
            transition: color 0.3s;
        }

        p a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: var(--textColor);
            transition: width 0.3s;
        }

        p a:hover::after {
            width: 100%;
        }

        p a:hover {
            color: #c5b295;
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 5px;
            font-size: 14px;
            color: #444;
            font-weight: 500;
            transition: color 0.3s;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="text"]:focus {
            border-color: var(--textColor);
            box-shadow: 0 0 0 3px rgba(214,195,168,0.1);
            transform: translateY(-2px);
        }

        input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            background: linear-gradient(135deg, var(--textColor) 0%, #c5b295 100%);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            font-size: 15px;
            transition: all 0.4s ease;
            box-shadow: 0 4px 15px rgba(214,195,168,0.3);
            position: relative;
            overflow: hidden;
        }

        /* تأثير لامع على الزر */
        input[type="submit"]::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        input[type="submit"]:hover::before {
            left: 100%;
        }

        input[type="submit"]:hover {
            background-color: var(--textColor);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(214,195,168,0.4);
        }

        input[type="submit"]:active {
            transform: translateY(-1px);
        }

        small {
            display: block;
            margin-top: 15px;
            color: #888;
            font-size: 12px;
        }

        small a {
            color: var(--textColor);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        small a:hover {
            color: #c5b295;
        }

        /* تأثيرات ديكورية */
        .form-section::before {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(214,195,168,0.1), transparent);
            border-radius: 50%;
            top: -50px;
            right: -50px;
            animation: float 6s ease-in-out infinite;
        }

        .form-section::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(214,195,168,0.08), transparent);
            border-radius: 50%;
            bottom: -30px;
            left: -30px;
            animation: float 8s ease-in-out infinite;
            animation-delay: 1s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-20px) scale(1.1); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                height: auto;
                min-height: 600px;
            }

            .forms-wrapper {
                width: 190%;
            }

            .form-box {
                width: 100%;
                flex-direction: column-reverse;
            }

            .form-section,
            .image-section {
                width: 100%;
            }

            .image-section {
                height: 200px;
            }

            .form-section {
                padding: 40px 30px;
                margin-top: 0;
            }
        }
    </style>
</head>
<body>
<div class="container" id="main-container">
    <div class="forms-wrapper">

        <!-- Login Page -->
        <div class="form-box">
            <div class="form-section">
                <h3>Dream Wedding</h3>
                <h2>Welcome Back</h2>
                <p>Not registered yet? <a id="goSignUp">Sign up</a></p>

                <form action="auth_login.php" method="POST" autocomplete="off">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email" required>

                    <label>Password</label>
                    <input type="password" name="password" placeholder="Write a complex password" required minlength="8" maxlength="15">

                    <input type="submit" value="Sign In">

                    <small>Forgot your password? <a href="#">Get help signing in</a></small>
                </form>
            </div>

            <div class="image-section">
                <img src="img/login.jpg" alt="login image">
            </div>
        </div>

        <div class="form-box">
            <div class="image-section">
                <img src="img/login.jpg" alt="signup image">
            </div>

            <div class="form-section">
                <h3>Dream Wedding</h3>
                <h2>Create Account</h2>
                <p>Already have an account? <a id="goSignIn">Sign in</a></p>

                <form method="POST" action="auth_signup.php">
                    <label>Full Name</label>
                    <input type="text" name="full_name" placeholder="Enter your full name" required>

                    <label>Email</label>
                    <input type="email" name="email" placeholder="Write a valid email" required>

                    <label>Password</label>
                    <input type="password" name="password" placeholder="Create a strong password" required minlength="8" maxlength="15">


                    <input type="submit" value="Sign Up">
                </form>
            </div>
        </div>

    </div>
</div>

<script>
    const container = document.getElementById('main-container');
    const goSignUp = document.getElementById('goSignUp');
    const goSignIn = document.getElementById('goSignIn');

    goSignUp.addEventListener('click', () => {
        container.classList.add('signup-mode');
        resetAnimations();
    });

    goSignIn.addEventListener('click', () => {
        container.classList.remove('signup-mode');
        resetAnimations();
    });

    function resetAnimations() {
        const formSections = document.querySelectorAll('.form-section');
        formSections.forEach(section => {
            const children = section.children;
            for(let i = 0; i < children.length; i++) {
                children[i].style.animation = 'none';
                setTimeout(() => {
                    children[i].style.animation = '';
                }, 10);
            }
        });
    }

</script>


</body>
</html>