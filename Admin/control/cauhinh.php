<?php 
	require_once "model/cauhinh.php";
	$cauhinh = laycauhinh();
	$mch = null;
	while ($row = mysqli_fetch_assoc($cauhinh)) {
		$mch = $row;
	}
	require_once "view/cauhinh.php";
 ?>