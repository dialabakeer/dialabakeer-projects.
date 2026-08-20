<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us - A Day to Cherish</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --primary: #DFA799;
            --dark: #8B6F5E;
            --light: #f8f5f3;
            --gray: #999;
            --text: #7b7b7b;
            --hover: #58c3c5;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            color: #444;
            margin: 0;
            overflow-x: hidden;
        }

        /* ===== HEADER ===== */
        .main-header {
            padding: 30px 0 10px;
            text-align: center;
        }

        .main-header h1 {
            font-family: 'Great Vibes', cursive;
            font-size: 38px;
            color: var(--primary);
            margin: 0;
            letter-spacing: 1px;
        }

        .main-header p {
            font-size: 14px;
            color: #d78a4e;
            letter-spacing: 2px;
            font-weight: 500;
            margin-top: -5px;
        }

        .nav-links {
            margin-top: 15px;
        }

        .nav-links a {
            margin: 0 18px;
            color: var(--text);
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: color 0.3s ease;
            cursor: pointer;
        }

        .nav-links a:hover {
            color: var(--hover);
        }

        .nav-links a.active {
            color: var(--primary) !important;
            font-weight: 600;
        }

        .nav-links a.active:hover {
            color: #d78a4e !important;
        }

        /* ===== HERO SECTION ===== */
        .hero-contact {
            background: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)),
            url('https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;
            padding: 100px 20px;
            text-align: center;
            position: relative;
            min-height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero-contact::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300"><path fill="%23f5e6d3" fill-opacity="0.6" d="M0,100 Q200,50 400,100 T800,100 L1000,300 L0,300 Z"/></svg>') bottom/100% 100% no-repeat;
        }

        .page-title {
            font-family: 'Great Vibes', cursive;
            font-size: 60px;
            color: #000;
            margin-bottom: 10px;
        }

        .breadcrumb {
            font-size: 16px;
            color: var(--gray);
        }

        .breadcrumb a {
            color: var(--primary);
            text-decoration: none;
        }

        /* ===== CONTACT INFO CARDS ===== */
        .contact-info {
            padding: 80px 0;
            background: #fff;
        }

        .info-card {
            text-align: center;
            padding: 30px;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: 0.3s;
            margin-bottom: 20px;
        }

        .info-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .info-icon {
            width: 70px;
            height: 70px;
            background: #f0e6e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 28px;
            color: var(--primary);
        }

        .info-card h5 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #000;
        }

        .info-card p {
            color: var(--gray);
            margin: 5px 0;
            font-size: 15px;
        }

        /* ===== CONTACT FORM ===== */
        .contact-form-section {
            padding: 80px 0;
            background: var(--light);
        }

        .form-title {
            font-size: 36px;
            margin-bottom: 15px;
            color: #000;
        }

        .form-text {
            max-width: 600px;
            margin: 0 auto 40px;
            color: var(--gray);
            line-height: 1.8;
        }

        .contact-form .form-control {
            border: none;
            border-bottom: 2px solid #ddd;
            border-radius: 0;
            padding: 12px 0;
            font-size: 15px;
            background: transparent;
        }

        .contact-form .form-control:focus {
            border-color: var(--primary);
            box-shadow: none;
        }

        .contact-form .row.g-4 {
            row-gap: 1.5rem;
        }

        .contact-form select.form-control {
            appearance: none;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23999' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E") no-repeat right 10px center;
            background-size: 12px;
        }

        .contact-form textarea {
            min-height: 140px;
            resize: none;
        }

        .btn-submit {
            background: var(--primary);
            color: #fff;
            padding: 12px 40px;
            border: none;
            border-radius: 30px;
            font-weight: 500;
            margin-top: 20px;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: #d78a4e;
            transform: translateY(-2px);
        }

        /* ===== MAP ===== */
        .map-container {
            height: 400px;
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: -100px;
        }

        /* ===== FOOTER ===== */
        .main-footer {
            background: var(--dark);
            color: #ddd;
            padding: 160px 0 40px;
            margin-top: 100px;
        }

        .footer-text {
            font-family: 'Great Vibes', cursive;
            font-size: 36px;
            color: #fff;
            line-height: 1.4;
            max-width: 500px;
        }

        .footer-links h5,
        .footer-contact h5 {
            font-family: 'Great Vibes', cursive;
            font-size: 26px;
            color: #fff;
            margin-bottom: 20px;
            position: relative;
        }

        .footer-links h5::after,
        .footer-contact h5::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 40px;
            height: 2px;
            background: #fff;
        }

        .footer-links ul,
        .footer-contact ul {
            list-style: none;
            padding: 0;
        }

        .footer-links ul li,
        .footer-contact ul li {
            margin: 12px 0;
        }

        .footer-links ul li a {
            color: #ddd;
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-links ul li a:hover {
            color: var(--primary);
            padding-left: 5px;
        }

        .footer-contact ul li {
            padding-left: 28px;
            position: relative;
            color: #ccc;
            font-size: 15px;
        }

        .footer-contact ul li i {
            position: absolute;
            left: 0;
            top: 2px;
            color: var(--primary);
        }

        @media (max-width: 991px) {
            .footer-text {
                font-size: 28px;
                text-align: center;
                margin-bottom: 30px;
            }
            .footer-links h5::after,
            .footer-contact h5::after {
                left: 50%;
                transform: translateX(-50%);
            }
        }
        /* ===================== GLOBAL LUXURY TOUCH ===================== */
        body {
            background: linear-gradient(180deg, #fffdf9, #faf3ec);
        }

        /* ===================== STICKY GLASS HEADER ===================== */
        .main-header {
            background: rgba(255,255,255,0.6);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(0,0,0,0.06);
            position: sticky;
            top: 0;
            z-index: 999;
            padding: 25px 0 12px;
        }

        .nav-links a {
            padding: 8px 18px;
            border-radius: 40px;
            transition: 0.3s;
        }

        .nav-links a:hover {
            background: rgba(223,167,153,0.25);
            color: var(--primary);
        }

        .nav-links a.active {
            background: rgba(223,167,153,0.32);
            color: white !important;
        }

        /* ===================== HERO SECTION PREMIUM ===================== */
        .hero-contact {
            background-size: cover;
            background-position: center;
            border-bottom: 6px solid rgba(223,167,153,0.4);
            box-shadow: 0 35px 65px rgba(0,0,0,0.18);
            animation: heroUp 1s ease forwards;
            opacity: 0;
        }
        @keyframes heroUp {
            from {opacity: 0; transform: translateY(30px)}
            to {opacity:1; transform: translateY(0)}
        }

        /* ===================== CONTACT CARDS ===================== */
        .info-card {
            border-radius: 26px;
            background: white;
            box-shadow: 0 20px 45px rgba(0,0,0,0.10);
            transition: 0.4s ease;
            border: 1px solid rgba(0,0,0,0.08);
            padding: 40px 25px;
        }

        .info-card:hover {
            transform: translateY(-14px) scale(1.02);
            box-shadow: 0 45px 90px rgba(0,0,0,0.15);
        }

        /* ===================== ICON WITH GOLD RING ===================== */
        .info-icon {
            width: 85px;
            height: 85px;
            font-size: 35px;
            background: #fffdf7;
            border: 4px solid rgba(223,167,153,0.45);
            box-shadow: 0 18px 35px rgba(223,167,153,0.35);
        }

        /* ===================== CONTACT FORM PREMIUM BOX ===================== */
        .contact-form {
            background: white;
            padding: 55px 40px;
            border-radius: 28px;
            border: 1px solid rgba(0,0,0,0.07);
            box-shadow: 0 35px 70px rgba(0,0,0,0.12);
            animation: formFade 1s ease;
        }
        @keyframes formFade {
            from {opacity: 0; transform: translateY(25px);}
            to {opacity:1; transform: translateY(0);}
        }

        /* INPUT UNDERLINE */
        .contact-form .form-control {
            border-bottom: 2px solid #e9d9cf!important;
        }

        .contact-form .form-control:focus {
            border-bottom-color: var(--primary) !important;
        }

        /* ===================== BUTTON PREMIUM ===================== */
        .btn-submit {
            background: linear-gradient(135deg,#dfa799,#d78a4e);
            box-shadow: 0 20px 48px rgba(223,167,153,0.45);
            font-size: 16px;
        }
        .btn-submit:hover {
            background: linear-gradient(135deg,#d78a4e,#bf7241);
            transform: translateY(-6px);
            box-shadow: 0 35px 70px rgba(223,167,153,0.65);
        }

        /* ===================== MAP PREMIUM ===================== */
        .map-container {

            border-radius: 34px !important;
            border: 6px solid white;
            box-shadow: 0 45px 90px rgba(0,0,0,0.18);
            overflow: hidden;
        }

        /* ===================== FOOTER PREMIUM ===================== */
        .main-footer {
            background: linear-gradient(180deg,#8b6f5e,#6c584e);
            border-top: 6px solid rgba(223,167,153,0.5);
            box-shadow: 0 -35px 70px rgba(0,0,0,0.28);
        }

    </style>
</head>
<body>

<!-- Main Header -->
<header class="main-header">
    <h1>“Where Love Shines Bright.”</h1>
    <p>Weddings & Celebrations</p>

    <div class="nav-links">
        <a href="h1.php">Home</a>
        <a href="shop.php">shop</a>
        <a href="ser.php">Services</a>
        <a href="honymoon.php">Honymoon</a>
        <a href="cont.php" class="active">Contact us</a>
    </div>
</header>

<!-- Hero Section -->
<section class="hero-contact">
    <div class="container">
        <h1 class="page-title">Contact Us</h1>
        <p class="breadcrumb">
            <a href="h1.php">Home</a> • Contact
        </p>
    </div>
</section>

<!-- Contact Info Cards -->
<!-- Contact Info Cards -->
<section class="contact-info">
    <div class="container">
        <div class="row g-4">

            <!-- Address -->
            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5>Address</h5>
                    <p>Palestine</p>
                    <p>Nablus</p>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5>Email Us</h5>
                    <p>s12219578@stu.najah.edu</p>
                </div>
            </div>

            <!-- Phone -->
            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h5>Call Now</h5>
                    <p>0599 837 47</p>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="contact-form-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="form-title">Have Any Question?</h2>
            <p class="form-text">
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
            </p>
        </div>
        <form class="contact-form" method="POST" action="send_contact.php">

            <div class="row g-4">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name*" required>
                </div>

                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Your Email*" required>
                </div>

                <div class="col-md-6">
                    <input type="text" name="address" class="form-control" placeholder="Address">
                </div>

                <div class="col-md-6">
                    <select name="service" class="form-control">
                        <option>Wedding Planning</option>
                        <option>Photography</option>
                        <option>Decoration</option>
                    </select>
                </div>

                <div class="col-12">
                    <textarea name="message" class="form-control" placeholder="Message..." required></textarea>
                </div>

                <div class="col-12 text-center">
                    <button type="submit" class="btn-submit">Send Message</button>
                </div>
            </div>

        </form>


    </div>
</section>

<!-- Map -->
<div class="container-fluid px-0">
    <div class="map-container">
        <iframe
                src="https://www.google.com/maps?q=Nablus%20Palestine&output=embed"
                width="100%"
                height="100%"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
        </iframe>

    </div>
</div>

<!-- Footer -->
<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5">
                <p class="footer-text">
                    We can’t wait to see all of our beloved friends and relatives at our wedding. Your presence will make our day truly special!
                </p>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-links">
                    <h5>Links</h5>
                    <ul>
                        <li><a href="about.html">About As</a></li>
                        <li><a href="story.html">Story</a></li>
                        <li><a href="rsvp.html">RSVP</a></li>
                        <li><a href="cont.html">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-contact">
                    <h5>Contacts</h5>
                    <ul>
                        <li><i class="fas fa-envelope"></i> s12219578@stu.najah.edu</li>
                        <li><i class="fas fa-phone"></i> 0599 837 47</li>
                        <li><i class="fas fa-map-marker-alt"></i> Palestine, Nablus</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>