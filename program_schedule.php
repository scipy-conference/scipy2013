<?php

//===============================================
// IF SUCCESSFUL PAGE CONTENT                  //
//===============================================

include('inc/db_conn.php');

//===========================
//  pull tutorials 
//===========================

include('inc/tutorials.php');

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

//===========================
//  pull Sprints
//===========================

include('inc/sprints.php');

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
<a name="top"></a>
<?php include('inc/page_headers.php') ?>

<section id="sidebar">
  <?php include("inc/sponsors.php") ?>
</section>

<section id="main-content">

<h2>Program Schedule:</h2>

<p>The Program Schedule is in its final stages of confirmation. There may be changes made to the schedule between now and the conference.</p>

<p class="intra_page_nav" style="text-align: center; font-size: 0.85em;">Tutorials <a href="#tutorials">June 24th & 25th</a> | Talks <a href="#day_one">June 26th</a> & <a href="#day_two">June 27th</a><br />
Mini Symposia <a href="#day_one_ms">June 26th</a> & <a href="#day_two_ms">June 27th</a> | Sprints <a href="#sprints">June 28th & 29th</a></p>

<h2>Tutorials Schedule</h2>

<p>The conference always kicks off with two days of tutorials. These sessions provide extremely affordable access to expert training, and consistently receive fantastic feedback from participants. This year we are expanding the tutorial session to include three parallel tracks: introductory, intermediate and advanced.</p>

<p>The Tutorials Schedule (June 24th & 25th) is in its final stages of confirmation. There may be changes made to the schedule between now and the conference.</p>

<a name="tutorials"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
<table id="registrants_table">
<?php echo $display_tutorials ?>
</table>

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
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
<h2>Reception, Day 1 - Wed., June 26th</h2>
<table id="registrants_table" width="100%">
  <tr>
    <th width="15%">Time</th>
    <th width="28%">&nbsp;</th>
    <th width="28%">&nbsp;</th>
    <th width="28%">&nbsp;</th>
  </tr>
  <tr>
    <td>07:00 PM -<br />08:00 PM</td>
    <td colspan="3" class="track_atsumaru"><span class="track">Reception- Tejas Dining Room</span><br /><strong>Reception</strong><br /><span class="authors">appetizers, cash bar and a book signing during the first half hour</span></td>
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

<br />
<br />
<a name="sprints"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
<h2>Sprints Schedule</h2>
<table id="registrants_table">
<?php echo $display_sprints_1 ?>
</table>

</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>