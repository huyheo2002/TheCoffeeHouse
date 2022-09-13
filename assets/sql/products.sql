-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 08:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thecoffeehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `title`, `value`, `category_id`, `description`) VALUES
(1, './assets/img/menu/CPVN1.jpg', 'Bạc Sỉu Đá', 29000, 1, 'Siêu ngon'),
(2, './assets/img/menu/CPVN2.jpg', 'Bạc Sỉu Nóng', 35000, 1, ''),
(3, './assets/img/menu/CPVN3.jpg', 'Cà Phê Đen Đá', 29000, 1, ''),
(4, './assets/img/menu/CPVN4.jpg', 'Cà Phê Đen Nóng', 35000, 1, ''),
(5, './assets/img/menu/CPVN5.jpg', 'Cà Phê Sữa Đá', 29000, 1, ''),
(6, './assets/img/menu/CPVN6.jpg', 'Cà Phê Sữa Đá Chai Fresh 250ml', 79000, 1, ''),
(7, './assets/img/menu/CPVN7.jpg', 'Cà Phê Sữa Nóng', 35000, 1, ''),
(8, './assets/img/menu/CPM1.jpg', 'Latte Táo Lê Quế Nóng', 59000, 2, ''),
(9, './assets/img/menu/CPM2.jpg', 'Latte Táo Lê Quế Đá', 59000, 2, ''),
(10, './assets/img/menu/CPM3.jpg', 'Latte Táo Lê Quế Chai Fresh 500ml', 109000, 2, ''),
(11, './assets/img/menu/CPM4.jpg', 'Mocha Nóng', 50000, 2, ''),
(12, './assets/img/menu/CPM5.jpg', 'Mocha Đá', 50000, 2, ''),
(13, './assets/img/menu/CPM6.jpg', 'Espresso Nóng', 40000, 2, ''),
(14, './assets/img/menu/CPM8.jpg', 'Espresso Đá', 55000, 2, ''),
(15, './assets/img/menu/CPM9.jpg', 'Cappuccino Đá', 50000, 2, ''),
(16, './assets/img/menu/CPM10.jpg', 'Americano Nóng', 40000, 2, ''),
(17, './assets/img/menu/CPM11.jpg', 'Latte Đá', 50000, 2, ''),
(18, './assets/img/menu/CPM12.jpg', 'Caramel Macchiato Nóng', 50000, 2, ''),
(19, './assets/img/menu/CPM13.jpg', 'Caramel Macchiato Đá', 50000, 2, ''),
(20, './assets/img/menu/CPM14.jpg', 'Latte Nóng', 40000, 2, ''),
(21, './assets/img/menu/CPM15.jpg', 'Americano Đá', 40000, 2, ''),
(22, './assets/img/menu/CB1.jpg', 'Cold Brew Sữa Tươi', 45000, 3, ''),
(23, './assets/img/menu/CB2.jpg', 'Cold Brew Truyền Thống', 45000, 3, ''),
(24, './assets/img/menu/TTC1.jpeg', 'Trà Dưa Đào Sung Túc', 59000, 4, ''),
(25, './assets/img/menu/TTC2.jpeg', 'Trà Sen Nhân Sum Vầy', 59000, 4, 'Thức uống mang hương vị của nhãn, của sen, của trà Oolong đầy thanh mát cho tất cả các thành viên trong dịp Tết này. An lành, thư thái và đậm đà chính là những gì The Coffee House mong muốn gửi trao đến bạn và gia đình'),
(26, './assets/img/menu/TCC3.jpg', 'Trà Long Nhãn Hạt Chia', 45000, 4, ''),
(27, './assets/img/menu/TCC4.jpg', 'Trà Long Nhãn Hạt Chia Nóng', 52000, 4, ''),
(28, './assets/img/menu/TCC5.jpg', 'Trà Hạt Sen Đá', 45000, 4, ''),
(29, './assets/img/menu/TCC6.jpg', 'Trà Hạt Sen Nóng', 52000, 4, ''),
(30, './assets/img/menu/TCC7.jpg', 'Trà Đào Cam Sả Đá', 45000, 4, ''),
(31, './assets/img/menu/TCC8.jpg', 'Trà Đào Cam Sả Nóng', 52000, 4, ''),
(32, './assets/img/menu/TCC9.jpg', 'Trà Đào Cam Sả Chai Fresh 500ml', 45000, 4, ''),
(33, './assets/img/menu/TSM1.jpg', 'Caramel Macchiato Đá', 50000, 5, ''),
(34, './assets/img/menu/TSM2.jpg', 'Hồng Trà Latte Macchiato', 55000, 5, ''),
(35, './assets/img/menu/TSM3.jpg', 'Hồng Trà Sữa Nóng', 50000, 5, ''),
(36, './assets/img/menu/TSM4.jpg', 'Hồng Trà Sữa Trân Châu', 55000, 5, ''),
(37, './assets/img/menu/TSM5.jpg', 'Latte Táo Lê Quế Đá', 59000, 5, ''),
(38, './assets/img/menu/TSM6.jpg', 'Trà Đen Macchiato', 50000, 5, ''),
(39, './assets/img/menu/TSM7.jpg', 'Trà Sữa Mắc Ca Trân Châu Trắng', 50000, 5, ''),
(40, './assets/img/menu/TSM8.jpg', 'Trà Sữa Masala Chai Nóng', 59000, 5, ''),
(41, './assets/img/menu/TSM9.jpg', 'Trà Sữa Masala Chai Trân Châu Chai Fresh 500ml', 109000, 5, ''),
(42, './assets/img/menu/TSM10.jpeg', 'Trà Sữa Masala Chai Trân Châu Đá', 59000, 5, ''),
(43, './assets/img/menu/TSM11.jpg', 'Trà Sữa Oolong Nướng Nóng', 50000, 5, ''),
(44, './assets/img/menu/TSM12.jpg', 'Trà Sữa Oolong Nướng Chân Châu', 55000, 5, ''),
(45, './assets/img/menu/TSM13.jpg', 'Trà Sữa Oolong Nướng Trân Châu Chai 500ml', 99000, 5, ''),
(46, './assets/img/menu/DX1.jpg', 'Cà Phê Đá Xay', 99000, 6, ''),
(47, './assets/img/menu/DX2.jpg', 'Chanh Sả Đá Xay', 49000, 6, ''),
(48, './assets/img/menu/DX3.jpg', 'Chocolate Đá Xay', 59000, 6, ''),
(49, './assets/img/menu/DX4.jpg', 'Cookie Đá Xay', 59000, 6, ''),
(50, './assets/img/menu/DX5.jpg', 'Đào Việt Quất Đá Xay', 59000, 6, ''),
(51, './assets/img/menu/DX6.jpg', 'Matcha Đá Xay', 59000, 6, ''),
(52, './assets/img/menu/MCSCL1.jpg', 'Chocolate Đá', 59000, 7, ''),
(53, './assets/img/menu/MCSCL2.jpg', 'Sinh Tố Việt Quất', 59000, 7, ''),
(54, './assets/img/menu/MCSCL3.jpg', 'Chocolate Đá Xay', 59000, 7, ''),
(55, './assets/img/menu/MCSCL4.jpg', 'Chocolate Nóng', 59000, 7, ''),
(56, './assets/img/menu/MCSCL5.jpg', 'Matcha Đá Xay', 59000, 7, ''),
(57, './assets/img/menu/MCSCL6.jpg', 'Matcha Latte Đá', 59000, 7, ''),
(58, './assets/img/menu/MCSCL6.jpg', 'Matcha Latte Nóng', 59000, 7, ''),
(59, './assets/img/menu/BM1.jpg', 'Bánh Mì Que Pate', 12000, 8, ''),
(60, './assets/img/menu/BM2.jpg', 'Bánh Mì Que Pate Cay', 12000, 8, ''),
(61, './assets/img/menu/BM3.jpg', 'Bánh Mì VN Thịt Nguội', 29000, 8, ''),
(62, './assets/img/menu/BM4.jpg', 'Chà Bông Phô Mai', 32000, 8, ''),
(63, './assets/img/menu/BM5.jpg', 'Croissant Trứng Muối', 35000, 8, ''),
(64, './assets/img/menu/BN1.jpg', 'Mochi Kem Dừa Dứa', 19000, 9, ''),
(65, './assets/img/menu/BN2.jpg', 'Mochi Kem Phúc Bồn Tử', 19000, 9, ''),
(66, './assets/img/menu/BN3.jpg', 'Mochi Kem Việt Quất', 19000, 9, ''),
(67, './assets/img/menu/BN4.jpg', 'Mochi Kem Xoài', 19000, 9, ''),
(68, './assets/img/menu/BN5.jpg', 'Mouse Gấu Chocolate', 39000, 9, ''),
(69, './assets/img/menu/BN6.jpg', 'Mouse Passion Cheese', 29000, 9, ''),
(70, './assets/img/menu/BN7.jpg', 'Mouse Red Velvet', 29000, 9, ''),
(71, './assets/img/menu/BN8.jpg', 'Mouse Tiramisu', 32000, 9, ''),
(72, './assets/img/menu/SN1.jpg', 'Mít Sấy', 20000, 10, ''),
(73, './assets/img/menu/CPTN1.jpeg', 'Cà Phê Rang Xay Original 1 Túi 1KG', 235000, 11, ''),
(74, './assets/img/menu/CPTN2.jpg', 'Cà Phê Rang Xay Original 1250gr', 60000, 11, ''),
(75, './assets/img/menu/CPTN3.jpeg', 'Cà Phê Hòa Tan Đậm Vị Việt Túi 40x16G', 99000, 11, ''),
(76, './assets/img/menu/CPTN4.jpg', 'Cà Phê Sữa Đá Hòa Tan Hộp 10 gói', 44000, 11, ''),
(77, './assets/img/menu/CPTN5.jpg', 'Cà Phê Sữa Đá Hòa Tan Đậm Vị Hộp 18 gói x 16gr', 48000, 11, ''),
(78, './assets/img/menu/CPTN6.jpg', 'Cà Phê Sữa Đá Hòa Tan Túi 25 x 22gr', 99000, 11, ''),
(79, './assets/img/menu/CPTN7.jpg', 'Cà Phê Rich Finish Gu Đậm Tinh Tế 350gr', 90000, 11, ''),
(80, './assets/img/menu/CPTN8.jpg', 'Cà Phê Peak Flavor Hương Thơm Đỉnh Cao 350gr', 90000, 11, ''),
(81, './assets/img/menu/CPTN9.jpg', 'Cà Phê Arabica', 100000, 11, ''),
(82, './assets/img/menu/CPTN10.jpg', 'Cà Phê Sữa đá Pack 6 lon', 84000, 11, ''),
(83, './assets/img/menu/CPTN11.jpg', 'Thùng 24 Lon Cà Phê Sữa Đá', 269000, 11, ''),
(84, './assets/img/menu/CPTN12.jpg', 'Combo Quà Tết 2022', 321000, 11, ''),
(85, './assets/img/menu/CPTN13.jpg', 'Combo 3 Hộp Cà Phê Sữa Đá Hòa Tan Đậm vị Hộp 18 gó', 109000, 11, ''),
(86, './assets/img/menu/CPTN14.jpg', 'Combo 3 Hộp Cà Phê Sữa Đá Hòa Tan', 109000, 11, ''),
(87, './assets/img/menu/CPTN15.jpg', 'Combo 2 Cà Phê Rang Xay Original 1250gr', 99000, 11, ''),
(88, './assets/img/menu/TTN1.jpg', 'Combo Quà Tết 2022', 321000, 12, ''),
(89, './assets/img/menu/TTN2.jpg', 'Giftset Trà Tearoma', 169000, 12, ''),
(90, './assets/img/menu/TTN3.jpg', 'Combo 3 hộp trà Lài Túi Lọc Tearoma', 69000, 12, ''),
(91, './assets/img/menu/TTN4.jpg', 'Combo 3 hộp trà Sen túi lọc Tearoma', 69000, 12, ''),
(92, './assets/img/menu/TTN5.jpg', 'Combo 3 hộp trà Đào túi lọc Tearoma', 69000, 12, ''),
(93, './assets/img/menu/TTN6.jpg', 'Combo 3 hộp trà Oolong túi lọc Tearoma', 69000, 12, ''),
(94, './assets/img/menu/TTN7.jpg', 'Trà Đào Túi Lọc Tearoma 20 x 2gr', 28000, 12, ''),
(95, './assets/img/menu/TTN8.jpg', 'Trà Lài Túi Lọc Tearoma 20 x 2gr', 28000, 12, ''),
(96, './assets/img/menu/TTN9.jpg', 'Trà Oolong Túi lọc Tearoma 20 x 2gr', 28000, 12, ''),
(97, './assets/img/menu/TTN10.jpg', 'Trà Sen Túi Lọc Tearoma 20 x 2gr', 28000, 12, ''),
(98, './assets/img/menu/TTN11.jpg', 'Trà Xanh Lá Tearoma 100gr', 75000, 12, ''),
(99, './assets/img/menu/TTN12.jpg', 'Trà Sen Lá Tearoma 100gr', 80000, 12, ''),
(100, './assets/img/menu/TTN13.jpg', 'Trà Oolong Lá Tearoma 100gr', 100000, 12, ''),
(101, './assets/img/menu/TTN14.jpg', 'Trà Lài Lá Tearoma 100gr', 80000, 12, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
