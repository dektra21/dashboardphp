<?php
session_start();


$conn = mysqli_connect("localhost", "root", "", "data_users");

if(!$conn){
	echo "Koneksi Gagal";
	die();
}else{
	echo "";
}


function register($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $name = $data["name"];
    $email = $data["email"];

$_SESSION["name"] =  $name ;
    //set session 
      


   


    //ngecek username nya dlu, udah ada apa belom

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'" );

    if (mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username already taken!');
              </script>";
        return false;
    }


    //cek konfimasi password

    if ($password !== $password2) { 
        echo"<script>
                alert('Confirm Password Does Not Match!');
                document.location.href = 'register.php'
             </script>";
        return false;
    }


    //enkripsiin password

    $password = password_hash($password, PASSWORD_DEFAULT);

    //nambahin user baru ke database

    $query = "INSERT INTO users VALUES('', '$username', '$password', '$password2', '$name', '$email' )";
    if (mysqli_query($conn, $query)) {
        return mysqli_affected_rows($conn);
    }
    else {
        return false;
    }
    return $name = $data["name"];
    
}
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM  todo_list WHERE id = '$id'");
    return mysqli_affected_rows($conn);

}
function update($id){
    global $conn;
    mysqli_query($conn, "UPDATE todo_list SET status = '2' WHERE id = '$id'");
    return mysqli_affected_rows($conn);

}

?>