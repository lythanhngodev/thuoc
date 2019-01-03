<?php include_once "../../_l_.php";
function doctien( $number )
{
	$hyphen = ' ';
	$conjunction = '  ';
	$separator = ' ';
	$negative = 'am ';
	$decimal = ' phay ';
	$dictionary = array(
		0 => 'khong',
		1 => 'mot',
		2 => 'hai',
		3 => 'ba',
		4 => 'bon',
		5 => 'nam',
		6 => 'sau',
		7 => 'bay',
		8 => 'tam',
		9 => 'chin',
		10 => 'muoi',
		11 => 'muoi mot',
		12 => 'muoi hai',
		13 => 'muoi ba',
		14 => 'muoi bon',
		15 => 'muoi nam',
		16 => 'muoi sau',
		17 => 'muoi bay',
		18 => 'muoi tam',
		19 => 'muoi chin',
		20 => 'hai muoi',
		30 => 'ba muoi',
		40 => 'bon muoi',
		50 => 'nam muoi',
		60 => 'sau muoi',
		70 => 'bay muoi',
		80 => 'tam muoi',
		90 => 'chin muoi',
		100 => 'tram',
		1000 => 'ngan',
		1000000 => 'trieu',
		1000000000 => 'ty',
		1000000000000 => 'nghin ty',
		1000000000000000 => 'ngan trieu trieu',
		1000000000000000000 => 'ty ty'
	);
	if( !is_numeric( $number ) )
	{
		return false;
	}
	if( ($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX )
	{
		// overflow
		trigger_error( 'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING );
		return false;
	}
	if( $number < 0 )
	{
		return $negative . doctien( abs( $number ) );
	}
	$string = $fraction = null;

	if( strpos( $number, '.' ) !== false )
	{
		list( $number, $fraction ) = explode( '.', $number );
	}
	switch (true)
	{
		case $number < 21:
			$string = $dictionary[$number];
			break;
		case $number < 100:
			$tens = ((int)($number / 10)) * 10;
			$units = $number % 10;
			$string = $dictionary[$tens];
			if( $units )
			{
				$string .= $hyphen . $dictionary[$units];
			}
			break;
		case $number < 1000:
			$hundreds = $number / 100;
			$remainder = $number % 100;
			$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
			if( $remainder )
			{
				$string .= $conjunction . doctien( $remainder );
			}
			break;
		default:
			$baseUnit = pow( 1000, floor( log( $number, 1000 ) ) );
			$numBaseUnits = (int)($number / $baseUnit);
			$remainder = $number % $baseUnit;
			$string = doctien( $numBaseUnits ) . ' ' . $dictionary[$baseUnit];
			if( $remainder )
			{
				$string .= $remainder < 100 ? $conjunction : $separator;
				$string .= doctien( $remainder );
			}
			break;
	}
	if( null !== $fraction && is_numeric( $fraction ) )
	{
		$string .= $decimal;
		$words = array();
		foreach( str_split((string) $fraction) as $number )
		{
			$words[] = $dictionary[$number];
		}
		$string .= implode( ' ', $words );
	}
	return ($string);
}
?>
<?php 
	$id = 0;
	if (isset($_GET['so'])) {
		$id = intval($_GET['so']);
	}
	if ($id == 0) {
		echo "Không có dữ liệu";
		exit();
	}
	session_start();
	$ketnoi = new clsKetnoi();
	$hoi = "SELECT * FROM cauhinh LIMIT 0,1;";
	$q_tt = mysqli_query($ketnoi->conn, $hoi);
	function thongtinhoadon($id){
	    $ketnoi = new clsKetnoi();
	    $query = "SELECT kh.TENKH, kh.BIETHIEU, kh.DIACHI, hd.SOHOADON, kh.MST, hd.NGAY, tk.HT,hd.TGBAN FROM hoadon hd LEFT JOIN khachhang kh ON hd.IDKH=kh.IDKH LEFT JOIN taikhoan tk ON hd.IDTK=tk.IDTK WHERE hd.IDHD = '$id';";
	    $result = $ketnoi->query($query);
	    $r = mysqli_fetch_assoc($result);
	    return $r;
	}
	function chitiethoadon($id){
	    $ketnoi = new clsKetnoi();
	    $query = "SELECT mh.TENMH,mh.DIENGIAI, dvt.TENDVT, mh.SOLO, ct.HSD,ct.SOLUONG, ct.DONGIA, ct.SOLUONG*ct.DONGIA as THANHTIEN, ct.VAT, (ct.SOLUONG*ct.DONGIA)*ct.VAT/100 as THUEVAT,ct.CK, (ct.SOLUONG*ct.DONGIA)*ct.CK/100 as CHIECKHAU FROM cthoadon ct LEFT JOIN mathang mh ON ct.IDMH=mh.IDMH LEFT JOIN donvitinh dvt ON mh.IDDVT=dvt.IDDVT WHERE ct.IDHD = '$id';
";
	    $result = mysqli_query($ketnoi->conn, $query);
	    return $result;
	}
	function dauphay($strNum) {
	 
	        $len = strlen($strNum);
	        $counter = 3;
	        $result = "";
	        while ($len - $counter >= 0)
	        {
	            $con = substr($strNum, $len - $counter , 3);
	            $result = ','.$con.$result;
	            $counter+= 3;
	        }
	        $con = substr($strNum, 0 , 3 - ($counter - $len) );
	        $result = $con.$result;
	        if(substr($result,0,1)==','){
	            $result=substr($result,1,$len+1);   
	        }
	        return $result;
	}
 ?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <style>
        p{
        	margin: 0.2cm 0cm 0.2cm 0cm;
        }
.bang td,.bang th {
    border: 1px dotted #212121;
}
.font13{
	font-size: 14px;
	font-family: sans-serif;
}
    </style>
<script src="../../public/bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
	<div class="Section1" style="width: 190mm;">
		<div style="margin: 0;box-shadow: 0;">
			<div style="width: 190mm;">
				<?php $thongtin = mysqli_fetch_assoc($q_tt); ?>
				<p class="font13"><?php echo $thongtin['TENCTY']; ?></p>
				<p class="font13">Địa chỉ:&ensp;<?php echo $thongtin['DIACHI']; ?></p>
				<p class="font13">ĐT:&ensp;<?php echo $thongtin['SDT']." FAX: ".$thongtin['FAX']." TK: ".$thongtin['NGANHANG']; ?></p>
				<p style="text-align: center;font-size: 20px;"><b>HOÁ ĐƠN BÁN HÀNG</b></p>
				<?php 
				$hoadon = thongtinhoadon($id);
				 ?>
				<table style="width: 100%;" class="font13">
					<tr>
						<td>Khách hàng: <b><?php echo $hoadon['TENKH'] ?></b></td>
						<td style="width: 50mm;">Ngày: <b><?php echo date_format(date_create_from_format('Y-m-d', $hoadon['NGAY']), 'd/m/Y') ?></b></td>
					</tr>
					<tr>
						<td>Bí danh: <b><?php echo $hoadon['BIETHIEU'] ?></b></td>
						<td style="width: 50mm;">Thời gian: <b><?php echo $hoadon['TGBAN'] ?></b></td>
					</tr>
					<tr>
						<td>Địa chỉ: <b><?php echo $hoadon['DIACHI'] ?></b></td>
						<td>Số: <b><?php echo $hoadon['SOHOADON'] ?></b></td>
					</tr>
					<tr>
						<td colspan="2">Mã số thuế: <b><?php echo $hoadon['MST'] ?></b></td>
					</tr>
					<tr>
						<td colspan="2">Nhân viên bán hàng: <b><?php echo $hoadon['HT']; ?></b></td>
					</tr>
				</table>
				<p>Mặt hàng:</p>
				<table class="bang font13" style="width: 100%;border: 1px dotted #212121;border-collapse: collapse;border: 1">
					<tr>
						<th style="width: 10mm;">STT</th>
						<th style="width: 20mm;">MH</th>
						<th style="width: 30mm;">Diễn giải</th>
						<th>ĐVT</th>
						<th>Số Lô</th>
						<th style="width: 20mm;">HSD</th>
						<th style="width: 10mm;">SL</th>
						<th>ĐG</th>
						<th>Thành tiền</th>
						<th style="width: 10mm;">%VAT</th>
						<th style="width: 10mm;">%CK</th>
					</tr>
					<?php $cthoadon = chitiethoadon($id);$stt=1;
					$tongtien=0;
					$chieckhau=0;
					$thue=0;
					while ($row = mysqli_fetch_assoc($cthoadon)) { ?>
						<tr>
							<td><?php echo $stt; ?></td>
							<td><?php echo $row['TENMH']; ?></td>
							<td><?php echo $row['DIENGIAI'] ?></td>
							<td><?php echo $row['TENDVT'] ?></td>
							<td><?php echo $row['SOLO'] ?></td>
							<td style="text-align: center;">
								<?php 
								if (is_null($row['HSD'])||empty($row['HSD'])) {
									echo "";
								}
								else
									echo date_format(date_create_from_format('d-m-Y', $row['HSD']), 'd/m/Y') ?>
							</td>
							<td style="text-align: center;"><?php echo $row['SOLUONG'] ?></td>
							<td style="text-align: right;"><?php echo dauphay($row['DONGIA']); ?></td>
							<td style="text-align: right;"><?php echo  dauphay($row['THANHTIEN']); ?></td>
							<td style="text-align: center;"><?php echo $row['VAT']; ?></td>
							<td style="text-align: center;"><?php echo $row['CK']; ?></td>
						</tr>
					 <?php $stt++;$tongtien+=$row['THANHTIEN'];$chieckhau+=$row['CHIECKHAU'];$thue+=$row['THUEVAT'];} ?>
				</table>
				<table style="width: 10.5cm;float: left;"><tr><th></th></tr></table>
				<table class="bang font13" style="width: 8.5cm;float: left;border-collapse: collapse;">
					<tr>
						<td><i>Số tiền chiếc khấu: </i></td>
						<td style="text-align: right;"><?php echo dauphay($chieckhau); ?></td>
					</tr>
					<tr>
						<td><i>Cộng tiền hàng (Đã trừ CK): </i></td>
						<td style="text-align: right;"><?php echo dauphay($tongtien - $chieckhau); ?></td>
					</tr>
					<tr>
						<td><i>Tiền thuế GTGT: </i></td>
						<td style="text-align: right;"><?php echo dauphay($thue); ?></td>
					</tr>
					<tr>
						<td><i>Tổng tiền thanh toán: </i></td>
						<td style="text-align: right;"><?php echo dauphay($tongtien - $thue - $chieckhau); ?></td>
					</tr>
				</table>
				<br>
				<p class="font13" style="margin-top: 1cm;">Số tiền viết bằng chữ: <i><?php echo ucfirst(doctien($tongtien-$thue-$chieckhau)); ?></i></p>
				<br>
				<!-- KÝ TÊN XÁC NHẬN -->
				<table style="width: 190mm;" class="font13">
					<tr style="text-align: center;">
						<th style="width: 20%;">Người mua hàng</th>
						<th style="width: 20%;">NV Giao Hàng</th>
						<th style="width: 20%;">Thủ kho</th>
						<th style="width: 20%;">KT Bán Hàng</th>
						<th style="width: 20%;">Kế toán trường</th>
					</tr>
					<tr style="text-align: center;">
						<td><i>(Ký, họ tên)</i></td>
						<td><i>(Ký, họ tên)</i></td>
						<td><i>(Ký, họ tên)</i></td>
						<td><i>(Ký, họ tên)</i></td>
						<td><i>(Ký, họ tên)</i></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
	window.print();
	window.close();
});
</script>
</html>