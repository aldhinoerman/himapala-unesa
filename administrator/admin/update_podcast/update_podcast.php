<?php
include "../../../lib/database/koneksi.php";
include"../../../lib/database/fungsi_gambar.php";
include"../../../lib/database/fungsi_podcast.php";


extract($_POST);
?>

<?php
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
$lokasi_podcast = $_FILES['podload']['tmp_name'];
$nama_podcast   = $_FILES['podload']['name'];  
$tgl         =date('Y-m-d H:i:s');
  
    // Apabila ada gambar yang diupload
   if (empty($lokasi_file)){
   
    $q=mysqli_query($koneksi, "UPDATE podcast SET 
									
                                    judul_podcast	 		= '$_POST[judul_podcast]',
                                    deskripsi_podcast		= '$_POST[deskripsi_podcast]'
                                    WHERE id_podcast		= '$_GET[id]'");
 } 
  else{
    UploadFile($nama_file);
    UploadPodcast($nama_podcast);
    $q=mysqli_query($koneksi, "UPDATE podcast SET 
									judul_podcast	 		= '$_POST[judul_podcast]',
                                    deskripsi_podcast		= '$_POST[deskripsi_podcast]',
                                    file_podcast			= '$nama_podcast',
                                    gambar_podcast		 	= '$nama_file'
                                    WHERE id_podcast		= '$_GET[id]'");
		} 
if($q){	
 
echo"<script>alert('data berhasil di update...');
document.location.href='index.php'; </script>\n";

} else {
echo"<script>alert('gagal di update');
document.location.href='index.php'; </script>\n";
}
?>

