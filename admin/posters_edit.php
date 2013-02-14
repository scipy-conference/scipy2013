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

$talk_id = $_GET['id'];

$years = array('' => 'yyyy', '2012' => '2012', '2013' => '2013', '2014' => '2014', '2015' => '2015', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020', '2021' => '2021');
$months = array('' => 'mm', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12');
$days = array('' => 'dd', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30', '31' => '31');
$release_responses = array('' => 'choose', '0' => 'no', '1' => 'yes');

//===============================================
// get license types                           //
//===============================================
$license_types = array('' => 'choose');

$sql_licenses = "SELECT ";
$sql_licenses .= "id, ";
$sql_licenses .= "type ";
$sql_licenses .= "FROM license_types";

$total_licenses = @mysql_query($sql_licenses, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

while ($row = mysql_fetch_array($total_licenses))
{
  $license_types[ $row['id'] ] = $row['type'];
}

//===========================
//  pull presenters
//===========================

$sql_presenters = "SELECT ";
$sql_presenters .= "last_name, ";
$sql_presenters .= "first_name, ";
$sql_presenters .= "affiliation, ";
$sql_presenters .= "email, ";
$sql_presenters .= "bio, ";
$sql_presenters .= "presenters.id AS presenter_id, ";

$sql_presenters .= "talks.id AS talk_id, ";
$sql_presenters .= "title, ";
$sql_presenters .= "description, ";
$sql_presenters .= "track, ";
$sql_presenters .= "authors, ";
$sql_presenters .= "released, ";
$sql_presenters .= "license_type_id, ";
$sql_presenters .= "tags, ";
$sql_presenters .= "start_time, ";

$sql_presenters .= "DATE_FORMAT(start_time, '%Y') AS start_year, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%c') AS start_month, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%d') AS start_day, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%H') AS start_hour, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%i') AS start_minute, ";

$sql_presenters .= "end_time, ";

$sql_presenters .= "DATE_FORMAT(end_time, '%Y') AS end_year, ";
$sql_presenters .= "DATE_FORMAT(end_time, '%c') AS end_month, ";
$sql_presenters .= "DATE_FORMAT(end_time, '%d') AS end_day, ";
$sql_presenters .= "DATE_FORMAT(end_time, '%H') AS end_hour, ";
$sql_presenters .= "DATE_FORMAT(end_time, '%i') AS end_minute, ";

$sql_presenters .= "location_id ";

$sql_presenters .= "FROM talks ";
$sql_presenters .= "LEFT JOIN presenters ";
$sql_presenters .= "ON presenter_id = presenters.id ";
$sql_presenters .= "LEFT JOIN schedules ";
$sql_presenters .= "ON schedules.talk_id = talks.id ";
$sql_presenters .= "WHERE talks.id = \"$talk_id\"";


$total_presenters = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($total_presenters))
{

$last_name = $row['last_name'];
$first_name = $row['first_name'];
$affiliation = $row['affiliation'];
$email = $row['email'];
$bio = $row['bio'];
$presenter_id = $row['presenter_id'];
$talk_id = $row['talk_id'];
$title = $row['title'];
$track = $row['track'];
$released = $row['released'];
$license_type_id = $row['license_type_id'];
$tags = $row['tags'];
$authors = $row['authors'];
$description = $row['description'];
$start_time = $row['start_time'];
$end_time = $row['end_time'];
$start_year_set = $row['start_year'];
$start_month_set = $row['start_month'];
$start_day_set = $row['start_day'];
$start_hour = $row['start_hour'];
$start_minute = $row['start_minute'];
$end_year_set = $row['end_year'];
$end_month_set = $row['end_month'];
$end_day_set = $row['end_day'];
$end_hour = $row['end_hour'];
$end_minute = $row['end_minute'];
$location = $row['location'];
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<?php $thisPage="Admin"; ?>
<?php $thisSub="Posters"; ?>


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

<h2>Presenters/Contact:</h2>



<form id="formID" class="formular" method="post" action="posters_edit_p2.php">

<div class="form_row">

<p>Edit Presenter Info:</p>
<table class="form">
  <tr>
    <td><label for="FirstName">* First Name</label><br /><input class="validate[required] text-input" type='text' size='16' id='FirstName' name='first_name' value='<?php echo $first_name ?>'></td>
    <td><label for="">* Last Name</label><br /><input class="validate[required] text-input" type='text' size='16' id='LastName' name='last_name' value='<?php echo $last_name ?>'></td>
  </tr>
  <tr>
    <td><label for="">Affiliation</label><br /><input type='text' size='16' name='affiliation' value='<?php echo $affiliation ?>'></td>
    <td><label for="">* Email</label><br /><input class="validate[required,custom[email]]" type='text' size='16' id='email' name='email' value='<?php echo $email ?>'></td>
  </tr>
  <tr>
    <td colspan="2"><label for="">Bio</label><br /><textarea name="bio" cols="80" rows="8"><?php echo $bio ?></textarea></td>
  </tr>
</table>

</div>

<p>Edit Poster Info:</p>
<table>
  <tr>
    <td colspan="4"><label for="">Poster Title</label><br /><textarea name='title' cols="80"><?php echo $title ?></textarea></td>
  </tr>
  <tr>
    <td><label for="">Track</label><br /><input class="validate[required] text-input" type='text' size='24' id='Track' name='track' value='<?php echo $track ?>'></td>
    <td ><label for="">Released</label><br />
         <select  id='released' name='released'>
           <?php foreach ($release_responses as $key =>  $release_response) {
             if ($released == $key)
               {
                 echo "<option value='$key', selected='selected'>$release_response</option>";
               }
             else 
               {
                 echo "<option value='$key'>$release_response</option>";
               }
            } ?></select>
    </td>
    <td colspan="2"><label for="">License</label><br />
         <select  id='license_type_id' name='license_type_id'>
           <?php foreach ($license_types as $key =>  $license_type) {
             if ($license_type_id == $key)
               {
                 echo "<option value='$key', selected='selected'>$license_type</option>";
               }
             else 
               {
                 echo "<option value='$key'>$license_type</option>";
               }
            } ?></select>
    </td>
  </tr>
  <tr>
    <td colspan="4"><label for="">Authors</label><br /><textarea name="authors" cols="80"><?php echo $authors ?></textarea></td>
  </tr>
  <tr>
    <td colspan="4"><label for="">Description</label><br /><textarea name="description" cols="80" rows="8"><?php echo $description ?></textarea></td>
  </tr>
  <tr>
    <td colspan="4"><label for="">Tags</label><br /><textarea name="tags" cols="80"><?php echo $tags ?></textarea></td>
  </tr>
</table>

<div align="center">
  <input type="hidden" name="presenter_id" value="<?php echo $presenter_id ?>" />
  <input type="hidden" name="talk_id" value="<?php echo $talk_id ?>" />
  <input type="submit" name="submit" value="Submit"/>
</div>


</form>
</div>
<div style="clear:both;"></div>

</div>
</body>

</html>