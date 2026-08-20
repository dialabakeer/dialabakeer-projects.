<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart - Where Love Shines Bright</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <style>
        :root {
            --primary: #DFA799;
            --secondary: #d78a4e;
            --text: #443b36;
            --light: #fffaf7;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: radial-gradient(circle at top left,#fffdf9,#f7ece4);
            color: var(--text);
            overflow-x: hidden;
        }

        /* ================= NEW ELEGANT HEADER ================= */
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

        /* ================= FULL WIDTH MEGA MENU ================= */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .mega-menu {
            position: fixed;
            top:142px;
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

        .mega-menu.force-hide {
            opacity: 0 !important;
            visibility: hidden !important;
            transform: translateY(20px) !important;
            pointer-events: none !important;
        }

        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
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

        @keyframes floatImg {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-18px); }
        }

        .mobile-btn {
            display: none;
            font-size: 1.9rem;
            cursor: pointer;
            color: var(--primary);
            user-select: none;
        }
        .mobile-btn i {
            pointer-events: none;
        }

        .mobile-nav {
            display: none;
            background: white;
            padding: 0;
            border-top: 1px solid #f2dfd2;
            text-align: center;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out, padding 0.4s ease-out;
        }
        .mobile-nav.show {
            display: block;
            max-height: 400px;
            padding: 20px 0;
        }
        .mobile-nav a {
            display: block;
            padding: 16px;
            color: #444;
            font-size: 1.15rem;
            text-decoration: none;
        }
        .mobile-nav a:hover {
            background: #fdf3ec;
            color: var(--primary);
        }

        /* ========== CAROUSEL SECTION ========== */
        #hero-carousel {
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

        .carousel-item {
            width: 100%;
            height: 100%;
            position: absolute;
            inset: 0;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .carousel-content {
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

        .carousel-title {
            font-family: 'Great Vibes', cursive;
            font-size: 5em;
            font-weight: bold;
            line-height: 1.3em;
        }

        .carousel-topic {
            font-family: 'Montserrat', sans-serif;
            font-size: 3em;
            font-weight: bold;
            line-height: 1.3em;
            color: var(--primary);
        }

        .carousel-description {
            margin-top: 20px;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        #carousel-thumbs {
            position: absolute;
            bottom: 50px;
            left: 50%;
            width: max-content;
            z-index: 100;
            display: flex;
            gap: 20px;
        }

        .carousel-thumb {
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

        .carousel-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .carousel-thumb .thumb-content {
            color: #fff;
            position: absolute;
            bottom: 10px;
            left: 10px;
            right: 10px;
        }

        .carousel-thumb .thumb-title {
            font-weight: 500;
            font-size: 0.9rem;
        }

        .carousel-thumb .thumb-description {
            font-weight: 300;
            font-size: 0.75rem;
        }

        .carousel-arrows {
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

        .carousel-arrows button {
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

        .carousel-arrows button:hover {
            background-color: #fff;
            color: #000;
        }

        /* Carousel Animations */
        .carousel-list .carousel-item:nth-child(1) {
            z-index: 1;
        }

        .carousel-list .carousel-item:nth-child(1) .carousel-content .carousel-title,
        .carousel-list .carousel-item:nth-child(1) .carousel-content .carousel-topic,
        .carousel-list .carousel-item:nth-child(1) .carousel-content .carousel-description {
            transform: translateY(50px);
            filter: blur(20px);
            opacity: 0;
            animation: showContent .5s 1s linear 1 forwards;
        }

        @keyframes showContent {
            to {
                transform: translateY(0px);
                filter: blur(0px);
                opacity: 1;
            }
        }

        .carousel-list .carousel-item:nth-child(1) .carousel-content .carousel-topic {
            animation-delay: 1.4s!important;
        }

        .carousel-list .carousel-item:nth-child(1) .carousel-content .carousel-description {
            animation-delay: 1.6s!important;
        }

        #hero-carousel.next .carousel-list .carousel-item:nth-child(1) img {
            width: 150px;
            height: 220px;
            position: absolute;
            bottom: 50px;
            left: 50%;
            border-radius: 30px;
            animation: showImage .5s linear 1 forwards;
        }

        @keyframes showImage {
            to {
                bottom: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border-radius: 0;
            }
        }

        #hero-carousel.next #carousel-thumbs .carousel-thumb:nth-last-child(1) {
            overflow: hidden;
            animation: showThumbnail .5s linear 1 forwards;
        }

        #hero-carousel.prev .carousel-list .carousel-item img {
            z-index: 100;
        }

        @keyframes showThumbnail {
            from {
                width: 0;
                opacity: 0;
            }
        }

        #hero-carousel.next #carousel-thumbs {
            animation: effectNext .5s linear 1 forwards;
        }

        @keyframes effectNext {
            from {
                transform: translateX(150px);
            }
        }

        .carousel-time {
            position: fixed;
            z-index: 1000;
            width: 0%;
            height: 3px;
            background-color: var(--primary);
            left: 0;
            top: 47px;
        }

        #hero-carousel.next .carousel-time,
        #hero-carousel.prev .carousel-time {
            animation: runningTime 3s linear 1 forwards;
        }

        @keyframes runningTime {
            from { width: 100% }
            to { width: 0 }
        }

        #hero-carousel.prev .carousel-list .carousel-item:nth-child(2) {
            z-index: 2;
        }

        #hero-carousel.prev .carousel-list .carousel-item:nth-child(2) img {
            animation: outFrame 0.5s linear 1 forwards;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        @keyframes outFrame {
            to {
                width: 150px;
                height: 220px;
                bottom: 50px;
                left: 50%;
                border-radius: 20px;
            }
        }

        #hero-carousel.prev #carousel-thumbs .carousel-thumb:nth-child(1) {
            overflow: hidden;
            opacity: 0;
            animation: showThumbnail .5s linear 1 forwards;
        }

        #hero-carousel.next .carousel-arrows button,
        #hero-carousel.prev .carousel-arrows button {
            pointer-events: none;
        }

        #hero-carousel.prev .carousel-list .carousel-item:nth-child(2) .carousel-content .carousel-title,
        #hero-carousel.prev .carousel-list .carousel-item:nth-child(2) .carousel-content .carousel-topic,
        #hero-carousel.prev .carousel-list .carousel-item:nth-child(2) .carousel-content .carousel-description {
            animation: contentOut 1.5s linear 1 forwards!important;
        }

        @keyframes contentOut {
            to {
                transform: translateY(-150px);
                filter: blur(20px);
                opacity: 0;
            }
        }

        /* ---------------- CART CONTAINER ---------------- */
        .cart-container {
            max-width: 1200px;
            margin: 40px auto 60px;
            padding: 30px 20px 36px;
        }

        .cart-title {
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
            color: #d78a4e;
            letter-spacing: 1px;
        }

        /* ================= PRODUCT CARDS ================= */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .product-card {
            position: relative;
            padding: 1.5rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
            cursor: pointer;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(223,167,153,0.25);
        }

        .product-card-image {
            height: 280px;
            width: 100%;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }

        .product-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-card-image img {
            transform: scale(1.1) rotate(2deg);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #DFA799, #d78a4e);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-info {
            text-align: center;
            padding: 0 10px;
        }

        .product-info h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
        }

        .product-info p {
            font-size: 13px;
            color: #777;
            margin-bottom: 12px;
        }

        .product-price {
            font-size: 24px;
            font-weight: 700;
            color: #d78a4e;
            margin: 15px 0;
        }

        .product-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f5f5f5;
            padding: 8px 15px;
            border-radius: 25px;
        }

        .quantity-selector button {
            background: white;
            border: none;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .quantity-selector button:hover {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
        }

        .quantity-selector span {
            font-weight: 600;
            min-width: 25px;
            text-align: center;
            font-size: 15px;
        }

        .add-to-cart-btn {
            flex: 1;
            background: linear-gradient(135deg, #DFA799, #d78a4e);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(223,167,153,0.3);
        }

        .add-to-cart-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(223,167,153,0.5);
        }

        .favorite-btn-card {
            background: white;
            border: 2px solid #DFA799;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .favorite-btn-card:hover {
            background: #DFA799;
            transform: scale(1.1) rotate(10deg);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
        }

        th {
            background-color: #fdf4ef;
            color: #d78a4e;
            font-weight: 600;
            padding: 12px 8px;
            border-radius: 10px;
            font-size: 14px;
        }

        td {
            background-color: #fff;
            border-radius: 12px;
            vertical-align: middle;
            padding: 15px;
            font-size: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            transition: 0.25s;
        }

        tr:hover td {
            transform: translateY(-2px);
        }

        td:nth-child(2) {
            padding-left: 20px;
            text-align: left;
        }

        .product-img {
            width: 120px;
            height: 120px;
            margin: 0 auto;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
            cursor: pointer;
        }

        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-img img:hover {
            transform: scale(1.05);
        }

        .quantity-control {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .quantity-control button {
            background: #eee;
            border: none;
            width: 30px;
            height: 30px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 50%;
            transition: 0.2s;
        }

        .quantity-control button:hover {
            background: var(--primary);
            color: #fff;
            transform: scale(1.1);
        }

        .quantity-control span {
            min-width: 30px;
            display: inline-block;
            font-weight: 600;
            text-align: center;
        }

        .cart-summary {
            text-align: center;
            margin-top: 26px;
        }

        .checkout-btn {
            background: linear-gradient(135deg, #DFA799, #d78a4e);
            color: white;
            border: none;
            padding: 12px 26px;
            border-radius: 999px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            transition: 0.25s;
        }

        .checkout-btn:hover {
            background: #d78a4e;
            transform: translateY(-1px);
        }

        /* ---------------- FLOATING CART ---------------- */
        .floating-cart {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #DFA799, #d78a4e);
            color: white;
            padding: 12px 16px;
            border-radius: 50px;
            font-size: 18px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 8px 20px rgba(0,0,0,0.25);
            display: flex;
            align-items: center;
            gap: 6px;
            animation: floatBadge 3s ease-in-out infinite;
        }

        @keyframes floatBadge {
            0% { transform: translateY(0); }
            50%{ transform: translateY(-6px); }
            100%{transform: translateY(0); }
        }

        .floating-cart span {
            background: white;
            color: #DFA799;
            font-weight: bold;
            border-radius: 50%;
            padding: 2px 8px;
            margin-right: 2px;
        }

        /* ---------------- SIDE CART ---------------- */
        .cart-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1100;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .cart-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .cart-details {
            position: fixed;
            top: 0;
            right: -420px;
            width: 380px;
            height: 100%;
            background: white;
            box-shadow: -10px 0 30px rgba(0,0,0,0.2);
            transition: right 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            z-index: 1101;
            display: flex;
            flex-direction: column;
        }

        .cart-details.open {
            right: 0;
        }

        .cart-header {
            padding: 22px 24px;
            background: linear-gradient(135deg, #DFA799, #d78a4e);
            color: white;
            font-size: 20px;
            position: relative;
            border-bottom: none;
            text-align: center;
        }

        #cart-items {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background: #fdf9f6;
        }

        .cart-item {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 16px;
            padding: 14px;
            margin-bottom: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            position: relative;
            animation: slideInRight 0.4s ease-out;
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to   { opacity: 1; transform: translateX(0); }
        }

        .cart-item img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 12px;
            margin-right: 14px;
        }

        .cart-item-info {
            flex: 1;
            font-size: 14.5px;
        }

        .cart-item-info strong {
            display: block;
            margin-bottom: 4px;
            color: #333;
        }

        .cart-item-price {
            color: #d78a4e;
            font-weight: 600;
        }

        .cart-item-qty {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 8px;
        }

        .cart-item-qty button {
            width: 28px;
            height: 28px;
            border: none;
            background: #f0f0f0;
            border-radius: 50%;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s;
        }

        .cart-item-qty button:hover {
            background: #DFA799;
            color: white;
        }

        .remove-item {
            position: absolute;
            top: 8px;
            right: 10px;
            background: none;
            border: none;
            font-size: 20px;
            color: #bbb;
            cursor: pointer;
            transition: 0.2s;
        }

        .remove-item:hover {
            color: #e74c3c;
        }

        .cart-footer {
            padding: 20px;
            border-top: 1px solid #eee;
        }

        .favorite-btn {
            background: transparent;
            border: none;
            outline: none;
            box-shadow: none;
            font-size: 18px;
            cursor: pointer;
            color: #DFA799;
            transition: transform 0.2s ease;
        }

        .favorite-btn:hover {
            transform: scale(1.2);
        }

        /* ================= PAYMENT MODAL - 3D CARD ================= */
        .payment-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.65);
            backdrop-filter: blur(10px);
            opacity: 0;
            visibility: hidden;
            transition: 0.4s;
            z-index: 3000;
        }

        .payment-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .payment-modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.6);
            width: 90%;
            max-width: 600px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.55s cubic-bezier(0.22, 1, 0.36, 1);
            z-index: 3001;
        }

        .payment-modal.show {
            opacity: 1;
            visibility: visible;
            transform: translate(-50%, -50%) scale(1);
        }

        #highlight {
            position: absolute;
            border: 1px solid #fff;
            border-radius: 12px;
            z-index: 1;
            width: 0;
            height: 0;
            top: 0;
            left: 0;
            box-shadow: 0 0 5px #fff;
            transition: .3s;
        }

        #highlight.highlight__number {
            width: 346px;
            height: 40px;
            top: 92px;
            left: 18px;
        }

        #highlight.highlight__holder {
            width: 264px;
            height: 56px;
            top: 156px;
            left: 18px;
        }

        #highlight.highlight__expire {
            width: 86px;
            height: 56px;
            top: 156px;
            left: 323px;
        }

        #highlight.highlight__cvv {
            width: 381px;
            height: 91px;
            top: 83px;
            left: 18px;
        }

        #highlight.hidden {
            display: none;
        }

        .card {
            position: relative;
            max-width: 420px;
            margin: 0 auto;
            transform-style: preserve-3d;
            transition: 1s;
        }

        .card:hover,
        .card.flip {
            transform: rotateY(180deg);
        }

        .card:hover #highlight {
            display: none;
        }

        .card__front,
        .card__back {
            width: 100%;
            max-width: 420px;
            height: 233px;
            border-radius: 20px;
            padding: 24px 30px 30px;
            background: linear-gradient(135deg, #DFA799 0%, #d78a4e 50%, #c77947 100%);
            box-shadow: 0 33px 50px -15px rgba(223,167,153,.66);
            color: #fff;
            overflow: hidden;
            margin: 0 auto;
            backface-visibility: hidden;
        }

        .card__back {
            position: absolute;
            top: 0;
            left: 0;
            transform: rotateY(180deg);
            padding: 24px 0 0;
        }

        .card__front {
            position: relative;
        }

        .card__front:before,
        .card__back:before {
            content: "";
            position: absolute;
            border: 16px solid rgba(255, 255, 255, 0.2);
            border-radius: 100%;
            left: -17%;
            top: -45px;
            height: 300px;
            width: 300px;
            filter: blur(13px);
        }

        .card__front:after,
        .card__back:after {
            content: "";
            position: absolute;
            border: 16px solid rgba(255, 255, 255, 0.15);
            border-radius: 100%;
            width: 300px;
            top: 55%;
            left: -200px;
            height: 300px;
            filter: blur(13px);
        }

        .card__hide_line {
            height: 40px;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
        }

        .card_cvv {
            position: relative;
            z-index: 1;
            margin-top: 24px;
            padding: 0 32px;
            display: flex;
            flex-direction: column;
            align-items: end;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .card_cvv_field {
            margin-top: 6px;
            background-color: #fff;
            border-radius: 12px;
            height: 44px;
            width: 100%;
            color: #000;
            display: flex;
            align-items: center;
            justify-content: end;
            padding: 0 12px;
            font-size: 25px;
            line-height: 21px;
        }

        .card__header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-weight: 600;
            margin-bottom: 32px;
            position: relative;
            z-index: 1;
        }

        .card__number {
            font-size: 22px;
            margin-bottom: 32px;
            position: relative;
            z-index: 1;
            display: flex;
            height: 33px;
            overflow: hidden;
        }

        .card__number span {
            display: flex;
            flex-direction: column;
            transition: .2s;
        }

        .card__number span.filed {
            transform: translateY(-33px);
        }

        .card__number span:nth-child(4n) {
            margin-right: 10px;
        }

        .card__footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            z-index: 1;
        }

        .card__holder {
            text-transform: uppercase;
        }

        .card__section__title {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .form {
            border-radius: 12px;
            background: #fff;
            max-width: 600px;
            margin: -130px auto 0;
            padding: 180px 32px 32px;
            border: 1px solid #f1f1f1;
            box-shadow: 0 0 40px rgba(50,55,63,.16);
            display: grid;
            gap: 12px;
        }

        .form label {
            display: block;
            margin: 14px 0 4px;
            color: #0d0c22;
            font-weight: 500;
        }

        .form input, .form select {
            height: 52px;
            display: block;
            width: 100%;
            border: 1px solid #6b7280;
            padding: 18px 20px;
            transition: outline 200ms ease, box-shadow 200ms ease;
            border-radius: 12px;
            outline: none;
            background-color: #fff;
            color: #0d0c22;
            font-size: 16px;
        }

        .form input:focus,
        .form select:focus {
            border: 1px solid #000;
            outline: 4px solid rgba(0,0,0,.1);
        }

        .form select {
            padding: 0 20px;
        }

        .filed__group {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }

        .filed__date {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .pay-now-btn {
            width: 100%;
            padding: 14px;
            margin-top: 12px;
            border-radius: 12px;
            border: none;
            background: linear-gradient(135deg, #DFA799, #d78a4e);
            color: white;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
            transition: 0.3s;
            font-weight: 600;
        }

        .pay-now-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 40px rgba(223,167,153,0.6);
        }

        /* ================= ANIMATED ORDER BUTTON ================= */
        .truck-button {
            --progress: 0;
            --hx: 0;
            --street-fill: #7c93ae;
            --street: #546d8e;
            --truck: #323941;
            --box: #dfa799;
            position: relative;
            width: 200px;
            height: 56px;
            border: none;
            outline: none;
            background: none;
            cursor: pointer;
            padding: 0;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Montserrat', sans-serif;
            margin: 0 auto;
            display: block;
        }

        .truck-button .default,
        .truck-button .success {
            display: block;
            opacity: var(--o, 1);
            transition: opacity 0.3s;
            font-size: 16px;
            font-weight: 600;
            color: white;
            line-height: 56px;
            background: linear-gradient(135deg, #DFA799, #d78a4e);
            border-radius: 28px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .truck-button .success {
            --o: 0;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            pointer-events: none;
        }

        .truck-button .truck {
            position: absolute;
            width: 64px;
            height: 44px;
            top: 6px;
            left: 4px;
            z-index: 1;
            pointer-events: none;
        }

        .truck-button .truck:before,
        .truck-button .truck:after {
            content: '';
            position: absolute;
            border-radius: 50%;
            bottom: 5px;
            left: 10px;
            width: 8px;
            height: 8px;
            background: var(--truck);
            transform: translateX(var(--hx, 0));
            opacity: var(--truck-o, 0);
        }

        .truck-button .truck:after {
            left: 28px;
        }

        .truck-button .truck .box,
        .truck-button .truck .truck-body {
            position: absolute;
            opacity: var(--truck-o, 0);
            transition: opacity 0.3s var(--truck-d, 0.2s);
        }

        .truck-button .truck .box {
            width: 14px;
            height: 12px;
            left: 8px;
            bottom: 18px;
            background: var(--box);
            border-radius: 1px;
            transform: translateX(var(--hx, 0));
        }

        .truck-button .truck .truck-body {
            width: 48px;
            height: 32px;
            left: 0;
            bottom: 6px;
            background: linear-gradient(90deg, var(--street) 30%, var(--truck) 30%);
            border-radius: 4px 8px 2px 2px;
            transform: translateX(calc(var(--hx, 0) - 12px));
        }

        .truck-button.animation {
            --truck-o: 1;
            --truck-d: 0s;
        }

        .truck-button.animation .default {
            --o: 0;
        }

        .truck-button.animation.done {
            --progress: 1;
        }

        .truck-button.animation.done .success {
            --o: 1;
            transition-delay: 0.3s;
        }

        .truck-button.animation.done .truck {
            --hx: 1px;
            animation: truck 0.4s ease-in-out;
        }

        .truck-button.animation.done .truck .box {
            animation: box 0.45s ease-in-out;
        }

        @keyframes truck {
            10%, 30% { transform: translateX(-2px) }
            40%, 60% { transform: translateX(-4px) }
            65%, 75% { transform: translateX(-1px) }
        }

        @keyframes box {
            10%, 40% { transform: translateX(var(--hx, 0)) }
            45% { transform: translateX(calc(var(--hx, 0) + 36px)) }
        }

        .truck-button.animation.done .truck:before,
        .truck-button.animation.done .truck .truck-body {
            animation: move 0.4s ease-in-out;
        }

        @keyframes move {
            30%, 40% { transform: translateX(8px) }
            50%, 60% { transform: translateX(16px) }
            65%, 75% { transform: translateX(12px) }
        }

        /* ================= FAVORITES SYSTEM ================= */
        .floating-favorites {
            position: fixed;
            bottom: 100px;
            right: 30px;
            background: linear-gradient(135deg, #DFA799, #d78a4e);
            color: white;
            padding: 12px 16px;
            border-radius: 50px;
            font-size: 18px;
            cursor: pointer;
            z-index: 1100;
            box-shadow: 0 8px 20px rgba(0,0,0,0.25);
            display: flex;
            align-items: center;
            gap: 6px;
            animation: floatBadge 3s ease-in-out infinite;
        }

        .floating-favorites span {
            background: white;
            color: #DFA799;
            font-weight: bold;
            border-radius: 50%;
            padding: 2px 8px;
            margin-right: 2px;
        }

        .favorites-details {
            position: fixed;
            top: 0;
            right: -420px;
            width: 380px;
            height: 100%;
            background: white;
            box-shadow: -10px 0 30px rgba(0,0,0,0.2);
            transition: right 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            z-index: 1101;
            display: flex;
            flex-direction: column;
        }

        .favorites-details.open {
            right: 0;
        }

        .favorites-header {
            padding: 22px 24px;
            background: linear-gradient(135deg, #DFA799, #d78a4e);
            color: white;
            font-size: 20px;
            position: relative;
            border-bottom: none;
            text-align: center;
        }

        #favorites-items {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background: #fdf9f6;
        }

        .favorite-item {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 16px;
            padding: 14px;
            margin-bottom: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            position: relative;
            animation: slideInRight 0.4s ease-out;
        }

        .favorite-item img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 12px;
            margin-right: 14px;
        }

        .favorite-item-info {
            flex: 1;
            font-size: 14.5px;
        }

        .favorite-item-info strong {
            display: block;
            margin-bottom: 4px;
            color: #333;
        }

        .favorite-item-price {
            color: #d78a4e;
            font-weight: 600;
        }

        .remove-favorite {
            position: absolute;
            top: 8px;
            right: 10px;
            background: none;
            border: none;
            font-size: 20px;
            color: #bbb;
            cursor: pointer;
            transition: 0.2s;
        }

        .remove-favorite:hover {
            color: #e74c3c;
        }

        .add-favorite-to-cart {
            margin-top: 8px;
            background: linear-gradient(135deg, #DFA799, #d78a4e);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 3px 10px rgba(223,167,153,0.3);
        }

        .add-favorite-to-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(223,167,153,0.5);
        }

        /* ================= CUSTOM ALERT MODAL ================= */
        .custom-alert-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            animation: fadeIn 0.3s ease;
        }

        .custom-alert-overlay.show {
            display: flex;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .custom-alert-box {
            background: linear-gradient(135deg, #fff 0%, #fffaf7 100%);
            border-radius: 20px;
            padding: 30px;
            max-width: 380px;
            width: 90%;
            box-shadow: 0 20px 60px rgba(223, 167, 153, 0.3);
            text-align: center;
            animation: slideUp 0.4s ease;
            border: 2px solid rgba(223, 167, 153, 0.2);
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .custom-alert-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #DFA799, #d78a4e);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            color: white;
            box-shadow: 0 10px 25px rgba(223, 167, 153, 0.4);
        }

        .custom-alert-title {
            font-size: 22px;
            font-weight: 600;
            color: #d78a4e;
            margin-bottom: 12px;
        }

        .custom-alert-message {
            font-size: 15px;
            color: #666;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .custom-alert-button {
            background: linear-gradient(135deg, #DFA799, #d78a4e);
            color: white;
            border: none;
            padding: 12px 40px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(223, 167, 153, 0.3);
            margin: 0 auto;
            display: block;
            min-width: 140px;
        }

        .custom-alert-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(223, 167, 153, 0.5);
        }

        @media (max-width: 992px) {
            .carousel-content {
                padding-right: 0;
            }
            .carousel-title {
                font-size: 30px;
            }
            .carousel-thumb { width: 100px; height: 150px; }
        }

        @media (max-width: 768px) {
            .carousel-title,
            .carousel-topic {
                font-size: 2.5rem;
            }
            .carousel-thumb { width: 80px; height: 120px; }
            #carousel-thumbs { gap: 15px; flex-wrap: wrap; }
        }
    </style>
</head>
<body>

<!-- NEW HEADER -->
<header class="new-header">
    <div class="header-top">
        <h1 class="logo-title">“Where Love Shines Bright.”</h1>
        <p class="logo-subtitle">Weddings & Celebrations</p>


    </div>

    <nav class="modern-nav">
        <ul>
            <li><a href="h1.php">Home</a></li>
            <a href="shop.php" class="shop-btn">Shop</a>
            <li class="dropdown">
                <a href="ser.php" class="ser-btn">Services</a>
                <div class="mega-menu">
                    <div class="mega-container">
                        <div class="mega-left">
                            <h3>Book all the services for your wedding</h3>
                            <div class="mega-services-grid">
                                <a href="dj.php" class="mega-service-item"><i class="fas fa-music"></i> Music and DJs</a>
                                <a href="cake.php" class="mega-service-item"><i class="fas fa-birthday-cake"></i> Cakes</a>
                                <a href="decor.php" class="mega-service-item"><i class="fas fa-palette"></i> Decor & Styling</a>
                                <a href="invitation.php" class="mega-service-item"><i class="fas fa-envelope"></i> Stationery</a>
                                <a href="decore.php" class="mega-service-item"><i class="fas fa-home"></i>Wedding halls</a>
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

<!-- Hero Carousel -->
<section id="hero-carousel">
    <div class="carousel-list">
        <div class="carousel-item">
            <img src="https://jdbridalboutique.com/uploads/filemanager/home/intro2.jpg" alt="Elegant Bridal Collection">
            <div class="carousel-content">
                <div class="carousel-title">Elegant Dresses</div>
                <div class="carousel-topic">Designer Collection</div>
                <div class="carousel-description">Browse through our stunning designer wedding dresses</div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://loveandlavender.com/wp-content/uploads/2018/01/Rockstud-Ankle-Strap-Sandal-Valentino-Bridal-Pumps.jpg" alt="Bridal Footwear">
            <div class="carousel-content">
                <div class="carousel-title">Perfect Shoes</div>
                <div class="carousel-topic">Bridal Footwear</div>
                <div class="carousel-description">Step into elegance with our exclusive shoe collection</div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://cdn0.weddingwire.com/article-gallery-o/00000/3_2/1280/jpg/editorial-images-2018/8-august/sam/summer-wedding-flowers/0-hero-gloria-mesa-wedding-photography-2.webp" alt="Bouquets & More">
            <div class="carousel-content">
                <div class="carousel-title">Floral Beauty</div>
                <div class="carousel-topic">Bouquets & More</div>
                <div class="carousel-description">Stunning flower arrangements for your special day</div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://www.idowedding.co/uploads/images/slides/boston_bride___milla_nova_531a1d75_4c04_493e_bb90_0d36eaae903c.webp" alt="Luxury Wedding Collection">
            <div class="carousel-content">
                <div class="carousel-title">Classic Black Tuxedo</div>
                <div class="carousel-topic">Wedding Collection</div>
                <div class="carousel-description">Discover our exquisite collection of wedding attire and accessories</div>
            </div>
        </div>
    </div>

    <div id="carousel-thumbs"></div>

    <div class="carousel-arrows">
        <button id="carousel-prev">‹</button>
        <button id="carousel-next">›</button>
    </div>
</section>

<!-- Shopping Cart -->
<div class="cart-container">
    <h2 class="cart-title">Our Products</h2>

    <div style="text-align:center;margin:20px 0 30px;">
        <label for="filter"><strong>Filter by Category:</strong></label>
        <select id="filter" onchange="filterProducts()" style="padding:10px 20px;border-radius:25px;margin-left:10px;border:2px solid #DFA799;outline:none;cursor:pointer;">
            <option value="all">All Products</option>
            <option value="dress">Dresses</option>
            <option value="shoes">Shoes</option>
            <option value="flowers">Flowers</option>
            <option value="jewelry">Jewelry</option>
            <option value="groom">Groom</option>
        </select>
    </div>

    <div class="products-grid" id="productsGrid">
        <!-- Dress 1 -->
        <div class="product-card" data-category="dress">
            <div class="product-card-image">
                <img src="img/sho2.jpg" alt="Wedding Dress Gucci">
                <span class="product-badge">New</span>
            </div>
            <div class="product-info">
                <h3>Wedding Dress - Gucci</h3>
                <p>Elegant designer wedding dress (XL)</p>
                <div class="product-price">$250.00</div>
                <div class="product-actions">
                    <div class="quantity-selector">
                        <button onclick="changeCardQty(this, -1)">−</button>
                        <span>0</span>
                        <button onclick="changeCardQty(this, 1)">+</button>
                    </div>
                    <button class="add-to-cart-btn" onclick="addToCart(this)">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                    <button class="favorite-btn-card">🤍</button>
                </div>
            </div>
        </div>

        <!-- Shoes -->
        <div class="product-card" data-category="shoes">
            <div class="product-card-image">
                <img src="img/sho4.jpg" alt="Bridal Shoes Valentino">
                <span class="product-badge">Hot</span>
            </div>
            <div class="product-info">
                <h3>Bridal Shoes - Valentino</h3>
                <p>Luxury bridal footwear collection</p>
                <div class="product-price">$320.00</div>
                <div class="product-actions">
                    <div class="quantity-selector">
                        <button onclick="changeCardQty(this, -1)">−</button>
                        <span>0</span>
                        <button onclick="changeCardQty(this, 1)">+</button>
                    </div>
                    <button class="add-to-cart-btn" onclick="addToCart(this)">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                    <button class="favorite-btn-card">🤍</button>
                </div>
            </div>
        </div>

        <!-- Dress 2 -->
        <div class="product-card" data-category="dress">
            <div class="product-card-image">
                <img src="img/sho1.jpg" alt="Royal Dress Dior">
                <span class="product-badge">Exclusive</span>
            </div>
            <div class="product-info">
                <h3>Royal Dress - Dior</h3>
                <p>Premium designer collection (M)</p>
                <div class="product-price">$480.00</div>
                <div class="product-actions">
                    <div class="quantity-selector">
                        <button onclick="changeCardQty(this, -1)">−</button>
                        <span>0</span>
                        <button onclick="changeCardQty(this, 1)">+</button>
                    </div>
                    <button class="add-to-cart-btn" onclick="addToCart(this)">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                    <button class="favorite-btn-card">🤍</button>
                </div>
            </div>
        </div>

        <!-- Jewelry -->
        <div class="product-card" data-category="jewelry">
            <div class="product-card-image">
                <img src="img/sho8.jpg" alt="Diamond Necklace">
                <span class="product-badge">Luxury</span>
            </div>
            <div class="product-info">
                <h3>Diamond Necklace</h3>
                <p>Sparkling diamond jewelry piece</p>
                <div class="product-price">$390.00</div>
                <div class="product-actions">
                    <div class="quantity-selector">
                        <button onclick="changeCardQty(this, -1)">−</button>
                        <span>0</span>
                        <button onclick="changeCardQty(this, 1)">+</button>
                    </div>
                    <button class="add-to-cart-btn" onclick="addToCart(this)">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                    <button class="favorite-btn-card">🤍</button>
                </div>
            </div>
        </div>

        <!-- Flowers -->
        <div class="product-card" data-category="flowers">
            <div class="product-card-image">
                <img src="img/f1.jpg" alt="Peony Bouquet">
                <span class="product-badge">Fresh</span>
            </div>
            <div class="product-info">
                <h3>Luxury Peony & Rose Bouquet</h3>
                <p>Elegant flower arrangement</p>
                <div class="product-price">$380.00</div>
                <div class="product-actions">
                    <div class="quantity-selector">
                        <button onclick="changeCardQty(this, -1)">−</button>
                        <span>0</span>
                        <button onclick="changeCardQty(this, 1)">+</button>
                    </div>
                    <button class="add-to-cart-btn" onclick="addToCart(this)">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                    <button class="favorite-btn-card">🤍</button>
                </div>
            </div>
        </div>

        <!-- Groom 1 -->
        <div class="product-card" data-category="groom">
            <div class="product-card-image">
                <img src="img/gg1.jpg" alt="Tuxedo Tom Ford">
                <span class="product-badge">Premium</span>
            </div>
            <div class="product-info">
                <h3>Classic Black Tuxedo</h3>
                <p>Tom Ford luxury collection</p>
                <div class="product-price">$1890.00</div>
                <div class="product-actions">
                    <div class="quantity-selector">
                        <button onclick="changeCardQty(this, -1)">−</button>
                        <span>0</span>
                        <button onclick="changeCardQty(this, 1)">+</button>
                    </div>
                    <button class="add-to-cart-btn" onclick="addToCart(this)">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                    <button class="favorite-btn-card">🤍</button>
                </div>
            </div>
        </div>

        <!-- Groom 2 -->
        <div class="product-card" data-category="groom">
            <div class="product-card-image">
                <img src="img/gg2.jpg" alt="Rolex Submariner">
                <span class="product-badge">Elite</span>
            </div>
            <div class="product-info">
                <h3>Luxury Watch - Rolex</h3>
                <p>Rolex Submariner collection</p>
                <div class="product-price">$14500.00</div>
                <div class="product-actions">
                    <div class="quantity-selector">
                        <button onclick="changeCardQty(this, -1)">−</button>
                        <span>0</span>
                        <button onclick="changeCardQty(this, 1)">+</button>
                    </div>
                    <button class="add-to-cart-btn" onclick="addToCart(this)">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                    <button class="favorite-btn-card">🤍</button>
                </div>
            </div>
        </div>

        <!-- Groom 3 -->
        <div class="product-card" data-category="groom">
            <div class="product-card-image">
                <img src="img/gg3.jpg" alt="Cartier Cufflinks">
                <span class="product-badge">VIP</span>
            </div>
            <div class="product-info">
                <h3>Diamond Cufflinks</h3>
                <p>Cartier luxury accessories</p>
                <div class="product-price">$3850.00</div>
                <div class="product-actions">
                    <div class="quantity-selector">
                        <button onclick="changeCardQty(this, -1)">−</button>
                        <span>0</span>
                        <button onclick="changeCardQty(this, 1)">+</button>
                    </div>
                    <button class="add-to-cart-btn" onclick="addToCart(this)">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                    <button class="favorite-btn-card">🤍</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Floating Cart Button -->
<div class="floating-cart" onclick="toggleCartDetails()">
    <i class="fas fa-shopping-cart"></i> Cart <span id="cart-count">0</span>
</div>

<!-- Floating Favorites Button -->
<div class="floating-favorites" onclick="toggleFavoritesDetails()">
    <i class="fas fa-heart"></i> Favorites <span id="favorites-count">0</span>
</div>

<!-- SIDE CART PANEL -->
<div class="cart-details" id="sideCart">
    <div class="cart-header">
        <h3>Shopping Cart (<span id="side-cart-count">0</span>)</h3>
        <button style="position:absolute;top:18px;right:20px;background:none;border:none;font-size:28px;cursor:pointer;color:white;" onclick="toggleCartDetails()">×</button>
    </div>

    <div id="cart-items">
        <p style="text-align:center;color:#aaa;margin-top:60px;">Your cart is empty</p>
    </div>

    <div class="cart-footer">
        <div style="display:flex;justify-content:space-between;margin-bottom:12px;font-size:18px;font-weight:600;">
            <span>Total:</span>
            <span id="side-cart-total">$0.00</span>
        </div>
        <button class="checkout-btn" style="width:100%;padding:14px;font-size:17px;" onclick="openPaymentModal()">
            Proceed to Checkout
        </button>
    </div>
</div>

<!-- SIDE FAVORITES PANEL -->
<div class="favorites-details" id="sideFavorites">
    <div class="favorites-header">
        <h3>My Favorites (<span id="side-favorites-count">0</span>)</h3>
        <button style="position:absolute;top:18px;right:20px;background:none;border:none;font-size:28px;cursor:pointer;color:white;" onclick="toggleFavoritesDetails()">×</button>
    </div>

    <div id="favorites-items">
        <p style="text-align:center;color:#aaa;margin-top:60px;">No favorites yet</p>
    </div>
</div>

<!-- PAYMENT OVERLAY -->
<div class="payment-overlay" id="paymentOverlay" onclick="closePaymentModal()"></div>

<!-- PAYMENT MODAL - 3D CARD -->
<div class="payment-modal" id="paymentModal">
    <div class="card" id="card">
        <div id="highlight" class="hidden"></div>

        <!-- Front of Card -->
        <div class="card__front">
            <div class="card__header">
                <span>Debit Card</span>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png" width="50" alt="Mastercard">
            </div>

            <div class="card__number" id="card_number">
                <span>#<br></span>
                <span>#<br></span>
                <span>#<br></span>
                <span>#<br></span>

                <span>#<br></span>
                <span>#<br></span>
                <span>#<br></span>
                <span>#<br></span>

                <span>#<br></span>
                <span>#<br></span>
                <span>#<br></span>
                <span>#<br></span>

                <span>#<br></span>
                <span>#<br></span>
                <span>#<br></span>
                <span>#<br></span>
            </div>

            <div class="card__footer">
                <div class="card__holder">
                    <div class="card__section__title">Card holder</div>
                    <div id="card_holder">Full Name</div>
                </div>

                <div class="card__expires">
                    <div class="card__section__title">Expires</div>
                    <div>
                        <span id="card_expires_month">MM</span>/<span id="card_expires_year">YY</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back of Card -->
        <div class="card__back">
            <div class="card__hide_line"></div>
            <div class="card_cvv">
                <div>CVV</div>
                <div class="card_cvv_field" id="card_cvv_field">***</div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form class="form" onsubmit="completePayment(); return false;">
        <label for="number">Card Number</label>
        <input type="text" id="number" maxlength="16" placeholder="1234 5678 9012 3456" required>

        <label for="holder">Card Holder</label>
        <input type="text" id="holder" placeholder="FULL NAME" required>

        <div class="filed__group">
            <div>
                <label for="expiration_month">Expiration Date</label>
                <div class="filed__date">
                    <select id="expiration_month" required>
                        <option value="" selected disabled>Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>

                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>

                    <select id="expiration_year" required>
                        <option value="" selected disabled>Year</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" maxlength="3" placeholder="123" required>
            </div>
        </div>

        <button type="submit" class="truck-button" id="truckButton">
            <span class="default">Complete Payment</span>
            <span class="success">Order Placed
            <svg viewBox="0 0 12 10" style="display:inline-block;width:14px;height:14px;margin-left:4px;">
                <polyline points="1.5 6 4.5 9 10.5 1" stroke="currentColor" fill="none" stroke-width="2"></polyline>
            </svg>
            </span>
            <div class="truck">
                <div class="truck-body"></div>
                <div class="box"></div>
            </div>
        </button>
    </form>
</div>

<!-- Overlay -->
<div class="cart-overlay" onclick="closeAllPanels()"></div>

<!-- Custom Alert Modal -->
<div class="custom-alert-overlay" id="customAlert">
    <div class="custom-alert-box">
        <div class="custom-alert-icon">⚠️</div>
        <div class="custom-alert-title">Attention</div>
        <div class="custom-alert-message" id="customAlertMessage">Please select quantity first!</div>
        <button class="custom-alert-button" onclick="closeCustomAlert()">OK</button>
    </div>
</div>

<script>
    // ========== CAROUSEL FUNCTIONALITY ==========
    const carouselImages = [
        { src: "https://jdbridalboutique.com/uploads/filemanager/home/intro2.jpg", title: "Elegant Dresses", topic: "Designer Collection" },
        { src: "https://loveandlavender.com/wp-content/uploads/2018/01/Rockstud-Ankle-Strap-Sandal-Valentino-Bridal-Pumps.jpg", title: "Perfect Shoes", topic: "Bridal Footwear" },
        { src: "https://cdn0.weddingwire.com/article-gallery-o/00000/3_2/1280/jpg/editorial-images-2018/8-august/sam/summer-wedding-flowers/0-hero-gloria-mesa-wedding-photography-2.webp", title: "Floral Beauty", topic: "Bouquets & More" },
        { src: "https://www.idowedding.co/uploads/images/slides/boston_bride___milla_nova_531a1d75_4c04_493e_bb90_0d36eaae903c.webp", title: "Classic Black Tuxedo", topic: "Wedding Collection" },
    ];

    let nextDom = document.getElementById('carousel-next');
    let prevDom = document.getElementById('carousel-prev');
    let carouselDom = document.getElementById('hero-carousel');
    let SliderDom = carouselDom.querySelector('.carousel-list');
    let thumbnailBorderDom = document.getElementById('carousel-thumbs');

    // Create thumbnails
    carouselImages.forEach((img, index) => {
        const thumb = document.createElement('div');
        thumb.className = 'carousel-thumb';
        thumb.innerHTML = `
            <img src="${img.src}" alt="${img.title}">
            <div class="thumb-content">
                <div class="thumb-title">${img.title}</div>
                <div class="thumb-description">${img.topic}</div>
            </div>
        `;
        thumbnailBorderDom.appendChild(thumb);
    });

    let timeRunning = 3000;
    let timeAutoNext = 7000;

    nextDom.onclick = function() {
        showSlider('next');
    }

    prevDom.onclick = function() {
        showSlider('prev');
    }

    let runTimeOut;
    let runNextAuto = setTimeout(() => {
        nextDom.click();
    }, timeAutoNext);

    function showSlider(type) {
        let SliderItemsDom = SliderDom.querySelectorAll('.carousel-item');
        let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll('.carousel-thumb');

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
        runNextAuto = setTimeout(() => {
            nextDom.click();
        }, timeAutoNext);
    }

    // ========== CUSTOM ALERT FUNCTIONS ==========
    function showCustomAlert(message) {
        document.getElementById('customAlertMessage').textContent = message;
        document.getElementById('customAlert').classList.add('show');
    }

    function closeCustomAlert() {
        document.getElementById('customAlert').classList.remove('show');
    }

    function closeAllPanels() {
        sideCart.classList.remove('open');
        sideFavorites.classList.remove('open');
        overlay.classList.remove('active');
    }

    // Close alert when clicking outside the box
    document.getElementById('customAlert').addEventListener('click', function(e) {
        if (e.target === this) {
            closeCustomAlert();
        }
    });

    // ========== FAVORITES SYSTEM ==========
    const sideFavorites = document.getElementById('sideFavorites');
    const favoritesCount = document.getElementById('favorites-count');
    const sideFavoritesCount = document.getElementById('side-favorites-count');
    const favoritesItemsContainer = document.getElementById('favorites-items');

    function toggleFavoritesDetails() {
        sideFavorites.classList.toggle('open');
        overlay.classList.toggle('active');
        if (sideFavorites.classList.contains('open')) {
            updateSideFavorites();
            // Close cart if open
            sideCart.classList.remove('open');
        }
    }

    function updateFavoritesCount() {
        let count = 0;
        document.querySelectorAll('.product-card[data-is-favorite="true"]').forEach(card => {
            count++;
        });
        favoritesCount.textContent = count;
        sideFavoritesCount.textContent = count;
    }

    function updateSideFavorites() {
        favoritesItemsContainer.innerHTML = '';
        let count = 0;

        document.querySelectorAll('.product-card[data-is-favorite="true"]').forEach(card => {
            count++;

            const img = card.querySelector('.product-card-image img').src;
            const name = card.querySelector('.product-info h3').textContent;
            const priceText = card.querySelector('.product-price').textContent;

            const itemHTML = `
            <div class="favorite-item">
                <img src="${img}" alt="${name}">
                <div class="favorite-item-info">
                    <strong>${name}</strong>
                    <div class="favorite-item-price">${priceText}</div>
                    <button class="add-favorite-to-cart" onclick="addFavoriteToCart('${name}')">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                </div>
                <button class="remove-favorite" onclick="removeFromFavorites('${name}')">×</button>
            </div>
        `;
            favoritesItemsContainer.innerHTML += itemHTML;
        });

        if (count === 0) {
            favoritesItemsContainer.innerHTML = '<p style="text-align:center;color:#aaa;margin-top:60px;">No favorites yet</p>';
        }

        updateFavoritesCount();
    }

    function addFavoriteToCart(productName) {
        document.querySelectorAll('.product-card').forEach(card => {
            const cardName = card.querySelector('.product-info h3').textContent;
            if (cardName === productName) {
                const qtySpan = card.querySelector('.quantity-selector span');
                const currentQty = parseInt(qtySpan.textContent);

                // Set quantity to 1 if it's 0
                if (currentQty === 0) {
                    qtySpan.textContent = 1;
                }

                // Add to cart
                card.setAttribute('data-in-cart', 'true');
                updateFloatingCount();
                updateSideCart();

                showCustomAlert('Product added to cart! 🛒');
            }
        });
    }

    function removeFromFavorites(productName) {
        document.querySelectorAll('.product-card').forEach(card => {
            const cardName = card.querySelector('.product-info h3').textContent;
            if (cardName === productName) {
                card.removeAttribute('data-is-favorite');
                const favoriteBtn = card.querySelector('.favorite-btn-card');
                favoriteBtn.textContent = '🤍';
            }
        });
        updateSideFavorites();
    }

    // ========== SHOPPING CART FUNCTIONALITY ==========
    const sideCart = document.getElementById('sideCart');
    const overlay = document.querySelector('.cart-overlay');
    const sideCartCount = document.getElementById('side-cart-count');
    const sideCartTotal = document.getElementById('side-cart-total');
    const cartItemsContainer = document.getElementById('cart-items');
    const floatingCount = document.getElementById('cart-count');

    function toggleCartDetails() {
        sideCart.classList.toggle('open');
        overlay.classList.toggle('active');
        if (sideCart.classList.contains('open')) {
            updateSideCart();
            // Close favorites if open
            sideFavorites.classList.remove('open');
        }
    }

    // ========== PRODUCT CARDS FUNCTIONALITY - FIXED ==========
    function changeCardQty(btn, change) {
        const span = btn.parentElement.querySelector('span');
        let qty = parseInt(span.textContent);
        qty = Math.max(0, qty + change);
        span.textContent = qty;
        // DON'T update cart count here - only when Add to Cart is clicked
    }

    function addToCart(btn) {
        const card = btn.closest('.product-card');
        const qtySpan = card.querySelector('.quantity-selector span');
        const qty = parseInt(qtySpan.textContent);

        if (qty === 0) {
            showCustomAlert('Please select quantity first!');
            return;
        }

        // Mark this card as added to cart
        card.setAttribute('data-in-cart', 'true');

        // Add animation
        btn.innerHTML = '<i class="fas fa-check"></i> Added!';
        btn.style.background = '#4CAF50';

        setTimeout(() => {
            btn.innerHTML = '<i class="fas fa-shopping-cart"></i> Add to Cart';
            btn.style.background = 'linear-gradient(135deg, #DFA799, #d78a4e)';
        }, 2000);

        // NOW update the cart count
        updateFloatingCount();
    }

    function filterProducts() {
        const val = document.getElementById('filter').value;
        document.querySelectorAll('.product-card').forEach(card => {
            const cat = card.getAttribute('data-category');
            card.style.display = (val === 'all' || val === cat) ? 'block' : 'none';
        });
    }

    function updateFloatingCount() {
        let count = 0;
        // Only count products that have been added to cart
        document.querySelectorAll('.product-card[data-in-cart="true"]').forEach(card => {
            const qtySpan = card.querySelector('.quantity-selector span');
            count += parseInt(qtySpan.textContent);
        });
        floatingCount.textContent = count;
    }

    function updateSideCart() {
        cartItemsContainer.innerHTML = '';
        let total = 0;
        let count = 0;

        // Only show products that have been added to cart
        document.querySelectorAll('.product-card[data-in-cart="true"]').forEach(card => {
            const qtySpan = card.querySelector('.quantity-selector span');
            const qty = parseInt(qtySpan.textContent);

            // If quantity becomes 0, remove from cart
            if (qty <= 0) {
                card.removeAttribute('data-in-cart');
                return;
            }

            const img = card.querySelector('.product-card-image img').src;
            const name = card.querySelector('.product-info h3').textContent;
            const priceText = card.querySelector('.product-price').textContent;
            const price = parseFloat(priceText.replace(/[$,]/g, ''));

            total += price * qty;
            count += qty;

            const itemHTML = `
            <div class="cart-item">
                <img src="${img}" alt="${name}">
                <div class="cart-item-info">
                    <strong>${name}</strong>
                    <div class="cart-item-price">$${price.toFixed(2)}</div>
                    <div class="cart-item-qty">
                        <button onclick="changeQtyInSideCart(this, -1, '${name}')">−</button>
                        <span>${qty}</span>
                        <button onclick="changeQtyInSideCart(this, 1, '${name}')">+</button>
                    </div>
                </div>
                <button class="remove-item" onclick="removeFromSideCart('${name}')">×</button>
            </div>
        `;
            cartItemsContainer.innerHTML += itemHTML;
        });

        if (count === 0) {
            cartItemsContainer.innerHTML = '<p style="text-align:center;color:#aaa;margin-top:60px;">Your cart is empty</p>';
        }

        sideCartCount.textContent = count;
        sideCartTotal.textContent = `$${total.toFixed(2)}`;
        floatingCount.textContent = count;
    }

    function changeQtyInSideCart(btn, change, productName) {
        const span = btn.parentElement.querySelector('span');
        let qty = parseInt(span.textContent);
        qty = Math.max(0, qty + change);
        span.textContent = qty;

        document.querySelectorAll('.product-card').forEach(card => {
            const cardName = card.querySelector('.product-info h3').textContent;
            if (cardName === productName) {
                card.querySelector('.quantity-selector span').textContent = qty;
                // Remove from cart if quantity becomes 0
                if (qty === 0) {
                    card.removeAttribute('data-in-cart');
                }
            }
        });

        updateSideCart();
    }

    function removeFromSideCart(productName) {
        document.querySelectorAll('.product-card').forEach(card => {
            const cardName = card.querySelector('.product-info h3').textContent;
            if (cardName === productName) {
                card.querySelector('.quantity-selector span').textContent = 0;
                card.removeAttribute('data-in-cart');
            }
        });
        updateSideCart();
    }

    // Image Popup
    document.querySelectorAll('.product-card-image').forEach(img => {
        img.onclick = () => {
            const modal = document.createElement('div');
            modal.style.cssText = "position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.9);display:flex;justify-content:center;align-items:center;z-index:9999;cursor:pointer;";
            const bigImg = document.createElement('img');
            bigImg.src = img.querySelector('img').src;
            bigImg.style.cssText = "max-width:90%;max-height:90%;border-radius:20px;box-shadow:0 0 50px rgba(255,255,255,0.3);";
            modal.appendChild(bigImg);
            modal.onclick = () => modal.remove();
            document.body.appendChild(modal);
        };
    });

    // Favorite button animation
    document.querySelectorAll('.favorite-btn-card').forEach(btn => {
        btn.onclick = function(e) {
            e.stopPropagation();
            const card = this.closest('.product-card');

            if (this.textContent === '🤍') {
                // Add to favorites
                this.textContent = '❤️';
                card.setAttribute('data-is-favorite', 'true');

                // Animation
                this.style.transform = 'scale(1.3)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 300);
            } else {
                // Remove from favorites
                this.textContent = '🤍';
                card.removeAttribute('data-is-favorite');
            }

            updateFavoritesCount();
        };
    });

    updateFloatingCount();
    updateFavoritesCount();

    const serviceImages = ["img/ss2.jpg","img/m2.jpg","img/ss4.jpg","img/ss5.jpg"];
    let j = 0;
    setInterval(() => {
        j = (j + 1) % serviceImages.length;
        document.getElementById("serviceSlide").src = serviceImages[j];
    }, 2000);

    // ========== 3D CARD INTERACTIVITY ==========
    let enteredCardNumbers = 0;

    document.getElementById("number").addEventListener("focus", (e) => {
        document.getElementById("card").classList.remove('flip');
        document.getElementById("highlight").className = 'highlight__number';
    });

    document.getElementById("holder").addEventListener("focus", (e) => {
        document.getElementById("card").classList.remove('flip');
        document.getElementById("highlight").className = 'highlight__holder';
    });

    document.getElementById("expiration_month").addEventListener("focus", (e) => {
        document.getElementById("card").classList.remove('flip');
        document.getElementById("highlight").className = 'highlight__expire';
    });

    document.getElementById("expiration_year").addEventListener("focus", (e) => {
        document.getElementById("card").classList.remove('flip');
        document.getElementById("highlight").className = 'highlight__expire';
    });

    document.getElementById("cvv").addEventListener("focus", (e) => {
        document.getElementById("card").classList.add('flip');
        document.getElementById("highlight").className = 'highlight__cvv';
    });

    document.getElementById("cvv").addEventListener("focusout", (e) => {
        document.getElementById("card").classList.remove('flip');
        document.getElementById("highlight").className = 'hidden';
    });

    document.getElementById("number").addEventListener("input", (e) => {
        const value = e.target.value;

        if(enteredCardNumbers > value.length) {
            document.getElementById('card_number').children[15 - (15 - value.length)].classList.remove('filed');
            document.getElementById('card_number').children[value.length].innerHTML = "#<br>";
        }
        else {
            if(value.length > 4 && value.length < 13) {
                document.getElementById('card_number').children[value.length - 1].innerText += "*";
            }else {
                document.getElementById('card_number').children[value.length - 1].innerText += value.slice(-1);
            }

            document.getElementById('card_number').children[value.length - 1].classList.add('filed');
        }

        enteredCardNumbers = value.length;
    });

    document.getElementById("holder").addEventListener("input", (e) => {
        document.getElementById('card_holder').innerText = e.target.value || 'Full Name';
    });

    document.getElementById("cvv").addEventListener("input", (e) => {
        document.getElementById('card_cvv_field').innerText = Array(e.target.value.length+1).join("*") || '***';
    });

    document.getElementById("expiration_month").addEventListener("change", (e) => {
        document.getElementById('card_expires_month').innerText = e.target.value || 'MM';
    });

    document.getElementById("expiration_year").addEventListener("change", (e) => {
        document.getElementById('card_expires_year').innerText = e.target.value.slice(-2) || 'YY';
    });

    function openPaymentModal() {
        document.getElementById('paymentOverlay').classList.add('show');
        document.getElementById('paymentModal').classList.add('show');
    }

    function closePaymentModal() {
        document.getElementById('paymentOverlay').classList.remove('show');
        document.getElementById('paymentModal').classList.remove('show');
    }

    function completePayment() {
        const btn = document.getElementById('truckButton');

        if (!btn.classList.contains('animation')) {
            btn.classList.add('animation');

            setTimeout(() => {
                btn.classList.add('done');
            }, 400);

            setTimeout(() => {
                closePaymentModal();
                toggleCartDetails();

                // Reset button after closing
                setTimeout(() => {
                    btn.classList.remove('animation', 'done');
                }, 400);

                // Show success message
                showCustomAlert('Payment successful! Thank you for your order! 💖');
            }, 2500);
        }
    }
    function completePayment() {

        const orderData = {
            name: document.getElementById("holder").value,
            email: "customer@email.com", // يمكن ربطه لاحقًا من تسجيل الدخول
            total: parseFloat(
                document.getElementById("side-cart-total")
                    .innerText.replace("$", "")
            ),
            items: cartItems // نفس array السلة عندك
        };

        fetch("save_order.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(orderData)
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert("✅ Order saved successfully!");
                } else {
                    alert("❌ Error saving order");
                }
            });
    }

</script>
<script src="save-order-hook.js"></script>

</body>
</html>