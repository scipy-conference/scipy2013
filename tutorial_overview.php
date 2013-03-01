<?php
include_once "inc/markdown.php";
include('inc/db_conn.php');

//===========================
//  pull important dates
//===========================

//$today = date("Y")."-".date("m")."-".date("d");

$sql_dates = "SELECT ";
$sql_dates .= "DATE_FORMAT(`impt_date`, '%b %D') as date_f, ";
$sql_dates .= "`description`  ";
$sql_dates .= "FROM `important_dates`  ";
$sql_dates .= "WHERE conference_id = 2 ";
$sql_dates .= "AND display = \"public\" ";
$sql_dates .= "ORDER BY impt_date";

$total_dates = @mysql_query($sql_dates, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
$total_dates_found = @mysql_num_rows($total_dates);
$row_color=($row_count%2)?$row_1:$row_2;

do {
  if ($row['description'] != '')
  {

$display_dates .="  <li>" . $row['date_f'] . ": " . $row['description'] . "</li>";
}}
while($row = mysql_fetch_array($total_dates));
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

<div class="callout">
<h1>Spread the news...</h1>

<div class="callout_row">
  <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://conference.scipy.org/scipy2013/speaking_tutorial_overview.php" data-text="SciPy 2013 call for tutorials..." data-via="SciPyConf" data-size="large">Tweet</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

<div class="callout_row">
<div class="g-plusone" data-annotation="inline" data-width="140" data-href="http://conference.scipy.org/scipy2013/speaking_tutorial_overview.php"></div>
</div>

<div class="callout_row">
<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/Share" data-url="http://conference.scipy.org/scipy2013/speaking_tutorial_overview.php" data-counter="right"></script>
</div>

<div class="callout_row">
<div class="fb-like" data-href="http://conference.scipy.org/scipy2013/speaking_tutorial_overview.php" data-send="false" data-layout="button_count" data-width="170" data-show-faces="false"></div></div>

<div class="callout_row">
<a href="http://www.reddit.com/submit" onclick="window.location = 'http://www.reddit.com/submit?url=http://conference.scipy.org/scipy2013/speaking_tutorial_overview.php' + encodeURIComponent(window.location); return false"> <img src="http://www.reddit.com/static/spreddit7.gif" alt="submit to reddit" border="0" /> </a>
</div>

</div>

<?php echo Markdown("SciPy 2013 Tutorials - Call for Submissions
===========================================

SciPy 2013, the twelfth annual Scientific Computing with Python
conference, will be held this June 24th-29th in Austin, Texas. SciPy
is a community dedicated to the advancement of scientific computing
through open source Python software for mathematics, science, and
engineering. The annual SciPy Conference allows participants from
academic, commercial, and governmental organizations to showcase their
latest projects, learn from skilled users and developers, and
collaborate on code development.

The conference always kicks off with two days of tutorials. These
sessions provide extremely affordable access to expert training, and
consistently receive fantastic feedback from participants. This year
we are expanding the tutorial session to include three parallel
tracks: introductory, intermediate and advanced.

The new introductory track specifically targets programmers with no
prior knowledge of scientific python and to ensure a consistent
overall experience, the topics for these sessions have been fixed.

**We are now accepting tutorial proposals from individuals or teams
that would like to teach a tutorial at SciPy 2013**

Whether you are a major contributor to a scientific Python library or
an expert-level user, this is a great opportunity to share your
knowledge and offset some of the costs of your SciPy 2013 attendance.

Topics
------

Tutorials should be focused on covering a well-defined topic in a
hands-on manner.  We want to see attendees coding! We encourage
submissions to be designed to allow at least 50% of the time for
hands-on excerises even if this means the subject matter needs to be
limited. Tutorials will be 4 hours in duration and will be assigned to
one of the three tracks.

For examples of content and format, you can refer to past tutorials
from past SciPy tutorial sessions ([SciPy2012]_, [SciPy2011]_,
[SciPy2010]_). We are looking for awesome techniques or packages,
helping new or advanced python programmers develop better or faster
scientific applications.

Submissions to the intermediate and advanced track are open to all
topics but for submissions to the introductory track, please choose
from one of the 4 topics listed below:

* Introduction Scientific Python Basics (Numpy and IPython)
* Introduction to plotting with Matplotlib
* Overview of Scipy
* Software Carpentry


Stipend
-------

In recognition of the effort required to plan and prepare a high
quality tutorial, we give at least a $750 stipend to each instructor
(or team of instructors) for each half-day session they lead. This may
stipend may increase to $1000 depending on availability of funds.

Proposal Submission
-------------------

To submit your tutorial proposal, please go to:
[http://conference.scipy.org/scipy2013/tutorial_submission.php] and fill
the form, or in case you prefer so, send the materials to
tutorials@scipy.org.  You will need the next:

* A short bio of the presenter or team members, containing a
  description of past experiences as a trainer/teacher/speaker, and
  (ideally) links to videos of these experiences if available.
* Which track the tutorial would fit best in Intermediate or Advanced
  if an open submisssion, or which of the 4 introductory topics
  otherwise.
* A description of the tutorial, suitable for posting on the SciPy
  website for attendees to view. It should include the target
  audience, the expected level of knowledge prior to the class, and
  the goals of the class.
* A more detailed outline of the tutorial content, including the
  duration of each part, and exercise sessions. Please include a
  description of how you plan to make the tutorial hands-on.
* A list of Python packages that attendees will need to have installed
  prior to the class to follow along. Please mention if any packages
  are not cross platform. Installation instructions or links to
  installation documentation should be provided for packages that are
  not available through easy_install, pip, EPD, Anaconda, etc., or
  that require third party or compiled libraries.
* If available, the tutorial notes, slides, exercise files, ipython
  notebooks, that you already have, even if they are preliminary.

Selection
---------

Accepted tutorials will be announced on April 15th. Final tutorial
materials and instructions for attendees will be due on May 24th. This
will include final version numbers of required software and a test 
script that can be run by attendees to ensure that they have 
sufficient time to prepare their laptops before the conference.

Important dates:
----------------
* Feb 27th:	Calls for tutorial submissions
* Apr  1st:	Tutorial submissions due 
* Apr 15th:	Accepted tutorials announced
* May  1st:	Speaker and Schedule announced
* May  6th:	Early registration ends
* May 24th: Final submission of tutorial materials, software version 
  numbers and test scripts.
* Monday-Tuesday, June 24 - 25: SciPy 2013 Tutorials, Austin TX
* Wednesday-Thursday, June 26 - 27: SciPy 2013 Conference, Austin TX
* Friday-Saturday, June 27 - 28: SciPy 2013 Sprints, Austin TX & remote

We look forward to very exciting tutorials and hope to see you all at
the conference.

The SciPy 2013 Tutorial Chairs

* Francesc Alted, Software Architect at Continuum Analytics Inc.
* Dharhas Pothina, Water Informatics Lead at the Texas Water Development Board

[SciPy2012]: http://conference.scipy.org/scipy2012/tutorials.php
[SciPy2011]: http://conference.scipy.org/scipy2011/tutorials.php
[SciPy2010]: http://conference.scipy.org/scipy2010/tutorials.html
[http://conference.scipy.org/scipy2013/tutorial_submission.php]: http://conference.scipy.org/scipy2013/tutorial_submission.php") ?>

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