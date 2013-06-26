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
$sql_bofs .= "open_agendas.id, ";
$sql_bofs .= "subject, ";
$sql_bofs .= "DATE_FORMAT(open_agendas.when, '%b %D - %I:%i %p') AS date, ";
$sql_bofs .= "moderator, ";
$sql_bofs .= "content, ";
$sql_bofs .= "DATE_FORMAT(open_agendas.created_at, '%b %d'), ";
$sql_bofs .= "name, ";
$sql_bofs .= "DATE_FORMAT(start_time, '%Y') AS start_year, ";
$sql_bofs .= "DATE_FORMAT(start_time, '%b') AS start_month, ";
$sql_bofs .= "DATE_FORMAT(start_time, '%d') AS start_day, ";
$sql_bofs .= "DATE_FORMAT(start_time, '%W') AS start_dow, ";
$sql_bofs .= "DATE_FORMAT(start_time, '%l:%i %p') AS start_time, ";

$sql_bofs .= "DATE_FORMAT(end_time, '%Y') AS end_year, ";
$sql_bofs .= "DATE_FORMAT(end_time, '%c') AS end_month, ";
$sql_bofs .= "DATE_FORMAT(end_time, '%d') AS end_day, ";
$sql_bofs .= "DATE_FORMAT(end_time, '%l:%i %p') AS end_time ";


$sql_bofs .= "FROM open_agendas ";
$sql_bofs .= "LEFT JOIN schedules ";
$sql_bofs .= "ON schedules.open_agenda_id = open_agendas.id ";
$sql_bofs .= "LEFT JOIN locations ";
$sql_bofs .= "ON location_id = locations.id ";
$sql_bofs .= "WHERE open_agendas.id = $id";

$total_bofs = @mysql_query($sql_bofs, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

do {
  if ($row['subject'] != '')
  {

$display_bofs .="

<h1>" . $row['subject'] . "</h1>

Moderator:</label> " . $row['moderator'] . "</p>

" . Markdown($row['content']) . "";
  }

$start_time = $row['start_time'];
$end_time = $row['end_time'];
$start_year_set = $row['start_year'];
$start_month_set = $row['start_month'];
$start_day_set = $row['start_day'];
$start_dow = $row['start_dow'];
$start_hour = $row['start_hour'];
$start_minute = $row['start_minute'];
$end_year_set = $row['end_year'];
$end_month_set = $row['end_month'];
$end_day_set = $row['end_day'];
$end_hour = $row['end_hour'];
$end_minute = $row['end_minute'];
$location = $row['name'];



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
<?php if($start_month_set != '')
  {
?>
<div class="cell, schedule_info">
<?php echo "$start_dow" ?><br />
<div class="icon_date" style="margin: 0 auto;"><?php echo $start_month_set ?><br /><span class="icon_date_day"><?php echo $start_day_set ?></span></div>
<?php echo "$start_time" ?><br />
<?php echo "$end_time" ?><br />
Room: <a href="location_floor_map.php"><?php echo $location ?></a>
</div>
<?php } ?>

<?php echo $display_bofs ?>


</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>