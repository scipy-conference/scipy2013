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
//  pull total registered
//===========================

$sql_registrants = "SELECT ";
$sql_registrants .= "participants.last_name, ";
$sql_registrants .= "participants.first_name, ";
$sql_registrants .= "affiliation, ";
$sql_registrants .= "email, ";
$sql_registrants .= "participants.city, ";
$sql_registrants .= "participants.state, ";
$sql_registrants .= "participants.postal_code, ";
$sql_registrants .= "participants.country, ";
$sql_registrants .= "DATE_FORMAT(registrations.created_at, '%b %d') AS reg_date, ";
$sql_registrants .= "type, ";
$sql_registrants .= "phone ";
$sql_registrants .= "FROM registrations ";
$sql_registrants .= "LEFT JOIN participants ";
$sql_registrants .= "ON registrations.participant_id = participants.id ";
$sql_registrants .= "LEFT JOIN participant_types ";
$sql_registrants .= "ON participant_type_id = participant_types.id ";
$sql_registrants .= "LEFT JOIN billings ";
$sql_registrants .= "ON registrations.participant_id = participants.id ";
$sql_registrants .= "WHERE registrations.participant_id = \"$participant_id\" ";
$sql_registrants .= "AND registrations.conference_id = 1";


$total_registrants = @mysql_query($sql_registrants, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($total_registrants))
{

$last_name = $row['last_name'];
$first_name = $row['first_name'];
$affiliation = $row['affiliation'];
$email = $row['email'];
$city = $row['city'];
$state = $row['state'];
$postal_code = $row['postal_code'];
$country = $row['country'];
$reg_date = $row['reg_date'];
$type = $row['type'];
$phone = $row['phone'];
}


//===========================
//  pull registered sessions
//===========================

$sql_sessions = "SELECT ";
$sql_sessions .= "session, ";
$sql_sessions .= "amt_paid ";
$sql_sessions .= "FROM registered_sessions ";
$sql_sessions .= "LEFT JOIN sessions ";
$sql_sessions .= "ON session_id = sessions.id ";
$sql_sessions .= "LEFT JOIN registrations ";
$sql_sessions .= "ON registration_id = registrations.id ";
$sql_sessions .= "WHERE participant_id = $participant_id ";
$sql_sessions .= "AND registrations.conference_id = 1";

$total_sessions = @mysql_query($sql_sessions, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_sessions = @mysql_num_rows($total_sessions);

do {
  if ($row['session'] != '')
  {

$display_sessions .="<ul>
    <li>" . $row['session'] . " - $" . $row['amt_paid'] . "</li>

  </ul>";
  }
}
while($row = mysql_fetch_array($total_sessions));

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<?php $thisPage="Admin"; ?>
<?php $thisSub="Registrants"; ?>


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

<p>Registrant Info:</p>

<div class="form_row">
<div class="form_cell">
<h2>Contact:</h2>
<p><?php echo "$last_name, $first_name" ?><br />
<?php if($affiliation != "") {echo "$affiliation <br />";} ?>
<?php echo "$city, $state $postal_code" ?><br />
<?php echo "$country" ?></p>

<p><?php echo "<a href=\"mailto:$email\">$email</a>" ?><br />
<?php echo preg_replace('/\d{3}/', '$0-', str_replace('.', null, trim($phone)), 2); ?></p>

</div>
<div class="form_cell">
<h2>Registered Sessions:</h2>

<p>Registered at <span class="bold"><?php echo "$type" ?></span> level on <span class="bold"><?php echo "$reg_date" ?></span>, for the following sessions:
<?php echo $display_sessions ?>
</div>
</div>

</div>
<div style="clear:both;"></div>

</div>
</body>

</html>