
<?php 
include "../../../lib/database/koneksi.php";
include "../../../lib/database/fungsi_gambar.php";

$id_produk  = $_GET['id'];
$query = mysqli_query($koneksi, "delete from pendanaan where id_produk=$id_produk");

if ($query){
echo"<script>alert('data berhasil di hapus...');
document.location.href='index.php'; </script>\n";
}
else 
//mysqli_errno();
{echo"<script>alert('hapus gagal');
document.location.href='index.php'; </script> \n";
}

?>
