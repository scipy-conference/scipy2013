<div id="subs">
<ul>
	<li<?php if ($thisSub=="Main") echo " id=\"currentsub\""; ?>><a href="index.php">main</a></li>
	<li<?php if ($thisSub=="Registrants") echo " id=\"currentsub\""; ?>><a href="registrants.php">Registrants</a></li>
	<li<?php if ($thisSub=="Talks") echo " id=\"currentsub\""; ?>><a href="presentations.php">Talks</a></li>
	<li<?php if ($thisSub=="Posters") echo " id=\"currentsub\""; ?>><a href="posters.php">Posters</a></li>
	<li<?php if ($thisSub=="Sponsorships") echo " id=\"currentsub\""; ?>><a href="sponsorship_requests.php">Spnsr Requests</a></li>
	<li<?php if ($thisSub=="Logout") echo " id=\"currentsub\""; ?>><a href="logout.php">Log Out</a></li>
</ul>
</div>
