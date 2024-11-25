-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2023 at 12:11 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banquanao`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_general_ci NOT NULL,
  `detail` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `detail`, `image`) VALUES
(1, 'Bộ sưu tập Thu – Đông 2023', 'Một nhãn hiệu chuyên tạo ra những sản phẩm thiết yếu sang trọng. Được tạo ra một cách có đạo đức với một thái độ kiên định cam kết chất lượng vượt trội.', 'http://localhost/shopquanao/img/hero/hero-1.jpg'),
(2, 'Bộ sưu tập Thu – Đông 2023', 'Một nhãn hiệu chuyên tạo ra những sản phẩm thiết yếu sang trọng. Được tạo ra một cách có đạo đức với một thái độ kiên định\r\n                                cam kết chất lượng vượt trội.', 'http://localhost/shopquanao/img/hero/hero-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
CREATE TABLE IF NOT EXISTS `binhluan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `email` text NOT NULL,
  `noidung` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `thoigian` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `sanpham` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `image` text NOT NULL,
  `chitiet` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `price` text NOT NULL,
  `soluong` text NOT NULL,
  `tongtien` text NOT NULL,
  `email` text NOT NULL,
  `thoihan` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `lienket` text NOT NULL,
  `idsp` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=788 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `image`, `chitiet`, `price`, `soluong`, `tongtien`, `email`, `thoihan`, `lienket`, `idsp`) VALUES
(786, 'ÁO KHOÁC PHAO NAM BOMBER TRẺ TRUNG CÁ TÍNH CHẦN BÔNG 3 LỚP CỰC ẤM Zenko MEN JK 068', 'http://localhost/shopquanao/admin/pages/post/uploads/vn-11134207-7r98o-lmjqq5yx6jtrb3.jpg', '<p>&Aacute;O KHO&Aacute;C PHAO NAM BOMBER TRẺ TRUNG C&Aacute; T&Iacute;NH CHẦN B&Ocirc;NG 3 LỚP CỰC ẤM Zenko MEN JK 068</p>\r\n', '119000', '55', '6545000', 'admin@gmail.com', '0', 'quang-ne', '41'),
(787, 'ÁO KHOÁC & ÁO BLAZER', 'http://localhost/shopquanao/admin/pages/post/uploads/3411302712_2_6_1.jpg', '<p>&Aacute;O KHO&Aacute;C &amp; &Aacute;O BLAZER</p>\r\n', '55555', '110', '6111050', 'admin22@gmail.com', '0', 'quang-ne', '40');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `danhmucchinh` text NOT NULL,
  `tendanhmuc` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `lienket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `danhmucchinh`, `tendanhmuc`, `lienket`) VALUES
(9, 'san-pham', 'Áo Lạnh', 'ao-lanh'),
(10, 'san-pham', 'Áo Thun', 'ao-thun'),
(11, 'san-pham', 'Áo gió', 'ao-gio'),
(12, 'san-pham', 'Đồ Bộ', 'do-bo');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `madonhang` text NOT NULL,
  `tennguoimua` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `email` text NOT NULL,
  `name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `image` text NOT NULL,
  `price` text NOT NULL,
  `trangthai` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `thoihan` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `soluong` text NOT NULL,
  `tongtien` text NOT NULL,
  `lienket` text NOT NULL,
  `idsp` text NOT NULL,
  `thoigian` text NOT NULL,
  `diachi` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `dienthoai` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=672 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `madonhang`, `tennguoimua`, `email`, `name`, `image`, `price`, `trangthai`, `thoihan`, `soluong`, `tongtien`, `lienket`, `idsp`, `thoigian`, `diachi`, `dienthoai`) VALUES
