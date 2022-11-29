CREATE TABLE `shops` (
  `id` int(11) NOT NULL  AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `time_open` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

INSERT INTO `shops` (`id`, `image`, `title`, `address`, `time_open`) VALUES
(1, './assets/img/shop/img3_shop_HN.png', 'HN The Park Home', 'Lô D12 KĐT, Thành Thái, Dịch Vọng, Cầu Giấy, Hà Nội', '07:30 - 22:30'),
(2, './assets/img/shop/img2_shop_HN.png','HN Trần Kim Xuyến', 'Ô số 01A1, Tầng 1, Chung cư E2-Chelsea Residences Trần Kim Xuyến, Khu ĐTM Yên Hòa, Cầu Giấy, Hà Nội, Việt Nam', '07:30 - 22:30'),
(3, './assets/img/shop/img1_shop_HN.png', 'HN Lê Duẩn','219 Đường Lê Duẩn, Nguyễn Du, Đống Đa, Hà Nội.', '07:30 - 22:30'),
(4, './assets/img/shop/img4_shop_HN.png', 'HN Victoria Văn Phú','V3-Văn Phú Victoria-CT9, Hà Đông, Hà Nội.', '07:30 - 22:30'),
(5, './assets/img/shop/img5_shop_HN.png', 'HN Aeon Mall Hà Đông','AEON Mall Hà Đông, Dương Nội, Hà Đông, Hà Nội.', '07:30 - 22:30'),
(6, './assets/img/shop/img6_shop_HN.png', 'HN Triều Khúc','53 Triều Khúc, Thanh Xuân, Hà Nội', '07:30 - 22:30'),
(7, './assets/img/shop/img_shop_HCM.png', 'HN Nguyễn Văn Cừ','149 Nguyễn Văn Cừ, Ngọc Lâm, Long Biên, Hà Nội', '07:30 - 22:30'),
(8, './assets/img/shop/img2_shop_HCM.jpg', 'HN Lê Thanh Nghị','92 Lê Thanh Nghị, Hai Bà Trưng, Hà Nội', '07:30 - 22:30'),
(9, './assets/img/shop/img3_shop_HCM.jpg', 'HN Times City','T5, 458 P. Minh Khai, Vĩnh Phú, Hai Bà Trưng, Hà Nội.', '07:30 - 22:30'),
(10, './assets/img/shop/img4_shop_HCM.jpg', 'HN Kim Mã', '259 P. Kim Mã, Kim Mã, Ba Đình, Hà Nội', '07:30 - 22:30');