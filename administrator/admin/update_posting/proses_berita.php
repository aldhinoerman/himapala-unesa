<?php
session_start();

if (isset($_POST["Submit"]));
include "../../../lib/database/koneksi.php";
include "../../../lib/database/fungsi_gambar.php";

$kategori		= $_POST['kategori'];
$judul_berita	= $_POST['judul_berita'];
$isi_berita		= $_POST['isi_berita'];
$label			= $_POST['label'];
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
$tanggal = date("Y-m-d H:i:s");


if (empty ($kategori) or empty ($judul_berita) or empty($isi_berita) or empty($label) or empty($lokasi_file))
{
echo "<script>alert('data tidak boleh kosong');
document.location.href='index.php'; </script>\n"; exit ;
}


if ($label == 'Divisi')
   {
    UploadFile($nama_file);
$query = mysqli_query ($koneksi, 'insert into berita (kategori,judul_berita,isi_berita,tgl_input,gambar,label)values("'.$kategori.'","'.$judul_berita.'","'.$isi_berita.'","'.$tanggal.'","'.$nama_file.'","'.$label.'")');
} else {
UploadFile($nama_file);
$query=mysqli_query($koneksi, 'insert into berita (kategori,judul_berita,isi_berita,tgl_input,gambar,label) values("'.$kategori.'","'.$judul_berita.'","'.$isi_berita.'","'.$tanggal.'","'.$nama_file.'","Umum")');
}


if($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='index.php'; </script>\n";
}else{
echo "<script>alert('data gagal disimpan');
document.location.href='index.php'; </script>\n";
}
?>