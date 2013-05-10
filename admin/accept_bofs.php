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

$qty = count($_POST) - 1;
$accepted_sprints = array_slice($_POST, 0, $qty);


// add to db

foreach ($accepted_sprints as $key => $value)
{
$sql = "UPDATE open_agendas ";
$sql .= "SET accepted = \"$value\" ";
$sql .= "WHERE ";
$sql .= "id = SUBSTRING(\"$key\",4)";
 
$result = @mysql_query($sql, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

}

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

<h1>BoFs Accepted</h1>

<p>The following BoFs have been accepted.</p>

<?php print_r($_POST) ?><br />
<?php print_r($accepted_sprints) ?><br />
Loop<br />


</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>
