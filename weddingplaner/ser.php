<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Services - A Day to Cherish</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <style>
        :root {
            --primary: #DFA799;
            --secondary: #d78a4e;
            --text: #444;
            --light: #fffaf7;
            --gray: #7b7b7b;
            --accent: #58c3c5;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: white;
            color: var(--text);
            line-height: 1.7;
            overflow-x: hidden;
        }

        /* ==================== HEADER ==================== */
        .new-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: #fffdf9;
            backdrop-filter: blur(16px);
        }

        .header-top {
            text-align: center;
            padding: 22px 0 12px;
        }

        .logo-title {
            font-family: "Great Vibes", cursive;
            font-size: 48px;
            background: linear-gradient(90deg, #dfa799, #e8c7bc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
            letter-spacing: 1.5px;
        }

        .logo-subtitle {
            font-size: 13.5px;
            color: var(--secondary);
            letter-spacing: 5px;
            text-transform: uppercase;
            margin-top: -6px;
            font-weight: 500;
        }

        .modern-nav {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px 18px;
        }

        .modern-nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 52px;
            flex-wrap: wrap;
        }

        .modern-nav a {
            text-decoration: none;
            color: #444;
            font-weight: 500;
            font-size: 16.5px;
            position: relative;
            transition: color 0.3s;
        }

        .modern-nav a:hover { color: var(--primary); }

        .modern-nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -8px;
            left: 50%;
            background: var(--primary);
            transition: 0.4s;
            transform: translateX(-50%);
        }

        .modern-nav a:hover::after { width: 80%; }

        .modern-nav .ser-btn {
            background: linear-gradient(135deg, #dfa799, #d78a4e);
            color: white !important;
            padding: 12px 34px !important;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 6px 22px rgba(223,167,153,0.4);
            transition: all 0.4s ease;
            position: relative;
        }

        .modern-nav .ser-btn::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 10px;
            width: 0;
            height: 3px;
            background: #fff;
            border-radius: 3px;
            transition: width 0.45s ease;
            transform: translateX(-50%);
        }

        .modern-nav .ser-btn:hover::after {
            width: 60%;
        }

        .modern-nav .ser-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 35px rgba(223,167,153,0.6);
        }

        /* ==================== HERO SLIDER ==================== */
        .hero-slider {
            position: relative;
            width: 100%;
            height: 75vh;
            min-height: 500px;
            overflow: hidden;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transform: scale(1.05);
            transition: all 1.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .slide.active {
            opacity: 1;
            transform: scale(1);
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.8);
        }

        .slide-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.4));
        }

        .slide-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 10;
            max-width: 800px;
            padding: 0 20px;
            opacity: 0;
            transition: all 1s ease 0.5s;
        }

        .slide.active .slide-caption {
            opacity: 1;
        }

        .slide-caption h1 {
            font-size: 52px;
            font-weight: 600;
            margin-bottom: 18px;
            text-shadow: 0 4px 15px rgba(0,0,0,0.5);
            letter-spacing: 1px;
            line-height: 1.2;
        }

        .slide-caption p {
            font-size: 20px;
            opacity: 0.95;
            text-shadow: 0 2px 8px rgba(0,0,0,0.4);
            font-weight: 300;
            margin-bottom: 30px;
        }

        .cta-btn {
            display: inline-block;
            padding: 16px 40px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(223, 167, 153, 0.4);
        }

        .cta-btn:hover {
            background: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(223, 167, 153, 0.5);
        }

        /* ==================== SERVICES SECTION ==================== */
        .services-section {
            padding: 100px 5%;
            max-width: 1300px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 36px;
            color: var(--secondary);
            margin-bottom: 20px;
            font-weight: 600;
        }

        .section-header p {
            font-size: 17px;
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            margin-bottom: 80px;
        }

        .service-card {
            background: white;
            padding: 40px 30px;
            border-radius: 16px;
            text-align: center;
            transition: all 0.4s ease;
            border: 2px solid transparent;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 40px rgba(223,167,153,0.25);
            border-color: var(--primary);
        }

        .service-card i {
            font-size: 48px;
            color: var(--primary);
            margin-bottom: 20px;
            transition: transform 0.4s;
        }

        .service-card:hover i {
            transform: scale(1.1) rotate(5deg);
        }

        .service-card h3 {
            font-size: 20px;
            color: var(--text);
            margin-bottom: 12px;
            font-weight: 600;
        }

        .service-card p {
            font-size: 15px;
            color: var(--gray);
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* زر داخل الكرت */
        .service-card .details-btn {
            display: inline-block;
            padding: 10px 28px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.4s ease;
            box-shadow: 0 6px 20px rgba(223,167,153,0.3);
        }

        .service-card .details-btn:hover {
            background: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(223,167,153,0.5);
        }

        /* Featured Image Section */
        .featured-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            margin-top: 80px;
        }

        .featured-content h3 {
            font-size: 32px;
            color: var(--secondary);
            margin-bottom: 20px;
            font-weight: 600;
        }

        .featured-content p {
            font-size: 16px;
            color: var(--gray);
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .featured-image {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }

        .featured-image img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .featured-image:hover img {
            transform: scale(1.08);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .logo-title { font-size: 36px; }
            .slide-caption h1 { font-size: 36px; }
            .slide-caption p { font-size: 16px; }
            .section-header h2 { font-size: 28px; }
            .services-grid { grid-template-columns: 1fr; }
            .featured-section { grid-template-columns: 1fr; }
            .featured-image img { height: 350px; }
        }
    </style>
</head>
<body>

<!-- HEADER -->
<header class="new-header">
    <div class="header-top">
        <h1 class="logo-title">“Where Love Shines Bright.”</h1>
        <p class="logo-subtitle">Weddings & Celebrations</p>
    </div>

    <nav class="modern-nav">
        <ul>
            <li><a href="h1.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="ser.php" class="ser-btn">Services</a></li>
            <li><a href="honymoon.php">Honeymoon</a></li>
            <li><a href="cont.php">Contact us</a></li>
        </ul>
    </nav>
</header>

<!-- HERO SLIDER -->
<div class="hero-slider">
    <div class="slide active">
        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=1600" alt="Wedding Services">
        <div class="slide-overlay"></div>
        <div class="slide-caption">
            <h1>Book All Services for Your Wedding</h1>
            <p>From music to decor, everything in one place</p>
            <a href="#services" class="cta-btn">Explore Services</a>
        </div>
    </div>
    <div class="slide">
        <img src="img/pic2.jpg" alt="Dream Wedding">
        <div class="slide-overlay"></div>
        <div class="slide-caption">
            <h1>Craft Your Dream Day</h1>
            <p>Every detail perfected, every moment cherished</p>
            <a href="#services" class="cta-btn">Get Started</a>
        </div>
    </div>
</div>

<!-- SERVICES SECTION -->
<section class="services-section" id="services">
    <div class="section-header">
        <h2>Our Wedding Services</h2>
        <p>Discover our expert wedding professionals who bring together the finest services to create an unforgettable celebration tailored to your unique love story.</p>
    </div>

    <div class="services-grid">
        <!-- Music & DJs -->
        <div class="service-card">
            <i class="fas fa-music"></i>
            <h3>Music & DJs</h3>
            <p>Set the perfect ambiance with professional musicians and DJs who understand your musical vision</p>
            <a href="dj.php" class="details-btn">View Details</a>
        </div>

        <!-- Wedding Cakes -->
        <div class="service-card">
            <i class="fas fa-birthday-cake"></i>
            <h3>Wedding Cakes</h3>
            <p>Indulge in exquisite custom cakes that taste as amazing as they look</p>
            <a href="cake.php" class="details-btn">View Details</a>
        </div>

        <!-- Decor & Styling -->
        <div class="service-card">
            <i class="fas fa-palette"></i>
            <h3>Decor & Styling</h3>
            <p>Transform your venue with stunning decor that reflects your personal style</p>
            <a href="decor.php" class="details-btn">View Details</a>
        </div>

        <!-- Stationery -->
        <div class="service-card">
            <i class="fas fa-envelope"></i>
            <h3>Stationery</h3>
            <p>Beautiful custom invitations and stationery for every wedding detail</p>
            <a href="invitation.php" class="details-btn">View Details</a>
        </div>

        <!-- القاعات - الكرت الجديد -->
        <div class="service-card">
            <i class="fas fa-building"></i>
            <h3>Wedding Halls & Venues</h3>
            <p>Choose from luxurious and unique halls that perfectly match your wedding vision and guest count</p>
            <a href="decore.php" class="details-btn">View Details</a>
        </div>
    </div>

    <!-- Featured Section -->
    <div class="featured-section">
        <div class="featured-content">
            <h3>Creating Unforgettable Moments</h3>
            <p>At A Day to Cherish, we understand that your wedding day is one of the most important moments of your life. Our curated network of trusted professionals ensures every detail is handled with care and expertise.</p>
            <p>From intimate gatherings to grand celebrations, we provide comprehensive services that bring your vision to life, allowing you to relax and enjoy every moment of your special day.</p>
            <a href="#services" class="cta-btn">Wedding Services</a>
        </div>
        <div class="featured-image">
            <img id="serviceSlide" src="img/ss6.jpg" alt="Services">
        </div>
    </div>
</section>

<!-- SCRIPTS -->
<script>
    // Hero Slider
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;
    const slideInterval = 5000;

    function showSlide(n) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === n);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    let autoPlay = setInterval(nextSlide, slideInterval);

    const slider = document.querySelector('.hero-slider');
    slider.addEventListener('mouseenter', () => clearInterval(autoPlay));
    slider.addEventListener('mouseleave', () => autoPlay = setInterval(nextSlide, slideInterval));

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // تغيير صورة القسم البارز كل 2 ثانية
    const serviceImages = ["img/ss2.jpg", "img/m2.jpg", "img/ss4.jpg", "img/ss5.jpg", "img/ss6.jpg"];
    let j = 0;
    setInterval(() => {
        j = (j + 1) % serviceImages.length;
        document.getElementById("serviceSlide").src = serviceImages[j];
    }, 2000);
</script>

</body>
</html>