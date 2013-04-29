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

$id = $_GET['id'];

//===========================
//  pull presenters
//===========================

$sql_presenters = "SELECT ";
$sql_presenters .= "id, ";
$sql_presenters .= "last_name, ";
$sql_presenters .= "first_name, ";
$sql_presenters .= "affiliation, ";
$sql_presenters .= "email, ";
$sql_presenters .= "bio ";
$sql_presenters .= "FROM presenters ";
$sql_presenters .= "WHERE id = \"$id\"";

$total_presenters = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($total_presenters))
{

$last_name = $row['last_name'];
$first_name = $row['first_name'];
$affiliation = $row['affiliation'];
$email = $row['email'];
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

<h2>Presenter Info:</h2>

<form id="form_1" method="post" action="presenter_action.php" >
<table class="form">
  <tr>
    <td><label for="FirstName">* First Name</label><br /><input class="validate[required] text-input" type='text' size='16' id='FirstName' name='first_name' value='<?php echo $first_name ?>'></td>
    <td><label for="">* Last Name</label><br /><input class="validate[required] text-input" type='text' size='16' id='LastName' name='last_name' value='<?php echo $last_name ?>'></td>
  </tr>
  <tr>
    <td><label for="">Affiliation</label><br /><input type='text' size='30' name='affiliation' value='<?php echo $affiliation ?>'></td>
    <td><label for="">* Email</label><br /><input class="validate[required,custom[email]]" type='text' size='30' id='email' name='email' value='<?php echo $email ?>'></td>
  </tr>
  <tr>
    <td colspan="2"><label for="">Bio</label><br /><textarea name="bio" cols="80" rows="20"><?php echo $bio ?></textarea></td>
  </tr>
</table>
<input type='hidden' name='id' value='<?php echo $id ?>'>
<div align="center">

<?php if($id != '')
  {
?>
  <input type="submit" name="submit" value="Update" />
<?php
  }
  else
  {
?>
  <input type="submit" name="submit" value="Enter" />
<?php
  }
?>

</div>

</form>

</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>