<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <title>Himapala Unesa</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="Himpunan Mahasiswa Pencinta Alam Universitas Negeri Surabaya" name="description">

  <!-- Favicons -->
  <link href="img/favicon.ico" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

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
				<h1><a href="#body"><img src="img/logo himapal.png" width="25" height="35">Himapala Unesa</a></h1>
        		<!-- Logo Header -->
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					<li class="menu-active"><a href="#hero">Home</a></li>
					<li><a href="#blog">Blog</a></li>
					<li><a href="#podcast">Podcast</a></li>    
					<li><a href="#screenshots">Galeri</a></li>
					<li><a href="#divisi">Divisi</a></li>
					<li><a href="#team">Struktur Pengurus</a></li>
					<li><a href="#pricing">Pendanaan</a></li>
					<li><a href="#contact">Kontak</a></li>
					</li>
				</ul>
			</nav><!-- #nav-menu-container -->
		</div>
	</header><!-- #header -->
  <!--==========================
    Hero Section
  ============================-->
	<section id="hero" class="wow fadeIn">
    	<div class="hero-container">
			<img src="img/logo.png" class="img-responsive" alt="Hero Imgs">    
	 	</div>
		<div class="container">
		<form action="cari/cari.php" method="get">
		<div class="form-group">
			<label>Pencarian :</label>
			<input type="text" name="cari" class="form-control" placeholder="Cari..">
		</div>
			<button type="submit" value="Cari" class="btn btn-primary">Cari</button>
		</form>
		</div>

	</section>
<!--==========================
    Blog Section
============================-->
	<section id="blog" class="padd-section wow fadeInUp">
		<div class="container">
      		<div class="section-title text-center">
        		<h2>Artikel</h2>
      		</div>
    	</div>
		<div class="container">
			<div class="row">
<?php
include "lib/database/koneksi.php";
include "lib/database/fungsi_gambar.php";

$query = "select id_berita,kategori,judul_berita,isi_berita,tgl_input,gambar from berita order by id_berita DESC LIMIT 3";
$sql = mysqli_query($koneksi, $query);
while ($data=mysqli_fetch_assoc($sql))
{ 
?><!-- Koneksi select database -->
				<div class="col-md-6 col-lg-4">
					<div class="block-blog text-left">
					<a href="artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>"><img src="administrator/admin/update_posting/kcfinder/upload/files/<?php echo $data['gambar'];?>"></a>
            	<div class="content-blog">
					<a href="artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>"><h4><?php echo $data['judul_berita'];?></h4></a>
					<span><?php echo $data['tgl_input'];?></span><br>
					<a class="pull-right readmore" href="artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>">Selengkapnya</a>
				</div>
					</div>
				</div>
<?php
}
?>
			</div>
		</div>
	</section><!-- Blog kotak Home -->
<div class="container">
	<div class="buttonart">
	<a href="artikel/articles.php" class="buttonart">Lihat Semua Artikel</a>
   	</div>
</div>
   <br>
   <br><!-- Button View Artikel -->
   
   <!--==========================
    Podcast Section
============================-->
	<section id="podcast" class="padd-section wow fadeInUp">
    <div id="blog">	
		<div class="container">
      		<div class="section-title text-center">
        		<h2>Podcast</h2>
      		</div>
    	</div>
		<div class="container">
			<div class="row">
<?php
include "lib/database/koneksi.php";
include "lib/database/fungsi_podcast.php";

$query = "select id_podcast, judul_podcast, deskripsi_podcast, gambar_podcast, file_podcast, tgl_podcast from podcast order by id_podcast DESC LIMIT 3";
$sql = mysqli_query($koneksi, $query);
while ($data=mysqli_fetch_assoc($sql))
{ 
?><!-- Koneksi select database -->
				<div class="col-md-6 col-lg-4">
					<div class="block-blog text-left">
					<a href="podcast/podcastmore.php?id=<?php echo $data['id_podcast'];?>&name=<?php echo $data['judul_podcast'];?>"><img src="administrator/admin/update_posting/kcfinder/upload/files/<?php echo $data['gambar_podcast'];?>"></a>
            	<div class="content-blog">
					<a href="podcast/podcastmore.php?id=<?php echo $data['id_podcast'];?>&name=<?php echo $data['judul_podcast'];?>"><h4>[PODCAST] <?php echo $data['judul_podcast'];?></h4></a>
					<span><?php echo $data['tgl_podcast'];?></span><br>
					<a class="pull-right readmore" href="podcast/podcastmore.php?id=<?php echo $data['id_podcast'];?>&name=<?php echo $data['judul_podcast'];?>">Dengarkan</a>
				</div>
					</div>
				</div>
<?php
}
?>
			</div>
		</div>
	</div>
	</section><!-- Blog kotak Home -->
