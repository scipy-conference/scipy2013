<header id="page_header">

<?php 
//===============================================
//  USER AUTHORIZATION                         //
//===============================================

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