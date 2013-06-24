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
$sql_dates .= "WHERE impt_date >= \"$today\" ";
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

$display_dates .="<div class=\"row\" style=\"margin: 0;\"><div class=\"free_cell\">
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
    <h2>Attend</h2>
      <img src="img/about.png" width="251" height="84" alt="about scipy" class="hp_image" />
    <p>The annual SciPy Conference allows participants from academic, commercial, and governmental organizations to showcase their latest Scientific Python projects, learn from skilled users and developers, and collaborate on code development.</p>
    <p>The conference consists of two days of tutorials followed by two days of presentations, and concludes with two days of developer sprints on projects of interest to the attendees.</p>
    <p>We look forward to a very exciting conference and hope to see you all at the conference.</p>
  </div>
  <div class="hp_cell" style="margin: 0 5%;">
    <h2>Be Inspired</h2>
    <p>We are excited to feature these keynote presentations.</p>
      <div class="row" style="border-top: 1px solid #cadbeb;">
        <div class="free_cell">
          <img src="img/hs_fp.jpg" widht="40" height="38" alt="Fernando Perez" />
        </div>
        <div class="free_cell" style="max-width: 75%;">
          <p style="margin-bottom: 0;"><em>IPython: from the shell to a book with a single tool; the method behind the madness</em> - Fernando Perez<br /></p>
        </div>
      </div>
      <div class="row" style="border-top: 1px solid #cadbeb;">
        <div class="free_cell">
          <img src="img/hs_ws.jpg" widht="40" height="38" alt="William Schroeder" />
        </div>
        <div class="free_cell" style="max-width: 75%;">
          <p><em>The New Scientific Publishers</em><br />- William Schroeder</p>
        </div>
      </div>
      <div class="row" style="border-top: 1px solid #cadbeb;">
        <div class="free_cell">
          <img src="img/hs_og.jpg" widht="40" height="38" alt="William Schroeder" />
        </div>
        <div class="free_cell" style="max-width: 75%;">
          <p><em>Trends in Machine Learning and the SciPy community</em> - Olivier Grisel</p>
        </div>
        <p class="clearer">View their bios on the <a href="keynotes.php">Keynotes page</a> and descriptions of their talks on the <a href="presentations.php#Keynotes">Presentations page</a>.</p>
      </div>
  </div>
  <div class="hp_cell">
<div class="twitter" id="jstweets">
<h2>Follow</h2>
<a class="twitter-timeline" href="https://twitter.com/search?q=%23scipy2013" data-widget-id="349249937747345410">Tweets about "#scipy2013"</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</div>


</div>

<div class="row">
  <div class="hp_cell">
    <h2>Learn</h2>
    <img src="img/tutorials.png" width="251" height="84" alt="tutorials"  class="hp_image" />
    <p>This year we are expanding the tutorial session to include three parallel tracks:</p> 
    <ul>
      <li>introductory</li>
      <li>intermediate</li>
      <li>advanced</li>
    </ul>
    <p>Go to the <a href="tutorials.php">tutorials page</a> to see the schedule and links to descriptions.</p>
  </div>
  <div class="hp_cell" style="margin: 0 5%;">
    <h2>Participate</h2>
    <img src="img/sprint.png" width="251" height="84" alt="participate"  class="hp_image" />
    <p>The conference is an opportunity for developers that are usually physically separated to come together and engage in highly productive sessions.</p>
    <p><strong>Lightning Talks</strong> - Two 45min sessions of short presentations submitted the same day.</p>
    <p><strong>Sprint</strong> - a hackathon environment is setup for attendees to work on the core SciPy packages or their own personal projects.</p>
    
  </div>
  <div class="hp_cell">
    <h2>Gather</h2>
    <img src="img/hall.png" width="251" height="84" alt="BoFs"  class="hp_image" />
    <p>There are many opportunities to gather and discuss topics outside the scheduled conference.</p>
    <p><strong>Birds-of-a-Feather</strong>, or BoFs, - self-organized interactive discussions around a topic or package.</p>
    <p><strong>Breakout Rooms</strong> - available to continue discussions, hold meetings, etc.</p>
  </div>
</div>

<div class="row">
  <div class="hp_cell">
    <h2>Explore</h2>
    <img src="img/ms.png" width="251" height="84" alt="Mini Symposia"  class="hp_image" />
    <p>Introduced in 2012, mini-symposia are held to discuss scientific computing applied to a specific scientific domain/ industry during a half afternoon after the general conference. Their goal is to promote industry specific libraries and tools, and gather people with similar interests for discussions.</p>

<p>Mini-symposia on the following topics will take place this year:</p>

<ul>
  <li><a href="mini_symposia.php#Astronomy and astrophysics">Astronomy and astrophysics</a></li>
  <li><a href="mini_symposia.php#Bioinformatics">Bioinformatics</a></li>
  <li><a href="mini_symposia.php#GIS - Geospatial Data Analysis">GIS - Geospatial Data Analysis</a></li>
  <li><a href="mini_symposia.php#Medical Imaging">Medical Imaging</a></li>
  <li><a href="mini_symposia.php#Meteorology, Climatology, Atmospheric and Oceanic Science">Meteorology, Climatology, Atmospheric and Oceanic Science</a></li>
