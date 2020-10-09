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
if (strtolower($param)=="notif") {
	
	$sql = "SELECT * FROM tbl_chat where status_chat='started' or status_chat='pending' ";
	$query = $db->query($sql);
	$row = mysqli_num_rows($query);
	if ($row==0) {
	# code...
	}else{
		$no = 0;
		while ($result = mysqli_fetch_assoc($query)) {
			if ($result['status_chat']=='started') {
				// echo $result['id'];
				// $no += 156;
				$id_chat = $result['id'];
				$sql1 = "SELECT * FROM chat_history where id_chat='$id_chat' and id_pengirim='$id_user' ";
				$query1 = $db->query($sql1);
				$row1 = mysqli_num_rows($query1);
				if ($row1==0) {
					# code...
				}else{
					$no+=1;
				}
			}else{
				$no += 1;

			}
		}
		if ($no==0) {
			# code...
		}else{
			echo '<span class="label radius-circle bg-danger float-right">'.$no.'</span>';
		}
	}
}elseif (strtolower($param)=="list") {
	$sql = "SELECT * FROM tbl_chat where status_chat='started' or status_chat='pending' ";
	$query = $db->query($sql);
	$row = mysqli_num_rows($query);
	if ($row==0) {
		echo '<span class="chat_msg_item " style="max-width: 100%;text-align: center;background: initial;color: #ced9e0;">Tidak ada chat user yang masuk.</span>';
	}else{
		$no = 0;
		while ($result = mysqli_fetch_assoc($query)) {
			$id_pengirim = $result['id_user'];
			$id_chat = $result['id'];
			$sqldetail = "SELECT * FROM tbl_user where id='$id_pengirim' ";
			$querydetail = $db->query($sqldetail);
			$rowdetail = mysqli_num_rows($querydetail);
			if ($rowdetail==0) {
				$nama_lengkap = 'Null';
			}else{
				$resultdetail = mysqli_fetch_assoc($querydetail);
				$nama_lengkap = $resultdetail['nama_lengkap'];
			}
			$sqlnotif = "SELECT * FROM chat_history where id_pengirim='$id_pengirim' and id_chat='$id_chat' and status_read = 0 ";
			$querynotif = $db->query($sqlnotif);
			$rownotif = mysqli_num_rows($querynotif);
			if ($rownotif==0) {
				$notif = '';
			}else{
				$notif = '<span class="label radius-circle bg-danger float-right">'.$rownotif.'</span>';
			}

			if ($result['status_chat']=='started') {
				// echo $result['id'];
				// $no += 156;
				$id_chat = $result['id'];
				$sql1 = "SELECT * FROM chat_history where id_chat='$id_chat' and id_pengirim='$id_user' ";
				$query1 = $db->query($sql1);
				$row1 = mysqli_num_rows($query1);
				if ($row1==0) {
					# code...
				}else{
					echo '<div class="row" style="padding-bottom: 10px;">
					<div class="col-md-12">
					<a href="chat.php?id='.enurl($id_pengirim).'">
					<div class="card">
					<div class="card-body d-flex align-items-center"><img src="../assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded"> <h6>'.$nama_lengkap.'</h6>'.$notif.'</div>
					</div>
					</a>
					</div>
					</div>';
				}
			}else{
				echo '<div class="row" style="padding-bottom: 10px;">
				<div class="col-md-12">
				<a href="chat.php?id='.enurl($id_pengirim).'">
				<div class="card">
				<div class="card-body d-flex align-items-center"><img src="../assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded"> <h6>'.$nama_lengkap.'</h6>'.$notif.'</div>
				</div>
				</a>
				</div>
				</div>';

			}
		}
		if ($no==0) {
			# code...
		}else{
			echo '<span class="label radius-circle bg-danger float-right">'.$no.'</span>';
		}
	}
	
}else{
	if (isset($_GET['statend'])) {
		$id_chat_u = deurl($_GET['id']);
		$sql = "SELECT * FROM chat_history where id_pengirim='$id_user' and id_penerima='$id_chat_u' order by id desc ";
		$query = $db->query($sql);
		$row=mysqli_num_rows($query);
		if ($row==0) {
	          // echo "ID TIDAK VALID";
			echo '';
			die();
		}else{
			$result = mysqli_fetch_assoc($query);
			$idd_chat = $result['id_chat'];
			$sqlcek = "SELECT * FROM tbl_chat where id='$idd_chat' and status_chat = 'started' ";
			$querycek = $db->query($sqlcek);
			$rowcek = mysqli_num_rows($querycek);
			if ($rowcek==0) {
				echo "";
			}else{
				echo '<a href="#" data-id="'.$_GET['id'].'" id="endchat">Akhiri</a></h3>';
			}
		} 
	}
}
?>