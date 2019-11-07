<?php 

require 'functions.php';

$id = $_GET["id"];


if( update($id) > 0 ){
    echo "
		<script>
			alert('Activity has been completed');
			document.location.href = 'dashboard.php';
		</script>
	";
}else{
    echo "
		<script>
			alert('Activity has been carried out');
			document.location.href = 'dashboard.php';
		</script>
	";
}

?>