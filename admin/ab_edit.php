<?php
//===============================================
//  USER AUTHORIZATION                         //
//===============================================
session_start();
if(!isset($_SESSION['formusername'])){
header("location:login.php");
}

//===============================================
// IF SUCCESSFUL PAGE CONTENT                  //
//===============================================

include('../inc/db_conn.php');

$id = $_GET['id'];

$row_1="odd";
$row_2="even";
$row_count=1;

//===========================
//  pull sponsorship requests
//===========================

$sql_submissions = "SELECT ";
$sql_submissions .= "id, ";
$sql_submissions .= "title, ";
$sql_submissions .= "author, ";
$sql_submissions .= "bio, ";
$sql_submissions .= "email, ";
$sql_submissions .= "description, ";
$sql_submissions .= "submission_references, ";
$sql_submissions .= "presentation_preference, ";
$sql_submissions .= "prepare_paper, ";
$sql_submissions .= "main_track, ";
$sql_submissions .= "specific_session, ";
$sql_submissions .= "DATE_FORMAT(date_submitted, '%b %d') AS date_submitted_f ";
$sql_submissions .= "FROM talk_submissions ";
$sql_submissions .= "WHERE id = \"$id\"";

$total_submissions = @mysql_query($sql_submissions, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_submissions = @mysql_num_rows($sql_submissions);

while ($row = mysql_fetch_array($total_submissions)) {

$title = $row['title'];
$author = $row['author'];
$bio = $row['bio'];
$email = $row['email'];
$description = $row['description'];
$submission_references = $row['submission_references'];
$presentation_preference = $row['presentation_preference'];
$prepare_paper = $row['prepare_paper'];
$main_track = $row['main_track'];
$specific_session = $row['specific_session'];
}


?>



<!DOCTYPE html>
<html>
<?php $thisPage="Admin"; ?>
<head>

<?php
//force redirect to secure page
//if($_SERVER['SERVER_PORT'] != '443') { header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); exit(); }
?>

        <link rel="stylesheet" href="../inc/validationEngine.jquery.css" type="text/css"/>
        <!-- <link rel="stylesheet" href="inc/template.css" type="text/css"/> -->
        <script src="../inc/jquery-1.6.min.js" type="text/javascript">
        </script>
        <script src="../inc/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
        </script>
        <script src="../inc/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
        </script>
        <script>
            jQuery(document).ready(function(){
                // binds form submission and fields to the validation engine
                jQuery("#formID").validationEngine();
            });
        </script>


<!--<script type="text/javascript" src="../inc/jquery.js"></script> -->
<script type="text/javascript" src="../inc/jquery.wordcount.js"></script>
<script type="text/javascript">
<!--//---------------------------------+
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use
// --------------------------------->
$(document).ready(function()
{
	
	$('#word_count').wordCount();
	//alternatively you can use the below method to display count in element with id word_counter  
	//$('#word_count').wordCount({counterElement:"word_counter"});

	
});
</script>

<?php @ require_once ("../inc/second_level_header.php"); ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />
</head>

<body>

<div id="container">

<?php include('../inc/admin_page_headers.php') ?>

<section id="sidebar">
  <?php include("../inc/sponsors.php") ?>
</section>

<section id="main-content">
<h1>Talk / Poster Submission Form</h1>

<form method="post" name="PaymentInfo" action="ab_update.php">

<div id="instructions">
<p>Abstract submission template for SciPy 2013: The 12th Python in Science Conference, to be held in Austin, TX, June 24 - 29 2013.</p>

<p>Program chairs: Katy Huff &amp; Matt McCormick.</p>
</div>

<div class="row">
  <div class="cell" style="width: 25%;">
    <label for="title">Presentation Title:</label> 
  </div>
  <div class="cell" style="width: 74%;">
    <input type="text" name="title" id="title" value="<?php echo $title ?>" style="width: 100%;"/>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 25%;">
    <label for="author">Author(s):</label>
  </div>
  <div class="cell" style="width: 74%;">
    <input type="text" name="author" id="author" placeholder="last name, first name, organization; last name, first name, organization" value="<?php echo $author ?>" style="width: 100%;"/>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 25%;">
    <span class="form_tips"><label for="description">Bio(s):</label></span> 
  </div>
  <div class="cell" style="width: 74%;">
    <textarea id="bio" name="bio" rows="5"><?php echo $bio ?></textarea>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 25%;">
    <label for="author">Contact Email(s):</label>
  </div>
  <div class="cell" style="width: 74%;">
    <input type="text" name="email" id="email" value="<?php echo $email ?>" style="width: 100%;"/>
  </div>
</div>


<div class="row">
<p>Below, include a 150-300 word abstract that concisely describes software
of interest to the SciPy community or how scientific Python was applied to solve a research
problem.</p>

<div class="row">
  <div class="cell" style="width: 25%;">
    <span class="form_tips"><label for="description">Talk Summary:</label></span> 
  </div>
  <div class="cell" style="width: 74%;">
    <textarea id="description" name="description" rows="5"><?php echo $description ?></textarea>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 25%;">
    <span class="form_tips"><label for="description">Submission References:</label></span> 
  </div>
  <div class="cell" style="width: 74%;">
    <textarea id="submission_references" name="submission_references" rows="5"><?php echo $submission_references ?></textarea>
  </div>
</div>

<div class="row" style="margin-bottom: 2em;">
  <div class="cell" style="width: 25%;">
    <p>Submission Type:</p>
  </div>
  <div class="cell" style="width: 74%;">
    <input class="rb" name="presentation_preference" type="radio" value="both" <?php if ($presentation_preference == 'both') { echo "checked"; } ?> /> Talk or Poster.<br />
    <input class="rb" name="presentation_preference" type="radio" value="talk" <?php if ($presentation_preference == 'talk') { echo "checked"; } ?> /> Talk Only.<br />
    <input class="rb" name="presentation_preference" type="radio" value="poster" <?php if ($presentation_preference == 'poster') { echo "checked"; } ?> /> Poster Only.<br />
  </div>
</div>

<div class="row" style="margin-bottom: 2em;">
  <div class="cell" style="width: 25%;">
    <p>If talk would you like to submit to a Topic Track:</p>
  </div>
  <div class="cell" style="width: 65%;">
    <input class="rb" name="main_track" type="radio" value="general" <?php if ($main_track == 'general') { echo "checked"; } ?> /> General<br />
    <input class="rb" name="main_track" type="radio" value="ml" <?php if ($main_track == 'ml') { echo "checked"; } ?> /> Machine Learning<br />
    <input class="rb" name="main_track" type="radio" value="tfr" <?php if ($main_track == 'tfr') { echo "checked"; } ?> /> Tools for reproducibility<br />
    <input class="rb" name="main_track" type="radio" value="none" <?php if ($main_track == 'none') { echo "checked"; } ?> /> None, only to a domain symposia<br />
  </div>
</div>

<div class="row" style="margin-bottom: 2em;">
  <div class="cell" style="width: 25%;">
    <p>Consider for one of the following domain symposia:</p>
  </div>
  <div class="cell" style="width: 65%;">
    <input class="rb" name="specific_session" type="radio" value="none" <?php if ($specific_session == 'none') { echo "checked"; } ?> /> None only submit to tracks<br />
    <input class="rb" name="specific_session" type="radio" value="medical_imaging" <?php if ($specific_session == 'medical_imaging') { echo "checked"; } ?> /> Medical imaging<br />
    <input class="rb" name="specific_session" type="radio" value="meteorology" <?php if ($specific_session == 'meteorology') { echo "checked"; } ?> /> Meteorology, climatology and oceanic science<br />
    <input class="rb" name="specific_session" type="radio" value="astronomy" <?php if ($specific_session == 'astronomy') { echo "checked"; } ?> /> Astronomy and astrophysics<br />
    <input class="rb" name="specific_session" type="radio" value="bioinformatics" <?php if ($specific_session == 'bioinformatics') { echo "checked"; } ?> /> Bioinformatics
  </div>
</div>
    <input name="id" type="hidden" value="<?php echo $id ?>" />

<p>Please note that this selection is simply a guideline for the program committee, and that talks may be scheduled in a different session than indicated.</p>

<div align="center">
<input type="submit" name="Update" value="Update">
</div>
</form>
</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>