<div class="container">
	<div class="buttonart">
	<a href="podcast/podcast.php" class="buttonart">Lihat Semua Podcast</a>
   	</div>
</div>
   <br>
   <br><!-- Button View Artikel -->

<!--==========================
    Galeri Humas
============================-->
	<section id="screenshots" class="padd-section text-center wow fadeInUp">
		<div class="container">
      		<div class="section-title text-center">
        	<h2>Galeri Humas</h2>
			</div>
    	</div><!-- Judul Galeri Humas -->
    	<div class="container">
      		<div class="owl-carousel owl-theme">
        	<div><iframe src="https://www.instagram.com/p/B5Ei7pYAkyH/embed" frameborder="0" scrolling="no" allowtransparency="true"></iframe></div>
        	<div><iframe src="https://www.instagram.com/p/B0yHQtygFb5/embed" frameborder="0" scrolling="no" allowtransparency="true"></iframe></div>
        	<div><iframe src="https://www.instagram.com/p/Bz0W4EVAfIB/embed" frameborder="0" scrolling="no" allowtransparency="true"></iframe></div>
        	<div><iframe src="https://www.instagram.com/p/ByF0VJ4gSSq/embed" frameborder="0" scrolling="no" allowtransparency="true"></iframe></div>
			<div><iframe src="https://www.instagram.com/p/BxHTQM7goQq/embed" frameborder="0" scrolling="no" allowtransparency="true"></iframe></div>
        	<div><iframe src="https://www.instagram.com/p/Bua2wIxg3Qu/embed" frameborder="0" scrolling="no" allowtransparency="true"></iframe></div>
        	<div><iframe src="https://www.instagram.com/p/BbRC8zvBU6Q/embed" frameborder="0" scrolling="no" allowtransparency="true"></iframe></div>
        	<div><iframe src="https://www.instagram.com/p/BOhkWmjDz_E/embed" frameborder="0" scrolling="no" allowtransparency="true"></iframe></div>
        	<div><iframe src="https://www.instagram.com/p/BKzV8p5hVZW/embed" frameborder="0" scrolling="no" allowtransparency="true"></iframe></div>
		</div>
    	</div>
	</section>
<!--==========================
    Video Section
============================-->
	<section id="video" class="text-center wow fadeInUp">
    	<div class="overlay">
      		<div class="container-fluid container-full">
        		<div class="row">
          		<iframe width="1500" height="400" src="https://www.youtube.com/embed/videoseries?list=PLhVtYyY7_BtzGaYCq-XZnoSRhgVB048Zk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen align="middle"></iframe><!-- Embed Playlist Youtube Himapala -->
        		</div>
			</div>
		</div>
	</section>
<!--==========================
    Divisi Section
============================-->
<section id="divisi" class="padd-section wow fadeInUp">
		<div class="container">
      		<div class="section-title text-center">
        		<h2>Divisi</h2>
      		</div>
		<div id="features">
		<div class="container text-center">
        <div class="row">

          <div class="col-md-6 col-lg-3">
            <div class="feature-block">
              <img src="img/divisi/11.png" alt="img" class="img-fluid">
              <h4>Gunung Hutan</h4>
              <p>Navigasi Darat dan Kemampuan Survival Adalah Harta Yang Menyelamatkanmu</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="feature-block">
              <img src="img/divisi/12.png" alt="img" class="img-fluid">
              <h4>Panjat Tebing</h4>
              <p>Aku, Tebing, Tuhan</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="feature-block">
              <img src="img/divisi/13.png" alt="img" class="img-fluid">
              <h4>Susur Gua</h4>
              <p>Dibawah Tempat Berpijak Ada Harta Di Bumi Terdalam</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="feature-block">
              <img src="img/divisi/14.png" alt="img" class="img-fluid">
              <h4>Arung Jeram</h4>
              <p>Hanya Antara Aku Dan Sungai</p>
            </div>
          </div>

          <div class="container">
            <div class="feature-block" align="center">
              <img src="img/divisi/15.png" alt="img" class="img-fluid">
              <h4>Selam</h4>
              <p>Terumbu Karang Rumah Ikan, Laut Pertanda Peradaban Manusia</p>
            </div>
          </div>

        </div>
      </div>
	 </div><br><br>
<div class="container">
	<div class="buttonart">
	<a href="database/index.php" class="buttonart">Database</a>
   	</div>
</div><br><br><br><br>
		<div id="blog">	
		<div class="container">
			<div class="row">
<?php
include "lib/database/koneksi.php";

