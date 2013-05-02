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
IF ($_GET['id'] > 0) 
    {
      $id = $_GET['id'];
    }

include('../inc/db_conn.php');

//===========================
//  pull info
//===========================

$sql_talks = "SELECT ";
$sql_talks .= "id, ";
$sql_talks .= "track ";
$sql_talks .= "title, ";
$sql_talks .= "abstract, ";
$sql_talks .= "description, ";
$sql_talks .= "outline, ";
$sql_talks .= "packages, ";
$sql_talks .= "released, ";
$sql_talks .= "license_type_id, ";
$sql_talks .= "video_link, ";
$sql_talks .= "tags ";
$sql_talks .= "FROM talks ";
$sql_talks .= "WHERE id = \"$id\"";

$total_result_talks = @mysql_query($sql_talks, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($total_result_talks))
{

$id = $row['id'];
$track = $row['track'];
$title = $row['title'];
$abstract = $row['abstract'];
$description = $row['description'];
$outline = $row['outline'];
$packages = $row['packages'];
$released = $row['released'];
$license_type_id = $row['license_type_id'];
$video_link = $row['video_link'];
$tags = $row['tags'];

}


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

<p>Presenter <?php echo "$code" ?> <?php echo $action ?> successfully!</p></p>

id: <?php echo $id ?><br />
track: <?php echo $track ?><br />
title: <?php echo $title ?><br />
abstract: <?php echo $abstract ?><br />
description: <?php echo $description ?><br />
outline: <?php echo $outline ?><br />
packages: <?php echo $packages ?><br />
released: <?php echo $released ?><br />
license_type_id: <?php echo $license_type_id ?><br />
video_link: <?php echo $video_link ?><br />
tags: <?php echo $tags ?><br />

</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>