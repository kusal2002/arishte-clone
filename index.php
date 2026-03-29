<!DOCTYPE html>
<html lang="en">
<?php
include 'values.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Arishte</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500;600&display=swap"
          rel="stylesheet">
    <style>
        :root {
            --cream: #F7F2EA;
            --warm-white: #FDFAF5;
            --gold: #B8965A;
            --gold-light: #D4AC6E;
            --deep-brown: #2A1F14;
            --mid-brown: #5C3D2E;
            --sage: #6B7C5C;
            --text: #3A2E22;
            --text-light: #7A6A55;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Jost', sans-serif;
            background: var(--warm-white);
            color: var(--text);
            overflow-x: hidden;
        }

        /* NAV */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 5%;
            height: 72px;
            background: rgba(253, 250, 245, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(184, 150, 90, 0.15);
            transition: box-shadow 0.3s;
        }

        nav.scrolled {
            box-shadow: 0 2px 30px rgba(42, 31, 20, 0.08);
        }

        .nav-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 300;
            color: var(--deep-brown);
            letter-spacing: 3px;
            text-decoration: none;
        }

        .nav-logo span {
            color: var(--gold);
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--text);
            text-decoration: none;
            position: relative;
            padding-bottom: 3px;
            transition: color 0.3s;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--gold);
            transition: width 0.3s;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a.active {
            color: var(--gold);
        }

        .nav-links a.active::after {
            width: 100%;
        }

        /* HERO */
        .hero {
            height: 100vh;
            min-height: 700px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background-image: url('https://static.wixstatic.com/media/bde431_5e6694e12cec4b458413648ee89fa179~mv2.jpg');
            background-size: cover;
            background-position: center;
            filter: brightness(0.55);
            transform: scale(1.05);
            animation: slowZoom 20s ease-in-out infinite alternate;
        }

        @keyframes slowZoom {
            from {
                transform: scale(1.05);
            }
            to {
                transform: scale(1.12);
            }
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(42, 31, 20, 0.2) 0%, rgba(42, 31, 20, 0.5) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 0 20px;
            animation: fadeUp 1.2s ease forwards;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-eyebrow {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--gold-light);
            margin-bottom: 22px;
        }

        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(52px, 8vw, 96px);
            font-weight: 300;
            line-height: 1.1;
            letter-spacing: 2px;
            margin-bottom: 16px;
        }

        .hero-title em {
            font-style: italic;
            color: var(--gold-light);
        }

        .hero-sub {
            font-size: 12px;
            letter-spacing: 4px;
            text-transform: uppercase;
            opacity: 0.75;
            margin-bottom: 48px;
        }

        .btn-primary {
            display: inline-block;
            padding: 14px 44px;
            border: 1px solid var(--gold-light);
            color: white;
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            text-decoration: none;
            transition: background 0.3s, color 0.3s;
        }

        .btn-primary:hover {
            background: var(--gold);
            border-color: var(--gold);
            color: white;
        }

        .hero-scroll {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .hero-scroll::after {
            content: '';
            width: 1px;
            height: 50px;
            background: rgba(255, 255, 255, 0.4);
            animation: scrollLine 1.5s ease-in-out infinite;
        }

        @keyframes scrollLine {
            0%, 100% {
                opacity: 0.4;
                transform: scaleY(0.5);
            }
            50% {
                opacity: 1;
                transform: scaleY(1);
            }
        }

        /* ABOUT STRIP */
        .about-strip {
            padding: 90px 8%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            background: var(--warm-white);
        }

        .about-image-wrap {
            position: relative;
        }

        .about-image-wrap img {
            width: 100%;
            height: 560px;
            object-fit: cover;
            display: block;
        }

        .about-image-wrap::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            right: 20px;
            bottom: 20px;
            border: 1px solid var(--gold);
            opacity: 0.35;
            z-index: 0;
            pointer-events: none;
        }

        .about-image-wrap img {
            position: relative;
            z-index: 1;
        }

        .about-text {
            padding: 20px 0;
        }

        .section-label {
            font-size: 10px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .section-label::after {
            content: '';
            flex: 1;
            max-width: 40px;
            height: 1px;
            background: var(--gold);
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(34px, 4vw, 52px);
            font-weight: 300;
            line-height: 1.2;
            color: var(--deep-brown);
            margin-bottom: 28px;
        }

        .section-title em {
            font-style: italic;
            color: var(--mid-brown);
        }

        .section-body {
            font-size: 15px;
            line-height: 1.9;
            color: var(--text-light);
            font-weight: 300;
            margin-bottom: 36px;
        }

        .btn-secondary {
            display: inline-block;
            padding: 13px 38px;
            background: var(--gold);
            color: white;
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            text-decoration: none;
            transition: background 0.3s, transform 0.3s;
        }

        .btn-secondary:hover {
            background: var(--mid-brown);
            transform: translateY(-1px);
        }

        /* TICKER */
        .ticker {
            background: var(--deep-brown);
            padding: 18px 0;
            overflow: hidden;
        }

        .ticker-inner {
            display: flex;
            gap: 0;
            white-space: nowrap;
            animation: ticker 30s linear infinite;
        }

        .ticker-text {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--gold-light);
            padding: 0 30px;
            flex-shrink: 0;
        }

        .ticker-dot {
            color: rgba(184, 150, 90, 0.4);
            padding: 0 10px;
        }

        @keyframes ticker {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(-50%);
            }
        }

        /* SPECIALTIES */
        .specialties {
            padding: 90px 8%;
            background: var(--cream);
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .specialties-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
        }

        .specialty-card {
            position: relative;
            overflow: hidden;
            aspect-ratio: 3/4;
            cursor: pointer;
        }

        .specialty-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .specialty-card:hover img {
            transform: scale(1.08);
        }

        .specialty-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 40%, rgba(42, 31, 20, 0.85) 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 28px 24px;
            color: white;
        }

        .specialty-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            margin-bottom: 6px;
        }

        .specialty-desc {
            font-size: 12px;
            opacity: 0.75;
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        /* PHILOSOPHY */
        .philosophy {
            padding: 90px 8%;
            background: var(--warm-white);
        }

        .philosophy-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 50px;
            margin-top: 60px;
        }

        .philosophy-item {
            text-align: center;
            padding: 40px 30px;
            border: 1px solid rgba(184, 150, 90, 0.2);
            position: relative;
        }

        .philosophy-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 1px;
            background: var(--gold);
        }

        .philosophy-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 48px;
            font-weight: 300;
            color: rgba(21, 13, 1, 0.85);
            line-height: 1;
            margin-bottom: 14px;
        }

        .philosophy-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            color: var(--deep-brown);
            margin-bottom: 16px;
        }

        .philosophy-text {
            font-size: 13.5px;
            line-height: 1.85;
            color: var(--text-light);
            font-weight: 300;
        }

        /* FULL-WIDTH BANNER */
        .banner {
            height: 500px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .banner-bg {
            position: absolute;
            inset: 0;
            background-image: url('https://static.wixstatic.com/media/bde431_cbfd4f13d10c4ce597322583fe6d17b7~mv2.jpg');
            background-size: cover;
            background-position: center;
            filter: brightness(0.45);
        }

        .banner-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 0 20px;
        }

        .banner-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(36px, 5vw, 62px);
            font-weight: 300;
            margin-bottom: 22px;
            line-height: 1.2;
        }

        .banner-title em {
            font-style: italic;
            color: var(--gold-light);
        }

        /* CONTACT */
        .contact {
            padding: 90px 8%;
            background: var(--deep-brown);
            color: white;
        }

        .contact-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: start;
        }

        .contact-info h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 44px;
            font-weight: 300;
            margin-bottom: 12px;
        }

        .contact-info h2 em {
            font-style: italic;
            color: var(--gold-light);
        }

        .contact-info p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.8;
            margin-bottom: 36px;
        }

        .contact-details {
            list-style: none;
        }

        .contact-details li {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.65);
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            gap: 14px;
        }

        .contact-details li span:first-child {
            color: var(--gold);
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            min-width: 60px;
        }

        /* FORM */
        .contact-form {
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: white;
            padding: 12px 16px;
            font-family: 'Jost', sans-serif;
            font-size: 13px;
            font-weight: 300;
            outline: none;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--gold);
        }

        .form-group select option {
            background: var(--deep-brown);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 90px;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: var(--gold);
            color: white;
            border: none;
            font-family: 'Jost', sans-serif;
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 8px;
        }

        .btn-submit:hover {
            background: var(--gold-light);
        }

        /* FOOTER */
        footer {
            background: #1A1208;
            padding: 50px 8% 30px;
            color: rgba(255, 255, 255, 0.45);
            text-align: center;
        }

        .footer-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 30px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.7);
            letter-spacing: 4px;
            margin-bottom: 24px;
        }

        .footer-logo span {
            color: var(--gold);
        }

        .footer-nav {
            display: flex;
            justify-content: center;
            gap: 36px;
            list-style: none;
            margin-bottom: 30px;
        }

        .footer-nav a {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.45);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-nav a:hover {
            color: var(--gold);
        }

        .footer-divider {
            width: 40px;
            height: 1px;
            background: var(--gold);
            opacity: 0.4;
            margin: 24px auto;
        }

        .footer-copy {
            font-size: 11px;
            letter-spacing: 1px;
        }

        @media (max-width: 900px) {
            .about-strip, .contact-inner {
                grid-template-columns: 1fr;
            }

            .specialties-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .philosophy-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .nav-links {
                gap: 24px;
            }
        }

        @media (max-width: 600px) {
            nav {
                padding: 0 5%;
            }

            .nav-links {
                display: none;
            }

            .specialties-grid {
                grid-template-columns: 1fr;
            }

            .about-strip, .specialties, .philosophy, .contact {
                padding: 60px 5%;
            }
        }
    </style>
