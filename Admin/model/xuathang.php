<?php
	require_once "../_l_.php";
	function laymathang(){
		$kn = new clsKetnoi();
		return $kn->query("SELECT mh.IDMH, mh.IDNH, mh.IDDVT, mh.TENMH, mh.GIANHAP,mh.SOLUONG, mh.GIABAN, mh.GHICHU, mh.DIENGIAI,dvt.TENDVT, nh.TENNH, mh.HSD, mh.SOLO FROM mathang mh LEFT JOIN donvitinh dvt on mh.IDDVT=dvt.IDDVT LEFT JOIN nhomhang nh on mh.IDNH=nh.IDNH WHERE mh.XOA=b'0' ORDER BY mh.TENMH ASC;");
	} 
	function layidhd(){
		$kn = new clsKetnoi();
		$qr = $kn->query("SELECT IDHD FROM hoadon ORDER BY IDHD DESC LIMIT 0,1;");
		$ex = mysqli_fetch_assoc($qr);
		$idhd = intval($ex['IDHD']);
		return $idhd;
	} 
	function xuathang(){
		$kn = new clsKetnoi();
		return $kn->query("
SELECT DISTINCT hd.IDHD,hd.SOHOADON,hd.TGBAN,hd.NGAY,hd.TIENDUA,hd.GHICHU,tk.HT,kh.TENKH,(SELECT sum(cthd.DONGIA*cthd.SOLUONG-(cthd.DONGIA*cthd.SOLUONG*cthd.VAT/100)-(cthd.DONGIA*cthd.SOLUONG*cthd.CK/100)) FROM cthoadon cthd WHERE cthd.IDHD=hd.IDHD GROUP BY cthd.IDHD) as 'TONGTIEN'
FROM hoadon hd 
	LEFT JOIN cthoadon ct ON hd.IDHD=ct.IDHD 
	LEFT JOIN taikhoan tk ON hd.IDTK=tk.IDTK 
	LEFT JOIN khachhang kh ON hd.IDKH=kh.IDKH 
ORDER BY hd.IDHD DESC;
");
	} 
?>