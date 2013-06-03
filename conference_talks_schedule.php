<?php

//===============================================
// IF SUCCESSFUL PAGE CONTENT                  //
//===============================================

include('inc/db_conn.php');

//===========================
//  pull presenters DAY 1
//===========================

include('inc/conf_1.php');

//===========================
//  pull mini symposia DAY 1
//===========================

include('inc/ms_1.php');

//===========================
//  pull presenters DAY 2
//===========================

include('inc/conf_2.php');

//===========================
//  pull mini symposia DAY 2
//===========================

include('inc/ms_2.php');
?>

<!DOCTYPE html>
<html>
<?php $thisPage="SciPy2013 :: Schedule :: Talks"; ?>
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

<h1>Conference Talks Schedule:</h1>

<p>The Conference Talks Schedule (June 26th &amp; 27th) is in its final stages of confirmation. There may be changes made to the schedule between now and the conference.</p>
<p class="intra_page_nav" style="text-align: center; font-size: 0.85em;">Talks <a href="#day_one">June 26th</a> & <a href="#day_two">June 27th</a><br />
Mini Symposia <a href="#day_one_ms">June 26th</a> & <a href="#day_two_ms">June 27th</a></p>

<a name="day_one"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>

<h2>Talks Schedule, Day 1 - Wed., June 26th</h2>
<table id="registrants_table">
  <tr>
    <th width="15%">Time</th>
    <th width="28%">General<br />Rm 204</th>
    <th width="28%">Reproducible Science<br />Rm 203</th>
    <th width="28%">Machine Learning<br />Rm 102</th>
  </tr>
<?php echo $display_block ?>
</table>
<br />
<br />
<a name="day_one_ms"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
<h2>Mini-Symposia, Day 1 - Wed., June 26th </h2>
<p>Note: start times are not always con-current across tracks.</p>
<table id="registrants_table">
  <tr>
    <th colspan="4"><?php echo $mon_day ?></th>
  </tr>
  <tr>
    <th width="32%">Bioinformatics<br />Rm 204</th>
    <th width="32%">Astronomy and Astrophysics<br />Rm 203</th>
    <th width="32%">GIS - Geospatial Data Analysis<br />Rm 102</th>
  </tr>
  <tr>
    <td>
    <?php echo $display_block_ms ?>
    </td>
  </tr>
</table>
<br />
<br />
<a name="day_two"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
<h2>Talks Schedule, Day 2 - Thurs., June 27th</h2>
<table id="registrants_table">
  <tr>
    <th width="15%">Time</th>
    <th width="28%">General<br />Rm 204</th>
    <th width="28%">General<br />Rm 203</th>
    <th width="28%">Reproducible Science<br />Rm 106</th>
  </tr>
<?php echo $display_block_2 ?>
</table>

<br />
<br />
<a name="day_two_ms"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
<h2><h2>Mini-Symposia, Day 2 - Thurs., June 27th </h2></h2>
<p>Note: start times are not always con-current across tracks.</p>
<table id="registrants_table">
  <tr>
    <th colspan="4"><?php echo $mon_day ?></th>
  </tr>
  <tr>
    <th width="32%">Medical Imaging<br />Rm 204</th>
    <th width="32%">Bioinformatics<br />Rm 203</th>
    <th width="32%">Meteorology, Climatology, Atmospheric and Oceanic Science<br />Rm 106</th>
  </tr>
  <tr>
    <td>
    <?php echo $display_block_ms_2 ?>
    </td>
  </tr>
</table>

</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>