</ul>
  </div>
  <div class="hp_cell" style="margin: 0 5%;">
    <h2>Plotting Contest</h2>
    <img src="img/plot_contest.png" width="251" height="84" alt="plot contest"  class="hp_image" />
    <p>In memory of John Hunter, we are pleased to announce the first</p>
    <p style="text-align: center; font-weight: bold;"><a href="john_hunter_plotting_contest.php">SciPy John Hunter Excellence in Plotting Competition</a>.</p>
    <p>This open competition aims to highlight the importance of quality plotting to scientific progress and showcase the capabilities of the current generation of plotting software.</p>
    <p>Winners will be announced during the conference days.</p>
  </div>
  <div class="hp_cell">
    <h2>Focus</h2>
        <img src="img/specialized.png" width="251" height="84" alt="specialized"  class="hp_image" />
    <p>This year we have two specialized tracks that run in parallel in the general conference:</p>
    <ul>
      <li><strong>Machine Learning</strong> - Python makes machine learning algorithms more accessible. Learn about machine learning libraries and how they have been used as effective tools. <span class="other_form_tips"><a href="presentations.php#Machine Learning">View the Machine Learning topics</a></span>.</li>
      <li><strong>Reproducible Science</strong> - The Open Science movement has stoked renewed interest in reproducible research. Hear how python is used to achieve reproducible scientific computing. <span class="other_form_tips"><a href="presentations.php#Reproducible Science">View the Reproducible Science topics</a>.</span></li>
    </ul>
  </div>


</div>
<div class="row">
  <div class="hp_cell">
    <h2>Announcements</h2>
    <p>Check out the <a href="program_schedule.php">scheduled list of talks, mini-symposia and posters</a> selected for this year.</p>
        <?php echo $display_dates ?>
        <div class="row" style="margin: 0;">
          <div class="free_cell">
            <div class="icon_date">Jun<br /><span class="icon_date_day">24</span></div>
          </div>
          <div class="free_cell">
            <div class="icon_date">Jun<br /><span class="icon_date_day">25</span></div>
          </div>
          <div class="free_cell" style="max-width: 20%; padding-top: 1em;">
            Tutorials
          </div>
        </div>
        <div class="row" style="margin: 0;">
          <div class="free_cell">
            <div class="icon_date">Jun<br /><span class="icon_date_day">26</span></div>
          </div>
          <div class="free_cell">
            <div class="icon_date">Jun<br /><span class="icon_date_day">27</span></div>
          </div>
          <div class="free_cell" style="max-width: 20%; padding-top: 1em;">
            Conference
          </div>
        </div>
        <div class="row" style="margin: 0;">
          <div class="free_cell">
            <div class="icon_date">Jun<br /><span class="icon_date_day">28</span></div>
          </div>
          <div class="free_cell">
            <div class="icon_date">Jun<br /><span class="icon_date_day">29</span></div>
          </div>
          <div class="free_cell" style="max-width: 20%; padding-top: 1em;">
            Sprints &amp; BoFs
          </div>
        </div>
  </div>
  <div class="hp_cell" style="margin: 0 5%;">
    <h2>More</h2>
    <p>To receive updates on conference specifics:</p>

  <img src="img/newsletter_icon.png" width="32" height="32"  alt="newsletter" class="callout_date" />
  <span class="callout_description">Subscribe to the SciPy 2013 newsletter</span>
  <style type="text/css">
.link,
.link a,
#SignUp .signupframe {
	color: #226699;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	}
	.link,
	.link a {
		text-decoration: none;
		}
	#SignUp .signupframe {
		border: 1px solid #000000;
		background: #ffffff;
		}
#SignUp .signupframe .required {
	font-size: 10px;
	}
</style>
<script type="text/javascript" src="http://app.icontact.com/icp/loadsignup.php/form.js?c=1254645&l=7470&f=2197"></script>


<div class="row">
  <img src="img/twitter-bird-light-bgs.png" width="32" height="32" alt="twitter" class="callout_date" />
  <span class="callout_description">Follow <a href="https://twitter.com/SciPyConf">@SciPyConf</a></span>
</div>

<div class="row">
  <img src="img/gplus-32.png" width="32" height="32"  alt="g-plus" class="callout_date" />
  <span class="callout_description"><a href="https://plus.google.com/u/0/100948873231627513165/posts">ScipyConference google+ page</a></span>
</div>

  </div>

  <div class="hp_cell">
    <h2>What's it like?</h2>
    <p>Watch the video highlighting last years conference.</p>
    <a href="video_highlights.php"><img src="img/video_placeholder.png" width="" height="" alt="video highlights" /></a>
  </div>
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