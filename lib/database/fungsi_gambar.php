<?php
function UploadFile($fupload_name){
  //direktori file
$vdir_upload = "../../../administrator/admin/update_posting/kcfinder/upload/files/";
$vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

?>