<?php

$submit = $_POST['submit'];

if ($submit == "Enter") 

{
include('../inc/db_conn.php');
$action = "entered";

$subject = $_POST['subject'];
$content = addslashes($_POST['content']);
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

$sql_select = "SELECT id FROM open_agendas ORDER BY id DESC LIMIT 1";

$result_select = mysql_query($sql_select);

while ($row = mysql_fetch_array($result_select)) {
$open_agenda_id = $row['id'];
}


$start_time =  $_POST['start_time'];
$end_time =  $_POST['end_time'];
$location_id =  $_POST['location_id'];

$sql_schedule = "INSERT INTO schedules ";
$sql_schedule .= "(open_agenda_id, start_time, end_time, location_id, created_at, updated_at) ";
$sql_schedule .= "VALUES ";
$sql_schedule .= "(";
$sql_schedule .="\"$open_agenda_id\", ";
$sql_schedule .="\"$start_time\", ";
$sql_schedule .="\"$end_time\", ";
$sql_schedule .="\"$location_id\", ";
$sql_schedule .="NOW(), ";
$sql_schedule .="NOW())";

$result_schedule = @mysql_query($sql_schedule, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());


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
$content = addslashes($_POST['content']);
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

$start_time =  $_POST['start_time'];
$end_time =  $_POST['end_time'];
$location_id =  $_POST['location_id'];

$sql_schedule = "UPDATE schedules ";
$sql_schedule .= "SET ";
$sql_schedule .= "start_time = \"$start_time\", ";
$sql_schedule .= "end_time = \"$end_time\", ";
$sql_schedule .= "location_id = \"$location_id\" ";
$sql_schedule .= "WHERE open_agenda_id = \"$oa_id\" LIMIT 1";

$result_schedule = @mysql_query($sql_schedule, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());


include("open_agenda_action_result.php");

} 
?>