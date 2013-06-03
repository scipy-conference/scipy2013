<?php

//===========================
//  pull mini symposia DAY 2
//===========================

$sql_ms_2 = "SELECT ";
$sql_ms_2 .= "presenters.id AS presenter_id, ";
$sql_ms_2 .= "talks.id AS talk_id, ";
$sql_ms_2 .= "schedules.id AS schedule_id, ";
$sql_ms_2 .= "talks.presenter_id AS pi, ";
$sql_ms_2 .= "last_name, ";
$sql_ms_2 .= "first_name, ";
$sql_ms_2 .= "affiliation, ";
$sql_ms_2 .= "bio, ";
$sql_ms_2 .= "title, ";
$sql_ms_2 .= "track, ";
$sql_ms_2 .= "sub_track, ";
$sql_ms_2 .= "authors, ";
$sql_ms_2 .= "video_link, ";
$sql_ms_2 .= "location_id, ";
$sql_ms_2 .= "start_time, ";
$sql_ms_2 .= "end_time, ";
$sql_ms_2 .= "name, ";

$sql_ms_2 .= "DATE_FORMAT(start_time, '%h:%i %p') AS start_time_f, ";
$sql_ms_2 .= "DATE_FORMAT(end_time, '%h:%i %p') AS end_time_f, ";
$sql_ms_2 .= "(TIME_TO_SEC(end_time) - TIME_TO_SEC(start_time))/60 AS duration ";
$sql_ms_2 .= "FROM schedules ";

$sql_ms_2 .= "LEFT JOIN talks ";
$sql_ms_2 .= "ON schedules.talk_id = talks.id ";

$sql_ms_2 .= "LEFT JOIN presenters ";
$sql_ms_2 .= "ON presenter_id = presenters.id ";

$sql_ms_2 .= "LEFT JOIN license_types ";
$sql_ms_2 .= "ON license_type_id = license_types.id ";

$sql_ms_2 .= "LEFT JOIN locations ";
$sql_ms_2 .= "ON location_id = locations.id ";

$sql_ms_2 .= "WHERE talks.conference_id = 2 ";
$sql_ms_2 .= "AND schedules.start_time < '2013-06-28 00:00:00' ";
$sql_ms_2 .= "AND schedules.start_time > '2013-06-27 00:00:00' ";
$sql_ms_2 .= "AND track IN ('Medical Imaging','Meteorology, Climatology, Atmospheric and Oceanic Science','Bioinformatics') ";
$sql_ms_2 .= "ORDER BY FIELD(track,'Medical Imaging','Bioinformatics','Meteorology, Climatology, Atmospheric and Oceanic Science'), start_time";



$total_ms_2 = @mysql_query($sql_ms_2, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$multiplier = 16;
$last_start_time = '';
$last_track = '';
$count = 1;

do {

if ($row['title'] != '')

  {
  //if ($count == 6) 
  if ($row['track'] != $last_track && $count > 1)
   {
// if a new track, display new column


// display the resource (talk) information
$display_block_ms_2 .= "
    </td>
    <td>";
if ($row['track'] == "Astronomy and Astrophysics")
  {
$display_block_ms_2 .= "
      <div class=\"astro\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";    
  }
if ($row['track'] == "GIS - Geospatial Data Analysis")
  {
$display_block_ms_2 .= "
      <div class=\"gis\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";     
  }
if ($row['track'] == "Meteorology, Climatology, Atmospheric and Oceanic Science")
  {
$display_block_ms_2 .= "
      <div class=\"meteorology\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";      
  }
if ($row['track'] == "Medical Imaging")
  {
$display_block_ms_2 .= "
      <div class=\"medical-imaging\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";     
  }
if ($row['track'] == "Bioinformatics")
  {
$display_block_ms_2 .= "
      <div class=\"bioinformatics\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";       
  }

$display_block_ms_2 .= "
        <div align=\"right\">". $row['start_time_f'] . " - " . $row['end_time_f'] . "</div>
          <span class=\"track\">". $row['track'] . "";
          if($row['sub_track'] !='') {$display_block_ms_2 .= " - " . $row['sub_track'] . "";}$display_block_ms_2 .="</span><br />
            <a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

  if ($row['video_link'] != '')
    {
      $display_block_ms_2 .= "<br /> <img src=\"../img/video_play.gif\" /> <a href=\"" . $row['video_link'] . "\">Video</a>";
    }

  if ($row['pi'] > 0)
    {
      $display_block_ms_2 .= "<br />
           - " . $row['last_name'] . ", " . $row['first_name'] . "";
    }
    else
    {
      $display_block_ms_2 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span>";
    }
$display_block_ms_2 .= "
   </div>";
   $count = $count + 1;
   $last_track = $row['track'];
   }

  else
    {
if ($row['track'] == "Astronomy and Astrophysics")
  {
$display_block_ms_2 .= "
      <div class=\"astro\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";    
  }
if ($row['track'] == "GIS - Geospatial Data Analysis")
  {
$display_block_ms_2 .= "
      <div class=\"gis\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";     
  }
if ($row['track'] == "Meteorology, Climatology, Atmospheric and Oceanic Science")
  {
$display_block_ms_2 .= "
      <div class=\"meteorology\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";      
  }
if ($row['track'] == "Medical Imaging")
  {
$display_block_ms_2 .= "
      <div class=\"medical-imaging\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";     
  }
if ($row['track'] == "Bioinformatics")
  {
$display_block_ms_2 .= "
      <div class=\"bioinformatics\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";       
  }

$display_block_ms_2 .= "
        <div align=\"right\">". $row['start_time_f'] . " - " . $row['end_time_f'] . "</div>
          <span class=\"track\">". $row['track'] . "";
          if($row['sub_track'] !='') {$display_block_ms_2 .= " - " . $row['sub_track'] . "";}$display_block_ms_2 .="</span><br />
            <a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

  if ($row['video_link'] != '')
    {
      $display_block_ms_2 .= "<br /> <img src=\"../img/video_play.gif\" /> <a href=\"" . $row['video_link'] . "\">Video</a>";
    }

  if ($row['pi'] > 0)
    {
      $display_block_ms_2 .= "<br />
            - " . $row['last_name'] . ", " . $row['first_name'] . "";
    }
    else
    {
      $display_block_ms_2 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span>";
    }
$display_block_ms_2 .= "
      </div>";
   $count = $count + 1;
    $last_track =  $row['track'];
   }


/////////////


//  }
}
//$display_block_ms .= "</td>";
}
while ($row = mysql_fetch_array($total_ms_2));


?>