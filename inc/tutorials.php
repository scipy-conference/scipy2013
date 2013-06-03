<?php

$sql_tutorials = "SELECT ";
$sql_tutorials .= "presenters.id AS presenter_id, ";
$sql_tutorials .= "talks.id AS talk_id, ";
$sql_tutorials .= "schedules.id AS schedule_id, ";
$sql_tutorials .= "talks.presenter_id AS pi, ";
$sql_tutorials .= "last_name, ";
$sql_tutorials .= "first_name, ";
$sql_tutorials .= "affiliation, ";
$sql_tutorials .= "bio, ";
$sql_tutorials .= "title, ";
$sql_tutorials .= "track, ";
$sql_tutorials .= "authors, ";
$sql_tutorials .= "talks.description, ";
$sql_tutorials .= "location_id, ";
$sql_tutorials .= "start_time, ";
$sql_tutorials .= "name, ";
$sql_tutorials .= "DATE_FORMAT(start_time, '%h:%i %p') AS start_time_f, ";
$sql_tutorials .= "DATE_FORMAT(end_time, '%h:%i %p') AS end_time_f, ";
$sql_tutorials .= "DATE_FORMAT(start_time, '%W - %b %D') AS schedule_day ";


$sql_tutorials .= "FROM schedules ";

$sql_tutorials .= "LEFT JOIN talks ";
$sql_tutorials .= "ON schedules.talk_id = talks.id ";

$sql_tutorials .= "LEFT JOIN locations ";
$sql_tutorials .= "ON schedules.location_id = locations.id ";

$sql_tutorials .= "LEFT JOIN presenters_talks ";
$sql_tutorials .= "ON presenters_talks.talk_id = talks.id ";

$sql_tutorials .= "LEFT JOIN presenters ";
$sql_tutorials .= "ON presenters_talks.presenter_id = presenters.id ";

$sql_tutorials .= "LEFT JOIN license_types ";
$sql_tutorials .= "ON license_type_id = license_types.id ";

$sql_tutorials .= "WHERE talks.conference_id = 2 ";
$sql_tutorials .= "AND track IN ('Introductory','Intermediate','Advanced') ";
$sql_tutorials .= "ORDER BY start_time, FIELD(track,'Introductory','Intermediate','Advanced')";


$total_tutorials = @mysql_query($sql_tutorials, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_tutorials_2 = @mysql_query($sql_tutorials, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
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

$display_tutorials .="
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


  if ($row['start_time'] != $last_start_time) 
     {
       $display_tutorials .="
  <tr>
    <td>" . $row['start_time_f'] . " - " . $row['end_time_f'] . "</td>";
     }

  if ($row['track'] == 'Introductory')
    { 
      $display_tutorials .="
    <td><strong><a href=\"tutorial_detail.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['first_name'] . " " . $row['last_name'] . "";
      $last_start_time = $row['start_time'];
      $last_talk = $row['talk_id'];
    }
  elseif ($row['track'] == 'Intermediate')
    { 
      $display_tutorials .="
    <td><strong><a href=\"tutorial_detail.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['first_name'] . " " . $row['last_name'] . "";
      $last_start_time = $row['start_time'];
      $last_talk = $row['talk_id'];
    }
  elseif ($row['track'] == 'Advanced')
    { 
      $display_tutorials .="
    <td><strong><a href=\"tutorial_detail.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['first_name'] . " " . $row['last_name'] . "";
      $last_start_time = $row['start_time'];
      $last_talk = $row['talk_id'];
    }
  else 
   {
     $display_tutorials .="
    <td>---</td>";
   }
  }
  else
  {
    $display_tutorials .=", " . $row['first_name'] . " " . $row['last_name'] . "";
    $last_talk = $row['talk_id'];
  }
}
$counter = $counter + 1;
}

//if ($counter > 4)
//  {
//  $display_tutorials .="
//  </tr>";
//  }

while ($row = mysql_fetch_array($total_tutorials));

?>
