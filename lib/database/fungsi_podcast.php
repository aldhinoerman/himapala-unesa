<?php
function UploadPodcast($podload_name){
  //direktori file
$vdir_upload = "../../../administrator/admin/update_podcast/file/";
$vfile_upload = $vdir_upload . $podload_name;

  //Simpan gambar dalam ukuran sebenarnya
move_uploaded_file($_FILES["podload"]["tmp_name"], $vfile_upload);
}

?>