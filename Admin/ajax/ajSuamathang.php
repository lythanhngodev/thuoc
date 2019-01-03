<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0
	);
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['mathang']) && !empty($_POST['mathang'])) {
			$kn = new clsKetnoi();
			$tenhang = mysqli_real_escape_string($kn->conn,$_POST['mathang']);
			$idmh = intval($_POST['idmh']);
			$idnh = intval($_POST['idnh']);
			$dvt = intval($_POST['dvt']);
			$gianhap = floatval($_POST['gianhap']);
			$giaban = floatval($_POST['giaban']);
			$ghichu = mysqli_real_escape_string($kn->conn,$_POST['ghichu']);
			$diengiai = mysqli_real_escape_string($kn->conn,$_POST['diengiai']);
			$solo = mysqli_real_escape_string($kn->conn,$_POST['solo']);
			$kiemtra = $kn->editdata("
				UPDATE mathang 
				SET
					IDNH = '$idnh',
					TENMH='$tenhang',
					IDDVT = '$dvt', 
					GIANHAP = '$gianhap',
					GIABAN = '$giaban',
					GHICHU = '$ghichu',
					DIENGIAI = '$diengiai',
					SOLO = '$solo'
				WHERE
					IDMH = '$idmh'
				");
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