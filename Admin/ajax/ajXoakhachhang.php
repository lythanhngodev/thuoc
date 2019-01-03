<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0,
		'thongbao' =>'khách hàng này đang được sử dụng, không được xóa',
	);
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$kn = new clsKetnoi();
			$id = intval($_POST['id']);
			if ($kn->tontai("SELECT IDKH FROM hoadon WHERE IDKH=$id")) {
				echo json_encode($kq);
				exit();
			}
			$kiemtra = $kn->deletedata("DELETE FROM khachhang WHERE IDKH = $id");
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