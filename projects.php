<?php
$projects = [
  [
    'slug' => 'shri-radha-sharnam', 'name' => 'Shri Radha Sharnam', 'type' => 'Residential',
    'location' => 'Keshav Dham Road', 'budget' => 'â‚¹74.65 L onwards', 'budget_key' => 'under-1cr',
    'status' => 'Ready to move', 'configuration' => '1 BHK', 'tag' => 'Featured residence',
    'image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1200&q=85',
    'intro' => 'Fully furnished residences designed for long weekends, longer stays and a life at a gentler pace.'
  ],
  [
    'slug' => 'raal-road-township', 'name' => 'RAAL Road Township', 'type' => 'Plots & Land',
    'location' => 'NH-19, Chatikara', 'budget' => 'â‚¹120 / sq. yd. onwards', 'budget_key' => 'under-1cr',
    'status' => 'Selling now', 'configuration' => 'Plots', 'tag' => '100-acre township',
    'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=85',
    'intro' => 'A considered township with generous green spaces, clear titles and room to make your own.'
  ],
  [
    'slug' => 'shri-vivek-heritage', 'name' => 'Shri Vivek Heritage', 'type' => 'Commercial',
    'location' => 'High street, Vrindavan', 'budget' => 'â‚¹55 L onwards', 'budget_key' => '1cr-3cr',
    'status' => 'Upcoming', 'configuration' => 'Retail & offices', 'tag' => 'High street living',
    'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1200&q=85',
    'intro' => 'Distinctive commercial spaces positioned for visibility, footfall and the next chapter of Vrindavan.'
  ],
  [
    'slug' => 'vrindawali-farms', 'name' => 'Vrindawali Farms & Residency', 'type' => 'Plots & Land',
    'location' => 'Outskirts of Vrindavan', 'budget' => 'â‚¹28,000 / sq. yd.', 'budget_key' => 'under-1cr',
    'status' => 'Selling now', 'configuration' => 'Farm plots', 'tag' => 'Slow living',
    'image' => 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1200&q=85',
    'intro' => 'Farmhouse living with open skies, landscaped avenues and a softer rhythm of everyday life.'
  ],
];
$filters = ['location' => $_GET['location'] ?? 'all', 'type' => $_GET['type'] ?? 'all', 'budget' => $_GET['budget'] ?? 'all', 'status' => $_GET['status'] ?? 'all', 'configuration' => $_GET['configuration'] ?? 'all'];
$matches = array_filter($projects, function ($project) use ($filters) {
  return ($filters['location'] === 'all' || stripos($project['location'], $filters['location']) !== false)
    && ($filters['type'] === 'all' || $project['type'] === $filters['type'])
    && ($filters['budget'] === 'all' || $project['budget_key'] === $filters['budget'])
    && ($filters['status'] === 'all' || $project['status'] === $filters['status'])
    && ($filters['configuration'] === 'all' || $project['configuration'] === $filters['configuration']);
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Discover considered residences, plots and commercial property in Vrindavan with Braj Kutir.">
  <title>Projects | Braj Kutir â€” Curated real estate in Vrindavan</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;1,500;1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"><link rel="stylesheet" href="styles.css">
</head>
<body class="projects-page">
  <nav class="navbar premium-nav" id="navbar"><div class="container">
    <a href="index.php" class="nav-logo"><span class="home-mark">BK</span><span class="home-logo-word">Braj Kutir<small>REAL ESTATE</small></span></a>
    <div class="nav-links"><a href="index.php">Home</a><a href="projects.php" class="active">Projects</a><a href="aboutus.php">About us</a><a href="invest-in-vrindavan.php">Why Vrindavan</a><a href="#enquire" class="nav-cta">Schedule a visit</a></div>
    <button class="nav-hamburger" aria-label="Open menu"><span></span><span></span><span></span></button>
  </div></nav>
  <div class="mobile-menu" id="mobileMenu"><button class="mobile-menu-close">&times;</button><a href="index.php">Home</a><a href="projects.php">Projects</a><a href="aboutus.php">About us</a><a href="invest-in-vrindavan.php">Why Vrindavan</a><a href="#enquire">Schedule a visit</a></div>

  <header class="collection-hero"><div class="container"><span class="eyebrow-dot"></span><span class="home-eyebrow">The Braj Kutir collection</span><h1>Find a place that<br><em>feels like yours.</em></h1><p>From a quiet weekend home to a considered investment, explore spaces chosen for their sense of place, potential and permanence.</p></div></header>
  <main>
    <section class="project-discovery"><div class="container">
      <div class="discovery-head"><div><span class="home-eyebrow">Explore the collection</span><h2>Projects, <em>with context.</em></h2></div><span class="result-count"><strong id="projectCount"><?= count($matches) ?></strong> spaces to explore</span></div>
      <form class="discovery-filters" id="projectFilters" method="get">
        <label>Location<select name="location"><option value="all">All locations</option><option value="Keshav" <?= $filters['location']==='Keshav'?'selected':'' ?>>Keshav Dham Road</option><option value="NH-19" <?= $filters['location']==='NH-19'?'selected':'' ?>>NH-19 / Chatikara</option><option value="Vrindavan" <?= $filters['location']==='Vrindavan'?'selected':'' ?>>Vrindavan</option></select></label>
        <label>Property type<select name="type"><option value="all">All types</option><option <?= $filters['type']==='Residential'?'selected':'' ?>>Residential</option><option <?= $filters['type']==='Plots & Land'?'selected':'' ?>>Plots &amp; Land</option><option <?= $filters['type']==='Commercial'?'selected':'' ?>>Commercial</option></select></label>
        <label>Budget<select name="budget"><option value="all">Any budget</option><option value="under-1cr" <?= $filters['budget']==='under-1cr'?'selected':'' ?>>Under â‚¹1 Cr</option><option value="1cr-3cr" <?= $filters['budget']==='1cr-3cr'?'selected':'' ?>>â‚¹1â€“3 Cr</option></select></label>
        <label>Availability<select name="status"><option value="all">Any status</option><option <?= $filters['status']==='Selling now'?'selected':'' ?>>Selling now</option><option <?= $filters['status']==='Ready to move'?'selected':'' ?>>Ready to move</option><option <?= $filters['status']==='Upcoming'?'selected':'' ?>>Upcoming</option></select></label>
        <label>Configuration<select name="configuration"><option value="all">Any configuration</option><option <?= $filters['configuration']==='1 BHK'?'selected':'' ?>>1 BHK</option><option <?= $filters['configuration']==='Plots'?'selected':'' ?>>Plots</option><option <?= $filters['configuration']==='Farm plots'?'selected':'' ?>>Farm plots</option><option <?= $filters['configuration']==='Retail & offices'?'selected':'' ?>>Retail &amp; offices</option></select></label>
        <button class="filter-reset" type="button" id="clearFilters">Clear all</button>
      </form>
      <div class="collection-grid" id="projectGrid"><?php foreach ($matches as $project): ?>
        <article class="collection-card reveal" data-location="<?= htmlspecialchars($project['location']) ?>" data-type="<?= htmlspecialchars($project['type']) ?>" data-budget="<?= $project['budget_key'] ?>" data-status="<?= htmlspecialchars($project['status']) ?>" data-configuration="<?= htmlspecialchars($project['configuration']) ?>">
          <a class="collection-image" href="project.php?project=<?= urlencode($project['slug']) ?>" style="background-image:url('<?= htmlspecialchars($project['image']) ?>')"><span><?= htmlspecialchars($project['tag']) ?></span><i class="fas fa-arrow-up-right-from-square"></i></a>
          <div class="collection-copy"><div class="project-type"><?= htmlspecialchars($project['type']) ?> Â· <?= htmlspecialchars($project['location']) ?></div><h3><?= htmlspecialchars($project['name']) ?></h3><p><?= htmlspecialchars($project['intro']) ?></p><div class="collection-meta"><span><small>From</small><?= htmlspecialchars($project['budget']) ?></span><span><small>Configuration</small><?= htmlspecialchars($project['configuration']) ?></span></div><a class="text-arrow" href="project.php?project=<?= urlencode($project['slug']) ?>">View project <i class="fas fa-arrow-right"></i></a></div>
        </article>
      <?php endforeach; ?></div>
      <div class="empty-state" id="emptyState" <?= count($matches) ? 'hidden' : '' ?>><h3>Nothing matches just yet.</h3><p>Try widening your search and discover a different way to be in Vrindavan.</p><button class="home-button home-button-dark" type="button" id="emptyClear">Reset filters</button></div>
    </div></section>
    <section class="collection-note"><div class="container"><div><span class="home-eyebrow">A little more than property</span><h2>Good decisions begin<br><em>with good advice.</em></h2></div><p>Every project is different. Our Vrindavan team brings local knowledge, transparent guidance and a slower, more considered way to find your place.</p><a class="under-link" href="#enquire">Speak with an advisor <i class="fas fa-arrow-right"></i></a></div></section>
    <section class="project-enquiry" id="enquire"><div class="container"><div><span class="home-eyebrow">Your next chapter</span><h2>Letâ€™s find your<br><em>place in Braj.</em></h2><p>Tell us what you are looking for. Weâ€™ll share a considered shortlist, not a sales pitch.</p></div><form id="contactForm" class="enquiry-form"><input name="name" placeholder="Your name" required><input name="phone" placeholder="Phone number" required><select name="interest"><option>I'm exploring a residence</option><option>I'm exploring land</option><option>I'm exploring commercial</option></select><button class="home-button home-button-light" type="submit">Begin the conversation <i class="fas fa-arrow-right"></i></button></form></div></section>
  </main>
  <script src="script.js"></script>
</body></html>


