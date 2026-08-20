<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic Luxury - LuxTouch Events</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <style>
        :root {
            --gold: #b07a5b;
            --dark-gold: #8a5f3d;
            --light: #fffaf7;
            --beige: #f8f0e8;
            --primary: var(--gold);      /* للتوافق مع الكود الأساسي */
            --accent: #d78a4e;
            --dark-primary: var(--dark-gold);
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, var(--light) 0%, var(--beige) 100%);
            color: #333;
            overflow-x: hidden;
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
            color: #d78a4e;
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

        .modern-nav a:hover { color: var(--gold); }

        .modern-nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -8px;
            left: 50%;
            background: var(--gold);
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

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .mega-menu {
            position: fixed;
            top:150px;
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

        .mega-left {
            padding-top: 10px;
        }

        .mega-left h3 {
            font-size: 32px;
            color: #d78a4e;
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

        #intro-section {
            height: 100vh;
            margin-top: -50px;
            width: 100vw;
            overflow: hidden;
            position: relative;
        }

        .carousel-list {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .carousel-list .carousel-item {
            width: 100%;
            height: 100%;
            position: absolute;
            inset: 0;
        }

        .carousel-list .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .carousel-list .carousel-item .carousel-content {
            position: absolute;
            top: 20%;
            width: 1140px;
            max-width: 80%;
            left: 50%;
            transform: translateX(-50%);
            padding-right: 30%;
            box-sizing: border-box;
            color: #fff;
            text-shadow: 0 5px 10px #0004;
        }

        .carousel-list .carousel-item .carousel-title {
            font-family: 'Playfair Display', serif;
            font-size: 5em;
            font-weight: bold;
            line-height: 1.3em;
        }

        .carousel-list .carousel-item .carousel-topic {
            font-family: 'Playfair Display', serif;
            font-size: 5em;
            font-weight: bold;
            line-height: 1.3em;
            color: var(--gold);
        }

        .carousel-list .carousel-item .carousel-description {
            margin-top: 20px;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        #intro-thumbs {
            position: absolute;
            bottom: 50px;
            left: 50%;
            width: max-content;
            z-index: 100;
            display: flex;
            gap: 20px;
        }

        .thumb {
            width: 150px;
            height: 220px;
            flex-shrink: 0;
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
            transition: all 0.6s cubic-bezier(0.22, 0.61, 0.36, 1);
            border: 4px solid transparent;
        }

        .thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumb .thumb-content {
            color: #fff;
            position: absolute;
            bottom: 10px;
            left: 10px;
            right: 10px;
        }

        .thumb .thumb-title {
            font-weight: 500;
            font-size: 0.9rem;
        }

        .thumb .thumb-description {
            font-weight: 300;
            font-size: 0.75rem;
        }

        .arrows {
            position: absolute;
            top: 80%;
            right: 52%;
            z-index: 100;
            width: 300px;
            max-width: 30%;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .arrows button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(238, 238, 238, 0.27);
            border: none;
            color: #fff;
            font-family: monospace;
            font-weight: bold;
            transition: .5s;
            cursor: pointer;
            font-size: 1.2rem;
        }

        .arrows button:hover {
            background-color: #fff;
            color: #000;
        }

        .carousel-time {
            position: absolute;
            z-index: 1000;
            width: 0%;
            height: 3px;
            background-color: var(--gold);
            left: 0;
            top: 50px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(10px);
        }

        .modal.active {
            display: block;
        }

        .modal-content {
            position: relative;
            width: 90%;
            max-width: 1200px;
            height: 90vh;
            margin: 5vh auto;
            background: white;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 50px 150px rgba(0, 0, 0, 0.8);
            display: flex;
            flex-direction: column;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--beige);
        }

        .modal-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--gold);
        }

        .modal-close {
            width: 50px;
            height: 50px;
            border: none;
            background: var(--gold);
            color: white;
            font-size: 2rem;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s;
        }

        .modal-close:hover {
            background: var(--dark-gold);
            transform: rotate(90deg) scale(1.1);
        }

        .modal-main-image {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            background: var(--beige);
        }

        .modal-main-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 20px;
        }

        .modal-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 60px;
            height: 60px;
            border: none;
            background: rgba(176, 122, 91, 0.9);
            color: white;
            font-size: 2rem;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s;
            z-index: 10;
        }

        .modal-nav-btn:hover {
            background: var(--dark-gold);
            transform: translateY(-50%) scale(1.1);
        }

        .modal-nav-btn.prev { left: 20px; }
        .modal-nav-btn.next { right: 20px; }

        .modal-thumbnails {
            display: flex;
            gap: 15px;
            justify-content: center;
            overflow-x: auto;
            padding: 10px 0;
        }

        .modal-thumb {
            width: 100px;
            height: 100px;
            border-radius: 15px;
            overflow: hidden;
            cursor: pointer;
            border: 3px solid transparent;
            transition: 0.3s;
            flex-shrink: 0;
        }

        .modal-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-thumb.active {
            border-color: var(--gold);
            transform: scale(1.1);
        }

        /* Details Section */
        #details-section {
            padding: 100px 20px;
            max-width: 1200px;
            margin: 0 auto;
            opacity: 0;
        }

        .details-container {
            background: white;
            border-radius: 40px;
            padding: 60px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.1);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: var(--gold);
            text-align: center;
            margin-bottom: 40px;
        }

        .description {
            font-size: 1.2rem;
            line-height: 2;
            color: #555;
            text-align: center;
            margin-bottom: 50px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .price-section {
            background: linear-gradient(135deg, var(--gold), var(--dark-gold));
            padding: 50px;
            border-radius: 30px;
            text-align: center;
            color: white;
            margin-bottom: 60px;
        }

        .price-label {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 15px;
        }

        .price {
            font-family: 'Playfair Display', serif;
            font-size: 5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .price-note {
            font-size: 1rem;
            opacity: 0.85;
        }

        .request-form {
            background: var(--light);
            padding: 50px;
            border-radius: 30px;
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--gold);
            text-align: center;
            margin-bottom: 40px;
        }

        .form-group label {
            display: block;
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            font-size: 1rem;
            transition: 0.3s;
            background: white;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(176,122,91,0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, var(--gold), var(--dark-gold));
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 1.3rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.4s;
            margin-top: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(176,122,91,0.4);
        }

        @media (max-width: 992px) {
            .form-row { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .carousel-list .carousel-item .carousel-title,
            .carousel-list .carousel-item .carousel-topic {
                font-size: 2.5rem;
            }
            .section-title { font-size: 2.5rem; }
            .price { font-size: 3.5rem; }
        }

        /* Success Modal (نفس الشاشة الصغيرة من Bohemian Bliss) */
        .success-modal {
            display: none;
            position: fixed;
            z-index: 3000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            align-items: center;
            justify-content: center;
        }

        .success-modal.active {
            display: flex;
        }

        .success-modal-content {
            background: white;
            padding: 50px 40px;
            border-radius: 30px;
            text-align: center;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
            animation: modalPop 0.6s ease-out;
        }

        @keyframes modalPop {
            0% { transform: scale(0.7); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .success-icon {
            font-size: 4.5rem;
            color: #4CAF50;
            margin-bottom: 20px;
            display: inline-block;
            width: 100px;
            height: 100px;
            line-height: 100px;
            background: #e8f5e9;
            border-radius: 50%;
        }

        .success-modal-content h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .success-modal-content p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .success-close-btn {
            padding: 14px 40px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.4s;
        }

        .success-close-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(201,167,138,0.4);
        }
    </style>
</head>
<body>
<header class="new-header">
    <div class="header-top">
        <h1 class="logo-title">"Where Love Shines Bright."</h1>
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

<!-- Image Gallery Modal -->
<div id="imageModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Classic Luxury Gallery</h2>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>

        <div class="modal-main-image">
            <button class="modal-nav-btn prev" onclick="navigateModal(-1)">‹</button>
            <img id="modalMainImg" src="" alt="Gallery Image">
            <button class="modal-nav-btn next" onclick="navigateModal(1)">›</button>
        </div>

        <div class="modal-thumbnails" id="modalThumbs"></div>
    </div>
</div>

<!-- Carousel Section -->
<section id="intro-section">
    <div class="carousel-list">
        <div class="carousel-item">
            <img src="https://thumbs.dreamstime.com/b/elegant-wedding-stage-floral-decorations-luxurious-white-gold-sofa-set-features-adorned-beautiful-arrangements-creating-415606756.jpg" alt="Classic Luxury 2">
            <div class="carousel-content">
                <div class="carousel-title">Floral Paradise</div>
                <div class="carousel-topic">Luxury Blooms</div>
                <div class="carousel-description">Exquisite floral arrangements that bring life and elegance to your special day</div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://m.media-amazon.com/images/I/61aOlTg1ZnL.jpg" alt="Classic Luxury 3">
            <div class="carousel-content">
                <div class="carousel-title">Golden Dreams</div>
                <div class="carousel-topic">Royal Setting</div>
                <div class="carousel-description">Rich golden accents and luxurious fabrics for a truly royal celebration</div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://static.vecteezy.com/system/resources/previews/061/000/122/large_2x/golden-themed-wedding-venue-with-draped-curtains-glowing-chandeliers-and-abundant-white-and-blush-floral-arrangements-in-a-glamorous-indoor-setup-photo.jpeg" alt="Classic Luxury 4">
            <div class="carousel-content">
                <div class="carousel-title">Glamorous Venue</div>
                <div class="carousel-topic">Perfect Setting</div>
                <div class="carousel-description">Draped curtains and glowing chandeliers create the perfect backdrop</div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://cdn.freepixel.com/preview/free-photos-a-luxurious-wedding-stage-adorned-with-chandeliers-floral-arrangements-and-a-white-couch-creating-a-preview-1004280674.jpg" alt="Classic Luxury 5">
            <div class="carousel-content">
                <div class="carousel-title">Chandelier Magic</div>
                <div class="carousel-topic">Sparkling Splendor</div>
                <div class="carousel-description">Crystal chandeliers and sophisticated design elements combine beautifully</div>
            </div>
        </div>
    </div>

    <div id="intro-thumbs"></div>

    <div class="arrows">
        <button id="prev">‹</button>
        <button id="next">›</button>
    </div>

    <div class="carousel-time"></div>
</section>

<section id="details-section">
    <div class="details-container">
        <h2 class="section-title">About Classic Luxury Design</h2>

        <p class="description">
            Classic Luxury embodies the pinnacle of sophistication and grandeur. This timeless style combines sparkling crystal chandeliers,
            opulent floral arrangements, rich golden accents, and exquisite drapery to create a regal atmosphere worthy of royalty.
            Perfect for couples who dream of a fairytale wedding that leaves a lasting impression on every guest.
            Every detail is meticulously crafted to deliver an unforgettable experience of pure elegance and splendor.
        </p>

        <div class="price-section">
            <div class="price-label">Starting from</div>
            <div class="price">$15,000</div>
            <div class="price-note">Price varies based on venue size, guest count, and custom details</div>
        </div>

        <div class="request-form">
            <h3 class="form-title">Book Your Dream Décor</h3>

            <form id="decorRequestForm" method="POST">
                <input type="hidden" name="decor_id" value="2">

                <div class="form-row">
                    <div class="form-group">
                        <label for="fullName">Full Name *</label>
                        <input type="text" id="fullName" name="customer_name" required placeholder="Enter your full name">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" required placeholder="+1 (555) 123-4567">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required placeholder="you@example.com">
                    </div>

                    <div class="form-group">
                        <label for="eventDate">Event Date *</label>
                        <input type="date" id="eventDate" name="event_date" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="message">Additional Notes or Special Requests</label>
                    <textarea id="message" name="notes" placeholder="Tell us about your vision, color preferences, or any special details..."></textarea>
                </div>

                <button type="submit" class="submit-btn">Submit Request</button>
            </form>
        </div>
    </div>
</section>

<!-- Success Modal (نفس الشاشة الصغيرة من Bohemian Bliss مع تلوين ذهبي) -->
<div id="successModal" class="success-modal">
    <div class="success-modal-content">
        <div class="success-icon">✓</div>
        <h3>Your Request Has Been Sent Successfully!</h3>
        <p>Thank you! We will contact you soon to discuss the details of "classic" décor for your wedding.</p>
        <button class="success-close-btn" onclick="closeSuccessModal()">OK</button>
    </div>
</div>

<script>
    const images = [
        { src: "https://thumbs.dreamstime.com/b/glamorous-wedding-stage-gold-curtains-white-flowers-chandeliers-sofa-luxurious-elegant-seating-creates-romantic-411291333.jpg", title: "Classic Luxury", description: "Eternal Elegance" },
        { src: "https://thumbs.dreamstime.com/b/elegant-wedding-stage-floral-decorations-luxurious-white-gold-sofa-set-features-adorned-beautiful-arrangements-creating-415606756.jpg", title: "Floral Paradise", description: "Luxury Blooms" },
        { src: "https://m.media-amazon.com/images/I/61aOlTg1ZnL.jpg", title: "Golden Dreams", description: "Royal Setting" },
        { src: "https://static.vecteezy.com/system/resources/previews/061/000/122/large_2x/golden-themed-wedding-venue-with-draped-curtains-glowing-chandeliers-and-abundant-white-and-blush-floral-arrangements-in-a-glamorous-indoor-setup-photo.jpeg", title: "Glamorous Venue", description: "Perfect Setting" },
        { src: "https://cdn.freepixel.com/preview/free-photos-a-luxurious-wedding-stage-adorned-with-chandeliers-floral-arrangements-and-a-white-couch-creating-a-preview-1004280674.jpg", title: "Chandelier Magic", description: "Sparkling Splendor" }
    ];

    let modalCurrentIndex = 0;

    let nextDom = document.getElementById('next');
    let prevDom = document.getElementById('prev');
    let carouselDom = document.getElementById('intro-section');
    let SliderDom = carouselDom.querySelector('.carousel-list');
    let thumbnailBorderDom = document.getElementById('intro-thumbs');

    images.forEach((img, index) => {
        const thumb = document.createElement('div');
        thumb.className = 'thumb';
        thumb.innerHTML = `
            <img src="${img.src}" alt="${img.title}">
            <div class="thumb-content">
                <div class="thumb-title">${img.title}</div>
                <div class="thumb-description">${img.description}</div>
            </div>
        `;
        thumb.onclick = () => openModal(index);
        thumbnailBorderDom.appendChild(thumb);
    });

    let timeRunning = 3000;
    let timeAutoNext = 7000;

    nextDom.onclick = function() { showSlider('next'); }
    prevDom.onclick = function() { showSlider('prev'); }

    let runTimeOut;
    let runNextAuto = setTimeout(() => { nextDom.click(); }, timeAutoNext);

    function showSlider(type) {
        let SliderItemsDom = SliderDom.querySelectorAll('.carousel-item');
        let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll('.thumb');

        if(type === 'next') {
            SliderDom.appendChild(SliderItemsDom[0]);
            thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
            carouselDom.classList.add('next');
        } else {
            SliderDom.prepend(SliderItemsDom[SliderItemsDom.length - 1]);
            thumbnailBorderDom.prepend(thumbnailItemsDom[thumbnailItemsDom.length - 1]);
            carouselDom.classList.add('prev');
        }

        clearTimeout(runTimeOut);
        runTimeOut = setTimeout(() => {
            carouselDom.classList.remove('next');
            carouselDom.classList.remove('prev');
        }, timeRunning);

        clearTimeout(runNextAuto);
        runNextAuto = setTimeout(() => { nextDom.click(); }, timeAutoNext);
    }

    function openModal(index) {
        modalCurrentIndex = index;
        document.getElementById('imageModal').classList.add('active');
        document.body.style.overflow = 'hidden';
        updateModalImage();
        createModalThumbnails();
    }

    function closeModal() {
        document.getElementById('imageModal').classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function navigateModal(direction) {
        modalCurrentIndex += direction;
        if (modalCurrentIndex < 0) modalCurrentIndex = images.length - 1;
        if (modalCurrentIndex >= images.length) modalCurrentIndex = 0;
        updateModalImage();
    }

    function updateModalImage() {
        document.getElementById('modalMainImg').src = images[modalCurrentIndex].src;
        document.querySelectorAll('.modal-thumb').forEach((thumb, idx) => {
            thumb.classList.toggle('active', idx === modalCurrentIndex);
        });
    }

    function createModalThumbnails() {
        const container = document.getElementById('modalThumbs');
        container.innerHTML = '';
        images.forEach((img, index) => {
            const thumb = document.createElement('div');
            thumb.className = 'modal-thumb';
            if (index === modalCurrentIndex) thumb.classList.add('active');
            thumb.innerHTML = `<img src="${img.src}" alt="${img.title}">`;
            thumb.onclick = () => { modalCurrentIndex = index; updateModalImage(); };
            container.appendChild(thumb);
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
        if (e.key === 'ArrowLeft') navigateModal(-1);
        if (e.key === 'ArrowRight') navigateModal(1);
    });

    document.getElementById('imageModal').addEventListener('click', (e) => {
        if (e.target.id === 'imageModal') closeModal();
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                gsap.to("#details-section", { opacity: 1, y: 0, duration: 1, ease: "power4.out" });
            }
        });
    }, { threshold: 0.2 });
    observer.observe(document.getElementById('details-section'));

    const serviceImages = ["img/ss2.jpg","img/m2.jpg","img/ss4.jpg","img/ss5.jpg"];
    let j = 0;
    setInterval(() => {
        j = (j + 1) % serviceImages.length;
        document.getElementById("serviceSlide").src = serviceImages[j];
    }, 2000);


    // إرسال الفورم لـ save_decor_request.php + ظهور المودال بعد النجاح
    document.getElementById('decorRequestForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('save_decor_request.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                // بغض النظر عن الرد، لو وصل هنا يعني الإرسال ناجح (مش 404)
                document.getElementById('successModal').classList.add('active');
                document.body.style.overflow = 'hidden';
                this.reset();
            })
            .catch(error => {
                alert('حدث خطأ أثناء الإرسال. حاول مرة أخرى.');
                console.error('Error:', error);
            });
    });

    function closeSuccessModal() {
        document.getElementById('successModal').classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    document.getElementById('successModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeSuccessModal();
        }
    });
</script>
</body>
</html>