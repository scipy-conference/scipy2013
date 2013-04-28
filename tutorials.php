<?php
session_start();

include_once "inc/markdown.php";

include('inc/db_conn.php');

$participant_id = $_GET['id'];

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
$sql_presenters .= "DATE_FORMAT(start_time, '%W - %b %D') AS schedule_day ";


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
       $display_block .="
        <td><strong><a href=\"#ti-" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "</td>";
        $last_start_time = $row['start_time'];
      }
   elseif ($row['location_id'] == '2')
     { 
$display_block .="
<td><strong><a href=\"#ti-" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "</td>";
$last_start_time = $row['start_time'];
   }
 elseif ($row['location_id'] == '3')
   { 
$display_block .="
<td><strong><a href=\"#ti-" . $row['talk_id'] . "\">" . $row['title'] . "</a></strong><br /> - " . $row['last_name'] . ", " . $row['first_name'] . "</td>";
$last_start_time = $row['start_time'];
   }
  else 
   {
$display_block .="
<td>---</td>";

   }
}
}

while ($row = mysql_fetch_array($total_presenters));

do {

if ($row['title'] != '')
  {
  $display_detail_2 .="<a name=\"ti-" . $row['talk_id'] . "\"></a>
<p class=\"intra_page_nav\"><a href=\"#top\">[ back to top ]</a></p>
  <h2 class=\"tutorial\">" . $row['title'] . " - <em>" . $row['first_name'] . " " . $row['last_name'] . "</em></h2>

<h3 class=\"tutorial\">Bio</h3>

" . $row['bio'] . "

<h3 class=\"tutorial\">Description</h3>

" . Markdown($row['description']) . "<hr />" ;
  }
}
while ($row = mysql_fetch_array($total_presenters_2));

?>


<!DOCTYPE html>
<html>
<?php $thisPage="Speaking"; ?>
<head>

<?php include('inc/header.php') ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />
</head>

<body>

<!-- for facebook like button -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="container">

<?php include('inc/page_headers.php') ?>

<section id="sidebar">
  <?php include("inc/sponsors.php") ?>
</section>


<section id="main-content">

<h1>SciPy 2013 Tutorials</h1>

<p>The conference always kicks off with two days of tutorials. These sessions provide extremely affordable access to expert training, and consistently receive fantastic feedback from participants. This year we are expanding the tutorial session to include three parallel tracks: introductory, intermediate and advanced.</p>

<p>The Tutorials Schedule (June 24th & 25th) is in its final stages of confirmation. There may be changes made to the schedule between now and the conference.</p>


<table id="registrants_table">
<?php echo $display_block ?>
</table>



<p>More detailed descriptions of tutorials coming soon.</p>

<?php echo $display_detail_2 ?>

</section>

<div style="clear:both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>

<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

</body>

</html>