<?php
session_start();

include_once "inc/markdown.php";

include('inc/db_conn.php');

$talk_id = $_GET['id'];

//===========================
//  pull tutorial
//===========================

$sql_tutorial = "SELECT ";
$sql_tutorial .= "presenters.id AS presenter_id, ";

$sql_tutorial .= "talks.id AS talk_id, ";
$sql_tutorial .= "title, ";
$sql_tutorial .= "abstract, ";
$sql_tutorial .= "talks.description, ";
$sql_tutorial .= "outline, ";
$sql_tutorial .= "packages, ";
$sql_tutorial .= "documentation, ";
$sql_tutorial .= "track, ";
$sql_tutorial .= "released, ";
$sql_tutorial .= "license_type_id, ";
$sql_tutorial .= "video_link, ";
$sql_tutorial .= "tags, ";
$sql_tutorial .= "DATE_FORMAT(start_time, '%b') AS start_month, ";
$sql_tutorial .= "DATE_FORMAT(start_time, '%d') AS start_day, ";
$sql_tutorial .= "DATE_FORMAT(start_time, '%W') AS start_dow, ";
$sql_tutorial .= "DATE_FORMAT(start_time, '%H:%i %p') AS start_time, ";

$sql_tutorial .= "DATE_FORMAT(end_time, '%Y') AS end_year, ";
$sql_tutorial .= "DATE_FORMAT(end_time, '%c') AS end_month, ";
$sql_tutorial .= "DATE_FORMAT(end_time, '%d') AS end_day, ";
$sql_tutorial .= "DATE_FORMAT(end_time, '%H:%i %p') AS end_time, ";

$sql_tutorial .= "location_id, ";
$sql_tutorial .= "name ";

$sql_tutorial .= "FROM talks ";
$sql_tutorial .= "LEFT JOIN presenters_talks ";
$sql_tutorial .= "ON talk_id = talks.id ";

$sql_tutorial .= "LEFT JOIN presenters ";
$sql_tutorial .= "ON presenters_talks.presenter_id = presenters.id ";
$sql_tutorial .= "LEFT JOIN schedules ";
$sql_tutorial .= "ON schedules.talk_id = talks.id ";
$sql_tutorial .= "LEFT JOIN locations ";
$sql_tutorial .= "ON location_id = locations.id ";
$sql_tutorial .= "WHERE talks.id = \"$talk_id\"";



$total_tutorial = @mysql_query($sql_tutorial, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($total_tutorial))
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
$location = $row['location'];
$author_list[] = $row['presenter_id'];
$location = $row['name'];
}


//===========================
//  pull presenters
//===========================

foreach ($author_list as $key =>$value)

{
$sql_presenters = "SELECT ";
$sql_presenters .= "last_name, ";
$sql_presenters .= "first_name, ";
$sql_presenters .= "affiliation, ";
$sql_presenters .= "email, ";
$sql_presenters .= "bio ";
$sql_presenters .= "FROM presenters ";
$sql_presenters .= "WHERE id = $value";

$total_presenters = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($total_presenters))
{
$last_name = $row['last_name'];
$first_name = $row['first_name'];
$affiliation = $row['affiliation'];
$bio = $row['bio'];
$display_authors .= "$first_name $last_name - $affiliation<br />";
$display_bios .= "<p>$first_name $last_name<br />$bio</p>";
}
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
  <div class=\"free_cell\" style=\"text-align: center;\"><iframe width=\"150\" height=\"84\" src=\"//www.youtube.com/embed/DXPwSiRTxYY\" frameborder=\"0\" allowfullscreen></iframe><br />Part " . $row['part']. "<br />[" . $row['length']. "]</div>";

//<iframe width="560" height="315" src="//www.youtube.com/embed/DXPwSiRTxYY" frameborder="0" allowfullscreen></iframe>

}
$count = $count + 1;
}
while ($row = mysql_fetch_array($total_video));




?>

<!DOCTYPE html>
<html>
<?php $thisPage="Tutorials"; ?>
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

<div class="cell, schedule_info">
<?php echo "$start_dow" ?><br />
<div class="icon_date" style="margin: 0 auto;"><?php echo $start_month_set ?><br /><span class="icon_date_day"><?php echo $start_day_set ?></span></div>
<?php echo "$start_time" ?><br />
<?php echo "$end_time" ?><br />
Room: <a href="location_floor_map.php"><?php echo $location ?></a>
</div>

<div style="background: #eee; border: 1px solid #ccc; font-size: 0.75em; width: 40em; padding: 0.25em 0.75em; margin: 0 0 1em 0;">
<img src="img/note.png" align="left" /><p>To get the most out of the tutorials, you will need to have the correct software installed and running. Specific requirements for each tutorial are specified in the detailed description for each tutorial. But it's best to start with one of the <a href="http://www.scipy.org/install.html" style="text-decoration: underline;">scientific Python distributions</a> to ensure an environment that includes most of the packages you'll need.</p>
</div>

<h1><?php echo $title ?></h1>

<p><?php echo $display_authors ?></p>
<hr />
<section id="tutorial-content">
<?php
if ($display_videos != "")
  {
  if ($count > 1) 
    {
      echo "<h3>Videos</h3> <div class=\"row\">";
    }
    else 
    {
      echo "<h3>Video</h3> <div class=\"row\">";
    }
  echo $display_videos;
  echo "</div>";
  }
?>

<h3>Bio(s)</h3>
<?php echo $display_bios ?>
<hr />
<h3>Description</h3>
<?php echo Markdown($description) ?>
<hr />
<h3>Outline</h3>
<?php echo Markdown($outline) ?>
<hr />
<h3>Required Packages</h3>
<?php echo Markdown($packages) ?>
<hr />
<h3>Documentation</h3>
<?php echo Markdown($documentation) ?>
</section>
</section>


<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>