(665, 'SHOPQUANAO_RB0DZ', 'Quang', 'admin@gmail.com', 'ÁO KHOÁC & ÁO BLAZER', 'http://localhost/shopquanao/admin/pages/post/uploads/3411302712_2_6_1.jpg', '500000', 'Đã Nhận Hàng', '', '10', '5000000', 'quang-ne', '40', '19/12/23 7:02:03', 'quảng ngãi', '123456'),
(666, 'SHOPQUANAO_G5V0P', 'Quang', 'admin@gmail.com', 'ÁO KHOÁC PHAO NAM BOMBER TRẺ TRUNG CÁ TÍNH CHẦN BÔNG 3 LỚP CỰC ẤM Zenko MEN JK 068', 'http://localhost/shopquanao/admin/pages/post/uploads/vn-11134207-7r98o-lmjqq5yx6jtrb3.jpg', '119000', 'Đã Đặt Hàng', '', '8', '952000', 'quang-ne', '41', '19/12/23 7:02:03', 'quảng ngãi', '123456'),
(667, 'SHOPQUANAO_QRXBY', 'Quang', 'admin@gmail.com', 'Áo khoác bomber nam teddy dạ thêu sọc da trắng hai vai bo chun lót gió dày dặn phong cách đường phố - thoitrangnamdt M03', 'http://localhost/shopquanao/admin/pages/post/uploads/vn-11134207-7r98o-llydpwz6c0ynd8.jpg', '134000', 'Đã Đặt Hàng', '', '6', '804000', 'ao-khoac-bomber-nam-teddy-da-theu-soc-da-trang-hai-vai-bo-chun-lot-gio-day-dan-phong-cach-duong-pho-thoitrangnamdt-m03', '42', '19/12/23 7:02:03', 'quảng ngãi', '123456'),
(668, 'SHOPQUANAO_E77VW', 'Quang', 'admin@gmail.com', 'ÁO KHOÁC & ÁO BLAZER', 'http://localhost/shopquanao/admin/pages/post/uploads/3411302712_2_6_1.jpg', '500000', 'Đã Đặt Hàng', '', '5', '2500000', 'quang-ne', '40', '19/12/23 8:57:06', 'quảng ngãi', '123456'),
(669, 'SHOPQUANAO_H1VG0', 'Quang', 'admin@gmail.com', 'Áo khoác bomber nam teddy dạ thêu sọc da trắng hai vai bo chun lót gió dày dặn phong cách đường phố - thoitrangnamdt M03', 'http://localhost/shopquanao/admin/pages/post/uploads/vn-11134207-7r98o-lmjqq5yx6jtrb3.jpg', '134000', 'Đã Đặt Hàng', '', '1', '134000', 'ao-khoac-bomber-nam-teddy-da-theu-soc-da-trang-hai-vai-bo-chun-lot-gio-day-dan-phong-cach-duong-pho-thoitrangnamdt-m03', '43', '19/12/23 18:25:47', 'quảng ngãi', '123456'),
(670, 'SHOPQUANAO_OT3ZE', 'Quang', 'admin@gmail.com', 'Áo thun Lót Nam Trắng Đẹp Cổ Tròn, Áo Phông Nam Dáng Rộng Cotton cộc tay trơn kiểu bộ đội dệt kim đông xuân', 'http://localhost/shopquanao/admin/pages/post/uploads/71e2a25249233cf880a2053a198a3d34.jpg', '59000', 'Đã Đặt Hàng', '', '111', '6549000', 'ao-khoac-bomber-nam-teddy-da-theu-soc-da-trang-hai-vai-bo-chun-lot-gio-day-dan-phong-cach-duong-pho-thoitrangnamdt-m03', '45', '19/12/23 18:36:50', 'quảng ngãi', '123456'),
(671, 'SHOPQUANAO_7WB6D', 'Quang', 'admin@gmail.com', 'Set Bộ Nỉ Thể Thao NEWYORK Logo Nổi Fom Rộng Sành Điệu, Chất Liệu Nỉ Ngoại Dày Dặn Mềm Mịn Co Dãn Nhẹ', 'http://localhost/shopquanao/admin/pages/post/uploads/vn-11134207-7qukw-li3bozdqbg0i5c.jpg', '189000', 'Đã Đặt Hàng', '', '11 ', '2079000', 'set-bo-ni-the-thao-newyork-logo-noi-fom-rong-sanh-dieu-chat-lieu-ni-ngoai-day-dan-mem-min-co-dan-nhe', '46', '19/12/23 22:33:06', 'quảng ngãi', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `hotro`
--

DROP TABLE IF EXISTS `hotro`;
CREATE TABLE IF NOT EXISTS `hotro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `email` text NOT NULL,
  `message` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `magiamgia`
--

DROP TABLE IF EXISTS `magiamgia`;
CREATE TABLE IF NOT EXISTS `magiamgia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `magiam` text NOT NULL,
  `sotien` text NOT NULL,
  `soluong` text NOT NULL,
  `batdau` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magiamgia`
--

INSERT INTO `magiamgia` (`id`, `magiam`, `sotien`, `soluong`, `batdau`) VALUES
(1, 'Demo', '1000', '5', '10000'),
(2, 'quang-ne', '', '1', ''),
(3, 'quangne', '', '1', ''),
(4, 'quangne', '', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `phanmem`
--

DROP TABLE IF EXISTS `phanmem`;
CREATE TABLE IF NOT EXISTS `phanmem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `danhmucphu` text NOT NULL,
  `tendanhmuc` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `lienket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phanmem`
--

INSERT INTO `phanmem` (`id`, `danhmucphu`, `tendanhmuc`, `lienket`) VALUES
(1, 'phanmemauto', 'Phần Mềm Auto', 'man'),
(2, 'phanmemmobile', 'Phần Mềm Mobile', 'essential'),
(3, 'phanmempc', 'Phần Mềm Pc', 'prices');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameProduct` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `price` text NOT NULL,
  `chitiet` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `image` text NOT NULL,
  `sale` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `lienket` text NOT NULL,
  `danhmuc` text NOT NULL,
  `giagoc` text NOT NULL,
  `meta` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `meta_detail` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `filter` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nameProduct`, `price`, `chitiet`, `image`, `sale`, `lienket`, `danhmuc`, `giagoc`, `meta`, `meta_detail`, `filter`) VALUES
