-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2020 lúc 07:48 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hotel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id_bill` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_arrival` date NOT NULL,
  `date_out` date NOT NULL,
  `id_room_service` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `guest`
--

INSERT INTO `guest` (`id`, `username`, `email`, `password`, `role`, `is_deleted`) VALUES
(1, 'huenguyen', 'tinviet.tk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(2, 'admin123', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(3, 'hoa123', 'hoanguyen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 0),
(4, 'mainguyen', 'mainguyen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(5, 'OanhNguyen', 'nguyenoanh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(6, 'LanNguyen', 'nguyenlan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(7, 'MyNguyen', 'nguyenmy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `confirmation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `price`, `adults`, `children`, `category_id`, `confirmation`, `is_deleted`, `thumb`) VALUES
(4, 'Phòng 205', 168000, 6, 2, 4, 'Sông Son rộng chừng 35-40 mét, nước xanh ngắt, trong thấu đáy, nhìn rõ cả những đàn cá đang bơi. Nước thì xanh như màu xanh đồng, nhưng lại gọi là sông Son vì vào mùa mưa, nước mưa bào mòn đất đá ở các triền núi đổ xuống làm nước sông đỏ như màu gạch son.', 0, 'uploads/11_1575164912.jpg'),
(5, 'Phòng 201', 140000, 3, 4, 5, 'Sông Son rộng chừng 35-40 mét, nước xanh ngắt, trong thấu đáy, nhìn rõ cả những đàn cá đang bơi. Nước thì xanh như màu xanh đồng, nhưng lại gọi là sông Son vì vào mùa mưa, nước mưa bào mòn đất đá ở các triền núi đổ xuống làm nước sông đỏ như màu gạch son.', 0, 'uploads/chausondanvien_1575185033.jpg'),
(6, 'Phòng 202', 240000, 5, 1, 2, 'Sông Son rộng chừng 35-40 mét, nước xanh ngắt, trong thấu đáy, nhìn rõ cả những đàn cá đang bơi. Nước thì xanh như màu xanh đồng, nhưng lại gọi là sông Son vì vào mùa mưa, nước mưa bào mòn đất đá ở các triền núi đổ xuống làm nước sông đỏ như màu gạch son.', 0, 'uploads/7_1575185043.jpg'),
(7, 'Phòng 203', 340000, 3, 2, 4, 'Sông Son rộng chừng 35-40 mét, nước xanh ngắt, trong thấu đáy, nhìn rõ cả những đàn cá đang bơi. Nước thì xanh như màu xanh đồng, nhưng lại gọi là sông Son vì vào mùa mưa, nước mưa bào mòn đất đá ở các triền núi đổ xuống làm nước sông đỏ như màu gạch son.', 0, 'uploads/Superior_Twin_1_1575185122.jpg'),
(8, 'Phòng 204', 128000, 1, 3, 3, 'Sông Son rộng chừng 35-40 mét, nước xanh ngắt, trong thấu đáy, nhìn rõ cả những đàn cá đang bơi. Nước thì xanh như màu xanh đồng, nhưng lại gọi là sông Son vì vào mùa mưa, nước mưa bào mòn đất đá ở các triền núi đổ xuống làm nước sông đỏ như màu gạch son.', 0, 'uploads/Spa_8_1575185208.jpg'),
(9, 'Phòng 206', 140000, 8, 5, 1, 'Sông Son rộng chừng 35-40 mét, nước xanh ngắt, trong thấu đáy, nhìn rõ cả những đàn cá đang bơi. Nước thì xanh như màu xanh đồng, nhưng lại gọi là sông Son vì vào mùa mưa, nước mưa bào mòn đất đá ở các triền núi đổ xuống làm nước sông đỏ như màu gạch son.', 0, 'uploads/chausondanvien_1575185290.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_category`
--

CREATE TABLE `room_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `room_category`
--

INSERT INTO `room_category` (`category_id`, `category_name`, `thumb`, `description`) VALUES
(1, 'Superior', 'uploads/16_1576207949.jpg', 'Phòng Superior có diện tích 28m2, bao gồm 42 phòng có 01 giường (1.8m x 2.0m) và 25 phòng có 2 giường nhỏ (1.2m x 2.2m / giường). Tất cả các phòng Superior có cửa sổ hướng núi / vườn / cánh đồng và được trang trí ấm áp.\r\n'),
(2, 'Deluxe', 'uploads/11_1575164912.jpg', 'Phòng Deluxe có diện tích 32m2, bao gồm 06 phòng có 01 giường (1.8m x 2.0m) và 06 phòng có 2 giường nhỏ (1.2m x 2.2m / giường). Tất cả các phòng Deluxe có cửa sổ hướng núi / vườn / cánh đồng và được trang trí bằng gỗ tự nhiên và đá cẩm thạch tinh tế.'),
(3, 'Premier Executive', 'uploads/11_1575164912.jpg', 'Phòng Premier Executive có diện tích 38m2, bao gồm 07 phòng có 01 giường (1.8m x 2.0m) và 10 phòng có 2 giường nhỏ (1.2m x 2.2m / giường). Phòng có cửa sổ hướng tầm nhìn ra dãy núi tuyệt đẹp và cánh đồng lúa thơm ngát. Đây là lựa chọn hoàn hảo cho một kỳ '),
(4, 'Fine Art Luxury Suite', 'uploads/11_1575164912.jpg', 'Phòng Suite có diện tích 85m2, bao gồm 02 phòng có 01 giường (1.8m x 2.0m) và phòng tiếp khách. Phòng có ban công hướng núi và cánh đồng lúa. Bên cạnh đó, phòng được trang trí mỹ nghệ tinh xảo kèm những bức tranh thêu tay của những người thợ thêu dày dặn '),
(5, 'Extensive Family', 'uploads/16_1575958823.jpg', 'Phòng Extensive Family có diện tích 70 m2, là sự kết hợp của hai loại phòng Superior và Premier Executive có cửa phòng thông nhau. Phòng bao gồm 02 phòng ngủ có 01 giường (1.8m x 2.0m) và 02 giường nhỏ (1.2m x 2.2m / giường), thích hợp cho sự thoải mái củ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_image`
--

CREATE TABLE `room_image` (
  `image_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image_description` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_service`
--

CREATE TABLE `room_service` (
  `id_room_service` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `service_description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `service_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_accounts`
--

CREATE TABLE `user_accounts` (
  `ac_id` int(11) NOT NULL,
  `ac_name` int(11) NOT NULL,
  `ac_email` int(11) NOT NULL,
  `ac_passwd` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id_bill`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Chỉ mục cho bảng `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Chỉ mục cho bảng `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `room_image`
--
ALTER TABLE `room_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Chỉ mục cho bảng `room_service`
--
ALTER TABLE `room_service`
  ADD PRIMARY KEY (`id_room_service`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Chỉ mục cho bảng `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`ac_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `room_category`
--
ALTER TABLE `room_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
