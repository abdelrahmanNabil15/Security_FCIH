-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 05:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedid` int(11) NOT NULL,
  `feedback` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedid`, `feedback`) VALUES
(26, 'ilkujythrgetrytuyxculv;hkljkhjgj'),
(28, 'afergthyjukl;jhigkufjydhtsrtews'),
(29, 'WDEFRGTHYJUKILO;P'),
(30, 'YJDKFFJKHJGHGFDRTYFUGIHL;JLKJ'),
(35, 'aaaaaad'),
(36, 'sava'),
(37, 'sava'),
(38, 'sava'),
(39, 'sava'),
(40, 'sava'),
(41, 'sava'),
(42, 'sava'),
(43, 'sava'),
(44, 'sava'),
(45, 'sava'),
(46, 'hwo da sobbauybv'),
(47, 'rnarra'),
(48, 'reg w iy; 43 qhjr qeuu re gi  5qieurohgb'),
(49, 'athf f  arj ar b vauj  ,mjb rv vvwr wwm grw g vrgw rbre w g rqwwbr e wwy rybh b wvryycwbyr rbe wy chrv ew kvr vewh bs'),
(50, 'hfxjgf  cg trfcvbhv tv v ygyg v fyvhg hv tybvb fgcyt v tyg vb rvg hv ytcf'),
(51, 'mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmnnnnnnnnnnnnnnnnnnnnnnnnn');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `review` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `review`) VALUES
(1, 'review'),
(2, 'review'),
(3, 'review'),
(4, 'review'),
(5, 'review'),
(6, 'review'),
(7, 'review'),
(8, 'review'),
(9, 'review'),
(10, 'review'),
(11, 'review'),
(12, 'review'),
(13, 'review'),
(14, 'review'),
(15, 'review'),
(16, 'review'),
(17, 'review'),
(18, 'review'),
(19, 'review'),
(20, 'review'),
(21, 'review'),
(22, 'review'),
(23, 'review'),
(24, 'review'),
(25, 'review');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sel_id` int(11) NOT NULL,
  `add_in` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sel_id`, `add_in`) VALUES
