-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2020 pada 21.59
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elkirana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_history`
--

CREATE TABLE `chat_history` (
  `id` int(11) NOT NULL,
  `id_chat` int(11) NOT NULL,
  `isi_chat` text NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `status_read` int(11) NOT NULL,
  `tanggal_chat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chat_history`
--

INSERT INTO `chat_history` (`id`, `id_chat`, `isi_chat`, `id_pengirim`, `id_penerima`, `status_read`, `tanggal_chat`) VALUES
(1, 1, 'iya', 3, 2, 1, '2020-06-22 03:14:56'),
(2, 1, 'mas', 3, 2, 1, '2020-06-22 03:17:47'),
(3, 1, 'asd', 2, 3, 1, '2020-06-22 03:45:02'),
(4, 1, 'hay', 3, 2, 1, '2020-06-22 03:49:20'),
(5, 1, 'we', 2, 3, 1, '2020-06-22 03:50:34'),
(6, 1, 'asd', 3, 2, 1, '2020-06-22 03:50:43'),
(7, 1, 'asd', 3, 2, 0, '2020-06-22 03:52:05'),
(8, 1, 'asd', 2, 3, 1, '2020-06-22 03:52:11'),
(9, 1, 'oh yaudah', 3, 2, 0, '2020-06-22 03:52:21'),
(10, 1, 'terus mau gimana', 3, 2, 0, '2020-06-22 03:53:06'),
(11, 1, 'ga fg', 2, 3, 1, '2020-06-22 03:53:54'),
(12, 1, 'asd', 2, 3, 1, '2020-06-22 03:57:19'),
(13, 1, 'sda', 2, 3, 1, '2020-06-22 03:57:43'),
(14, 1, 'asd', 2, 3, 1, '2020-06-22 03:57:53'),
(15, 1, 'asd', 2, 3, 1, '2020-06-22 04:04:27'),
(16, 1, 'asd', 2, 3, 1, '2020-06-22 04:04:46'),
(17, 1, 'asd', 2, 3, 1, '2020-06-22 04:05:58'),
(18, 1, 'asd', 2, 3, 1, '2020-06-22 04:06:30'),
(19, 1, 'asd', 2, 3, 1, '2020-06-22 04:06:33'),
(20, 1, 'asd', 2, 3, 1, '2020-06-22 04:06:38'),
(21, 1, 'asd', 2, 3, 1, '2020-06-22 04:08:28'),
(22, 1, 'asd', 2, 3, 1, '2020-06-22 04:08:45'),
(23, 1, 'asd', 2, 3, 1, '2020-06-22 04:08:58'),
(24, 1, 'asd', 2, 3, 1, '2020-06-22 04:09:30'),
(25, 1, 'mas', 2, 3, 1, '2020-06-22 04:09:37'),
(26, 1, 'mas', 2, 3, 1, '2020-06-22 04:09:56'),
(27, 1, 'asd', 2, 3, 1, '2020-06-22 04:10:00'),
(28, 1, 'asd', 2, 3, 1, '2020-06-22 04:10:01'),
(29, 1, 'asd', 2, 3, 1, '2020-06-22 04:10:35'),
(30, 1, 'asd', 2, 3, 1, '2020-06-22 04:10:46'),
(31, 1, 'asd', 2, 3, 1, '2020-06-22 04:12:03'),
(32, 1, 'masd', 2, 3, 1, '2020-06-22 04:12:21'),
(33, 1, 'mas', 2, 3, 1, '2020-06-22 04:12:39'),
(34, 1, 'asd', 2, 3, 1, '2020-06-22 04:14:36'),
(35, 1, 'asd', 2, 3, 1, '2020-06-22 04:14:38'),
(36, 1, 'asd', 2, 3, 1, '2020-06-22 04:14:42'),
(37, 1, 'asd', 2, 3, 1, '2020-06-22 04:15:01'),
(38, 1, 'asd', 2, 3, 1, '2020-06-22 04:15:10'),
(39, 1, 'ad', 2, 3, 1, '2020-06-22 04:15:23'),
(40, 1, 'ad', 2, 3, 1, '2020-06-22 04:15:34'),
(41, 1, 'a', 2, 3, 1, '2020-06-22 04:16:20'),
(42, 1, 'asd', 2, 3, 1, '2020-06-22 04:18:39'),
(43, 1, 'asd', 2, 3, 1, '2020-06-22 04:18:50'),
(44, 1, 'asd', 2, 3, 1, '2020-06-22 04:19:05'),
(45, 1, 'asd', 2, 3, 1, '2020-06-22 04:19:21'),
(46, 1, 'hey', 2, 3, 1, '2020-06-22 04:20:07'),
(47, 1, 'asd', 2, 3, 1, '2020-06-22 04:20:26'),
(48, 1, 'apa', 3, 2, 0, '2020-06-22 04:22:50'),
(49, 1, 'el', 3, 2, 0, '2020-06-22 04:24:27'),
(50, 1, 'el', 3, 2, 0, '2020-06-22 04:24:36'),
(51, 1, 'el', 3, 2, 0, '2020-06-22 04:24:48'),
(52, 2, 'iya', 3, 1, 0, '2020-06-22 04:27:55'),
(53, 2, 'apap', 1, 3, 1, '2020-06-22 04:28:01'),
(54, 1, 'mas', 2, 3, 1, '2020-06-22 04:28:12'),
(55, 2, 'apa', 3, 1, 0, '2020-06-22 04:28:24'),
(56, 1, 'yaudah', 3, 2, 0, '2020-06-22 04:28:28'),
(57, 22, 'asd', 3, 1, 0, '2020-06-22 05:54:15'),
(58, 22, 'asd', 1, 3, 1, '2020-06-22 05:54:19'),
(59, 22, 'asd', 3, 1, 0, '2020-06-22 05:54:25'),
(60, 22, 'asd', 1, 3, 1, '2020-06-22 05:54:27'),
(61, 22, 'hay', 1, 3, 1, '2020-06-22 05:55:13'),
(62, 22, 'mas', 1, 3, 1, '2020-06-22 05:56:27'),
(63, 22, 'asd', 3, 1, 0, '2020-06-22 05:56:39'),
(64, 22, 'asdasdas', 1, 3, 1, '2020-06-22 05:56:46'),
(65, 22, 'asdasdasdasd asd asd as dasd', 1, 3, 1, '2020-06-22 05:56:51'),
(66, 22, 'asdasd asda sd', 1, 3, 1, '2020-06-22 05:57:10'),
(67, 22, 'asd', 1, 3, 1, '2020-06-22 05:57:36'),
(68, 22, 'asd', 3, 1, 0, '2020-06-22 05:57:46'),
(69, 22, 'asd', 1, 3, 0, '2020-06-22 05:58:07'),
(70, 27, 'hay', 3, 1, 0, '2020-06-22 14:45:32'),
(71, 27, 'asd', 1, 3, 0, '2020-06-22 14:45:38'),
(72, 29, 'hay juga', 3, 1, 0, '2020-06-22 14:47:13'),
(73, 29, 'hay', 1, 3, 1, '2020-06-22 14:47:30'),
(74, 29, 'asd', 3, 1, 0, '2020-06-22 14:47:33'),
(75, 29, 'asd', 3, 1, 0, '2020-06-22 14:48:48'),
(76, 29, 'asd', 3, 1, 0, '2020-06-22 14:48:52'),
(77, 29, 'asd', 1, 3, 1, '2020-06-22 14:48:57'),
(78, 29, 'asd', 3, 1, 0, '2020-06-22 14:51:13'),
(79, 29, 'hehehe', 1, 3, 1, '2020-06-22 14:51:24'),
(80, 29, 'wkwkwk', 1, 3, 1, '2020-06-22 14:51:36'),
(81, 29, 'asdasd', 3, 1, 0, '2020-06-22 14:51:45'),
(82, 29, 'asd', 1, 3, 1, '2020-06-22 14:53:26'),
(83, 29, 'apa', 3, 1, 0, '2020-06-22 14:53:45'),
(84, 29, 'asd', 1, 3, 1, '2020-06-22 14:55:23'),
(85, 29, 'asd', 3, 1, 0, '2020-06-22 14:55:59'),
(86, 29, 'asdasd', 1, 3, 1, '2020-06-22 14:56:14'),
(87, 29, 'asdasdasdasd', 1, 3, 1, '2020-06-22 14:56:27'),
(88, 29, 'asd', 3, 1, 0, '2020-06-22 14:58:06'),
(89, 29, 'asd', 1, 3, 1, '2020-06-22 14:58:34'),
(90, 29, 'asd', 3, 1, 0, '2020-06-22 14:59:38'),
(91, 29, 'hiii', 1, 3, 0, '2020-06-22 14:59:52'),
(92, 30, 'sadd', 3, 1, 0, '2020-06-22 15:02:54'),
(93, 30, 'sdsdf', 1, 3, 0, '2020-06-22 15:03:02'),
(94, 31, 'hai', 3, 1, 0, '2020-06-22 15:03:53'),
(95, 31, 'asd', 3, 1, 0, '2020-06-22 15:04:05'),
(96, 31, 'asd', 3, 1, 0, '2020-06-22 15:04:05'),
(97, 31, 'asd', 3, 1, 0, '2020-06-22 15:04:06'),
(98, 31, 'asd', 3, 1, 0, '2020-06-22 15:04:07'),
(99, 31, 'asd', 3, 1, 0, '2020-06-22 15:04:08'),
(100, 31, 'asd', 3, 1, 0, '2020-06-22 15:04:09'),
(101, 31, 'asd', 3, 1, 0, '2020-06-22 15:04:10'),
(102, 31, 'asd', 3, 1, 0, '2020-06-22 15:04:12'),
(103, 31, 'asd', 3, 1, 0, '2020-06-22 16:43:14'),
(104, 31, 'mas', 3, 1, 0, '2020-06-22 16:43:29'),
(105, 31, 'wkwk', 3, 1, 0, '2020-06-22 16:43:42'),
(106, 31, 'yes', 3, 1, 0, '2020-06-22 16:48:29'),
(107, 31, 'hay', 3, 1, 0, '2020-06-22 16:48:32'),
(108, 31, 'mas', 3, 1, 0, '2020-06-22 16:49:18'),
(109, 31, 'mas', 1, 3, 1, '2020-06-22 16:50:04'),
(110, 31, 'mas', 1, 3, 1, '2020-06-22 16:50:13'),
(111, 31, 'mau nanya', 1, 3, 1, '2020-06-22 16:50:35'),
(112, 31, 'wkwkwk', 1, 3, 1, '2020-06-22 16:50:36'),
(113, 31, 'asd', 3, 1, 0, '2020-06-22 16:51:16'),
(114, 32, 'apa', 3, 1, 0, '2020-06-22 16:52:47'),
(115, 32, 'apa', 3, 1, 0, '2020-06-22 16:53:13'),
(116, 32, 'oke', 1, 3, 0, '2020-06-22 16:53:47'),
(117, 33, 'as', 3, 1, 0, '2020-06-22 16:56:14'),
(118, 33, 'masbim', 1, 3, 1, '2020-06-22 16:58:16'),
(119, 33, 'apa el', 3, 1, 0, '2020-06-22 16:58:44'),
(120, 34, 'hay juga', 3, 1, 0, '2020-06-22 17:01:17'),
(121, 36, 'aa', 3, 1, 0, '2020-06-22 17:02:48'),
(122, 36, 'wkwkwk', 3, 1, 0, '2020-06-22 17:03:43'),
(123, 36, 'as', 3, 1, 0, '2020-06-22 17:05:06'),
(124, 36, 'as', 3, 1, 0, '2020-06-22 17:05:27'),
(125, 36, 'as', 3, 1, 0, '2020-06-22 17:08:13'),
(126, 36, 'as', 3, 1, 0, '2020-06-22 17:08:43'),
(127, 36, 'as', 3, 1, 0, '2020-06-22 17:08:45'),
(128, 36, 'asd', 3, 1, 0, '2020-06-22 17:09:42'),
(129, 36, 'asd', 3, 1, 0, '2020-06-22 17:10:00'),
(130, 36, 'asd', 3, 1, 0, '2020-06-22 17:11:16'),
(131, 36, 'asd', 3, 1, 0, '2020-06-22 17:11:24'),
(132, 36, 'asd', 3, 1, 0, '2020-06-22 17:11:32'),
(133, 36, 'asd', 3, 1, 0, '2020-06-22 17:11:39'),
(134, 36, 'asda sdas d', 3, 1, 0, '2020-06-22 17:12:35'),
(135, 36, 'asd', 3, 1, 0, '2020-06-22 17:12:51'),
(136, 36, 'asd', 3, 1, 0, '2020-06-22 17:13:44'),
(137, 36, 'asd', 3, 1, 0, '2020-06-22 17:14:26'),
(138, 36, 'asdasd', 3, 1, 0, '2020-06-22 17:16:02'),
(139, 36, 'as', 1, 3, 0, '2020-06-22 18:07:24'),
(140, 38, 'as', 3, 1, 0, '2020-06-22 18:10:10'),
(141, 38, 'as', 1, 3, 1, '2020-06-22 18:10:16'),
(142, 38, 'apa', 3, 1, 0, '2020-06-22 18:10:33'),
(143, 38, 'he', 1, 3, 0, '2020-06-22 18:11:30'),
(144, 42, 'iyah el', 3, 1, 0, '2020-06-22 18:14:55'),
(145, 42, 'eh', 1, 3, 1, '2020-06-22 18:14:59'),
(146, 42, 'terus gimana', 1, 3, 1, '2020-06-22 18:15:20'),
(147, 42, 'gatau aku juga', 3, 1, 0, '2020-06-22 18:15:33'),
(148, 42, 'as', 3, 1, 0, '2020-06-22 18:15:49'),
(149, 42, 'ya mau gimana', 1, 3, 0, '2020-06-22 18:16:01'),
(150, 42, 'as', 1, 3, 0, '2020-06-22 18:16:21'),
(151, 42, 'as', 1, 3, 0, '2020-06-22 18:16:22'),
(152, 42, 'as', 1, 3, 0, '2020-06-22 18:16:23'),
(153, 43, 'halo perkenalkan nama saya bima ganteng', 3, 1, 1, '2020-06-22 18:19:57'),
(154, 43, 'apa ada yang bisa saya banting?', 3, 1, 1, '2020-06-22 18:20:06'),
(155, 43, 'wkwkwk', 1, 3, 1, '2020-06-22 18:20:09'),
(156, 43, 'banting ga tuh', 1, 3, 1, '2020-06-22 18:20:14'),
(157, 43, 'asd', 1, 3, 1, '2020-06-22 18:21:01'),
(158, 43, 'asd', 1, 3, 1, '2020-06-22 18:21:02'),
(159, 43, 'asd', 1, 3, 1, '2020-06-22 18:21:43'),
(160, 43, 'asd', 1, 3, 1, '2020-06-22 18:22:00'),
(161, 43, 'a', 1, 3, 1, '2020-06-22 18:22:29'),
(162, 43, 'asd', 1, 3, 1, '2020-06-22 18:26:57'),
(163, 43, 'asd', 1, 3, 1, '2020-06-22 18:27:16'),
(164, 43, 'asdasdasd', 1, 3, 1, '2020-06-22 18:27:19'),
(165, 43, 'asd', 1, 3, 1, '2020-06-22 18:28:04'),
(166, 43, 'asd', 1, 3, 1, '2020-06-22 18:28:05'),
(167, 43, 'asd', 1, 3, 1, '2020-06-22 18:28:07'),
(168, 43, 'asd', 1, 3, 1, '2020-06-22 18:28:18'),
(169, 43, 'asd', 1, 3, 1, '2020-06-22 18:28:41'),
(170, 43, 'asd', 1, 3, 1, '2020-06-22 18:28:51'),
(171, 43, 'asd', 1, 3, 1, '2020-06-22 18:28:57'),
(172, 43, 'asd', 1, 3, 1, '2020-06-22 18:29:05'),
(173, 43, 'asd', 1, 3, 1, '2020-06-22 18:29:22'),
(174, 43, 'sdf', 1, 3, 1, '2020-06-22 18:29:24'),
(175, 43, 'sdf', 1, 3, 1, '2020-06-22 18:29:26'),
(176, 43, 'asd', 1, 3, 1, '2020-06-22 18:29:57'),
(177, 43, 'mas', 1, 3, 1, '2020-06-22 18:30:04'),
(178, 43, 'mas', 1, 3, 1, '2020-06-22 18:30:16'),
(179, 43, 'asd', 1, 3, 1, '2020-06-22 18:30:49'),
(180, 43, 'asd', 1, 3, 1, '2020-06-22 18:30:50'),
(181, 43, 'asd', 1, 3, 1, '2020-06-22 18:30:51'),
(182, 43, 'asd', 1, 3, 1, '2020-06-22 18:30:52'),
(183, 43, 'asd', 1, 3, 1, '2020-06-22 18:30:53'),
(184, 43, 'as', 1, 3, 1, '2020-06-22 18:30:54'),
(185, 43, 'asd', 1, 3, 1, '2020-06-22 18:33:15'),
(186, 43, 'text', 1, 3, 1, '2020-06-22 18:34:41'),
(187, 43, 'asd', 1, 3, 1, '2020-06-22 18:34:43'),
(188, 43, 'mas', 1, 3, 1, '2020-06-22 18:34:55'),
(189, 43, 'asd', 1, 3, 1, '2020-06-22 18:35:02'),
(190, 43, 'asd', 1, 3, 1, '2020-06-22 18:35:15'),
(191, 43, 'asd', 1, 3, 1, '2020-06-22 18:35:24'),
(192, 43, 'asd', 1, 3, 1, '2020-06-22 18:35:58'),
(193, 43, 'asd', 1, 3, 1, '2020-06-22 18:36:18'),
(194, 43, 'mas', 1, 3, 1, '2020-06-22 18:36:24'),
(195, 43, 'asd', 1, 3, 1, '2020-06-22 18:36:26'),
(196, 43, 'mas', 1, 3, 1, '2020-06-22 18:36:27'),
(197, 43, 'mas', 1, 3, 1, '2020-06-22 18:36:29'),
(198, 43, 'mas', 1, 3, 1, '2020-06-22 18:36:44'),
(199, 43, 'mas', 1, 3, 1, '2020-06-22 18:36:46'),
(200, 43, 'mas', 1, 3, 1, '2020-06-22 18:36:57'),
(201, 43, 'bima', 1, 3, 1, '2020-06-22 18:37:03'),
(202, 43, 'bim', 1, 3, 1, '2020-06-22 18:37:08'),
(203, 43, 'mas', 1, 3, 1, '2020-06-22 18:37:31'),
(204, 43, 'as', 1, 3, 1, '2020-06-22 18:37:33'),
(205, 43, 'mas', 1, 3, 1, '2020-06-22 18:37:47'),
(206, 43, 'asw', 1, 3, 1, '2020-06-22 18:37:48'),
(207, 43, 'wkwkwk', 1, 3, 1, '2020-06-22 18:37:51'),
(208, 43, 'mas', 1, 3, 1, '2020-06-22 18:38:49'),
(209, 43, 'mas', 1, 3, 1, '2020-06-22 18:38:55'),
(210, 43, 'mas', 1, 3, 1, '2020-06-22 18:39:03'),
(211, 43, 'aw', 1, 3, 1, '2020-06-22 18:39:05'),
(212, 43, 'mas', 1, 3, 1, '2020-06-22 18:39:50'),
(213, 43, 'apa', 1, 3, 1, '2020-06-22 18:39:57'),
(214, 43, 'asd', 1, 3, 1, '2020-06-22 18:42:11'),
(215, 43, 'mas', 1, 3, 1, '2020-06-22 18:42:17'),
(216, 43, 'iya', 3, 1, 1, '2020-06-22 18:42:28'),
(217, 43, 'ga', 1, 3, 1, '2020-06-22 18:44:18'),
(218, 43, 'wkwkwk', 3, 1, 1, '2020-06-22 18:44:23'),
(219, 43, 'asd', 1, 3, 1, '2020-06-22 18:45:08'),
(220, 43, 'wkw', 1, 3, 1, '2020-06-22 18:45:29'),
(221, 43, 'wiw', 1, 3, 1, '2020-06-22 18:45:32'),
(222, 43, 'asd', 1, 3, 1, '2020-06-22 18:46:02'),
(223, 43, 'asd', 3, 1, 1, '2020-06-22 18:46:12'),
(224, 43, 'apa', 1, 3, 1, '2020-06-22 18:46:41'),
(225, 43, 'mas', 1, 3, 1, '2020-06-22 18:47:58'),
(226, 43, 'apa', 3, 1, 1, '2020-06-22 18:48:02'),
(227, 43, 'jadi gini mas', 1, 3, 1, '2020-06-22 18:48:06'),
(228, 43, 'mas', 1, 3, 1, '2020-06-22 18:48:20'),
(229, 43, 'apa', 3, 1, 1, '2020-06-22 18:48:25'),
(230, 43, 'jadi gini mas', 1, 3, 1, '2020-06-22 18:48:30'),
(231, 43, 'gua ganteng ga?', 1, 3, 1, '2020-06-22 18:48:36'),
(232, 43, 'ganteng banget dong', 3, 1, 1, '2020-06-22 18:48:43'),
(233, 43, 'mas', 1, 3, 1, '2020-06-22 18:55:20'),
(234, 43, 'mas', 1, 3, 1, '2020-06-22 18:58:02'),
(235, 43, 'mas', 3, 1, 1, '2020-06-22 18:59:03'),
(236, 43, 'sd', 3, 1, 1, '2020-06-22 19:05:01'),
(237, 43, 'as', 3, 1, 1, '2020-06-22 19:05:29'),
(238, 43, 'as', 3, 1, 1, '2020-06-22 19:05:30'),
(239, 43, 'hai', 3, 1, 1, '2020-06-22 19:05:41'),
(240, 43, 'aasd', 1, 1, 1, '2020-06-22 19:15:06'),
(241, 43, 'wkwk', 3, 1, 0, '2020-06-22 19:16:11'),
(242, 43, 'kenapa', 1, 3, 1, '2020-06-22 19:16:18'),
(243, 43, 'gapapa', 3, 1, 0, '2020-06-22 19:16:26'),
(244, 43, 'gappa', 3, 1, 0, '2020-06-22 19:16:43'),
(245, 43, 'wkwkwk', 1, 3, 0, '2020-06-22 19:16:48'),
(246, 45, 'iya', 2, 1, 0, '2020-06-22 19:19:24'),
(247, 45, 'kenapa', 1, 2, 1, '2020-06-22 19:19:30'),
(248, 45, 'wkwkwk', 2, 1, 0, '2020-06-22 19:19:38'),
(249, 45, 'mas', 2, 1, 0, '2020-06-22 19:20:04'),
(250, 45, 'asd', 1, 2, 1, '2020-06-22 19:20:12'),
(251, 45, 'asd', 1, 2, 1, '2020-06-22 19:20:31'),
(252, 45, 'asd', 1, 2, 1, '2020-06-22 19:20:45'),
(253, 45, 'asd', 1, 2, 1, '2020-06-22 19:20:48'),
(254, 45, 'asd', 1, 2, 1, '2020-06-22 19:20:50'),
(255, 45, 'asd', 1, 2, 1, '2020-06-22 19:20:50'),
(256, 45, 'asd', 1, 2, 1, '2020-06-22 19:20:52'),
(257, 45, 'asd', 2, 1, 0, '2020-06-22 19:21:11'),
(258, 45, 'asd', 2, 1, 0, '2020-06-22 19:21:19'),
(259, 45, 'asd', 2, 1, 0, '2020-06-22 19:21:34'),
(260, 45, 'asd', 3, 1, 0, '2020-06-22 19:23:18'),
(261, 45, 'asd', 1, 3, 0, '2020-06-22 19:23:24'),
(262, 46, 'iya apa', 3, 1, 0, '2020-06-22 19:24:38'),
(263, 46, 'wjwk', 1, 3, 1, '2020-06-22 19:24:43'),
(264, 46, 'wa', 1, 3, 1, '2020-06-22 19:25:07'),
(265, 46, 'apasih', 3, 1, 0, '2020-06-22 19:25:19'),
(266, 46, 'apasig', 3, 1, 0, '2020-06-22 19:25:23'),
(267, 46, 'asd', 1, 3, 1, '2020-06-22 19:25:27'),
(268, 46, 'asd', 1, 3, 1, '2020-06-22 19:25:32'),
(269, 46, 'asd', 3, 1, 0, '2020-06-22 19:25:36'),
(270, 46, 'asd', 1, 3, 1, '2020-06-22 19:25:40'),
(271, 46, 'mas', 1, 3, 1, '2020-06-22 19:26:58'),
(272, 46, 'iya de', 3, 1, 0, '2020-06-22 19:27:04'),
(273, 46, 'mas', 1, 3, 1, '2020-06-22 19:27:16'),
(274, 46, 'iya de', 3, 1, 0, '2020-06-22 19:27:27'),
(275, 46, 'el', 3, 1, 0, '2020-06-22 19:27:53'),
(276, 46, 'iya mas', 1, 3, 1, '2020-06-22 19:27:59'),
(277, 46, 'el lagi apa', 3, 1, 0, '2020-06-22 19:28:04'),
(278, 46, 'el', 3, 1, 0, '2020-06-22 19:28:24'),
(279, 46, 'el lagi apa', 3, 1, 0, '2020-06-22 19:28:30'),
(280, 46, 'mas', 1, 3, 1, '2020-06-22 19:28:38'),
(281, 46, 'mas', 1, 3, 1, '2020-06-22 19:28:41'),
(282, 46, 'mas', 1, 3, 1, '2020-06-22 19:28:49'),
(283, 46, 'el', 1, 3, 1, '2020-06-22 19:29:01'),
(284, 46, 'el', 1, 3, 1, '2020-06-22 19:29:40'),
(285, 46, 'iya mas', 3, 1, 0, '2020-06-22 19:29:50'),
(286, 46, 'el', 1, 3, 1, '2020-06-22 19:30:07'),
(287, 46, 'iya mas', 3, 1, 0, '2020-06-22 19:30:12'),
(288, 46, 'el', 3, 1, 0, '2020-06-22 19:30:27'),
(289, 46, '1', 3, 1, 0, '2020-06-22 19:30:35'),
(290, 46, '3', 3, 1, 0, '2020-06-22 19:30:37'),
(291, 46, '4', 3, 1, 0, '2020-06-22 19:30:38'),
(292, 46, '5', 3, 1, 0, '2020-06-22 19:30:39'),
(293, 46, '6', 3, 1, 0, '2020-06-22 19:30:39'),
(294, 46, 'el', 1, 3, 1, '2020-06-22 19:30:43'),
(295, 46, 'mas', 3, 1, 0, '2020-06-22 19:35:00'),
(296, 46, 'els', 3, 1, 0, '2020-06-22 19:39:24'),
(297, 46, 'iya mas', 1, 3, 1, '2020-06-22 19:39:29'),
(298, 46, 'lagi ngapain kamu', 3, 1, 0, '2020-06-22 19:39:36'),
(299, 46, 'lagi colay', 1, 3, 1, '2020-06-22 19:39:41'),
(300, 46, 'hey', 1, 3, 1, '2020-06-22 21:20:08'),
(301, 46, 'as', 1, 3, 1, '2020-06-22 21:20:10'),
(302, 46, 'as', 1, 3, 1, '2020-06-22 21:20:30'),
(303, 46, 'mas', 1, 3, 1, '2020-06-22 21:20:32'),
(304, 47, 'halo syafira', 3, 4, 0, '2020-06-22 21:36:19'),
(305, 47, 'ada yang bisa saya bantu', 3, 4, 0, '2020-06-22 21:36:24'),
(306, 47, 'bang', 4, 3, 1, '2020-06-22 21:38:10'),
(307, 47, 'yes', 3, 4, 0, '2020-06-22 21:38:20'),
(308, 47, 'mas', 4, 3, 1, '2020-06-22 21:40:48'),
(309, 47, 'jadi fimanna', 4, 3, 1, '2020-06-22 21:40:54'),
(310, 47, 'saya bingung', 4, 3, 1, '2020-06-22 21:41:01'),
(311, 47, 'ya mau gimana', 3, 4, 0, '2020-06-22 21:41:07'),
(312, 47, 'wkwkwk', 4, 3, 1, '2020-06-22 21:41:16'),
(313, 47, 'as', 3, 4, 0, '2020-06-22 21:43:17'),
(314, 47, 'mas', 3, 4, 0, '2020-06-22 21:43:37'),
(315, 47, 'as', 3, 4, 0, '2020-06-22 21:43:47'),
(316, 47, 'mas', 4, 3, 1, '2020-06-22 21:49:21'),
(317, 47, 'apa', 3, 4, 0, '2020-06-22 21:49:29'),
(318, 47, 'a', 4, 3, 1, '2020-06-22 21:50:05'),
(319, 47, 'a', 3, 4, 0, '2020-06-22 21:50:15'),
(320, 47, 'a', 4, 3, 1, '2020-06-22 21:50:24'),
(321, 47, 'a', 3, 4, 0, '2020-06-22 21:50:26'),
(322, 47, 'asd', 3, 4, 0, '2020-06-22 21:51:33'),
(323, 47, 'asd', 3, 4, 0, '2020-06-22 21:51:40'),
(324, 47, 'asd', 3, 4, 0, '2020-06-22 21:51:55'),
(325, 47, 'asd', 4, 3, 1, '2020-06-22 21:52:39'),
(326, 47, 'asd', 3, 4, 0, '2020-06-22 21:52:42'),
(327, 47, 'hi', 4, 3, 1, '2020-06-22 22:56:12'),
(328, 47, 'hay', 4, 3, 1, '2020-06-22 22:56:15'),
(329, 47, 'hola', 3, 4, 0, '2020-06-22 22:56:24'),
(330, 47, 'asd', 4, 3, 1, '2020-06-22 22:56:52'),
(331, 48, 'apa lu', 3, 7, 0, '2020-06-22 23:57:56'),
(332, 47, 'asd', 3, 4, 0, '2020-06-22 23:58:01'),
(333, 48, 'as', 3, 7, 0, '2020-06-23 01:53:20'),
(334, 48, 'as', 3, 7, 0, '2020-06-23 01:53:21'),
(335, 48, 'a', 3, 7, 0, '2020-06-23 01:53:22'),
(336, 48, 's', 3, 7, 0, '2020-06-23 01:53:23'),
(337, 48, 'as', 3, 7, 0, '2020-06-23 01:53:24'),
(338, 48, 'as', 3, 7, 0, '2020-06-23 01:53:24'),
(339, 48, 'as', 3, 7, 0, '2020-06-23 01:53:25'),
(340, 49, 'mas', 3, 9, 0, '2020-06-23 01:53:45'),
(341, 49, 'apa', 9, 3, 1, '2020-06-23 01:53:47'),
(342, 49, 'apa', 9, 3, 1, '2020-06-23 01:53:53'),
(343, 49, 'dih', 3, 9, 0, '2020-06-23 01:54:02'),
(344, 49, 'mas', 3, 9, 0, '2020-06-23 01:54:18'),
(345, 49, 'oit', 9, 3, 1, '2020-06-23 01:54:26'),
(346, 49, 'dimana', 3, 9, 0, '2020-06-23 01:54:58'),
(347, 49, 'apanya', 9, 3, 1, '2020-06-23 01:55:18'),
(348, 49, 'mas', 9, 3, 1, '2020-06-23 01:56:03'),
(349, 49, 'mas', 3, 9, 0, '2020-06-23 01:56:11'),
(350, 49, 'mas', 9, 3, 1, '2020-06-23 01:56:15'),
(351, 49, 'oy', 3, 9, 0, '2020-06-23 01:56:50'),
(352, 49, 'apaan', 9, 3, 1, '2020-06-23 01:56:54'),
(353, 49, 'a', 9, 3, 1, '2020-06-23 01:57:15'),
(354, 49, 'abc', 9, 3, 1, '2020-06-23 01:57:24'),
(355, 49, 'aio', 3, 9, 0, '2020-06-23 01:58:57'),
(356, 49, 'apa', 9, 3, 1, '2020-06-23 01:59:02'),
(357, 49, 'mas', 3, 9, 0, '2020-06-23 01:59:29'),
(358, 49, 'iya de', 9, 3, 1, '2020-06-23 01:59:34'),
(359, 49, 'mas', 3, 9, 0, '2020-06-23 01:59:41'),
(360, 49, 'iya de', 9, 3, 1, '2020-06-23 01:59:46'),
(361, 46, 'el', 3, 1, 0, '2020-06-23 02:00:37'),
(362, 46, 'udah mam belu', 3, 1, 0, '2020-06-23 02:00:41'),
(363, 47, 'mba', 3, 4, 0, '2020-06-23 02:01:01'),
(364, 47, 'mas', 4, 3, 1, '2020-06-23 02:01:09'),
(365, 47, 'apa mba', 3, 4, 0, '2020-06-23 02:01:14'),
(366, 47, 'wkwkwk', 4, 3, 1, '2020-06-23 02:01:17'),
(367, 49, 'as', 3, 9, 0, '2020-06-23 02:01:45'),
(368, 49, 'as', 3, 9, 0, '2020-06-23 02:01:46'),
(369, 47, 'mas', 4, 3, 1, '2020-06-23 02:01:54'),
(370, 47, 'aoa', 3, 4, 0, '2020-06-23 02:02:00'),
(371, 47, 'mas', 4, 3, 0, '2020-06-23 15:36:27'),
(372, 47, 'mas', 4, 3, 0, '2020-06-23 15:36:32'),
(373, 47, 'mas', 4, 3, 0, '2020-06-23 15:36:43'),
(374, 47, 'mas', 4, 3, 0, '2020-06-23 15:36:55'),
(375, 47, 'mas', 4, 3, 0, '2020-06-23 15:37:01'),
(376, 47, 'mas', 4, 3, 0, '2020-06-23 15:37:26'),
(377, 47, 'mas', 4, 3, 0, '2020-06-23 15:37:36'),
(378, 52, 'iya apa', 2, 11, 0, '2020-06-23 17:00:38'),
(379, 52, 'kangen', 11, 2, 1, '2020-06-23 17:00:41'),
(380, 52, 'sama', 2, 11, 0, '2020-06-23 17:00:44'),
(381, 52, 'boleh ga', 11, 2, 1, '2020-06-23 17:00:44'),
(382, 52, 'i miss u', 2, 11, 0, '2020-06-23 17:00:46'),
(383, 52, 'apaan i miss u', 11, 2, 0, '2020-06-23 17:00:51'),
(384, 52, 'mas, pgn lalapan', 11, 2, 0, '2020-06-23 17:01:29'),
(385, 52, 'hehh', 11, 2, 0, '2020-06-23 17:10:18'),
(386, 52, 'as', 4, 11, 0, '2020-06-23 17:10:56'),
(387, 52, 'asdasd', 4, 11, 0, '2020-06-23 17:10:59'),
(388, 52, 'asdasdasd', 4, 11, 0, '2020-06-23 17:11:01'),
(389, 52, 'qw dq ', 11, 4, 0, '2020-06-23 17:11:31'),
(390, 51, 'hai', 3, 7, 0, '2020-06-24 20:16:55'),
(391, 50, 'iya apa', 3, 4, 0, '2020-06-24 20:17:43'),
(392, 54, 'opo meneh gan', 3, 13, 0, '2020-06-24 20:25:33'),
(393, 56, 'asassa', 3, 13, 0, '2020-06-24 20:32:08'),
(394, 57, 'wkwkwk', 3, 13, 0, '2020-06-24 20:35:41'),
(395, 58, 'assa', 3, 13, 0, '2020-06-24 20:35:53'),
(396, 59, 'hi', 3, 4, 0, '2020-06-24 20:36:41'),
(397, 51, 'as', 7, 3, 0, '2020-06-24 20:36:56'),
(398, 62, 'as', 3, 7, 0, '2020-06-24 20:38:05'),
(399, 63, 'halo gan', 3, 7, 0, '2020-06-24 20:38:40'),
(400, 63, 'asasassaasa', 7, 3, 1, '2020-06-24 20:38:45'),
(401, 63, 'apalu', 3, 7, 0, '2020-06-24 20:38:50'),
(402, 63, 'wkwkwk', 7, 3, 0, '2020-06-24 20:38:55'),
(403, 64, 'iya apa', 3, 13, 0, '2020-06-24 20:39:46'),
(404, 64, 'mas', 13, 3, 1, '2020-06-24 20:39:48'),
(405, 64, 'apa sayang', 3, 13, 0, '2020-06-24 20:39:52'),
(406, 64, 'mau beli warrteg', 13, 3, 1, '2020-06-24 20:39:58'),
(407, 64, 'kuy', 3, 13, 0, '2020-06-24 20:40:01'),
(408, 65, 'hay', 3, 13, 0, '2020-06-24 20:40:47'),
(409, 66, 'yaya', 3, 13, 0, '2020-06-24 20:41:27'),
(410, 67, 'sisi', 3, 13, 0, '2020-06-24 20:50:59'),
(411, 67, 'hihi', 13, 3, 0, '2020-06-24 20:51:07'),
(412, 68, 'hai', 3, 13, 0, '2020-06-24 20:51:36'),
(413, 68, 'sad', 3, 13, 0, '2020-06-24 20:56:31'),
(414, 68, 'asd', 3, 13, 0, '2020-06-24 20:56:33'),
(415, 68, 'asd', 3, 13, 0, '2020-06-24 20:56:33'),
(416, 68, 'asd', 3, 13, 0, '2020-06-24 20:56:34'),
(417, 69, 'apa', 3, 7, 0, '2020-06-24 20:56:51'),
(418, 68, 'hai', 13, 3, 0, '2020-06-24 20:56:54'),
(419, 69, 'hai', 3, 7, 0, '2020-06-24 20:58:12'),
(420, 69, 'asd', 7, 3, 1, '2020-06-24 20:58:19'),
(421, 69, 'asd', 3, 7, 0, '2020-06-24 20:58:40'),
(422, 69, 'asd', 3, 7, 0, '2020-06-24 20:59:14'),
(423, 69, 'asd', 3, 7, 0, '2020-06-24 20:59:16'),
(424, 69, 'asd', 3, 7, 0, '2020-06-24 20:59:17'),
(425, 69, 'asd', 3, 7, 0, '2020-06-24 20:59:18'),
(426, 69, 'asd', 3, 7, 0, '2020-06-24 20:59:44'),
(427, 69, 'sd', 7, 3, 1, '2020-06-24 21:00:46'),
(428, 69, 'ds', 3, 7, 0, '2020-06-24 21:00:51'),
(429, 70, 'apa sayang', 3, 13, 0, '2020-06-24 21:07:56'),
(430, 70, 'heheeheheheheh', 13, 3, 0, '2020-06-24 21:08:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `chat_tentang` text NOT NULL,
  `status_chat` varchar(25) NOT NULL,
  `tanggal_chat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `id_user`, `chat_tentang`, `status_chat`, `tanggal_chat`) VALUES
