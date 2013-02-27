<?php

$countries = array('' => 'choose', 'us' => 'United States', 'af' => 'Afghanistan', 'al' => 'Albania', 'dz' => 'Algeria', 'as' => 'American Samoa (US)', 'ad' => 'Andorra', 'ao' => 'Angola', 'ai' => 'Anguilla (UK)', 'ag' => 'Antigua and Barbuda', 'ar' => 'Argentina', 'am' => 'Armenia', 'aw' => 'Aruba', 'au' => 'Australia', 'at' => 'Austria', 'az' => 'Azerbaijan', 'bs' => 'Bahamas', 'bh' => 'Bahrain', 'bd' => 'Bangladesh', 'bb' => 'Barbados', 'by' => 'Belarus', 'be' => 'Belgium', 'bz' => 'Belize', 'bj' => 'Benin', 'bm' => 'Bermuda (UK)', 'bt' => 'Bhutan', 'bo' => 'Bolivia', 'ba' => 'Bosnia and Herzegovina', 'bw' => 'Botswana', 'br' => 'Brazil', 'vg' => 'British Virgin Islands (UK)', 'bn' => 'Brunei Darussalam', 'bg' => 'Bulgaria', 'bf' => 'Burkina Faso', 'mm' => 'Burma', 'bi' => 'Burundi', 'kh' => 'Cambodia', 'cm' => 'Cameroon', 'ca' => 'Canada', 'cv' => 'Cape Verde', 'ky' => 'Cayman Islands (UK)', 'cf' => 'Central African Republic', 'td' => 'Chad', 'cl' => 'Chile', 'cn' => 'China', 'cx' => 'Christmas Island (AU)', 'cc' => 'Cocos (Keeling) Islands (AU)', 'co' => 'Colombia', 'km' => 'Comoros', 'cd' => 'Congo, Democratic Republic of the', 'cg' => 'Congo, Republic of the', 'ck' => 'Cook Islands (NZ)', 'cr' => 'Costa Rica', 'ci' => 'Cote d\'Ivoire', 'hr' => 'Croatia', 'cu' => 'Cuba', 'cy' => 'Cyprus', 'cz' => 'Czech Republic', 'dk' => 'Denmark', 'dj' => 'Djibouti', 'dm' => 'Dominica', 'do' => 'Dominican Republic', 'tp' => 'East Timor', 'ec' => 'Ecuador', 'eg' => 'Egypt', 'sv' => 'El Salvador', 'gq' => 'Equatorial Guinea', 'er' => 'Eritrea', 'ee' => 'Estonia', 'et' => 'Ethiopia', 'fk' => 'Falkland Islands (UK)', 'fo' => 'Faroe Islands (DK)', 'fj' => 'Fiji', 'fi' => 'Finland', 'fr' => 'France', 'gf' => 'French Guiana (FR)', 'pf' => 'French Polynesia (FR)', 'ga' => 'Gabon', 'gm' => 'Gambia', 'ge' => 'Georgia', 'de' => 'Germany', 'gh' => 'Ghana', 'gi' => 'Gibraltar (UK)', 'gr' => 'Greece', 'gl' => 'Greenland (DK)', 'gd' => 'Grenada', 'gp' => 'Guadeloupe (FR)', 'gu' => 'Guam (US)', 'gt' => 'Guatemala', 'gn' => 'Guinea', 'gw' => 'Guinea-Bissau', 'gy' => 'Guyana', 'ht' => 'Haiti', 'va' => 'Holy See (Vatican City)', 'hn' => 'Honduras', 'hk' => 'Hong Kong (CN)', 'hu' => 'Hungary', 'is' => 'Iceland', 'in' => 'India', 'id' => 'Indonesia', 'ir' => 'Iran', 'iq' => 'Iraq', 'ie' => 'Ireland', 'il' => 'Israel', 'it' => 'Italy', 'jm' => 'Jamaica', 'jp' => 'Japan', 'jo' => 'Jordan', 'kz' => 'Kazakstan', 'ke' => 'Kenya', 'ki' => 'Kiribati', 'kp' => 'Korea, Democratic People\'s Republic (North)', 'kr' => 'Korea, Republic of (South)', 'kw' => 'Kuwait', 'kg' => 'Kyrgyzstan', 'la' => 'Laos', 'lv' => 'Latvia', 'lb' => 'Lebanon', 'ls' => 'Lesotho', 'lr' => 'Liberia', 'ly' => 'Libya', 'li' => 'Liechtenstein', 'lt' => 'Lithuania', 'lu' => 'Luxembourg', 'mo' => 'Macau (CN)', 'mk' => 'Macedonia', 'mg' => 'Madagascar', 'mw' => 'Malawi', 'my' => 'Malaysia', 'mv' => 'Maldives', 'ml' => 'Mali', 'mt' => 'Malta', 'mh' => 'Marshall islands', 'mq' => 'Martinique (FR)', 'mr' => 'Mauritania', 'mu' => 'Mauritius', 'yt' => 'Mayotte (FR)', 'mx' => 'Mexico', 'fm' => 'Micronesia, Federated States of', 'md' => 'Moldova', 'mc' => 'Monaco', 'mn' => 'Mongolia', 'ms' => 'Montserrat (UK)', 'ma' => 'Morocco', 'mz' => 'Mozambique', 'na' => 'Namibia', 'nr' => 'Nauru', 'np' => 'Nepal', 'nl' => 'Netherlands', 'an' => 'Netherlands Antilles (NL)', 'nc' => 'New Caledonia (FR)', 'nz' => 'New Zealand', 'ni' => 'Nicaragua', 'ne' => 'Niger', 'ng' => 'Nigeria', 'nu' => 'Niue', 'nf' => 'Norfolk Island (AU)', 'mp' => 'Northern Mariana Islands (US)', 'no' => 'Norway', 'om' => 'Oman', 'pk' => 'Pakistan', 'pw' => 'Palau', 'pa' => 'Panama', 'pg' => 'Papua New Guinea', 'py' => 'Paraguay', 'pe' => 'Peru', 'ph' => 'Philippines', 'pn' => 'Pitcairn Islands (UK)', 'pl' => 'Poland', 'pt' => 'Portugal', 'pr' => 'Puerto Rico (US)', 'qa' => 'Qatar', 're' => 'Reunion (FR)', 'ro' => 'Romania', 'ru' => 'Russia', 'rw' => 'Rwanda', 'sh' => 'Saint Helena (UK)', 'kn' => 'Saint Kitts and Nevis', 'lc' => 'Saint Lucia', 'pm' => 'Saint Pierre and Miquelon (FR)', 'vc' => 'Saint Vincent and the Grenadines', 'ws' => 'Samoa', 'sm' => 'San Marino', 'st' => 'Sao Tome and Principe', 'sa' => 'Saudi Arabia', 'sn' => 'Senegal', 'yu' => 'Serbia and Montenegro', 'sc' => 'Seychelles', 'sl' => 'Sierra Leone', 'sg' => 'Singapore', 'sk' => 'Slovakia', 'si' => 'Slovenia', 'sb' => 'Solomon Islands', 'so' => 'Somalia', 'za' => 'South Africa', 'gs' => 'South Georgia & South Sandwich Islands (UK)', 'es' => 'Spain', 'lk' => 'Sri Lanka', 'sd' => 'Sudan', 'sr' => 'Suriname', 'sz' => 'Swaziland', 'se' => 'Sweden', 'ch' => 'Switzerland', 'sy' => 'Syria', 'tw' => 'Taiwan', 'tj' => 'Tajikistan', 'tz' => 'Tanzania', 'th' => 'Thailand', 'tg' => 'Togo', 'tk' => 'Tokelau', 'to' => 'Tonga', 'tt' => 'Trinidad and Tobago', 'tn' => 'Tunisia', 'tr' => 'Turkey', 'tm' => 'Turkmenistan', 'tc' => 'Turks and Caicos Islands (UK)', 'tv' => 'Tuvalu', 'ug' => 'Uganda', 'ua' => 'Ukraine', 'ae' => 'United Arab Emirates', 'gb' => 'United Kingdom', 'uy' => 'Uruguay', 'uz' => 'Uzbekistan', 'vu' => 'Vanuatu', 've' => 'Venezuela', 'vn' => 'Vietnam', 'vg' => 'British Virgin Islands (UK)', 'wf' => 'Wallis and Futuna (FR)', 'eh' => 'Western Sahara', 'ye' => 'Yemen', 'zm' => 'Zambia', 'zw' => 'Zimbabwe');
$nomination_types = array('' => 'choose', 'Self' => 'Self Nomination', 'Peer' => 'Peer Nomination', 'Advisor' => 'Advisor Nomination');
$org_types = array('' => 'choose', 'University' => 'University', 'Government' => 'Government', 'Industry' => 'Industry', 'Open Source Project' => 'Open Source Project',  'Other' => 'Other');


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

