<header id="page_header">

<?php 
//===============================================
//  USER AUTHORIZATION                         //
//===============================================

if(!isset($_SESSION['formregusername'])){

echo "<div id=\"account_nav\">
<a href=\"registered_login.php\">Sign in</a> | <a href=\"create_acount.php\">Create Account</a>
  </div>";
}
else

{

echo "<div id=\"account_nav\">
    <a href=\"reg_logout.php\">Log out</a>
  </div>";
}


?>



  <div class="header_logo">
    <a href="index.php"><img src="<?php if ($thisPage == 'Admin') {echo "../";} ?>img/scipysticker.png" id="Python" alt="SciPy2013" width="359" height="99" /></a>
  </div>

  <div class="header_tagline">
    Scientific Computing with Python <br /> Austin, Texas • June 24-29
  </div>
</header>

<div style="clear:both;"></div>

<div id="nav">
  <?php include("menu.php") ?>
</div>