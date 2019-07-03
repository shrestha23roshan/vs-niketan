-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2019 at 06:07 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vs_school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `description`, `attachment`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'School description', NULL, '1', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(2, 'Plus Two description', NULL, '1', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(3, 'BBA description', NULL, '1', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(4, 'EMBA description', NULL, '1', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(10) UNSIGNED NOT NULL,
  `certified_teacher` int(11) NOT NULL,
  `graduated_student` int(11) NOT NULL,
  `award_winner` int(11) NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `certified_teacher`, `graduated_student`, `award_winner`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 500, 65409, 289, '1', 1, 1, '2019-07-03 09:05:01', '2019-07-03 09:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `admission_form`
--

CREATE TABLE `admission_form` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `download_attachment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `download_caption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` bigint(20) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'School', '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(2, 'Plus Two', '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(3, 'BBA', '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(4, 'EMBA', '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photos`
--

CREATE TABLE `gallery_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `gallery_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `attachment` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `heading`, `name`, `designation`, `description`, `attachment`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'School Heading', 'Dr.Babin Pokhrel', 'Principal', 'School description', NULL, '1', 1, 1, '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(2, 'Plus Two Heading', 'Dr.Babin Pokhrel', 'Principal', 'Plus Two description', NULL, '1', 1, 1, '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(3, 'BBA Heading', 'Dr.Babin Pokhrel', 'Principal', 'BBA description', NULL, '1', 1, 1, '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(4, 'EMBA heading', 'Dr.Babin Pokhrel', 'Principal', 'EMBA description', NULL, '1', 1, 1, '2019-07-03 09:05:00', '2019-07-03 09:05:00');

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
(1464, '2019_03_07_071144_create_alumnis_table', 1),
(1866, '2014_10_12_100000_create_password_resets_table', 2),
(1867, '2019_02_25_063053_create_roles_table', 2),
(1868, '2019_02_25_063305_create_users_table', 2),
(1869, '2019_02_25_063342_create_modules_table', 2),
(1870, '2019_02_25_063441_create_role_modules_table', 2),
(1871, '2019_02_26_090944_create_messages_table', 2),
(1872, '2019_02_26_162251_create_achievements_table', 2),
(1873, '2019_02_27_053218_create_categories_table', 2),
(1874, '2019_02_27_065050_create_about_us_table', 2),
(1875, '2019_02_27_081400_create_banners_table', 2),
(1876, '2019_02_28_085911_create_gallery_table', 2),
(1877, '2019_03_01_071157_create_gallery_photos_table', 2),
(1878, '2019_03_03_061216_create_videos_table', 2),
(1879, '2019_03_05_091733_create_news_table', 2),
(1880, '2019_03_05_162648_create_notices_table', 2),
(1881, '2019_03_07_060646_create_testimonials_table', 2),
(1882, '2019_03_07_071144_create_alumni_table', 2),
(1883, '2019_03_08_044243_create_admission_form_table', 2),
(1884, '2019_03_09_052516_create_results_table', 2),
(1885, '2019_03_09_161019_create_settings_table', 2),
(1886, '2019_03_11_055026_create_seos_table', 2),
(1887, '2019_03_11_090325_create_events_table', 2),
(1888, '2019_03_11_142209_create_facilities_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `module_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu-class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_position` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `parent_id`, `module_name`, `slug`, `menu-class`, `icon`, `order_position`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 0, 'User Management', 'admin.privilege', 'privilege', 'fa fa-cog', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(2, 1, 'Role', 'admin.privilege.role', 'role', 'fa fa-users', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(3, 1, 'User', 'admin.privilege.user', 'user', 'fa fa-user', 2, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(4, 0, 'Content Management', 'admin.content-management', 'content-management', 'fa fa-file-text', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(5, 4, 'About us', 'admin.content-management.about-us', 'about-us', 'fa fa-file-image-o', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(6, 4, 'Message', 'admin.content-management.message', 'message', 'fa fa-envelope', 2, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(7, 4, 'Achievements', 'admin.content-management.achievements', 'achievements', 'fa fa-trophy', 3, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(8, 4, 'Facilities', 'admin.content-management.facilities', 'facilities', 'fa fa-th-list', 4, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(9, 0, 'Media Management', 'admin.media-management', 'media-management', 'fa fa-image', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(10, 9, 'Banner', 'admin.media-management.banner', 'banner', 'fa fa-image', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(11, 9, 'Gallery', 'admin.media-management.gallery', 'gallery', 'fa fa-image', 2, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(12, 9, 'Video', 'admin.media-management.video', 'video', 'fa fa-file-video-o', 3, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(13, 0, 'Bulletin Board Management', 'admin.bulletin-board-management', 'bulletin-board-management', 'fa fa-calendar', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(14, 13, 'News', 'admin.bulletin-board-management.news', 'news', 'fa fa-newspaper-o', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(15, 13, 'Event', 'admin.bulletin-board-management.event', 'event', 'fa fa-calendar', 2, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(16, 13, 'Notice', 'admin.bulletin-board-management.notice', 'notice', 'fa fa-bell', 3, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(17, 0, 'Testimonial', 'admin.testimonial', 'testimonial', 'fa fa-user', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(18, 0, 'Alumni', 'admin.alumni', 'alumni', 'fa fa-users', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(19, 0, 'Downloads', 'admin.download', 'download', 'fa fa-download', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(20, 19, 'Result', 'admin.download.result', 'result', 'fa fa-file', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(21, 19, 'Admission Form', 'admin.download.admission-form', 'admission-form', 'fa fa-file', 2, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(22, 0, 'SEO', 'admin.seo', 'seo', 'fa fa-search', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(23, 0, 'Settings', 'admin.settings', 'settings', 'fa fa-gears', 1, '1', '2019-07-03 09:05:00', '2019-07-03 09:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `download_attachment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `download_caption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '1', '2019-07-03 09:04:59', '2019-07-03 09:04:59'),
(2, 'Admin', '1', '2019-07-03 09:04:59', '2019-07-03 09:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_modules`
--

CREATE TABLE `role_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_modules`
--

INSERT INTO `role_modules` (`id`, `role_id`, `module_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 2, 4),
(25, 2, 5),
(26, 2, 6),
(27, 2, 7),
(28, 2, 8),
(29, 2, 9),
(30, 2, 10),
(31, 2, 11),
(32, 2, 12),
(33, 2, 13),
(34, 2, 14),
(35, 2, 15),
(36, 2, 16),
(37, 2, 17),
(38, 2, 18),
(39, 2, 19),
(40, 2, 20),
(41, 2, 21),
(42, 2, 22),
(43, 2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `page`, `meta_title`, `meta_tags`, `meta_description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Home', 'meta tags', 'meta description', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(2, 'about-us', 'About Us', 'meta tags', 'meta description', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(3, 'facilities', 'Facilities', 'meta tags', 'meta description', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(4, 'events', 'Events', 'meta tags', 'meta description', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(5, 'news & update', 'News & Updates', 'meta tags', 'meta description', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(6, 'images', 'Images', 'meta tags', 'meta description', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(7, 'videos', 'Videos', 'meta tags', 'meta description', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(8, 'alumni', 'Alumni', 'meta tags', 'meta description', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(9, 'results', 'Results', 'meta tags', 'meta description', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(10, 'admission form', 'Admission Form', 'meta tags', 'meta description', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(11, 'alumni form', 'Alumni Form', 'meta tags', 'meta description', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01'),
(12, 'contact-us', 'Contact Us', 'meta tags', 'meta description', NULL, NULL, '2019-07-03 09:05:01', '2019-07-03 09:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_copyright` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_email`, `site_phone1`, `site_phone2`, `site_address`, `site_description`, `site_logo`, `site_favicon`, `site_copyright`, `facebook_url`, `twitter_url`, `youtube_url`, `created_at`, `updated_at`) VALUES
(1, 'VS NIKETAN', 'info@vsniketan.com', '0123456789', '0123456780', 'Tinkune', 'Vs niketandescription.', NULL, NULL, 'Copyright © 2019 Vs Niketan. All Rights Reserved.', 'url', 'url', 'url', '2019-07-03 09:05:01', '2019-07-03 09:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `image_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `full_name`, `designation`, `is_active`, `image_icon`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$10$7N0xCo1m5HLCHMOPLxrb9ufXgFsLg3tENBQiUiAV01SFcNLE4SpdC', 'DradTech', 'Developer', '1', NULL, 'k65cuTsXz1WRZxJRvAORRtxqmbFqXIgVeB7dbCa1eQlm2Yg1aVuPMQ5W9EdU', '2019-07-03 09:05:00', '2019-07-03 09:05:00'),
(2, 2, 'vs-niketan-login', '$2y$10$eZI4yyUhPgUDnznnNE/nu.HJohbxwIThxtyTI.AeaT3rT6wdt/AEG', 'VS Niketan', 'Admin', '1', NULL, 'wJ6pwfJrbLdTZuHjnYfu80lVOz9mN7xCJ7gaIdDV29ZtydB6LEit3Ki99bGr', '2019-07-03 09:05:00', '2019-07-03 09:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_embed_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_thumbnail_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_form`
--
ALTER TABLE `admission_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admission_form_category_id_foreign` (`category_id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`),
  ADD KEY `events_category_id_foreign` (`category_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gallery_slug_unique` (`slug`),
  ADD KEY `gallery_category_id_foreign` (`category_id`);

--
-- Indexes for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_photos_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`),
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notices_slug_unique` (`slug`),
  ADD KEY `notices_category_id_foreign` (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_modules`
--
ALTER TABLE `role_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_modules_role_id_foreign` (`role_id`),
  ADD KEY `role_modules_module_id_foreign` (`module_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `videos_slug_unique` (`slug`),
  ADD KEY `videos_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission_form`
--
ALTER TABLE `admission_form`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1889;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_modules`
--
ALTER TABLE `role_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission_form`
--
ALTER TABLE `admission_form`
  ADD CONSTRAINT `admission_form_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  ADD CONSTRAINT `gallery_photos_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_modules`
--
ALTER TABLE `role_modules`
  ADD CONSTRAINT `role_modules_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_modules_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