</head>
<body>

<nav id="mainNav">
    <a class="nav-logo" href="index.php">Arisht<span>é</span></a>
    <ul class="nav-links">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="menu.php">Menus</a></li>
    </ul>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <p class="hero-eyebrow">Established in Colombo · Sri Lanka</p>
        <h1 class="hero-title">Tradition Made<br><em>Deliciously Modern</em></h1>
        <p class="hero-sub">Crafting Traditional Wellness</p>
        <a href="menu.php" class="btn-primary">Discover Specialties</a>
    </div>
    <div class="hero-scroll">Scroll</div>
</section>

<!-- ABOUT -->

<section class="about-strip">
    <div class="about-image-wrap">
        <img src="images/Kavili1.jpg" alt="Arishte Heritage Kitchen">
    </div>
    <div class="about-text">
        <p class="section-label">Our Story</p>
        <h2 class="section-title">Roots in Heritage,<br><em>Crafted for the Modern Palate</em></h2>
        <p class="section-body">Arishte was born from a deep reverence for Sri Lankan culinary traditions. We bridge the
            gap between ancient herbal wisdom and contemporary gourmet experiences, ensuring every platter of kavili and
            bowl of herbal kanda reflects the vibrant spirit of our island. Our commitment to premium quality is an
            invitation to rediscover wellness through artisanal taste.</p>
        <a href="portfolio.php" class="btn-secondary">Explore Our Work</a>
    </div>
