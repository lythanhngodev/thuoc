<?php
	require_once "../_l_.php";
	function laykhachhang(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT * FROM khachhang WHERE XOA=b'0';");
	}
?>