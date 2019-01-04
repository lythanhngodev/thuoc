<?php 
	require_once "../../_l_.php";
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen'])) {
		if (isset($_POST['idmh']) && !empty($_POST['idmh'])) {
			$kn = new clsKetnoi();
			$idmh = intval($_POST['idmh']);
			$kiemtra = $kn->query("SELECT mh.*,dvt.TENDVT, nh.TENNH FROM mathang mh LEFT JOIN donvitinh dvt on mh.IDDVT=dvt.IDDVT LEFT JOIN nhomhang nh on mh.IDNH=nh.IDNH WHERE mh.XOA=b'0' AND IDMH='$idmh';");
			$qr = mysqli_fetch_assoc($kiemtra);
			echo json_encode($qr);
		}
	}
	exit();
 ?>