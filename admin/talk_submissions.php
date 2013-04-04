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
$sql_submissions .= "id, ";
$sql_submissions .= "title, ";
$sql_submissions .= "author, ";
$sql_submissions .= "email, ";
$sql_submissions .= "description, ";
$sql_submissions .= "presentation_preference, ";
$sql_submissions .= "prepare_paper, ";
$sql_submissions .= "main_track, ";
$sql_submissions .= "specific_session, ";
$sql_submissions .= "DATE_FORMAT(date_submitted, '%b %d') AS date_submitted_f ";
$sql_submissions .= "FROM talk_submissions ";
$sql_submissions .= "ORDER BY main_track, title";

$total_submissions = @mysql_query($sql_submissions, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_submissions = @mysql_num_rows($sql_submissions);
$row_color=($row_count%2)?$row_1:$row_2;

do {
  if ($row['author'] != '')
  {

if ($row[presentation_preference] == 'both') {$row[presentation_preference] = "Talk and Poster";}
if ($row['main_track'] == 'general') {$row['main_track'] = "General";}
if ($row['main_track'] == 'ml') {$row['main_track'] = "Machine Learning";}
if ($row['main_track'] == 'tfr') {$row['main_track'] = "Tools for reproducibility";}
if ($$row['main_track'] == 'none') {$row['main_track'] = "None, only to a domain symposia";}

$display_summary .="
<tr class=$row_color>
  <td>" . $row['main_track'] . "</td>
  <td>" . $row['presentation_preference'] . "</td>
  <td><strong><a href=\"#anchor_" . $row['id'] . "\">" . $row['title'] . "</a></strong></td>
  <td>" . $row['author'] . "</td>
</tr>";

$display_submissions .="
  <tr class=$row_color>
    <td colspan=\"6\"><a name=\"anchor_" . $row['id'] . "\"></a><hr /><a href=\"#top\" class=\"intra_page_nav\">Back to top</a></td>
  </tr>
  <tr class=$row_color>    
    <td colspan=\"6\"><h2>" . $row['title'] . "</h2></td>
  </tr>
  <tr class=$row_color>
    <td>" . $row['author'] . "<br /><a href=\"mailto:" . $row['email'] . "\">" . $row['email'] . "</td>
    <td align=\"center\">Type: " . ucfirst($row['presentation_preference']) . "</td>
    <td align=\"center\">Track: " . $row['main_track'] . "</td>
    <td align=\"center\">Symposia: " . $row['specific_session'] . "</td>
    <td align=\"center\">submitted: " . $row['date_submitted_f'] . "</td>
  </tr>
  <tr class=$row_color>
    <td colspan=\"6\">" . nl2br($row['description']) . "</td>
  </tr>";
  }

$row_color=($row_count%2)?$row_1:$row_2;
$row_count++;

}
while($row = mysql_fetch_array($total_submissions));


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

<p>Talk Submissions: <?php echo $row_count ?></p>

<table width="100%">
<tr>
  <th>Track</th>
  <th>Preference</th>
  <th>Title</th>
  <th>Author(s)</th>
</tr>
<?php echo $display_summary ?>
</table>

<div align="right">
<p><a href="submissions_csv.php">Export to CSV (for Excel)</a></p>
</div>

<h3>Details</h3>
<table width="100%">
<?php echo $display_submissions ?>
</table>


</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>