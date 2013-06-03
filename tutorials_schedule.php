<?php
session_start();

include_once "inc/markdown.php";

include('inc/db_conn.php');

//===========================
//  pull tutorials 
//===========================

include('inc/tutorials.php');


?>


<!DOCTYPE html>
<html>
<?php $thisPage="Tutorials Schedule"; ?>
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

<h1>SciPy 2013 Tutorials Schedule</h1>

<p>The conference always kicks off with two days of tutorials. These sessions provide extremely affordable access to expert training, and consistently receive fantastic feedback from participants. This year we are expanding the tutorial session to include three parallel tracks: introductory, intermediate and advanced.</p>

<p>The Tutorials Schedule (June 24th & 25th) is in its final stages of confirmation. There may be changes made to the schedule between now and the conference.</p>


<table id="registrants_table">
<?php echo $display_tutorials ?>
</table>


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