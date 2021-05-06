
<?php 
include "../../../lib/database/koneksi.php";
include "../../../lib/database/fungsi_gambar.php";

$id_berita  = $_GET['id'];
$foto = $_GET['name'];


$query = mysqli_query($koneksi, "delete from berita where id_berita=$id_berita");

if ($query){
echo"<script>alert('data berhasil di hapus...');
document.location.href='index.php'; </script>\n";
}
else
{echo"<script>alert('hapus gagal');
document.location.href='index.php'; </script>\n";}

?>