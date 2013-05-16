<?php
session_start();

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


include('inc/db_conn.php');
include_once "inc/markdown.php";

$row_1="odd";
$row_2="even";
$row_count=1;

//===========================
//  pull sponsorship requests
//===========================

$sql_sprints = "SELECT ";
$sql_sprints .= "id, ";
$sql_sprints .= "subject, ";
$sql_sprints .= "DATE_FORMAT(open_agendas.when, '%b %D - %I:%i %p') AS date, ";
$sql_sprints .= "coordinator, ";
$sql_sprints .= "content, ";
$sql_sprints .= "DATE_FORMAT(created_at, '%b %d') ";
$sql_sprints .= "FROM open_agendas ";
$sql_sprints .= "WHERE type = 'bof' ";
$sql_sprints .= "AND conference_id = 2";

$total_sprints = @mysql_query($sql_sprints, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_sprints = @mysql_num_rows($sql_sprints);
$row_color=($row_count%2)?$row_1:$row_2;

do {
  if ($row['subject'] != '')
  {

$display_open_agenda .="
<h3>" . $row['subject'] . "</h3>

<p><label>Coordinator:</label> " . $row['coordinator'] . "</p>

" . myTruncate(Markdown($row['content']),300) . "";
    if (strlen(Markdown($row['content'])) > 300 )
      {
      $display_open_agenda .="<br /><br /><a href=\"sprint_detail.php?id=" . $row['id'] . "\"> View complete description</a>";
      }
    
$display_open_agenda .="<hr />";
  }

$row_color=($row_count%2)?$row_1:$row_2;
$row_count++;

}
while($row = mysql_fetch_array($total_sprints));

?>

<!DOCTYPE html>
<html>
<?php $thisPage="Birds of Feather"; ?>
<head>

<?php include('inc/header.php') ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />
</head>

<body>

<div id="container">

<?php include('inc/page_headers.php') ?>

<section id="sidebar">
  <?php include("inc/sponsors.php") ?>
</section>

<section id="main-content">

<h1>SciPy BoFs</h1>

<p>SciPy 2013 has plenty of opportunities to get together and discuss primary, tangential, or unrelated topics in an interactive, discussion setting.</p>

<p>In an effort to increase the opportunities for community building,
this year at SciPy the organizers would like to emphasize the use of
birds of a feather (BoFs) sessions.  Our current vision for these
sessions include short presentations by a panel and a moderator with
the bulk of the time spent opening up the discussion to everyone in attendance.  We
will organize a number of BoFs that are of general interest such as
state-of-the-project and BoFs based on the themes of the conference
and the mini-symposia topics.</p>

<p>We would like to solicit the community for ideas and organizers for
other BoF topics.  Please include a small description of the BoF,
possible panelists, and whether you would be willing to moderate.</p>

<p>To suggest a Birds-of-a-Feather session click the Suggest a BoF button.</p>

<form method="get" name="form2" action="suggest_bof.php">
<div style="display: block; width: 10em; margin: 0 auto;">
  <input type="submit" name="Submit" value="Suggest a BoF">
</div>
</form>

<hr />
<div id="open_agenda">
<table id="registrants_table" width="600">
<?php echo $display_open_agenda ?>
</table>
</div>

</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>