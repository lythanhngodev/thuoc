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
			$tienkhach = $_POST['tienkhach'];
			$idtk = $_SESSION['idtk'];
			$dem=0;
			if ($kn->adddata("INSERT INTO hoadon (SOHOADON,IDKH,IDTK,NGAY,TGBAN) VALUES ('$shd','$idkh','$idtk','".date('Y-m-d')."','".date('H:i:s',time())."')") > 0) {
				$idhd = mysqli_insert_id($kn->conn);
				for ($i=0; $i < count($data); $i++) { 
						$idmh = $data[$i][0];
						$soluong = $data[$i][6];
						$vat = $data[$i][9];
						$ck = $data[$i][10];
						$str = "
							INSERT INTO cthoadon(IDHD,IDMH,SOLUONG,VAT,CK,TIENDUA) VALUES ('$idhd','$idmh','$soluong','$vat','$ck','$tienkhach');
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