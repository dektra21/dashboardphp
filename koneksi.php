<?php

$conn = mysqli_connect("localhost", "root", "", "data_users");

if(!$conn){
	echo "Koneksi Gagal";
	die();
}else{
	echo "";
}

?>