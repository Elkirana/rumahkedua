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
	$judul_post = ucwords(strtolower($_POST['judul_post']));
	$isi_post = nl2br($_POST['isi_post']);
	$isi_post = str_replace("'", "`", $isi_post);
	$id_kategori = deurl($_POST['id_kategori']);
	$sql = "SELECT * FROM tbl_kategori where id='$id_kategori' ";
  $query = $db->query($sql);
  $row = mysqli_num_rows($query);
  if ($row==0) {
    echo '{"status":"2", "title":"Oops ada yang salah", "detail":"Id Kategori invalid."}';
    die();
  }else{
  	$id_kategori = $id_kategori;
  }
  $sql = "SELECT * FROM tbl_user where id='$id_user' ";
  $query = $db->query($sql);
  $row = mysqli_num_rows($query);
  if ($row==0) {
    echo '{"status":"2", "title":"Oops ada yang salah", "detail":"Id invalid."}';
    die();
  }else{
  	$result = mysqli_fetch_assoc($query);
  	if (strtolower($result['status_user'])=='admin' or strtolower($result['status_user'])=='psikolog') {
  		if(is_array($_FILES)) {
	      if (count($_FILES)!=0) {
	        if(is_uploaded_file($_FILES['foto_artikel']['tmp_name'])) {
	        $file_dir = "../../../assets/home/images/uploads/";
	        $file_file = $file_dir . basename($_FILES['foto_artikel']['name']);
	        $ekstensi = substr($file_file,-3);
	          if (strtolower($ekstensi)=="peg") {
	            $ekstensi = substr($file_file,-4);
	          }else{
	            $ekstensi = substr($file_file,-3);
	          }
	          $filename = md5(date('hisdmy')).".".$ekstensi;
	          $file_rename = $file_dir.$filename;
	          if(move_uploaded_file($_FILES['foto_artikel']['tmp_name'],$file_rename)) {
	            $sql = "INSERT INTO tbl_post (judul_post, isi_post, gambar_post, id_kategori, id_user, tanggal_post) VALUES ('$judul_post', '$isi_post', '$filename', '$id_kategori', '$id_user', '$tanggal')";
	            if ($db->query($sql) === TRUE) {
	              echo '{"status":"1","title":"Artikel Sukses Ditambahkan.", "detail":"Berhasil menambahkan Artikel .", "type":"error"}';
	            }else {
	              // echo "Error: " . $sql . "<br>" . $db->error;
	              echo '{"status":"0","title":"'. $sql .'.", "detail":"'. $db->error.'", "type":"error"}';
	              unlink($file_rename);
	            }
	          }else{
	            echo '{"status":"2", "title":"Oops ada yang salah", "detail":"Gagal mengupload gambar ke server."}';
	            die();
	          }
	        }
	      }else{
	        echo "";
	      }
	  }
  	}else{
  		echo '{"status":"2", "title":"Oops ada yang salah", "detail":"Anda tidak dapat membuat artikel."}';
	    die();
  	}
  }

  
}elseif (strtolower($param)=="delete") {
	// echo '{"status":"1", "title":"Oops ada yang salah", "detail":"Id Kategori invalid."}';
	if (isset($_POST['id'])) {
		if (!empty($_POST['id'])) {
			$id = $_POST['id'];
			$id = deurl($id);
			$user_id = deurl($_POST['id']);
		    $sql = "SELECT * FROM tbl_post where id='$user_id' ";
		    $query = $db->query($sql);
		    $row=mysqli_num_rows($query);
		    if ($row==0) {
		      // echo "ID TIDAK VALID";
		    	echo '{"status":"3", "title":"Oops ada yang salah", "detail":"Id Tidak terdaftar di database."}';
		    	die();
		    }else{
		      $result = mysqli_fetch_assoc($query);
		      $get = '../../../assets/home/images/uploads/'.$result['gambar_post'];
		      if (file_exists($get)) {
		      	unlink($get);
		      }else{
		      	echo "";
		      } 

		      $sql = "DELETE FROM tbl_post where id='$id' ";
		      if ($db->query($sql) === TRUE) {
		      	echo '{"status":"1","title":"Artikel Sukses Dihapus.", "detail":"Berhasil Menghapus Artikel .", "type":"success"}';
		      }else {
	              // echo "Error: " . $sql . "<br>" . $db->error;
		      	echo '{"status":"0","title":"'. $sql .'.", "detail":"'. $db->error.'", "type":"error"}';
		      	unlink($file_rename);
		      }
		    }
		}
	}

}elseif (strtolower($param)=="removeslide") {
	// echo '{"status":"1", "title":"Oops ada yang salah", "detail":"Id Kategori invalid."}';
	if (isset($_POST['id'])) {
		if (!empty($_POST['id'])) {
			$id = $_POST['id'];
			$id = deurl($id);
			$user_id = deurl($_POST['id']);
		    $sql = "SELECT * FROM tbl_post where id='$id' ";
		    $query = $db->query($sql);
		    $row=mysqli_num_rows($query);
		    if ($row==0) {
		      // echo "ID TIDAK VALID";
		    	echo '{"status":"3", "title":"Oops ada yang salah", "detail":"Id Tidak terdaftar di database."}';
		    	die();
		    }else{
		      $result = mysqli_fetch_assoc($query);
		      $sql2 = "UPDATE tbl_post SET status_slider = '0' where  id='$id'";
		      if ($db->query($sql2) === TRUE) {
		      	echo '{"status":"1","title":"Artikel Sukses Dihapus Dari SLider.", "detail":"Berhasil Menghapus Artikel dari slider.", "type":"success"}';
		      } else {
		      	echo "";
		      }
		      
		    }
		}
	}

}elseif (strtolower($param)=="addslide") {
	// echo '{"status":"1", "title":"Oops ada yang salah", "detail":"Id Kategori invalid."}';
	if (isset($_POST['id'])) {
		if (!empty($_POST['id'])) {
			$id = $_POST['id'];
			$id = deurl($id);
			$user_id = deurl($_POST['id']);
		    $sql = "SELECT * FROM tbl_post where id='$id' ";
		    $query = $db->query($sql);
		    $row=mysqli_num_rows($query);
		    if ($row==0) {
		      // echo "ID TIDAK VALID";
		    	echo '{"status":"3", "title":"Oops ada yang salah", "detail":"Id Tidak terdaftar di database."}';
		    	die();
		    }else{
		    	$result = mysqli_fetch_assoc($query);
		    	$sql_cek = "SELECT * FROM tbl_post where status_slider='1' ";
		    	$query_cek = $db->query($sql_cek);
		    	$row_cek=mysqli_num_rows($query_cek);
		    	// echo $row_cek;
		    	if ($row_cek<=2) {
		    		$sql2 = "UPDATE tbl_post SET status_slider = '1' where  id='$id'";
		    		if ($db->query($sql2) === TRUE) {
		    			echo '{"status":"1","title":"Artikel Sukses Ditambahkan ke SLider.", "detail":"Berhasil menambahkan Artikel ke slider.", "type":"success"}';
		    		} else {
		    			echo "";
		    		}
		    	}else{
		    		echo '{"status":"3","title":"Oops Index hanya menampung\n 3 Slider.", "detail":"", "type":"success"}';
		    	}
		      
		      
		    }
		}
	}

}elseif (strtolower($param)=="get") {
	if (!empty($_POST['id'])) {
    $id_post = deurl($_POST['id']);
    $sql = "SELECT * FROM tbl_post where id='$id_post' ";
    $query = $db->query($sql);
    $row=mysqli_num_rows($query);
    if ($row==0) {
      echo "ID TIDAK VALID";
      die();
    }else{
      $result = mysqli_fetch_assoc($query);
      
    }
    $isi_post = $result['isi_post'];
    $isi_post = str_replace("<br />", "\n", $isi_post);

    echo '<form role="form" id="form-edit" method="post">
    <div class="form-group">
    <label>Judul Artikel</label>
    <div>
    <input type="hidden" value="'.enurl($result['id_kategori']).'" name="id_kategori">
    <input type="hidden" value="'.enurl($result['id']).'" name="id_post">
    <input data-parsley-type="alphanum" name="judul_post" type="text-align"
    class="form-control" required
    placeholder="Judul Artikel" value="'.$result['judul_post'].'"/>
    </div>
    </div>
    <div class="form-group">
    <label>Kategori Artikel</label>
    <div>
    <select data-parsley-required="true" class="form-control" name="id_kategori" required >
    <option disabled selected value> -- Harap Pilih Kategori -- </option>';
    $sql = "SELECT * FROM tbl_kategori order by nama_kategori asc";
    $query = $db->query($sql);
    while ($result=mysqli_fetch_assoc($query)) {
    	echo '<option value="'.enurl($result['id']).'">'.$result['nama_kategori'].'</option>';
    }
    echo '
    </select>
    </div>
    </div>
    <div class="form-group">
    <label>Isi Artikel</label>
    <div>
    <textarea rows="3" name="isi_post" class="form-control" required>'.$isi_post.'</textarea>
    </div>
    </div>
    <div class="form-group">
    <label>Image Artikel</label>
    <div>
    <input class="form-control" name="foto_artikel" id="ImageBrowse"  type="file">
    </div>
    </div>
</form>';
  }else{
    echo "UNK ID";
    die();
  }
	
}elseif (strtolower($param)=="edit") {
	if (isset($_POST['id_post'])) {
		if (!empty($_POST['id_post'])) {
			$id_post = $_POST['id_post'];
			$id_post = deurl($id_post);
			$judul_post = ucwords(strtolower($_POST['judul_post']));
			$isi_post = nl2br($_POST['isi_post']);
			$isi_post = str_replace("'", "`", $isi_post);
			$id_kategori = deurl($_POST['id_kategori']);
	// echo $id_post;
			$sql = "SELECT * FROM tbl_post where id='$id_post' ";
			$query = $db->query($sql);
			$row = mysqli_num_rows($query);
			if ($row==0) {
				echo '{"status":"3","title":"Oops ID Post Invalid", "detail":"", "type":"success"}';
				die();
			}else{
				$result_post = mysqli_fetch_assoc($query);
				if(is_array($_FILES)) {
					if (count($_FILES)!=0) {
						if(is_uploaded_file($_FILES['foto_artikel']['tmp_name'])) {
							$file_dir = "../../../assets/home/images/uploads/";
							$file_file = $file_dir . basename($_FILES['foto_artikel']['name']);
							$ekstensi = substr($file_file,-3);
							if (strtolower($ekstensi)=="peg") {
								$ekstensi = substr($file_file,-4);
							}else{
								$ekstensi = substr($file_file,-3);
							}
							$filename = md5(date('hisdmy')).".".$ekstensi;
							$file_rename = $filename;
							if(move_uploaded_file($_FILES['foto_artikel']['tmp_name'],$file_dir.$file_rename)) {
								$image_post = $result_post['gambar_post'];
								$file_remv = $file_dir.$image_post;
								if (file_exists($file_remv)) {
									unlink($file_remv);
								}
							}else{
								echo '{"status":"2", "title":"Oops ada yang salah", "detail":"Gagal mengupload gambar ke server."}';
								die();
							}
						}else{
							$file_rename = $result_post['gambar_post'];
						}
					}else{
						$file_rename = $result_post['gambar_post'];
					}
				}else{
					$file_rename = $result_post['gambar_post'];
				}

 				$sql2 = "UPDATE tbl_post SET  judul_post = '$judul_post', isi_post = '$isi_post', gambar_post = '$file_rename', id_kategori = '$id_kategori', id_user = '$id_user', tanggal_post = '$tanggal' where  id='$id_post'";
				if ($db->query($sql2) === TRUE) {
					echo '{"status":"1","title":"Artikel Sukses Ditambahkan ke SLider.", "detail":"Berhasil menambahkan Artikel ke slider.", "type":"success"}';
					die();
				} else {
					echo "";
				}
			}

		}else{
			echo '{"status":"3","title":"Oops ID Post Invalid", "detail":"", "type":"success"}';
			die();
		}
	}else{
		echo '{"status":"3","title":"Oops Unknown ID Post", "detail":"", "type":"success"}';
		die();
	}
}else{
	echo "";
}