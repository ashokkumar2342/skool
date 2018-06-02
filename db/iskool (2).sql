-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2018 at 12:40 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iskool`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `name`, `start_date`, `end_date`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2018-2019', '2018-04-01', '2019-03-31', 'hh', NULL, NULL, NULL),
(2, '2019-2020', '0000-00-00', '0000-00-00', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'Add Subject Succesfully', '2018-02-09 05:56:06', '2018-02-09 05:56:06'),
(2, 1, 'Class created success ...', '2018-02-10 01:23:30', '2018-02-10 01:23:30'),
(3, 1, 'status change  successfully ...', '2018-02-10 01:24:22', '2018-02-10 01:24:22'),
(4, 1, 'status change  successfully ...', '2018-02-10 01:24:24', '2018-02-10 01:24:24'),
(5, 1, 'status change  successfully ...', '2018-02-10 01:24:27', '2018-02-10 01:24:27'),
(6, 1, 'status change  successfully ...', '2018-02-10 01:24:31', '2018-02-10 01:24:31'),
(7, 1, 'status change  successfully ...', '2018-02-10 01:25:25', '2018-02-10 01:25:25'),
(8, 1, 'status change  successfully ...', '2018-02-10 01:25:27', '2018-02-10 01:25:27'),
(9, 1, 'status change  successfully ...', '2018-02-10 01:25:48', '2018-02-10 01:25:48'),
(10, 1, 'status change  successfully ...', '2018-02-10 01:25:57', '2018-02-10 01:25:57'),
(11, 1, 'status change  successfully ...', '2018-02-10 01:25:59', '2018-02-10 01:25:59'),
(12, 1, 'status change  successfully ...', '2018-02-10 01:26:18', '2018-02-10 01:26:18'),
(13, 1, 'status change  successfully ...', '2018-02-10 01:28:22', '2018-02-10 01:28:22'),
(14, 1, 'status change  successfully ...', '2018-02-10 01:30:28', '2018-02-10 01:30:28'),
(15, 1, 'status change  successfully ...', '2018-02-10 01:30:30', '2018-02-10 01:30:30'),
(16, 1, 'status change  successfully ...', '2018-02-10 01:30:33', '2018-02-10 01:30:33'),
(17, 1, 'status change  successfully ...', '2018-02-10 01:30:35', '2018-02-10 01:30:35'),
(18, 1, 'status change  successfully ...', '2018-02-10 01:42:58', '2018-02-10 01:42:58'),
(19, 1, 'status change  successfully ...', '2018-02-10 01:43:03', '2018-02-10 01:43:03'),
(20, 1, 'status change  successfully ...', '2018-02-10 01:43:05', '2018-02-10 01:43:05'),
(21, 1, 'status change  successfully ...', '2018-02-10 01:43:19', '2018-02-10 01:43:19'),
(22, 1, 'status change  successfully ...', '2018-02-10 01:43:26', '2018-02-10 01:43:26'),
(23, 1, 'status change  successfully ...', '2018-02-10 01:43:43', '2018-02-10 01:43:43'),
(24, 1, 'Add Subject Succesfully', '2018-02-10 02:02:15', '2018-02-10 02:02:15'),
(25, 1, 'Student Registration Success ...', '2018-02-14 02:50:04', '2018-02-14 02:50:04'),
(26, 1, 'Student Registration Success ...', '2018-02-15 01:09:21', '2018-02-15 01:09:21'),
(27, 1, 'Student Registration Success ...', '2018-03-02 22:45:08', '2018-03-02 22:45:08'),
(28, 1, 'Student Registration Success ...', '2018-03-02 22:50:43', '2018-03-02 22:50:43'),
(29, 1, ' Upload document success ...', '2018-03-07 02:07:24', '2018-03-07 02:07:24'),
(30, 1, ' Upload document success ...', '2018-03-07 02:31:53', '2018-03-07 02:31:53'),
(31, 1, ' Delete document success ...', '2018-03-07 02:39:20', '2018-03-07 02:39:20'),
(32, 1, ' Upload document success ...', '2018-03-07 03:01:01', '2018-03-07 03:01:01'),
(33, 1, ' Delete document success ...', '2018-03-07 03:01:22', '2018-03-07 03:01:22'),
(34, 1, ' Delete document success ...', '2018-03-07 03:01:51', '2018-03-07 03:01:51'),
(35, 1, ' Upload document success ...', '2018-03-07 03:02:05', '2018-03-07 03:02:05'),
(36, 1, ' Upload document success ...', '2018-03-07 03:24:33', '2018-03-07 03:24:33'),
(37, 1, ' Delete document success ...', '2018-03-07 03:24:53', '2018-03-07 03:24:53'),
(38, 1, ' Upload document success ...', '2018-03-07 03:59:33', '2018-03-07 03:59:33'),
(39, 1, ' Upload document success ...', '2018-03-09 01:34:39', '2018-03-09 01:34:39'),
(40, 1, 'Student Registration Success ...', '2018-03-09 04:03:12', '2018-03-09 04:03:12'),
(41, 1, 'Student Registration Success ...', '2018-03-09 04:12:32', '2018-03-09 04:12:32'),
(42, 1, 'Student Registration Success ...', '2018-03-09 04:33:20', '2018-03-09 04:33:20'),
(43, 1, 'Student Registration Success ...', '2018-03-10 01:02:54', '2018-03-10 01:02:54'),
(44, 1, 'Student Registration Success ...', '2018-03-10 01:38:29', '2018-03-10 01:38:29'),
(45, 1, ' Upload document success ...', '2018-03-10 01:39:11', '2018-03-10 01:39:11'),
(46, 1, 'Student Registration Success ...', '2018-03-14 00:31:31', '2018-03-14 00:31:31'),
(47, 1, 'Student Registration Success ...', '2018-03-14 00:43:35', '2018-03-14 00:43:35'),
(48, 1, 'Student Registration Success ...', '2018-03-14 01:24:18', '2018-03-14 01:24:18'),
(49, 1, 'Student Registration Success ...', '2018-03-14 02:52:21', '2018-03-14 02:52:21'),
(50, 1, 'Student Registration Success ...', '2018-03-14 03:49:30', '2018-03-14 03:49:30'),
(51, 1, 'Student Registration Success ...', '2018-03-15 03:48:31', '2018-03-15 03:48:31'),
(52, 1, 'student update success ...', '2018-03-21 01:54:38', '2018-03-21 01:54:38'),
(53, 1, 'student update success ...', '2018-03-21 01:54:58', '2018-03-21 01:54:58'),
(54, 1, 'Student Registration Success ...', '2018-03-21 02:17:09', '2018-03-21 02:17:09'),
(55, 1, 'Student Registration Success ...', '2018-03-21 02:59:19', '2018-03-21 02:59:19'),
(56, 1, 'student update success ...', '2018-03-21 03:05:11', '2018-03-21 03:05:11'),
(57, 1, 'student update success ...', '2018-03-21 03:06:03', '2018-03-21 03:06:03'),
(58, 1, 'student update success ...', '2018-03-21 03:06:49', '2018-03-21 03:06:49'),
(59, 1, 'student update success ...', '2018-03-21 03:07:10', '2018-03-21 03:07:10'),
(60, 1, 'student update success ...', '2018-03-21 03:07:32', '2018-03-21 03:07:32'),
(61, 1, 'student update success ...', '2018-03-21 03:09:30', '2018-03-21 03:09:30'),
(62, 1, 'student update success ...', '2018-03-21 03:10:39', '2018-03-21 03:10:39'),
(63, 1, 'Student Registration Success ...', '2018-03-21 03:19:29', '2018-03-21 03:19:29'),
(64, 1, 'Approval Successfully', '2018-03-30 06:45:19', '2018-03-30 06:45:19'),
(65, 1, 'Approval Successfully', '2018-03-30 06:45:23', '2018-03-30 06:45:23'),
(66, 1, 'Approval Successfully', '2018-03-30 06:46:09', '2018-03-30 06:46:09'),
(67, 1, 'Approval Successfully', '2018-03-30 06:46:11', '2018-03-30 06:46:11'),
(68, 1, 'Approval Successfully', '2018-03-30 23:14:44', '2018-03-30 23:14:44'),
(69, 1, 'Approval Successfully', '2018-03-30 23:14:48', '2018-03-30 23:14:48'),
(70, 1, 'Approval Successfully', '2018-03-30 23:14:55', '2018-03-30 23:14:55'),
(71, 1, 'Approval Successfully', '2018-03-30 23:14:59', '2018-03-30 23:14:59'),
(72, 1, 'Approval Successfully', '2018-03-30 23:15:02', '2018-03-30 23:15:02'),
(73, 1, 'Verify Successfully', '2018-03-30 23:17:57', '2018-03-30 23:17:57'),
(74, 1, 'Verify Successfully', '2018-03-30 23:18:09', '2018-03-30 23:18:09'),
(75, 1, 'Verify Successfully', '2018-03-30 23:18:11', '2018-03-30 23:18:11'),
(76, 1, 'Approval Successfully', '2018-03-30 23:18:14', '2018-03-30 23:18:14'),
(77, 1, 'Verify Successfully', '2018-03-30 23:18:18', '2018-03-30 23:18:18'),
(78, 1, 'Approval Successfully', '2018-03-30 23:18:20', '2018-03-30 23:18:20'),
(79, 1, 'Approval Successfully', '2018-03-30 23:24:14', '2018-03-30 23:24:14'),
(80, 1, 'Verify Successfully', '2018-03-30 23:24:16', '2018-03-30 23:24:16'),
(81, 1, 'Approval Successfully', '2018-03-30 23:26:29', '2018-03-30 23:26:29'),
(82, 1, 'Verify Successfully', '2018-03-30 23:26:31', '2018-03-30 23:26:31'),
(83, 1, 'Approval Successfully', '2018-03-30 23:26:33', '2018-03-30 23:26:33'),
(84, 1, 'Verify Successfully', '2018-03-30 23:26:35', '2018-03-30 23:26:35'),
(85, 1, 'Approval Successfully', '2018-03-30 23:26:37', '2018-03-30 23:26:37'),
(86, 1, 'Verify Successfully', '2018-03-30 23:26:39', '2018-03-30 23:26:39'),
(87, 1, 'Approval Successfully', '2018-03-30 23:33:04', '2018-03-30 23:33:04'),
(88, 1, 'Approval Successfully', '2018-03-31 00:26:43', '2018-03-31 00:26:43'),
(89, 1, 'Verify Successfully', '2018-03-31 00:41:57', '2018-03-31 00:41:57'),
(90, 1, 'Verify Successfully', '2018-03-31 08:08:18', '2018-03-31 08:08:18'),
(91, 1, 'Approval Successfully', '2018-03-31 08:08:24', '2018-03-31 08:08:24'),
(92, 1, 'Verify Successfully', '2018-03-31 08:08:27', '2018-03-31 08:08:27'),
(93, 1, 'Approval Successfully', '2018-03-31 08:08:29', '2018-03-31 08:08:29'),
(94, 1, 'Verify Successfully', '2018-03-31 08:08:35', '2018-03-31 08:08:35'),
(95, 1, 'Approval Successfully', '2018-03-31 08:08:38', '2018-03-31 08:08:38'),
(96, 1, 'Verify Successfully', '2018-03-31 08:08:44', '2018-03-31 08:08:44'),
(97, 1, 'Apply Certificate Successfully', '2018-03-31 08:39:52', '2018-03-31 08:39:52'),
(98, 1, 'Apply Certificate Successfully', '2018-03-31 08:45:22', '2018-03-31 08:45:22'),
(99, 1, 'Approval Successfully', '2018-03-31 09:15:36', '2018-03-31 09:15:36'),
(100, 1, 'Verify Successfully', '2018-03-31 09:15:46', '2018-03-31 09:15:46'),
(101, 1, 'Verify Successfully', '2018-04-02 01:26:13', '2018-04-02 01:26:13'),
(102, 1, 'Approval Successfully', '2018-04-02 01:26:17', '2018-04-02 01:26:17'),
(103, 1, 'Verify Successfully', '2018-04-02 01:26:20', '2018-04-02 01:26:20'),
(104, 1, 'Verify Successfully', '2018-04-02 23:49:50', '2018-04-02 23:49:50'),
(105, 1, 'Approval Successfully', '2018-04-03 06:03:25', '2018-04-03 06:03:25'),
(106, 1, 'Approval Successfully', '2018-04-03 06:03:33', '2018-04-03 06:03:33'),
(107, 1, 'Default Value Success Update', '2018-04-05 05:54:45', '2018-04-05 05:54:45'),
(108, 1, 'Default Value Success Update', '2018-04-05 05:54:52', '2018-04-05 05:54:52'),
(109, 1, 'Default Value Success Update', '2018-04-05 05:55:08', '2018-04-05 05:55:08'),
(110, 1, 'Default Value Success Update', '2018-04-05 05:56:07', '2018-04-05 05:56:07'),
(111, 1, 'Default Value Updated', '2018-04-05 05:56:30', '2018-04-05 05:56:30'),
(112, 1, 'Default Value Updated', '2018-04-05 05:56:46', '2018-04-05 05:56:46'),
(113, 1, 'Default Value Updated', '2018-04-05 05:57:57', '2018-04-05 05:57:57'),
(114, 1, 'Default Value Updated', '2018-04-05 06:00:31', '2018-04-05 06:00:31'),
(115, 1, 'Default Value Updated', '2018-04-05 06:02:39', '2018-04-05 06:02:39'),
(116, 1, 'Default Value Updated', '2018-04-05 06:02:45', '2018-04-05 06:02:45'),
(117, 1, 'Default Value Updated', '2018-04-05 06:02:52', '2018-04-05 06:02:52'),
(118, 1, 'Default Value Updated', '2018-04-05 06:02:57', '2018-04-05 06:02:57'),
(119, 1, 'Default Value Updated', '2018-04-05 06:07:50', '2018-04-05 06:07:50'),
(120, 1, 'Default Value Updated', '2018-04-05 06:07:52', '2018-04-05 06:07:52'),
(121, 1, 'Default Value Updated', '2018-04-05 06:08:00', '2018-04-05 06:08:00'),
(122, 1, 'Default Value Updated', '2018-04-05 06:08:08', '2018-04-05 06:08:08'),
(123, 1, 'student update success ...', '2018-04-05 06:09:50', '2018-04-05 06:09:50'),
(124, 1, 'student update success ...', '2018-04-05 06:10:10', '2018-04-05 06:10:10'),
(125, 1, 'Apply Certificate Successfully', '2018-04-11 11:24:06', '2018-04-11 11:24:06'),
(126, 1, 'Apply Certificate Successfully', '2018-04-11 11:26:55', '2018-04-11 11:26:55'),
(127, 1, 'Apply Certificate Successfully', '2018-04-14 07:54:35', '2018-04-14 07:54:35'),
(128, 1, 'Verify Successfully', '2018-04-14 07:54:44', '2018-04-14 07:54:44'),
(129, 1, 'Approval Successfully', '2018-04-14 07:54:52', '2018-04-14 07:54:52'),
(130, 1, 'Default Value Updated', '2018-04-14 08:02:05', '2018-04-14 08:02:05'),
(131, 1, 'student update success ...', '2018-04-19 07:05:57', '2018-04-19 07:05:57'),
(132, 1, 'status change  successfully ...', '2018-04-24 07:56:04', '2018-04-24 07:56:04'),
(133, 1, 'status change  successfully ...', '2018-04-24 07:56:07', '2018-04-24 07:56:07'),
(134, 1, 'Add Subject Succesfully', '2018-04-24 08:12:38', '2018-04-24 08:12:38'),
(135, 1, 'Apply Certificate Successfully', '2018-04-24 08:13:57', '2018-04-24 08:13:57'),
(136, 1, 'Verify Successfully', '2018-04-24 08:14:21', '2018-04-24 08:14:21'),
(137, 1, 'Approval Successfully', '2018-04-24 08:14:25', '2018-04-24 08:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `profile_pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `role_id` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `r_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `w_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `d_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `gender`, `dob`, `address`, `profile_pic`, `login_ip`, `login_at`, `role_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `r_status`, `w_status`, `d_status`, `status`) VALUES
(1, 'Ashish Garg', '', 'admin@gmail.com', '80000000000', '$2y$10$E5Eq/uefsZf4QL7TEsyPoOYJV.lRzJmeQ2GeGtYZjKAwX4ybDG7CK', 1, '2091-02-01', 'Rohtak', NULL, NULL, NULL, 1, 'DVAAe5r2nfI7rLuW2jYKalOBifpIZ3nrS9U20yOwYwB2UMwwUTluikM3b72r', NULL, '2017-12-31 18:30:00', '2018-04-24 07:56:06', 1, 0, 1, 1),
(2, 'Principle', '', 'principle@gmail.com', '8888888888', '$2y$10$E5Eq/uefsZf4QL7TEsyPoOYJV.lRzJmeQ2GeGtYZjKAwX4ybDG7CK', NULL, '1991-02-10', NULL, NULL, NULL, NULL, 1, 'gAMCyJI7S1eDyR3A7hzMohtVniX6acOron26myN6xMJvx6o6k5i6ugx7hu8H', NULL, '2018-01-12 04:31:19', '2018-02-03 05:04:54', 0, 1, 1, 1),
(3, 'Teacher', 'df', 'teacher@gmail.com', '8888888888', '$2y$10$wS2AthXuI9fYftD.L7lskOO94onZK5H0ldb9IvxqvHMd/d/jXdTWS', NULL, '1991-02-10', NULL, NULL, NULL, NULL, 3, 'Qsw42MsLSRdyraTT1AugQ9gq3Ss07fpsDItGCApGKthHtxjVTN9c4KZIDIog', NULL, '2018-01-12 04:43:43', '2018-02-02 05:10:12', 1, 1, 1, 1),
(4, 'Staff', 'Kumar', 'staff@gmail.com', '99999999999', '$2y$10$ZR0T7tdxsqeFzfMjnbXm9.MKwiO/PY9vmIR..pUv8ysBgrIOZ1Ozy', NULL, '1991-02-10', NULL, NULL, NULL, NULL, 4, NULL, NULL, '2018-01-12 05:05:19', '2018-02-03 05:26:29', 0, 0, 0, 0),
(5, 'ClerkStaff', NULL, 'clerk@gmail.com', '8888888888', '$2y$10$1TrM0AxjUssqxr7Yyo/RYOsYIiJbzZhY9H6qgJ0945RV.HILDrFy.', NULL, '1991-02-10', NULL, NULL, NULL, NULL, 5, NULL, NULL, '2018-01-12 05:11:50', '2018-01-31 01:36:50', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'O-', NULL, NULL),
(2, 'O+', NULL, NULL),
(3, 'AB', NULL, NULL),
(4, 'B+', NULL, NULL),
(5, 'B-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'General', NULL, NULL),
(2, 'OBC', NULL, NULL),
(3, 'SC', NULL, NULL),
(4, 'ST', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificate_issue_details`
--

CREATE TABLE `certificate_issue_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificate_issue_details`
--

INSERT INTO `certificate_issue_details` (`id`, `student_id`, `date`, `reason`, `certificate_type`, `attachment`, `created_at`, `updated_at`, `status`) VALUES
(1, 20, '2018-03-30', 'addmission', 'SLC', '3G89wSXQTiiJ2l49XcnIV5CeJpdM2ZQPW0PYoIfu.docx', '2018-03-30 04:26:55', '2018-03-31 08:08:44', 2),
(2, 21, '2018-03-31', 'test', 'SLC', NULL, '2018-03-31 08:21:34', '2018-04-02 01:26:20', 2),
(3, 20, '2018-03-31', 'test', 'SLC', 't9YIhc5T32PbJcGOwH2vdoYDfF3d1yYN4kjU2yQ0.docx', '2018-03-31 08:22:14', '2018-03-31 08:22:14', 1),
(4, 21, '2018-03-31', 'test', 'MarkSheet', 'mC2MjBGEScz2C2ClfQDXwgTpFcuq8OUCUahBowfA.pdf', '2018-03-31 08:39:52', '2018-04-03 06:03:32', 3),
(5, 21, '2018-03-31', 'gggg', 'MarkSheet', NULL, '2018-03-31 08:45:21', '2018-04-03 06:03:23', 3),
(6, 20, '2018-04-11', 'dfdsfsf', 'CLC', NULL, '2018-04-11 11:24:05', '2018-04-11 11:24:05', 1),
(7, 20, '2018-04-11', 'hhh', 'CLC', 'HO3vLicvmzOhBdbMn3fKNCpSZdeQKv05s0rGwLcm.pdf', '2018-04-11 11:26:54', '2018-04-24 08:14:24', 3),
(8, 20, '2018-04-14', 'dfsf', 'CLC', NULL, '2018-04-14 07:54:34', '2018-04-14 07:54:51', 3),
(9, 20, '2018-04-24', 'fdsf', 'SLC', NULL, '2018-04-24 08:13:56', '2018-04-24 08:13:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `certificate_issue_remarks`
--

CREATE TABLE `certificate_issue_remarks` (
  `id` int(10) UNSIGNED NOT NULL,
  `certificate_issue_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificate_issue_remarks`
--

INSERT INTO `certificate_issue_remarks` (`id`, `certificate_issue_id`, `admin_id`, `remarks`, `created_at`, `updated_at`) VALUES
(25, 3, 1, 'test', '2018-04-03 00:06:31', '2018-04-03 00:06:31'),
(26, 5, 1, 'test', '2018-04-10 00:22:55', '2018-04-10 00:22:55'),
(27, 8, 1, 'ytfdhgggggggg', '2018-04-14 07:56:17', '2018-04-14 07:56:17'),
(28, 8, 1, 'ghhhhhhhhhhh', '2018-04-14 07:56:47', '2018-04-14 07:56:47'),
(29, 8, 1, 'dfg', '2018-04-14 08:01:20', '2018-04-14 08:01:20'),
(30, 9, 1, 'dsf', '2018-04-24 08:14:07', '2018-04-24 08:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `class_fees`
--

CREATE TABLE `class_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `admission_fee` int(11) NOT NULL,
  `registration_fee` int(11) NOT NULL,
  `annual_fee` int(11) NOT NULL,
  `bus_fee` int(11) NOT NULL,
  `caution_fee` int(11) NOT NULL,
  `activity_charge` int(11) NOT NULL,
  `smart_fee` int(11) NOT NULL,
  `tution_fee` int(11) NOT NULL,
  `other_fee` int(11) NOT NULL,
  `total_fee` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_fees`
--

INSERT INTO `class_fees` (`id`, `class_id`, `session_id`, `admission_fee`, `registration_fee`, `annual_fee`, `bus_fee`, `caution_fee`, `activity_charge`, `smart_fee`, `tution_fee`, `other_fee`, `total_fee`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 9000, NULL, '2018-01-29 00:33:19', '2018-01-29 00:33:19', 1),
(2, 2, 1, 900, 900, 900, 900, 900, 900, 900, 900, 900, 8100, NULL, '2018-01-29 00:39:23', '2018-01-29 00:39:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_feestructures`
--

CREATE TABLE `class_feestructures` (
  `id` int(10) UNSIGNED NOT NULL,
  `fee_structure_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `isapplicable_id` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_feestructures`
--

INSERT INTO `class_feestructures` (`id`, `fee_structure_id`, `class_id`, `isapplicable_id`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(2, 4, 1, 2, NULL, '2018-05-09 04:24:54', '2018-05-17 07:31:05', 1),
(3, 4, 3, 1, NULL, '2018-05-09 04:25:10', '2018-05-31 05:00:03', 1),
(4, 3, 3, 2, NULL, '2018-05-09 04:25:16', '2018-05-31 04:59:44', 1),
(5, 3, 4, 1, NULL, '2018-05-12 07:15:44', '2018-05-16 06:54:50', 1),
(6, 3, 5, 1, NULL, '2018-05-12 07:15:51', '2018-05-12 07:15:51', 1),
(7, 3, 6, 1, NULL, '2018-05-12 07:15:57', '2018-05-12 07:15:57', 1),
(8, 3, 2, 1, NULL, '2018-05-12 07:16:05', '2018-06-01 15:55:38', 1),
(9, 3, 1, 2, NULL, '2018-05-12 07:26:19', '2018-05-17 07:16:53', 1),
(10, 5, 1, 2, NULL, '2018-05-17 07:16:21', '2018-05-31 04:59:36', 1),
(11, 4, 2, 1, NULL, '2018-05-17 07:31:32', '2018-06-01 15:55:38', 1),
(12, 5, 2, 1, NULL, '2018-05-26 09:48:11', '2018-06-01 15:55:38', 1),
(13, 4, 6, 1, NULL, '2018-05-26 09:53:12', '2018-05-26 09:53:12', 1),
(14, 5, 3, 2, NULL, '2018-05-31 04:59:45', '2018-05-31 04:59:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_types`
--

CREATE TABLE `class_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shorting_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_types`
--

INSERT INTO `class_types` (`id`, `name`, `alias`, `shorting_id`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 'First', 'I', 1, NULL, '2018-01-27 05:23:32', '2018-01-27 05:23:32', 1),
(2, 'Secount', 'II', 2, NULL, '2018-01-27 05:23:46', '2018-01-27 05:23:46', 1),
(3, 'Third', 'III', 3, NULL, '2018-01-27 05:33:11', '2018-01-27 05:33:11', 1),
(4, 'Fourth', 'IV', 4, NULL, '2018-02-06 03:46:13', '2018-02-06 03:46:13', 1),
(5, 'Fifth', 'V', 5, NULL, '2018-02-06 03:47:28', '2018-02-06 03:47:28', 1),
(6, 'sixth', 'VI', 6, NULL, '2018-02-10 01:23:30', '2018-02-10 01:23:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `concessions`
--

CREATE TABLE `concessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concessions`
--

INSERT INTO `concessions` (`id`, `name`, `amount`, `percentage`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 'concession first', '600.00', 5, NULL, '2018-05-21 04:37:08', '2018-05-21 04:37:08', 1),
(2, 'concession secount', '677.00', NULL, NULL, '2018-05-21 04:38:18', '2018-05-21 04:38:18', 1),
(10, 'concessions', '675.00', NULL, NULL, '2018-05-21 06:20:20', '2018-05-21 06:37:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `document_type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `student_id`, `document_type_id`, `name`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(4, 2, 2, 'oeuQmhuy6tRhMpE67sNiTfpXdgynx4nUTPywNydL.docx', NULL, '2018-03-07 03:02:05', '2018-03-07 03:02:05', 1),
(6, 2, 3, '3e5rtPG6Lh2KO7GImfc6WzAYHjkw8DltuWpcLooT.pdf', NULL, '2018-03-07 03:59:33', '2018-03-07 03:59:33', 1),
(7, 1, 2, 'MYNLOfZnmnd9GARjnqWFPHpmgyevI2cmSvu0ZWyJ.pdf', NULL, '2018-03-09 01:34:38', '2018-03-09 01:34:38', 1),
(8, 16, 2, 'aOGL86Liqi2CAzeCNBpPEF2sFgvRBy4W6Itt3eyt.pdf', NULL, '2018-03-10 01:39:11', '2018-03-10 01:39:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Date Of Birth Certificate', NULL, NULL, NULL, 1),
(2, 'Marksheet', NULL, NULL, NULL, 1),
(3, 'Aadhar Card', NULL, NULL, NULL, 1),
(4, 'Other', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_accounts`
--

CREATE TABLE `fee_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_accounts`
--

INSERT INTO `fee_accounts` (`id`, `code`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(14, '124', 'Class Fee', 'dfdfdsgf', NULL, '2018-04-20 10:55:17', '2018-04-24 07:55:19', 1),
(15, '334', 'Teacher Fee', 'jjjjhhv', NULL, '2018-04-24 07:55:10', '2018-04-25 07:25:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_groups`
--

CREATE TABLE `fee_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_groups`
--

INSERT INTO `fee_groups` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(4, 'Fee Test', 'dsfsf', NULL, '2018-05-19 10:29:42', '2018-05-19 10:33:58', 1),
(5, 'Fee Group test 3', 'Fee Group descrition', NULL, '2018-05-19 10:35:05', '2018-05-19 10:35:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_group_details`
--

CREATE TABLE `fee_group_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `fee_group_id` int(10) UNSIGNED NOT NULL,
  `fee_structure_id` int(10) UNSIGNED NOT NULL,
  `isapplicable_id` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_group_details`
--

INSERT INTO `fee_group_details` (`id`, `fee_group_id`, `fee_structure_id`, `isapplicable_id`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 3, 1, NULL, '2018-05-19 12:16:58', '2018-05-19 12:16:58', 1),
(2, 3, 4, 1, NULL, '2018-05-19 12:16:58', '2018-05-19 12:16:58', 1),
(3, 3, 5, 2, NULL, '2018-05-19 12:16:58', '2018-05-21 04:05:16', 1),
(4, 5, 3, 1, NULL, '2018-05-19 12:17:38', '2018-05-31 05:04:22', 1),
(5, 5, 4, 1, NULL, '2018-05-19 12:17:38', '2018-05-21 04:05:47', 1),
(6, 5, 5, 1, NULL, '2018-05-19 12:17:38', '2018-05-31 05:04:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_structures`
--

CREATE TABLE `fee_structures` (
  `id` int(10) UNSIGNED NOT NULL,
  `fee_account_id` int(10) UNSIGNED NOT NULL,
  `fine_scheme_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_refundable` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_structures`
--

INSERT INTO `fee_structures` (`id`, `fee_account_id`, `fine_scheme_id`, `code`, `name`, `is_refundable`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(3, 14, 4, '775', 'Fee First Stru name', 0, NULL, '2018-04-25 07:40:22', '2018-04-25 08:53:01', 1),
(4, 15, 3, '887', 'Secound fee  structuc name', 1, NULL, '2018-04-25 07:40:37', '2018-04-25 08:53:25', 1),
(5, 14, 4, '543', 'test fee structure name', 0, NULL, '2018-05-12 06:34:41', '2018-05-12 06:34:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure_amounts`
--

CREATE TABLE `fee_structure_amounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `fee_structure_id` int(10) UNSIGNED NOT NULL,
  `academic_year_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_structure_amounts`
--

INSERT INTO `fee_structure_amounts` (`id`, `fee_structure_id`, `academic_year_id`, `amount`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 1, '334.00', NULL, '2018-05-28 11:46:12', '2018-06-01 15:48:06', 1),
(8, 4, 1, '800.00', NULL, '2018-05-29 04:24:57', '2018-05-29 04:25:11', 1),
(9, 5, 1, '600.00', NULL, '2018-06-01 15:47:14', '2018-06-01 15:47:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure_last_dates`
--

CREATE TABLE `fee_structure_last_dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `fee_structure_id` int(10) UNSIGNED NOT NULL,
  `academic_year_id` int(10) UNSIGNED NOT NULL,
  `for_session_month_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `last_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_structure_last_dates`
--

INSERT INTO `fee_structure_last_dates` (`id`, `fee_structure_id`, `academic_year_id`, `for_session_month_id`, `amount`, `last_date`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(105, 3, 1, 3, '888.00', '2018-04-10', NULL, '2018-05-26 09:38:51', '2018-05-26 09:38:51', 1),
(106, 3, 1, 3, '888.00', '2018-05-10', NULL, '2018-05-26 09:38:51', '2018-05-26 09:38:51', 1),
(107, 3, 1, 3, '888.00', '2018-06-10', NULL, '2018-05-26 09:38:51', '2018-05-26 09:38:51', 1),
(108, 3, 1, 3, '888.00', '2018-07-10', NULL, '2018-05-26 09:38:51', '2018-05-26 09:38:51', 1),
(109, 3, 1, 3, '888.00', '2018-08-10', NULL, '2018-05-26 09:38:51', '2018-05-26 09:38:51', 1),
(110, 3, 1, 3, '888.00', '2018-09-10', NULL, '2018-05-26 09:38:51', '2018-05-26 09:38:51', 1),
(111, 3, 1, 3, '888.00', '2018-10-10', NULL, '2018-05-26 09:38:51', '2018-05-26 09:38:51', 1),
(112, 3, 1, 3, '888.00', '2018-11-10', NULL, '2018-05-26 09:38:51', '2018-05-26 09:38:51', 1),
(113, 3, 1, 3, '888.00', '2018-12-10', NULL, '2018-05-26 09:38:51', '2018-05-26 09:38:51', 1),
(114, 3, 1, 3, '888.00', '2019-01-10', NULL, '2018-05-26 09:38:51', '2018-05-26 09:38:51', 1),
(115, 3, 1, 3, '888.00', '2019-02-10', NULL, '2018-05-26 09:38:51', '2018-05-26 09:38:51', 1),
(116, 3, 1, 3, '888.00', '2019-03-10', NULL, '2018-05-26 09:38:51', '2018-05-26 09:38:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fine_periods`
--

CREATE TABLE `fine_periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fine_periods`
--

INSERT INTO `fine_periods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Daily', NULL, NULL),
(2, 'One Time', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fine_schemes`
--

CREATE TABLE `fine_schemes` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fine_amount1` decimal(8,2) NOT NULL,
  `fine_amount2` decimal(8,2) NOT NULL,
  `fine_amount3` decimal(8,2) NOT NULL,
  `day_after1` int(10) NOT NULL,
  `day_after2` int(10) NOT NULL,
  `fine_period_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fine_schemes`
--

INSERT INTO `fine_schemes` (`id`, `code`, `name`, `fine_amount1`, `fine_amount2`, `fine_amount3`, `day_after1`, `day_after2`, `fine_period_id`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(3, 'asd', 'Fine Scheme 2', '100.00', '200.00', '300.00', 2, 5, 2, NULL, '2018-04-23 06:51:22', '2018-04-25 07:26:15', 1),
(4, '544', 'Fine Scheme 1', '777.00', '777.00', '77.00', 77, 77, 1, NULL, '2018-04-24 07:55:40', '2018-04-25 07:26:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `for_session_months`
--

CREATE TABLE `for_session_months` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` int(11) NOT NULL,
  `times` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `for_session_months`
--

INSERT INTO `for_session_months` (`id`, `name`, `month`, `times`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Annual', 12, 1, NULL, NULL, NULL),
(2, 'Quarterly', 3, 4, NULL, NULL, NULL),
(3, 'Monthly', 1, 12, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `genders` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `genders`, `created_at`, `updated_at`) VALUES
(1, 'Male', '2018-03-13 18:30:00', NULL),
(2, 'Female', '2018-03-13 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guardian_relation_types`
--

CREATE TABLE `guardian_relation_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardian_relation_types`
--

INSERT INTO `guardian_relation_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Father', '2018-02-16 05:28:05', '2018-02-16 05:28:58'),
(2, 'Mother', '2018-02-15 18:30:00', NULL),
(3, 'Grand Father', '2018-02-15 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history_certificate_issues`
--

CREATE TABLE `history_certificate_issues` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `certificate_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_certificate_issues`
--

INSERT INTO `history_certificate_issues` (`id`, `student_id`, `certificate_type`, `file_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 20, 'SLC', '24_04_2018_01_44_47', '2018-04-11 11:17:12', '2018-04-24 08:14:47', 1),
(2, 21, 'MarkSheet', '14_04_2018_01_25_45', '2018-04-11 11:19:33', '2018-04-14 07:55:45', 1),
(3, 20, 'CLC', '14_04_2018_01_27_23', '2018-04-11 11:32:21', '2018-04-14 07:57:23', 1),
(4, 21, 'SLC', '11_04_2018_05_11_27', '2018-04-11 11:41:27', '2018-04-11 11:41:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `homeworks`
--

CREATE TABLE `homeworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `homework` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homeworks`
--

INSERT INTO `homeworks` (`id`, `class_id`, `section_id`, `homework`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(26, 1, 1, 'test', NULL, '2018-04-17 12:18:53', '2018-04-17 12:18:53', 1),
(27, 1, 1, 'test', NULL, '2018-04-19 06:10:58', '2018-04-19 06:10:58', 1),
(28, 1, 1, 'test', NULL, '2018-04-19 06:14:42', '2018-04-19 06:14:42', 1),
(29, 1, 2, 'ffdgdeg', NULL, '2018-04-24 08:13:31', '2018-04-24 08:13:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `income_ranges`
--

CREATE TABLE `income_ranges` (
  `id` int(10) UNSIGNED NOT NULL,
  `range` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_ranges`
--

INSERT INTO `income_ranges` (`id`, `range`, `created_at`, `updated_at`) VALUES
(1, '200000 to 500000', '2018-03-02 18:30:00', NULL),
(2, '600000 to 800000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `isapplicables`
--

CREATE TABLE `isapplicables` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `isapplicables`
--

INSERT INTO `isapplicables` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Yes', NULL, NULL),
(2, 'No', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `isoptionals`
--

CREATE TABLE `isoptionals` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `isoptionals`
--

INSERT INTO `isoptionals` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'compulsory', NULL, NULL),
(2, 'Optional', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_01_08_060224_createAdminTable', 1),
(8, '2014_10_12_000000_create_roles_table', 2),
(9, '2018_01_19_043704_create_user_types_table', 3),
(10, '2018_01_19_055520_create_role_admins_table', 4),
(14, '2018_01_27_100028_create_class_types_table', 5),
(15, '2018_01_27_102555_create_session_dates_table', 5),
(18, '2018_01_29_053448_create_class_fees_table', 7),
(19, '2018_01_29_083818_create_payment_types_table', 8),
(20, '2018_02_03_053536_create_minus_table', 9),
(21, '2018_02_03_073831_create_minu_types_table', 10),
(22, '2018_02_03_100951_create_user_activities_table', 10),
(23, '2018_01_27_104650_create_sections_table', 11),
(25, '2018_02_05_095551_create_section_types_table', 12),
(26, '2018_02_05_150007_create_user_class_types_table', 13),
(27, '2018_02_07_045434_create_subject_types_table', 14),
(29, '2018_02_08_091227_create_isoptionals_table', 15),
(30, '2018_02_07_045548_create_subjects_table', 16),
(31, '2018_02_09_112406_create_activities_table', 17),
(36, '2018_01_08_060312_createStudnetTable', 18),
(37, '2018_02_15_072110_create_guardian_relation_types_table', 19),
(38, '2018_02_15_072433_create_parents_infos_table', 20),
(39, '2018_02_15_072524_create_student_school_infos_table', 20),
(40, '2018_02_15_072554_create_student_medical_infos_table', 21),
(41, '2018_02_15_072712_create_student_sibling_infos_table', 21),
(42, '2018_02_15_072735_create_student_subjects_table', 21),
(43, '2018_02_15_073142_create_student_sport_hobbies_table', 21),
(44, '2018_02_15_073252_create_student_histories_table', 21),
(45, '2018_02_16_093307_create_document_types_table', 21),
(46, '2018_02_16_093353_create_documents_table', 21),
(47, '2018_03_01_090215_create_student__default__values_table', 22),
(48, '2018_03_01_091412_create_student_default_values_table', 23),
(49, '2018_03_03_044517_create_income_ranges_table', 24),
(50, '2018_03_14_052609_create_blood_groups_table', 25),
(51, '2018_03_14_052703_create_genders_table', 25),
(52, '2018_03_14_053005_create_categories_table', 25),
(53, '2018_03_14_054628_create_religions_table', 26),
(54, '2018_03_14_063614_create_student_statuses_table', 27),
(55, '2018_03_29_094105_create_certificate_issue_remarks_table', 28),
(56, '2018_03_29_094141_create_certificate_issue_details_table', 29),
(57, '2018_04_07_065252_create_homeworks_table', 30),
(58, '2018_04_11_163257_create_history_certificate_issues_table', 31),
(59, '2018_04_16_100445_create_academic_years_table', 32),
(60, '2018_04_16_100728_create_fee_accounts_table', 32),
(61, '2018_04_16_100758_create_fee_structures_table', 33),
(64, '2018_04_16_101305_create_class_feestructures_table', 33),
(65, '2018_04_23_105145_create_fine_periods_table', 34),
(66, '2018_04_16_101227_create_fine_schemes_table', 35),
(68, '2018_04_16_100854_create_fee_structure_last_dates_table', 36),
(69, '2018_04_25_170241_create_for_session_months_table', 36),
(70, '2018_05_17_111509_create_isapplicables_table', 37),
(75, '2018_05_18_150226_create_fee_groups_table', 38),
(76, '2018_05_18_154653_create_fee_group_details_table', 38),
(77, '2018_05_18_155248_create_concessions_table', 38),
(80, '2018_05_18_155348_create_student_fee_details_table', 39),
(81, '2018_05_28_162916_create_fee_structure_amounts_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `minus`
--

CREATE TABLE `minus` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `minu_id` int(191) UNSIGNED NOT NULL,
  `r_status` tinyint(1) NOT NULL DEFAULT '1',
  `w_status` tinyint(1) NOT NULL DEFAULT '1',
  `d_status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `minus`
--

INSERT INTO `minus` (`id`, `admin_id`, `minu_id`, `r_status`, `w_status`, `d_status`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, 1, 1, 1, NULL, '2018-02-02 18:30:00', '2018-02-10 01:25:26', 1),
(2, 3, 1, 1, 1, 1, NULL, '2018-02-02 18:30:00', '2018-02-03 05:00:05', 1),
(3, 1, 2, 1, 1, 0, NULL, '2018-02-02 18:30:00', '2018-02-10 01:43:42', 1),
(4, 1, 3, 1, 1, 1, NULL, '2018-02-02 18:30:00', '2018-02-07 00:50:20', 1),
(5, 3, 2, 1, 1, 1, NULL, '2018-02-02 18:30:00', '2018-02-03 04:14:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `minu_types`
--

CREATE TABLE `minu_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `minu_types`
--

INSERT INTO `minu_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Student', '2018-02-02 18:30:00', NULL),
(2, 'Class', '2018-02-02 18:30:00', NULL),
(3, 'class List', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parents_infos`
--

CREATE TABLE `parents_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `relation_type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_id` int(11) DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doa` date DEFAULT NULL,
  `office_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `islive` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents_infos`
--

INSERT INTO `parents_infos` (`id`, `student_id`, `relation_type_id`, `name`, `education`, `occupation`, `income_id`, `mobile`, `email`, `dob`, `doa`, `office_address`, `photo`, `islive`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 20, 1, 'jjjj', 'dfdf', 'dfdf', 1, '7903436369', 'admin@gmail.com', '2018-04-11', '2018-04-12', 'dfdsf', NULL, 0, NULL, '2018-04-12 07:06:35', '2018-04-12 07:06:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hindu', NULL, NULL),
(2, 'Muslim', NULL, NULL),
(3, 'Sikh', NULL, NULL),
(4, 'Christian', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2018-01-10 18:30:00', NULL),
(2, 'Principle', '2018-01-10 18:30:00', NULL),
(3, 'Teacher', NULL, NULL),
(4, 'Staff', NULL, NULL),
(5, 'Clerk Staff', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_admins`
--

CREATE TABLE `role_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_admins`
--

INSERT INTO `role_admins` (`id`, `role_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `section_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `class_id`, `section_id`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, '1', NULL, '2018-02-05 07:44:42', '2018-02-05 07:44:42', 1),
(2, 1, '2', NULL, '2018-02-05 07:44:42', '2018-02-05 07:44:42', 1),
(3, 1, '3', NULL, '2018-02-05 07:44:42', '2018-02-05 07:44:42', 1),
(4, 1, '4', NULL, '2018-02-05 07:44:42', '2018-02-05 07:44:42', 1),
(5, 2, '2', NULL, '2018-02-05 08:03:06', '2018-02-05 08:03:06', 1),
(6, 2, '1', NULL, '2018-02-05 08:03:32', '2018-02-05 08:03:32', 1),
(7, 2, '4', NULL, '2018-02-05 08:03:32', '2018-02-05 08:03:32', 1),
(8, 5, '1', NULL, '2018-02-08 01:42:39', '2018-02-08 01:42:39', 1),
(9, 5, '2', NULL, '2018-02-08 01:42:39', '2018-02-08 01:42:39', 1),
(10, 5, '3', NULL, '2018-02-08 01:42:39', '2018-02-08 01:42:39', 1),
(11, 5, '4', NULL, '2018-02-08 01:42:39', '2018-02-08 01:42:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `section_types`
--

CREATE TABLE `section_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_types`
--

INSERT INTO `section_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Section A', NULL, '2018-01-31 18:30:00', NULL),
(2, 'Section B', NULL, '2018-02-04 18:30:00', NULL),
(3, 'Section C', NULL, '2018-02-05 06:40:44', '2018-02-05 06:43:20'),
(4, 'Section D', NULL, '2018-02-05 06:43:30', '2018-02-05 06:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `session_dates`
--

CREATE TABLE `session_dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session_dates`
--

INSERT INTO `session_dates` (`id`, `date`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, '2018-2019', NULL, '2018-01-26 18:30:00', NULL, 1),
(2, '2019-2020', NULL, '2018-01-26 18:30:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `date_of_admission` date NOT NULL,
  `date_of_leaving` date NOT NULL,
  `date_of_activation` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tem_pass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `religion_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(191) UNSIGNED NOT NULL,
  `p_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_address` text COLLATE utf8mb4_unicode_ci,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `father_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `admin_id`, `name`, `nick_name`, `registration_no`, `admission_no`, `roll_no`, `session_id`, `class_id`, `section_id`, `date_of_admission`, `date_of_leaving`, `date_of_activation`, `email`, `username`, `password`, `tem_pass`, `father_name`, `mother_name`, `dob`, `gender_id`, `religion_id`, `category_id`, `p_address`, `c_address`, `state`, `city`, `pincode`, `father_mobile`, `mother_mobile`, `student_status_id`, `picture`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(18, 1, 'hhh', 'hhh', '66', '66', '66', 1, 2, 1, '2018-03-14', '2018-03-14', '2018-03-14', 'admin@gmail.com', 'ISKOOL1018', '$2y$10$hG4ReptjFKxKz5l37aI/5.8/Nw5brWywaQW2vC0/2o/o9YKipDsRO', 'gp26y9', 'hh', 'hh', '2018-03-14', 1, 1, 1, 'jj', 'jj', 'Haryana', 'Rohtak', 120041, '7777777', '777777', 1, '1521193215.png', 'qCoR74QndCRpV7Vn4w7jr6l3ZgiS76SfNywz4DZW1HF3pog6XeauZKLhuZxG', NULL, '2018-03-14 00:43:34', '2018-03-16 04:10:15', 1),
(19, 1, 'Ashish', 'jjj', 'ttt', 'tt', 'tt', 1, 2, 1, '2018-03-14', '2018-03-14', '2018-03-14', 'admsin@gmail.com', 'ISKOOL1019', '$2y$10$DHEe/PZB1bKFCazmPzNH9OLjOl9obuHSTSRYvd6uwwzU5ykeDHo/a', 'wqko0j', 'jjj', 'jjj', '2018-03-14', 1, 1, 1, 'SCF-196, 1st Floor, Behind Zad Global', 'SCF-196, 1st Floor, Behin \r\nHUDA Complex', 'Haryana', 'ROHTAK', 124001, '999', '999', 1, NULL, NULL, NULL, '2018-03-14 01:24:17', '2018-04-19 07:05:57', 1),
(20, 1, 'Ayush', 'jjj', '123', 'aggg', 'gggg', 1, 2, 1, '2018-03-14', '2018-03-14', '2018-03-14', 'admin@gmail.com', 'ISKOOL1020', '$2y$10$OiHh47BpPuwRJR8cCk84huP1lqnSVxcSDdd.LDEB/qgBs/ulT8k5O', 'm0w5jk', 'jjjj', 'kjkkkk', '2018-03-14', 1, 1, 1, 'fds', 'sds', 'Haryana', 'Rohtak', 120041, '9999', '9999', 1, NULL, NULL, NULL, '2018-03-14 02:52:20', '2018-03-14 02:52:20', 1),
(21, 1, 'dilipa', 'jj', '1234', 'dfdf', 'ddd', 1, 2, 2, '2018-03-14', '2018-03-14', '2018-03-14', 'admin@gmail.com', 'ISKOOL1021', '$2y$10$F9Y9dPFzBWXTXAGAPoJHv.cLqQFRZXyPTVUUMyMO0UnL2m2HYqeVy', 'gfml8d', 'jj', 'jj', '2018-03-14', 2, 2, 2, 'kkk', 'kkk', 'Haryana', 'Rohtak', 120041, '33', '333', 1, NULL, NULL, NULL, '2018-03-14 03:49:29', '2018-03-21 01:54:57', 1),
(23, 1, 'Ashok', 'jjj', 'a123', 'agggfdfddd', 'aaaaaa', 1, 2, 2, '2018-03-14', '2018-03-14', '2018-03-14', 'innsovusine@gmail.com', 'ISKOOL1023', '$2y$10$9uDRJno2LrQGrvUD/jWQJeqLYmqVlwg/BO.ge7PBZdy0NcAlG0iq6', 'z0flaq', 'jjj', 'jjj', '1970-01-01', 1, 1, 1, 'SCF-196, 1st Floor, Behind Zad Global School_x000D_\nHUDA Complex', 'SCF-196, 1st Floor, Behind Zad Global School_x000D_\nHUDA Complex', 'Haryana', 'ROHTAK', 124001, '999', '999', 1, NULL, NULL, NULL, '2018-03-15 03:48:29', '2018-03-15 03:48:29', 1),
(24, 1, 'Aysssss', 'jjj', '1111222', '1111222', '1111222', 1, 2, 4, '2018-03-14', '2018-03-14', '2018-03-14', 'innsovusine@gmail.com', 'ISKOOL1024', '$2y$10$rqvuyJDqSlBRTFP/AOkyguF1tShKX7dwJUM3OjPVAZJdc0bT9supO', '7j6gp9', 'jjj', 'jjj', '1970-01-01', 1, 1, 1, 'SCF-196, 1st Floor, Behind Zad Global School_x000D_\nHUDA Complex', 'SCF-196, 1st Floor, Behind Zad Global School_x000D_\nHUDA Complex', 'Haryana', 'ROHTAK', 124001, '999', '999', 1, NULL, NULL, NULL, '2018-03-15 03:56:00', '2018-03-15 03:56:00', 1),
(25, 1, 'Hahhhh', 'jjjaaa', '1111224', '1111224', '1111224', 1, 2, 4, '2018-03-14', '2018-03-14', '2018-03-14', 'admsin@gmail.com', 'ISKOOL1025', '$2y$10$6SS6/Mb87gZIA2JyHU8RB.1KCVvwMBPQ7I/.0CbZifK8K.8YJrDIe', 'mkoyz9', 'jjjj', 'kjkkkk', '1970-01-01', 1, 1, 1, 'fds', 'sds', 'Haryana', 'Rohtak', 120041, '9999', '9999', 1, NULL, NULL, NULL, '2018-03-15 03:56:00', '2018-03-15 03:56:01', 1),
(27, 1, 'Ayssssaas', 'jjj', 'gg1111aa222', '111aa1222', '11112aa22', 1, 2, 1, '2018-03-14', '2018-03-14', '2018-03-14', 'innsovusine@gmail.com', 'ISKOOL1027', '$2y$10$NUt5qVug7Ko3KvI3TFCiOO1n3V7DbI7FoefrVHsbV9clWwYSPo6m2', 'bt785u', 'jjj', 'jjj', '1970-01-01', 1, 1, 1, 'SCF-196, 1st Floor, Behind Zad Global School_x000D_\nHUDA Complex', 'SCF-196, 1st Floor, Behind Zad Global School_x000D_\nHUDA Complex', 'Haryana', 'ROHTAK', 124001, '999', '999', 1, NULL, NULL, NULL, '2018-03-15 03:59:42', '2018-03-15 04:07:34', 1),
(28, 1, 'Hahhhhaaa', 'jjjaaa', 'gg11112aa24', '1111aa224', '11112aa24', 1, 1, 1, '2018-03-14', '2018-03-14', '2018-03-14', 'admsin@gmail.com', 'ISKOOL1028', '$2y$10$NMwmlpMhUx6KG8d3bZ7uvOHaEsfZJu5gOdM0.hamPpENkLYZS2EcK', 'f9tjsr', 'jjjj', 'kjkkkk', '1970-01-01', 1, 1, 1, 'fds', 'sds', 'Haryana', 'Rohtak', 120041, '9999', '9999', 1, NULL, NULL, NULL, '2018-03-15 03:59:43', '2018-03-15 03:59:43', 1),
(30, 1, 'ddds', 'jjjsdsd', 'gg1111assssa222', '111assa1222', '1111sss2ddaa22', 1, 2, 2, '2018-03-14', '2018-03-14', '2018-03-14', 'innsovusine@gmail.com', 'ISKOOL1030', '$2y$10$Wj.xiGzxHvoa7.VACVgCVePMDBKvCSlaCQ2wfuwQ.o1FMI70riLIe', 'd8pcth', 'jjj', 'jjj', '1970-01-01', 1, 1, 1, 'SCF-196, 1st Floor, Behind Zad Global School_x000D_\nHUDA Complex', 'SCF-196, 1st Floor, Behind Zad Global School_x000D_\nHUDA Complex', 'Haryana', 'ROHTAK', 124001, '999', '999', 1, NULL, NULL, NULL, '2018-03-15 04:10:18', '2018-03-15 04:12:32', 1),
(31, 1, 'Hwsasass', 'jjjaasddsa', '31', '1111asssa224', '1111sssdd2aa24', 1, 2, 2, '2018-03-14', '2018-03-14', '2018-03-14', 'admsin@gmail.com', 'ISKOOL1031', '$2y$10$sfwOH6fvqK2eCLxk5NwQhe2eufIHoNEfHiu0zHWNZpwW8nVaRyz3u', '5vxqpt', 'jjjj', 'kjkkkk', '1970-01-01', 1, 1, 1, 'fds', 'sds', 'Haryana', 'Rohtak', 120041, '9999', '9999', 1, NULL, NULL, NULL, '2018-03-15 04:10:18', '2018-03-15 04:12:32', 1),
(32, 1, 'ddds', 'jjjsdsd', '32', '88', '88', 1, 5, 1, '2018-03-14', '2018-03-14', '2018-03-14', 'innsovusine@gmail.com', 'ISKOOL1032', '$2y$10$tXUn.5OZW.YOmXZCev/hPetR2nKiRrndi2UZbTmatAkmb2JW1aal2', 'xftlkb', 'jjj', 'jjj', '2018-03-14', 1, 1, 1, 'SCF-196, 1st Floor, Behind Zad Global School_x000D_\nHUDA Complex', 'SCF-196, 1st Floor, Behind Zad Global School_x000D_\nHUDA Complex', 'Haryana', 'ROHTAK', 124001, '999', '999', 1, NULL, NULL, NULL, '2018-03-15 04:15:27', '2018-03-15 05:49:06', 1),
(33, 1, 'Hwsasass', 'jjjaasddsa', '33', '99', '99', 1, 5, 1, '2018-03-14', '2018-03-14', '2018-03-14', 'admsin@gmail.com', 'ISKOOL1033', '$2y$10$02Loe2c2HsTTucUgbjp7muL3QIYUa3OscR/vXrNrtFZ99zIPUu/j6', 'ar9ibp', 'jjjj', 'kjkkkk', '2018-03-14', 1, 1, 1, 'fds', 'sds', 'Haryana', 'Rohtak', 120041, '9999', '9999', 1, NULL, NULL, NULL, '2018-03-15 04:15:28', '2018-03-15 05:49:07', 1),
(34, 1, 'sdfghjk', 'fghjk', '34', '4567', '4567', 1, 2, 2, '2018-03-21', '2018-03-21', '2018-03-21', 'admin@gmail.com', 'ISKOOL1034', '$2y$10$ughYjzoDFMwnzJNdVAXj6OgENJGIcY6dBcJL7NF9Ebt575wzyjhkK', 'tx05sq', 'ghjk', 'ghj', '2018-03-21', 1, 1, 1, 'jj', 'jj', 'Haryana', 'Rohtak', 120041, '999', '9999', 1, NULL, NULL, NULL, '2018-03-21 02:17:08', '2018-03-21 02:17:08', 1),
(35, 1, 'Dhiraj Kumar', 'Pushker', '35', '45676', '45676', 1, 2, 2, '2018-03-21', '2018-03-21', '2018-03-21', 'admin@gmail.com', 'ISKOOL1035', '$2y$10$jqAi.O7Lk.7JVyM5mBVdqe/r8i.a40tt6T3K4dWO2JFzWXURfy7Ge', 'kywah8', 'Dhiraj Chauhan', 'Manju Devi', '2018-03-21', 1, 1, 1, 'SCF-196, 1st Floor', 'SCF-196, 1st Floor, Behind RSF School', 'Haryana', 'Rohtak', 120041, '7903436369', '8083274127', 1, NULL, NULL, NULL, '2018-03-21 02:54:45', '2018-03-21 03:10:39', 1),
(36, 1, 'Ayush Chauhan', 'Pushker', '36', '456765', '456765', 1, 2, 2, '2018-03-21', '2018-03-21', '2018-03-21', 'admin@gmail.com', 'ISKOOL1036', '$2y$10$5NubnGz301osz9u9gyUSk.hyvlKEiL5oE7y14LH2tuTtU1p8hDIS.', '321gvn', 'Ashok Chauhan', 'Manju Devi', '2018-03-21', 1, 1, 1, 'jj', 'jj', 'Haryana', 'Rohtak', 120041, '7903436369', '8083274127', 1, NULL, NULL, NULL, '2018-03-21 02:56:49', '2018-03-21 02:56:49', 1),
(37, 1, 'Ayush Chauhan', 'Pushker', '37', '45676566', '45676566', 1, 2, 2, '2018-03-21', '2018-03-21', '2018-03-21', 'admin@gmail.com', 'ISKOOL1037', '$2y$10$oaNjfMa.dsa5MNQOoqgUl.8OKvBmzch/HOwrKqQ6RTs.VVXd5YC/.', 'ng1m8y', 'Ashok Chauhan', 'Manju Devi', '2018-03-21', 1, 1, 1, 'jj', 'jj', 'Haryana', 'Rohtak', 120041, '7903436369', '8083274127', 1, NULL, NULL, NULL, '2018-03-21 02:59:18', '2018-03-21 02:59:18', 1),
(38, 1, 'Ashush Khurana', 'Dilip', '38', 'RAT5847', '666644', 1, 2, 2, '2018-03-21', '2018-03-21', '2018-03-21', 'admin@gmail.com', 'ISKOOL1038', '$2y$10$nK4KkEHSBCQtVTxfAcMWLuy9iXM5k9t6lHGrbLQLIm7etTkNb6MDq', 'yrjow4', 'Ashish khurana', 'Mahish', '2018-03-21', 1, 1, 1, 'RAT/ BH Arya Nager', 'RAT/ BH Arya Nager', 'Haryana', 'Rohtak', 120041, '888888888888', '888888888888', 1, '1521622547.png', NULL, NULL, '2018-03-21 03:19:28', '2018-03-21 03:25:47', 1),
(39, 1, 'Rajiv', 'jjjsdswwd', '39', '788', '788', 1, 1, 1, '2018-03-14', '2018-03-14', '2018-03-14', 'innsovusine@gmail.com', 'ISKOOL1039', '$2y$10$a5WuA3clRqb3f.1g5LixzOtPG8z98rIx1Le7NsTqQ2ohUzqTON.m6', 'ojc1x0', 'jjj', 'jjj', '2018-03-14', 1, 1, 1, 'SCF-196, 1st Floor, Behind Zad Global', 'SCF-196, 1st Floor\r\nHUDA Complex', 'Haryana', 'ROHTAK', 124001, '999', '999', 1, '1522924011.png', NULL, NULL, '2018-03-23 02:35:21', '2018-04-05 06:10:10', 1),
(40, 1, 'Sonu', 'jjjaaswwddsa', '40', '7799', '8899', 1, 1, 1, '2018-03-14', '2018-03-14', '2018-03-14', 'admsin@gmail.com', 'ISKOOL1040', '$2y$10$uHzFfymWUMOobeD9aG4zDeWdEmZ.1AUAg3FOdUHxlwTDE7WaL0BDq', 'oatgjb', 'jjjj', 'kjkkkk', '2018-03-14', 1, 1, 1, 'fds', 'sds', 'Haryana', 'Rohtak', 120041, '9999', '9999', 1, NULL, NULL, NULL, '2018-03-23 02:35:21', '2018-03-23 02:35:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_default_values`
--

CREATE TABLE `student_default_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `religion_id` int(10) UNSIGNED DEFAULT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_default_values`
--

INSERT INTO `student_default_values` (`id`, `class_id`, `section_id`, `religion_id`, `gender_id`, `category_id`, `state`, `city`, `pincode`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 5, 1, 3, 1, 2, 'Haryana', 'Rohtak', '120041', NULL, NULL, '2018-04-05 06:02:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_fee_details`
--

CREATE TABLE `student_fee_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `fee_structure_last_date_id` int(10) UNSIGNED NOT NULL,
  `concession_id` int(10) UNSIGNED NOT NULL,
  `fee_amount` decimal(8,2) NOT NULL,
  `concession_amount` decimal(8,2) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `refundable` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_histories`
--

CREATE TABLE `student_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_medical_infos`
--

CREATE TABLE `student_medical_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `bloodgroup_id` int(10) UNSIGNED DEFAULT NULL,
  `hb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `narration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vision` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complextion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alergey` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alergey_vacc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_handicapped` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_marks1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_marks2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dental` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bp_lower` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bp_uper` int(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_medical_infos`
--

INSERT INTO `student_medical_infos` (`id`, `student_id`, `ondate`, `bloodgroup_id`, `hb`, `weight`, `height`, `narration`, `vision`, `complextion`, `alergey`, `alergey_vacc`, `physical_handicapped`, `id_marks1`, `id_marks2`, `dental`, `bp_lower`, `bp_uper`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(24, 16, '2018-03-10', 2, 'hh', '76kg', '167cm', 'yhhhh', 'hhhh', 'hhh', 'hhh', 'hhhh', 'h', 'hhhh', 'h', 'hh', 'h', NULL, NULL, '2018-03-10 01:45:28', '2018-03-10 01:45:28', 1),
(25, 20, '2018-03-19', 2, '14', '77', '77', '77', '77', 'Light', 'No', 'hhh', 'hh', 'hhh', 'hh', 'hhh', '34', 56, NULL, '2018-03-19 00:33:21', '2018-03-19 00:33:21', 1),
(26, 20, '2018-03-19', 1, '14', '77', '77.6', '77', '7.9', 'Light', 'No', '88', '88', '88', '88', 'jjj', '999', 99, NULL, '2018-03-19 03:45:41', '2018-03-19 03:45:41', 1),
(27, 20, '2018-03-19', 2, '14', '88', '88', '88', '888', 'Light', 'No', '88', '88', '88', '8', '8', '8', 8, NULL, '2018-03-19 04:13:43', '2018-03-19 04:13:43', 1),
(28, 20, '2018-03-19', 2, '14', '88', '88', '88', '888', 'Light', 'No', '88', '88', '88', '8', '8', '8', 8, NULL, '2018-03-19 04:14:28', '2018-03-19 04:14:28', 1),
(29, 21, '2018-03-21', 1, '14', '88', '88', '88', '88', 'Light', 'No', 'kk', 'kk', 'kk', 'kk', 'kk', '80', 120, NULL, '2018-03-21 01:56:33', '2018-03-21 01:56:33', 1),
(30, 28, '2018-03-22', 1, '14', '77', '77', '77', '77', 'Light', 'No', 'uu', 'uu', 'uuu', 'uu', 'uuu', '80', 120, NULL, '2018-03-22 06:57:07', '2018-03-22 06:57:07', 1),
(31, 28, '2018-03-23', 1, '14', '88', '88', '88', '88', 'Light', 'No', 'uuu', 'uuu', 'uuu', 'uuu', 'uuu', '80', 120, NULL, '2018-03-22 10:08:39', '2018-03-22 10:08:39', 1),
(32, 39, '2018-04-04', 3, '14', '88', '88', '88', '8', 'Light', 'No', 'jjj', 'hh', 'hh', 'hhh', 'hhh', '80', 120, NULL, '2018-04-04 06:37:54', '2018-04-06 05:39:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_school_infos`
--

CREATE TABLE `student_school_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `house` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medium` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_school` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_activity` int(11) DEFAULT NULL,
  `anyreward` int(11) DEFAULT NULL,
  `narration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_sibling_infos`
--

CREATE TABLE `student_sibling_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_sibling_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_sport_hobbies`
--

CREATE TABLE `student_sport_hobbies` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `sports_activity_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_statuses`
--

CREATE TABLE `student_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_statuses`
--

INSERT INTO `student_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Active', NULL, NULL),
(2, 'New Addmission', NULL, NULL),
(3, 'Pass Out', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `subject_type_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `isoptional_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`id`, `student_id`, `subject_type_id`, `session_id`, `isoptional_id`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(45, 18, 2, 1, 1, NULL, '2018-03-14 00:43:34', '2018-03-14 00:43:34', 1),
(46, 18, 6, 1, 1, NULL, '2018-03-14 00:43:34', '2018-03-14 00:43:34', 1),
(47, 18, 7, 1, 2, NULL, '2018-03-14 00:43:34', '2018-03-14 00:43:34', 1),
(48, 18, 8, 1, 1, NULL, '2018-03-14 00:43:34', '2018-03-14 00:43:34', 1),
(49, 18, 9, 1, 1, NULL, '2018-03-14 00:43:34', '2018-03-14 00:43:34', 1),
(50, 19, 2, 1, 1, NULL, '2018-03-14 01:24:17', '2018-03-14 01:24:17', 1),
(51, 19, 6, 1, 1, NULL, '2018-03-14 01:24:17', '2018-03-14 01:24:17', 1),
(52, 19, 7, 1, 2, NULL, '2018-03-14 01:24:17', '2018-03-14 01:24:17', 1),
(53, 19, 8, 1, 1, NULL, '2018-03-14 01:24:17', '2018-03-14 01:24:17', 1),
(54, 19, 9, 1, 1, NULL, '2018-03-14 01:24:17', '2018-03-14 01:24:17', 1),
(55, 20, 2, 1, 1, NULL, '2018-03-14 02:52:20', '2018-03-14 02:52:20', 1),
(56, 20, 6, 1, 1, NULL, '2018-03-14 02:52:20', '2018-03-14 02:52:20', 1),
(57, 20, 7, 1, 2, NULL, '2018-03-14 02:52:20', '2018-03-14 02:52:20', 1),
(58, 20, 8, 1, 1, NULL, '2018-03-14 02:52:20', '2018-03-14 02:52:20', 1),
(59, 20, 9, 1, 1, NULL, '2018-03-14 02:52:20', '2018-03-14 02:52:20', 1),
(60, 21, 2, 1, 1, NULL, '2018-03-14 03:49:29', '2018-03-14 03:49:29', 1),
(61, 21, 6, 1, 1, NULL, '2018-03-14 03:49:29', '2018-03-14 03:49:29', 1),
(62, 21, 7, 1, 2, NULL, '2018-03-14 03:49:29', '2018-03-14 03:49:29', 1),
(63, 21, 8, 1, 1, NULL, '2018-03-14 03:49:29', '2018-03-14 03:49:29', 1),
(64, 21, 9, 1, 1, NULL, '2018-03-14 03:49:29', '2018-03-14 03:49:29', 1),
(65, 23, 2, 1, 1, NULL, '2018-03-15 03:48:29', '2018-03-15 03:48:29', 1),
(66, 23, 6, 1, 1, NULL, '2018-03-15 03:48:29', '2018-03-15 03:48:29', 1),
(67, 23, 7, 1, 2, NULL, '2018-03-15 03:48:30', '2018-03-15 03:48:30', 1),
(68, 23, 8, 1, 1, NULL, '2018-03-15 03:48:30', '2018-03-15 03:48:30', 1),
(69, 23, 9, 1, 1, NULL, '2018-03-15 03:48:30', '2018-03-15 03:48:30', 1),
(70, 24, 2, 1, 1, NULL, '2018-03-15 03:56:00', '2018-03-15 03:56:00', 1),
(71, 24, 6, 1, 1, NULL, '2018-03-15 03:56:00', '2018-03-15 03:56:00', 1),
(72, 24, 7, 1, 2, NULL, '2018-03-15 03:56:00', '2018-03-15 03:56:00', 1),
(73, 24, 8, 1, 1, NULL, '2018-03-15 03:56:00', '2018-03-15 03:56:00', 1),
(74, 24, 9, 1, 1, NULL, '2018-03-15 03:56:00', '2018-03-15 03:56:00', 1),
(75, 25, 2, 1, 1, NULL, '2018-03-15 03:56:01', '2018-03-15 03:56:01', 1),
(76, 25, 6, 1, 1, NULL, '2018-03-15 03:56:01', '2018-03-15 03:56:01', 1),
(77, 25, 7, 1, 2, NULL, '2018-03-15 03:56:01', '2018-03-15 03:56:01', 1),
(78, 25, 8, 1, 1, NULL, '2018-03-15 03:56:01', '2018-03-15 03:56:01', 1),
(79, 25, 9, 1, 1, NULL, '2018-03-15 03:56:01', '2018-03-15 03:56:01', 1),
(80, 27, 2, 1, 1, NULL, '2018-03-15 03:59:42', '2018-03-15 03:59:42', 1),
(81, 27, 6, 1, 2, NULL, '2018-03-15 03:59:42', '2018-03-15 03:59:42', 1),
(82, 27, 7, 1, 1, NULL, '2018-03-15 03:59:42', '2018-03-15 03:59:42', 1),
(83, 27, 8, 1, 1, NULL, '2018-03-15 03:59:42', '2018-03-15 03:59:42', 1),
(84, 28, 2, 1, 1, NULL, '2018-03-15 03:59:43', '2018-03-15 03:59:43', 1),
(85, 28, 6, 1, 2, NULL, '2018-03-15 03:59:43', '2018-03-15 03:59:43', 1),
(86, 28, 7, 1, 1, NULL, '2018-03-15 03:59:43', '2018-03-15 03:59:43', 1),
(87, 28, 8, 1, 1, NULL, '2018-03-15 03:59:43', '2018-03-15 03:59:43', 1),
(88, 27, 2, 1, 1, NULL, '2018-03-15 04:07:34', '2018-03-15 04:07:34', 1),
(89, 27, 6, 1, 1, NULL, '2018-03-15 04:07:34', '2018-03-15 04:07:34', 1),
(90, 27, 7, 1, 2, NULL, '2018-03-15 04:07:34', '2018-03-15 04:07:34', 1),
(91, 27, 8, 1, 1, NULL, '2018-03-15 04:07:34', '2018-03-15 04:07:34', 1),
(92, 27, 9, 1, 1, NULL, '2018-03-15 04:07:34', '2018-03-15 04:07:34', 1),
(93, 30, 2, 1, 1, NULL, '2018-03-15 04:10:18', '2018-03-15 04:10:18', 1),
(94, 30, 6, 1, 1, NULL, '2018-03-15 04:10:18', '2018-03-15 04:10:18', 1),
(95, 30, 7, 1, 2, NULL, '2018-03-15 04:10:18', '2018-03-15 04:10:18', 1),
(96, 30, 8, 1, 1, NULL, '2018-03-15 04:10:18', '2018-03-15 04:10:18', 1),
(97, 30, 9, 1, 1, NULL, '2018-03-15 04:10:18', '2018-03-15 04:10:18', 1),
(98, 31, 2, 1, 1, NULL, '2018-03-15 04:10:19', '2018-03-15 04:10:19', 1),
(99, 31, 6, 1, 1, NULL, '2018-03-15 04:10:19', '2018-03-15 04:10:19', 1),
(100, 31, 7, 1, 2, NULL, '2018-03-15 04:10:19', '2018-03-15 04:10:19', 1),
(101, 31, 8, 1, 1, NULL, '2018-03-15 04:10:19', '2018-03-15 04:10:19', 1),
(102, 31, 9, 1, 1, NULL, '2018-03-15 04:10:19', '2018-03-15 04:10:19', 1),
(103, 30, 2, 1, 1, NULL, '2018-03-15 04:12:32', '2018-03-15 04:12:32', 1),
(104, 30, 6, 1, 1, NULL, '2018-03-15 04:12:32', '2018-03-15 04:12:32', 1),
(105, 30, 7, 1, 2, NULL, '2018-03-15 04:12:32', '2018-03-15 04:12:32', 1),
(106, 30, 8, 1, 1, NULL, '2018-03-15 04:12:32', '2018-03-15 04:12:32', 1),
(107, 30, 9, 1, 1, NULL, '2018-03-15 04:12:32', '2018-03-15 04:12:32', 1),
(108, 31, 2, 1, 1, NULL, '2018-03-15 04:12:33', '2018-03-15 04:12:33', 1),
(109, 31, 6, 1, 1, NULL, '2018-03-15 04:12:33', '2018-03-15 04:12:33', 1),
(110, 31, 7, 1, 2, NULL, '2018-03-15 04:12:33', '2018-03-15 04:12:33', 1),
(111, 31, 8, 1, 1, NULL, '2018-03-15 04:12:33', '2018-03-15 04:12:33', 1),
(112, 31, 9, 1, 1, NULL, '2018-03-15 04:12:33', '2018-03-15 04:12:33', 1),
(113, 32, 2, 1, 1, NULL, '2018-03-15 04:15:27', '2018-03-15 04:15:27', 1),
(114, 32, 6, 1, 1, NULL, '2018-03-15 04:15:27', '2018-03-15 04:15:27', 1),
(115, 32, 7, 1, 2, NULL, '2018-03-15 04:15:27', '2018-03-15 04:15:27', 1),
(116, 32, 8, 1, 1, NULL, '2018-03-15 04:15:28', '2018-03-15 04:15:28', 1),
(117, 32, 9, 1, 1, NULL, '2018-03-15 04:15:28', '2018-03-15 04:15:28', 1),
(118, 33, 2, 1, 1, NULL, '2018-03-15 04:15:28', '2018-03-15 04:15:28', 1),
(119, 33, 6, 1, 1, NULL, '2018-03-15 04:15:28', '2018-03-15 04:15:28', 1),
(120, 33, 7, 1, 2, NULL, '2018-03-15 04:15:28', '2018-03-15 04:15:28', 1),
(121, 33, 8, 1, 1, NULL, '2018-03-15 04:15:28', '2018-03-15 04:15:28', 1),
(122, 33, 9, 1, 1, NULL, '2018-03-15 04:15:28', '2018-03-15 04:15:28', 1),
(123, 32, 2, 1, 1, NULL, '2018-03-15 04:23:15', '2018-03-15 04:23:15', 1),
(124, 32, 6, 1, 1, NULL, '2018-03-15 04:23:15', '2018-03-15 04:23:15', 1),
(125, 32, 7, 1, 2, NULL, '2018-03-15 04:23:15', '2018-03-15 04:23:15', 1),
(126, 32, 8, 1, 1, NULL, '2018-03-15 04:23:15', '2018-03-15 04:23:15', 1),
(127, 32, 9, 1, 1, NULL, '2018-03-15 04:23:15', '2018-03-15 04:23:15', 1),
(128, 33, 2, 1, 1, NULL, '2018-03-15 04:23:16', '2018-03-15 04:23:16', 1),
(129, 33, 6, 1, 1, NULL, '2018-03-15 04:23:16', '2018-03-15 04:23:16', 1),
(130, 33, 7, 1, 2, NULL, '2018-03-15 04:23:16', '2018-03-15 04:23:16', 1),
(131, 33, 8, 1, 1, NULL, '2018-03-15 04:23:16', '2018-03-15 04:23:16', 1),
(132, 33, 9, 1, 1, NULL, '2018-03-15 04:23:16', '2018-03-15 04:23:16', 1),
(133, 32, 2, 1, 1, NULL, '2018-03-15 04:34:08', '2018-03-15 04:34:08', 1),
(134, 32, 6, 1, 1, NULL, '2018-03-15 04:34:08', '2018-03-15 04:34:08', 1),
(135, 32, 7, 1, 2, NULL, '2018-03-15 04:34:08', '2018-03-15 04:34:08', 1),
(136, 32, 8, 1, 1, NULL, '2018-03-15 04:34:08', '2018-03-15 04:34:08', 1),
(137, 32, 9, 1, 1, NULL, '2018-03-15 04:34:08', '2018-03-15 04:34:08', 1),
(138, 33, 2, 1, 1, NULL, '2018-03-15 04:34:08', '2018-03-15 04:34:08', 1),
(139, 33, 6, 1, 1, NULL, '2018-03-15 04:34:08', '2018-03-15 04:34:08', 1),
(140, 33, 7, 1, 2, NULL, '2018-03-15 04:34:08', '2018-03-15 04:34:08', 1),
(141, 33, 8, 1, 1, NULL, '2018-03-15 04:34:08', '2018-03-15 04:34:08', 1),
(142, 33, 9, 1, 1, NULL, '2018-03-15 04:34:08', '2018-03-15 04:34:08', 1),
(143, 32, 2, 1, 1, NULL, '2018-03-15 04:35:50', '2018-03-15 04:35:50', 1),
(144, 32, 6, 1, 1, NULL, '2018-03-15 04:35:50', '2018-03-15 04:35:50', 1),
(145, 32, 7, 1, 2, NULL, '2018-03-15 04:35:50', '2018-03-15 04:35:50', 1),
(146, 32, 8, 1, 1, NULL, '2018-03-15 04:35:50', '2018-03-15 04:35:50', 1),
(147, 32, 9, 1, 1, NULL, '2018-03-15 04:35:50', '2018-03-15 04:35:50', 1),
(148, 33, 2, 1, 1, NULL, '2018-03-15 04:35:50', '2018-03-15 04:35:50', 1),
(149, 33, 6, 1, 1, NULL, '2018-03-15 04:35:50', '2018-03-15 04:35:50', 1),
(150, 33, 7, 1, 2, NULL, '2018-03-15 04:35:50', '2018-03-15 04:35:50', 1),
(151, 33, 8, 1, 1, NULL, '2018-03-15 04:35:50', '2018-03-15 04:35:50', 1),
(152, 33, 9, 1, 1, NULL, '2018-03-15 04:35:51', '2018-03-15 04:35:51', 1),
(153, 32, 2, 1, 1, NULL, '2018-03-15 04:41:25', '2018-03-15 04:41:25', 1),
(154, 32, 6, 1, 1, NULL, '2018-03-15 04:41:25', '2018-03-15 04:41:25', 1),
(155, 32, 7, 1, 2, NULL, '2018-03-15 04:41:25', '2018-03-15 04:41:25', 1),
(156, 32, 8, 1, 1, NULL, '2018-03-15 04:41:25', '2018-03-15 04:41:25', 1),
(157, 32, 9, 1, 1, NULL, '2018-03-15 04:41:25', '2018-03-15 04:41:25', 1),
(158, 33, 2, 1, 1, NULL, '2018-03-15 04:41:25', '2018-03-15 04:41:25', 1),
(159, 33, 6, 1, 1, NULL, '2018-03-15 04:41:25', '2018-03-15 04:41:25', 1),
(160, 33, 7, 1, 2, NULL, '2018-03-15 04:41:25', '2018-03-15 04:41:25', 1),
(161, 33, 8, 1, 1, NULL, '2018-03-15 04:41:25', '2018-03-15 04:41:25', 1),
(162, 33, 9, 1, 1, NULL, '2018-03-15 04:41:25', '2018-03-15 04:41:25', 1),
(163, 32, 2, 1, 1, NULL, '2018-03-15 05:01:46', '2018-03-15 05:01:46', 1),
(164, 32, 6, 1, 1, NULL, '2018-03-15 05:01:46', '2018-03-15 05:01:46', 1),
(165, 32, 7, 1, 2, NULL, '2018-03-15 05:01:46', '2018-03-15 05:01:46', 1),
(166, 32, 8, 1, 1, NULL, '2018-03-15 05:01:46', '2018-03-15 05:01:46', 1),
(167, 32, 9, 1, 1, NULL, '2018-03-15 05:01:46', '2018-03-15 05:01:46', 1),
(168, 33, 2, 1, 1, NULL, '2018-03-15 05:01:46', '2018-03-15 05:01:46', 1),
(169, 33, 6, 1, 1, NULL, '2018-03-15 05:01:46', '2018-03-15 05:01:46', 1),
(170, 33, 7, 1, 2, NULL, '2018-03-15 05:01:46', '2018-03-15 05:01:46', 1),
(171, 33, 8, 1, 1, NULL, '2018-03-15 05:01:46', '2018-03-15 05:01:46', 1),
(172, 33, 9, 1, 1, NULL, '2018-03-15 05:01:46', '2018-03-15 05:01:46', 1),
(173, 32, 2, 1, 1, NULL, '2018-03-15 05:03:09', '2018-03-15 05:03:09', 1),
(174, 32, 6, 1, 1, NULL, '2018-03-15 05:03:09', '2018-03-15 05:03:09', 1),
(175, 32, 7, 1, 2, NULL, '2018-03-15 05:03:09', '2018-03-15 05:03:09', 1),
(176, 32, 8, 1, 1, NULL, '2018-03-15 05:03:09', '2018-03-15 05:03:09', 1),
(177, 32, 9, 1, 1, NULL, '2018-03-15 05:03:09', '2018-03-15 05:03:09', 1),
(178, 33, 2, 1, 1, NULL, '2018-03-15 05:03:09', '2018-03-15 05:03:09', 1),
(179, 33, 6, 1, 1, NULL, '2018-03-15 05:03:09', '2018-03-15 05:03:09', 1),
(180, 33, 7, 1, 2, NULL, '2018-03-15 05:03:10', '2018-03-15 05:03:10', 1),
(181, 33, 8, 1, 1, NULL, '2018-03-15 05:03:10', '2018-03-15 05:03:10', 1),
(182, 33, 9, 1, 1, NULL, '2018-03-15 05:03:10', '2018-03-15 05:03:10', 1),
(183, 32, 2, 1, 1, NULL, '2018-03-15 05:25:17', '2018-03-15 05:25:17', 1),
(184, 32, 6, 1, 1, NULL, '2018-03-15 05:25:17', '2018-03-15 05:25:17', 1),
(185, 32, 7, 1, 2, NULL, '2018-03-15 05:25:17', '2018-03-15 05:25:17', 1),
(186, 32, 8, 1, 1, NULL, '2018-03-15 05:25:17', '2018-03-15 05:25:17', 1),
(187, 32, 9, 1, 1, NULL, '2018-03-15 05:25:17', '2018-03-15 05:25:17', 1),
(188, 33, 2, 1, 1, NULL, '2018-03-15 05:25:18', '2018-03-15 05:25:18', 1),
(189, 33, 6, 1, 1, NULL, '2018-03-15 05:25:18', '2018-03-15 05:25:18', 1),
(190, 33, 7, 1, 2, NULL, '2018-03-15 05:25:18', '2018-03-15 05:25:18', 1),
(191, 33, 8, 1, 1, NULL, '2018-03-15 05:25:18', '2018-03-15 05:25:18', 1),
(192, 33, 9, 1, 1, NULL, '2018-03-15 05:25:18', '2018-03-15 05:25:18', 1),
(193, 34, 2, 1, 1, NULL, '2018-03-21 02:17:08', '2018-03-21 02:17:08', 1),
(194, 34, 6, 1, 1, NULL, '2018-03-21 02:17:08', '2018-03-21 02:17:08', 1),
(195, 34, 7, 1, 2, NULL, '2018-03-21 02:17:08', '2018-03-21 02:17:08', 1),
(196, 34, 8, 1, 1, NULL, '2018-03-21 02:17:09', '2018-03-21 02:17:09', 1),
(197, 34, 9, 1, 1, NULL, '2018-03-21 02:17:09', '2018-03-21 02:17:09', 1),
(198, 35, 2, 1, 1, NULL, '2018-03-21 02:54:45', '2018-03-21 02:54:45', 1),
(199, 35, 6, 1, 1, NULL, '2018-03-21 02:54:45', '2018-03-21 02:54:45', 1),
(200, 35, 7, 1, 2, NULL, '2018-03-21 02:54:45', '2018-03-21 02:54:45', 1),
(201, 35, 8, 1, 1, NULL, '2018-03-21 02:54:45', '2018-03-21 02:54:45', 1),
(202, 35, 9, 1, 1, NULL, '2018-03-21 02:54:45', '2018-03-21 02:54:45', 1),
(203, 36, 2, 1, 1, NULL, '2018-03-21 02:56:49', '2018-03-21 02:56:49', 1),
(204, 36, 6, 1, 1, NULL, '2018-03-21 02:56:49', '2018-03-21 02:56:49', 1),
(205, 36, 7, 1, 2, NULL, '2018-03-21 02:56:50', '2018-03-21 02:56:50', 1),
(206, 36, 8, 1, 1, NULL, '2018-03-21 02:56:50', '2018-03-21 02:56:50', 1),
(207, 36, 9, 1, 1, NULL, '2018-03-21 02:56:50', '2018-03-21 02:56:50', 1),
(208, 37, 2, 1, 1, NULL, '2018-03-21 02:59:18', '2018-03-21 02:59:18', 1),
(209, 37, 6, 1, 1, NULL, '2018-03-21 02:59:18', '2018-03-21 02:59:18', 1),
(210, 37, 7, 1, 2, NULL, '2018-03-21 02:59:18', '2018-03-21 02:59:18', 1),
(211, 37, 8, 1, 1, NULL, '2018-03-21 02:59:18', '2018-03-21 02:59:18', 1),
(212, 37, 9, 1, 1, NULL, '2018-03-21 02:59:18', '2018-03-21 02:59:18', 1),
(213, 38, 2, 1, 1, NULL, '2018-03-21 03:19:29', '2018-03-21 03:19:29', 1),
(214, 38, 6, 1, 1, NULL, '2018-03-21 03:19:29', '2018-03-21 03:19:29', 1),
(215, 38, 7, 1, 2, NULL, '2018-03-21 03:19:29', '2018-03-21 03:19:29', 1),
(216, 38, 8, 1, 1, NULL, '2018-03-21 03:19:29', '2018-03-21 03:19:29', 1),
(217, 38, 9, 1, 1, NULL, '2018-03-21 03:19:29', '2018-03-21 03:19:29', 1),
(218, 39, 2, 1, 1, NULL, '2018-03-23 02:35:21', '2018-03-23 02:35:21', 1),
(219, 39, 6, 1, 2, NULL, '2018-03-23 02:35:21', '2018-03-23 02:35:21', 1),
(220, 39, 7, 1, 1, NULL, '2018-03-23 02:35:21', '2018-03-23 02:35:21', 1),
(221, 39, 8, 1, 1, NULL, '2018-03-23 02:35:21', '2018-03-23 02:35:21', 1),
(222, 40, 2, 1, 1, NULL, '2018-03-23 02:35:21', '2018-03-23 02:35:21', 1),
(223, 40, 6, 1, 2, NULL, '2018-03-23 02:35:21', '2018-03-23 02:35:21', 1),
(224, 40, 7, 1, 1, NULL, '2018-03-23 02:35:21', '2018-03-23 02:35:21', 1),
(225, 40, 8, 1, 1, NULL, '2018-03-23 02:35:22', '2018-03-23 02:35:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student__default__values`
--

CREATE TABLE `student__default__values` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student__default__values`
--

INSERT INTO `student__default__values` (`id`, `class_id`, `section_id`, `religion`, `category`, `state`, `city`, `pincode`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, 'indian', '1', 'Haryana', 'Rohtak', '120041', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subjectType_id` int(10) UNSIGNED NOT NULL,
  `classType_id` int(10) UNSIGNED NOT NULL,
  `isoptional_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectType_id`, `classType_id`, `isoptional_id`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, 1, 1, NULL, '2018-02-09 00:02:59', '2018-02-09 04:45:33', 1),
(2, 6, 1, 2, NULL, '2018-02-09 00:03:00', '2018-02-09 01:09:12', 1),
(3, 7, 1, 1, NULL, '2018-02-09 00:03:00', '2018-02-09 00:29:44', 1),
(7, 2, 3, 1, NULL, '2018-02-09 00:52:56', '2018-02-09 00:52:56', 1),
(8, 6, 3, 1, NULL, '2018-02-09 00:52:57', '2018-02-09 00:52:57', 1),
(9, 7, 3, 2, NULL, '2018-02-09 00:52:57', '2018-02-09 04:18:00', 1),
(11, 2, 2, 1, NULL, '2018-02-09 00:56:42', '2018-02-09 01:16:49', 1),
(12, 6, 2, 1, NULL, '2018-02-09 00:56:42', '2018-02-09 05:07:53', 1),
(13, 7, 2, 1, NULL, '2018-02-09 00:56:42', '2018-04-24 08:12:37', 1),
(14, 7, 4, 1, NULL, '2018-02-09 00:58:43', '2018-02-09 00:58:43', 1),
(15, 8, 4, 1, NULL, '2018-02-09 03:50:38', '2018-02-09 03:50:38', 1),
(16, 9, 4, 1, NULL, '2018-02-09 04:06:51', '2018-02-09 04:06:51', 1),
(17, 6, 4, 1, NULL, '2018-02-09 04:07:14', '2018-02-09 04:09:08', 1),
(18, 2, 4, 1, NULL, '2018-02-09 04:09:21', '2018-02-09 04:09:21', 1),
(19, 8, 2, 1, NULL, '2018-02-09 04:15:49', '2018-02-09 05:07:40', 1),
(20, 8, 1, 1, NULL, '2018-02-09 04:18:55', '2018-02-09 04:18:55', 1),
(21, 9, 2, 1, NULL, '2018-02-09 05:03:45', '2018-02-09 05:03:45', 1),
(22, 8, 3, 1, NULL, '2018-02-09 05:04:31', '2018-02-09 05:04:31', 1),
(23, 2, 6, 2, NULL, '2018-02-10 02:02:15', '2018-02-10 02:02:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_types`
--

CREATE TABLE `subject_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_types`
--

INSERT INTO `subject_types` (`id`, `name`, `code`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Phy', '236', NULL, '2018-02-07 00:58:26', '2018-02-07 01:24:36', 1),
(6, 'Math', '5343', NULL, '2018-02-07 23:07:30', '2018-02-07 23:07:30', 1),
(7, 'Biology', '7655', NULL, '2018-02-07 23:08:01', '2018-02-07 23:08:01', 1),
(8, 'chemistry', '3445', NULL, '2018-02-09 03:13:02', '2018-02-09 03:13:02', 1),
(9, 'English', '7654', NULL, '2018-02-09 03:13:53', '2018-02-09 03:13:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ashok', 'ashokkumar2342@gmail.com', '$2y$10$E5Eq/uefsZf4QL7TEsyPoOYJV.lRzJmeQ2GeGtYZjKAwX4ybDG7CK', '8HsrjUGy3vVS4g1KtiIyTysVSaT5pr1qw4OMBttK5QnDAPFVALVEnrIuG1gY', '2018-01-08 01:34:56', '2018-01-08 01:34:56'),
(2, 'niraj', 'sudeshkumar147@gmail.com', '$2y$10$Z95Yq0q1vr3uT8lasVueM.ZieayTJhju0np7EnCZxc6DPL.oKG2ri', 'f4k8ASedjFhVs0jeRe3akK2HsETgGDFY2TFmLPE6QKOh6avWlAZqIvxCjN9K', '2018-01-08 03:19:43', '2018-01-08 03:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_activities`
--

INSERT INTO `user_activities` (`id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'hello', '2018-02-03 04:56:10', '2018-02-03 04:56:10'),
(2, 1, 'hello', '2018-02-03 04:56:12', '2018-02-03 04:56:12'),
(3, 1, 'hello', '2018-02-03 04:57:46', '2018-02-03 04:57:46'),
(4, 1, 'message', '2018-02-03 04:59:23', '2018-02-03 04:59:23'),
(5, 1, 'status change  successfully ...', '2018-02-03 04:59:56', '2018-02-03 04:59:56'),
(6, 1, 'status change  successfully ...', '2018-02-03 05:00:06', '2018-02-03 05:00:06'),
(7, 1, 'status change  successfully ...', '2018-02-03 05:04:26', '2018-02-03 05:04:26'),
(8, 1, 'status change  successfully ...', '2018-02-03 05:04:27', '2018-02-03 05:04:27'),
(9, 1, 'status change  successfully ...', '2018-02-03 05:04:49', '2018-02-03 05:04:49'),
(10, 1, 'status change  successfully ...', '2018-02-03 05:04:55', '2018-02-03 05:04:55'),
(11, 1, 'status change  successfully ...', '2018-02-03 05:26:29', '2018-02-03 05:26:29'),
(12, 1, 'Section created success ...', '2018-02-05 06:40:45', '2018-02-05 06:40:45'),
(13, 1, 'Section updated success ...', '2018-02-05 06:43:20', '2018-02-05 06:43:20'),
(14, 1, 'Section created success ...', '2018-02-05 06:43:30', '2018-02-05 06:43:30'),
(15, 1, 'Manage Section created successfully ...', '2018-02-05 07:44:42', '2018-02-05 07:44:42'),
(16, 1, 'Manage Section created successfully ...', '2018-02-05 08:03:07', '2018-02-05 08:03:07'),
(17, 1, 'Manage Section created successfully ...', '2018-02-05 08:03:33', '2018-02-05 08:03:33'),
(18, 1, 'User Class Successfully', '2018-02-05 10:47:26', '2018-02-05 10:47:26'),
(19, 1, 'User Class Successfully', '2018-02-05 10:47:59', '2018-02-05 10:47:59'),
(20, 1, 'User Class Successfully', '2018-02-05 10:53:51', '2018-02-05 10:53:51'),
(21, 1, 'User Class Successfully', '2018-02-05 10:54:20', '2018-02-05 10:54:20'),
(22, 1, 'Class created success ...', '2018-02-06 03:46:13', '2018-02-06 03:46:13'),
(23, 1, 'Class created success ...', '2018-02-06 03:47:28', '2018-02-06 03:47:28'),
(24, 1, 'User Class Successfully', '2018-02-06 03:47:58', '2018-02-06 03:47:58'),
(25, 1, 'status change  successfully ...', '2018-02-06 04:11:40', '2018-02-06 04:11:40'),
(26, 1, 'status change  successfully ...', '2018-02-07 00:50:19', '2018-02-07 00:50:19'),
(27, 1, 'status change  successfully ...', '2018-02-07 00:50:21', '2018-02-07 00:50:21'),
(28, 1, 'status change  successfully ...', '2018-02-07 00:50:36', '2018-02-07 00:50:36'),
(29, 1, 'status change  successfully ...', '2018-02-07 00:50:40', '2018-02-07 00:50:40'),
(30, 1, 'status change  successfully ...', '2018-02-07 00:51:01', '2018-02-07 00:51:01'),
(31, 1, 'subject created success ...', '2018-02-07 00:58:26', '2018-02-07 00:58:26'),
(32, 1, 'subject created success ...', '2018-02-07 00:58:58', '2018-02-07 00:58:58'),
(33, 1, 'subject created success ...', '2018-02-07 01:00:58', '2018-02-07 01:00:58'),
(34, 1, 'subject Delete successfully', '2018-02-07 01:12:33', '2018-02-07 01:12:33'),
(35, 1, 'Subject updated successfully', '2018-02-07 01:24:37', '2018-02-07 01:24:37'),
(36, 1, 'Subject updated successfully', '2018-02-07 01:25:44', '2018-02-07 01:25:44'),
(37, 1, 'subject created success ...', '2018-02-07 02:05:33', '2018-02-07 02:05:33'),
(38, 1, 'Subject updated successfully', '2018-02-07 02:05:46', '2018-02-07 02:05:46'),
(39, 1, 'Subject updated successfully', '2018-02-07 02:14:13', '2018-02-07 02:14:13'),
(40, 1, 'subject Delete successfully', '2018-02-07 22:56:39', '2018-02-07 22:56:39'),
(41, 1, 'subject Delete successfully', '2018-02-07 22:56:43', '2018-02-07 22:56:43'),
(42, 1, 'subject Delete successfully', '2018-02-07 23:02:45', '2018-02-07 23:02:45'),
(43, 1, 'subject created success ...', '2018-02-07 23:07:30', '2018-02-07 23:07:30'),
(44, 1, 'subject created success ...', '2018-02-07 23:08:01', '2018-02-07 23:08:01'),
(45, 1, 'Manage Section created successfully ...', '2018-02-08 01:42:39', '2018-02-08 01:42:39'),
(46, 1, 'subject created success ...', '2018-02-09 03:13:02', '2018-02-09 03:13:02'),
(47, 1, 'subject created success ...', '2018-02-09 03:13:53', '2018-02-09 03:13:53'),
(48, 1, 'Subject updated successfully', '2018-02-09 03:15:01', '2018-02-09 03:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_class_types`
--

CREATE TABLE `user_class_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_class_types`
--

INSERT INTO `user_class_types` (`id`, `admin_id`, `class_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2018-02-05 10:47:26', '2018-02-05 10:47:26'),
(2, 1, 2, NULL, '2018-02-05 10:47:26', '2018-02-05 10:47:26'),
(3, 1, 3, NULL, '2018-02-05 10:47:26', '2018-02-05 10:47:26'),
(4, 3, 2, NULL, '2018-02-05 10:47:58', '2018-02-05 10:47:58'),
(5, 2, 1, NULL, '2018-02-05 10:53:50', '2018-02-05 10:53:50'),
(6, 1, 2, NULL, '2018-02-05 10:54:20', '2018-02-05 10:54:20'),
(7, 4, 1, NULL, '2018-02-06 03:47:57', '2018-02-06 03:47:57'),
(8, 4, 2, NULL, '2018-02-06 03:47:57', '2018-02-06 03:47:57'),
(9, 4, 3, NULL, '2018-02-06 03:47:57', '2018-02-06 03:47:57'),
(10, 4, 4, NULL, '2018-02-06 03:47:57', '2018-02-06 03:47:57'),
(11, 4, 5, NULL, '2018-02-06 03:47:58', '2018-02-06 03:47:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_issue_details`
--
ALTER TABLE `certificate_issue_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_issue_remarks`
--
ALTER TABLE `certificate_issue_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_fees`
--
ALTER TABLE `class_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_feestructures`
--
ALTER TABLE `class_feestructures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_types`
--
ALTER TABLE `class_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concessions`
--
ALTER TABLE `concessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `concessions_name_unique` (`name`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_accounts`
--
ALTER TABLE `fee_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_accounts_code_unique` (`code`),
  ADD UNIQUE KEY `fee_accounts_name_unique` (`name`);

--
-- Indexes for table `fee_groups`
--
ALTER TABLE `fee_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_groups_name_unique` (`name`);

--
-- Indexes for table `fee_group_details`
--
ALTER TABLE `fee_group_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_structures`
--
ALTER TABLE `fee_structures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_structures_code_unique` (`code`),
  ADD UNIQUE KEY `fee_structures_name_unique` (`name`);

--
-- Indexes for table `fee_structure_amounts`
--
ALTER TABLE `fee_structure_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_structure_last_dates`
--
ALTER TABLE `fee_structure_last_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fine_periods`
--
ALTER TABLE `fine_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fine_schemes`
--
ALTER TABLE `fine_schemes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fine_schemes_code_unique` (`code`),
  ADD UNIQUE KEY `fine_schemes_name_unique` (`name`);

--
-- Indexes for table `for_session_months`
--
ALTER TABLE `for_session_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian_relation_types`
--
ALTER TABLE `guardian_relation_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_certificate_issues`
--
ALTER TABLE `history_certificate_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_ranges`
--
ALTER TABLE `income_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isapplicables`
--
ALTER TABLE `isapplicables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isoptionals`
--
ALTER TABLE `isoptionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minus`
--
ALTER TABLE `minus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minu_types`
--
ALTER TABLE `minu_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents_infos`
--
ALTER TABLE `parents_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_admins`
--
ALTER TABLE `role_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_types`
--
ALTER TABLE `section_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_dates`
--
ALTER TABLE `session_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_roll_no_unique` (`roll_no`),
  ADD UNIQUE KEY `students_username_unique` (`username`),
  ADD UNIQUE KEY `students_registration_no_unique` (`registration_no`),
  ADD UNIQUE KEY `students_admission_no_unique` (`admission_no`);

--
-- Indexes for table `student_default_values`
--
ALTER TABLE `student_default_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fee_details`
--
ALTER TABLE `student_fee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_histories`
--
ALTER TABLE `student_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_medical_infos`
--
ALTER TABLE `student_medical_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_school_infos`
--
ALTER TABLE `student_school_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_sibling_infos`
--
ALTER TABLE `student_sibling_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_sport_hobbies`
--
ALTER TABLE `student_sport_hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_statuses`
--
ALTER TABLE `student_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student__default__values`
--
ALTER TABLE `student__default__values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_types`
--
ALTER TABLE `subject_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_class_types`
--
ALTER TABLE `user_class_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `certificate_issue_details`
--
ALTER TABLE `certificate_issue_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `certificate_issue_remarks`
--
ALTER TABLE `certificate_issue_remarks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `class_fees`
--
ALTER TABLE `class_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_feestructures`
--
ALTER TABLE `class_feestructures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `class_types`
--
ALTER TABLE `class_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `concessions`
--
ALTER TABLE `concessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fee_accounts`
--
ALTER TABLE `fee_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fee_groups`
--
ALTER TABLE `fee_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fee_group_details`
--
ALTER TABLE `fee_group_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fee_structures`
--
ALTER TABLE `fee_structures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fee_structure_amounts`
--
ALTER TABLE `fee_structure_amounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fee_structure_last_dates`
--
ALTER TABLE `fee_structure_last_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `fine_periods`
--
ALTER TABLE `fine_periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fine_schemes`
--
ALTER TABLE `fine_schemes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `for_session_months`
--
ALTER TABLE `for_session_months`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guardian_relation_types`
--
ALTER TABLE `guardian_relation_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history_certificate_issues`
--
ALTER TABLE `history_certificate_issues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `income_ranges`
--
ALTER TABLE `income_ranges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `isapplicables`
--
ALTER TABLE `isapplicables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `isoptionals`
--
ALTER TABLE `isoptionals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `minus`
--
ALTER TABLE `minus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `minu_types`
--
ALTER TABLE `minu_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parents_infos`
--
ALTER TABLE `parents_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_admins`
--
ALTER TABLE `role_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `section_types`
--
ALTER TABLE `section_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `session_dates`
--
ALTER TABLE `session_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `student_default_values`
--
ALTER TABLE `student_default_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_fee_details`
--
ALTER TABLE `student_fee_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_histories`
--
ALTER TABLE `student_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_medical_infos`
--
ALTER TABLE `student_medical_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `student_school_infos`
--
ALTER TABLE `student_school_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_sibling_infos`
--
ALTER TABLE `student_sibling_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_sport_hobbies`
--
ALTER TABLE `student_sport_hobbies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_statuses`
--
ALTER TABLE `student_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_subjects`
--
ALTER TABLE `student_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `student__default__values`
--
ALTER TABLE `student__default__values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subject_types`
--
ALTER TABLE `subject_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user_class_types`
--
ALTER TABLE `user_class_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
