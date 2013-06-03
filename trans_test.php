<?php

// LIVE SITE
$db_name = "scipy";
if ($_SERVER['SERVER_NAME'] == "localhost")
{
  $connection = @mysql_connect("127.0.0.1","jri","tensai14") or die("Couldn't Connect.");
}
else
{
  $connection = @mysql_connect("127.0.0.1","jivanoff","tr4n5c3nd!!") or die("Couldn't Connect.");
}


$db = @mysql_select_db($db_name, $connection) or die("Couldn't select database.");

include('inc/tutorials.php');

?>
<!DOCTYPE html>
<html>
<?php $thisPage="Register"; ?>
<head>



        <link rel="stylesheet" href="inc/validationEngine.jquery.css" type="text/css"/>
        <!-- <link rel="stylesheet" href="inc/template.css" type="text/css"/> -->
        <script src="inc/jquery-1.6.min.js" type="text/javascript">
        </script>
        <script src="inc/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
        </script>
        <script src="inc/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
        </script>
        <script>
            jQuery(document).ready(function(){
                // binds form submission and fields to the validation engine
                jQuery("#formID").validationEngine();
            });
        </script>

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

<a name="tutorials"></a>
<p class="intra_page_nav"><a href="#top">[ back to top ]</a></p>
<table id="registrants_table">
<?php echo $display_tutorials ?>
</table>

</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>