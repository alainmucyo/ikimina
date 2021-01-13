-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Feb 22, 2019 at 02:51 PM
=======
-- Generation Time: Feb 18, 2019 at 06:39 AM
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0
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
-- Database: `ikimina`
--

-- --------------------------------------------------------

--
-- Table structure for table `amounts`
--

CREATE TABLE `amounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `cooperative_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amounts`
--

INSERT INTO `amounts` (`id`, `amount`, `year`, `cooperative_id`, `created_at`, `updated_at`) VALUES
(1, 60000, 19, 1, '2019-02-17 12:36:25', '2019-02-17 15:03:53'),
(2, 50000, 19, 2, '2019-02-17 17:01:13', '2019-02-17 17:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `id` int(10) UNSIGNED NOT NULL,
  `members_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `cooperative_id` int(11) DEFAULT NULL,
<<<<<<< HEAD
  `shares` int(11) NOT NULL DEFAULT '1',
=======
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contributions`
--

<<<<<<< HEAD
INSERT INTO `contributions` (`id`, `members_id`, `amount`, `month`, `year`, `cooperative_id`, `shares`, `created_at`, `updated_at`) VALUES
(1, 1, 70000, 1, 19, 1, 2, '2019-02-17 15:00:07', '2019-02-21 10:49:23'),
(2, 1, 10300, 2, 19, 1, 1, '2019-02-17 15:00:07', '2019-02-21 05:27:55'),
(3, 1, NULL, 3, 19, 1, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(4, 1, NULL, 4, 19, 1, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(5, 1, NULL, 5, 19, 1, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(6, 1, NULL, 6, 19, 1, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(7, 1, NULL, 7, 19, 1, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(8, 1, NULL, 8, 19, 1, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(9, 1, NULL, 9, 19, 1, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(10, 1, NULL, 10, 19, 1, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(11, 1, NULL, 11, 19, 1, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(12, 1, NULL, 12, 19, 1, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07');
=======
INSERT INTO `contributions` (`id`, `members_id`, `amount`, `month`, `year`, `cooperative_id`, `created_at`, `updated_at`) VALUES
(1, 1, 60000, 1, 19, 1, '2019-02-17 15:00:07', '2019-02-17 15:04:16'),
(2, 1, 10000, 2, 19, 1, '2019-02-17 15:00:07', '2019-02-17 15:04:36'),
(3, 1, NULL, 3, 19, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(4, 1, NULL, 4, 19, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(5, 1, NULL, 5, 19, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(6, 1, NULL, 6, 19, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(7, 1, NULL, 7, 19, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(8, 1, NULL, 8, 19, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(9, 1, NULL, 9, 19, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(10, 1, NULL, 10, 19, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(11, 1, NULL, 11, 19, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07'),
(12, 1, NULL, 12, 19, 1, '2019-02-17 15:00:07', '2019-02-17 15:00:07');
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0

-- --------------------------------------------------------

--
-- Table structure for table `cooperatives`
--

CREATE TABLE `cooperatives` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cooperatives`
--

