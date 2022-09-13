-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Sep 2022 pada 16.29
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nama` varchar(128) NOT NULL,
  `siswa_nis` varchar(128) NOT NULL,
  `siswa_kelas` varchar(10) NOT NULL,
  `siswa_jurusan` varchar(128) NOT NULL,
  `siswa_level` varchar(10) NOT NULL DEFAULT 'Siswa',
  `siswa_password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`siswa_id`, `siswa_nama`, `siswa_nis`, `siswa_kelas`, `siswa_jurusan`, `siswa_level`, `siswa_password`) VALUES
(1, 'Zulfa Nur', '56345463', 'XI', 'Teknik Komputer dan Jaringan', 'Siswa', ''),
(7, 'Marissa Aridya Pasha', '09088987', 'XI', 'MM', 'Siswa', ''),
(8, 'Rizki Widya Pratama', '45678', 'XI', 'TKJ', 'Siswa', ''),
(9, 'Febrero Araya', '98979978', 'XI', 'TPM', 'Siswa', ''),
(10, 'Rizki Widya Pratama', '9980219762', 'XI', 'TKJ', 'Siswa', '9980219762'),
(11, 'Marissa Aridya Pasha', '9976356627', 'XI', 'TPM', 'Siswa', '$2y$10$2SvtFAZiae9rJEQiYyi8venDVH8KpXJB9k80ynexzLQOpScmpFxR2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_nis` varchar(128) NOT NULL,
  `user_nama` varchar(128) NOT NULL,
  `user_username` varchar(128) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_level` varchar(128) NOT NULL,
  `user_viewpassword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nis`, `user_nama`, `user_username`, `user_password`, `user_level`, `user_viewpassword`) VALUES
(1, '-', 'Rizki Widya P', 'admin', '$2y$10$HEu4n6oARFugJ1yzkg1hPOby66PImGQyY71cm5DmK6qOXAPZgi3S2', 'Admin', 'AxenNet123'),
(2, '99763556278', 'Bambang', '99763556278', '$2y$10$pXBr1qh9iuriFZoVmh/Qu.7t353fvPsLiDV6GV2krEeMRviBfW91e', 'Siswa', '99763556278');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
