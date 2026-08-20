<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxTouch Events - Luxury Wedding Decor</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <style>
        :root {
            --primary: #b07a5b;
            --primary-dark: #9c6644;
            --accent: #d8a88a;
            --text: #333;
            --light: #fffaf7;
            --gray: #666;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--light);
            color: var(--text);
            line-height: 1.8;
            overflow-x: hidden;
        }
        .container {
            width: 92%;
            max-width: 1350px;
            margin: auto;
        }

        /* Header */
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
            color: var(--text);
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
            top: 180px;
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
            color: var(--text);
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

        /* Service Hero Section */
        .service-hero {
            padding: 160px 0 100px;
            background: linear-gradient(rgba(176, 122, 91, 0.1), rgba(216, 168, 138, 0.05));
            position: relative;
            overflow: hidden;
        }

        .service-header {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            margin-bottom: 80px;
        }

        .service-image {
            height: 500px;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(176, 122, 91, 0.25);
            position: relative;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .service-image:hover img {
            transform: scale(1.05);
        }

        .service-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: var(--primary);
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .service-subtitle {
            font-size: 1.4rem;
            color: var(--gray);
            margin-bottom: 40px;
            font-weight: 400;
        }

        .service-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 20px;
            margin-bottom: 30px;
            color: white;
            font-size: 2.5rem;
            box-shadow: 0 15px 40px rgba(176, 122, 91, 0.3);
        }

        .service-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .service-btn {
            padding: 16px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.4s;
        }

        .service-btn.primary {
            background: var(--primary);
            color: white;
        }

        .service-btn.primary:hover {
            background: var(--primary-dark);
            transform: translateY(-5px);
        }

        .service-btn.outline {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
        }

        .service-btn.outline:hover {
            background: var(--primary);
            color: white;
        }

        /* Sections */
        .section {
            padding: 110px 0;
            scroll-margin-top: 80px;
        }

        .alt-bg { background: #fdf3ec; }

        .section-title {
            text-align: center;
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 18px;
        }

        .section-subtitle {
            text-align: center;
            color: var(--gray);
            max-width: 720px;
            margin: 0 auto 60px;
            font-size: 1.15rem;
        }

        /* Decoration Styles Grid */
        .styles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
            max-width: 1300px;
            margin: 0 auto;
        }

        .style-card {
            background: white;
            padding: 40px 28px;
            border-radius: 24px;
            text-align: center;
            box-shadow: 0 12px 35px rgba(0,0,0,0.07);
            transition: all 0.4s ease;
            border: 1px solid #f5e5db;
            cursor: pointer;
        }

        .style-card i {
            font-size: 3.4rem;
            color: var(--primary);
            margin-bottom: 24px;
        }

        .style-card h3 {
            font-size: 1.6rem;
            margin-bottom: 16px;
            color: #333;
        }

        .style-card p {
            font-size: 1.1rem;
        }

        .style-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 28px 60px rgba(176,122,91,0.25);
        }

        /* Gallery */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 28px;
            max-width: 1300px;
            margin: 0 auto;
        }

        .gallery-item {
            height: 320px;
            border-radius: 24px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 15px 40px rgba(0,0,0,0.18);
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.7s;
        }

        .gallery-item:hover img {
            transform: scale(1.15);
        }

        /* Testimonials */
        .testimonials {
            padding: 120px 0;
            background: linear-gradient(135deg, #fffaf7 0%, #fdf3ec 100%);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
            gap: 35px;
            max-width: 1300px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: white;
            padding: 40px 32px;
            border-radius: 28px;
            box-shadow: 0 18px 50px rgba(176,122,91,0.12);
            position: relative;
            transition: all 0.5s ease;
            border: 1px solid #f0e0d4;
        }

        .testimonial-card:hover {
            transform: translateY(-18px);
            box-shadow: 0 35px 80px rgba(176,122,91,0.22);
        }

        .quote-icon {
            position: absolute;
            top: -20px;
            left: 30px;
            font-size: 4rem;
            color: var(--primary);
            opacity: 0.12;
        }

        .stars {
            color: #f39c12;
            font-size: 1.4rem;
            margin-bottom: 18px;
        }

        .testimonial-text {
            font-size: 1.15rem;
            font-style: italic;
            color: #555;
            line-height: 1.8;
            margin-bottom: 28px;
        }

        .client-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .client-avatar {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid var(--primary);
            flex-shrink: 0;
        }

        .client-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .client-name {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.25rem;
        }

        .client-wedding {
            font-size: 0.95rem;
            color: var(--gray);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .service-header {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .service-buttons { justify-content: center; }
        }

        @media (max-width: 768px) {
            .section { padding: 80px 0; }
            .section-title { font-size: 2.2rem; }
            .service-title { font-size: 2.8rem; }
        }
    </style>
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
            <li><a href="shop.php">shop</a></li>

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

<!-- Venue Styling Section -->
<section class="service-hero" id="venue-styling">
    <div class="container">
        <div class="service-header">
            <div class="service-image">
                <img src="img/pic2.jpg" alt="Venue Styling">
            </div>
            <div>
                <div class="service-icon">
                    <i class="fas fa-swatchbook"></i>
                </div>
                <h1 class="service-title">Venue Styling & Design</h1>
                <p class="service-subtitle">Custom decor concepts tailored to your theme, style, and budget</p>
                <p>Transform your wedding venue into a breathtaking masterpiece. Our expert designers create cohesive decor concepts that reflect your personality and love story, ensuring every detail is perfect.</p>

                <div class="service-buttons">
                    <a href="#gallery" class="service-btn primary">View Previous Works</a>
                    <a href="#styles" class="service-btn outline">Explore Decoration Styles</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Decoration Styles -->
<section class="section" id="styles">
    <h2 class="section-title">Our Decoration Styles</h2>
    <p class="section-subtitle">Explore our luxury styles and find the one that matches your dream wedding</p>

    <div class="container styles-grid">
        <div class="style-card" onclick="goToStyle('classic')">
            <i class="fas fa-crown"></i>
            <h3>Classic Luxury</h3>
            <p>Timeless elegance with gold accents, crystal chandeliers, and premium floral arrangements</p>
        </div>
        <div class="style-card" onclick="goToStyle('modern')">
            <i class="fas fa-gem"></i>
            <h3>Modern Minimalist</h3>
            <p>Clean lines, geometric elements, and sophisticated simplicity for a chic look</p>
        </div>
        <div class="style-card" onclick="goToStyle('boho')">
            <i class="fas fa-leaf"></i>
            <h3>Boho Chic</h3>
            <p>Natural elements, pampas grass, and relaxed luxury for free-spirited couples</p>
        </div>
    </div>
</section>

<!-- Gallery -->
<section class="section alt-bg" id="gallery">
    <h2 class="section-title">Our Portfolio</h2>
    <p class="section-subtitle">Real weddings, real emotions, real luxury</p>

    <div class="container gallery-grid">
        <div class="gallery-item"><img src="img/w1.jpg" alt="Gallery 1"></div>
        <div class="gallery-item"><img src="img/w2.jpg" alt="Gallery 2"></div>
        <div class="gallery-item"><img src="img/w3.jpg" alt="Gallery 3"></div>
        <div class="gallery-item"><img src="img/w4.jpg" alt="Gallery 4"></div>
        <div class="gallery-item"><img src="img/w5.jpg" alt="Gallery 5"></div>
        <div class="gallery-item"><img src="img/w6.jpg" alt="Gallery 6"></div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials section" id="testimonials">
    <h2 class="section-title">What Our Couples Say</h2>
    <p class="section-subtitle">Real stories from real couples who trusted us with their most special day</p>

    <div class="container">
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="quote-icon">“</div>
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">LuxTouch transformed our wedding into a fairytale! The Classic Luxury setup was breathtaking.</p>
                <div class="client-info">
                    <div class="client-avatar"><img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sara & Ahmed"></div>
                    <div>
                        <div class="client-name">Sara & Ahmed</div>
                        <div class="client-wedding">Ritz-Carlton Dubai • 2024</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="quote-icon">“</div>
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">We chose the Modern Minimalist style and it was pure perfection. Clean, elegant, and so luxurious.</p>
                <div class="client-info">
                    <div class="client-avatar"><img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Layla & Omar"></div>
                    <div>
                        <div class="client-name">Layla & Omar</div>
                        <div class="client-wedding">Four Seasons Amman • 2025</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="quote-icon">“</div>
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">The Boho Chic setup in the desert was magical! Everything was exactly as I dreamed.</p>
                <div class="client-info">
                    <div class="client-avatar"><img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Nour & Khaled"></div>
                    <div>
                        <div class="client-name">Nour & Khaled</div>
                        <div class="client-wedding">Wadi Rum, Jordan • 2024</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // تغيير الصور في الميجا مينو
    const serviceImages = ["img/ss2.jpg","img/m2.jpg","img/ss4.jpg","img/ss5.jpg"];
    let j = 0;
    setInterval(() => {
        j = (j + 1) % serviceImages.length;
        document.getElementById("serviceSlide").src = serviceImages[j];
    }, 2000);

    // الانتقال لصفحات الستايلات (مصلح .php + اسم Boho Chic رجع زي الأول)
    function goToStyle(style) {
        let styleName = '';
        if (style === 'classic') styleName = 'Classic Luxury';
        else if (style === 'modern') styleName = 'Modern Minimalist';
        else if (style === 'boho') styleName = 'Boho Chic';  // رجع زي ما كان

        localStorage.setItem('selectedStyle', styleName);
        window.location.href = style + '.php';  // يفتح classic.php / modern.php / boho.php
    }
</script>
</body>
</html>