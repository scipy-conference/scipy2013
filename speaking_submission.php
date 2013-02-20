<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Just display the form if the request is a GET
    display_form(array());
} else {
    // The request is a POST, so validate the form
    $errors = validate_form();
    if (count($errors)) {
        // If there were errors, redisplay the form with the errors
        display_form($errors);
    } else {
        // The form data was valid, so update database and display success page

$title = htmlentities($_POST['title']);
$author = htmlentities($_POST['author']);
$bio = htmlentities($_POST['bio']);
$email = htmlentities($_POST['email']);
$description = htmlentities($_POST['word_count']);
$presentation_preference = htmlentities($_POST['presentation_preference']);
$submission_references = htmlentities($_POST['submission_references']);
$main_track = htmlentities($_POST['main_track']);
$specific_session = htmlentities($_POST['specific_session']);

include('inc/db_conn.php');

$sql ="INSERT INTO talk_submissions ";
$sql .="(title, ";
$sql .="author, ";
$sql .="bio, ";
$sql .="email, ";
$sql .="presentation_preference, ";
$sql .="description, ";
$sql .="submission_references, ";
$sql .="main_track, ";
$sql .="specific_session, ";
$sql .="date_submitted) ";
$sql .="VALUES ";
$sql .="(\"$title\", ";
$sql .="\"$author\", ";
$sql .="\"$bio\", ";
$sql .="\"$email\", ";
$sql .="\"$presentation_preference\", ";
$sql .="\"$description\", ";
$sql .="\"$submission_references\", ";
$sql .="\"$main_track\", ";
$sql .="\"$specific_session\", ";
$sql .="NOW())";

$result = @mysql_query($sql, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

if ($presentation_preference == 'both') {$presentation_preference = "Talk and Poster";}
if ($main_track == 'general') {$main_track = "General";}
if ($main_track == 'ml') {$main_track = "Machine Learning";}
if ($main_track == 'tfr') {$main_track = "Tools for reproducibility";}
if ($main_track == 'none') {$main_track = "None, only to a domain symposia";}

if ($specific_session == 'none') {$specific_session = "None only submit to tracks";}
if ($specific_session == 'bioinfo') {$specific_session = "Bioinformatics";}
if ($specific_session == 'meteorology') {$specific_session = "Meteorology, climatology and oceanic science";}
if ($specific_session == 'astronomy') {$specific_session = "Astronomy and astrophysics";}
if ($specific_session == 'geophysics') {$specific_session = "GeoMedical imagingphysics";}


?>

<!DOCTYPE html>
<html>
<?php $thisPage="Speaking"; ?>
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
<h1>Talk Submission Form</h1>

<p>Thank you for your submission. The following information has been recorded.</p>

<p>Title: <span class="bold"><?php echo $title ?></span></p>
<p>Author: <span class="bold"><?php echo $author ?></span></p>
<p>Bio: <span class="bold"><?php echo $bio ?></span></p>
<p>email: <span class="bold"><?php echo $email ?></span></p>
<p>Description: <span class="bold"><?php echo $description ?></span></p>
<p>Consider for: <span class="bold"><?php echo ucfirst($presentation_preference) ?></span></p>
<p>submission_references?: <span class="bold"><?php echo $submission_references ?></span></p>
<p>Main Track: <span class="bold"><?php echo ucfirst($main_track) ?></span></p>
<p>Specific Session: <span class="bold"><?php echo $specific_session ?></span></p>


</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>

<?php
            }
}

function display_form($errors) {

  $defaults['title'] = isset($_POST['title']) ? htmlentities($_POST['title']) : '';
  $defaults['author'] = isset($_POST['author']) ? htmlentities($_POST['author']) : '';
  $defaults['email'] = isset($_POST['email']) ? htmlentities($_POST['email']) : '';
  $defaults['bio'] = isset($_POST['bio']) ? htmlentities($_POST['bio']) : '';
  $defaults['word_count'] = isset($_POST['word_count']) ? htmlentities($_POST['word_count']) : '';
  $defaults['submission_references'] = isset($_POST['submission_references']) ? htmlentities($_POST['submission_references']) : '';
  $defaults['main_track'] = isset($_POST['main_track']) ? htmlentities($_POST['main_track']) : '';
  $defaults['specific_session'] = isset($_POST['specific_session']) ? htmlentities($_POST['specific_session']) : '';

?>

<!DOCTYPE html>
<html>
<?php $thisPage="Talks"; ?>
<head>

<?php
//force redirect to secure page
//if($_SERVER['SERVER_PORT'] != '443') { header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); exit(); }
?>

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


<!--<script type="text/javascript" src="../inc/jquery.js"></script> -->
<script type="text/javascript" src="inc/jquery.wordcount.js"></script>
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
<h1>Talk / Poster Submission Form</h1>

<form method="post" name="PaymentInfo" action="<?php echo $SERVER['SCRIPT_NAME'] ?>">

<div id="instructions">
<p>Abstract submission template for SciPy 2013: The 12th Python in Science Conference, to be held in Austin, TX, June 24 - 29 2013.</p>

<p>Program chairs: Katy Huff &amp; Matt McCormick.</p>
</div>

<div class="row">
  <div class="cell" style="width: 25%;">
    <label for="title">Presentation Title:<?php print_error('title', $errors) ?></label> 
  </div>
  <div class="cell" style="width: 74%;">
    <input type="text" name="title" id="title" value="<?php echo $defaults['title'] ?>" style="width: 100%;"/>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 25%;">
    <label for="author">Author(s):<?php print_error('author', $errors) ?></label>
  </div>
  <div class="cell" style="width: 74%;">
    <input type="text" name="author" id="author" placeholder="last name, first name, organization; last name, first name, organization" value="<?php echo $defaults['author'] ?>" style="width: 100%;"/>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 25%;">
    <span class="form_tips"><label for="description">Bio(s):<?php print_error('bio', $errors) ?></label></span> 
  </div>
  <div class="cell" style="width: 74%;">
    <textarea id="bio" name="bio" rows="5"><?php echo $defaults['bio'] ?></textarea>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 25%;">
    <label for="author">Contact Email(s):<?php print_error('email', $errors) ?></label>
  </div>
  <div class="cell" style="width: 74%;">
    <input type="text" name="email" id="email" value="<?php echo $defaults['email'] ?>" style="width: 100%;"/>
  </div>
</div>


<div class="row">
<p>Below, include a 150-300 word abstract that concisely describes software
of interest to the SciPy community or how scientific Python was applied to solve a research
problem.</p>

<div class="row">
  <div class="cell" style="width: 25%;">
    <span class="form_tips"><label for="description">Talk Summary:<?php print_error('word_count', $errors) ?></label></span> 
  </div>
  <div class="cell" style="width: 74%;">
    <textarea id="word_count" name="word_count" rows="5"><?php echo $defaults['word_count'] ?></textarea>
    <p><span class="other_form_tips">Word Count : <span id="display_count">0</span></span></p>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 25%;">
    <span class="form_tips"><label for="description">Submission References:<?php print_error('submission_references', $errors) ?></label></span> 
  </div>
  <div class="cell" style="width: 74%;">
    <textarea id="submission_references" name="submission_references" rows="5" placeholder="Links to full papers, project websites, source code repositories, figures, and evidence of public speaking ability" ><?php echo $defaults['submission_references'] ?></textarea>
  </div>
</div>

<div class="row" style="margin-bottom: 2em;">
  <div class="cell" style="width: 25%;">
    <p>Submission Type:<?php print_error('presentation_preference', $errors) ?></p>
  </div>
  <div class="cell" style="width: 74%;">
    <input class="rb" name="presentation_preference" type="radio" value="both" <?php if ($defaults['presentation_preference'] == 'both') { echo "checked"; } ?> /> Talk or Poster.<br />
    <input class="rb" name="presentation_preference" type="radio" value="talk" <?php if ($defaults['presentation_preference'] == 'talk') { echo "checked"; } ?> /> Talk Only.<br />
    <input class="rb" name="presentation_preference" type="radio" value="poster" <?php if ($defaults['presentation_preference'] == 'poster') { echo "checked"; } ?> /> Poster Only.<br />
  </div>
</div>

<div class="row" style="margin-bottom: 2em;">
  <div class="cell" style="width: 25%;">
    <p>If talk would you like to submit to a Topic Track:<?php print_error('main_track', $errors) ?></p>
  </div>
  <div class="cell" style="width: 65%;">
    <input class="rb" name="main_track" type="radio" value="general" <?php if ($defaults['main_track'] == 'general') { echo "checked"; } ?> /> General<br />
    <input class="rb" name="main_track" type="radio" value="ml" <?php if ($defaults['main_track'] == 'ml') { echo "checked"; } ?> /> Machine Learning<br />
    <input class="rb" name="main_track" type="radio" value="tfr" <?php if ($defaults['main_track'] == 'tfr') { echo "checked"; } ?> /> Tools for reproducibility<br />
    <input class="rb" name="main_track" type="radio" value="none" <?php if ($defaults['main_track'] == 'none') { echo "checked"; } ?> /> None, only to a domain symposia<br />
  </div>
</div>

<div class="row" style="margin-bottom: 2em;">
  <div class="cell" style="width: 25%;">
    <p>Consider for one of the following domain symposia:<?php print_error('specific_session', $errors) ?></p>
  </div>
  <div class="cell" style="width: 65%;">
    <input class="rb" name="specific_session" type="radio" value="none" <?php if ($defaults['specific_session'] == 'none') { echo "checked"; } ?> /> None only submit to tracks<br />
    <input class="rb" name="specific_session" type="radio" value="medical_imaging" <?php if ($defaults['specific_session'] == 'medical_imaging') { echo "checked"; } ?> /> Medical imaging<br />
    <input class="rb" name="specific_session" type="radio" value="meteorology" <?php if ($defaults['specific_session'] == 'meteorology') { echo "checked"; } ?> /> Meteorology, climatology and oceanic science<br />
    <input class="rb" name="specific_session" type="radio" value="astronomy" <?php if ($defaults['specific_session'] == 'astronomy') { echo "checked"; } ?> /> Astronomy and astrophysics<br />
    <input class="rb" name="specific_session" type="radio" value="bioinformatics" <?php if ($defaults['specific_session'] == 'bioinformatics') { echo "checked"; } ?> /> Bioinformatics
  </div>
</div>

<p>Please note that this selection is simply a guideline for the program committee, and that talks may be scheduled in a different session than indicated.</p>

<div align="center">
<input type="submit" name="SubmitOrder" value="Submit Talk">
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


<?php }

// A helper function to make generating the HTML for an error message easier
function print_error($key, $errors) {
    if (isset($errors[$key])) {
        print "<br /><span class='error'>{$errors[$key]}</span>";
    }
}

function validate_form() {
    
    // Start out with no errors
    $errors = array();



    // title is required and must be at least 2 characters
    if (! (isset($_POST['title']) && (strlen($_POST['title']) > 1))) {
        $errors['title'] = '<< Enter Title >>';
    }

    // author is required and must be at least 2 characters
    if (! (isset($_POST['author']) && (strlen($_POST['author']) > 1))) {
        $errors['author'] = '<< Enter Name >>';
    }

    // bio is required and must be at least 2 characters
    if (! (isset($_POST['bio']) && (strlen($_POST['bio']) > 1))) {
        $errors['bio'] = '<< Enter Bio >>';
    }

    // description is required and must be at least 2 characters
    if (! (isset($_POST['word_count']) && (strlen($_POST['word_count']) > 1))) {
        $errors['word_count'] = '<< Enter Summary >>';
    }

    // submission_references is required and must be at least 2 characters
    if (! (isset($_POST['submission_references']) && (strlen($_POST['submission_references']) > 1))) {
        $errors['submission_references'] = '<< Enter References >>';
    }

    // email is required and must be at least 2 characters
    if (! (isset($_POST['email']) && (strlen($_POST['email']) > 1))) {
        $errors['email'] = '<< Enter email >>';
    }

    // presentation_preference is required
    if (! (isset($_POST['presentation_preference']) 
          && ($_POST['presentation_preference']) == 'talk' 
          || ($_POST['presentation_preference']) == 'poster' 
          || ($_POST['presentation_preference']) == 'both')) {
        $errors['presentation_preference'] = '<< Please check one >>';
    }

    // specific_session is required
    if (! (isset($_POST['main_track']) 
          && ($_POST['main_track']) == 'general' 
          || ($_POST['main_track']) == 'ml' 
          || ($_POST['main_track']) == 'tfr' 
          || ($_POST['main_track']) == 'none')) {
        $errors['main_track'] = '<< Please check one >>';
    }

    // specific_session is required
    if (! (isset($_POST['specific_session']) 
          && ($_POST['specific_session']) == 'none' 
          || ($_POST['specific_session']) == 'medical_imaging' 
          || ($_POST['specific_session']) == 'meteorology' 
          || ($_POST['specific_session']) == 'astronomy' 
          || ($_POST['specific_session']) == 'bioinformatics')) {
        $errors['specific_session'] = '<< Please check one >>';
    }

    return $errors;


}


?>