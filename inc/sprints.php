<?php

$sql_sprints_1 = "SELECT ";
$sql_sprints_1 .= "presenters.id AS presenter_id, ";
$sql_sprints_1 .= "talks.id AS talk_id, ";
$sql_sprints_1 .= "schedules.id AS schedule_id, ";
$sql_sprints_1 .= "talks.presenter_id AS pi, ";
$sql_sprints_1 .= "last_name, ";
$sql_sprints_1 .= "first_name, ";
$sql_sprints_1 .= "affiliation, ";
$sql_sprints_1 .= "bio, ";
$sql_sprints_1 .= "title, ";
$sql_sprints_1 .= "track, ";
$sql_sprints_1 .= "authors, ";
$sql_sprints_1 .= "location_id, ";
$sql_sprints_1 .= "start_time, ";
$sql_sprints_1 .= "name, ";

$sql_sprints_1 .= "DATE_FORMAT(start_time, '%h:%i %p') AS start_time_f, ";
$sql_sprints_1 .= "DATE_FORMAT(end_time, '%h:%i %p') AS end_time_f, ";
$sql_sprints_1 .= "DATE_FORMAT(start_time, '%W - %b %D') AS schedule_day ";

$sql_sprints_1 .= "FROM schedules ";

$sql_sprints_1 .= "LEFT JOIN talks ";
$sql_sprints_1 .= "ON schedules.talk_id = talks.id ";

$sql_sprints_1 .= "LEFT JOIN presenters ";
$sql_sprints_1 .= "ON presenter_id = presenters.id ";

$sql_sprints_1 .= "LEFT JOIN license_types ";
$sql_sprints_1 .= "ON license_type_id = license_types.id ";

$sql_sprints_1 .= "LEFT JOIN locations ";
$sql_sprints_1 .= "ON location_id = locations.id ";

$sql_sprints_1 .= "WHERE schedules.start_time < '2013-06-30 00:00:00' ";
$sql_sprints_1 .= "AND schedules.start_time > '2013-06-28 00:00:00' ";
//$sql_sprints_1 .= "AND track IN ('General','Reproducible Science','Machine Learning','Plenary','---','Keynotes') ";
$sql_sprints_1 .= "ORDER BY start_time, location_id";



$total_sprints_1 = @mysql_query($sql_sprints_1, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_start_time = '';
$last_schedule_day = '';

// first bracket
do {

// second bracket
//if ($row['title'] != '')
//  {
if ($row['schedule_day'] != $last_schedule_day) 
{

$display_sprints_1 .="
  <tr>
    <th colspan=\"5\">" . $row['schedule_day'] . "</th>
  </tr>
  <tr>
    <th width=\"13%\">Time</th>
    <th width=\"22%\">Room 1</th>
    <th width=\"22%\">Room 2</th>
    <th width=\"22%\">Room 3</th>
    <th width=\"22%\">Room 4</th>
  </tr>";
$last_schedule_day = $row['schedule_day'];
}
// third bracket
  if ($row['start_time'] != $last_start_time) 
   {
// if a new start time display new row and the time cell
$display_sprints_1 .="
<tr>
  <td>" . $row['start_time_f'] . " -<br />" . $row['end_time_f'] . "</td>";

/////////////////
  if ($row['track'] == '---' || $row['track'] == 'Plenary'  || $row['track'] == 'Keynotes')
    {
      $display_sprints_1 .="<td colspan=\"4\" class=\"track_atsumaru\"><span class=\"track\">". $row['track'] . "</span><br />";
            if ($row['track'] == 'Keynotes')
               {
                  $display_sprints_1 .="<a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>"  . $row['title'] . "</strong></a>";
                }
                else
                {
                  $display_sprints_1 .="<strong>"  . $row['title'] . "</strong>";
                }
      if ($row['authors'] != '')
        {
         $display_sprints_1 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td></tr>";
        }
      $last_start_time = $row['start_time'];
    }

// if the time resource is for room 1
  elseif ($row['location_id'] == '4' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_sprints_1 .="<td>";

// display the resource (talk) information
$display_sprints_1 .= "<span class=\"track\">". $row['track'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

$display_sprints_1 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  else 
   {
$display_sprints_1 .="
<td>---1 ". $row['schedule_id'] . "</td>";
   $last_start_time = $row['start_time'];
}
// third bracket
}
  if ($row['location_id'] == '5' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_sprints_1 .="<td>";

// display the resource (talk) information
$display_sprints_1 .= "<span class=\"track\">". $row['track'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

$display_sprints_1 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location'] == '6' && $row['track'] != '') 
   {
$display_sprints_1 .="
<td>---2 ". $row['schedule_id'] . "</td>";
}
  if ($row['location_id'] == '6' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_sprints_1 .="<td>";

// display the resource (talk) information
$display_sprints_1 .= "<span class=\"track\">". $row['track'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

$display_sprints_1 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location'] == '6' && $row['track'] != '') 
   {
$display_sprints_1 .="
<td>---3 ". $row['schedule_id'] . "</td>";
}
  if ($row['location_id'] == '7' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_sprints_1 .="<td>";

// display the resource (talk) information
$display_sprints_1 .= "<span class=\"track\">". $row['track'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

$display_sprints_1 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td></tr>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location'] == '7' && $row['track'] != '') 
   {
$display_sprints_1 .="
<td>---3 ". $row['schedule_id'] . "</td></tr>";
}
// second bracket
//}
// first bracket
}
while ($row = mysql_fetch_array($total_sprints_1));

?>