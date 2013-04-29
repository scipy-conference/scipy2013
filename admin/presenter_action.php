<?php

$submit = $_POST['submit'];

if ($submit == "Update") 

{

$action = "updated";

$id = $_POST['id'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$email = $_POST['email'];
$affiliation = $_POST['affiliation'];
$bio = $_POST['bio'];



//======================================
//  UPDATE PROMO TABLE
//======================================

include('../inc/db_conn.php');

$sql_3 ="UPDATE presenters ";
$sql_3 .="SET ";
$sql_3 .="last_name=\"$last_name\", ";
$sql_3 .="first_name=\"$first_name\", ";
$sql_3 .="email=\"$email\", ";
$sql_3 .="affiliation=\"$affiliation\", ";
$sql_3 .="bio=\"$bio\", ";
$sql_3 .="updated_at=NOW() ";
$sql_3 .="WHERE id=\"$id\"";

$result_3 = @mysql_query($sql_3, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

include("presenter_action_result.php");

} 

elseif ($submit == "Enter") 

{

$action = "entered";

$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$email = $_POST['email'];
$affiliation = $_POST['affiliation'];
$bio = $_POST['bio'];

//======================================
//  UPDATE PROMO TABLE
//======================================

include('../inc/db_conn.php');

$sql_1 ="INSERT INTO presenters ";
$sql_1 .="(";
$sql_1 .="last_name, ";
$sql_1 .="first_name, ";
$sql_1 .="email, ";
$sql_1 .="affiliation, ";
$sql_1 .="bio, ";
$sql_1 .="created_at, ";
$sql_1 .="updated_at ";
$sql_1 .=") ";
$sql_1 .="VALUES ";
$sql_1 .="(";
$sql_1 .="\"$last_name\", ";
$sql_1 .="\"$first_name\", ";
$sql_1 .="\"$email\", ";
$sql_1 .="\"$affiliation\", ";
$sql_1 .="\"$bio\", ";
$sql_1 .="NOW(), ";
$sql_1 .="NOW()";
$sql_1 .=")";

$result_1 = @mysql_query($sql_1, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

include("presenter_action_result.php");

} 

?>