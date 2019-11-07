<?php
session_start();
require 'koneksi.php';

$todo = $_POST['todo'];
$assign = $_POST['date'];
$assign = date('Y-m-d', strtotime($assign));
$user_id = $_SESSION['id'];
$category = $_POST['category'];


$query = "INSERT INTO todo_list 
		  VALUES ('','$todo', '$assign', '1' , '$user_id', '$category')";
$hasil = mysqli_query($conn, $query);

if ($hasil) {
	echo "
		<script>
			alert('To Do Successfully Added');
			document.location.href = 'dashboard.php';
		</script>
	";
} else{
	echo "
		<script>
			alert('Failed To Do Added');
			document.location.href = 'addtodolist.php';
		</script>
 
	";
}

?>
