<?php
session_start();
require '../sys/core.php';
$tanggal = date("Y-m-d H:i:s");
$url =  "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$param = parse_url($url, PHP_URL_QUERY);

if (strtolower($param)=="login") {
	if (!empty($_POST['username'])) {
		if (preg_match('/[^a-zA-Z0-9@\.]/', $_POST['username'])) {
			echo '{"status":"0", "detail":"Email atau Username salah."}';
		die();
		}else{
			$username = strtolower($_POST['username']);
		}
	}else{
		echo '{"status":"0", "detail":"Email atau Username Wajib di isi."}';
		die();
	}
	if (!empty($_POST['password'])) {
		$password = md5($_POST['password']);
	}else{
		echo '{"status":"0", "detail":"Password tidak boleh kosong."}';
		die();
	}
	$sql = "SELECT * FROM tbl_user where username='$username' or email='$username' ";
	$query = $db->query($sql);
	$row = mysqli_num_rows($query);
	if ($row==0) {
		echo '{"status":"0", "detail":"Email atau username tidak terdaftar."}';
		die();
	}else{
		$result = mysqli_fetch_assoc($query);
		if ($result['password']==$password) {
			$_SESSION['user'] = $result['id'];
			$id_user = $result['id'];
			$sql2 = "UPDATE tbl_user SET status_online = 'online' where  id='$id_user'";
			if ($db->query($sql2) === TRUE) {
				echo '{"status":"1"}';
				die();
			} else {
				echo "";
			}
			
		}else{
			echo '{"status":"0", "detail":"Password anda salah."}';
			die();
		}
	}
}elseif (strtolower($param)=="daftar") {
	if (!empty($_POST['username'])) {
		if (preg_match('/[^a-zA-Z0-9]/', $_POST['username'])) {
			echo '{"status":"0", "detail":"Username harus huruf atau angka."}';
		die();
		}else{
			$username = strtolower($_POST['username']);
		}
	}else{
		echo '{"status":"0", "detail":"Username Wajib di isi."}';
		die();
	}

	if (!empty($_POST['email'])) {
		$email = strtolower($_POST['email']);
	}else{
		echo '{"status":"0", "detail":"email Wajib di isi."}';
		die();
	}

	if (!empty($_POST['nama_lengkap'])) {
		if (preg_match('/[^a-zA-Z ]/', $_POST['nama_lengkap'])) {
			echo '{"status":"0", "detail":"Nama Lengkap harus huruf."}';
			die();
		}else{
			$nama_lengkap = ucwords(strtolower($_POST['nama_lengkap']));
		}
	}else{
		echo '{"status":"0", "detail":"Nama Lengkap Wajib di isi."}';
		die();
	}

	if (!empty($_POST['password'])) {
		$password = md5($_POST['password']);
	}else{
		echo '{"status":"0", "detail":"Password tidak boleh kosong."}';
		die();
	}
	if (!empty($_POST['image'])) {
		$image = $_POST['image'];
		if ($image==enurl('L') or $image==enurl('P')) {
			$image = $image;
		}else{
			echo '{"status":"0", "detail":"Invalid Jenis Kelamin."}';
		die();
		}
	}else{
		echo '{"status":"0", "detail":"Jenis Kelamin Harap dipilih."}';
		die();
	}
	$sql = "SELECT * FROM tbl_user where username='$username' or email='$email' ";
	$query = $db->query($sql);
	$row = mysqli_num_rows($query);
	if ($row==0) {
		$sql = "INSERT INTO tbl_user (nama_lengkap, username, password, email, status_user, image, status_online, tanggal_tambah )VALUES ('$nama_lengkap', '$username', '$password', '$email', 'user', '$image', 'online', '$tanggal')";
		if ($db->query($sql) === TRUE) {
			$last_id = $db->insert_id;
			$_SESSION['user'] = $last_id;
			echo '{"status":"1"}';
		}else {
			echo '{"status":"0","title":"'. $sql .'.", "detail":"'. $db->error.'", "type":"error"}';
		}
	}else{
		$result = mysqli_fetch_assoc($query);
		if ($result['username']==$username) {
			echo '{"status":"0", "detail":"Username Telah terdaftar."}';
			die();
		}
		if ($result['email']==$email) {
			echo '{"status":"0", "detail":"Email Telah terdaftar."}';
			die();
		}
	}
}else{
	echo "";
}