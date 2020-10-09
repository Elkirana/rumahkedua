<?php
session_start();
require '../../../sys/core.php';
$tanggal = date("Y-m-d H:i:s");
$url =  "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$param = parse_url($url, PHP_URL_QUERY);
if (isset($_SESSION['user'])) {
	$id_user = $_SESSION['user'];
}else{
	// $id_user = 1;
	die();
}
if (strtolower($param)=="endchat") {
	if (isset($_POST['id'])) {
		if (!empty($_POST['id'])) {
			$id = $_POST['id'];
			$id_chat = deurl($id);
			$sql = "SELECT * FROM chat_history where id_pengirim='$id_user' and id_penerima='$id_chat' order by id desc ";
			$query = $db->query($sql);
			$row=mysqli_num_rows($query);
			if ($row==0) {
		      // echo "ID TIDAK VALID";
				echo '{"status":"3", "title":"Oops ada yang salah", "detail":"Id Tidak terdaftar di database."}';
				die();
			}else{
				$result = mysqli_fetch_assoc($query);
				$idd_chat = $result['id_chat'];
				$sql = "SELECT * FROM tbl_chat where id ='$idd_chat' ";
				$query = $db->query($sql);
				$row = mysqli_num_rows($query);
				if ($row==0) {
					echo '{"status":"3", "title":"Oops ada yang salah", "detail":"Tidak id chat."}';
					die();
				}else{
					$sql2 = "UPDATE tbl_chat SET status_chat = 'selesai' where  id='$idd_chat'";
					if ($db->query($sql2) === TRUE) {
						echo '{"status":"1", "title":"Oops ada yang salah", "detail":"Tidak id chat."}';
						die();
					} else {
						echo "";
					}
					// echo $idd_chat;
				}
			}
		}
	}
}
?>