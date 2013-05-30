<?php
session_start();

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

$tshirt_type = $_POST['tshirt_type'];

if ($tshirt_type == 1)
  {
    $display_type = "womens/fitted";
  }
if ($tshirt_type == 2)
  {
    $display_type = "mens/unisex";
  }



$total_price = 0;

include('inc/db_conn.php');

$promotion_id = $_POST['promotion_id'];
$today = date("Y")."-".date("m")."-".date("d");

include('inc/db_conn.php');

//===========================
//  pull discount
//===========================

$sql_discount = "SELECT ";
$sql_discount .= "id, ";
$sql_discount .= "discount, ";
$sql_discount .= "promotion_name ";
$sql_discount .= "FROM promotion_codes ";
$sql_discount .= "WHERE code = \"$promotion_id\" ";
$sql_discount .= "AND active_date <= \"$today\" ";
$sql_discount .= "AND exp_date >= \"$today\"";

$total_result_discount = @mysql_query($sql_discount, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($total_result_discount))
{

$promotion_id = $row['id'];
$promotion_name = $row['promotion_name'];
$discount = $row['discount'];

}

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
    <td align=\"center\">" . $row['Dates'] . "</td>";
    
    if ($row['session'] == "Conference" & $discount != "")
        {
    $display_sessions .=   "<td align=\"right\"> $ " . $row['price']*$discount . "</td>";
    $row['price'] = $row['price']*$discount;
        }
    else
        {
    $display_sessions .=   "<td align=\"right\"> $ " . $row['price'] . "</td>";
        }

    $display_sessions .=   "</tr>";
$total_price = $total_price + $row['price'];
  }
}
while($row = mysql_fetch_array($total_result_sessions));



      if ($row['session'] == "Conference")
        {
        $display_sessions .="checked";
        }



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
    
    if ($discount != "") 
      {
        $conference_value = $hv[Conference]*$discount;
      }
    else 
      {
        $conference_value = $hv[Conference];
      }
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


//===========================
//  pull presenters DAY 1
//===========================

$sql_presenters = "SELECT ";
$sql_presenters .= "presenters.id AS presenter_id, ";
$sql_presenters .= "talks.id AS talk_id, ";
$sql_presenters .= "schedules.id AS schedule_id, ";
$sql_presenters .= "talks.presenter_id AS pi, ";
$sql_presenters .= "last_name, ";
$sql_presenters .= "first_name, ";
$sql_presenters .= "affiliation, ";
$sql_presenters .= "bio, ";
$sql_presenters .= "title, ";
$sql_presenters .= "track, ";
$sql_presenters .= "authors, ";
$sql_presenters .= "talks.description, ";
$sql_presenters .= "location_id, ";
$sql_presenters .= "start_time, ";
$sql_presenters .= "name, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%h:%i %p') AS start_time_f, ";
$sql_presenters .= "DATE_FORMAT(end_time, '%h:%i %p') AS end_time_f, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%W - %b %D') AS schedule_day, ";
$sql_presenters .= "DATE_FORMAT(start_time, '%m%d_%p') AS radio_attribute ";

$sql_presenters .= "FROM schedules ";

$sql_presenters .= "LEFT JOIN talks ";
$sql_presenters .= "ON schedules.talk_id = talks.id ";

$sql_presenters .= "LEFT JOIN locations ";
$sql_presenters .= "ON schedules.location_id = locations.id ";

$sql_presenters .= "LEFT JOIN presenters ";
$sql_presenters .= "ON presenter_id = presenters.id ";

$sql_presenters .= "LEFT JOIN license_types ";
$sql_presenters .= "ON license_type_id = license_types.id ";

$sql_presenters .= "WHERE talks.conference_id = 2 ";
$sql_presenters .= "AND track IN ('Introductory','Intermediate','Advanced') ";
$sql_presenters .= "ORDER BY start_time, location_id";


