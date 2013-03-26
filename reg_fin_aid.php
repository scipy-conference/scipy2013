<?php

include('inc/db_conn.php');

//===========================
//  pull important dates : sponsorship acceptance, id = 6
//===========================

//$today = date("Y")."-".date("m")."-".date("d");

$sql_dates = "SELECT ";
$sql_dates .= "DATE_FORMAT(`impt_date`, '%M %D, %Y') as date_m ";
$sql_dates .= "FROM `important_dates`  ";
$sql_dates .= "WHERE id = 6";

$total_dates = @mysql_query($sql_dates, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($total_dates))
{

$date_m = $row['date_m'];

}

?>


<!DOCTYPE html>
<html>
<?php $thisPage="Financial Aid"; ?>
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

<h1>Financial Assistance</h1>

<p>The period of application for financial assistance is now closed. Thank you to all that have applied. We are in the process of reviewing the applications and will announce the recipients on <?php echo $date_m ?>.</p>

<p>The SciPy 2013 Team</p>
<hr />


</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>

<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

</body>

</html>
