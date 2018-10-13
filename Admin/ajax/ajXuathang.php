<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0
	);
	session_start();
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['data'])) {
			$kn = new clsKetnoi();
			$data = $_POST['data'];
			$idkh = $_POST['idkh'];
			$shd = $_POST['shd'];
			$idtk = $_SESSION['idtk'];
			$dem=0;
			if ($kn->adddata("INSERT INTO hoadon (SOHOADON,IdKH,IDTK,NGAY,TGBAN) VALUES ('$shd','$idkh','$idtk','".date('Y-m-d')."','".date('H:i:s',time())."')") > 0) {
				for ($i=0; $i < count($data); $i++) { 
						$str = "
							INSERT INTO cthoadon(IDHD,IDMH,SOLUONG) VALUES ()
						";
						if (mysqli_query($kn->conn,$str)) {
							$dem++;
						}
				}
			}
			
			if ($dem>0) {
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