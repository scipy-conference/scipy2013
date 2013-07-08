<?php

include('inc/db_conn.php');
include_once "inc/markdown.php";

$talk_id = $_GET['id'];

//===========================
//  pull presenters
//===========================

$sql_presenters = "SELECT ";
$sql_presenters .= "last_name, ";
$sql_presenters .= "first_name, ";
$sql_presenters .= "affiliation, ";
$sql_presenters .= "email, ";
$sql_presenters .= "bio, ";
$sql_presenters .= "presenters.id AS presenter_id, ";

$sql_presenters .= "talks.id AS talk_id, ";
$sql_presenters .= "title, ";
$sql_presenters .= "abstract, ";
$sql_presenters .= "talks.description, ";
$sql_presenters .= "outline, ";
$sql_presenters .= "packages, ";
$sql_presenters .= "documentation, ";
$sql_presenters .= "track, ";
$sql_presenters .= "authors, ";
$sql_presenters .= "released, ";
$sql_presenters .= "license_type_id, ";
$sql_presenters .= "video_link, ";
$sql_presenters .= "tags, ";

$sql_presenters .= "DATE_FORMAT(start_time, '%Y') AS start_year, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%b') AS start_month, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%d') AS start_day, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%W') AS start_dow, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%H:%i %p') AS start_time, ";

$sql_presenters .= "DATE_FORMAT(end_time, '%Y') AS end_year, ";
$sql_presenters .= "DATE_FORMAT(end_time, '%c') AS end_month, ";
$sql_presenters .= "DATE_FORMAT(end_time, '%d') AS end_day, ";
$sql_presenters .= "DATE_FORMAT(end_time, '%H:%i %p') AS end_time, ";

$sql_presenters .= "name ";

$sql_presenters .= "FROM talks ";
$sql_presenters .= "LEFT JOIN presenters_talks ";
$sql_presenters .= "ON talk_id = talks.id ";

$sql_presenters .= "LEFT JOIN presenters ";
$sql_presenters .= "ON presenters_talks.presenter_id = presenters.id ";
$sql_presenters .= "LEFT JOIN schedules ";
$sql_presenters .= "ON schedules.talk_id = talks.id ";
$sql_presenters .= "LEFT JOIN locations ";
$sql_presenters .= "ON location_id = locations.id ";
$sql_presenters .= "WHERE talks.id = \"$talk_id\"";


$total_presenters = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($total_presenters))
{

$last_name = $row['last_name'];
$first_name = $row['first_name'];
$affiliation = $row['affiliation'];
$email = $row['email'];
$bio = $row['bio'];
$presenter_id = $row['presenter_id'];
$talk_id = $row['talk_id'];
$title = $row['title'];
$abstract = $row['abstract'];
$track = $row['track'];
$released = $row['released'];
$license_type_id = $row['license_type_id'];
$video_link = $row['video_link'];
$tags = $row['tags'];
$authors = $row['authors'];
$description = $row['description'];
$outline = $row['outline'];
$packages = $row['packages'];
$documentation = $row['documentation'];
$start_time = $row['start_time'];
$end_time = $row['end_time'];
$start_year_set = $row['start_year'];
$start_month_set = $row['start_month'];
$start_day_set = $row['start_day'];
$start_dow = $row['start_dow'];
$start_hour = $row['start_hour'];
$start_minute = $row['start_minute'];
$end_year_set = $row['end_year'];
$end_month_set = $row['end_month'];
$end_day_set = $row['end_day'];
$end_hour = $row['end_hour'];
$end_minute = $row['end_minute'];
$location = $row['name'];
}


//===========================
//  pull videos
//===========================

$sql_video = "SELECT ";
$sql_video .= "part, ";
$sql_video .= "length, ";
$sql_video .= "title, ";
$sql_video .= "link ";
$sql_video .= "FROM videos ";
$sql_video .= "WHERE talk_id = \"$talk_id\" ";
$sql_video .= "ORDER BY part ASC";

$total_video = @mysql_query($sql_video, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$count = 0;

do {

if ($row['title'] != '')
  {

$display_videos .="
  <div class=\"free_cell\" style=\"text-align: center; margin: 0 0.25em;\"><iframe width=\"100%\"  src=\"//www.youtube.com/embed/" . $row['link'] . "\" frameborder=\"0\" allowfullscreen></iframe><br />[" . $row['length']. "]</div>";

$count = $count + 1;
}

}
while ($row = mysql_fetch_array($total_video));


?>

<!DOCTYPE html>
<html>
<?php $thisPage="Presentations"; ?>
<head>

<?php @ require_once ("inc/header.php"); ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />
</head>

<body>

<div id="container">

<?php include('inc/page_headers.php') ?>

<section id="sidebar">
  <?php include("inc/sponsors.php") ?>
</section>

<section id="main-content">

<?php if($start_month_set != '')
  {
?>
<div class="cell, schedule_info">
<?php echo "$start_dow" ?><br />
<div class="icon_date" style="margin: 0 auto;"><?php echo $start_month_set ?><br /><span class="icon_date_day"><?php echo $start_day_set ?></span></div>
<?php echo "$start_time" ?><br />
<?php echo "$end_time" ?><br />
Room: <a href="location_floor_map.php"><?php echo $location ?></a>
</div>
<?php } ?>
<h1><?php echo $title ?></h1>

<h3 style="display: block; text-indent: -6.75em; padding-left: 6.75em;">Authors: <?php echo $authors ?></h3>

<h3>Track: <?php echo $track ?></h3>

<hr />

<?php
if ($display_videos != "")
  {
  if ($count > 1) 
    {
      echo "<h3>Videos</h3> <div class=\"row\">";
    }
    else 
    {
      echo "<div class=\"callout\" style=\"width: 300px;\">
<h1>Video</h1> <div class=\"row\">";
    }
  echo $display_videos;
  echo "</div></div>";
  }
?>

<?php echo Markdown($abstract) ?>

</section>

<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>