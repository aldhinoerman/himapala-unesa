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
<script src="ckeditor/ckeditor.js"></script>
  <!-- Main Stylesheet File -->
  <link href="../../../css/style.css" rel="stylesheet">
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
        	<h1><a href="../index.php#body"><img src="../../../img/logo himapal.png" width="25" height="35">Himapala Unesa</a></h1>
      		</div>
      	<nav id="nav-menu-container">
        	<ul class="nav-menu">
          	<li><a href="../update_calendar/index.php">Update Calendar</a></li>
		  	<li class="menu-active"><a href="../update_posting/index.php">Update Posting</a></li>
		  	<li><a href="../update_pendanaan/index.php">Update Pendanaan</a></li>
			<li><a href="../update_podcast/index.php">Update Podcast</a></li>
			<li><a href="../data/index.php">Database</a></li>
		  	<li><a href="../logout.php">logout</a></li>
          	</li>
        	</ul>
      	</nav><!-- #nav-menu-container -->
    	</div>
	</header><!-- #header --> 
<br>
<br>
<br>
<!--==========================
    Tabel Berita
============================--> 
	<section id="tabelberita" class="padd-section wow fadeInUp">
		<div class="container">
      		<div class="section-title text-center">
        	<h2>Artikelmu</h2>
      		</div>
			<form action="edit_berita.php" method="get">
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
if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$query = "select * from berita WHERE judul_berita like '%".$cari."%'";
} else {
$halaman = 5; //batasan halaman
$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$query = "select id_berita,kategori,judul_berita,isi_berita,tgl_input,gambar,label from berita order by tgl_input DESC LIMIT $mulai, $halaman";
}
?>	
		<div class="table-responsive">
			<table class="table">
			<tr align="center">
			<th>No</th>
			<th>Kategori</th>
			<th>Judul</th>
			<th>Tgl Input</th>
			<th>Gambar</th>
			<th>Label</th>
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
            <td align="center"><?php echo $data['kategori']; ?></td>
            <td><?php echo $data['judul_berita']; ?></td>
            <td align="center"><?php echo $data['tgl_input']; ?></td>
            <td align="center"><img src="kcfinder/upload/files/<?php echo $data['gambar']; ?>" height="30" width="30"></td>
			<td align="center"><?php echo $data['label']; ?></td>
			<td>
			<div class="table-btn" align="center">
			<a href="hapus_berita.php?id=<?php echo $data['id_berita']; ?>" onClick = "return confirm('Apakah Anda ingin menghapus data <?php echo $data['id_berita']; ?>?')" class="btn btn-primary"> Hapus </a><a href="edit_berita.php?id=<?php echo $data['id_berita']; ?>#formposting" class="btn btn-primary">Edit</a>
			</div>
			</td>
			</tr>
<?php
$no++;
}
?>
</div>
			</table><br>
<?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>"><button class="buttonhal button5"><?php echo $i; ?></button></a>
  </div>
<?php } 
} else {
echo "";
}
?>
  		</div>
	</section>
<!--==========================
    Form
============================--> 
	<section id="formposting" class="padd-section wow fadeInUp">
		<div class="container">
      		<div class="section-title text-center">
        	<h2>Isi Konten</h2>
      		</div>
		</div>
		<div class="container">
<?php
include'../../../lib/database/koneksi.php';

$id = $_GET['id'];
$edit		= "select * from berita where id_berita=$id";
  $hasil	= mysqli_query ($koneksi, $edit);
  $c		= mysqli_fetch_array ($hasil);
?>
			<form enctype="multipart/form-data" method="post" action="update_berita.php?&id=<?php echo $_GET['id'] ?>">
				<div class="form-group">
					<label for="kategori"><span>Kategori</span></label>
					<input type="text" id="kategori" name="kategori" value="Artikel" readonly class="form-control">
				</div>
				
				<div class="form-group">
					<label for="divisi"><span>Label Artikel (Harap Diisi Kembali)</span></label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" id="divisi" name="label" value="<?php echo $c['label']; ?>" class="form-check-input">
					<label class="form-check-label" for="divisi">Artikel Divisi</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" id="umum" name="label" value="<?php echo $c['label']; ?>" class="form-check-input">
					<label class="form-check-label" for="umum">Artikel Umum</label>
				</div>
				
				<div class="form-group">
					<label for="judul_berita"><span>Judul</span></label>
					<input type="text" id="judul_berita" name="judul_berita" value="<?php echo $c['judul_berita']; ?>" class="form-control">
				</div>
					
				<div class="form-group">
      				<label for="isi_berita">Isi Artikel</label>
     				<textarea id="editor1"name="isi_berita" class="form-control"><?php echo $c['isi_berita']; ?></textarea>
<script type="text/javascript">
	CKEDITOR.replace('editor1', {
		filebrowserImageBrowseUrl : 'kcfinder'
	});
</script>
    			</div>
				
				<div class="form-control">
					<label for='gambar'><span>Gambar Header (Gambar Harap Diupload Kembali!)</span></label>
					<input type="file" name="fupload" id="nama_file" class="form-control-file">
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
	<a href="../update_podcast/index.php" class="buttonart">Update Podcast</a>
	<a href="../data/index.php" class="buttonart">Database</a>
	<a href="../logout.php" class="buttonart">Logout</a>
   </div>
   </div><br><br><br><br><br><br><br><br><br><br>
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