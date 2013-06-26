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

$yes_nos = array('1' => 'Yes','0' => 'No');
$oa_id = $_GET['id'];

include('../inc/db_conn.php');

// add registered user info here

$username = $_SESSION['formregusername'];

$sql = "SELECT clients.id, ";
$sql .= "first_name, "; 
$sql .= "last_name "; 
$sql .= "FROM clients "; 
$sql .= "LEFT JOIN participants ";
$sql .= "ON clients.id = client_id ";
$sql .= "WHERE username= \"$username\"";

$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) {

$id=$row['id'];
$name = $row['first_name'] . " " . $row['last_name'];
}


$sql ="SELECT  ";
$sql .="subject, ";
$sql .="first_name, ";
$sql .="last_name, ";
$sql .="content, ";
$sql .="panelists, ";
$sql .="start_time, ";
$sql .="end_time, ";
$sql .="location_id, ";
$sql .="will_moderate, ";
$sql .="moderator, ";
$sql .="conference_id, ";
$sql .="type, ";
$sql .="accepted, ";
$sql .="created_by, ";
$sql .="updated_by, ";
$sql .="open_agendas.created_at, ";
$sql .="open_agendas.updated_at ";
$sql .="FROM open_agendas ";
$sql .="LEFT JOIN clients ";
$sql .="ON created_by = clients.id ";
$sql .="LEFT JOIN participants ";
$sql .="ON client_id = clients.id ";
$sql.= "LEFT JOIN schedules ";
$sql .= "ON schedules.open_agenda_id = open_agendas.id ";
$sql .= "LEFT JOIN locations ";
$sql .= "ON location_id = locations.id ";
$sql .="WHERE open_agendas.id = \"$oa_id\"";

$result = @mysql_query($sql, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($result))
{

$subject = $row['subject'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$content = $row['content'];
$start_time = $row['start_time'];
$end_time = $row['end_time'];
$location_id = $row['location_id'];
$panelists = $row['panelists'];
$will_moderate = $row['will_moderate'];
$moderator = $row['moderator'];
$type = $row['type'];
$accepted = $row['accepted'];
$created_by = $row['created_by'];
$updated_by = $row['updated_by'];

}

function loclist($x){
                  $sql_2 = mysql_query("SELECT name, id FROM locations WHERE id > 3 ORDER BY name ASC");
                  echo "<select name=\"location_id\">";
                  while(list($name, $id)=mysql_fetch_array($sql_2)){
		if ($id == $x) 
		{ 
		echo "<option value=$id SELECTED>$name</option>";
		}
		else
		{
		echo "<option value=$id>$name</option>";
		}
	}
                  echo "</select>";
                  
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

<h1>BoF Suggestion</h1>

<form id="formID" class="formular" method="post" action="open_agenda_action.php">

<div id="instructions">
<p>You just have to let us know a title and brief description of the BoF.</p>

<p>Program chairs: Kyle Mandli &amp; Matthew Turk</p>
</div>

<div class="row">
  <div class="cell" style="width: 20%;">
    <label for="subject">BoF Subject:</label> 
  </div>
  <div class="cell" style="width: 65%;">
    <input type="text" name="subject" id="subject" value="<?php echo $subject ?>" style="width: 100%;"/>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 20%;">
    <span class="form_tips"><label for="panelists">Submitted by:</label></span> 
  </div>
  <div class="cell" style="width: 65%;">
    <?php echo $created_by ?> - <?php echo $first_name ?> <?php echo $last_name ?>
    <input type="hidden" name="created_by" value="<?php echo $created_by ?>" />
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 20%;">
    <span class="form_tips"><label for="time">Time:</label></span> 
  </div>
  <div class="cell" style="width: 65%;">
    <input type="text" name="start_time" id="start_time" value="<?php echo $start_time ?>"/>
    <input type="text" name="end_time" id="end_time" value="<?php echo $end_time ?>"/>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 20%;">
    <span class="form_tips"><label for="location">Location:</label></span> 
  </div>
  <div class="cell" style="width: 65%;">
<?php
loclist($location_id);
?>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 20%;">
    <span class="form_tips"><label for="content">BoF Summary:<br /><span class="other_form_tips">~150 words</span></label></span> 
  </div>
  <div class="cell" style="width: 65%;">
    <textarea id="content" name="content" rows="5"><?php echo $content ?></textarea>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 20%;">
    <span class="form_tips"><label for="panelists">Panelist Suggestions:</label></span> 
  </div>
  <div class="cell" style="width: 65%;">
    <textarea id="panelists" name="panelists" rows="3"><?php echo $panelists ?></textarea>
  </div>
</div>
<div class="row">
  <div class="cell" style="width: 20%;">
    <span class="form_tips"><label for="panelists">Are you willing to moderate:</label></span> 
  </div>
  <div class="cell" style="width: 65%;">
            <?php foreach ($yes_nos as $key => $yes_no) {
            echo "<input type='radio' name='will_moderate' value='$key'"; if($will_moderate == $key) {echo "checked"; } else {echo "unchecked"; } echo"/> $yes_no \n";
            } ?>
    <br /><label for="moderator">if no, Suggested Moderator:</label> <input type="text" name="moderator" id="moderator" value="<?php echo $moderator ?>" style="width: 50%;"/>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 20%;">
    <span class="form_tips"><label for="panelists">Accepted:</label></span> 
  </div>
  <div class="cell" style="width: 65%;">
            <?php foreach ($yes_nos as $key => $yes_no) {
            echo "<input type='radio' name='accepted' value='$key'"; if($accepted == $key) {echo "checked"; } else {echo "unchecked"; } echo"/> $yes_no \n";
            } ?>
    <input type="hidden" name="type" value="bof" />
  </div>
</div>

<div align="center">
<?php if($oa_id != '')
  {
?>
  <input type="hidden" name="id" value="<?php echo $oa_id ?>" />
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