$query = "select id_berita,kategori,judul_berita,isi_berita,tgl_input,gambar,label from berita WHERE label='Divisi' order by id_berita DESC LIMIT 3";
$result = $koneksi->query($query);
if ($result->num_rows > 0) {
while ($data = $result->fetch_assoc())
{
?><!-- Koneksi select database -->
				<div class="col-md-6 col-lg-4">
					<div class="block-blog text-left">
					<a href="artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>"><img src="administrator/admin/update_posting/kcfinder/upload/files/<?php echo $data['gambar'];?>"></a>
            	<div class="content-blog">
					<a href="artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>"><h4> <?php echo $data['judul_berita'];?></h4></a>
					<span><?php echo $data['tgl_input'];?></span><br>
					<a class="pull-right readmore" href="artikel/readmore.php?id=<?php echo $data['id_berita'];?>&name=<?php echo $data['judul_berita'];?>">Selengkapnya</a>
				</div>
					</div>
				</div>
<?php
}
} else {
echo "";
}
$koneksi->close();
?>
			</div>
		</div>
	</div>
	</section><!-- Blog kotak Home -->
<!--==========================
    Pengurus
============================-->
	<section id="team" class="padd-section text-center wow fadeInUp">
		<div class="container">
			<div class="section-title text-center">
			<h2>Struktur Pengurus</h2>
			<p class="separator">BPH DAN PENGURUS</p>
			</div>
    	</div><!-- Judul BPH -->
    	<div class="container">
      		<div class="row">
        		<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1120.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Pembina</span><br>
              	<h4>Pratiwi Retnaningdyah</h4>
            	</div>
          			</div>
        		</div>
				
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1121.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Pengarah</span><br>
              	<h4>Dwi Zulaikah</h4>
            	</div>
          			</div>
        		</div>
				
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1122.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Pengarah</span><br>
              	<h4>Adi Ruswiono</h4>
            	</div>
          			</div>
        		</div>
				
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/111.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Ketua Umum</span><br>
			  	<span>HMPL. 1709007</span>
              	<h4>Ridwan Susanto</h4>
            	</div>
          			</div>
        		</div>
				
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/112.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Sekretaris</span><br>
			  	<span>HMPL. 1803014</span>
              	<h4>Prillya Indah</h4>
            	</div>
          			</div>
        		</div>
				
         		<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/113.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Bendahara</span><br>
			  	<span>HMPL. 1803005</span>
              	<h4>Alfi Lailatul Khoiria</h4>
            	</div>
          			</div>
        		</div>
				
        		<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/114.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Ketua 1</span><br>
			  	<span>HMPL. 1803004</span>
              	<h4>Aldhiyansyah Noerman</h4>
            	</div>
          			</div>
        		</div>
				
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/115.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Ketua 2</span><br>
			  	<span>HMPL. 1905001</span>
              	<h4>Maharani Syahdilla</h4>
            	</div>
        			</div>
        		</div>
				
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/116.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Koor. Operasional</span><br>
			  	<span>HMPL. 1803009</span>
              	<h4>M. Rizky Ferdiansyah</h4>
            	</div>
          			</div>
        		</div>
				
		 		<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/117.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Operasional</span><br>
			  	<span>HMPL. 1709002</span>
              	<h4>Indraprasta B.B.</h4>
            	</div>
          			</div>
        		</div>
				
		 		<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/118.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Koor. Logistik</span><br>
			  	<span>HMPL. 1709005</span>
              	<h4>M. Faisal Tholib</h4>
            	</div>
          			</div>
        		</div>
				
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/119.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Logistik</span><br>
			  	<span>HMPL. 1905003</span>
              	<h4>Pratiwi Wahyunissa</h4>
            	</div>
          			</div>
        		</div>
		
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1110.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Koor. Dikbang</span><br>
			  	<span>HMPL. 1709006</span>
              	<h4>M. Syahrul Khoir</h4>
            	</div>
          			</div>
        		</div>
		
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1111.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Dikbang</span><br>
			  	<span>HMPL. 1803016</span>
              	<h4>Rizky Dwi Kurnia</h4>
            	</div>
          			</div>
        		</div>
		
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1112.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Koor. Humas</span><br>
			  	<span>HMPL. 1709004</span>
              	<h4>M. Nizar Bagoes</h4>
            	</div>
          			</div>
        		</div>
		
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1113.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Humas</span><br>
			  	<span>HMPL. 1905002</span>
              	<h4>M. Khizbunnashr</h4>
            	</div>
          			</div>
        		</div>
		
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1114.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Humas</span><br>
			  	<span>HMPL. 1905004</span>
              	<h4>Savina Nur Hidayah</h4>
            	</div>
          			</div>
        		</div>
		
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1115.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Koor. Usaha</span><br>
			  	<span>HMPL. 1803002</span>
              	<h4>Adek Setiawahyunengtyas</h4>
            	</div>
          			</div>
        		</div>
		
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1116.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              		<span>Usaha</span><br>
			  		<span>HMPL. 1803016</span>
              		<h4>Syifaur Rahmah</h4>
            	</div>
          			</div>
        		</div>

				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1119.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Usaha</span><br>
			  	<span>HMPL. 1803017</span>
              	<h4>Yunus Dzikril Furqon</h4>
            	</div>
          			</div>
        		</div>

		
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1117.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>Koor. POPA-LH</span><br>
			  	<span>HMPL. 1803018</span>
              	<h4>Trio Adi Saputra</h4>
            	</div>
          			</div>
        		</div>
		
				<div class="col-md-6 col-md-4 col-lg-3">
          			<div class="team-block bottom">
            		<img src="img/team/1118.jpg" class="img-responsive" alt="img">
            	<div class="team-content">
              	<span>POPA-LH</span><br>
			  	<span>HMPL. 1803015</span>
              	<h4>Rahmawati Laela</h4>
            	</div>
          			</div>
        		</div>
		</div>
	</section>
