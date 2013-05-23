<?php

//===============================================
// IF SUCCESSFUL PAGE CONTENT                  //
//===============================================

include('inc/db_conn.php');

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

$sql_presenters .= "WHERE talks.conference_id = 2 ";
$sql_presenters .= "AND track IN ('Introductory','Intermediate','Advanced') ";
$sql_presenters .= "ORDER BY start_time, FIELD(track,'Introductory','Intermediate','Advanced')";


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

while ($row = mysql_fetch_array($total_presenters));






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
      $display_block .="<td colspan=\"3\" class=\"track_atsumaru\"><span class=\"track\">". $row['track'] . "</span><br />";
            if ($row['track'] == 'Keynotes')
               {
                  $display_block .="<a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>"  . $row['title'] . "</strong></a>";
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
$display_block .= "<span class=\"track\">". $row['track'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

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
$display_block .= "<span class=\"track\">". $row['track'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

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
$display_block .= "<span class=\"track\">". $row['track'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

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

$multiplier = 15;
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
          <span class=\"track\">". $row['track'] . "</span><br />
            <a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

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
          <span class=\"track\">". $row['track'] . "</span><br />
            <a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

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
    $last_track =  $row['track'];
   }


/////////////


//  }
}
//$display_block_ms .= "</td>";
}
while ($row = mysql_fetch_array($total_ms));


//===========================
//  pull presenters DAY 2
//===========================

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
$display_block_2 .="
<tr>
  <td>" . $row['start_time_f'] . " -<br />" . $row['end_time_f'] . "</td>";

/////////////////
  if ($row['track'] == '---' || $row['track'] == 'Plenary'  || $row['track'] == 'Keynotes')
    {
      $display_block_2 .="<td colspan=\"3\" class=\"track_atsumaru\"><span class=\"track\">". $row['track'] . "</span><br />";
            if ($row['track'] == 'Keynotes')
               {
                  $display_block_2 .="<a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>"  . $row['title'] . "</strong></a>";
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
$display_block_2 .= "<span class=\"track\">". $row['track'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

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
$display_block_2 .= "<span class=\"track\">". $row['track'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

$display_block_2 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location'] == '6' && $row['track'] != '') 
   {
$display_block_2 .="
<td>---2 ". $row['schedule_id'] . "</td>";
}
  if ($row['location_id'] == '6' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_block_2 .="<td>";

// display the resource (talk) information
$display_block_2 .= "<span class=\"track\">". $row['track'] . "</span><br /><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\"><strong>" . $row['title'] . "</strong></a>";

$display_block_2 .= "<br /><span class=\"authors\">" . $row['authors'] . "</span></td></tr>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location'] == '6' && $row['track'] != '') 
   {
$display_block_2 .="
<td>---3 ". $row['schedule_id'] . "</td></tr>";
}
// second bracket
//}
// first bracket
}
while ($row = mysql_fetch_array($total_presenters_2));

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
$sql_ms_2 .= "ORDER BY FIELD(track,'Medical Imaging','Meteorology, Climatology, Atmospheric and Oceanic Science','Bioinformatics'), start_time";



$total_ms_2 = @mysql_query($sql_ms_2, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$multiplier = 15;
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
          <span class=\"track\">". $row['track'] . "</span><br />
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
          <span class=\"track\">". $row['track'] . "</span><br />
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

//===========================
//  pull Sprints
//===========================

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

<!DOCTYPE html>
<html>
<?php $thisPage="SciPy2013 :: Schedule :: Talks"; ?>
<head>

<?php include('inc/header.php') ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />
</head>

<body>

<div id="container">
<a name="top"></a>
<?php include('inc/page_headers.php') ?>

<section id="sidebar">
  <?php include("inc/sponsors.php") ?>
</section>

<section id="main-content">

<h2>Program Schedule:</h2>

<p>The Program Schedule is in its final stages of confirmation. There may be changes made to the schedule between now and the conference.</p>

<p class="intra_page_nav" style="text-align: center; font-size: 0.85em;">Tutorials <a href="#tutorials">June 24th & 25th</a> | Talks <a href="#day_one">June 26th</a> & <a href="#day_two">June 27th</a><br />
Mini Symposia <a href="#day_one_ms">June 26th</a> & <a href="#day_two_ms">June 27th</a> | Sprints <a href="#sprints">June 28th & 29th</a></p>

<h2>Tutorials Schedule</h2>

<p>The conference always kicks off with two days of tutorials. These sessions provide extremely affordable access to expert training, and consistently receive fantastic feedback from participants. This year we are expanding the tutorial session to include three parallel tracks: introductory, intermediate and advanced.</p>

<p>The Tutorials Schedule (June 24th & 25th) is in its final stages of confirmation. There may be changes made to the schedule between now and the conference.</p>

<a name="tutorials"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
<table id="registrants_table">
<?php echo $display_tutorials ?>
</table>

<a name="day_one"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>

<h2>Talks Schedule, Day 1 - June 26th</h2>
<table id="registrants_table">
  <tr>
    <th width="15%">Time</th>
    <th width="28%">Room 1</th>
    <th width="28%">Room 2</th>
    <th width="28%">Room 3</th>
  </tr>
<?php echo $display_block ?>
</table>
<br />
<br />
<a name="day_one_ms"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
<h2>Mini-Symposia, Day 1 - June 26th </h2>
<p>Note: start times are not always con-current across tracks.</p>
<table id="registrants_table">
  <tr>
    <th colspan="4"><?php echo $mon_day ?></th>
  </tr>
  <tr>
    <th width="32%">Room: 1</th>
    <th width="32%">Room: 2</th>
    <th width="32%">Room: 3</th>
  </tr>
  <tr>
    <td>
    <?php echo $display_block_ms ?>
    </td>
  </tr>
</table>
<br />
<br />
<a name="day_two"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
<h2>Talks Schedule, Day 2 - June 27th</h2>
<table id="registrants_table">
  <tr>
    <th width="15%">Time</th>
    <th width="28%">Room 1</th>
    <th width="28%">Room 2</th>
    <th width="28%">Room 3</th>
  </tr>
<?php echo $display_block_2 ?>
</table>

<br />
<br />
<a name="day_two_ms"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
<h2><h2>Mini-Symposia, Day 2 - June 27th </h2></h2>
<p>Note: start times are not always con-current across tracks.</p>
<table id="registrants_table">
  <tr>
    <th colspan="4"><?php echo $mon_day ?></th>
  </tr>
  <tr>
    <th width="32%">Room: 1</th>
    <th width="32%">Room: 2</th>
    <th width="32%">Room: 3</th>
  </tr>
  <tr>
    <td>
    <?php echo $display_block_ms_2 ?>
    </td>
  </tr>
</table>

<br />
<br />
<a name="sprints"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
<h2>Sprints Schedule</h2>
<table id="registrants_table">
<?php echo $display_sprints_1 ?>
</table>

</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>