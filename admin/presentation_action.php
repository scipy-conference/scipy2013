<?php

$submit = $_POST['submit'];

if ($submit == "Update") 

{

$action = "updated";

//=======================================
// update talk info
//=======================================
include('../inc/db_conn.php');

$talk_id = $_POST['talk_id'];
$track = $_POST['track'];
$title = $_POST['title'];
$abstract = $_POST['abstract'];
$description = $_POST['description'];
$outline = $_POST['outline'];
$packages = $_POST['packages'];
$documentation = $_POST['documentation'];
$released = $_POST['released'];
$license_type_id = $_POST['license_type_id'];
$video_link = $_POST['video_link'];
$tags = $_POST['tags'];


$sql_talk = "UPDATE talks ";
$sql_talk .= "SET ";
$sql_talk .= "presenter_id = \"$presenter_id\", ";
$sql_talk .= "track = \"$track\", ";
$sql_talk .= "title = \"$title\", ";
$sql_talk .= "abstract = \"$abstract\", ";
$sql_talk .= "description = \"$description\", ";
$sql_talk .= "outline = \"$outline\", ";
$sql_talk .= "packages = \"$packages\", ";
$sql_talk .= "documentation = \"$documentation\", ";
$sql_talk .= "authors = \"$authors\", ";
$sql_talk .= "released = \"$released\", ";
$sql_talk .= "license_type_id = \"$license_type_id\", ";
$sql_talk .= "video_link = \"$video_link\", ";
$sql_talk .= "tags = \"$tags\", ";
$sql_talk .= "updated_at = NOW() ";
$sql_talk .= "WHERE id = \"$talk_id\" LIMIT 1";

$result_talk = @mysql_query($sql_talk, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

include("presentation_action_result.php");

} 

elseif ($submit == "Enter") 

{

$action = "entered";

$track = $_POST['track'];
$title = $_POST['title'];
$abstract = $_POST['abstract'];
$description = $_POST['description'];
$outline = $_POST['outline'];
$packages = $_POST['packages'];
$documentation = $_POST['documentation'];
$released = $_POST['released'];
$license_type_id = $_POST['license_type_id'];
$video_link = $_POST['video_link'];
$tags = $_POST['tags'];

//======================================
//  UPDATE PROMO TABLE
//======================================

include('../inc/db_conn.php');

$sql_1 ="INSERT INTO talks ";
$sql_1 .="(";
$sql_1 .="track, ";
$sql_1 .="title, ";
$sql_1 .="abstract, ";
$sql_1 .="description, ";
$sql_1 .="outline, ";
$sql_1 .="packages, ";
$sql_1 .="documentation, ";
$sql_1 .="released, ";
$sql_1 .="license_type_id, ";
$sql_1 .="video_link, ";
$sql_1 .="tags, ";
$sql_1 .="created_at, ";
$sql_1 .="updated_at ";
$sql_1 .=") ";
$sql_1 .="VALUES ";
$sql_1 .="(";
$sql_1 .="\"$track\", ";
$sql_1 .="\"$title\", ";
$sql_1 .="\"$abstract\", ";
$sql_1 .="\"$description\", ";
$sql_1 .="\"$outline\", ";
$sql_1 .="\"$packages\", ";
$sql_1 .="\"$documentation\", ";
$sql_1 .="\"$released\", ";
$sql_1 .="\"$license_type_id\", ";
$sql_1 .="\"$video_link\", ";
$sql_1 .="\"$tags\", ";
$sql_1 .="NOW(), ";
$sql_1 .="NOW()";
$sql_1 .=")";

$result_1 = @mysql_query($sql_1, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

include("presentation_action_result.php");

} 

?>