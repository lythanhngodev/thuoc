<?php 
	require_once "../../_l_.php";
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen'])) {
		if (isset($_POST['idkh']) && !empty($_POST['idkh'])) {
			$kn = new clsKetnoi();
			$idkh = intval($_POST['idkh']);
			$kiemtra = $kn->query("SELECT IDKH, TENKH, BIETHIEU, MST,SDT,DIACHI FROM khachhang WHERE XOA=b'0' AND IDKH='$idkh' LIMIT 0,1;");
			$qr = mysqli_fetch_assoc($kiemtra);
			echo json_encode($qr);
		}
	}
	exit();
 ?>