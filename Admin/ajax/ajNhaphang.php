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
			$dem=0;
			for ($i=0; $i < count($data); $i++) {
				for ($j=0; $j < count($data[$i]); $j++) { 
					$data[$i][$j] = trim($data[$i][$j]); 
				}
			}
			for ($i=0; $i < count($data); $i++) { 
				// Kiểm tra mặt hàng
				if ($kn->tontai("SELECT * FROM mathang WHERE TENMH = N'".$data[$i][0]."' AND SOLO = N'".$data[$i][2]."'")) {
					$str = "
						UPDATE mathang
						SET
							SOLUONG = SOLUONG + ".floatval($data[$i][3]).",
							GIANHAP = ".floatval($data[$i][4]).",
							GIABAN = ".floatval($data[$i][5])."
						WHERE
							TENMH = N'".$data[$i][0]."' AND SOLO = N'".$data[$i][2]."';
					";
					if (mysqli_query($kn->conn,$str)) {
						$dem++;
					}
				}
				else if ($kn->tontai("SELECT * FROM mathang WHERE TENMH = N'".$data[$i][0]."' AND SOLO != N'".$data[$i][2]."'")){
					$iddvt = intval($data[$i][1]);
					$str = "
						INSERT INTO mathang (IDDVT,TENMH, GIANHAP, GIABAN, SOLO) VALUES ($iddvt,'".$data[$i][0]."','".$data[$i][4]."','".$data[$i][5]."', '".$data[$i][2]."');
					";
					if (mysqli_query($kn->conn,$str)) {
						$dem++;

					}
				}
				else{
					$iddvt = intval($data[$i][1]);
					$str = "
						INSERT INTO mathang (IDDVT,TENMH, GIANHAP, GIABAN, SOLO) VALUES ($iddvt,'".$data[$i][0]."','".$data[$i][4]."','".$data[$i][5]."','".$data[$i][2]."');
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