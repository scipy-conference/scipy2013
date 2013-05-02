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
IF ($_GET['id'] > 0) 
    {
      $id = $_GET['id'];
    }

include('../inc/db_conn.php');

//===========================
//  pull discount
//===========================

$sql_discount = "SELECT ";
$sql_discount .= "id, ";
$sql_discount .= "last_name ";
$sql_discount .= "first_name, ";
$sql_discount .= "email, ";
$sql_discount .= "affiliation, ";
$sql_discount .= "bio ";
$sql_discount .= "FROM presenters ";
$sql_discount .= "WHERE id = \"$id\"";

$total_result_discount = @mysql_query($sql_discount, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($total_result_discount))
{

$id = $row['id'];
$last_name = $row['last_name'];
$first_name = $row['first_name'];
$email = $row['email'];
$affiliation = $row['affiliation'];
$bio = $row['bio'];

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

<h1>Admin</h1>

<p>Presenter <?php echo "$code" ?> <?php echo $action ?> successfully!</p></p>

id: <?php echo $id ?><br />
last_name: <?php echo $last_name ?><br />
first_name: <?php echo $first_name ?><br />
email: <?php echo $email ?><br />
affiliation: <?php echo $affiliation ?><br />
bio: <?php echo $bio ?><br />

</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>