$first_name = htmlentities(ucwords($_POST['first_name']));
$last_name = htmlentities(ucwords($_POST['last_name']));
$org_type = htmlentities(ucwords($_POST['org_type']));
$org_name = htmlentities(ucwords($_POST['org_name']));
$email = htmlentities($_POST['email']);
$residence_country = htmlentities(strtoupper($_POST['residence_country']));
$citizenship_country = htmlentities(strtoupper($_POST['citizenship_country']));
$nomination_type = htmlentities($_POST['nomination_type']);
$nominators_name = htmlentities($_POST['nominators_name']);
$nominators_email = htmlentities($_POST['nominators_email']);
$contributions = htmlentities($_POST['word_count']);
$level_of_need = htmlentities($_POST['level_of_need']);

$sql ="INSERT INTO sponsorship_requests ";
$sql .="(first_name, ";
$sql .="last_name, ";
$sql .="org_type, ";
$sql .="org_name, ";
$sql .="email, ";
$sql .="residence_country, ";
$sql .="citizenship_country, ";
$sql .="nomination_type, ";
$sql .="nominators_name, ";
$sql .="nominators_email, ";
$sql .="contributions, ";
$sql .="level_of_need, ";
$sql .="date_submitted) ";
$sql .="VALUES ";
$sql .="(\"$first_name\", ";
$sql .="\"$last_name\", ";
$sql .="\"$org_type\", ";
$sql .="\"$org_name\", ";
$sql .="\"$email\", ";
$sql .="\"$residence_country\", ";
$sql .="\"$citizenship_country\", ";
$sql .="\"$nomination_type\", ";
$sql .="\"$nominators_name\", ";
$sql .="\"$nominators_email\", ";
$sql .="\"$contributions\", ";
$sql .="\"$level_of_need\", ";
$sql .="NOW())";

