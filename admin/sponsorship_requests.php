<?php

$countries = array('' => 'choose', 'us' => 'United States', 'af' => 'Afghanistan', 'al' => 'Albania', 'dz' => 'Algeria', 'as' => 'American Samoa (US)', 'ad' => 'Andorra', 'ao' => 'Angola', 'ai' => 'Anguilla (UK)', 'ag' => 'Antigua and Barbuda', 'ar' => 'Argentina', 'am' => 'Armenia', 'aw' => 'Aruba', 'au' => 'Australia', 'at' => 'Austria', 'az' => 'Azerbaijan', 'bs' => 'Bahamas', 'bh' => 'Bahrain', 'bd' => 'Bangladesh', 'bb' => 'Barbados', 'by' => 'Belarus', 'be' => 'Belgium', 'bz' => 'Belize', 'bj' => 'Benin', 'bm' => 'Bermuda (UK)', 'bt' => 'Bhutan', 'bo' => 'Bolivia', 'ba' => 'Bosnia and Herzegovina', 'bw' => 'Botswana', 'br' => 'Brazil', 'vg' => 'British Virgin Islands (UK)', 'bn' => 'Brunei Darussalam', 'bg' => 'Bulgaria', 'bf' => 'Burkina Faso', 'mm' => 'Burma', 'bi' => 'Burundi', 'kh' => 'Cambodia', 'cm' => 'Cameroon', 'ca' => 'Canada', 'cv' => 'Cape Verde', 'ky' => 'Cayman Islands (UK)', 'cf' => 'Central African Republic', 'td' => 'Chad', 'cl' => 'Chile', 'cn' => 'China', 'cx' => 'Christmas Island (AU)', 'cc' => 'Cocos (Keeling) Islands (AU)', 'co' => 'Colombia', 'km' => 'Comoros', 'cd' => 'Congo, Democratic Republic of the', 'cg' => 'Congo, Republic of the', 'ck' => 'Cook Islands (NZ)', 'cr' => 'Costa Rica', 'ci' => 'Cote d\'Ivoire', 'hr' => 'Croatia', 'cu' => 'Cuba', 'cy' => 'Cyprus', 'cz' => 'Czech Republic', 'dk' => 'Denmark', 'dj' => 'Djibouti', 'dm' => 'Dominica', 'do' => 'Dominican Republic', 'tp' => 'East Timor', 'ec' => 'Ecuador', 'eg' => 'Egypt', 'sv' => 'El Salvador', 'gq' => 'Equatorial Guinea', 'er' => 'Eritrea', 'ee' => 'Estonia', 'et' => 'Ethiopia', 'fk' => 'Falkland Islands (UK)', 'fo' => 'Faroe Islands (DK)', 'fj' => 'Fiji', 'fi' => 'Finland', 'fr' => 'France', 'gf' => 'French Guiana (FR)', 'pf' => 'French Polynesia (FR)', 'ga' => 'Gabon', 'gm' => 'Gambia', 'ge' => 'Georgia', 'de' => 'Germany', 'gh' => 'Ghana', 'gi' => 'Gibraltar (UK)', 'gr' => 'Greece', 'gl' => 'Greenland (DK)', 'gd' => 'Grenada', 'gp' => 'Guadeloupe (FR)', 'gu' => 'Guam (US)', 'gt' => 'Guatemala', 'gn' => 'Guinea', 'gw' => 'Guinea-Bissau', 'gy' => 'Guyana', 'ht' => 'Haiti', 'va' => 'Holy See (Vatican City)', 'hn' => 'Honduras', 'hk' => 'Hong Kong (CN)', 'hu' => 'Hungary', 'is' => 'Iceland', 'in' => 'India', 'id' => 'Indonesia', 'ir' => 'Iran', 'iq' => 'Iraq', 'ie' => 'Ireland', 'il' => 'Israel', 'it' => 'Italy', 'jm' => 'Jamaica', 'jp' => 'Japan', 'jo' => 'Jordan', 'kz' => 'Kazakstan', 'ke' => 'Kenya', 'ki' => 'Kiribati', 'kp' => 'Korea, Democratic People\'s Republic (North)', 'kr' => 'Korea, Republic of (South)', 'kw' => 'Kuwait', 'kg' => 'Kyrgyzstan', 'la' => 'Laos', 'lv' => 'Latvia', 'lb' => 'Lebanon', 'ls' => 'Lesotho', 'lr' => 'Liberia', 'ly' => 'Libya', 'li' => 'Liechtenstein', 'lt' => 'Lithuania', 'lu' => 'Luxembourg', 'mo' => 'Macau (CN)', 'mk' => 'Macedonia', 'mg' => 'Madagascar', 'mw' => 'Malawi', 'my' => 'Malaysia', 'mv' => 'Maldives', 'ml' => 'Mali', 'mt' => 'Malta', 'mh' => 'Marshall islands', 'mq' => 'Martinique (FR)', 'mr' => 'Mauritania', 'mu' => 'Mauritius', 'yt' => 'Mayotte (FR)', 'mx' => 'Mexico', 'fm' => 'Micronesia, Federated States of', 'md' => 'Moldova', 'mc' => 'Monaco', 'mn' => 'Mongolia', 'ms' => 'Montserrat (UK)', 'ma' => 'Morocco', 'mz' => 'Mozambique', 'na' => 'Namibia', 'nr' => 'Nauru', 'np' => 'Nepal', 'nl' => 'Netherlands', 'an' => 'Netherlands Antilles (NL)', 'nc' => 'New Caledonia (FR)', 'nz' => 'New Zealand', 'ni' => 'Nicaragua', 'ne' => 'Niger', 'ng' => 'Nigeria', 'nu' => 'Niue', 'nf' => 'Norfolk Island (AU)', 'mp' => 'Northern Mariana Islands (US)', 'no' => 'Norway', 'om' => 'Oman', 'pk' => 'Pakistan', 'pw' => 'Palau', 'pa' => 'Panama', 'pg' => 'Papua New Guinea', 'py' => 'Paraguay', 'pe' => 'Peru', 'ph' => 'Philippines', 'pn' => 'Pitcairn Islands (UK)', 'pl' => 'Poland', 'pt' => 'Portugal', 'pr' => 'Puerto Rico (US)', 'qa' => 'Qatar', 're' => 'Reunion (FR)', 'ro' => 'Romania', 'ru' => 'Russia', 'rw' => 'Rwanda', 'sh' => 'Saint Helena (UK)', 'kn' => 'Saint Kitts and Nevis', 'lc' => 'Saint Lucia', 'pm' => 'Saint Pierre and Miquelon (FR)', 'vc' => 'Saint Vincent and the Grenadines', 'ws' => 'Samoa', 'sm' => 'San Marino', 'st' => 'Sao Tome and Principe', 'sa' => 'Saudi Arabia', 'sn' => 'Senegal', 'yu' => 'Serbia and Montenegro', 'sc' => 'Seychelles', 'sl' => 'Sierra Leone', 'sg' => 'Singapore', 'sk' => 'Slovakia', 'si' => 'Slovenia', 'sb' => 'Solomon Islands', 'so' => 'Somalia', 'za' => 'South Africa', 'gs' => 'South Georgia & South Sandwich Islands (UK)', 'es' => 'Spain', 'lk' => 'Sri Lanka', 'sd' => 'Sudan', 'sr' => 'Suriname', 'sz' => 'Swaziland', 'se' => 'Sweden', 'ch' => 'Switzerland', 'sy' => 'Syria', 'tw' => 'Taiwan', 'tj' => 'Tajikistan', 'tz' => 'Tanzania', 'th' => 'Thailand', 'tg' => 'Togo', 'tk' => 'Tokelau', 'to' => 'Tonga', 'tt' => 'Trinidad and Tobago', 'tn' => 'Tunisia', 'tr' => 'Turkey', 'tm' => 'Turkmenistan', 'tc' => 'Turks and Caicos Islands (UK)', 'tv' => 'Tuvalu', 'ug' => 'Uganda', 'ua' => 'Ukraine', 'ae' => 'United Arab Emirates', 'gb' => 'United Kingdom', 'uy' => 'Uruguay', 'uz' => 'Uzbekistan', 'vu' => 'Vanuatu', 've' => 'Venezuela', 'vn' => 'Vietnam', 'vg' => 'British Virgin Islands (UK)', 'wf' => 'Wallis and Futuna (FR)', 'eh' => 'Western Sahara', 'ye' => 'Yemen', 'zm' => 'Zambia', 'zw' => 'Zimbabwe');

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

