<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0
	);
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['idkh']) && !empty($_POST['idkh'])) {
			$kn = new clsKetnoi();
			$ten = mysqli_real_escape_string($kn->conn,$_POST['ten']);
			$bidanh = mysqli_real_escape_string($kn->conn,$_POST['bidanh']);
			$dienthoai = mysqli_real_escape_string($kn->conn,$_POST['dienthoai']);
			$diachi = mysqli_real_escape_string($kn->conn,$_POST['diachi']);
			$masothue = mysqli_real_escape_string($kn->conn,$_POST['masothue']);
			$idkh = intval($_POST['idkh']);
			$kiemtra = $kn->editdata("UPDATE khachhang SET TENKH='$ten', BIETHIEU='$bidanh', MST='$masothue', SDT='$dienthoai', DIACHI='$diachi' WHERE IDKH=$idkh;");
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