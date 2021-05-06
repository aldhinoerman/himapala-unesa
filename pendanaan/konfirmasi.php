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
		  	<li><a href="../index.php#blog">Blog</a></li>
			<li><a href="../index.php#podcast">Podcast</a></li>   
          	<li><a href="../index.php#screenshots">Galeri</a></li>
			<li><a href="../index.php#divisi">Divisi</a></li>
          	<li><a href="../index.php#team">Struktur Pengurus</a></li>
          	<li class="menu-active"><a href="../index.php#pricing">Pendanaan</a></li>
          	<li><a href="../index.php#contact">Kontak</a></li>
        	</ul>
      	</nav><!-- #nav-menu-container -->
    	</div>
	</header><!-- #header -->
<!--==========================
    Checkout
============================-->
	<section id="tabelpendanaan" class="padd-section wow fadeInUp">
		<div class="container">
<?php
include "../lib/database/koneksi.php";
$id_produk = $_GET['id'];
$query = "select id_produk, nama_produk, harga_produk, ukuran_produk, bahan_produk, sisa from pendanaan where id_produk=$id_produk";
$sql = mysqli_query($koneksi, $query);
$no=1;
while ($data=mysqli_fetch_assoc($sql))
{
if ($data['sisa'] < "1") {
	echo "<script>alert('Barang Habis!'); document.location.href='../index.php#pricing'; </script>\n"; exit ;}
?>
      		<div class="section-title text-center">
        	<h2>Pembelian Anda</h2>
      		</div>
    	</div>	
		
		<div class="table-responsive">
		<table class="table">
		<tr align="center">
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Ukuran</th>
			<th>Bahan</th>
		</tr>
		<tr bgcolor="#ddd">
			<td align="center"><?php echo $no?></td>
            <td align="center"><?php echo $data['nama_produk']; ?></td>
            <td align="center">Rp <?php echo $data['harga_produk']; ?></td>
            <td align="center"><?php echo $data['ukuran_produk']; ?></td>
            <td align="center"><?php echo $data['bahan_produk']; ?></td>
		</tr>
<?php
$no++;
}
?>
</div>
		</table>
  		</div>
	</div><!-- Tabel Checkout -->
	</section>
<!--==========================
    Form Konfirmasi
============================-->
	<section id="formposting" class="padd-section wow fadeInUp">
		<div class="container">
      		<div class="section-title text-center">
        	<h2>Form Konfirmasi</h2> <br /><span style="color:#fff">Silahkan isi form dibawah ini sesuai data diri anda!</span>
      		</div>
		</div>
<?php
$id_produk = $_GET['id'];
$query = "select id_produk, nama_produk, harga_produk, ukuran_produk, bahan_produk from pendanaan where id_produk=$id_produk";
$sql = mysqli_query($koneksi, $query);
while ($data=mysqli_fetch_assoc($sql))
{
?>
		<div class="container">
			<form action="../lib/database/proses_dana.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="Rinci">Nama Barang</label>
				<input type="text" id="produk_beli" name="produk_beli" value="<?php echo $data['nama_produk'];?>" readonly class="form-control">
			</div>
			<div class="form-group">
				<div class="perhitungan">
				<label for ="nama" style="float:left">Harga</label>
				<div class="input-group">
        			<div class="input-group-prepend">
          				<div class="input-group-text"><span>RP</span></div>
					</div>
				<input type="text" name="harga_produk" id="harga" value="<?php echo $data['harga_produk'];?>" readonly class="form-control">
<?php
}
?>
				</div>
				<label for ="jumlah">Jumlah</label>
				<input type="number" name="jumlah_beli" id="jumlah" align="left" class="form-control">
				<label for ="total" style="float:left">Total</label>
				<div class="input-group">
        			<div class="input-group-prepend">
          				<div class="input-group-text"><span>RP</span></div>
					</div>
				<input type="text" id="total" name="total_belanja" readonly class="form-control">
				</div>	
			</div><!-- Hitungan Belanja -->
			
			<div class="form-group">
				<label for="nama_pembeli">Nama</label>
				<input type="text" id="nama_pembeli" name="nama_pembeli" placeholder="Nama" class="form-control">
				</div>
			
			<div class="form-group">
				<label for="alamat_pembeli">Alamat</label>
				<textarea id="alamat_pembeli" name="alamat_pembeli" placeholder="Alamat Lengkap" class="form-control"></textarea>
			</div>
			
			<div class="form-group">
				<label for="kontak_pembeli">Kontak</label>
				<input type="text" id="kontak_pembeli" name="kontak_pembeli" placeholder="Ex: 085251111111 (WA)" class="form-control">
				</div>
			
			<div class="form-group">
				<label for="ukuran_beli">Ukuran</label>
				<input type="text" id="ukuran_beli" name="ukuran_beli" placeholder="Ex: L/M/XL" class="form-control">
			</div><br><br>
    			<button type="submit" name="Submit" class="btn btn-primary">Submit</button>
 			</form>
		</div>
	</section>
<!--==========================
    Form Konfirmasi
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
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type ="text/javascript">
		$(".perhitungan").keyup(function(){
			var harga = parseInt($("#harga").val())
			var jumlah = parseInt($("#jumlah").val())
			
			var total = harga * jumlah;
			$("#total").attr("value",total)
			
			});
	</script>
  </body>
</html>