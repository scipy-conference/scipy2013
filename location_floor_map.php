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

<h1>SciPy 2013 Venue Floor Maps</h1>

<p>Level M-1</p>
<img src="img/att_level_1.png" alt="AT&amp;T Executive Education and Conference Center Level 1" width="100%">

<p>Level M-2</p>
<img src="img/att_level_2.png" alt="AT&amp;T Executive Education and Conference Center Level 1" width="100%">

</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>