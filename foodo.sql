-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 19, 2023 at 10:38 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodo`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `NomorTelepon` varchar(20) DEFAULT NULL,
  `PasswordHash` varchar(255) DEFAULT NULL,
  `Salt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`CustomerID`, `FirstName`, `LastName`, `Email`, `NomorTelepon`, `PasswordHash`, `Salt`) VALUES
(29, 'Muhammad', 'Jundullah', 'jundii@gmail.com', '0851', '$2y$10$w4Kbr2YzZDVQ2Djsoh7eseQRl84sCZ0oY3.B0cK/5YvPLEYLaryf.', 'c9bf5e1562be9dcaa30456e5d729b8c11b1c3a3646db7baa3862afe2469e3401'),
(37, 'Alhwyji', 'Abdullah', 'abdul@gmail.com', '12345', '$2y$10$F5sqIlZprkFypy3yX3kw..RqMRzzbloy37bz7lytEiSuniwEcDaJW', NULL),
(38, 'Uzay', 'Machbub', 'uzay@gmail.com', '23432', '$2y$10$21ev4C40yxFJJtoZ/5kaF.fb31d39Fxgk3QmNF1q.7EmAUzjWFueq', '0f8ad416b43c56bca8e3cac69c58424003d2203a6e1298a548259cb09153628a'),
(39, 'bangke', 'Umar', 'lendraa@gmail.com', '12344556', '$2y$10$a40LrWZLvzWkXAAC3Z5fgeIIysrT6Qyy693a.irLaXnlPUl.Or7zS', '7f5a2cc30d49654287b37e83d4499dce7189cfe958d1982a5a876c08ab697b1b'),
(44, 'simfoni', 'buana', 'simfonib@gmail.com', '12345', '$2y$10$z59kByAY7vlI.7rOuGp9cOlmYTDPiCWdkP3aoD8rSK26L/.FBaz0m', 'aa801317b0b080720d51bf0df6fc597860867122ac7f6d344f775ddd1e88b3c3');

-- --------------------------------------------------------

--
-- Table structure for table `Menu`
--

CREATE TABLE `Menu` (
  `MenuID` int(11) NOT NULL,
  `NamaMenu` varchar(255) DEFAULT NULL,
  `Harga` int(11) DEFAULT NULL,
  `Deskripsi` text,
  `Ketersediaan` varchar(3) DEFAULT NULL,
  `Gambar` varchar(255) DEFAULT NULL,
  `Kategori` enum('Food','Beverage') NOT NULL DEFAULT 'Food'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Menu`
--

INSERT INTO `Menu` (`MenuID`, `NamaMenu`, `Harga`, `Deskripsi`, `Ketersediaan`, `Gambar`, `Kategori`) VALUES
(10, 'Pisang Coklat', 10000, 'Pisang yang dilumuri dengan coklat dan dilapisi kulit lumpia lalu digoreng hingga kulit lumpianya menjadi renyah.', 'Ya', 'uploads/menu/piscok.PNG', 'Food'),
(11, 'Soto Ayam', 10000, 'Soto dengan kuah kuning khas Jogja', 'Ya', 'uploads/menu/soto.jpeg', 'Food'),
(12, 'Burger Wagyu Truffle', 20000, 'Patty Wagyu A5 lembut dengan lapisan keju Brie, sayuran segar, dan saus truffle aioli. Disajikan di roti burger artisan. Sebuah kelezatan istimewa yang menyatukan cita rasa premium dan keseimbangan sempurna.', 'Ya', 'uploads/menu/burger.jpeg', 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `MetodePembayaran`
--

CREATE TABLE `MetodePembayaran` (
  `MetodeID` int(11) NOT NULL,
  `NamaMetode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MetodePembayaran`
--

INSERT INTO `MetodePembayaran` (`MetodeID`, `NamaMetode`) VALUES
(1, 'QRIS'),
(2, 'Debit');

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetails`
--

CREATE TABLE `OrderDetails` (
  `OrderDetailID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `MenuID` int(11) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `TanggalPemesanan` date DEFAULT NULL,
  `TotalHarga` int(11) DEFAULT NULL,
  `StatusPembayaran` varchar(255) DEFAULT NULL,
  `MetodeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `MetodePembayaran`
--
ALTER TABLE `MetodePembayaran`
  ADD PRIMARY KEY (`MetodeID`);

--
-- Indexes for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `MenuID` (`MenuID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `MetodeID` (`MetodeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `Menu`
--
ALTER TABLE `Menu`
  MODIFY `MenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `MetodePembayaran`
--
ALTER TABLE `MetodePembayaran`
  MODIFY `MetodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  MODIFY `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `Orders` (`OrderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`MenuID`) REFERENCES `Menu` (`MenuID`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `Customers` (`CustomerID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`MetodeID`) REFERENCES `MetodePembayaran` (`MetodeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
