<?php

// LIVE SITE
$db_name = "scipy";
$connection = @mysql_connect("127.0.0.1","jivanoff","tr4n5c3nd!!") or die("Couldn't Connect.");
//$connection = @mysql_connect("127.0.0.1","jri","tensai14") or die("Couldn't Connect.");
<<<<<<< HEAD

=======
>>>>>>> 8d6d0b7bc28bb4f7b4cbc9540c9aa8f730f2620f

$db = @mysql_select_db($db_name, $connection) or die("Couldn't select database.");

?>