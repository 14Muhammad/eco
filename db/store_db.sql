-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 02:45 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'Apple'),
(4, 'Samsung'),
(5, 'Sony'),
(6, 'Oppo'),
(7, 'Lenovo'),
(8, 'Toshiba');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(6, '::1', 4),
(13, '::1', 1),
(15, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Cameras'),
(3, 'Mobiles'),
(4, 'Computers'),
(5, 'tablets'),
(6, 'iPads'),
(7, 'Watches');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(10) NOT NULL,
  `cust_ip` varchar(255) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_pass` varchar(100) NOT NULL,
  `cust_country` varchar(100) NOT NULL,
  `cust_city` varchar(100) NOT NULL,
  `cust_contact` varchar(100) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cust_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_ip`, `cust_name`, `cust_email`, `cust_pass`, `cust_country`, `cust_city`, `cust_contact`, `cust_address`, `cust_image`) VALUES
(5, '::1', 'Muhammad Ali', 'ali@ucp', '123', 'Pakistan', 'Lahore', '03314527994', 'Nargis Block, Allama Iqbal Town, Lahore', 'My Pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(100) NOT NULL,
  `pro_cat` int(100) NOT NULL,
  `pro_brand` int(100) NOT NULL,
  `pro_title` varchar(250) NOT NULL,
  `pro_price` int(100) NOT NULL,
  `pro_desc` varchar(3000) NOT NULL,
  `pro_image` varchar(300) NOT NULL,
  `pro_keywords` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_cat`, `pro_brand`, `pro_title`, `pro_price`, `pro_desc`, `pro_image`, `pro_keywords`) VALUES
(5, 4, 3, 'Apple iMAC', 245000, 'apply is very good system', 'apple-imac-mid-2010-27.jpg', 'apply, kidney, mac'),
(6, 4, 3, 'imac book big', 290000, 'big mac book', '71KyjhnQY4L._SY355_.jpg', 'mac book, apple'),
(7, 1, 2, 'Dell laptop new', 45000, 'its very new condition laptop', 'download.jpg', 'dell, new, 10/10'),
(8, 3, 6, 'oppo f1s', 25000, 'good one', 'QMobile-Noir-i8i-Techjuice.jpg', 'oppo, mobile'),
(12, 3, 4, 'Samsung Galaxy S9+', 99000, 'Network\r\nTechnology: GSM / HSPA / LTE / CDMA / EVDO\r\n2G Bands: GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2\r\n3G Bands: HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100\r\n4G Bands: LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 13(700), 17(700), 18(800), 19(800), 20(800), ', 'samsung1.jpg', 'Samsung Galaxy S9+ - 6.2\" - 6GB RAM - 128GB ROM - Lilac Purple'),
(13, 3, 4, 'Samsung J6', 24999, 'NETWORK\r\nTechnology GSM / HSPA / LTE\r\n2G bands GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2\r\n3G bands HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100\r\n4G bands LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 13(700), 17(700), 20(800), 28(700), 38(2600), 40(2300), 41(2500), 66(1700/2100)\r\nSpeed HSPA, LTE\r\nGPRS Yes\r\nEDGE Yes\r\nBODY\r\nDimensions 149.3 x 70.2 x 8.2 mm (5.88 x 2.76 x 0.32 in)\r\nWeight 154 g (5.43 oz)\r\nBuild Plastic body\r\nSIM Dual SIM (Nano-SIM, dual stand-by)\r\nDISPLAY\r\nType Super AMOLED capacitive touchscreen, 16M colors\r\nSize 5.6 inches, 79.6 cm2 (~75.9% screen-to-body ratio)\r\nResolution 720 x 1480 pixels, 18.5:9 ratio (~294 ppi density)\r\nMultitouch Yes\r\nPLATFORM\r\nOS Android 8.0 (Oreo)\r\nChipset Exynos 7870 Octa\r\nCPU Octa-core 1.6 GHz Cortex-A53\r\nGPU Mali-T830 MP1\r\nMEMORY\r\nCard slot microSD, up to 256 GB\r\nInternal 32 GB, 3 GB RAM\r\nCAMERA\r\nPrimary 13 MP (f/1.9, 28mm), autofocus, LED flash\r\nFeatures Geo-tagging, touch focus, face detection, panorama, HDR\r\nVideo 1080p@30fps\r\nSecondary 8 MP, f/1.9, LED flash\r\nSOUND\r\nAlert types Vibration; MP3, WAV ringtones\r\nLoudspeaker Yes\r\n3.5mm jack Yes\r\nCONNECTIVITY\r\nWLAN Wi-Fi 802.11 b/g/n, Wi-Fi Direct, hotspot\r\nBluetooth 4.2, A2DP, LE\r\nGPS Yes, with A-GPS, GLONASS, BDS\r\nRadio FM radio\r\nUSB microUSB 2.0\r\nFEATURES\r\nSensors Fingerprint (rear-mounted), accelerometer, proximity\r\nMessaging SMS(threaded view), MMS, Email, Push Email, IM\r\nBrowser HTML5\r\nMP4/H.264 player\r\nMP3/WAV/eAAC+/FLAC player\r\nPhoto/video editor\r\nDocument viewer\r\nBATTERY\r\nNon-removable Li-Ion 3000 mAh battery\r\nTalk time Up to 21 h (3G)\r\nMusic play Up to 76 h', 'samsung2.jpg', 'Samsung J6 - 5.6\" HD+ Full View Display - 3GB RAM - 32GB ROM - 13/8Mp Camera - Gold'),
(14, 1, 2, 'DELL Inspiron 3576', 55000, '<h1 style=\"box-sizing: border-box; font-family: Roboto, Helvetica, Arial, sans-serif; font-weight: 500; line-height: 1.1; margin: 0.67em 0px; font-size: 14px;\">Specifications:</h1>\r\n<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 8.5px; color: #606060; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 12px;\">\r\n<li style=\"box-sizing: border-box;\">Processor: 8th Generation Intel&reg; Core&trade; i5-8250U Processor (6MB Cache, up to 3.4 GHz)</li>\r\n<li style=\"box-sizing: border-box;\">Memory: 4GB DDR4, 2400MHz</li>\r\n<li style=\"box-sizing: border-box;\">Storage: 1TB 5400 rpm Hard Drive</li>\r\n<li style=\"box-sizing: border-box;\">Display: 15.6-inch FHD (1920 x1080) Anti-Glare LED-Backlit Display</li>\r\n<li style=\"box-sizing: border-box;\">Operating System: Ubuntu</li>\r\n<li style=\"box-sizing: border-box;\">Optical Drive: Built-in DVD-RW\r\n<h3 style=\"box-sizing: border-box; font-weight: 500; line-height: 1.1; margin-top: 17px; margin-bottom: 8.5px; font-size: 21px;\">Networking &amp; Communication:</h3>\r\n<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 8.5px;\">\r\n<li style=\"box-sizing: border-box;\">Wireless Connectivity: 802.11ac + Bluetooth 4.1; Dual Band 2.4&amp;5Ghz 1x1</li>\r\n<li style=\"box-sizing: border-box;\">Card Reader: 1 x SD Card Reader (SD, SDHC, SDXC)</li>\r\n<li style=\"box-sizing: border-box;\">Webcam: Integrated widescreen HD (720p) Webcam with Single Digital Microphone</li>\r\n</ul>\r\n<h3 style=\"box-sizing: border-box; font-weight: 500; line-height: 1.1; margin-top: 17px; margin-bottom: 8.5px; font-size: 21px;\">Graphics &amp; Chipset</h3>\r\n<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 8.5px;\">\r\n<li style=\"box-sizing: border-box;\">Graphic Card Discrete: AMD Radeon&trade; 520 Graphics with 2GB GDDR5</li>\r\n</ul>\r\n<h3 style=\"box-sizing: border-box; font-weight: 500; line-height: 1.1; margin-top: 17px; margin-bottom: 8.5px; font-size: 21px;\">Other Info:</h3>\r\n<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 8.5px;\">\r\n<li style=\"box-sizing: border-box;\">Audio Features: 2 tuned speakers with Waves MaxxAudio&reg; Pro / 1 combo headphone / microphone jack</li>\r\n<li style=\"box-sizing: border-box;\">Keyboard: Standard full size spill-resistant keyboard</li>\r\n<li style=\"box-sizing: border-box;\">Dimensions: Height: 23.65 mm (0.93\") x Width: 380 mm (14.96\") x Depth: 260.3 mm (10.25\")</li>\r\n<li style=\"box-sizing: border-box;\">Power: 40WHr (4 Cell) battery (removable) / 45 Watt AC Adapter (w/standard graphics) / 65 Watt AC Adapter (w/discrete graphics option)</li>\r\n<li style=\"box-sizing: border-box;\">Security Management: 1 x Kensington Lock</li>\r\n</ul>\r\n</li>\r\n</ul>', 'dell1.jpg', 'DELL Inspiron 3576 - 15.6\" - 8th Gen. Ci5-8250U - 4GB RAM 1TB HDD - 2GB AMD Radeon - DOS'),
(15, 1, 8, 'Toshiba LAPTOP I3', 15000, '<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; color: #606060; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 12px;\">\r\n<li style=\"box-sizing: border-box;\">4 GB Ram</li>\r\n<li style=\"box-sizing: border-box;\">250 GB HardDisk</li>\r\n<li style=\"box-sizing: border-box;\">HIgh Graphics 15.6 Inch Led</li>\r\n<li style=\"box-sizing: border-box;\">Intel Built in Graphic Card</li>\r\n<li style=\"box-sizing: border-box;\">Intel Core i3 Processor</li>\r\n<li style=\"box-sizing: border-box;\">Plain Box</li>\r\n</ul>', 'toshiba.jpg', 'Toshiba LAPTOP I3 1st GENERATION HIGH GRAPHICS GAMING BRANDED LAPTOP NOTEBOOK- 15.6 HD LED REFURBISHED LAPTOP'),
(16, 2, 5, 'Sony Alpha a58', 59000, '<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; color: #606060; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 12px;\">\r\n<li style=\"box-sizing: border-box;\">4 GB Ram</li>\r\n<li style=\"box-sizing: border-box;\">250 GB HardDisk</li>\r\n<li style=\"box-sizing: border-box;\">HIgh Graphics 15.6 Inch Led</li>\r\n<li style=\"box-sizing: border-box;\">Intel Built in Graphic Card</li>\r\n<li style=\"box-sizing: border-box;\">Intel Core i3 Processor</li>\r\n<li style=\"box-sizing: border-box;\">Plain Box</li>\r\n</ul>', 'song1.jpg', 'Sony Alpha a58 - DSLR Camera with 18-55mm Lens - Black (Brand Warranty)'),
(17, 7, 4, 'Samsung Original Gear S3', 2900, '<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 8.5px; color: #606060; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 12px;\">\r\n<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Brand New Sealed Box current manufacturing</span></li>\r\n<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Original Samsung Product</span></li>\r\n<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Compatible with Android and Iphone</span></li>\r\n<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bold;\">768 MB Ram 4 GB rom with Tizen OS</span></li>\r\n<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bold;\">SMS, email, apps and incoming call notifications</span></li>\r\n<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bold;\">GPS, NFC, BT version 4.2</span></li>\r\n<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Accelerometer, Barometer, Gyro Sensor, HR Sensor, Light Sensor</span></li>\r\n<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bold;\">1.3\" 360x360 Pixels Super AMOLED Display</span></li>\r\n</ul>\r\n<p><span style=\"box-sizing: border-box; font-weight: bold; font-size: 12px; color: #222222; font-family: Helvetica, Arial, sans-serif;\">Top features:</span><br style=\"box-sizing: border-box; font-size: 12px; color: #222222; font-family: Helvetica, Arial, sans-serif;\" /><br style=\"box-sizing: border-box; font-size: 12px; color: #222222; font-family: Helvetica, Arial, sans-serif;\" /><span style=\"color: #606060; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 12px;\">- Always-on display gives the look of a traditional watch&nbsp;</span><br style=\"box-sizing: border-box; font-size: 12px; color: #222222; font-family: Helvetica, Arial, sans-serif;\" /><br style=\"box-sizing: border-box; font-size: 12px; color: #222222; font-family: Helvetica, Arial, sans-serif;\" /><span style=\"color: #606060; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 12px;\">- Turn the bezel to answer calls, adjust controls and open apps&nbsp;</span><br style=\"box-sizing: border-box; font-size: 12px; color: #222222; font-family: Helvetica, Arial, sans-serif;\" /><br style=\"box-sizing: border-box; font-size: 12px; color: #222222; font-family: Helvetica, Arial, sans-serif;\" /><span style=\"color: #606060; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 12px;\">- Make calls from your wrist for hands-free convenience&nbsp;</span><br style=\"box-sizing: border-box; font-size: 12px; color: #222222; font-family: Helvetica, Arial, sans-serif;\" /><br style=\"box-sizing: border-box; font-size: 12px; color: #222222; font-family: Helvetica, Arial, sans-serif;\" /><span style=\"color: #606060; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 12', 'samsung2 (2).jpg', 'Samsung Original Gear S3 Classic 46 MM 4GB Rom Box packed - Silver&Black');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
