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
$sql_tutorial .= "description, ";
$sql_tutorial .= "outline, ";
$sql_tutorial .= "packages, ";
$sql_tutorial .= "documentation, ";
$sql_tutorial .= "track, ";
$sql_tutorial .= "released, ";
$sql_tutorial .= "license_type_id, ";
$sql_tutorial .= "video_link, ";
$sql_tutorial .= "tags, ";
$sql_tutorial .= "start_time, ";

$sql_tutorial .= "DATE_FORMAT(start_time, '%Y') AS start_year, ";
$sql_tutorial .= "DATE_FORMAT(start_time, '%c') AS start_month, ";
$sql_tutorial .= "DATE_FORMAT(start_time, '%d') AS start_day, ";
$sql_tutorial .= "DATE_FORMAT(start_time, '%H') AS start_hour, ";
$sql_tutorial .= "DATE_FORMAT(start_time, '%i') AS start_minute, ";

$sql_tutorial .= "end_time, ";

$sql_tutorial .= "DATE_FORMAT(end_time, '%Y') AS end_year, ";
$sql_tutorial .= "DATE_FORMAT(end_time, '%c') AS end_month, ";
$sql_tutorial .= "DATE_FORMAT(end_time, '%d') AS end_day, ";
$sql_tutorial .= "DATE_FORMAT(end_time, '%H') AS end_hour, ";
$sql_tutorial .= "DATE_FORMAT(end_time, '%i') AS end_minute, ";

$sql_tutorial .= "location_id ";

$sql_tutorial .= "FROM talks ";
$sql_tutorial .= "LEFT JOIN presenters_talks ";
$sql_tutorial .= "ON talk_id = talks.id ";

$sql_tutorial .= "LEFT JOIN presenters ";
$sql_tutorial .= "ON presenters_talks.presenter_id = presenters.id ";
$sql_tutorial .= "LEFT JOIN schedules ";
$sql_tutorial .= "ON schedules.talk_id = talks.id ";
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
$start_hour = $row['start_hour'];
$start_minute = $row['start_minute'];
$end_year_set = $row['end_year'];
$end_month_set = $row['end_month'];
$end_day_set = $row['end_day'];
$end_hour = $row['end_hour'];
$end_minute = $row['end_minute'];
$location = $row['location'];
$author_list[] = $row['presenter_id'];
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

?>

<!DOCTYPE html>
<html>
<?php $thisPage="tutorials"; ?>
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

<h1><?php echo $title ?></h1>

<p><?php echo $display_authors ?></p>
<hr />
<section id="tutorial-content">
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