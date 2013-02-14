<?php

//===============================================
// IF SUCCESSFUL PAGE CONTENT                  //
//===============================================

include('../inc/db_conn.php');

//===========================
//  pull posters
//===========================

$sql_posters = "SELECT ";
$sql_posters .= "presenter_id, ";
$sql_posters .= "talks.id AS talk_id, ";
$sql_posters .= "last_name, ";
$sql_posters .= "first_name, ";
$sql_posters .= "affiliation, ";
$sql_posters .= "bio, ";
$sql_posters .= "title, ";
$sql_posters .= "track, ";
$sql_posters .= "authors, ";
$sql_posters .= "tags, ";
$sql_posters .= "released, ";
$sql_posters .= "type ";
$sql_posters .= "FROM talks ";

$sql_posters .= "LEFT JOIN presenters ";
$sql_posters .= "ON presenter_id = presenters.id ";

$sql_posters .= "LEFT JOIN license_types ";
$sql_posters .= "ON license_type_id = license_types.id ";

$sql_posters .= "WHERE talks.conference_id = 1 ";
$sql_posters .= "AND track = 'poster' ";
$sql_posters .= "ORDER BY title";



$total_posters = @mysql_query($sql_posters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_start_time = '';

do {

if ($row['title'] != '')
  {

// if a new start time display new row and the time cell
$display_block .="
<hr />
  <p><a href=\"posters_edit.php?id=" . $row['talk_id'] . "\">Edit</a></p>
  <p><span class=\"bold\">" . $row['title'] . "</span></p>
  <p>";
      if ($row['last_name'] != '')
        {
      $display_block .=" - " . $row['last_name'] . ", " . $row['first_name'] . "";
        }
      if ($row['affiliation'] != '')
        {
      $display_block .=", " . $row['affiliation'] . "";
       }
$display_block .="
<br />presenter_id" . $row['presenter_id'] . "
<br />talk_id: " . $row['talk_id'] . "
<br />released: " . $row['released'] . "
<br />license: " . $row['type'] . "
<br />tags: " . $row['tags'] . "</p>";

}

}
while ($row = mysql_fetch_array($total_posters));

////////////////////



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<?php $thisPage="Schedule"; ?>
<?php $thisSub="Posters"; ?>
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
<div align="right"><img src="../img/jul_19.png" /></div>
<h2>Posters: </h2>

<p>The following posters are scheduled for display. The poster session will be held Thursday - July 19th, 10:45 - 11:45 AM.</p>

<?php echo $display_block ?>


</div>
<div style="clear:both;"></div>

</div>
</body>

</html>