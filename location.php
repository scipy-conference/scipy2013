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

<h1>SciPy 2013 Venue</h1>
<img src="img/att.jpg" alt="AT&amp;T Executive Education and Conference Center" width="427" height="285" class="right">

<p>SciPy 2013 will be held at the AT&amp;T Executive Education and Conference Center at the University of Texas campus in Austin, Texas. The newly-constructed complex provides first class meeting facilities, cutting-edge multimedia technology, and outstanding dining and accommodation options on-site. The conference center is located in the heart of Austin, allowing easy access to the city's renowned 
<a href="http://www.ci.austin.tx.us/zilker/">parks</a>, <a href="http://www.austintexas.org/musicians/music_attractions/">music venues</a>, and <a href="http://www.yelp.com/c/austin/restaurants">restaurants</a>.</p>

</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>