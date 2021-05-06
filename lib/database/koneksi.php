<?php 
$koneksi = mysqli_connect("localhost","root","","himapala_db");
			
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>
