<?php
require_once "dbconnect.php";

$sql = "SELECT * FROM djs";
$result = mysqli_query($conn, $sql);

$djs = [];
while ($row = mysqli_fetch_assoc($result)) {

    // جلب الميزات لكل DJ
    $features = [];
    $fid = $row['id'];
    $fres = mysqli_query($conn, "SELECT feature FROM dj_features WHERE dj_id = $fid");
    while ($f = mysqli_fetch_assoc($fres)) {
        $features[] = $f['feature'];
    }

    $djs[] = [
            "name"     => $row['name'],
            "location" => $row['location'],
            "rating"   => (float)$row['rating'],
            "reviews"  => (int)$row['reviews'],
            "price"    => (int)$row['price'],
            "deal"     => $row['deal'],
            "award"    => (bool)$row['award'],
            "img"      => "img/" . $row['image'],
            "desc"     => $row['description'],
            "features" => $features
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Wedding DJs - A Day to Cherish</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 (مرة واحدة بس وكاملة) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />  <style>
        :root {
            --primary: #DFA799;
            --secondary: #d78a4e;
            --text: #444;
            --gray: #777;
            --green: #27ae60;
            --yellow: #f39c12;
            --purple: #6a4c93;
            --red: #e74c3c;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Poppins',sans-serif; background:#fafafa; color:var(--text); line-height:1.7; overflow-x:hidden; }

        /* Header */
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

        /* HERO الفخمة */
        .hero {
            position: relative;
            height: 60vh;
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            color: white;
            z-index: 0;
        }
        .hero video {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -2;
        }
        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(0,0,0,0.15), rgba(0,0,0,0.65));
            z-index: -1;
        }
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(223,167,153,0.18);
            backdrop-filter: blur(10px);
            pointer-events: none;
            z-index: 0;
            animation: float 18s infinite linear;
        }
        .h1 { width: 380px; height: 380px; top: 10%; left: 8%; animation-duration: 24s; }
        .h2 { width: 280px; height: 280px; bottom: 15%; right: 12%; animation-duration: 20s; }
        .h3 { width: 460px; height: 460px; top: 45%; right: -10%; animation-duration: 28s; }
        @keyframes float {
            0%   { transform: translate(0, 0) rotate(0deg); }
            50%  { transform: translate(40px, -60px) rotate(180deg); } /* Added for better motion variety */
            100% { transform: translate(0, 0) rotate(360deg); }
        }
        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 820px;
            padding: 0 20px;
        }
        .hero-kicker {
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 12px;
            opacity: 0.9;
        }
        .hero-content h1 {
            font-family: "Playfair Display", serif;
            font-size: clamp(42px, 6vw, 68px);
            line-height: 1.15;
            margin-bottom: 20px;
            text-shadow: 0 4px 12px rgba(0,0,0,0.4);
        }
        .hero-content p {
            font-size: 18px;
            max-width: 620px;
            margin: 0 auto 32px;
            opacity: 0.95;
            line-height: 1.6;
        }
        .hero-actions {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }
        .btn-primary, .btn-ghost {
            padding: 14px 32px;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.35s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary {
            background: var(--primary);
            color: white;
            border: none;
            box-shadow: 0 12px 32px rgba(223,167,153,0.45);
        }
        .btn-primary:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(223,167,153,0.55); }
        .btn-ghost {
            background: transparent;
            color: white;
            border: 2px solid rgba(255,255,255,0.45);
            backdrop-filter: blur(8px);
        }
        .btn-ghost:hover {
            background: rgba(255,255,255,0.15);
            border-color: white;
        }
        .hero-scroll {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            width: 28px;
            height: 48px;
            border: 2px solid rgba(255,255,255,0.5);
            border-radius: 30px;
            animation: scrollDown 2s infinite;
        }
        .hero-scroll::before {
            content: "";
            position: absolute;
            top: 8px;
            left: 50%;
            transform: translateX(-50%);
            width: 6px;
            height: 10px;
            background: white;
            border-radius: 4px;
            animation: scrollDot 2s infinite;
        }
        @keyframes scrollDown {
            0%,20%,50%,80%,100%{transform:translateX(-50%) translateY(0)}
            40%{transform:translateX(-50%) translateY(8px)}
        }
        @keyframes scrollDot {
            0%{transform:translateX(-50%) translateY(0);opacity:1}
            100%{transform:translateX(-50%) translateY(20px);opacity:0}
        }

        /* باقي التصميم */
        .filters-container {
            display: flex; gap: 30px; padding: 60px 5% 40px; max-width: 1500px; margin: 0 auto;
        }
        .filters-sidebar {
            width: 300px; background: white; padding: 28px; border-radius: 16px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.08); position: sticky; top: 100px; height: fit-content;
        }
        .filter-section { border-bottom: 1px solid #eee; padding-bottom: 22px; margin-bottom: 22px; }
        .filter-section:last-child { border-bottom: none; padding-bottom: 0; margin-bottom: 0; }
        .filter-header { font-size: 16px; font-weight: 600; color: #444; margin-bottom: 14px; display: flex; justify-content: space-between; align-items: center; cursor: pointer; }
        .filter-header i { transition: 0.3s; color: #999; }
        .filter-header.active i { transform: rotate(180deg); }
        .filter-content { display: none; }
        .filter-content.active { display: block; }
        select, input[type="date"], textarea, input[type="text"], input[type="email"], input[type="tel"] {
            width: 100%; padding: 14px; border: 1px solid #ddd; border-radius: 10px; font-size: 15px; background: white; margin-bottom: 15px;
        }
        textarea { resize: vertical; min-height: 100px; }
        .toggle-switch { position: relative; width: 52px; height: 28px; background: #ddd; border-radius: 50px; cursor: pointer; transition: 0.3s; display: inline-block; }
        .toggle-switch::after { content: ''; position: absolute; top: 3px; left: 3px; width: 22px; height: 22px; background: white; border-radius: 50%; transition: 0.3s; }
        .toggle-switch.active { background: var(--primary); }
        .toggle-switch.active::after { transform: translateX(24px); }
        .price-range input[type="range"] { width: 100%; height: 6px; border-radius: 5px; background: #ddd; outline: none; -webkit-appearance: none; }
        .price-range input[type="range"]::-webkit-slider-thumb { -webkit-appearance: none; width: 22px; height: 22px; background: var(--primary); border-radius: 50%; cursor: pointer; }

        .results { flex:1; }
        .results-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px; }
        .view-tabs { display:flex; background:#eee; border-radius:12px; padding:6px; }
        .view-tab { padding:10px 22px; border-radius:10px; cursor:pointer; transition:0.3s; }
        .view-tab.active { background:white; color:var(--primary); font-weight:600; box-shadow:0 4px 15px rgba(0,0,0,0.1); }
        .results-count { font-size: 19px; font-weight: 600; color: #444; }
        .results-count span { color:var(--primary); font-size: 22px; }

        .djs-list, .djs-grid { display:none; gap:28px; }
        .djs-list.active { display:flex; flex-direction:column; }
        .djs-grid.active { display:grid; grid-template-columns:repeat(auto-fill,minmax(340px,1fr)); }

        /* List Item Specific Styling */
        .dj-list-item {
            background:white; border-radius:16px; overflow:hidden; box-shadow:0 8px 30px rgba(0,0,0,0.1);
            transition:0.4s; cursor:pointer; display: flex; align-items: center;
        }
        .dj-list-item .dj-img {
            width: 250px;
            min-height: 230px;
            height: 100%;
            flex-shrink: 0;
        }
        .dj-list-item .dj-info { flex-grow: 1; }
        .dj-list-item:hover { transform:translateY(-4px); box-shadow:0 15px 30px rgba(0,0,0,0.15); }

        .dj-card { background:white; border-radius:16px; overflow:hidden; box-shadow:0 8px 30px rgba(0,0,0,0.1); transition:0.4s; cursor:pointer; }
        .dj-card:hover { transform:translateY(-12px); box-shadow:0 25px 50px rgba(0,0,0,0.18); }
        .dj-img {
            height: 230px;
            overflow: hidden;
            position: relative;
            background: #000;                    /* خلفية سوداء احتياطية */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dj-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;         /* تملي المساحة كاملة */
            object-position: center;   /* تركيز الصورة في المنتصف (مهم جدًا!) */
            transition: transform 0.5s ease;
        }

        /* اختياري: لو بدك zoom أقوى لما تعمل hover */
        .dj-card:hover .dj-img img,
        .dj-list-item:hover .dj-img img {
            transform: scale(1.12);
        }
        .dj-card:hover .dj-img img, .dj-list-item:hover .dj-img img { transform:scale(1.15); }
        .dj-play { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:70px; height:70px; background:rgba(255,255,255,0.97); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:30px; color:var(--primary); opacity:0; transition:0.3s; }
        .dj-card:hover .dj-play, .dj-list-item:hover .dj-play { opacity:1; }
        .dj-info { padding:24px; }
        .dj-name { font-size:21px; font-weight:600; margin-bottom:8px; display:flex; align-items:center; gap:10px; flex-wrap:wrap; }
        .dj-rating { color:var(--yellow); margin-bottom:8px; font-size:15px; }
        .dj-location { color:var(--gray); font-size:14px; margin-bottom:10px; display:flex; align-items:center; gap:6px; }
        .dj-price { font-size:22px; color:var(--secondary); font-weight:700; }
        .deal { background:var(--green); color:white; padding:5px 12px; border-radius:8px; font-size:13px; }

        /* Modal - DJ Details */
        .modal { display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.94); z-index:9999; align-items:center; justify-content:center; padding:20px; overflow-y:auto; }
        .modal.active { display:flex; }
        .modal-content { background:white; border-radius:20px; max-width:1100px; width:100%; overflow:hidden; display:grid; grid-template-columns:1fr 1.4fr; position:relative; animation:pop 0.5s; }
        @keyframes pop { from{transform:scale(0.8);opacity:0} to{transform:scale(1);opacity:1} }
        .modal-close { position:absolute; top:15px; right:15px; width:50px; height:50px; background:rgba(255,255,255,0.9); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:26px; cursor:pointer; z-index:10; box-shadow:0 5px 20px rgba(0,0,0,0.2); }
        .modal-close:hover { background:var(--red); color:white; }
        .modal-img { height:100%; min-height:500px; position:relative; }
        .modal-img img { width:100%; height:100%; object-fit:cover; }

        .audio-player-overlay { position: absolute; bottom: 25px; left: 25px; z-index: 11; }
        .audio-player { background: rgba(0,0,0,0.78); backdrop-filter: blur(12px); padding: 14px 20px; border-radius: 50px; display: flex; align-items: center; gap: 16px; color: white; box-shadow: 0 10px 30px rgba(0,0,0,0.5); min-width: 300px; }
        .play-btn { width: 50px; height: 50px; border-radius: 50%; background: var(--primary); border: none; color: white; font-size: 22px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: 0.3s; }
        .play-btn:hover { transform: scale(1.1); }
        .play-btn i.fa-pause { display: none; }
        .audio-player.playing .play-btn i.fa-play { display: none; }
        .audio-player.playing .play-btn i.fa-pause { display: inline; }

        .modal-info { padding:50px 40px; }
        .modal-info h2 { font-size:36px; margin-bottom:10px; }
        .modal-info .location { font-size:16px; color:var(--gray); margin-bottom:20px; display:flex; align-items:center; gap:8px; }
        .modal-info .rating { font-size:24px; color:var(--yellow); margin-bottom:25px; }
        .modal-info p { font-size:16.5px; line-height:1.9; color:#555; margin-bottom:30px; }
        .features h4 { font-size:19px; color:var(--secondary); margin-bottom:15px; }
        .features ul { list-style:none; }
        .features li { padding:10px 0; display:flex; align-items:center; gap:12px; font-size:15.5px; }
        .features i { color:var(--primary); font-size:18px; }
        .modal-actions { display:flex; gap:15px; margin-top:30px; flex-wrap:wrap; justify-content: center; }
        .btn { padding:14px 32px; border:none; border-radius:50px; font-size:16px; cursor:pointer; transition:0.3s; font-weight:600; }
        .btn-purple { background:var(--purple); color:white; }
        .btn-purple:hover { background:#5a3d7d; transform:translateY(-3px); }

        /* Modal - Request Form (New) */
        #requestModal { z-index: 99999; } /* Higher Z-index to show over DJ Modal */
        .request-content {
            background:white; border-radius:20px; max-width:650px; width:100%; padding: 40px;
            position:relative; animation:pop 0.5s;
        }
        .request-content h3 {
            font-family: "Playfair Display", serif;
            font-size: 32px;
            color: var(--primary);
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--text);
            margin-bottom: 6px;
        }
        .submit-btn {
            width: 100%;
            background: var(--primary);
            color: white;
            padding: 16px;
            margin-top: 15px;
            font-size: 18px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: 0.3s;
        }
        .submit-btn:hover { background: #c59489; transform: translateY(-2px); }


        @media (max-width:992px) {
            .filters-container { flex-direction:column; padding-top:40px; }
            .filters-sidebar { width:100%; position:static; }
            .modal-content { grid-template-columns:1fr; }
            .modal-img { height:300px; }
            .dj-list-item { flex-direction: column; align-items: stretch; }
            .dj-list-item .dj-img { width: 100%; }
        }
        @media (max-width:640px) {
            .hero-actions { flex-direction: column; align-items: center; }
            .btn-primary, .btn-ghost { width: 280px; }
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
            <li><a href="h1.html">Home</a></li>
            <li><a href="shope.html">Home</a></li>


            <!-- Services Mega Menu -->
            <li class="dropdown">
                <a href="ser.php" class="ser-btn">Services</a>
                <div class="mega-menu">
                    <div class="mega-container">
                        <div class="mega-left">
                            <h3>Book all the services for your wedding</h3>
                            <div class="mega-services-grid">
                                <a href="dj.html" class="mega-service-item">Music and DJs</a>
                                <a href="cake.php" class="mega-service-item">Cakes</a>
                                <a href="decor.php" class="mega-service-item">Decor & Styling</a>
                                <a href="stationery.html" class="mega-service-item">Stationery</a>
                            </div>
                        </div>
                        <div class="mega-right-image">
                            <img id="serviceSlide" src="img/ss6.jpg" alt="Services Default">
                        </div>
                    </div>
                </div>
            </li>

            <li><a href="honymoon.php">Honeymoon</a></li>
            <li><a href="cont.html">Contact us</a></li>
        </ul>
    </nav>
</header>

<section class="hero">
    <video autoplay muted loop playsinline>
        <source src="https://cdn.pixabay.com/video/2020/11/03/57357-474778952_large.mp4" type="video/mp4">
    </video>

    <div class="floating-shape h1"></div>
    <div class="floating-shape h2"></div>
    <div class="floating-shape h3"></div>

    <div class="hero-content">
        <div class="hero-kicker">Soundtracks for your "I do"</div>
        <h1>Curated wedding DJs for romantic, unforgettable nights.</h1>
        <p>From soft first-dance moments to packed dancefloors, we match you with DJs who read the room and keep it glowing.</p>
        <div class="hero-actions">
            <button class="btn-primary" onclick="document.querySelector('.filters-container').scrollIntoView({behavior:'smooth'})">
                Browse curated DJs
            </button>
            <button class="btn-ghost" onclick="document.querySelector('.filters-sidebar').scrollIntoView({behavior:'smooth'})">
                Filter by location & budget
            </button>
        </div>

    </div>
</section>

<div class="filters-container">
    <div class="filters-sidebar">
        <div class="filter-section">
            <div class="filter-header active" onclick="toggleSection(this)">
                <span>Location</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="filter-content active">
                <select id="locationFilter" onchange="applyFilters()">
                    <option value="">All Locations</option>
                    <option value="London">London</option>
                    <option value="Manchester">Manchester</option>
                    <option value="Birmingham">Birmingham</option>
                    <option value="Scotland">Scotland</option>
                    <option value="Derby">Midlands (Derby)</option>
                </select>
            </div>
        </div>

        <div class="filter-section">
            <div class="filter-header active" onclick="toggleSection(this)">
                <span>Special Offers</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="filter-content active">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                    <span>Has Deals</span>
                    <div class="toggle-switch" onclick="toggleSwitch(this,'deals')"></div>
                </div>
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <span>Award Winner</span>
                    <div class="toggle-switch" onclick="toggleSwitch(this,'award')"></div>
                </div>
            </div>
        </div>

        <div class="filter-section">
            <div class="filter-header active" onclick="toggleSection(this)">
                <span>Max Price</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="filter-content active">
                <div class="price-range">
                    <input type="range" min="0" max="3000" value="3000" oninput="updatePrice(this.value)">
                    <div style="display:flex; justify-content:space-between; font-size:14px; color:#666; margin-top:8px;">
                        <span>£0</span>
                        <span id="maxPrice">£3000+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="results">
        <div class="results-header">
            <div class="view-tabs">
                <div class="view-tab active" onclick="switchView('list')">List</div>
                <div class="view-tab" onclick="switchView('grid')">Grid</div>
            </div>
            <div class="results-count" id="resultsCount">15 Results Found</div>
        </div>

        <div class="djs-list active" id="listView"></div>
        <div class="djs-grid" id="gridView"></div>
    </div>
</div>

<div class="modal" id="djModal">
    <div class="modal-content">
        <div class="modal-close" onclick="closeModal('djModal')"><i class="fas fa-times"></i></div>
        <div class="modal-img">
            <img id="modalImg" src="" alt="">
            <div class="audio-player-overlay">
                <div class="audio-player" id="audioPlayer">
                    <button class="play-btn" id="playPauseBtn">
                        <i class="fas fa-play"></i>
                        <i class="fas fa-pause"></i>
                    </button>
                    <div class="track-info">
                        <span id="trackTitle">Demo Mix – Click Play</span>
                    </div>
                    <audio id="demoAudio" preload="none"></audio>
                </div>
            </div>
        </div>
        <div class="modal-info">
            <h2 id="modalName"></h2>
            <div class="location" id="modalLocation"></div>
            <div class="rating" id="modalRating"></div>
            <p id="modalDesc"></p>
            <div class="features">
                <h4>What makes them special:</h4>
                <ul id="modalFeatures"></ul>
            </div>
            <div class="modal-actions">
                <button class="btn btn-purple" onclick="openRequestModal()">Request Pricing</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="requestModal">
    <div class="request-content">
        <div class="modal-close" onclick="closeModal('requestModal')"><i class="fas fa-times"></i></div>
        <h3>Request Pricing for <span id="requestDjName" style="color:var(--secondary);"></span></h3>
        <form method="POST" action="save_dj_booking.php">
            <input type="hidden" name="dj_id" id="djId">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone">
            </div>
            <div class="form-group">
                <label for="weddingDate">Wedding Date</label>
                <input type="date" name="wedding_date" required>
            </div>
            <div class="form-group">
                <label for="details">Event Details & Requests</label>
                <textarea name="details"></textarea>
            </div>
            <button type="submit" class="submit-btn">Send Request</button>
        </form>
    </div>
</div>


<script>
    const djs = <?php echo json_encode($djs); ?>;


    const demoMixes = [
        "dj/dj1.mp3",
        "dj/dj2.mp3",
        "dj/dj3.mp3",
        "dj/dj4.mp3",
        "dj/dj1.mp3",
        "dj/dj2.mp3",
        "dj/dj3.mp3"

    ];

    let filters = { location: "", deals: false, award: false, maxPrice: 3000 };
    const audio = document.getElementById('demoAudio');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const trackTitle = document.getElementById('trackTitle');
    const audioPlayer = document.getElementById('audioPlayer');
    let currentDjIndex = -1;

    function createCardHtml(dj, i, isListItem) {
        const className = isListItem ? "dj-list-item" : "dj-card";

        const content = `
            <div class="dj-img">
                <img src="${dj.img}" alt="${dj.name}">
                <div class="dj-play"><i class="fas fa-play"></i></div>
            </div>
            <div class="dj-info">
                <div class="dj-name">${dj.name} ${dj.deal ? `<span class="deal">${dj.deal}</span>` : ''}</div>
                <div class="dj-rating">★★★★★ ${dj.rating} (${dj.reviews} reviews)</div>
                <div class="dj-location"><i class="fas fa-map-marker-alt"></i> ${dj.location}</div>
                <div class="dj-price">From £${dj.price}</div>
            </div>
        `;

        return `
        <div class="${className}" data-index="${i}" onclick="openModal(${i})" style="display:none;">
            ${content}
        </div>`;
    }

    function render(view = 'list') {
        const listView = document.getElementById('listView');
        const gridView = document.getElementById('gridView');

        // Render all items for both views using the helper function
        const listHtml = djs.map((d,i) => createCardHtml(d,i, true)).join('');
        const gridHtml = djs.map((d,i) => createCardHtml(d,i, false)).join('');

        listView.innerHTML = listHtml;
        gridView.innerHTML = gridHtml;


        // Set the active view
        if (view === 'list') {
            listView.classList.add('active'); gridView.classList.remove('active');
            document.querySelector('.view-tab[onclick="switchView(\'list\')"]').classList.add('active');
            document.querySelector('.view-tab[onclick="switchView(\'grid\')"]').classList.remove('active');
        } else {
            gridView.classList.add('active'); listView.classList.remove('active');
            document.querySelector('.view-tab[onclick="switchView(\'grid\')"]').classList.add('active');
            document.querySelector('.view-tab[onclick="switchView(\'list\')"]').classList.remove('active');
        }
        applyFilters();
    }

    function applyFilters() {
        filters.location = document.getElementById('locationFilter').value;
        const listItems = document.querySelectorAll('#listView .dj-list-item');
        const gridItems = document.querySelectorAll('#gridView .dj-card');
        const allItems = [...listItems, ...gridItems]; // Combine both sets for filtering

        let visibleIndices = new Set();
        let visibleCount = 0;

        allItems.forEach(item => {
            const djIndex = parseInt(item.dataset.index);
            const dj = djs[djIndex];

            // Filters logic
            const matchLocation = !filters.location || dj.location === filters.location;
            const matchDeals = !filters.deals || dj.deal;
            const matchAward = !filters.award || dj.award;
            const matchPrice = dj.price <= filters.maxPrice;

            if (matchLocation && matchDeals && matchAward && matchPrice) {
                // Determine if the item belongs to the active view container
                const isListItem = item.classList.contains('dj-list-item');
                const isListViewActive = document.getElementById('listView').classList.contains('active');
                const isGridviewActive = document.getElementById('gridView').classList.contains('active');

                // Only show the item if it belongs to the active view (list or grid)
                if ((isListItem && isListViewActive) || (!isListItem && isGridviewActive)) {
                    item.style.display = isListItem ? 'flex' : 'block';
                    // We only count the items shown in the *active* view for the result count
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            } else {
                item.style.display = 'none';
            }
        });

        document.getElementById('resultsCount').innerHTML = `<span>${visibleCount}</span> ${visibleCount === 1 ? 'Result' : 'Results'} Found`;
    }

    function toggleSection(el) {
        el.classList.toggle('active');
        const content = el.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
            content.classList.remove('active');
        } else {
            content.style.display = "block";
            content.classList.add('active');
        }
    }

    function toggleSwitch(el, filterKey) {
        el.classList.toggle('active');
        filters[filterKey] = el.classList.contains('active');
        applyFilters();
    }

    function updatePrice(value) {
        document.getElementById('maxPrice').textContent = `£${value}+`;
        filters.maxPrice = parseInt(value);
        applyFilters();
    }

    function switchView(view) {
        document.querySelectorAll('.view-tab').forEach(tab => tab.classList.remove('active'));
        document.querySelector(`.view-tab[onclick="switchView('${view}')"]`).classList.add('active');

        const listView = document.getElementById('listView');
        const gridView = document.getElementById('gridView');

        if (view === 'list') {
            listView.classList.add('active');
            gridView.classList.remove('active');
        } else {
            gridView.classList.add('active');
            listView.classList.remove('active');
        }
        applyFilters(); // Re-apply filters to show only the items matching the current view
    }

    function openModal(index) {
        const dj = djs[index];
        currentDjIndex = index;

        document.getElementById('modalName').textContent = dj.name;
        document.getElementById('modalLocation').innerHTML = `<i class="fas fa-map-marker-alt"></i> ${dj.location}`;
        document.getElementById('modalRating').innerHTML = `★★★★★ ${dj.rating} (${dj.reviews} reviews)`;
        document.getElementById('modalDesc').textContent = dj.desc;
        document.getElementById('modalImg').src = dj.img;

        const featuresList = document.getElementById('modalFeatures');
        featuresList.innerHTML = dj.features.map(f => `<li><i class="fas fa-check-circle"></i> ${f}</li>`).join('');

        // Audio Player Setup
        audio.src = demoMixes[index] || '';
        document.getElementById('trackTitle').textContent = dj.name + ' - Demo Mix';

        // Reset player state
        if (!audio.paused || audioPlayer.classList.contains('playing')) {
            audio.pause();
            audioPlayer.classList.remove('playing');
        }

        document.getElementById('djModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(id) {
        if (id === 'djModal' && !audio.paused) {
            audio.pause();
            audioPlayer.classList.remove('playing');
        }
        document.getElementById(id).classList.remove('active');
        document.body.style.overflow = '';
    }

    function openRequestModal() {
        if (currentDjIndex === -1) return;

        const dj = djs[currentDjIndex];

        // اسم الـ DJ في العنوان
        document.getElementById('requestDjName').textContent = dj.name;

        // ⭐ هذا السطر هو الحل ⭐
        document.getElementById('djId').value = currentDjIndex + 1;

        closeModal('djModal');
        document.getElementById('requestModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }


    function handleRequest(event) {
        event.preventDefault();
        const djName = document.getElementById('requestDjName').textContent;
        const name = document.getElementById('fullName').value;
        const date = document.getElementById('weddingDate').value;

        alert(`Request sent successfully for ${djName} on ${date}! We will contact you soon, ${name}.`);

        closeModal('requestModal');
        // Optionally reset form fields
        event.target.reset();
    }

    playPauseBtn.addEventListener('click', () => {
        if (audio.paused) {
            audio.play();
            audioPlayer.classList.add('playing');
        } else {
            audio.pause();
            audioPlayer.classList.remove('playing');
        }
    });

    // Initial render when the page loads
    document.addEventListener('DOMContentLoaded', () => {
        render('list');
    });
    // دالة الفلتر (لو موجودة في صفحة الشوب)
    window.applyFilter = function(category, imageSrc) {
        const heroImg = document.querySelector('.image-section img');
        if (heroImg) {
            heroImg.style.opacity = '0';
            setTimeout(() => {
                heroImg.src = imageSrc;
                heroImg.style.opacity = '1';
            }, 350);
        }
        const select = document.getElementById('filter');
        if (select) { select.value = category; filterProducts?.(); }
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    const serviceImages = ["img/ss2.jpg","img/m2.jpg","img/ss4.jpg","img/ss5.jpg"];
    let j = 0;
    setInterval(() => {
        j = (j + 1) % serviceImages.length;
        document.getElementById("serviceSlide").src = serviceImages[j];
    }, 2000);

</script>
</body>
</html>