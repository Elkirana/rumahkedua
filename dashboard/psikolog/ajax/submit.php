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
$user_template = "<span id='last_resp' class='chat_msg_item chat_msg_item_user'>{message}</span>";
$admin_template = "<span id='last_resp' class='chat_msg_item chat_msg_item_admin'>{message}</span>";
$notif_template = "<span id='last_resp' class='chat_msg_item ' style='max-width: 100%;text-align: center;background: initial;color: #ced9e0;'>{message}</span>";
$div = "<div id='last_resp'><div id='last_resp'>";
$chat_tmp = "";
if (strtolower($param)=="checkmessage") {
	$tmp_id = '';
	$user_id = $_POST['to_id'];
	$sql = "SELECT * FROM tbl_chat where status_chat='started' and id_user='$user_id' order by id desc";
	$query = $db->query($sql);
	while ($result=mysqli_fetch_assoc($query)) {
		$id_chat = $result['id'];
		$sql = "SELECT * FROM chat_history where id_chat ='$id_chat' and id_pengirim='$id_user' and id_penerima = '$user_id' or id_chat ='$id_chat' and id_pengirim='$user_id' and id_penerima = '$id_user' ";
		$query = $db->query($sql);
		$row=mysqli_num_rows($query);
		if ($row==0) {
		}else{
			$tmp_id .=$id_chat;
			break;
		}

	}
	// $chat_tmp .= str_replace('{message}', 'Hai Ada yang bisa kami bantu.', $admin_template);
	// $chat_tmp .= str_replace('{message}', $result['chat_tentang'], $user_template);
	$sql_history = "SELECT * FROM chat_history where id_chat ='$tmp_id' order by id asc";
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
	die();
}elseif (strtolower($param)=="checkmessagew") {
	$tmp_id = '';
	$id_chat = $_POST['id_chat'];
	$sqlr = "SELECT * FROM tbl_chat where id='$id_chat' order by id desc";
	$queryr = $db->query($sqlr);
	$resultr=mysqli_fetch_assoc($queryr);

	$chat_tmp .= str_replace('{message}', $resultr['chat_tentang'], $admin_template);
	// $chat_tmp .= str_replace('{message}', $result['chat_tentang'], $user_template);
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
	die();
}elseif (strtolower($param)=="checkstatus") {
	$message = $_POST['message'];
	$message = str_replace("'", '', $message);
	$id_penerima = $_POST['to_id'];
	$id_pengirim = $id_user;
	$sql = "SELECT * FROM tbl_chat where id_user='$id_penerima' order by id desc ";
	$query = $db->query($sql);
	$row = mysqli_num_rows($query);
	if ($row==0) {
		echo '{"status":"3", "id_user":"'.$id_user.'", "detail":"Chat not avaliable."}';
	}else{
		$result = mysqli_fetch_assoc($query);
		$id_chat = $result['id'];
		if ($result['status_chat']=='started') {
			$sql = "INSERT INTO chat_history (id_chat, isi_chat, id_pengirim, id_penerima, status_read, tanggal_chat )VALUES ('$id_chat', '$message', '$id_user', '$id_penerima', '0', '$tanggal')";
			if ($db->query($sql) === TRUE) {
				echo '{"status":"3", "id_user":"'.$id_user.'", "detail":"Chart start."}';
			}else {
				echo '{"status":"9","title":"'. $sql .'.", "detail":"'. $db->error.'", "type":"error"}';
			}
			$sql2 = "UPDATE chat_history SET status_read = '1' where  id_chat='$id_chat' and id_penerima='$id_user'";
			if ($db->query($sql2) === TRUE) {
				echo "";
			} else {
				echo "";
			}
		}elseif ($result['status_chat']=='pending') {
			$sql2 = "UPDATE tbl_chat SET status_chat = 'started' where id='$id_chat'";
			if ($db->query($sql2) === TRUE) {
				$sql = "INSERT INTO chat_history (id_chat, isi_chat, id_pengirim, id_penerima, status_read, tanggal_chat )VALUES ('$id_chat', '$message', '$id_user', '$id_penerima', '0', '$tanggal')";
				if ($db->query($sql) === TRUE) {
					echo '{"status":"3", "id_user":"'.$id_user.'", "detail":"Chart start."}'; 
				}else {
					echo '{"status":"9","title":"'. $sql .'.", "detail":"'. $db->error.'", "type":"error"}';
				}
			} else {
				echo '{"status":"0","title":"'. $sql .'.", "text":"'. $db->error.'", "type":"error"}';
			}
			$sql2 = "UPDATE chat_history SET status_read = '1' where id_chat='$id_chat' and id_penerima='$id_user' ";
			if ($db->query($sql2) === TRUE) {
				echo "";
			} else {
				echo "";
			}
			$db->close();
		}else{
			echo $result['status_chat'].$result['id'];
		}
		
	}
	
	die();
}else{
	echo "";
}