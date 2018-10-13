<?php 
	require_once "../../_l_.php";
	session_start();
	if (isset($_SESSION['quyen'])) {
		if (isset($_POST['ten']) && !empty($_POST['ten'])) {
			$kn = new clsKetnoi();
			$ten = mysqli_real_escape_string($kn->conn,$_POST['ten']);
			if ($ten=="") { ?>
		    <script type="text/javascript">
		    <?php
			echo "mathangajax = null;"; exit();
			?>
			</script>
			<?php 
			}
			$kiemtra = $kn->query("SELECT CONCAT(TENKH,' - id: ',IDKH)  FROM khachhang WHERE TENKH like '%$ten%'");
		    $rlh = null;
		    while($row = mysqli_fetch_row($kiemtra)) {
		        $rlh[] = $row[0];
		    } ?> 
		    <script type="text/javascript">
		    <?php
			echo "mathangajax = ".json_encode($rlh).";autocomplete(document.getElementById(\"them-tenkh\"), mathangajax);";
			?>
			</script>
			<?php 
		}
		else echo '';
	}
	exit();
 ?>