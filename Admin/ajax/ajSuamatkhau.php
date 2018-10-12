<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0
	);
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['mkc']) && !empty($_POST['mkc'])) {
			$kn = new clsKetnoi();
			$id = $_SESSION['idtk'];
			$mkc = mysqli_real_escape_string($kn->conn,$_POST['mkc']);
			$mkc = md5($mkc);
			$mkm = mysqli_real_escape_string($kn->conn,$_POST['mkm']);
			$mkm = md5($mkm);
			$id = intval($id);
			$kiemtra = $kn->editdata("UPDATE taikhoan SET MK='$mkm' WHERE IDTK = '$id' AND MK='$mkc'");
			if ($kiemtra>0) {
				$_SESSION['mk']=$mkm;
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