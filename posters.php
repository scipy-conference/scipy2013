<?php

include('inc/db_conn.php');

//===========================
//  pull talks 
//===========================

$sql_talks = "SELECT ";
$sql_talks .= "talks.id AS talk_id, ";
$sql_talks .= "authors, ";
$sql_talks .= "title, ";
$sql_talks .= "track, ";

$sql_talks .= "type, ";
$sql_talks .= "released, ";
$sql_talks .= "tags ";

$sql_talks .= "FROM  talks ";


$sql_talks .= "LEFT JOIN presenters ";
$sql_talks .= "ON presenter_id = presenters.id ";

$sql_talks .= "LEFT JOIN license_types ";
$sql_talks .= "ON license_type_id = license_types.id ";

$sql_talks .= "WHERE talks.conference_id = 2 ";
$sql_talks .= "AND track IN ('Posters') ";
$sql_talks .= "ORDER BY title ASC";

$total_talks = @mysql_query($sql_talks, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_track = '';
$display_posters .="<ol>
";
do {

if ($row['title'] != '')
  {


$display_posters .="  <li> <a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a>
  <ul>
    <li>" . $row['authors'] . "</li>
  </ul>
  </li>";
}
}

while ($row = mysql_fetch_array($total_talks));

$display_posters .="</ol>
";

?>

<!DOCTYPE html>
<html>
<?php $thisPage="Posters"; ?>
<head>

<?php @ require_once ("inc/header.php"); ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />
</head>

<body>

<div id="container">

<?php include('inc/page_headers.php') ?>

<section id="sidebar">
  <?php include("inc/sponsors.php") ?>
</section>

<section id="main-content">
<a name="#top"></a>

<div class="cell, schedule_info">
<div class="icon_date" style="margin: 0 auto;">Jun<br /><span class="icon_date_day">27</span></div>
10:35 AM<br />
11:35 AM
</div>

<h1>Posters</h1>

<p>Listed below are confirmed posters for SciPy2013.</p>

<p>Poster session is scheduled for 10:35 AM - 11:35 AM on June 27th.</p>

<?php echo $display_posters ?>

</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>