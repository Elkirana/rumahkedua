<?php
session_start();
require '../sys/core.php';
$tanggal = date("Y-m-d H:i:s");
$url =  "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$param = parse_url($url, PHP_URL_QUERY);
if (isset($_SESSION['user'])) {
	$id_user = $_SESSION['user'];
}else{
	$id_user = "a";
}
$user_template = "<span id='last_resp' class='chat_msg_item chat_msg_item_user'>{message}</span>";
$admin_template = "<span id='last_resp' class='chat_msg_item chat_msg_item_admin'>{message}</span>";
$notif_template = "<span id='last_resp' class='chat_msg_item ' style='max-width: 100%;text-align: center;background: initial;color: #ced9e0;'>{message}</span>";
$div = "<div id='last_resp'><div id='last_resp'>";
$chat_tmp = "";
if (strtolower($param)=="checkmessage") {
	$sql = "SELECT * FROM tbl_chat where id_user='$id_user' order by id desc";
	$query = $db->query($sql);
	$row = mysqli_num_rows($query);
	if ($row==0) {
		$sql = "SELECT * FROM tbl_user where status_user='psikolog' and status_online='online' ";
		$query = $db->query($sql);
		$row = mysqli_num_rows($query);
		if ($row==0) {
			echo '{"status":"0", "id_user":"'.$id_user.'", "detail":"Mohon Maaf, User kami tidak ada yang online."}';
		}else{
			echo '{"status":"0", "id_user":"'.$id_user.'", "detail":"Hai Ada yang bisa kami bantu."}';
		}
	}else{
		$result = mysqli_fetch_assoc($query);
		$id_chat = $result['id'];
		if ($result['status_chat']=='pending') {
			$chat_tmp .= str_replace('{message}', 'Hai Ada yang bisa kami bantu.', $admin_template);
			$chat_tmp .= str_replace('{message}', $result['chat_tentang'], $user_template);
			$chat_tmp .= str_replace('{message}', "Harap tunggu, Kami akan merespond pesan anda.", $notif_template);
			echo '{"status":"1", "id_user":"'.$id_user.'", "detail":"'.$div.$chat_tmp.'</div>", "last_message":"'.$result['chat_tentang'].'"}';
		}elseif ($result['status_chat']=='started') {
			$chat_tmp .= str_replace('{message}', 'Hai Ada yang bisa kami bantu.', $admin_template);
			$chat_tmp .= str_replace('{message}', $result['chat_tentang'], $user_template);
			$sql_history = "SELECT * FROM chat_history where id_chat ='$id_chat' order by id asc";
			$query_history = $db->query($sql_history);
			while ($result=mysqli_fetch_assoc($query_history)) {
				if ($result['id_pengirim']==$id_user) {
					$chat_tmp .= str_replace('{message}', $result['isi_chat'], $user_template);
				}
				if ($result['id_penerima']==$id_user) {
					$chat_tmp .= str_replace('{message}', $result['isi_chat'], $admin_template);
				}
			}			
			echo '{"status":"3", "id_user":"'.$id_user.'", "detail":"'.$div.$chat_tmp.'</div>"}';
		}else{
			echo '{"status":"0", "id_user":"'.$id_user.'", "detail":"'.$div.'Hai Ada yang bisa kami bantu.</div>"}';
		}
	}

	die();
}elseif (strtolower($param)=="checkstatus") {
	$message = $_POST['message'];
	$message = str_replace("'", '', $message);
	$sql = "SELECT * FROM tbl_chat where id_user='$id_user' order by id desc ";
	$query = $db->query($sql);
	$row = mysqli_num_rows($query);
	$sql_onlen = "SELECT * FROM tbl_user where status_user='psikolog' and status_online='online' ";
	$query_onlen = $db->query($sql_onlen);
	$row_onlen = mysqli_num_rows($query_onlen);
	if ($row==0) {
		if ($row_onlen==0) {
			echo '{"status":"9", "id_user":"'.$id_user.'", "detail":"Mohon Maaf, User kami tidak ada yang online."}';
		}else{
			$sql = "INSERT INTO tbl_chat (id_user, chat_tentang, status_chat, tanggal_chat )VALUES ('$id_user', '$message', 'pending', '$tanggal')";
			if ($db->query($sql) === TRUE) {
				$chat_tmp .= str_replace('{message}', 'Hai Ada yang bisa kami bantu.', $admin_template);
				$chat_tmp .= str_replace('{message}', $message, $user_template);
				$chat_tmp .= str_replace('{message}', "Harap tunggu, Kami akan merespond pesan anda.", $notif_template);

				echo '{"status":"1", "id_user":"'.$id_user.'", "detail":"'.$div.$chat_tmp.'</div>", "last_message":"'.$message.'"}';
			}else {
			// echo "Error: " . $sql . "<br>" . $db->error;
				echo '{"status":"0","title":"'. $sql .'.", "detail":"'. $db->error.'", "type":"error"}';
			}
		}
	}else{
		$result = mysqli_fetch_assoc($query);
		$id_chat = $result['id'];
		if ($row_onlen==0) {
			echo '{"status":"9", "id_user":"'.$id_user.'", "detail":"Mohon Maaf, User kami tidak ada yang online."}';
		}else{
			if ($result['status_chat']=='pending') {
				echo '{"status":"9", "id_user":"'.$id_user.'", "detail":"Harap tunggu, Kami akan Merespond pesan anda."}';
			}elseif ($result['status_chat']=='started') {
				$sql = "SELECT * FROM chat_history where id_penerima='$id_user' and id_chat='$id_chat' or  id_penerima='$id_chat' and id_chat='$id_user' order by id desc ";
				$query = $db->query($sql);
				$row = mysqli_num_rows($query);
				if ($row==0) {
					echo '{"status":"9", "id_user":"'.$id_user.'", "detail":"Menunggu pesan dibalas. '.$id_chat.'"}';
				}else{
					$result_penerima = mysqli_fetch_assoc($query);
					$id_penerima = $result_penerima['id_pengirim'];
					// echo '{"status":"3", "id_user":"'.$id_user.'", "id_penerima":"Chart start'.$id_penerima.'"}';
					$sql = "INSERT INTO chat_history (id_chat, isi_chat, id_pengirim, id_penerima, status_read, tanggal_chat )VALUES ('$id_chat', '$message', '$id_user', '$id_penerima', '0', '$tanggal')";
					if ($db->query($sql) === TRUE) {
						echo '{"status":"3", "id_user":"'.$id_user.'", "detail":"Chart start."}';
					}else {
						echo '{"status":"9","title":"'. $sql .'.", "detail":"'. $db->error.'", "type":"error"}';
					}
				}
				
			}else{
				$sql = "INSERT INTO tbl_chat (id_user, chat_tentang, status_chat, tanggal_chat )VALUES ('$id_user', '$message', 'pending', '$tanggal')";
				if ($db->query($sql) === TRUE) {
					$chat_tmp .= str_replace('{message}', 'Hai Ada yang bisa kami bantu.', $admin_template);
					$chat_tmp .= str_replace('{message}', $message, $user_template);
					echo '{"status":"1", "id_user":"'.$id_user.'", "detail":"'.$div.$chat_tmp.'</div>", "last_message":"'.$message.'"}';
				}else {
				// echo "Error: " . $sql . "<br>" . $db->error;
					echo '{"status":"0","title":"'. $sql .'.", "detail":"'. $db->error.'", "type":"error"}';
				}
			}
		}
	}
	die();
}elseif (strtolower($param)=="getwebsocket") {
	$idweb = '<select class="form-control" id="chat_with"><option selected value="'.$_SESSION['user'].'">Dashboard</option></select>';
	$sql = "SELECT * FROM tbl_chat where id_user='$id_user' order by id desc";
	$query = $db->query($sql);
	$row = mysqli_num_rows($query);
	if ($row==0) {
		$sql = "SELECT * FROM tbl_user where status_user='psikolog' and status_online='online' ";
		$query = $db->query($sql);
		$row = mysqli_num_rows($query);
		if ($row==0) {
			echo $idweb;
		}else{
			echo $idweb;
		}
	}else{
		$result = mysqli_fetch_assoc($query);
		$id_chat = $result['id'];
		if ($result['status_chat']=='started') {
			$chat_tmp .= str_replace('{message}', 'Hai Ada yang bisa kami bantu.', $admin_template);
			$chat_tmp .= str_replace('{message}', $result['chat_tentang'], $user_template);
			$sql_history = "SELECT * FROM chat_history where id_chat ='$id_chat' order by id asc";
			$query_history = $db->query($sql_history);
			$id_to = '';
			while ($result=mysqli_fetch_assoc($query_history)) {
				if ($result['id_pengirim']==$id_user) {
					echo "";
				}else{
					$id_to .= $result['id_pengirim'];
					break;
				}
				if ($result['id_penerima']==$id_user) {
					echo "";
				}else{
					$id_to .= $result['id_penerima'];
					break;
				}
			}
			$idweb = '<select class="form-control" id="chat_with"><option selected value="'.$id_to.'">Dashboard</option></select><select class="form-control" id="id_chats"><option selected value="'.$id_chat.'">Dashboard</option></select>'.$id_chat.'';
			echo $idweb;
		}else{
			echo $idweb;
		}
	}

	die();
}else{
	echo "";
}