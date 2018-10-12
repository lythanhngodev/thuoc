<?php
	require_once "../_l_.php";
	function laythongtin(){
		$kn = new clsKetnoi();
		$mk = $_SESSION['mk'];
		$tdn = $_SESSION['tdn'];
		$qr = $kn->query("SELECT * FROM taikhoan WHERE (BINARY TDN='$tdn') and (BINARY MK='$mk')");
		return $qr;
	}
?>