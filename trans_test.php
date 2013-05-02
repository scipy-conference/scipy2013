<?php

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

<h1>Transaction Test form</h1>

<form id="formID" class="formular" method="post" action="reg_p3.php">

<input type="hidden" name="tutorialamount" value="400" />
<input type="hidden" name="conferenceamount" value="300" />
<input type="hidden" name="sprintamount" value="0" />
<input type="hidden" name="billTo_email" value="jim@polarbeardesign.net" />
<input type="hidden" name="shipTo_firstName" value="James" />
<input type="hidden" name="shipTo_lastName" value="Ivanoff" />
<input type="hidden" name="affiliation" value="Polar Bear Design" />
<input type="hidden" name="shipTo_street1" value="2105 Plumbrook Dr" />
<input type="hidden" name="shipTo_street2" value="" />
<input type="hidden" name="shipTo_city" value="Austin" />
<input type="hidden" name="shipTo_state" value="TX" />
<input type="hidden" name="shipTo_postalCode" value="78746" />
<input type="hidden" name="shipTo_country" value="US" />
<input type="hidden" name="billTo_firstName" value="James" />
<input type="hidden" name="billTo_lastName" value="Ivanoff" />
<input type="hidden" name="billTo_street1" value="2105 Plumbrook Dr" />
<input type="hidden" name="billTo_street2" value="" />
<input type="hidden" name="billTo_city" value="Austin" />
<input type="hidden" name="billTo_state" value="TX" />
<input type="hidden" name="billTo_postalCode" value="78746" />
<input type="hidden" name="billTo_country" value="us" />
<input type="hidden" name="billTo_phoneNumber" value="5122725474" />
<input type="hidden" name="participant_type_id " value="1" />
<input type="hidden" name="conference_id" value="2" />
<input type="hidden" name="tshirt_type_id"  value="1" />
<input type="hidden" name="tshirt_size_id " value="4" />
<input type="hidden" name="ordernumber" value="44444444444" />
<input type="hidden" name="tutorials" value="on" />
<input type="hidden" name="conference" value="on" />
<input type="hidden" name="sprints" value="" />
<input type="hidden" name="promotion_id" value="" />
<input type="hidden" name="tutorial_0624_AM" value="100" />
<input type="hidden" name="tutorial_0624_PM" value="103" />
<input type="hidden" name="tutorial_0625_AM" value="106" />
<input type="hidden" name="tutorial_0625_PM" value="109" />
<input type="hidden" name="promotion_id" value="" />

<div align="center">
  <input type="submit" name="submit" value="next >>"/>
</div>


</form>

</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>