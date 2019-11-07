<?php
require 'koneksi.php';

$nama = $_POST['nama'];

$query = "INSERT INTO categories
		  VALUES ('','$nama')";
$hasil = mysqli_query ($conn, $query);

if ($hasil) {
	echo "
		<script>
			alert('Category Successfully Added');
			document.location.href = 'dashboard.php';
		</script>
	";
} else{
	echo "
		<script>
			alert('Failed Category Added');
			document.location.href = 'dashboard.php';
		</script>
 
	";
}

?>
