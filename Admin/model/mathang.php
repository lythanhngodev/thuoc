<?php
	require_once "../_l_.php";
	function laymathang(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT mh.IDMH, mh.IDNH, mh.IDDVT, mh.TENMH, mh.GIANHAP,mh.SOLUONG, mh.GIABAN, mh.GHICHU, dvt.TENDVT, nh.TENNH FROM mathang mh LEFT JOIN donvitinh dvt on mh.IDDVT=dvt.IDDVT LEFT JOIN nhomhang nh on mh.IDNH=nh.IDNH WHERE mh.XOA=b'0';");
	} 
	function laynhommathang(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT * FROM nhomhang WHERE XOA=b'0';");
	}
	include_once "donvitinh.php";
 ?>