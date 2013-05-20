<?php

$submit = $_POST['submit'];

if ($submit == "Enter") 

{
include('../inc/db_conn.php');
$action = "entered";

$subject = $_POST['subject'];
$content = $_POST['content'];
$panelists = $_POST['panelists'];
$will_moderate = $_POST['will_moderate'];
$moderator = $_POST['moderator'];
$coordinator = $_POST['coordinator'];
$type = $_POST['type'];
$accepted = $_POST['accepted'];
$created_by = $_POST['created_by'];
$updated_by = $_POST['updated_by'];

$sql ="INSERT INTO open_agendas ";
$sql .="(subject, ";
$sql .="content, ";
$sql .="panelists, ";
$sql .="will_moderate, ";
$sql .="moderator, ";
$sql .="conference_id, ";
$sql .="type, ";
$sql .="accepted, ";
$sql .="created_by, ";
$sql .="updated_by, ";
$sql .="created_at, ";
$sql .="updated_at) ";
$sql .="VALUES ";
$sql .="(\"$subject\", ";
$sql .="\"$content\", ";
$sql .="\"$panelists\", ";
$sql .="\"$will_moderate\", ";
$sql .="\"$moderator\", ";
$sql .="2, ";
$sql .="\"$type\", ";
$sql .="\"$accepted\", ";
$sql .="\"$id\", ";
$sql .="\"$id\", ";
$sql .="NOW(), ";
$sql .="NOW())";

$result = @mysql_query($sql, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

include("open_agenda_action_result.php");

}

elseif ($submit == "Update") 

{

$action = "updated";

//=======================================
// update talk info
//=======================================
include('../inc/db_conn.php');

$oa_id = $_POST['id'];
$subject = $_POST['subject'];
$content = $_POST['content'];
$panelists = $_POST['panelists'];
$will_moderate = $_POST['will_moderate'];
$moderator = $_POST['moderator'];
$type = $_POST['type'];
$accepted = $_POST['accepted'];
$created_by = $_POST['created_by'];
$updated_by = $_POST['updated_by'];



$sql_talk = "UPDATE open_agendas ";
$sql_talk .= "SET ";
$sql_talk .= "subject = \"$subject\", ";
$sql_talk .= "content = \"$content\", ";
$sql_talk .= "panelists = \"$panelists\", ";
$sql_talk .= "will_moderate = \"$will_moderate\", ";
$sql_talk .= "moderator = \"$moderator\", ";
$sql_talk .= "type = \"$type\", ";
$sql_talk .= "accepted = \"$accepted\", ";
$sql_talk .= "created_by = \"$created_by\", ";
$sql_talk .= "updated_by = \"$updated_by\" ";
$sql_talk .= "WHERE id = \"$oa_id\" LIMIT 1";

$result_talk = @mysql_query($sql_talk, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

include("open_agenda_action_result.php");

} 
?>