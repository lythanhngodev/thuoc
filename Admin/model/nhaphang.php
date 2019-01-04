<?php
	require_once "../_l_.php";
	function laymathang(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT mh.*,dvt.TENDVT, nh.TENNH FROM mathang mh LEFT JOIN donvitinh dvt on mh.IDDVT=dvt.IDDVT LEFT JOIN nhomhang nh on mh.IDNH=nh.IDNH WHERE mh.XOA=b'0';");
	} 
	function laydonvitinh(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT * FROM donvitinh WHERE XOA=b'0';");
	}
?>