(1, 2, 'mas', 'selesai', '2020-06-22 03:08:55'),
(2, 1, 'El', 'selesai', '2020-06-22 04:21:49'),
(3, 1, 'ada dong', 'selesai', '2020-06-22 05:32:16'),
(4, 1, 'ada dong', 'selesai', '2020-06-22 05:34:23'),
(15, 1, 'asd', 'selesai', '2020-06-22 05:44:31'),
(30, 1, 'asdasd', 'selesai', '2020-06-22 15:01:43'),
(31, 1, 'ada dong', 'selesai', '2020-06-22 15:03:42'),
(46, 1, 'asd', 'selesai', '2020-06-22 19:24:19'),
(47, 4, 'hai', 'selesai', '2020-06-22 21:35:40'),
(48, 7, 'aloo', 'selesai', '2020-06-22 23:57:44'),
(49, 9, 'helo', 'selesai', '2020-06-23 01:53:40'),
(50, 4, 'hola', 'selesai', '2020-06-23 15:38:38'),
(51, 7, 'ada', 'selesai', '2020-06-23 15:39:14'),
(52, 11, 'hai mas', 'started', '2020-06-23 17:00:31'),
(53, 12, 'hehe', 'selesai', '2020-06-23 17:15:06'),
(54, 13, 'hai', 'selesai', '2020-06-24 20:25:23'),
(56, 13, 'hai', 'selesai', '2020-06-24 20:29:48'),
(57, 13, 'halo', 'selesai', '2020-06-24 20:35:31'),
(58, 13, 'hai', 'selesai', '2020-06-24 20:35:48'),
(59, 4, 'akakak', 'selesai', '2020-06-24 20:36:33'),
(60, 13, 'hhhh', 'selesai', '2020-06-24 20:36:38'),
(62, 7, 'ada', 'selesai', '2020-06-24 20:37:51'),
(63, 7, 'asas', 'selesai', '2020-06-24 20:38:30'),
(64, 13, 'hai', 'selesai', '2020-06-24 20:39:38'),
(65, 13, 'halo', 'selesai', '2020-06-24 20:40:43'),
(66, 13, 'halo', 'selesai', '2020-06-24 20:40:54'),
(67, 13, 'mekdi disini', 'selesai', '2020-06-24 20:50:10'),
(68, 13, 'hai', 'selesai', '2020-06-24 20:51:24'),
(69, 7, 're', 'selesai', '2020-06-24 20:56:46'),
(70, 13, 'spsdiii', 'selesai', '2020-06-24 21:07:41'),
(71, 13, 'hai', 'pending', '2020-06-24 21:08:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Keluarga'),
(2, 'Pertemanan'),
(3, 'Percintaan'),
(4, 'Masalah Diri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `judul_post` varchar(100) NOT NULL,
  `isi_post` text NOT NULL,
  `gambar_post` varchar(80) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_slider` int(11) NOT NULL,
  `tanggal_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `judul_post`, `isi_post`, `gambar_post`, `id_kategori`, `id_user`, `status_slider`, `tanggal_post`) VALUES
