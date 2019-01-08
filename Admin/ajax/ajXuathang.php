<?php 
	require_once "../../_l_.php";
	$kq = array(
		'trangthai'=>0,
		'thongbao'=>'Hóa đơn này đã thao tác rồi, load lại trang'
	);
	session_start();
	if (!isset($_SESSION['_token'])) {
		echo json_encode($kq);
		exit();
	}
	else{
		if ($_POST['token']!=$_SESSION['_token']) {
			echo json_encode($kq);
			exit();
		}
	}
	if (isset($_SESSION['quyen']) && !empty($_SESSION['quyen']) && $_SESSION['quyen'] == 'admin') {
		if (isset($_POST['data'])) {
			$kn = new clsKetnoi();
			$data = $_POST['data'];
			$idkh = $_POST['idkh'];
			$shd = $_POST['shd'];
			$tienkhach = $_POST['tienkhach'];
			$idtk = $_SESSION['idtk'];
			$dem=0;
			if ($kn->adddata("INSERT INTO hoadon (SOHOADON,IDKH,IDTK,NGAY,TGBAN,TIENDUA) VALUES ('$shd','$idkh','$idtk','".date('Y-m-d')."','".date('H:i:s',time())."','$tienkhach')") > 0) {
				$idhd = mysqli_insert_id($kn->conn);
				for ($i=0; $i < count($data); $i++) { 
					$idmh = $data[$i][0];
					$diengiai = $data[$i][2];
					$dvt = $data[$i][3];
					$nsx = $data[$i][5];
					$hsd = $data[$i][6];
					$soluong = $data[$i][7];
					$dongia = $data[$i][8];
					$vat = floatval($data[$i][10]);
					$ck = floatval($data[$i][11]);
					$str = "
						INSERT INTO cthoadon(IDHD,IDMH,SOLUONG,VAT,CK,DONGIA,HSD,NSX,DIENGIAI,DVT) VALUES ('$idhd','$idmh','$soluong','$vat','$ck','$dongia','$hsd','$nsx','$diengiai','$dvt');
					";
					if (mysqli_query($kn->conn,$str)) {
						$str = "
						UPDATE mathang SET SOLUONG=SOLUONG -'$soluong' WHERE IDMH='$idmh';
					";
						mysqli_query($kn->conn,$str);
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