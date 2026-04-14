<!DOCTYPE html>
<html lang="en">
<?php
include 'values.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:title" content="Arishte" />
    <meta property="og:description" content="Tradition made deliciously modern..." />
    <meta property="og:image" content="https://arishte.com/images/ArishteLogo.png" />
    <meta property="og:url" content="https://arishte.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:type" content="image/png" />

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Arishte",
            "url": "https://arishte.com/",
            "logo": "https://arishte.com/images/ArishteLogo.png"
        }
        </script>

    <title>Menu | Arishte</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/ArishteLogo.png">
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

        .hamburger {
            display: none;
            flex-direction: column;
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: var(--deep-brown);
            margin: 4px 0;
            transition: all 0.3s ease;
            display: block;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(10px, 10px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        /* PAGE HERO */
        .page-hero {
            height: 420px;
            position: relative;
            display: flex;
            align-items: flex-end;
            padding: 0 8% 60px;
            overflow: hidden;
        }

        .page-hero-bg {
            position: absolute;
            inset: 0;
            background-image: url('https://static.wixstatic.com/media/bde431_6765426448244c2da9ba45ab0e38c23c~mv2.png');
            background-size: cover;
            background-position: center;
            filter: brightness(0.45);
        }

        .page-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(42, 31, 20, 0.7) 0%, rgba(42, 31, 20, 0.1) 100%);
        }

        .page-hero-content {
            position: relative;
            z-index: 2;
            color: white;
        }

        .page-hero-eyebrow {
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--gold-light);
            margin-bottom: 14px;
        }

        .page-hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(44px, 6vw, 76px);
            font-weight: 300;
            line-height: 1.1;
        }

        .page-hero-title em {
            font-style: italic;
            color: var(--gold-light);
        }

        /* MENU INTRO */
        .menu-intro {
            background: var(--cream);
            padding: 70px 8%;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 60px;
            align-items: start;
        }

        .menu-intro-label {
            font-family: 'Cormorant Garamond', serif;
            font-size: 48px;
            font-weight: 300;
            line-height: 1.1;
            color: var(--deep-brown);
        }

        .menu-intro-label em {
            display: block;
            font-style: italic;
            color: var(--gold);
        }

        .menu-intro-text {
            font-size: 15px;
            line-height: 1.9;
            color: var(--text-light);
            font-weight: 300;
            padding-top: 10px;
        }

        /* SECTION DIVIDER */
        .section-divider {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 0 8%;
            margin: 60px 0 0;
        }

        .section-divider::before,
        .section-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(184, 150, 90, 0.25);
        }

        .section-divider span {
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--gold);
            white-space: nowrap;
        }

        /* KANDA SECTION */
        .menu-section {
            padding: 60px 8%;
            background: var(--warm-white);
        }

        .menu-section-header {
            margin-bottom: 48px;
        }

        .menu-section-header h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(30px, 4vw, 46px);
            font-weight: 300;
            color: var(--deep-brown);
            margin-bottom: 12px;
        }

        .menu-section-header h2 em {
            font-style: italic;
            color: var(--mid-brown);
        }

        .menu-section-header p {
            font-size: 14px;
            line-height: 1.8;
            color: var(--text-light);
            max-width: 640px;
            font-weight: 300;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2px;
        }

        .menu-card {
            position: relative;
            overflow: hidden;
            background: var(--cream);
            display: grid;
            grid-template-columns: 200px 1fr;
            min-height: 180px;
        }

        .menu-card-img {
            width: 200px;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s;
        }

        .menu-card:hover .menu-card-img {
            transform: scale(1.05);
        }

        .menu-card-body {
            padding: 30px 28px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 10px;
        }

        .menu-card-tags {
            display: flex;
            gap: 8px;
        }

        .menu-tag {
            font-size: 9px;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 3px 10px;
            border: 1px solid var(--sage);
            color: var(--sage);
            border-radius: 0;
        }

        .menu-card-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            color: var(--deep-brown);
        }

        .menu-card-desc {
            font-size: 13px;
            line-height: 1.75;
            color: var(--text-light);
            font-weight: 300;
        }

        .menu-card-price {
            font-size: 14px;
            color: var(--gold);
            font-weight: 500;
            letter-spacing: 1px;
        }

        /* INFUSIONS */
        .infusions-section {
            padding: 60px 8%;
            background: var(--cream);
        }

        .infusions-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
            margin-top: 48px;
        }

        .infusion-card {
            background: var(--warm-white);
            overflow: hidden;
        }

        .infusion-card img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s;
        }

        .infusion-card:hover img {
            transform: scale(1.05);
        }

        .infusion-body {
            padding: 28px 24px;
        }

        .infusion-body h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            color: var(--deep-brown);
            margin-bottom: 10px;
        }

        .infusion-body p {
            font-size: 13px;
            line-height: 1.8;
            color: var(--text-light);
            font-weight: 300;
        }

        /* FOOTER */
        .site-footer {
            background: var(--deep-brown);
            padding: 80px 8% 40px;
            color: rgba(255, 255, 255, 0.5);
        }

        .footer-top {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 60px;
            padding-bottom: 50px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 36px;
        }

        .footer-col-title {
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 20px;
        }

        .footer-col p, .footer-col address {
            font-size: 13px;
            line-height: 2;
            font-style: normal;
            color: rgba(255, 255, 255, 0.55);
        }

        .footer-col a {
            color: rgba(255, 255, 255, 0.55);
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: color 0.3s;
        }

        .footer-col a:hover {
            color: var(--gold);
        }

        .footer-brand {
            display: flex;
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.7);
            letter-spacing: 4px;
            margin-bottom: 14px;
        }

        .footer-brand span {
            color: var(--gold);
        }

        .footer-bottom {
            text-align: center;
            font-size: 11px;
            letter-spacing: 1px;
        }

        .logo-img {
            height: 110px;
            width: auto;
        }

        .logo-footer {
            height: 110px;
            margin-top: -30px;
            width: auto;
        }

        footer {
            background: #1A1208;
            padding: 50px 8% 30px;
            color: rgba(255, 255, 255, 0.45);
            text-align: center;
        }

        .footer-logo {
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

        .footer-copy a {
            color: rgba(255, 255, 255, 0.45);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-copy a:hover {
            color: var(--gold);
        }

        .logo-img {
            height: 110px;
            width: auto;
        }


        /* Make the two blocks side by side */
        .contact-columns {
            display: flex;
            justify-content: space-between; /* left block left, right block right */
            align-items: flex-start;
            gap: 40px; /* space between columns */
        }

        /* Left block: contact info styling */
        .contact-info {
            flex: 1; /* take available width */
        }

        /* Right block: brand & description */
        .contact-right {
            flex: 1; /* take available width */
            text-align: right; /* optional: align text to right */
        }

        /* Footer brand styling */
        .footer-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.7);
            letter-spacing: 4px;
            margin-bottom: 14px;
        }

        /* Optional: contact details styling */
        .contact-details li {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            gap: 10px;
            margin-bottom: 8px;
            gap: 20px;
        }

        @media (max-width: 900px) {
            .menu-intro {
                grid-template-columns: 1fr;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .infusions-grid {
                grid-template-columns: 1fr 1fr;
            }

            .footer-top {
                grid-template-columns: 1fr;
                gap: 36px;
            }
        }

        @media (max-width: 600px) {
            .menu-card {
                grid-template-columns: 1fr;
            }

            .menu-card-img {
                width: 100%;
                height: 200px;
            }

            .infusions-grid {
                grid-template-columns: 1fr;
            }

            nav {
                padding: 0 5%;
            }

            .hamburger {
                display: flex;
            }

            .nav-links {
                display: flex;
                position: absolute;
                top: 72px;
                left: 0;
                right: 0;
                background: rgba(253, 250, 245, 0.98);
                backdrop-filter: blur(12px);
                flex-direction: column;
                gap: 0;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
                border-bottom: 1px solid rgba(184, 150, 90, 0.15);
                z-index: 99;
            }

            .nav-links.active {
                max-height: 300px;
            }

            .nav-links li {
                padding: 16px 5%;
                border-bottom: 1px solid rgba(184, 150, 90, 0.1);
                display: block;
            }

            .nav-links a {
                font-size: 11px;
                display: block;
                padding-bottom: 0;
            }

            .nav-links a::after {
                display: none;
            }

            .nav-links a.active,
            .nav-links a:hover {
                color: var(--gold);
            }

            .page-hero {
                margin-top: 120px;
            }
        }
    </style>
</head>
<body>

<nav id="mainNav">
    <a class="nav-logo" href="index.php">
        <img src="images/ArishteLogo.png" alt="Arishte Logo" class="logo-img">
    </a>
    <button class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <ul class="nav-links" id="navLinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="menu.html" class="active">Menu</a></li>
    </ul>
</nav>

<!-- PAGE HERO -->
<div class="page-hero" style="margin-top:72px;">
    <div class="page-hero-bg"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content">
        <p class="page-hero-eyebrow">Arishté Kitchen</p>
        <h1 class="page-hero-title"><em>Menu</em></h1>
    </div>
</div>

<!-- INTRO -->
<div class="menu-intro">
    <div class="menu-intro-label">Morning <em>Rituals</em></div>
    <p class="menu-intro-text">Start your day with intention, balance, and natural nourishment. Arishté Morning Rituals
        are thoughtfully crafted herbal blends inspired by traditional Sri Lankan wellness practices, designed to gently
        awaken your body, support digestion, and energise your mind. Each ritual is more than a drink — it's a moment of
        calm, clarity, and care before the day begins.</p>
</div>

<!-- KANDA MENU -->
<div class="section-divider"><span>Herbal Kanda Selection</span></div>
<section class="menu-section">
    <div class="menu-section-header">
        <h2>Arishté <em>Hot Morning Rituals</em></h2>
        <p>Traditional Sri Lankan herbal porridges, slow-crafted each morning with heritage grains and hand-picked
            botanicals.</p>
    </div>
    <div class="menu-grid">

        <div class="menu-card">
            <img src="https://static.wixstatic.com/media/bde431_df950dac44d74278936206bb4af2ac6c~mv2.png"
                 alt="Kurrakkan Strength" class="menu-card-img">
            <div class="menu-card-body">
                <div class="menu-card-tags">
                    <span class="menu-tag">Vegetarian</span>
                    <span class="menu-tag">Vegan</span>
                </div>
                <div class="menu-card-name">Kurrakkan Strength</div>
                <p class="menu-card-desc">Finger millet porridge rich in fibre and sustained energy.</p>
            </div>
        </div>

        <div class="menu-card">
            <img src="https://static.wixstatic.com/media/bde431_2b4a287f6af143c5b599ebfbf3e9a857~mv2.png"
                 alt="Diya Bath Balance" class="menu-card-img">
            <div class="menu-card-body">
                <div class="menu-card-name">Diya Bath Balance</div>
                <p class="menu-card-desc">A light and refreshing kanda made from traditional rice fermentation. Known
                    for its cooling and hydrating properties, this gentle blend supports digestion and helps your body
                    reset naturally.</p>
            </div>
        </div>

        <div class="menu-card">
            <img src="https://static.wixstatic.com/media/bde431_d60859b7052649fb82ece3d91be53cf1~mv2.png"
                 alt="Karapincha Boost" class="menu-card-img">
            <div class="menu-card-body">
                <div class="menu-card-name">Karapincha Boost</div>
                <p class="menu-card-desc">An aromatic herbal porridge crafted with fresh curry leaves and coconut milk.
                    Traditionally known to support metabolism and overall vitality.</p>
            </div>
        </div>

        <div class="menu-card">
            <img src="https://static.wixstatic.com/media/bde431_c560c5226a0f446f8b49676d4d31cf64~mv2.png"
                 alt="Walpenela Vital" class="menu-card-img">
            <div class="menu-card-body">
                <div class="menu-card-name">Walpenela Vital</div>
                <p class="menu-card-desc">A nourishing herbal kanda made with walpenela leaves, valued in traditional
                    Sri Lankan wellness for its immunity-supporting properties.</p>
            </div>
        </div>

        <div class="menu-card" style="grid-column: 1 / -1;">
            <img src="https://static.wixstatic.com/media/bde431_aa8124026bfd4991b3631306620b8c9a~mv2.png"
                 alt="Hathawariya Elixir" class="menu-card-img">
            <div class="menu-card-body">
                <div class="menu-card-name">Hathawariya Elixir</div>
                <p class="menu-card-desc">A premium herbal porridge made with hathawariya, known for supporting balance
                    and vitality. Smooth, nourishing, and deeply restorative, this kanda is ideal for recharging your
                    body and mind.</p>
            </div>
        </div>

    </div>
</section>

<!-- INFUSIONS -->
<div class="section-divider" style="background:var(--cream);"><span>Botanical Infusions</span></div>
<section class="infusions-section">
    <div class="menu-section-header">
        <h2>Arishté <em>Infusions</em></h2>
        <p>Delicate blends of fruits, spices, and botanicals, thoughtfully crafted to awaken the senses. Each infusion
            is light, aromatic, and designed for effortless, daily balance.</p>
    </div>
    <div class="infusions-grid">
        <div class="infusion-card">
            <img src="https://static.wixstatic.com/media/bde431_747417d71bac492eb9397f88f800a4b9~mv2.png"
                 alt="Spiced Apple Glow">
            <div class="infusion-body">
                <h3>Spiced Apple Glow</h3>
                <p>A delicate infusion of apple, aromatic spices, and coriander, gently brewed to create a smooth and
                    comforting finish. Naturally uplifting and beautifully balanced, this blend is designed to warm the
                    body and awaken the senses.</p>
            </div>
        </div>
        <div class="infusion-card">
            <img src="https://static.wixstatic.com/media/bde431_6765426448244c2da9ba45ab0e38c23c~mv2.png"
                 alt="Coriander Cleanse">
            <div class="infusion-body">
                <h3>Coriander Cleanse</h3>
                <p>A delicate coriander infusion, slowly brewed to release its soft warmth and gentle spice. Light,
                    clear, and calming, this blend offers a refreshing refreshing infusion with a smooth, comforting
                    finish.</p>
                <!--<p style="margin-top:12px;color:var(--gold);font-size:13px;font-weight:500;">LKR 7.50</p>-->
            </div>
        </div>
        <div class="infusion-card"
             style="background: linear-gradient(135deg, var(--deep-brown), var(--mid-brown)); display:flex; align-items:center; justify-content:center; padding:40px; min-height:300px;">
            <div style="text-align:center; color:white;">
                <div style="font-family:'Cormorant Garamond',serif; font-size:13px; letter-spacing:3px; text-transform:uppercase; color:var(--gold-light); margin-bottom:18px;">
                    Experience Arishte
                </div>
                <div style="font-family:'Cormorant Garamond',serif; font-size:32px; font-weight:300; line-height:1.3; margin-bottom:24px;">
                    Tradition Made<br><em>Deliciously Modern</em></div>
                <a href="index.php#contact"
                   style="display:inline-block;padding:12px 36px;border:1px solid var(--gold-light);color:var(--gold-light);font-size:11px;letter-spacing:3px;text-transform:uppercase;text-decoration:none;transition:background 0.3s;"
                   onmouseover="this.style.background='rgba(184,150,90,0.2)'"
                   onmouseout="this.style.background='transparent'">Book a Visit</a>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<!-- FOOTER -->
<section class="site-footer">
    <div class="footer-top">
        <div class="footer-col">
            <a class="footer-logo" href="index.php">
                <img src="images/ArishteLogo.png" alt="Arishte Logo" class="logo-footer">
            </a>

            <p>Arishte honours the soulful heritage of Sri Lanka, blending ancestral herbal wisdom with gourmet
                craftsmanship for a contemporary lifestyle.</p>
        </div>
        <div class="footer-col">
        </div>
        <div class="footer-col">
            <div class="footer-col-title">Experience Arishte</div>
            <address>
                <table style="border-collapse: collapse;">
                    <tr>
                        <td style="font-weight:bold; color: var(--gold); width: 100px; text-align: right; padding-right: 20px; vertical-align: top;">Address</td>
                        <td style="vertical-align: top;"><?php echo $address_text_only; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; color: var(--gold); width: 100px; text-align: right; padding-right: 20px; vertical-align: top;">Email</td>
                        <td style="vertical-align: top;"><?php echo $email_text_only; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold; color: var(--gold); width: 100px; text-align: right; padding-right: 20px; vertical-align: top;">Contact</td>
                        <td style="vertical-align: top;"><?php echo $contact_no_text_only; ?></td>
                    </tr>
                </table>

            </address>
        </div>
    </div>
</section>

<footer>
    <?php echo $social_icons; ?>
    <?php echo "<br>"; ?>

    <ul class="footer-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="menu.php">Menu</a></li>
    </ul>
    <div class="footer-divider"></div>
    <p class="footer-copy">© 2026 Arishte. Tradition Made Deliciously Modern. &nbsp;|&nbsp; <a href="privacy-policy.php">Privacy Policy</a> &nbsp;|&nbsp;
        <a href="terms-of-service.php">Terms of Service</a></p>
</footer>

<script>
    const nav = document.getElementById('mainNav');
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');
    
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 40);
    });

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navLinks.classList.toggle('active');
    });

    navLinks.addEventListener('click', (e) => {
        if (e.target.tagName === 'A') {
            hamburger.classList.remove('active');
            navLinks.classList.remove('active');
        }
    });
</script>
</body>
</html>
