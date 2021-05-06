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
		  	<li><a href="../update_posting/index.php">Update Posting</a></li>
		  	<li class="menu-active"><a href="#">Update Pendanaan</a></li>
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
    Tabel pendanaan
============================--> 
	<section id="tabelpendanaan" class="padd-section wow fadeInUp">
		<div class="container">
		<div class="section-title text-center">
        	<h2>Pendanaan</h2>
      		</div>
		<form action="index.php" method="get">
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
$query = "select * from pendanaan WHERE nama_produk like '%".$cari."%'";
} else {
$halaman = 5; //batasan halaman
$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$query = "select id_produk, nama_produk, harga_produk, ukuran_produk, bahan_produk, bayar_cash, bayar_dp, kirim, sisa, gambar_produk from pendanaan order by id_produk DESC LIMIT $mulai, $halaman";
}
?>
		<div class="table-responsive">
			<table class="table">
			<tr align="center">
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Ukuran</th>
			<th>Bahan</th>
			<th colspan="2">Metode Pembayaran</th>
			<th>Jasa Pengiriman</th>
			<th>Sisa Barang</th>
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
            <td align="center"><?php echo $data['nama_produk']; ?></td>
            <td align="center">Rp <?php echo $data['harga_produk']; ?></td>
            <td align="center"><?php echo $data['ukuran_produk']; ?></td>
            <td align="center"><?php echo $data['bahan_produk']; ?></td>
			<td align="center"><?php echo ($data['bayar_cash']); ?></td>
			<td align="center"><?php echo ($data['bayar_dp']); ?></td>
			<td align="center"><?php echo $data['kirim']; ?></td>
			<td align="center"><?php if ($data['sisa'] < '1'){ echo "Habis";} else { echo $data['sisa'];} ?></td>
			<td align="center"><img src="../update_posting/kcfinder/upload/files/<?php echo $data['gambar_produk']; ?>" height="30" width="30"></td>
			<td>
			<div class="table-btn" align="center">
			<a href="hapus_dana.php?id=<?php echo $data['id_produk']; ?>" onClick = "return confirm('Apakah Anda ingin menghapus data <?php echo $data['id_produk']; ?>?')" class="btn btn-primary"> Hapus </a> 
			</div>
			</td>
			</tr>
<?php
$no++;
}
?>
			</table></div><br>
<div class="container">
<div class="row">
<?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>"><button class="buttonhal button5"><?php echo $i; ?></button></a>
  </div>
  </div>
<?php } 
} else {
echo "";
}
?>
	</section>
<!--==========================
    Tabel Pembeli
============================--> 
	<section id="tabelpembeli" class="padd-section wow fadeInUp">
		<div class="container">
		<div class="section-title text-center">
        	<h2>Pembeli</h2>
      		</div>
		<form action="index.php" method="get">
			<div class="form-group">
			<label>Pencarian :</label>
			<input type="text" name="cari" class="form-control" placeholder="Cari..">
			</div>
			<button type="submit" value="Cari" class="btn btn-primary">Cari</button>
		</form>
    	</div><br>	
<?php
if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
$query = "select * from pembeli WHERE nama_pembeli like '%".$cari."%'";
} else {
$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$query = "select id_pembeli, nama_pembeli, alamat_pembeli, kontak_pembeli, produk_beli, ukuran_beli, jumlah_beli, total_belanja from pembeli order by id_pembeli  DESC LIMIT $mulai, $halaman";
}
?>
		<div class="table-responsive">
			<table class="table">
			<tr align="center">
			<th>ID</th>
			<th>Nama Pembeli</th>
			<th>Alamat</th>
			<th>Kontak</th>
			<th>Produk</th>
			<th>Ukuran</th>
			<th>Jumlah</th>
			<th>Total Belanja</th>
			<th>Aksi</th>
			</tr>
