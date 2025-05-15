<?php
date_default_timezone_set('Asia/Makassar'); 
	$con = mysqli_connect("localhost","root","","db_santri");

	if (!$con){
		echo "Koneksi Ke Database Gagal";
	} 

?> 
 
<?php $ambil_meta=$con->query("SELECT * FROM meta"); ?>
<?php $meta = $ambil_meta->fetch_assoc(); ?> 
