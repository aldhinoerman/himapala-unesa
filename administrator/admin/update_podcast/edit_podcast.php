<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Admin Himapala Unesa</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <!-- Favicons -->
  <link href="../../../img/favicon.ico" rel="shortcut icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">
   <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="../../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../../lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="../../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../../lib/modal-video/css/modal-video.min.css" rel="stylesheet">
<!-- CK Editor -->
<script src="../update_posting/ckeditor/ckeditor.js"></script>
  <!-- Main Stylesheet File -->
  <link href="../../../css/style.css" rel="stylesheet">
</head>
<body>
 <?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../../index.php?pesan=belum_login");
	}
?>
	<header id="header" class="header header-hide">
    	<div class="container">
      		<div id="logo" class="pull-left">
        	<h1><a href="../index.php#body"><img src="../../../img/logo himapal.png" width="25" height="35">Himapala Unesa</a></h1>
      		</div>
      	<nav id="nav-menu-container">
        	<ul class="nav-menu">
          	<li><a href="../update_calendar/index.php">Update Calendar</a></li>
		  	<li><a href="../update_posting/index.html">Update Posting</a></li>
		  	<li><a href="../update_pendanaan/index.php">Update Pendanaan</a></li>
			<li class="menu-active"><a href="#">Update Podcast</a></li>
			<li><a href="../data/index.php">Database</a></li>
		  	<li><a href="../logout.php">logout</a></li>
          	</li>
        	</ul>
      	</nav><!-- #nav-menu-container -->
    	</div>
	</header><!-- #header -->
<!--==========================
    Tabel Podcast
============================--> 
	<section id="tabelartikel" class="padd-section wow fadeInUp">
		<div class="container">
		<div class="section-title text-center">
        	<h2>Podcastmu</h2>
      		</div>
		<form action="edit_podcast.php" method="get">
			<div class="form-group">
			<label>Pencarian :</label>
			<input type="text" name="cari" class="form-control" placeholder="Cari..">
			</div>
			<button type="submit" value="Cari" class="btn btn-primary">Cari</button>
		</form>
		</div><br>
<?php
include "../../../lib/database/koneksi.php";
include "../../../lib/database/fungsi_gambar.php";
include "../../../lib/database/fungsi_podcast.php";
if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$query = "select * from podcast WHERE judul_podcast like '%".$cari."%'";
} else {
$halaman = 5; //batasan halaman
$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$pilih = "select id_podcast,judul_podcast,deskripsi_podcast,tgl_podcast,gambar_podcast,file_podcast from podcast order by tgl_podcast DESC LIMIT $mulai, $halaman";
}  
?>
		<div class="table-responsive">
			<table class="table">
			<tr align="center">
			<th>No</th>
			<th>Judul</th>
			<th>Deskripsi</th>
			<th>Tanggal</th>
			<th>Gambar</th>
			<th>Aksi</th>
			</tr>
<?php
$no=1;
$result = $koneksi->query($query);
if ($result->num_rows > 0) {
while ($data = $result->fetch_assoc())
{
?>
			<tr bgcolor="#ddd">
			<td align="center"><?php echo $no?></td>
            <td align="center"><?php echo $data['judul_podcast']; ?></td>
            <td><?php echo $data['deskripsi_podcast']; ?></td>
            <td align="center"><?php echo $data['tgl_podcast']; ?></td>
            <td align="center"><img src="../update_posting/kcfinder/upload/files/<?php echo $data['gambar_podcast']; ?>" height="30" width="30"></td>
			<td>
			<div class="table-btn" align="center">
			<a href="hapus_podcast.php?id=<?php echo $data['id_podcast']; ?>" onClick = "return confirm('Apakah Anda ingin menghapus data <?php echo $data['id_podcast']; ?>?')" class="btn btn-primary"> Hapus </a><a href="edit_podcast.php?id=<?php echo $data['id_podcast']; ?>#podcast" class="btn btn-primary">Edit</a><a href="../../../podcast/podcastmore.php?id=<?php echo $data['id_podcast']; ?>" class="btn btn-primary" target="_blank">Lihat Artikel</a>
			</div>
			</td>
			</tr>
<?php
$no++;
}
?>
</div>
		</table>
<div class="container">
<div class="row">
<?php for ($i=1; $i<=$pages ; $i++){ ?>
  		<a href="?halaman=<?php echo $i; ?>"><button class="buttonhal button5"><?php echo $i; ?></button></a>
<?php } 
} else {
echo "";
}
?>
  		</div>
		</div>
	</section>
<!--==========================
    Form Podcast
============================--> 
	<section id="formposting" class="padd-section wow fadeInUp">
		<div class="container">
<?php
include'../../../lib/database/koneksi.php';

$id = $_GET['id'];
$edit		= "select * from podcast where id_podcast=$id";
  $hasil	= mysqli_query ($koneksi, $edit);
  $c		= mysqli_fetch_array ($hasil);
?>
      		<div class="section-title text-center">
        	<h2>Isi Konten</h2>
      		</div>
		</div>
		<div class="container">
			<form action="update_podcast.php?id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="judul_podcast"><span>Judul</span></label>
					<input type="text" id="judul_podcast" name="judul_podcast" value="<?php echo $c['judul_podcast'];?>" class="form-control">
				</div>
				
				<div class="form-group">
      				<label for="deskripsi_podcast"><span>Deskripsi</span></label>
      				<textarea id="editor1"name="deskripsi_podcast" class="form-control"><?php echo $c['deskripsi_podcast'];?></textarea>
<script type="text/javascript">
	CKEDITOR.replace('editor1', {
		filebrowserImageBrowseUrl : 'kcfinder'
	});
</script>
  				</div>
				
				<div class="form-group">
					<label for='gambar_podcast'><span>Gambar Header</span></label>
					<input type="file" name="fupload" id="nama_file" class="form-control-file" value src="../update_posting/kcfinder/upload/files/<?php echo $c['gambar_podcast'];?>">
				</div>
				<div class="form-group">
					<label for='file_podcast'><span>Upload File Podcast (.mp3)</span></label>
					<input type="file" name="podload" id="nama_file" class="form-control-file" value src="file/<?php echo $c['file_podcast'];?>">
				</div><br><br>
    			<button type="submit" name="Submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</section>
	
<div class="container">
  <div class="buttonart">
    <a href="../index.php" class="buttonart">Home</a>
	<a href="../update_pendanaan/index.php" class="buttonart">Post Pendanaan</a>
	<a href="../update_calendar/index.php" class="buttonart">Update Agenda Himapala</a>
	<a href="../data/index.php" class="buttonart">Database</a>
	<a href="../logout.php" class="buttonart">Logout</a>
   </div>
   </div><br><br><br><br><br><br><br><br><br><br>
<!--==========================
    Form Podcast
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
  <script src="../../../lib/jquery/jquery.min.js"></script>
  <script src="../../../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../lib/superfish/hoverIntent.js"></script>
  <script src="../../../lib/superfish/superfish.min.js"></script>
  <script src="../../../lib/easing/easing.min.js"></script>
  <script src="../../../lib/modal-video/js/modal-video.js"></script>
  <script src="../../../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../../../lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="../../../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../../../js/main.js"></script>
  </body>
</html>