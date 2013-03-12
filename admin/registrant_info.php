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
$sql_registrants .= "registrations.id, ";
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
$sql_registrants .= "AND registrations.conference_id = 2";


$total_registrants = @mysql_query($sql_registrants, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($total_registrants))
{

$registration_id = $row['id'];
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
$sql_sessions .= "AND registrations.conference_id = 2";

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

<!DOCTYPE html>
<html>
<?php $thisPage="Admin"; ?>
<head>

<?php @ require_once ("../inc/second_level_header.php"); ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />

<script src="../inc/jquery-1.6.min.js" type="text/javascript">
        </script>

<script>
$(".delete").click(function (){
   var answer = confirm("Are you sure?");
      if (answer) {
         return true;
      }else{
         return false;
      }
});
</script>


</head>

<body>

<div id="container">

<?php include('../inc/admin_page_headers.php') ?>

<section id="sidebar">
  <?php include("../inc/sponsors.php") ?>
</section>

<section id="main-content">

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

<!--
<form name="form1" method="post" action="registrant_delete.php">
<input type="hidden" name="participant_id" value="<?php echo $participant_id ?>" />
<input type="hidden" name="registration_id" value="<?php echo $registration_id ?>" />
<input type="submit" class="delete" value="delete registrant">
</form>
-->
</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>