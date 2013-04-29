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

$participant_id = $_GET['id'];

//===========================
//  pull presenters
//===========================

$sql_presenters = "SELECT ";
$sql_presenters .= "id, ";
$sql_presenters .= "last_name, ";
$sql_presenters .= "first_name, ";
$sql_presenters .= "affiliation, ";
$sql_presenters .= "email ";
$sql_presenters .= "FROM presenters ";
$sql_presenters .= "WHERE updated_at > '2013-01-01' ";
$sql_presenters .= "ORDER BY last_name, first_name";


$total_presenters = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());


do {

if ($row['last_name'] != '')
  {

       $display_block .="  <tr>
        <td><a href=presenter_edit.php?id=" . $row['id'] . ">" . $row['last_name'] . ", " . $row['first_name'] . "</a></td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['affiliation'] . "</td>";
     }
}
while ($row = mysql_fetch_array($total_presenters));

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

<h2>Presenters:</h2>
<table id="registrants_table">
<?php echo $display_block ?>
</table>
<br />


</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>