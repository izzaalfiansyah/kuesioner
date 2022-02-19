-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2022 pada 04.16
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuisioner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id` bigint(20) NOT NULL,
  `responden_id` bigint(20) NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id`, `responden_id`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 1, 'a:12:{i:0;a:2:{s:2:\"si\";s:1:\"1\";s:1:\"j\";s:1:\"4\";}i:1;a:2:{s:2:\"si\";s:1:\"2\";s:1:\"j\";s:1:\"7\";}i:2;a:2:{s:2:\"si\";s:1:\"3\";s:1:\"j\";s:1:\"5\";}i:3;a:2:{s:2:\"si\";s:1:\"5\";s:1:\"j\";s:1:\"3\";}i:4;a:2:{s:2:\"si\";s:1:\"6\";s:1:\"j\";s:1:\"8\";}i:5;a:2:{s:2:\"si\";s:1:\"7\";s:1:\"j\";s:1:\"2\";}i:6;a:2:{s:2:\"si\";s:1:\"8\";s:1:\"j\";s:1:\"6\";}i:7;a:2:{s:2:\"si\";s:1:\"9\";s:1:\"j\";s:1:\"2\";}i:8;a:2:{s:2:\"si\";s:2:\"10\";s:1:\"j\";s:1:\"2\";}i:9;a:2:{s:2:\"si\";s:2:\"11\";s:1:\"j\";s:2:\"11\";}i:10;a:2:{s:2:\"si\";s:2:\"12\";s:1:\"j\";s:1:\"8\";}i:11;a:2:{s:2:\"si\";s:2:\"13\";s:1:\"j\";s:1:\"9\";}}', '2020-11-30 23:09:53', '2020-12-08 15:46:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `responden`
--

CREATE TABLE `responden` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `usia` int(11) NOT NULL,
  `jenis_kelamin` enum('1','2') NOT NULL COMMENT '1 = laki-laki, 2 = perempuan',
  `pendidikan_terakhir` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status_pendidikan` varchar(30) NOT NULL,
  `status_pernikahan` enum('1','2') NOT NULL COMMENT '1 = belum menikah, 2 = sudah menikah',
  `nomor_telepon` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `kode` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `responden`
--

INSERT INTO `responden` (`id`, `nama`, `usia`, `jenis_kelamin`, `pendidikan_terakhir`, `alamat`, `tanggal_lahir`, `status_pendidikan`, `status_pernikahan`, `nomor_telepon`, `foto`, `kode`) VALUES
(1, 'Zurniyati', 25, '1', 'Unsyiah', 'Kuta Alam', '1995-03-08', 'Sarjana', '1', '085234567456', 'RES20201130115734.png', 'd9f462035fa4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id` bigint(20) NOT NULL,
  `teks` text NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id`, `teks`, `urutan`) VALUES
(1, 'Saya tahu penyebab ibu mengalami depresi pascapersalinan', 1),
(2, 'Saya dapat mengidentifikasi ibu baru yang berisiko mengalami depresi pascapersalinan', 2),
(3, 'Saya tahu gejala dari depresi pascapersalinan', 3),
(5, 'Saya dapat mengenali setiap ibu baru yang mengalami depresi', 4),
(6, 'Saya tahu cara melindungi ibu baru dari depresi pascapersalinan', 5),
(7, 'Jika kerabat saya mengalami depresi pascapersalinan, saya tahu cara untuk membantunya', 6),
(8, 'Jika kerabat saya mengalami depresi pascapersalinan, saya tahu siapa yang dapat membantunya', 7),
(9, 'Saya memiliki pengetahuan kesehatan mental', 8),
(10, 'Apakah saudara mendapatkan informasi tentang depresi pascapersalinan dari siaran tv atau radio?', 9),
(11, 'Apakah saudara mendapatkan informasi tentang depresi pascapersalinan dari buku atau majalah tentang kehamilan?', 10),
(12, 'Apakah saudara mendapatkan informasi tentang depresi pascapersalinan dari petugas kesehatan?', 11),
(13, 'Apakah saudara mendapatkan informasi tentang depresi pascapersalinan dari poster di layanan kesehatan atau rumah sakit?', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `email`, `nomor_telepon`) VALUES
(1, 'superadmin', '$2y$10$OmKrW4YeBuKcARsKzGanmeTu8pGahcK6L0FapRRYJt/VJgiVXV48e', 'SUPERADMIN', 'admin@admin.com', '08311029380'),
(5, 'amelia', '$2y$10$yjPrs6WoUJfV0WnJwrSlJucL5El21ycUFK8ERJdppkps.ZqHRTA/u', 'Amelia Ayu', 'amelia@gmail.com', '08234579678');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `responden`
--
ALTER TABLE `responden`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
