<?php

session_start();

include('inc/db_conn.php');

//===========================
//  pull important dates list
//===========================

$today = date("Y")."-".date("m")."-".date("d");

$sql_dates = "SELECT ";
$sql_dates .= "DATE_FORMAT(`impt_date`, '%b') as date_m, ";
$sql_dates .= "DATE_FORMAT(`impt_date`, '%d') as date_d, ";
$sql_dates .= "`description`  ";
$sql_dates .= "FROM `important_dates`  ";
$sql_dates .= "WHERE impt_date > \"$today\" ";
$sql_dates .= "AND conference_id = 2 ";
$sql_dates .= "AND display = \"public\" ";
$sql_dates .= "ORDER BY impt_date ";
$sql_dates .= "LIMIT 4";

$total_dates = @mysql_query($sql_dates, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_dates_found = @mysql_num_rows($total_dates);
$row_color=($row_count%2)?$row_1:$row_2;

do {
  if ($row['description'] != '')
  {

$display_dates .="<div class=\"row\"><div class=\"free_cell\">
<div class=\"icon_date\">" . $row['date_m'] . "<br /><span class=\"icon_date_day\">" . $row['date_d'] . "</span></div></div><div class=\"free_cell\" style=\"max-width: 70%; padding-top: 1em;\">" . $row['description'] . "</div></div>";
}}
while($row = mysql_fetch_array($total_dates));

//===========================
//  pull individual important dates
//===========================

//$today = date("Y")."-".date("m")."-".date("d");

$sql_dates_2 = "SELECT id, ";
$sql_dates_2 .= "DATE_FORMAT(`impt_date`, '%b %D') as date_m ";
$sql_dates_2 .= "FROM `important_dates`  ";
$sql_dates_2 .= "WHERE conference_id = 2 ";
$sql_dates_2 .= "AND display = \"public\"";

$total_dates_2 = @mysql_query($sql_dates_2, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_dates_found_2 = @mysql_num_rows($total_dates_2);
while ($row = mysql_fetch_array($total_dates_2)) {
if ($row['id'] == 1) 
  {
    $abstracts_deadline=$row['date_m'];
  }
elseif ($row['id'] == 4) 
  {
    $tutorial_deadline=$row['date_m'];
  }

}


?>


<!DOCTYPE html>
<html>
<?php $thisPage="Home"; ?>
<head>

<?php include('inc/header.php') ?>

<link rel="shortcut icon" href="http://conference.scipy.org/scipy2013/favicon.ico" />
</head>

<body>

<div id="container">

<?php include('inc/page_headers.php') ?>

<section id="slim_sidebar">
  <?php include("inc/sponsors_small.php") ?>
</section>

<section id="hp-content">

<div class="row">
  <div class="hp_cell">
    <h3>About</h3>
      <img src="img/about.png" width="253" height="143" alt="about scipy" style="display: block; margin: 0 auto 1em;" />
    <p>The annual SciPy Conference allows participants from academic, commercial, and governmental organizations to showcase their latest projects, learn from skilled users and developers, and collaborate on code development.</p>
  </div>
  <div class="hp_cell" style="margin: 0 1em;">
    <h3>Specialized Tracks</h3>
    <p>Machine Learning, Reproducible Science</p>
  </div>
  <div class="hp_cell">
    <h3>Announcements</h3>
    <p>Check out the presentations selected fro this year. You can review the list, read the descriptions. Schedule coming soon.</p>
        <?php echo $display_dates ?>
  </div>
</div>

<div class="row">
  <div class="hp_cell">
    <h3>Be Inspired</h3>
    <p>We are excited to feature these keynote presentations.</p>
      <div class="row">
        <div class="free_cell">
          <img src="img/hs_fp.jpg" widht="40" height="38" alt="Fernando Perez" />
        </div>
        <div class="free_cell" style="max-width: 75%;">
          <p><em>IPython: from the shell to a book with a single tool; the method behind the madness</em><br />- Fernando Perez<br /></p>
        </div>
      </div>
      <div class="row">
        <div class="free_cell">
          <img src="img/hs_ws.jpg" widht="40" height="38" alt="William Schroeder" />
        </div>
        <div class="free_cell" style="max-width: 75%;">
          <p><em>The New Scientific Publishers</em><br />- William Schroeder</p>
        </div>
      </div>
      <div class="row">
        <div class="free_cell">
          <img src="img/hs_og.jpg" widht="40" height="38" alt="William Schroeder" />
        </div>
        <div class="free_cell" style="max-width: 75%;">
          <p><em>Trends in Machine Learning and the SciPy community</em><br />- Olivier Grisel</p>
        </div>
      </div>
  </div>
  <div class="hp_cell" style="margin: 0 1em;">
    <h3>Learn Something New</h3>
    <img src="img/tutorials.png" width="253" height="143" alt="tutorials" style="display: block; margin: 0 auto 1em;" />
    <p>This year we are expanding the tutorial session to include three parallel tracks: introductory, intermediate and advanced.</p>
  </div>
  <div class="hp_cell">
    <h3>Participate</h3>
    <img src="img/sprint.png" width="253" height="143" alt="participate" style="display: block; margin: 0 auto 1em;" />
    <p>A hackathon environment is setup for attendees to work on the core SciPy packages or their own personal projects. The conference is an opportunity for developers that are usually physically separated to come together and engage in highly productive sessions.</p>
  </div>
</div>

<div class="row">
  <div class="hp_cell">
    <h3>Gather</h3>
    <img src="img/bof.png" width="255" height="147" alt="BoFs" style="display: block; margin: 0 auto 1em;" />
    <p>Birds-of-a-Feather sessions are self-organized discussions that run parallel to the main conference. The BOFs sessions cover primary, tangential, or unrelated topics in an interactive, discussion setting.</p>
  </div>
  <div class="hp_cell" style="margin: 0 1em;">
    <h3>Plotting Contest</h3>
    <p>In memory of John Hunter, we are pleased to announce the first SciPy John Hunter Excellence in Plotting Competition.</p>
  </div>
  <div class="hp_cell">
    <h3>What's it like?</h3>
    <p>Watch this video highlighting last years conference.</p>
    <iframe src="https://docs.google.com/a/enthought.com/file/d/0B60st7W8G6ojNGdGNGNmemc3aEU/preview" width="250" height="150" style="display: block; margin: 0 auto;" ></iframe>
  </div>
</div>
</section>



<div style="clear: both;"></div>
<footer id="page_footer">
<?php include('inc/page_footer.php') ?>
</footer>
</div>
</body>

</html>