$result = @mysql_query($sql, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());


$to = $email;
$subject = "SciPy 2013 Sponsorship Request Received";
$message = "Thank you for your SciPy 2013 sponsorship request. The following information has been submitted.<br />

<h2>Contact Information</h2>
Name: " . $first_name . " " . $last_name ." - " . $email . "<br />
Oganization: " . $org_name . "<br />
Country of Residence: " . $residence_country . " | Country of Citizenship: " .  $citizenship_country . "

<h2>Nomination Information</h2>
<p>Type: " . $nomination_type . "<br />";

if ($nominators_name != "")
  {
    $message .= "Nominator: " . $nominators_name . " - " . $nominators_email;
  }

$message .= "<br />

<h2>Community Contribution</h2>

" . nl2br($contributions) ;

$message .= "<br />

<h2>Description of Need</h2>

" . nl2br($level_of_need) ;

$headers = "From: scipy-organizers@scipy.org \nCc: $nominators_email \nContent-Type: text/html; charset=iso-8859-1";
        
mail("$to", "$subject", "$message", "$headers");



?>

<!DOCTYPE html>
<html>
<?php $thisPage="Financial Assistance"; ?>
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

<p>Thank You. The following information has been submitted.</p>

<h2>Contact Information</h2>
<p>Name: <?php echo "$first_name $last_name - $email" ?><br />
Organization: <?php echo "$org_name" ?><br />
Country of Residence: <?php echo "$residence_country" ?> | Country of Citizenship: <?php echo "$citizenship_country" ?></p>

<h2>Nomination Information</h2>
<p>Type: <?php echo "$nomination_type" ?><br />
<?php 
if ($nominators_name != "")
  {
    echo "Nominator: $nominators_name - $nominators_email";
  }
?></p>

<h2>Community Contribution</h2>

<?php echo nl2br("$contributions") ?>

<h2>Description of Need</h2>

<?php echo nl2br("$level_of_need") ?>



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
    global $countries;
    global $nomination_types;
    global $org_types;

    // Set up defaults
    $defaults['firstname'] = isset($_POST['firstname']) ? htmlentities($_POST['firstname']) : '';
    $defaults['lastname'] = isset($_POST['lastname']) ? htmlentities($_POST['lastname']) : '';


?>

<!DOCTYPE html>
<html>
<?php $thisPage="Financial Aid"; ?>
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

<h1>Financial Assistance</h1>

