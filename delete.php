<?php 

require 'functions.php';

$id = $_GET["id"];


if( hapus($id) > 0 ){
    echo "
		<script>
			alert('Data Successfully Deleted');
			document.location.href = 'dashboard.php';
		</script>
	";
}else{
    echo "
		<script>
			alert('Failed Data Deleted');
			document.location.href = 'dashboard.php';
		</script>
	";
}

?>