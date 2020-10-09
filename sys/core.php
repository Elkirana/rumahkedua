<?php
	$db = mysqli_connect('localhost', 'root', '', 'rumahkedua');
	if (!$db) {
		die(mysqli_error($db));
	}
	function enurl($str){
		$encrypted_string=openssl_encrypt($str,"AES-128-ECB",'encrypt:)');
		return base64_encode($encrypted_string);
	}
	function deurl($str){
		$decrypted_string=openssl_decrypt(base64_decode($str),"AES-128-ECB",'encrypt:)');
		return $decrypted_string;
	}
?>
