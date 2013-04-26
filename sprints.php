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
$sql_sprints .= "WHERE type = 'sprint' ";
$sql_sprints .= "AND conference_id = 2";

$total_sprints = @mysql_query($sql_sprints, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_sprints = @mysql_num_rows($sql_sprints);
$row_color=($row_count%2)?$row_1:$row_2;

do {
  if ($row['subject'] != '')
  {

$display_sprints .="
<tr class=$row_color>
    <td><h1>" . $row['subject'] . "</h1></td>
  </tr>
  <tr class=$row_color>
    <td><label>Coordinator:</label> " . $row['coordinator'] . "</td>
  </tr>
  <tr class=$row_color>
    <td>" . myTruncate(Markdown($row['content']),300) . "";
    if (strlen(Markdown($row['content'])) > 300 )
      {
      $display_sprints .="<br /><br /><a href=\"sprint_detail.php?id=" . $row['id'] . "\"> View complete description</a>";
      }
    
$display_sprints .="</td>
  </tr>";
  }

$row_color=($row_count%2)?$row_1:$row_2;
$row_count++;

}
while($row = mysql_fetch_array($total_sprints));

?>

<!DOCTYPE html>
<html>
<?php $thisPage="Sprints"; ?>
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

<h1>SciPy Sprints</h1>
<h2>Two Days of Awesome Hacking!</h2>

<p>SciPy 2013 will continue the tradition of two days of Code Sprints following the main conference program.  Core developers of many of our favorite tools will be in town, so what better time to get involved with their development? Whether it’s your first time or your fiftieth, there’s nothing quite like sitting down at a table with people you may have only seen on mailing lists and Twitter. The SciPy sprint committee is calling for proposals for hosted sprints following the main sessions of the conference on June 28th-29th.</p>

<form method="get" name="form2" action="suggest_sprint.php">
<input type="submit" name="Submit" value="Suggest Sprint">
</form>
<hr />
<div id="open_agenda">
<table id="registrants_table" width="600">
<?php echo $display_sprints ?>
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