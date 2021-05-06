<?php
include "../../../lib/database/koneksi.php";
include"../../../lib/database/fungsi_gambar.php";


extract($_POST);
?>

<?php
$label			= $_POST['label'];
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name']; 
$tgl         =date('Y-m-d H:i:s');
  
    // Apabila ada gambar yang diupload
   if ($label == 'Divisi'){
    UploadFile($nama_file);
    $q=mysqli_query($koneksi, "UPDATE berita SET 
									
                                    kategori	 		= '$_POST[kategori]',
                                    judul_berita		= '$_POST[judul_berita]',
                                    isi_berita	 		= '$_POST[isi_berita]',
                                    gambar		 		= '$nama_file',
									label				= '$_POST[label]'
                                    WHERE id_berita		= '$_GET[id]'");
 } 
  else{
    UploadFile($nama_file);
   
    $q=mysqli_query($koneksi, "UPDATE berita SET 
									 kategori	 		= '$_POST[kategori]',
                                    judul_berita		= '$_POST[judul_berita]',
                                    isi_berita	 		= '$_POST[isi_berita]',
                                    gambar		 		= '$nama_file',
									label				= 'Umum'
                                    WHERE id_berita		= '$_GET[id]'");
		} 
if($q){	
 
echo"<script>alert('data berhasil di update...');
document.location.href='index.php'; </script>\n";

} else {
echo"<script>alert('gagal di update');
document.location.href='index.php'; </script>\n";
}
?>

