<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0
	);
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['ten']) && !empty($_POST['ten'])) {
			$kn = new clsKetnoi();
			$id = $_SESSION['idtk'];
			$ten = mysqli_real_escape_string($kn->conn,$_POST['ten']);
			$tdn = mysqli_real_escape_string($kn->conn,$_POST['tdn']);
			$mail = mysqli_real_escape_string($kn->conn,$_POST['mail']);
			$sdt = mysqli_real_escape_string($kn->conn,$_POST['sdt']);
			$diachi = mysqli_real_escape_string($kn->conn,$_POST['diachi']);
			$id = intval($id);
			$kiemtra = $kn->editdata("UPDATE taikhoan SET HT='$ten',SDT='$sdt', TDN='$tdn', DC='$diachi',MAIL='$mail' WHERE IDTK = '$id'");
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