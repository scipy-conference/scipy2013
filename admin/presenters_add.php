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


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<?php $thisPage="Admin"; ?>
<?php $thisSub="Talks"; ?>


<head>
<?php @ require_once ("../inc/header.php"); ?>	
</head>

<body>
<div id="container">
<?php @ require_once ("../inc/menu.php"); ?>
<div id="side-content">
<?php @ require_once ("subs.php"); ?>
<?php @ require_once ("../inc/sponsors.php"); ?>
</div>
<div id="main-content">

<h1>Admin</h1>

<p>Presenter Info:</p>

<form id="formID" class="formular" method="post" action="presenters_add_p2.php">

<div class="form_row">
<div class="form_cell">
<table>
  <tr>
    <td><label for="FirstName">* First Name</label><br /><input class="validate[required] text-input" type='text' size='24' id='FirstName' name='first_name' value=''></td>
    <td><label for="">* Last Name</label><br /><input class="validate[required] text-input" type='text' size='24' id='LastName' name='last_name' value=''></td>
    <td><label for="">Affiliation</label><br /><input type='text' size='24' name='affiliation' value=''></td>
    <td><label for="">* Email</label><br /><input class="validate[required,custom[email]]" type='text' size='24' id='email' name='email' value=''></td>
  </tr>
  <tr>
    <td colspan="4"><label for="">Bio</label><br /><textarea name="bio"></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><label for="">Talk Title</label><br /><input class="validate[required] text-input" type='text' size='24' id='Title' name='title' value=''></td>
    <td colspan="2"><label for="">Track</label><br /><input class="validate[required] text-input" type='text' size='24' id='Track' name='track' value=''></td>
  </tr>
  <tr>
    <td colspan="4"><label for="">Description</label><br /><textarea name="description"></textarea></td>
  </tr>
</table>

<div align="center">
  <input type="submit" name="submit" value="Submit"/>
</div>
</div>
</div>
</form>
</div>
<div style="clear:both;"></div>

</div>
</body>

</html>