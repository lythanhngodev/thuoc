<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0
	);
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['ten']) && !empty($_POST['ten'])) {
			$kn = new clsKetnoi();
			$ten = mysqli_real_escape_string($kn->conn,$_POST['ten']);
			$mst = mysqli_real_escape_string($kn->conn,$_POST['mst']);
			$dcmail = mysqli_real_escape_string($kn->conn,$_POST['dcmail']);
			$sdt = mysqli_real_escape_string($kn->conn,$_POST['sdt']);
			$diachi = mysqli_real_escape_string($kn->conn,$_POST['diachi']);
			$fax = mysqli_real_escape_string($kn->conn,$_POST['fax']);
			$stknganhang = mysqli_real_escape_string($kn->conn,$_POST['stk']);
			$kiemtra = $kn->editdata("
				UPDATE cauhinh 
				SET
					TENCTY = '$ten',
					MAIl = '$dcmail',
					SDT = '$sdt',
					FAX = '$fax',
					NGANHANG = '$stknganhang',
					DIACHI = '$diachi',
					MST = '$mst'
				WHERE IDCH = '1'");
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