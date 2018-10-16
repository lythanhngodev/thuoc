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
				// Kiểm tra mặt hàng
				if ($kn->tontai("SELECT * FROM mathang WHERE TENMH = N'".$data[$i][0]."' AND SOLO = N'".$data[$i][2]."' AND HSD = '".$data[$i][3]."'")) {
					$str = "
						UPDATE mathang
						SET
							SOLUONG = SOLUONG + ".floatval($data[$i][4])."
						WHERE
							TENMH = N'".$data[$i][0]."' AND SOLO = N'".$data[$i][2]."' AND HSD = '".$data[$i][3]."';
					";
					if (mysqli_query($kn->conn,$str)) {
						$dem++;
					}
				}
				else if ($kn->tontai("SELECT * FROM mathang WHERE TENMH = N'".$data[$i][0]."' AND SOLO = N'".$data[$i][2]."' AND HSD != '".$data[$i][3]."'")){
					$iddvt = 0;
					$chuoidvt = "SELECT IDDVT FROM donvitinh WHERE TENDVT = '".mysqli_real_escape_string($kn->conn,$data[$i][1])."' LIMIT 0,1";
					$qrdvt = mysqli_query($kn->conn, $chuoidvt);
					$count = mysqli_num_rows($qrdvt);
					if ($count>0){
						$rdvt = mysqli_fetch_array($qrdvt);
						$iddvt = $rdvt[0];
					}
					else{
						$chuoidvt = "INSERT INTO donvitinh (TENDVT) VALUES ('".mysqli_real_escape_string($kn->conn,$data[$i][1])."');";
						$qrdvt = mysqli_query($kn->conn,$chuoidvt);
						$iddvt = mysqli_insert_id($kn->conn);
					}
					$iddvt = intval($iddvt);
					$str = "
						INSERT INTO mathang (IDNH,IDDVT,TENMH, GIANHAP, GIABAN, HSD,SOLO) VALUES ('0','$iddvt','".$data[$i][0]."','".$data[$i][5]."','".$data[$i][6]."', '".$data[$i][3]."','".$data[$i][2]."');
					";
					if (mysqli_query($kn->conn,$str)) {
						$dem++;
					}
				}
				else if ($kn->tontai("SELECT * FROM mathang WHERE TENMH = N'".$data[$i][0]."' AND SOLO != N'".$data[$i][2]."'")){
					$iddvt = 0;
					$chuoidvt = "SELECT IDDVT FROM donvitinh WHERE TENDVT = '".mysqli_real_escape_string($kn->conn,$data[$i][1])."' LIMIT 0,1";
					$qrdvt = mysqli_query($kn->conn, $chuoidvt);
					$count = mysqli_num_rows($qrdvt);
					if ($count>0){
						$rdvt = mysqli_fetch_array($qrdvt);
						$iddvt = $rdvt[0];
					}
					else{
						$chuoidvt = "INSERT INTO donvitinh (TENDVT) VALUES ('".mysqli_real_escape_string($kn->conn,$data[$i][1])."');";
						$qrdvt = mysqli_query($kn->conn,$chuoidvt);
						$iddvt = mysqli_insert_id($kn->$conn);
					}
					$iddvt = intval($iddvt);
					$str = "
						INSERT INTO mathang (IDNH,IDDVT,TENMH, GIANHAP, GIABAN, HSD,SOLO) VALUES ('0','$iddvt','".$data[$i][0]."','".$data[$i][5]."','".$data[$i][6]."', '".$data[$i][3]."','".$data[$i][2]."');
					";
					if (mysqli_query($kn->conn,$str)) {
						$dem++;
					}
				}
				else{
					$iddvt = 0;
					$chuoidvt = "SELECT IDDVT FROM donvitinh WHERE TENDVT = '".mysqli_real_escape_string($kn->conn,$data[$i][1])."' LIMIT 0,1";
					$qrdvt = mysqli_query($kn->conn, $chuoidvt);
					$count = mysqli_num_rows($qrdvt);
					if ($count>0){
						$rdvt = mysqli_fetch_array($qrdvt);
						$iddvt = $rdvt[0];
					}
					else{
						$chuoidvt = "INSERT INTO donvitinh (TENDVT) VALUES ('".mysqli_real_escape_string($kn->conn,$data[$i][1])."');";
						$qrdvt = mysqli_query($kn->conn,$chuoidvt);
						$iddvt = mysqli_insert_id($kn->conn);
					}
					$iddvt = intval($iddvt);
					$str = "
						INSERT INTO mathang (IDNH,IDDVT,TENMH, GIANHAP, GIABAN, HSD,SOLO) VALUES ('0','$iddvt','".$data[$i][0]."','".$data[$i][5]."','".$data[$i][6]."', '".$data[$i][3]."','".$data[$i][2]."');
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