<?php
if (isset($_GET['get'])) {
	$get = '../../assets/home/images/uploads/'.$_GET['get'];
	// echo ;
	if (file_exists($get)) {
		echo '<img src="'.$get.'" style="max-width: 900px;">';
	}else{
		echo "<h4>IMAGE NOT FOUND</h4>";
	}
}
?>
