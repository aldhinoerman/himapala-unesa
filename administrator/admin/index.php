<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Admin Himapala Unesa</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../../img/favicon.ico" rel="shortcut icon"
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">
   <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../../css/style.css" rel="stylesheet">
 </head>
  <body>
<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}
?>
	<header id="header" class="header header-hide">
    	<div class="container">

      		<div id="logo" class="pull-left">
        	<h1><a href="#body"><img src="../../img/logo himapal.png" width="25" height="35">Himapala Unesa</a></h1>
      		</div>

      	<nav id="nav-menu-container">
        	<ul class="nav-menu">
          	<li class="menu-active"><a href="update_calendar/index.php">Update Agenda</a></li>
		  	<li class="menu-active"><a href="update_posting/index.php">Update Posting</a></li>
		  	<li class="menu-active"><a href="update_pendanaan/index.php">Update Pendanaan</a></li>
			<li class="menu-active"><a href="update_podcast/index.php">Update Podcast</a></li>
			<li class="menu-active"><a href="data/index.php">Database</a></li>
		  	<li class="menu-active"><a href="logout.php">logout</a></li>
          	</li>
        	</ul>
      	</nav><!-- #nav-menu-container -->
    	</div>
	</header><!-- #header -->
<br><br><br> 
<section id="testimonials" class="padd-section text-center wow fadeInUp">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="testimonials-content">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item  active">
                  <div class="top-top">
<h2>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.</h2>
 </div>
 </div>
</div>
 </div>
</div>
 </div>
</div>
 </div>
</section>
<div class="container">
  <div class="buttonart">
      <a href="update_posting/index.php" class="buttonart">Post Artikel</a>
	<a href="update_pendanaan/index.php" class="buttonart">Post Pendanaan</a>
	<a href="update_calendar/index.php" class="buttonart">Update Agenda Himapala</a>
	<a href="update_podcast/index.php" class="buttonart">Update Podcast</a>
	<a href="data/index.php" class="buttonart">Database</a>
	<a href="logout.php" class="buttonart">Logout</a>

   </div>
   </div>
 <!-- JavaScript Libraries -->
  <script src="../../lib/jquery/jquery.min.js"></script>
  <script src="../../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../lib/superfish/hoverIntent.js"></script>
  <script src="../../lib/superfish/superfish.min.js"></script>
  <script src="../../lib/easing/easing.min.js"></script>
  <script src="../../lib/modal-video/js/modal-video.js"></script>
  <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../../lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="../../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../../js/main.js"></script>
  </body>
</html>