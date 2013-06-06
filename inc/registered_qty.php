<?php 

//===========================
//  pull sessions detail
//===========================

$sql_sessions = "SELECT  ";
$sql_sessions .= "SUM(IF(session_id = 4,1,0)) AS Tutorials,  ";
$sql_sessions .= "SUM(IF(session_id = 5,1,0)) AS Conference,  ";
$sql_sessions .= "SUM(IF(session_id = 6,1,0)) AS Sprints  ";
$sql_sessions .= "FROM registrations  ";
$sql_sessions .= "LEFT JOIN registered_sessions  ";
$sql_sessions .= "ON registration_id = registrations.id  ";
$sql_sessions .= "LEFT JOIN sessions  ";
$sql_sessions .= "ON session_id = sessions.id  ";
$sql_sessions .= "GROUP BY registrations.conference_id";


$total_result_sessions = @mysql_query($sql_sessions, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_sessions = @mysql_num_rows($total_result_sessions);

while($row = mysql_fetch_array($total_result_sessions)) {


$tutorials_qty = $row['Tutorials'];
$conference_qty = $row['Conference'];
$sprints_qty = $row['Sprints'];

$conf_perc_full = number_format(($conference_qty/300)*100,0);
}


?>