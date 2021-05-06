
<?php 
include "../../../lib/database/koneksi.php";
include "../../../lib/database/fungsi_gambar.php";

$id_data = $_GET['id'];
$foto = $_GET['name'];


$query = mysqli_query($koneksi, "delete from data_db where id_data=$id_data");

if ($query){
echo"<script>alert('data berhasil di hapus...');
document.location.href='index.php'; </script>\n";
}
else
{echo"<script>alert('hapus gagal');
document.location.href='index.php'; </script>\n";}

?>