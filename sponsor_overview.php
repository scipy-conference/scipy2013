<?php
session_start();
?>


<!DOCTYPE html>
<html>
<?php $thisPage="Sponsor"; ?>
<head>

<?php include('inc/header.php') ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />
</head>

<body>

<!-- for facebook like button -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="container">

<?php include('inc/page_headers.php') ?>

<section id="sidebar">
  <?php include("inc/sponsors.php") ?>
</section>


<section id="main-content">

<h1>Sponsor Prospectus </h1>
<p><a href="pdf/SciPy2013 Sponsor Prospectus.pdf"><img src="img/pdficon_large.png" /> PDF</a></p><br />
<h2>Why sponsor SciPy 2013?</h2>

<p>As a community, SciPy advances scientific and analytic computing through the development and promotion of open source Python software. The annual SciPy Conference brings together academic and industry users to present their latest advances, learn from skilled users and developers, and collaborate on advancing the ecosystem. Python usage continues to grow significantly in scientific and analytic computing thanks to the efforts of this community.</p>

<p>Your sponsorship of the conference provides vital financial support to the community and offers your organization the opportunity to build awareness, to recruit staff, and to build contacts.</p>

<p>Your Sponsorship also provides the necessary resources to fund:</p>

<h2>Community Scholarships…</h2>

<p>SciPy offers scholarships for students and researchers who contribute to the community. In 2012 we were able to pay the travel, registration, and lodging costs for ten applicants to attend the SciPy Conference. Scholarship recipients are selected for their outstanding contributions to open source scientific Python projects. In the last 7 years over 60 students have attended from countries like Estonia, India, France, Spain, Japan, South Africa, Colombia, Canada, and the United States.</p>

<h2>Tutorials…</h2>

<p>We provide two days of expert-led tutorials at the start of the conference. These tutorials are very popular, with an introductory track for attendees new to Python, and advanced track for experienced users.</p>

<h2>Keynote Speakers…</h2>

<p>Prominent members of the scientific computing communities present their research and share their experience and expertise in software development.</p>

<h2>General Sessions…</h2>

<p>Authors share their juried presentations covering the latest developments in the use of Python in science during the two main days of the conference in two tracks of interests.</p>

<h2>A Poster Session…</h2>

<p>In conjunction with the General Sessions, authors with quality papers that couldn’t be scheduled into the presentation sessions display their work and answer questions about their research.</p>

<h2>Sprints…</h2>

<p>Each year, two days of sprints wrap up the SciPy Conference and provide an opportunity for collaborative coding and problem-solving on SciPy open-source projects.</p>

<h2>Affordability…</h2>

<p>Sponsorships enable the registration fee to remain extremely affordable compared to many other meetings.</p>

<p>For SciPy 2012, these aspects of the conference were made possible through the generous support of sponsors including Google, Los Alamos National Lab, Continuum Analytics, GitHub, Microsoft, NumFOCUS, Schrödinger, Python Software Foundation, SIG Susquehanna, WingWare, Media Sponsor Computing Science & Engineering, and Institutional Sponsor Enthought.</p>

<p><b>Please email <a href="mailto:scipy-organizers@scipy.org">scipy-organizers@scipy.org</a> to become a sponsor today.</b>

<p><a href="sponsor_levels.php">See more information on sponsor levels.</a></p>

</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>

<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</body>

</html>