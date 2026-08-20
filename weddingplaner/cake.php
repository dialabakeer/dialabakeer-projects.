<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Luxury Wedding Cakes | A Day to Cherish</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;500;700&family=Cormorant+Garamond:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <style>
        :root {
            --primary: #DFA799;
            --secondary: #d78a4e;
            --text: #444;
            --light: #fffaf7;
            --gray: #7b7b7b;
            --gold: #d4af37;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background: #fdfaf8; color: var(--text); line-height: 1.8; overflow-x: hidden; }
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
        /* Hero */
        .hero {
            height: 90vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('https://thumbs.dreamstime.com/b/elegant-three-tiered-white-wedding-cake-beautiful-rose-decorations-classic-design-light-peach-ivory-colors-romantic-food-event-385036527.jpg') center/cover no-repeat fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }
        .hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 200px;
            background: linear-gradient(transparent, #fdfaf8);
        }
        .hero-content h1 {
            font-family: 'Great Vibes', cursive;
            font-size: 92px;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }
        .hero-content p { font-size: 24px; max-width: 800px; margin: 0 auto 40px; font-weight: 300; }
        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 18px 42px;
            border: none;
            border-radius: 50px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.4s;
            box-shadow: 0 10px 30px rgba(223,167,153,0.3);
        }
        .btn-primary:hover {
            background: #d08a70;
            transform: translateY(-6px);
        }
        /* Intro Section */
        .intro-section {
            padding: 110px 10%;
            text-align: center;
            background: white;
        }
        .intro-section h2 {
            font-family: 'Great Vibes', cursive;
            font-size: 68px;
            color: var(--primary);
            margin-bottom: 24px;
        }
        .intro-section p {
            font-size: 19px;
            max-width: 900px;
            margin: 0 auto;
            color: #666;
            line-height: 2.1;
        }
        /* Filters & Gallery */
        .filters { padding: 70px 5%; background: white; text-align: center; }
        .filter-buttons { display: flex; justify-content: center; gap: 18px; flex-wrap: wrap; margin-top: 25px; }
        .filter-btn {
            background: #fdfbfb; border: 2px solid #eee; padding: 14px 32px; border-radius: 50px;
            cursor: pointer; transition: 0.3s; font-weight: 500;
        }
        .filter-btn.active, .filter-btn:hover { background: var(--primary); color: white; border-color: var(--primary); }
        .gallery { padding: 90px 5%; max-width: 1600px; margin: 0 auto; background: linear-gradient(180deg, #fffdf9, #faf3ec); }
        .cakes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 45px;
            margin-top: 50px;
        }
        .cake-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            cursor: pointer;
        }
        .cake-card:hover {
            transform: translateY(-18px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.16);
        }
        .cake-img {
            height: 440px;
            overflow: hidden;
        }
        .cake-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        .cake-card:hover .cake-img img { transform: scale(1.1); }
        .cake-info {
            padding: 30px 25px;
            text-align: center;
        }
        .cake-info h3 {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            color: var(--secondary);
            margin-bottom: 12px;
        }
        .price {
            font-size: 24px;
            color: var(--primary);
            font-weight: bold;
            margin: 16px 0;
        }
        /* Outro Section */
        .outro-section {
            padding: 130px 10%;
            text-align: center;
            background: linear-gradient(135deg, #fdfaf8 0%, #fffaf7 100%);
        }
        .outro-section h2 {
            font-family: 'Great Vibes', cursive;
            font-size: 72px;
            color: var(--primary);
            margin-bottom: 30px;
        }
        .outro-section p {
            font-size: 20px;
            max-width: 1000px;
            margin: 0 auto 45px;
            color: #666;
            line-height: 2.2;
        }
        .outro-section .btn-primary {
            background: var(--secondary);
        }
        .outro-section .btn-primary:hover {
            background: #c97a3d;
        }
        /* Modal */
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.92); z-index: 9999; align-items: center; justify-content: center; padding: 20px; overflow-y: auto; }
        .modal.active { display: flex; }
        .modal-content { background: white; border-radius: 24px; max-width: 1100px; width: 100%; overflow: hidden; position: relative; animation: modalPop 0.6s ease; }
        @keyframes modalPop { 0% { transform: scale(0.8); opacity: 0; } 100% { transform: scale(1); opacity: 1; } }
        .modal-close { position: absolute; top: 20px; right: 25px; width: 50px; height: 50px; background: rgba(255,255,255,0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; cursor: pointer; z-index: 10; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        .modal-body { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; padding: 50px; }
        .modal-gallery img { width: 100%; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .modal-details h2 { font-family: 'Great Vibes', cursive; font-size: 48px; color: var(--primary); margin-bottom: 15px; }
        .modal-details p { font-size: 16px; color: var(--gray); margin-bottom: 25px; line-height: 1.9; }
        .options-group { margin-bottom: 25px; }
        .options-group label { display: block; margin-bottom: 10px; font-weight: 600; color: var(--text); }
        select, input, textarea { width: 100%; padding: 14px; border: 1px solid #eee; border-radius: 12px; font-size: 15px; }
        .total-price { font-size: 32px; font-weight: bold; color: var(--primary); margin: 25px 0; }
        .btn-inquire { background: var(--primary); color: white; padding: 16px 40px; border: none; border-radius: 50px; font-size: 18px; cursor: pointer; width: 100%; transition: 0.3s; }
        .btn-inquire:hover { background: #d08a70; }
        @media (max-width: 992px) {
            .modal-body { grid-template-columns: 1fr; padding: 30px; }
            .hero-content h1, .intro-section h2, .outro-section h2 { font-size: 56px; }
        }
        /* Confirmation Modal Styles */
        #confirmationModal .modal-content { max-width: 760px; text-align: center; }
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

<!-- Hero -->
<section class="hero">
    <div class="hero-content" data-aos="fade-up">
        <h1>Wedding Cakes That Steal Hearts</h1>
        <p>Every cake is a love story, handcrafted with passion to become the sweetest memory of your big day</p>
        <button class="btn-primary" onclick="document.querySelector('.gallery').scrollIntoView({behavior: 'smooth'})">
            Explore Collection
        </button>
    </div>
</section>

<!-- Intro Text -->
<section class="intro-section" data-aos="fade-up">
    <h2>Your Dream Cake Awaits</h2>
    <p>
        Each of our wedding cakes is a bespoke work of art, crafted exclusively for you. We use only the finest Belgian chocolate,
        pure Madagascar vanilla, French butter, and seasonal fresh flowers. From timeless elegance to bold modern designs,
        we blend impeccable taste with intricate handcrafted details to create a centerpiece that perfectly matches your wedding palette,
        theme, and love story. Your vision. Our passion. One unforgettable cake.
    </p>
</section>

<!-- Filters -->
<div class="filters" data-aos="fade-up">
    <h2>Find Your Perfect Cake</h2>
    <div class="filter-buttons">
        <button class="filter-btn active" data-filter="all">All Cakes</button>
        <button class="filter-btn" data-filter="floral">Floral</button>
        <button class="filter-btn" data-filter="modern">Modern</button>
        <button class="filter-btn" data-filter="vintage">Vintage</button>
        <button class="filter-btn" data-filter="gold">Gold & Glam</button>
        <button class="filter-btn" data-filter="naked">Naked / Semi-Naked</button>
    </div>
</div>

<!-- Gallery -->
<section class="gallery">
    <div class="cakes-grid" id="cakesGrid"></div>
</section>

<!-- Outro Text -->
<section class="outro-section" data-aos="fade-up">
    <h2>Let’s Create Magic Together</h2>
    <p>
        Choose the cake that speaks to your heart, select your tiers and favorite flavors, and leave the rest to us.<br><br>
        Within 24 hours, our dedicated designers will reach out to discuss every detail — your color scheme, flowers, décor,
        even your dress — then send you a personalized quote and a complimentary 3D render of your dream cake.<br><br>
        Because your wedding day deserves nothing less than perfection… from the first glance to the very last bite.
    </p>
    <button class="btn-primary" onclick="document.querySelector('.filters').scrollIntoView({behavior: 'smooth'})">
        Start Your Journey
    </button>
</section>

<!-- Main Modal -->
<div class="modal" id="cakeModal">
    <div class="modal-content">
        <div class="modal-close" onclick="closeModal()">×</div>
        <div class="modal-body">
            <div class="modal-gallery">
                <img id="modalImg" src="" alt="">
            </div>
            <div class="modal-details">
                <h2 id="modalTitle"></h2>
                <p id="modalDesc"></p>
                <div class="options-group">
                    <label>Number of Tiers</label>
                    <select id="tiers" onchange="calculatePrice()">
                        <option value="3">3 Tiers (serves up to 80)</option>
                        <option value="4">4 Tiers (serves up to 120)</option>
                        <option value="5">5 Tiers (serves up to 180)</option>
                    </select>
                </div>
                <div class="options-group">
                    <label>Flavor Combination</label>
                    <select id="flavor">
                        <option value="vanilla-berry">Vanilla Sponge + Mixed Berries</option>
                        <option value="chocolate-caramel">Belgian Chocolate + Salted Caramel</option>
                        <option value="lemon-raspberry">Lemon + Fresh Raspberry</option>
                        <option value="rose-pistachio">Rose Water + Pistachio</option>
                        <option value="red-velvet">Red Velvet + Cream Cheese</option>
                    </select>
                </div>
                <div class="total-price" id="totalPrice">$0</div>
                <button class="btn-inquire" onclick="addToInquiry()">Add to My Inquiry List</button>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal" id="confirmationModal">
    <div class="modal-content">
        <div class="modal-close" onclick="closeConfirmation()">×</div>
        <div style="padding: 70px 50px 60px;">
            <i class="fas fa-check-circle" style="font-size: 90px; color: var(--primary); margin-bottom: 30px; display: block;"></i>

            <h2 style="font-family: 'Great Vibes', cursive; font-size: 64px; color: var(--secondary); margin-bottom: 24px; line-height: 1.2;">
                Thank You for Your Trust!
            </h2>

            <p style="font-size: 20px; color: #666; line-height: 2; max-width: 600px; margin: 0 auto 35px;">
                Your inquiry has been successfully received for<br>
                <strong id="confirmCakeTitle" style="color: var(--primary); font-size: 24px;"></strong>
            </p>

            <div style="background: var(--light); border-radius: 20px; padding: 30px; margin: 30px auto; max-width: 500px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <p style="margin: 12px 0; font-size: 17px; color: var(--text);">
                    Number of Tiers: <strong id="confirmTiers"></strong>
                </p>
                <p style="margin: 12px 0; font-size: 17px; color: var(--text);">
                    Selected Flavor: <strong id="confirmFlavor"></strong>
                </p>
                <p style="margin: 20px 0 0; font-size: 22px; color: var(--primary); font-weight: bold;">
                    Estimated Price: <span id="confirmPrice"></span>
                </p>
            </div>

            <p style="font-size: 18px; color: #888; line-height: 1.9; margin: 35px auto 40px; max-width: 620px;">
                We will contact you within <strong>24 hours</strong> to discuss all the details<br>
                (color scheme, flowers, décor, your dress...) and send you a personalized quote along with a complimentary 3D render of your dream cake!
            </p>

            <button class="btn-primary" onclick="closeConfirmation(); document.querySelector('.gallery').scrollIntoView({behavior: 'smooth'})" style="padding: 16px 40px; font-size: 18px;">
                Continue Exploring the Collection
            </button>
        </div>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ once: true, duration: 900 });

    const cakes = [
        { title: "Pearl Blossom", price: 750, category: "floral gold", img: "img/c1.jpg", desc: "A breathtaking 3–5 tier masterpiece adorned with hand-piped pearls, edible gold leaf, and fresh seasonal blooms." },

        { title: "Vintage Romance", price: 680, category: "vintage", img: "https://images.unsplash.com/photo-1559620192-032c4bc4674e?w=1000", desc: "Delicate sugar lace, soft blush tones, and vintage piping techniques that evoke timeless romance." },
        { title: "Golden Cascade", price: 1100, category: "gold", img:  "img/c7.jpg", desc: "Dramatic gold drip over ivory buttercream with cascading orchids and 24k gold leaf." },
        { title: "Enchanted Garden", price: 890, category: "floral", img:  "img/c3.jpg", desc: "Romantic semi-naked cake overflowing with fresh roses, peonies, and edible flowers." },
        { title: "Midnight Navy", price: 980, category: "modern gold", img:  "img/c5.jpg", desc: "Bold navy fondant with hand-painted gold details and geometric accents." },
        { title: "Rustic Charm", price: 620, category: "naked", img:  "img/c8.jpg", desc: "Semi-naked beauty with fresh berries, figs, and rosemary sprigs. Perfect for boho weddings." },
    ];

    const grid = document.getElementById('cakesGrid');
    cakes.forEach((cake, index) => {
        const card = document.createElement('div');
        card.className = 'cake-card';
        card.dataset.category = cake.category;
        card.setAttribute('data-aos', 'fade-up');
        card.setAttribute('data-aos-delay', (index % 6) * 100 + '');
        card.onclick = () => openModal(index);
        card.innerHTML = `
            <div class="cake-img"><img src="${cake.img}" alt="${cake.title}" loading="lazy"></div>
            <div class="cake-info">
                <h3>${cake.title}</h3>
                <p>3–5 Tiers | Fully Customizable</p>
                <div class="price">From $${cake.price}</div>
                <div style="display:flex;justify-content:center;gap:8px;margin-top:12px;flex-wrap:wrap;">
                    <span class="flavor">Vanilla</span>
                    <span class="flavor">Chocolate</span>
                    <span class="flavor">Red Velvet</span>
                </div>
            </div>
        `;
        grid.appendChild(card);
    });

    let currentCakeIndex = 0;
    function openModal(index) {
        currentCakeIndex = index;
        const cake = cakes[index];
        document.getElementById('modalTitle').textContent = cake.title;
        document.getElementById('modalDesc').textContent = cake.desc;
        document.getElementById('modalImg').src = cake.img;
        document.getElementById('totalPrice').textContent = '$' + cake.price;
        document.getElementById('tiers').selectedIndex = 0;
        document.getElementById('cakeModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeModal() {
        document.getElementById('cakeModal').classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function calculatePrice() {
        const cake = cakes[currentCakeIndex];
        let price = cake.price;
        const tiers = document.getElementById('tiers').value;
        if (tiers == 4) price += 300;
        if (tiers == 5) price += 650;
        document.getElementById('totalPrice').textContent = '$' + price;
    }

    function openConfirmation() {
        document.getElementById('confirmationModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeConfirmation() {
        document.getElementById('confirmationModal').classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function addToInquiry() {
        const cake = cakes[currentCakeIndex];
        const tiersText = document.getElementById('tiers').options[
            document.getElementById('tiers').selectedIndex
            ].text;
        const flavorText = document.getElementById('flavor').options[
            document.getElementById('flavor').selectedIndex
            ].text;
        const price = document.getElementById('totalPrice').textContent;

        // إرسال البيانات للـ PHP
        fetch("save_cake_order.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body:
                "cake=" + encodeURIComponent(cake.title) +
                "&tiers=" + encodeURIComponent(tiersText) +
                "&flavor=" + encodeURIComponent(flavorText) +
                "&price=" + encodeURIComponent(price)
        })
            .then(res => res.text())
            .then(data => {
                // عرض نافذة التأكيد كما هي
                document.getElementById('confirmCakeTitle').textContent = cake.title;
                document.getElementById('confirmTiers').textContent = tiersText;
                document.getElementById('confirmFlavor').textContent = flavorText;
                document.getElementById('confirmPrice').textContent = price;

                closeModal();
                openConfirmation();
            });
    }

    // Filter
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.dataset.filter;
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            document.querySelectorAll('.cake-card').forEach(card => {
                if (filter === 'all' || card.dataset.category.includes(filter)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Mega Menu Slideshow
    const serviceImages = ["img/ss2.jpg","img/m2.jpg","img/ss4.jpg","img/ss5.jpg"];
    let j = 0;
    setInterval(() => {
        j = (j + 1) % serviceImages.length;
        document.getElementById("serviceSlide").src = serviceImages[j];
    }, 2000);
</script>
</body>
</html>