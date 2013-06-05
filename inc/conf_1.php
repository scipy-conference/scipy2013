<?php

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

$sql_presenters .= "WHERE schedules.start_time < '2013-06-27 00:00:00' ";
$sql_presenters .= "AND schedules.start_time > '2013-06-26 00:00:00' ";
$sql_presenters .= "AND track IN ('General','Reproducible Science','Machine Learning','Plenary','---','Keynotes') ";
$sql_presenters .= "ORDER BY start_time, location_id";



$total_presenters = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_start_time = '';

// first bracket
do {

// second bracket
//if ($row['title'] != '')
//  {

// third bracket
  if ($row['start_time'] != $last_start_time) 
   {
// if a new start time display new row and the time cell
$display_block .="
<tr>
  <td>" . $row['start_time_f'] . " -<br />" . $row['end_time_f'] . "</td>";

/////////////////
  if ($row['track'] == '---' || $row['track'] == 'Plenary'  || $row['track'] == 'Keynotes')
    {
      $display_block .="<td colspan=\"3\" class=\"track_atsumaru\"><span class=\"track\">". $row['track'] . "";
      if ($row['track'] == 'Plenary'  || $row['track'] == 'Keynotes')
        {
         $display_block .=" - Rm ". $row['name'] . "";
        }
        $display_block .="</span><br />";
            if ($row['track'] == 'Keynotes')
               {
                  $display_block .="<a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>"  . $row['title'] . "</strong></a>";
                }
                elseif ($row['title'] == 'Lunch')
                {
                  $display_block .="<strong>"  . $row['title'] . " / BoFs</strong>";
                }
                else
                {
                  $display_block .="<strong>"  . $row['title'] . "</strong>";
                }
      if ($row['authors'] != '')
        {
         $display_block .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td></tr>";
        }
      $last_start_time = $row['start_time'];
    }

// if the time resource is for room 1
  elseif ($row['location_id'] == '4' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_block .="<td>";

// display the resource (talk) information
$display_block .= "<span class=\"track\">". $row['track'] . " - Rm ". $row['name'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

$display_block .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  else 
   {
$display_block .="
<td>---1 ". $row['schedule_id'] . "</td>";
   $last_start_time = $row['start_time'];
}
// third bracket
}
  if ($row['location_id'] == '5' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_block .="<td>";

// display the resource (talk) information
$display_block .= "<span class=\"track\">". $row['track'] . " - Rm ". $row['name'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

$display_block .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location'] == '6' && $row['track'] != '') 
   {
$display_block .="
<td>---2 ". $row['schedule_id'] . "</td>";
}
  if ($row['location_id'] == '6' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_block .="<td>";

// display the resource (talk) information
$display_block .= "<span class=\"track\">". $row['track'] . " - Rm ". $row['name'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

$display_block .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td></tr>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location'] == '6' && $row['track'] != '') 
   {
$display_block .="
<td>---3 ". $row['schedule_id'] . "</td></tr>";
}
// second bracket
//}
// first bracket
}
while ($row = mysql_fetch_array($total_presenters));

?>