</section>

<!-- TICKER -->
<div class="ticker">
    <div class="ticker-inner">
        <span class="ticker-text">Ancient Wisdom</span><span class="ticker-dot">◆</span>
        <span class="ticker-text">Traditional Herbal Healing</span><span class="ticker-dot">◆</span>
        <span class="ticker-text">Pure Sri Lankan Ingredients</span><span class="ticker-dot">◆</span>
        <span class="ticker-text">Natural Vitality</span><span class="ticker-dot">◆</span>
        <span class="ticker-text">Cultural Heritage</span><span class="ticker-dot">◆</span>
        <span class="ticker-text">Handcrafted Wellness</span><span class="ticker-dot">◆</span>
        <span class="ticker-text">Ancient Wisdom</span><span class="ticker-dot">◆</span>
        <span class="ticker-text">Traditional Herbal Healing</span><span class="ticker-dot">◆</span>
        <span class="ticker-text">Pure Sri Lankan Ingredients</span><span class="ticker-dot">◆</span>
        <span class="ticker-text">Natural Vitality</span><span class="ticker-dot">◆</span>
        <span class="ticker-text">Cultural Heritage</span><span class="ticker-dot">◆</span>
        <span class="ticker-text">Handcrafted Wellness</span><span class="ticker-dot">◆</span>
    </div>
</div>

<!-- SPECIALTIES -->
<section class="specialties">
    <div class="section-header">
        <p class="section-label" style="justify-content:center;">Featured</p>
        <h2 class="section-title" style="text-align:center;">Signature Heritage Specialties</h2>
        <p class="section-body" style="max-width:600px;margin:0 auto;">Discover our curated collection of artisanal Sri
            Lankan flavours, from nutrient-dense herbal kanda to festive Kavili platters meticulously crafted with
            heritage techniques.</p>
    </div>
    <div class="specialties-grid">
        <div class="specialty-card">
            <img src="https://static.wixstatic.com/media/bde431_cd18856b86604cc39e312efe3f63e158~mv2.jpg"
                 alt="Hathmaluwa Herbal Kanda">
            <div class="specialty-overlay">
                <div class="specialty-name">Hathmaluwa Herbal Kanda</div>
                <div class="specialty-desc">An artisanal blend of traditional healing greens.</div>
            </div>
        </div>
        <div class="specialty-card">
            <img src="https://static.wixstatic.com/media/bde431_a52d619329a04350984a0a8a7f851554~mv2.jpg"
                 alt="Awrudu Kavili Platter">
            <div class="specialty-overlay">
                <div class="specialty-name">Awrudu Kavili Platter</div>
                <div class="specialty-desc">Our signature selection of heritage festive sweets.</div>
            </div>
        </div>
        <div class="specialty-card">
            <img src="https://static.wixstatic.com/media/bde431_86d979a3ea2145d2b66f4b18c167b622~mv2.jpg"
                 alt="Gotukola Wellness Blend">
            <div class="specialty-overlay">
                <div class="specialty-name">Gotukola Wellness Blend</div>
                <div class="specialty-desc">High-nutrient vitality drink derived from premium leaves.</div>
            </div>
        </div>
        <div class="specialty-card">
            <img src="https://static.wixstatic.com/media/bde431_0c394f5a470a4743825f10982f9f7578~mv2.jpg"
                 alt="Karapincha Vitality Porridge">
            <div class="specialty-overlay">
                <div class="specialty-name">Karapincha Vitality Porridge</div>
                <div class="specialty-desc">A nourishing tonic prepared with traditional stone-ground techniques.</div>
            </div>
        </div>
        <div class="specialty-card">
            <img src="https://static.wixstatic.com/media/bde431_9ffd46879dff4985b67623546e379d83~mv2.jpg"
                 alt="Kokis & Mun-Kavum Trio">
            <div class="specialty-overlay">
                <div class="specialty-name">Kokis & Mun-Kavum Trio</div>
                <div class="specialty-desc">Artisanal festive favorites, light and delightfully crispy.</div>
            </div>
        </div>
        <div class="specialty-card">
            <img src="https://static.wixstatic.com/media/bde431_cbfd4f13d10c4ce597322583fe6d17b7~mv2.jpg"
                 alt="Konda Kavum Collection">
            <div class="specialty-overlay">
                <div class="specialty-name">Konda Kavum Collection</div>
                <div class="specialty-desc">Heritage oil cakes made with organic rice flour and treacle.</div>
            </div>
        </div>
    </div>
