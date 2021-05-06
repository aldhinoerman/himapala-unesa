<?php
session_start();

if (isset($_POST["Submit"]));
include "../../../lib/database/koneksi.php";
include "../../../lib/database/fungsi_gambar.php";
include "../../../lib/database/fungsi_podcast.php";

$judul_podcast		= $_POST['judul_podcast'];
$deskripsi_podcast	= $_POST['deskripsi_podcast'];
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
$lokasi_podcast = $_FILES['podload']['tmp_name'];
$nama_podcast   = $_FILES['podload']['name'];
$tanggal = date("Y-m-d H:i:s");


if (empty ($judul_podcast) or empty ($deskripsi_podcast) or empty($nama_file) or empty($nama_podcast))
{
echo "<script>alert('data tidak boleh kosong');
document.location.href='index.php'; </script>\n"; exit ;
}

UploadFile($nama_file);
UploadPodcast($nama_podcast);
$query = mysqli_query ($koneksi, 'insert into podcast (judul_podcast,deskripsi_podcast,gambar_podcast,file_podcast,tgl_podcast)values("'.$judul_podcast.'","'.$deskripsi_podcast.'","'.$nama_file.'","'.$nama_podcast.'","'.$tanggal.'")');

if($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='index.php'; </script>\n";
}else{
echo "<script>alert('data gagal disimpan');
document.location.href='index.php'; </script>\n";
}
?>