<!DOCTYPE html>
<html lang="en">
<?php
include 'values.php';
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio | Arishte</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
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
    * { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body { font-family: 'Jost', sans-serif; background: var(--warm-white); color: var(--text); overflow-x: hidden; }

    nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 100;
      display: flex; align-items: center; justify-content: space-between;
      padding: 0 5%; height: 72px;
      background: rgba(253,250,245,0.95);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(184,150,90,0.15);
      transition: box-shadow 0.3s;
    }
    nav.scrolled { box-shadow: 0 2px 30px rgba(42,31,20,0.08); }
    .nav-logo { font-family: 'Cormorant Garamond', serif; font-size: 26px; font-weight: 300; color: var(--deep-brown); letter-spacing: 3px; text-decoration: none; }
    .nav-logo span { color: var(--gold); }
    .nav-links { display: flex; gap: 40px; list-style: none; }
    .nav-links a { font-size: 12px; font-weight: 500; letter-spacing: 2px; text-transform: uppercase; color: var(--text); text-decoration: none; position: relative; padding-bottom: 3px; transition: color 0.3s; }
    .nav-links a::after { content: ''; position: absolute; bottom: 0; left: 0; width: 0; height: 1px; background: var(--gold); transition: width 0.3s; }
    .nav-links a:hover { color: var(--gold); }
    .nav-links a:hover::after { width: 100%; }
    .nav-links a.active { color: var(--gold); }
    .nav-links a.active::after { width: 100%; }

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
      height: 420px; margin-top: 72px;
      position: relative; display: flex; align-items: flex-end;
      padding: 0 8% 60px; overflow: hidden;
    }
    .page-hero-bg {
      position: absolute; inset: 0;
      background-image: url('https://static.wixstatic.com/media/bde431_92b9edd04909442388f2af715dc70ba5~mv2.jpg');
      background-size: cover; background-position: center;
      filter: brightness(0.4);
    }
    .page-hero-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(to right, rgba(42,31,20,0.65) 0%, rgba(42,31,20,0.05) 100%);
    }
    .page-hero-content { position: relative; z-index: 2; color: white; }
    .page-hero-eyebrow { font-size: 11px; letter-spacing: 4px; text-transform: uppercase; color: var(--gold-light); margin-bottom: 14px; }
    .page-hero-title { font-family: 'Cormorant Garamond', serif; font-size: clamp(44px, 6vw, 76px); font-weight: 300; line-height: 1.1; }
    .page-hero-title em { font-style: italic; color: var(--gold-light); }

    /* PORTFOLIO INTRO */
    .portfolio-intro {
      padding: 70px 8%;
      background: var(--cream);
      text-align: center;
    }
    .portfolio-intro p {
      font-size: 11px; letter-spacing: 4px; text-transform: uppercase;
      color: var(--gold); margin-bottom: 20px;
      display: flex; align-items: center; justify-content: center; gap: 14px;
    }
    .portfolio-intro p::before, .portfolio-intro p::after {
      content: ''; width: 30px; height: 1px; background: var(--gold);
    }
    .portfolio-intro h2 {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(32px, 4vw, 52px); font-weight: 300;
      color: var(--deep-brown); line-height: 1.2;
    }
    .portfolio-intro h2 em { font-style: italic; color: var(--mid-brown); }

    /* PORTFOLIO GRID */
    .portfolio-section { padding: 0 8% 80px; background: var(--warm-white); }

    .portfolio-grid {
      display: grid;
      grid-template-columns: repeat(12, 1fr);
      gap: 3px;
      margin-top: 0;
    }

    /* Alternating layout */
    .portfolio-item {
      position: relative; overflow: hidden; cursor: pointer;
      background: var(--cream);
    }

    .portfolio-item:nth-child(1) { grid-column: span 7; grid-row: span 2; min-height: 520px; }
    .portfolio-item:nth-child(2) { grid-column: span 5; min-height: 256px; }
    .portfolio-item:nth-child(3) { grid-column: span 5; min-height: 256px; }
    .portfolio-item:nth-child(4) { grid-column: span 5; min-height: 340px; }
    .portfolio-item:nth-child(5) { grid-column: span 7; min-height: 340px; }
    .portfolio-item:nth-child(6) { grid-column: span 12; min-height: 400px; }

    .portfolio-item img {
      width: 100%; height: 100%;
      object-fit: cover; display: block;
      transition: transform 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .portfolio-item:hover img { transform: scale(1.06); }

    .portfolio-item-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(180deg, transparent 30%, rgba(42,31,20,0.85) 100%);
      display: flex; flex-direction: column; justify-content: flex-end;
      padding: 36px 32px;
      color: white;
      transform: translateY(4px);
      transition: transform 0.4s;
    }
    .portfolio-item:hover .portfolio-item-overlay { transform: translateY(0); }

    .portfolio-item-num {
      font-size: 10px; letter-spacing: 3px;
      text-transform: uppercase; color: var(--gold-light);
      margin-bottom: 10px;
    }

    .portfolio-item-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 26px; font-weight: 400;
      line-height: 1.25; margin-bottom: 10px;
    }

    .portfolio-item-desc {
      font-size: 13px; line-height: 1.7; font-weight: 300;
      opacity: 0;
      max-height: 0;
      overflow: hidden;
      transition: opacity 0.4s, max-height 0.4s;
      color: rgba(255,255,255,0.8);
    }
    .portfolio-item:hover .portfolio-item-desc {
      opacity: 1;
      max-height: 120px;
    }

    /* FEATURE QUOTE */
    .feature-quote {
      background: var(--deep-brown);
      padding: 80px 8%;
      text-align: center;
      color: white;
    }
    .feature-quote blockquote {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(28px, 4vw, 48px);
      font-weight: 300;
      font-style: italic;
      line-height: 1.4;
      color: rgba(255,255,255,0.9);
      max-width: 800px;
      margin: 0 auto 24px;
    }
    .feature-quote cite {
      font-size: 11px; letter-spacing: 3px; text-transform: uppercase;
      color: var(--gold);
    }

    /* FOUNDERS */
    .founders {
      padding: 80px 8%;
      background: var(--cream);
    }
    .founders-header { text-align: center; margin-bottom: 56px; }
    .founders-header h2 {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(30px, 4vw, 46px);
      font-weight: 300; color: var(--deep-brown);
    }
    .founders-header h2 em { font-style: italic; color: var(--mid-brown); }
    .founders-grid {
      display: grid; grid-template-columns: 1fr 1fr; gap: 60px;
      align-items: center;
    }
    .founders-img-wrap { position: relative; }
    .founders-img-wrap img {
      width: 100%; height: 460px; object-fit: cover; display: block;
    }
    .founders-img-wrap::after {
      content: '';
      position: absolute; bottom: -16px; right: -16px;
      width: 60%; height: 60%;
      border: 1px solid rgba(184,150,90,0.3);
      pointer-events: none; z-index: -1;
    }
    .founders-text { padding: 20px 0; }
    .founders-text .section-label {
      font-size: 10px; letter-spacing: 4px; text-transform: uppercase;
      color: var(--gold); margin-bottom: 18px;
      display: flex; align-items: center; gap: 12px;
    }
    .founders-text .section-label::after {
      content: ''; flex: 1; max-width: 36px; height: 1px; background: var(--gold);
    }
    .founders-text h3 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 36px; font-weight: 300; color: var(--deep-brown);
      margin-bottom: 20px; line-height: 1.2;
    }
    .founders-text h3 em { font-style: italic; }
    .founders-text p {
      font-size: 14px; line-height: 1.9; color: var(--text-light);
      font-weight: 300; margin-bottom: 12px;
    }

    /* FOOTER */
    .site-footer {
      background: var(--deep-brown);
      padding: 80px 8% 40px;
      color: rgba(255,255,255,0.5);
    }
    .footer-top {
      display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 60px;
      padding-bottom: 50px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      margin-bottom: 36px;
    }
    .footer-col-title {
      font-size: 10px; letter-spacing: 3px; text-transform: uppercase;
      color: var(--gold); margin-bottom: 20px;
    }
    .footer-col p, .footer-col address {
      font-size: 13px; line-height: 2; font-style: normal;
      color: rgba(255,255,255,0.55);
    }
    .footer-col a {
      
      color: rgba(255,255,255,0.55); text-decoration: none;
      display: block; margin-bottom: 10px; transition: color 0.3s;
    }
    .footer-col a:hover { color: var(--gold); }
    .footer-brand {
      font-family: 'Cormorant Garamond', serif;
      font-size: 28px; font-weight: 300;
      color: rgba(255,255,255,0.7); letter-spacing: 4px; margin-bottom: 14px;
    }
    .footer-brand span { color: var(--gold); }
    .footer-bottom { text-align: center; font-size: 11px; letter-spacing: 1px; }

    .logo-img {
      height: 110px;  
      width: auto;
    }

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
        .logo-footer {
          height: 110px; 
          margin-top: -30px; 
          width: auto;
        }

        .contact-details li {
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    display: flex;
    gap: 10px;
    margin-bottom: 8px;
    gap: 20px;
}


    @media (max-width: 900px) {
      .portfolio-item:nth-child(1),
      .portfolio-item:nth-child(2),
      .portfolio-item:nth-child(3),
      .portfolio-item:nth-child(4),
      .portfolio-item:nth-child(5),
      .portfolio-item:nth-child(6) { grid-column: span 12; min-height: 300px; }
      .founders-grid { grid-template-columns: 1fr; }
      .footer-top { grid-template-columns: 1fr; gap: 36px; }
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
      <li><a href="portfolio.html" class="active">Portfolio</a></li>
      <li><a href="menu.php">Menus</a></li>
    </ul>
  </nav>

  <!-- PAGE HERO -->
  <div class="page-hero">
    <div class="page-hero-bg"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content">
      <p class="page-hero-eyebrow">Our Work</p>
      <h1 class="page-hero-title">The <em>Portfolio</em></h1>
    </div>
  </div>

  <!-- INTRO -->
  <div class="portfolio-intro">
    <p>Craftsmanship &amp; Heritage</p>
    <h2>Where Every Project<br><em>Tells a Sri Lankan Story</em></h2>
  </div>

  <!-- PORTFOLIO GRID -->
  <section class="portfolio-section">
    <div class="portfolio-grid">

      <div class="portfolio-item">
        <img src="https://static.wixstatic.com/media/bde431_92b9edd04909442388f2af715dc70ba5~mv2.jpg" alt="Awrudu Kavili Platters">
        <div class="portfolio-item-overlay">
          <div class="portfolio-item-num">01</div>
          <div class="portfolio-item-name">Awrudu Kavili Platters</div>
          <p class="portfolio-item-desc">An elegant display of Arishte's Awrudu kavili platters. This project focuses on the artful arrangement of traditional Sri Lankan sweets and savouries, celebrating festive occasions with a touch of refined nostalgia.</p>
        </div>
      </div>

      <div class="portfolio-item">
        <img src="https://static.wixstatic.com/media/bde431_f8dd0c8fdf614b77ad6825889c261e14~mv2.jpg" alt="Wellness Through Tradition">
        <div class="portfolio-item-overlay">
          <div class="portfolio-item-num">02</div>
          <div class="portfolio-item-name">Wellness Through Tradition</div>
          <p class="portfolio-item-desc">Illustrating Arishte's commitment to wellness via Sri Lankan food traditions, bridging ancient wisdom with contemporary healthy living.</p>
        </div>
      </div>

      <div class="portfolio-item">
        <img src="https://static.wixstatic.com/media/bde431_7c82b253a83243eeb8383d0be56365f3~mv2.jpg" alt="The Art of Sri Lankan Confections">
        <div class="portfolio-item-overlay">
          <div class="portfolio-item-num">03</div>
          <div class="portfolio-item-name">The Art of Sri Lankan Confections</div>
          <p class="portfolio-item-desc">A detailed showcase of the craftsmanship involved in creating Arishte's kavili, highlighting the meticulous preparation of each traditional sweet.</p>
        </div>
      </div>

      <div class="portfolio-item">
        <img src="https://static.wixstatic.com/media/bde431_c3821fee0c5c4d3dadb53e8c36d69d8f~mv2.jpg" alt="Modernising Sri Lankan Delicacies">
        <div class="portfolio-item-overlay">
          <div class="portfolio-item-num">04</div>
          <div class="portfolio-item-name">Modernising Sri Lankan Delicacies</div>
          <p class="portfolio-item-desc">Demonstrating Arishte's unique approach to blending timeless Sri Lankan food traditions with modern aesthetics and refined presentation.</p>
        </div>
      </div>

      <div class="portfolio-item">
        <img src="https://static.wixstatic.com/media/bde431_9efda438cdd5473a89b17d76f0a7d3d8~mv2.jpg" alt="Arishte Brand Story">
        <div class="portfolio-item-overlay">
          <div class="portfolio-item-num">05</div>
          <div class="portfolio-item-name">Arishte Brand Story</div>
          <p class="portfolio-item-desc">A conceptualisation of Arishte's brand narrative, emphasising the fusion of
            nostalgia, wellness, and celebration. Led by founders Hasnika Weerakoon and Sidath Gajanayaka.</p>
        </div>
      </div>

      <div class="portfolio-item">
        <img src="https://static.wixstatic.com/media/bde431_074eb2f59e36466ba3b8fd995345e05f~mv2.jpg" alt="Heritage Porridge Collection">
        <div class="portfolio-item-overlay">
          <div class="portfolio-item-num">06</div>
          <div class="portfolio-item-name">Arishte: Heritage Porridge Collection</div>
          <p class="portfolio-item-desc">Showcasing Arishte's signature traditional Sri Lankan herbal kanda. This project highlights the authentic ingredients, health benefits, and rich culinary heritage of each porridge varieties, presented with modern elegance.</p>
        </div>
      </div>

    </div>
  </section>

  <!-- QUOTE -->
  <div class="feature-quote">
    <blockquote>"Each creation is an act of remembrance — a thread between our ancestors' wisdom and tomorrow's table."</blockquote>
    <cite>Arishte Heritage Kitchen</cite>
  </div>

  <!-- FOUNDERS -->
  <section class="founders">
    <div class="founders-header">
      <h2>The <em>Founders</em></h2>
    </div>
    <div class="founders-grid">
      <div class="founders-img-wrap">
        <img src="<?php echo $logo_url; ?>" alt="Arishte Founders">
      </div>
      <div class="founders-text">
        <p class="section-label">Our Vision</p>
<!--        <h3>Hasnika Weerakoon &<br><em>Sidath Gajanayaka</em></h3>-->
        <p>The Arishte brand story was brought to life by founders Hasnika Weerakoon and Sidath Gajanayaka — a
          conceptualisation that encapsulates the essence of preserving and sharing Sri Lanka's rich food heritage.</p>
        <p>Their work emphasises the fusion of nostalgia, wellness, and celebration, and has become the guiding force behind every product, presentation, and experience that bears the Arishté name.</p>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <section class="site-footer">
    <div class="footer-top">
      <div class="footer-col">
        <a class="footer-logo" href="index.php">
          <img src="images/ArishteLogo.png" alt="Arishte Logo" class="logo-footer">
        </a>

        <p>Arishte honours the soulful heritage of Sri Lanka, blending ancestral herbal wisdom with gourmet craftsmanship for a contemporary lifestyle.</p>
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
