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

$sql_presenters .= "location_id, ";
$sql_presenters .= "start_time, ";

$sql_presenters .= "DATE_FORMAT(start_time, '%h:%i %p') AS start_time_f, ";
$sql_presenters .= "DATE_FORMAT(end_time, '%h:%i %p') AS end_time_f, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%b %d') AS schedule_day ";


$sql_presenters .= "FROM schedules ";

$sql_presenters .= "LEFT JOIN talks ";
$sql_presenters .= "ON schedules.talk_id = talks.id ";

$sql_presenters .= "LEFT JOIN locations ";
$sql_presenters .= "ON schedules.location_id = locations.id ";

$sql_presenters .= "LEFT JOIN presenters ";
$sql_presenters .= "ON presenter_id = presenters.id ";

$sql_presenters .= "LEFT JOIN license_types ";
$sql_presenters .= "ON license_type_id = license_types.id ";

$sql_presenters .= "WHERE talks.conference_id = 2 ";
$sql_presenters .= "AND track IN ('Introductory','Intermediate','Advanced') ";
$sql_presenters .= "ORDER BY start_time, location_id";


$total_presenters = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

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
        <td><strong><a href=\"presenters_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />" . $row['start_time_f'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
        $last_start_time = $row['start_time'];
      }
   elseif ($row['location_id'] == '2')
     { 
$display_block .="
<td><strong><a href=\"presenters_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />" . $row['start_time_f'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
$last_start_time = $row['start_time'];
   }
 elseif ($row['location_id'] == '3')
   { 
$display_block .="
<td><strong><a href=\"presenters_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />" . $row['start_time_f'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
$last_start_time = $row['start_time'];
   }
  else 
   {
$display_block .="
<td>---</td>";

   }


}
}


while ($row = mysql_fetch_array($total_presenters));




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

<h2>Talks:</h2>
<table id="registrants_table">
<?php echo $display_block ?>
</table>
<br />


</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>