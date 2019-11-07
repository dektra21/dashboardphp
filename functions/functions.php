<?php

$conn = mysqli_connect("localhost", "root", "", "data_users");

if(!$conn){
	echo "Koneksi Gagal";
	die();
}else{
	echo "";
}


function register($data) {
    global $conn;

    $username = strtolower(stripslashes($_POST["username"]));
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);
    $name = $_POST["name"];
    $email = $_POST["email"];

    //cek konfimasi password

    if ($password !== $password2) {
        echo"<script>
                alert('Konfirmasi Password Tidak Sesuai GOBLOG!1!1');
             </script>";
        return false;
    }
    
    return 1;

    //enkripsiin password

    $password = password_hash($password, PASSWORD_DEFAULT);
    var_dump($password); 
    die;

    //nambahin user baru ke database
    
   $query ="INSERT INTO 'users' VALUES ('', '$username', '$password', '$password2', '$name', '$email')";

   $hasil = mysqli_query ($conn, $query);
}


?>