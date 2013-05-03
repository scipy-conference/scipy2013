<?php

//===============================================
// IF SUCCESSFUL PAGE CONTENT                  //
//===============================================

include('inc/db_conn.php');

$day_start = '2013-06-26';
$day_end = '2013-06-27';

//===========================
//  pull DAY's date
//===========================

$sql_date = "SELECT ";
$sql_date .= "DATE_FORMAT(start_time, '%W - %M %D') AS mon_day, ";
$sql_date .= "DATE_FORMAT(start_time, '%b_%d') AS graphic ";
$sql_date .= "FROM schedules ";
$sql_date .= "WHERE schedules.start_time > '$day_start' ";
$sql_date .= "AND schedules.start_time < '$day_end' ";
$sql_date .= "ORDER BY start_time, location_id";

$total_date = @mysql_query($sql_date, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

while ($row = mysql_fetch_array($total_date)) {

     $mon_day=$row['mon_day'];
     $graphic=strtolower($row['graphic']);
     }

//===========================
//  pull tutorials 
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
$sql_presenters .= "talks.description, ";
$sql_presenters .= "location_id, ";
$sql_presenters .= "start_time, ";
$sql_presenters .= "name, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%h:%i %p') AS start_time_f, ";
$sql_presenters .= "DATE_FORMAT(end_time, '%h:%i %p') AS end_time_f, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%W - %b %D') AS schedule_day ";


$sql_presenters .= "FROM schedules ";

$sql_presenters .= "LEFT JOIN talks ";
$sql_presenters .= "ON schedules.talk_id = talks.id ";

$sql_presenters .= "LEFT JOIN locations ";
$sql_presenters .= "ON schedules.location_id = locations.id ";

$sql_presenters .= "LEFT JOIN presenters_talks ";
$sql_presenters .= "ON presenters_talks.talk_id = talks.id ";

$sql_presenters .= "LEFT JOIN presenters ";
$sql_presenters .= "ON presenters_talks.presenter_id = presenters.id ";

$sql_presenters .= "LEFT JOIN license_types ";
$sql_presenters .= "ON license_type_id = license_types.id ";

$sql_presenters .= "WHERE schedules.start_time > '$day_start' ";
$sql_presenters .= "AND schedules.start_time < '$day_end' ";
$sql_presenters .= "ORDER BY start_time, location_id";


$total_presenters = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_presenters_2 = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$last_start_time = '';
$last_schedule_day = '';
$last_talk = '';
$counter = 0;

do {

if ($row['title'] != '')
  {

if ($row['talk_id'] != $last_talk)
  {
if ($row['schedule_day'] != $last_schedule_day) 
{

$display_block .="
  <tr>
    <th colspan=\"4\">" . $row['schedule_day'] . "</th>
  </tr>
  <tr>
    <th width=\"13%\">Time</th>
    <th width=\"29%\">Room 1</th>
    <th width=\"29%\">Room 2</th>
    <th width=\"29%\">Room 3</th>
  </tr>";
$last_schedule_day = $row['schedule_day'];
}


  if ($row['start_time'] != $last_start_time) 
     {
       $display_block .="
  <tr>
    <td>" . $row['start_time_f'] . " - " . $row['end_time_f'] . "</td>";
     }

  if ($row['track'] == '---')
    {
      $display_block .="<td colspan=\"3\" class=\"track_atsumaru\"><strong>" . $row['title'] . "</strong>";
      $last_start_time = $row['start_time'];
      $last_talk = $row['talk_id'];
    }
  elseif ($row['track'] == 'Plenary')
    {
      $display_block .="<td colspan=\"3\" class=\"track_atsumaru\"><span class=\"track\">". $row['track'] . "</span><br /><strong>" . $row['title'] . "</strong>";
      $last_start_time = $row['start_time'];
      $last_talk = $row['talk_id'];
    }

  elseif ($row['location_id'] == '4')
    { 
      $display_block .="<td><span class=\"track\">". $row['track'] . "</span><br /><strong>" . $row['title'] . "</strong><br />" . $row['authors'] . "</td>";
      $last_start_time = $row['start_time'];
      $last_talk = $row['talk_id'];
    }
  elseif ($row['location_id'] == '5')
    { 
      $display_block .="<td><span class=\"track\">". $row['track'] . "</span><br /><strong>" . $row['title'] . "</strong><br />" . $row['authors'] . "</td>";
      $last_start_time = $row['start_time'];
      $last_talk = $row['talk_id'];
    }
  elseif ($row['location_id'] == '6')
    { 
      $display_block .="<td><span class=\"track\">". $row['track'] . "</span><br /><strong>" . $row['title'] . "</strong><br />" . $row['authors'] . "</td>";
      $last_start_time = $row['start_time'];
      $last_talk = $row['talk_id'];
    }
  else 
   {
      $display_block .="<td>---</td>";
      $last_start_time = $row['start_time'];
      $last_talk = $row['talk_id'];
   }
  }
}
$counter = $counter + 1;
}

//if ($counter > 4)
//  {
//  $display_block .="
//  </tr>";
//  }

while ($row = mysql_fetch_array($total_presenters));

////////////////////

//===========================
//  pull presentations
//===========================

$sql_ms = "SELECT ";
$sql_ms .= "presenters.id AS presenter_id, ";
$sql_ms .= "talks.id AS talk_id, ";
$sql_ms .= "schedules.id AS schedule_id, ";
$sql_ms .= "talks.presenter_id AS pi, ";
$sql_ms .= "last_name, ";
$sql_ms .= "first_name, ";
$sql_ms .= "affiliation, ";
$sql_ms .= "bio, ";
$sql_ms .= "title, ";
$sql_ms .= "track, ";
$sql_ms .= "authors, ";
$sql_ms .= "location_id, ";
$sql_ms .= "start_time, ";
$sql_ms .= "end_time, ";
$sql_ms .= "name, ";

$sql_ms .= "DATE_FORMAT(start_time, '%h:%i %p') AS start_time_f, ";
$sql_ms .= "DATE_FORMAT(end_time, '%h:%i %p') AS end_time_f, ";
$sql_ms .= "(TIME_TO_SEC(end_time) - TIME_TO_SEC(start_time))/60 AS duration ";
$sql_ms .= "FROM schedules ";

$sql_ms .= "LEFT JOIN talks ";
$sql_ms .= "ON schedules.talk_id = talks.id ";

$sql_ms .= "LEFT JOIN presenters ";
$sql_ms .= "ON presenter_id = presenters.id ";

$sql_ms .= "LEFT JOIN license_types ";
$sql_ms .= "ON license_type_id = license_types.id ";

$sql_ms .= "LEFT JOIN locations ";
$sql_ms .= "ON location_id = locations.id ";

$sql_ms .= "WHERE talks.conference_id = 1 ";
$sql_ms .= "AND schedules.start_time > '$day_start' ";
$sql_ms .= "AND schedules.start_time < '$day_end' ";
$sql_ms .= "AND track IN ('Astronomy Mini-Symposia','Bioinformatics Mini-Symposia','Geophysics Mini-Symposia','Meteorology Mini-Symposia') ";
$sql_ms .= "ORDER BY track DESC, start_time";



$total_ms = @mysql_query($sql_ms, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_start_time = '';

$count = 1;

do {

if ($row['title'] != '')

  {
  if ($count == 6) 
   {
// if a new start time display new row and the time cell


// display the resource (talk) information
$display_block_ms .= "
    </td>
    <td>";
if ($row['track'] == "Astronomy Mini-Symposia")
  {
$display_block_ms .= "
      <div style=\"background-color: #222; color: #fff; width: 287px; height: " . $row['duration'] * 10  . "px;border: 1px solid #666; padding: 0 4px;\">";    
  }
if ($row['track'] == "Geophysics Mini-Symposia")
  {
$display_block_ms .= "
      <div style=\"background-color: #eee; width: 287px; height: " . $row['duration'] * 10  . "px;border: 1px solid #666; padding: 0 4px;\">";    
  }
if ($row['track'] == "Meteorology Mini-Symposia")
  {
$display_block_ms .= "
      <div style=\"background-color: #cadbeb; width: 287px; height: " . $row['duration'] * 10  . "px;border: 1px solid #666; padding: 0 4px;\">";    
  }
if ($row['track'] == "Bioinformatics Mini-Symposia")
  {
$display_block_ms .= "
      <div style=\"background-color: #fcf6da; width: 287px; height: " . $row['duration'] * 10  . "px;border: 1px solid #666; padding: 0 4px;\">";    
  }

$display_block_ms .= "
        <div align=\"right\">". $row['start_time_f'] . " - " . $row['end_time_f'] . "</div>
          <span class=\"track\">". $row['track'] . " " . $count . "</span><br />
            <span class=\"bold\">" . $row['title'] . "</span>";
  if ($row['pi'] > 0)
    {
      $display_block_ms .= "<br />
           - " . $row['last_name'] . ", " . $row['first_name'] . "";
    }
    else
    {
      $display_block_ms .= "<br />" . $row['authors'] . "";
    }
$display_block_ms .= "
   </div>";
   $count = $count + 1;
   }

  else
    {
if ($row['track'] == "Astronomy Mini-Symposia")
  {
$display_block_ms .= "
      <div style=\"background-color: #222; color: #fff; width: 287px; height: " . $row['duration'] * 10  . "px;border: 1px solid #666; padding: 0 4px;\">";    
  }
if ($row['track'] == "Geophysics Mini-Symposia")
  {
$display_block_ms .= "
      <div style=\"background-color: #eee; width: 287px; height: " . $row['duration'] * 10  . "px;border: 1px solid #666; padding: 0 4px;\">";    
  }
if ($row['track'] == "Meteorology Mini-Symposia")
  {
$display_block_ms .= "
      <div style=\"background-color: #cadbeb; width: 287px; height: " . $row['duration'] * 10  . "px;border: 1px solid #666; padding: 0 4px;\">";    
  }
if ($row['track'] == "Bioinformatics Mini-Symposia")
  {
$display_block_ms .= "
      <div style=\"background-color: #fcf6da; width: 287px; height: " . $row['duration'] * 10  . "px;border: 1px solid #666; padding: 0 4px;\">";    
  }

$display_block_ms .= "
        <div align=\"right\">". $row['start_time_f'] . " - " . $row['end_time_f'] . "</div>
          <span class=\"track\">". $row['track'] . " " . $count . "</span><br />
            <span class=\"bold\">" . $row['title'] . "</span>";
  if ($row['pi'] > 0)
    {
      $display_block_ms .= "<br />
            - " . $row['last_name'] . ", " . $row['first_name'] . "";
    }
    else
    {
      $display_block_ms .= "<br />" . $row['authors'] . "";
    }
$display_block_ms .= "
      </div>";
   $count = $count + 1;
   }
//$count = $count+ 1;

/////////////


//  }
}
//$display_block_ms .= "</td>";
}
while ($row = mysql_fetch_array($total_ms));


?>

<!DOCTYPE html>
<html>
<?php $thisPage="Venue"; ?>
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

<div align="right"><img src="../img/<?php echo $graphic ?>.png" /></div>
<h2>Conference Schedule: </h2>

<p>The Conference Schedule (June 26th &amp; 27th) is in its final stages of confirmation. There may be changes made to the schedule between now and the conference.</p>

<table id="registrants_table">
  <tr>
    <th colspan="4"><?php echo $mon_day ?></th>
  </tr>
  <tr>
    <th width="80">Time</th>
    <th width="250">Room 1</th>
    <th width="250">Room 2</th>
    <th width="250">Room 3</th>
  </tr>
<?php echo $display_block ?>
</table>




</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>