(40, 'ÁO KHOÁC & ÁO BLAZER', '55555', '<p>&Aacute;O KHO&Aacute;C &amp; &Aacute;O BLAZER</p>\r\n', 'http://localhost/shopquanao/admin/pages/post/uploads/3411302712_2_6_1.jpg', 'sale', 'quang-ne', 'ao-lanh', '77777', '<p>&aacute;o ấm &aacute;o lạnh</p>\r\n', '<p>ÁO KHOÁC & ÁO BLAZER</p>', ''),
(41, 'ÁO KHOÁC PHAO NAM BOMBER TRẺ TRUNG CÁ TÍNH CHẦN BÔNG 3 LỚP CỰC ẤM Zenko MEN JK 068', '119000', '<p>&Aacute;O KHO&Aacute;C PHAO NAM BOMBER TRẺ TRUNG C&Aacute; T&Iacute;NH CHẦN B&Ocirc;NG 3 LỚP CỰC ẤM Zenko MEN JK 068</p>\r\n', 'http://localhost/shopquanao/admin/pages/post/uploads/vn-11134207-7r98o-lmjqq5yx6jtrb3.jpg', 'new', 'quang-ne', 'san-pham', '120000', 'áo ấm áo lạnh', '<p>&Aacute;O KHO&Aacute;C PHAO NAM BOMBER TRẺ TRUNG C&Aacute; T&Iacute;NH CHẦN B&Ocirc;NG 3 LỚP CỰC ẤM Zenko MEN JK 068</p>\r\n', ''),
(42, 'Áo khoác bomber nam teddy dạ thêu sọc da trắng hai vai bo chun lót gió dày dặn phong cách đường phố - thoitrangnamdt M03', '134000', '<p>&Aacute;o kho&aacute;c bomber nam teddy dạ th&ecirc;u sọc da trắng hai vai bo chun l&oacute;t gi&oacute; d&agrave;y dặn phong c&aacute;ch đường phố - thoitrangnamdt M03</p>\r\n', 'http://localhost/shopquanao/admin/pages/post/uploads/vn-11134207-7r98o-llydpwz6c0ynd8.jpg', 'sale', 'ao-khoac-bomber-nam-teddy-da-theu-soc-da-trang-hai-vai-bo-chun-lot-gio-day-dan-phong-cach-duong-pho-thoitrangnamdt-m03', 'san-pham', '134000', 'Áo khoác bomber ', '<p>&Aacute;o kho&aacute;c bomber nam teddy dạ th&ecirc;u sọc da trắng hai vai bo chun l&oacute;t gi&oacute; d&agrave;y dặn phong c&aacute;ch đường phố - thoitrangnamdt M03</p>\r\n', ''),
(43, 'Áo khoác bomber nam teddy dạ thêu sọc da trắng hai vai bo chun lót gió dày dặn phong cách đường phố - thoitrangnamdt M03', '134000', '', 'http://localhost/shopquanao/admin/pages/post/uploads/vn-11134207-7r98o-lmjqq5yx6jtrb3.jpg', 'new', 'ao-khoac-bomber-nam-teddy-da-theu-soc-da-trang-hai-vai-bo-chun-lot-gio-day-dan-phong-cach-duong-pho-thoitrangnamdt-m03', 'san-pham', '134000', 'Áo khoác bomber ', '<p>&Aacute;o kho&aacute;c bomber nam teddy dạ th&ecirc;u sọc da trắng hai vai bo chun l&oacute;t gi&oacute; d&agrave;y dặn phong c&aacute;ch đường phố - thoitrangnamdt M03</p>\r\n', ''),
(44, 'Áo cộc tay nam, áo phông nam tay ngắn cổ tròn Unisex chất thun cotton 4 chiều mềm mại', '59000', '<p>&Aacute;o cộc tay nam, &aacute;o ph&ocirc;ng nam tay ngắn cổ tr&ograve;n Unisex chất thun cotton 4 chiều mềm mại</p>\r\n', 'http://localhost/shopquanao/admin/pages/post/uploads/c9b5ef76da1c5b59654bf9aa93c8a324.jpg', 'new', 'ao-khoac-bomber-nam-teddy-da-theu-soc-da-trang-hai-vai-bo-chun-lot-gio-day-dan-phong-cach-duong-pho-thoitrangnamdt-m03', 'san-pham', '60000', 'aothun ', '<p>&Aacute;o cộc tay nam, &aacute;o ph&ocirc;ng nam tay ngắn cổ tr&ograve;n Unisex chất thun cotton 4 chiều mềm mại</p>\r\n', ''),
(45, 'Áo thun Lót Nam Trắng Đẹp Cổ Tròn, Áo Phông Nam Dáng Rộng Cotton cộc tay trơn kiểu bộ đội dệt kim đông xuân', '59000', '<p>&Aacute;o thun L&oacute;t Nam Trắng Đẹp Cổ Tr&ograve;n, &Aacute;o Ph&ocirc;ng Nam D&aacute;ng Rộng Cotton cộc tay trơn kiểu bộ đội dệt kim đ&ocirc;ng xu&acirc;n</p>\r\n', 'http://localhost/shopquanao/admin/pages/post/uploads/71e2a25249233cf880a2053a198a3d34.jpg', 'new', 'ao-khoac-bomber-nam-teddy-da-theu-soc-da-trang-hai-vai-bo-chun-lot-gio-day-dan-phong-cach-duong-pho-thoitrangnamdt-m03', 'san-pham', '60000', 'aothun ', '<p>&Aacute;o thun L&oacute;t Nam Trắng Đẹp Cổ Tr&ograve;n, &Aacute;o Ph&ocirc;ng Nam D&aacute;ng Rộng Cotton cộc tay trơn kiểu bộ đội dệt kim đ&ocirc;ng xu&acirc;n</p>\r\n', ''),
(46, 'Set Bộ Nỉ Thể Thao NEWYORK Logo Nổi Fom Rộng Sành Điệu, Chất Liệu Nỉ Ngoại Dày Dặn Mềm Mịn Co Dãn Nhẹ', '189000', '<p>Set Bộ Nỉ Thể Thao NEWYORK Logo Nổi Fom Rộng S&agrave;nh Điệu, Chất Liệu Nỉ Ngoại D&agrave;y Dặn Mềm Mịn Co D&atilde;n Nhẹ</p>\r\n', 'http://localhost/shopquanao/admin/pages/post/uploads/vn-11134207-7qukw-li3bozdqbg0i5c.jpg', 'new', 'set-bo-ni-the-thao-newyork-logo-noi-fom-rong-sanh-dieu-chat-lieu-ni-ngoai-day-dan-mem-min-co-dan-nhe', 'san-pham', '190000', 'đồ bộ', '<p>Set Bộ Nỉ Thể Thao NEWYORK Logo Nổi Fom Rộng S&agrave;nh Điệu, Chất Liệu Nỉ Ngoại D&agrave;y Dặn Mềm Mịn Co D&atilde;n Nhẹ</p>\r\n', ''),
(47, 'ÁO KHOÁC PHAO NAM BOMBER TRẺ TRUNG CÁ TÍNH CHẦN BÔNG 3 LỚP CỰC ẤM Zenko MEN JK 068', '119000', '<p>&Aacute;O KHO&Aacute;C PHAO NAM BOMBER TRẺ TRUNG C&Aacute; T&Iacute;NH CHẦN B&Ocirc;NG 3 LỚP CỰC ẤM Zenko MEN JK 068</p>\r\n', 'http://localhost/shopquanao/admin/pages/post/uploads/vn-11134207-7r98o-lmjqq5yx6jtrb3.jpg', 'new', 'ao-khoac-phao-nam-bomber-tre-trung-ca-tinh-chan-bong-3-lop-cuc-am-zenko-men-jk-068', 'san-pham', '119000', 'áo ấm áo lạnh', '<p>&Aacute;O KHO&Aacute;C PHAO NAM BOMBER TRẺ TRUNG C&Aacute; T&Iacute;NH CHẦN B&Ocirc;NG 3 LỚP CỰC ẤM Zenko MEN JK 068</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_general_ci NOT NULL,
  `icon` text COLLATE utf8mb4_general_ci NOT NULL,
  `phone` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `footer` text COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `about` text COLLATE utf8mb4_general_ci NOT NULL,
  `logo` text COLLATE utf8mb4_general_ci NOT NULL,
  `timebusiness` text COLLATE utf8mb4_general_ci NOT NULL,
  `keywords` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `linkfb` text COLLATE utf8mb4_general_ci NOT NULL,
  `js` text COLLATE utf8mb4_general_ci NOT NULL,
  `domain` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `icon`, `phone`, `email`, `address`, `footer`, `content`, `about`, `logo`, `timebusiness`, `keywords`, `linkfb`, `js`, `domain`) VALUES
(1, 'Shop Bán Đồ ', 'http://localhost/shopquanao/admin/pages/settings/uploads/c9b5ef76da1c5b59654bf9aa93c8a324.jpg', '+84335086156', 'quangnguyen512002@gmail.com', 'Thành Phố Hồ Chí Minh', '', '', '', 'http://localhost/shopquanao/admin/pages/settings/uploads/vn-11134207-7qukw-li3bozdqbg0i5c.jpg', '', 'thẻ', 'j', '', 'http://localhost/shopquanao');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

DROP TABLE IF EXISTS `tintuc`;
CREATE TABLE IF NOT EXISTS `tintuc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `chitiet` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `date` text NOT NULL,
  `image` text NOT NULL,
  `lienket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phanquyen` text NOT NULL,
  `money` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=648 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phanquyen`, `money`) VALUES
(1, 'Ngô Thành Thông', 'hotro.tqnbsoftware@gmail.com', 'Ngothanhthongcode03122k2', '99', '15661'),
(645, 'Quang', 'admin@gmail.com', 'admin', '99', ''),
(646, 'dhrthjyrjy', 'admin1@gmail.com', 'admin1', '0', ''),
(647, 'Quang', 'admin22@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
