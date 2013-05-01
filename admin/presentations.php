<?php

//===============================================
//  USER AUTHORIZATION                         //
//===============================================
session_start();
if(!isset($_SESSION['formusername'])){
header("location:login.php");
}

//===============================================
// IF SUCCESSFUL PAGE CONTENT                  //
//===============================================

include('../inc/db_conn.php');

$participant_id = $_GET['id'];

//===========================
//  pull tutorials 
//===========================

$sql_tutorials = "SELECT ";
$sql_tutorials .= "presenters.id AS presenter_id, ";
$sql_tutorials .= "talks.id AS talk_id, ";
$sql_tutorials .= "schedules.id AS schedule_id, ";

$sql_tutorials .= "last_name, ";
$sql_tutorials .= "first_name, ";
$sql_tutorials .= "affiliation, ";
$sql_tutorials .= "bio, ";
$sql_tutorials .= "title, ";
$sql_tutorials .= "track, ";

$sql_tutorials .= "type, ";
$sql_tutorials .= "released, ";
$sql_tutorials .= "tags, ";

$sql_tutorials .= "location_id, ";
$sql_tutorials .= "start_time, ";

$sql_tutorials .= "DATE_FORMAT(start_time, '%h:%i %p') AS start_time_f, ";
$sql_tutorials .= "DATE_FORMAT(end_time, '%h:%i %p') AS end_time_f, ";
$sql_tutorials .= "DATE_FORMAT(start_time, '%b %d') AS schedule_day ";


$sql_tutorials .= "FROM schedules ";

$sql_tutorials .= "LEFT JOIN talks ";
$sql_tutorials .= "ON schedules.talk_id = talks.id ";

$sql_tutorials .= "LEFT JOIN locations ";
$sql_tutorials .= "ON schedules.location_id = locations.id ";

$sql_tutorials .= "LEFT JOIN presenters ";
$sql_tutorials .= "ON presenter_id = presenters.id ";

$sql_tutorials .= "LEFT JOIN license_types ";
$sql_tutorials .= "ON license_type_id = license_types.id ";

$sql_tutorials .= "WHERE talks.conference_id = 2 ";
$sql_tutorials .= "AND track IN ('Introductory','Intermediate','Advanced') ";
$sql_tutorials .= "ORDER BY start_time, location_id";


$total_tutorials = @mysql_query($sql_tutorials, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_start_time = '';
$last_schedule_day = '';

do {

if ($row['title'] != '')
  {
//
if ($row['schedule_day'] != $last_schedule_day) 
{
$display_block .="
<tr>
  <th colspan=\"4\">" . $row['schedule_day'] . "</th>
</tr>
  <tr>
    <th width=\"13%\">Time</th>
    <th width=\"29%\">Introductory</th>
    <th width=\"29%\">Intermediate</th>
    <th width=\"29%\">Advanced</th>
  </tr>";
$last_schedule_day = $row['schedule_day'];
}
//

  if ($row['start_time'] != $last_start_time) 
     {
       $display_block .="  <tr>
        <td>" . $row['start_time_f'] . " - " . $row['end_time_f'] . "</td>";
     }

    if ($row['location_id'] == '1')
      { 
       $display_block .="
        <td><strong><a href=\"presentation_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />" . $row['start_time_f'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
        $last_start_time = $row['start_time'];
      }
   elseif ($row['location_id'] == '2')
     { 
$display_block .="
<td><strong><a href=\"presentation_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />" . $row['start_time_f'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
$last_start_time = $row['start_time'];
   }
 elseif ($row['location_id'] == '3')
   { 
$display_block .="
<td><strong><a href=\"presentation_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />" . $row['start_time_f'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
$last_start_time = $row['start_time'];
   }
  else 
   {
$display_block .="
<td>---</td>";

   }


}
}

while ($row = mysql_fetch_array($total_tutorials));

//===========================
//  pull talks 
//===========================

$sql_talks = "SELECT ";
$sql_talks .= "presenters.id AS presenter_id, ";
$sql_talks .= "talks.id AS talk_id, ";
$sql_talks .= "authors, ";
$sql_talks .= "last_name, ";
$sql_talks .= "first_name, ";
$sql_talks .= "affiliation, ";
$sql_talks .= "bio, ";
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
$sql_talks .= "AND track NOT IN ('Introductory','Intermediate','Advanced') ";
$sql_talks .= "ORDER BY FIELD(track,'General','Machine Learning','Reproducible Science','Astronomy and Astrophysics','Bio-informatics (-f)','Bio-informatics (-s)','GIS - Geospatial Data Analysis','Medical imaging','Meteorology','poster'), title";


$total_talks = @mysql_query($sql_talks, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_track = '';
$last_schedule_day = '';

do {

if ($row['title'] != '')
  {
//
if ($row['track'] != $last_track) 
{
$display_talks .="
  <tr>
    <th width=\"29%\" colspan=\"2\">" . $row['track'] . "</th>
  </tr>
  <tr>
    <td><a href=\"presentation_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></td>
    <td>" . $row['authors'] . "</td>
  </tr>";
$last_track = $row['track'];
}
else
$display_talks .="
  <tr>
    <td><a href=\"presentation_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></td>
    <td>" . $row['authors'] . "</td>
  </tr>";
}
}

while ($row = mysql_fetch_array($total_talks));


?>

<!DOCTYPE html>
<html>
<?php $thisPage="Admin"; ?>
<head>

<?php @ require_once ("../inc/second_level_header.php"); ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />
</head>

<body>

<div id="container">

<?php include('../inc/admin_page_headers.php') ?>

<section id="sidebar">
  <?php include("../inc/sponsors.php") ?>
</section>

<section id="main-content">

<h1>Admin</h1>

<h2>Tutorials:</h2>
<table id="registrants_table">
<?php echo $display_block ?>
</table>
<hr />
<h2>Talks:</h2>
<table id="registrants_table">
<?php echo $display_talks ?>
</table>

</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>