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
if (strtolower($param)=="submit") {
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
	if (!empty($_POST['status_user'])) {
		$status_user = strtolower($_POST['status_user']);
		if ($status_user=='admin' or $status_user=='psikolog' or $status_user=='user' ) {
			$status_user = $status_user;
		}else{
			echo '{"status":"0", "detail":"Invalid status User."}';
			die();
		}
	}

	if (!empty($_POST['password'])) {
		$password = md5($_POST['password']);
	}else{
		echo '{"status":"0", "detail":"Password tidak boleh kosong."}';
		die();
	}
	if (!empty($_POST['jenis_kelamin'])) {
		$image = $_POST['jenis_kelamin'];
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
		$sql = "INSERT INTO tbl_user (nama_lengkap, username, password, email, status_user, image, status_online, tanggal_tambah )VALUES ('$nama_lengkap', '$username', '$password', '$email', '$status_user', '$image', 'online', '$tanggal')";
		if ($db->query($sql) === TRUE) {
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
	die();
}elseif (strtolower($param)=="delete") {
	if (!empty($_POST['id'])) {
			$user_id = deurl($_POST['id']);
		    $sql = "SELECT * FROM tbl_user where id='$user_id' ";
		    $query = $db->query($sql);
		    $row=mysqli_num_rows($query);
		    if ($row==0) {
		      // echo "ID TIDAK VALID";
		    	echo '{"status":"3", "title":"Oops ada yang salah", "detail":"Id Tidak terdaftar di database."}';
		    	die();
		    }else{
		      $sql = "DELETE FROM tbl_user where id='$user_id' ";
		      if ($db->query($sql) === TRUE) {
		      	echo '{"status":"1","title":"Data User Berhasil Dihapus.", "detail":"Berhasil Menghapus Data User .", "type":"success"}';
		      }else {
	              // echo "Error: " . $sql . "<br>" . $db->error;
		      	echo '{"status":"0","title":"'. $sql .'.", "detail":"'. $db->error.'", "type":"error"}';
		      	unlink($file_rename);
		      }
		    }
	}
	die();
}elseif (strtolower($param)=="get") {
	if (!empty($_POST['id'])) {
	    $id_usr = deurl($_POST['id']);
	    $sql = "SELECT * FROM tbl_user where id='$id_usr' ";
	    $query = $db->query($sql);
	    $row=mysqli_num_rows($query);
	    if ($row==0) {
	      echo "ID TIDAK VALID";
	      die();
	    }else{
	    	$result = mysqli_fetch_assoc($query);
	    	echo '<div class="form-group">
	    	<label>Nama Lengkap</label>
	    	<div>
	    	<input type="hidden" name="id_user" value="'.enurl($result['id']).'"/>
	    	<input data-parsley-type="alphanum" name="nama_lengkap" type="text-align"
	    	class="form-control" required
	    	placeholder="Nama Lengkap" value="'.$result['nama_lengkap'].'"/>
	    	</div>
	    	</div>
	    	<div class="form-group">
	    	<label>Username</label>
	    	<div>
	    	<input data-parsley-type="alphanum" name="username" type="text-align"
	    	class="form-control" required
	    	placeholder="username" value="'.$result['username'].'"/>
	    	</div>
	    	</div>
	    	<div class="form-group">
	    	<label>Email</label>
	    	<div>
	    	<input type="email" name="email" type="text-align"
	    	class="form-control" required value="'.$result['email'].'"
	    	placeholder="Email"/>
	    	</div>
	    	</div>
	    	<div class="form-group">
	    	<label>Password</label>
	    	<div>
	    	<input type="password" name="password" type="text-align"
	    	class="form-control" 
	    	placeholder="Password"/>
	    	<smal>Kosongkan jika tidak mau dirubah</smal>
	    	</div>
	    	</div>
	    	<div class="form-group">
	    	<label>Jenis Kelamin</label>
	    	<div>
	    	<select name="jenis_kelamin" class="form-control" required>
	    	<option selected disabled value>-- Harap Pilih Jenis Kelamin --</option>
	    	<option value="'.enurl('L').'">Pria</option>
	    	<option value="'.enurl('P').'">Wanita</option>
	    	</select>
	    	</div>
	    	</div>
	    	<div class="form-group">
	    	<label>Status User</label>
	    	<div>
	    	<select name="status_user" class="form-control" required>
	    	<option selected disabled value>-- Harap Pilih Status User --</option>
	    	<option value="admin">Admin</option>
	    	<option value="psikolog">Psikolog</option>
	    	<option value="user">User</option>
	    	</select>
	    	</div>
	    	</div>';
	    }
	}
	
}elseif (strtolower($param)=="edit") {
	if (isset($_POST['username'])) {
		if (!empty($_POST['username'])) {
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
			if (!empty($_POST['id_user'])) {
				$id_usr = $_POST['id_user'];
				$id_usr = deurl($id_usr);
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
			if (!empty($_POST['status_user'])) {
				$status_user = strtolower($_POST['status_user']);
				if ($status_user=='admin' or $status_user=='psikolog' or $status_user=='user' ) {
					$status_user = $status_user;
				}else{
					echo '{"status":"0", "detail":"Invalid status User."}';
					die();
				}
			}
			if (!empty($_POST['jenis_kelamin'])) {
				$image = $_POST['jenis_kelamin'];
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

			$sql = "SELECT * FROM tbl_user where id='$id_usr'";
			$query = $db->query($sql);
			$row = mysqli_num_rows($query);
			if ($row==0) {
				echo $id_usr;
				// echo '{"status":"0", "detail":"Unknown Data User."}';
				die();
			}else{
				$result = mysqli_fetch_assoc($query);
				if (!empty($_POST['password'])) {
					$password = md5($_POST['password']);
				}else{
					$password = $result['password'];
				}
				$sql = "SELECT * FROM tbl_user where username='$username' or email='$email' ";
				$query = $db->query($sql);
				$row = mysqli_num_rows($query);
				if ($row==0) {
					$sql2 = "UPDATE tbl_user SET  nama_lengkap = '$nama_lengkap', username = '$username', password = '$password', email = '$email', status_user = '$status_user', image = '$image', status_online = 'offline', tanggal_tambah = '$tanggal' where  id='$id_usr'";
					if ($db->query($sql2) === TRUE) {
						echo '{"status":"1","title":"Data sukses di perbaharui.", "detail":"Data sukses di perbaharui.", "type":"success"}';
						die();
					} else {
						echo "";
					}
				}else{
					$result = mysqli_fetch_assoc($query);
					if ($result['username']==$username and $result['id']==$id_usr or $result['email']==$email and $result['id']==$id_usr) {
						$sql2 = "UPDATE tbl_user SET  nama_lengkap = '$nama_lengkap', username = '$username', password = '$password', email = '$email', status_user = '$status_user', image = '$image', status_online = 'offline', tanggal_tambah = '$tanggal' where  id='$id_usr'";
						if ($db->query($sql2) === TRUE) {
							echo '{"status":"1","title":"Data sukses di perbaharui.", "detail":"Data sukses di perbaharuis.", "type":"success"}';
							die();
						} else {
							echo "";
						}
					}else{
						if ($result['username']==$username) {
							echo '{"status":"0", "detail":"Username Telah terdaftar."}';
							die();
						}
						if ($result['email']==$email) {
							echo '{"status":"0", "detail":"Email Telah terdaftar."}';
							die();
						}
					}
					
				}
			}
			die();
		}
	}
}else{
	echo "";
}