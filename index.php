<?php
include('inc/db_conn.php');

//===========================
//  pull important dates list
//===========================

$today = date("Y")."-".date("m")."-".date("d");

$sql_dates = "SELECT ";
$sql_dates .= "DATE_FORMAT(`impt_date`, '%b') as date_m, ";
$sql_dates .= "DATE_FORMAT(`impt_date`, '%d') as date_d, ";
$sql_dates .= "`description`  ";
$sql_dates .= "FROM `important_dates`  ";
$sql_dates .= "WHERE impt_date > \"$today\" ";
$sql_dates .= "AND conference_id = 2 ";
$sql_dates .= "AND display = \"public\" ";
$sql_dates .= "ORDER BY impt_date ";
$sql_dates .= "LIMIT 4";

$total_dates = @mysql_query($sql_dates, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_dates_found = @mysql_num_rows($total_dates);
$row_color=($row_count%2)?$row_1:$row_2;

do {
  if ($row['description'] != '')
  {

$display_dates .="
<tr>
  <td><div class=\"icon_date\">" . $row['date_m'] . "<br /><span class=\"icon_date_day\">" . $row['date_d'] . "</span></div></td>
  <td style=\"font-size: 0.75em;\">" . $row['description'] . "</td>
</tr>";
}}
while($row = mysql_fetch_array($total_dates));

//===========================
//  pull individual important dates
//===========================

//$today = date("Y")."-".date("m")."-".date("d");

$sql_dates_2 = "SELECT id, ";
$sql_dates_2 .= "DATE_FORMAT(`impt_date`, '%b %D') as date_m ";
$sql_dates_2 .= "FROM `important_dates`  ";
$sql_dates_2 .= "WHERE conference_id = 2 ";
$sql_dates_2 .= "AND display = \"public\"";

$total_dates_2 = @mysql_query($sql_dates_2, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_dates_found_2 = @mysql_num_rows($total_dates_2);
while ($row = mysql_fetch_array($total_dates_2)) {
if ($row['id'] == 1) 
  {
    $abstracts_deadline=$row['date_m'];
  }
elseif ($row['id'] == 4) 
  {
    $tutorial_deadline=$row['date_m'];
  }

}


?>


<!DOCTYPE html>
<html>
<?php $thisPage="Home"; ?>
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

<img src="img/atxmuralsm.jpg" width= "270" height="171" alt="Austin, TX" class="right" />

<p >SciPy 2013, the twelfth annual Scientific Computing with Python conference, will be held June 24th - 29th in Austin, Texas.</p>

<table style="float: right; clear: both; width: 30%; ">
<tr>
  <th colspan="2">Upcoming Important Dates</th>
</tr>
<?php echo $display_dates ?>
</table>

<p>SciPy 2013 is about three months away, and we’ve been working hard to make this the best one yet. We are very excited to announce the themes of this year’s conference. The main conference themes which will be <strong>Machine Learning</strong> & <strong>Tools for Reproducible Science</strong>. <a href="about.php">Read more...</a></p>

<p>Like last year, there will also be 4 mini-symposia, and thanks to your contributions to the poll, the following themes have been selected:</p>

<ul>
  <li>Meteorology, climatology, and atmospheric and oceanic science</li>
  <li>Astronomy & astrophysics</li>
  <li>Bio-informatics</li>
  <li>Medical imaging</li>
</ul>

<p>SciPy is a community dedicated to the advancement of scientific computing through open source Python software for mathematics, science, and engineering.</p>
<div class="clearer"></div>
<div class="callout" style="width: 265px;">
<h1>More</h1>
<p>To receive updates on conference specifics:</p>

<div class="callout_row">
  <img src="img/newsletter_icon.png" width="32" height="32"  alt="newsletter" class="callout_date" />
  <span class="callout_description">Subscribe to the SciPy 2013 newsletter</span>
  <style type="text/css">
.link,
.link a,
#SignUp .signupframe {
	color: #226699;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	}
	.link,
	.link a {
		text-decoration: none;
		}
	#SignUp .signupframe {
		border: 1px solid #000000;
		background: #ffffff;
		}
#SignUp .signupframe .required {
	font-size: 10px;
	}
</style>
<script type="text/javascript" src="http://app.icontact.com/icp/loadsignup.php/form.js?c=1254645&l=7470&f=2197"></script>

</div>

<div class="callout_row">
  <img src="img/twitter-bird-light-bgs.png" width="32" height="32" alt="twitter" class="callout_date" />
  <span class="callout_description">Follow <a href="https://twitter.com/SciPyConf">@SciPyConf</a></span>
</div>

<div class="callout_row">
  <img src="img/gplus-32.png" width="32" height="32"  alt="g-plus" class="callout_date" />
  <span class="callout_description"><a href="https://plus.google.com/u/0/100948873231627513165/posts">ScipyConference google+ page</a></span>
</div>
</div>

<p>The annual SciPy Conference allows participants from both academic and commercial organizations to showcase their latest projects, learn from skilled users and developers, and collaborate on code development.</p>

<p>To see the program from past years, <a href="http://conference.scipy.org/past.html">go to http://conference.scipy.org/past.html</a></p>



</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>