<p>SciPy 2013 will continue the tradition of offering sponsorships to attend the conference.  These sponsorships provide funding for airfare, lodging, and conference registration.  Unlike in previous years, these sponsorships will be open to community members rather than just students.</p>

<p>This year, applications will be judged both on merit as well as need.  Although all attendees are eligible for sponsorships, we encourage applicants to consider their level of need before applying, such as whether their institution is covering some or all of their travel costs.  As funds are limited, our goal is to bring together as many SciPy community members as possible.  If only partial sponsorship is required, please indicate this in the application and we may be able to accommodate additional applicants due to such reasonable requests.</p>

<p>If you would like to apply for yourself or a worthy candidate, please note our application due date of Monday, March 25th.  Winners will be announced on April 22nd.</p>

<p>Good luck!</p>

<p>The SciPy 2013 Team</p>
<hr />
<p>* = Required</p>
<form id="formID" class="formular" method="post" action="<?php echo $SERVER['SCRIPT_NAME'] ?>">

<h2>Contact Information</h2>
<table>
  <tr>
    <td class="no_brder"><label for="">* First Name</label><br /><input class="validate[required] text-input" type='text' id='first_name' name='first_name' value=''></td>
    <td class="no_brder"><label for="">* Last Name</label><br /><input class="validate[required] text-input" type='text' id='last_name' name='last_name' value=''></td>
  </tr>
  <tr>
    <td class="no_brder"><label for="">* Organization Type</label><br />
        <select id="org_type" name="org_type" size="1" style="width:150px" class="validate[required]">
            <?php foreach ($org_types as $key => $org_type) {
            echo "<option value=\"$key\">$org_type</option>";
            } ?></select>
    </td>
    <td class="no_brder"><label for="">* Organization name</label><br /><input class="validate[required] text-input" type='text' id='org_name' name='org_name' value=''></td>
  </tr>
  <tr>
    <td class="no_brder"><label for="">* Email</label><br /><input class="validate[required] text-input" type='text' id='email' name='email' value=''></td>
    <td class="no_brder"><label for="">* Country of Residence</label><br />
        <select id="residence" name="residence_country" size="1" style="width:150px" class="validate[required]">
            <?php foreach ($countries as $key => $residence_country) {
            echo "<option value=\"$key\">$residence_country</option>";
            } ?></select>
    </td>
      <td class="no_brder"><label for="">* Country of Citizenship</label><br />
        <select id="citizen" name="citizenship_country" size="1" style="width:150px" class="validate[required]">
            <?php foreach ($countries as $key => $citizenship_country) {
            echo "<option value=\"$key\">$citizenship_country</option>";
            } ?></select>
    </td>
  </tr>
</table>

<br />
<br />

<h2>Nomination Information</h2>

<table  class="form indent" width="600">
    <tr>
            <td class="no_brder"><label for="">Nomination Type</label><br />
        <select class="validate[required]" id="nomination_type" name="nomination_type" size="1" style="width:150px">
            <?php foreach ($nomination_types as $key => $nomination_type) {
            echo "<option value=\"$key\">$nomination_type</option>";
            } ?></select><br /><span class="other_form_tips">Choose whether you are making this request for yourself, a peer, or a student which you advise</span>
    </td>
        <td class="no_brder"><label for="">Nominator's Name</label><br /><input type='text' id='nominators_name' name='nominators_name' value=''><br /><span class="other_form_tips">If not self-nomination</span></td>
        <td class="no_brder"><label for="">Nominator's Email</label><br /><input type='text'  id='nominators_email' name='nominators_email' value=''><br /><span class="other_form_tips">If not self-nomination</span></td>
    </tr>
</table>

<br />
<br />

<h2>Community Contribution</h2>

<p>* Briefly describe the applicant's recent contributions to the Scientific Python community</p>

<textarea class="validate[required]" id="word_count" name="word_count" rows="10"></textarea>

<p class="other_form_tips">Responses should target 250-500 words in length. reStructuredText is allowed.<br />
Word Count : <span id="display_count">0</span></p>

<h2>Description of Need</h2>

<p>* Briefly describe the applicant's level of need</p>

<textarea class="validate[required]" id="level_of_need" name="level_of_need" rows="5"></textarea>

<div align="center">
  <input type="submit" name="submit" value="Submit"/>
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
    global $countries;
    global $nomination_types;
    global $org_types;
    
    // Start out with no errors
    $errors = array();

    return $errors;

}

?>