-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 07:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bragfit_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `qty`) VALUES
(1, 4, 20, 4),
(2, 4, 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_img` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_img`, `description`) VALUES
(1, 'Men\'s Printed T-Shirts', '<i class=\"fas fa-tshirt\"></i>', 'Printed & Fancy Collection of T-Shirts for Men\'s'),
(2, 'Women\'s Printed T-Shirts', '<i class=\"fas fa-tshirt\"></i>', 'Printed & Fancy Collection of T-Shirts for Women\'s'),
(3, 'Men\'s Solid T-Shirts', '<i class=\"fas fa-tshirt\"></i>', 'Solid Collection of T-Shirts for Men\'s'),
(4, 'Women\'s Solid T-Shirts', '<i class=\"fas fa-tshirt\"></i>', 'Solid Collection of T-Shirts for Women\'s');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_img` varchar(40) NOT NULL,
  `product_old_price` varchar(20) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_img`, `product_old_price`, `product_price`, `description`, `category_id`) VALUES
(1, 'Bestfriends Men’s Printed T-Shirt', 'men-1.png', '499', '399', 'Unisex t-shirt pattern with a regular fit\n<br><br>\nSolid colors are 100% combed cotton\n<br><br>\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester. Charcoal Grey is 57% cotton and 43% polyester\n<br><br>\nWeight: 180 GSM bio-washed fabric\n<br><br>\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\n<br><br>\nSingle jersey and pre-shrunk fabric\n<br><br>\nSide-seamed\n<br><br>\nMade in India', '1'),
(2, 'Black Is My Color Men’s Printed T-Shirt', 'men-2.png', '499', '399', 'Unisex t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester. Charcoal Grey is 57% cotton and 43% polyester\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '1'),
(3, 'Coffee Men’s Printed T-Shirt', 'men-3.png', '499', '399', 'Unisex t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester. Charcoal Grey is 57% cotton and 43% polyester\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '1'),
(4, 'Gaali Nahi Denge Men’s Printed T-Shirt', 'men-4.png', '799', '599', 'Unisex t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester. Charcoal Grey is 57% cotton and 43% polyester\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '1'),
(5, 'Game Over Men’s Printed T-Shirt', 'men-5.png', '799', '599', 'Unisex t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester. Charcoal Grey is 57% cotton and 43% polyester\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '1'),
(6, 'Keep On Hustling Men’s Printed T-Shirt', 'men-6.png', '799', '599', 'Unisex t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester. Charcoal Grey is 57% cotton and 43% polyester\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '1'),
(7, 'Bestfriends Women’s Printed T-Shirt', 'women-1.png', '499', '399', 'Curved t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester.\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '2'),
(8, 'Black Is My Color Women’s Printed T-Shirt', 'women-2.png', '499', '399', 'Curved t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester.\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '2'),
(9, 'Coffee Women’s Printed T-Shirt', 'women-3.png', '499', '399', 'Curved t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester.\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '2'),
(10, 'Gaali Nahi Denge Women’s Printed T-Shirt', 'women-4.png', '799', '599', 'Curved t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester.\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '2'),
(11, 'Game Over Women’s Printed T-Shirt', 'women-5.png', '799', '599', 'Curved t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester.\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '2'),
(12, 'Keep On Hustling Women’s Printed T-Shirt', 'women-6.png', '799', '599', 'Curved t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester.\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '2'),
(13, 'Black Men’s Solid T-Shirt', 'men-solid-1.png', '550', '439', 'Unisex t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester. Charcoal Grey is 57% cotton and 43% polyester\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '3'),
(14, 'Charcoal Grey Men’s Solid T-Shirt', 'men-solid-2.png', '550', '439', 'Unisex t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester. Charcoal Grey is 57% cotton and 43% polyester\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '3'),
(15, 'Golden Yellow Men’s Solid T-Shirt', 'men-solid-3.png', '550', '439', 'Unisex t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester. Charcoal Grey is 57% cotton and 43% polyester\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '3'),
(16, 'Liril Green Men’s Solid T-Shirt', 'men-solid-4.png', '550', '439', 'Unisex t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester. Charcoal Grey is 57% cotton and 43% polyester\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '3'),
(17, 'Navy Blue Men’s Solid T-Shirt', 'men-solid-5.png', '550', '439', 'Unisex t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester. Charcoal Grey is 57% cotton and 43% polyester\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '3'),
(18, 'Red Men’s Solid T-Shirt', 'men-solid-6.png', '550', '439', 'Unisex t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester. Charcoal Grey is 57% cotton and 43% polyester\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with lower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India', '3'),
(19, 'Black Women’s Solid T-Shirt', 'women-solid-1.png', '550', '439', 'Curved t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester.\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with \r\nlower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India\r\n', '4'),
(20, 'Charcoal Grey Women’s Solid T-Shirt', 'women-solid-2.png', '550', '439', 'Curved t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester.\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with \r\nlower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India\r\n', '4'),
(21, 'Golden Yellow Women’s Solid T-Shirt', 'women-solid-3.png', '550', '439', 'Curved t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester.\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with \r\nlower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India\r\n', '4'),
(22, 'Liril Green Women’s Solid T-Shirt', 'women-solid-4.png', '550', '439', 'Curved t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester.\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with \r\nlower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India\r\n', '4'),
(23, 'Navy Blue Women’s Solid T-Shirt', 'women-solid-5.png', '550', '439', 'Curved t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester.\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with \r\nlower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India\r\n', '4'),
(24, 'Red Women’s Solid T-Shirt', 'women-solid-6.png', '550', '439', 'Curved t-shirt pattern with a regular fit\r\n<br><br>\r\nSolid colors are 100% combed cotton\r\n<br><br>\r\nHeather colors are a mixture of cotton and polyester. Melange Grey is 83% cotton and 17% polyester.\r\n<br><br>\r\nWeight: 180 GSM bio-washed fabric\r\n<br><br>\r\nSustainable Inks used for Printing – water-based, toxin-free, and non-hazardous with \r\nlower carbon footprint\r\n<br><br>\r\nSingle jersey and pre-shrunk fabric\r\n<br><br>\r\nSide-seamed\r\n<br><br>\r\nMade in India\r\n', '4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `username`, `fullname`, `email`, `phone_no`, `address`) VALUES
(3, '12345789', 'Saini', 'Aakash Saini', 'aakash@gmail.com', '9540739099', 'Delhi'),
(4, '123', 'user', 'user', 'user@gmail.com', '9876543210', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
