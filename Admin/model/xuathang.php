<?php
	require_once "../_l_.php";
	function laymathang(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT mh.IDMH, mh.IDNH, mh.IDDVT, mh.TENMH, mh.GIANHAP,mh.SOLUONG, mh.GIABAN, mh.GHICHU, mh.DIENGIAI,dvt.TENDVT, nh.TENNH, mh.HSD, mh.SOLO FROM mathang mh LEFT JOIN donvitinh dvt on mh.IDDVT=dvt.IDDVT LEFT JOIN nhomhang nh on mh.IDNH=nh.IDNH WHERE mh.XOA=b'0' ORDER BY mh.TENMH ASC;");
	} 
?>