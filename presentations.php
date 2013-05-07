<?php

include('inc/db_conn.php');

//===========================
//  pull talks 
//===========================

$sql_talks = "SELECT ";
$sql_talks .= "authors, ";
$sql_talks .= "title, ";
$sql_talks .= "track, ";

$sql_talks .= "type, ";
$sql_talks .= "released, ";
$sql_talks .= "tags ";

$sql_talks .= "FROM  talks ";


$sql_talks .= "LEFT JOIN presenters ";
$sql_talks .= "ON presenter_id = presenters.id ";

$sql_talks .= "LEFT JOIN license_types ";
$sql_talks .= "ON license_type_id = license_types.id ";

$sql_talks .= "WHERE talks.conference_id = 2 ";
$sql_talks .= "AND track NOT IN ('Introductory','Intermediate','Advanced') ";
$sql_talks .= "ORDER BY FIELD(track,'Keynotes','General','Machine Learning','Reproducible Science','Astronomy and Astrophysics','Bioinformatics','GIS - Geospatial Data Analysis','Medical imaging','Meteorology, Climatology and Oceanic Science','Posters'), title";


$total_talks = @mysql_query($sql_talks, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());

$last_track = '';

do {

if ($row['title'] != '')
  {

if ($row['track'] != $last_track) 
{
$display_talks .="
  <tr>
    <th width=\"29%\" colspan=\"2\"><span class=\"intra_page_nav\" style=\"font-weight: normal;\"><a href=\"#top\" style=\"color: #fff;\">Back to top</a></span><a name=\"" . $row['track'] . "\"></a><br />" . $row['track'] . "</th>
  </tr>
  <tr>
    <td><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></td>
    <td>" . $row['track'] . "</td>
  </tr>";
$last_track = $row['track'];
}
else
$display_talks .="
  <tr>
    <td><a href=\"presentation_detail.php?id=" . $row['talk_id'] . "\">" . $row['title'] . "</a></td>
    <td>" . $row['track'] . "</td>
  </tr>";
}
}

while ($row = mysql_fetch_array($total_talks));


?>

<!DOCTYPE html>
<html>
<?php $thisPage="Talks"; ?>
<head>

<?php @ require_once ("inc/header.php"); ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />
</head>

<body>

<div id="container">

<?php include('inc/page_headers.php') ?>

<section id="sidebar">
  <?php include("inc/sponsors.php") ?>
</section>

<section id="main-content">
<a name="#top"></a>

<h1>Program</h1>

<p>Listed below are confirmed presentations for SciPy2013. More details and schedule information coming soon.</p>

<div class="intra_page_nav" style="text-align: center; font-size: 0.75em;"><a href="#Keynotes">Keynotes</a><br /><a href="#General">General</a> | <a href="#Machine Learning">Machine Learning</a> | <a href="#Reproducible Science">Reproducible Science</a> <br />
<a href="#Astronomy and Astrophysics">Astronomy and Astrophysics</a> | <a href="#Bioinformatics">Bioinformatics</a> | <a href="#GIS - Geospatial Data Analysis">GIS - Geospatial Data Analysis</a> | <a href="#Medical Imaging">Medical Imaging</a> | <a href="#Meteorology, Climatology and Oceanic Science">Meteorology, Climatology and Oceanic Science</a><br />
<a href="#Posters">Posters</a></div>

<table id="registrants_table">
<?php echo $display_talks ?>
</table>

</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>