-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 11:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biz_corner`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

CREATE TABLE `buyer_details` (
  `user_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `mobile_num` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_details`
--

INSERT INTO `buyer_details` (`user_id`, `name`, `email`, `password`, `address`, `zip_code`, `mobile_num`) VALUES
(1, 'Dilshan ', 'dilshan@gail.com', '123456', 'no 16 ,kandy', 21000, 2147483647),
(2, 'Bavantha', 'bavabntha', '123456', 'no 124/2', 51000, 773050254),
(3, 'Bavantha', 'bavabntha@gmail.com', '123456', 'no 124/2', 51000, 773050254);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`) VALUES
(0, 22),
(0, 18),
(1, 18),
(0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `c_icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `c_icon`) VALUES
(1, 'Mobile Accessories', ''),
(2, 'Tv home appliances', ''),
(3, 'Electronic Devices', ''),
(4, 'Electronic Accessories', ''),
(5, 'health and beauty', ''),
(6, 'Mens Fashion', ''),
(7, 'Womens Fashion', ''),
(8, 'watches and accessories', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(10) NOT NULL,
  `bname` varchar(20) NOT NULL,
  `fedbck` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `bname`, `fedbck`) VALUES
(1, 'Bavantha', 'If you are adding values for all the columns of the table, you do not need to specify the column names in the SQL query. However, make sure the order of the values is in the same order as the columns'),
(2, 'Bavantha', 'If you are adding values for all the columns of the table, you do not need to specify the column names in the SQL query. However, make sure the order of the values is in the same order as the columns');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_ID` int(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `pro_quantity` int(10) NOT NULL,
  `status_id` int(10) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `order_amount` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_ID`, `product_id`, `user_id`, `pro_quantity`, `status_id`, `payment`, `order_amount`, `order_date`) VALUES
(1, 14, 1, 1, 1, 'done', 2000, '2022-05-22 22:02:27'),
(2, 22, 1, 1, 3, 'paid', 100000, '2022-05-23 09:01:42'),
(3, 18, 1, 1, 1, 'paid', 35000, '2022-05-23 09:04:05'),
(4, 18, 3, 1, 1, 'paid', 35000, '2022-05-23 08:01:31'),
(5, 22, 1, 1, 2, 'paid', 100000, '2022-05-23 07:07:46'),
(6, 19, 1, 1, 2, 'paid', 5000, '2022-05-23 08:21:43'),
(7, 19, 1, 1, 2, 'paid', 5000, '2022-05-23 08:41:17'),
(8, 17, 1, 1, 2, 'paid', 21000, '2022-05-23 08:41:17'),
(9, 18, 1, 1, 2, 'paid', 35000, '2022-05-23 08:41:17'),
(10, 19, 1, 1, 3, 'paid', 5000, '2022-05-23 09:01:34'),
(11, 17, 1, 1, 2, 'paid', 21000, '2022-05-23 08:58:28'),
(12, 18, 1, 1, 2, 'paid', 35000, '2022-05-23 08:58:28'),
(13, 14, 3, 1, 2, 'paid', 2000, '2022-05-23 09:08:21'),
(14, 18, 3, 1, 2, 'paid', 35000, '2022-05-23 09:11:01'),
(15, 14, 3, 1, 2, 'paid', 2000, '2022-05-23 09:14:17'),
(16, 21, 3, 1, 2, 'paid', 120000, '2022-05-23 09:14:50'),
(17, 20, 3, 1, 2, 'paid', 1230, '2022-05-23 09:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `sts_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`sts_id`, `status`) VALUES
(1, 'delivered'),
(2, 'pending'),
(3, 'return'),
(4, 'inprogress');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `p_code` varchar(10) NOT NULL,
  `p_name` mediumtext NOT NULL,
  `p_price` float NOT NULL,
  `p_description` longtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `seller_ID` int(11) NOT NULL,
  `p_img1` varchar(50) NOT NULL,
  `p_img2` varchar(50) NOT NULL,
  `p_img3` varchar(50) NOT NULL,
  `p_quantity` int(10) NOT NULL,
  `p_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `p_code`, `p_name`, `p_price`, `p_description`, `category_id`, `seller_ID`, `p_img1`, `p_img2`, `p_img3`, `p_quantity`, `p_title`) VALUES
(14, 'TR0001', 'JBL TUNE  Headphones', 2000, 'The JBL Tune 510BT headphones let you stream powerful JBL Pure Bass sound with no strings attached. Easy to use, these headphones provide up to 40 hours of pure pleasure and an extra 2 hours of battery with just 5 minutes of power with the USB-C charging cable. And if a call comes in while you are watching a video on another device, the JBL Tune 510BT seamlessly switches to your mobile. Bluetooth 5.0 enabled and designed to be comfortable, the JBL Tune 510BT headphones also allow you to connect to Siri or Google without using your mobile device. Available in multiple fresh colors and foldable for easy portability, the JBL Tune 510BT headphones are a grab ‘n go solution that helps you to inject music into every aspect of your busy life', 1, 1, 'f1d1325c4318c222f6977458b7da178b.png', '6c6a0e7174d647b931cfa49c4576a109.png', 'f1d1325c4318c222f6977458b7da178b.png', 8, 'JBL TUNE 510BT Wireless On-Ear Headphones'),
(15, 'LA0002', 'Series 6 Smart Band ', 145, 'Compatible With Apple Watch Series 7 45mm: Apple Watch case equipped with tempered glass screen protector is tailored made for Apple Watch Series 7 45mm. Please check your smartwatch sizes before ordering.', 8, 1, 'g2.jpg', 'g3.jpg', 'g1.jpg', 14, 'Series 6 Smart Band Design Luxury Digital LED'),
(16, 'SP0001', ' CURREN Mens Watches', 1400, ' Paragraphs are the building blocks of papers. Many students define paragraphs in terms of length: a paragraph is a group of at least five sentences, a paragraph is half a page long, etc. In reality, though, the unity and coherence of ideas among sentences is what constitutes a paragraph. A paragraph is defined as “a group of sentences or a single sentence that forms a unit” (Lunsford and Connors 116)', 8, 1, 'Watch-PNG-Transparent-Image.png', 'wrist-watch-ogx.png', 'watches_PNG9885.png', 15, 'This is a knob on the outside of a watch case that sets the calendar and time. It also winds the wat'),
(17, 'TR0002', 'Samsung Galaxy Tab A7 ', 21000, 'Brings you a large storage for all your favourite videos, photos and games.With refined craftsmanship and exquisite coating•	Elegant look combined with curved edges offers a comfortable touch in your hands.•	Can enjoy the efficient life without frequent recharging\r\n', 1, 1, 'tab1.jfif', 'tab1.jfif', 'tab2.jfif', 8, 'Samsung Galaxy Tab A7 Samsung Galaxy Tab A7 '),
(18, 'TR0003', 'Apple iPhone 11', 35000, 'Model Name IPhone 11,Support for display of multiple languages and characters simultaneouslySupport for display of multiple languages and characters simultaneously Support for display of multiple languages and characters simultaneouslySupport for display of multiple languages and characters simultaneously Support for display of multiple languages and characters simultaneously', 1, 1, 'iphone11.jfif', 'iphone11 2.jfif', 'iphone11.jfif', 5, 'Apple iPhone 11 Apple iPhone 11'),
(19, 'TR0004', 'iPhone 7Plus Battery', 5000, 'Perfect replacement: Developed specially as replacement for batteryPerfect replacement: Developed specially as replacement for battery Perfect replacement: Developed specially as replacement for battery Perfect replacement: Developed specially as replacement for battery Perfect replacement: Developed specially as replacement for battery', 1, 1, 'battery1.jpg', 'battery2.jpg', 'battery3.jfif', 7, 'OEM Replacement Internal Battery For iPhone 7 Plus 5 2900mAh'),
(20, 'LA0003', 'Samsung Galaxy A12', 1230, 'All for an excellent value•	All for an excellent value•	All for an excellent value•	All for an excellent value•	All for an excellent value•	All for an excellent value•	All for an excellent value•	All for an excellent value•	All for an excellent value•	All for an excellent value•	All for an excellent value', 1, 1, 'phonecover1.jfif', 'phonecover2.jpg', 'phonecover2.jpg', 10, 'Samsung Galaxy A12 Shockproof Case - Shockproof Transparent Case'),
(21, 'LA0003', 'Samsung  LED TV ', 120000, 'Quantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDRQuantum HDR', 2, 1, 'QLED2.jfif', 'QLED1.jfif', 'QLED2.jfif', 9, 'Samsung 55 Inch QLED 4K Smart LED TV (2021) '),
(22, 'LA0004', ' Hisense mini refrigerator', 100000, ' Hisense mini refrigeratorHisense mini refrigeratorHisense mini refrigeratorHisense mini refrigeratorHisense mini refrigeratorHisense mini refrigeratorHisense mini refrigeratorHisense mini refrigeratorHisense mini refrigeratorHisense mini refrigeratorHisense mini refrigeratorHisense mini refrigerator', 2, 1, 'refrigerator.jfif', 'Refrigerator1.jfif', 'Refrigerator1.jfif', 8, '8'),
(23, 'LA00010', 'quality sunglasses', 1200, 'quality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglassesquality sunglasses', 6, 1, '20532663467cefe1336547c24c3e40db.jpg', '087ab4ee4859c6e13dd29b9c99fe3472.jpg', '67d1d4b1bf1ceac9e7a620a3641d2957.jpg', 10, 'Wayfarer A grade quality sunglasses for men and women unisex shades'),
(24, 'TR0004', 'sweat proof non-scratch', 500, 'Product size: 45 * 25 * 2mm/1.77*0.98*0.08\"\r\nQuantity: 1 pair\r\nMaterial: Fiber\r\nNano fiber, lightweight, thin, fine, strong and powerful;\r\nHigh sensitivity, clear and continuous touch screen response;', 1, 1, 'image (1).jpg', 'image.jpg', 'image (1).jpg', 10, 'PUBG game 2pcs finger sleeve finger cover breathable game controller sweat proof non-scratch'),
(25, 'LA00011', 'Wax Removal Kit Ear ', 145, 'Thick and thin, are available for different ear hole sizes of adults and children.\r\nSpecifications:Material: plasticPackage included:1 x LED Flashlight EarPickExtra Replacement Heads', 5, 1, '97de5012dd843b76c293db09b516a1be.jpg', '4b6c6050a22de49daf7b49177cb76977.png', '2ca619ebddf95faa5e97f1db523e3cd8.jpg', 10, 'Kids and Adults Ear Wax Removal Kit Ear Cleaning Tool For Flash Light Tool Safe'),
(26, 'TR0005', 'wall charger UK type ', 590, 'UK standard PD + QC3.0 fast charging combo with 20W power\r\n2 Ports of Plug (Type C, USB A)\r\nWhen used alone, Type-A support QC 3.0, and Type-C support 20W PD', 1, 1, 'download (2).jpg', 'download (1).jpg', 'download (1).jpg', 10, 'AWEI PD6 - 20W PD & QC3.0 Dual port Fast charging wall charger UK type with 5A Type-C Charging Cable');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_ID` int(20) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `contact_num` int(15) NOT NULL,
  `nic` int(15) NOT NULL,
  `district` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `store_name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_ID`, `Fname`, `Lname`, `email`, `pwd`, `contact_num`, `nic`, `district`, `province`, `store_name`, `address`, `reg_date`) VALUES
(1, 'dilshan', 'dilshan', 'malindusooriyaarachchi@gmail.c', 'Md773050254', 89955646, 2147483647, 'Polonnaruwa', 'North Central Provin', 'supersale', 'no17,habarana para,polonnaruwa', '2022-05-23 09:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `quantity` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `totalprice` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`quantity`, `product_id`, `price`, `totalprice`, `user_id`) VALUES
(1, 18, 35000, 35000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_details`
--
ALTER TABLE `buyer_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`sts_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `seller_ID` (`seller_ID`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_ID`);

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer_details`
--
ALTER TABLE `buyer_details`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `sts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `orderstatus` (`sts_id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `orderdetails_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `buyer_details` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`seller_ID`) REFERENCES `seller` (`seller_ID`);

--
-- Constraints for table `total`
--
ALTER TABLE `total`
  ADD CONSTRAINT `total_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
