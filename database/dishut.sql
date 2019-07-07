-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dishut
DROP DATABASE IF EXISTS `dishut`;
CREATE DATABASE IF NOT EXISTS `dishut` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dishut`;

-- Dumping structure for table dishut.jabatan
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `namajabatan` varchar(150) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Dumping data for table dishut.jabatan: ~36 rows (approximately)
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
REPLACE INTO `jabatan` (`id_jabatan`, `namajabatan`) VALUES
	(1, 'Kepala UPT'),
	(2, 'Kasubag Tata Usaha'),
	(3, 'Pengadministrasi Sarana dan Prasarana'),
	(4, 'Pengelola Keuangan'),
	(5, 'Pengadministrasi Kepegawaian'),
	(6, 'Pengelola Pengadaan Barang/Jasa Ahli Pertama'),
	(7, 'Pengelola Teknologi Informasi'),
	(8, 'Pengadministrasi Umum'),
	(9, 'Pranata Komputer Ketrampilan Terampil'),
	(10, 'Pengadministrasi Perencanaan dan Program'),
	(11, 'Pengadministrasi Keuangan'),
	(12, 'Petugas Keamanan'),
	(13, 'Kepala Seksi Perencanaan, Pengembangan dan Pemanfaatan'),
	(14, 'Analis Dokumen Perijinan'),
	(15, 'Pengelola Sarana Wisata'),
	(16, 'Pengendali Ekosistem Hutan Ahli Pertama'),
	(17, 'Pengadministrasi Penerimaan OWA Cangar'),
	(18, 'Pengelola Pelestarian Sumber Daya Alam'),
	(19, 'Pengadministrasi Penerimaan OWA Pendakian Pos Tretes'),
	(20, 'Pengendali Ekosistem Hutan Terampil'),
	(21, 'Pemandu Wisata Pendakian Pos Tretes Prigen'),
	(22, 'Pemandu Wisata'),
	(23, 'Pemandu OWA Tretes Galengdowo'),
	(24, 'Pengadministrasi Penerimaan OWA Watulumpang'),
	(25, 'Pengadministrasi Penerimaan OWA Pendakian Pos Wonorejo'),
	(26, 'Pengadministrasi Penerimaan OWA Pacet'),
	(27, 'Pemandu Wisata OWA Watuondo'),
	(28, 'Pengadministrasi Penerimaan OWA Watuondo'),
	(29, 'Kepala Seksi Perlindungan dan Pemberdayaan Masyarakat'),
	(30, 'Analis Rehabilitasi dan Konservasi'),
	(31, 'Penyuluh Kehutanan Keahlian Ahli Muda'),
	(32, 'Pengolah Data'),
	(33, 'Pengendali Ekosistem Hutan Mahir'),
	(34, 'Polisi Kehutanan Ketrampilan Mahir'),
	(35, 'Pengendali Ekosistem Hutan Ketrampilan Terampil'),
	(36, 'Polisi Kehutanan Ketrampilan Terampil');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;

-- Dumping structure for table dishut.tb_anggota_pendakian
DROP TABLE IF EXISTS `tb_anggota_pendakian`;
CREATE TABLE IF NOT EXISTS `tb_anggota_pendakian` (
  `ap_pendakian` int(11) NOT NULL,
  `ap_nomor` int(11) NOT NULL,
  `ap_nama` varchar(255) NOT NULL,
  `ap_no_ktp` char(20) NOT NULL,
  `ap_kelamin` enum('L','P') NOT NULL,
  PRIMARY KEY (`ap_pendakian`,`ap_nomor`),
  CONSTRAINT `FK_tb_anggota_pendakian_tb_pendakian` FOREIGN KEY (`ap_pendakian`) REFERENCES `tb_pendakian` (`pd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dishut.tb_anggota_pendakian: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_anggota_pendakian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_anggota_pendakian` ENABLE KEYS */;

-- Dumping structure for table dishut.tb_kontak_darurat
DROP TABLE IF EXISTS `tb_kontak_darurat`;
CREATE TABLE IF NOT EXISTS `tb_kontak_darurat` (
  `kd_pendakian` int(11) NOT NULL,
  `kd_nomor` int(11) NOT NULL,
  `kd_nama` varchar(255) NOT NULL,
  `kd_no_telp` char(20) NOT NULL,
  `kd_email` varchar(100) NOT NULL,
  `kd_hubungan` char(50) NOT NULL,
  PRIMARY KEY (`kd_pendakian`,`kd_nomor`),
  CONSTRAINT `FK_pd_kontak_darurat_tb_pendakian` FOREIGN KEY (`kd_pendakian`) REFERENCES `tb_pendakian` (`pd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dishut.tb_kontak_darurat: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_kontak_darurat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kontak_darurat` ENABLE KEYS */;

-- Dumping structure for table dishut.tb_logistik
DROP TABLE IF EXISTS `tb_logistik`;
CREATE TABLE IF NOT EXISTS `tb_logistik` (
  `lg_pendakian` int(11) NOT NULL,
  `lg_nomor` int(11) NOT NULL,
  `lg_nama` varchar(255) NOT NULL,
  `lg_jumlah` tinyint(4) NOT NULL,
  PRIMARY KEY (`lg_pendakian`,`lg_nomor`),
  CONSTRAINT `FK_tb_logistik_tb_pendakian` FOREIGN KEY (`lg_pendakian`) REFERENCES `tb_pendakian` (`pd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dishut.tb_logistik: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_logistik` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_logistik` ENABLE KEYS */;