$total_presenters = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_presenters_2 = @mysql_query($sql_presenters, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$last_start_time = '';
$last_schedule_day = '';

do {

if ($row['title'] != '')
  {
//
if ($row['schedule_day'] != $last_schedule_day) 
{
$display_block .="
<tr>
  <th colspan=\"4\">" . $row['schedule_day'] . "</th>
</tr>
  <tr>
    <th width=\"13%\">Time</th>
    <th width=\"29%\">Introductory</th>
    <th width=\"29%\">Intermediate</th>
    <th width=\"29%\">Advanced</th>
  </tr>";
$last_schedule_day = $row['schedule_day'];
}
//

  if ($row['start_time'] != $last_start_time) 
     {
       $display_block .="  <tr>
        <td>" . $row['start_time_f'] . " - " . $row['end_time_f'] . "</td>";
     }

    if ($row['location_id'] == '1')
      { 
//      if($row['talk_id'] == '109')
//        {
//        $display_block .="
//        <td>" . $row['title'] . " <span class=\"highlight\"><strong><em>- FULL&nbsp;</em></strong></span></td>";
//        $last_start_time = $row['start_time'];
//        }
//        else
//        {
        $display_block .="
        <td><input class=\"validate[required] radio\" name=\"tutorial_" . $row['radio_attribute'] . "\" id=\"tutorial_" . $row['radio_attribute'] . "\" type=\"radio\" value=\"" . $row['talk_id'] . "\" />" . $row['title'] . "</td>";
        $last_start_time = $row['start_time'];
//        }
      }
   elseif ($row['location_id'] == '2')
     { 
      if($row['talk_id'] == '107')
        {
        $display_block .="
        <td>" . $row['title'] . " <span class=\"highlight\"><strong><em>- FULL&nbsp;</em></strong></span></td>";
        $last_start_time = $row['start_time'];
        }
        else
        {
        $display_block .="
        <td><input class=\"validate[required] radio\" name=\"tutorial_" . $row['radio_attribute'] . "\" id=\"tutorial_" . $row['radio_attribute'] . "\" type=\"radio\" value=\"" . $row['talk_id'] . "\" />" . $row['title'] . "</td>";
        $last_start_time = $row['start_time'];
        }
   }
 elseif ($row['location_id'] == '3')
   { 
      if($row['talk_id'] == '102')
        {
        $display_block .="
        <td>" . $row['title'] . " <span class=\"highlight\"><strong><em>- FULL&nbsp;</em></strong></span></td>";
        $last_start_time = $row['start_time'];
        }
        else
        {
        $display_block .="
        <td><input class=\"validate[required] radio\" name=\"tutorial_" . $row['radio_attribute'] . "\" id=\"tutorial_" . $row['radio_attribute'] . "\" type=\"radio\" value=\"" . $row['talk_id'] . "\" />" . $row['title'] . "</td>";
        $last_start_time = $row['start_time'];
        }
   }
  else 
   {
$display_block .="
<td>---</td>";

   }
}
}

while ($row = mysql_fetch_array($total_presenters));



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
<p>Participant Level: <b><?php echo $level; ?></b> || T-Shirt size: <strong><?php echo $display_size; ?></strong> (<?php echo $display_type; ?>)</p>

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

<div id="instructions">
<p>* Indicates a required field.</p>
</div>

<?php if ($tutorials == "on") 
  {
?>
<p>You have elected to attend tutorials, please indicate the tutorials you would like to attend</p>

<table>
<?php echo $display_block ?>
</table>

<?php


  }

?>

<!-- #### Summary Table  -->

<!-- #### Payment Form -->

<?php include("inc/HOP.php") ?>

<?php $TOTALAMT = $total_price ?>

<?php InsertSignature( $TOTALAMT, 'usd' ) ?>

<input type="hidden" id="totalamount" name="totalamount" value="<?php echo $total_price ?>">
<input type="hidden" id="promotion_id" name="promotion_id" value="<?php echo $promotion_id ?>">
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
<input type="hidden" name="tshirt" value="<?php echo $display_size; ?> (<?php echo $display_type; ?>)">
<input type="hidden" name="tshirt_size_id" value="<?php echo $tshirt_size; ?>">
<input type="hidden" name="tshirt_type" value="<?php echo $display_type; ?>">
<input type="hidden" name="tshirt_type_id" value="<?php echo $tshirt_type; ?>">



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