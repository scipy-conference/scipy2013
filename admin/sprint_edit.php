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
$sql .="WHERE open_agendas.id = \"$oa_id\"";

$result = @mysql_query($sql, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($result))
{

$subject = $row['subject'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$content = $row['content'];
$panelists = $row['panelists'];
$will_moderate = $row['will_moderate'];
$moderator = $row['moderator'];
$type = $row['type'];
$accepted = $row['accepted'];
$created_by = $row['created_by'];
$updated_by = $row['updated_by'];

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

<h1>Sprint Suggestion</h1>

<form id="formID" class="formular" method="post" action="open_agenda_action.php">

<div id="instructions">

<p>Program chairs: Peter Wang &amp; Corran Webster</p>
</div>

<div class="row">
  <div class="cell" style="width: 20%;">
    <label for="subject">Sprint Subject:</label> 
  </div>
  <div class="cell" style="width: 65%;">
    <textarea name="subject" id="subject" rows="4"><?php echo $subject ?></textarea>
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
    <span class="form_tips"><label for="content">Sprint Summary:<br /><span class="other_form_tips">~150 words</span></label></span> 
  </div>
  <div class="cell" style="width: 65%;">
    <textarea id="content" name="content" rows="5"><?php echo $content ?></textarea>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 20%;">
    <span class="form_tips"><label for="panelists">Coordinator:</label></span> 
  </div>
  <div class="cell" style="width: 65%;">
    <?php echo $first_name ?> <?php echo $last_name ?>
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
    <input type="hidden" name="type" value="sprint" />
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