</section>

<!-- PHILOSOPHY -->
<section class="philosophy">
    <div class="section-header">
        <p class="section-label" style="justify-content:center;">Our Philosophy</p>
        <h2 class="section-title" style="text-align:center;">Where Every Ingredient<br><em>Tells a Story</em></h2>
    </div>
    <div class="philosophy-grid">
        <div class="philosophy-item">
            <div class="philosophy-num">01</div>
            <div class="philosophy-title">Heirloom Greens</div>
            <p class="philosophy-text">We source heritage Sri Lankan herbs, hand-picked for their specific Ayurvedic
                properties and seasonal nutritional value.</p>
        </div>
        <div class="philosophy-item">
            <div class="philosophy-num">02</div>
            <div class="philosophy-title">Vital Grains</div>
            <p class="philosophy-text">The foundation of our kanda relies on traditional rice varieties that provide
                sustained energy and essential minerals.</p>
        </div>
        <div class="philosophy-item">
            <div class="philosophy-num">03</div>
            <div class="philosophy-title">Artisanal Method</div>
            <p class="philosophy-text">Each small batch is prepared using ancient techniques that preserve enzymatic
                activity and natural antioxidant profiles.</p>
        </div>
    </div>
</section>

<!-- BANNER -->
<div class="banner">
    <div class="banner-bg"></div>
    <div class="banner-content">
        <h2 class="banner-title">Tradition Made<br><em>Deliciously Modern</em></h2>
        <a href="menu.php" class="btn-primary">View Our Menus</a>
    </div>
</div>

<!-- CONTACT -->
<section class="contact" id="contact">
    <div class="contact-inner">
        <div class="contact-info">
            <p class="section-label" style="color:var(--gold-light);">Reach Us</p>
            <h2><em>Inquire &</em><br>Taste Tradition</h2>
            <p>Visit Arishte Heritage Kitchen and experience the richness of Sri Lankan culinary heritage in every
                bite.</p>
            <ul class="contact-details">
                <li><?php echo $address; ?></li>
                <li><span>Email</span><span><a href="mailto:info@arishte.com">info
                    @arishte.com</a></span></li>
                <li><span>Phone</span><span><a href="tel:+94707482492">+94707482492</a></span></li>
            </ul>
        </div>
        <div class="contact-form">
            <p class="section-label" style="color:var(--gold-light);">Application Form</p>
            <div class="form-row">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" placeholder="First name">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" placeholder="Last name">
                </div>
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" placeholder="your@email.com">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" placeholder="+94 ...">
            </div>
            <div class="form-group">
                <label>Position Applying For</label>
                <input type="text" placeholder="Position">
            </div>
            <div class="form-group">
                <label>Current / Previous Company</label>
                <input type="text" placeholder="Company name">
            </div>
            <div class="form-group">
                <label>Work Experience</label>
                <textarea placeholder="Brief description of your experience..."></textarea>
            </div>
            <button class="btn-submit">Submit Application</button>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-logo">Arisht<span>é</span></div>
    <ul class="footer-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="menu.php">Menus</a></li>
    </ul>
    <div class="footer-divider"></div>
    <p class="footer-copy">© 2026 Arishte. Tradition Made Deliciously Modern. &nbsp;|&nbsp; Privacy Policy &nbsp;|&nbsp;
        Terms of Service</p>
</footer>

<script>
    const nav = document.getElementById('mainNav');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 40);
    });
</script>
</body>
</html>
