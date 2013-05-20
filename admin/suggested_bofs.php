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

// Original PHP code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

function myTruncate($string, $limit, $break=".", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}

include('../inc/db_conn.php');
include_once "../inc/markdown.php";

$row_1="odd";
$row_2="even";
$row_count=1;

//===========================
//  pull bof requests
//===========================

$sql_sprints = "SELECT ";
$sql_sprints .= "id, ";
$sql_sprints .= "subject, ";
$sql_sprints .= "DATE_FORMAT(open_agendas.when, '%b %D - %I:%i %p') AS date, ";
$sql_sprints .= "moderator, ";
$sql_sprints .= "will_moderate, ";
$sql_sprints .= "content, ";
$sql_sprints .= "panelists, ";
$sql_sprints .= "DATE_FORMAT(created_at, '%b %d') ";
$sql_sprints .= "FROM open_agendas ";
$sql_sprints .= "WHERE type = 'bof' ";
$sql_sprints .= "AND accepted = 0 ";
$sql_sprints .= "AND conference_id = 2";

$total_sprints = @mysql_query($sql_sprints, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_sprints = @mysql_num_rows($sql_sprints);
$row_color=($row_count%2)?$row_1:$row_2;

do {
  if ($row['subject'] != '')
  {

$display_open_agenda .="
<h3><a href=\"bof_edit.php?id=" . $row['id'] . "\">" . $row['subject'] . "</a></h3>

<p><label>";

if ($row['will_moderate'] == 0)
  {
    $display_open_agenda .="Suggested ";
  }

$display_open_agenda .="Moderator:</label> " . $row['moderator'] . "</p>

" . Markdown($row['content']) . "";
    
$display_open_agenda .="<p><label>Panelists:</label> " . $row['panelists'] . "</p>
<input type=\"checkbox\" name=\"oa_" . $row['id'] . "\" value=1 /> Accept?
<hr />";
  }

$row_color=($row_count%2)?$row_1:$row_2;
$row_count++;

}
while($row = mysql_fetch_array($total_sprints));

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

<h1>SciPy BoF Sugestions</h1>

<p>The following BoFs have been suggested but have not been approved.</p>

<form method="post" name="SprintInfo" action="accept_bofs.php">
<hr />
<div id="open_agenda">
<table id="registrants_table" width="600">
<?php echo $display_open_agenda ?>
</table>
</div>
<div align="center">
<input type="submit" name="submit" value="Accept BoFs">
</div>
</form>

</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>