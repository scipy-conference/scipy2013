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

$row_1="odd";
$row_2="even";
$row_count=1;

//===========================
//  pull sponsorship requests
//===========================

$sql_submissions = "SELECT ";
$sql_submissions .= "title, ";
$sql_submissions .= "author, ";
$sql_submissions .= "email, ";
$sql_submissions .= "affiliation, ";
$sql_submissions .= "description, ";
$sql_submissions .= "presentation_preference, ";
$sql_submissions .= "prepare_paper, ";
$sql_submissions .= "main_track, ";
$sql_submissions .= "specific_session, ";
$sql_submissions .= "DATE_FORMAT(date_submitted, '%b %d') ";
$sql_submissions .= "FROM talk_submissions";

$total_submissions = @mysql_query($sql_submissions, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_submissions = @mysql_num_rows($sql_submissions);
$row_color=($row_count%2)?$row_1:$row_2;

do {
  if ($row['author'] != '')
  {

$display_submissions .="
  <tr class=$row_color>    
    <td>" . $row['author'] . "<br /><a href=\"mailto:" . $row['email'] . "\">" . $row['email'] . "</td>
    <td>" . $row['affiliation'] . "</td>
    <td align=\"center\">" . ucfirst($row['presentation_preference']) . "</td>
    <td align=\"center\">";
    if ( $row['prepare_paper'] == 0)
      {
        $display_submissions .="No";
      }
    if ( $row['prepare_paper'] == 1)
      {
        $display_submissions .="Yes";
      }
$display_submissions .="</td>
    <td align=\"center\">" . $row['main_track'] . "</td>
    <td align=\"center\">" . $row['specific_session'] . "</td>
  </tr>
<tr class=$row_color>
    <td colspan=\"6\"><span class=\"bold\">" . $row['title'] . "</span></td>
  </tr>
  <tr class=$row_color>
    <td colspan=\"6\">" . nl2br($row['description']) . "</td>
  </tr>
  <tr class=$row_color>
    <td colspan=\"6\">&nbsp;</td>
  </tr>";
  }

$row_color=($row_count%2)?$row_1:$row_2;
$row_count++;

}
while($row = mysql_fetch_array($total_submissions));


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<?php $thisPage="Admin"; ?>
<?php $thisSub="Sponsorships"; ?>


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

<p>Talk Submissions:</p>

<div align="right">
<p><a href="submissions_csv.php">Export to CSV (for Excel)</a></p>
</div>

<table id="registrants_table" width="600">
<tr>
  <th width="150">Author<br />Email</th>
  <th>Affiliation</th>
  <th width="70">Presentation</th>
  <th width="70">Paper</th>
  <th>Main Track</th>
  <th>Session</th>
</tr>
<?php echo $display_submissions ?>
</table>


</div>
<div style="clear:both;"></div>

</div>
</body>

</html>