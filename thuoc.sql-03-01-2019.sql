-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.7-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for thuoc
CREATE DATABASE IF NOT EXISTS `thuoc` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `thuoc`;

-- Dumping structure for table thuoc.cauhinh
CREATE TABLE IF NOT EXISTS `cauhinh` (
  `IDCH` bigint(20) NOT NULL AUTO_INCREMENT,
  `TENCTY` varchar(80) DEFAULT NULL,
  `MAIL` varchar(50) DEFAULT NULL,
  `SDT` varchar(80) DEFAULT NULL,
  `FAX` varchar(80) DEFAULT NULL,
  `NGANHANG` varchar(120) DEFAULT NULL,
  `DIACHI` varchar(150) DEFAULT NULL,
  `MST` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDCH`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Bảng cấu hình hệ thống';

-- Dumping data for table thuoc.cauhinh: ~1 rows (approximately)
/*!40000 ALTER TABLE `cauhinh` DISABLE KEYS */;
INSERT INTO `cauhinh` (`IDCH`, `TENCTY`, `MAIL`, `SDT`, `FAX`, `NGANHANG`, `DIACHI`, `MST`) VALUES
	(1, 'Công Ty TNHH TMDV GREENPHARM', '', '0979 171 375', '', '', 'Số 15/7, Nguyễn Văn Linh, P.An Khánh, Q.Ninh Kiều, TP Cần Thơ', '1801619379');
/*!40000 ALTER TABLE `cauhinh` ENABLE KEYS */;

-- Dumping structure for table thuoc.cthoadon
CREATE TABLE IF NOT EXISTS `cthoadon` (
  `IDCTHD` bigint(20) NOT NULL AUTO_INCREMENT,
  `IDHD` bigint(20) DEFAULT NULL,
  `IDMH` bigint(20) DEFAULT NULL,
  `DONGIA` float DEFAULT NULL,
  `SOLUONG` float DEFAULT NULL,
  `VAT` float DEFAULT 0,
  `CK` float DEFAULT 0,
  `HSD` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`IDCTHD`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='Chi tiết hoá đơn';

-- Dumping data for table thuoc.cthoadon: ~10 rows (approximately)
/*!40000 ALTER TABLE `cthoadon` DISABLE KEYS */;
INSERT INTO `cthoadon` (`IDCTHD`, `IDHD`, `IDMH`, `DONGIA`, `SOLUONG`, `VAT`, `CK`, `HSD`) VALUES
	(1, 1, 3, 200000, 0, 0, 0, NULL),
	(2, 2, 2, 300000, 3, 5, 2, NULL),
	(3, 3, 4, 433434, 3, 4, 2, NULL),
	(4, 4, 1, 20000, 11, 2, 2, NULL),
	(5, 5, 1, 20000, 10, 2, 2, NULL),
	(6, 6, 3, 343444, 33, 4, 5, NULL),
	(7, 7, 3, 343444, 200, 6, 4, NULL),
	(8, 8, 1, 300, 1, 5, 5, NULL),
	(9, 9, 1, 300, 1, 3, 3, '03-01-2019'),
	(10, 10, 1, 300, 2, 2, 2, '03-01-2019');
/*!40000 ALTER TABLE `cthoadon` ENABLE KEYS */;

-- Dumping structure for table thuoc.ctnhaphang
CREATE TABLE IF NOT EXISTS `ctnhaphang` (
  `IDCTNHAP` bigint(20) NOT NULL AUTO_INCREMENT,
  `IDNHAP` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`IDCTNHAP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table thuoc.ctnhaphang: ~0 rows (approximately)
/*!40000 ALTER TABLE `ctnhaphang` DISABLE KEYS */;
/*!40000 ALTER TABLE `ctnhaphang` ENABLE KEYS */;

-- Dumping structure for table thuoc.donvitinh
CREATE TABLE IF NOT EXISTS `donvitinh` (
  `IDDVT` bigint(20) NOT NULL AUTO_INCREMENT,
  `TENDVT` varchar(50) DEFAULT NULL,
  `XOA` bit(1) DEFAULT b'0',
  PRIMARY KEY (`IDDVT`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='Đơn vị tính';

-- Dumping data for table thuoc.donvitinh: ~5 rows (approximately)
/*!40000 ALTER TABLE `donvitinh` DISABLE KEYS */;
INSERT INTO `donvitinh` (`IDDVT`, `TENDVT`, `XOA`) VALUES
	(1, 'Hộp', b'0'),
	(2, 'Thùng', b'0'),
	(6, 'Vĩ', b'0'),
	(7, 'Lọ', b'0'),
	(10, 'Thàng', b'0');
/*!40000 ALTER TABLE `donvitinh` ENABLE KEYS */;

-- Dumping structure for table thuoc.hoadon
CREATE TABLE IF NOT EXISTS `hoadon` (
  `IDHD` bigint(20) NOT NULL AUTO_INCREMENT,
  `SOHOADON` varchar(50) DEFAULT NULL,
  `IDTK` bigint(20) DEFAULT NULL,
  `IDKH` bigint(20) DEFAULT NULL,
  `TGBAN` varchar(12) DEFAULT NULL,
  `NGAY` date DEFAULT NULL,
  `TIENDUA` bigint(20) DEFAULT NULL,
  `GHICHU` text DEFAULT NULL,
  PRIMARY KEY (`IDHD`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='Hoá đơn';

-- Dumping data for table thuoc.hoadon: ~10 rows (approximately)
/*!40000 ALTER TABLE `hoadon` DISABLE KEYS */;
INSERT INTO `hoadon` (`IDHD`, `SOHOADON`, `IDTK`, `IDKH`, `TGBAN`, `NGAY`, `TIENDUA`, `GHICHU`) VALUES
	(1, 'HĐ1118-0', 1, 2, '13:18:19', '2018-11-15', 0, NULL),
	(2, 'HĐ1118-1', 1, 2, '13:34:26', '2018-11-15', 1234567, NULL),
	(3, 'HĐ1118-2', 1, 3, '13:35:18', '2018-11-15', 2, NULL),
	(4, 'HĐ1118-3', 1, 2, '16:32:42', '2018-11-25', 0, NULL),
	(5, 'HĐ1118-4', 1, 2, '16:33:45', '2018-11-25', 0, NULL),
	(6, 'HĐ1118-5', 1, 2, '16:52:33', '2018-11-25', 0, NULL),
	(7, 'HĐ1118-6', 1, 2, '17:05:59', '2018-11-25', 0, NULL),
	(8, 'HĐ0119-7', 1, 2, '10:16:38', '2019-01-03', 0, NULL),
	(9, 'HĐ0119-8', 1, 2, '10:30:31', '2019-01-03', 282, NULL),
	(10, 'HĐ0119-9', 1, 4, '11:06:50', '2019-01-03', 0, NULL);
/*!40000 ALTER TABLE `hoadon` ENABLE KEYS */;

-- Dumping structure for table thuoc.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `IDKH` bigint(20) NOT NULL AUTO_INCREMENT,
  `TENKH` varchar(200) DEFAULT NULL,
  `BIETHIEU` varchar(50) DEFAULT NULL,
  `MST` varchar(20) DEFAULT NULL,
  `SDT` varchar(50) DEFAULT NULL,
  `DIACHI` varchar(150) DEFAULT NULL,
  `XOA` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`IDKH`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Tầng';

-- Dumping data for table thuoc.khachhang: ~3 rows (approximately)
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` (`IDKH`, `TENKH`, `BIETHIEU`, `MST`, `SDT`, `DIACHI`, `XOA`) VALUES
	(2, 'Nguyễn Văn A\r\n', 'A', NULL, '0909872891', 'Vĩnh Long', b'0'),
	(3, 'Nguyễn Văn B', 'B', NULL, '0989871872', 'Cần Thơ', b'0'),
	(4, 'Ngô Thanh Lý', 'bí danh cho lý', '98803808', '93820938', 'địa chỉ cho lý', b'0');
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;

-- Dumping structure for table thuoc.mathang
CREATE TABLE IF NOT EXISTS `mathang` (
  `IDMH` bigint(20) NOT NULL AUTO_INCREMENT,
  `IDDVT` bigint(20) DEFAULT NULL,
  `IDNH` bigint(20) DEFAULT NULL,
  `DIENGIAI` varchar(150) DEFAULT NULL,
  `TENMH` varchar(100) DEFAULT NULL,
  `SOLO` varchar(20) DEFAULT NULL,
  `SOLUONG` decimal(20,0) DEFAULT 0,
  `GIANHAP` float DEFAULT NULL,
  `GIABAN` float DEFAULT NULL,
  `HSD` date DEFAULT NULL,
  `GHICHU` varchar(200) DEFAULT NULL,
  `XOA` bit(1) DEFAULT b'0',
  PRIMARY KEY (`IDMH`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Mặt hàng';

-- Dumping data for table thuoc.mathang: ~8 rows (approximately)
/*!40000 ALTER TABLE `mathang` DISABLE KEYS */;
INSERT INTO `mathang` (`IDMH`, `IDDVT`, `IDNH`, `DIENGIAI`, `TENMH`, `SOLO`, `SOLUONG`, `GIANHAP`, `GIABAN`, `HSD`, `GHICHU`, `XOA`) VALUES
	(1, 2, 6, 'dd', 'A', '101019', 7, 200, 300, '2019-10-10', '', b'0'),
	(2, 6, 4, 'dd2', 'B', '101018', 222, 0, 300000, '2019-10-10', '', b'0'),
	(3, 7, 4, 'sdsd', 'C', '101020', 100, 10, 343444, '2018-01-11', '', b'0'),
	(4, 7, 5, '', 'D', '12122018', 32332, 2, 433434, '2018-10-26', '', b'0'),
	(5, 2, 5, '', 'E', '12122019', 2324, 2, 656353, '2018-10-26', '', b'0'),
	(7, NULL, 0, NULL, 'G', '12122018', 1313, 2, 3532, '2018-10-27', NULL, b'0'),
	(8, NULL, 0, NULL, 'H', '867', 4334, 0, 3535, '2019-04-05', NULL, b'0'),
	(9, 2, NULL, NULL, 'A', '101018', 0, 20, 40, NULL, NULL, b'0');
/*!40000 ALTER TABLE `mathang` ENABLE KEYS */;

-- Dumping structure for table thuoc.nhaphang
CREATE TABLE IF NOT EXISTS `nhaphang` (
  `IDNHAP` bigint(20) NOT NULL AUTO_INCREMENT,
  `TENDONVI` varchar(200) DEFAULT NULL,
  `NGAYNHAP` date DEFAULT NULL,
  `GIONHAP` time DEFAULT NULL,
  PRIMARY KEY (`IDNHAP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table thuoc.nhaphang: ~0 rows (approximately)
/*!40000 ALTER TABLE `nhaphang` DISABLE KEYS */;
/*!40000 ALTER TABLE `nhaphang` ENABLE KEYS */;

-- Dumping structure for table thuoc.nhomhang
CREATE TABLE IF NOT EXISTS `nhomhang` (
  `IDNH` bigint(20) NOT NULL AUTO_INCREMENT,
  `TENNH` varchar(150) NOT NULL,
  `XOA` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`IDNH`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Nhóm mặt hàng';

-- Dumping data for table thuoc.nhomhang: ~6 rows (approximately)
/*!40000 ALTER TABLE `nhomhang` DISABLE KEYS */;
INSERT INTO `nhomhang` (`IDNH`, `TENNH`, `XOA`) VALUES
	(1, 'Nước uống', b'1'),
	(2, 'Trái cây dĩa', b'1'),
	(3, 'Lẫu', b'1'),
	(4, 'Tim mạch', b'0'),
	(5, 'Bổ thận', b'0'),
	(6, 'Tráng dương', b'0');
/*!40000 ALTER TABLE `nhomhang` ENABLE KEYS */;

-- Dumping structure for table thuoc.taikhoan
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `IDTK` bigint(20) NOT NULL AUTO_INCREMENT,
  `HT` varchar(80) DEFAULT NULL,
  `SDT` varchar(50) DEFAULT NULL,
  `TDN` varchar(50) NOT NULL,
  `MK` varchar(50) NOT NULL,
  `DC` varchar(100) DEFAULT NULL,
  `MAIL` varchar(100) DEFAULT NULL,
  `TT` varchar(20) NOT NULL DEFAULT 'binhthuong',
  `Q` varchar(20) NOT NULL,
  PRIMARY KEY (`IDTK`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Bảng tài khaonr người dùng';

-- Dumping data for table thuoc.taikhoan: ~1 rows (approximately)
/*!40000 ALTER TABLE `taikhoan` DISABLE KEYS */;
INSERT INTO `taikhoan` (`IDTK`, `HT`, `SDT`, `TDN`, `MK`, `DC`, `MAIL`, `TT`, `Q`) VALUES
	(1, 'Ngô Thanh Lý', '01214967197', 'greempharm', '827ccb0eea8a706c4c34a16891f84e7b', 'vĩnh long', 'lythanhngodev@gmail.com', 'binhthuong', 'admin');
/*!40000 ALTER TABLE `taikhoan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
