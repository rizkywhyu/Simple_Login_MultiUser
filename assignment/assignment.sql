-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 23 Nov 2018 pada 09.07
-- Versi Server: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(15) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `firstName`, `lastName`, `email`, `username`, `password`, `role`) VALUES
(1, 'Muhammad Rizky', 'Wahyu Utama', 'rizkywahyu25836@gmail.com', 'rizway', '0192023a7bbd73250516f069df18b500', 'Admin'),
(2, 'Ilham Hanif', 'Anjana', 'rizway25836@gmail.com', 'hanif', '7191fc22608cce32fb96427421a90b8a', 'Guru'),
(3, 'A Rakha', 'Ahmad Taufiq', 'admin@codedoc.com', 'arakha', '827ccb0eea8a706c4c34a16891f84e7b', 'Siswa'),
(4, 'Lalu Oldi', 'Alfitra', 'member@codedoc.com', 'oldi', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
(5, 'Setrika', 'Listrik', 'set@codedoc.com', 'setrika', '827ccb0eea8a706c4c34a16891f84e7b', 'Siswa'),
(6, 'Listrik', 'Setrika', 'listrik@codedoc.com', 'listrik', '827ccb0eea8a706c4c34a16891f84e7b', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
