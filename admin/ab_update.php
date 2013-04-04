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

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$bio = $_POST['bio'];
$email = $_POST['email'];
$description = $_POST['description'];
$submission_references = $_POST['submission_references'];
$presentation_preference = $_POST['presentation_preference'];
$prepare_paper = $_POST['prepare_paper'];
$main_track = $_POST['main_track'];
$specific_session = $_POST['specific_session'];


//===========================
//  UPDATE Abstract Submission
//===========================

$sql_submissions = "UPDATE ";
$sql_submissions .= "talk_submissions ";
$sql_submissions .= "SET ";
$sql_submissions .= "title = '$title', ";
$sql_submissions .= "author = '$author', ";
$sql_submissions .= "bio = '$bio', ";
$sql_submissions .= "email = '$email', ";
$sql_submissions .= "description = '$description', ";
$sql_submissions .= "submission_references = '$submission_references', ";
$sql_submissions .= "presentation_preference = '$presentation_preference', ";
$sql_submissions .= "prepare_paper = '$prepare_paper', ";
$sql_submissions .= "main_track = '$main_track', ";
$sql_submissions .= "specific_session = '$specific_session' ";
$sql_submissions .= "WHERE id = \"$id\"";

$result = @mysql_query($sql_submissions, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());



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
<h1>Talk / Poster Submission Form</h1>

Updated!
</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>
