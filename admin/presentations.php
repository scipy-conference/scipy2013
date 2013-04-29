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

$sql_presenters .= "WHERE talks.conference_id = 2 ";
$sql_presenters .= "ORDER BY start_time, location_id";



$total_presenters = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_start_time = '';

do {

if ($row['title'] != '')
  {
  if ($row['start_time'] != $last_start_time) 
   {
// if a new start time display new row and the time cell
$display_block .="
<tr>
  <td>" . $row['start_time_f'] . " - " . $row['end_time_f'] . "</td>";

/////////////////
  if ($row['track'] == '---' || $row['track'] == 'Plenary')
    {
      $display_block .="<td colspan=\"2\" class=\"track_atsumaru\"><span class=\"bold\"><a href=\"presentation_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong>";
      if ($row['last_name'] != '')
        {
      $display_block .="<br /> - " . $row['last_name'] . ", " . $row['first_name'] . "";
        }
      $display_block .="<br />" . $row['track'] . "<br />Time slot: " . $row['start_time_f'] . " - ". $row['end_time_f'] . "<br />location: " . $row['name'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td></tr>";

      $last_start_time = $row['start_time'];
    }
//  else
//    {



// if the time resource is for room 1
  if ($row['location_id'] == '1' && $row['track'] != '---' && $row['track'] != 'Plenary' || $row['location_id'] == '2' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

// pick the appropriate color background by track
  if ($row['track'] == "HPC")
     {
       $display_block .="<td class=\"track_hpc\">";
     }
  elseif ($row['track'] == "Visualization")
     {
       $display_block .="<td class=\"track_viz\">";
     }
  elseif ($row['track'] == "Computational Bioinformatics")
     {
       $display_block .="<td class=\"track_bio\">";
     }
  else
     {
       $display_block .="<td>";
     }   
// display the resource (talk) information
$display_block .= "<span class=\"track\">". $row['track'] . "</span><br /><strong><a href=\"presentation_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong>";
  if ($row['pi'] > 0)
    {
      $display_block .= "<br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />Time slot: " . $row['start_time_f'] . " - ". $row['end_time_f'] . "<br />location: " . $row['name'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
    }
    else
    {
      $display_block .= "<br />" . $row['authors'] . "</td>";
    }

   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location_id'] == '1' && $row['track'] != '---') 
   {
$display_block .="
<td>---a</td>";

// if the time resource is for room 2
  if ($row['location_id'] == '2' && $row['track'] != '---')
   { 
// pick the appropriate color background by track
  if ($row['track'] == "HPC")
     {
       $display_block .="<td class=\"track_hpc\">";
     }
  elseif ($row['track'] == "Visualization")
     {
       $display_block .="<td class=\"track_viz\">";
     }
  elseif ($row['track'] == "Computational Bioinformatics")
     {
       $display_block .="<td class=\"track_bio\">";
     }
  else
     {
       $display_block .="<td>";
     } 
// display the resource (talk) information
$display_block .= "<span class=\"track\">". $row['track'] . "</span><br /><strong><a href=\"presentation_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong>";
  if ($row['pi'] > 0)
    {
      $display_block .= "<br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />Time slot: " . $row['start_time_f'] . " - ". $row['end_time_f'] . "<br />location: " . $row['name'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
    }
    else
    {
      $display_block .= "<br />" . $row['authors'] . "</td>";
    }
      $display_block .= "</tr>";
$last_start_time = $row['start_time'];
  }
   }

    }
  else
    {
  if ($row['location_id'] == '2' || $row['location_id'] == '3')
   { 
  if ($row['track'] == "HPC")
     {
       $display_block .="<td class=\"track_hpc\">";
     }
  elseif ($row['track'] == "Visualization")
     {
       $display_block .="<td class=\"track_viz\">";
     }
  elseif ($row['track'] == "Computational Bioinformatics")
     {
       $display_block .="<td class=\"track_bio\">";
     }
  else
     {
       $display_block .="<td>";
     }   
$display_block .= "<span class=\"track\">". $row['track'] . "</span><br /><strong><a href=\"presentation_edit.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong>";
  if ($row['pi'] > 0)
    {
      $display_block .= "<br /> - " . $row['last_name'] . ", " . $row['first_name'] . "<br />" . $row['track'] . "<br />Time slot: " . $row['start_time_f'] . " - ". $row['end_time_f'] . "<br />location: " . $row['name'] . "<br />presenter_id: " . $row['presenter_id'] . "<br />talk_id: " . $row['talk_id'] . "<br />schedule_id: " . $row['schedule_id'] . "<br />released: " . $row['released'] . "<br />license: " . $row['type'] . "<br />tags: " . $row['tags'] . "</td>";
    }
    else
    {
      $display_block .= "<br />" . $row['authors'] . "</td>";
    }
      $display_block .= "</tr>";
$last_start_time = $row['start_time'];
  }
  elseif ($row['location_id'] == '2' && $row['track'] != '---')
   {
$display_block .="
<td>---</td>";
   }

/////////////
//    }

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

<div align="right">
<p><a href="schedule_csv.php">Export to CSV (for Excel)</a></p>
</div>

<h2>Talks:</h2>
<table id="registrants_table" width="600">
  <tr>
    <th width="80">Time</th>
    <th>Room 1</th>
    <th>Room 2</th>
  </tr>
<?php echo $display_block ?>
</table>
<br />
<br />
</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>