<?php
require 'sys/core.php';
session_start();
if (isset($_SESSION['user'])) {
	$id_user = $_SESSION['user'];
	$sql2 = "UPDATE tbl_user SET status_online = 'offline' where  id='$id_user'";
	if ($db->query($sql2) === TRUE) {
		session_destroy();
		header("location: index.php");
	} else {
		echo "";
	}
}else{
	session_destroy();
	header("location: index.php");
}

?>