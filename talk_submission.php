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
$affiliation = htmlentities($_POST['affiliation']);
$email = htmlentities($_POST['email']);
$description = htmlentities($_POST['word_count']);
$presentation_preference = htmlentities($_POST['presentation_preference']);
$prepare_paper = htmlentities($_POST['prepare_paper']);
$main_track = htmlentities($_POST['main_track']);
$specific_session = htmlentities($_POST['specific_session']);

include('inc/db_conn.php');

$sql ="INSERT INTO talk_submissions ";
$sql .="(title, ";
$sql .="author, ";
$sql .="affiliation, ";
$sql .="email, ";
$sql .="description, ";
$sql .="presentation_preference, ";
$sql .="prepare_paper, ";
$sql .="main_track, ";
$sql .="specific_session, ";
$sql .="date_submitted) ";
$sql .="VALUES ";
$sql .="(\"$title\", ";
$sql .="\"$author\", ";
$sql .="\"$affiliation\", ";
$sql .="\"$email\", ";
$sql .="\"$description\", ";
$sql .="\"$presentation_preference\", ";
$sql .="\"$prepare_paper\", ";
$sql .="\"$main_track\", ";
$sql .="\"$specific_session\", ";
$sql .="NOW())";

$result = @mysql_query($sql, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

if ($presentation_preference == 'both') {$presentation_preference = "Talk and Poster";}
if ($main_track == 'hpc') {$main_track = "High Performance Computing with Python";}
if ($main_track == 'viz') {$main_track = "Visualization";}

if ($specific_session == 'bioinfo') {$specific_session = "Computational bioinformatics";}
if ($specific_session == 'meteorology') {$specific_session = "Meteorology and climatology";}
if ($specific_session == 'astronomy') {$specific_session = "Astronomy and astrophysics";}
if ($specific_session == 'geophysics') {$specific_session = "Geophysics";}

if ($prepare_paper == '1') {$prepare_paper = "Yes";}
if ($prepare_paper == '0') {$prepare_paper = "No";}

?>

<!DOCTYPE html>
<html>
<?php $thisPage="Talks"; ?>
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
<p>Affiliation: <span class="bold"><?php echo $affiliation ?></span></p>
<p>email: <span class="bold"><?php echo $email ?></span></p>
<p>Description: <span class="bold"><?php echo $description ?></span></p>
<p>Consider for: <span class="bold"><?php echo ucfirst($presentation_preference) ?></span></p>
<p>Prepare paper?: <span class="bold"><?php echo $prepare_paper ?></span></p>
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
  $defaults['affiliation'] = isset($_POST['affiliation']) ? htmlentities($_POST['affiliation']) : '';
  $defaults['word_count'] = isset($_POST['word_count']) ? htmlentities($_POST['word_count']) : '';
  $defaults['presentation_preference'] = isset($_POST['presentation_preference']) ? htmlentities($_POST['presentation_preference']) : '';
  $defaults['prepare_paper'] = isset($_POST['prepare_paper']) ? htmlentities($_POST['prepare_paper']) : '';
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
<h1>Talk Submission Form</h1>

<form method="post" name="PaymentInfo" action="<?php echo $SERVER['SCRIPT_NAME'] ?>">

<div id="instructions">
<p>Abstract submission template for SciPy 2013: The 12th Python in Science Conference, to be held in Austin, TX, June 24 - 29 2013.</p>

<p>Program chairs: Katy Huff &amp; Matt McCormick.</p>
</div>

<div class="row">
  <label for="title">Presentation Title:<?php print_error('title', $errors) ?></label> 
  <input type="text" name="title" id="title" size="80" value="<?php echo $defaults['title'] ?>" />
</div>

<div class="row">
  <label for="author">Author:<?php print_error('author', $errors) ?></label>
  <input type="text" name="author" id="author" size="30" value="<?php echo $defaults['author'] ?>" />
</div>

<div class="row">
  <label for="affiliation">Affiliation:</label>
  <input type="text" name="affiliation" id="affiliation" size="30" value="<?php echo $defaults['affiliation'] ?>" />
</div>

<div class="row">
  <label for="author">Email:<?php print_error('email', $errors) ?></label>
  <input type="text" name="email" id="email" size="30" value="<?php echo $defaults['email'] ?>" />
</div>

<div class="row">
<p>Here, include a talk summary of no longer than 500 words. Aspects such as
relevance to Python in science, applicability, and novelty will be considered
by the program committee.</p>

  <span class="form_tips"><label for="description">Talk Summary:<?php print_error('word_count', $errors) ?></label></span> 
  <textarea id="word_count" name="word_count" cols="80" rows="10"><?php echo $defaults['word_count'] ?></textarea>
<p><span class="other_form_tips">Word Count : <span id="display_count">0</span></span></p>
</div>

<div class="row">
<p>Please indicate your preference::<?php print_error('presentation_preference', $errors) ?></p>
<input class="rb" name="presentation_preference" type="radio" value="talk" <?php if ($defaults['presentation_preference'] == 'talk') { echo "checked"; } ?> /> Only consider this presentation for a talk.<br />
<input class="rb" name="presentation_preference" type="radio" value="poster" <?php if ($defaults['presentation_preference'] == 'poster') { echo "checked"; } ?> /> Only consider this presentation for a poster.<br />
<input class="rb" name="presentation_preference" type="radio" value="both" <?php if ($defaults['presentation_preference'] == 'both') { echo "checked"; } ?> /> Consider this presentation for either a talk or a poster.<br />
</div>

<div class="row">
<p>Please indicate whether you are willing to prepare an accompanying paper::<?php print_error('prepare_paper', $errors) ?></p>
<input class="rb" name="prepare_paper" type="radio" value="1" <?php if ($defaults['prepare_paper'] == '1') { echo "checked"; } ?> /> Yes<br />
<input class="rb" name="prepare_paper" type="radio" value="0" <?php if ($defaults['prepare_paper'] == '0') { echo "checked"; } ?> /> No
</div>

<div class="row">
<p>Optional: Indicate your preference for a specialized main track::</p>
<input class="rb" name="main_track" type="radio" value="hpc" <?php if ($defaults['main_track'] == 'ml') { echo "checked"; } ?> /> Machine Learning<br />
<input class="rb" name="main_track" type="radio" value="viz" <?php if ($defaults['main_track'] == 'rs') { echo "checked"; } ?> /> Reproducible Science
</div>

<div class="row">
<p>Or for one of the smaller domain-specific sessions::</p>
<input class="rb" name="specific_session" type="radio" value="meteorology" <?php if ($defaults['specific_session'] == 'meteorology') { echo "checked"; } ?> /> Meteorology, climatology and oceanic science<br />
<input class="rb" name="specific_session" type="radio" value="astronomy" <?php if ($defaults['specific_session'] == 'astronomy') { echo "checked"; } ?> /> Astronomy and astrophysics<br />
<input class="rb" name="specific_session" type="radio" value="medical_imaging" <?php if ($defaults['specific_session'] == 'bioinfo') { echo "checked"; } ?> /> Medical imaging<br />
<input class="rb" name="specific_session" type="radio" value="bioinformatics" <?php if ($defaults['specific_session'] == 'geophysics') { echo "checked"; } ?> /> Bioinformatics
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

    // description is required and must be at least 2 characters
    if (! (isset($_POST['word_count']) && (strlen($_POST['word_count']) > 1))) {
        $errors['word_count'] = '<< Enter Summary >>';
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

    // prepare_paper is required
    if (! (isset($_POST['prepare_paper']) 
          && ($_POST['prepare_paper']) == '1' 
          || ($_POST['prepare_paper']) == '0')) {
        $errors['prepare_paper'] = '<< Please check one >>';
    }

    return $errors;


}


?>