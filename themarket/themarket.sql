-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2017 at 05:29 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `themarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `user_id` int(150) NOT NULL,
  `account_name` text NOT NULL,
  `account_bank` text NOT NULL,
  `account_number` int(150) NOT NULL,
  `account_billing` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `account_name`, `account_bank`, `account_number`, `account_billing`) VALUES
(9, 'Caesar Adyatma', 'BCA', 14045, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(150) NOT NULL,
  `user_id` int(150) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_status` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`pd_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `pd_name` varchar(150) NOT NULL,
  `pd_details` varchar(200) NOT NULL,
  `pd_price` int(100) NOT NULL,
  `pd_path` varchar(500) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pd_id`, `user_id`, `cat_id`, `pd_name`, `pd_details`, `pd_price`, `pd_path`, `status`) VALUES
(2, 0, 0, 'Iphone 7', 'apple iphone 7', 500, '', 1),
(3, 0, 1, 'xiaomi', 'hp cokin', 100000, '', 1),
(4, 0, 1, 'hape', 'hape', 111, '', 1),
(5, 0, 1, 'hengpong', 'hp', 500, '', 0),
(6, 0, 1, 'hp lagi', 'hp', 1, '', 1),
(7, 0, 1, 'test', 'test', 100, '', 1),
(8, 0, 1, 'testtest', '1', 1, '', 0),
(9, 0, 1, 'madu', 'madumaduan', 1, 'products/products/loader.gif', 0),
(10, 0, 1, 'karung', 'karung', 1, 'products/overlayartist.png', 0),
(11, 0, 1, 'kaos', 'kaosan', 1, 'products/1_kaos_1.png', 0),
(12, 0, 2, 'baju', 'baju', 100, 'products/1_baju_2_fa7d19ad3baa4d29b27781cc44ebaf95.png', 0),
(13, 0, 2, 'off white', 'hoodie', 7000000, 'products/1_off white_2_80edb057a6a035659a7e3a41aa45a51c.jpg', 0),
(14, 0, 2, 'fuse', 'fuse coy sabi bet', 100000, 'user/caesar@caesar.com_9/9_fuse_2_6f65833f2773ea6d4003da30dc43743b.gif', 0),
(18, 0, 1, 'lg smartphone', 'smartphone canggih', 1000000, 'user/caesar@caesar.com_9/9_lg smartphone_1_738e4b6ea9c4fbbabc3c0a0f8279e67f.png', 0),
(19, 0, 1, 'eja', 'ejamantap', 1, 'user/caesar@caesar.com_9/9_eja_1_f0f0f33bb888c3adae4d7f1510dee4cf.jpg', 0),
(20, 0, 2, 'Off White Hoodie', 'Off White Hoodie Virgil Abloh', 7000000, 'user/caesar@caesar.com_9/9_Off White Hoodie_2_0afe76c8dde7285dd3291b07c2401860.jpg', 1),
(21, 0, 2, 'coba', 'hoodie', 23, 'user/caesar@caesar.com_9/9_coba_2_809538c6fa2e4d130bb604a52e17cced.jpg', 0),
(22, 9, 2, 'Supreme Hoodie', 'Supreme Box Logo Hoodie', 8000000, 'user/caesar@caesar.com_9/9_Supreme Hoodie_2_175760a0d7ee68f5ee094309212c8335.jpg', 1),
(23, 9, 2, 'Supreme Hoodie Juga', 'Box Logo', 8000000, 'user/caesar@caesar.com_9/9_Supreme Hoodie Juga_2.jpg', 1),
(24, 9, 2, 'Supreme Hoodie', 'Supreme Box Logo Hoodie', 8000000, 'user/caesar@caesar.com_9/9_2_09f1afebe1075ca2e2fb7ecb93670a91.jpg', 1),
(25, 9, 2, 'Off White Hoodie', 'Virgil Abloh Off White Hoodie', 7000000, 'user/caesar@caesar.com_9/9_2_5303d23d355a8bef851590a530eccec8.jpg', 1),
(26, 9, 2, 'ikan ciliwung', 'ikan dari ciliwung', 1, 'user/caesar@caesar.com_9/9_2_9d7a801e9354a094d64a02b4973fa28e.jpg', 1),
(27, 9, 1, 'sampah masyarakat', 'gembel', 1, 'user/caesar@caesar.com_9/9_1_33116da7bf4dab7a8c340bcfc9f52d98.jpg', 0),
(28, 9, 2, 'jagung', 'jagung bakar', 2, 'user/caesar@caesar.com_9/9_2_e90410c8728f5f9b5755751a6e84c834.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE IF NOT EXISTS `productcategory` (
`cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`cat_id`, `cat_name`) VALUES
(1, 'Smartphone'),
(2, 'Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(100) NOT NULL,
  `user_type` int(100) NOT NULL,
  `user_status` int(150) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `user_pnumber` varchar(50) NOT NULL,
  `user_pass` varchar(120) NOT NULL,
  `user_salt` varchar(120) NOT NULL,
  `user_dir` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `user_status`, `user_fname`, `user_lname`, `user_email`, `user_address`, `user_pnumber`, `user_pass`, `user_salt`, `user_dir`) VALUES
(1, 1, 0, 'Coba', 'Ah', 'cobaah@cobain.com', 'cobagakya', '', 'b07086182e49e970e97c02f4308ac4d8', '9a4300e3553dd277c8ae66ae891a403a', ''),
(2, 1, 0, 'folder', 'baru', '1@1.com', '1', '', 'e96719e14abdb844b2ee87b5b16b77a0', '58cafb794bfb2632095f3e6009044b63', ''),
(3, 1, 0, 'iseng', 'isengah', 'iseng@iseng.com', '1', '', '9ad89abcdaa269880a3e4aed2d03e6ac', '6c4e52ced1064f29de5e9e1e88aa8072', ''),
(4, 1, 0, 'nyoba', 'nyoba', 'nyoba@1234.com', '1', '', '5f9aab164e8061acf172275ec919c851', 'bb5b2673c10ef4ab6b077affe171090a', ''),
(7, 1, 0, 'nadya', 'gondrong', 'nadya@gondrong.com', 'ciputatcuy', '', 'ad17c4da17bff7336263bfb7fdb53454', '5251ebf9d7f39797ea1a7a602b7cb8e2', ''),
(8, 1, 0, 'vero', 'gaje', 'vero@gaje.com', 'bangkamartabak', '', 'fd19a2ef22dd621c514bdf0809673899', 'eef9b2bdfc6ac788bede841cf5901b78', ''),
(9, 1, 1, 'Caesar', 'Prayogo', 'caesar@caesar.com', 'ciputatbro', '', 'a6de7f32f0b816326fa72dc3f32aab71', '04190a56eebdefb117cae2424d9ebdb5', 'user/caesar@caesar.com_9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`pd_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
