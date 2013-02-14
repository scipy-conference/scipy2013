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

$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$affiliation = $_POST['affiliation'];
$email = $_POST['email'];
$bio = $_POST['bio'];
$track = $_POST['track'];
$title = $_POST['title'];
$description = $_POST['description'];

$sql_presenter = "INSERT INTO presenters ";
$sql_presenter .= "(first_name, ";
$sql_presenter .= "last_name, ";
$sql_presenter .= "affiliation, ";
$sql_presenter .= "email, ";
$sql_presenter .= "bio, ";
$sql_presenter .= "created_at, ";
$sql_presenter .= "updated_at) ";
$sql_presenter .= "VALUES ";
$sql_presenter .= "(\"$first_name\", ";
$sql_presenter .= "\"$last_name\", ";
$sql_presenter .= "\"$affiliation\", ";
$sql_presenter .= "\"$email\", ";
$sql_presenter .= "\"$bio\", ";
$sql_presenter .= "NOW(), ";
$sql_presenter .= "NOW())";

$result_presenter = @mysql_query($sql_presenter, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

//=======================================
// pull presenter just entered to get presenter.id
//=======================================

$sql_presenter_id ="SELECT ";
$sql_presenter_id .="id ";
$sql_presenter_id .="FROM presenters ";
$sql_presenter_id .="WHERE last_name = \"$last_name\" ";
$sql_presenter_id .="AND first_name = \"$first_name\" ";
$sql_presenter_id .="AND email = \"$email\"";

$result_presenter_id = @mysql_query($sql_presenter_id, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_presenter_id = @mysql_num_rows($result_presenter_id);

while ($row = mysql_fetch_array($result_presenter_id))
{
  $presenter_id = $row['id'];
}

//=======================================
// enter talk info
//=======================================

$sql_talk = "INSERT INTO talks ";
$sql_talk .= "(conference_id, ";
$sql_talk .= "presenter_id, ";
$sql_talk .= "track, ";
$sql_talk .= "title, ";
$sql_talk .= "description, ";
$sql_talk .= "created_at, ";
$sql_talk .= "updated_at) ";
$sql_talk .= "VALUES ";
$sql_talk .= "(\"1\", ";
$sql_talk .= "\"$presenter_id\", ";
$sql_talk .= "\"$track\", ";
$sql_talk .= "\"$title\", ";
$sql_talk .= "\"$description\", ";
$sql_talk .= "NOW(), ";
$sql_talk .= "NOW())";

$result_talk = @mysql_query($sql_talk, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<?php $thisPage="Admin"; ?>
<?php $thisSub="Talks"; ?>


<head>
<?php @ require_once ("../inc/header.php"); ?>	
</head>

<body>
<div id="container">
<?php @ require_once ("../inc/menu.php"); ?>
<div id="side-content">
<?php @ require_once ("subs.php"); ?>
<?php @ require_once ("../inc/sponsors.php"); ?>
</div>
<div id="main-content">

<h1>Admin</h1>

<p>Presenter Info:</p>

<p>Info entered successfully.</p>

<?php echo "
last_name: $last_name<br />
first_name: $first_name<br />
affiliation: $affiliation<br />
email: $email<br />
bio: $bio<br />
presenter_id: $presenter_id<br />
track: $track<br />
title: $title<br />
description: $description<br />";
?>

</div>
<div style="clear:both;"></div>

</div>
</body>

</html>