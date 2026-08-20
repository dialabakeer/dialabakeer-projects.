<?php if (isset($_GET['booked'])): ?>
    <div style="background:#dff0d8;padding:12px;border-radius:8px;margin-bottom:15px;">
        ✔ Booking saved successfully 🤍
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maldives Luxury Resort</title>

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

        * { box-sizing: border-box; }

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

        /* BACK */
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

        /* HERO CARD */
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

        .hero-slider { position: absolute; inset: 0; }
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

        /* GRID */
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

        /* REVIEWS */
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

        /* BOOKING */
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
    </style>
</head>

<body>

<div class="page-wrapper">

    <a href="maldives.php" class="back-link">← Back to Maldives Resorts</a>

    <div class="hero-card">
        <div class="hero-slider" id="heroSlider"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <div class="hero-tag">Maldives • Luxury Resort</div>
            <h1 class="hero-name" id="heroName"></h1>
            <div class="hero-location" id="heroLocation"></div>

            <div class="hero-stars-line">
                <span class="hero-stars" id="heroStars"></span>
                <span class="hero-dot">•</span>
                <span class="hero-price" id="heroPrice"></span>
            </div>

            <p class="hero-short" id="heroShort"></p>

            <div class="hero-buttons">
                <a href="#bookingSection" class="btn-solid">Book Now</a>
                <a href="#detailsSection" class="btn-ghost">View Details</a>
            </div>
        </div>
    </div>

    <div class="content-grid" id="detailsSection">
        <div class="card">
            <h3 class="section-title">About this resort</h3>
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
                <span>Best view</span><span id="hotelView"></span>
            </div>
            <div class="info-row">
                <span>Perfect for</span><span>Honeymoon & couples</span>
            </div>
        </div>
    </div>

    <div class="reviews-section">
        <h3 class="section-title">Guest reviews</h3>
        <div class="reviews-list" id="reviewsContainer"></div>
    </div>

    <div class="card" id="bookingSection">
        <h3 class="section-title">Reserve your stay</h3>

        <form method="POST" action="save_booking_maldives.php">
            <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">

            <div class="booking-grid">
                <div class="booking-field">
                    <label>Full name</label>
                    <input type="text" name="full_name" required>
                </div>
                <div class="booking-field">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="booking-field">
                    <label>Check-in</label>
                    <input type="date" name="check_in" required>
                </div>
                <div class="booking-field">
                    <label>Check-out</label>
                    <input type="date" name="check_out" required>
                </div>
                <div class="booking-field">
                    <label>Guests</label>
                    <input type="number" name="guests" min="1" value="2" required>
                </div>
            </div>

            <div class="booking-field">
                <label>Special requests</label>
                <textarea name="special_requests" rows="4"></textarea>
            </div>

            <button type="submit" class="booking-btn">
                Confirm booking request
            </button>
            <div class="note-text">We will contact you shortly to confirm your Maldives booking 🤍</div>
        </form>
    </div>
</div>

<script>
    const hotels = {
        oceanvella: {
            name: "Ocean Vella Retreat",
            location: "South Atoll, Maldives",
            stars: "⭐⭐⭐⭐⭐",
            price: "From $900/night",
            view: "Turquoise lagoon & sunset",
            short:
                "Overwater villas with infinity pools and crystal-clear turquoise lagoons.",
            images: [
                "img/Luxury overwater villa Maldives lagoon.jpg",
                "img/Luxury overwater villa Maldives lagoon22.jpg"
            ],
            description:
                "Ocean Vella Retreat is a dream overwater resort offering floating villas, glass floors, and unmatched sunset views. Perfect for couples seeking privacy and pure ocean luxury.",
            highlights: [
                "Private infinity pool over the sea",
                "Floating breakfast experience",
                "Glass-floor villa sections",
                "Unreal sunset panoramas"
            ],
            reviews: [
                {
                    name: "Sara M.",
                    stars: "⭐⭐⭐⭐⭐",
                    text: "The water villa was just unbelievable. Best honeymoon ever!"
                },
                {
                    name: "Rami N.",
                    stars: "⭐⭐⭐⭐⭐",
                    text: "The infinity pool over the ocean feels like magic."
                }
            ]
        },

        sunsetpearls: {
            name: "Sunset Pearls Maldives",
            location: "North Atoll, Maldives",
            stars: "⭐⭐⭐⭐⭐",
            price: "From $850/night",
            view: "Sunset horizon & private lagoon",
            short:
                "Romantic floating villas with dreamy sunset views.",
            images: [
                "img/Maldives sunset overwater villa1.jpg",
                "img/Maldives sunset overwater villa2.jpg"
            ],
            description:
                "Sunset Pearls Maldives is a paradise for couples who want golden sunsets every evening. Villas feature private decks, ocean hammocks, and luxury interiors.",
            highlights: [
                "Ocean hammocks & floating nets",
                "Golden sunset views every day",
                "Private villa deck & steps into the sea",
                "World-class dining overwater"
            ],
            reviews: [
                {
                    name: "Nour A.",
                    stars: "⭐⭐⭐⭐⭐",
                    text: "The sunsets here changed my life. So romantic!"
                },
                {
                    name: "James P.",
                    stars: "⭐⭐⭐⭐⭐",
                    text: "The villas are huge and the ocean is literally at your feet."
                }
            ]
        },

        coralisland: {
            name: "Coral Island Escape",
            location: "Private Coral Reef Island, Maldives",
            stars: "⭐⭐⭐⭐⭐",
            price: "From $780/night",
            view: "White sand beach & palm trees",
            short:
                "Peaceful beachfront villas surrounded by white sands & palm trees.",
            images: [
                "img/Maldives beachfront villa white sand1.jpg",
                "img/Maldives beachfront villa white sand2.jpg"
            ],
            description:
                "Coral Island Escape is ideal for couples wanting a calm beach retreat. Powdery white sands, crystal-clear water, and tropical palm forests make every moment magical.",
            highlights: [
                "Beachfront private villas",
                "Crystal-clear lagoon",
                "Honeymoon romantic dinners",
                "Perfect privacy & quiet"
            ],
            reviews: [
                {
                    name: "Yara T.",
                    stars: "⭐⭐⭐⭐⭐",
                    text: "The beach villa was heaven. Calm, clean, and perfect."
                },
                {
                    name: "Ali F.",
                    stars: "⭐⭐⭐⭐⭐",
                    text: "Amazing privacy and the water is just unreal."
                }
            ]
        }
    };

    // GET KEY
    const params = new URLSearchParams(window.location.search);
    let key = (params.get("hotel") || "oceanvella").toLowerCase();
    if (!hotels[key]) key = "oceanvella";

    const h = hotels[key];

    // APPLY DATA
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

    // reviews
    const reviewsContainer = document.getElementById("reviewsContainer");
    h.reviews.forEach(r => {
        const div = document.createElement("div");
        div.className = "review-card";
        div.innerHTML = `
        <div class="review-name">${r.name}</div>
        <div class="review-stars">${r.stars}</div>
        <div class="review-text">${r.text}</div>
    `;
        reviewsContainer.appendChild(div);
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

    // booking
    document.getElementById("bookingForm").addEventListener("submit", function (e) {
        e.preventDefault();
        alert("Your booking request for " + h.name + " has been sent 🤍");
        this.reset();
    });
</script>

</body>
</html>
