<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0
	);
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['mathang']) && !empty($_POST['mathang'])) {
			$kn = new clsKetnoi();
			$tentang = mysqli_real_escape_string($kn->conn,$_POST['mathang']);
			$diengiai = mysqli_real_escape_string($kn->conn,$_POST['diengiai']);
			$idnh = intval($_POST['idnh']);
			$dvt = intval($_POST['dvt']);
			$gianhap = floatval($_POST['gianhap']);
			$giaban = floatval($_POST['giaban']);
			$ghichu = mysqli_real_escape_string($kn->conn,$_POST['ghichu']);
			$kiemtra = $kn->adddata("INSERT INTO mathang (IDNH,TENMH, IDDVT, GIANHAP, GIABAN, GHICHU, DIENGIAI) VALUES ('$idnh','$tentang','$dvt','$gianhap','$giaban', '$ghichu', '$diengiai');");
			if ($kiemtra>0) {
				$kq['trangthai']=1;
				echo json_encode($kq);
			}
			else
				echo json_encode($kq);
		}
		else echo json_encode($kq);
	}
	else echo json_encode($kq);
	exit();
 ?>