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
//  pull presenters DAY 1
//===========================

$sql_presenters = "SELECT ";
$sql_presenters .= "presenters.id AS presenter_id, ";
$sql_presenters .= "talks.id AS talk_id, ";
$sql_presenters .= "schedules.id AS schedule_id, ";
$sql_presenters .= "talks.presenter_id AS pi, ";
$sql_presenters .= "last_name, ";
$sql_presenters .= "first_name, ";
$sql_presenters .= "affiliation, ";
$sql_presenters .= "bio, ";
$sql_presenters .= "title, ";
$sql_presenters .= "track, ";
$sql_presenters .= "authors, ";
$sql_presenters .= "location_id, ";
$sql_presenters .= "start_time, ";
$sql_presenters .= "name, ";

$sql_presenters .= "released, ";
$sql_presenters .= "type, ";

$sql_presenters .= "DATE_FORMAT(start_time, '%h:%i %p') AS start_time_f, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%b %d') AS start_day_f, ";
$sql_presenters .= "DATE_FORMAT(end_time, '%h:%i %p') AS end_time_f ";

$sql_presenters .= "FROM schedules ";

$sql_presenters .= "LEFT JOIN talks ";
$sql_presenters .= "ON schedules.talk_id = talks.id ";

$sql_presenters .= "LEFT JOIN presenters ";
$sql_presenters .= "ON presenter_id = presenters.id ";

$sql_presenters .= "LEFT JOIN license_types ";
$sql_presenters .= "ON license_type_id = license_types.id ";

$sql_presenters .= "LEFT JOIN locations ";
$sql_presenters .= "ON location_id = locations.id ";

$sql_presenters .= "WHERE talks.conference_id = 1 ";
$sql_presenters .= "ORDER BY start_time, location_id";

$total_presenters = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_start_time = '';

do {

$display_block .="
<tr>
  <td>" . $row['start_day_f'] . "<br />" . $row['start_time_f'] . " - " . $row['end_time_f'] . "</td>
  <td><span class=\"bold\"><a href=\"presenters_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></span>
  <br /> - " . $row['last_name'] . ", " . $row['first_name'] . "

<br />" . $row['track'] . "<br />Time slot: " . $row['start_time_f'] . " - ". $row['end_time_f'] . "<br />location: " . $row['name'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td></tr>";

}
while ($row = mysql_fetch_array($total_presenters));



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<?php $thisPage="Admin"; ?>
<?php $thisSub="Talks"; ?>


<head>
<?php @ require_once ("../inc/header.php"); ?>	
</head>

<body>
<div id="container">
<?php @ require_once ("../inc/menu.php"); ?>
<div id="side-content">
<?php @ require_once ("subs.php"); ?>
<?php @ require_once ("../inc/sponsors.php"); ?>
</div>
<div id="main-content">

<h1>Admin</h1>

<div align="right">
<p><a href="schedule_csv.php">Export to CSV (for Excel)</a></p>
</div>

<h2>Talks:</h2>
<table id="registrants_table" width="600">
  <tr>
    <th width="80">Time</th>
    <th>Info</th>
  </tr>
<?php echo $display_block ?>
</table>
<br />
<br />

</div>
<div style="clear:both;"></div>

</div>
</body>

</html>