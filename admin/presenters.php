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

$sql_presenters .= "last_name, ";
$sql_presenters .= "first_name, ";
$sql_presenters .= "affiliation, ";
$sql_presenters .= "bio, ";
$sql_presenters .= "title, ";
$sql_presenters .= "track, ";

$sql_presenters .= "type, ";
$sql_presenters .= "released, ";
$sql_presenters .= "tags, ";

$sql_presenters .= "location, ";
$sql_presenters .= "start_time, ";

$sql_presenters .= "DATE_FORMAT(start_time, '%h:%i %p') AS start_time_f, ";
$sql_presenters .= "DATE_FORMAT(end_time, '%h:%i %p') AS end_time_f ";

$sql_presenters .= "FROM schedules ";

$sql_presenters .= "LEFT JOIN talks ";
$sql_presenters .= "ON schedules.talk_id = talks.id ";

$sql_presenters .= "LEFT JOIN presenters ";
$sql_presenters .= "ON presenter_id = presenters.id ";

$sql_presenters .= "LEFT JOIN license_types ";
$sql_presenters .= "ON license_type_id = license_types.id ";

$sql_presenters .= "WHERE talks.conference_id = 1 ";
$sql_presenters .= "AND schedules.start_time < '2012-07-19 00:00:00' ";
$sql_presenters .= "AND track IN ('General','HPC') ";
$sql_presenters .= "ORDER BY start_time, location";


$total_presenters = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_start_time = '';

do {

if ($row['title'] != '')
  {
  if ($row['start_time'] != $last_start_time) 
   {
$display_block .="
<tr>
  <td>" . $row['start_time_f'] . " - " . $row['end_time_f'] . "</td>";
  if ($row['location'] == '1')
   { 
$display_block .="
<td><strong><a href=\"presenters_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />" . $row['start_time_f'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
$last_start_time = $row['start_time'];
   }
  else 
   {
$display_block .="
<td>---</td>";
  if ($row['location'] == '2')
   { 
$display_block .="
  <td><strong><a href=\"presenters_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />" . $row['start_time_f'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>
</tr>";
$last_start_time = $row['start_time'];
  }
   }

    }
  else
    {
  if ($row['location'] == '2')
   { 
$display_block .="
  <td><strong><a href=\"presenters_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />" . $row['start_time_f'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>
</tr>";
$last_start_time = $row['start_time'];
  }
  else 
   {
$display_block .="
<td>---</td>";
   }


    }
}

}
while ($row = mysql_fetch_array($total_presenters));


//===========================
//  pull presenters DAY 2
//===========================

$sql_presenters_2 = "SELECT ";
$sql_presenters_2 .= "presenters.id AS presenter_id, ";
$sql_presenters_2 .= "talks.id AS talk_id, ";
$sql_presenters_2 .= "schedules.id AS schedule_id, ";

$sql_presenters_2 .= "last_name, ";
$sql_presenters_2 .= "first_name, ";
$sql_presenters_2 .= "affiliation, ";
$sql_presenters_2 .= "bio, ";
$sql_presenters_2 .= "title, ";
$sql_presenters_2 .= "track, ";

$sql_presenters_2 .= "type, ";
$sql_presenters_2 .= "released, ";
$sql_presenters_2 .= "tags, ";

$sql_presenters_2 .= "location, ";
$sql_presenters_2 .= "start_time, ";

$sql_presenters_2 .= "DATE_FORMAT(start_time, '%h:%i %p') AS start_time_f, ";
$sql_presenters_2 .= "DATE_FORMAT(end_time, '%h:%i %p') AS end_time_f ";

$sql_presenters_2 .= "FROM schedules ";

$sql_presenters_2 .= "LEFT JOIN talks ";
$sql_presenters_2 .= "ON schedules.talk_id = talks.id ";

$sql_presenters_2 .= "LEFT JOIN presenters ";
$sql_presenters_2 .= "ON presenter_id = presenters.id ";

$sql_presenters_2 .= "LEFT JOIN license_types ";
$sql_presenters_2 .= "ON license_type_id = license_types.id ";

$sql_presenters_2 .= "WHERE talks.conference_id = 1 ";
$sql_presenters_2 .= "AND schedules.start_time > '2012-07-19 00:00:00' ";
$sql_presenters_2 .= "AND track IN ('General','HPC','Visualization','Computational Bioinformatics') ";
$sql_presenters_2 .= "ORDER BY start_time, location";


$total_presenters_2 = @mysql_query($sql_presenters_2, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_start_time = '';

do {

if ($row['title'] != '')
  {
  if ($row['start_time'] != $last_start_time) 
   {
$display_block_2 .="
<tr>
  <td>" . $row['start_time_f'] . " - " . $row['end_time_f'] . "</td>";
  if ($row['location'] == '1')
   { 
$display_block_2 .="
<td><strong><a href=\"presenters_edit.php?id=" . $row['presenter_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />" . $row['start_time_f'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
$last_start_time = $row['start_time'];
   }
  else 
   {
$display_block_2 .="
<td>---</td>";
  if ($row['location'] == '2')
   { 
$display_block_2 .="
  <td><strong><a href=\"presenters_edit.php?id=" . $row['presenter_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />" . $row['start_time_f'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
$last_start_time = $row['start_time'];
  }
   }

    }
  else
    {
  if ($row['location'] == '2')
   { 
$display_block_2 .="
  <td><strong><a href=\"presenters_edit.php?id=" . $row['presenter_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />" . $row['start_time_f'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
$last_start_time = $row['start_time'];
  }
  else 
   {
$display_block_2 .="
<td>---</td>";
   }


    }
}

}
while ($row = mysql_fetch_array($total_presenters_2));


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

<h2>Talks:</h2>
<table id="registrants_table" width="600">
  <tr>
    <th colspan="4">Day 1 - July 18th</th>
  </tr>
  <tr>
    <th width="80">Time</th>
    <th>Room 1</th>
    <th>Room 2</th>
  </tr>
<?php echo $display_block ?>
</table>
<br />
<br />
<table id="registrants_table" width="600">
  <tr>
    <th colspan="4">Day 2 - July 19th</th>
  </tr>
  <tr>
    <th width="80">Time</th>
    <th>Room 1</th>
    <th>Room 2</th>
  </tr>
<?php echo $display_block_2 ?>
</table>


</div>
<div style="clear:both;"></div>

</div>
</body>

</html>