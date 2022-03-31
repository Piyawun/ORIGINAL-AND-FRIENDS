-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 09:22 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_of`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(16, 28, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'Nike', 'nike'),
(2, 'Adidas', 'adidas'),
(3, 'Dior', 'dior'),
(4, 'Balenciaga', 'balenciaga'),
(5, 'Gucci', 'gucci');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(33, 2, 'Adidas NMD R1 V2 Gradient', '<p><strong>Availability : In Stock<br />\r\nColor: Blue<br />\r\nSize : 9</strong></p>\r\n', 'adidas-nmd-r1-v2-gradient', 4600, 'adidas-nmd-r1-v2-gradient.jpg', '2020-12-16', 5),
(34, 1, 'Air Jordan 4 Retro “Fire Red”', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: White&nbsp;</strong></p>\r\n\r\n<p><strong>Size : 10</strong></p>\r\n', 'air-jordan-4-retro-fire-red', 4550, 'air-jordan-4-retro-fire-red.jpg', '2020-12-17', 17),
(35, 4, 'Balenciaga Sneaker Triple S Black Red', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: black red</strong></p>\r\n\r\n<p><strong>Size : 8</strong></p>\r\n', 'balenciaga-sneaker-triple-s-black-red', 31000, 'balenciaga-sneaker-triple-s-black-red.jpg', '2020-12-16', 7),
(36, 3, 'Dior B23 Oblique Low Top Sneaker', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: White&nbsp;</strong></p>\r\n\r\n<p><strong>Size : 10</strong></p>\r\n', 'dior-b23-oblique-low-top-sneaker', 33500, 'dior-b23-oblique-low-top-sneaker.jpg', '2020-12-17', 1),
(37, 5, 'Women\'s Disney x Gucci Rhyton sneaker', '<p><strong>Women&#39;s</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: Mickey Mouse print</strong></p>\r\n\r\n<p><strong>Size : 8 9 10</strong></p>\r\n', 'women-s-disney-x-gucci-rhyton-sneaker', 26799, 'women-s-disney-x-gucci-rhyton-sneaker.jpg', '2020-12-17', 1),
(38, 1, 'air jordan 1 low court purple white', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: Purple</strong></p>\r\n\r\n<p><strong>Size :10</strong></p>\r\n', 'air-jordan-1-low-court-purple-white', 7990, 'air-jordan-1-low-court-purple-white.jpg', '2020-12-17', 1),
(39, 1, 'Nike Air Max 90 \"Halloween\"', '<p><strong>Brand : Nike</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: Black</strong></p>\r\n\r\n<p><strong>Size : 9</strong></p>\r\n', 'nike-air-max-90-halloween', 6990, 'nike-air-max-90-halloween.jpg', '0000-00-00', 0),
(40, 1, 'Jordan 1 Mid Banned (2020)', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: Red</strong></p>\r\n\r\n<p><strong>Size : 8</strong></p>\r\n', 'jordan-1-mid-banned-2020', 8990, 'jordan-1-mid-banned-2020.jpg', '0000-00-00', 0),
(41, 2, 'Adidas Yeezy Boost 350 V2 “Blue Tint”', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: Tint/Grey</strong></p>\r\n\r\n<p><strong>Size : 10.5</strong></p>\r\n', 'adidas-yeezy-boost-350-v2-blue-tint', 17500, 'adidas-yeezy-boost-350-v2-blue-tint.jpg', '0000-00-00', 0),
(42, 2, 'Adidas Yeezy 500 “Utility Black”', '<p><strong>Availability : In Stock<br />\r\nColor: black<br />\r\nSize : 9</strong></p>\r\n', 'adidas-yeezy-500-utility-black', 6000, 'adidas-yeezy-500-utility-black.jpg', '0000-00-00', 0),
(43, 1, 'OFF-WHITE x Air Jordan 1 Powder Blue (UNC)', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: white</strong></p>\r\n\r\n<p><strong>Size : 10</strong></p>\r\n', 'white-x-air-jordan-1-powder-blue-unc', 55000, 'white-x-air-jordan-1-powder-blue-unc.jpg', '0000-00-00', 0),
(44, 1, 'OFF WHITE X Nike Air Max 97', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: Grey</strong></p>\r\n\r\n<p><strong>Size : 8.5</strong></p>\r\n', 'white-x-nike-air-max-97', 4000, 'white-x-nike-air-max-97.jpg', '0000-00-00', 0),
(45, 1, 'NIKE JORDAN 1 HIGH OG JP “MIDNIGHT NAVY”', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: White</strong></p>\r\n\r\n<p><strong>Size : 10</strong></p>\r\n', 'nike-jordan-1-high-og-jp-midnight-navy', 9000, 'nike-jordan-1-high-og-jp-midnight-navy.jpg', '0000-00-00', 0),
(46, 1, 'NIKE AIR JORDAN 1 LOW “LIGHT SMOKE GREY”', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: grey</strong></p>\r\n\r\n<p><strong>Size : 10</strong></p>\r\n', 'nike-air-jordan-1-low-light-smoke-grey', 8990, 'nike-air-jordan-1-low-light-smoke-grey.jpg', '2020-12-17', 1),
(47, 5, 'Matelassé Chelsea boot', '<p><strong>Women&#39;s</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: black boot</strong></p>\r\n\r\n<p><strong>Size : 8</strong></p>\r\n', 'matelasse-chelsea-boot', 26000, 'matelasse-chelsea-boot.jpg', '0000-00-00', 0),
(48, 5, 'Ace embroidered sneaker', '<p><strong>Availability : In Stock<br />\r\nColor: white<br />\r\nSize : 8</strong></p>\r\n', 'ace-embroidered-sneaker', 24000, 'ace-embroidered-sneaker.jpg', '0000-00-00', 0),
(49, 5, 'GG Marmont mini matelassé shoulder bag', '<p><strong>Women&#39;s</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: Brown diagonal matelass&eacute; leather</strong></p>\r\n\r\n<p><strong>Mini size: 8.5&quot;W x 5&quot;H x 2.5&quot;D</strong></p>\r\n', 'gg-marmont-mini-matelasse-shoulder-bag', 59000, 'gg-marmont-mini-matelasse-shoulder-bag.jpg', '0000-00-00', 0),
(50, 5, 'Ophidia GG small backpack', '<p><strong>Women&#39;s</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: Green and red Web</strong></p>\r\n\r\n<p><strong>Small size: 8.5&quot;W x 11.5&quot;H x 6&quot;D</strong></p>\r\n', 'ophidia-gg-small-backpack', 54000, 'ophidia-gg-small-backpack.jpg', '0000-00-00', 0),
(51, 4, 'TRACK SNEAKER', '<p><strong>Women&#39;s</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: black</strong></p>\r\n\r\n<p><strong>Size : 8</strong></p>\r\n', 'track-sneaker', 29000, 'track-sneaker.jpg', '2020-12-17', 1),
(52, 4, 'SPEED SNEAKER', '<p><strong>Women&#39;s</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: black</strong></p>\r\n\r\n<p><strong>Size : 9</strong></p>\r\n', 'speed-sneaker', 23000, 'speed-sneaker.jpg', '0000-00-00', 0),
(53, 1, 'Nike Air Max Verona', '<p><strong>Women&#39;s</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: Light Orewood Brown</strong></p>\r\n\r\n<p><strong>Size : 8</strong></p>\r\n', 'nike-air-max-verona', 4000, 'nike-air-max-verona.jpg', '0000-00-00', 0),
(54, 3, 'j\'adior slingback pump', '<p><strong>6.5 cm comma heel</strong></p>\r\n\r\n<p><strong>Normal fit, please choose your regular shoe size</strong></p>\r\n\r\n<p><strong>Made in Italy</strong></p>\r\n\r\n<p><strong>Size : 8</strong></p>\r\n', 'j-adior-slingback-pump', 28000, 'j-adior-slingback-pump.jpg', '0000-00-00', 0),
(55, 3, 'WALK\'N\'DIOR SNEAKER', '<p><strong>Women&#39;s</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: White</strong></p>\r\n\r\n<p><strong>Size : 9</strong></p>\r\n', 'walk-n-dior-sneaker', 18000, 'walk-n-dior-sneaker.jpg', '0000-00-00', 0),
(56, 3, 'Christian Dior saddle bag', '<p><strong><a href=\"https://www.farfetch.com/th/shopping/women/christian-dior-pre-owned/items.aspx\">Christian Dior</a>&nbsp;pre-owned mini Trotter saddle bag</strong></p>\r\n\r\n<p><strong>brown</strong></p>\r\n\r\n<p><strong>canvas/leather</strong></p>\r\n\r\n<p><strong>signature Trotter monogram pattern</strong></p>\r\n\r\n<p><strong>top zip fastening</strong></p>\r\n\r\n<p><strong>single detachable top handle</strong></p>\r\n', 'christian-dior-saddle-bag', 7990, 'christian-dior-saddle-bag.jpg', '0000-00-00', 0),
(57, 3, 'Dior Granville Espadrille', '<p><strong>Women&#39;s</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Size : 9</strong></p>\r\n', 'dior-granville-espadrille', 22000, 'dior-granville-espadrille.jpg', '0000-00-00', 0),
(58, 3, 'Christian Dior | 30 Montaigne Ring', '<p><strong>Availability : In Stock</strong></p>\r\n', 'christian-dior-30-montaigne-ring', 18000, 'christian-dior-30-montaigne-ring.jpg', '0000-00-00', 0),
(59, 3, 'Christian Dior | OBLIQUE CANVAS STOLE', '<p><strong>Dimensions: 35 cm x 180 cm</strong></p>\r\n\r\n<p><strong>100% silk twill</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n', 'christian-dior-oblique-canvas-stole', 25000, 'christian-dior-oblique-canvas-stole.jpg', '0000-00-00', 0),
(60, 4, 'SPEED GRAFFITI SNEAKER', '<p><strong>Balenciaga graffiti logo in color contrast on sole</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: Light Brown</strong></p>\r\n\r\n<p><strong>Size : 8</strong></p>\r\n', 'speed-graffiti-sneaker', 28000, 'speed-graffiti-sneaker.jpg', '0000-00-00', 0),
(61, 4, 'ALLOVER SCRIPT LOGO VAREUSE SHIRT', '<p><strong>Composition: 100% Viscose</strong></p>\r\n\r\n<p><strong>Oversize flowing shape</strong></p>\r\n\r\n<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: Black</strong></p>\r\n', 'allover-script-logo-vareuse-shirt', 32000, 'allover-script-logo-vareuse-shirt.jpg', '0000-00-00', 0),
(62, 4, 'LOGO MEDIUM FIT T-SHIRT', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Balenciaga logo printed at back</strong></p>\r\n', 'logo-medium-fit-t-shirt', 16000, 'logo-medium-fit-t-shirt.jpg', '0000-00-00', 0),
(63, 2, 'adidas Originals NMD_R1 STLT Parley PK', '<p><strong>Availability : In Stock<br />\r\nColor: Black<br />\r\nSize : 10</strong></p>\r\n', 'adidas-originals-nmd-r1-stlt-parley-pk', 4600, 'adidas-originals-nmd-r1-stlt-parley-pk.jpg', '0000-00-00', 0),
(64, 2, 'HARDEN VOL. 4 SHOES', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: White</strong></p>\r\n\r\n<p><strong>Size : 10</strong></p>\r\n', 'harden-vol-4-shoes', 5000, 'harden-vol-4-shoes.jpg', '0000-00-00', 0),
(65, 2, 'CRAIG GREEN POLTA AKH I SHOES', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: black</strong></p>\r\n\r\n<p><strong>Size : 10</strong></p>\r\n', 'craig-green-polta-akh-i-shoes', 11000, 'craig-green-polta-akh-i-shoes.jpg', '0000-00-00', 0),
(66, 2, 'CODECHAOS BOA GOLF SHOES', '<p><strong>Availability : In Stock</strong></p>\r\n\r\n<p><strong>Color: black</strong></p>\r\n\r\n<p><strong>Size : 10</strong></p>\r\n', 'codechaos-boa-golf-shoes', 7000, 'codechaos-boa-golf-shoes.jpg', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2', 1, 'Original', 'Friend', '', '', 'logoof.jpg', 1, '', '', '2020-12-09'),
(28, 'p.peedamate@gmail.com', '$2y$10$FLDTP80.q.I.972oTH7TwO2cAbt56/YNcOHf7t1G7KAWvTBXKeX9e', 0, 'tanakorn', 'sujirapinyokul', '', '', '', 1, 'yVS21ubp6rhq', '', '2020-12-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