<!--==========================
    Testimonials Section
============================-->
	<section id="testimonials" class="padd-section text-center wow fadeInUp">
    	<div class="container">
      		<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="testimonials-content">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
                		<div class="carousel-item  active">
                  			<div class="top-top">
                    		<p>Alam sebagai sarana pendidikan dan bukan cuma petualangan.</p>
                    		<h4>Norman Edwin<span>1955-1992</span></h4>
                  			</div>
                		</div>
						
                		<div class="carousel-item ">
                  			<div class="top-top">
							<p>Petualangan terbesar dalam hidup Anda adalah perjuangan meraih mimpi.</p>
                    		<h4>Oprah Winfrey<span>Aktris</span></h4>
                  			</div>
                		</div>

                		<div class="carousel-item ">
                  			<div class="top-top">
                    		<p>Jangan pernah berkata tidak pada petualangan. Selalu katakan ya, jika tidak kau akan menjalani hidup yang sangat membosankan.</p>
                    		<h4>Ian Fleming<span>Penulis</span></h4>
                  			</div>
                		</div>
              				</div>
              			<div class="btm-btm">
                		<ul class="list-unstyled carousel-indicators">
                  		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
                		</ul>
              			</div>
            			</div>
          			</div>
        		</div>
      		</div>
    	</div>
	</section><!-- Kata Bijak -->
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
		    <iframe src="lib/calendar/index.php"></iframe>
		  	</div>	
        </div>
	</section>
  <!--==========================
    Pendanaan
  ============================-->
	<section id="pricing" class="padd-section text-center wow fadeInUp">
    	<div class="container">
      		<div class="section-title text-center">
        	<h2>Pendanaan</h2>
      		</div>
    	</div>
		<div class="container">
      		<div class="row">
<?php
include "lib/database/koneksi.php";
$query = "select id_produk,nama_produk,harga_produk,ukuran_produk,bahan_produk,bayar_cash,bayar_dp,kirim,sisa, gambar_produk from pendanaan order by id_produk DESC LIMIT 4";
$sql = mysqli_query($koneksi, $query);
while ($data=mysqli_fetch_assoc($sql))
{ 
?>		
				<div class="col-md-6 col-lg-3">
					<div class="block-pricing">
					<div class="table">
                	<h4><?php echo $data['nama_produk'];?></h4>
              		<img src="administrator/admin/update_posting/kcfinder/upload/files/<?php echo $data['gambar_produk'];?>" class="img-fluid">
			  		<ul class="list-unstyled">
                	<li><h4>Rp <?php echo $data['harga_produk'];?></h4></li>
					<li>Ukuran: <?php echo $data['ukuran_produk'];?></li>
                	<li>Bahan: <?php echo $data['bahan_produk'];?></li>
                	<li>Metode Bayar: <?php echo $data['bayar_cash'];?> | <?php echo $data['bayar_dp'];?></li>
                	<li>Pengiriman: <?php echo $data['kirim'];?></li>
                	<li>Sisa Barang:<?php if ($data['sisa'] < "1") { echo "Habis"; } else {echo $data['sisa'];}?></li>
					</ul>
              	<div class="table_btn">
                <a href="pendanaan/konfirmasi.php?id=<?php echo $data['id_produk'];?>&name=<?php echo $data['nama_produk'];?>" class="btn" name="beli"><i class="fa fa-shopping-cart"></i>Beli Sekarang</a>
              	</div>
            	</div>
          	</div>
        </div>
<?php
}
?>
	</section>
<!--==========================
    Contact Section
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
		  </div>
<br>
<br>
<br>
	</section> <!-- #contact -->
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
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/modal-video/js/modal-video.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  </body>
</html>