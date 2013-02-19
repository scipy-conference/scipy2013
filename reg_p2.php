<?php

$countries = array('NONE' => '', 'us' => 'United States', 'af' => 'Afghanistan', 'al' => 'Albania', 'dz' => 'Algeria', 'as' => 'American Samoa (US)', 'ad' => 'Andorra', 'ao' => 'Angola', 'ai' => 'Anguilla (UK)', 'ag' => 'Antigua and Barbuda', 'ar' => 'Argentina', 'am' => 'Armenia', 'aw' => 'Aruba', 'au' => 'Australia', 'at' => 'Austria', 'az' => 'Azerbaijan', 'bs' => 'Bahamas', 'bh' => 'Bahrain', 'bd' => 'Bangladesh', 'bb' => 'Barbados', 'by' => 'Belarus', 'be' => 'Belgium', 'bz' => 'Belize', 'bj' => 'Benin', 'bm' => 'Bermuda (UK)', 'bt' => 'Bhutan', 'bo' => 'Bolivia', 'ba' => 'Bosnia and Herzegovina', 'bw' => 'Botswana', 'br' => 'Brazil', 'vg' => 'British Virgin Islands (UK)', 'bn' => 'Brunei Darussalam', 'bg' => 'Bulgaria', 'bf' => 'Burkina Faso', 'mm' => 'Burma', 'bi' => 'Burundi', 'kh' => 'Cambodia', 'cm' => 'Cameroon', 'ca' => 'Canada', 'cv' => 'Cape Verde', 'ky' => 'Cayman Islands (UK)', 'cf' => 'Central African Republic', 'td' => 'Chad', 'cl' => 'Chile', 'cn' => 'China', 'cx' => 'Christmas Island (AU)', 'cc' => 'Cocos (Keeling) Islands (AU)', 'co' => 'Colombia', 'km' => 'Comoros', 'cd' => 'Congo, Democratic Republic of the', 'cg' => 'Congo, Republic of the', 'ck' => 'Cook Islands (NZ)', 'cr' => 'Costa Rica', 'ci' => 'Cote d\'Ivoire', 'hr' => 'Croatia', 'cu' => 'Cuba', 'cy' => 'Cyprus', 'cz' => 'Czech Republic', 'dk' => 'Denmark', 'dj' => 'Djibouti', 'dm' => 'Dominica', 'do' => 'Dominican Republic', 'tp' => 'East Timor', 'ec' => 'Ecuador', 'eg' => 'Egypt', 'sv' => 'El Salvador', 'gq' => 'Equatorial Guinea', 'er' => 'Eritrea', 'ee' => 'Estonia', 'et' => 'Ethiopia', 'fk' => 'Falkland Islands (UK)', 'fo' => 'Faroe Islands (DK)', 'fj' => 'Fiji', 'fi' => 'Finland', 'fr' => 'France', 'gf' => 'French Guiana (FR)', 'pf' => 'French Polynesia (FR)', 'ga' => 'Gabon', 'gm' => 'Gambia', 'ge' => 'Georgia', 'de' => 'Germany', 'gh' => 'Ghana', 'gi' => 'Gibraltar (UK)', 'gr' => 'Greece', 'gl' => 'Greenland (DK)', 'gd' => 'Grenada', 'gp' => 'Guadeloupe (FR)', 'gu' => 'Guam (US)', 'gt' => 'Guatemala', 'gn' => 'Guinea', 'gw' => 'Guinea-Bissau', 'gy' => 'Guyana', 'ht' => 'Haiti', 'va' => 'Holy See (Vatican City)', 'hn' => 'Honduras', 'hk' => 'Hong Kong (CN)', 'hu' => 'Hungary', 'is' => 'Iceland', 'in' => 'India', 'id' => 'Indonesia', 'ir' => 'Iran', 'iq' => 'Iraq', 'ie' => 'Ireland', 'il' => 'Israel', 'it' => 'Italy', 'jm' => 'Jamaica', 'jp' => 'Japan', 'jo' => 'Jordan', 'kz' => 'Kazakstan', 'ke' => 'Kenya', 'ki' => 'Kiribati', 'kp' => 'Korea, Democratic People\'s Republic (North)', 'kr' => 'Korea, Republic of (South)', 'kw' => 'Kuwait', 'kg' => 'Kyrgyzstan', 'la' => 'Laos', 'lv' => 'Latvia', 'lb' => 'Lebanon', 'ls' => 'Lesotho', 'lr' => 'Liberia', 'ly' => 'Libya', 'li' => 'Liechtenstein', 'lt' => 'Lithuania', 'lu' => 'Luxembourg', 'mo' => 'Macau (CN)', 'mk' => 'Macedonia', 'mg' => 'Madagascar', 'mw' => 'Malawi', 'my' => 'Malaysia', 'mv' => 'Maldives', 'ml' => 'Mali', 'mt' => 'Malta', 'mh' => 'Marshall islands', 'mq' => 'Martinique (FR)', 'mr' => 'Mauritania', 'mu' => 'Mauritius', 'yt' => 'Mayotte (FR)', 'mx' => 'Mexico', 'fm' => 'Micronesia, Federated States of', 'md' => 'Moldova', 'mc' => 'Monaco', 'mn' => 'Mongolia', 'ms' => 'Montserrat (UK)', 'ma' => 'Morocco', 'mz' => 'Mozambique', 'na' => 'Namibia', 'nr' => 'Nauru', 'np' => 'Nepal', 'nl' => 'Netherlands', 'an' => 'Netherlands Antilles (NL)', 'nc' => 'New Caledonia (FR)', 'nz' => 'New Zealand', 'ni' => 'Nicaragua', 'ne' => 'Niger', 'ng' => 'Nigeria', 'nu' => 'Niue', 'nf' => 'Norfolk Island (AU)', 'mp' => 'Northern Mariana Islands (US)', 'no' => 'Norway', 'om' => 'Oman', 'pk' => 'Pakistan', 'pw' => 'Palau', 'pa' => 'Panama', 'pg' => 'Papua New Guinea', 'py' => 'Paraguay', 'pe' => 'Peru', 'ph' => 'Philippines', 'pn' => 'Pitcairn Islands (UK)', 'pl' => 'Poland', 'pt' => 'Portugal', 'pr' => 'Puerto Rico (US)', 'qa' => 'Qatar', 're' => 'Reunion (FR)', 'ro' => 'Romania', 'ru' => 'Russia', 'rw' => 'Rwanda', 'sh' => 'Saint Helena (UK)', 'kn' => 'Saint Kitts and Nevis', 'lc' => 'Saint Lucia', 'pm' => 'Saint Pierre and Miquelon (FR)', 'vc' => 'Saint Vincent and the Grenadines', 'ws' => 'Samoa', 'sm' => 'San Marino', 'st' => 'Sao Tome and Principe', 'sa' => 'Saudi Arabia', 'sn' => 'Senegal', 'yu' => 'Serbia and Montenegro', 'sc' => 'Seychelles', 'sl' => 'Sierra Leone', 'sg' => 'Singapore', 'sk' => 'Slovakia', 'si' => 'Slovenia', 'sb' => 'Solomon Islands', 'so' => 'Somalia', 'za' => 'South Africa', 'gs' => 'South Georgia & South Sandwich Islands (UK)', 'es' => 'Spain', 'lk' => 'Sri Lanka', 'sd' => 'Sudan', 'sr' => 'Suriname', 'sz' => 'Swaziland', 'se' => 'Sweden', 'ch' => 'Switzerland', 'sy' => 'Syria', 'tw' => 'Taiwan', 'tj' => 'Tajikistan', 'tz' => 'Tanzania', 'th' => 'Thailand', 'tg' => 'Togo', 'tk' => 'Tokelau', 'to' => 'Tonga', 'tt' => 'Trinidad and Tobago', 'tn' => 'Tunisia', 'tr' => 'Turkey', 'tm' => 'Turkmenistan', 'tc' => 'Turks and Caicos Islands (UK)', 'tv' => 'Tuvalu', 'ug' => 'Uganda', 'ua' => 'Ukraine', 'ae' => 'United Arab Emirates', 'gb' => 'United Kingdom', 'uy' => 'Uruguay', 'uz' => 'Uzbekistan', 'vu' => 'Vanuatu', 've' => 'Venezuela', 'vn' => 'Vietnam', 'vg' => 'British Virgin Islands (UK)', 'wf' => 'Wallis and Futuna (FR)', 'eh' => 'Western Sahara', 'ye' => 'Yemen', 'zm' => 'Zambia', 'zw' => 'Zimbabwe');
$ccards = array('' => 'Choose', '002' => 'MasterCard', '001' => 'Visa', '003' => 'American Express', '004' => 'Discover');
$months = array('' => 'mm', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12');
$years = array('' => 'yyyy', '2012' => '2012', '2013' => '2013', '2014' => '2014', '2015' => '2015', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020', '2021' => '2021');

$session_id_4 = $_POST['session_id_4'];
$session_id_5 = $_POST['session_id_5'];
$session_id_6 = $_POST['session_id_6'];

if ($session_id_4 == "on" && $session_id_5 =="" && $session_id_6 =="")
  {
    $session_param = "AND session_id = 4 ";
  }
if ($session_id_4 == "" && $session_id_5 =="on" && $session_id_6 =="")
  {
    $session_param = "AND session_id = 5 ";
  }
if ($session_id_4 == "" && $session_id_5 =="" && $session_id_6 =="on")
  {
    $session_param = "AND session_id = 6 ";
  }
if ($session_id_4 == "on" && $session_id_5 =="on" && $session_id_6 =="")
  {
    $session_param = "AND (session_id = 4 OR session_id = 5) ";
  }
if ($session_id_4 == "" && $session_id_5 =="on" && $session_id_6 =="on")
  {
    $session_param = "AND (session_id = 5 OR session_id = 6) ";
  }
if ($session_id_4 == "on" && $session_id_5 =="" && $session_id_6 =="on")
  {
    $session_param = "AND (session_id = 4 OR session_id = 6) ";
  }
if ($session_id_4 == "" && $session_id_5 =="" && $session_id_6 =="")
  {
    $session_param = "";
  }
if ($session_id_4 == "on" && $session_id_5 =="on" && $session_id_6 =="on")
  {
    $session_param = "AND (session_id = 4 OR session_id = 5 OR session_id = 6) ";
  }

if ($session_id_4 == "" && $session_id_5 =="" && $session_id_6 =="")
  {
    header('Location: registration.php');
  }

$participant_type = $_POST['participant_type'];

if ($participant_type == 1)
  {
    $level = "Standard";
  }
if ($participant_type == 2)
  {
    $level = "Student";
  }
if ($participant_type == 3)
  {
    $level = "Academic";
  }

$tshirt_size = $_POST['tshirt_size'];

if ($tshirt_size == 1)
  {
    $display_size = "XX-Large";
  }
if ($tshirt_size == 2)
  {
    $display_size = "X-Large";
  }
if ($tshirt_size == 3)
  {
    $display_size = "Large";
  }
if ($tshirt_size == 4)
  {
    $display_size = "Medium";
  }
if ($tshirt_size == 5)
  {
    $display_size = "Small";
  }


$total_price = 0;

include('inc/db_conn.php');

//===========================
//  pull sessions
//===========================

$sql_sessions = "SELECT ";
$sql_sessions .= "pricing.id AS price_id, ";
$sql_sessions .= "session, ";
$sql_sessions .= "CONCAT(DATE_FORMAT(start_date, '%M %D'), \" - \", DATE_FORMAT(end_date, '%D')) AS `Dates`, ";
$sql_sessions .= "price ";
$sql_sessions .= "FROM pricing ";
$sql_sessions .= "LEFT JOIN participant_types ";
$sql_sessions .= "ON participant_type_id = participant_types.id ";
$sql_sessions .= "LEFT JOIN sessions ON session_id = sessions.id ";
$sql_sessions .= "WHERE pricing.conference_id = 2 ";
$sql_sessions .= "AND participant_type_id = $participant_type ";
$sql_sessions .= "$session_param ";

$sql_sessions .= "GROUP BY session ";
$sql_sessions .= "ORDER BY sessions.id ASC";

$total_result_sessions = @mysql_query($sql_sessions, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_sessions = @mysql_num_rows($total_result_sessions);

do {
  if ($row['session'] != '')
  {

$display_sessions .=    "
  <tr>
    <td>" . $row['session'] . "</td>
    <td align=\"center\">" . $row['Dates'] . "</td>
    <td align=\"right\"> $ " . $row['price'] . "</td>
  </tr>";
$total_price = $total_price + $row['price'];
  }
}
while($row = mysql_fetch_array($total_result_sessions));

//===========================
//  hidden field values
//===========================

$sql_hv = "SELECT ";
$sql_hv .= "session, ";
$sql_hv .= "price ";
$sql_hv .= "FROM pricing ";
$sql_hv .= "LEFT JOIN sessions ON sessions.id = session_id ";
$sql_hv .= "WHERE participant_type_id = $participant_type ";
$sql_hv .= "$session_param ";

$total_result_hv = @mysql_query($sql_hv, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_hv = @mysql_num_rows($total_result_hv);

while ($row = mysql_fetch_array($total_result_hv))
{
 $hv[$row['session']] = $row['price'];
}

if (array_key_exists('Tutorials', $hv))
  {
    $tutorials = "on";
    $tutorial_value = $hv[Tutorials];
  }
else
  {
    $tutorial_value = 0;
  }

if (array_key_exists('Conference', $hv))
  {
    $conference = "on";
    $conference_value = $hv[Conference];
  }
else
  {
    $conference_value = 0;
  }

if (array_key_exists('Sprints', $hv))
  {
    $sprints = "on";
    $sprint_value = $hv[Sprints];
  }
else
  {
    $sprint_value = 0;
  }


?>


<!DOCTYPE html>
<html>
<?php $thisPage="Register"; ?>
<head>

<?php
//force redirect to secure page
if($_SERVER['SERVER_PORT'] != '443') { header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); exit(); }
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
<h1>Registration Cont.</h1>
<hr />
<p>Please confirm these prices and submit your payment information below.</p>
<div align="center">
<p>Participant Level: <b><?php echo $level; ?></b> || T-Shirt size: <strong><?php echo $display_size; ?></strong></p>

<table id="schedule" width="350">
  <tr>
    <th>Session</th>
    <th><div align="center">Dates</div></th>
    <th><div align="right">Price</div></th>
  </tr>
<?php echo $display_sessions; ?>
  <tr>
    <td class="bold">Total</td>
    <td>&nbsp;</td>
    <td class="bold" align="right">$ <?php echo $total_price; ?></td>
  </tr>
</table>
</div>
<div style="clear:both;"></div>
<hr />

<form id="formID" method="post" name="PaymentInfo" action="https://orderpage.ic3.com/hop/ProcessOrder.do">

<!-- #### Summary Table  -->

<!-- #### Payment Form -->

<?php include("inc/HOP.php") ?>

<?php $TOTALAMT = $total_price ?>

<?php InsertSignature( $TOTALAMT, 'usd' ) ?>

<input type="hidden" id="totalamount" name="totalamount" value="<?php echo $total_price ?>">
<input type="hidden" name="conferenceamount" value="<?php echo $conference_value ?>">
<input type="hidden" name="sprintamount" value="<?php echo $sprint_value ?>">
<input type="hidden" name="tutorialamount" value="<?php echo $tutorial_value ?>">
<input type="hidden" name="rate" value="<?php echo $level ?>">
<input type="hidden" name="participant_type_id" value="<?php echo $participant_type ?>">
<input type="hidden" name="Product" value="SciPy Registration">
<input type="hidden" name="orderPage_transactionType" value="authorization">
<input type="hidden" name="conference" value="<?php echo $conference; ?>">
<input type="hidden" name="sprints" value="<?php echo $sprints; ?>">
<input type="hidden" name="tutorials" value="<?php echo $tutorials; ?>">
<input type="hidden" name="tshirt" value="<?php echo $display_size; ?>">
<input type="hidden" name="tshirt_size_id" value="<?php echo $tshirt_size; ?>">

<div id="instructions">
<p>* Indicates a required field.</p>
</div>
<div style="clear:both; height: 20px;"></div>
<h2>Contact Information</h2>

<table class="indent">
    <tr>
    <td class="no_brder" colspan='2'><label for="FirstName">* First Name</label><br /><input class="validate[required] text-input" type='text' id='FirstName' name='shipTo_firstName' value=''></td>
    <td class="no_brder" colspan='2'><label for="">* Last Name</label><br /><input class="validate[required] text-input" type='text' id='LastName' name='shipTo_lastName' value=''></td>
    <td class="no_brder" colspan='2'><label for="">Affiliation</label><br /><input type='text' name='affiliation' value=''></td>
    </tr>
    <tr>
      <td class="no_brder" colspan='2'><label for="">* Email</label><br /><input class="validate[required,custom[email]]" type='text' id='email' name='billTo_email' value=''></td>
      <td class="no_brder" colspan='2'><label for="">* Confirm Email</label><br /><input class="validate[required,equals[email]]" type='text' id='ecom_billto_online_email' name='ecom_billto_online_email' value=''></td>
    </tr>
    <tr>
      <td class="no_brder" colspan='2'><label for="">Address 1</label><br /><input type='text' id='Addr1'  name='shipTo_street1' value=''></td>
      <td class="no_brder" colspan='4'><label for="">Address 2</label><br /><input type='text' id='Addr2' name='shipTo_street2' value=''></td>
    </tr>
    <tr>
    <td class="no_brder" colspan='2'><label for="">City</label><br /><input type='text' id='City' name='shipTo_city' value=''></td>
    <td class="no_brder"><label for="">State</label><br /><input type='text' size='3' id='State' name='shipTo_state' value=''></td>
    <td class="no_brder"><label for="">Zip</label><br /><input type='text' size='10' id='ZipCode' name='shipTo_postalCode' value=''></td>
    <td class="no_brder"> </td>
      <td class="no_brder"><label for="">Country</label><br />

        <select id='Country' name="shipTo_country" size="1" style="width:150px">
            <?php foreach ($countries as $key => $shipTo_country) {
            echo "<option value=\"$key\">$shipTo_country</option>";
            } ?></select>
    </td>
    </tr>
</table>

<h2>Payment Information</h2>

<table class="indent">
    <tr>
        <td class="no_brder" ><label for="">* Credit Card Number</label><br /><input  class="validate[required,creditCard] text-input" type='text' id='ecom_payment_card_number' name='card_accountNumber' value=''></td>
        <td class="no_brder" ><label for="">* Card Type:</label><br />
            <select class="validate[required]" id="card_cardType" name='card_cardType'>
            <?php foreach ($ccards as $key => $card_cardType) {
            echo "<option value='$key'>$card_cardType</option>";
            } ?></select>
        </td>
        <td class="no_brder"><label for="">* Expiration Date</label><br />
        <select class="validate[required]" id='ecom_payment_card_expdate_month' name='card_expirationMonth'>
           <?php foreach ($months as $key =>  $card_expirationMonth) {
            echo "<option value='$key'>$card_expirationMonth</option>";
            } ?></select>
        <select class="validate[required]" id='ecom_payment_card_expdate_year' name='card_expirationYear'>
           <?php foreach ($years as $key =>  $card_expirationYear) {
            echo "<option value='$key'>$card_expirationYear</option>";
            } ?></select>
      </td>
    </tr>
</table>

<h2>Credit Card Billing Information</h2>

<table class="form indent">

    <tr><td class="no_brder" colspan='6'>Same as contact information <input type="checkbox" name="SameBillAsShip" id="SameBillAsShip""/></td></tr>
    <tr>
      <td class="no_brder" colspan='3'><label for="">* First Name</label><br /><input class="validate[required] text-input" type='text' size="24" id='ecom_billto_postal_name_first' name='billTo_firstName' value=''></td>
        <td class="no_brder" colspan='3'><label for="">* Last Name</label><br /><input class="validate[required] text-input" type='text' size="24" id='ecom_billto_postal_name_last' name='billTo_lastName' value=''></td>
    </tr>
    <tr>
        <td class="no_brder" colspan='3'><label for="">* Address 1</label><br /><input class="validate[required] text-input" type='text'  id='ecom_billto_postal_street_line1' name='billTo_street1' value=''></td>
        <td class="no_brder" colspan='3'><label for="">Address 2</label><br /><input type='text'  id='ecom_billto_postal_street_line2' name='billTo_street2' value=''></td>
    </tr>
    <tr>
        <td class="no_brder" colspan='2'><label for="">* City</label><br /><input class="validate[required] text-input" type='text' size="15" id='ecom_billto_postal_city' name='billTo_city' value=''></td>
        <td class="no_brder"><label for="">* State</label><br /><input class="validate[required] text-input" type='text' size="3" id='ecom_billto_postal_stateprov' name='billTo_state' value=''></td>
        <td class="no_brder"><label for="">* Zip</label><br /><input class="validate[required] text-input" type='text' size="11" id='ecom_billto_postal_postalcode' name='billTo_postalCode' value=''></td>
        <td class="no_brder"><label for="">* Country</label><br />
          <select  class="validate[required]" id='ecom_billto_postal_countrycode' name="billTo_country" size="1" style="width:150px;">
          <?php foreach ($countries as $key => $billTo_country) {
            echo "<option value=\"$key\">$billTo_country</option>";
            } ?></select>
    </td>
    </tr>
    <tr>
      <td class="no_brder" colspan='6'><label for="">* Phone</label><br /><input class="validate[required,custom[phone]]" type='text' id='phone' name='billTo_phoneNumber' value=''></td>
    </tr>
</table>
<input type="submit" name="SubmitOrder" value="Submit Order">
</form>
</section>
<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>