-- Dumping structure for table dishut.tb_pendakian
DROP TABLE IF EXISTS `tb_pendakian`;
CREATE TABLE IF NOT EXISTS `tb_pendakian` (
  `pd_id` int(11) NOT NULL AUTO_INCREMENT,
  `pd_nomor` varchar(50) NOT NULL,
  `pd_nama_ketua` varchar(255) NOT NULL,
  `pd_no_ktp` varchar(255) NOT NULL,
  `pd_tempat_lahir` varchar(255) NOT NULL,
  `pd_tgl_lahir` date NOT NULL,
  `pd_no_hp` varchar(20) NOT NULL,
  `pd_email` varchar(100) NOT NULL,
  `pd_tgl_naik` date NOT NULL,
  `pd_tgl_turun` date NOT NULL,
  `pd_alamat` varchar(255) NOT NULL,
  `pd_provinsi` varchar(255) NOT NULL,
  `pd_kabupaten` varchar(255) NOT NULL,
  `pd_kecamatan` varchar(255) NOT NULL,
  `pd_desa` varchar(255) NOT NULL,
  `pd_kewarganegaraan` char(3) NOT NULL,
  `pd_jenis_kelamin` enum('L','P') NOT NULL,
  `pd_status` char(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`pd_id`),
  UNIQUE KEY `pd_nomor` (`pd_nomor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dishut.tb_pendakian: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_pendakian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_pendakian` ENABLE KEYS */;

-- Dumping structure for table dishut.tb_peralatan
DROP TABLE IF EXISTS `tb_peralatan`;
CREATE TABLE IF NOT EXISTS `tb_peralatan` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_pendakian` int(11) DEFAULT NULL,
  `pr_tenda` int(11) DEFAULT NULL,
  `pr_sleeping_bag` int(11) DEFAULT NULL,
  `pr_peralatan_masak` int(11),
  `pr_bahan_bakar` int(11),
  `pr_ponco` int(11),
  `pr_senter` int(11),
  `pr_obat` int(11),
  `pr_matras` int(11),
  `pr_kantong_sampah` int(11),
  `pr_jaket` int(11),
  PRIMARY KEY (`pr_id`),
  KEY `FK_tb_peralatan_tb_pendakian` (`pr_pendakian`),
  CONSTRAINT `FK_tb_peralatan_tb_pendakian` FOREIGN KEY (`pr_pendakian`) REFERENCES `tb_pendakian` (`pd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dishut.tb_peralatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_peralatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_peralatan` ENABLE KEYS */;

-- Dumping structure for table dishut.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table dishut.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`user_id`, `id_jabatan`, `nip`, `password`, `nama`, `foto`, `level`) VALUES
	(1, '7', '199510212019031005', 'admin', 'Amiruzzuhhad Gunes', '20190531035029-3 x 4 biru.jpg', 'superadmin'),
	(26, '2', '123456789012345678', '714511', 'coba', '', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
