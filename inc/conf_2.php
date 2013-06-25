<?php

$sql_presenters_2 = "SELECT ";
$sql_presenters_2 .= "presenters.id AS presenter_id, ";
$sql_presenters_2 .= "talks.id AS talk_id, ";
$sql_presenters_2 .= "schedules.id AS schedule_id, ";
$sql_presenters_2 .= "talks.presenter_id AS pi, ";
$sql_presenters_2 .= "last_name, ";
$sql_presenters_2 .= "first_name, ";
$sql_presenters_2 .= "affiliation, ";
$sql_presenters_2 .= "bio, ";
$sql_presenters_2 .= "title, ";
$sql_presenters_2 .= "track, ";
$sql_presenters_2 .= "authors, ";
$sql_presenters_2 .= "location_id, ";
$sql_presenters_2 .= "start_time, ";
$sql_presenters_2 .= "name, ";

$sql_presenters_2 .= "DATE_FORMAT(start_time, '%h:%i %p') AS start_time_f, ";
$sql_presenters_2 .= "DATE_FORMAT(end_time, '%h:%i %p') AS end_time_f ";

$sql_presenters_2 .= "FROM schedules ";

$sql_presenters_2 .= "LEFT JOIN talks ";
$sql_presenters_2 .= "ON schedules.talk_id = talks.id ";

$sql_presenters_2 .= "LEFT JOIN presenters ";
$sql_presenters_2 .= "ON presenter_id = presenters.id ";

$sql_presenters_2 .= "LEFT JOIN license_types ";
$sql_presenters_2 .= "ON license_type_id = license_types.id ";

$sql_presenters_2 .= "LEFT JOIN locations ";
$sql_presenters_2 .= "ON location_id = locations.id ";

$sql_presenters_2 .= "WHERE schedules.start_time < '2013-06-28 00:00:00' ";
$sql_presenters_2 .= "AND schedules.start_time > '2013-06-27 00:00:00' ";
$sql_presenters_2 .= "AND track IN ('General','Reproducible Science','Machine Learning','Plenary','---','Keynotes') ";
$sql_presenters_2 .= "ORDER BY start_time, location_id";



$total_presenters_2 = @mysql_query($sql_presenters_2, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

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
if ($row['title'] == 'Lunch') 
  {
$display_block_2 .="
<tr>
  <td rowspan=2>" . $row['start_time_f'] . " -<br />" . $row['end_time_f'] . "</td>";
  }
  else
  {
$display_block_2 .="
<tr>
  <td>" . $row['start_time_f'] . " -<br />" . $row['end_time_f'] . "</td>";
}
/////////////////
  if ($row['track'] == '---' || $row['track'] == 'Plenary'  || $row['track'] == 'Keynotes')
    {
      $display_block_2 .="<td colspan=\"3\" class=\"track_atsumaru\"><span class=\"track\">". $row['track'] . "";
      if ($row['track'] == 'Plenary'  || $row['track'] == 'Keynotes')
        {
         $display_block_2 .=" - Rm ". $row['name'] . "";
        }
        $display_block_2 .="</span><br />";
            if ($row['track'] == 'Keynotes')
               {
                  $display_block_2 .="<a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>"  . $row['title'] . "</strong></a>";
                }
                elseif ($row['title'] == 'Lunch')
                {
                  $display_block_2 .="<strong>"  . $row['title'] . " / BoFs</strong></td></tr>
                                    <tr><td class=\"track_atsumaru\"><span class=\"track\">BoF - Rm 204</span><br /><strong><a href=\"bof_detail.php?id=26\">SciPy 2014</a><strong></td><td class=\"track_atsumaru\"><span class=\"track\">BoF - Rm 203</span><br /><strong><a href=\"bof_detail.php?id=23\">Matplotlib enhancement proposal discussion</a></strong></td><td class=\"track_atsumaru\"><span class=\"track\">BoF - Rm 106</span><br /><strong><a href=\"bof_detail.php?id=41\">Python in Astronomy</a></strong>";
                }
                else
                {
                  $display_block_2 .="<strong>"  . $row['title'] . "</strong>";
                }
      if ($row['authors'] != '')
        {
         $display_block_2 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td></tr>";
        }
      $last_start_time = $row['start_time'];
    }

// if the time resource is for room 1
  elseif ($row['location_id'] == '4' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_block_2 .="<td>";

// display the resource (talk) information
$display_block_2 .= "<span class=\"track\">". $row['track'] . " - Rm ". $row['name'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

$display_block_2 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  else 
   {
$display_block_2 .="
<td>---1 ". $row['schedule_id'] . "</td>";
   $last_start_time = $row['start_time'];
}
// third bracket
}
  if ($row['location_id'] == '5' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_block_2 .="<td>";

// display the resource (talk) information
$display_block_2 .= "<span class=\"track\">". $row['track'] . " - Rm ". $row['name'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

$display_block_2 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location'] == '7' && $row['track'] != '') 
   {
$display_block_2 .="
<td>---2 ". $row['schedule_id'] . "</td>";
}
  if ($row['location_id'] == '7' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_block_2 .="<td>";

// display the resource (talk) information
$display_block_2 .= "<span class=\"track\">". $row['track'] . " - Rm ". $row['name'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

$display_block_2 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td></tr>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location'] == '7' && $row['track'] != '') 
   {
$display_block_2 .="
<td>---3 ". $row['schedule_id'] . "</td></tr>";
}
// second bracket
//}
// first bracket
}
while ($row = mysql_fetch_array($total_presenters_2));

?>