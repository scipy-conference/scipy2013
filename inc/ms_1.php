<?php

//===========================
//  pull mini symposia DAY 1
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
$sql_ms .= "sub_track, ";
$sql_ms .= "authors, ";
$sql_ms .= "video_link, ";
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

$sql_ms .= "WHERE talks.conference_id = 2 ";
$sql_ms .= "AND schedules.start_time < '2013-06-27 00:00:00' ";
$sql_ms .= "AND schedules.start_time > '2013-06-26 00:00:00' ";
$sql_ms .= "AND track IN ('Bioinformatics','Astronomy and Astrophysics','GIS - Geospatial Data Analysis') ";
$sql_ms .= "ORDER BY FIELD(track,'Bioinformatics','Astronomy and Astrophysics','GIS - Geospatial Data Analysis'), start_time";

$total_ms = @mysql_query($sql_ms, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

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
$display_block_ms .= "
    </td>
    <td>";
if ($row['track'] == "Astronomy and Astrophysics")
  {
$display_block_ms .= "
      <div class=\"astro\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";    
  }
if ($row['track'] == "GIS - Geospatial Data Analysis")
  {
$display_block_ms .= "
      <div class=\"gis\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";     
  }
if ($row['track'] == "Meteorology, Climatology, Atmospheric and Oceanic Science")
  {
$display_block_ms .= "
      <div class=\"meteorology\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";      
  }
if ($row['track'] == "Medical Imaging")
  {
$display_block_ms .= "
      <div class=\"medical-imaging\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";     
  }
if ($row['track'] == "Bioinformatics")
  {
$display_block_ms .= "
      <div class=\"bioinformatics\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";       
  }

$display_block_ms .= "
        <div align=\"right\">". $row['start_time_f'] . " - " . $row['end_time_f'] . "</div>
          <span class=\"track\">". $row['track'] . "";
          if($row['sub_track'] !='') {$display_block_ms .= " - " . $row['sub_track'] . "";}$display_block_ms .="</span><br />";
            if ($row['talk_id'] == "204")
            {
            $display_block_ms .= "<a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>Best-practice variant calling pipeline...</strong></a>";
            }
            else
            {
            $display_block_ms .= "<a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";
            }




  if ($row['video_link'] != '')
    {
      $display_block_ms .= "<br /> <img src=\"../img/video_play.gif\" /> <a href=\"" . $row['video_link'] . "\">Video</a>";
    }

  if ($row['pi'] > 0)
    {
      $display_block_ms .= "<br />
           - " . $row['last_name'] . ", " . $row['first_name'] . "";
    }
    else
    {
      $display_block_ms .= "<br /><span class=\"authors\">" . $row['authors'] . "</span>";
    }
$display_block_ms .= "
   </div>";
   $count = $count + 1;
   $last_track = $row['track'];
   }

  else
    {
if ($row['track'] == "Astronomy and Astrophysics")
  {
$display_block_ms .= "
      <div class=\"astro\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";    
  }
if ($row['track'] == "GIS - Geospatial Data Analysis")
  {
$display_block_ms .= "
      <div class=\"gis\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";     
  }
if ($row['track'] == "Meteorology, Climatology, Atmospheric and Oceanic Science")
  {
$display_block_ms .= "
      <div class=\"meteorology\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";      
  }
if ($row['track'] == "Medical Imaging")
  {
$display_block_ms .= "
      <div class=\"medical-imaging\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";     
  }
if ($row['track'] == "Bioinformatics")
  {
$display_block_ms .= "
      <div class=\"bioinformatics\" style=\"height: " . $row['duration'] * $multiplier  . "px;\">";       
  }

$display_block_ms .= "
        <div align=\"right\">". $row['start_time_f'] . " - " . $row['end_time_f'] . "</div>
          <span class=\"track\">". $row['track'] . "";
          if($row['sub_track'] !='') {$display_block_ms .= " - " . $row['sub_track'] . "";}$display_block_ms .="</span><br />";
            if ($row['talk_id'] == "204")
            {
            $display_block_ms .= "<a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>Best-practice variant calling pipeline...</strong></a>";
            }
            else
            {
            $display_block_ms .= "<a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";
            }
  if ($row['video_link'] != '')
    {
      $display_block_ms .= "<br /> <img src=\"../img/video_play.gif\" /> <a href=\"" . $row['video_link'] . "\">Video</a>";
    }

  if ($row['pi'] > 0)
    {
      $display_block_ms .= "<br />
            - " . $row['last_name'] . ", " . $row['first_name'] . "";
    }
    else
    {
//      $display_block_ms .= "<br /><span class=\"authors\">" . $row['authors'] . "</span>";
            if ($row['talk_id'] != "204")
            {
            $display_block_ms .= "<br /><span class=\"authors\">" . $row['authors'] . "</span>";
            }
    }
$display_block_ms .= "
      </div>";
   $count = $count + 1;
    $last_track =  $row['track'];
   }


/////////////


//  }
}
//$display_block_ms .= "</td>";
}
while ($row = mysql_fetch_array($total_ms));

?>