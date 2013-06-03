<?php

//===============================================
// IF SUCCESSFUL PAGE CONTENT                  //
//===============================================

include('inc/db_conn.php');

include('inc/ms_1.php');

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
<a name="top"></a>
<?php include('inc/page_headers.php') ?>

<section id="sidebar">
  <?php include("inc/sponsors.php") ?>
</section>

<section id="main-content">


<p class="intra_page_nav" style="text-align: center; font-size: 0.85em;">Mini Symposia <a href="#day_one_ms">June 26th</a> & <a href="#day_two_ms">June 27th</a></p>

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

<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>