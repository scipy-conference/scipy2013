<?php

//$requested_page = $_SERVER[REQUEST_URI];
//===============================================
//  USER AUTHORIZATION                         //
//===============================================
session_start();
if(!isset($_SESSION['formregusername'])){

$_SESSION['requested_page'] = $_SERVER[REQUEST_URI];
header("location:registered_login.php");
}

//===============================================
// IF SUCCESSFUL PAGE CONTENT                  //
//===============================================


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

include('inc/db_conn.php');

// add registered user info here

$username = $_SESSION['formregusername'];

$sql = "SELECT clients.id ";
$sql .= "FROM clients "; 
$sql .= "WHERE username= \"$username\"";
//$sql .= "AND conference_id = 2";

$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) {

$id=$row['id'];
}

$subject = htmlentities($_POST['subject']);
$coordinator = htmlentities($_POST['coordinator']);
$content = htmlentities($_POST['content']);
$email = htmlentities($_POST['email']);


$sql ="INSERT INTO open_agendas ";
$sql .="(subject, ";
$sql .="coordinator, ";
$sql .="content, ";
$sql .="email, ";
$sql .="conference_id, ";
$sql .="type, ";
$sql .="created_by, ";
$sql .="updated_by, ";
$sql .="created_at, ";
$sql .="updated_at) ";
$sql .="VALUES ";
$sql .="(\"$subject\", ";
$sql .="\"$coordinator\", ";
$sql .="\"$content\", ";
$sql .="\"$email\", ";
$sql .="2, ";
$sql .="\"sprint\", ";
$sql .="\"$id\", ";
$sql .="\"$id\", ";
$sql .="NOW(), ";
$sql .="NOW())";

$result = @mysql_query($sql, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

?>

<!DOCTYPE html>
<html>
<?php $thisPage="Sprints"; ?>
<head>
<?php include_once "inc/markdown.php"; ?>
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
<h1>Sprint Submission Form</h1>

<p>Thank you for your submission. The following information has been recorded.</p>

<p><span class="data_field">Subject:</span> <?php echo $subject ?></p>
<p><span class="data_field">Coordinator:</span> <?php echo $coordinator ?></p>
<p><span class="data_field">Description:</span> <?php echo Markdown($content) ?></p>
<p><span class="data_field">email:</span> <?php echo $email ?></p>
missing data: <?php echo $_SESSION['formregusername'].", ".$username ?>
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
	
	$('#content').wordCount();
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
<h1>Sprint Suggestion</h1>

<form method="post" name="PaymentInfo" action="<?php echo $SERVER['SCRIPT_NAME'] ?>">

<div id="instructions">
<p>You just have to let us know a title and brief description of the sprint.</p>

<p>Program chairs: Peter Wang &amp; Corran Webster</p>
</div>

<div class="row">
  <div class="cell" style="width: 20%;">
    <label for="subject">Sprint Subject:<?php print_error('subject', $errors) ?></label> 
  </div>
  <div class="cell" style="width: 65%;">
    <input type="text" name="subject" id="subject" value="<?php echo $defaults['subject'] ?>" style="width: 100%;"/>
  </div>
</div>

<div class="row">

<div class="row">
  <div class="cell" style="width: 20%;">
    <span class="form_tips"><label for="content">Sprint Summary:<?php print_error('content', $errors) ?><br /><span class="other_form_tips">~150 words</span></label></span> 
  </div>
  <div class="cell" style="width: 65%;">
    <textarea id="content" name="content" rows="5"><?php echo $defaults['content'] ?></textarea>
    <p><span class="other_form_tips">Word Count : <span id="display_count">0</span></span></p>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 20%;">
    <label for="coordinator">Suggested by(s):<?php print_error('coordinator', $errors) ?></label>
  </div>
  <div class="cell" style="width: 65%;">
    <input type="text" name="coordinator" id="coordinator" value="<?php echo $defaults['coordinator'] ?>" style="width: 100%;"/>
  </div>
</div>

<div class="row">
  <div class="cell" style="width: 20%;">
    <label for="author">Contact Email(s):<?php print_error('email', $errors) ?></label>
  </div>
  <div class="cell" style="width: 65%;">
    <input type="text" name="email" id="email" value="<?php echo $defaults['email'] ?>" style="width: 100%;"/>
  </div>
</div>

<div align="center">
<input type="submit" name="submit" value="Suggest Sprint">
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
    if (! (isset($_POST['subject']) && (strlen($_POST['subject']) > 1))) {
        $errors['subject'] = '<< Enter Subject >>';
    }

    // author is required and must be at least 2 characters
    if (! (isset($_POST['coordinator']) && (strlen($_POST['coordinator']) > 1))) {
        $errors['coordinator'] = '<< Enter Name >>';
    }


    // description is required and must be at least 2 characters
    if (! (isset($_POST['content']) && (strlen($_POST['content']) > 1))) {
        $errors['content'] = '<< Enter Summary >>';
    }


    // email is required and must be at least 2 characters
    if (! (isset($_POST['email']) && (strlen($_POST['email']) > 1))) {
        $errors['email'] = '<< Enter email >>';
    }



    return $errors;


}


?>