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
	<h2>Music within Walking Distance</h2>
	<ul>
		<li><a href="http://www.cactuscafe.org/">Cactus Cafe</a> On UT Campus, this small bar has hosted numerous acoustic acts over the years.</li>
		<li><a href="http://www.holeinthewallaustin.com/">Hole in the Wall</a> Student standby for many decades, can have interesting local line-ups.</li>
	</ul>
	<h2>Music Downtown (longer walk, bus)</h2>
	<ul>
		<li><a href="http://www.mohawkaustin.com/">Mohawk</a>, <a href="http://www.emosaustin.com/">Emo's</a> Live rock venues.</li>
		<li><a href="http://www.antones.net/">Antone's</a>, <a href="http://www.stubbsaustin.com/">Stubb's</a>, <a href="http://www.continentalclub.com/Austin.html">Continental Club</a> Classic Austin live music venues.</li>
	</ul>
	<h2>Movies</h2>
	<ul>	
		<li><a href="http://drafthouse.com/austin/">Alamo Drafthouse Cinema</a> Movie theater with food and drink service at cabaret-style tables. The Ritz location is Downtown.</li>
		<li><a href="http://www.violetcrowncinema.com/">Violet Crown Cinema</a> Downtown theater, often showing international and indie films. </li>
	</ul>
	<h2>Outside</h2>
	<ul>
		<li><a href="http://www.zilkerboats.com/">Zilker Park boat rentals</a> Canoe on Lady Bird Lake, a short walk from Downtown.</li>
		<li><a href="http://www.texasoutside.com/hamiltonpool.htm">Hamilton Pool</a>, <a href="http://www.trails.com/tcatalog_trail.aspx?trailid=HGS458-050">Sculpture Falls</a> Swimming holes just out of town.</li>
		<li><a href="http://www.texasoutside.com/bartonpool.htm">Barton Springs</a> Freshwater swimming pool - an Austin landmark!</li>
		<li><a href="http://bicyclesportshop.com/articles/bicycle-equipment-rentals-pg174.htm">Bicycle Sports Shop</a>, <a href="http://www.mellowjohnnys.com/rentals.php">Mellow Johnny's</a> Bicycle rentals. Great for the <a href="http://www.austintexas.gov/page/trail-directory">hike and bike trails</a>.</li>
	</ul>

	<iframe width="610" height="610" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?vpsrc=6&amp;ctz=360&amp;ie=UTF8&amp;msa=0&amp;msid=205058143698592281512.00047ea4ae34d9a1c27c6&amp;sll=30.293016,-97.760639&amp;sspn=0.092342,0.139046&amp;ie=UTF8&amp;ll=30.271299,-97.747765&amp;spn=0.047145,0.054502&amp;z=14&amp;output=embed"></iframe><br /><p>View <a href="http://maps.google.com/maps/ms?vpsrc=6&amp;ctz=360&amp;ie=UTF8&amp;msa=0&amp;msid=205058143698592281512.00047ea4ae34d9a1c27c6&amp;ll=30.328217,-97.879866&amp;spn=0.393607,0.494496&amp;t=m&amp;source=embed">Larger Map</a> with details and reviews</a></p>
</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>