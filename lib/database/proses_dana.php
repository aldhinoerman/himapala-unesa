<?php
session_start();
include "koneksi.php";
if (isset($_POST["Submit"]));

$nama_pembeli = $_POST["nama_pembeli"]; 
$alamat_pembeli = $_POST["alamat_pembeli"];
$kontak_pembeli = $_POST["kontak_pembeli"];
$produk_beli = $_POST["produk_beli"]; 
$ukuran_beli = $_POST["ukuran_beli"];
$jumlah_beli = $_POST["jumlah_beli"];
$total_belanja = $_POST["total_belanja"];

if (empty ($nama_pembeli) or empty ($alamat_pembeli) or empty($kontak_pembeli) or empty($produk_beli) or empty($ukuran_beli) or empty($jumlah_beli) or empty($total_belanja))
{
echo "<script>alert('data tidak boleh kosong'); document.location.href='index.php'; </script>\n"; exit ;}

$query = mysqli_query ($koneksi, 'insert into pembeli (nama_pembeli, alamat_pembeli, kontak_pembeli, produk_beli, ukuran_beli, jumlah_beli, total_belanja)values("'.$nama_pembeli.'","'.$alamat_pembeli.'","'.$kontak_pembeli.'","'.$produk_beli.'","'.$ukuran_beli.'","'.$jumlah_beli.'","'.$total_belanja.'")');

if($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='../../pendanaan/payment.php?nama_pembeli=$nama_pembeli'; </script>\n";
} else {
echo "<script>alert('data gagal disimpan');
document.location.href='../../index.php'; </script>\n";
}
?>