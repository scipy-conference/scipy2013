<?php 
session_start();
$error = $_SESSION['errormessage'];

?>

<!DOCTYPE html>
<html>
<?php $thisPage=""; ?>
<head>

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

<h1>Create Account</h1>

<p>Logins are restricted to SciPy 2013 registered attendees. Your username is the email used to register.</p>

<p>If you wish to create an account prior to registering, or require assistance - please contact us at <a href="mailto:scipy-organizers@scipy.org">scipy-organizers@scipy.org</a>. (This helps us keep spam down!)</p>

    <form name="form1" method="post" action="admin/registered_auth.php">
        <table width="300" border="0" id="login">
            <tr> 
                <th colspan="2">Registered Login</th>
            </tr>
            <tr> 
                <td>User ID:</td>
                <td><input name="username" type="text" size=25 maxlength=255 /></td>
            </tr>
            <tr> 
                <td>Password:</td>
                <td><input name="password" type="password" size=25 maxlength=255 /></td>
            </tr>
            <tr> 
                <td>&nbsp;</td>
                <td> <input type="submit" name="submit" value="Create" /> </td>
            </tr>
            <?php if ($error != "") {
            echo "<tr><td colspan=\"2\"><div class=\"error\">$error</div></td></tr>";
            } ?>
        </table>
    </form>


</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>