<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php $thisPage="Venue"; ?>
<head>

<?php include('inc/header.php') ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />
</head>

<body>

<div id="container">

<?php include('inc/page_headers.php') ?>

<section id="sidebar">
  <?php include("inc/sponsors.php") ?>
</section>

<section id="main-content">

<h1>Venue Lodging Details</h1>

<img src="img/attHotel.jpg" alt="AT&amp;T Executive Conference Center Hotel" height="233" width="350" class="right" />

<p class="highlight">On-site lodging for SciPy 2013 at the AT&amp;T Executive Conference Center Hotel is sold out.</p>

<p>Other lodging options:</p>

<p><a href="http://doubletree3.hilton.com/en/hotels/texas/doubletree-by-hilton-hotel-austin-university-area-AUSIMDT/index.html">DoubleTree by Hilton Hotel Austin - University Area</a><br />
1617 IH-35 North<br />
Austin, TX 78702</p>

<p><a href="http://www.starwoodhotels.com/sheraton/property/overview/index.html?propertyID=3079">Sheraton Austin Hotel at the Capitol</a><br />
701 East 11th Street<br />
Austin, TX 78701</p>

<p><a href="http://www.extendedstayamerica.com/property/extended-stay-america-austin-downtown-6th-st-hotel.html">Extended Stay America - Austin - Downtown - 6th St.</a><br />
600 Guadalupe St.<br />
Austin, TX 78701</p>


</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>