INSERT INTO `cooperatives` (`id`, `name`, `contact`, `about`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Coopanya', '078888888', 'This is the cooperative of test', 1, '2019-02-17 09:18:58', '2019-02-17 09:18:58'),
(2, 'Comoinya', '7777777', 'This is testing cooperative', 0, '2019-02-17 13:40:25', '2019-02-17 17:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `why` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cooperative_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `why`, `amount`, `details`, `cooperative_id`, `created_at`, `updated_at`) VALUES
(1, 'Testing', 20000, 'I\'m testing this new thing', 1, '2019-02-17 12:39:11', '2019-02-17 12:39:11');

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `cooperative_id` int(11) NOT NULL,
  `contribution_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `cooperative_id`, `contribution_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3000, '2019-02-22 08:21:17', '2019-02-22 09:05:06');

-- --------------------------------------------------------

--
=======
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `why` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cooperative_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `why`, `amount`, `details`, `cooperative_id`, `created_at`, `updated_at`) VALUES
(1, 'Imfanshanyo', 500000, 'Testing income', 1, '2019-02-17 12:42:51', '2019-02-17 12:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(10) UNSIGNED NOT NULL,
  `members_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `attach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `will_be_payed` date NOT NULL,
  `profit` int(11) DEFAULT NULL,
  `cooperative_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD
--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `members_id`, `amount`, `attach`, `status`, `will_be_payed`, `profit`, `cooperative_id`, `created_at`, `updated_at`) VALUES
(1, 1, 20000, 'public/attaches/PD1uuMAoefsTXF011i55ZQAve9ASt4bAImvKhiwd.pdf', 0, '2019-03-08', NULL, 1, '2019-02-22 06:38:03', '2019-02-22 06:38:03');

=======
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0
-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cooperative_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `gender`, `dob`, `phone`, `cell`, `village`, `cooperative_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Alain Mucyo M.', 'Male', '2000-12-10', '0785253349', 'Kamanu', 'Test', 1, 1, '2019-02-17 12:49:45', '2019-02-17 12:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(15, '2019_02_17_101508_create_cooperatives_table', 8),
(16, '2019_02_12_144754_create_members_table', 9),
(17, '2019_02_14_071817_create_expenses_table', 9),
(18, '2019_02_14_071834_create_incomes_table', 9),
(19, '2019_02_17_063853_create_amounts_table', 9),
(23, '2019_02_13_044535_create_contributions_table', 10),
(24, '2019_02_13_090533_create_loans_table', 10),
<<<<<<< HEAD
(25, '2019_02_14_044635_create_payments_table', 10),
(26, '2019_02_22_092758_create_extras_table', 11);
=======
(25, '2019_02_14_044635_create_payments_table', 10);
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
<<<<<<< HEAD
  `loans_id` int(11) NOT NULL,
=======
  `loan_id` int(11) NOT NULL,
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0
  `cooperative_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD
--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `loans_id`, `cooperative_id`, `created_at`, `updated_at`) VALUES
(1, 10000, 1, 1, '2019-02-22 07:02:24', '2019-02-22 07:02:24'),
(2, 5000, 1, 1, '2019-02-22 07:03:29', '2019-02-22 07:03:29');

=======
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `cooperative_id` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `cooperative_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
<<<<<<< HEAD
(1, 'Alain Mucyo', 'alainmucyo@gmail.com', 1, 1, NULL, '$2y$10$z8rCmHg9543pTleRc0FVzOM/JuVnjdH6.VF57OV.kRLEw/1vovnPW', '98VNsaVDP0wzsuqh23AMffBmr3j7VqiGANYAxOfPwyZDlUTxkMrfkKtuobIA', '2019-02-17 09:41:56', '2019-02-17 09:41:56'),
(2, 'Mr Alan', 'alainmucyo3@gmail.com', 2, 1, NULL, '$2y$10$2k5UqzpYFSZoyKn0Ywe/SOliLGj7O8kaeM4b/DCpZNLGeSGjkkaI.', 'pJaC95fa2MgctKxn4HMhqAOaAieQ2QRSALjp5aONtK4jxpCN4NgK65eANCta', '2019-02-17 09:48:55', '2019-02-17 09:48:55'),
(3, 'Mr Admin', 'admin@admin.com', 3, NULL, NULL, '$2y$10$X.C9FR6g1KFyKm1uFds7qO1Hz8By1Z/HaZyfMQXBibPuSZdlsaSH2', 'Y7uq6e4T5eVRaUZdHUniTzamWjLmnK5pJvVSOsNqL5QjRv2rVyEdiSGCQEzB', '2019-02-17 09:51:55', '2019-02-17 09:51:55'),
=======
(1, 'Alain Mucyo', 'alainmucyo@gmail.com', 1, 1, NULL, '$2y$10$z8rCmHg9543pTleRc0FVzOM/JuVnjdH6.VF57OV.kRLEw/1vovnPW', '0fh0bSw1zhGi7QEektP22zK802feOqNnlWgV2i2M083xsFFnnNVxzXW9fb5L', '2019-02-17 09:41:56', '2019-02-17 09:41:56'),
(2, 'Mr Alan', 'alainmucyo3@gmail.com', 2, 1, NULL, '$2y$10$2k5UqzpYFSZoyKn0Ywe/SOliLGj7O8kaeM4b/DCpZNLGeSGjkkaI.', 'PIRDIdzEtlfxFTzgXlRzXgAm0CtkM2U9BVUBF6XNJS8dTbaMwfhtpBBpldPI', '2019-02-17 09:48:55', '2019-02-17 09:48:55'),
(3, 'Mr Admin', 'admin@admin.com', 3, NULL, NULL, '$2y$10$X.C9FR6g1KFyKm1uFds7qO1Hz8By1Z/HaZyfMQXBibPuSZdlsaSH2', 'bXMj1WREYMpqYxxQxUJ2r20Pqbs5t2RAXo2xLnZfEbNjzRMFDNRghdjLKaPF', '2019-02-17 09:51:55', '2019-02-17 09:51:55'),
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0
(5, 'Mr Accounter', 'comoinya@gmail.com', 2, 2, NULL, '$2y$10$iP.c0VfcdjloPYPNEnywd.ybomsL8GuzMn0jmp0.1PR/COCbXP0wa', '5GerqpkYCSGlTMdTcwu5jqke3TlBZ2JApWmtpwdqpNYf26kPG1zRy2XiIKPL', '2019-02-17 13:45:46', '2019-02-17 13:45:46'),
(6, 'Mr President', 'president@gmail.com', 1, 2, NULL, '$2y$10$RYs2lv5x71Qj0hKTXQLbieyQR21Z7alArxfePTkhrEieUPiy2xb9a', 'vmne7upXOqJAqivwclhuIIcVXUqn4wDu3IXVoA8tqaPJWQ4qrIvZodKEZ3ZP', '2019-02-17 15:06:27', '2019-02-17 15:06:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amounts`
--
ALTER TABLE `amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cooperatives`
--
ALTER TABLE `cooperatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
=======
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
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
-- AUTO_INCREMENT for table `amounts`
--
ALTER TABLE `amounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cooperatives`
--
ALTER TABLE `cooperatives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
=======
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
<<<<<<< HEAD
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
=======
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
<<<<<<< HEAD
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
=======
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
<<<<<<< HEAD
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
=======
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
>>>>>>> 60b37d72dbae757e37e690225d131880b93e68a0

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
