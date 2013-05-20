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

$id = $_GET['id'];
$row_1="odd";
$row_2="even";
$row_count=1;

//===========================
//  pull open agenda item
//===========================

$sql_bofs = "SELECT ";
$sql_bofs .= "id, ";
$sql_bofs .= "subject, ";
$sql_bofs .= "DATE_FORMAT(open_agendas.when, '%b %D - %I:%i %p') AS date, ";
$sql_bofs .= "moderator, ";
$sql_bofs .= "content, ";
$sql_bofs .= "DATE_FORMAT(created_at, '%b %d') ";
$sql_bofs .= "FROM open_agendas ";
$sql_bofs .= "WHERE id = $id";

$total_bofs = @mysql_query($sql_bofs, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

do {
  if ($row['subject'] != '')
  {

$display_bofs .="

<h1>" . $row['subject'] . "</h1>

<p>Date Time:</label> " . $row['date'] . "<label><br />
Moderator:</label> " . $row['moderator'] . "</p>

" . Markdown($row['content']) . "";
  }

$row_color=($row_count%2)?$row_1:$row_2;
$row_count++;

}
while($row = mysql_fetch_array($total_bofs));
?>


<!DOCTYPE html>
<html>
<?php $thisPage="BoFs"; ?>
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


<?php echo $display_bofs ?>


</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>