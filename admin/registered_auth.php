<?php

//$error = $_POST['error'];
$error0 = "The information entered was not valid, please try again. Fields are case sensitive.";
$error1 = "The username entered was not valid, please try again. Fields are case sensitive.";
$requested_page = $_SESSION['requested_page'];


// Connect to server and select databse.
include('../inc/db_conn.php');

$submit = $_POST['submit'];

if ($submit == "Login") 

{

if ("none_required"=="none_required") {

$tbl_name = "clients";

// username and password sent from form 
$formusername=$_POST['username']; 
$formpassword=sha1($_POST['password']);


// To protect MySQL injection (more detail about MySQL injection)
$formusername = stripslashes($formusername);
$formpassword = stripslashes($formpassword);

$formusername = mysql_real_escape_string($formusername);
$formpassword = mysql_real_escape_string($formpassword);

// Search for user credentials
$sql = "SELECT clients.id, ";
$sql .= "username ";
$sql .= "FROM clients "; 
$sql .= "LEFT JOIN participants ";
$sql .= "ON clients.id = client_id ";
$sql .= "LEFT JOIN registrations ";
$sql .= "ON participants.id = participant_id ";
$sql .= "WHERE username='$formusername' ";
$sql .= "AND pwd ='$formpassword' ";
$sql .= "AND conference_id = 2";

$result=mysql_query($sql);

while ($row = mysql_fetch_array($result)) {

$id=$row['id'];
$username=$row['username'];
}

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row


if($count==1){
// Register $formusername, $formpassword
session_start();
$_SESSION['validate'] = "validated";
$_SESSION['formregusername'] = $formusername;
$_SESSION['formregpassword"'] = $formpassword;
setcookie("reg_username",$username,0);

$sql_update ="UPDATE $tbl_name SET last_login=NOW() WHERE id=\"$id\"";

$result_update = @mysql_query($sql_update, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

// and redirect to appropriate page
	if ($_SESSION['requested_page'] != "") 
	{
	$requested_page = $_SESSION['requested_page'];
	header("Location:$requested_page");
	}
	else
	{
	header("Location:../index.php");
	}
}


else
{

session_start();

$_SESSION['errormessage'] = $error0;

header("location:../registered_login.php");

}
}

} 

elseif ($submit == "Create") 

{
if ("none_required"=="none_required") {

// username and password sent from form 
$formusername=$_POST['username']; 
$formpassword=sha1($_POST['password']);


// To protect MySQL injection (more detail about MySQL injection)
$formusername = stripslashes($formusername);
$formpassword = stripslashes($formpassword);

$formusername = mysql_real_escape_string($formusername);
$formpassword = mysql_real_escape_string($formpassword);

// Search for user credentials
$sql_0 = "SELECT clients.id, ";
$sql_0 .= "username ";
$sql_0 .= "FROM clients "; 
$sql_0 .= "LEFT JOIN participants ";
$sql_0 .= "ON clients.id = client_id ";
$sql_0 .= "LEFT JOIN registrations ";
$sql_0 .= "ON participants.id = participant_id ";
$sql_0 .= "WHERE username='$formusername' ";
$sql_0 .= "AND conference_id = 2";

$result_0 = mysql_query($sql_0);
while ($row = mysql_fetch_array($result_0)) {

$id = $row['id'];
$username = $row['username'];
}

// Mysql_num_row is counting table row
$count=mysql_num_rows($result_0);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $formusername, $formpassword

// Update user credentials
$sql="UPDATE clients SET pwd ='$formpassword' WHERE username='$formusername'";
$result=mysql_query($sql);

session_start();
$_SESSION['validate'] = "validated";
$_SESSION['formregusername'] = $formusername;
$_SESSION['formregpassword"'] = $formpassword;
setcookie("reg_username",$username,0);

$sql_update ="UPDATE clients SET last_login=NOW() WHERE id=\"$id\"";

$result_update = @mysql_query($sql_update, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

// and redirect to appropriate page
	if ($_SESSION['requested_page'] != "") 
	{
	$requested_page = $_SESSION['requested_page'];
	header("Location:$requested_page");
	}
	else
	{
	header("Location:../index.php");
	}

}

else
{

session_start();
$_SESSION['errormessage'] = $error1;

header("location:../create_account.php");

}
}

}
?>