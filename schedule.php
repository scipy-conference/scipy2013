<?php

//===============================================
// IF SUCCESSFUL PAGE CONTENT                  //
//===============================================

include('inc/db_conn.php');

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
  <td>" . $row['start_time_f'] . " - " . $row['end_time_f'] . "</td>";

/////////////////
  if ($row['track'] == '---' || $row['track'] == 'Plenary')
    {
      $display_block .="<td colspan=\"3\" class=\"track_atsumaru\"><span class=\"bold\">"  . $row['title'] . "</span>";
      if ($row['last_name'] != '')
        {
      $display_block .="<br /> - " . $row['last_name'] . ", " . $row['first_name'] . "</td></tr>";
      }
      $last_start_time = $row['start_time'];
    }

// if the time resource is for room 1
  if ($row['location_id'] == '4' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_block .="<td>";

// display the resource (talk) information
$display_block .= "<span class=\"track\">". $row['track'] . "1</span><br /><span class=\"bold\">" . $row['title'] . "</span>";

$display_block .= "<br />" . $row['authors'] . "</td>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  else 
   {
$display_block .="
<td>---1</td>";
   $last_start_time = $row['start_time'];
}
// third bracket
}
  if ($row['location_id'] == '5' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_block .="<td>";

// display the resource (talk) information
$display_block .= "<span class=\"track\">". $row['track'] . "2</span><br /><span class=\"bold\">" . $row['title'] . "</span>";

$display_block .= "<br />" . $row['authors'] . "</td>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location'] == '6' && $row['track'] != '') 
   {
$display_block .="
<td>---2</td>";
}
  if ($row['location_id'] == '6' && $row['track'] != '---' && $row['track'] != 'Plenary')
   { 

       $display_block .="<td>";

// display the resource (talk) information
$display_block .= "<span class=\"track\">". $row['track'] . "3</span><br /><span class=\"bold\">" . $row['title'] . "</span>";

$display_block .= "<br />" . $row['authors'] . "</td></tr>";


   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location'] == '6' && $row['track'] != '') 
   {
$display_block .="
<td>---3</td></tr>";
}
// second bracket
//}
// first bracket
}
while ($row = mysql_fetch_array($total_presenters));


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

$sql_presenters_2 .= "WHERE talks.conference_id = 1 ";
$sql_presenters_2 .= "AND schedules.start_time > '2013-06-26 00:00:00' ";
$sql_presenters_2 .= "ORDER BY start_time, location_id";


$total_presenters_2 = @mysql_query($sql_presenters_2, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_start_time = '';

do {

if ($row['title'] != '')
  {
  if ($row['start_time'] != $last_start_time) 
   {
// if a new start time display new row and the time cell
$display_block_2 .="
<tr>
  <td>" . $row['start_time_f'] . " - " . $row['end_time_f'] . "</td>";

/////////////////
  if ($row['track'] == '---')
    {
      $display_block_2 .="<td colspan=\"2\" class=\"track_atsumaru\"><span class=\"bold\">"  . $row['title'] . "</span>";
      if ($row['last_name'] != '')
        {
      $display_block_2 .="<br /> - " . $row['last_name'] . ", " . $row['first_name'] . "</td></tr>";
      }
      $last_start_time = $row['start_time'];
    }
//  else
//    {



// if the time resource is for room 1
  if ($row['location'] == '1' && $row['track'] != '---')
   { 

// pick the appropriate color background by track
  if ($row['track'] == "Machine Learning")
     {
       $display_block_2 .="<td class=\"track_hpc\">";
     }
  elseif ($row['track'] == "Reproducible Science")
     {
       $display_block_2 .="<td class=\"track_viz\">";
     }
  elseif ($row['track'] == "Computational Bioinformatics")
     {
       $display_block_2 .="<td class=\"track_bio\">";
     }
  else
     {
       $display_block_2 .="<td>";
     }   
// display the resource (talk) information
$display_block_2 .= "<span class=\"track\">". $row['track'] . "</span><br /><span class=\"bold\">" . $row['title'] . "</span>";
  if ($row['pi'] > 0)
    {
      $display_block_2 .= "<br /> - " . $row['last_name'] . ", " . $row['first_name'] . "</td>";
    }
    else
    {
      $display_block_2 .= "<br />" . $row['authors'] . "</td>";
    }

   $last_start_time = $row['start_time'];
   }
// if the time resource is for room 2, show dashes for room 1 if no resource for it
  elseif ($row['location'] == '1' && $row['track'] != '---') 
   {
$display_block_2 .="
<td>---a</td>";

// if the time resource is for room 2
  if ($row['location'] == '2' && $row['track'] != '---')
   { 
// pick the appropriate color background by track
  if ($row['track'] == "Machine Learning")
     {
       $display_block_2 .="<td class=\"track_hpc\">";
     }
  elseif ($row['track'] == "Reproducible Science")
     {
       $display_block_2 .="<td class=\"track_viz\">";
     }
  elseif ($row['track'] == "Computational Bioinformatics")
     {
       $display_block_2 .="<td class=\"track_bio\">";
     }
  else
     {
       $display_block_2 .="<td>";
     } 
// display the resource (talk) information
$display_block_2 .= "<span class=\"track\">". $row['track'] . "</span><br /><span class=\"bold\">" . $row['title'] . "</span>";
  if ($row['pi'] > 0)
    {
      $display_block_2 .= "<br /> - " . $row['last_name'] . ", " . $row['first_name'] . "</td>";
    }
    else
    {
      $display_block_2 .= "<br />" . $row['authors'] . "</td>";
    }
      $display_block_2 .= "</tr>";
$last_start_time = $row['start_time'];
  }
   }

    }
  else
    {
  if ($row['location'] == '2')
   { 
  if ($row['track'] == "Machine Learning")
     {
       $display_block_2 .="<td class=\"track_hpc\">";
     }
  elseif ($row['track'] == "Reproducible Science")
     {
       $display_block_2 .="<td class=\"track_viz\">";
     }
  elseif ($row['track'] == "Computational Bioinformatics")
     {
       $display_block_2 .="<td class=\"track_bio\">";
     }
  else
     {
       $display_block_2 .="<td>";
     }   
$display_block_2 .= "<span class=\"track\">". $row['track'] . "</span><br /><span class=\"bold\">" . $row['title'] . "</span>";
  if ($row['pi'] > 0)
    {
      $display_block_2 .= "<br /> - " . $row['last_name'] . ", " . $row['first_name'] . "</td>";
    }
    else
    {
      $display_block_2 .= "<br />" . $row['authors'] . "</td>";
    }
      $display_block_2 .= "</tr>";
$last_start_time = $row['start_time'];
  }
  elseif ($row['location'] == '2' && $row['track'] != '---')
   {
$display_block_2 .="
<td>---</td>";
   }

/////////////
//    }

  }
}

}
while ($row = mysql_fetch_array($total_presenters_2));


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

<h2>Conference Schedule:</h2>

<p>The Conference Schedule (July 18th &amp; 19th) is in its final stages of confirmation. There may be changes made to the schedule between now and the conference.</p>

<table id="registrants_table" width="600">
  <tr>
    <th colspan="4">Day 1 - June 26th</th>
  </tr>
  <tr>
    <th width="80">Time</th>
    <th>Room 1</th>
    <th>Room 2</th>
    <th>Room 3</th>
  </tr>
<?php echo $display_block ?>
</table>
<br />
<br />
<table id="registrants_table" width="600">
  <tr>
    <th colspan="4">Day 2 - June 27th</th>
  </tr>
  <tr>
    <th width="80">Time</th>
    <th>Room 1</th>
    <th>Room 2</th>
  </tr>
<?php echo $display_block_2 ?>
</table>

</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>