<!DOCTYPE html>
<html lang="en">
 <head>
<?php
include "../lib/database/koneksi.php";
include "../lib/database/fungsi_gambar.php";
$id = $_GET['id'];
$query = "select id_berita,kategori,judul_berita,isi_berita,tgl_input,gambar,label from berita where id_berita=$id";
$sql = mysqli_query($koneksi, $query);
while ($data=mysqli_fetch_assoc($sql))
{ 
?> 
  <meta charset="utf-8">
  <title>Himapala Unesa</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="<?php echo $data['judul_berita'];?>" name="description">

  <!-- Favicons -->
  <link href="../img/favicon.ico" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i|Montserrat:300,300i,400,400i,700,700i" rel="stylesheet">

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
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v6.0"></script>
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
<section id="blog" class="padd-sectionart wow fadeIn">
	<div class="containerart text-left"><br><br>
		<div class="row">
			<div class="col-12 col-md-8">
	  		<img src="../administrator/admin/update_posting/kcfinder/upload/files/<?php echo $data['gambar'];?>" style="max-width:100%"><br><br><br>
			<h1 style="color:#4CAF50;font-size:30px;font-family: 'Montserrat', sans-serif; font-weight:bold" align="left"><?php echo $data['judul_berita'];?></h1><br>
	  		<span style="color:#4CAF50"><?php echo $data['tgl_input'];?> | himapala.unesa.ac.id</span><br>
			<span style="color:#4CAF50">Share:</span>
	  		<div class="btn">
       		<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter" data-show-count="false" target="blank"><i class="fa fa-twitter"></i></a>
        	</div>
			<div class="btn">
			<a href="whatsapp://send?text=http%3A%2F%2Fhimapala.unesa.ac.id%2Fartikel%2Freadmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>" target="_blank"><i class="fa fa-whatsapp"></i></a>
			</div>
			<div class="btn">
			<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://himapala.unesa.ac.id/artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
			</div>	    
 			<div class="btn">
         	<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fhimapala.unesa.ac.id%2Fartikel%2Freadmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>&amp;src=sdkpreparse" target="blank" class="facebook"><i class="fa fa-facebook"></i></a>
	 		</div>
			<div class="line-it-button" data-lang="en" data-type="share-a" data-ver="3" data-url="http://himapala.unesa.ac.id/artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>" data-color="grey" data-size="small" data-count="true" style="display: none;"></div>
 <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
	  		<p><?php echo $data['isi_berita'];?></p><br>
			<span style="color:#4CAF50">Share:</span>
	  		<div class="btn">
       		<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter" data-show-count="false" target="blank"><i class="fa fa-twitter"></i></a>
        	</div>
			<div class="btn">
			<a href="whatsapp://send?text=http%3A%2F%2Fhimapala.unesa.ac.id%2Fartikel%2Freadmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>" target="_blank"><i class="fa fa-whatsapp"></i></a>
			</div>
			<div class="btn">
			<a href="https://www.linkedin.com/shareArticle?mini=true&url=http://himapala.unesa.ac.id/artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
			</div>	    
 			<div class="btn">
         	<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fhimapala.unesa.ac.id%2Fartikel%2Freadmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>&amp;src=sdkpreparse" target="blank" class="facebook"><i class="fa fa-facebook"></i></a>
	 		</div>
			<div class="line-it-button" data-lang="en" data-type="share-a" data-ver="3" data-url="http://himapala.unesa.ac.id/artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>" data-color="grey" data-size="small" data-count="true" style="display: none;"></div>
 <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script><br>	   
			<div class="fb-comments" data-href="http://himapala.unesa.ac.id/artikel/readmore.php?id=&lt;?php echo $data[&#039;id_berita&#039;];?&gt;&amp;name=&lt;?php echo $data[&#039;judul_berita&#039;];?&gt;" data-width="100%" data-numposts="5" align="center" data-colorscheme="light">
	 		</div>
			</div>
		<div class="col-6 col-md-4">
<?php

$query = "select id_berita,kategori,judul_berita,isi_berita,tgl_input,gambar,label from berita order by id_berita DESC LIMIT 1";
$sql = mysqli_query($koneksi, $query);
while ($data=mysqli_fetch_assoc($sql))
{ 
?><!-- Koneksi select database -->
					<h2>Latest Article</h2>
					<div class="block-blog text-left">
					<a href="readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>"><img src="../administrator/admin/update_posting/kcfinder/upload/files/<?php echo $data['gambar'];?>"></a>
            		<div class="content-blog">
					<a href="readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>"><h4><?php echo $data['judul_berita'];?></h4></a>
					<span><?php echo $data['tgl_input'];?></span><br>
					<a class="pull-right readmore" href="readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>">Selengkapnya</a>
				</div>
					</div>
				</div>
<?php
}
}
?>
	 
	 </div>
</section>
</div>
</div><br>
<br>
		<div class="container">
		<form action="../cari/cari.php" method="get">
		<div class="form-group">
			<label>Pencarian :</label>
			<input type="text" name="cari" class="form-control" placeholder="Cari..">
		</div>
			<button type="submit" value="Cari" class="btn btn-primary">Cari</button>
		</form>
		</div><br><br>

<div class="container">
  <div class="buttonart">
      <a href="articles.php" class="buttonart">Lihat Semua Artikel</a>
	  <a href="../index.php" class="buttonart">Home</a>
   </div>
   </div><br>
<br>
<br>
<br>
<br>
<br>

<section id="contact" class="padd-section wow fadeInUp">
    <div class="container">
      <div class="section-title text-center">
        <h2>Kontak</h2>
    </div>
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
</div>
</div>
</section>
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