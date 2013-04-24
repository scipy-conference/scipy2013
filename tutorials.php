<?php
include_once "inc/markdown.php";

?>


<!DOCTYPE html>
<html>
<?php $thisPage="Speaking"; ?>
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

<h1>SciPy 2013 Tutorials</h1>

<p>The conference always kicks off with two days of tutorials. These sessions provide extremely affordable access to expert training, and consistently receive fantastic feedback from participants. This year we are expanding the tutorial session to include three parallel tracks: introductory, intermediate and advanced.</p>

<p>The Tutorials Schedule (June 24th & 25th) is in its final stages of confirmation. There may be changes made to the schedule between now and the conference.</p>

<h3>Monday - June 24th</h3>
    
<table id="registrants_table" width="600">
  <tr>
    <th width="80">Time</th>
    <th width="250">Introductory</th>
    <th width="250">Intermediate</th>
    <th width="250">Advanced</th>
  </tr>

<tr>
  <td>Morning</td>
  <td><strong>NumPy and IPython</strong><br /> - Valentin Haenel</td>
  <td><strong>Guide to Symbolic Computing with SymPy</strong><br /> - Ondrej Certik, Mateusz Paprocki, Aaron Meurer</td>
  <td><strong>Data Processing with Python</strong><br /> - Ben Zaitlen, Hugo Shi</td>
</tr>
<tr>
  <td>Afternoon</td>
  <td><strong>Anatomy of matplotlib</strong><br /> - Benjamin Root</td>
  <td><strong>IPython in depth</strong><br /> - Brian Granger, Fernando Perez</td>
  <td><strong>Cython: Speed up Python and NumPy, Pythonize C, C++, and Fortran</strong><br /> - Kurt Smith</td>
</tr>
</table>

<h3>Tuesday - June 25th</h3>

<table id="registrants_table" width="600">
  <tr>
    <th width="80">Time</th>
    <th width="250">Introductory</th>
    <th width="250">Intermediate</th>
    <th width="250">Advanced</th>
  </tr>

<tr>
  <td>Morning</td>
  <td><strong>Version Control & Unit Testing for Scientific Software</strong><br /> - Matt Davis, Katy Huff</td>
  <td><strong>An Introduction to scikit-learn (I)</strong><br /> - Gael Varoquax, Jake Vanderplas, Olivier Grisel</td>
  <td><strong>Diving into NumPy code</strong><br /> - David Cournapeau, Stefan Van der Walt</td>
</tr>
<tr>
  <td>Afternoon</td>
  <td><strong>Statistical Data Analysis in Python (pandas)</strong><br /> - Christopher Fonnesbeck</td>
  <td><strong>Using geospatial data</strong><br /> - Kelsey Jordahl</td>
  <td><strong>An Introduction to scikit-learn (II)</strong><br /> - Gaël Varoquaux, Jake Vanderplas, Olivier Grisel</td>
</tr>
</table>

<p>More detailed descriptions of tutorials coming soon.</p>

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