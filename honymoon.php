<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honeymoon - Where Love Shines Bright</title>
    <style>
        :root {
            --peach-bg: #f9e6d8;
            --peach-text: #d2691e;
            --peach-border: #f4c2a1;
            --peach-shadow: rgba(210, 105, 30, 0.15);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Georgia', serif;
            background-color: var(--peach-bg);
            color: #5d4037;
            min-height: 100vh;
        }

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
        /* Mega Menu */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .mega-menu {
            position: fixed;
            top:180px;
            left: 0;
            right: 0;
            width: 100%;
            background: #fffdf9;
            box-shadow: 0 18px 40px rgba(0,0,0,0.15);
            padding: 40px 40px 50px;
            border-radius: 0 0 24px 24px;
            z-index: 998;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px);
            transition: all 0.45s ease;
            pointer-events: none;
        }
        .dropdown:hover > .mega-menu,
        .mega-menu:hover {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            pointer-events: all;
        }
        .mega-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.8fr 1.2fr;
            gap: 40px;
            align-items: start;
            padding: 20px 0;
        }
        .mega-left h3 {
            font-size: 32px;
            color: var(--secondary);
            margin-bottom: 22px;
            line-height: 1.2;
        }
        .mega-services-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px 20px;
        }
        .mega-service-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 17px;
            padding: 6px 0;
            transition: 0.3s;
        }
        .mega-right-image img {
            width: 100%;
            max-width: 460px;
            height: 420px;
            object-fit: cover;
            border-radius: 26px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.22);
        }
        .honeymoon-section {
            padding: 260px 20px 50px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .title {
            text-align: center;
            font-size: 2.3em;
            color: var(--peach-text);
            margin-top: 0;
            margin-bottom: 40px;
            font-family: 'Dancing Script', cursive;
            text-shadow: 1px 1px 2px rgba(210, 105, 30, 0.1);
        }

        .carousel-3d-container {
            perspective: 900px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            height: 360px;
        }

        .carousel-3d {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.45s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .carousel-item {
            position: absolute;
            width: 330px;
            height: 440px;
            margin-left: -165px;
            margin-top: -220px;
            left: 50%;
            top: 50%;

            background: #fffef9;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 12px 40px var(--peach-shadow);
            transition: all 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            border: 2px solid var(--peach-border);
        }

        .carousel-item-image {
            width: 100%;
            height: 160px;
            overflow: hidden;
            position: relative;
        }

        .carousel-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            transition: opacity 0.5s;
        }

        .carousel-item-image img.active {
            display: block;
        }

        /* Image Navigation Arrows */
        .image-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.85);
            color: var(--peach-text);
            border: none;
            font-size: 20px;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            transition: all 0.3s;
            opacity: 0;
        }

        .carousel-item:hover .image-arrow {
            opacity: 1;
        }

        .image-arrow:hover {
            background: var(--peach-text);
            color: white;
        }

        .image-arrow-left { left: 8px; }
        .image-arrow-right { right: 8px; }

        /* Image Dots */
        .image-dots {
            position: absolute;
            bottom: 8px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 5px;
            z-index: 10;
        }

        .image-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s;
        }

        .image-dot.active {
            background: white;
            width: 18px;
            border-radius: 3px;
        }

        .carousel-item-content {
            padding: 20px;
        }

        .destination-name {
            font-size: 1.6em;
            color: var(--peach-text);
            margin-bottom: 10px;
            font-family: 'Dancing Script', cursive;
        }

        .description {
            font-size: 0.88em;
            line-height: 1.5;
            margin-bottom: 10px;
            color: #6d4c41;
        }

        .rating {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 0.85em;
            color: #8d6e63;
        }

        .stars {
            color: #ff8c00;
            font-size: 1em;
            margin-left: 6px;
        }

        .price {
            font-size: 1.2em;
            font-weight: bold;
            color: var(--peach-text);
        }

        .carousel-controls {
            position: absolute;
            bottom: -70px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 100;
        }

        .carousel-btn {
            background: white;
            color: var(--peach-text);
            border: 2px solid var(--peach-border);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            font-size: 22px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px var(--peach-shadow);
        }

        .carousel-btn:hover {
            background: var(--peach-text);
            color: white;
            transform: scale(1.1);
        }

        .carousel-indicators {
            position: absolute;
            bottom: -110px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
        }

        .indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--peach-border);
            cursor: pointer;
            transition: all 0.3s;
        }

        .indicator.active {
            background: var(--peach-text);
            width: 26px;
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            .logo { font-size: 1.8em; }
            .subtitle { font-size: 1em; }
            nav a { margin: 0 10px; font-size: 0.85em; }
            .title { font-size: 1.9em; }
            .carousel-3d-container {
                height: 420px;
            }
            .carousel-item {
                width: 300px;
                height: 400px;
                margin-left: -150px;
                margin-top: -200px;
            }
            .carousel-item-image {
                height: 190px;
            }
        }/* =========================
   HEADER EXACT MATCH STYLE
   ========================= */

        header {
            background: #f4e4d6;        /* نفس الخلفية الفاتحة تماماً */
            padding: 35px 20px 18px;
            text-align: center;
        }

        /* MAIN TITLE */
        .logo {
            font-family: 'Dancing Script', cursive;
            font-size: 55px;            /* نفس الحجم القديم */
            color: #b66a34;             /* البني المحروق */
            font-weight: 600;
            margin: 0;
            letter-spacing: 1px;
        }

        /* SUBTITLE */
        .subtitle {
            font-size: 20px;
            color: #b66a34;
            margin-top: 4px;
            margin-bottom: 25px;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        /* NAVIGATION */
        nav {
            margin-top: 5px;
        }

        nav a {
            text-decoration: none;
            color: #8b5a37;                 /* نفس البني */
            font-weight: 600;
            font-size: 18px;
            display: inline-block;
            padding: 8px 18px;
            transition: all .25s ease;
        }

        /* NAV HOVER EFFECT */
        nav a:hover {
            color: #b66a34;
            transform: translateY(-2px);
        }

        /* ACTIVE PAGE */
        nav a.active {
            color: #b66a34 !important;      /* واضح وفخم */
            font-weight: 700;
            transform: translateY(-1px);
        }

        /* REMOVE WHITE GAP BELOW HEADER */
        .honeymoon-section {
            padding-top: 100px !important;  /* أقل بكثير */
        }
        /* ====== NEW CARD SIZE IMPROVEMENT ====== */

        /* تقليل حجم الكارد */
        .carousel-item {
            width: 270px !important;      /* كان 330 */
            height: 380px !important;     /* كان 440 */
            margin-left: -135px !important;
            margin-top: -190px !important;
            border-radius: 16px !important;
        }

        /* تقليل ارتفاع الصورة داخل الكارد */
        .carousel-item-image {
            height: 135px !important;     /* كان 160 */
        }

        /* تحسين النصوص بعد التصغير */
        .carousel-item-content {
            padding: 16px !important;
        }

        .destination-name {
            font-size: 1.4em !important;  /* كان 1.6 */
        }

        .description {
            font-size: 0.82em !important;
            line-height: 1.45 !important;
        }

        .price {
            font-size: 1.05em !important;
        }

        /* تعديل مساحة العرض ككل */
        .carousel-3d-container {
            height: 310px !important;     /* كان 360 */
        }


    </style>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<header class="new-header">
    <div class="header-top">
        <h1 class="logo-title">“Where Love Shines Bright.”</h1>
        <p class="logo-subtitle">Weddings & Celebrations</p>
    </div>
    <nav class="modern-nav">
        <ul>
            <li><a href="h1.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li class="dropdown">
                <a href="ser.php" class="ser-btn">Services</a>
                <div class="mega-menu">
                    <div class="mega-container">
                        <div class="mega-left">
                            <h3>Book all the services for your wedding</h3>
                            <div class="mega-services-grid">
                                <a href="dj.php" class="mega-service-item">Music and DJs</a>
                                <a href="cake.php" class="mega-service-item">Cakes</a>
                                <a href="decor.php" class="mega-service-item">Decor & Styling</a>
                                <a href="invitation.php" class="mega-service-item">Stationery</a>
                                <a href="decore.php" class="mega-service-item">Wedding halls</a>
                            </div>
                        </div>
                        <div class="mega-right-image">
                            <img id="serviceSlide" src="img/ss6.jpg" alt="Services Default">
                        </div>
                    </div>
                </div>
            </li>
            <li><a href="honymoon.php">Honeymoon</a></li>
            <li><a href="cont.php">Contact us</a></li>
        </ul>
    </nav>
</header>


<section class="honeymoon-section">
    <h2 class="title">Dream Honeymoon Destinations</h2>

    <div class="carousel-3d-container">
        <div class="carousel-3d" id="carousel3d">
            <!-- Maldives -->
            <div class="carousel-item clickable" data-index="0" onclick="window.location.href='maldives.php'">
                <div class="carousel-item-image">
                    <img src="img/mal1.jpg" alt="Maldives" class="active">
                    <img src="img/mal2.jpg" alt="Maldives">
                    <img src="img/mal3.jpg" alt="Maldives">
                    <img src="img/mal11.jpg" alt="Maldives">
                    <button class="image-arrow image-arrow-left" onclick="changeImage(0, -1, event)">‹</button>
                    <button class="image-arrow image-arrow-right" onclick="changeImage(0, 1, event)">›</button>
                    <div class="image-dots"></div>
                </div>
                <div class="carousel-item-content">
                    <h3 class="destination-name">Maldives</h3>
                    <p class="description">A tropical paradise with overwater villas, crystal-clear turquoise waters, and white sandy beaches.</p>
                    <div class="rating">
                        <span>Guest Rating:</span>
                        <span class="stars">★★★★★ (4.8/5)</span>
                    </div>
                    <div class="price">From $500 per night</div>
                </div>
            </div>

            <!-- Bali -->
            <div class="carousel-item" data-index="1">
                <div class="carousel-item-image">
                    <img src="img/bal1.jpg" alt="Bali" class="active">
                    <img src="img/bal2.jpg" alt="Bali">
                    <img src="img/bal3.jpg" alt="Bali">
                    <img src="img/bal333.jpg" alt="Bali">
                    <button class="image-arrow image-arrow-left" onclick="changeImage(1, -1, event)">‹</button>
                    <button class="image-arrow image-arrow-right" onclick="changeImage(1, 1, event)">›</button>
                    <div class="image-dots"></div>
                </div>
                <div class="carousel-item-content">
                    <h3 class="destination-name">Bali</h3>
                    <p class="description">A blend of relaxation and adventure with ancient temples, lush rice terraces, and vibrant beaches.</p>
                    <div class="rating">
                        <span>Guest Rating:</span>
                        <span class="stars">★★★★☆ (4.6/5)</span>
                    </div>
                    <div class="price">From $400 per night</div>
                </div>
            </div>

            <!-- Dubai -->
            <div class="carousel-item" data-index="2">
                <div class="carousel-item-image">
                    <img src="img/dub11.jpg" alt="Dubai" class="active">
                    <img src="img/dub1.jpg" alt="Dubai">
                    <img src="img/dub4.jpg" alt="Dubai">
                    <button class="image-arrow image-arrow-left" onclick="changeImage(2, -1, event)">‹</button>
                    <button class="image-arrow image-arrow-right" onclick="changeImage(2, 1, event)">›</button>
                    <div class="image-dots"></div>
                </div>
                <div class="carousel-item-content">
                    <h3 class="destination-name">Dubai</h3>
                    <p class="description">A luxurious city escape with 5-star resorts, Palm Jumeirah, and world-class shopping.</p>
                    <div class="rating">
                        <span>Guest Rating:</span>
                        <span class="stars">★★★★★ (4.7/5)</span>
                    </div>
                    <div class="price">From $300 per night</div>
                </div>
            </div>

            <!-- Turkey -->
            <div class="carousel-item" data-index="3">
                <div class="carousel-item-image">
                    <img src="img/tur1.jpg" alt="Turkey" class="active">
                    <img src="img/turk4.jpg" alt="Turkey">
                    <img src="img/tur3.jpg" alt="Turkey">
                    <img src="img/tur66.jpg" alt="Turkey">
                    <button class="image-arrow image-arrow-left" onclick="changeImage(3, -1, event)">‹</button>
                    <button class="image-arrow image-arrow-right" onclick="changeImage(3, 1, event)">›</button>
                    <div class="image-dots"></div>
                </div>
                <div class="carousel-item-content">
                    <h3 class="destination-name">Turkey</h3>
                    <p class="description">Romantic hot air balloon rides over Cappadocia and historic Istanbul with Bosphorus cruises.</p>
                    <div class="rating">
                        <span>Guest Rating:</span>
                        <span class="stars">★★★★★ (4.9/5)</span>
                    </div>
                    <div class="price">From $350 per night</div>
                </div>
            </div>

            <!-- Italy -->
            <div class="carousel-item" data-index="4">
                <div class="carousel-item-image">
                    <img src="img/ita1a.jpg" alt="Italy" class="active">
                    <img src="img/ital2.jpg" alt="Italy">
                    <img src="img/iat5.jpg" alt="Italy">
                    <button class="image-arrow image-arrow-left" onclick="changeImage(4, -1, event)">‹</button>
                    <button class="image-arrow image-arrow-right" onclick="changeImage(4, 1, event)">›</button>
                    <div class="image-dots"></div>
                </div>
                <div class="carousel-item-content">
                    <h3 class="destination-name">Italy</h3>
                    <p class="description">Romantic gondola rides in Venice, stunning Amalfi Coast views, and wine tasting in Tuscany.</p>
                    <div class="rating">
                        <span>Guest Rating:</span>
                        <span class="stars">★★★★★ (4.9/5)</span>
                    </div>
                    <div class="price">From $450 per night</div>
                </div>
            </div>

            <!-- Switzerland -->
            <div class="carousel-item clickable" data-index="5" onclick="window.location.href='switzerland.php'">
                <div class="carousel-item-image">
                    <img src="img/see1.jpg" alt="Switzerland" class="active">
                    <img src="img/see2.jpg" alt="Switzerland">
                    <img src="img/se33.jpg" alt="Switzerland">
                    <button class="image-arrow image-arrow-left" onclick="changeImage(5, -1, event)">‹</button>
                    <button class="image-arrow image-arrow-right" onclick="changeImage(5, 1, event)">›</button>
                    <div class="image-dots"></div>
                </div>
                <div class="carousel-item-content">
                    <h3 class="destination-name">Switzerland</h3>
                    <p class="description">Cozy alpine chalets, snow-capped peaks, and crystal lakes. Perfect for romantic winter getaways.</p>
                    <div class="rating">
                        <span>Guest Rating:</span>
                        <span class="stars">★★★★★ (4.9/5)</span>
                    </div>
                    <div class="price">From $550 per night</div>
                </div>
            </div>
        </div>

        <div class="carousel-controls">
            <button class="carousel-btn" onclick="rotateCarousel(-1)">‹</button>
            <button class="carousel-btn" onclick="rotateCarousel(1)">›</button>
        </div>

        <div class="carousel-indicators" id="indicators"></div>
    </div>
</section>

<script>
    let currentRotation = 0;
    const totalItems = 6;
    const angleStep = 360 / totalItems;

    function initCarousel() {
        const carousel = document.getElementById('carousel3d');
        const items = carousel.querySelectorAll('.carousel-item');
        const indicatorsContainer = document.getElementById('indicators');

        items.forEach((item, index) => {
            const angle = angleStep * index;
            const radius = 350;
            item.style.transform = `rotateY(${angle}deg) translateZ(${radius}px)`;

            // Create main indicators
            const indicator = document.createElement('div');
            indicator.className = 'indicator';
            if (index === 0) indicator.classList.add('active');
            indicator.onclick = () => goToSlide(index);
            indicatorsContainer.appendChild(indicator);

            // Create image dots for each card
            const imageContainer = item.querySelector('.carousel-item-image');
            const images = imageContainer.querySelectorAll('img');
            const dotsContainer = imageContainer.querySelector('.image-dots');

            images.forEach((img, imgIndex) => {
                const dot = document.createElement('div');
                dot.className = 'image-dot';
                if (imgIndex === 0) dot.classList.add('active');
                dot.onclick = (e) => {
                    e.stopPropagation();
                    goToImage(index, imgIndex);
                };
                dotsContainer.appendChild(dot);
            });
        });
    }

    function changeImage(cardIndex, direction, event) {
        event.stopPropagation();
        const items = document.querySelectorAll('.carousel-item');
        const item = items[cardIndex];
        const images = item.querySelectorAll('.carousel-item-image img');
        const dots = item.querySelectorAll('.image-dot');

        let currentIndex = Array.from(images).findIndex(img => img.classList.contains('active'));
        let newIndex = (currentIndex + direction + images.length) % images.length;

        images[currentIndex].classList.remove('active');
        images[newIndex].classList.add('active');

        dots[currentIndex].classList.remove('active');
        dots[newIndex].classList.add('active');
    }

    function goToImage(cardIndex, imageIndex) {
        const items = document.querySelectorAll('.carousel-item');
        const item = items[cardIndex];
        const images = item.querySelectorAll('.carousel-item-image img');
        const dots = item.querySelectorAll('.image-dot');

        images.forEach(img => img.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        images[imageIndex].classList.add('active');
        dots[imageIndex].classList.add('active');
    }

    function rotateCarousel(direction) {
        currentRotation += direction * angleStep;
        const carousel = document.getElementById('carousel3d');
        carousel.style.transform = `rotateY(${currentRotation}deg)`;
        updateIndicators();
    }

    function goToSlide(index) {
        currentRotation = -index * angleStep;
        const carousel = document.getElementById('carousel3d');
        carousel.style.transform = `rotateY(${currentRotation}deg)`;
        updateIndicators();
    }

    function updateIndicators() {
        const indicators = document.querySelectorAll('.indicator');
        const activeIndex = Math.abs(Math.round(currentRotation / angleStep)) % totalItems;
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === activeIndex);
        });
    }

    let autoRotate = setInterval(() => rotateCarousel(1), 4000);

    document.querySelector('.carousel-3d-container').addEventListener('mouseenter', () => {
        clearInterval(autoRotate);
    });

    document.querySelector('.carousel-3d-container').addEventListener('mouseleave', () => {
        autoRotate = setInterval(() => rotateCarousel(1), 4000);
    });
    // منع الانتقال للصفحة الجديدة لو ضغطت على الأسهم أو النقاط داخل الصور
    document.querySelectorAll('.clickable').forEach(item => {
        item.addEventListener('click', function(e) {
            // لو الضغط على سهم تبديل الصور أو نقطة تحت الصورة → ما ينتقلش
            if (e.target.closest('.image-arrow') || e.target.closest('.image-dot')) {
                e.stopPropagation();
            }
        });
    });
    const serviceImages = ["img/ss2.jpg","img/m2.jpg","img/ss4.jpg","img/ss5.jpg"];
    let j = 0;
    setInterval(() => {
        j = (j + 1) % serviceImages.length;
        document.getElementById("serviceSlide").src = serviceImages[j];
    }, 2000);

    initCarousel();

</script>
</body>
</html>