<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Decor & Styling | Wedding Planner</title>

    <!-- Fonts (مُرتّبة بدون تكرار) -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;600;700&family=Montserrat:wght@300;400;500&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root{
            --rose:#dfa799;
            --gold:#d4a574;
            --dark:#2d1b14;
            --muted:#6f6863;
            --bg1:#fffaf7;
            --bg2:#f7ece4;
        }
        *{margin:0;padding:0;box-sizing:border-box}
        body{
            font-family:"Poppins",sans-serif;
            background:linear-gradient(to bottom,var(--bg1),var(--bg2));
            color:#333;
            line-height:1.75;
        }

        /* ===== HEADER ===== */
        .new-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background:   #fffdf9;
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
        .
            /* الخط السفلي البسيط والأنيق */
        .modern-nav .ser-btn::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 10px;
            width: 0;
            height: 3px;
            background: #fff;                    /* خط أبيض ناصع (أو #ffd7c0 لو بدك ذهبي فاتح) */
            border-radius: 3px;
            transition: width 0.45s ease;
            transform: translateX(-50%);
        }

        .modern-nav .ser-btn:hover::after {
            width: 60%;                          /* طول الخط – تقدري تزودي أو تنقصي */
        }

        /* تأثير الرفع عند الـ hover */
        .modern-nav .ser-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 35px rgba(223,167,153,0.6);
        }

        /* ================= FULL WIDTH MEGA MENU ================= */
        /* ================= ميجا مينو ثابتة تمامًا عند الـ hover ================= */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        /* Mega Menu – الحل النهائي والأنظف */
        .mega-menu {
            position: fixed;
            top:180px;
            left: 0;
            right: 0;
            /* هيتحسب تلقائي بالـ JS */
            width: 100%;
            background: #fffdf9;
            box-shadow: 0 18px 40px rgba(0,0,0,0.15);
            padding: 40px 40px 50px;
            border-radius: 0 0 24px 24px;
            z-index: 998;                    /* أقل من الـ Header (اللي عنده 1000) */
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
        .mega-menu.force-hide {
            opacity: 0 !important;
            visibility: hidden !important;
            transform: translateY(20px) !important;
            pointer-events: none !important;
        }
        /* لما تعمل hover على الـ li كله (أو أي حاجة جواه) تفتح وتثبت */


        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* تعديل الميجا مينو عشان النص يقرب من الصورة */
        .mega-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.8fr 1.2fr;   /* خلينا الجانب الأيسر أكبر شوية */
            gap: 40px;                            /* قللنا الـ gap من 70px إلى 40px */
            align-items: start;                   /* بدل center عشان النص يبدأ من فوق */
            padding: 20px 0;                      /* مسافة داخلية أقل من الأعلى والأسفل */
        }

        .mega-left {
            padding-top: 10px;                    /* لو حابب تخلي النص أعلى شوية */
        }

        .mega-left h3 {
            font-size: 32px;
            color: var(--secondary);
            margin-bottom: 22px;                  /* قللنا المسافة تحت العنوان */
            line-height: 1.2;
        }

        .mega-services-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px 20px;                       /* مسافات أصغر بين العناصر */
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
            height: 420px;                        /* زيادة خفيفة في الطول عشان تملأ المساحة أكتر */
            object-fit: cover;
            border-radius: 26px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.22);
        }

        @keyframes floatImg {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-18px); }
        }
        /* ===== Page Intro ===== */
        .page-hero{
            max-width:1200px;
            margin:0 auto;
            padding:10px 6% 55px;
            text-align:center;
        }
        .page-hero h1{
            font-family:"Playfair Display",serif;
            font-size:44px;
            font-weight:600;
            color:var(--dark);
            margin-bottom:10px;
        }
        .page-hero p{
            font-family:"Montserrat",sans-serif;
            color:var(--muted);
            max-width:860px;
            margin:0 auto;
            font-size:16px;
            font-weight:300;
            line-height:1.85;
        }

        /* ===== Decor Sections (يمين/يسار) ===== */
        .section{
            max-width:1300px;
            margin:0 auto;
            padding:60px 6%;
        }
        .decor-row{
            display:grid;
            grid-template-columns:1.05fr 1fr;
            gap:55px;
            align-items:center;
            margin-bottom:120px;
        }
        .decor-row.reverse{ grid-template-columns:1fr 1.05fr; }

        .decor-media{
            position:relative;
            border-radius:34px;
            overflow:hidden;
            box-shadow:0 45px 120px rgba(0,0,0,.22);
        }
        .decor-media img{
            width:100%;
            height:440px;
            object-fit:cover;
            display:block;
            transform:scale(1.02);
            transition:.7s ease;
        }
        .decor-row:hover .decor-media img{ transform:scale(1.08); }

        /* glow */
        .decor-media::after{
            content:"";
            position:absolute;
            inset:-2px;
            border-radius:36px;
            background:linear-gradient(120deg,transparent,rgba(255,225,190,.45),transparent);
            opacity:0;
            filter:blur(14px);
            transition:.6s;
        }
        .decor-row:hover .decor-media::after{opacity:1}

        .decor-content{
            background:rgba(255,255,255,.55);
            border:1px solid rgba(255,255,255,.65);
            backdrop-filter: blur(8px);
            border-radius:34px;
            padding:36px 34px;
            box-shadow:0 25px 80px rgba(0,0,0,.12);
            transition:.45s ease;
        }
        .decor-row:hover .decor-content{
            transform:translateY(-6px);
            box-shadow:0 40px 110px rgba(0,0,0,.18);
        }

        .badge{
            display:inline-block;
            padding:7px 14px;
            border-radius:999px;
            background:rgba(223,167,153,.22);
            color:#a75a3a;
            font-weight:600;
            letter-spacing:1px;
            font-size:12px;
            text-transform:uppercase;
            margin-bottom:14px;
            font-family:"Montserrat",sans-serif;
        }
        .decor-content h2{
            font-family:"Playfair Display",serif;
            font-size:36px;
            color:var(--dark);
            margin-bottom:10px;
        }
        .decor-content p{
            color:var(--muted);
            font-size:15px;
            margin-bottom:18px;
        }
        .meta{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:10px 18px;
            margin:18px 0 10px;
        }
        .meta .item{ font-size:14px; color:#5f5752; }
        .meta .item b{ color:#3f2a22; }

        .price{
            margin-top:16px;
            font-size:22px;
            font-weight:700;
            color:#a75a3a;
            display:flex;
            align-items:center;
            gap:10px;
        }
        .price small{ font-weight:500; color:#7a6c64; }

        .actions{
            display:flex;
            gap:14px;
            flex-wrap:wrap;
            margin-top:18px;
        }
        .btn{
            border:none;
            padding:13px 30px;
            border-radius:999px;
            background:linear-gradient(135deg,var(--rose),var(--gold));
            color:#fff;
            font-weight:700;
            cursor:pointer;
            box-shadow:0 18px 50px rgba(223,167,153,.55);
            transition:.25s;
        }
        .btn:hover{transform:translateY(-3px)}
        .btn.outline{
            background:transparent;
            color:#a75a3a;
            border:1px solid rgba(167,90,58,.35);
            box-shadow:none;
        }

        /* ===== Click Expand Details (ترانزيشن الضغط) ===== */
        .extra-details{
            max-height:0;
            overflow:hidden;
            opacity:0;
            transform:translateY(10px);
            transition:max-height .6s ease, opacity .35s ease, transform .35s ease;
            margin-top:12px;
            padding-left:2px;
        }
        .decor-row.active .extra-details{
            max-height:520px; /* زودناها لأن فيها صور الآن */
            opacity:1;
            transform:translateY(0);
        }
        .extra-details ul{ margin-top:10px; padding-left:18px; }
        .extra-details li{
            font-size:14px;
            color:#5f5752;
            margin-bottom:6px;
        }

        /* ===== NEW: Styling options + preview images ===== */
        .styling-title{
            margin-top:14px;
            font-family:"Montserrat",sans-serif;
            font-size:12px;
            letter-spacing:2px;
            text-transform:uppercase;
            color:#9b6b52;
        }
        .styling-options{
            margin-top:10px;
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:10px 12px;
        }
        .style-opt{
            display:flex;
            align-items:flex-start;
            gap:10px;
            padding:10px 12px;
            border-radius:14px;
            background:rgba(255,255,255,.55);
            border:1px solid rgba(167,90,58,.14);
            transition:.25s ease;
        }
        .style-opt:hover{
            transform:translateY(-2px);
            box-shadow:0 14px 30px rgba(0,0,0,.08);
        }
        .style-opt input{ margin-top:3px; }
        .style-opt .opt-text{
            font-size:13px;
            color:#5f5752;
            line-height:1.35;
        }
        .style-opt .opt-text b{
            color:#3f2a22;
            display:block;
            margin-bottom:2px;
        }
        .style-opt .opt-text span{
            color:#a75a3a;
            font-weight:700;
        }

        .style-preview{
            margin-top:12px;
            border-radius:18px;
            overflow:hidden;
            background:rgba(255,255,255,.5);
            border:1px solid rgba(255,255,255,.7);
            box-shadow:0 18px 50px rgba(0,0,0,.10);
            opacity:0;
            transform:translateY(8px);
            max-height:0;
            transition:opacity .35s ease, transform .35s ease, max-height .45s ease;
        }
        .style-preview.show{
            opacity:1;
            transform:translateY(0);
            max-height:260px;
        }
        .style-preview .strip{
            display:flex;
            gap:10px;
            padding:12px;
            overflow:auto;
            scroll-snap-type:x mandatory;
        }
        .style-preview img{
            width:140px;
            height:110px;
            object-fit:cover;
            border-radius:14px;
            flex:0 0 auto;
            scroll-snap-align:start;
            transition:.25s ease;
        }
        .style-preview img:hover{ transform:scale(1.06); }
        .style-preview .cap{
            padding:10px 12px 12px;
            font-size:12px;
            color:#6f6863;
            font-family:"Montserrat",sans-serif;
        }

        @media (max-width: 992px){
            .decor-row, .decor-row.reverse{ grid-template-columns:1fr; }
            .decor-media img{height:360px}
            .styling-options{grid-template-columns:1fr}
        }

        /* ===== Booking ===== */
        .booking{
            max-width:1200px;
            margin:20px auto 120px;
            padding:0 6%;
        }
        .booking-card{
            background:linear-gradient(135deg,#dba58f,#c78a6c);
            border-radius:44px;
            padding:85px 8%;
            color:#fff;
            box-shadow:0 45px 120px rgba(0,0,0,.18);
        }
        .booking-card h3{
            font-family:"Great Vibes",cursive;
            font-size:62px;
            text-align:center;
            margin-bottom:14px;
        }
        .booking-card p{
            text-align:center;
            opacity:.95;
            max-width:760px;
            margin:0 auto 34px;
            font-family:"Montserrat",sans-serif;
            font-weight:300;
        }
        form{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:18px;
        }
        input,select,textarea{
            width:100%;
            padding:14px;
            border:none;
            border-radius:14px;
            font-family:"Poppins",sans-serif;
            outline:none;
        }
        textarea{grid-column:span 2; min-height:110px}
        .form-actions{
            grid-column:span 2;
            display:flex;
            gap:12px;
            justify-content:center;
            margin-top:8px;
        }
        .note{
            grid-column:span 2;
            text-align:center;
            font-size:12px;
            opacity:.95;
            font-family:"Montserrat",sans-serif;
        }

        /* ===== Reviews ===== */
        .reviews{
            max-width:1200px;
            margin:0 auto 120px;
            padding:0 6%;
        }
        .reviews h3{
            font-family:"Great Vibes",cursive;
            font-size:58px;
            text-align:center;
            color:#c98a6f;
            margin-bottom:8px;
        }
        .reviews p.top{
            text-align:center;
            color:var(--muted);
            margin-bottom:40px;
            font-family:"Montserrat",sans-serif;
            font-weight:300;
        }
        .review-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(290px,1fr));
            gap:26px;
        }
        .review{
            background:#fff;
            border-radius:28px;
            padding:26px;
            box-shadow:0 20px 60px rgba(0,0,0,.12);
            transition:.35s;
        }
        .review:hover{transform:translateY(-8px)}
        .stars{letter-spacing:2px; color:#b07a44; margin:8px 0 10px}
        .review b{color:#a75a3a}

        footer{
            background:#111;
            color:#ccc;
            text-align:center;
            padding:46px 16px;
        }

        @media (max-width: 992px){
            form{grid-template-columns:1fr}
            textarea,.form-actions,.note{grid-column:span 1}
            .meta{grid-template-columns:1fr}
        }
        /* ✨ Academic polish */
        .decor-row{
            scroll-margin-top: 160px;
        }
        .style-opt input{
            accent-color: #c98a6f;
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


            <!-- Services Mega Menu -->
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

<main>
    <section class="page-hero">
        <h1>Wedding halls</h1>
        <p>
            Explore our previous wedding decor concepts designed for halls and venues.
            Choose your favorite, customize details, and send your booking request instantly.
        </p>
    </section>

    <section class="section">
        <!-- 1 -->
        <div class="decor-row">
            <div class="decor-media">
                <img id="mainDecorImage"
                     src="img/hall1/main.jpg">
            </div>

            <div class="decor-content">
                <div class="badge">Luxury Hall</div>
                <h2>Golden Ballroom</h2>
                <p>
                    A grand royal atmosphere for large wedding halls. Premium florals, elegant aisle design,
                    and warm lighting that makes every moment feel cinematic.
                </p>

                <div class="meta">
                    <div class="item"><b>Best for:</b> Grand Ballroom</div>
                    <div class="item"><b>Guests:</b> 350–600</div>
                    <div class="item"><b>Palette:</b> Gold · Cream · Warm White</div>
                    <div class="item"><b>Includes:</b> Florals · Chandeliers · Stage</div>
                </div>

                <div class="price">$4,500 <small>starting price</small></div>
                <div class="price">
                    Total Price: <span class="total-price">4500</span> $
                </div>


                <div class="actions">
                    <button class="btn" onclick="toggleDetails(this,'Golden Ballroom',4500)">Book This Decor</button>
                    <button class="btn outline" onclick="scrollToSection('reviews')">See Reviews</button>
                </div>

                <div class="extra-details">
                    <ul>
                        <li>✔ Custom color palette selection</li>
                        <li>✔ Stage & entrance styling</li>
                        <li>✔ Premium floral upgrade options</li>
                        <li>✔ Lighting intensity & mood control</li>
                    </ul>

                    <!-- ✅ NEW: Styling checkboxes + preview -->
                    <div class="styling-title">Choose Styling (tap to preview)</div>

                    <div class="styling-options">
                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-price="800"
                                   data-title="Golden Floral Installation"
                                   data-image="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1600">
                            Golden Florals
                            <div class="opt-text">
                                <b>Golden Florals</b>
                                Luxury ceiling + stage florals
                                <span>(+$800)</span>
                            </div>
                        </label>

                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-price="600"
                                   data-image="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1600"
                                   data-title="Stage Backdrop & Drapes"
                                   data-image="https://images.unsplash.com/photo-1520857014576-2c4f4c972b57?w=1600">
                            <div class="opt-text">
                                <b>Stage Backdrop</b>
                                Drapes + premium backdrop
                                <span>(+$600)</span>
                            </div>
                        </label>

                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-price="350"
                                   data-image="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1600"
                                   data-title="Aisle Candles & Entrance"
                                   data-images="https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Aisle & Entrance</b>
                                Candles + entry styling
                                <span>(+$350)</span>
                            </div>
                        </label>

                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-price="400"
                                   data-image="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1600"
                                   data-title="Premium Lighting Upgrade"
                                   data-image="https://images.unsplash.com/photo-1510070009289-b5bc34383727?w=1600">
                            <div class="opt-text">
                                <b>Premium Lighting</b>
                                Mood lighting + highlights
                                <span>(+$400)</span>
                            </div>
                        </label>
                    </div>

                    <div class="style-preview" aria-live="polite">
                        <div class="strip"></div>
                        <div class="cap">Select a styling option to preview images.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 (reverse) -->
        <div class="decor-row reverse">
            <div class="decor-content">
                <div class="badge">Romantic Indoor</div>
                <h2>Floral Elegance</h2>
                <p>
                    Soft ivory florals with candlelight for an intimate, elegant hall decor.
                    Perfect for couples who want timeless romance with refined details.
                </p>

                <div class="meta">
                    <div class="item"><b>Best for:</b> Indoor Hall</div>
                    <div class="item"><b>Guests:</b> 180–320</div>
                    <div class="item"><b>Palette:</b> Ivory · Blush · Gold</div>
                    <div class="item"><b>Includes:</b> Centerpieces · Candles · Aisle</div>
                </div>

                <div class="price">$2,800 <small>starting price</small></div>
                <div class="price">
                    Total Price: <span class="total-price">2800</span> $
                </div>


                <div class="actions">
                    <button class="btn" onclick="toggleDetails(this,'Floral Elegance',2800)">Book This Decor</button>
                    <button class="btn outline" onclick="scrollToSection('booking')">Customize</button>
                </div>

                <div class="extra-details">
                    <ul>
                        <li>✔ Ceremony arch styling</li>
                        <li>✔ Candle clusters & aisle design</li>
                        <li>✔ Table styling and linens</li>
                        <li>✔ Soft romantic lighting</li>
                    </ul>

                    <div class="styling-title">Choose Styling (tap to preview)</div>

                    <div class="styling-options">
                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-price="300"

                                   data-title="Ivory Floral Centerpieces"
                                   data-images="https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Ivory Centerpieces</b>
                                Table florals + runnersunsplash
                                <span>(+$300)</span>
                            </div>
                        </label>

                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-title="Candle Aisle Design"
                                   data-images="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1520857014576-2c4f4c972b57?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Candle Aisle</b>
                                Warm candle walkway
                                <span>(+$250)</span>
                            </div>
                        </label>

                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-title="Ceremony Arch"
                                   data-images="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1529634806980-85c3dd6d34ac?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Ceremony Arch</b>
                                Romantic arch styling
                                <span>(+$420)</span>
                            </div>
                        </label>

                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-title="Soft Lighting Mood"
                                   data-images="https://images.unsplash.com/photo-1510070009289-b5bc34383727?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1520857014576-2c4f4c972b57?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Soft Lighting</b>
                                Mood light + highlights
                                <span>(+$180)</span>
                            </div>
                        </label>
                    </div>

                    <div class="style-preview" aria-live="polite">
                        <div class="strip"></div>
                        <div class="cap">Select a styling option to preview images.</div>
                    </div>
                </div>
            </div>

            <div class="decor-media">
                <img src="img/hal2/main.jpg" alt="Floral Elegance">
            </div>
        </div>

        <!-- 3 -->
        <div class="decor-row">
            <div class="decor-media">
                <img src="img/hal3/main.jpg" alt="Garden Dream">
            </div>

            <div class="decor-content">
                <div class="badge">Outdoor / Garden</div>
                <h2>Garden Dream</h2>
                <p>
                    A nature-inspired outdoor decor with greenery arches, fairy lights, and soft textures.
                    Ideal for sunset weddings and garden venues.
                </p>

                <div class="meta">
                    <div class="item"><b>Best for:</b> Garden / Outdoor Venue</div>
                    <div class="item"><b>Guests:</b> 120–220</div>
                    <div class="item"><b>Palette:</b> Green · White · Warm Lights</div>
                    <div class="item"><b>Includes:</b> Arch · Lights · Walkway</div>
                </div>

                <div class="price">$2,200 <small>starting price</small></div>
                <div class="price">
                    Total Price: <span class="total-price">2800</span> $
                </div>


                <div class="actions">
                    <button class="btn" onclick="toggleDetails(this,'Garden Dream',2200)">Book This Decor</button>
                    <button class="btn outline" onclick="scrollToSection('booking')">Request Details</button>
                </div>

                <div class="extra-details">
                    <ul>
                        <li>✔ Greenery arch + aisle florals</li>
                        <li>✔ Fairy lights & outdoor ambience</li>
                        <li>✔ Rustic table styling options</li>
                        <li>✔ Weather-safe setup add-on</li>
                    </ul>

                    <div class="styling-title">Choose Styling (tap to preview)</div>

                    <div class="styling-options">
                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-title="Greenery Arch"
                                   data-images="https://images.unsplash.com/photo-1520857014576-2c4f4c972b57?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1523438885200-e635ba2c371e?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Greenery Arch</b>
                                Natural arch + florals
                                <span>(+$400)</span>
                            </div>
                        </label>

                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-title="Fairy Lights"
                                   data-images="https://images.unsplash.com/photo-1510070009289-b5bc34383727?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1480714378408-67cf0d13bc1b?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Fairy Lights</b>
                                Warm hanging lights
                                <span>(+$300)</span>
                            </div>
                        </label>

                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-title="Rustic Table Styling"
                                   data-images="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Rustic Tables</b>
                                Linen + centerpieces
                                <span>(+$260)</span>
                            </div>
                        </label>

                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-title="Aisle Walkway"
                                   data-images="https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1520857014576-2c4f4c972b57?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Walkway</b>
                                Entry + aisle styling
                                <span>(+$220)</span>
                            </div>
                        </label>
                    </div>

                    <div class="style-preview" aria-live="polite">
                        <div class="strip"></div>
                        <div class="cap">Select a styling option to preview images.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4 (reverse) -->
        <div class="decor-row reverse">
            <div class="decor-content">
                <div class="badge">Modern Minimal</div>
                <h2>Minimal Chic</h2>
                <p>
                    Clean lines, neutral tones, and modern luxury styling.
                    A perfect concept for contemporary halls and elegant couples.
                </p>

                <div class="meta">
                    <div class="item"><b>Best for:</b> Modern Hall</div>
                    <div class="item"><b>Guests:</b> 150–280</div>
                    <div class="item"><b>Palette:</b> Beige · White · Soft Gold</div>
                    <div class="item"><b>Includes:</b> Minimal florals · Stage · Tables</div>
                </div>

                <div class="price">$3,100 <small>starting price</small></div>
                <div class="price">
                    Total Price: <span class="total-price">2800</span> $
                </div>


                <div class="actions">
                    <button class="btn" onclick="toggleDetails(this,'Minimal Chic',3100)">Book This Decor</button>
                    <button class="btn outline" onclick="scrollToSection('reviews')">Client Stories</button>
                </div>

                <div class="extra-details">
                    <ul>
                        <li>✔ Minimal stage styling</li>
                        <li>✔ Neutral florals + modern vases</li>
                        <li>✔ Clean table layouts</li>
                        <li>✔ Soft uplighting setup</li>
                    </ul>

                    <div class="styling-title">Choose Styling (tap to preview)</div>

                    <div class="styling-options">
                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-title="Neutral Centerpieces"
                                   data-images="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1511285560929-80b456fe2646?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Neutral Centerpieces</b>
                                Minimal florals + vases
                                <span>(+$300)</span>
                            </div>
                        </label>

                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-title="Minimal Stage"
                                   data-images="https://images.unsplash.com/photo-1511285560929-80b456fe2646?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1520857014576-2c4f4c972b57?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Minimal Stage</b>
                                Clean stage styling
                                <span>(+$450)</span>
                            </div>
                        </label>

                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-title="Soft Uplighting"
                                   data-images="https://images.unsplash.com/photo-1510070009289-b5bc34383727?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1529634806980-85c3dd6d34ac?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Soft Uplighting</b>
                                Modern light accents
                                <span>(+$250)</span>
                            </div>
                        </label>

                        <label class="style-opt">
                            <input class="style-check" type="checkbox"
                                   data-title="Table Layout Styling"
                                   data-images="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1200&auto=format&fit=crop|https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?w=1200&auto=format&fit=crop">
                            <div class="opt-text">
                                <b>Table Layout</b>
                                Clean modern setup
                                <span>(+$220)</span>
                            </div>
                        </label>
                    </div>

                    <div class="style-preview" aria-live="polite">
                        <div class="strip"></div>
                        <div class="cap">Select a styling option to preview images.</div>
                    </div>
                </div>
            </div>

            <div class="decor-media">
                <img src="img/hal4/main.jpg" alt="Minimal Chic">

            </div>
        </div>
    </section>

    <!-- BOOKING -->
    <section class="booking" id="booking">
        <div class="booking-card">
            <h3>Book Your Decor</h3>
            <p>
                Select the decor you love, choose what you want to customize, and send your booking request.
                We will contact you with full details and availability.
            </p>

            <form method="POST" action="save_decor_booking.php" onsubmit="prepareDecorBooking()">
                <input id="name" name="full_name" type="text" placeholder="Your Name" required>
                <input id="email" name="email" type="email" placeholder="Email Address" required>

                <select id="decorSelect" name="decor" required>
                    <option value="">Select Decor</option>
                    <option value="Golden Ballroom">Golden Ballroom</option>
                    <option value="Floral Elegance">Floral Elegance</option>
                    <option value="Garden Dream">Garden Dream</option>
                    <option value="Minimal Chic">Minimal Chic</option>
                </select>

                <input id="date" name="event_date" type="date" required>

                <select id="venueType" name="venue_type" required>
                    <option value="">Venue Type</option>
                    <option value="Grand Ballroom">Grand Ballroom</option>
                    <option value="Indoor Hall">Indoor Hall</option>
                    <option value="Outdoor Garden">Outdoor / Garden</option>
                    <option value="Modern Hall">Modern Hall</option>
                </select>

                <select id="guests" name="guests" required>
                    <option value="">Guests Count</option>
                    <option>100 - 150</option>
                    <option>150 - 250</option>
                    <option>250 - 400</option>
                    <option>400 - 600</option>
                </select>

                <textarea id="customize" name="customize" placeholder="What would you like to customize? (colors, stage, florals, lighting...)"></textarea>
                <textarea id="opinion"  name="opinion" placeholder="Your opinion / special requests / notes"></textarea>
                <input type="hidden" id="totalPriceInput" name="total_price" value="0">
                <input type="hidden" id="stylingInput" name="selected_styling" value="">
                <div class="note" id="priceHint">Choose a decor to see the starting price.</div>

                <div class="form-actions">
                    <button class="btn" type="submit">Submit Booking Request</button>
                    <button class="btn outline" type="button" onclick="resetForm()">Reset</button>
                </div>
            </form>
        </div>
    </section>

    <!-- REVIEWS -->
    <section class="reviews" id="reviews">
        <h3>Client Reviews</h3>
        <p class="top">Real experiences from previous weddings</p>

        <div class="review-grid" id="reviewGrid">
            <div class="review">
                <b>Sarah & Ahmed</b>
                <div class="stars">★★★★★</div>
                <p>Everything looked magical. The hall felt like a dream.</p>
            </div>

            <div class="review">
                <b>Lina & Omar</b>
                <div class="stars">★★★★★</div>
                <p>Professional team, elegant details, and perfect lighting.</p>
            </div>

            <div class="review">
                <b>Noor & Yazan</b>
                <div class="stars">★★★★☆</div>
                <p>Beautiful decor and fast communication. Highly recommended.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2025 A Day to Cherish · Decor & Styling</p>
    </footer>
</main>

<script>
    const decorPrices = {
        "Golden Ballroom": 4500,
        "Floral Elegance": 2800,
        "Garden Dream": 2200,
        "Minimal Chic": 3100
    };

    function scrollToSection(id){
        document.getElementById(id).scrollIntoView({behavior:"smooth"});
    }

    function selectDecor(name, price){
        document.getElementById("decorSelect").value = name;
        document.getElementById("priceHint").textContent =
            `Selected: ${name} — Starting price: $${price}`;
    }

    function toggleDetails(btn, name, basePrice){

        const row = btn.closest(".decor-row");

        // اغلاق باقي الصالات
        document.querySelectorAll(".decor-row").forEach(r=>{
            if(r !== row) r.classList.remove("active");
        });

        // فتح / اغلاق الحالية
        row.classList.toggle("active");

        // تحديث الفورم (بدون مشاكل)
        document.getElementById("decorSelect").value = name;
        document.getElementById("priceHint").textContent =
            `Selected: ${name} — Starting price: $${basePrice}`;
    }

    document.getElementById("decorSelect").addEventListener("change", function(){
        const name = this.value;
        if(!name){
            document.getElementById("priceHint").textContent =
                "Choose a decor to see the starting price.";
            return;
        }
        document.getElementById("priceHint").textContent =
            `Selected: ${name} — Starting price: $${decorPrices[name]}`;
    });

    function submitBooking(e){
        e.preventDefault();

        const decor = document.getElementById("decorSelect").value;
        const opinion = document.getElementById("opinion").value.trim();

        if(opinion.length > 0){
            const name = document.getElementById("name").value.trim() || "New Client";
            const reviewGrid = document.getElementById("reviewGrid");

            const div = document.createElement("div");
            div.className = "review";
            div.innerHTML = `
                <b>${escapeHTML(name)}</b>
                <div class="stars">★★★★★</div>
                <p>${escapeHTML(opinion)}</p>
            `;
            reviewGrid.prepend(div);
        }

        alert(`Booking request sent!\nDecor: ${decor}\nWe will contact you soon.`);
        resetForm();
    }

    function resetForm(){
        document.querySelector(".booking form").reset();
        document.getElementById("priceHint").textContent =
            "Choose a decor to see the starting price.";
    }

    function escapeHTML(str){
        return str.replace(/[&<>"']/g, m => ({
            "&":"&amp;","<":"&lt;",">":"&gt;","\"":"&quot;","'":"&#039;"
        }[m]));
    }

    // ✅ NEW: Checkbox -> show images (per card)
    function updatePreviewForCard(card){
        const preview = card.querySelector(".style-preview");
        if(!preview) return;
        const strip = preview.querySelector(".strip");
        const cap = preview.querySelector(".cap");
        const checks = card.querySelectorAll(".style-check:checked");

        strip.innerHTML = "";

        if(checks.length === 0){
            preview.classList.remove("show");
            cap.textContent = "Select a styling option to preview images.";
            return;
        }

        // show preview
        preview.classList.add("show");

        // Title based on last checked
        const last = checks[checks.length - 1];
        cap.textContent = `Preview: ${last.dataset.title || "Selected styling"}`;

        // Collect images from all checked options
        const urls = [];
        checks.forEach(ch=>{
            const list = (ch.dataset.images || "").split("|").map(s=>s.trim()).filter(Boolean);
            list.forEach(u=>urls.push(u));
        });

        // Build images (limit to keep it clean)
        urls.slice(0, 10).forEach(u=>{
            const img = document.createElement("img");
            img.loading = "lazy";
            img.alt = "Styling preview";
            img.src = u;
            strip.appendChild(img);
        });
    }

    document.querySelectorAll(".decor-content").forEach(card=>{
        updatePreviewForCard(card);
        card.querySelectorAll(".style-check").forEach(ch=>{
            ch.addEventListener("change", ()=> updatePreviewForCard(card));
        });
    });
    document.querySelectorAll(".decor-row").forEach(row => {

        const priceEl = row.querySelector(".total-price");
        const btn = row.querySelector(".btn");

        if (!priceEl || !btn) return;

        const basePrice = Number(
            btn.getAttribute("onclick").match(/\d+/)[0]
        );

        let total = basePrice;
        priceEl.textContent = total;

        row.querySelectorAll(".style-check").forEach(ch => {
            ch.addEventListener("change", () => {
                total = basePrice;

                row.querySelectorAll(".style-check:checked").forEach(c => {
                    total += Number(c.dataset.price || 0);
                });

                priceEl.textContent = total;
            });
        });
    });
    function prepareDecorBooking(){

        const decorName = document.getElementById("decorSelect").value;
        if(!decorName) return;

        let total = 0;
        let selectedStyling = [];

        // ابحث عن القاعة المختارة
        document.querySelectorAll(".decor-row").forEach(row => {
            const title = row.querySelector("h2");
            if(title && title.textContent.trim() === decorName){

                // السعر الأساسي
                const baseEl = row.querySelector(".total-price");
                if(baseEl){
                    total = parseInt(baseEl.textContent) || 0;
                }

                // الإضافات
                row.querySelectorAll(".style-check:checked").forEach(ch=>{
                    total += parseInt(ch.dataset.price || 0);
                    selectedStyling.push(ch.dataset.title || "");
                });
            }
        });

        // تعبئة الحقول المخفية
        document.getElementById("totalPriceInput").value = total;
        document.getElementById("stylingInput").value = selectedStyling.join(", ");
    }
    const serviceImages = ["img/ss2.jpg","img/m2.jpg","img/ss4.jpg","img/ss5.jpg"];
    let j = 0;
    setInterval(() => {
        j = (j + 1) % serviceImages.length;
        document.getElementById("serviceSlide").src = serviceImages[j];
    }, 2000);

</script>

</body>
</html>
