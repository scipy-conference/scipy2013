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
//  pull info
//===========================

$sql ="SELECT  ";
$sql .="open_agendas.id, ";
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

$id = $row['id'];
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

<h1>Admin</h1>

<p>Presenter <?php echo "$code" ?> <?php echo $action ?> successfully!</p></p>

id: <?php echo $id ?><br />
subject: <?php echo $subject ?><br />
content: <?php echo $content ?><br />
suggested by: <?php echo $first_name ?> <?php echo $last_name ?><br />
will moderate: <?php echo $will_moderate ?><br />
moderator: <?php echo $moderator ?><br />
panelists: <?php echo $panelists ?><br />
type: <?php echo $type ?><br />
accepted: <?php echo $accepted ?><br />
created_by: <?php echo $first_name ?> <?php echo $last_name ?><br />
updated_by: <?php echo $updated_by ?><br />


</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>