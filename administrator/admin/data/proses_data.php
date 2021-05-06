<?php
session_start();

if (isset($_POST["Submit"]));
include "../../../lib/database/koneksi.php";
include "../../../lib/database/fungsi_gambar.php";

$nama_data		= $_POST['nama_data'];
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
$tanggal = date("Y-m-d H:i:s");


if (empty ($nama_data) or empty($lokasi_file))
{
echo "<script>alert('data tidak boleh kosong');
document.location.href='index.php'; </script>\n"; exit ;
}

UploadFile($nama_file);
$query = mysqli_query ($koneksi, 'insert into data_db (nama_data, tgl_data, file_data)values("'.$nama_data.'","'.$tanggal.'","'.$nama_file.'")');

if($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='index.php'; </script>\n";
}else{
echo "<script>alert('data gagal disimpan');
document.location.href='index.php'; </script>\n";
}
?>