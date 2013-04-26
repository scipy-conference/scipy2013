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

<h1>Childcare</h1>

<p>Finding summer camps: <a href="http://www.austinchronicle.com/calendar/summer-camps/">http://www.austinchronicle.com/calendar/summer-camps/</a></p>

<p>Finding day cares: <a href="http://www.yelp.com/search?cflt=childcare&find_loc=University+of+Texas%2C+Austin%2C+TX">http://www.yelp.com/search?cflt=childcare&find_loc=University+of+Texas%2C+Austin%2C+TX</a></p>

</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>