(9, 'Mengenal Toxic Relationship', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet tincidunt risus, at rutrum nisi. Quisque tincidunt lectus sed laoreet sagittis. Curabitur mauris augue, mollis in pretium ut, congue eget erat. Ut lacinia dignissim nulla vitae aliquet. Aenean at tortor semper, porta libero vitae, auctor felis. Sed vitae laoreet lorem, in vulputate ex. In sit amet leo eu nunc luctus suscipit. Mauris at metus in tellus finibus rhoncus nec vitae ex. Vivamus rhoncus interdum dui in consectetur. Proin quis leo ac ipsum accumsan aliquam finibus at nisi. Sed semper dui justo, at molestie arcu congue nec. Nam eleifend pulvinar posuere. Nullam dolor nisl, finibus eget lectus et, sodales semper lacus.<br />\r\n', '1d6a9486ff1c3bb23c0f71d55c249575.png', 4, 1, 1, '2020-06-24 19:54:10'),
(10, 'Mengenal Toxic Relationship', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ultrices mollis nunc, ac feugiat purus efficitur quis. Nunc vitae nunc arcu. Fusce ipsum felis, finibus vitae ultrices non, fringilla at nulla. Quisque a tortor vel augue rhoncus sodales a a nulla. Ut diam turpis, rhoncus vel posuere pretium, maximus at mauris. Vestibulum vitae tristique libero, quis sodales urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas facilisis ex euismod nibh pellentesque placerat. Cras eget imperdiet massa, sed posuere erat. Mauris molestie tempus risus vitae sagittis. Integer malesuada congue lacus a hendrerit. Quisque nunc dui, vulputate quis mauris ac, pulvinar placerat enim. Donec suscipit finibus fringilla. Maecenas molestie ultricies pellentesque.<br />\r\n<br />\r\nNulla ullamcorper in elit sit amet suscipit. Aliquam vel risus non nisi scelerisque faucibus eu in elit. Aliquam at ligula id risus porttitor accumsan eget et mauris. Integer et nulla sed urna porttitor volutpat efficitur quis metus. Pellentesque pulvinar varius posuere. Proin in suscipit nunc. Phasellus pretium neque nec nunc vulputate, eget imperdiet velit congue.<br />\r\n<br />\r\nEtiam faucibus, nulla vel tristique pretium, justo orci commodo erat, sit amet venenatis quam libero et odio. Donec nec tristique turpis. Donec vitae ornare tortor. Ut fermentum augue sed placerat vulputate. Pellentesque eros eros, interdum quis velit a, efficitur luctus sapien. Nullam mollis, dui id luctus vehicula, lacus urna scelerisque urna, id imperdiet nisi ante id eros. Fusce lectus augue, fermentum ut euismod id, facilisis id neque. Aenean a enim lorem. Aliquam quam magna, sollicitudin in sagittis vitae, pretium quis augue. Duis eu eros nunc. Donec a purus leo. Nullam faucibus odio ut egestas semper.<br />\r\n<br />\r\nNulla vel est in turpis convallis consequat. Donec a condimentum leo, accumsan tincidunt elit. Aliquam ut mollis neque. Sed vehicula ac justo et condimentum. Aliquam vehicula pharetra nulla at congue. Quisque est nisl, pretium in mattis id, blandit nec diam. Aliquam hendrerit vehicula mi, nec volutpat libero elementum eget. Etiam sit amet tempor sapien.<br />\r\n<br />\r\nAenean vestibulum fermentum lorem. Nunc eu maximus felis. Maecenas accumsan sem ac tempus egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam sem quam, ullamcorper vitae quam convallis, tristique sagittis libero. Vivamus volutpat eget neque ac dictum. Duis mattis molestie leo ac vehicula. Vestibulum accumsan erat sed ipsum pharetra suscipit a nec tortor. Duis volutpat, dolor condimentum convallis facilisis, enim felis ullamcorper nisi, quis vestibulum ipsum ex et ipsum. In quis varius neque. Praesent posuere convallis mi quis porttitor. Donec luctus lorem at elementum varius. Phasellus tristique leo purus, a vestibulum magna maximus quis. Vestibulum tincidunt gravida enim, ut vehicula mi volutpat ut.', '98a1fcbc49bd9391b37397b14e91c5ea.png', 3, 1, 0, '2020-06-24 12:32:32'),
(11, 'Saas Sasasasa As', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ultrices mollis nunc, ac feugiat purus efficitur quis. Nunc vitae nunc arcu. Fusce ipsum felis, finibus vitae ultrices non, fringilla at nulla. Quisque a tortor vel augue rhoncus sodales a a nulla. Ut diam turpis, rhoncus vel posuere pretium, maximus at mauris. Vestibulum vitae tristique libero, quis sodales urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas facilisis ex euismod nibh pellentesque placerat. Cras eget imperdiet massa, sed posuere erat. Mauris molestie tempus risus vitae sagittis. Integer malesuada congue lacus a hendrerit. Quisque nunc dui, vulputate quis mauris ac, pulvinar placerat enim. Donec suscipit finibus fringilla. Maecenas molestie ultricies pellentesque.<br />\r\n<br />\r\nNulla ullamcorper in elit sit amet suscipit. Aliquam vel risus non nisi scelerisque faucibus eu in elit. Aliquam at ligula id risus porttitor accumsan eget et mauris. Integer et nulla sed urna porttitor volutpat efficitur quis metus. Pellentesque pulvinar varius posuere. Proin in suscipit nunc. Phasellus pretium neque nec nunc vulputate, eget imperdiet velit congue.<br />\r\n<br />\r\nEtiam faucibus, nulla vel tristique pretium, justo orci commodo erat, sit amet venenatis quam libero et odio. Donec nec tristique turpis. Donec vitae ornare tortor. Ut fermentum augue sed placerat vulputate. Pellentesque eros eros, interdum quis velit a, efficitur luctus sapien. Nullam mollis, dui id luctus vehicula, lacus urna scelerisque urna, id imperdiet nisi ante id eros. Fusce lectus augue, fermentum ut euismod id, facilisis id neque. Aenean a enim lorem. Aliquam quam magna, sollicitudin in sagittis vitae, pretium quis augue. Duis eu eros nunc. Donec a purus leo. Nullam faucibus odio ut egestas semper.<br />\r\n<br />\r\nNulla vel est in turpis convallis consequat. Donec a condimentum leo, accumsan tincidunt elit. Aliquam ut mollis neque. Sed vehicula ac justo et condimentum. Aliquam vehicula pharetra nulla at congue. Quisque est nisl, pretium in mattis id, blandit nec diam. Aliquam hendrerit vehicula mi, nec volutpat libero elementum eget. Etiam sit amet tempor sapien.<br />\r\n<br />\r\nAenean vestibulum fermentum lorem. Nunc eu maximus felis. Maecenas accumsan sem ac tempus egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam sem quam, ullamcorper vitae quam convallis, tristique sagittis libero. Vivamus volutpat eget neque ac dictum. Duis mattis molestie leo ac vehicula. Vestibulum accumsan erat sed ipsum pharetra suscipit a nec tortor. Duis volutpat, dolor condimentum convallis facilisis, enim felis ullamcorper nisi, quis vestibulum ipsum ex et ipsum. In quis varius neque. Praesent posuere convallis mi quis porttitor. Donec luctus lorem at elementum varius. Phasellus tristique leo purus, a vestibulum magna maximus quis. Vestibulum tincidunt gravida enim, ut vehicula mi volutpat ut.', 'f4d39887672574fcf8e6ce76596aaafe.png', 2, 1, 0, '2020-06-24 12:32:45'),
(12, 'Ajfud9 D09df09df09f09d ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ultrices mollis nunc, ac feugiat purus efficitur quis. Nunc vitae nunc arcu. Fusce ipsum felis, finibus vitae ultrices non, fringilla at nulla. Quisque a tortor vel augue rhoncus sodales a a nulla. Ut diam turpis, rhoncus vel posuere pretium, maximus at mauris. Vestibulum vitae tristique libero, quis sodales urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas facilisis ex euismod nibh pellentesque placerat. Cras eget imperdiet massa, sed posuere erat. Mauris molestie tempus risus vitae sagittis. Integer malesuada congue lacus a hendrerit. Quisque nunc dui, vulputate quis mauris ac, pulvinar placerat enim. Donec suscipit finibus fringilla. Maecenas molestie ultricies pellentesque.<br />\r\n<br />\r\nNulla ullamcorper in elit sit amet suscipit. Aliquam vel risus non nisi scelerisque faucibus eu in elit. Aliquam at ligula id risus porttitor accumsan eget et mauris. Integer et nulla sed urna porttitor volutpat efficitur quis metus. Pellentesque pulvinar varius posuere. Proin in suscipit nunc. Phasellus pretium neque nec nunc vulputate, eget imperdiet velit congue.<br />\r\n<br />\r\nEtiam faucibus, nulla vel tristique pretium, justo orci commodo erat, sit amet venenatis quam libero et odio. Donec nec tristique turpis. Donec vitae ornare tortor. Ut fermentum augue sed placerat vulputate. Pellentesque eros eros, interdum quis velit a, efficitur luctus sapien. Nullam mollis, dui id luctus vehicula, lacus urna scelerisque urna, id imperdiet nisi ante id eros. Fusce lectus augue, fermentum ut euismod id, facilisis id neque. Aenean a enim lorem. Aliquam quam magna, sollicitudin in sagittis vitae, pretium quis augue. Duis eu eros nunc. Donec a purus leo. Nullam faucibus odio ut egestas semper.<br />\r\n<br />\r\nNulla vel est in turpis convallis consequat. Donec a condimentum leo, accumsan tincidunt elit. Aliquam ut mollis neque. Sed vehicula ac justo et condimentum. Aliquam vehicula pharetra nulla at congue. Quisque est nisl, pretium in mattis id, blandit nec diam. Aliquam hendrerit vehicula mi, nec volutpat libero elementum eget. Etiam sit amet tempor sapien.<br />\r\n<br />\r\nAenean vestibulum fermentum lorem. Nunc eu maximus felis. Maecenas accumsan sem ac tempus egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam sem quam, ullamcorper vitae quam convallis, tristique sagittis libero. Vivamus volutpat eget neque ac dictum. Duis mattis molestie leo ac vehicula. Vestibulum accumsan erat sed ipsum pharetra suscipit a nec tortor. Duis volutpat, dolor condimentum convallis facilisis, enim felis ullamcorper nisi, quis vestibulum ipsum ex et ipsum. In quis varius neque. Praesent posuere convallis mi quis porttitor. Donec luctus lorem at elementum varius. Phasellus tristique leo purus, a vestibulum magna maximus quis. Vestibulum tincidunt gravida enim, ut vehicula mi volutpat ut.', '7549d6f4b505a7d18e8bd0ebaddf248f.png', 4, 1, 0, '2020-06-24 12:33:00'),
(13, 'Mengenal Toxic Relationship Mengenal Toxic Relationship Mengenal Toxic Relationship', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ultrices mollis nunc, ac feugiat purus efficitur quis. Nunc vitae nunc arcu. Fusce ipsum felis, finibus vitae ultrices non, fringilla at nulla. Quisque a tortor vel augue rhoncus sodales a a nulla. Ut diam turpis, rhoncus vel posuere pretium, maximus at mauris. Vestibulum vitae tristique libero, quis sodales urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas facilisis ex euismod nibh pellentesque placerat. Cras eget imperdiet massa, sed posuere erat. Mauris molestie tempus risus vitae sagittis. Integer malesuada congue lacus a hendrerit. Quisque nunc dui, vulputate quis mauris ac, pulvinar placerat enim. Donec suscipit finibus fringilla. Maecenas molestie ultricies pellentesque.<br />\r\n<br />\r\nNulla ullamcorper in elit sit amet suscipit. Aliquam vel risus non nisi scelerisque faucibus eu in elit. Aliquam at ligula id risus porttitor accumsan eget et mauris. Integer et nulla sed urna porttitor volutpat efficitur quis metus. Pellentesque pulvinar varius posuere. Proin in suscipit nunc. Phasellus pretium neque nec nunc vulputate, eget imperdiet velit congue.<br />\r\n<br />\r\nEtiam faucibus, nulla vel tristique pretium, justo orci commodo erat, sit amet venenatis quam libero et odio. Donec nec tristique turpis. Donec vitae ornare tortor. Ut fermentum augue sed placerat vulputate. Pellentesque eros eros, interdum quis velit a, efficitur luctus sapien. Nullam mollis, dui id luctus vehicula, lacus urna scelerisque urna, id imperdiet nisi ante id eros. Fusce lectus augue, fermentum ut euismod id, facilisis id neque. Aenean a enim lorem. Aliquam quam magna, sollicitudin in sagittis vitae, pretium quis augue. Duis eu eros nunc. Donec a purus leo. Nullam faucibus odio ut egestas semper.<br />\r\n<br />\r\nNulla vel est in turpis convallis consequat. Donec a condimentum leo, accumsan tincidunt elit. Aliquam ut mollis neque. Sed vehicula ac justo et condimentum. Aliquam vehicula pharetra nulla at congue. Quisque est nisl, pretium in mattis id, blandit nec diam. Aliquam hendrerit vehicula mi, nec volutpat libero elementum eget. Etiam sit amet tempor sapien.<br />\r\n<br />\r\nAenean vestibulum fermentum lorem. Nunc eu maximus felis. Maecenas accumsan sem ac tempus egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam sem quam, ullamcorper vitae quam convallis, tristique sagittis libero. Vivamus volutpat eget neque ac dictum. Duis mattis molestie leo ac vehicula. Vestibulum accumsan erat sed ipsum pharetra suscipit a nec tortor. Duis volutpat, dolor condimentum convallis facilisis, enim felis ullamcorper nisi, quis vestibulum ipsum ex et ipsum. In quis varius neque. Praesent posuere convallis mi quis porttitor. Donec luctus lorem at elementum varius. Phasellus tristique leo purus, a vestibulum magna maximus quis. Vestibulum tincidunt gravida enim, ut vehicula mi volutpat ut.', 'counseling.png', 2, 1, 0, '2020-06-24 12:33:12'),
(15, 'Asd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet tincidunt risus, at rutrum nisi. Quisque tincidunt lectus sed laoreet sagittis. Curabitur mauris augue, mollis in pretium ut, congue eget erat. Ut lacinia dignissim nulla vitae aliquet. Aenean at tortor semper, porta libero vitae, auctor felis. Sed vitae laoreet lorem, in vulputate ex. In sit amet leo eu nunc luctus suscipit. Mauris at metus in tellus finibus rhoncus nec vitae ex. Vivamus rhoncus interdum dui in consectetur. Proin quis leo ac ipsum accumsan aliquam finibus at nisi. Sed semper dui justo, at molestie arcu congue nec. Nam eleifend pulvinar posuere. Nullam dolor nisl, finibus eget lectus et, sodales semper lacus.<br />\r\n<br />\r\n<br />\r\n<br />\r\nAliquam sit amet vulputate arcu. Maecenas faucibus porta ipsum id dignissim. Suspendisse at justo enim. Proin eget urna a lacus lacinia pulvinar. Cras lacinia odio sed mauris aliquam sodales. Curabitur ut eleifend elit. Vestibulum id hendrerit justo, sit amet maximus lorem. Aenean eu interdum urna. Sed faucibus porta varius. Aenean eleifend interdum tortor, a ultricies massa tincidunt a. In vestibulum at magna tincidunt blandit. Quisque mattis aliquam mauris eu luctus.<br />\r\n<br />\r\n<br />\r\n<br />\r\nAliquam et posuere ex. Praesent elit ante, viverra vitae accumsan eget, congue fringilla lectus. Ut eu eros a nulla pulvinar placerat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean venenatis vulputate lacus, convallis rutrum mi. Mauris neque tortor, dictum at vestibulum ut, venenatis id leo. Sed et felis interdum, mattis ipsum at, tempus elit. Vestibulum imperdiet neque rutrum fringilla ornare.<br />\r\n<br />\r\n<br />\r\n<br />\r\nCurabitur in faucibus eros. Aliquam quis magna vel libero tempus efficitur. Quisque finibus orci at accumsan aliquam. Nulla sollicitudin malesuada urna et molestie. Nam at fermentum neque, cursus mollis arcu. Sed ultricies ligula vel est aliquam, vitae dapibus mauris viverra. In aliquet eu arcu id dignissim. Nulla non orci augue. Suspendisse ut lacus vitae velit venenatis pharetra. Ut ultrices nibh et nibh bibendum, quis tincidunt diam rhoncus. In hac habitasse platea dictumst. Nullam ut suscipit massa, id commodo quam. Morbi sit amet egestas nibh. Sed vel nibh commodo, ultricies ipsum ut, fermentum sapien. Maecenas cursus dictum sapien, congue dignissim erat bibendum eu. Donec viverra cursus sagittis.<br />\r\n<br />\r\n<br />\r\n<br />\r\nNam pretium neque a mauris accumsan viverra. Pellentesque fringilla bibendum malesuada. Morbi eget augue neque. Nunc tristique lectus ac ex bibendum lobortis. Mauris viverra cursus purus at suscipit. Praesent imperdiet, purus a semper placerat, lectus nisl venenatis ex, vitae auctor arcu sem sed ipsum. Nullam nec magna vel nisi facilisis feugiat in sed massa.', 'e0be9c16d07603f9c996095a35886122.png', 4, 1, 0, '2020-06-24 19:42:53'),
(16, 'Asd', 'asdas dasdas dasd asd', '2b21aac8f0d1b0501431c9dbc6a03f02.png', 1, 3, 0, '2020-06-24 19:57:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `status_user` varchar(25) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status_online` varchar(8) NOT NULL,
  `tanggal_tambah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama_lengkap`, `username`, `password`, `email`, `status_user`, `image`, `status_online`, `tanggal_tambah`) VALUES
(1, 'elriyani', 'el', 'c4ca4238a0b923820dcc509a6f75849b', '1@1.com', 'admin', '', 'offline', '2020-06-08'),
(2, 'Ek', 'masbim', 'c4ca4238a0b923820dcc509a6f75849b', 'mas@bim.com', 'admin', 'NXBtdFQ2bkQwRFFzV0tEUnhGWndmZz09', 'online', '2020-06-24'),
(3, 'masbim2', 'masbim2', 'c4ca4238a0b923820dcc509a6f75849b', 'mas@bim.com', 'psikolog', '', 'offline', '0000-00-00'),
(4, 'Syafira Viglia', 'iwrah', 'c4ca4238a0b923820dcc509a6f75849b', 'mas@bim.com', 'user', '', 'offline', '0000-00-00'),
(7, 'Asdx', 'iwrah1', 'c4ca4238a0b923820dcc509a6f75849b', 'iwrah1@1secmail.com', 'user', 'NXBtdFQ2bkQwRFFzV0tEUnhGWndmZz09', 'online', '2020-06-22'),
(8, 'Aasadas Ads Asdas', 'asd2134', 'baabef592da4b8dd5ca4fae6cd85a79c', 'iwrahasd1@1secmail.com', 'user', 'NXBtdFQ2bkQwRFFzV0tEUnhGWndmZz09', 'online', '2020-06-22'),
(9, 'Asd As Das Dasd ', 'asdasdasd', 'baabef592da4b8dd5ca4fae6cd85a79c', 'iwrah1@1secmail.comasd', 'user', 'Rm9aNVRyemdiREZtZDZtb2pvQlBNQT09', 'offline', '2020-06-23'),
(10, 'Asdsad', 'saddsa', 'aa29895c7948fc77fe827180da57de6d', 'dsdasda', 'user', 'NXBtdFQ2bkQwRFFzV0tEUnhGWndmZz09', 'offline', '2020-06-23'),
(11, 'El', '123', '202cb962ac59075b964b07152d234b70', 'elriyani18@gmail.com', 'user', 'Rm9aNVRyemdiREZtZDZtb2pvQlBNQT09', 'online', '2020-06-23'),
(12, 'Elkirana', 'yy', '827ccb0eea8a706c4c34a16891f84e7b', 'elriyaniii@yahoo.com', 'user', 'Rm9aNVRyemdiREZtZDZtb2pvQlBNQT09', 'online', '2020-06-23'),
(13, 'Daham Raihan', 'raihan', '202cb962ac59075b964b07152d234b70', 'raihan@gmail.com', 'user', 'NXBtdFQ2bkQwRFFzV0tEUnhGWndmZz09', 'offline', '2020-06-24'),
(14, 'Asd', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3@www.com', 'user', 'NXBtdFQ2bkQwRFFzV0tEUnhGWndmZz09', 'offline', '2020-06-24'),
(15, 'As', 'as', '0cc175b9c0f1b6a831c399e269772661', 'as@as.com', '', 'NXBtdFQ2bkQwRFFzV0tEUnhGWndmZz09', 'online', '2020-06-24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat_history`
--
ALTER TABLE `chat_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat_history`
--
ALTER TABLE `chat_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT untuk tabel `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
