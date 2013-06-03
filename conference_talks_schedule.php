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

<table id="registrants_table">
  <tr>
    <th colspan="4">Day 1 - June 26th</th>
  </tr>
  <tr>
    <th width="15%">Time</th>
    <th width="28%">Room 1</th>
    <th width="28%">Room 2</th>
    <th width="28%">Room 3</th>
  </tr>
<?php echo $display_block ?>
</table>
<br />
<br />

<h2>Mini-Symposia Schedule: </h2>
<p>Note: start times are not always con-current across tracks.</p>
<table id="registrants_table">
  <tr>
    <th colspan="4"><?php echo $mon_day ?></th>
  </tr>
  <tr>
    <th width="32%">Room: 1</th>
    <th width="32%">Room: 2</th>
    <th width="32%">Room: 3</th>
  </tr>
  <tr>
    <td>
    <?php echo $display_block_ms ?>
    </td>
  </tr>
</table>
<br />
<br />

<table id="registrants_table">
  <tr>
    <th colspan="4">Day 2 - June 27th</th>
  </tr>
  <tr>
    <th width="15%">Time</th>
    <th width="28%">Room 1</th>
    <th width="28%">Room 2</th>
    <th width="28%">Room 3</th>
  </tr>
<?php echo $display_block_2 ?>
</table>

<br />
<br />

<h2>Mini-Symposia Schedule: </h2>
<p>Note: start times are not always con-current across tracks.</p>
<table id="registrants_table">
  <tr>
    <th colspan="4"><?php echo $mon_day ?></th>
  </tr>
  <tr>
    <th width="32%">Room: 1</th>
    <th width="32%">Room: 2</th>
    <th width="32%">Room: 3</th>
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