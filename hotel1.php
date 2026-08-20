<?php
require_once "dbconnect.php";

if (!isset($_GET['id'])) {
    die("No hotel selected");
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM hotels WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$hotel = mysqli_fetch_assoc($result);

$reviews = [];

$sql_reviews = "SELECT * FROM reviews WHERE hotel_id = ? ORDER BY created_at DESC";
$stmt_reviews = mysqli_prepare($conn, $sql_reviews);
mysqli_stmt_bind_param($stmt_reviews, "i", $hotel['id']);
mysqli_stmt_execute($stmt_reviews);
$result_reviews = mysqli_stmt_get_result($stmt_reviews);

while ($row = mysqli_fetch_assoc($result_reviews)) {
    $reviews[] = $row;
}


$images = [];

switch ($hotel['name']) {

    case 'Bürgenstock':
        $images = [
                "img/Bürgenstock spa Switzerlandh2.jpg",
                "img/Bürgenstock luxury suite roomho1.jpg"
        ];
        break;

    case 'Grand Hotel Kronenhof':
        $images = [
                "img/Grand Hotel Kronenhof.jpg",
                "img/Grand Hotel Kronenhof suite room2.jpg"
        ];
        break;

    case 'Villa Honegg':
        $images = [
                "img/Hotel Villa Honegg terrace Switzerland.jpg",
                "img/Villa Honegg room balcony mountain view3.jpg"
        ];
        break;

    case 'The Alpina Gstaad':
        $images = [
                "img/Alpina Gstaad suite interior Switzerland1.jpg",
                "img/Alpina Gstaad suite interior Switzerland22.jpg"
        ];
        break;

    default:
        $images = [
                "img/" . $hotel['image']
        ];
}


if (!$hotel) {
    die("Hotel not found");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swiss Luxury Hotel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-top: #f8ede6;
            --bg-bottom: #f6dac8;
            --card-bg: #ffffff;
            --accent: #c27845;
            --accent-soft: #a5663a;
            --text-main: #3a2920;
            --text-soft: #6f5a4b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(180deg, var(--bg-top), var(--bg-bottom));
            color: var(--text-main);
        }

        .page-wrapper {
            max-width: 1200px;
            margin: 40px auto 80px;
            padding: 0 24px;
        }

        /* BACK LINK */
        .back-link {
            display: inline-block;
            margin-bottom: 14px;
            font-size: 14px;
            font-weight: 500;
            color: var(--accent-soft);
            text-decoration: none;
            transition: .25s ease;
        }
        .back-link:hover {
            color: var(--accent);
            transform: translateX(-4px);
            text-decoration: underline;
        }

        /* HERO CARD – نفس روح كروت سويسرا لكن أكبر */
        .hero-card {
            position: relative;
            height: 430px;
            border-radius: 32px;
            overflow: hidden;
            background: #ddd;
            box-shadow: 0 26px 80px rgba(0,0,0,0.28);
            margin-bottom: 46px;
            transition: .5s ease;
        }
        .hero-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 40px 110px rgba(0,0,0,0.3);
        }

        .hero-slider {
            position: absolute;
            inset: 0;
        }
        .hero-slider img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transform: scale(1.05);
            transition: opacity 1.1s ease, transform 7s ease;
        }
        .hero-slider img.active {
            opacity: 1;
            transform: scale(1.12);
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 20%, rgba(0,0,0,0.45), transparent 55%),
            linear-gradient(0deg, rgba(0,0,0,0.62), transparent 40%);
        }

        .hero-content {
            position: absolute;
            left: 32px;
            bottom: 28px;
            max-width: 470px;
            color: #fff;
            text-align: left;
        }

        .hero-tag {
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            opacity: .9;
            margin-bottom: 4px;
        }

        .hero-name {
            font-family: "Playfair Display", serif;
            font-size: 34px;
            font-weight: 600;
            margin: 0 0 6px;
            text-shadow: 0 3px 12px rgba(0,0,0,0.8);
        }

        .hero-location {
            font-size: 14px;
            opacity: 0.95;
            margin-bottom: 6px;
        }

        .hero-stars-line {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            margin-bottom: 8px;
        }
        .hero-stars {
            color: #ffd66b;
        }
        .hero-dot {
            font-size: 18px;
            opacity: .8;
        }
        .hero-price {
            font-weight: 500;
        }

        .hero-short {
            font-size: 14px;
            line-height: 1.6;
            opacity: 0.96;
            margin: 8px 0 16px;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn-solid,
        .btn-ghost {
            display: inline-block;
            padding: 9px 24px;
            border-radius: 24px;
            font-size: 14px;
            font-weight: 500;
            border: 2px solid rgba(255,255,255,0.9);
            text-decoration: none;
            cursor: pointer;
            transition: .25s ease;
            backdrop-filter: blur(8px);
        }

        .btn-solid {
            background: #fff;
            color: #5b4234;
        }
        .btn-solid:hover {
            background: #ffe5d2;
        }

        .btn-ghost {
            background: rgba(255,255,255,0.16);
            color: #fff;
        }
        .btn-ghost:hover {
            background: rgba(255,255,255,0.3);
        }

        /* CONTENT GRID مثل كروت سويسرا */
        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 2fr) minmax(0, 1.25fr);
            gap: 32px;
            margin-bottom: 40px;
        }
        @media (max-width: 900px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        .card {
            background: var(--card-bg);
            border-radius: 26px;
            padding: 22px 24px;
            box-shadow: 0 18px 50px rgba(0,0,0,0.18);
        }

        .section-title {
            font-family: "Playfair Display", serif;
            font-size: 22px;
            margin: 0 0 10px;
            color: var(--text-main);
        }

        .hotel-description {
            font-size: 15px;
            line-height: 1.9;
            color: var(--text-soft);
            margin: 0 0 12px;
        }

        .highlights-list {
            margin: 6px 0 0;
            padding-left: 18px;
        }
        .highlights-list li {
            font-size: 14px;
            color: var(--text-soft);
            margin-bottom: 6px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            font-size: 14px;
            color: var(--text-soft);
            border-bottom: 1px solid #f0dfd1;
        }
        .info-row:last-child {
            border-bottom: none;
        }

        /* REVIEWS GRID */
        .reviews-section {
            margin-bottom: 40px;
        }
        .reviews-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 18px;
        }

        .review-card {
            background: #fff;
            border-radius: 22px;
            padding: 14px 16px;
            box-shadow: 0 14px 38px rgba(0,0,0,0.16);
            transition: .25s ease;
        }
        .review-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 55px rgba(0,0,0,0.2);
        }

        .review-name {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 2px;
        }
        .review-stars {
            font-size: 14px;
            color: #ffd76b;
            margin-bottom: 4px;
        }
        .review-text {
            font-size: 13px;
            color: var(--text-soft);
            line-height: 1.6;
        }

        /* BOOKING CARD */
        .booking-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 16px;
        }

        .booking-field label {
            display: block;
            font-size: 13px;
            margin-bottom: 3px;
            color: var(--text-soft);
        }
        .booking-field input,
        .booking-field textarea {
            width: 100%;
            font-family: inherit;
            font-size: 13px;
            padding: 9px 11px;
            border-radius: 12px;
            border: 1px solid #dfcbb9;
            outline: none;
            transition: .25s ease;
        }
        .booking-field textarea {
            resize: vertical;
        }
        .booking-field input:focus,
        .booking-field textarea:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 1px rgba(194,120,69,.35);
        }

        .booking-btn {
            display: inline-block;
            border: none;
            padding: 11px 26px;
            border-radius: 26px;
            background: linear-gradient(45deg, #c27845, #d69058);
            color: #fff;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 16px 46px rgba(0,0,0,0.22);
            transition: .25s ease;
        }
        .booking-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.26);
        }

        .note-text {
            font-size: 12px;
            color: var(--text-soft);
            margin-top: 6px;
        }

        @media (max-width: 640px) {
            .hero-content {
                left: 20px;
                right: 20px;
            }
            .hero-name {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

<div class="page-wrapper">

    <!-- رجوع إلى صفحة سويسرا -->
    <a href="switzerland.php" class="back-link">← Back to Switzerland Hotels</a>

    <!-- HERO CARD (نفس فخامة كروت سويسرا) -->
    <div class="hero-card">
        <div class="hero-slider" id="heroSlider"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <div class="hero-tag">Switzerland • Honeymoon Hotel</div>
            <h1 class="hero-name" id="heroName">Hotel Name</h1>
            <div class="hero-location" id="heroLocation">Location</div>

            <div class="hero-stars-line">
                <span class="hero-stars" id="heroStars">⭐⭐⭐⭐⭐</span>
                <span class="hero-dot">•</span>
                <span class="hero-price" id="heroPrice">From $000/night</span>
            </div>

            <p class="hero-short" id="heroShort">
                Short romantic description goes here…
            </p>

            <div class="hero-buttons">
                <a href="#bookingSection" class="btn-solid">Book Now</a>
                <a href="#detailsSection" class="btn-ghost">View Details</a>
            </div>
        </div>
    </div>

    <!-- GRID: وصف + معلومات سريعة -->
    <div class="content-grid" id="detailsSection">
        <div class="card">
            <h3 class="section-title">About this hotel</h3>
            <p class="hotel-description" id="hotelDescription"></p>

            <h3 class="section-title" style="margin-top: 18px;">Highlights</h3>
            <ul class="highlights-list" id="highlightsList"></ul>
        </div>

        <div class="card">
            <h3 class="section-title">Stay information</h3>
            <div class="info-row">
                <span>Check-in</span><span>After 3:00 PM</span>
            </div>
            <div class="info-row">
                <span>Check-out</span><span>Before 11:00 AM</span>
            </div>
            <div class="info-row">
                <span>Best view</span><span id="hotelView">View</span>
            </div>
            <div class="info-row">
                <span>Perfect for</span><span>Honeymoon & couples</span>
            </div>
        </div>
    </div>

    <div class="reviews-section">
        <h3 class="section-title">Guest reviews</h3>

        <div class="reviews-list">
            <?php if (count($reviews) === 0): ?>
                <p>No reviews yet.</p>
            <?php else: ?>
                <?php foreach ($reviews as $r): ?>
                    <div class="review-card">
                        <div class="review-name">
                            <?php echo htmlspecialchars($r['guest_name']); ?>
                        </div>

                        <div class="review-stars">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                echo $i <= $r['rating'] ? '⭐' : '☆';
                            }
                            ?>
                        </div>

                        <div class="review-text">
                            <?php echo htmlspecialchars($r['review_text']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>


    <!-- BOOKING -->
    <div class="card" id="bookingSection">
        <h3 class="section-title">Reserve your stay</h3>

        <form id="bookingForm" method="POST" action="save_booking.php">
            <input type="hidden" name="hotel_id" value="<?php echo $hotel['id']; ?>">
            <div class="booking-grid">
                <div class="booking-field">
                    <label for="guestName">Full name</label>
                    <input type="text" id="guestName" name="full_name" required>
                </div>
                <div class="booking-field">
                    <label for="guestEmail">Email</label>
                    <input type="email" id="guestEmail" name="email" required>
                </div>
                <div class="booking-field">
                    <label for="checkin">Check-in</label>
                    <input type="date" id="checkin" name="check_in" required>
                </div>
                <div class="booking-field">
                    <label for="checkout">Check-out</label>
                    <input type="date" id="checkout" name="check_out" required>
                </div>
                <div class="booking-field">
                    <label for="guests">Guests</label>
                    <input type="number" id="guests" name="guests" value="2" min="1" required>
                </div>
            </div>

            <div class="booking-field">
                <label for="notes">Special requests</label>
                <textarea id="notes" name="special_requests"></textarea>
            </div>

            <button type="submit" class="booking-btn">Confirm booking request</button>
            <div class="note-text">
                We’ll email you shortly to finalise your honeymoon reservation.
            </div>
        </form>
    </div>
</div>

<script>
    /* بيانات الفنادق – تربطي من سويسرا عبر ?hotel=burgenstock مثلاً */
    const h = {
        name: "<?php echo addslashes($hotel['name']); ?>",
        location: "Switzerland",
        stars: "⭐⭐⭐⭐⭐",
        price: "From $<?php echo $hotel['price']; ?>/night",
        view: "Lake & mountain view",
        short: "<?php echo addslashes($hotel['description']); ?>",
        description: "<?php echo addslashes($hotel['description']); ?>",
        images: <?php echo json_encode($images); ?>,

        highlights: [
            "Luxury honeymoon experience",
            "Romantic alpine views",
            "Perfect for couples"
        ],

    };



    // تعبئة النصوص
    document.getElementById("heroName").textContent = h.name;
    document.getElementById("heroLocation").textContent = h.location;
    document.getElementById("heroStars").textContent = h.stars;
    document.getElementById("heroPrice").textContent = h.price;
    document.getElementById("heroShort").textContent = h.short;

    document.getElementById("hotelDescription").textContent = h.description;
    document.getElementById("hotelView").textContent = h.view;

    // highlights
    const highlightsList = document.getElementById("highlightsList");
    h.highlights.forEach(item => {
        const li = document.createElement("li");
        li.textContent = item;
        highlightsList.appendChild(li);
    });



    // slider
    const heroSlider = document.getElementById("heroSlider");
    h.images.forEach((src, index) => {
        const img = document.createElement("img");
        img.src = src;
        if (index === 0) img.classList.add("active");
        heroSlider.appendChild(img);
    });

    const heroSlides = heroSlider.querySelectorAll("img");
    let currentSlide = 0;
    setInterval(() => {
        heroSlides[currentSlide].classList.remove("active");
        currentSlide = (currentSlide + 1) % heroSlides.length;
        heroSlides[currentSlide].classList.add("active");
    }, 4500);


</script>

</body>
</html>
