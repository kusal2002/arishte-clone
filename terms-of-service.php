<!DOCTYPE html>
<html lang="en">
<?php
include 'values.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service | Arishte</title>
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
            margin-top: 72px;
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

        /* CONTENT SECTION */
        .content-section {
            padding: 70px 8%;
            background: var(--warm-white);
            max-width: 900px;
            margin: 0 auto;
        }

        .content-section h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            font-weight: 300;
            color: var(--deep-brown);
            margin: 40px 0 20px;
            line-height: 1.3;
        }

        .content-section h2:first-child {
            margin-top: 0;
        }

        .content-section h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            font-weight: 300;
            color: var(--mid-brown);
            margin: 30px 0 15px;
        }

        .content-section p {
            font-size: 15px;
            line-height: 1.8;
            color: var(--text-light);
            margin-bottom: 16px;
            font-weight: 300;
        }

        .content-section ul, .content-section ol {
            margin: 16px 0 16px 24px;
            font-size: 15px;
            line-height: 1.8;
            color: var(--text-light);
        }

        .content-section li {
            margin-bottom: 10px;
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

        .contact-details li {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            gap: 10px;
            margin-bottom: 8px;
            gap: 20px;
        }

        @media (max-width: 900px) {
            .footer-top {
                grid-template-columns: 1fr;
                gap: 36px;
            }

            .content-section {
                padding: 60px 5%;
            }
        }

        @media (max-width: 600px) {
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

            .content-section {
                padding: 50px 5%;
            }

            .content-section h2 {
                font-size: 24px;
                margin: 30px 0 15px;
            }

            .content-section h3 {
                font-size: 20px;
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
        <li><a href="menu.php">Menus</a></li>
    </ul>
</nav>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-bg"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content">
        <p class="page-hero-eyebrow">Legal</p>
        <h1 class="page-hero-title"><em>Terms</em> of Service</h1>
    </div>
</div>

<!-- CONTENT -->
<div class="content-section">
    <h2>Terms of Service</h2>
    
    <h3>1. Agreement to Terms</h3>
    <p>By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>

    <h3>2. Use License</h3>
    <p>Permission is granted to temporarily download one copy of the materials (information or software) from the Arishte website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
    <ul>
        <li>Modify or copy the materials</li>
        <li>Use the materials for any commercial purpose or for any public display</li>
        <li>Attempt to decompile or reverse engineer any software contained on Arishte website</li>
        <li>Remove any copyright or other proprietary notations from the materials</li>
        <li>Transfer the materials to another person or "mirror" the materials on any other server</li>
        <li>Violate any applicable laws or regulations related to the use of this website</li>
    </ul>

    <h3>3. Disclaimer</h3>
    <p>The materials on the Arishte website are provided "as is". Arishte makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>

    <h3>4. Limitations</h3>
    <p>In no event shall Arishte or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on the Arishte website.</p>

    <h3>5. Accuracy of Materials</h3>
    <p>The materials appearing on the Arishte website could include technical, typographical, or photographic errors. Arishte does not warrant that any of the materials on the website are accurate, complete, or current. Arishte may make changes to the materials contained on the website at any time without notice.</p>

    <h3>6. Links</h3>
    <p>Arishte has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by Arishte of the site. Use of any such linked website is at the user's own risk.</p>

    <h3>7. Modifications</h3>
    <p>Arishte may revise these terms of service for the website at any time without notice. By using this website, you are agreeing to be bound by the then current version of these terms of service.</p>

    <h3>8. Governing Law</h3>
    <p>These terms and conditions are governed by and construed in accordance with the laws of Sri Lanka, and you irrevocably submit to the exclusive jurisdiction of the courts in that location.</p>

    <h3>9. Contact Information</h3>
    <p>If you have any questions about these Terms of Service, please contact us:</p>
    <p><?php echo $email_text_only; ?></p>
</div>

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
    <ul class="footer-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="menu.php">Menus</a></li>
    </ul>
    <div class="footer-divider"></div>
    <p class="footer-copy">© 2026 Tradition Made Deliciously Modern. &nbsp;|&nbsp; <a href="privacy-policy.php">Privacy Policy</a> &nbsp;|&nbsp;
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
