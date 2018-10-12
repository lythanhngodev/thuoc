<?php 
	require_once "model/thongtincanhan.php";
	$thongtin = laythongtin();
	$tt = null;
	while ($row = mysqli_fetch_assoc($thongtin)) {
		$tt = $row;
	}
	require_once "view/thongtincanhan.php";
 ?>