$row_1="odd";
$row_2="even";
$row_count=1;

//===========================
//  pull sponsorship requests
//===========================

$sql_requestors = "SELECT ";
$sql_requestors .= "last_name, ";
$sql_requestors .= "first_name, ";
$sql_requestors .= "org_type, ";
$sql_requestors .= "org_name, ";
$sql_requestors .= "email, ";
$sql_requestors .= "residence_country, ";
$sql_requestors .= "citizenship_country, ";
$sql_requestors .= "nomination_type, ";
$sql_requestors .= "nominators_name, ";
$sql_requestors .= "nominators_email, ";
$sql_requestors .= "contributions, ";
$sql_requestors .= "level_of_need, ";
$sql_requestors .= "DATE_FORMAT(date_submitted, '%b %D') AS date_submitted ";
$sql_requestors .= "FROM sponsorship_requests ";
$sql_requestors .= "WHERE conference_id = 2";

$total_requestors = @mysql_query($sql_requestors, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_found_requestors = @mysql_num_rows($total_requestors);
$row_color=($row_count%2)?$row_1:$row_2;

do {
  if ($row['last_name'] != '')
  {

$display_requestors .="<tr class=$row_color>
    <td>" . $row['last_name'] . ", " . $row['first_name'] . "<br /><a href=\"mailto:" . $row['email'] . "\">" . $row['email'] . "</td>
    <td><span class=\"other_form_tips\">Org Name:</span>" . $row['org_name'] . "<br /><span class=\"other_form_tips\">Org Type:</span>" . $row['org_type'] . "</td>
    <td align=\"center\">" . $row['residence_country'] . "</td>
    <td align=\"center\">" . $row['citizenship_country'] . "</td>
    <td>" . $row['nomination_type'] . "";

    if ($row['nomination_type'] != "Self" && $row['nominators_name'] != "")
      {
        $display_requestors .="<br />" . $row['nominators_name'] . "";
      }
    if ($row['nomination_type'] != "Self" && $row['nominators_email'] != "")
      {
        $display_requestors .="<br />" . $row['nominators_email'] . "";
      }    

$display_requestors .="    </td>
  </tr>
  <tr class=$row_color>
    <td colspan=\"6\"><span class=\"other_form_tips\">Contributions:</span><br />" . nl2br($row['contributions']) . "</td>
  </tr>
  <tr class=$row_color>
    <td colspan=\"6\"><span class=\"other_form_tips\">Description of Need:</span><br />" . nl2br($row['level_of_need']) . "</td>
  </tr>
  <tr class=$row_color>
    <td colspan=\"6\" align=\"right\"><em>date submitted: " . $row['date_submitted'] . "</em></td>
  </tr>
  <tr class=$row_color>
    <td colspan=\"6\"><hr /></td>
  </tr>";
  }

$row_color=($row_count%2)?$row_1:$row_2;
$row_count++;

}
while($row = mysql_fetch_array($total_requestors));


?>

<!DOCTYPE html>
<html>
<?php $thisPage="Admin"; ?>
<head>

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

<h1>Admin</h1>

<p>Sponsorship Requests:</p>

<div align="right">
<p><a href="requests_csv.php">Export to CSV (for Excel)</a></p>
</div>

<table id="registrants_table" width="600">
<tr>
  <th width="150">Requestor's Name<br />Email</th>
  <th>Univ</th>
  <th width="70">Residence<br />Country</th>
  <th width="70">Citizen<br />Country</th>
  <th>Nom. Type<br />(Name/email)</th>
</tr>
<?php echo $display_requestors ?>
</table>

</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('../inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>