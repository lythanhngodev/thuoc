<?php 
	require_once "../../_l_.php";
	session_start();
	if (isset($_SESSION['quyen'])) {
		if (isset($_POST['ten']) && !empty($_POST['ten'])) {
			$kn = new clsKetnoi();
			$ten = mysqli_real_escape_string($kn->conn,$_POST['ten']);
			$kiemtra = $kn->query("SELECT TENMH,IDMH  FROM mathang WHERE TENMH like '%$ten%'");
		    $rlh = null;
		    while($row = mysqli_fetch_assoc($kiemtra)) {
		        $rlh[] = $row;
		    }
		    echo json_encode($rlh);
		}
	}
	exit();
 ?>