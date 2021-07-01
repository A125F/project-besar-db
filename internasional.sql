-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Jul 2021 pada 20.33
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internasional`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(11) NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `username_adm` varchar(50) NOT NULL,
  `password_adm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `username_adm`, `password_adm`) VALUES
(1, 'Bu Rieke', 'radmin', 'password'),
(2, 'Bu Ratih', 'raadmin', 'passwordr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course`
--

CREATE TABLE `course` (
  `id_courseint` int(11) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `prodic` varchar(50) NOT NULL,
  `juruc` varchar(30) NOT NULL,
  `ipkc` float NOT NULL,
  `emailc` varchar(50) NOT NULL,
  `nama_crs` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `harga_crs` varchar(20) NOT NULL,
  `durasi_crs` varchar(20) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `course`
--

INSERT INTO `course` (`id_courseint`, `nama_mhs`, `nim`, `prodic`, `juruc`, `ipkc`, `emailc`, `nama_crs`, `link`, `harga_crs`, `durasi_crs`, `level`) VALUES
(12, 'Ilham Rama', '1841160096', 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 4, 'ilhamramad@gmail.com', 'Learn the basics, AI In the Basics', 'https://learning.edx.org/course/course-v1:IBM+AI0101EN+3T2020/home', '100$', '10 Minggu', 'Introductory'),
(14, 'Supriatna Dwi Atmaja', '1841160129', 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 3.68, 'supriatnaxv45@gmail.com', 'Matematika', 'https://learning.edx.org/course/course-v1:HarvardX+PH125.3x+1T2021/home', '99$', '8 Minggu', 'Introductory'),
(15, 'Supriatna DA', '1841160129', 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 4, 'supriatnaxv45@gmail.com', 'Data Science', 'https://learning.edx.org/course/course-v1:HarvardX+PH125.3x+1T2021/home', '120$', '8 Minggu', 'Intermediate'),
(16, 'Supriatna DA', '1841160129', 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 4, 'supriatnaxv45@gmail.com', 'Data Science', 'https://learning.edx.org/course/course-v1:HarvardX+PH125.3x+1T2021/home', '120$', '8 Minggu', 'Intermediate'),
(17, 'Supriatna DAW', '1841160129', 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 3.68, 'supriatnaxv45@gmail.com', 'Data Science', 'https://learning.edx.org/course/course-v1:HarvardX+PH125.3x+1T2021/home', '120$', '8 Minggu', 'Intermediate');

--
-- Trigger `course`
--
DELIMITER $$
CREATE TRIGGER `logup` AFTER UPDATE ON `course` FOR EACH ROW BEGIN
INSERT INTO logcourse (id_courseint, nama_mhs, course_old, course_new, harga_old, harga_new, level_old, level_new, timest) VALUES (NEW.id_courseint, NEW.nama_mhs, OLD.nama_crs, NEW.nama_crs, OLD.harga_crs, NEW.harga_crs, OLD.level, NEW.level, now());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dsn` int(11) NOT NULL,
  `nama_dsn` varchar(50) NOT NULL,
  `username_dsn` varchar(20) NOT NULL,
  `password_dsn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dsn`, `nama_dsn`, `username_dsn`, `password_dsn`) VALUES
(1, 'Pak Nanak', 'paknanak', 'passwordn'),
(2, 'Pak Rasyid', 'pakrasyid', 'passwordras');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logcourse`
--

CREATE TABLE `logcourse` (
  `id_log` int(11) NOT NULL,
  `id_courseint` int(11) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `course_old` varchar(100) NOT NULL,
  `course_new` varchar(100) NOT NULL,
  `harga_old` varchar(15) NOT NULL,
  `harga_new` varchar(25) NOT NULL,
  `level_old` varchar(50) NOT NULL,
  `level_new` varchar(50) NOT NULL,
  `timest` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `logcourse`
--

INSERT INTO `logcourse` (`id_log`, `id_courseint`, `nama_mhs`, `course_old`, `course_new`, `harga_old`, `harga_new`, `level_old`, `level_new`, `timest`) VALUES
(3, 12, 'Ilham Rama', 'Learn the basics, AI In the Future', 'Learn the basics, AI In the Future', '70$', '70$', 'Intermediate', 'Intermediate', '2021-06-17 15:12:47'),
(4, 12, 'Ilham Rama', 'Learn the basics, AI In the Future', 'Learn the basics, AI In the PAST', '70$', '80$', 'Intermediate', 'Introductory', '2021-06-17 15:46:19'),
(5, 12, 'Ilham Rama', 'Learn the basics, AI In the PAST', 'Learn the basics, AI In the PAST', '80$', '80$', 'Introductory', 'introductory', '2021-06-17 15:48:14'),
(6, 12, 'Ilham Rama', 'Learn the basics, AI In the PAST', 'Learn the basics, AI In the PAST', '80$', '80$', 'introductory', 'Intermediate', '2021-06-17 15:48:53'),
(7, 13, 'Supriatna DAW', 'Data Science', 'Data Science', '99$', '99$', 'Introductory', 'Intermediate', '2021-06-17 15:50:37'),
(8, 14, 'Supriatna Dwi Atmaja', 'Data Science', 'Matematika', '99$', '99$', 'Introductory', 'Introductory', '2021-07-01 14:46:16'),
(9, 12, 'Ilham Rama', 'Learn the basics, AI In the PAST', 'Learn the basics, AI In the Basics', '80$', '100$', 'Intermediate', 'Introductory', '2021-07-01 17:19:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `ipk` float DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `prodi` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status_bayar` varchar(10) NOT NULL DEFAULT 'Belum',
  `id_seminar` int(11) DEFAULT NULL,
  `id_tukper` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nama_mhs`, `nim`, `nik`, `ipk`, `semester`, `prodi`, `jurusan`, `email`, `status_bayar`, `id_seminar`, `id_tukper`) VALUES
(9, 'ilhamm ram', '1841160129', '3525123154125', 3.66, 6, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', NULL, 2),
(10, 'Supriatna FXd', '1841160129', '3525123154125', 3.66, 6, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', NULL, 1),
(13, 'Supriatna DA', '1841160129', '352512315123', 3.66, 6, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', NULL, 3),
(15, 'dam', '1841160129', '35251231451', 3.66, 6, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', NULL, 2),
(16, 'satria dam', '184116000122', NULL, NULL, NULL, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'satssdam@gmail.com', 'Belum', 3, NULL),
(17, 'Supriatna DA', '1841160129', '3521312512355', 7.77, 6, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', NULL, 3),
(18, 'Supriatna FX', '1841160129', '3212464747', 3.66, 6, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', NULL, 3),
(20, 'Supriatna DAW', '1841160129', NULL, NULL, NULL, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', 2, NULL),
(21, 'Supriatna DA', '1841160129', '3215123151', 7.77, 6, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', NULL, 1),
(22, 'Supriatna Dwi', '1841160129', '32313547524', 3.66, 6, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', NULL, 2),
(23, 'Supriatna Dwi', '1841160129', '32313547524', 3.66, 6, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', NULL, 2),
(24, 'Supriatna DAW', '1841160129', NULL, NULL, NULL, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Sudah', 2, NULL),
(25, 'Supriatna FX', '1312321', NULL, NULL, NULL, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'agumontra@gmail.comsupriatna32', 'Belum', 3, NULL),
(26, 'Supriatna DAW', '1841160129', NULL, NULL, NULL, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', 2, NULL),
(27, 'Supriatna Dwi', '1841160129', '321532141241341', 4, 6, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', NULL, 2),
(28, 'Supriatna Dwi', '1841160129', '321532141241341', 4, 6, 'D4 Jaringan Telekomunikasi Digital', 'Teknik Elektro', 'supriatnaxv45@gmail.com', 'Belum', NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar`
--

CREATE TABLE `seminar` (
  `id_seminar` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `kuota` varchar(25) NOT NULL,
  `harga_sem` varchar(30) NOT NULL,
  `tanggal_jam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `seminar`
--

INSERT INTO `seminar` (`id_seminar`, `judul`, `kuota`, `harga_sem`, `tanggal_jam`) VALUES
(1, 'Learning by Doing', '200', 'Rp. 110.000', '2021-04-28 10:00:00'),
(2, 'Soft Skill or Hard Skill', '250', 'Rp. 100.000', '2021-05-12 13:00:00'),
(3, 'Project Management', '150', 'Rp. 125.000', '2021-06-14 12:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tukper`
--

CREATE TABLE `tukper` (
  `id_tukper` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `negara` varchar(30) NOT NULL,
  `durasi_tp` varchar(20) NOT NULL,
  `harga_tp` varchar(30) NOT NULL,
  `course_tp` varchar(50) NOT NULL,
  `tanggalt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tukper`
--

INSERT INTO `tukper` (`id_tukper`, `program`, `instansi`, `negara`, `durasi_tp`, `harga_tp`, `course_tp`, `tanggalt`) VALUES
(1, 'UTHM x Polinema', 'Universiti  Tun Hussein Onn Malaysia', 'Malaysia', '1 Semester', 'Rp. 10.000.000', 'Security', '2021-05-19'),
(2, 'HKuST x Polinema', 'Hongkong University of Science and Technology', 'China', '8 Bulan', 'Rp. 12.500.000', 'From Signal to Packets', '2021-06-15'),
(3, 'MIT x Polinema', 'Massachusetts Institute of Technology', 'Amerika Serikat', '7 Bulan', 'Rp. 15.000.000', 'Quantum Physics', '2021-07-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_courseint`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dsn`);

--
-- Indexes for table `logcourse`
--
ALTER TABLE `logcourse`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_tukper` (`id_tukper`),
  ADD KEY `id_seminar` (`id_seminar`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`id_seminar`);

--
-- Indexes for table `tukper`
--
ALTER TABLE `tukper`
  ADD PRIMARY KEY (`id_tukper`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_courseint` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dsn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logcourse`
--
ALTER TABLE `logcourse`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id_seminar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tukper`
--
ALTER TABLE `tukper`
  MODIFY `id_tukper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_tukper` FOREIGN KEY (`id_tukper`) REFERENCES `tukper` (`id_tukper`),
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_seminar`) REFERENCES `seminar` (`id_seminar`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
