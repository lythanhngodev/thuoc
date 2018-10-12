<?php
	require_once "../_l_.php";
	function laycauhinh(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT * FROM cauhinh;");
	}
?>