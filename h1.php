
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>A Day to Cherish</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Themify Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.min.css">

    <!-- Bootstrap Grid -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background-color: #fff;
            color: #444;
            text-align: center;
            overflow-x: hidden;
        }

        header {
            padding: 30px 0 10px 0;
        }

        h1 {
            font-family: "Great Vibes", cursive;
            font-size: 40px;
            color: #DFA799;
            margin: 0;
        }

        h2 {
            font-size: 14px;
            color: #d78a4e;
            margin-top: -5px;
            letter-spacing: 2px;
        }

        nav {
            margin-top: 15px;
        }

        nav a {
            text-decoration: none;
            color: #7b7b7b;
            margin: 0 15px;
            font-size: 14px;
            transition: 0.3s;
        }

        nav a:hover {
            color: #58c3c5;
        }

        /* ===== NAV ACTIVE STATE (Home) ===== */
        nav a.active {
            color: #DFA799 !important;
            font-weight: 600;
            cursor: pointer;                    /* مؤشر اليد */
        }

        nav a.active:hover {
            color: #d78a4e !important;           /* لون عند التحويم */
        }

        .hero-section {
            position: relative;
            width: 100%;
            height: 70vh;
            min-height: 500px;
            overflow: hidden;
            margin-top: 20px;
        }

        .hero-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(70%);
        }

        .side-text {
            position: absolute;
            top: 50%;
            color: #fff;
            font-size: 42px;
            font-weight: bold;
            font-family: "Great Vibes", cursive;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.6);
            opacity: 0;
            animation-duration: 1.5s;
            animation-fill-mode: forwards;
            animation-delay: 1s;
        }

        .text-left {
            left: 8%;
            transform: translateY(-50%);
            animation-name: slideInFromLeft;
        }

        .text-right {
            right: 8%;
            transform: translateY(-50%);
            animation-name: slideInFromRight;
        }

        @keyframes slideInFromLeft {
            0% { opacity: 0; transform: translateX(-50px) translateY(-50%); }
            100% { opacity: 1; transform: translateX(0) translateY(-50%); }
        }

        @keyframes slideInFromRight {
            0% { opacity: 0; transform: translateX(50px) translateY(-50%); }
            100% { opacity: 1; transform: translateX(0) translateY(-50%); }
        }

        .floating-section {
            position: relative;
            background-color: #fffaf7;
            padding: 80px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            overflow: hidden;
            flex-wrap: wrap;
        }

        .floating-text {
            max-width: 600px;
            z-index: 2;
            text-align: center;
        }

        .floating-text h2 {
            font-family: 'Great Vibes', cursive;
            font-size: 36px;
            color: #d78a4e;
            margin-bottom: 20px;
        }

        .floating-text p {
            font-size: 16px;
            color: #666;
            line-height: 1.8;
        }

        .floating-images {
            display: flex;
            flex-direction: column;
            gap: 20px;
            z-index: 1;
            pointer-events: none;
        }

        .float-img {
            width: 180px;
            height: 240px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            transition: transform 0.2s ease-out;
            will-change: transform;
            pointer-events: none;
        }

        .gallery-container {
            width: 95%;
            margin: 40px auto;
            overflow: hidden;
        }

        .gallery {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            padding: 20px 0;
        }

        .gallery img {
            width: 200px;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #eee;
            flex-shrink: 0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation-duration: 4s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;
        }

        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .gallery img:nth-child(odd) {
            animation-name: floatUp;
        }

        .gallery img:nth-child(even) {
            animation-name: floatDown;
        }

        @keyframes floatUp {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }

        @keyframes floatDown {
            0% { transform: translateY(0); }
            50% { transform: translateY(20px); }
            100% { transform: translateY(0); }
        }

        /* ===== STORY SECTION ===== */
        .wpo-story-section-s2 {
            height: 300vh;
            position: relative;
            overflow: hidden;
        }

        .story-wrapper {
            position: relative;
            height: 300vh;
            width: 100%;
        }

        .story-card {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: translateY(100vh);
            transition: transform 0s;
        }

        .story-card.active {
            transform: translateY(0);
        }

        .story-overlay {
            position: absolute;
            inset: 0;
            background: rgba(101, 67, 33, 0.78);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            text-align: center;
        }

        .story-overlay h3 {
            font-family: 'Great Vibes', cursive;
            font-size: 52px;
            color: #f5e6d3;
            margin: 0 0 20px 0;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.4);
        }

        .story-overlay p {
            font-size: 18px;
            line-height: 1.8;
            max-width: 700px;
            margin: 0;
            color: #fffaf0;
            font-weight: 300;
        }

        @media (max-width: 768px) {
            .story-overlay h3 { font-size: 38px; }
            .story-overlay p { font-size: 16px; padding: 0 20px; }
        }

        /* ===== FOOTER STYLES ===== */
        .wpo-footer-section {
            background: #8B6F5E;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            padding: 100px 0 30px;
            margin-top: 100px;
        }

        .footer-logo h4 {
            font-size: 28px;
            color: #DFA799;
            font-family: 'Great Vibes', cursive;
        }

        .wpo-upper-footer {
            margin-bottom: 40px;
        }

        .wpo-upper-footer p {
            font-family: 'Great Vibes', cursive;
            font-size: 36px;
            line-height: 1.4;
            color: #fff;
            max-width: 600px;
            margin: 0 auto 30px;
            text-align: left;
        }

        .widget-title h3 {
            font-family: 'Great Vibes', cursive;
            font-size: 28px;
            color: #fff;
            margin-bottom: 20px;
            position: relative;
        }

        .widget-title h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 40px;
            height: 2px;
            background: #fff;
        }

        .link-widget ul,
        .contact-widget ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .link-widget ul li,
        .contact-widget ul li {
            margin: 12px 0;
            font-size: 16px;
        }

        .link-widget ul li a {
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }

        .link-widget ul li a:hover {
            color: #DFA799;
            padding-left: 5px;
        }

        .contact-widget ul li {
            position: relative;
            padding-left: 28px;
            margin-bottom: 14px;
            font-size: 15px;
        }

        .contact-widget ul li i {
            position: absolute;
            left: 0;
            top: 2px;
            color: #DFA799;
            font-size: 18px;
        }

        .btn-rsvp {
            background: #DFA799;
            color: #fff;
            padding: 10px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(223, 167, 153, 0.3);
            display: inline-block;
            margin-top: 20px;
        }

        .btn-rsvp:hover {
            background: #d78a4e;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(223, 167, 153, 0.4);
        }

        .social-links {
            display: flex;
            gap: 12px;
            justify-content: flex-start;
            margin-top: 20px;
        }

        .social-icon {
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 16px;
            transition: 0.3s;
            text-decoration: none;
        }

        .social-icon:hover {
            background: #DFA799;
            transform: translateY(-3px);
            color: #fff;
        }

        .footer-map {
            margin: 50px 0 30px;
        }

        .footer-map iframe {
            width: 100%;
            height: 200px;
            border: 0;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }

        .wpo-lower-footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .copyright {
            font-size: 14px;
            color: #ddd;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .wpo-upper-footer p {
                font-size: 28px;
                text-align: center;
            }
            .widget {
                margin-bottom: 30px;
                text-align: center;
            }
            .widget-title h3::after {
                left: 50%;
                transform: translateX(-50%);
            }
            .footer-logo {
                text-align: center !important;
            }
            .btn-rsvp {
                display: block;
                text-align: center;
                margin: 20px auto 0;
                width: fit-content;
            }
            .social-links {
                justify-content: center;
            }
            .contact-widget ul li {
                text-align: center;
                padding-left: 0;
            }
            .contact-widget ul li i {
                display: none;
            }
        }

        @media (max-width: 767px) {
            .wpo-upper-footer p {
                font-size: 24px;
            }
        }
        /* ===== NEW HERO SECTION ===== */
        .wedding-hero {
            position: relative;
            width: 100%;
            padding: 40px 20px;   /* ↓↓ قللته حتى يختفي الفراغ الأبيض */
            margin-top: -40px;    /* ↓↓ يزيل الفراغ فوق الهيدر */
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            overflow: hidden;
            background: #FFFFFF;
        }


        .hero-bg-circle {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: rgba(214, 191, 173, 0.28); /* Beige */
            top: -80px;
            right: -120px;
            filter: blur(4px);
            z-index: 1;
        }

        .hero-content {
            max-width: 530px;
            z-index: 3;
        }

        .hero-title {
            font-family: 'Great Vibes', cursive;
            font-size: 68px;
            color: #8B6F5E; /* البني الخاص بموقعك */
            margin-bottom: 12px;
        }

        .hero-text {
            font-size: 17px;
            color: #6e6e6e;
            line-height: 1.8;
            margin-bottom: 26px;
        }

        /* Buttons */
        .hero-buttons {
            display: flex;
            gap: 14px;
        }

        .hero-btn-main {
            background: linear-gradient(90deg,#DFA799,#F6EDE6);
            padding: 11px 26px;
            border-radius: 30px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .hero-btn-main:hover {
            background: #DFA799;
            transform: translateY(-4px);
        }

        .hero-btn-second {
            border: 2px solid #DFA799;
            padding: 10px 24px;
            border-radius: 30px;
            color: #DFA799;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .hero-btn-second:hover {
            background: #F6EDE6;
            transform: translateY(-4px);
        }

        /* Right images */
        .hero-images {
            position: relative;
            width: 480px;
            height: 480px;
            z-index: 2;
        }

        .hero-main-img {
            width: 100%;
            height: 100%;
            border-radius: 26px;
            object-fit: cover;
            box-shadow: 0 20px 45px rgba(0,0,0,0.12);
        }

        /* floating images */
        .hero-float-img {
            position: absolute;
            width: 150px;
            height: 190px;
            object-fit: cover;
            border-radius: 18px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.10);
            animation: float 6s ease-in-out infinite;
        }

        .img-a {
            top: -40px;
            left: -40px;
            animation-delay: 0.6s;
        }

        .img-b {
            bottom: -30px;
            right: -30px;
            animation-delay: 1.2s;
        }

        /* floating animation */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-18px); }
            100% { transform: translateY(0px); }
        }

        /* responsive */
        @media (max-width: 900px) {
            .wedding-hero { flex-direction: column; text-align: center; }
            .hero-images { width: 360px; height: 360px; }
        }
        /* ===== NAVIGATION STYLING ===== */
        .nav-list {
            list-style: none;
            display: flex;
            justify-content: center; /* توسيط القائمة */
            gap: 30px; /* المسافة بين الروابط */
            padding: 0;
            margin: 0;
        }

        .nav-list li a {
            text-decoration: none;
            font-size: 16px;
            color: #7b7b7b;
            font-weight: 500;
            position: relative;
            transition: all 0.3s ease;
        }

        /* خط تحت الرابط */
        .nav-list li a::after {
            content: '';
            position: absolute;
            width: 0%;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #DFA799;
            transition: all 0.3s ease;
        }

        /* تأثير عند التحويم */
        .nav-list li a:hover {
            color: #DFA799;
            transform: translateY(-5px);
        }

        .nav-list li a:hover::after {
            width: 100%; /* يظهر الخط بالكامل */
        }

        /* للرابط النشط */
        .nav-list li a.active {
            color: #DFA799;
            font-weight: 600;
        }

        .nav-list li a.active::after {
            width: 100%; /* يظهر الخط أسفل الرابط النشط */
        }

        .nav-list li a.active:hover {
            color: #d78a4e;
            transform: translateY(-5px);
        }
        .hero-section {
            height: auto;
            min-height: 0;
            margin-top: 0;
        }
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
        .map-container {
            height: 400px;
            border-radius: 34px !important;
            border: 6px solid white;
            box-shadow: 0 45px 90px rgba(0,0,0,0.18);
            overflow: hidden;
        }

        .main-footer {
            background: linear-gradient(180deg,#8b6f5e,#6c584e);
            border-top: 6px solid rgba(223,167,153,0.5);
            box-shadow: 0 -35px 70px rgba(0,0,0,0.28);
        }

    </style>
</head>
<body>

<header>
    <!-- ========== NEW WEDDING HERO SECTION ========== -->
    <section class="wedding-hero">
        <div class="hero-bg-circle"></div>

        <div class="hero-content">
            <h1 class="hero-title">Your Dream Wedding Starts Here</h1>
            <p class="hero-text">
                We plan your wedding with elegance, perfection, and unforgettable moments.
            </p>

            <div class="hero-buttons">
                <a href="#" class="hero-btn-main">View Packages</a>
                <a href="#" class="hero-btn-second">Book Appointment</a>
            </div>
        </div>

        <div class="hero-images">
            <!-- الصورة الرئيسية (غيّري المسار حسب صورك) -->
            <img src="img/weeding5.jpg" class="hero-main-img" alt="Wedding Bride">

            <!-- صور جانبية عائمة -->
            <img src="img/wedding22.jpg" class="hero-float-img img-a" alt="Flower Decor">
            <img src="img/weeding44.jpg" class="hero-float-img img-b" alt="Wedding Detail">
        </div>
    </section>
    <!-- =============================================== -->

    <h1>“Where Love Shines Bright.”</h1>
    <h2>Weddings & Celebrations</h2>


    <nav>
        <ul class="nav-list">
            <li><a href="h1.php" class="active">Home</a></li>
            <li><a href="shop.php">shope</a></li>
            <li><a href="ser.php">services</a></li>
            <li><a href="honymoon.php">honymmon</a></li>
            <li><a href="cont.php">Contact us</a></li>
        </ul>
    </nav>




</header>

<div class="hero-section">
    <img src="img/pic4.png" alt="Celebration Cover" />
    <div class="side-text text-left">A DAY TO REMEMBER</div>
    <div class="side-text text-right">FOREVER</div>
</div>

<section class="floating-section">
    <div class="floating-images left-images">
        <img src="img/pic1.jpg" class="float-img" alt="Bride" />
        <img src="img/pic2.jpg" class="float-img" alt="Couple" />

    </div>

    <div class="floating-text">
        <h2>“You are my today and all of my tomorrows.”</h2>
        <p>
            Your smile is so gentle, yet powerful enough to light up the darkest corners of my soul.
            It carries warmth, hope, and a kind of magic the night sky could only dream of.
            While stars twinkle far away in the heavens, your smile glows right here beside me;
            real, radiant, and made just for my heart to find peace.
        </p>
    </div>

    <div class="floating-images right-images">
        <!--        <img src="img/fav2.jpg" class="float-img" alt="Couple" />-->
        <img src="img/fav3jpg.jpg" class="float-img" alt="Couple" />
        <img src="img/fav44jpg.jpg" class="float-img" alt="Arch" />
    </div>
</section>

<div class="gallery-container">
    <div class="gallery">
        <img src="img/pic4.png" alt="Wedding 4" />
        <img src="img/p6.jpg" alt="Wedding 2" />
        <img src="img/p5jpg.jpg" alt="Wedding 1" />
        <img src="img/pic1.jpg" alt="Wedding 3" />
        <img src="img/pic2.jpg" alt="Wedding 4" />
        <img src="img/pic55[2].jpg" alt="Wedding 5" />
    </div>
</div>

<!-- STORY SECTION -->
<section class="wpo-story-section-s2">
    <div class="story-wrapper">
        <div class="story-card active" style="background-image: url('img/pic1.jpg');">
            <div class="story-overlay">
                <h3>First Glance</h3>
                <p>The moment our eyes met, the world paused. A spark ignited that would light our journey forever.</p>
            </div>
        </div>
        <div class="story-card" style="background-image: url('img/pic2.jpg');">
            <div class="story-overlay">
                <h3>First Time We Met</h3>
                <p>We met by chance at a coffee shop on a rainy afternoon. She was reading her favorite book, and I offered her the last available seat. What began as casual conversation quickly turned into hours of laughter neither of them expected.</p>
            </div>
        </div>
        <div class="story-card" style="background-image: url('img/pic1.jpg');">
            <div class="story-overlay">
                <h3>She Said Yes</h3>
                <p>Under a sky full of stars, he got down on one knee. With a trembling voice and a heart full of love, he asked the question. Her answer was a whisper that echoed forever: "Yes."</p>
            </div>
        </div>
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

<!-- FOOTER -->

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

<!-- Parallax Floating Images -->
<script>
    document.addEventListener("mousemove", (e) => {
        const imgs = document.querySelectorAll(".float-img");
        imgs.forEach((img) => {
            const speed = 0.04;
            const x = (window.innerWidth / 2 - e.clientX) * speed;
            const y = (window.innerHeight / 2 - e.clientY) * speed;
            img.style.transform = `translate(${x}px, ${y}px)`;
        });
    });
</script>

<!-- GSAP + ScrollTrigger -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

<script>
    gsap.registerPlugin(ScrollTrigger);

    const cards = document.querySelectorAll('.story-card');
    const total = cards.length;

    gsap.set(cards, { y: (i) => i * 100 + 'vh' });

    ScrollTrigger.create({
        trigger: ".wpo-story-section-s2",
        start: "top top",
        end: "+=200vh",
        scrub: 1,
        pin: true,
        onUpdate: self => {
            const progress = self.progress;
            const index = Math.floor(progress * total);
            cards.forEach((card, i) => {
                card.classList.toggle('active', i === index);
            });
        }
    });

    gsap.to(cards, {
        y: (i) => -(total - 1 - i) * 100 + 'vh',
        ease: "none",
        scrollTrigger: {
            trigger: ".wpo-story-section-s2",
            start: "top top",
            end: "+=200vh",
            scrub: 1,
            invalidateOnRefresh: true
        }
    });
</script>
<script>
    gsap.from(".hero-title", {
        opacity: 0,
        y: 40,
        duration: 1.2,
        ease: "power3.out"
    });

    gsap.from(".hero-text", {
        opacity: 0,
        y: 30,
        delay: 0.3,
        duration: 1.2,
        ease: "power3.out"
    });

    gsap.from(".hero-buttons", {
        opacity: 0,
        y: 25,
        delay: 0.6,
        duration: 1.2,
        ease: "power3.out"
    });

    gsap.from(".hero-main-img", {
        opacity: 0,
        scale: 0.9,
        delay: 0.4,
        duration: 1.3,
        ease: "power3.out"
    });

    gsap.from(".hero-float-img", {
        opacity: 0,
        scale: 0.7,
        stagger: 0.3,
        delay: 0.6,
        duration: 1.3,
        ease: "power3.out"
    });
</script>

</body>
</html>