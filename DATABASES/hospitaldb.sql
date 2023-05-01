-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 07:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings_tb`
--

CREATE TABLE `bookings_tb` (
  `BookingID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `ContactNumber` int(255) NOT NULL,
  `DoctorName` varchar(255) NOT NULL,
  `DoctorEmail` varchar(255) NOT NULL,
  `Speciality` varchar(255) NOT NULL,
  `BookingDate` date NOT NULL,
  `WorksAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings_tb`
--

INSERT INTO `bookings_tb` (`BookingID`, `Name`, `Email`, `ContactNumber`, `DoctorName`, `DoctorEmail`, `Speciality`, `BookingDate`, `WorksAt`) VALUES
(862, 'Mrunal Shinde', 'mrunal.shinde@gmail.com', 123456789, 'Sam', 'dr.sam@myradoc.in', 'Pediatrics', '2023-05-05', 'Myra Children\'s Clinic'),
(863, 'Srushti Pophale', 'srushtipophale@yahoo.com', 123456789, 'Bob Johnson', 'dr.bobjohnson@myradoc.in', 'Dermatology', '2023-05-01', 'Myra Skin Clinic'),
(864, 'Sakshi Vaidya', 'sakshi.vaidya@outlook.com', 1234563453, 'John Doe', 'dr.johndoe@myradoc.in', 'Neurology', '2023-04-26', 'Myra Neuro Clinic'),
(865, 'Manasi Dube', 'manasi.dube@gmail.com', 2147483647, 'Kelly Smith', 'dr.kellysmith@myradoc.in', 'Cardiology', '2023-05-03', 'Myra Heart Clinic'),
(866, 'Testing', 'test@email.com', 123456789, 'John Doe', 'dr.johndoe@myradoc.in', 'Neurology', '2023-05-02', 'Myra Neuro Clinic'),
(867, 'Nidhi Khinvasara', 'nidhi.khinvasara@yahoo.com', 2147483647, 'Kelly Smith', 'dr.kellysmith@myradoc.in', 'Cardiology', '2023-05-02', 'Myra Heart Clinic');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_tb`
--

CREATE TABLE `doctor_tb` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_tb`
--

INSERT INTO `doctor_tb` (`email`, `password`) VALUES
('dr.kellysmith@myradoc.in', '123456'),
('dr.johndoe@myradoc.in', 'MyDoc123#'),
('dr.bobjohnson@myradoc.in', 'Doc123456'),
('dr.sam@myradoc.in', 'Doc786#');

-- --------------------------------------------------------

--
-- Table structure for table `doc_speciality`
--

CREATE TABLE `doc_speciality` (
  `Doc_Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Speciality` varchar(255) NOT NULL,
  `WorksAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc_speciality`
--

INSERT INTO `doc_speciality` (`Doc_Name`, `Email`, `Speciality`, `WorksAt`) VALUES
('Kelly Smith', 'dr.kellysmith@myradoc.in', 'Cardiology', 'Myra Heart Clinic'),
('John Doe', 'dr.johndoe@myradoc.in', 'Neurology', 'Myra Neuro Clinic'),
('Bob Johnson', 'dr.bobjohnson@myradoc.in', 'Dermatology', 'Myra Skin Clinic'),
('Sam', 'dr.sam@myradoc.in', 'Pediatrics', 'Myra Children\'s Clinic');

-- --------------------------------------------------------

--
-- Table structure for table `patient_tb`
--

CREATE TABLE `patient_tb` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_tb`
--

INSERT INTO `patient_tb` (`email`, `password`) VALUES
('mrunal.shinde@gmail.com', '123456'),
('srushtipophale@yahoo.com', 'password'),
('sakshi.vaidya@outlook.com', 'pass123'),
('manasi.dube@gmail.com', 'manasi123'),
('test@email.com', 'pass123#'),
('nidhi.khinvasara@yahoo.com', 'Nidhi123#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  ADD PRIMARY KEY (`BookingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
  MODIFY `BookingID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=868;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
