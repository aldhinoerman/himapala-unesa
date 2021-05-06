<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <title>Himapala Unesa</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../img/favicon.ico" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Himapala Unesa
    Theme URL: http://himapala.unesa.ac.id
    Author: Admin Himapala
    License: http://himapala.unesa.ac.id/license
  ======================================================= -->
</head>
<body>
<header id="header" class="header header-hide">
    	<div class="container">

      		<div id="logo" class="pull-left">
        	<h1><a href="../index.php#body"><img src="../img/logo himapal.png" width="25" height="35">Himapala Unesa</a></h1>
      		</div>

		<nav id="nav-menu-container">
        	<ul class="nav-menu">
          	<li><a href="../index.php#hero">Home</a></li>
		  	<li class="menu-active"><a href="../index.php#blog">Blog</a></li>
			 <li><a href="../index.php#podcast">Podcast</a></li> 
          	<li><a href="../index.php#screenshots">Galeri</a></li>
			<li><a href="../index.php#divisi">Divisi</a></li>
          	<li><a href="../index.php#team">Struktur Pengurus</a></li>
          	<li><a href="../index.php#pricing">Pendanaan</a></li>
          	<li><a href="../index.php#contact">Kontak</a></li>
        	</ul>
      	</nav><!-- #nav-menu-container -->
    	</div>
	</header><!-- #header -->
<!--==========================
    Blog
============================-->
	<section id="blog" class="padd-section wow fadeInUp">
    	<div class="container">
      		<div class="section-title text-center">
        	<h2>Podcast</h2>
      		</div>
    	</div>
		<div class="container">
      		<div class="row">
<?php
include "../lib/database/koneksi.php";
include "../lib/database/fungsi_gambar.php";
include "../lib/database/fungsi_podcast.php";
if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$query = "select * from podcast WHERE judul_podcast like '%".$cari."%'";
} else {
$halaman = 9; //batasan halaman
$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$query = "select id_podcast, judul_podcast, deskripsi_podcast, gambar_podcast, file_podcast, tgl_podcast from podcast order by id_podcast DESC LIMIT $mulai, $halaman";
}
$result = $koneksi->query($query);
if ($result->num_rows > 0) {
while ($data = $result->fetch_assoc())
{	
?>
				<div class="col-md-6 col-lg-4">
          			<div class="block-blog text-left">
            		<a href="podcastmore.php?id=<?php echo $data['id_podcast'];?>&name=<?php echo $data['judul_podcast'];?>"><img src="../administrator/admin/update_posting/kcfinder/upload/files/<?php echo $data['gambar_podcast'];?>"></a>
            		<div class="content-blog">
              		<a href="podcastmore.php?id=<?php echo $data['id_podcast'];?>&name=<?php echo $data['judul_podcast'];?>"><h4>[PODCAST]<?php echo $data['judul_podcast'];?></h4></a>
              		<span><?php echo $data['tgl_podcast'];?></span><br>
              		<a class="pull-right readmore" href="podcastmore.php?id=<?php echo $data['id_podcast'];?>&name=<?php echo $data['judul_podcast'];?>">Dengarkan</a>
            		</div>
          		</div>
        	</div>
<?php
}
?>
		</div><br><br>
<div class="container">
<div class="row">
<?php for ($i=1; $i<=$pages ; $i++){ ?>
  		<a href="?halaman=<?php echo $i; ?>"><button class="buttonhal button5"><?php echo $i; ?>
  		</button></a>
  		</div>
		</div>
  <?php } 
  } else {
echo "";
}
  ?>
	</section>
<div class="container">
		<form action="podcast.php" method="get">
		<div class="form-group">
			<label>Pencarian :</label>
			<input type="text" name="cari" class="form-control" placeholder="Cari..">
		</div>
			<button type="submit" value="Cari" class="btn btn-primary">Cari</button>
		</form>
		</div><br><br>
  
<div class="container">
<div class="buttonart">
	<a href="../index.php" class="buttonart">Home</a>
</div>
</div>
   <br>
   <br>
   <br /><br />
<br />

<!--==========================
    Agenda
  ============================-->
	<section id="agenda" class="padd-section text-center wow fadeInUp">
		<div class="container">
			<div class="section-title text-center">
			<h2>Agenda Himapala</h2>
			</div>
    	</div><!-- Judul BPH -->
		<div class="container">
			<div class="row justify-content-center">
		    <iframe src="../lib/calendar/index.php" style="border:thin" width="100%" height="800"></iframe>
		  	</div>	
        </div>
	</section>

<!--==========================
    Contact
============================-->
	<section id="contact" class="padd-section wow fadeInUp">

    	<div class="container">
      		<div class="section-title text-center">
        	<h2>Kontak</h2>
    		</div>
    	<div class="container">
      		<div class="row justify-content-center">

        		<div class="col-lg-3 col-md-4">
          		<div class="info">
            	<div>
              	<i class="fa fa-map-marker"></i>
              	<p>Gedung P7 Kampus Lidah Wetan<br>Universitas Negeri Surabaya</p>
            	</div>

            	<div class="email">
              	<i class="fa fa-envelope"></i>
              	<p>hmpl.unesa@gmail.com</p>
            	</div>

            	<div>
              	<i class="fa fa-phone"></i>
              	<p>+6281235287232 (Nizar)</p>
            	</div>
          	</div>

          <div class="social-links">
            <a href="https://www.twitter.com/hmpl_unesa" target="blank" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com/himapala.unesa" target="blank" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/himapala.unesa" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
          </div>
		 </div>
		  <br>
<br>
<br>
	</section><!-- #contact -->

  <!--==========================
    Footer
  ============================-->
 
	<footer class="footer">
    	<div class="container">
      		<div class="row">
            <p>Gedung P7 Kampus Lidah Wetan<br>Universitas Negeri Surabaya</p>
          	</div>
        </div>
  	</footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/superfish/hoverIntent.js"></script>
  <script src="../lib/superfish/superfish.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../lib/modal-video/js/modal-video.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>
  
  </body>
</html>