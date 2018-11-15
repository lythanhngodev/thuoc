<?php 
	require_once "../_l_.php";
	session_start();
	if (isset($_SESSION['tdn']) && !empty($_SESSION['tdn']) && isset($_SESSION['mk']) && !empty($_SESSION['mk'])) {
		$kn = new clsKetnoi();
		$mk = $_SESSION['mk'];
		$tdn = $_SESSION['tdn'];
		$qr = $kn->query("SELECT * FROM taikhoan WHERE (BINARY TDN='$tdn') and (BINARY MK='$mk')");
		$result = mysqli_fetch_assoc($qr);
		if($result['Q']!='admin')
			$kn->golink($qlma['HOST']."Login");
		else{
			$_SESSION['quyen']=$result['Q'];
			$_SESSION['idtk']=$result['IDTK'];
			$_SESSION['hoten']=$result['HT'];
		}
	}
	else{
		$kn = new clsKetnoi();
		$kn->golink($qlma['HOST']."Login");
	}
function _token($sokytu){
    $bangchucai = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $matkhauduoctao = array();
    $chieudaimang = strlen($bangchucai) - 1;
    for ($i = 0; $i < $sokytu; $i++) {
        $n = rand(0, $chieudaimang);
        $matkhauduoctao[] = $bangchucai[$n];
    }
    return implode($matkhauduoctao); //turn the array into a string
}
 ?>