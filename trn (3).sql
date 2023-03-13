-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 07:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `dob`, `email`, `mobileno`, `address`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Hancie Phago', '2023-01-22', 'hanciewanemphago@gmail.com', '9825915122', 'Bhadrapur-2', '$2y$10$m3KbPMsc4Ks04nKVn2xJ.ekbsunYDNedCgI3mT1umuRI/0x0iz7gC', '2023-02-22 07:42:42', '2023-02-22 07:42:42'),
(2, 'Nitesh Hamal', '2023-03-03', 'nitesh0hamal@gmail.com', '9825915122', 'Bhadrapur-2', '$2y$10$TYgTi949dX01ghl2FsQmVeEX0IdCsut8qoXyvon1MRw.sFcn.nF5G', '2023-03-03 00:38:00', '2023-03-03 00:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announce_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `announcement` longtext NOT NULL,
  `User_ID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announce_id`, `title`, `announcement`, `User_ID`, `created_at`, `updated_at`) VALUES
(9, 'ghf', 'ghjghjgj', 1, '2023-03-08 12:08:08', '2023-03-08 12:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `User_ID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `name`, `message`, `User_ID`, `created_at`, `updated_at`) VALUES
(1, 'Hancie Phago', 'hy', 1, '2023-02-22 07:43:32', '2023-02-22 07:43:32'),
(2, 'Hancie Phago', 'Hello Nitesh', 1, '2023-03-03 00:37:23', '2023-03-03 00:37:23'),
(3, 'Nitesh Hamal', 'Hy Hancie', 2, '2023-03-03 00:38:21', '2023-03-03 00:38:21'),
(4, 'Hancie Phago', 'hy', 1, '2023-03-04 11:38:57', '2023-03-04 11:38:57'),
(9, 'Hancie Phago', 'What is you name?', 1, '2023-03-05 07:57:06', '2023-03-05 07:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Prajwol Khada', 'hanciewanemphago@gmail.com', 'Contact form test', 'Hy', '2023-03-03 00:36:56', '2023-03-03 00:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_20_122858_create_admin_table', 1),
(6, '2023_01_20_125138_create_rooms_table', 1),
(7, '2023_01_25_073505_create_password_table', 1),
(8, '2023_01_25_132829_create_notes_table', 1),
(9, '2023_01_25_163729_create_contacts_table', 1),
(10, '2023_01_27_071011_create_room_expenses_table', 1),
(11, '2023_01_28_072312_create_trnfinance_table', 1),
(12, '2023_01_28_130930_create_trnprojects_table', 1),
(13, '2023_02_17_101806_create_chat_table', 1),
(14, '2023_02_20_111613_create_announcement_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `title`, `notes`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Computer', '<p>A&nbsp;<strong>computer</strong>&nbsp;is a&nbsp;<a title=\"Machine\" href=\"https://en.wikipedia.org/wiki/Machine\">machine</a>&nbsp;that can be programmed to&nbsp;<a title=\"Execution (computing)\" href=\"https://en.wikipedia.org/wiki/Execution_(computing)\">carry out</a>&nbsp;sequences of&nbsp;<a title=\"Arithmetic\" href=\"https://en.wikipedia.org/wiki/Arithmetic\">arithmetic</a>&nbsp;or&nbsp;<a class=\"mw-redirect\" title=\"Logical operations\" href=\"https://en.wikipedia.org/wiki/Logical_operations\">logical operations</a>&nbsp;(<a title=\"Computation\" href=\"https://en.wikipedia.org/wiki/Computation\">computation</a>) automatically. Modern&nbsp;<a class=\"mw-redirect\" title=\"Digital electronic\" href=\"https://en.wikipedia.org/wiki/Digital_electronic\">digital electronic</a>&nbsp;computers can perform generic sets of operations known as&nbsp;<a title=\"Computer program\" href=\"https://en.wikipedia.org/wiki/Computer_program\">programs</a>. These programs enable computers to perform a wide range of tasks. A&nbsp;<strong>computer system</strong>&nbsp;is a nominally complete computer that includes the&nbsp;<a title=\"Computer hardware\" href=\"https://en.wikipedia.org/wiki/Computer_hardware\">hardware</a>,&nbsp;<a title=\"Operating system\" href=\"https://en.wikipedia.org/wiki/Operating_system\">operating system</a>&nbsp;(main&nbsp;<a title=\"Software\" href=\"https://en.wikipedia.org/wiki/Software\">software</a>), and&nbsp;<a title=\"Peripheral\" href=\"https://en.wikipedia.org/wiki/Peripheral\">peripheral</a>&nbsp;equipment needed and used for full operation. This term may also refer to a group of computers that are linked and function together, such as a&nbsp;<a title=\"Computer network\" href=\"https://en.wikipedia.org/wiki/Computer_network\">computer network</a>&nbsp;or&nbsp;<a title=\"Computer cluster\" href=\"https://en.wikipedia.org/wiki/Computer_cluster\">computer cluster</a>.</p>', 1, '2023-03-03 00:41:27', '2023-03-03 00:41:27'),
(2, 'Hardware', '<p>A broad range of&nbsp;<a title=\"Programmable logic controller\" href=\"https://en.wikipedia.org/wiki/Programmable_logic_controller\">industrial</a>&nbsp;and&nbsp;<a title=\"Consumer electronics\" href=\"https://en.wikipedia.org/wiki/Consumer_electronics\">consumer products</a>&nbsp;use computers as&nbsp;<a title=\"Control system\" href=\"https://en.wikipedia.org/wiki/Control_system\">control systems</a>. Simple special-purpose devices like&nbsp;<a title=\"Microwave oven\" href=\"https://en.wikipedia.org/wiki/Microwave_oven\">microwave ovens</a>&nbsp;and&nbsp;<a title=\"Remote control\" href=\"https://en.wikipedia.org/wiki/Remote_control\">remote controls</a>&nbsp;are included, as are factory devices like&nbsp;<a title=\"Industrial robot\" href=\"https://en.wikipedia.org/wiki/Industrial_robot\">industrial robots</a>&nbsp;and&nbsp;<a title=\"Computer-aided design\" href=\"https://en.wikipedia.org/wiki/Computer-aided_design\">computer-aided design</a>, as well as general-purpose devices like&nbsp;<a title=\"Personal computer\" href=\"https://en.wikipedia.org/wiki/Personal_computer\">personal computers</a>&nbsp;and&nbsp;<a title=\"Mobile device\" href=\"https://en.wikipedia.org/wiki/Mobile_device\">mobile devices</a>&nbsp;like&nbsp;<a title=\"Smartphone\" href=\"https://en.wikipedia.org/wiki/Smartphone\">smartphones</a>. Computers power the&nbsp;<a title=\"Internet\" href=\"https://en.wikipedia.org/wiki/Internet\">Internet</a>, which links billions of other computers and users.</p>', 1, '2023-03-03 00:41:53', '2023-03-03 00:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `password_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`password_id`, `email`, `password`, `url`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'hanciewanemphago@gmail.com', '0720', 'https://wanemonlinemovies.blogspot.com/', 1, '2023-03-03 00:40:36', '2023-03-03 00:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_expenses`
--

CREATE TABLE `room_expenses` (
  `Expenses_ID` bigint(20) UNSIGNED NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Deposit` varchar(255) DEFAULT NULL,
  `Withdraw` varchar(255) DEFAULT NULL,
  `Remark` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Date3` varchar(255) NOT NULL,
  `User_ID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_expenses`
--

INSERT INTO `room_expenses` (`Expenses_ID`, `Date`, `Deposit`, `Withdraw`, `Remark`, `Status`, `Date3`, `User_ID`, `created_at`, `updated_at`) VALUES
(1, '2079-11-10', '8000', NULL, 'Hancie Phago', 'Deposit', 'January 2023', 1, '2023-02-22 07:43:53', '2023-02-22 07:43:53'),
(2, '2079-11-11', NULL, '450', 'Canteen', 'Withdraw', 'March 2023', 1, '2023-02-23 00:37:28', '2023-02-23 00:37:28'),
(3, '2079-11-19', '8000', NULL, 'Nitesh Hamal', 'Deposit', 'March 2023', 1, '2023-03-03 00:42:26', '2023-03-03 00:42:26'),
(4, '2079-11-19', NULL, '1000', 'Cinema', 'Withdraw', 'March 2023', 1, '2023-03-03 00:44:09', '2023-03-03 00:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `trnfinance`
--

CREATE TABLE `trnfinance` (
  `TRN_ID` bigint(20) UNSIGNED NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Deposit` varchar(255) DEFAULT NULL,
  `Withdraw` varchar(255) DEFAULT NULL,
  `Remark` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Date3` varchar(255) NOT NULL,
  `User_ID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trnprojects`
--

CREATE TABLE `trnprojects` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `progress` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `givenby` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `duedate` varchar(255) NOT NULL,
  `User_ID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trnprojects`
--

INSERT INTO `trnprojects` (`project_id`, `title`, `progress`, `status`, `priority`, `budget`, `givenby`, `category`, `duedate`, `User_ID`, `created_at`, `updated_at`) VALUES
(1, 'Wanem Unicode Converter', '40', 'In Progress', 'High', '20000', 'Nitesh Hamal', 'Desktop Application', '2023-05-25', 2, '2023-03-03 00:46:46', '2023-03-03 00:46:46'),
(2, 'Dictionary', '60', 'Pending', 'Medium', '20', 'Hancie Phago', 'Website Design', '2023-03-23', 2, '2023-03-03 00:47:12', '2023-03-03 00:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announce_id`),
  ADD KEY `announcement_user_id_foreign` (`User_ID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `chat_user_id_foreign` (`User_ID`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `notes_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`password_id`),
  ADD KEY `password_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_expenses`
--
ALTER TABLE `room_expenses`
  ADD PRIMARY KEY (`Expenses_ID`),
  ADD KEY `room_expenses_user_id_foreign` (`User_ID`);

--
-- Indexes for table `trnfinance`
--
ALTER TABLE `trnfinance`
  ADD PRIMARY KEY (`TRN_ID`),
  ADD KEY `trnfinance_user_id_foreign` (`User_ID`);

--
-- Indexes for table `trnprojects`
--
ALTER TABLE `trnprojects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `trnprojects_user_id_foreign` (`User_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announce_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
  MODIFY `password_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_expenses`
--
ALTER TABLE `room_expenses`
  MODIFY `Expenses_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trnfinance`
--
ALTER TABLE `trnfinance`
  MODIFY `TRN_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trnprojects`
--
ALTER TABLE `trnprojects`
  MODIFY `project_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_user_id_foreign` FOREIGN KEY (`User_ID`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_user_id_foreign` FOREIGN KEY (`User_ID`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `password`
--
ALTER TABLE `password`
  ADD CONSTRAINT `password_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `room_expenses`
--
ALTER TABLE `room_expenses`
  ADD CONSTRAINT `room_expenses_user_id_foreign` FOREIGN KEY (`User_ID`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `trnfinance`
--
ALTER TABLE `trnfinance`
  ADD CONSTRAINT `trnfinance_user_id_foreign` FOREIGN KEY (`User_ID`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `trnprojects`
--
ALTER TABLE `trnprojects`
  ADD CONSTRAINT `trnprojects_user_id_foreign` FOREIGN KEY (`User_ID`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
