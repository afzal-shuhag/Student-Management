-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 07:04 PM
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
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_employee_salaries`
--

CREATE TABLE `account_employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = user_id',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_employee_salaries`
--

INSERT INTO `account_employee_salaries` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(3, 9, '2020-12', 25000, '2020-12-26 14:06:27', '2020-12-26 14:06:27'),
(4, 10, '2020-12', 11000, '2020-12-26 14:06:27', '2020-12-26 14:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `account_other_costs`
--

CREATE TABLE `account_other_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_other_costs`
--

INSERT INTO `account_other_costs` (`id`, `date`, `amount`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '2020-12-23', 200, 'Pen 2 Box', '2020122621558.PNG', '2020-12-26 15:49:31', '2020-12-26 15:55:48'),
(2, '2020-12-30', 500, 'Books', NULL, '2020-12-27 09:12:27', '2020-12-27 09:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(12, 2, 6, 5, 1, '2020-12', 640, '2020-12-26 11:35:23', '2020-12-26 11:35:23'),
(13, 2, 6, 8, 1, '2020-12', 680, '2020-12-26 11:35:23', '2020-12-26 11:35:23'),
(14, 2, 1, 7, 1, '2021-05', 150, '2021-05-31 10:16:51', '2021-05-31 10:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'student_id = user_id',
  `roll` int(11) DEFAULT NULL,
  `class_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(2, '4', 50, '1', '1', NULL, NULL, '2020-12-09 13:26:41', '2020-12-14 13:00:17'),
(3, '5', 2, '5', '1', NULL, NULL, '2020-12-09 14:33:27', '2020-12-14 13:00:42'),
(4, '6', 1, '6', '1', '1', '1', '2020-12-09 14:34:49', '2020-12-14 13:00:55'),
(5, '7', 30, '1', '2', NULL, NULL, '2020-12-09 15:05:53', '2020-12-14 13:01:10'),
(6, '5', 5, '6', '2', '3', '2', '2020-12-12 16:58:20', '2020-12-17 12:35:14'),
(7, '8', 10, '6', '2', '2', '1', '2020-12-13 15:18:14', '2020-12-17 12:35:14'),
(8, '7', 15, '6', '2', NULL, NULL, '2020-12-14 12:49:23', '2020-12-17 12:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 100, 33, 100, '2020-12-07 09:45:48', '2020-12-07 09:45:48'),
(5, 3, 2, 100, 33, 100, '2020-12-07 09:45:48', '2020-12-07 09:45:48'),
(6, 3, 3, 100, 33, 100, '2020-12-07 09:45:48', '2020-12-07 09:45:48'),
(7, 4, 1, 100, 33, 100, '2020-12-07 09:46:55', '2020-12-07 09:46:55'),
(8, 4, 2, 100, 33, 100, '2020-12-07 09:46:55', '2020-12-07 09:46:55'),
(9, 4, 3, 100, 33, 100, '2020-12-07 09:46:55', '2020-12-07 09:46:55'),
(10, 4, 4, 100, 33, 100, '2020-12-07 09:46:55', '2020-12-07 09:46:55'),
(11, 4, 5, 100, 33, 100, '2020-12-07 09:46:55', '2020-12-07 09:46:55'),
(12, 4, 6, 100, 33, 100, '2020-12-07 09:46:55', '2020-12-07 09:46:55'),
(13, 5, 1, 100, 33, 100, '2020-12-07 09:48:26', '2020-12-07 09:48:26'),
(14, 5, 2, 100, 33, 100, '2020-12-07 09:48:26', '2020-12-07 09:48:26'),
(15, 5, 3, 100, 33, 100, '2020-12-07 09:48:26', '2020-12-07 09:48:26'),
(16, 5, 4, 100, 33, 100, '2020-12-07 09:48:26', '2020-12-07 09:48:26'),
(17, 5, 5, 100, 33, 100, '2020-12-07 09:48:26', '2020-12-07 09:48:26'),
(18, 5, 6, 100, 33, 100, '2020-12-07 09:48:26', '2020-12-07 09:48:26'),
(29, 6, 1, 100, 33, 100, '2020-12-07 12:19:56', '2020-12-07 12:19:56'),
(30, 6, 2, 100, 33, 100, '2020-12-07 12:19:56', '2020-12-07 12:19:56'),
(31, 6, 3, 100, 33, 100, '2020-12-07 12:19:56', '2020-12-07 12:19:56'),
(32, 6, 4, 100, 33, 100, '2020-12-07 12:19:56', '2020-12-07 12:19:56'),
(33, 6, 5, 100, 33, 100, '2020-12-07 12:19:56', '2020-12-07 12:19:56'),
(34, 6, 6, 100, 33, 100, '2020-12-07 12:19:56', '2020-12-07 12:19:56'),
(39, 1, 1, 100, 33, 100, '2020-12-07 12:21:56', '2020-12-07 12:21:56'),
(40, 1, 2, 100, 33, 100, '2020-12-07 12:21:56', '2020-12-07 12:21:56'),
(41, 1, 3, 100, 33, 100, '2020-12-07 12:21:56', '2020-12-07 12:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Assistant Teacher', '2020-12-07 14:12:47', '2020-12-07 14:14:19'),
(2, 'Teacher', '2020-12-07 14:14:43', '2020-12-07 14:14:43'),
(3, 'Head Teacher', '2020-12-07 14:14:54', '2020-12-07 14:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 30, '2020-12-09 13:26:41', '2020-12-09 13:26:41'),
(2, 3, 1, 20, '2020-12-09 14:33:27', '2020-12-09 14:33:27'),
(3, 4, 1, 20, '2020-12-09 14:34:49', '2020-12-09 14:34:49'),
(4, 5, 1, 50, '2020-12-09 15:05:53', '2020-12-12 15:16:00'),
(5, 6, 1, 20, '2020-12-12 16:58:20', '2020-12-12 16:58:20'),
(6, 7, 1, 15, '2020-12-13 15:18:14', '2020-12-13 15:18:14'),
(7, 8, 1, 50, '2020-12-14 12:49:23', '2020-12-14 12:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = user_id',
  `date` date NOT NULL,
  `attend_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(3, 9, '2020-12-23', 'Present', '2020-12-21 14:19:12', '2020-12-21 14:19:12'),
(4, 10, '2020-12-23', 'Present', '2020-12-21 14:19:12', '2020-12-21 14:19:12'),
(5, 9, '2020-12-29', 'Present', '2020-12-22 10:05:08', '2020-12-22 10:05:08'),
(6, 10, '2020-12-29', 'Leave', '2020-12-22 10:05:08', '2020-12-22 10:05:08'),
(11, 9, '2020-12-30', 'Leave', '2020-12-22 10:17:12', '2020-12-22 10:17:12'),
(12, 10, '2020-12-30', 'Present', '2020-12-22 10:17:12', '2020-12-22 10:17:12'),
(13, 9, '2020-12-22', 'Absent', '2020-12-22 10:17:45', '2020-12-22 10:17:45'),
(14, 10, '2020-12-22', 'Leave', '2020-12-22 10:17:45', '2020-12-22 10:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = user_id',
  `leave_purpose_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 10, 2, '2020-12-21', '2020-12-23', '2020-12-20 14:50:42', '2020-12-20 14:50:42'),
(2, 9, 1, '2020-12-21', '2020-12-24', '2020-12-20 14:56:45', '2020-12-20 14:56:45'),
(3, 9, 2, '2020-12-21', '2020-12-30', '2020-12-20 14:57:11', '2020-12-20 15:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = user_id',
  `previous_salary` int(11) DEFAULT NULL,
  `present_salary` int(11) DEFAULT NULL,
  `increment_salary` int(11) DEFAULT NULL,
  `effected_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_date`, `created_at`, `updated_at`) VALUES
(1, 9, 20000, 20000, 0, '2020-12-08', '2020-12-20 06:45:25', '2020-12-20 06:45:25'),
(2, 9, 20000, 25000, 5000, '2020-12-30', '2020-12-20 09:49:47', '2020-12-20 09:49:47'),
(3, 10, 10000, 10000, 0, '2020-07-14', '2020-12-20 14:20:50', '2020-12-20 14:20:50'),
(4, 10, 10000, 11000, 1000, '2020-12-17', '2020-12-20 14:21:24', '2020-12-20 14:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'First Term', '2020-12-05 16:09:27', '2020-12-05 16:17:05'),
(3, 'Second Term', '2020-12-05 16:18:48', '2020-12-05 16:18:48'),
(4, 'Final Term', '2020-12-05 16:19:01', '2020-12-05 16:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_amounts`
--

CREATE TABLE `fee_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `student_class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_amounts`
--

INSERT INTO `fee_amounts` (`id`, `fee_category_id`, `student_class_id`, `amount`, `created_at`, `updated_at`) VALUES
(11, 2, 1, 100, '2020-12-05 11:53:48', '2020-12-05 11:53:48'),
(12, 2, 3, 150, '2020-12-05 11:53:48', '2020-12-05 11:53:48'),
(13, 2, 4, 200, '2020-12-05 11:53:48', '2020-12-05 11:53:48'),
(14, 2, 5, 300, '2020-12-05 11:53:48', '2020-12-05 11:53:48'),
(15, 2, 6, 500, '2020-12-05 11:53:48', '2020-12-05 11:53:48'),
(16, 3, 1, 50, '2020-12-05 12:10:44', '2020-12-05 12:10:44'),
(17, 3, 3, 70, '2020-12-05 12:10:44', '2020-12-05 12:10:44'),
(18, 3, 4, 100, '2020-12-05 12:10:44', '2020-12-05 12:10:44'),
(19, 3, 5, 130, '2020-12-05 12:10:44', '2020-12-05 12:10:44'),
(20, 3, 6, 180, '2020-12-05 12:10:44', '2020-12-05 12:10:44'),
(36, 1, 1, 300, '2020-12-05 14:21:14', '2020-12-05 14:21:14'),
(37, 1, 3, 400, '2020-12-05 14:21:14', '2020-12-05 14:21:14'),
(38, 1, 4, 500, '2020-12-05 14:21:14', '2020-12-05 14:21:14'),
(39, 1, 5, 600, '2020-12-05 14:21:14', '2020-12-05 14:21:14'),
(40, 1, 6, 800, '2020-12-05 14:21:40', '2020-12-05 14:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

CREATE TABLE `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Personal Problem', NULL, NULL),
(2, 'Physical Illness', NULL, NULL),
(3, 'Family', '2020-12-20 14:57:11', '2020-12-20 14:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `marks_grades`
--

CREATE TABLE `marks_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks_grades`
--

INSERT INTO `marks_grades` (`id`, `grade_name`, `grade_point`, `start_marks`, `end_marks`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'A+', '5', '80', '100', '5', '5', 'Excellent', '2020-12-24 08:46:45', '2020-12-24 08:51:22'),
(2, 'A', '4', '70', '79', '4', '4.99', 'Very Good', '2020-12-24 08:53:02', '2020-12-24 08:53:02'),
(3, 'A-', '3.5', '60', '69', '3.5', '3.99', 'Good', '2020-12-24 08:53:28', '2020-12-24 08:53:28'),
(4, 'B', '3', '50', '59', '3', '3.49', 'Average', '2020-12-24 08:54:20', '2020-12-24 08:54:20'),
(5, 'C', '2', '40', '49', '2', '2.99', 'Poor', '2020-12-24 08:55:02', '2020-12-24 08:55:02'),
(6, 'D', '1', '33', '39', '1', '1.99', 'Very Poor', '2020-12-24 08:55:35', '2020-12-24 08:55:35'),
(7, 'F', '0', '00', '32', '0', '0.99', 'Fail', '2020-12-24 08:56:16', '2020-12-24 08:56:16');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2020_11_30_154908_create_student_classes_table', 2),
(17, '2020_11_30_174859_create_student_years_table', 3),
(18, '2020_11_30_195735_create_student_groups_table', 4),
(19, '2020_11_30_201643_create_student_shifts_table', 5),
(20, '2020_12_04_205222_create_student_fees_table', 6),
(21, '2020_12_05_141058_create_fee_amounts_table', 7),
(22, '2020_12_05_215756_create_exam_types_table', 8),
(23, '2020_12_06_204757_create_subjects_table', 9),
(24, '2020_12_07_145304_create_assign_subjects_table', 10),
(25, '2020_12_07_200227_create_designations_table', 11),
(28, '2014_10_12_000000_create_users_table', 12),
(29, '2020_12_07_213741_create_assign_students_table', 13),
(30, '2020_12_07_214226_create_discount_students_table', 13),
(31, '2020_12_19_210933_create_employee_salary_logs_table', 14),
(32, '2020_12_20_184010_create_leave_purposes_table', 15),
(33, '2020_12_20_184209_create_employee_leaves_table', 15),
(34, '2020_12_21_184545_create_employee_attendances_table', 16),
(35, '2020_12_23_175219_create_student_marks_table', 17),
(36, '2020_12_24_135921_create_marks_grades_table', 18),
(37, '2020_12_24_185654_create_account_student_fees_table', 19),
(38, '2020_12_26_190753_create_account_employee_salaries_table', 20),
(39, '2020_12_26_210724_create_account_other_costs_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('afzalhussainshuhag@gmail.com', '$2y$10$TlmQzD8tWM6qK.kpy5/RROnO1VAA9mFSjW8Kv3P14yvkqHkm60/L6', '2020-12-08 03:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'One', '2020-11-30 10:22:59', '2020-11-30 10:31:59'),
(3, 'Two', '2020-11-30 10:43:23', '2020-11-30 10:43:23'),
(4, 'Three', '2020-12-05 08:52:15', '2020-12-05 08:52:15'),
(5, 'Four', '2020-12-05 08:52:22', '2020-12-05 08:52:22'),
(6, 'Five', '2020-12-05 08:52:33', '2020-12-05 08:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Registration Fee', NULL, '2020-12-04 15:06:22'),
(2, 'Monthly Fee', '2020-12-04 15:03:34', '2020-12-04 15:06:37'),
(3, 'Exam Fee', '2020-12-04 15:06:47', '2020-12-04 15:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Science', '2020-11-30 14:08:17', '2020-11-30 14:10:37'),
(2, 'Arts', '2020-11-30 14:10:52', '2020-11-30 14:10:52'),
(3, 'Commerce', '2020-11-30 14:11:00', '2020-11-30 14:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id = user_id',
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `assign_subject_id`, `exam_type_id`, `marks`, `created_at`, `updated_at`) VALUES
(4, 5, '20200005', 2, 6, 29, 1, 95, '2020-12-23 15:22:13', '2020-12-23 15:22:13'),
(5, 8, '20210008', 2, 6, 29, 1, 70, '2020-12-23 15:22:13', '2020-12-23 15:22:13'),
(6, 7, '20210007', 2, 6, 29, 1, 70, '2020-12-23 15:22:13', '2020-12-23 15:22:13'),
(7, 5, '20200005', 2, 6, 30, 1, 80, '2020-12-27 14:27:26', '2020-12-27 14:27:26'),
(8, 8, '20210008', 2, 6, 30, 1, 60, '2020-12-27 14:27:26', '2020-12-27 14:27:26'),
(9, 7, '20210007', 2, 6, 30, 1, 33, '2020-12-27 14:27:26', '2020-12-27 14:27:26'),
(10, 5, '20200005', 2, 6, 31, 1, 81, '2020-12-27 14:28:34', '2020-12-27 14:28:34'),
(11, 8, '20210008', 2, 6, 31, 1, 75, '2020-12-27 14:28:34', '2020-12-27 14:28:34'),
(12, 7, '20210007', 2, 6, 31, 1, 52, '2020-12-27 14:28:34', '2020-12-27 14:28:34'),
(13, 5, '20200005', 2, 6, 32, 1, 84, '2020-12-27 14:29:03', '2020-12-27 14:29:03'),
(14, 8, '20210008', 2, 6, 32, 1, 78, '2020-12-27 14:29:03', '2020-12-27 14:29:03'),
(15, 7, '20210007', 2, 6, 32, 1, 60, '2020-12-27 14:29:03', '2020-12-27 14:29:03'),
(16, 5, '20200005', 2, 6, 33, 1, 81, '2020-12-27 14:29:29', '2020-12-27 14:29:29'),
(17, 8, '20210008', 2, 6, 33, 1, 70, '2020-12-27 14:29:29', '2020-12-27 14:29:29'),
(18, 7, '20210007', 2, 6, 33, 1, 45, '2020-12-27 14:29:29', '2020-12-27 14:29:29'),
(19, 5, '20200005', 2, 6, 34, 1, 96, '2020-12-27 14:29:46', '2020-12-27 14:29:46'),
(20, 8, '20210008', 2, 6, 34, 1, 86, '2020-12-27 14:29:46', '2020-12-27 14:29:46'),
(21, 7, '20210007', 2, 6, 34, 1, 81, '2020-12-27 14:29:46', '2020-12-27 14:29:46'),
(22, 7, '20210007', 2, 1, 39, 1, 70, '2021-05-31 10:18:57', '2021-05-31 10:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Shift A', '2020-11-30 14:28:21', '2020-11-30 14:28:39'),
(2, 'Shift B', '2020-11-30 14:28:47', '2020-11-30 14:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2020', '2020-11-30 12:26:04', '2020-11-30 12:26:04'),
(2, '2021', '2020-11-30 12:26:21', '2020-11-30 12:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', '2020-12-06 14:55:45', '2020-12-06 14:57:33'),
(2, 'English', '2020-12-06 14:57:43', '2020-12-06 14:57:43'),
(3, 'Mathemetics', '2020-12-06 14:58:40', '2020-12-06 14:58:40'),
(4, 'Social Science', '2020-12-06 14:59:24', '2020-12-06 14:59:24'),
(5, 'General Science', '2020-12-06 14:59:35', '2020-12-06 14:59:35'),
(6, 'Islamic Study', '2020-12-06 14:59:44', '2020-12-06 14:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Admin = Head Of Software, Operator = Computer Operator, User = Employee',
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role_two`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Afzal Hussain SHuhag', 'afzalhussainshuhag@gmail.com', NULL, '$2y$10$lGGaQQsMn.7Xi8v7geTLJOOXVGkJ7ukXcuX95Wv4D6qHpxMEzqLQe', '01222222', 'shibganj, Sylhet', 'Male', '202012072151afzal.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, '2020-12-07 15:51:40'),
(2, 'Admin', 'Kuddus', 'kuddus@gmail.com', NULL, '$2y$10$AURlLdXZoGo921a7X/l8lu6WxQqtyjfx2OH5wGyaw54Au/2gGi1RG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8186', 'Operator', NULL, NULL, NULL, 1, NULL, '2020-12-07 16:08:19', '2020-12-07 16:08:19'),
(4, 'Student', 'Numan Ahmed', NULL, NULL, '$2y$10$aIMYnWrfnytoG.8r5mt8L.gDBl0ZniDvm.7ufOeaZ9cMwA4ajOJN6', '01222222', 'Uttara,104, Dhaka', 'Male', '202012091926afzal.jpg', 'Kuddus Morkul', 'XX Begum', 'Islam', '20200001', '2010-05-11', '2889', NULL, NULL, NULL, NULL, 1, NULL, '2020-12-09 13:26:41', '2020-12-09 13:26:41'),
(5, 'Student', 'Ashfak Hussain', NULL, NULL, '$2y$10$nvJhInltJeKsye1DK2HjSev6vKHrQrqSy3apN5lQZeip5IWWrpbra', '01222222', 'shibganj, Sylhet', 'Male', '202012092033shuhag.jpg', 'Haji Ismail', 'Rukshana Begum', 'Islam', '20200005', '2005-10-12', '5429', NULL, NULL, NULL, NULL, 1, NULL, '2020-12-09 14:33:27', '2020-12-09 14:33:27'),
(6, 'Student', 'Jahara Begum', NULL, NULL, '$2y$10$1zV9WjtHBrz1y4MLqpKPQOflo/jO/TpMYMLYGHm3.S197iUvWPqTe', '01222222', 'shibganj, Sylhet', 'Male', '202012092034php.PNG', 'Haji Ismail', 'Rukshana Begum', 'Islam', '20200006', '2004-06-21', '8036', NULL, NULL, NULL, NULL, 1, NULL, '2020-12-09 14:34:49', '2020-12-09 14:34:49'),
(7, 'Student', 'Karim Khan Amul', NULL, NULL, '$2y$10$.NQyuXT5Gm7nF/zqvn6UvOVkG2f7mPKK/SoVomnVdUXJLjVAQ8oW2', '01222222', 'Dhaka,Uttara,104', 'Male', '202012092105download.png', 'Kuddus Morkul', 'XX Akhter', 'Islam', '20210007', '2015-06-10', '9860', NULL, NULL, NULL, NULL, 1, NULL, '2020-12-09 15:05:53', '2020-12-12 15:16:00'),
(8, 'Student', 'Nabila', NULL, NULL, '$2y$10$ot5pjEna379fqHSM1Q72eOH9vOZGtYBdGBln5fUsZoRlczFSbk8D2', '01222222', 'Dhaka,Uttara,104', 'Female', '2020121321182.PNG', 'Kuddus Morkul', 'XX Begum', 'Islam', '20210008', '2010-10-14', '7861', NULL, NULL, NULL, NULL, 1, NULL, '2020-12-13 15:18:14', '2020-12-13 15:18:14'),
(9, 'Employee', 'Abdus Sattar Mukul', NULL, NULL, '$2y$10$CpIuYYmb33ftKpTcbPIlourku53mnSG/yvftadfunQlSnYZ0PeWyu', '0122222244', 'shibganj, Sylhet', 'Male', '202012201245afzal.jpg', 'Kuddus Morkul Mula', 'YY Begum', 'Islam', '20200001', '1991-06-21', '5603', NULL, '2020-12-08', 1, 25000, 1, NULL, '2020-12-20 06:45:25', '2020-12-20 09:49:47'),
(10, 'Employee', 'Rahim Uddin', NULL, NULL, '$2y$10$h.WldPaNOeWQOURbBDm3R.xUdUYgqAhtAuY2YJWt8QL5NTwSaSe4u', '0122222244', 'Dhaka,Uttara,104', 'Male', '202012202020download.png', 'Korim Box', 'Sahela Khatun', 'Islam', '20200010', '1990-07-10', '1085', NULL, '2020-07-14', 2, 11000, 1, NULL, '2020-12-20 14:20:50', '2020-12-20 14:21:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_amounts`
--
ALTER TABLE `fee_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

--
-- Indexes for table `marks_grades`
--
ALTER TABLE `marks_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_fees_name_unique` (`name`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_years_name_unique` (`name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_amounts`
--
ALTER TABLE `fee_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marks_grades`
--
ALTER TABLE `marks_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
