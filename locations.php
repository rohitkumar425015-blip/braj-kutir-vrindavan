<?php
$zones = [
  ['name' => 'Temple Quarter', 'subtitle' => 'For the rhythm of old Vrindavan', 'copy' => 'A close-to-the-heart address for mornings by the ghats, temple walks and a life shaped by the cityâ€™s timeless rituals.', 'time' => '08â€“15 min', 'image' => 'https://images.unsplash.com/photo-1590077428593-a55bb07c4665?auto=format&fit=crop&w=1200&q=85'],
  ['name' => 'Keshav Dham Road', 'subtitle' => 'For a quieter second home', 'copy' => 'A calm residential corridor near Prem Mandir, with the space and convenience to settle into longer stays.', 'time' => '08 min to Prem Mandir', 'image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1200&q=85'],
  ['name' => 'NH-19 / Chatikara', 'subtitle' => 'For a connected future', 'copy' => 'A high-potential edge of Vrindavan with township, plot and commercial opportunities along the cityâ€™s growth corridor.', 'time' => '25 min to Yamuna Expressway', 'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=85'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="Explore Vrindavan's most considered neighbourhoods, from the Temple Quarter to Keshav Dham Road and NH-19.">
  <title>Locations | Braj Kutir â€” Find your part of Vrindavan</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;1,500;1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"><link rel="stylesheet" href="styles.css">
</head>
<body class="locations-page">
  <nav class="navbar premium-nav" id="navbar"><div class="container">
    <a href="index.php" class="nav-logo"><span class="home-mark">BK</span><span class="home-logo-word">Braj Kutir<small>REAL ESTATE</small></span></a>
    <div class="nav-links"><a href="index.php">Home</a><a href="projects.php">Projects</a><a href="locations.php" class="active">Locations</a><a href="aboutus.php">About us</a><a href="invest-in-vrindavan.php">Why Vrindavan</a><a href="#enquire" class="nav-cta">Schedule a visit</a></div>
    <button class="nav-hamburger" aria-label="Open menu"><span></span><span></span><span></span></button>
  </div></nav>
  <div class="mobile-menu" id="mobileMenu"><button class="mobile-menu-close">&times;</button><a href="index.php">Home</a><a href="projects.php">Projects</a><a href="locations.php">Locations</a><a href="aboutus.php">About us</a><a href="invest-in-vrindavan.php">Why Vrindavan</a><a href="#enquire">Schedule a visit</a></div>
  <header class="locations-hero"><div class="container"><span class="home-eyebrow">The neighbourhoods of Braj</span><h1>Every address<br><em>has a feeling.</em></h1><p>Vrindavan is not one place. It is a collection of rhythms, rituals and possibilities. Find the one that feels like yours.</p></div></header>
  <main>
    <section class="location-intro section"><div class="container location-intro-grid"><div><span class="home-eyebrow">A local perspective</span><h2>Choose the view<br><em>you want to wake up to.</em></h2></div><div><p>From the energy of the old city to the promise of the new growth corridors, our on-ground team helps you read Vrindavan beyond a map pin.</p><a class="under-link" href="projects.php">Explore projects by location <i class="fas fa-arrow-right"></i></a></div></div></section>
    <section class="zone-section"><div class="container"><div class="zone-list"><?php foreach ($zones as $index => $zone): ?><article class="zone-card"><div class="zone-image" style="background-image:url('<?= htmlspecialchars($zone['image']) ?>')"><span>0<?= $index + 1 ?></span></div><div class="zone-copy"><span class="home-eyebrow"><?= htmlspecialchars($zone['subtitle']) ?></span><h2><?= htmlspecialchars($zone['name']) ?></h2><p><?= htmlspecialchars($zone['copy']) ?></p><div class="zone-meta"><span><i class="fas fa-clock"></i> <?= htmlspecialchars($zone['time']) ?></span><a class="under-link" href="projects.php">View opportunities <i class="fas fa-arrow-right"></i></a></div></div></article><?php endforeach; ?></div></div></section>
    <section class="location-map-story section"><div class="container location-map-grid"><div class="stylised-map"><span class="map-route route-one"></span><span class="map-route route-two"></span><span class="map-marker marker-one">Temple Quarter</span><span class="map-marker marker-two">Keshav Dham</span><span class="map-marker marker-three">NH-19</span><div class="map-compass">N<br><small>Vrindavan</small></div></div><div><span class="home-eyebrow">The wider connection</span><h2>Close to what<br><em>moves you forward.</em></h2><p>Positioned between spiritual heritage and improving regional connectivity, Vrindavan offers a rare balance of meaning, access and long-term potential.</p><ul class="location-points"><li><strong>03 hrs</strong><span>Delhi via Yamuna Expressway</span></li><li><strong>01 hr</strong><span>Agra via NH-19</span></li><li><strong>08â€“25 min</strong><span>Key local destinations</span></li></ul></div></div></section>
    <section class="project-enquiry" id="enquire"><div class="container"><div><span class="home-eyebrow">See it in person</span><h2>Let us show you<br><em>your Vrindavan.</em></h2><p>Tell us which part of the city interests you and our local advisor will curate a private route.</p></div><form id="contactForm" class="enquiry-form"><input name="name" placeholder="Your name" required><input name="phone" placeholder="Mobile number" required><input type="email" name="email" placeholder="Email address" required><select name="location"><option>Temple Quarter</option><option>Keshav Dham Road</option><option>NH-19 / Chatikara</option><option>Help me choose</option></select><button class="home-button home-button-light" type="submit">Plan my visit <i class="fas fa-arrow-right"></i></button></form></div></section>
  </main>
  <footer class="home-footer"><div class="container"><div class="footer-main"><div><a href="index.php" class="nav-logo"><span class="home-mark">BK</span><span class="home-logo-word">Braj Kutir<small>REAL ESTATE</small></span></a><p>Experience Vrindavan.<br>Discover your space.</p></div><div class="footer-links"><div><span>Explore</span><a href="projects.php">Projects</a><a href="locations.php">Locations</a><a href="invest-in-vrindavan.php">Why Vrindavan</a></div><div><span>Connect</span><a href="#enquire">Schedule a visit</a><a href="tel:+917080005021">Call our team</a><a href="https://wa.me/917080005021">WhatsApp</a></div><div><span>Visit</span><p>Vrindavan, Uttar Pradesh<br>India 281121</p><a href="mailto:sachin.paurush@vcm.org.in">sachin.paurush@vcm.org.in</a></div></div></div><div class="footer-bottom"><span>Â© 2026 Braj Kutir Real Estate</span><span>Built on transparency, simplicity & trust.</span><span><a href="#">Privacy</a> Â· <a href="#">Terms</a></span></div></div></footer>
  <script src="script.js"></script>
</body>
</html>


