
<?php 
include "../../../lib/database/koneksi.php";

$id_pembeli  = $_GET['id'];
$query = mysqli_query($koneksi, "delete from pembeli where id_pembeli=$id_pembeli");


if ($query){
echo"<script>alert('data berhasil di hapus...');
document.location.href='index.php'; </script>\n";
}
else
{echo"<script>alert('hapus gagal');
document.location.href='index.php'; </script>\n";}


?>
