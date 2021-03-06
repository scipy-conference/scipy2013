<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php $thisPage="John Hunter Excellence in Plotting Contest"; ?>
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

<h1>SciPy John Hunter Excellence in Plotting Contest</h1>

<div class="callout">
<h1>Spread the news...</h1>

<div class="callout_row">
  <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://conference.scipy.org/scipy2013/john_hunter_plotting_contest.php" data-text="SciPy John Hunter Plotting Contest..." data-via="SciPyConf" data-size="large">Tweet</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

<div class="callout_row">
<div class="g-plusone" data-annotation="inline" data-width="140" data-href="http://conference.scipy.org/scipy2013/john_hunter_plotting_contest.php"></div>
</div>

<div class="callout_row">
<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/Share" data-url="http://conference.scipy.org/scipy2013/john_hunter_plotting_contest.php" data-counter="right"></script>
</div>

<div class="callout_row">
<div class="fb-like" data-href="http://conference.scipy.org/scipy2013/john_hunter_plotting_contest.php" data-send="false" data-layout="button_count" data-width="170" data-show-faces="false"></div></div>

<div class="callout_row">
<a href="http://www.reddit.com/submit" onclick="window.location = 'http://www.reddit.com/submit?url=http://conference.scipy.org/scipy2013/sjohn_hunter_plotting_contest.php' + encodeURIComponent(window.location); return false"> <img src="http://www.reddit.com/static/spreddit7.gif" alt="submit to reddit" border="0" /> </a>
</div>

</div>

<p>In memory of John Hunter, we are pleased to announce the first SciPy John Hunter Excellence in Plotting Competition. This open competition aims to highlight the importance of quality plotting to scientific progress and showcase the capabilities of the current generation of plotting software. Participants are invited to submit scientific plots to be judged by a panel. The winning entries will be announced and displayed at the conference.</p>

<p>NumFOCUS is graciously sponsoring cash prizes for the winners in the following amounts:</p>

<ul>
  <li>1st prize: $500</li>
  <li>2nd prize: $200</li>
  <li>3rd prize: $100</li>
</ul>

<p>We look forward to exciting submissions that push the boundaries of plotting, in this, our first attempt at this kind of competition.</p>

<p>The SciPy Plotting Contest Organizer<br />
-Michael Droettboom, Space Telescope Science Institute</p>
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