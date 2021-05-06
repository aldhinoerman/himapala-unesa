
<?php 
include "../../../lib/database/koneksi.php";
include "../../../lib/database/fungsi_gambar.php";
include "../../../lib/database/fungsi_podcast.php";

$id_podcast  = $_GET['id'];
$foto = $_GET['name'];

$query = mysqli_query($koneksi, "delete from podcast where id_podcast=$id_podcast");

if ($query){
echo"<script>alert('data berhasil di hapus...');
document.location.href='index.php'; </script>\n";
}
else
{echo"<script>alert('hapus gagal');
document.location.href='index.php'; </script>\n";}

?>