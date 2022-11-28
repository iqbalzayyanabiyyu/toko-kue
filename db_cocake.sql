-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 01:46 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cocake`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `orders` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `districts` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `zip_code` varchar(8) NOT NULL,
  `date_orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `orders`, `email`, `name`, `address`, `districts`, `city`, `zip_code`, `date_orders`) VALUES
(2, 'Black Forest', 'alexa@gmail.com', 'Alexa', 'karadenan, Cibinong, Bogor', 'Cibinong', 'Bogor', '16913', 1668347922),
(3, 'Choco Devila', 'edo@gmail.com', 'Edo Edo', 'Galur, Senen, Jakarta Pusat', 'Cibinong', 'Jakarta', '123321', 1668348636);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `harga`) VALUES
(1, 'Black Forest', 250000),
(2, 'Red Velvet', 350000),
(3, 'Choco Maltine', 230000),
(4, 'Klasik Opera', 250000),
(5, 'Matcha Opera', 180000),
(6, 'Choco Devila', 200000),
(7, 'Coklat Regal', 150000),
(8, 'Strawberry Keju', 220000),
(9, 'Vanila Fruit', 230000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `tgl_transaksi` int(11) NOT NULL,
  `keterangan` varchar(126) DEFAULT NULL,
  `produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `email`, `kuantitas`, `tgl_transaksi`, `keterangan`, `produk_id`) VALUES
(4, 'alexa@gmail.com', 2, 1669523926, 'testing aja 1', 1),
(5, 'alexa@gmail.com', 1, 1669524073, 'testing aja 2', 4),
(6, 'user@user.com', 4, 1669524217, 'testing aja 1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(12, 'User Admin', 'useradmin@gmail.com', 'default.jpg', '$2y$10$NGRpcEh2mYefi7N32Va/BuAh7zCorLyUm1RKPUoS6GT/W5lf42ZDq', 1, 1, 1667801208),
(14, 'Iqbal Zayyan', 'iqbal01@gmail.com', 'default.jpg', '$2y$10$aksjmd7x3ItUQXzFHNpiSe.ewytqx4jU8UcSxUtx8W61YLrP0qabe', 1, 1, 1667802975),
(16, 'Alexa', 'alexa@gmail.com', 'user21.png', '$2y$10$qFtAUflQEmf1ue4ODT8jdORSp7WrPPzT0dvsdN2U1fkOmxWgnxHAy', 2, 1, 1668133966),
(17, 'Edo Edo', 'edo@gmail.com', 'default.jpg', '$2y$10$2HYHxBoh5e9.D/A.bUepEOuYCU43k50x49PPRuHaESGkvdM6pLAc2', 2, 1, 1668348573),
(18, 'User Aja', 'user@user.com', 'default.jpg', '$2y$10$3LDWTFADdt1hHDt7TdbC1.vrDPYPpW/SHQRsQNQAvXEx2JPNY0gUC', 2, 1, 1669185422),
(19, 'bebas', 'bebas@gmail.com', 'default.jpg', '$2y$10$FmmF7/nkrxRuWrySb4/fN.6WSBFKE8U/uR5.bWLJd7iId5z9tF22a', 2, 1, 1669186446),
(20, 'admin', 'admin@admin.com', 'default.jpg', '$2y$10$bu9696Z67VVc.zHcZQtxg.ID8F61tHlR3u9USS4M64AyPeUJ4mcGy', 1, 1, 1669343100),
(21, 'Bulan', 'bulan@gmail.com', 'default.jpg', '$2y$10$RZ2Etzge75pevpotyqlofOR7pTy4GxTtULabYjU8GZtvdAvhDBsSe', 2, 1, 1669386987);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(7, 1, 3),
(14, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Shop', 'user', 'fas fa-fw fa-shopping-bag', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 2, 'My Profile', 'user/profile', 'fas fa-fw fa-user', 1),
(10, 1, 'Daftar Admin', 'admin/daftarAdmin', 'fas fa-fw fa-users-cog', 1),
(11, 1, 'Profile Admin', 'admin/profileAdmin', 'fas fa-fw fa-user-cog', 1),
(13, 1, 'Orders', 'admin/orders', 'fas fa-fw fa-inbox', 1),
(16, 2, 'Transaksi', 'user/transaksi', 'far fa-fw fa-money-bill-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
