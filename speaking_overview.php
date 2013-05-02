<?php

session_start();

include('inc/db_conn.php');

//===========================
//  pull important dates
//===========================

//$today = date("Y")."-".date("m")."-".date("d");

$sql_dates = "SELECT ";
$sql_dates .= "DATE_FORMAT(`impt_date`, '%M %D, %Y') as date_m ";
$sql_dates .= "FROM `important_dates`  ";
$sql_dates .= "WHERE id = 1";

$total_dates = @mysql_query($sql_dates, $connection) or die("Error #". mysql_errno() . ": " . mysql_error());
while($row = mysql_fetch_array($total_dates))
{

$date_m = $row['date_m'];

}

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

<h1>SciPy 2013 Call for Conference Abstracts</h1>

<div class="callout">
<h1>Spread the news...</h1>

<div class="callout_row">
  <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://conference.scipy.org/scipy2013/speaking_overview.php" data-text="SciPy 2013 call for proposals..." data-via="SciPyConf" data-size="large">Tweet</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

<div class="callout_row">
<div class="g-plusone" data-annotation="inline" data-width="140" data-href="http://conference.scipy.org/scipy2013/speaking_overview.php"></div>
</div>

<div class="callout_row">
<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/Share" data-url="http://conference.scipy.org/scipy2013/speaking_overview.php" data-counter="right"></script>
</div>

<div class="callout_row">
<div class="fb-like" data-href="http://conference.scipy.org/scipy2013/speaking_overview.php" data-send="false" data-layout="button_count" data-width="170" data-show-faces="false"></div></div>

<div class="callout_row">
<a href="http://www.reddit.com/submit" onclick="window.location = 'http://www.reddit.com/submit?url=http://conference.scipy.org/scipy2013/speaking_overview.php' + encodeURIComponent(window.location); return false"> <img src="http://www.reddit.com/static/spreddit7.gif" alt="submit to reddit" border="0" /> </a>
</div>

</div>

<p>SciPy 2013, the twelfth annual Scientific Computing with Python conference, will
be held this June 24th-29th in Austin, Texas. SciPy is a community dedicated to
the advancement of scientific computing through open source Python software for
mathematics, science, and engineering. The annual SciPy Conference allows
participants from academic, commercial, and governmental organizations to showcase
their latest projects, learn from skilled users and developers, and collaborate on
code development.</p>

<p>The deadline for abstract submissions is <em><?php echo $date_m ?></em>.  Submissions are
welcome that address general scientific computing with Python, or one of the two
special themes for this years conference, or the domain-specific mini-symposia
held during the conference.  Examples talks from previous years are available
online [1].</p>

<h2>Themes</h2>

<p>Two specialized tracks run in parallel to the general conference:</p>

<ul>
<li>Machine learning</li>
<li>Reproducible science</li>
</ul>

<p>Mini-symposia on the following topics are also being organized:</p>

<ul>
<li>Medical imaging</li>
<li>Meteorology, climatology, and atmospheric and oceanic science</li>
<li>Astronomy and astrophysics</li>
<li>Bioinformatics</li>
</ul>

<h2>Abstracts submission</h2>

<p>The 150-300 word abstract should concisely describe software of interest to the
SciPy community, tools or techniques for more effective computing, or how
scientific Python was applied to solve a research problem.  A traditional
background/motivation, methods, results, and conclusion structure is encouraged
but not required.  Links to project websites, source code repositories, figures,
full papers, and evidence of public speaking ability are encouraged.</p>

<p>Each abstract will be peer-reviewed by multiple members of the Program Committee
Board.  Please submit your abstract at the SciPy 2013 website [2] <a href="speaking_submission.php">abstract submission
form</a>.  Abstracts will be accepted for posters or presentations.</p>

<h2>Publications</h2>

<p>Optional papers to be published in the conference proceedings will be requested following abstract submission. This year the proceedings will be made available prior to the conference to help attendees navigate the conference.  These papers will be reviewed and posted in webform via the SciPy Proceedings guidelines at <a href="https://github.com/scipy/scipy_proceedings">https://github.com/scipy/scipy_proceedings</a>.</p>

<p>Additionally,  SciPy 2013 participants will be invited to submit full and original research papers to be reviewed for a focus issue on Scientific Computing with Python in Computational Science & Discovery (CSD), IOP Publishing's electronic-only, multidisciplinary journal for the computational science community.  Further details (guest editors, issue scope, submission details, etc) will be announced soon.  More information about CSD can be found at the journal's website: <a href="http://www.iopscience.org/csd">http://www.iopscience.org/csd</a></p>

<hr />

<p>The SciPy 2013 Program Committee Chairs</p>

<ul>
<li>Matt McCormick, Kitware, Inc.</li>
<li>Katy Huff, University of Wisconsin-Madison and Argonne National Laboratory</li>
</ul>
<p>[1]: <a href="http://conference.scipy.org/past.html">http://conference.scipy.org/past.html</a><br />
[2]: <a href="http://conference.scipy.org/scipy2013/">http://conference.scipy.org/scipy2013/</a></p>


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