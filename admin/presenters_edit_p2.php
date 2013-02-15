<?php

//===============================================
//  USER AUTHORIZATION                         //
//===============================================
session_start();
if(!isset($_SESSION['formusername'])){
header("location:login.php");
}

//===============================================
// IF SUCCESSFUL PAGE CONTENT                  //
//===============================================
include('../inc/db_conn.php');
//=======================================
// enter presenters info
//=======================================

$presenter_id = $_POST['presenter_id'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$affiliation = $_POST['affiliation'];
$email = $_POST['email'];
$bio = addslashes($_POST['bio']);
//$bio = $_POST['bio'];

$sql_presenter = "UPDATE presenters ";
$sql_presenter .= "SET ";
$sql_presenter .= "first_name = \"$first_name\", ";
$sql_presenter .= "last_name = \"$last_name\", ";
$sql_presenter .= "affiliation = \"$affiliation\", ";
$sql_presenter .= "email = \"$email\", ";
$sql_presenter .= "bio = \"$bio\", ";
$sql_presenter .= "updated_at = NOW() ";
$sql_presenter .= "WHERE id = \"$presenter_id\" LIMIT 1";

$result_presenter = @mysql_query($sql_presenter, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

//=======================================
// update talk info
//=======================================

$talk_id = $_POST['talk_id'];
$track = $_POST['track'];
$title = $_POST['title'];
$abstract = $_POST['abstract'];
$description = addslashes($_POST['description']);
//$description = $_POST['description'];

$authors = $_POST['authors'];
$released = $_POST['released'];
$license_type_id = $_POST['license_type_id'];
$video_link = $_POST['video_link'];
$tags = $_POST['tags'];


$sql_talk = "UPDATE talks ";
$sql_talk .= "SET ";
$sql_talk .= "presenter_id = \"$presenter_id\", ";
$sql_talk .= "track = \"$track\", ";
$sql_talk .= "title = \"$title\", ";
$sql_talk .= "abstract = \"$abstract\", ";
$sql_talk .= "description = \"$description\", ";
$sql_talk .= "authors = \"$authors\", ";
$sql_talk .= "released = \"$released\", ";
$sql_talk .= "license_type_id = \"$license_type_id\", ";
$sql_talk .= "video_link = \"$video_link\", ";
$sql_talk .= "tags = \"$tags\", ";
$sql_talk .= "updated_at = NOW() ";
$sql_talk .= "WHERE id = \"$talk_id\" LIMIT 1";

$result_talk = @mysql_query($sql_talk, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

//=======================================
// update schedule info
//=======================================

$start_year = $_POST['start_year'];
$start_month = $_POST['start_month'];
$start_day = $_POST['start_day'];
$start_hour = $_POST['start_hour'];
$start_minute = $_POST['start_minute'];
$start_time = $start_year."-".$start_month."-".$start_day." ".$start_hour.":".$start_minute.":00";

$end_year = $_POST['start_year'];
$end_month = $_POST['start_month'];
$end_day = $_POST['start_day'];
$end_hour = $_POST['end_hour'];
$end_minute = $_POST['end_minute'];
$end_time = $end_year."-".$end_month."-".$end_day." ".$end_hour.":".$end_minute.":00";

$location = $_POST['location'];

$sql_schedule = "UPDATE schedules ";
$sql_schedule .= "SET ";
$sql_schedule .= "start_time = \"$start_time\", ";
$sql_schedule .= "end_time = \"$end_time\", ";
$sql_schedule .= "location = \"$location\", ";
$sql_schedule .= "updated_at = NOW() ";
$sql_schedule .= "WHERE talk_id = \"$talk_id\" LIMIT 1";

//$result_schedule = @mysql_query($sql_schedule, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());


?>

<!DOCTYPE html>
<html>
<?php $thisPage="Admin"; ?>
<head>

<?php @ require_once ("../inc/second_level_header.php"); ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />
</head>

<body>

<div id="container">

<?php include('../inc/admin_page_headers.php') ?>

<section id="sidebar">
  <?php include("../inc/sponsors.php") ?>
</section>

<section id="main-content">

<h1>Admin</h1>

<p>Presenter Info:</p>

<p>Info entered successfully.</p>

<?php echo "
last_name: $last_name<br />
first_name: $first_name<br />
affiliation: $affiliation<br />
bio: $bio<br />
email: $email<br />
presenter_id: $presenter_id<br />
track: $track<br />
released: $released<br />
license_type_id: $license_type_id<br />
video_link: $video_link<br />
tags: $tags<br />
title: $title<br />
abstract: $abstract<br />
description: $description<br />
start_time: $start_time<br />
end_time: $end_time<br />";
?>

presenters id <?php echo $presenter_id ?></section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>