(1, 'Samsung'),
(2, 'Nokia'),
(3, 'Iphone'),
(4, 'Canon'),
(5, 'Accer'),
(6, 'fcdtyv dwdciyc edteg chvtb h yv vte   egycv t eb bvdvtr dvdc hgvtvv vgvh reygdcbyubj d'),
(7, 'sony');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `lavel` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `lavel`) VALUES
(1, 'Abdelrahman Nabil', 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Toys, Kids &amp; Babies'),
(15, 'Beauty &amp; Healthcare'),
(16, 'Home Decor &amp; Kitchen'),
(18, 'Jewellery'),
(19, 'Footwear'),
(20, 'Sports &amp; Fitness'),
(21, 'Software'),
(22, 'Accessories'),
(23, 'Laptop'),
(24, 'Desktop'),
(25, 'Mobile Phones');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(4, 2, 18, 'fefASD', 100201.00, 'upload/b8850ac63f.jpg'),
(5, 2, 10, 'Camera', 550.00, 'upload/c769967566.jpg'),
(6, 5, 21, 'Ramdan', 1350.00, 'upload/520f6f3a96.jpg'),
(7, 5, 19, 'abdo', 1350.00, 'upload/481964a23a.jpg'),
(8, 6, 37, '3mr 7a7a', 1350.00, 'upload/3fd45a1de5.jpg'),
(9, 7, 34, 'stggr', 5.45, 'upload/2d21405273.jpg'),
(10, 7, 28, 'dj 3mr 7a7a', 0.00, 'upload/7c6ef8ce38.jpg'),
(11, 11, 21, 'Ramdan', 1350.00, 'upload/520f6f3a96.jpg'),
(12, 11, 37, '3mr 7a7a', 1350.00, 'upload/3fd45a1de5.jpg'),
(13, 18, 53, 'iPhone 11 With FaceTime', 14999.00, 'upload/2c2e094391.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `name`, `phone`, `email`, `pass`) VALUES
(18, 'admin', '0201229009256', 'test@gmail.com', 'hJrVILu6rwXCAW/HPojs7Q=='),
(19, 'Abdelrahman nabil', '0124584396', 'elaslam@gmail.com', 'MaOklzOieNAKNxrpXrFhhA==');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `sel_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `sel_id`, `body`, `price`, `image`) VALUES
(41, 'PlayStation 5 Disc Version Console', 24, 7, '&lt;p&gt;Experience lightning-fast loading with an ultra-high-speed SSD, deeper immersion with support harness the power of a custom CPU, GPU, and SSD with integrated i/oThe ps5 console is compatible with 8k displays through HDMI 2.1 supportWith an HDR tv, supported ps5 games display an unbelievably vibrant and lifelike range of coloursEnjoy smooth and fluid high-frame-rate gameplay at up to 120fps for compatible games color&amp;nbsp;Name :White&amp;nbsp;&amp;nbsp;Grade:New&amp;nbsp;&amp;nbsp;Model Name:PS5&lt;/p&gt;\r\n&lt;p&gt;Type of Console Software :&lt;span&gt;PlayStation 5 (PS5)&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;br /&gt;&lt;br /&gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 18999, 'upload/d209175246.jpg'),
(45, 'AirPods With Charging Case White', 22, 3, 'Highlights\r\nAirPods deliver an unparalleled wireless headphone experience\r\nPut them in your ears and they connect immediately, immersing you in rich, high-quality sound\r\nThey can sense when they’re in your ears and pause when you take them out\r\nTalking to your favourite personal assistant is easier than ever\r\nOptical sensors and motion accelerometers work together to automatically controlling the audio experience\r\nOverview\r\nMore magical than ever.\r\nNow with more talk time, AirPods deliver an unparalleled wireless headphone experience. Simply take them out and they’re ready to use with all your devices. Put them in your ears and they connect immediately, immersing you in rich, high-quality sound. Just like magic.\r\n\r\nWireless to the fullest.\r\nAfter a simple one-tap setup, AirPods are automatically on and always connected. Using them is just as easy. They sense when they’re in your ears and pause when you take them out. And the AirPods experience is just as amazing whether you’re using them with your iPhone, Apple Watch, iPad, or Mac.\r\n\r\nPerformance you’ll want to hear.\r\nPowered by the all-new Apple H1 headphone chip, AirPods deliver a faster and more stable wireless connection to your devices — up to 2x faster when switching between active devices, and a 1.5x faster connection time for phone calls. The H1 chip also delivers up to 30 percent lower gaming latency. So whether you’re playing games, listening to music, or enjoying podcasts, you’ll experience higher-quality sound.\r\n\r\nThe power of 24?hour battery life.\r\nAirPods deliver an industry-leading 5 hours of listening time — and now up to 3 hours of talk time — all on one charge. And they’re made to keep up with you, thanks to a charging case that holds multiple charges for more than 24 hours of listening time. Need a quick charge? Just put AirPods back in the case for 15 minutes to get up to 3 hours of listening time and 2 hours of talk time. To check the battery, simply hold the AirPods next to your iPhone.\r\nSpecifications', 2499, 'upload/6a65358844.jpg'),
(46, 'Legion Y540-15IRH Gaming Laptop', 23, 5, 'Core i7 Processor/8GB RAM/1TB HDD+512GB SSD Hybride Drive/4GB NVIDIA GeForce GTX 1650 Graphic Card Black\r\n\r\nEquipped with Intel generation \r\nprocessor for optimum performance\r\nLarge storage option allows you to store all your files and media easily\r\nSecure Enclave coprocessor provides the foundation for secure boot and storage capabilities\r\nPowerful enough for your busiest days\r\nFosters the latest operating system that opens a host of content\r\nOverview\r\nProcessor Speed (GHz) : 2.6 GHz Keyboard Languages : Backlit KB Inputs and Outputs: 1 x USB 3.1 Type-C, 3 x USB 3.1 Type-A, 1 x Mini DisplayPort 1.4, 1 x HDMI 2.0, 1 x Audio combo jack, 1 x RJ-45 Audio: Harman speakers with Dolby Atmos for Gaming Camera: 720p HD Camera with Array Microphone LAN: 10/100/1000M Gigabit Ethernet Bluetooth 4.1 2 x 2 Wi-Fi 802.11 ac Battery: 3 Cell Li-Polymer Internal Battery, 57Wh AC Adapter: 230W AC Adapter', 32499, 'upload/29de0a31d6.jpg'),
(47, 'USB-C 20W Power Adapter 2inch White', 22, 3, 'Offers fast and efficient charging at home, in the office or on the go\r\nYou can also pair it with iPhone 8 or later to take advantage of the fast-charging feature\r\nPower adapter is compatible with any USB?c-enabled device\r\nCan be paired with the ipad pro and ipad air for optimal charging performance', 799, 'upload/deff3fbf47.jpeg'),
(48, 'Protective Case Cover For Apple iPhone 11', 22, 3, 'Fits snugly over the volume buttons, side button, and curves of your device without adding bulk\r\nSoft microfiber lining on the inside helps protect your iPhone\r\nOn the outside, the silky, soft-touch finish of the silicone exterior feels great in your hand\r\nYou can keep it on all the time, even when you’re charging wirelessly', 79, 'upload/b92dde81ae.jpg'),
(49, 'Mi 10T Pro Dual Sim Cosmic Black', 23, 4, 'Mi 10T Pro Dual Sim Cosmic Black 8GB RAM 256GB 5G With Xiaomi Mi Band 5\r\nFlaunts a dual rear camera with LED flash that helps capture flawless shots in low light conditions\r\nHigh capacity battery powers the device for prolonged hours on a single charge\r\nDecked with an exquisite camera that clicks flawless shots\r\nProfound RAM assures immense multitasking\r\nGift Colour May Vary', 25988, 'upload/57083313dc.jpg'),
(50, 'iPhone 12 Pro Max With Facetime', 22, 3, 'iPhone 12 Pro With Facetime Dual Sim 128GB Pacific Blue 5G - HK Specs\r\nA14 bionic is the fastest chip in a smartphone with iOS 14.1, upgradable to iOS 14.2\r\nOLED delivers brighter brights, darker blacks and higher resolution for everything you look at\r\nDeep fusion, in mid to low light, analyses multiple exposures to maximise detail\r\nHas a display resolution of 2778x1284 with HDR\r\nFacetime is available on the product &amp; would be accessible in regions where facetime is permitted by telecom operators', 26999, 'upload/ee2346894d.jpg'),
(51, 'Galaxy Note20 Dual SIM Mystic', 25, 2, 'Galaxy Note20 Dual SIM Mystic Bronze 8GB RAM 256GB 4G LTE - International Version\r\nMinimal design features a metal body elevated by exquisite details and transcendent colors\r\nMost vivid and brightest display in a smartphone delivers 1500 nits for true to life colour\r\nTurn notes into text then text into powerpoint with incredible ease\r\nWith a tap of the s pen, your handwriting corrects itself if you’re writing at an angle\r\nIntelligent processor, cooling system and responsive 120hz display puts gaming on a new level', 14850, 'upload/17826f6fe9.jpg'),
(52, 'Mi 10T Dual Sim Cosmic', 25, 1, 'Mi 10T Pro Dual Sim Cosmic Black 8GB RAM 256GB 5G With Xiaomi Mi Band 5\r\nFlaunts a dual rear camera with LED flash that helps capture flawless shots in low light conditions\r\nHigh capacity battery powers the device for prolonged hours on a single charge\r\nDecked with an exquisite camera that clicks flawless shots\r\nProfound RAM assures immense multitasking', 22222, 'upload/910371dcbf.jpg'),
(53, 'iPhone 11 With FaceTime', 25, 3, 'iPhone 11 With FaceTime White 128GB 4G LTE - Egypt Specs\r\niOS 13 OS ensures user-friendly interface along with desired customizations\r\nFlaunts a dual rear camera with LED flash that helps capture flawless shots in low light conditions\r\nGigabit-class LTE and Wi-Fi 6 allow for even faster download speeds\r\nComes with Face ID, the most secure facial authentication in a smartphone, gets up to 30 percent faster and easier to use with improved performance at varying distances and support for more angles\r\nSpatial audio provides an immersive surround sound experience', 14999, 'upload/2c2e094391.jpg'),
(54, 'iPhone 11 With FaceTime', 25, 0, 'iPhone 11 With FaceTime White 128GB 4G LTE - Egypt Specs\r\niOS 13 OS ensures user-friendly interface along with desired customizations\r\nFlaunts a dual rear camera with LED flash that helps capture flawless shots in low light conditions\r\nGigabit-class LTE and Wi-Fi 6 allow for even faster download speeds\r\nComes with Face ID, the most secure facial authentication in a smartphone, gets up to 30 percent faster and easier to use with improved performance at varying distances and support for more angles\r\nSpatial audio provides an immersive surround sound experience', 14999, 'upload/f5e2e9c1ab.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sel_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
