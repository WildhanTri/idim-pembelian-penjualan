-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Jan 2018 pada 07.44
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gamestore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `username_customer` varchar(255) NOT NULL,
  `password_customer` varchar(255) NOT NULL,
  `email_customer` varchar(255) NOT NULL,
  `telepon_customer` varchar(255) NOT NULL,
  `alamat_customer` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `username_customer`, `password_customer`, `email_customer`, `telepon_customer`, `alamat_customer`) VALUES
(1, 'Andi Lim', 'andi210', 'andi210', 'andi@gmail.com', '082718788127', '                                                                        Depok                                                        '),
(2, 'Abdullah Hidayat', 'bedul', 'bedul', 'bedul@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_keranjang`
--

CREATE TABLE IF NOT EXISTS `customer_keranjang` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tanggal_add` date NOT NULL,
  `status_transaksi` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer_keranjang`
--

INSERT INTO `customer_keranjang` (`id`, `id_customer`, `id_produk`, `quantity`, `tanggal_add`, `status_transaksi`) VALUES
(1, 1, '1VBUP', 3, '2018-01-12', 'yes'),
(2, 1, 'F3NAZ', 2, '2018-01-12', 'yes'),
(4, 1, '1VBUP', 11, '2018-01-12', 'no'),
(5, 1, 'NQMW1', 2, '2018-01-12', 'no');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_nama`
--

CREATE TABLE IF NOT EXISTS `customer_nama` (
  `id_customer` int(11) NOT NULL,
  `namadepan_customer` varchar(255) NOT NULL,
  `namabelakang_customer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer_nama`
--

INSERT INTO `customer_nama` (`id_customer`, `namadepan_customer`, `namabelakang_customer`) VALUES
(1, 'Andi', 'Lim'),
(2, 'Abdullah', 'Hidayat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(0, 'Unknown'),
(1, 'PC'),
(2, 'PS2'),
(3, 'PS3'),
(4, 'PS4'),
(5, 'PSVita'),
(6, 'Nintendo Switch'),
(7, 'Xbox360'),
(8, 'XboxOne');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL,
  `nama_log` varchar(255) NOT NULL,
  `tanggal_waktu_log` datetime NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `nama_log`, `tanggal_waktu_log`, `id_user`) VALUES
(8, 'admin menambahkan dsad di daftar barang', '2018-01-03 08:07:01', 'admin'),
(9, 'Data Produk dsad telah diubah ke DeadSpace', '2018-01-03 08:41:37', 'admin'),
(10, 'Data Produk DeadSpace telah diubah oleh admin', '2018-01-03 08:41:37', 'admin'),
(12, 'admin login', '2018-01-04 11:33:26', 'admin'),
(13, 'Miracle- login', '2018-01-04 11:41:25', 'Miracle-'),
(14, 'admin login', '2018-01-04 11:47:36', 'admin'),
(15, 'Petugas Budi telah ditambahkan admin', '2018-01-04 11:54:24', 'admin'),
(16, 'Petugas Budi(budi) telah dipecat', '2018-01-04 11:54:37', 'admin'),
(17, 'Miracle- login', '2018-01-04 11:57:07', 'Miracle-'),
(18, 'admin login', '2018-01-04 11:57:43', 'admin'),
(19, 'admin login', '2018-01-07 08:32:30', 'admin'),
(20, 'Nama Produk The Witcher 2 telah diubah oleh admin', '2018-01-07 08:32:47', 'admin'),
(21, 'admin login', '2018-01-07 08:33:33', 'admin'),
(22, 'Nama Produk The Witcher 2 telah diubah oleh admin', '2018-01-07 08:33:47', 'admin'),
(23, 'admin login', '2018-01-09 11:30:59', 'admin'),
(24, 'admin login', '2018-01-09 11:46:46', 'admin'),
(25, 'admin login', '2018-01-11 06:00:01', 'admin'),
(26, 'admin login', '2018-01-11 07:49:08', 'admin'),
(27, 'Data Customer Andi Lima(ID : 1) telah diubah oleh admin', '2018-01-11 08:21:47', 'admin'),
(28, 'Data Customer Andi Lim(ID : 1) telah diubah oleh admin', '2018-01-11 08:21:51', 'admin'),
(29, 'Customer 0 telah ditambahkan admin', '2018-01-11 08:40:02', 'admin'),
(30, 'Customer 0 telah ditambahkan admin', '2018-01-11 08:40:34', 'admin'),
(31, 'Customer 0 telah ditambahkan admin', '2018-01-11 08:41:14', 'admin'),
(32, 'Customer h h telah ditambahkan admin', '2018-01-11 08:41:43', 'admin'),
(33, 'Customer 0(ID : 3) telah dihapus', '2018-01-11 08:41:47', 'admin'),
(34, 'Customer h h(ID : 4) telah dihapus', '2018-01-11 08:41:49', 'admin'),
(35, 'admin mengubah kategori  ke PCS', '2018-01-11 08:51:40', 'admin'),
(36, 'admin mengubah kategori  ke PC', '2018-01-11 08:52:49', 'admin'),
(37, 'Nama Produk DeadSpace telah diubah oleh admin', '2018-01-11 08:57:01', 'admin'),
(38, 'admin login', '2018-01-11 11:54:18', 'admin'),
(39, 'admin mengubah stok  dari 9 ke 19 ', '2018-01-11 12:05:56', 'admin'),
(40, 'Transaksi 1 telah dikonfirmasi oleh admin', '2018-01-11 12:25:41', 'admin'),
(41, 'admin login', '2018-01-11 02:39:54', 'admin'),
(42, 'admin login', '2018-01-11 08:25:08', 'admin'),
(43, 'admin login', '2018-01-12 03:34:28', 'admin'),
(44, 'Transaksi 1 telah dikonfirmasi oleh admin', '2018-01-12 03:58:42', 'admin'),
(45, 'Transaksi 1 telah dikonfirmasi oleh admin', '2018-01-12 04:01:20', 'admin'),
(46, 'Transaksi 3 telah dikonfirmasi oleh admin', '2018-01-12 04:03:24', 'admin'),
(47, 'Transaksi 4 telah dikonfirmasi oleh admin', '2018-01-12 04:05:03', 'admin'),
(48, 'Transaksi 5 telah dikonfirmasi oleh admin', '2018-01-12 04:17:11', 'admin'),
(49, 'Transaksi 6 telah dikonfirmasi oleh admin', '2018-01-12 04:18:33', 'admin'),
(50, 'Transaksi 7 telah dikonfirmasi oleh admin', '2018-01-12 04:19:55', 'admin'),
(51, 'Transaksi 8 telah dikonfirmasi oleh admin', '2018-01-12 04:20:37', 'admin'),
(52, 'Transaksi 9 telah dikonfirmasi oleh admin', '2018-01-12 04:23:52', 'admin'),
(53, 'admin menambahkan aa di daftar barang', '2018-01-12 04:25:05', 'admin'),
(54, 'Data Produk aa(ECVB9) telah dihapus oleh admin', '2018-01-12 04:25:26', 'admin'),
(55, 'admin login', '2018-01-12 09:53:56', 'admin'),
(56, 'admin login', '2018-01-12 10:15:24', 'admin'),
(57, 'Transaksi 1 telah dikonfirmasi oleh admin', '2018-01-12 10:48:07', 'admin'),
(58, 'admin login', '2018-01-12 01:04:38', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` varchar(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori_produk` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `harga_produk` int(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `cover_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori_produk`, `date_added`, `harga_produk`, `deskripsi_produk`, `stok_produk`, `cover_produk`) VALUES
('1VBUP', 'The Witcher 2', 1, '2017-12-21', 400000, '', 99, 'The Witcher 2.jpg'),
('AGCUB', 'DeadSpace', 1, '2018-01-03', 200000, '', 99, 'DeadSpace.jpg'),
('F3NAZ', 'Destiny 2', 1, '2017-12-21', 230000, '', 99, 'Destiny 2.jpg'),
('NQMW1', 'GTA V', 1, '2017-12-21', 540000, '', 99, 'GTA V.jpg'),
('POX7C', 'Nobunaga Ambition Sphere Of Influence', 1, '2017-12-21', 300000, '', 99, 'Nobunaga Ambition Sphere Of Influence.jpg'),
('WUL7L', 'The Last Of Us', 4, '2017-12-25', 540000, '', 99, 'The Last Of Us.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_image`
--

CREATE TABLE IF NOT EXISTS `produk_image` (
  `id_image` int(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `nama_image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_image`
--

INSERT INTO `produk_image` (`id_image`, `id_produk`, `nama_image`) VALUES
(1, '1VBUP', 'image1'),
(2, '1VBUP', 'image2'),
(3, '1VBUP', 'image3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_penjualan`
--

CREATE TABLE IF NOT EXISTS `produk_penjualan` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `stok_terjual` int(11) NOT NULL DEFAULT '0',
  `hargatotal_terjual` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_penjualan`
--

INSERT INTO `produk_penjualan` (`id`, `id_produk`, `stok_terjual`, `hargatotal_terjual`) VALUES
(2, '1VBUP', 3, 1200000),
(3, 'AGCUB', 0, 0),
(4, 'F3NAZ', 0, 0),
(5, 'NQMW1', 1, 540000),
(6, 'POX7C', 1, 300000),
(7, 'WUL7L', 1, 540000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id`, `nama_bank`, `no_rekening`) VALUES
(2, 'BRI', '0000821390180212');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `atasnama_transaksi` varchar(255) NOT NULL,
  `bank_transaksi` varchar(255) NOT NULL,
  `jumlah_transfer` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `waktu_transaksi`, `status`, `atasnama_transaksi`, `bank_transaksi`, `jumlah_transfer`) VALUES
(1, 1, '2018-01-12 10:47:02', 'Transaksi Berhasil', 'andi', 'BRI || 0000821390180212', 1200000),
(2, 1, '2018-01-12 10:48:24', 'Menunggu Pembayaran...', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_detail` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `id_transaksi`, `id_keranjang`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `no_identitas` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`no_identitas`, `nama_lengkap`, `username`, `password`, `email`, `no_telepon`, `alamat`) VALUES
('0012380923', 'Amer Barqawi', 'Miracle-', 'miracle-', 'miracle@gmail.com', '082183891', '                                                                                                                                                Depok                                                                                                          '),
('1', '', 'admin', 'admin', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `customer_keranjang`
--
ALTER TABLE `customer_keranjang`
  ADD PRIMARY KEY (`id`), ADD KEY `id_customer` (`id_customer`), ADD KEY `id_produk` (`id_produk`), ADD KEY `id_produk_2` (`id_produk`);

--
-- Indexes for table `customer_nama`
--
ALTER TABLE `customer_nama`
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`), ADD KEY `kategori_produk` (`kategori_produk`);

--
-- Indexes for table `produk_image`
--
ALTER TABLE `produk_image`
  ADD PRIMARY KEY (`id_image`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk_penjualan`
--
ALTER TABLE `produk_penjualan`
  ADD PRIMARY KEY (`id`), ADD KEY `id_produk` (`id_produk`), ADD KEY `id_produk_2` (`id_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`), ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `id_transaksi` (`id_transaksi`), ADD KEY `id_keranjang` (`id_keranjang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no_identitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_keranjang`
--
ALTER TABLE `customer_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `produk_image`
--
ALTER TABLE `produk_image`
  MODIFY `id_image` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produk_penjualan`
--
ALTER TABLE `produk_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `customer_keranjang`
--
ALTER TABLE `customer_keranjang`
ADD CONSTRAINT `customer_keranjang_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `customer_keranjang_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `customer_nama`
--
ALTER TABLE `customer_nama`
ADD CONSTRAINT `customer_nama_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_produk`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `produk_image`
--
ALTER TABLE `produk_image`
ADD CONSTRAINT `produk_image_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk_penjualan`
--
ALTER TABLE `produk_penjualan`
ADD CONSTRAINT `produk_penjualan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `deadline_1` ON SCHEDULE AT '2018-01-12 13:47:02' ON COMPLETION PRESERVE ENABLE DO update transaksi set status = 'Gagal, Uang tidak dikirim' where id_transaksi = '1'$$

CREATE DEFINER=`root`@`localhost` EVENT `deadline_2` ON SCHEDULE AT '2018-01-12 13:48:24' ON COMPLETION PRESERVE ENABLE DO update transaksi set status = 'Gagal, Uang tidak dikirim' where id_transaksi = '2'$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
