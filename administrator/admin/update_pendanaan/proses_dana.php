<?php
session_start();
include "../../../lib/database/koneksi.php";
include "../../../lib/database/fungsi_gambar.php";

if (isset($_POST["Submit"]));

$nama_produk = $_POST["nama_produk"]; 
$harga_produk = $_POST["harga_produk"];
$ukuran_produk = $_POST["ukuran_produk"];
$bahan_produk = $_POST["bahan_produk"]; 
$bayar = $_POST["bayar"];
$kirim = implode(",", $_POST["kirim"]);
$sisa = $_POST["sisa"];
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES["fupload"]["name"];

if (empty ($nama_produk) or empty ($harga_produk) or empty($ukuran_produk) or empty($bahan_produk) or empty($sisa) or empty($lokasi_file))
{
echo "<script>alert('data tidak boleh kosong'); document.location.href='index.php'; </script>\n"; exit ;
}

if ($bayar == 'DP'){
UploadFile($nama_file);
$query = mysqli_query ($koneksi, 'insert into pendanaan (nama_produk,harga_produk,ukuran_produk,bahan_produk, bayar_dp, kirim, sisa, gambar_produk)values("'.$nama_produk.'","'.$harga_produk.'","'.$ukuran_produk.'","'.$bahan_produk.'","'.$bayar.'","'.$kirim.'","'.$sisa.'","'.$nama_file.'")');
} else {
UploadFile($nama_file);
$query = mysqli_query ($koneksi, 'insert into pendanaan (nama_produk,harga_produk,ukuran_produk,bahan_produk, bayar_cash, kirim, sisa, gambar_produk)values("'.$nama_produk.'","'.$harga_produk.'","'.$ukuran_produk.'","'.$bahan_produk.'","'.$bayar.'","'.$kirim.'","'.$sisa.'","'.$nama_file.'")');}

if($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='index.php'; </script>\n";
}else{
echo "<script>alert('data gagal disimpan');
document.location.href='index.php'; </script>\n";
}
?>