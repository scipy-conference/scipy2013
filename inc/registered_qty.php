<?php 

//===========================
//  pull total registered
//===========================

$sql_total = "SELECT ";
$sql_total .= "SUM(IF(conference_id = 2,1,0)) AS registered_qty ";
$sql_total .= "FROM registrations ";
$sql_total .= "WHERE conference_id = 2 ";

$total_ = @mysql_query($sql_total, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

while ($row = mysql_fetch_array($total_)) {

$registered_qty=$row['registered_qty'];

$perc_full = number_format(($registered_qty/300)*100,0);
}

?>