<?php
$result = $koneksi->query($query);
if ($result->num_rows > 0) {
while ($data = $result->fetch_assoc())
{
?>
			<tr bgcolor="#ddd">
			<td align="center"><?php echo $data['id_pembeli'];?></td>
            <td align="center"><?php echo $data['nama_pembeli']; ?></td>
            <td align="center"><?php echo $data['alamat_pembeli']; ?></td>
            <td align="center"><?php echo $data['kontak_pembeli']; ?></td>
            <td align="center"><?php echo $data['produk_beli']; ?></td>
			<td align="center"><?php echo ($data['ukuran_beli']); ?></td>
			<td align="center"><?php echo ($data['jumlah_beli']); ?></td>
			<td align="center">Rp <?php echo $data['total_belanja'] + $data['id_pembeli']; ?></td>
			<td>
			<div class="table-btn" align="center">
			<a href="hapus_pembeli.php?id=<?php echo $data['id_pembeli']; ?>" onClick = "return confirm('Apakah Anda ingin menghapus data <?php echo $data['id_pembeli']; ?>?')" class="btn btn-primary"> Hapus </a> 
			</div>
			</td>
			</tr>
<?php
}
?>
</div>
			</table>
<div class="container">
<div class="row">
 <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>"><button class="buttonhal button5"><?php echo $i; ?></button></a>
  </div>
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
			<form action="proses_dana.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="namaproduk"><span>Nama Produk</span></label>
					<input type="text" id="nama_produk" name="nama_produk" placeholder="Nama Produk" class="form-control">
				</div>
				
				<div class="form-group">
					<label for="harga"><span>Harga</span></label>
				</div>
				<div class="input-group">
        			<div class="input-group-prepend">
          				<div class="input-group-text"><span>RP</span></div>
        			</div>
        			<input type="text" id="harga" name="harga_produk" placeholder="Ex: 20000" class="form-control">
      			</div>
				
				<div class="form-group">
					<label for="ukuran"><span>Ukuran Produk</span></label>
					<input type="text" id="ukuran" name="ukuran_produk" placeholder="Ex: L/M/XL" class="form-control">
				</div>
				
				<div class="form-group">
					<label for="bahan"><span>Bahan</span></label>
					<input type="text" id="ukuran" name="bahan_produk" placeholder="Ex: Cotton Combed" class="form-control">
				</div>
    
				<div class="form-group">
					<label for="bayar"><span>Metode Pembayaran</span></label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" id="dp" name="bayar" value="DP" class="form-check-input">
					<label class="form-check-label" for="DP">DP</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" id="cash" name="bayar" value="Tunai" class="form-check-input">
					<label class="form-check-label" for="tunai">Tunai</label>
				</div>
				
				<div class="form-group">
					<label for="kirim">Jasa Pengiriman</label>
				</div>
				<div class="form-group">
					<input type="checkbox" id="select-all" class="form-check-input">
					<label class="form-check-label" for="all">Select All</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="checkbox" id="jne" name="kirim[]" value="JNE" class="form-check-input">
					<label class="form-check-label" for="jne"><img src="../../../img/kirim/1.png"></img></label>
				</div>
				<div class="form-check form-check-inline">
					<input type="checkbox" id="jnt" name="kirim[]" value="JNT" class="form-check-input">
					<label class="form-check-label" for="jnt"><img src="../../../img/kirim/2.png"></img></label>
				</div>
				<div class="form-check form-check-inline">
					<input type="checkbox" id="pos" name="kirim[]" value="Pos Indonesia" class="form-check-input">
					<label class="form-check-label" for="pos"><img src="../../../img/kirim/3.png"></img></label>
				</div>
				<div class="form-check form-check-inline">
					<input type="checkbox" id="tiki" name="kirim[]" value="Tiki" class="form-check-input">
					<label class="form-check-label" for="tiki"><img src="../../../img/kirim/4.png"></img></label>
				</div>
				<div class="form-check form-check-inline">
					<input type="checkbox" id="gojek" name="kirim[]" value="Go-Send" class="form-check-input">
					<label class="form-check-label" for="gojek"><img src="../../../img/kirim/5.png"></img></label>
				</div>
				
				<div class="form-group">
					<label for="sisa">Stok Barang</label>
					<input type="text" id="sisa" name="sisa" placeholder="Stok Barang" class="form-control">
				</div>
				<div class="form-group">
					<label for="gambar_produk">Gambar Produk</label>
					<input type="file" name="fupload" id="nama_file" class="form-control-file">
				</div><br><br>
				
    			<button type="submit" name="Submit" class="btn btn-primary">Submit</button>
 			</form>
		</div>
	</section>
	
<div class="container">
<div class="buttonart">
    <a href="../update_posting/index.php" class="buttonart">Post Artikel</a>
	<a href="../update_calendar/index.php" class="buttonart">Update Agenda Himapala</a>
	<a href="../update_podcast/index.php" class="buttonart">Update Podcast</a>
	<a href="../data/index.php" class="buttonart">Database</a>
	<a href="../index.php" class="buttonart">Home</a>
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
  <script>
				 $(document).ready(function() {
  $('#select-all').click(function() {
    var checked = this.checked;
    $('input[type="checkbox"]').each(function() {
      this.checked = checked;
    });
  })
});
</script>
  </body>
</html>