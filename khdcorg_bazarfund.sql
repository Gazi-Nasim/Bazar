-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 03:48 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khdcorg_bazarfund`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `upazilla_id` bigint(20) UNSIGNED NOT NULL,
  `bazar_id` bigint(20) UNSIGNED NOT NULL,
  `plot_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plot_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'বানিজ্যিক',
  `plot_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rights` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `north` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `south` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `east` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `west` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'বন্দোবস্তী',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_or_husband` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_up` bigint(20) NOT NULL,
  `record_papers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serveyor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `survey_report` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `status` enum('pending','approved','survey','survey_completed','payment','final') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_status` enum('pending','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `trans_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_father` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_spouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_up` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_shang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_bazar_woner` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_establishment` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `establishment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `establishment_permission` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_case` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_prohibition` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_conflict` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_deed` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_mortgate` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_up_to_date` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition_maintained` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `late_person_heir` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handover_evidence` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_as_nid` enum('হ্যাঁ','না') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `upazilla_id`, `bazar_id`, `plot_no`, `plot_type`, `plot_area`, `rights`, `time`, `north`, `south`, `east`, `west`, `application_type`, `name`, `mobile`, `father_or_husband`, `spouse`, `shang`, `post`, `nid_no`, `nid_photo`, `photo`, `birth_id`, `address`, `address_up`, `record_papers`, `serveyor_id`, `survey_report`, `report_date`, `status`, `remarks`, `payment_amount`, `payment_status`, `trans_id`, `h_name`, `h_photo`, `h_phone`, `h_birth`, `h_nid`, `h_father`, `h_spouse`, `h_address`, `h_up`, `h_post`, `h_shang`, `plot_bazar_woner`, `plot_establishment`, `establishment_type`, `establishment_permission`, `plot_case`, `case_prohibition`, `plot_conflict`, `main_deed`, `contract_year`, `plot_mortgate`, `tax_up_to_date`, `condition_maintained`, `late_person_heir`, `handover_evidence`, `address_as_nid`, `previous_owner`, `created_at`, `updated_at`) VALUES
(3, 6, 1, 5, '70', 'বানিজ্যিক', '200', 'boy', '2 years 5 months', '40', '60', '70', '50', 'বন্দোবস্তী', 'Mazidul 1', '01922110401', 'Shaiful', NULL, '2023', 'Shantinogor', '12321321211132', '', 'Mazidul 1-20230822083803.jpg', NULL, NULL, 0, 'Mazidul 1-20230822083803.pdf', 3, '<p>Good go</p>', '2023-08-22', 'payment', NULL, '0.00', 'paid', '3576227', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-08-22 02:38:03', '2023-11-19 04:23:46'),
(4, 8, 2, 11, '২৩৩', 'বানিজ্যিক', '৫ ডেসি', 'পিতা', '৫ বছর', 'মারমা', 'চাকমা', 'বাংগালী', 'ত্রিপুরা', 'বন্দোবস্তী', 'প্রভাংকর দেওয়ান', '+8801816711696', 'মনিলাল দেওয়ান', NULL, 'পানখাইয়া পাড়া, নোয়া পাড়া', 'খাগড়াছড়ি', '১২৩৪৫৬৭৭৮০১২৩৪৫৬', '', 'প্রভাংকর দেওয়ান-20230824061509.jpg', NULL, NULL, 0, 'প্রভাংকর দেওয়ান-20230824061509.pdf', 3, '<p>test</p>', '2023-09-17', 'payment', NULL, '5000.00', 'pending', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-08-24 00:15:09', '2023-09-17 04:17:31'),
(9, 1, 1, 5, '1234', 'বানিজ্যিক', '12', 't', 't', 't', 't', 't', 't', 'বন্দোবস্তী', 't', 't', 't', NULL, 't', 't', 't', '', 't-20230916182233.jpg', NULL, NULL, 0, NULL, 3, NULL, NULL, 'final', NULL, '10000.00', 'paid', '9856168', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-09-16 12:22:33', '2023-09-16 15:50:21'),
(10, 1, 3, 16, '12', 'বানিজ্যিক', '6', 'h', 'h', 'h', 'h', 'h', 'h', 'বন্দোবস্তী', 'h', 'h', 'h', NULL, 'h', 'h', 'h', '', 'h-20230916183551.jpg', NULL, NULL, 0, NULL, 3, '<p>test</p>', '2023-09-16', 'final', NULL, '5000.00', 'paid', '10480052', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-09-16 12:35:51', '2023-09-16 15:31:58'),
(11, 1, 1, 5, '৫৬৭৮', 'বানিজ্যিক', '8', 'k', 'k', 'k', 'k', 'k', 'k', 'বন্দোবস্তী', 'k', 'k', 'k', NULL, 'k', 'k', 'k', '', 'k-20230916221336.jpg', NULL, NULL, 0, NULL, 3, NULL, NULL, 'final', NULL, '5000.00', 'paid', '11505753', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-09-16 16:13:36', '2023-09-17 04:21:33'),
(12, 7, 1, 5, '২০৩', 'বানিজ্যিক', '৪ শতক', 'পিতা', '৫ বছর', 'কালাম', 'রহিম', 'দিদার', 'মানু', 'বন্দোবস্তী', 'প্রভাঙ্কর দেওয়ান', '01816711696', 'মনি লাল দেওয়ান', NULL, 'মহাজন পাড়া', 'সদর', '১২৩৪৫৬৭৮৯১০১১', '', 'প্রভাঙ্কর দেওয়ান-20230918145949.jpg', NULL, NULL, 0, NULL, 3, '<p>asdasdasd test</p>', '2023-11-19', 'survey_completed', NULL, '0.00', 'pending', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-09-18 08:59:49', '2023-11-19 04:56:09'),
(13, 7, 1, 5, '২৩৩', 'বানিজ্যিক', '৫ ডেসি', 'পিতা', '৫ বছর', 'মারমা', 'চাকমা', 'বাংগালী', 'ত্রিপুরা', 'বন্দোবস্তী', 'কবির হোসেন', '01816711696', 'শাহজান হোসেন', NULL, 'পানখাইয়া পাড়া, নোয়া পাড়া', 'খাগড়াছড়ি', '১২৩৪৫৬৭৭৮০১২৩৪৫৬', '', 'কবির হোসেন-20231011085340.jpg', NULL, NULL, 0, NULL, 3, NULL, NULL, 'final', NULL, '5000.00', 'pending', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-10-11 02:53:40', '2023-11-19 04:50:52'),
(14, 10, 4, 9, '345', 'বানিজ্যিক', 'rt4', 'boy', '1701974601', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'বন্দোবস্তী', 'forhad', '01967660788', 'sdfg', NULL, 'sdfgg', 'sdfgh', 'sdg', 'forhad-20231207184451.jpg', 'forhad-20231207184451.jpg', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-12-07 12:44:51', '2023-12-07 12:44:51'),
(15, 10, 4, 9, '345', 'বানিজ্যিক', 'rt4', 'boy', '1701974601', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'বন্দোবস্তী', 'forhad', '01967660788', 'sdfg', NULL, 'sdfgg', 'sdfgh', 'sdg', 'forhad-20231207184708.jpg', 'forhad-20231207184708.jpg', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-12-07 12:47:08', '2023-12-07 12:47:08'),
(16, 10, 4, 9, '345', 'বানিজ্যিক', 'rt4', 'boy', '1701974601', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'বন্দোবস্তী', 'forhad', '01967660788', 'sdfg', NULL, 'sdfgg', 'sdfgh', 'sdg', 'forhad-20231207184720.jpg', 'forhad-20231207184720.jpg', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-12-07 12:47:20', '2023-12-07 12:47:20'),
(17, 10, 4, 9, '345', 'বানিজ্যিক', 'rt4', 'boy', '1701974601', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'বন্দোবস্তী', 'forhad', '01967660788', 'sdfg', NULL, 'sdfgg', 'sdfgh', 'sdg', 'forhad-20231207184823.jpg', 'forhad-20231207184823.jpg', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-12-07 12:48:23', '2023-12-07 12:48:23'),
(18, 10, 2, 13, '345', 'বানিজ্যিক', 'rt4', 'boy', '1701974973', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', NULL, 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231207185239.jpg', 'Gazi Nasim-20231207185239.jpg', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-12-07 12:52:39', '2023-12-07 12:52:39'),
(19, 10, 3, 17, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702000893', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'বন্দোবস্তী', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208020300.jpg', 'Gazi Nasim-20231208020300.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:03:00', '2023-12-07 20:03:00'),
(20, 10, 3, 16, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702001877', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Test', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Test-20231208022117.jpg', 'Test-20231208022117.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'হ্যাঁ', 'হ্যাঁ', NULL, 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', '345', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:21:17', '2023-12-07 20:21:17'),
(21, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702002078', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208023534.jpg', 'Gazi Nasim-20231208023534.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '7', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:35:34', '2023-12-07 20:35:34'),
(22, 10, 4, 9, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702002934', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208024318.jpg', 'Gazi Nasim-20231208024318.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:43:18', '2023-12-07 20:43:18'),
(23, 10, 4, 9, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702002934', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208024409.jpg', 'Gazi Nasim-20231208024409.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:44:09', '2023-12-07 20:44:09'),
(24, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702003904', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208025353.jpg', 'Gazi Nasim-20231208025353.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:53:53', '2023-12-07 20:53:53'),
(25, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702003904', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208025542.jpg', 'Gazi Nasim-20231208025542.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:55:42', '2023-12-07 20:55:42'),
(26, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702003904', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208025614.jpg', 'Gazi Nasim-20231208025614.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:56:14', '2023-12-07 20:56:14'),
(27, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702003904', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208025658.jpg', 'Gazi Nasim-20231208025658.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:56:58', '2023-12-07 20:56:58'),
(28, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702003904', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208025748.jpg', 'Gazi Nasim-20231208025748.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:57:48', '2023-12-07 20:57:48'),
(29, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702003904', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208025757.jpg', 'Gazi Nasim-20231208025757.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:57:57', '2023-12-07 20:57:57'),
(30, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702003904', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208025808.jpg', 'Gazi Nasim-20231208025808.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:58:08', '2023-12-07 20:58:08'),
(31, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702003904', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208025827.jpg', 'Gazi Nasim-20231208025827.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 20:58:27', '2023-12-07 20:58:27'),
(32, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702003904', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', 'Gazi Nasim-20231208030127.jpg', 'Gazi Nasim-20231208030127.jpg', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 21:01:27', '2023-12-07 21:01:27'),
(33, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702004641', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'forhad', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', '', '', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 21:07:29', '2023-12-07 21:07:29'),
(34, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702004641', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'forhad', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', '', '', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'approved', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 21:07:38', '2023-12-12 02:32:10'),
(35, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702004641', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'forhad', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', '', '', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 21:07:48', '2023-12-07 21:07:48'),
(36, 10, 2, 12, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702004641', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'forhad', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', '', '', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 21:07:59', '2023-12-07 21:07:59'),
(37, 10, 4, 9, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702005061', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gazi Nasim', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', '', '', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', NULL, 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 21:12:14', '2023-12-07 21:12:14'),
(38, 10, 5, 33, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702005402', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Test', 'fgfd', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', '', '', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', NULL, 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 21:17:53', '2023-12-07 21:17:53'),
(39, 10, 5, 33, '345', 'বানিজ্যিক', 'rt4', 'boy', '1702005402', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Test', 'fgfd', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', '', '', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', '34645', '4242', 'h sdfa', 'h esfds', 'h asdff', NULL, 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-07 21:18:45', '2023-12-07 21:18:45'),
(40, 10, 4, 9, '345', 'অন্যান্য ইনপুট', 'rt4', 'boy', '1702306768', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Gopalganj', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', '', '', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', NULL, '34645', '4242', NULL, 'h esfds', 'h asdff', '2', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(41, 10, 2, 12, '345', 'অন্যান্য ইনপুট', 'rt4', 'boy', '1702308242', 'rghg', 'dfg', 'sgfh', 'sdfghg', 'পূনঃবন্দোবস্তী(হস্তান্তর)', 'Head Light', '01967660788', 'sdfg', 'dfdg', 'sdfgg', 'sdfgh', 'sdg', '', '', 'dsfg', 'sfgh', 0, NULL, NULL, NULL, NULL, 'pending', NULL, '0.00', 'pending', NULL, 'h name', '', 'h mobaile', 'h birth', 'h nid', 'h father', 'h spouse', 'h asdff', '3', 'h sdafsdf', 'h dafaf', 'হ্যাঁ', 'হ্যাঁ', 'dsfghg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'shdg', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'হ্যাঁ', 'dfjsdf', '2023-12-11 09:26:37', '2023-12-11 09:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('general','handover') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'general',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bazars`
--

CREATE TABLE `bazars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `upazilla_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bazars`
--

INSERT INTO `bazars` (`id`, `upazilla_id`, `name`, `created_at`, `updated_at`) VALUES
(5, 1, 'খাগড়াছড়ি বাজার', '2023-08-14 03:52:58', '2023-08-14 03:52:58'),
(6, 1, 'দেওয়ান বাজার', '2023-08-14 03:53:14', '2023-08-14 03:53:14'),
(7, 1, 'ভাইবোনছড়া বাজার', '2023-08-14 03:53:38', '2023-08-14 03:53:38'),
(8, 4, 'পানছড়ি বাজার', '2023-08-14 03:54:08', '2023-08-14 03:54:08'),
(9, 4, 'লোগাং বাজার', '2023-08-14 03:54:33', '2023-08-14 03:54:33'),
(10, 4, 'উল্টাছড়ি বাজার', '2023-08-14 03:54:50', '2023-08-14 03:54:50'),
(11, 2, 'দীঘিনালা বাজার', '2023-08-14 03:55:06', '2023-08-14 03:55:06'),
(12, 2, 'বোয়ালখালি বাজার', '2023-08-14 03:55:21', '2023-08-14 03:55:21'),
(13, 2, 'বোয়ালখালি নতুন বাজার', '2023-08-14 03:56:17', '2023-08-14 03:56:17'),
(14, 2, 'বাবুছড়া বাজার', '2023-08-14 03:56:34', '2023-08-14 03:56:34'),
(15, 2, 'ছোটমেরুং বাজার', '2023-08-14 03:56:54', '2023-08-14 03:56:54'),
(16, 3, 'মহালছড়ি বাজার', '2023-08-14 03:57:11', '2023-08-14 03:57:11'),
(17, 3, 'মাইচছড়ি বাজার', '2023-08-14 03:57:28', '2023-08-14 03:57:28'),
(18, 7, 'লক্ষীছড়ি বাজার', '2023-08-14 03:57:44', '2023-08-14 03:57:44'),
(19, 6, 'মানিকছড়ি বাজার', '2023-08-14 03:58:01', '2023-08-14 03:58:01'),
(20, 6, 'তিনটহরী বাজার', '2023-08-14 03:58:18', '2023-08-14 03:58:18'),
(21, 6, 'গাড়ীটানা বাজার', '2023-08-14 03:58:44', '2023-08-14 03:58:44'),
(22, 6, 'যোগ্যছোলা বাজার', '2023-08-14 03:59:03', '2023-08-14 03:59:03'),
(23, 6, 'কালাপানি বাজার', '2023-08-14 03:59:32', '2023-08-14 03:59:32'),
(24, 6, 'বাটনাতলী বাজার', '2023-08-14 03:59:49', '2023-08-14 03:59:49'),
(25, 6, 'গচ্ছাবিল বাজার', '2023-08-14 04:01:53', '2023-08-14 04:01:53'),
(26, 8, 'রামগড় বাজার', '2023-08-14 04:02:09', '2023-08-14 04:02:09'),
(27, 8, 'হাতিমুড়া বাজার', '2023-08-14 04:02:31', '2023-08-14 04:02:31'),
(28, 5, 'মাটিরাঙ্গা বাজার', '2023-08-14 04:02:51', '2023-08-14 04:02:51'),
(29, 5, 'খেদাছড়া বাজার', '2023-08-14 04:03:23', '2023-08-14 04:03:23'),
(30, 6, 'বেলছড়ি বাজার', '2023-08-14 04:03:55', '2023-08-14 04:03:55'),
(31, 5, 'শান্তিপুর বাজার', '2023-08-14 04:07:04', '2023-08-14 04:07:04'),
(32, 5, 'গুমতি বাজার', '2023-08-14 04:07:43', '2023-08-14 04:07:43'),
(33, 5, 'রামশিরা বাজার', '2023-08-14 04:08:09', '2023-08-14 04:08:09'),
(34, 5, 'বড়নাল বাজার', '2023-08-14 04:08:31', '2023-08-14 04:08:31'),
(35, 5, 'ডাকবাংলা বাজার', '2023-08-14 04:08:53', '2023-08-14 04:08:53'),
(36, 5, 'বাংলা বাজার', '2023-08-14 04:09:12', '2023-08-14 04:09:12'),
(37, 5, 'তাইন্দং বাজার', '2023-08-14 04:09:30', '2023-08-14 04:09:30'),
(38, 5, 'মোল্লা বাজার', '2023-08-14 04:09:46', '2023-08-14 04:09:46'),
(39, 9, 'গুইমারা বাজার', '2023-08-14 04:10:08', '2023-08-14 04:10:08'),
(40, 9, 'সিন্দুকছড়ি বাজার', '2023-08-14 04:10:25', '2023-08-14 04:10:25'),
(42, 9, 'বড়পিলাক বাজার', '2023-08-14 04:11:30', '2023-08-14 04:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_02_23_00500_create_upazillas_table', 1),
(7, '2023_02_23_030940_create_bazars_table', 1),
(8, '2023_02_23_031531_create_permission_tables', 1),
(9, '2023_02_23_045540_create_applications_table', 1),
(10, '2023_02_23_052909_create_notices_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `publish_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `publish_date`, `title`, `details`, `file`, `created_at`, `updated_at`) VALUES
(1, '2023-03-01', 'hhhj', '<p>fgg</p>', '1677663626_1677424249_INVENTORY-SOFTWARE-QUOTATION.pdf', '2023-03-01 03:40:26', '2023-03-01 03:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `type` enum('general','handover') NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `application_id`, `title`, `file_name`, `type`, `created_at`, `updated_at`) VALUES
(8, 17, 'আবেদনকারীর ছবি', 'forhad-0-20231207184823.jpg', 'general', '2023-12-07 12:48:23', '2023-12-07 12:48:23'),
(9, 17, 'আবেদনকারীর জন্ম নিবন্ধন সনদ কপি', 'forhad-1-20231207184823.jpg', 'general', '2023-12-07 12:48:23', '2023-12-07 12:48:23'),
(10, 17, 'আবেদনকারীর এনআইডি কপি', 'forhad-2-20231207184823.jpg', 'general', '2023-12-07 12:48:23', '2023-12-07 12:48:23'),
(11, 17, 'কবুলিয়ত/পাট্টার কপি', 'forhad-3-20231207184823.jpg', 'general', '2023-12-07 12:48:23', '2023-12-07 12:48:23'),
(12, 17, 'খালসন খাজনা পরিশোধের কপি', 'forhad-4-20231207184823.jpg', 'general', '2023-12-07 12:48:23', '2023-12-07 12:48:23'),
(13, 18, 'আবেদনকারীর ছবি', 'Gazi Nasim-0-20231207185239.jpg', 'general', '2023-12-07 12:52:39', '2023-12-07 12:52:39'),
(14, 18, 'আবেদনকারীর জন্ম নিবন্ধন সনদ কপি', 'Gazi Nasim-1-20231207185239.jpg', 'general', '2023-12-07 12:52:39', '2023-12-07 12:52:39'),
(15, 18, 'আবেদনকারীর এনআইডি কপি', 'Gazi Nasim-2-20231207185239.jpg', 'general', '2023-12-07 12:52:39', '2023-12-07 12:52:39'),
(16, 18, 'কবুলিয়ত/পাট্টার কপি', 'Gazi Nasim-3-20231207185239.jpg', 'general', '2023-12-07 12:52:39', '2023-12-07 12:52:39'),
(17, 18, 'খালসন খাজনা পরিশোধের কপি', 'Gazi Nasim-4-20231207185239.jpg', 'general', '2023-12-07 12:52:39', '2023-12-07 12:52:39'),
(18, 18, 'বাজার চৌধুরীর প্রতিবেদন/সুপারিশ', 'Gazi Nasim-5-20231207185239.jpg', 'general', '2023-12-07 12:52:39', '2023-12-07 12:52:39'),
(19, 18, 'ককক', 'Gazi Nasim-6-20231207185239.jpg', 'general', '2023-12-07 12:52:39', '2023-12-07 12:52:39'),
(20, 18, 'হস্তান্তরকারীর ছবি', 'Gazi Nasim-7-20231207185239.jpg', 'handover', '2023-12-07 12:52:39', '2023-12-07 12:52:39'),
(21, 19, 'আবেদনকারীর ছবি', 'Gazi Nasim-0-20231208020300.jpg', 'general', '2023-12-07 20:03:00', '2023-12-07 20:03:00'),
(22, 19, 'আবেদনকারীর জন্ম নিবন্ধন সনদ কপি', 'Gazi Nasim-1-20231208020300.jpg', 'general', '2023-12-07 20:03:00', '2023-12-07 20:03:00'),
(23, 19, 'আবেদনকারীর এনআইডি কপি', 'Gazi Nasim-2-20231208020300.jpg', 'general', '2023-12-07 20:03:00', '2023-12-07 20:03:00'),
(24, 19, 'কবুলিয়ত/পাট্টার কপি', 'Gazi Nasim-3-20231208020300.jpg', 'general', '2023-12-07 20:03:00', '2023-12-07 20:03:00'),
(25, 19, 'খালসন খাজনা পরিশোধের কপি', 'Gazi Nasim-4-20231208020300.jpg', 'general', '2023-12-07 20:03:00', '2023-12-07 20:03:00'),
(26, 20, 'আবেদনকারীর ছবি', 'Test-0-20231208022117.jpg', 'general', '2023-12-07 20:21:17', '2023-12-07 20:21:17'),
(27, 20, 'আবেদনকারীর জন্ম নিবন্ধন সনদ কপি', 'Test-1-20231208022117.jpg', 'general', '2023-12-07 20:21:17', '2023-12-07 20:21:17'),
(28, 20, 'আবেদনকারীর এনআইডি কপি', 'Test-2-20231208022117.jpg', 'general', '2023-12-07 20:21:17', '2023-12-07 20:21:17'),
(29, 20, 'কবুলিয়ত/পাট্টার কপি', 'Test-3-20231208022117.jpg', 'general', '2023-12-07 20:21:17', '2023-12-07 20:21:17'),
(30, 20, 'খালসন খাজনা পরিশোধের কপি', 'Test-4-20231208022117.jpg', 'general', '2023-12-07 20:21:17', '2023-12-07 20:21:17'),
(31, 20, 'বাজার চৌধুরীর প্রতিবেদন/সুপারিশ', 'Test-5-20231208022117.jpg', 'general', '2023-12-07 20:21:17', '2023-12-07 20:21:17'),
(32, 20, 'ককক', 'Test-6-20231208022117.jpg', 'general', '2023-12-07 20:21:17', '2023-12-07 20:21:17'),
(33, 20, 'হস্তান্তরকারীর ছবি', 'Test-7-20231208022117.jpg', 'handover', '2023-12-07 20:21:17', '2023-12-07 20:21:17'),
(34, 20, 'হস্তান্তরকারীর জন্ম নিবন্ধন সনদ কপি', 'Test-8-20231208022117.jpg', 'handover', '2023-12-07 20:21:17', '2023-12-07 20:21:17'),
(35, 21, 'আবেদনকারীর ছবি', 'Gazi Nasim-0-20231208023534.jpg', 'general', '2023-12-07 20:35:34', '2023-12-07 20:35:34'),
(36, 21, 'আবেদনকারীর জন্ম নিবন্ধন সনদ কপি', 'Gazi Nasim-1-20231208023534.jpg', 'general', '2023-12-07 20:35:34', '2023-12-07 20:35:34'),
(37, 21, 'আবেদনকারীর এনআইডি কপি', 'Gazi Nasim-2-20231208023534.jpg', 'general', '2023-12-07 20:35:34', '2023-12-07 20:35:34'),
(38, 21, 'কবুলিয়ত/পাট্টার কপি', 'Gazi Nasim-3-20231208023534.jpg', 'general', '2023-12-07 20:35:34', '2023-12-07 20:35:34'),
(39, 21, 'খালসন খাজনা পরিশোধের কপি', 'Gazi Nasim-4-20231208023534.jpg', 'general', '2023-12-07 20:35:34', '2023-12-07 20:35:34'),
(40, 21, 'বাজার চৌধুরীর প্রতিবেদন/সুপারিশ', 'Gazi Nasim-5-20231208023534.jpg', 'general', '2023-12-07 20:35:34', '2023-12-07 20:35:34'),
(41, 21, 'ককক', 'Gazi Nasim-6-20231208023534.jpg', 'general', '2023-12-07 20:35:34', '2023-12-07 20:35:34'),
(42, 21, 'হস্তান্তরকারীর ছবি', 'Gazi Nasim-7-20231208023534.jpg', 'handover', '2023-12-07 20:35:34', '2023-12-07 20:35:34'),
(43, 21, 'হস্তান্তরকারীর জন্ম নিবন্ধন সনদ কপি', 'Gazi Nasim-8-20231208023534.jpg', 'handover', '2023-12-07 20:35:34', '2023-12-07 20:35:34'),
(44, 23, 'আবেদনকারীর ছবি', 'Gazi Nasim-0-20231208024409.jpg', 'general', '2023-12-07 20:44:09', '2023-12-07 20:44:09'),
(45, 23, 'আবেদনকারীর জন্ম নিবন্ধন সনদ কপি', 'Gazi Nasim-1-20231208024409.jpg', 'general', '2023-12-07 20:44:09', '2023-12-07 20:44:09'),
(46, 23, 'আবেদনকারীর এনআইডি কপি', 'Gazi Nasim-2-20231208024409.jpg', 'general', '2023-12-07 20:44:09', '2023-12-07 20:44:09'),
(47, 23, 'কবুলিয়ত/পাট্টার কপি', 'Gazi Nasim-3-20231208024409.jpg', 'general', '2023-12-07 20:44:09', '2023-12-07 20:44:09'),
(48, 23, 'খালসন খাজনা পরিশোধের কপি', 'Gazi Nasim-4-20231208024409.jpg', 'general', '2023-12-07 20:44:09', '2023-12-07 20:44:09'),
(49, 23, 'বাজার চৌধুরীর প্রতিবেদন/সুপারিশ', 'Gazi Nasim-5-20231208024409.jpg', 'general', '2023-12-07 20:44:09', '2023-12-07 20:44:09'),
(50, 23, 'কককKJ', 'Gazi Nasim-6-20231208024409.jpg', 'general', '2023-12-07 20:44:09', '2023-12-07 20:44:09'),
(51, 23, 'হস্তান্তরকারীর ছবি', 'Gazi Nasim-7-20231208024409.jpg', 'handover', '2023-12-07 20:44:09', '2023-12-07 20:44:09'),
(52, 23, 'হস্তান্তরকারীর জন্ম নিবন্ধন সনদ কপি', 'Gazi Nasim-8-20231208024409.jpg', 'handover', '2023-12-07 20:44:09', '2023-12-07 20:44:09'),
(53, 36, 'আবেদনকারীর ছবি', 'forhad-0-20231208030759.jpg', 'general', '2023-12-07 21:07:59', '2023-12-07 21:07:59'),
(54, 36, 'আবেদনকারীর জন্ম নিবন্ধন সনদ কপি', 'forhad-1-20231208030759.jpg', 'general', '2023-12-07 21:07:59', '2023-12-07 21:07:59'),
(55, 36, 'আবেদনকারীর এনআইডি কপি', 'forhad-2-20231208030759.jpg', 'general', '2023-12-07 21:07:59', '2023-12-07 21:07:59'),
(56, 36, 'কবুলিয়ত/পাট্টার কপি', 'forhad-3-20231208030759.jpg', 'general', '2023-12-07 21:07:59', '2023-12-07 21:07:59'),
(57, 36, 'খালসন খাজনা পরিশোধের কপি', 'forhad-4-20231208030759.jpg', 'general', '2023-12-07 21:07:59', '2023-12-07 21:07:59'),
(58, 36, 'বাজার চৌধুরীর প্রতিবেদন/সুপারিশ', 'forhad-5-20231208030759.jpg', 'general', '2023-12-07 21:07:59', '2023-12-07 21:07:59'),
(59, 36, 'ককক', 'forhad-6-20231208030759.jpg', 'general', '2023-12-07 21:07:59', '2023-12-07 21:07:59'),
(60, 36, 'হস্তান্তরকারীর ছবি', 'forhad-7-20231208030759.jpg', 'handover', '2023-12-07 21:07:59', '2023-12-07 21:07:59'),
(61, 36, 'হস্তান্তরকারীর জন্ম নিবন্ধন সনদ কপি', 'forhad-8-20231208030759.jpg', 'handover', '2023-12-07 21:07:59', '2023-12-07 21:07:59'),
(62, 36, 'হস্তান্তরকারীর এনআইডি কপি', 'forhad-9-20231208030759.jpg', 'handover', '2023-12-07 21:07:59', '2023-12-07 21:07:59'),
(63, 36, 'কককKJ', 'forhad-10-20231208030759.jpg', 'handover', '2023-12-07 21:07:59', '2023-12-07 21:07:59'),
(64, 37, 'আবেদনকারীর ছবি', 'Gazi Nasim-0-20231208031214.jpg', 'general', '2023-12-07 21:12:14', '2023-12-07 21:12:14'),
(65, 37, 'আবেদনকারীর জন্ম নিবন্ধন সনদ কপি', 'Gazi Nasim-1-20231208031214.jpg', 'general', '2023-12-07 21:12:14', '2023-12-07 21:12:14'),
(66, 37, 'আবেদনকারীর এনআইডি কপি', 'Gazi Nasim-2-20231208031214.jpg', 'general', '2023-12-07 21:12:14', '2023-12-07 21:12:14'),
(67, 37, 'কবুলিয়ত/পাট্টার কপি', 'Gazi Nasim-3-20231208031214.jpg', 'general', '2023-12-07 21:12:14', '2023-12-07 21:12:14'),
(68, 37, 'খালসন খাজনা পরিশোধের কপি', 'Gazi Nasim-4-20231208031214.jpg', 'general', '2023-12-07 21:12:14', '2023-12-07 21:12:14'),
(69, 37, 'বাজার চৌধুরীর প্রতিবেদন/সুপারিশ', 'Gazi Nasim-5-20231208031214.jpg', 'general', '2023-12-07 21:12:14', '2023-12-07 21:12:14'),
(70, 37, 'ককক', 'Gazi Nasim-6-20231208031214.jpg', 'general', '2023-12-07 21:12:14', '2023-12-07 21:12:14'),
(71, 37, 'হস্তান্তরকারীর ছবি', 'Gazi Nasim-7-20231208031214.jpg', 'handover', '2023-12-07 21:12:14', '2023-12-07 21:12:14'),
(72, 37, 'হস্তান্তরকারীর জন্ম নিবন্ধন সনদ কপি', 'Gazi Nasim-8-20231208031214.jpg', 'handover', '2023-12-07 21:12:14', '2023-12-07 21:12:14'),
(73, 37, 'হস্তান্তরকারীর এনআইডি কপি', 'Gazi Nasim-9-20231208031214.jpg', 'handover', '2023-12-07 21:12:14', '2023-12-07 21:12:14'),
(74, 37, 'কককKJ', 'Gazi Nasim-10-20231208031214.jpg', 'handover', '2023-12-07 21:12:14', '2023-12-07 21:12:14'),
(75, 39, 'আবেদনকারীর ছবি', 'Test-0-20231208031845.jpg', 'general', '2023-12-07 21:18:45', '2023-12-07 21:18:45'),
(76, 39, 'আবেদনকারীর জন্ম নিবন্ধন সনদ কপি', 'Test-1-20231208031845.jpg', 'general', '2023-12-07 21:18:45', '2023-12-07 21:18:45'),
(77, 39, 'আবেদনকারীর এনআইডি কপি', 'Test-2-20231208031845.jpg', 'general', '2023-12-07 21:18:45', '2023-12-07 21:18:45'),
(78, 39, 'কবুলিয়ত/পাট্টার কপি', 'Test-3-20231208031845.jpg', 'general', '2023-12-07 21:18:45', '2023-12-07 21:18:45'),
(79, 39, 'খালসন খাজনা পরিশোধের কপি', 'Test-4-20231208031845.jpg', 'general', '2023-12-07 21:18:45', '2023-12-07 21:18:45'),
(80, 39, 'বাজার চৌধুরীর প্রতিবেদন/সুপারিশ', 'Test-5-20231208031845.jpg', 'general', '2023-12-07 21:18:45', '2023-12-07 21:18:45'),
(81, 39, 'ককক', 'Test-6-20231208031845.jpg', 'general', '2023-12-07 21:18:45', '2023-12-07 21:18:45'),
(82, 39, 'হস্তান্তরকারীর ছবি', 'Test-7-20231208031845.jpg', 'handover', '2023-12-07 21:18:45', '2023-12-07 21:18:45'),
(83, 39, 'হস্তান্তরকারীর জন্ম নিবন্ধন সনদ কপি', 'Test-8-20231208031845.jpg', 'handover', '2023-12-07 21:18:45', '2023-12-07 21:18:45'),
(84, 39, 'হস্তান্তরকারীর এনআইডি কপি', 'Test-9-20231208031846.jpg', 'handover', '2023-12-07 21:18:46', '2023-12-07 21:18:46'),
(85, 39, 'কককKJ', 'Test-10-20231208031846.jpg', 'handover', '2023-12-07 21:18:46', '2023-12-07 21:18:46'),
(86, 40, 'আবেদনকারীর ছবি', 'Gopalganj-0-20231211150213.jpg', 'general', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(87, 40, 'আবেদনকারীর জন্ম নিবন্ধন সনদ কপি', 'Gopalganj-1-20231211150213.jpg', 'general', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(88, 40, 'আবেদনকারীর এনআইডি কপি', 'Gopalganj-2-20231211150213.jpg', 'general', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(89, 40, 'কবুলিয়ত/পাট্টার কপি', 'Gopalganj-3-20231211150213.jpg', 'general', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(90, 40, 'খালসন খাজনা পরিশোধের কপি', 'Gopalganj-4-20231211150213.jpg', 'general', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(91, 40, 'বাজার চৌধুরীর প্রতিবেদন/সুপারিশ', 'Gopalganj-5-20231211150213.jpg', 'general', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(92, 40, 'ককক', 'Gopalganj-6-20231211150213.jpg', 'general', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(93, 40, 'ককক2', 'Gopalganj-7-20231211150213.jpg', 'general', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(94, 40, 'হস্তান্তরকারীর ছবি', 'Gopalganj-8-20231211150213.jpg', 'handover', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(95, 40, 'হস্তান্তরকারীর জন্ম নিবন্ধন সনদ কপি', 'Gopalganj-9-20231211150213.jpg', 'handover', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(96, 40, 'হস্তান্তরকারীর এনআইডি কপি', 'Gopalganj-10-20231211150213.jpg', 'handover', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(97, 40, 'কককKJ', 'Gopalganj-11-20231211150213.jpg', 'handover', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(98, 40, 'কককKJ', 'Gopalganj-12-20231211150213.jpg', 'handover', '2023-12-11 09:02:13', '2023-12-11 09:02:13'),
(99, 41, 'আবেদনকারীর ছবি', 'Head Light-0-20231211152637.jpg', 'general', '2023-12-11 09:26:37', '2023-12-11 09:26:37'),
(100, 41, 'আবেদনকারীর জন্ম নিবন্ধন সনদ কপি', 'Head Light-1-20231211152637.jpg', 'general', '2023-12-11 09:26:37', '2023-12-11 09:26:37'),
(101, 41, 'আবেদনকারীর এনআইডি কপি', 'Head Light-2-20231211152637.jpg', 'general', '2023-12-11 09:26:37', '2023-12-11 09:26:37'),
(102, 41, 'কবুলিয়ত/পাট্টার কপি', 'Head Light-3-20231211152637.jpg', 'general', '2023-12-11 09:26:37', '2023-12-11 09:26:37'),
(103, 41, 'খালসন খাজনা পরিশোধের কপি', 'Head Light-4-20231211152637.jpg', 'general', '2023-12-11 09:26:37', '2023-12-11 09:26:37'),
(104, 41, 'বাজার চৌধুরীর প্রতিবেদন/সুপারিশ', 'Head Light-5-20231211152637.jpg', 'general', '2023-12-11 09:26:37', '2023-12-11 09:26:37'),
(105, 41, 'ককক', 'Head Light-6-20231211152637.jpg', 'general', '2023-12-11 09:26:37', '2023-12-11 09:26:37'),
(106, 41, 'হস্তান্তরকারীর ছবি', 'Head Light-7-20231211152637.jpg', 'handover', '2023-12-11 09:26:37', '2023-12-11 09:26:37'),
(107, 41, 'হস্তান্তরকারীর জন্ম নিবন্ধন সনদ কপি', 'Head Light-8-20231211152637.jpg', 'handover', '2023-12-11 09:26:37', '2023-12-11 09:26:37'),
(108, 41, 'হস্তান্তরকারীর এনআইডি কপি', 'Head Light-9-20231211152637.jpg', 'handover', '2023-12-11 09:26:37', '2023-12-11 09:26:37'),
(109, 41, 'খখখ', 'Head Light-10-20231211152637.jpg', 'handover', '2023-12-11 09:26:37', '2023-12-11 09:26:37'),
(110, 41, 'খখখ২', 'Head Light-11-20231211152637.jpg', 'handover', '2023-12-11 09:26:37', '2023-12-11 09:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groups` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `groups`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'রোল তৈরী', 'রোল', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(2, 'রোল মুছে ফেলা', 'রোল', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(3, 'রোল হালনাগাদ', 'রোল', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(4, 'রোল দেখা', 'রোল', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(5, 'বাজার তৈরী', 'বাজার', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(6, 'বাজার মুছে ফেলা', 'বাজার', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(7, 'বাজার হালনাগাদ', 'বাজার', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(8, 'বাজার দেখা', 'বাজার', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(9, 'ব্যবহারকারী তৈরী', 'ব্যবহারকারী', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(10, 'ব্যবহারকারী মুছে ফেলা', 'ব্যবহারকারী', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(11, 'ব্যবহারকারী হালনাগাদ', 'ব্যবহারকারী', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(12, 'ব্যবহারকারী দেখা', 'ব্যবহারকারী', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(13, 'আবেদন করা', 'আবেদনপত্র', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(14, 'আবেদনপত্র হালনাগাদ', 'আবেদনপত্র', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(15, 'আবেদনপত্র মুছে ফেলা', 'আবেদনপত্র', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(16, 'আবেদনপত্র দেখা', 'আবেদনপত্র', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(17, 'আবেদনপত্র নথিতে উপস্থাপন', 'আবেদনপত্র', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(18, 'পরিদর্শন প্রতিবেদন প্রদান', 'আবেদনপত্র', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(19, 'নোটিশ প্রকাশ করা', 'আবেদনপত্র', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(20, 'জমা স্লিপ আপলোড', 'আবেদনপত্র', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plotrecords`
--

CREATE TABLE `plotrecords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bazar_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plot_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plotrecords`
--

INSERT INTO `plotrecords` (`id`, `bazar_id`, `user_id`, `plot_no`, `from_date`, `to_date`, `type`, `created_at`, `updated_at`) VALUES
(1, 16, 1, '12', '2023-09-01', '2024-11-30', 'বন্দোবস্তী', '2023-09-16 15:33:15', '2023-09-16 15:33:15'),
(2, 5, 1, '1234', '2023-09-17', '2024-01-31', 'বন্দোবস্তী', '2023-09-16 15:50:22', '2023-09-16 15:50:22'),
(4, 5, 1, '৫৬৭৮', '2023-09-01', '2023-11-30', 'বন্দোবস্তী', '2023-09-16 16:17:49', '2023-09-16 16:17:49'),
(5, 5, 1, '৫৬৭৮', '2023-09-01', '2023-11-30', 'বন্দোবস্তী', '2023-09-17 04:21:33', '2023-09-17 04:21:33'),
(6, 5, 7, '২৩৩', '2023-11-01', '2023-11-30', 'বন্দোবস্তী', '2023-11-19 04:50:52', '2023-11-19 04:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'আবেদনকারী', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(2, 'বেঞ্চ সহকারী', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(3, 'সার্ভেয়ার', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(4, 'বাজার চৌধুরী', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(5, 'Super Admin', 'web', '2023-03-01 00:02:43', '2023-03-01 00:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 5),
(2, 5),
(3, 5),
(4, 2),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 1),
(13, 5),
(14, 1),
(14, 2),
(14, 5),
(15, 1),
(15, 5),
(16, 1),
(16, 2),
(16, 4),
(16, 5),
(17, 2),
(17, 5),
(18, 3),
(18, 4),
(18, 5),
(19, 2),
(19, 5),
(20, 1),
(20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `upazillas`
--

CREATE TABLE `upazillas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazillas`
--

INSERT INTO `upazillas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'খাগড়াছড়ি সদর', NULL, NULL),
(2, 'দীঘিনালা', NULL, NULL),
(3, 'মহালছড়ি', NULL, NULL),
(4, 'পানছড়ি', NULL, NULL),
(5, 'মাটিরাঙ্গা', NULL, NULL),
(6, 'মানিকছড়ি', NULL, NULL),
(7, 'লক্ষীছড়ি', NULL, NULL),
(8, 'রামগড়', NULL, NULL),
(9, 'গু্ইমারা', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('visitor','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'visitor',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `otp`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super@email.com', '01735254291', NULL, '2023-03-01 00:02:43', '$2y$10$H8KV8vD5hOyya2hX4r/kr.BIPC7kquowl3mnf0ZWGJM7oPl8Huvv6', 'admin', 'l3HBnn8zek1P1r9kGi3ZMW3lj6TyESUGrYrZnCIioTyH9LxbKr4CkLXNJQuj', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(2, 'Bench Assistant', 'bench@email.com', '01735254296', NULL, '2023-03-01 00:02:43', '$2y$10$omWJY76/pxSxNkZ7VNq2Juj7P1yIdGKIvdnQ8s/dtfGKtE.tPCapa', 'admin', 'kjHiZFAObh', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(3, 'Surveyor', 'servey@email.com', '01735254297', NULL, '2023-03-01 00:02:43', '$2y$10$uDPgRig6ZgVuhcaA1KaE3.CUZXJeo6JmdDSsSDisKJWKezRqHhVpO', 'admin', '9DJ9KPNmPoopwkTOS8YQLuHgtdY2ueW6CMwd9UCiMj8ZWqSgsG7BQ8D1AgFu', '2023-03-01 00:02:43', '2023-03-01 00:02:43'),
(4, 'Chowdhuri', 'chowdhuri@email.com', '01735254298', NULL, '2023-03-01 00:02:44', '$2y$10$LgV8rg7PiRGVTYAyEj0nnuIWLxGSnpC6mRx2TiHX5yMxgg5bRdKkC', 'admin', '7CdH73pD1EWcJc91ZfiQLJicGlRbd768SFuLKgj0OBTe7a2lNwjWRqbphF6H', '2023-03-01 00:02:44', '2023-03-01 00:02:44'),
(5, 'sohel', 'mh@e.com', '01735254290', NULL, NULL, '$2y$10$R2ZhN.wepx6ZSY2Vld/rSe/ObJ7dOrDtrLK.z1DMDc/47nx44UIt6', 'admin', NULL, '2023-03-01 00:05:17', '2023-09-16 12:59:02'),
(6, 'Mazidul Islam Khan', 'mazidul.khan@gmail.com', '01922110401', NULL, NULL, '$2y$10$gDJOeJPX2WVPjZodtp7/DuVhP3auhWivShODY9FneX8GYnTbqFqmW', 'admin', 'emseO3PtqdhFskHsdUCmoXs0vMCCsvTeVcYn1yH4ZxXtds9BNiEduOJcfBYA', '2023-03-01 05:53:13', '2023-09-17 04:24:47'),
(7, 'Prabhankar Dewan', 'pkdewan80@gmail.com', '01816711696', NULL, NULL, '$2y$10$zpM6ICYwgXypy58pn19CT.PWTBt0buMy5PazVw3AxceYg4t1ociE6', 'visitor', NULL, '2023-03-01 23:37:44', '2023-03-01 23:37:44'),
(8, 'Prabhankar', 'itdept.khdc@gmail.com', '+8801816711696', NULL, NULL, '$2y$10$t/gHh9U20.1mlR5PEVFvdOXM0y0AR6VDqhf6bxuDPKJx48rltLHBG', 'visitor', NULL, '2023-08-13 22:41:24', '2023-08-13 22:41:24'),
(9, 'Md. Saifullah', 'saifulkhdc@gmail.com', '01556540001', NULL, NULL, '$2y$10$34oR3gvvIZnz2iHSd5zau.Y3GZC5dvZgCKfVld70qvlb4PnsDaN9S', 'visitor', NULL, '2023-08-14 00:13:59', '2023-08-14 00:13:59'),
(10, 'Morshed Habib', 'mhsohel017@gmail.com', '01735254295', NULL, NULL, '$2y$10$J5N4sw0wxv8xW43X1XACfejawfmTX3aYvj/CxAjipBCHYhELaeSum', 'visitor', NULL, '2023-12-04 00:05:47', '2023-12-04 00:05:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_user_id_foreign` (`user_id`),
  ADD KEY `applications_upazilla_id_foreign` (`upazilla_id`),
  ADD KEY `applications_bazar_id_foreign` (`bazar_id`),
  ADD KEY `address_up` (`address_up`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `bazars`
--
ALTER TABLE `bazars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bazars_upazilla_id_foreign` (`upazilla_id`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plotrecords`
--
ALTER TABLE `plotrecords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bazar_id` (`bazar_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `plot_no` (`plot_no`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `upazillas`
--
ALTER TABLE `upazillas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bazars`
--
ALTER TABLE `bazars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plotrecords`
--
ALTER TABLE `plotrecords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `upazillas`
--
ALTER TABLE `upazillas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_bazar_id_foreign` FOREIGN KEY (`bazar_id`) REFERENCES `bazars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_upazilla_id_foreign` FOREIGN KEY (`upazilla_id`) REFERENCES `upazillas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bazars`
--
ALTER TABLE `bazars`
  ADD CONSTRAINT `bazars_upazilla_id_foreign` FOREIGN KEY (`upazilla_id`) REFERENCES `upazillas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plotrecords`
--
ALTER TABLE `plotrecords`
  ADD CONSTRAINT `plotrecords_ibfk_1` FOREIGN KEY (`bazar_id`) REFERENCES `bazars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plotrecords_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
