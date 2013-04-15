<?php

include('inc/db_conn.php');

//===========================
//  pull sessions
//===========================

$sql_sessions = "SELECT ";
$sql_sessions .= "pricing.id AS price_id, ";
$sql_sessions .= "session, ";
$sql_sessions .= "session_id, ";
$sql_sessions .= "CONCAT(DATE_FORMAT(start_date, '%M %D'), \" - \", DATE_FORMAT(end_date, '%D')) AS `Dates`, ";
$sql_sessions .= "SUM(IF(type = \"Standard\", price,0)) AS Standard, ";
$sql_sessions .= "SUM(IF(type = \"Academic\", price,0)) AS Academic, ";
$sql_sessions .= "SUM(IF(type = \"Student\", price,0)) AS Student ";
$sql_sessions .= "FROM pricing ";
$sql_sessions .= "LEFT JOIN participant_types ";
$sql_sessions .= "ON participant_type_id = participant_types.id ";
$sql_sessions .= "LEFT JOIN sessions ON session_id = sessions.id ";
$sql_sessions .= "WHERE pricing.conference_id = 2 ";
$sql_sessions .= "GROUP BY session ";
$sql_sessions .= "ORDER BY sessions.id ASC";

$total_result_sessions = @mysql_query($sql_sessions, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_sessions = @mysql_num_rows($total_result_sessions);

do {
  if ($row['session'] != '')
  {

$display_sessions .=    "
  <tr>
    <td><input name=\"session_id_" . $row['session_id'] . "\" type=\"checkbox\" ";
      if ($row['session'] == "Conference")
        {
        $display_sessions .="checked";
        }
$display_sessions .=" /></td>
    <td>" . $row['session'] . "";
      if ($row['session'] == "Sprints")
        {
        $display_sessions .="*";
        }
$display_sessions .="</td>
    <td>" . $row['Dates'] . "</td>
    <td align=\"right\"> $ " . $row['Standard'] . "</td>
    <td align=\"right\"> $ " . $row['Academic'] . "</td>
    <td align=\"right\"> $ " . $row['Student'] . "</td>
  </tr>";
  }
}
while($row = mysql_fetch_array($total_result_sessions));

//===========================
//  pull participant types
//===========================

$sql_participants = "SELECT ";
$sql_participants .= "id, ";
$sql_participants .= "type ";
$sql_participants .= "FROM participant_types ";
$sql_participants .= "ORDER BY Field(id,1,3,2)";

$total_result_participants = @mysql_query($sql_participants, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_participants = @mysql_num_rows($total_result_participants);

do {
  if ($row['type'] != '')
  {

$display_participants .=    "
  <tr>
    <td><span><input class=\"validate[required] radio\" name=\"participant_type\" id=\"participant_type\" type=\"radio\" value=\"" . $row[id] . "\" ";
$display_participants .="/></span></td>
    <td>" . $row['type'] . "</td>
  </tr>";
  }
}
while($row = mysql_fetch_array($total_result_participants));

//===========================
//  pull tshirt sizes
//===========================

$sql_sizes = "SELECT ";
$sql_sizes .= "id, ";
$sql_sizes .= "size ";
$sql_sizes .= "FROM tshirt_sizes ";
$sql_sizes .= "ORDER BY id DESC";

$total_result_sizes = @mysql_query($sql_sizes, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_sizes = @mysql_num_rows($total_result_sizes);

do {
  if ($row['size'] != '')
  {

$display_sizes .=    "
  <tr>
    <td><input class=\"validate[required] radio\" name=\"tshirt_size\" id=\"tshirt_size\" type=\"radio\" value=\"" . $row[id] . "\"  ";
      if ($_POST['tshirt_size'] == $row[size])
        {
          $display_sizes .="checked ";
        }
        
$display_sizes .="/></td>
    <td>" . $row['size'] . "</td>
  </tr>";
  }
}
while($row = mysql_fetch_array($total_result_sizes));

?>

<!DOCTYPE html>
<html>
<?php $thisPage="Register"; ?>
<head>

<?php
//force redirect to secure page
if($_SERVER['SERVER_PORT'] != '443') { header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); exit(); }
?>

        <link rel="stylesheet" href="inc/validationEngine.jquery.css" type="text/css"/>
        <!-- <link rel="stylesheet" href="inc/template.css" type="text/css"/> -->
        <script src="inc/jquery-1.6.min.js" type="text/javascript">
        </script>
        <script src="inc/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
        </script>
        <script src="inc/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
        </script>
        <script>
            jQuery(document).ready(function(){
                // binds form submission and fields to the validation engine
                jQuery("#formID").validationEngine();
            });
        </script>

<?php include('inc/header.php') ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />

</head>

<body>

<div id="container">

<?php include('inc/page_headers.php') ?>

<section id="sidebar">
  <?php include("inc/sponsors.php") ?>
</section>


<section id="main-content">

<h1>2013 Conference Registration</h1>

<p class="left">Register online using the form below. You may also register via phone at (512)536-1057. </p>

<!--
<form id="formID" method="post" action="<?php echo $SERVER['SCRIPT_NAME'] ?>"> 
-->
<form id="formID" class="formular" method="post" action="reg_p2.php">

<div class="form_row">
<h2> Session Selection (Early-Bird pricing)</h2>
<p class="indent">Early-Bird registration will close <span class="highlight">Monday, May 6th</span>.<br />
Pricing for each item will increase $50 after Early-Bird registration, so REGISTER NOW!!.</p>

<table id="schedule">
  <tr>
    <th colspan="2">Session </th>
    <th>Dates</th>
    <th><div align="right">Price</div></th>
    <th><div align="right">Academic<br />Price</div></th>
    <th><div align="right">Student<br />Price</div></th>
  </tr><?php echo $display_sessions ?>
  <tr>
    <td colspan="6"><span class="asterisk_text">*SciPy 2013 Sprints will be free of cost to everyone. However, for catering purposes, we would like to know whether you plan on attending.</span></td>
</table>
</div>


<div class="row">
<div class="cell">
<h2> Participant Level </h2>
<table align="center" width="200">
    <?php echo $display_participants ?>
</table>
</div>
<div class="cell">

<h2> T-Shirt Size </h2>
<table align="center" width="200">
    <?php echo $display_sizes ?>
</table>
</div>
</div>
<div style="clear:both;"></div>
<br />

<div align="center">
  <input type="submit" name="submit" value="next >>"/>
</div>


</form>
</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>