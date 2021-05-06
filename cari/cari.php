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
          	<li class="menu-active"><a href="../index.php#hero">Home</a></li>
		  	<li><a href="../index.php#blog">Blog</a></li>
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
	<section id="search" class="padd-section wow fadeInUp">
	<div id="blog">
    	<div class="container">
      		<div class="section-title text-center">
        	<h2>Hasil Pencarian</h2>
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
$query = "select * from berita WHERE judul_berita like '%".$cari."%'";
} else {
$query = "select * from berita";
}
$result = $koneksi->query($query);
if ($result->num_rows > 0) {
while ($data = $result->fetch_assoc())
{
?>		
				<div class="col-md-6 col-lg-4">
          			<div class="block-blog text-left">
            		<a href="../artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>"><img src="../administrator/admin/update_posting/kcfinder/upload/files/<?php echo $data['gambar'];?>"></a>
            		<div class="content-blog">
              		<a href="../artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>"><h4><?php echo $data['judul_berita'];?></h4></a>
              		<span><?php echo $data['tgl_input'];?></span><br>
              		<a class="pull-right readmore" href="../artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>">Selengkapnya</a>
            		</div>
          			</div>
        		</div>
<?php
}
} else {
echo "";
}
?>
			</div>
		</div><br>
		<div class="container">
			<div class="row">
<?php
include "../lib/database/koneksi.php";
if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$query = "select * from podcast WHERE judul_podcast like '%".$cari."%'";
} else {
$query = "select * from podcast";
}
$result = $koneksi->query($query);
if ($result->num_rows > 0) {
while ($data = $result->fetch_assoc())
{		
?><!-- Koneksi select database -->
				<div class="col-md-6 col-lg-4">
					<div class="block-blog text-left">
					<a href="../podcast/podcastmore.php?id=<?php echo $data['id_podcast'];?>&name=<?php echo $data['judul_podcast'];?>"><img src="../administrator/admin/update_posting/kcfinder/upload/files/<?php echo $data['gambar_podcast'];?>"></a>
            	<div class="content-blog">
					<a href="../podcast/podcastmore.php?id=<?php echo $data['id_podcast'];?>&name=<?php echo $data['judul_podcast'];?>"><h4>[PODCAST] <?php echo $data['judul_podcast'];?></h4></a>
					<span><?php echo $data['tgl_podcast'];?></span><br>
					<a class="pull-right readmore" href="../podcast/podcastmore.php?id=<?php echo $data['id_podcast'];?>&name=<?php echo $data['judul_podcast'];?>">Dengarkan</a>
				</div>
					</div>
				</div>
<?php
}
} else {
echo "";
}
?>
			</div>
		</div>
	</div>
	</div><br>
	<div id="pricing">
			<div class="container">
      		<div class="row">
<?php
include "../lib/database/koneksi.php";
if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$query = "select * from pendanaan WHERE nama_produk like '%".$cari."%'";
} else {
$query = "select * from pendanaan";
}
$result = $koneksi->query($query);
if ($result->num_rows > 0) {
while ($data = $result->fetch_assoc())
{		
?>		
				<div class="col-md-6 col-lg-3">
					<div class="block-pricing text-center">
					<div class="table">
                	<h4><?php echo $data['nama_produk'];?></h4>
              		<img src="../administrator/admin/update_posting/kcfinder/upload/files/<?php echo $data['gambar_produk'];?>" class="img-fluid">
			  		<ul class="list-unstyled">
                	<li><h4>Rp <?php echo $data['harga_produk'];?></h4></li>
					<li>Ukuran: <?php echo $data['ukuran_produk'];?></li>
                	<li>Bahan: <?php echo $data['bahan_produk'];?></li>
                	<li>Metode Bayar: <?php echo $data['bayar_cash'];?> | <?php echo $data['bayar_dp'];?></li>
                	<li>Pengiriman: <?php echo $data['kirim'];?></li>
                	<li>Sisa Barang:<?php if ($data['sisa'] < "1") { echo "Habis"; } else {echo $data['sisa'];}?></li>
					</ul>
              	<div class="table_btn">
                <a href="../pendanaan/konfirmasi.php?id=<?php echo $data['id_produk'];?>&name=<?php echo $data['nama_produk'];?>" class="btn" name="beli"><i class="fa fa-shopping-cart"></i>Beli Sekarang</a>
              	</div>
            	</div>
          	</div>
        </div>
<?php
}
} else {
echo "";
}
?>
</div>
</div>
</div><br>
<div id="blog">
<div class="container">
      		<div class="row">
<?php
include "../lib/database/koneksi.php";
if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$query = "select * from data_db WHERE nama_data like '%".$cari."%'";
} else {
$query = "select * from data_db order by id_data";
}
$result = $koneksi->query($query);
if ($result->num_rows > 0) {
while ($data = $result->fetch_assoc())
{	
?>
				<div class="col-md-6 col-lg-4">
          			<div class="block-blog text-left">
            		<div class="content-blog">
              		<h4><?php echo $data['nama_data'];?></h4>
              		<span><?php echo $data['tgl_data'];?></span><br>
              		<a class="pull-right btn" style="color:#71c55d"href="../data/download.php?filename=<?=$data['file_data'];?>"><i class="fa fa-download">Download</i></a>
            		</div>
          		</div>
        	</div>
<?php
}
} else {
echo "";
}
?>
		</div>
	</div>
	</section><!-- Blog kotak Home -->
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