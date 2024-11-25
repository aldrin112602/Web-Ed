-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 10:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_ed`
--

-- --------------------------------------------------------

--
-- Table structure for table `absents`
--

CREATE TABLE `absents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `grade_handle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `extension_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'Admin',
  `profile` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `id_number`, `name`, `gender`, `username`, `password`, `extension_name`, `email`, `position`, `role`, `profile`, `address`, `phone_number`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1919757448', 'Lonie Grimes', 'Male', 'aldrin02', '$2y$12$PgeQWhBbtY4SWmyIrILOdeYjuBczoDnbeeMVlLzriHRSOTJsXbcna', NULL, 'caballeroaldrin02@gmail.com', NULL, 'Admin', 'profiles/1731995193_WIN_20241026_16_52_52_Pro.jpg', '88195 Eliezer CircleWest Gerardo, MD 87277', '09615653697', NULL, NULL, '2024-08-14 02:11:22', '2024-11-19 05:46:33'),
(2, '4496389333', 'Dr. Sarina Morissette DVM', 'Female', 'earnestine92', '$2y$12$WPsVmTcGm8LjD2ZMAcA.QeqxGHSIx/qfPi3SjSySGB.e72bBYOqKi', NULL, 'zulauf.jude@example.com', NULL, 'Admin', 'profiles/x3cZaAeF2sHcxWToqq3Z89eMNzQOO6mV62Jhw5zs.jpg', '148 Durgan BrooksEast Millieshire, MD 13613', '09452172261', NULL, NULL, '2024-08-14 02:11:23', '2024-10-27 03:17:54'),
(3, '6788260981', 'Mr. Eino Heathcote V', 'Male', 'conroy.celestino', '$2y$12$ypOxFkqPfUfdAo/cL5Fr3erFXThfTlgaGVatL2tri5gimaL/beOCq', NULL, 'beatty.nicole@example.org', NULL, 'Admin', NULL, '337 Mark Fall Apt. 874\nO\'Konchester, HI 11251-1366', '09640728346', NULL, NULL, '2024-08-14 02:11:24', '2024-08-14 02:11:24'),
(4, '5842549275', 'Winston Hegmann', 'Male', 'ettie26', '$2y$12$unKK2WF8OrU7y.c7lk4z9OPfbAdKVIJZGeV4aNwBnZ8WK3HezFYsW', NULL, 'hauck.earnest@example.org', NULL, 'Admin', NULL, '612 Ward Corners\nRitchieview, IN 41258-1798', '09185194354', NULL, NULL, '2024-08-14 02:11:25', '2024-08-14 02:11:25'),
(5, '8724863582', 'Amari Robel', 'Male', 'rcollier', '$2y$12$WYCAnpYUZLVCDm4q9WE2yO92sqbyU5/lw0dP45b0vp6FEBbin1tZa', NULL, 'xokeefe@example.com', NULL, 'Admin', NULL, '60394 Orin Plain Apt. 851\nLake Gail, TN 68897', '09967283288', NULL, NULL, '2024-08-14 02:11:26', '2024-08-14 02:11:26'),
(6, '4387090800', 'Stephanie Jast MD', 'Female', 'rickie.rodriguez', '$2y$12$o6qFCNX.fBKdJ9B2Jqglqe1htiLs3uHQClWzMD85mIQgzirL.p8Vi', NULL, 'tconroy@example.org', NULL, 'Admin', NULL, '61393 Ferry Haven\nNoelborough, DE 30564-7734', '09691330224', NULL, NULL, '2024-08-14 02:11:27', '2024-08-14 02:11:27'),
(7, '5260209467', 'Prof. Jaime Farrell DDS', 'Female', 'iebert', '$2y$12$JaL.rbcq0qPN29LtSMm7Uet5uBOXm1faXGlnK53prPnkTWhlceDT6', NULL, 'bonnie.senger@example.net', NULL, 'Admin', NULL, '296 Ortiz Branch\nValerieville, NV 36037-1610', '09874171075', NULL, NULL, '2024-08-14 02:11:28', '2024-08-14 02:11:28'),
(8, '4876014678', 'Mr. Benedict Grady', 'Male', 'cmclaughlin', '$2y$12$hYYSSvxkBBvzwEtayEifdeP34WsKmWSxLqADd3fAsEhXFhX417guK', NULL, 'roselyn11@example.com', NULL, 'Admin', NULL, '637 Eliezer Summit\nLake Sandraberg, OH 99008-2301', '09540324693', NULL, NULL, '2024-08-14 02:11:29', '2024-08-14 02:11:29'),
(9, '9368129185', 'Dr. Carolyn Hansen DVM', 'Male', 'selmer62', '$2y$12$SvuTgoIrHQ2hnLFKKrzTiuj0VEvV5JwvqcbWn5/CQRDE4khwFz4OC', NULL, 'al49@example.com', NULL, 'Admin', NULL, '6729 Ena Cape\nNorth Laverna, MS 43454-8720', '09719211818', NULL, NULL, '2024-08-14 02:11:30', '2024-08-14 02:11:30'),
(10, '3269759796', 'Mr. Mateo Ebert I', 'Female', 'emily.grant', '$2y$12$rwlOo5SQKlA.pK1PDKZO0.7/GICOQb9JP2gViHsmMUgdG2kvH8RAK', NULL, 'krajcik.naomie@example.org', NULL, 'Admin', NULL, '873 Mario Forest Apt. 942\nStantonside, SD 78764-8557', '09180572643', NULL, NULL, '2024-08-14 02:11:31', '2024-08-14 02:11:31'),
(11, '2968172790', 'Dr. Braeden Mayer', 'Male', 'idella.schneider', '$2y$12$9hhJq1.EQjisl/213uAAi.UDzIDxRSjEVBzQZ2xvHW3zsv5y4LoJW', NULL, 'nhilpert@example.com', NULL, 'Admin', NULL, '33627 Lizzie Shoal Apt. 583\nNew Agustin, MA 45409', '09211496075', NULL, NULL, '2024-08-14 02:11:33', '2024-08-14 02:11:33'),
(12, '6150946242', 'Mrs. Lia Sauer MD', 'Male', 'xwyman', '$2y$12$KdL6sXWSSWH/AaylYCo7BO838iL.rxjbrUFBjCQVCw/XtmUVHJgqm', NULL, 'ilebsack@example.com', NULL, 'Admin', NULL, '2719 Green Points Apt. 240\nHiramberg, SC 76670', '09297665499', NULL, NULL, '2024-08-14 02:11:34', '2024-08-14 02:11:34'),
(13, '6810514168', 'Mariana Ratke', 'Female', 'fkutch', '$2y$12$Tcgt7R.6nXI0ZKUVwPWO6u3mssGR0hh9IASdSSwzo1bBb4HxVT7.W', NULL, 'funk.irving@example.com', NULL, 'Admin', NULL, '20123 Emelie Flat\nDavinmouth, NJ 09533-1009', '09622247572', NULL, NULL, '2024-08-14 02:11:35', '2024-08-14 02:11:35'),
(14, '1182418112', 'Kaci D\'Amore', 'Female', 'audie.goodwin', '$2y$12$of/OuHR0iHVWS9HLg4zH6uoMCzfOPhWG3ZKZxfAXSTQb.w/m3XkmK', NULL, 'dayton51@example.com', NULL, 'Admin', NULL, '3930 Metz Isle\nEast Jeffereyburgh, DE 75131', '09865644297', NULL, NULL, '2024-08-14 02:11:36', '2024-08-14 02:11:36'),
(15, '4485404579', 'Pearlie Pfannerstill', 'Male', 'larissa24', '$2y$12$03Q772zSknm9ZZwKSvCVwe.nH3p7Fcmdn8KysrefqrA72qv5pp70S', NULL, 'evert.emmerich@example.com', NULL, 'Admin', NULL, '4288 George Roads\nFriesenview, NV 79817', '09946756386', NULL, NULL, '2024-08-14 02:11:37', '2024-08-14 02:11:37'),
(16, '3604800634', 'Mr. Jess Morar', 'Female', 'mohammed07', '$2y$12$Eb5BkTk.bcpPCTqIAWES3OuhSQH1tD6O1T2bsVj6T2LLFZkDXcz6q', NULL, 'eturner@example.com', NULL, 'Admin', NULL, '8766 Athena Pass\nDanton, MA 88386-3904', '09504274682', NULL, NULL, '2024-08-14 02:11:38', '2024-08-14 02:11:38'),
(17, '7588707393', 'Marques Brakus', 'Female', 'witting.kaela', '$2y$12$LTepdC2BegRrC.PJaxpUUuakZLO6wiUCO1S1moK0bu9bmM66SlOYe', NULL, 'elmer63@example.com', NULL, 'Admin', NULL, '33063 Theresia Point\nNorth Harmony, MD 92958-4483', '09576336202', NULL, NULL, '2024-08-14 02:11:39', '2024-08-14 02:11:39'),
(18, '5459497807', 'Kameron Moen', 'Male', 'schulist.mikel', '$2y$12$JzQNHHxG8HJu1TX4Jv0Uhu3U3knK1z547vQjxkpC61QY5/1GqONoS', NULL, 'christa30@example.org', NULL, 'Admin', NULL, '97233 Russ Lodge\nRosenbaumhaven, MO 89295', '09641285211', NULL, NULL, '2024-08-14 02:11:40', '2024-08-14 02:11:40'),
(19, '4910941883', 'Ericka Zulauf', 'Female', 'ceasar.ernser', '$2y$12$X4eZJRw9dKKhPgaCLlu8qeRBYVIRdu2qIg9Hqq3OccWePyByphtEe', NULL, 'mcummings@example.org', NULL, 'Admin', NULL, '35999 Osborne Skyway\nPort Laverne, ME 17488-0512', '09886461593', NULL, NULL, '2024-08-14 02:11:42', '2024-08-14 02:11:42'),
(20, '4224762057', 'Mr. Rosendo Wiza II', 'Female', 'dwyman', '$2y$12$A8sbo8catRYYPMX5QMmQIeI3EW2X0TwCVieq4gAY/VprqfxYfRAhK', NULL, 'ubrekke@example.net', NULL, 'Admin', NULL, '8169 Rusty Islands\nWiegandchester, KY 08488', '09547278718', NULL, NULL, '2024-08-14 02:11:43', '2024-08-14 02:11:43'),
(21, '8208758316', 'James Bond', 'Male', 'tae123', '$2y$12$i0x/5SiJcUyezi5XFEY6fOQDE6uskx3Apz9qGbgoR2wqC74zV5Jmu', NULL, 'tae@gmail.com', NULL, 'Admin', 'profiles/4TRqmoKf2uwmBDklz9GM44SNxhDbxx2aleVXVJ3x.jpg', NULL, '09512793354', NULL, NULL, '2024-10-27 03:19:34', '2024-10-27 03:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `priority` enum('low','medium','high') NOT NULL DEFAULT 'low',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `type`, `user_id`, `title`, `message`, `is_seen`, `url`, `icon`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'reminder', 10, 'Voluptas et sunt enim sit dolor.', 'Ut odio excepturi maiores iusto vel laudantium. Nesciunt accusamus iste iure in. Accusamus provident vitae recusandae molestiae labore. Ut dolor labore quod aliquam qui deserunt. Possimus corporis dolores repellat.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:15', '2024-09-07 04:15:15'),
(3, 'message', 2, 'Id nemo quisquam debitis dicta atque.', 'Et in culpa provident aliquam et vel illo cumque. Omnis ut reprehenderit quia dignissimos quaerat. Provident quia accusantium itaque. Vitae sint odit qui omnis.', 0, 'http://abbott.com/et-et-optio-eum-aut-ut-minima', 'envelope', 'low', '2024-09-07 04:15:15', '2024-09-07 04:15:15'),
(4, 'alert', 18, 'Temporibus accusantium dignissimos sunt.', 'Repellat maiores assumenda porro recusandae culpa et consequatur nisi. Est officia repellat doloremque a rerum temporibus et necessitatibus. Numquam ea doloribus tempore libero repudiandae at.', 0, NULL, 'envelope', 'high', '2024-09-07 04:15:15', '2024-09-07 04:15:15'),
(5, 'alert', 20, 'Dolorem quia consequatur placeat voluptate quam rem.', 'Sit sed officiis et sint. Ea sunt pariatur dolorem. Eos omnis quasi ad et expedita.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:15', '2024-09-07 04:15:15'),
(6, 'alert', 12, 'Quas cumque quis eos.', 'Error quae tempore voluptate laboriosam. Enim sunt officiis qui qui odio.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:15', '2024-09-07 04:15:15'),
(7, 'reminder', 10, 'Ut asperiores asperiores hic delectus quibusdam.', 'Aut doloribus minima cupiditate et nisi possimus. Rerum itaque incidunt amet odio sed fugit. Temporibus ut dolorem ut harum.', 0, 'http://www.ruecker.com/aut-eveniet-inventore-praesentium-nesciunt-vitae.html', 'info-circle', 'high', '2024-09-07 04:15:15', '2024-09-07 04:15:15'),
(8, 'reminder', 3, 'Exercitationem numquam sit debitis debitis nesciunt autem.', 'Architecto soluta doloremque omnis magnam recusandae aspernatur. Soluta ullam nulla sed rerum est doloribus. Et qui fugiat temporibus minus. Non aspernatur minus expedita ut dignissimos.', 0, 'http://stokes.info/voluptates-ut-ipsum-voluptas-ratione-tenetur.html', 'bell', 'low', '2024-09-07 04:15:15', '2024-09-07 04:15:15'),
(10, 'reminder', 13, 'Qui et ab ut.', 'Aut corrupti rem sint vel qui corporis. Magnam voluptatibus fugiat assumenda atque molestiae repudiandae omnis. Accusantium voluptatem sit dolorum ipsam quae.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:15', '2024-09-07 04:15:15'),
(11, 'reminder', 18, 'Et sed expedita in.', 'Iste ipsam repellat ut qui doloribus fugiat asperiores. Ipsum voluptatum sint ut quo maxime.', 0, NULL, 'envelope', 'medium', '2024-09-07 04:15:15', '2024-09-07 04:15:15'),
(12, 'message', 8, 'Consequatur qui optio maxime sapiente in nulla.', 'Reprehenderit voluptate voluptate totam rem. Asperiores aliquam beatae modi. Totam neque itaque est ipsam. Et sed quo iure molestiae vel.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:15', '2024-09-07 04:15:15'),
(13, 'alert', 17, 'Consequatur quasi numquam qui omnis repellendus suscipit.', 'Natus fugit facilis nobis qui. Repellendus nobis dolorum qui. Saepe enim beatae quasi. Velit soluta officia laudantium atque.', 0, 'https://www.schaefer.com/quis-ut-ab-consequatur-repellendus-natus-voluptatibus-ut', 'envelope', 'low', '2024-09-07 04:15:15', '2024-09-07 04:15:15'),
(14, 'message', 10, 'Rerum ullam error incidunt adipisci qui sed.', 'Aspernatur tenetur voluptatem quos ut dolores cum. Aspernatur beatae quasi placeat hic dolores deserunt. Et molestiae nisi nostrum omnis voluptas asperiores.', 0, NULL, 'envelope', 'medium', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(15, 'reminder', 7, 'Eos aut enim nihil rem.', 'Iure pariatur at fugit sed mollitia. Sapiente maxime suscipit perspiciatis eos sit fuga temporibus. Minus suscipit voluptatibus qui aut praesentium consequatur nostrum. Ut ut eligendi dolor pariatur.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(16, 'reminder', 13, 'Culpa inventore tempora ea cumque assumenda.', 'Sequi repellat dolores cum qui magni amet officiis. Qui dignissimos rerum et eaque ex. At consectetur dicta aliquid.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(17, 'alert', 12, 'Voluptatem molestias modi nemo qui consequatur.', 'Harum sit in illum ut voluptas. Non laudantium quo qui ipsum possimus et. Quisquam et distinctio optio blanditiis.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(18, 'alert', 12, 'Ut voluptatem at ducimus et quia distinctio.', 'Corrupti a voluptatem sed nam. Est explicabo sit nobis ab sed. Beatae incidunt et sit et odit molestias. Facilis consequuntur ut molestiae a odit rerum.', 0, 'http://pollich.org/eum-ea-veniam-dolores-enim-similique', 'info-circle', 'high', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(19, 'alert', 14, 'Sunt id odit quia.', 'Aut qui reiciendis adipisci. Laborum id est assumenda. Nam autem reprehenderit ipsam.', 0, 'http://stamm.com/architecto-magni-hic-vero-eveniet', 'envelope', 'high', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(20, 'reminder', 4, 'Exercitationem esse dolore dolores et.', 'Ratione ab ea facilis quis. Commodi cupiditate voluptatem quaerat nesciunt velit autem. Aut vero ea consequatur vero necessitatibus molestias.', 0, 'http://ernser.com/non-dicta-natus-voluptas-amet-recusandae-nobis-quaerat-nesciunt.html', 'envelope', 'low', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(21, 'reminder', 2, 'Dolores nam voluptates quas voluptatem mollitia.', 'Officiis inventore aut veniam odit aspernatur dolorem. Enim at distinctio sint occaecati iure ipsa. Eius sit sint necessitatibus tempora vel. Explicabo qui animi consectetur quia odit ea magnam.', 0, NULL, 'bell', 'medium', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(22, 'reminder', 20, 'Ea odit ut itaque reiciendis ut architecto saepe.', 'Accusamus asperiores sed illum nisi assumenda. Enim distinctio omnis fuga et ut. Placeat dicta fuga voluptas.', 0, 'http://gerlach.biz/laudantium-optio-suscipit-quas-quia-dolores-fugiat.html', 'bell', 'high', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(23, 'alert', 16, 'Optio voluptas cumque quidem sit adipisci eveniet.', 'Magni ut deleniti itaque natus alias nisi quibusdam. Aut consequatur quis quaerat rerum quam maiores reprehenderit laborum. Qui qui ullam ut nesciunt architecto. Ut quibusdam et deserunt pariatur corrupti iure quidem. Ut omnis aliquam praesentium.', 0, 'http://grant.info/', 'envelope', 'medium', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(24, 'alert', 19, 'Quidem voluptatem sed voluptas libero.', 'Doloremque sint quo aperiam dolores dolorem facere vel. Unde nihil nostrum molestiae distinctio corrupti. Non consequatur magnam quis omnis autem. Repudiandae laboriosam minus quia quisquam.', 0, 'http://doyle.net/magni-sint-eum-repellat-eos', 'bell', 'high', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(25, 'alert', 14, 'Iste ab consequatur doloribus dolor a accusamus.', 'Aperiam vel et at impedit magni sit voluptatibus qui. Iste ut et et natus recusandae exercitationem magnam. Et laudantium sapiente harum dolorum consequatur.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(26, 'message', 18, 'Vel nemo assumenda laborum.', 'Omnis dignissimos ex ut molestias. Earum a omnis omnis provident quibusdam. Ut laborum sapiente aut corrupti ab aliquid. Eos ratione dolores cupiditate consequatur et.', 0, NULL, 'envelope', 'medium', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(27, 'reminder', 18, 'Reiciendis ab perferendis aspernatur.', 'Est eos dolores dicta et vitae et accusamus. Rerum blanditiis est eligendi enim. Esse sint sunt quae nihil quod qui.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(28, 'alert', 15, 'Voluptas iusto non atque explicabo.', 'Fuga ut sit itaque qui vitae magni. Est ut quibusdam aspernatur quis assumenda ipsa dicta incidunt. Qui quia non natus quam.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(29, 'message', 18, 'Exercitationem rerum aut est omnis qui.', 'Veniam soluta dicta laborum in debitis aperiam impedit. Vel voluptatum in quia at aliquam. Consectetur sit aliquid aliquam vitae. Magnam ullam consectetur magnam. Magnam sunt ut repellendus quas.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(30, 'reminder', 14, 'Vero in ipsam est velit sunt in.', 'Corrupti ullam necessitatibus vel dolorem. Sed ad nemo assumenda sit quia harum. Eveniet velit nostrum consequatur iure praesentium nam voluptas.', 0, 'https://kuhn.biz/suscipit-perferendis-culpa-nisi-sapiente-necessitatibus-suscipit-veritatis.html', 'info-circle', 'high', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(31, 'message', 20, 'Quae voluptatem nulla odit.', 'Quos ratione tenetur atque non rem similique. Est non eius labore iure. Voluptas minus sed nemo quae nihil unde. Sint excepturi vitae sit excepturi mollitia.', 0, 'http://www.torphy.com/delectus-eum-est-et', 'envelope', 'medium', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(32, 'message', 4, 'Explicabo quia voluptas velit nihil.', 'Placeat aut officia laboriosam id ut ipsa ex quia. Saepe dolorem vero ut corporis illum. Sunt doloremque magnam quae officiis architecto facilis delectus. Corporis laborum expedita doloribus ea tenetur tempore voluptas.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(33, 'alert', 9, 'Ipsam ut ratione fuga.', 'Minima distinctio et debitis tenetur cumque eveniet fuga quasi. Eaque ad maiores amet delectus maxime. Nihil quasi quo pariatur ut enim consectetur. Nihil sit magni ipsa dolor provident ullam delectus.', 0, 'https://paucek.net/necessitatibus-consequatur-eaque-ea-quae.html', 'envelope', 'high', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(34, 'message', 6, 'Ipsum nobis quo aliquid similique exercitationem.', 'Sint hic quisquam veritatis veritatis. Dicta ea explicabo aut id a nostrum ex. Dolorum non illum ea aliquam dolores voluptatem eum saepe.', 0, 'http://howell.org/reprehenderit-occaecati-vitae-ut-occaecati-eum-voluptatibus', 'envelope', 'low', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(35, 'reminder', 8, 'Ab facere ad et enim.', 'Mollitia animi omnis architecto. Blanditiis porro id et eos voluptatem et. Sunt dolorum incidunt eligendi voluptates ipsa doloribus. Dignissimos similique facilis eum minus et et.', 0, 'http://www.reynolds.com/doloribus-reprehenderit-illum-odit-inventore', 'info-circle', 'medium', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(36, 'reminder', 9, 'Et eligendi ut est.', 'Repellendus omnis voluptatem cum qui qui maiores expedita. Aliquam expedita qui aperiam quia quia. Deserunt aliquid quisquam incidunt labore. Doloremque qui et eum mollitia rerum.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(37, 'message', 5, 'Quod omnis et reiciendis harum.', 'Eligendi possimus possimus eos iste. Excepturi praesentium ex sed aliquam consequuntur a. Quisquam molestiae ab nostrum fugiat quia. Quis hic recusandae magni ea culpa quia.', 0, 'http://fadel.com/cumque-voluptatem-ipsa-atque-est-quasi', 'bell', 'high', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(38, 'alert', 19, 'Omnis omnis repudiandae aliquam.', 'Quia iure molestiae neque distinctio facilis. Eveniet culpa dignissimos minus reprehenderit. Quod deserunt atque praesentium. Itaque soluta sed quod et.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:16', '2024-09-07 04:15:16'),
(39, 'alert', 5, 'Aut cum autem cupiditate dolores nihil.', 'Ut possimus necessitatibus placeat animi. Vel accusamus voluptates aspernatur accusamus eligendi.', 0, 'http://nolan.info/', 'info-circle', 'high', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(40, 'message', 6, 'Porro quo dolorem blanditiis accusamus.', 'Quia quidem itaque ut laborum. Eaque beatae sed dignissimos error ut dolore a. Expedita nemo aut natus perferendis aut odio. Dolor eius id in est quam occaecati soluta autem.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(41, 'alert', 9, 'Error et accusamus ad maiores.', 'Velit voluptate ea velit id voluptatem quas. Amet laborum sequi voluptas sequi voluptatem. Libero eum nulla non ut est ratione. Nihil deleniti qui nisi placeat earum.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(42, 'alert', 20, 'Consequuntur magnam quia rerum delectus beatae.', 'Odit veniam id consequuntur incidunt recusandae sint distinctio consequatur. Maxime molestias occaecati et cupiditate tenetur. Cupiditate autem adipisci dolore quia omnis animi. Fugit veniam sit rerum aut.', 0, 'http://www.mckenzie.info/dolorem-a-repudiandae-nulla-doloremque.html', 'info-circle', 'high', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(43, 'reminder', 7, 'Consequatur odit quisquam non quia recusandae alias.', 'Ipsam impedit reiciendis atque rerum magnam beatae quidem. Qui omnis in facilis recusandae. Dolore est quis enim sed quidem deleniti. Asperiores iusto aliquam molestias quam iusto dolorem.', 0, 'http://www.spinka.com/rerum-veniam-nemo-aut-sit-aut-a', 'envelope', 'high', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(44, 'reminder', 15, 'Omnis accusamus inventore quas.', 'Architecto sequi odio ad optio perferendis nesciunt vel. Repudiandae incidunt est aut vel. Amet molestiae ut quasi corporis. Architecto nulla id sit sit.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(45, 'reminder', 16, 'Maxime eos nisi ipsa consectetur voluptatum.', 'Qui corporis ut nemo. Odio aut et error quia iure nihil. Nobis enim repellendus non velit.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(46, 'message', 8, 'Ut id facere et alias nesciunt.', 'Facere sit vero velit voluptatem itaque nam illo. Dignissimos quia sapiente facere ducimus magni eaque tempore nihil. Voluptatum amet aliquam et perspiciatis. Voluptatem perferendis eum dolore aut molestiae fugit facere.', 0, 'http://beatty.com/et-sit-est-recusandae-aliquam-tempore-nihil-nobis.html', 'bell', 'high', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(47, 'message', 2, 'Provident ad blanditiis rerum velit rerum distinctio.', 'Praesentium dolorem ex quibusdam consequatur et praesentium voluptatibus aperiam. Tempore ut vero nobis exercitationem voluptas aperiam maxime. Odit dolor magni quas optio omnis perferendis sed.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(48, 'reminder', 6, 'Dolore cumque qui enim doloribus.', 'Et consequuntur quia et non sit aspernatur. Tenetur voluptates natus qui vel est. Eveniet impedit laudantium voluptates quis ullam autem dolorem.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(49, 'message', 11, 'Id aliquid molestias eum eos laboriosam dolorem.', 'Tenetur velit sit quae qui dolores commodi. Labore voluptatem in qui fugiat eaque. Ea dolores et blanditiis eaque.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(50, 'alert', 14, 'Sint harum nobis nostrum nesciunt occaecati provident.', 'Qui recusandae fugiat voluptatem sint laudantium minima laudantium. Cum velit ullam voluptates magni praesentium fugiat dicta delectus. Rerum possimus sint qui optio tempora temporibus. Quo voluptatem blanditiis et atque quaerat.', 0, 'http://www.marvin.com/', 'envelope', 'medium', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(51, 'reminder', 4, 'Aut eius voluptatem aut.', 'Eum facilis quia quibusdam repellat nisi ea asperiores. Est et temporibus corporis. Voluptatum sit sit et nulla sint non ullam. Animi praesentium qui hic eos fugit. Et et aspernatur qui ut sunt molestiae aliquam dolores.', 0, 'http://www.schimmel.com/quia-iure-consequuntur-eveniet-quaerat-soluta', 'bell', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(52, 'reminder', 9, 'Velit et culpa quidem totam illo sunt.', 'Quisquam deserunt eius qui mollitia qui doloremque. Sunt et voluptatem ex voluptatibus. Voluptatem maiores vel non hic exercitationem voluptatem error quia.', 0, 'http://www.batz.com/ut-aut-saepe-earum-sint-et-necessitatibus-fugit.html', 'envelope', 'medium', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(53, 'message', 13, 'Modi consequuntur quo et quo laudantium.', 'Voluptate labore iste non et. Blanditiis repellendus fuga veritatis ea voluptas qui corrupti necessitatibus. Repudiandae at nisi ratione velit corporis porro. Quam impedit et id ut.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(54, 'message', 12, 'Ex unde earum non.', 'Et quis provident quo alias consequatur. Totam dolorem provident rerum quis voluptates et aut. Incidunt sit similique hic velit iste.', 0, NULL, 'envelope', 'high', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(55, 'message', 16, 'Accusamus rem rem odit sint vitae quis.', 'Aut repellendus exercitationem omnis reprehenderit tempore perferendis sed. Iste quis recusandae eos officia sapiente illum voluptatibus. Quisquam molestiae doloribus molestiae. Maiores qui ut qui voluptatibus facere provident.', 0, 'http://trantow.com/', 'info-circle', 'high', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(56, 'message', 13, 'Odit facere qui illum modi.', 'Impedit ipsum dignissimos id in. Perspiciatis sunt porro repudiandae. Deserunt et quod quia ut consequatur sed impedit.', 0, 'http://bergnaum.com/ullam-ipsam-eaque-libero.html', 'envelope', 'high', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(57, 'alert', 3, 'At et nulla tempore.', 'Cupiditate dolor doloremque iusto quibusdam itaque quia. Laborum quaerat sit aut. Necessitatibus dignissimos sint magnam natus nobis aperiam. Debitis ut esse in voluptas nam rerum.', 0, 'http://www.deckow.com/et-laboriosam-quaerat-dolorem-deleniti-dolores-nisi.html', 'bell', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(58, 'reminder', 17, 'Accusamus eligendi occaecati inventore nisi.', 'Doloribus et et libero. Doloribus fuga rem eos rerum facilis sit. Sed sunt deleniti deserunt et porro. Et asperiores eligendi labore maxime.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(59, 'reminder', 20, 'Expedita consequatur est minus aliquam.', 'Aut voluptate nam et excepturi natus. Facilis veniam nisi sapiente vitae quae sequi aliquid. Est aut dolores blanditiis. Et consequatur et id repellat et.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(60, 'alert', 11, 'Facilis sed sit doloribus neque porro.', 'Nihil quia totam numquam quia ut. Sunt deserunt quo deleniti molestiae harum voluptatibus molestiae. Nihil voluptatem recusandae provident necessitatibus aut quam vel.', 0, 'http://gulgowski.com/assumenda-molestiae-maiores-nulla-dolorem-mollitia-optio-molestiae-voluptas', 'info-circle', 'medium', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(61, 'reminder', 6, 'Veritatis consectetur quis id quasi pariatur.', 'Omnis nam ducimus delectus occaecati. Est aperiam laudantium doloribus quae aperiam corporis. Quia minima velit reiciendis nihil. Mollitia ipsam omnis odio et voluptatem.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(62, 'alert', 18, 'Possimus facilis atque autem inventore.', 'Totam ad aut blanditiis illo nihil et qui. Molestias temporibus quas odio accusantium dolore. Molestias sed suscipit est ut nihil deserunt. Voluptatem et sunt temporibus occaecati placeat.', 0, 'https://www.tremblay.info/laudantium-et-enim-animi-laborum-suscipit-aut', 'envelope', 'high', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(63, 'message', 19, 'Saepe harum nam ad.', 'Earum voluptatem praesentium ab voluptatem fugiat odit molestiae. Beatae voluptas dolores voluptas sed sit quos. Aut sit ut veritatis nesciunt. Velit eveniet aliquam quia maiores repellat quia officiis.', 0, NULL, 'envelope', 'medium', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(64, 'alert', 17, 'Ea eum commodi ea nemo et.', 'Neque quaerat incidunt harum sunt. Hic sit consequatur quia. Non optio velit ullam.', 0, 'http://mcclure.com/', 'info-circle', 'medium', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(65, 'alert', 6, 'Hic debitis exercitationem praesentium et animi.', 'Dolorem molestiae officiis et adipisci autem. Quia perferendis et voluptatem placeat quis quos voluptatibus at. Natus reiciendis ut nobis quibusdam. Enim impedit delectus quam a dicta culpa.', 0, 'http://satterfield.com/natus-harum-harum-debitis-eaque-ut-dignissimos-doloribus', 'bell', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(66, 'reminder', 17, 'Voluptate voluptas ipsam cum et quia rem.', 'Repellat voluptates sequi in voluptatum et et facere. Temporibus aut doloribus quod eius ratione aut id. Quisquam nobis ex molestiae aut ut aut necessitatibus et. Corporis numquam eveniet blanditiis molestias aliquid ad eum voluptas.', 0, 'http://morissette.info/et-esse-rem-ipsum-assumenda-omnis-perferendis', 'bell', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(67, 'message', 19, 'Nostrum mollitia omnis dolor quia.', 'Beatae nostrum minus labore deserunt officiis animi molestiae eaque. Odit repellendus ab fugiat ut voluptatum officiis qui. Ea eum omnis magnam sed commodi.', 0, 'http://oconnell.info/veritatis-neque-temporibus-veritatis-beatae', 'info-circle', 'high', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(68, 'message', 15, 'Et in vel nobis rerum et ea.', 'Adipisci dolore voluptas a omnis temporibus neque id nihil. Non omnis quae ut hic quis odio. Molestiae debitis aut vel fuga fugit esse. Cumque est molestiae ut ipsa et.', 0, NULL, 'bell', 'medium', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(69, 'reminder', 5, 'Enim reiciendis non voluptas debitis laboriosam error.', 'Omnis aut voluptatem dolorum eius et alias velit. Quasi qui est voluptatem culpa. Aut mollitia ut quia sit. Consectetur nisi quo ut minima.', 0, 'http://muller.com/rerum-ratione-doloremque-omnis-ut-neque', 'bell', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(70, 'reminder', 16, 'Excepturi reprehenderit ut unde aut culpa.', 'Sed hic in esse quo. Eaque ad sit quisquam voluptas eos sint deserunt repudiandae. Esse ipsa accusantium id dolores. Ut soluta aut soluta et fuga cupiditate voluptatum.', 0, 'http://www.moen.net/rerum-aliquam-adipisci-veritatis-qui-consectetur-quasi-perspiciatis.html', 'envelope', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(72, 'reminder', 18, 'Labore ipsam expedita consequatur accusantium.', 'Dignissimos rerum ut sed omnis ratione. Et corrupti delectus sed et eum commodi quae aut. Velit quibusdam eaque dolor ut recusandae id veniam.', 0, 'https://berge.net/pariatur-ullam-et-necessitatibus-quam-sapiente-ea.html', 'bell', 'medium', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(73, 'message', 15, 'Reiciendis excepturi esse nisi accusamus.', 'Accusantium alias dicta excepturi ipsum occaecati corrupti rerum. Explicabo nam perspiciatis quo. Et repudiandae quas quia hic animi nesciunt quasi.', 0, 'https://www.braun.com/quas-optio-quia-suscipit-sed-occaecati', 'info-circle', 'medium', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(74, 'alert', 19, 'Optio incidunt fugiat dignissimos voluptatem quasi non.', 'Eaque aperiam mollitia quod explicabo et dolorum deleniti. Porro sint sunt asperiores quas. Excepturi tempora voluptatibus ab possimus porro illum.', 0, 'http://www.turcotte.biz/', 'envelope', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(75, 'message', 10, 'Inventore tempora et ut velit.', 'Ea quas sunt sint provident. Quam commodi recusandae animi perspiciatis qui explicabo. Ducimus consectetur enim dolorem pariatur id qui quidem. Quae in qui error tempore.', 0, 'http://www.ziemann.com/autem-delectus-et-assumenda-sit', 'info-circle', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(76, 'alert', 7, 'Qui dignissimos dolorum eaque veritatis porro.', 'Dolorem numquam quibusdam labore dolor autem. Exercitationem sit earum minima ut veniam. Asperiores voluptatem occaecati in dolore.', 0, 'http://goyette.com/rerum-dolores-et-occaecati', 'bell', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(77, 'alert', 19, 'Praesentium facere architecto excepturi dignissimos.', 'Nulla deserunt error quam ea omnis adipisci. Nemo non voluptatem et quo. Voluptas velit fugiat ducimus molestiae dolor dicta et.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(78, 'reminder', 8, 'Est omnis officiis eum consectetur.', 'Fuga quibusdam ad voluptatem voluptatem ut nihil. Suscipit in distinctio vel dicta reiciendis et qui. Nisi tempora ut unde delectus quasi. Ipsum mollitia quis libero est perferendis.', 0, 'http://schuppe.com/quaerat-alias-cum-corrupti', 'envelope', 'medium', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(79, 'message', 13, 'Id vel quo qui amet.', 'Voluptate dolorem est suscipit. Ut voluptatibus et dolor beatae. Repellendus magnam commodi cumque doloremque vero et. Sunt et veniam est consectetur ad.', 0, 'http://www.walker.net/deleniti-provident-maiores-veritatis', 'bell', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(80, 'alert', 18, 'Nostrum enim maiores neque tempore amet porro.', 'Quo nesciunt nemo dolorum. Eveniet saepe aut cumque corporis ut doloribus. Fugit dolorum libero occaecati nisi quibusdam officia est. Culpa labore sapiente fugit blanditiis et sit qui consequatur.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(81, 'alert', 20, 'Laudantium cupiditate facilis voluptatem voluptatem esse.', 'Id voluptas est incidunt consectetur quo aut architecto ea. Consequuntur alias nihil illum velit quia. Sapiente eaque qui amet aperiam quis nemo. Et debitis itaque qui.', 0, 'http://www.kessler.net/optio-dolor-ut-nihil-at-qui', 'bell', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(82, 'message', 6, 'Velit veritatis velit numquam laboriosam.', 'Consectetur autem dignissimos laborum fugit autem natus. Officiis quis provident impedit dolorem rem fuga illum rerum. Occaecati sit quae impedit sint. Natus ea sit est minus rerum.', 0, 'http://www.olson.com/', 'envelope', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(83, 'alert', 7, 'Laboriosam quasi quod sed.', 'Dolor delectus eum provident veniam velit. Rerum sit vero dolore iste. Quo velit ratione aut harum sed voluptatem et.', 0, 'https://www.cruickshank.org/cum-odit-eaque-dolores-consequatur-alias-maxime', 'bell', 'high', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(84, 'reminder', 13, 'Voluptates reprehenderit sit dolor cumque.', 'Laborum quidem inventore voluptatem veritatis. Dignissimos quos non fugit est possimus. Nesciunt aspernatur dignissimos dignissimos nostrum. Inventore sapiente dolorum corrupti hic fugit ut.', 0, 'http://rau.com/eaque-et-deserunt-consequatur-qui-et-ipsa-et', 'envelope', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(85, 'alert', 11, 'Est accusantium eveniet consequatur.', 'Ut et nobis sunt. Consequatur libero fugiat nostrum voluptatem voluptas at. Ipsam non rerum et repudiandae. Repellendus ducimus quibusdam fugiat qui et. Cupiditate sit doloribus magnam delectus.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(86, 'message', 13, 'Non et est eos amet.', 'Id est omnis quia qui eligendi voluptatem. Fugiat quidem ex non aut et. Non eaque assumenda explicabo voluptatibus. Similique et repudiandae quia nesciunt aut eos.', 0, 'http://feeney.org/natus-nulla-commodi-maiores-accusamus-voluptatem.html', 'envelope', 'high', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(87, 'reminder', 14, 'Sunt voluptatibus nobis et repellat et.', 'Occaecati autem est dolorem iusto. Adipisci consectetur quo sunt rerum. Animi consequatur voluptatem veritatis odio molestiae quis. Ipsa dolorem rerum dicta qui et dolor. Similique ea et sit tempora doloremque harum.', 0, 'http://gaylord.com/', 'bell', 'high', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(88, 'alert', 19, 'In nemo corporis sunt voluptatum qui.', 'Maiores quia aperiam et autem est voluptas. Aliquid cumque vel nesciunt perspiciatis praesentium qui officiis. Harum dicta ducimus rerum ab est ut et.', 0, 'http://www.lebsack.com/voluptatum-consequatur-provident-laboriosam', 'bell', 'medium', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(89, 'message', 20, 'Rerum et laboriosam et reprehenderit odio qui.', 'Et dolore voluptate est voluptatem porro culpa. Sint voluptatibus repellendus suscipit mollitia ullam mollitia distinctio. Numquam ullam ad sed fuga aut omnis. Alias quas qui fugiat a rerum. Voluptas consequatur temporibus veniam expedita suscipit.', 0, NULL, 'envelope', 'high', '2024-09-07 04:15:57', '2024-09-07 04:15:57'),
(90, 'message', 16, 'Ad aut nesciunt quia.', 'Nam animi rerum eos non. Quasi est fuga tempore rem numquam non et libero.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(91, 'alert', 16, 'Laboriosam molestias reiciendis eligendi officia doloremque.', 'Consectetur voluptas est sed consequatur qui ut. Velit est possimus quos rerum inventore impedit aspernatur doloremque. Expedita est consectetur rerum et fugit aliquam quia ea.', 0, 'http://www.kessler.org/et-delectus-ullam-consequatur-sapiente-illo-ipsa-et.html', 'info-circle', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(92, 'alert', 18, 'Ut harum ut excepturi.', 'Facere ut quia error et. Quo nesciunt natus quidem repellendus et veritatis. Iusto labore cum expedita.', 0, NULL, 'envelope', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(94, 'reminder', 8, 'Impedit quia dolorum fuga.', 'Id odio id alias doloribus eveniet fugit et. Officiis doloremque quo dicta ut libero voluptate ut. Aspernatur laboriosam explicabo maiores iure.', 0, 'http://williamson.org/saepe-vel-voluptatibus-voluptatem-impedit-illo-iure-eaque', 'envelope', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(95, 'reminder', 5, 'Fuga occaecati facilis eius est odit rem.', 'Iusto quia aliquid corporis ut eos ab asperiores. Veritatis cum est qui nihil fugit expedita et. Et laudantium consectetur excepturi et.', 0, 'http://www.armstrong.info/provident-et-magnam-quaerat-molestias-esse', 'info-circle', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(96, 'message', 4, 'Libero magnam dolorem reiciendis quam rem.', 'Et aspernatur aut qui. Adipisci reprehenderit magnam omnis reprehenderit nostrum. Repellendus suscipit ratione id aperiam aut porro sit. Corporis magni vel ullam.', 0, 'http://moore.com/similique-et-quas-cum-qui', 'envelope', 'low', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(97, 'message', 14, 'Dolor ducimus perferendis qui.', 'Vel non ea veritatis voluptatem quasi. Delectus nobis assumenda possimus illo incidunt cupiditate. Quia et modi et dolorum qui sapiente totam.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(98, 'message', 14, 'Voluptatem a sint optio.', 'Dicta minima iure et voluptatibus recusandae. Deleniti ipsum quasi ea aut facilis enim. Provident vel praesentium qui deserunt aliquam. Esse quasi ipsum velit nisi illum.', 0, NULL, 'bell', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(99, 'reminder', 11, 'Voluptatibus incidunt et nobis.', 'Sint et molestiae consequuntur veniam sit. Qui quaerat modi quasi. Est non nisi iusto voluptatum.', 0, 'https://stokes.info/omnis-et-quod-consequatur-voluptatibus-aut-ipsa.html', 'bell', 'low', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(100, 'alert', 14, 'Ab qui neque doloribus ullam doloremque asperiores.', 'Consequatur recusandae officia pariatur quia alias praesentium aut ut. Iste quam accusamus mollitia distinctio delectus qui. Culpa velit architecto voluptatum quo et consequatur.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(102, 'profile_update', 2, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(103, 'profile_update', 3, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(104, 'profile_update', 4, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(105, 'profile_update', 5, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(106, 'profile_update', 6, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(107, 'profile_update', 7, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(108, 'profile_update', 8, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(109, 'profile_update', 9, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(110, 'profile_update', 10, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(111, 'profile_update', 11, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(112, 'profile_update', 12, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(113, 'profile_update', 13, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(114, 'profile_update', 14, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(115, 'profile_update', 15, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(116, 'profile_update', 16, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(117, 'profile_update', 17, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(118, 'profile_update', 18, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(119, 'profile_update', 19, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(120, 'profile_update', 20, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(121, 'profile_update', 21, 'Request profile update', 'Hi, paki palitang ng email ko, gawin mong aldrin112602', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:34:23', '2024-11-01 04:34:23'),
(123, 'profile_update', 2, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(124, 'profile_update', 3, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(125, 'profile_update', 4, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(126, 'profile_update', 5, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(127, 'profile_update', 6, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(128, 'profile_update', 7, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(129, 'profile_update', 8, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(130, 'profile_update', 9, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(131, 'profile_update', 10, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(132, 'profile_update', 11, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(133, 'profile_update', 12, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(134, 'profile_update', 13, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(135, 'profile_update', 14, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(136, 'profile_update', 15, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(137, 'profile_update', 16, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(138, 'profile_update', 17, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(139, 'profile_update', 18, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(140, 'profile_update', 19, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(141, 'profile_update', 20, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02'),
(142, 'profile_update', 21, 'Request profile update', 'fsdfsdfsdf', 0, 'http://127.0.0.1:8000/admin/account_management/student/1/edit', 'info-circle', 'high', '2024-11-01 04:36:02', '2024-11-01 04:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin_otp_accounts`
--

CREATE TABLE `admin_otp_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `grade_handle_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `announcement` varchar(255) NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_histories`
--

CREATE TABLE `attendance_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_model_id` bigint(20) UNSIGNED NOT NULL,
  `grade_handle_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time_in` varchar(255) NOT NULL DEFAULT 'N/A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_histories`
--

INSERT INTO `attendance_histories` (`id`, `subject_model_id`, `grade_handle_id`, `teacher_id`, `student_id`, `status`, `date`, `time_in`, `created_at`, `updated_at`) VALUES
(4, 28, 18, 14, 1, 'Absent', '2004-12-30', '19:58:09', '2024-09-14 16:48:45', '2024-09-14 16:48:45'),
(8, 22, 1, 12, 1, 'Absent', '2001-07-19', '14:40:05', '2024-09-14 16:48:46', '2024-09-14 16:48:46'),
(19, 21, 13, 18, 1, 'Late', '2016-04-02', '15:53:13', '2024-09-14 16:48:46', '2024-09-14 16:48:46'),
(26, 21, 17, 15, 1, 'Late', '1978-11-25', '22:34:47', '2024-09-14 16:48:46', '2024-09-14 16:48:46'),
(29, 21, 6, 7, 1, 'Absent', '1987-04-24', '16:21:52', '2024-09-14 16:48:46', '2024-09-14 16:48:46'),
(33, 21, 11, 15, 1, 'Late', '1993-08-02', '05:37:25', '2024-09-14 16:48:46', '2024-09-14 16:48:46'),
(34, 21, 5, 2, 1, 'Absent', '1987-01-25', '17:31:38', '2024-09-14 16:48:46', '2024-09-14 16:48:46'),
(42, 21, 20, 3, 1, 'Late', '2022-01-13', '11:38:14', '2024-09-14 16:48:46', '2024-09-14 16:48:46'),
(45, 21, 3, 7, 1, 'Late', '1975-10-28', '14:37:45', '2024-09-14 16:48:46', '2024-09-14 16:48:46'),
(48, 28, 19, 7, 1, 'Late', '2023-06-19', '06:14:22', '2024-09-14 16:48:46', '2024-09-14 16:48:46'),
(49, 23, 12, 10, 1, 'Late', '2011-07-11', '18:53:48', '2024-09-14 16:48:46', '2024-09-14 16:48:46'),
(53, 21, 5, 1, 1, 'Present', '2024-09-28', '2024-09-28 00:30:34', '2024-09-27 16:30:34', '2024-09-27 16:30:34'),
(56, 21, 5, 1, 1, 'Present', '2024-11-04', '13:54:11', '2024-11-04 05:54:11', '2024-11-04 05:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `face_recognition_keys`
--

CREATE TABLE `face_recognition_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pattern` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_by_admin_id` bigint(20) UNSIGNED NOT NULL,
  `updated_by_admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `face_recognition_keys`
--

INSERT INTO `face_recognition_keys` (`id`, `pattern`, `image_path`, `created_by_admin_id`, `updated_by_admin_id`, `created_at`, `updated_at`) VALUES
(4, '$2y$12$VD/1Y10nSYSKKClYM4f7ceIfD26BBNoNA.JodMAZaxyLC1LNnjL9m', 'pattern_images/pattern_1732100309.png', 1, 1, '2024-11-19 06:49:31', '2024-11-20 10:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `face_scans`
--

CREATE TABLE `face_scans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `time` time DEFAULT curtime(),
  `time_out` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `face_scans`
--

INSERT INTO `face_scans` (`id`, `student_id`, `time`, `time_out`, `created_at`, `updated_at`) VALUES
(2, 1, '11:54:01', '11:57:06', '2024-11-15 03:54:01', '2024-11-15 03:57:06'),
(3, 1, '14:12:25', NULL, '2024-11-19 06:12:25', '2024-11-19 06:12:25');

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
-- Table structure for table `grading_headers`
--

CREATE TABLE `grading_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `region` varchar(255) DEFAULT 'IV - A',
  `division` varchar(255) DEFAULT '2nd',
  `school_name` varchar(255) DEFAULT 'Ark Technological Institute Education System Inc',
  `school_id` varchar(255) DEFAULT '405210',
  `school_year` varchar(255) DEFAULT '2023-2024',
  `grade_handle_id` int(11) DEFAULT NULL,
  `written_work_percentage` varchar(255) DEFAULT NULL,
  `performance_task_percentage` varchar(255) DEFAULT NULL,
  `quarterly_assessment_percentage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guidance_accounts`
--

CREATE TABLE `guidance_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `extension_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'Guidance',
  `profile` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guidance_accounts`
--

INSERT INTO `guidance_accounts` (`id`, `id_number`, `name`, `extension_name`, `gender`, `username`, `password`, `email`, `role`, `profile`, `address`, `phone_number`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1923247534', 'Aldrin Caballero', NULL, 'Female', 'aldrin02', '$2y$12$DmLAnrFe6c266rS3pLira.5bXOePH3RdMtSKBBJKi.k.62YFkMqgK', 'caballeroaldrin02@gmail.com', 'Guidance', 'profiles/1731903502_WIN_20241026_16_52_50_Pro.jpg', '2650 Gilbert UnderpassZulaufmouth, MD 49373-5270', '09223387088', NULL, NULL, '2024-08-14 02:11:23', '2024-11-18 04:23:52'),
(2, '4680025548', 'Mr. Cleve Mueller', NULL, 'Male', 'jazmyne68', '$2y$12$Xb981w6GXjvf2vZx62CduuroARZDUHmuA10OIYYQNHOfZ.uHe/n.i', 'virginia35@example.net', 'Guidance', NULL, '61996 Lafayette Fork\nNew Andreanebury, NC 44705', '09144886462', NULL, NULL, '2024-08-14 02:11:24', '2024-08-14 02:11:24'),
(3, '1444004408', 'Ms. Margot Green', NULL, 'Male', 'zluettgen', '$2y$12$Ux3DycUkFd0tzNUmgeb3Huo1Ujv0IIAIC7Jl/1N.mfyIOdpEcoPfy', 'ullrich.destiny@example.com', 'Guidance', NULL, '91994 Mann Points\nMedhursthaven, MA 74344', '09587231241', NULL, NULL, '2024-08-14 02:11:25', '2024-08-14 02:11:25'),
(4, '2020264065', 'Dr. Fredrick Stark II', NULL, 'Female', 'lwunsch', '$2y$12$Kh7RlSSjaCnlhIZ2hcJwueqQJattZaPs9SMp048K.7LX48Sarw6I6', 'julien99@example.net', 'Guidance', NULL, '2155 Mertie Station Apt. 421\nPort Cortezbury, NY 18525-8901', '09907770793', NULL, NULL, '2024-08-14 02:11:26', '2024-08-14 02:11:26'),
(5, '0677910424', 'Elinor Wuckert', NULL, 'Female', 'winona26', '$2y$12$F4feyBqKb02IYbdRGohUQ.ryr8EQ7NQs4sul807Amtg7hjIAZI7Pi', 'romaguera.halle@example.net', 'Guidance', NULL, '1737 Parker River\nSouth Cora, NV 21049-0837', '09108591611', NULL, NULL, '2024-08-14 02:11:26', '2024-08-14 02:11:26'),
(6, '0872847257', 'Roberto Cormier', NULL, 'Male', 'april05', '$2y$12$L92g5gjx1zldFpb128rSrOaEU812qEYSlJnx3cFMZNZafyNm4Wx1e', 'daron.stiedemann@example.org', 'Guidance', NULL, '7995 Lebsack Turnpike Suite 579\nSouth Maximillian, GA 08466', '09664865553', NULL, NULL, '2024-08-14 02:11:27', '2024-08-14 02:11:27'),
(7, '8003495838', 'Violette Hamill', NULL, 'Female', 'nichole.schumm', '$2y$12$KWoRHYCGvASe/T0SlKtzEuShfw0JSYaZ14/iirmlf/etFtB1pOFUO', 'destiny.schuppe@example.com', 'Guidance', NULL, '68390 Cyril Overpass Apt. 314\nWest Dennisfort, CA 51052', '09614025300', NULL, NULL, '2024-08-14 02:11:28', '2024-08-14 02:11:28'),
(8, '4796191178', 'Brody Haag', NULL, 'Male', 'yadams', '$2y$12$x.djJJOZykfOx3rT0C/9AeNH0VkmABPaaES.Dc.QnX80K9HVx2Tf2', 'oleta35@example.org', 'Guidance', NULL, '5900 Sammie Estate Apt. 036\nSouth Coraborough, TX 14293-7283', '09752163906', NULL, NULL, '2024-08-14 02:11:30', '2024-08-14 02:11:30'),
(9, '7486393920', 'Mrs. Lily Schowalter V', NULL, 'Female', 'khalil.kihn', '$2y$12$19zEUpNajn82Bqg07ZRb9.Oa1EJpb.aXxSDMeawgqKBOe8dzSF07C', 'ssipes@example.net', 'Guidance', NULL, '664 Hand Park Suite 800\nNew Green, MS 57737-3025', '09487755137', NULL, NULL, '2024-08-14 02:11:31', '2024-08-14 02:11:31'),
(10, '5967268849', 'Dr. Stella Hessel PhD', NULL, 'Female', 'eveum', '$2y$12$kHh1NP8hXgYrZ2lvUpUa.OoiLjoBe83fWX/Y9yEPJV0szWpKXzPPW', 'trenton.corwin@example.com', 'Guidance', NULL, '2487 Paucek Terrace\nNorth Amina, NH 30824-9488', '09287120543', NULL, NULL, '2024-08-14 02:11:32', '2024-08-14 02:11:32'),
(11, '0792289619', 'Keith Predovic', NULL, 'Female', 'fbeer', '$2y$12$g2Hf8uKzGUnsDm1sEnKgGOzuS6BLQtb84dTjIuGUjwczWjZd05a0i', 'macejkovic.nyah@example.net', 'Guidance', NULL, '5326 Tressie Square\nHermannmouth, HI 81863-5082', '09450413500', NULL, NULL, '2024-08-14 02:11:33', '2024-08-14 02:11:33'),
(12, '8636620701', 'Prof. Tiffany Marvin V', NULL, 'Male', 'bins.deborah', '$2y$12$p.L1WBLqP15rKImsAv3kBu5tODeMvQdTZZh/Da3bhyQdAIlIvjJsy', 'kspencer@example.net', 'Guidance', NULL, '820 Amie Ramp Apt. 403\nHandfurt, IL 30177-8766', '09478258706', NULL, NULL, '2024-08-14 02:11:34', '2024-08-14 02:11:34'),
(13, '9689634735', 'Dr. Brody Lockman Sr.', NULL, 'Male', 'heber.dubuque', '$2y$12$9/gr7fLjuFq1xWabjxkCYeoaq0K6votEHAcc13xA.XtHYbqk9Ogfm', 'abigail.gaylord@example.net', 'Guidance', NULL, '97736 Haag Extension Suite 743\nSouth Dawn, FL 71217', '09120000414', NULL, NULL, '2024-08-14 02:11:35', '2024-08-14 02:11:35'),
(14, '0126350228', 'Dina Grady', NULL, 'Female', 'keeling.sylvester', '$2y$12$7O.aFJx.kKZc6rcTG9Tk.OSXprkD9vjhU7BP5evH9MOCg9889OJii', 'vlebsack@example.net', 'Guidance', NULL, '54716 Ottis River Suite 464\nJoesphbury, NJ 49602', '09794602105', NULL, NULL, '2024-08-14 02:11:36', '2024-08-14 02:11:36'),
(15, '0706801127', 'Syble Moore', NULL, 'Male', 'mcclure.franz', '$2y$12$GaXjs2BuNB/MVGe/FII8vu8mqUZ6PAYnvR3qiaFHfRiiu0cGlBo.2', 'uschamberger@example.com', 'Guidance', NULL, '9540 Gibson Islands Apt. 008\nRiceport, NY 67985-0490', '09493119127', NULL, NULL, '2024-08-14 02:11:38', '2024-08-14 02:11:38'),
(16, '7819670308', 'Prof. Bryana Reynolds', NULL, 'Female', 'tyree85', '$2y$12$yC2rqTpMItkRpWuM7ez1hu5LiSE86NXXYI6rjoav2r4fy3NCZjDFa', 'mona44@example.net', 'Guidance', NULL, '98229 Lowe Extensions\nNew Peggieville, VT 85380', '09668238930', NULL, NULL, '2024-08-14 02:11:39', '2024-08-14 02:11:39'),
(17, '9796518656', 'Reyes Collins', NULL, 'Female', 'pauline33', '$2y$12$atOx8SoxRoE/6HH20CEc9O6Ek4/1RA9IlR/JrGkae6MU3nWlrdofq', 'rebeka34@example.org', 'Guidance', NULL, '697 Vita Stream\nEloisaland, VA 39198-0590', '09152001245', NULL, NULL, '2024-08-14 02:11:40', '2024-08-14 02:11:40'),
(18, '2276434244', 'Dr. Rahul Stoltenberg II', NULL, 'Male', 'mpaucek', '$2y$12$4yfkEcctclSx8d/XBF7K7.c284zJdSaVJkwUiQDLmiLjjXZHYl5jC', 'sylvan13@example.org', 'Guidance', NULL, '713 Roob Locks\nNorth Deanshire, NE 74630-5466', '09131150231', NULL, NULL, '2024-08-14 02:11:41', '2024-08-14 02:11:41'),
(19, '8171075382', 'Sylvester Fisher', NULL, 'Male', 'jammie.bechtelar', '$2y$12$TYxIdu6nwK/b7RYj3RrBWOLFQER9hNLTyhFk1Vf4t09N4CnZF2h.m', 'mueller.kiera@example.com', 'Guidance', NULL, '1836 Laverne Square Suite 626\nNew Assunta, CO 48764', '09198619542', NULL, NULL, '2024-08-14 02:11:42', '2024-08-14 02:11:42'),
(20, '9864083184', 'Hollis Baumbach', NULL, 'Female', 'carson99', '$2y$12$fS6gnRVuxNTQwYl7.lgdpOzkz4SEOARmcA.c9s8yTEGOrUhVoBSJG', 'hermann.sally@example.net', 'Guidance', NULL, '20819 Demetris Lake\nNorth Jovanborough, IA 19534-6423', '09753649115', NULL, NULL, '2024-08-14 02:11:43', '2024-08-14 02:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `guidance_notifications`
--

CREATE TABLE `guidance_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `priority` enum('low','medium','high') NOT NULL DEFAULT 'low',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guidance_notifications`
--

INSERT INTO `guidance_notifications` (`id`, `type`, `user_id`, `title`, `message`, `is_seen`, `url`, `icon`, `priority`, `created_at`, `updated_at`) VALUES
(2, 'message', 17, 'Et mollitia culpa ratione voluptatem.', 'Est et molestiae soluta aperiam blanditiis dolor. Fugit assumenda quis laudantium architecto consequatur. Necessitatibus minus fugit id id iure minima qui. Aperiam et est quae omnis repudiandae consequuntur in.', 0, 'https://www.doyle.com/consequatur-inventore-cum-qui-ea-est-consequatur', 'info-circle', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(3, 'alert', 5, 'Rerum consequatur modi quibusdam et quas sit.', 'Voluptatem ut odit et nihil doloribus et. Vel dolores ipsam earum et et. Quasi ad quas molestiae suscipit perferendis cumque et.', 0, 'http://www.crona.net/nostrum-accusamus-dolorem-exercitationem-ad-suscipit-consequatur-sunt', 'bell', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(4, 'reminder', 9, 'Laborum omnis illum vel.', 'Sequi ut temporibus animi quas nisi. Amet magni fugiat eum et vel dolorum. Sunt quia nobis error. Expedita est dignissimos quaerat modi et laboriosam omnis.', 0, NULL, 'envelope', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(5, 'alert', 13, 'Vero voluptas sed dolorem quidem maxime ab.', 'Labore sed nobis aliquam porro nesciunt qui rerum iusto. Animi nesciunt tempore eius necessitatibus vero veritatis odit. Magnam ut voluptatem ea fugit soluta non velit. Culpa beatae sapiente earum similique aut.', 0, 'https://www.kohler.net/placeat-commodi-quam-voluptatibus', 'info-circle', 'low', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(6, 'alert', 13, 'Non assumenda qui aut et.', 'Quam eveniet deserunt velit. Incidunt nihil expedita impedit totam. Quo enim et non et reprehenderit.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(7, 'reminder', 11, 'Quidem occaecati impedit qui.', 'Vel quod cupiditate consequuntur pariatur dolores quidem eius. Ut nisi qui quidem praesentium nihil rerum animi. Provident molestias assumenda numquam in ratione recusandae minus odit.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(8, 'message', 4, 'Perferendis in consectetur dolor dolorum quas delectus.', 'Provident omnis reiciendis quis eveniet consequatur magnam odit. Enim ab quibusdam rem a sequi quasi. Quidem qui ut vero est unde ipsam.', 0, 'http://www.kling.com/inventore-animi-nihil-error-dolores-saepe-laboriosam-doloremque', 'envelope', 'low', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(9, 'alert', 9, 'Qui molestiae totam repellendus quia.', 'Omnis provident quod ea dolor. Dolor enim officiis doloribus accusantium minima ut velit voluptatem. Aut est est dolores dicta.', 0, 'http://harber.com/eaque-perferendis-expedita-delectus-placeat-consequuntur-qui-sed-veritatis.html', 'envelope', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(10, 'message', 14, 'Sit voluptatum unde eius.', 'Incidunt autem molestiae dignissimos qui esse fuga ipsum. Voluptatem pariatur laborum iure qui doloremque et. Inventore assumenda ipsum sequi accusamus odit ullam.', 0, 'https://rice.org/at-officiis-tempora-sapiente-sequi-dignissimos-rerum-quis-voluptatem.html', 'info-circle', 'low', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(12, 'reminder', 9, 'Assumenda sit consequatur vel.', 'Natus aliquid dolores aut delectus iusto beatae ducimus. Perferendis non nobis excepturi consequatur mollitia et. Nemo illum nemo ducimus asperiores possimus provident impedit. Possimus officiis aperiam laboriosam culpa.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(13, 'alert', 18, 'Molestias deserunt mollitia illum velit voluptate.', 'Numquam sequi quam aspernatur similique animi deserunt quia et. Nisi quia nemo eius. Quia aut quisquam expedita corrupti architecto. Ducimus facilis voluptatem qui sed ab sint.', 0, 'http://mayert.com/', 'envelope', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(14, 'reminder', 7, 'Asperiores ut beatae rerum illo reiciendis.', 'Ducimus suscipit nam nobis illo. Est mollitia omnis et ipsam autem voluptates. Ut nihil quod animi soluta voluptatem quia sed.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(15, 'message', 15, 'Error sint aspernatur non impedit aut.', 'Sint iste eos quis nisi quia sed quo. Est est iusto beatae mollitia eaque rerum. Eius sint vel voluptas a quia repudiandae. Autem culpa est odio commodi quaerat mollitia sit.', 0, NULL, 'envelope', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(16, 'message', 17, 'Ipsam ex voluptatem id aspernatur.', 'Et quaerat consectetur omnis quae est assumenda autem. Consectetur veniam cum ea adipisci molestias natus labore. Molestiae et possimus eveniet optio recusandae. Iste nihil pariatur perferendis.', 0, NULL, 'bell', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(17, 'message', 11, 'Et et consequatur et debitis sunt praesentium.', 'Ut id repudiandae unde aut. Eligendi id porro est voluptas animi. Ratione et dolor sit aliquam dicta.', 0, NULL, 'bell', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(18, 'message', 6, 'Amet cumque distinctio officia autem veritatis.', 'Voluptatem velit tempora modi sed voluptate. Vel laboriosam qui cupiditate animi totam cupiditate. Autem illo at fuga in corrupti doloribus.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(19, 'alert', 15, 'Qui mollitia dignissimos id earum iusto eos.', 'Ex asperiores quisquam sed quos. Autem quia delectus aut possimus possimus magni. Enim itaque et voluptatum vel doloremque voluptatem.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(20, 'reminder', 9, 'Aut ab quos dolorem.', 'Vel autem rerum quia ea. Delectus fugit sed eligendi. Ut eius beatae autem.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(21, 'message', 20, 'Corrupti odit sit quibusdam et.', 'Cumque rerum dolores aperiam eveniet doloremque. Quae accusamus itaque autem ad numquam. Atque debitis sapiente provident aperiam.', 0, 'https://www.gislason.org/dolorum-eum-dicta-exercitationem-repudiandae-enim', 'bell', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(22, 'message', 5, 'Quo sint omnis non voluptate.', 'Non molestias et autem quo possimus vero assumenda aliquam. Eum eum dolorem distinctio laborum. Enim quibusdam doloribus aut nam.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(23, 'message', 18, 'Illum vitae quis et maiores esse sed.', 'Expedita consequuntur voluptas velit id. Fugiat aut inventore sunt quos quisquam ad. In dolorum illum id modi eos nulla non. Officiis modi modi eligendi earum non.', 0, 'http://www.schamberger.biz/minima-consequatur-voluptas-porro-unde-molestiae-magni-aut.html', 'envelope', 'low', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(24, 'message', 3, 'A ex id suscipit sequi sed quia.', 'Ipsum quae quam eaque. Distinctio unde porro nisi inventore nulla ea enim.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(25, 'alert', 19, 'Modi dolor eos voluptatum et.', 'Fugiat iure atque architecto rerum facilis velit accusamus. Beatae ut hic omnis quia. Iure laudantium hic cupiditate odit mollitia non dolores. Excepturi autem voluptatem enim ab architecto voluptatum praesentium.', 0, 'http://green.net/omnis-molestias-odio-eos-autem-consequuntur.html', 'bell', 'low', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(26, 'alert', 16, 'Ipsum laborum voluptatibus cupiditate.', 'Harum nulla tenetur dicta qui unde sit aperiam. Impedit voluptatibus aperiam qui placeat at. Cupiditate provident nihil iusto optio omnis autem.', 0, 'http://collier.biz/in-asperiores-ab-sit-quia-sint-impedit-nihil-praesentium', 'info-circle', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(27, 'message', 11, 'Quis cumque qui et architecto velit.', 'Optio architecto velit ipsum possimus autem ex. Quasi non eveniet nobis soluta repellat veniam dolor. Veritatis ipsa voluptatem accusantium rerum explicabo numquam voluptas.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(28, 'message', 12, 'Sed autem eius fuga voluptatem.', 'Aliquid eum maiores possimus dolore dolores asperiores. Rem dolorum consequatur libero labore. Culpa minus quod blanditiis omnis. Praesentium itaque doloribus repellat.', 0, 'http://bartell.net/debitis-sed-perspiciatis-quo-dicta-non-odit.html', 'info-circle', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(29, 'message', 17, 'Quidem voluptatem ut accusamus commodi.', 'Exercitationem mollitia nostrum nobis magnam. Sit aut minus aut quod aut quas dolores. Ad cum ullam soluta et reiciendis.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(30, 'alert', 8, 'Vitae commodi mollitia eius.', 'Molestias labore ea accusantium perferendis. Dolorum expedita dolore nemo dolorem sit deserunt. Qui aut pariatur esse dolor. Exercitationem aperiam temporibus voluptate minima mollitia velit dolore. Esse eius nemo rerum ipsa rerum eaque.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(31, 'reminder', 13, 'Sed quam accusamus cupiditate.', 'Quis et dicta possimus quia eligendi nobis nulla. Praesentium deleniti nesciunt debitis laborum. Qui eum illo fugiat iure. Ratione perferendis aut ea repellendus enim aliquam.', 0, 'http://kautzer.com/', 'bell', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(32, 'reminder', 8, 'Aliquam aspernatur ipsam quaerat non consequatur.', 'Veritatis est nemo ea pariatur. Quasi asperiores rerum commodi. Reprehenderit in ex possimus minima consequatur.', 0, 'http://www.king.org/accusamus-nisi-veritatis-temporibus-laborum-magni', 'bell', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(33, 'message', 5, 'Ut quasi voluptatem aspernatur labore assumenda rerum.', 'Velit et quasi modi mollitia. Iure molestiae amet iusto. Incidunt repellendus et delectus sed dolores officiis. Saepe et et consequatur porro et ex iusto dolorum.', 0, 'http://www.bruen.com/', 'envelope', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(34, 'alert', 12, 'Numquam voluptas amet rerum eos molestiae.', 'Dolore vitae eligendi officia enim. Dicta incidunt reprehenderit doloribus voluptatem enim veritatis dolores.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(35, 'message', 5, 'Et et repellat voluptas vel.', 'Quod dolorem dolorem eum est sint. Nostrum et eos distinctio eum ut rerum. Id hic vero distinctio perspiciatis repellat sequi rerum.', 0, 'http://www.howe.com/veniam-neque-et-nam', 'bell', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(36, 'reminder', 20, 'Amet ut occaecati nostrum.', 'Nisi inventore quidem enim nam sed autem veritatis. Sed cupiditate qui ad tempore ex quia aliquid. Vero cum nisi accusantium quos. Excepturi eveniet quidem voluptates sapiente necessitatibus.', 0, 'https://doyle.com/velit-consequatur-hic-ut-ducimus-debitis-velit.html', 'bell', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(37, 'alert', 5, 'Omnis quisquam mollitia quia ut excepturi dignissimos.', 'Pariatur velit cumque autem maiores nihil reprehenderit suscipit. Voluptatem ab ducimus temporibus temporibus minus dolorem. Doloribus qui impedit qui exercitationem aliquam repellat. Voluptatem ipsam nihil molestiae blanditiis eos nam cumque et. Doloremque consequatur voluptatem dolores sunt est.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(38, 'alert', 3, 'Distinctio suscipit corrupti alias earum laudantium quasi.', 'Blanditiis aut cumque repudiandae perferendis distinctio. Deserunt et tenetur sed omnis qui sed. Eligendi debitis eveniet velit facere culpa omnis hic.', 0, 'http://www.hyatt.com/culpa-ipsam-illum-deserunt-velit-voluptate.html', 'info-circle', 'high', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(39, 'reminder', 6, 'Quisquam doloribus quibusdam omnis a.', 'Voluptates omnis officiis sit earum voluptas dolorem inventore. Atque ipsum culpa non ea quasi cum sed. Dolor dolores cumque aut earum dolorem.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(40, 'message', 19, 'Nihil sint suscipit reiciendis iste mollitia autem.', 'Vero possimus sapiente necessitatibus omnis repudiandae ullam. Voluptas aut et velit. Quas esse fugiat ab alias possimus dolor.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:20', '2024-09-07 04:15:20'),
(41, 'message', 3, 'Repellendus praesentium modi nihil odio.', 'In vitae porro eligendi perspiciatis voluptatum perferendis ex. Officia nostrum nobis eos distinctio nihil. Voluptatem quis repellat quia aut.', 0, 'http://www.hermiston.com/ipsam-fugit-iusto-reiciendis-quas-fuga-in-amet-quia.html', 'info-circle', 'high', '2024-09-07 04:15:20', '2024-09-07 04:15:20'),
(42, 'reminder', 8, 'Ut quasi sint adipisci.', 'Harum dolores possimus ut qui sed omnis tenetur. At eum et laborum sit labore tempora minima fuga. Quia est et expedita accusantium consequatur magnam. Laudantium est voluptate autem et et ratione similique.', 0, 'https://www.balistreri.com/ea-nemo-nihil-repellat-odit', 'bell', 'high', '2024-09-07 04:15:20', '2024-09-07 04:15:20'),
(43, 'message', 11, 'Consectetur repellat quia vero rem dicta quaerat.', 'Veritatis nam error sapiente fugit. Officia molestias dolores expedita. Sint autem rem nam tempora. Reiciendis odio impedit aut nihil ipsum.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:20', '2024-09-07 04:15:20'),
(44, 'alert', 18, 'Ut consequatur possimus dicta eum reiciendis.', 'Possimus rerum ratione id eveniet. Debitis voluptates illum aut voluptas quis ad voluptatem. Harum laudantium sit non exercitationem quis molestiae. Sunt vitae molestias at aspernatur cumque.', 0, 'http://hirthe.com/accusantium-libero-earum-architecto-consequatur-beatae-sed.html', 'bell', 'medium', '2024-09-07 04:15:20', '2024-09-07 04:15:20'),
(45, 'alert', 4, 'Sit et dolore numquam et.', 'Nulla quia omnis nostrum cum autem est. Rem architecto temporibus nam tempora. Sint vero laudantium voluptas fuga facilis maiores dolores dolorum. Eius modi ea iusto eaque.', 0, 'https://www.leffler.com/sint-voluptatum-ex-iure-commodi-ipsam-iure-enim', 'bell', 'high', '2024-09-07 04:15:20', '2024-09-07 04:15:20'),
(46, 'reminder', 14, 'Dolores praesentium harum qui ut ex culpa.', 'Voluptas et ea facilis. Magni cupiditate aperiam odio voluptate deleniti suscipit. Dolorem pariatur modi similique hic in.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:20', '2024-09-07 04:15:20'),
(47, 'alert', 18, 'Magnam aut sit hic.', 'Temporibus fugit voluptate non sequi nesciunt quam et. Iure et quidem ut odit omnis et excepturi voluptates. Voluptatem qui magni commodi non totam. A nisi harum voluptatem dolorem blanditiis dignissimos. Quasi distinctio fugiat optio consectetur aperiam.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:20', '2024-09-07 04:15:20'),
(48, 'alert', 14, 'Sint facere et maiores repudiandae.', 'Repellendus sunt qui distinctio amet. Laboriosam enim corrupti non pariatur est aut. Fuga error et rerum deleniti.', 0, NULL, 'bell', 'medium', '2024-09-07 04:15:20', '2024-09-07 04:15:20'),
(49, 'alert', 14, 'Est maxime explicabo quae repellat.', 'Est impedit soluta aspernatur optio ab est. Error numquam sequi aut dolore occaecati. Reiciendis voluptates qui non consequatur nisi. Qui provident magnam excepturi amet ullam modi vel placeat.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:20', '2024-09-07 04:15:20'),
(51, 'alert', 18, 'Praesentium maxime accusamus in ad.', 'Consequuntur est sed omnis. Velit libero fuga est amet sed sunt autem. Ut inventore et qui aperiam.', 0, NULL, 'envelope', 'high', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(52, 'reminder', 4, 'Iusto ipsam nam quibusdam aut dolorum temporibus.', 'Facere explicabo aliquam velit accusamus libero nihil. Est natus expedita architecto. Minima quidem sit illum minima et eum. Corporis sed est odio aut maxime voluptatem qui.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(53, 'reminder', 16, 'Non doloremque qui vero.', 'Odit aut voluptatem ea vero. Ab laudantium vel quae et est. Dolor voluptas aut esse id corrupti enim.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(54, 'message', 9, 'Quidem sed ducimus aut iste quod.', 'Exercitationem qui nisi consequatur ducimus modi dolorem. Unde labore qui beatae error harum non velit. Aut et ea voluptates.', 0, 'http://kovacek.com/aliquid-ab-sed-vel-quia-sunt-fugiat-dolorem', 'envelope', 'high', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(55, 'alert', 15, 'Non voluptatem delectus deserunt.', 'Vel debitis voluptas dolor consectetur. Illum veritatis doloribus quam est repellat excepturi. Voluptatem quidem natus deserunt magnam. Aliquid sed aut reprehenderit aspernatur est quod alias molestiae.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(57, 'alert', 10, 'Consequatur nemo voluptas optio perferendis.', 'Non ab tempore delectus aperiam aliquid enim. Neque occaecati numquam eos alias vero id. Culpa dicta qui saepe adipisci rerum. Hic beatae quibusdam ut ducimus est voluptatum eum.', 0, 'http://www.swift.net/', 'info-circle', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(58, 'message', 20, 'Debitis molestiae delectus ex repellendus.', 'Officiis quasi voluptatem rem numquam dolorum inventore. Nobis nihil minima occaecati nesciunt eaque ducimus. Tempora necessitatibus reprehenderit porro.', 0, 'http://fay.com/', 'info-circle', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(59, 'message', 3, 'Hic accusamus odio placeat.', 'Est rerum id minus dolorem aut. Numquam asperiores consequatur esse voluptas voluptatibus. Qui similique sit nesciunt reiciendis reprehenderit inventore qui. Et quo enim dolores itaque sit qui.', 0, 'http://kreiger.biz/et-rerum-eos-quasi-sit.html', 'bell', 'high', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(60, 'alert', 18, 'Debitis sed et sunt nihil.', 'Tenetur sed quia commodi velit assumenda ipsam. Aut asperiores odit ipsum animi quo aperiam itaque. Vel maiores odio vel in dolores dicta rem. Qui accusamus praesentium quasi eum nisi aspernatur sed.', 0, 'http://www.russel.com/ut-minus-maiores-ut-quae-autem-possimus-consequatur', 'info-circle', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(61, 'message', 5, 'Quam dignissimos hic laboriosam et quaerat voluptas.', 'Aut tempore ut saepe qui tempore et. Facilis earum eligendi iste magni repellendus accusantium. Consectetur esse iste mollitia veniam. Quis repellat nostrum temporibus est cum sunt.', 0, 'http://www.conroy.com/', 'info-circle', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(62, 'alert', 6, 'Alias mollitia aliquam explicabo.', 'Eveniet voluptatibus voluptatem labore provident reprehenderit et rerum. Quia voluptatibus a voluptas quo nesciunt sed. Tempore adipisci corrupti eius quibusdam vel sapiente sequi. Laboriosam totam explicabo iure esse omnis quod optio dolorem.', 0, 'http://www.veum.com/ut-ratione-architecto-est-soluta-aut-eos-est', 'bell', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(63, 'alert', 14, 'Officia beatae dolorum maiores quo ea.', 'Vel aut rerum et est sit quasi. Excepturi nihil unde nulla maxime ullam. Quia qui et veniam quo vel.', 0, 'http://www.keeling.com/assumenda-ipsum-voluptatem-sequi-enim.html', 'info-circle', 'high', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(64, 'alert', 15, 'Odit qui a consectetur.', 'Quo asperiores omnis a molestiae. Reiciendis ut et consequatur consequuntur vero. Nam voluptate nisi amet ut. Tempore consequatur vero quam odit et sapiente ut voluptas.', 0, 'http://www.pagac.com/alias-ut-nostrum-blanditiis-illum-et-aut-quam', 'bell', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(65, 'reminder', 3, 'Aut aut architecto consequatur.', 'Quod alias et vel ratione rem animi. Et aut tempora repellat itaque. Placeat asperiores praesentium provident tenetur cum rerum qui.', 0, 'http://mueller.com/deserunt-qui-iure-optio-quo-labore.html', 'bell', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(66, 'message', 7, 'Tenetur et voluptatem quas et.', 'Hic libero minima est nobis. Qui et excepturi repellat reiciendis unde qui. Esse eius quibusdam harum aspernatur voluptas et. Pariatur in est consequuntur ut.', 0, 'http://simonis.com/non-quas-animi-hic-unde-assumenda.html', 'envelope', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(67, 'reminder', 9, 'Facere at sunt unde ut.', 'Voluptatem odit autem nisi laboriosam. Nemo perspiciatis velit eveniet ducimus voluptate. Et aut sequi et perspiciatis veniam. Magnam nihil molestiae nihil et. Qui quam saepe eaque inventore saepe nam iusto.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(68, 'reminder', 11, 'Cupiditate illum corporis earum natus similique inventore.', 'Necessitatibus velit provident beatae. Nihil id molestiae eos provident dolores sunt tempore. Nostrum laborum vel consequatur vel quo sequi quam. Vero sed sed aliquid.', 0, 'https://www.kohler.info/quae-repellat-nihil-quos-ut', 'bell', 'high', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(69, 'reminder', 2, 'Quia eius recusandae repellendus odit.', 'Magni dolorem consequatur non dolore et. Veritatis assumenda consectetur illum libero sequi officiis aut. Accusamus aut et aut inventore sit sint.', 0, 'http://raynor.com/ad-aliquam-facilis-vel-possimus-excepturi.html', 'envelope', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(70, 'message', 5, 'Voluptas eos sit sint aut.', 'Aliquid quaerat fugiat ipsam molestiae illum error dolorem. Voluptatum adipisci corporis sed aut eius. Aut non sed expedita voluptatibus velit doloremque. Consequatur impedit sit ratione cum.', 0, 'http://www.tillman.com/', 'info-circle', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(71, 'reminder', 7, 'Voluptas quam ut corrupti.', 'Quidem laudantium tempore sunt ea. Odio porro temporibus et id.', 0, 'https://zemlak.net/sequi-qui-dolores-sed.html', 'envelope', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(72, 'alert', 18, 'Aspernatur ut labore pariatur rerum alias magni.', 'Unde qui sit dolor alias tempore quidem. Deleniti quidem ad iste corporis quo dolorem. Aperiam velit adipisci repudiandae in eligendi. Et modi quae dolores ea.', 0, 'http://johns.com/qui-nulla-debitis-consequuntur-officia-amet-rerum', 'bell', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(73, 'reminder', 20, 'Nam et ab est.', 'Rem nostrum cum recusandae eaque. Dolor deleniti quis unde mollitia vitae. Dolorem eveniet aut nihil maiores ea.', 0, 'http://www.rosenbaum.info/', 'bell', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(74, 'message', 2, 'Rem autem tempore aperiam qui aperiam eum.', 'Nihil in totam voluptatem quasi aliquam provident autem est. Molestiae aut cumque ut exercitationem. Optio sequi et doloremque.', 0, NULL, 'envelope', 'high', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(75, 'message', 13, 'Vitae nobis iste itaque.', 'Laboriosam est quis et voluptas dolore. Doloremque qui voluptate facilis odio. Et magni odit voluptate enim sed. Laborum eum porro laborum molestias consequatur itaque quas.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(76, 'reminder', 5, 'Sunt est perspiciatis aut quae ut ea.', 'Autem molestiae et aut ipsum sed. Unde repudiandae perferendis ipsam ea dolor id deleniti. Ut qui et quia nobis eum.', 0, NULL, 'bell', 'low', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(77, 'alert', 5, 'Explicabo minus perferendis inventore eum.', 'Pariatur ut hic ullam enim nesciunt. Aperiam sapiente voluptas sed optio maxime inventore. Quos aspernatur atque accusantium voluptatum iure. Illo nihil omnis animi magnam quia. Tempore aut aut dolore ipsum est culpa rerum.', 0, NULL, 'bell', 'low', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(78, 'alert', 10, 'Consequatur unde et tenetur exercitationem eaque cumque.', 'Illum ea porro ut amet tenetur. Est consequuntur dignissimos aut et est recusandae eaque. Dolor eum quos animi voluptas ipsum corporis voluptatibus. Consequatur distinctio hic corrupti culpa voluptatem ut.', 0, 'http://hartmann.com/', 'info-circle', 'low', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(79, 'reminder', 12, 'Aut modi rerum in sint.', 'Magnam et inventore nemo non voluptatem. Id velit voluptatem ipsam consequatur qui alias natus. Magnam fugiat modi aliquid quis unde nemo. Quae atque enim consequuntur fugit.', 0, 'http://reynolds.biz/', 'info-circle', 'medium', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(80, 'message', 20, 'Dolores laborum et rerum molestiae.', 'Et occaecati officiis molestiae nisi. Optio iste odit deleniti consequuntur consequatur et. Est sit architecto exercitationem. Impedit porro unde cupiditate similique quos est.', 0, NULL, 'bell', 'high', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(81, 'alert', 10, 'Quisquam sint consequatur repudiandae.', 'Porro eveniet quo unde nisi quaerat possimus. Voluptas temporibus magni et voluptatem. Sed id consequatur accusamus eius eveniet.', 0, NULL, 'bell', 'medium', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(82, 'reminder', 6, 'Iusto odio perferendis et quia quaerat culpa.', 'Debitis mollitia odio praesentium temporibus et. Et natus doloremque magni officia quisquam neque deleniti quod. Minus dolorem nihil at fugit. Amet neque eos sunt est reiciendis.', 0, 'http://trantow.com/', 'info-circle', 'high', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(83, 'message', 6, 'Harum nemo ipsum consequatur.', 'Adipisci rerum laudantium pariatur ea. Culpa sunt laborum nihil delectus et. Magnam voluptatem officiis placeat quo qui. At necessitatibus impedit magnam.', 0, NULL, 'bell', 'low', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(84, 'reminder', 3, 'Doloribus est voluptas sapiente.', 'Autem id dolore veritatis qui reprehenderit exercitationem. Voluptates dolor eveniet cupiditate minima delectus ut et est. Omnis voluptas iste blanditiis rerum et.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(85, 'reminder', 16, 'Ut est necessitatibus omnis error.', 'Ut quia voluptatem impedit ipsum. Provident architecto repudiandae non harum cumque exercitationem quo voluptas. Optio aperiam omnis nam enim cum fugiat similique.', 0, 'http://www.schmitt.com/eum-non-laborum-distinctio-consequatur-sint-distinctio', 'info-circle', 'medium', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(86, 'message', 11, 'Recusandae dolores et tempora.', 'Quae suscipit eaque quo earum sunt eos voluptas. Non doloribus optio eum deleniti. Omnis nesciunt repellat beatae aut accusantium rerum eum. Vel ut nobis quibusdam enim alias.', 0, NULL, 'envelope', 'low', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(87, 'alert', 20, 'Id temporibus aspernatur inventore veritatis.', 'Et non fuga eius provident assumenda. Quas odio blanditiis est accusamus qui. Eum vel nisi iste quis minus. Omnis aliquam nam voluptates ut.', 0, 'http://www.klein.info/labore-ad-non-aut-ipsum-reprehenderit-reprehenderit-ipsam', 'envelope', 'low', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(88, 'reminder', 5, 'Voluptatibus consequatur consequatur et totam consequatur doloribus.', 'Iure omnis et quos consequatur hic. Illo nesciunt itaque ipsam est iure accusantium sapiente. Veritatis quidem ut omnis aliquid eos et. Omnis vel harum reiciendis occaecati.', 0, NULL, 'bell', 'medium', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(89, 'message', 15, 'Itaque voluptatem corporis quae et.', 'Expedita repudiandae minus hic vel quas voluptatem enim ad. Facere quisquam sint nihil ut sit omnis tempore nam. Aperiam laboriosam illo velit eius quo hic dicta. Odio est voluptas facilis.', 0, NULL, 'bell', 'medium', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(90, 'reminder', 16, 'At et neque ea sequi dolore praesentium.', 'Tenetur eos architecto eum ex. Qui ea non sed itaque unde aliquid.', 0, 'http://www.price.com/ea-aperiam-voluptatem-nam-enim-occaecati-autem-qui', 'bell', 'medium', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(91, 'message', 9, 'Dolorem earum nulla voluptatem.', 'Dolorem soluta pariatur omnis alias temporibus et. Est quasi omnis optio eum et. Et eum voluptatem commodi et. Commodi quam ut sed nobis non. Ratione ab rerum non quia.', 0, 'http://www.steuber.com/commodi-molestiae-et-dolores-quia-enim-voluptatem', 'bell', 'high', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(92, 'reminder', 12, 'Quam quibusdam atque id et voluptates vel.', 'Natus tempora et ut quia ratione deleniti. Dolorem laborum quia dolorum officiis qui incidunt dolorem ullam. Numquam autem praesentium architecto a aperiam quibusdam explicabo.', 0, NULL, 'envelope', 'high', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(93, 'alert', 5, 'Aspernatur quaerat alias at.', 'Non quam rerum maxime debitis. Ullam qui ipsum illo cupiditate fugiat doloremque necessitatibus veritatis. Et repellendus ullam debitis consequuntur assumenda temporibus repudiandae. Alias nemo consectetur debitis et quo.', 0, NULL, 'envelope', 'medium', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(94, 'message', 12, 'Qui explicabo dolor eos perspiciatis.', 'Quia perferendis perspiciatis illo dolores veniam recusandae pariatur. Quisquam quod sint sunt recusandae quas vero veritatis. Excepturi accusantium eaque eos.', 0, NULL, 'bell', 'high', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(95, 'alert', 14, 'Similique est ut exercitationem dolorem.', 'Pariatur veniam repellendus facilis distinctio incidunt laboriosam. Quo unde voluptate ea numquam et. Velit commodi voluptatem omnis rem at quos est.', 0, 'http://www.glover.com/tempora-et-ut-quia-ratione-earum-ullam-eos', 'bell', 'high', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(96, 'alert', 3, 'Aperiam nobis ipsum excepturi quod qui.', 'Voluptas unde recusandae ut ipsam. Odio rerum incidunt similique sed. Nobis amet neque laudantium nisi aut quibusdam.', 0, NULL, 'bell', 'low', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(97, 'reminder', 13, 'Vel reprehenderit odio sit.', 'Repudiandae et et distinctio dolor accusantium. Maxime sunt sit nostrum ut et earum. Repudiandae nemo enim itaque sapiente.', 0, NULL, 'envelope', 'low', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(98, 'message', 15, 'Qui eveniet culpa ipsum maiores.', 'Molestias ipsum porro temporibus iste ut iure. Consequuntur maxime aut ut laborum voluptates molestias.', 0, 'http://friesen.biz/nihil-maiores-fugit-qui-pariatur', 'info-circle', 'low', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(99, 'reminder', 18, 'Voluptatem consequatur modi et.', 'Assumenda quia nihil veritatis vero eos ipsum voluptatem fuga. Laborum et sint tempora eum. Earum modi suscipit tempore magnam. Aut explicabo aut ex provident enim voluptatum.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:16:00', '2024-09-07 04:16:00'),
(100, 'reminder', 17, 'Optio tempore tempore qui voluptas.', 'Odit ut dolores quis odio quos possimus. Quia odio aut dolores non possimus.', 0, 'http://murphy.info/laborum-eaque-quis-eum-sit-non-dolorem', 'bell', 'high', '2024-09-07 04:16:00', '2024-09-07 04:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `guidance_otp_accounts`
--

CREATE TABLE `guidance_otp_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `highest_possible_score_grading_sheets`
--

CREATE TABLE `highest_possible_score_grading_sheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_handle_id` int(11) DEFAULT NULL,
  `highest_possible_written_1` int(11) DEFAULT NULL,
  `highest_possible_written_2` int(11) DEFAULT NULL,
  `highest_possible_written_3` int(11) DEFAULT NULL,
  `highest_possible_written_4` int(11) DEFAULT NULL,
  `highest_possible_written_5` int(11) DEFAULT NULL,
  `highest_possible_written_6` int(11) DEFAULT NULL,
  `highest_possible_written_7` int(11) DEFAULT NULL,
  `highest_possible_written_8` int(11) DEFAULT NULL,
  `highest_possible_written_9` int(11) DEFAULT NULL,
  `highest_possible_written_10` int(11) DEFAULT NULL,
  `highest_possible_task_1` int(11) DEFAULT NULL,
  `highest_possible_task_2` int(11) DEFAULT NULL,
  `highest_possible_task_3` int(11) DEFAULT NULL,
  `highest_possible_task_4` int(11) DEFAULT NULL,
  `highest_possible_task_5` int(11) DEFAULT NULL,
  `highest_possible_task_6` int(11) DEFAULT NULL,
  `highest_possible_task_7` int(11) DEFAULT NULL,
  `highest_possible_task_8` int(11) DEFAULT NULL,
  `highest_possible_task_9` int(11) DEFAULT NULL,
  `highest_possible_task_10` int(11) DEFAULT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `history` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `position`, `user_id`, `history`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Teacher', 1, 'Create student account', 'ID Number: 818311, Name: Aldrin Caballero', '2024-08-14 02:43:19', '2024-08-14 02:43:19'),
(2, 'Teacher', 1, 'Updated user account', 'ID Number: 818311, Name: Aldrin Caballero', '2024-08-14 21:21:50', '2024-08-14 21:21:50'),
(3, 'Teacher', 1, 'Created a subject', 'Subject created: ', '2024-08-14 21:22:33', '2024-08-14 21:22:33'),
(4, 'Teacher', 1, 'Created a subject', 'Subject created: ', '2024-08-14 21:23:12', '2024-08-14 21:23:12'),
(5, 'Teacher', 1, 'Created a subject', 'Subject created: ', '2024-08-14 21:24:06', '2024-08-14 21:24:06'),
(6, 'Teacher', 1, 'Added the subject  to Aldrin Caballero\'s account', NULL, '2024-08-14 22:10:57', '2024-08-14 22:10:57'),
(7, 'Teacher', 1, 'Added the subject  to Aldrin Caballero\'s account', NULL, '2024-08-14 22:12:17', '2024-08-14 22:12:17'),
(8, 'Teacher', 1, 'Added the subject  to Aldrin Caballero\'s account', NULL, '2024-08-14 22:12:39', '2024-08-14 22:12:39'),
(9, 'Teacher', 1, 'Created a subject', 'Subject created: ', '2024-08-15 01:54:32', '2024-08-15 01:54:32'),
(10, 'Teacher', 1, 'Added the subject  to Aldrin Caballero\'s account', NULL, '2024-08-15 01:54:49', '2024-08-15 01:54:49'),
(11, 'Teacher', 1, 'Created a subject', 'Subject created: ', '2024-08-15 01:55:46', '2024-08-15 01:55:46'),
(12, 'Teacher', 1, 'Added the subject  to Aldrin Caballero\'s account', NULL, '2024-08-15 01:56:04', '2024-08-15 01:56:04'),
(13, 'Teacher', 1, 'Created a subject', 'Subject created: ', '2024-08-15 19:35:18', '2024-08-15 19:35:18'),
(14, 'Teacher', 1, 'Added the subject  to Aldrin Caballero\'s account', NULL, '2024-08-15 19:35:30', '2024-08-15 19:35:30'),
(15, 'Teacher', 1, 'Create student account', 'ID Number: 539350, Name: Jenny Rose Perez', '2024-08-22 17:58:49', '2024-08-22 17:58:49'),
(16, 'Teacher', 1, 'Added the subject  to Jenny Rose Perez\'s account', NULL, '2024-08-25 01:26:33', '2024-08-25 01:26:33'),
(17, 'Teacher', 1, 'Added the subject  to Jenny Rose Perez\'s account', NULL, '2024-08-25 01:26:38', '2024-08-25 01:26:38'),
(18, 'Teacher', 1, 'Added the subject  to Jenny Rose Perez\'s account', NULL, '2024-08-25 01:26:42', '2024-08-25 01:26:42'),
(19, 'Teacher', 1, 'Added the subject  to Jenny Rose Perez\'s account', NULL, '2024-08-25 01:26:53', '2024-08-25 01:26:53'),
(20, 'Teacher', 1, 'Added the subject  to Jenny Rose Perez\'s account', NULL, '2024-08-25 01:26:57', '2024-08-25 01:26:57'),
(21, 'Teacher', 1, 'Added the subject  to Jenny Rose Perez\'s account', NULL, '2024-08-25 01:27:02', '2024-08-25 01:27:02'),
(22, 'Admin', 1, 'Created a subject', 'Subject created: ', '2024-09-02 07:40:58', '2024-09-02 07:40:58'),
(23, 'Admin', 1, 'Created a subject', 'Subject created: ', '2024-09-02 07:42:28', '2024-09-02 07:42:28'),
(24, 'Admin', 1, 'Created a subject', 'Subject created: ', '2024-09-02 07:44:15', '2024-09-02 07:44:15'),
(25, 'Admin', 1, 'Created a subject', 'Subject created: ', '2024-09-02 07:48:06', '2024-09-02 07:48:06'),
(26, 'Admin', 1, 'Updated a subject ', 'Subject updated: ', '2024-09-02 08:10:28', '2024-09-02 08:10:28'),
(27, 'Admin', 1, 'Updated a subject ', 'Subject updated: ', '2024-09-02 08:12:38', '2024-09-02 08:12:38'),
(28, 'Admin', 1, 'Updated a subject ', 'Subject updated: ', '2024-09-02 08:13:31', '2024-09-02 08:13:31'),
(29, 'Admin', 1, 'Updated a subject ', 'Subject updated: ', '2024-09-02 08:15:26', '2024-09-02 08:15:26'),
(30, 'Admin', 1, 'Updated a subject ', 'Subject updated: ', '2024-09-02 08:16:05', '2024-09-02 08:16:05'),
(31, 'Admin', 1, 'Deleted a subject ', 'Subject deleted: ', '2024-09-02 08:16:12', '2024-09-02 08:16:12'),
(32, 'Admin', 1, 'Deleted a subject ', 'Subject deleted: ', '2024-09-02 08:19:36', '2024-09-02 08:19:36'),
(33, 'Admin', 1, 'Created a subject', 'Subject created: ', '2024-09-02 08:20:22', '2024-09-02 08:20:22'),
(34, 'Admin', 1, 'Updated a subject ', 'Subject updated: ', '2024-09-02 08:20:35', '2024-09-02 08:20:35'),
(35, 'Admin', 1, 'Deleted a subject ', 'Subject deleted: ', '2024-09-02 08:20:40', '2024-09-02 08:20:40'),
(36, 'Teacher', 1, 'Exported subject list', NULL, '2024-09-28 15:01:41', '2024-09-28 15:01:41'),
(37, 'Admin', 1, 'Update his/her account information', 'ID Number: 1919757448, Name: Lonie Grimes', '2024-10-14 15:08:41', '2024-10-14 15:08:41'),
(38, 'Teacher', 1, 'Create student account', 'ID Number: 284373, Name: James Bond', '2024-10-26 00:53:50', '2024-10-26 00:53:50'),
(39, 'Teacher', 1, 'Updated user account', 'ID Number: 818311, Name: Aldrin Caballero', '2024-10-27 02:52:20', '2024-10-27 02:52:20'),
(40, 'Teacher', 1, 'Updated user account', 'ID Number: 818311, Name: Aldrin Caballero', '2024-10-27 03:01:06', '2024-10-27 03:01:06'),
(41, 'Teacher', 1, 'Updated user account', 'ID Number: 818311, Name: Aldrin Caballero', '2024-10-27 03:01:27', '2024-10-27 03:01:27'),
(42, 'Admin', 1, 'Updated admin account', 'ID Number: 1919757448, Name: Lonie Grimes', '2024-10-27 03:17:54', '2024-10-27 03:17:54'),
(43, 'Admin', 1, 'Updated admin account', 'ID Number: 1919757448, Name: Lonie Grimes', '2024-10-27 03:18:01', '2024-10-27 03:18:01'),
(44, 'Admin', 1, 'Create admin account', 'ID Number: 8208758316, Name: James Bond', '2024-10-27 03:19:34', '2024-10-27 03:19:34'),
(45, 'Admin', 1, 'Updated admin account', 'ID Number: 1919757448, Name: Lonie Grimes', '2024-10-27 03:19:56', '2024-10-27 03:19:56'),
(46, 'Admin', 1, 'Updated guidance account', 'ID Number: 1923247534, Name: Stefanie Mohr', '2024-10-27 03:20:10', '2024-10-27 03:20:10'),
(47, 'Admin', 1, 'Updated guidance account', 'ID Number: 1923247534, Name: Stefanie Mohr', '2024-10-27 03:20:26', '2024-10-27 03:20:26'),
(48, 'Admin', 1, 'Updated user account', 'ID Number: 818311, Name: Aldrin Caballero', '2024-10-27 03:24:55', '2024-10-27 03:24:55'),
(49, 'Admin', 1, 'Update his/her profile photo', 'ID Number: 1919757448, Name: Lonie Grimes', '2024-10-27 03:25:08', '2024-10-27 03:25:08'),
(50, 'Admin', 1, 'Update his/her account information', 'ID Number: 1919757448, Name: Lonie Grimes', '2024-10-27 03:28:49', '2024-10-27 03:28:49'),
(51, 'Admin', 1, 'Update his/her account information', 'ID Number: 1919757448, Name: Lonie Grimes', '2024-10-27 03:29:53', '2024-10-27 03:29:53'),
(52, 'Teacher', 1, 'Updated user account', 'ID Number: 539350, Name: Jenny Rose Perez', '2024-11-01 01:10:23', '2024-11-01 01:10:23'),
(53, 'Teacher', 1, 'Updated user account', 'ID Number: 818311, Name: Aldrin Caballero', '2024-11-01 01:11:12', '2024-11-01 01:11:12'),
(54, 'Teacher', 1, 'Create student account', 'ID Number: 404926, Name: James Arthur', '2024-11-01 01:19:20', '2024-11-01 01:19:20'),
(55, 'Teacher', 1, 'Updated user account', 'ID Number: 404926, Name: James Arthur', '2024-11-01 01:47:07', '2024-11-01 01:47:07'),
(56, 'Admin', 1, 'Updated user account', 'ID Number: 818311, Name: Aldrin Caballero', '2024-11-01 05:16:26', '2024-11-01 05:16:26'),
(57, 'Teacher', 1, 'Created a subject', 'Subject created: ', '2024-11-01 06:11:24', '2024-11-01 06:11:24'),
(58, 'Teacher', 1, 'Added the subject  to Aldrin Caballero\'s account', NULL, '2024-11-01 06:12:11', '2024-11-01 06:12:11'),
(59, 'Teacher', 1, 'Created a subject', 'Subject created: ', '2024-11-01 06:12:39', '2024-11-01 06:12:39'),
(60, 'Teacher', 1, 'Added the subject  to Aldrin Caballero\'s account', NULL, '2024-11-01 06:17:16', '2024-11-01 06:17:16'),
(61, 'Teacher', 1, 'Deleted all selected subjects', 'Deleted ids: 29,35,36', '2024-11-02 03:19:20', '2024-11-02 03:19:20'),
(62, 'Teacher', 1, 'Create student account', 'ID Number: 555402, Name: drgdrgdgd fgdfg', '2024-11-04 07:04:22', '2024-11-04 07:04:22'),
(63, 'Teacher', 1, 'Deleted student account', 'ID Number: 555402, Name: drgdrgdgd fgdfg', '2024-11-04 07:09:14', '2024-11-04 07:09:14'),
(64, 'Teacher', 1, 'Create student account', 'ID Number: 326760, Name: John Doe', '2024-11-04 07:15:30', '2024-11-04 07:15:30'),
(65, 'Teacher', 1, 'Deleted student account', 'ID Number: 326760, Name: John Doe', '2024-11-04 07:41:53', '2024-11-04 07:41:53'),
(66, 'Teacher', 1, 'Exported class history', NULL, '2024-11-17 23:48:23', '2024-11-17 23:48:23'),
(67, 'Teacher', 1, 'Exported class history', NULL, '2024-11-17 23:49:49', '2024-11-17 23:49:49'),
(68, 'Teacher', 1, 'Exported class history', NULL, '2024-11-17 23:50:20', '2024-11-17 23:50:20'),
(69, 'Admin', 1, 'Exported admin list', NULL, '2024-11-18 04:29:17', '2024-11-18 04:29:17'),
(70, 'Admin', 1, 'Updated a subject ', 'Subject updated: ', '2024-11-18 04:37:45', '2024-11-18 04:37:45'),
(71, 'Admin', 1, 'Exported subject list', NULL, '2024-11-18 04:43:28', '2024-11-18 04:43:28'),
(72, 'Admin', 1, 'Exported subject list', NULL, '2024-11-18 04:45:08', '2024-11-18 04:45:08'),
(73, 'Admin', 1, 'Exported subject list', NULL, '2024-11-18 04:47:33', '2024-11-18 04:47:33'),
(74, 'Admin', 1, 'Exported subject list', NULL, '2024-11-18 04:48:09', '2024-11-18 04:48:09'),
(75, 'Admin', 1, 'Exported subject list', NULL, '2024-11-18 04:48:52', '2024-11-18 04:48:52'),
(76, 'Admin', 1, 'Exported subject list', NULL, '2024-11-18 04:53:30', '2024-11-18 04:53:30'),
(77, 'Admin', 1, 'Exported subject list', NULL, '2024-11-18 04:53:47', '2024-11-18 04:53:47'),
(78, 'Admin', 1, 'Exported subject list', NULL, '2024-11-18 04:56:21', '2024-11-18 04:56:21'),
(79, 'Admin', 1, 'Exported subject list', NULL, '2024-11-18 05:11:45', '2024-11-18 05:11:45'),
(80, 'Admin', 1, 'Exported subject list', NULL, '2024-11-18 05:20:05', '2024-11-18 05:20:05'),
(81, 'Admin', 1, 'Created a subject', 'Subject created: ', '2024-11-18 05:22:15', '2024-11-18 05:22:15'),
(82, 'Admin', 1, 'Updated a subject ', 'Subject updated: ', '2024-11-18 05:35:40', '2024-11-18 05:35:40'),
(83, 'Admin', 1, 'Exported subject list', NULL, '2024-11-18 05:51:45', '2024-11-18 05:51:45'),
(84, 'Admin', 1, 'Exported subject list', NULL, '2024-11-18 06:00:07', '2024-11-18 06:00:07'),
(85, 'Admin', 1, 'Deleted all selected subjects', 'Deleted ids: 31', '2024-11-18 06:05:31', '2024-11-18 06:05:31'),
(86, 'Admin', 1, 'Updated a subject ', 'Subject updated: ', '2024-11-18 06:05:50', '2024-11-18 06:05:50'),
(87, 'Admin', 1, 'Deleted a subject ', 'Subject deleted: ', '2024-11-18 06:05:57', '2024-11-18 06:05:57'),
(88, 'Admin', 1, 'Update his/her profile photo', 'ID Number: 1919757448, Name: Lonie Grimes', '2024-11-19 05:46:33', '2024-11-19 05:46:33'),
(89, 'Teacher', 1, 'Created a subject', 'Subject created: ', '2024-11-24 01:19:51', '2024-11-24 01:19:51'),
(90, 'Teacher', 1, 'Create student account', 'ID Number: 447686, Name: Aldrin Caballero', '2024-11-24 01:22:41', '2024-11-24 01:22:41'),
(91, 'Teacher', 1, 'Added the subject  to Aldrin Caballero\'s account', NULL, '2024-11-24 01:24:30', '2024-11-24 01:24:30'),
(92, 'Teacher', 1, 'Created a subject', 'Subject created: ', '2024-11-24 03:14:21', '2024-11-24 03:14:21'),
(93, 'Teacher', 1, 'Added the subject  to Aldrin Caballero\'s account', NULL, '2024-11-24 03:15:07', '2024-11-24 03:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `sender_type` varchar(255) NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_type` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `sender_type`, `receiver_id`, `receiver_type`, `id_number`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Models\\Student\\StudentAccount', 1, 'App\\Models\\Teacher\\TeacherAccount', '818311', 'eyyyy', '2024-08-14 15:25:03', '2024-08-14 15:25:03'),
(2, 1, 'App\\Models\\Teacher\\TeacherAccount', 1, 'App\\Models\\Student\\StudentAccount', '8554812056', 'kupal ka hahahaha', '2024-08-25 00:08:28', '2024-08-25 00:08:28'),
(3, 1, 'App\\Models\\Admin\\AdminAccount', 1, 'App\\Models\\Teacher\\TeacherAccount', '1919757448', 'tae', '2024-08-31 01:44:11', '2024-08-31 01:44:11'),
(4, 1, 'App\\Models\\Admin\\AdminAccount', 1, 'App\\Models\\Teacher\\TeacherAccount', '1919757448', 'gago amp', '2024-11-18 06:25:52', '2024-11-18 06:25:52'),
(5, 1, 'App\\Models\\Teacher\\TeacherAccount', 1, 'App\\Models\\Admin\\AdminAccount', '8554812056', 'hahahah', '2024-11-21 00:21:16', '2024-11-21 00:21:16'),
(6, 1, 'App\\Models\\Teacher\\TeacherAccount', 1, 'App\\Models\\Admin\\AdminAccount', '8554812056', 'taninga ka hahahha', '2024-11-21 00:21:26', '2024-11-21 00:21:26'),
(7, 1, 'App\\Models\\Teacher\\TeacherAccount', 1, 'App\\Models\\Admin\\AdminAccount', '8554812056', 'gago kaba hahahaha', '2024-11-21 00:21:32', '2024-11-21 00:21:32'),
(8, 1, 'App\\Models\\Teacher\\TeacherAccount', 1, 'App\\Models\\Student\\StudentAccount', '8554812056', 'kupalll', '2024-11-21 00:21:46', '2024-11-21 00:21:46');

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_07_09_035355_create_admin_accounts_table', 1),
(4, '2024_07_09_035427_create_teacher_accounts_table', 1),
(5, '2024_07_09_035447_create_student_accounts_table', 1),
(6, '2024_07_09_035518_create_guidance_accounts_table', 1),
(7, '2024_07_13_110545_create_subject_list_models_table', 1),
(8, '2024_07_16_094542_create_admin_otp_accounts_table', 1),
(9, '2024_07_17_054521_create_teacher_otp_accounts_table', 1),
(10, '2024_07_17_071410_create_student_otp_accounts_table', 1),
(11, '2024_07_17_071436_create_guidance_otp_accounts_table', 1),
(12, '2024_07_21_073138_create_messages_table', 1),
(13, '2024_07_24_041529_create_student_images_table', 1),
(14, '2024_07_26_024638_create_histories_table', 1),
(16, '2024_08_01_235232_create_student_handles_table', 1),
(17, '2024_08_04_030803_create_absents_table', 1),
(18, '2024_08_04_032257_create_presents_table', 1),
(20, '2024_08_08_012247_create_qr_generates_table', 1),
(21, 'z2024_07_24_074649_create_student_subjects_table', 1),
(25, '2024_08_21_232604_create_attendance_histories_table', 3),
(26, '2024_09_06_132514_create_admin_notifications_table', 4),
(27, '2024_09_06_132543_create_student_notifications_table', 4),
(28, '2024_09_06_132601_create_teacher_notifications_table', 4),
(29, '2024_09_06_132618_create_guidance_notifications_table', 4),
(30, '2024_08_14_104433_create_announcements_table', 5),
(31, '2024_10_04_132336_create_seen_announcements_table', 6),
(43, '2024_08_06_001256_create_face_scans_table', 9),
(44, '2024_11_19_105151_create_face_recognition_keys_table', 10),
(45, '2024_07_28_231217_create_teacher_grade_handles_table', 11),
(46, '2024_10_06_031626_create_grading_headers_table', 11),
(47, '2024_10_06_233213_create_highest_possible_score_grading_sheets_table', 11),
(48, '2024_10_14_090328_create_student_grades_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presents`
--

CREATE TABLE `presents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `grade_handle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presents`
--

INSERT INTO `presents` (`id`, `student_id`, `subject_id`, `teacher_id`, `grade_handle_id`, `created_at`, `updated_at`) VALUES
(2, 1, 21, 1, 1, '2024-08-17 16:42:36', '2024-08-17 16:42:36'),
(3, 1, 29, 1, 1, '2024-08-25 00:57:14', '2024-08-25 00:57:14'),
(4, 1, 21, 1, 5, '2024-11-04 05:54:11', '2024-11-04 05:54:11'),
(5, 1, 27, 1, 5, '2024-11-05 01:40:06', '2024-11-05 01:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `qr_generates`
--

CREATE TABLE `qr_generates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `qr_code_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qr_generates`
--

INSERT INTO `qr_generates` (`id`, `subject_id`, `teacher_id`, `qr_code_id`, `created_at`, `updated_at`) VALUES
(1, 21, 1, '66c1435fd91af', '2024-08-17 16:42:07', '2024-08-17 16:42:07'),
(2, 21, 4, '66c14c669407d', '2024-08-17 17:20:38', '2024-08-17 17:20:38'),
(5, 21, 1, '66c14fd99d48b', '2024-08-17 17:35:21', '2024-08-17 17:35:21'),
(6, 21, 1, '66c15003dbcad', '2024-08-17 17:36:03', '2024-08-17 17:36:03'),
(7, 21, 5, '66c150236d1d7', '2024-08-17 17:36:35', '2024-08-17 17:36:35'),
(26, 29, 1, '66caeee3d1a14', '2024-08-25 00:44:19', '2024-08-25 00:44:19'),
(27, 29, 1, '66caeee50cfc6', '2024-08-25 00:44:21', '2024-08-25 00:44:21'),
(28, 29, 1, '66caeee608f8e', '2024-08-25 00:44:22', '2024-08-25 00:44:22'),
(29, 29, 1, '66caeee712832', '2024-08-25 00:44:23', '2024-08-25 00:44:23'),
(30, 29, 1, '66caeee81147a', '2024-08-25 00:44:24', '2024-08-25 00:44:24'),
(31, 29, 1, '66caeee933cf9', '2024-08-25 00:44:25', '2024-08-25 00:44:25'),
(32, 29, 1, '66caeeea4047a', '2024-08-25 00:44:26', '2024-08-25 00:44:26'),
(33, 29, 1, '66caeeeb6fe58', '2024-08-25 00:44:27', '2024-08-25 00:44:27'),
(34, 29, 1, '66caeeec85f3c', '2024-08-25 00:44:28', '2024-08-25 00:44:28'),
(35, 29, 1, '66caeeedcf7f3', '2024-08-25 00:44:29', '2024-08-25 00:44:29'),
(36, 29, 1, '66caf0d1daa7d', '2024-08-25 00:52:33', '2024-08-25 00:52:33'),
(37, 29, 1, '66caf0f670ed0', '2024-08-25 00:53:10', '2024-08-25 00:53:10'),
(38, 29, 1, '66caf144990b4', '2024-08-25 00:54:28', '2024-08-25 00:54:28'),
(39, 29, 1, '66caf1b0e060a', '2024-08-25 00:56:16', '2024-08-25 00:56:16'),
(40, 29, 1, '66caf4c182d59', '2024-08-25 01:09:21', '2024-08-25 01:09:21'),
(41, 21, 1, '66f156ab9564c', '2024-09-23 03:53:15', '2024-09-23 03:53:15'),
(42, 21, 1, '66f15f522d5ea', '2024-09-23 04:30:10', '2024-09-23 04:30:10'),
(43, 21, 1, '66f160695bd4a', '2024-09-23 04:34:49', '2024-09-23 04:34:49'),
(44, 21, 1, '66f162956069f', '2024-09-23 04:44:05', '2024-09-23 04:44:05'),
(45, 21, 1, '66f162daba193', '2024-09-23 04:45:14', '2024-09-23 04:45:14'),
(46, 21, 1, '66f1631a7c95e', '2024-09-23 04:46:18', '2024-09-23 04:46:18'),
(47, 21, 1, '66f16344dd941', '2024-09-23 04:47:00', '2024-09-23 04:47:00'),
(48, 21, 1, '66f16365da981', '2024-09-23 04:47:33', '2024-09-23 04:47:33'),
(49, 21, 1, '66f163a73ec96', '2024-09-23 04:48:39', '2024-09-23 04:48:39'),
(50, 21, 1, '66f163c057336', '2024-09-23 04:49:04', '2024-09-23 04:49:04'),
(51, 21, 1, '66f1690759bc4', '2024-09-23 05:11:35', '2024-09-23 05:11:35'),
(52, 21, 1, '66f16b05d1efd', '2024-09-23 05:20:05', '2024-09-23 05:20:05'),
(53, 21, 1, '66f16c29264ce', '2024-09-23 05:24:57', '2024-09-23 05:24:57'),
(54, 21, 1, '66f296f88dad9', '2024-09-24 02:39:52', '2024-09-24 02:39:52'),
(55, 21, 1, '66f2970d360ea', '2024-09-24 02:40:13', '2024-09-24 02:40:13'),
(56, 21, 1, '66f298647128e', '2024-09-24 02:45:56', '2024-09-24 02:45:56'),
(57, 21, 1, '66f73c5cba573', '2024-09-27 15:14:36', '2024-09-27 15:14:36'),
(58, 21, 1, '66f748e794520', '2024-09-27 16:08:07', '2024-09-27 16:08:07'),
(59, 21, 1, '66f749b28b8e1', '2024-09-27 16:11:30', '2024-09-27 16:11:30'),
(60, 21, 1, '66f749bbcd582', '2024-09-27 16:11:39', '2024-09-27 16:11:39'),
(61, 21, 1, '66f749e456f28', '2024-09-27 16:12:20', '2024-09-27 16:12:20'),
(62, 21, 1, '66f74abad7a59', '2024-09-27 16:15:54', '2024-09-27 16:15:54'),
(63, 21, 1, '66f74aed88dea', '2024-09-27 16:16:45', '2024-09-27 16:16:45'),
(64, 21, 1, '66f74cda2d469', '2024-09-27 16:24:58', '2024-09-27 16:24:58'),
(65, 21, 1, '66f74dd60715c', '2024-09-27 16:29:10', '2024-09-27 16:29:10'),
(66, 21, 1, '66f74ddb23945', '2024-09-27 16:29:15', '2024-09-27 16:29:15'),
(67, 21, 1, '66f74de017013', '2024-09-27 16:29:20', '2024-09-27 16:29:20'),
(68, 21, 1, '66f74e0aa68b1', '2024-09-27 16:30:02', '2024-09-27 16:30:02'),
(69, 21, 1, '66f74e0e642d1', '2024-09-27 16:30:06', '2024-09-27 16:30:06'),
(70, 21, 1, '66f74e1367e9e', '2024-09-27 16:30:11', '2024-09-27 16:30:11'),
(71, 21, 1, '66f74e177b76b', '2024-09-27 16:30:15', '2024-09-27 16:30:15'),
(72, 21, 1, '66f74e1bc7c29', '2024-09-27 16:30:19', '2024-09-27 16:30:19'),
(73, 21, 1, '66f74e2c82f9e', '2024-09-27 16:30:36', '2024-09-27 16:30:36'),
(74, 21, 1, '66f74e472ab94', '2024-09-27 16:31:03', '2024-09-27 16:31:03'),
(75, 21, 1, '66f75521b9bc7', '2024-09-27 17:00:18', '2024-09-27 17:00:18'),
(76, 21, 1, '66f75b4f70b39', '2024-09-27 17:26:39', '2024-09-27 17:26:39'),
(77, 21, 1, '66f75b536f0c6', '2024-09-27 17:26:43', '2024-09-27 17:26:43'),
(78, 21, 1, '66f75b6209c7c', '2024-09-27 17:26:58', '2024-09-27 17:26:58'),
(79, 21, 1, '66f75b646b638', '2024-09-27 17:27:00', '2024-09-27 17:27:00'),
(80, 21, 1, '66f75b6d70778', '2024-09-27 17:27:09', '2024-09-27 17:27:09'),
(81, 21, 1, '66f75b7087b08', '2024-09-27 17:27:12', '2024-09-27 17:27:12'),
(82, 21, 1, '66f75b7350900', '2024-09-27 17:27:15', '2024-09-27 17:27:15'),
(83, 21, 1, '66f75c899be1b', '2024-09-27 17:31:53', '2024-09-27 17:31:53'),
(84, 21, 1, '66f75e0a4eba9', '2024-09-27 17:38:18', '2024-09-27 17:38:18'),
(85, 21, 1, '66f75e0d6ae2d', '2024-09-27 17:38:21', '2024-09-27 17:38:21'),
(86, 21, 1, '66f75e11ddb01', '2024-09-27 17:38:26', '2024-09-27 17:38:26'),
(87, 21, 1, '66f75e145ecb9', '2024-09-27 17:38:28', '2024-09-27 17:38:28'),
(88, 21, 1, '66f75e16502d2', '2024-09-27 17:38:30', '2024-09-27 17:38:30'),
(89, 21, 1, '66f75e1a57c4f', '2024-09-27 17:38:34', '2024-09-27 17:38:34'),
(90, 21, 1, '66f75e1cc97e5', '2024-09-27 17:38:36', '2024-09-27 17:38:36'),
(91, 21, 1, '66f75e1f584a9', '2024-09-27 17:38:39', '2024-09-27 17:38:39'),
(92, 21, 1, '66f75e4dbfa50', '2024-09-27 17:39:25', '2024-09-27 17:39:25'),
(93, 21, 1, '66f75e515808b', '2024-09-27 17:39:29', '2024-09-27 17:39:29'),
(94, 21, 1, '66f75e5760272', '2024-09-27 17:39:35', '2024-09-27 17:39:35'),
(95, 21, 1, '66f75e5da6a48', '2024-09-27 17:39:41', '2024-09-27 17:39:41'),
(96, 21, 1, '66f75e628c0e3', '2024-09-27 17:39:46', '2024-09-27 17:39:46'),
(97, 21, 1, '66f75fec65225', '2024-09-27 17:46:20', '2024-09-27 17:46:20'),
(98, 21, 1, '66f75fef4ec7d', '2024-09-27 17:46:23', '2024-09-27 17:46:23'),
(99, 21, 1, '66f75ff3613ad', '2024-09-27 17:46:27', '2024-09-27 17:46:27'),
(100, 21, 1, '66f75ff6699e9', '2024-09-27 17:46:30', '2024-09-27 17:46:30'),
(101, 21, 1, '66f7600648c79', '2024-09-27 17:46:46', '2024-09-27 17:46:46'),
(102, 21, 1, '66f7600a67f70', '2024-09-27 17:46:50', '2024-09-27 17:46:50'),
(103, 21, 1, '66f7601e6c29a', '2024-09-27 17:47:10', '2024-09-27 17:47:10'),
(104, 21, 1, '66f760426dc68', '2024-09-27 17:47:46', '2024-09-27 17:47:46'),
(105, 21, 1, '66f76046651ad', '2024-09-27 17:47:50', '2024-09-27 17:47:50'),
(106, 21, 1, '66f7604f778d1', '2024-09-27 17:47:59', '2024-09-27 17:47:59'),
(107, 21, 1, '66f76052a32e0', '2024-09-27 17:48:02', '2024-09-27 17:48:02'),
(108, 21, 1, '66f7605b650b4', '2024-09-27 17:48:11', '2024-09-27 17:48:11'),
(109, 21, 1, '66f7605c15f18', '2024-09-27 17:48:12', '2024-09-27 17:48:12'),
(110, 21, 1, '66f7606891f54', '2024-09-27 17:48:24', '2024-09-27 17:48:24'),
(111, 21, 1, '66f7606db0084', '2024-09-27 17:48:29', '2024-09-27 17:48:29'),
(112, 21, 1, '66f76070e59f2', '2024-09-27 17:48:32', '2024-09-27 17:48:32'),
(113, 21, 1, '66f760b554163', '2024-09-27 17:49:41', '2024-09-27 17:49:41'),
(114, 21, 1, '66f760b956f1f', '2024-09-27 17:49:45', '2024-09-27 17:49:45'),
(115, 21, 1, '66f760c219569', '2024-09-27 17:49:54', '2024-09-27 17:49:54'),
(116, 21, 1, '66f760c5638f8', '2024-09-27 17:49:57', '2024-09-27 17:49:57'),
(117, 21, 1, '66f760c8a6883', '2024-09-27 17:50:00', '2024-09-27 17:50:00'),
(118, 21, 1, '66f760c97d2e1', '2024-09-27 17:50:01', '2024-09-27 17:50:01'),
(119, 21, 1, '66f760cf90af7', '2024-09-27 17:50:07', '2024-09-27 17:50:07'),
(120, 21, 1, '66f760d3601c2', '2024-09-27 17:50:11', '2024-09-27 17:50:11'),
(121, 21, 1, '66f760db5c37b', '2024-09-27 17:50:19', '2024-09-27 17:50:19'),
(122, 21, 1, '66f760e06cd1b', '2024-09-27 17:50:24', '2024-09-27 17:50:24'),
(123, 21, 1, '66f760e253366', '2024-09-27 17:50:26', '2024-09-27 17:50:26'),
(124, 21, 1, '66f760e77824a', '2024-09-27 17:50:31', '2024-09-27 17:50:31'),
(125, 21, 1, '66f760ffb1aba', '2024-09-27 17:50:55', '2024-09-27 17:50:55'),
(126, 21, 1, '66f761059ff0f', '2024-09-27 17:51:01', '2024-09-27 17:51:01'),
(127, 21, 1, '66f76109662e9', '2024-09-27 17:51:05', '2024-09-27 17:51:05'),
(128, 21, 1, '66f7610e64ccc', '2024-09-27 17:51:10', '2024-09-27 17:51:10'),
(129, 21, 1, '66f761184ebaf', '2024-09-27 17:51:20', '2024-09-27 17:51:20'),
(130, 21, 1, '66f7611b681cf', '2024-09-27 17:51:23', '2024-09-27 17:51:23'),
(131, 21, 1, '66f7611e60003', '2024-09-27 17:51:26', '2024-09-27 17:51:26'),
(132, 21, 1, '66f7612e83d36', '2024-09-27 17:51:42', '2024-09-27 17:51:42'),
(133, 21, 1, '66f7613555bb6', '2024-09-27 17:51:49', '2024-09-27 17:51:49'),
(134, 21, 1, '66f76142dd6b0', '2024-09-27 17:52:02', '2024-09-27 17:52:02'),
(135, 21, 1, '66f761478b5bd', '2024-09-27 17:52:07', '2024-09-27 17:52:07'),
(136, 21, 1, '66f761564cbbc', '2024-09-27 17:52:22', '2024-09-27 17:52:22'),
(137, 21, 1, '66f76160a1018', '2024-09-27 17:52:32', '2024-09-27 17:52:32'),
(138, 21, 1, '66f76173ae6f4', '2024-09-27 17:52:51', '2024-09-27 17:52:51'),
(139, 21, 1, '66f761765bb80', '2024-09-27 17:52:54', '2024-09-27 17:52:54'),
(140, 21, 1, '66f7617a847c8', '2024-09-27 17:52:58', '2024-09-27 17:52:58'),
(141, 21, 1, '66f7617fdafd8', '2024-09-27 17:53:03', '2024-09-27 17:53:03'),
(142, 21, 1, '66f76180bf0e6', '2024-09-27 17:53:04', '2024-09-27 17:53:04'),
(143, 21, 1, '66f76183251df', '2024-09-27 17:53:07', '2024-09-27 17:53:07'),
(144, 21, 1, '66f76187e8c1f', '2024-09-27 17:53:11', '2024-09-27 17:53:11'),
(145, 21, 1, '66f761a97014f', '2024-09-27 17:53:45', '2024-09-27 17:53:45'),
(146, 21, 1, '66f7bc7d69183', '2024-09-28 00:21:17', '2024-09-28 00:21:17'),
(147, 21, 1, '66f7bc911af71', '2024-09-28 00:21:37', '2024-09-28 00:21:37'),
(148, 21, 1, '66f7bcab17df1', '2024-09-28 00:22:03', '2024-09-28 00:22:03'),
(149, 21, 1, '66f7bd12b5c73', '2024-09-28 00:23:46', '2024-09-28 00:23:46'),
(150, 21, 1, '66f7bd17781d7', '2024-09-28 00:23:51', '2024-09-28 00:23:51'),
(151, 21, 1, '66f7bd22b41e4', '2024-09-28 00:24:02', '2024-09-28 00:24:02'),
(152, 21, 1, '66f7bd26e9583', '2024-09-28 00:24:07', '2024-09-28 00:24:07'),
(153, 21, 1, '66f7bd29786d8', '2024-09-28 00:24:09', '2024-09-28 00:24:09'),
(154, 21, 1, '66f7bd3473d48', '2024-09-28 00:24:20', '2024-09-28 00:24:20'),
(155, 21, 1, '66f7bd398984f', '2024-09-28 00:24:25', '2024-09-28 00:24:25'),
(156, 21, 1, '66f7bd4595072', '2024-09-28 00:24:37', '2024-09-28 00:24:37'),
(157, 21, 1, '66f7bd4c77691', '2024-09-28 00:24:44', '2024-09-28 00:24:44'),
(158, 21, 1, '66f7bd716f3d5', '2024-09-28 00:25:21', '2024-09-28 00:25:21'),
(159, 21, 1, '66f7bd7783a5f', '2024-09-28 00:25:27', '2024-09-28 00:25:27'),
(160, 21, 1, '66f7bd9c1d116', '2024-09-28 00:26:04', '2024-09-28 00:26:04'),
(161, 21, 1, '66f7bda217643', '2024-09-28 00:26:10', '2024-09-28 00:26:10'),
(162, 21, 1, '66f7bda61fa29', '2024-09-28 00:26:14', '2024-09-28 00:26:14'),
(163, 21, 1, '66f7bdaa78dba', '2024-09-28 00:26:18', '2024-09-28 00:26:18'),
(164, 21, 1, '66f7bdadd6d41', '2024-09-28 00:26:21', '2024-09-28 00:26:21'),
(165, 21, 1, '66f7bdb57ae70', '2024-09-28 00:26:29', '2024-09-28 00:26:29'),
(166, 22, 1, '66f7bdbd17c5b', '2024-09-28 00:26:37', '2024-09-28 00:26:37'),
(167, 22, 1, '66f7c02bc1816', '2024-09-28 00:36:59', '2024-09-28 00:36:59'),
(168, 22, 1, '66f7c10916574', '2024-09-28 00:40:41', '2024-09-28 00:40:41'),
(169, 22, 1, '66f7c110944c7', '2024-09-28 00:40:48', '2024-09-28 00:40:48'),
(170, 22, 1, '66f7c11574c19', '2024-09-28 00:40:53', '2024-09-28 00:40:53'),
(171, 22, 1, '66f7c119a217e', '2024-09-28 00:40:57', '2024-09-28 00:40:57'),
(172, 22, 1, '66f7c140cf858', '2024-09-28 00:41:36', '2024-09-28 00:41:36'),
(173, 22, 1, '66f7c14bedb2e', '2024-09-28 00:41:48', '2024-09-28 00:41:48'),
(174, 22, 1, '66f7c154ec231', '2024-09-28 00:41:56', '2024-09-28 00:41:56'),
(175, 22, 1, '66f7c16d5f31e', '2024-09-28 00:42:21', '2024-09-28 00:42:21'),
(176, 22, 1, '66f7c1787f87d', '2024-09-28 00:42:32', '2024-09-28 00:42:32'),
(177, 22, 1, '66f7c1819b37d', '2024-09-28 00:42:41', '2024-09-28 00:42:41'),
(178, 22, 1, '66f7c19ab3a9d', '2024-09-28 00:43:06', '2024-09-28 00:43:06'),
(179, 22, 1, '66f7c1a5c6f66', '2024-09-28 00:43:17', '2024-09-28 00:43:17'),
(180, 22, 1, '66f7c1bd76558', '2024-09-28 00:43:41', '2024-09-28 00:43:41'),
(181, 22, 1, '66f7c1d38c2b3', '2024-09-28 00:44:03', '2024-09-28 00:44:03'),
(182, 22, 1, '66f7c27035002', '2024-09-28 00:46:40', '2024-09-28 00:46:40'),
(183, 22, 1, '66f7c2b619c84', '2024-09-28 00:47:50', '2024-09-28 00:47:50'),
(184, 22, 1, '66f7c2b9e91c4', '2024-09-28 00:47:53', '2024-09-28 00:47:53'),
(185, 22, 1, '66f7c2bb698e4', '2024-09-28 00:47:55', '2024-09-28 00:47:55'),
(186, 22, 1, '66f7c2bc5da84', '2024-09-28 00:47:56', '2024-09-28 00:47:56'),
(187, 22, 1, '66f7c2c493533', '2024-09-28 00:48:04', '2024-09-28 00:48:04'),
(188, 22, 1, '66f7c34d3f8cb', '2024-09-28 00:50:21', '2024-09-28 00:50:21'),
(189, 22, 1, '66f7c35083496', '2024-09-28 00:50:24', '2024-09-28 00:50:24'),
(190, 22, 1, '66f7c3597619a', '2024-09-28 00:50:33', '2024-09-28 00:50:33'),
(191, 22, 1, '66f7c35c8c3cb', '2024-09-28 00:50:36', '2024-09-28 00:50:36'),
(192, 22, 1, '66f7c3639a9eb', '2024-09-28 00:50:43', '2024-09-28 00:50:43'),
(193, 22, 1, '66f7c3677d224', '2024-09-28 00:50:47', '2024-09-28 00:50:47'),
(194, 22, 1, '66f7c3f22167a', '2024-09-28 00:53:06', '2024-09-28 00:53:06'),
(195, 22, 1, '66f7c3fd7f975', '2024-09-28 00:53:17', '2024-09-28 00:53:17'),
(196, 22, 1, '66f7c4641bd3f', '2024-09-28 00:55:00', '2024-09-28 00:55:00'),
(197, 22, 1, '66f7c481b65fe', '2024-09-28 00:55:29', '2024-09-28 00:55:29'),
(198, 22, 1, '66f7c4846dc68', '2024-09-28 00:55:32', '2024-09-28 00:55:32'),
(199, 22, 1, '66f7c4896d8b5', '2024-09-28 00:55:37', '2024-09-28 00:55:37'),
(200, 22, 1, '66f7c48f77d35', '2024-09-28 00:55:43', '2024-09-28 00:55:43'),
(201, 22, 1, '66f7c49389070', '2024-09-28 00:55:47', '2024-09-28 00:55:47'),
(202, 22, 1, '66f7c4c98f2e3', '2024-09-28 00:56:41', '2024-09-28 00:56:41'),
(203, 22, 1, '66f7c4feccef7', '2024-09-28 00:57:34', '2024-09-28 00:57:34'),
(204, 22, 1, '66f7c8d38c70c', '2024-09-28 01:13:55', '2024-09-28 01:13:55'),
(205, 22, 1, '66f7c8dd1a22c', '2024-09-28 01:14:05', '2024-09-28 01:14:05'),
(206, 22, 1, '66f7c8dd8e036', '2024-09-28 01:14:05', '2024-09-28 01:14:05'),
(207, 22, 1, '66f7c931e5102', '2024-09-28 01:15:29', '2024-09-28 01:15:29'),
(208, 22, 1, '66f7c9424f3e5', '2024-09-28 01:15:46', '2024-09-28 01:15:46'),
(209, 22, 1, '66f7c97a91eab', '2024-09-28 01:16:42', '2024-09-28 01:16:42'),
(210, 22, 1, '66f7c99390970', '2024-09-28 01:17:07', '2024-09-28 01:17:07'),
(211, 22, 1, '66f7c99784cad', '2024-09-28 01:17:11', '2024-09-28 01:17:11'),
(212, 22, 1, '66f7c99c7dea8', '2024-09-28 01:17:16', '2024-09-28 01:17:16'),
(213, 22, 1, '66f7c9a275bf4', '2024-09-28 01:17:22', '2024-09-28 01:17:22'),
(214, 22, 1, '66f7d473818e4', '2024-09-28 02:03:31', '2024-09-28 02:03:31'),
(215, 22, 1, '66f7d47be7644', '2024-09-28 02:03:39', '2024-09-28 02:03:39'),
(216, 22, 1, '66f7d59196cca', '2024-09-28 02:08:17', '2024-09-28 02:08:17'),
(217, 22, 1, '66f7d59571efd', '2024-09-28 02:08:21', '2024-09-28 02:08:21'),
(218, 22, 1, '66f7d5a29cd64', '2024-09-28 02:08:34', '2024-09-28 02:08:34'),
(219, 22, 1, '66f7d5a65b691', '2024-09-28 02:08:38', '2024-09-28 02:08:38'),
(220, 22, 1, '66f7d5dd84815', '2024-09-28 02:09:33', '2024-09-28 02:09:33'),
(221, 22, 1, '66f7d5e26fb44', '2024-09-28 02:09:38', '2024-09-28 02:09:38'),
(222, 22, 1, '66f7d5f0ec776', '2024-09-28 02:09:52', '2024-09-28 02:09:52'),
(223, 22, 1, '66f7d5fae1fdb', '2024-09-28 02:10:02', '2024-09-28 02:10:02'),
(224, 22, 1, '66f7d5fbc0e71', '2024-09-28 02:10:03', '2024-09-28 02:10:03'),
(225, 22, 1, '66f7d6051eb67', '2024-09-28 02:10:13', '2024-09-28 02:10:13'),
(226, 22, 1, '66f7d638ea354', '2024-09-28 02:11:04', '2024-09-28 02:11:04'),
(227, 21, 1, '672860ee8ea4e', '2024-11-04 05:51:42', '2024-11-04 05:51:42'),
(228, 21, 1, '672860f20a990', '2024-11-04 05:51:46', '2024-11-04 05:51:46'),
(229, 21, 1, '6728619008032', '2024-11-04 05:54:24', '2024-11-04 05:54:24'),
(230, 21, 1, '67286288eeebb', '2024-11-04 05:58:33', '2024-11-04 05:58:33'),
(231, 21, 1, '6728628d98392', '2024-11-04 05:58:37', '2024-11-04 05:58:37'),
(232, 21, 1, '67286296e8612', '2024-11-04 05:58:47', '2024-11-04 05:58:47'),
(233, 21, 1, '6728633f37495', '2024-11-04 06:01:35', '2024-11-04 06:01:35'),
(234, 21, 1, '6728636c17058', '2024-11-04 06:02:20', '2024-11-04 06:02:20'),
(235, 21, 1, '6728663b6c477', '2024-11-04 06:14:19', '2024-11-04 06:14:19'),
(236, 21, 1, '6728666fb126a', '2024-11-04 06:15:11', '2024-11-04 06:15:11'),
(237, 21, 1, '672866721f13e', '2024-11-04 06:15:14', '2024-11-04 06:15:14'),
(238, 21, 1, '67286673e23da', '2024-11-04 06:15:15', '2024-11-04 06:15:15'),
(239, 21, 1, '67286675d2c9b', '2024-11-04 06:15:17', '2024-11-04 06:15:17'),
(240, 21, 1, '6728667e3b691', '2024-11-04 06:15:26', '2024-11-04 06:15:26'),
(241, 21, 1, '672866862e2d8', '2024-11-04 06:15:34', '2024-11-04 06:15:34'),
(242, 21, 1, '672866ae862f0', '2024-11-04 06:16:14', '2024-11-04 06:16:14'),
(243, 21, 1, '672866b530262', '2024-11-04 06:16:21', '2024-11-04 06:16:21'),
(244, 21, 1, '672866dd2028e', '2024-11-04 06:17:01', '2024-11-04 06:17:01'),
(245, 21, 1, '6728683d6646c', '2024-11-04 06:22:53', '2024-11-04 06:22:53'),
(246, 21, 1, '6728684126d51', '2024-11-04 06:22:57', '2024-11-04 06:22:57'),
(247, 21, 1, '6728699a98581', '2024-11-04 06:28:42', '2024-11-04 06:28:42'),
(248, 21, 1, '67286a4d97cc3', '2024-11-04 06:31:41', '2024-11-04 06:31:41'),
(249, 21, 1, '67286a51c0ab3', '2024-11-04 06:31:45', '2024-11-04 06:31:45'),
(250, 21, 1, '67286a5574a8b', '2024-11-04 06:31:49', '2024-11-04 06:31:49'),
(251, 21, 1, '67286ac24c95e', '2024-11-04 06:33:38', '2024-11-04 06:33:38'),
(252, 21, 1, '67286ac308fb7', '2024-11-04 06:33:39', '2024-11-04 06:33:39'),
(253, 21, 1, '67286ad3df76c', '2024-11-04 06:33:55', '2024-11-04 06:33:55'),
(254, 21, 1, '67286ad8a27e2', '2024-11-04 06:34:00', '2024-11-04 06:34:00'),
(255, 21, 1, '67286ae5a104f', '2024-11-04 06:34:13', '2024-11-04 06:34:13'),
(256, 21, 1, '67286afb676fd', '2024-11-04 06:34:35', '2024-11-04 06:34:35'),
(257, 21, 1, '67286b6383de9', '2024-11-04 06:36:19', '2024-11-04 06:36:19'),
(258, 21, 1, '67286b69ecc79', '2024-11-04 06:36:25', '2024-11-04 06:36:25'),
(259, 21, 1, '67286b803d9d6', '2024-11-04 06:36:48', '2024-11-04 06:36:48'),
(260, 21, 1, '67286b8496cf9', '2024-11-04 06:36:52', '2024-11-04 06:36:52'),
(261, 21, 1, '67286b956e386', '2024-11-04 06:37:09', '2024-11-04 06:37:09'),
(262, 21, 1, '67286ba1482db', '2024-11-04 06:37:21', '2024-11-04 06:37:21'),
(263, 21, 1, '67286ba990d82', '2024-11-04 06:37:29', '2024-11-04 06:37:29'),
(264, 21, 1, '67286bb210161', '2024-11-04 06:37:38', '2024-11-04 06:37:38'),
(265, 21, 1, '67286bf2bae89', '2024-11-04 06:38:42', '2024-11-04 06:38:42'),
(266, 21, 1, '67286c3d88fe8', '2024-11-04 06:39:57', '2024-11-04 06:39:57'),
(267, 21, 1, '67286c45b5346', '2024-11-04 06:40:05', '2024-11-04 06:40:05'),
(268, 21, 1, '67286d495da75', '2024-11-04 06:44:25', '2024-11-04 06:44:25'),
(269, 21, 1, '67286d61abd59', '2024-11-04 06:44:49', '2024-11-04 06:44:49'),
(270, 21, 1, '67286d6266573', '2024-11-04 06:44:50', '2024-11-04 06:44:50'),
(271, 21, 1, '67286d62ce6a7', '2024-11-04 06:44:50', '2024-11-04 06:44:50'),
(272, 21, 1, '67286d653681c', '2024-11-04 06:44:53', '2024-11-04 06:44:53'),
(273, 21, 1, '67286d6823729', '2024-11-04 06:44:56', '2024-11-04 06:44:56'),
(274, 21, 1, '67286d771dc96', '2024-11-04 06:45:11', '2024-11-04 06:45:11'),
(275, 21, 1, '67286d78474c7', '2024-11-04 06:45:12', '2024-11-04 06:45:12'),
(276, 21, 1, '67286d78ef3de', '2024-11-04 06:45:12', '2024-11-04 06:45:12'),
(277, 21, 1, '67286d8caf4a9', '2024-11-04 06:45:32', '2024-11-04 06:45:32'),
(278, 21, 1, '67286d8d61381', '2024-11-04 06:45:33', '2024-11-04 06:45:33'),
(279, 21, 1, '67286e6ce3106', '2024-11-04 06:49:16', '2024-11-04 06:49:16'),
(280, 21, 1, '67286e6de1e47', '2024-11-04 06:49:17', '2024-11-04 06:49:17'),
(281, 21, 1, '67286e6e60070', '2024-11-04 06:49:18', '2024-11-04 06:49:18'),
(282, 21, 1, '67286e7b4edb9', '2024-11-04 06:49:31', '2024-11-04 06:49:31'),
(283, 21, 1, '67286e8d3a318', '2024-11-04 06:49:49', '2024-11-04 06:49:49'),
(284, 21, 1, '67286e8f3ab87', '2024-11-04 06:49:51', '2024-11-04 06:49:51'),
(285, 21, 1, '67286e922d36b', '2024-11-04 06:49:54', '2024-11-04 06:49:54'),
(286, 21, 1, '67286e9439a7c', '2024-11-04 06:49:56', '2024-11-04 06:49:56'),
(287, 21, 1, '67286f0f1261d', '2024-11-04 06:51:59', '2024-11-04 06:51:59'),
(288, 21, 1, '67286f2517524', '2024-11-04 06:52:21', '2024-11-04 06:52:21'),
(289, 21, 1, '67296bf76c8b1', '2024-11-05 00:51:03', '2024-11-05 00:51:03'),
(290, 21, 1, '67296bfd8aa0c', '2024-11-05 00:51:09', '2024-11-05 00:51:09'),
(291, 27, 1, '67296ca999bcc', '2024-11-05 00:54:01', '2024-11-05 00:54:01'),
(292, 27, 1, '67296cb864156', '2024-11-05 00:54:16', '2024-11-05 00:54:16'),
(293, 27, 1, '67296d04979f6', '2024-11-05 00:55:32', '2024-11-05 00:55:32'),
(294, 27, 1, '67296d06dbdcb', '2024-11-05 00:55:34', '2024-11-05 00:55:34'),
(295, 27, 1, '67296d095450d', '2024-11-05 00:55:37', '2024-11-05 00:55:37'),
(296, 27, 1, '67296d0ab923c', '2024-11-05 00:55:38', '2024-11-05 00:55:38'),
(297, 27, 1, '67296d0c6b38e', '2024-11-05 00:55:40', '2024-11-05 00:55:40'),
(298, 27, 1, '67296d4fb0d1c', '2024-11-05 00:56:47', '2024-11-05 00:56:47'),
(299, 27, 1, '67296d63dcde7', '2024-11-05 00:57:07', '2024-11-05 00:57:07'),
(300, 27, 1, '67296d698b588', '2024-11-05 00:57:13', '2024-11-05 00:57:13'),
(301, 27, 1, '67296d70c96b0', '2024-11-05 00:57:20', '2024-11-05 00:57:20'),
(302, 27, 1, '67296d8164130', '2024-11-05 00:57:37', '2024-11-05 00:57:37'),
(303, 27, 1, '67296d8682874', '2024-11-05 00:57:42', '2024-11-05 00:57:42'),
(304, 27, 1, '67296d8ba1070', '2024-11-05 00:57:47', '2024-11-05 00:57:47'),
(305, 27, 1, '67296d997be6e', '2024-11-05 00:58:01', '2024-11-05 00:58:01'),
(306, 27, 1, '67296d9bce7c1', '2024-11-05 00:58:03', '2024-11-05 00:58:03'),
(307, 27, 1, '67296d9c97eb9', '2024-11-05 00:58:04', '2024-11-05 00:58:04'),
(308, 27, 1, '67296db2a2087', '2024-11-05 00:58:26', '2024-11-05 00:58:26'),
(309, 27, 1, '67296dbc5ab1c', '2024-11-05 00:58:36', '2024-11-05 00:58:36'),
(310, 27, 1, '67296dbf2a199', '2024-11-05 00:58:39', '2024-11-05 00:58:39'),
(311, 27, 1, '67296dc0e69ce', '2024-11-05 00:58:40', '2024-11-05 00:58:40'),
(312, 27, 1, '67296dc185bfd', '2024-11-05 00:58:41', '2024-11-05 00:58:41'),
(313, 27, 1, '67296ddd72c3f', '2024-11-05 00:59:09', '2024-11-05 00:59:09'),
(314, 27, 1, '67296f0b50b6d', '2024-11-05 01:04:11', '2024-11-05 01:04:11'),
(315, 27, 1, '672970073a3ec', '2024-11-05 01:08:23', '2024-11-05 01:08:23'),
(316, 27, 1, '67297012507de', '2024-11-05 01:08:34', '2024-11-05 01:08:34'),
(317, 27, 1, '6729704306af9', '2024-11-05 01:09:23', '2024-11-05 01:09:23'),
(318, 27, 1, '67297407bd156', '2024-11-05 01:25:27', '2024-11-05 01:25:27'),
(319, 27, 1, '6729740e5b0ca', '2024-11-05 01:25:34', '2024-11-05 01:25:34'),
(320, 27, 1, '672974181ee71', '2024-11-05 01:25:44', '2024-11-05 01:25:44'),
(321, 27, 1, '6729741a9568f', '2024-11-05 01:25:46', '2024-11-05 01:25:46'),
(322, 27, 1, '6729741cb8790', '2024-11-05 01:25:48', '2024-11-05 01:25:48'),
(323, 27, 1, '6729741f03003', '2024-11-05 01:25:51', '2024-11-05 01:25:51'),
(324, 27, 1, '672974263c434', '2024-11-05 01:25:58', '2024-11-05 01:25:58'),
(325, 27, 1, '6729778ddf422', '2024-11-05 01:40:29', '2024-11-05 01:40:29'),
(326, 27, 1, '672977aa1be94', '2024-11-05 01:40:58', '2024-11-05 01:40:58'),
(327, 27, 1, '672977d34af00', '2024-11-05 01:41:39', '2024-11-05 01:41:39'),
(328, 27, 1, '672977de4cb75', '2024-11-05 01:41:50', '2024-11-05 01:41:50'),
(329, 27, 1, '672977f70507c', '2024-11-05 01:42:15', '2024-11-05 01:42:15'),
(330, 27, 1, '672977faa87b6', '2024-11-05 01:42:18', '2024-11-05 01:42:18'),
(331, 27, 1, '6729780ac25a6', '2024-11-05 01:42:34', '2024-11-05 01:42:34'),
(332, 27, 1, '672978116eb14', '2024-11-05 01:42:41', '2024-11-05 01:42:41'),
(333, 27, 1, '67297826de447', '2024-11-05 01:43:02', '2024-11-05 01:43:02'),
(334, 27, 1, '672978290ceda', '2024-11-05 01:43:05', '2024-11-05 01:43:05'),
(335, 27, 1, '6729783662127', '2024-11-05 01:43:18', '2024-11-05 01:43:18'),
(336, 27, 1, '6729783ea1dff', '2024-11-05 01:43:26', '2024-11-05 01:43:26'),
(337, 27, 1, '67297841272ec', '2024-11-05 01:43:29', '2024-11-05 01:43:29'),
(338, 27, 1, '67297843127ed', '2024-11-05 01:43:31', '2024-11-05 01:43:31'),
(339, 27, 1, '67297c97cd2cd', '2024-11-05 02:01:59', '2024-11-05 02:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `seen_announcements`
--

CREATE TABLE `seen_announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `announcement_id` bigint(20) UNSIGNED NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `grade_handle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Q00r8KWmFYkVF7boz3RtMJFg7S748W0fgdi41d8p', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZkdGM3RJT2NBcXFLV1pZdjdna0F0bmdKaTBLRVFXTXpkMVkxNmZiMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZWFjaGVyL3JlcG9ydF9jYXJkX2Zyb250Lzc/aWQ9MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTQ6ImxvZ2luX3RlYWNoZXJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1732526706);

-- --------------------------------------------------------

--
-- Table structure for table `student_accounts`
--

CREATE TABLE `student_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `extension_name` varchar(255) DEFAULT NULL,
  `strand` varchar(255) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `grade` int(11) NOT NULL,
  `parents_contact_number` varchar(255) NOT NULL,
  `parents_email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'Student',
  `profile` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_accounts`
--

INSERT INTO `student_accounts` (`id`, `id_number`, `name`, `gender`, `extension_name`, `strand`, `section`, `grade`, `parents_contact_number`, `parents_email`, `username`, `password`, `email`, `role`, `profile`, `address`, `phone_number`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '818311', 'James Bond', 'Male', NULL, 'ABM', 'D', 12, '09512793354', 'caballeroaldrin02@gmail.com', 'aldrin02', '$2y$12$xG2iyL9AkvmzxerIlk1ZvO.ZQTwrY9DJIlurfowoqtxyrOv7ChFjK', 'caballeroaldrin02@gmail.com', 'Student', 'profiles/1730466986_WIN_20241026_16_52_50_Pro.jpg', 'Cabalhin Compound, Barangay Sampaloc', '09512793354', NULL, 'FXUJqaokx522eTYqSUqN875jynlYSbFz6lUp9aVvoDrkmkhkoyuQZ5CsUkeR', '2024-08-14 02:43:19', '2024-11-01 05:16:26'),
(7, '447686', 'Aldrin Caballero', 'Male', NULL, 'ICT', 'A', 11, '09512793354', 'caballeroaldrin02@gmail.com', 'aldrin_02', '$2y$12$ePUKni3L40pbzyW62Q0SiOrtfnM0tL6g1Zkbn96u3kJMQtDpsQBeC', 'aldrincaballero94@gmail.com', 'Student', 'profiles/1732411361_WIN_20241124_09_21_24_Pro.jpg', NULL, '09512793354', NULL, NULL, '2024-11-24 01:22:41', '2024-11-24 01:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade_handle_id` int(11) NOT NULL,
  `written_1` int(11) DEFAULT NULL,
  `written_2` int(11) DEFAULT NULL,
  `written_3` int(11) DEFAULT NULL,
  `written_4` int(11) DEFAULT NULL,
  `written_5` int(11) DEFAULT NULL,
  `written_6` int(11) DEFAULT NULL,
  `written_7` int(11) DEFAULT NULL,
  `written_8` int(11) DEFAULT NULL,
  `written_9` int(11) DEFAULT NULL,
  `written_10` int(11) DEFAULT NULL,
  `written_total` int(11) DEFAULT NULL,
  `written_ps` int(11) DEFAULT NULL,
  `written_ws` int(11) DEFAULT NULL,
  `task_1` int(11) DEFAULT NULL,
  `task_2` int(11) DEFAULT NULL,
  `task_3` int(11) DEFAULT NULL,
  `task_4` int(11) DEFAULT NULL,
  `task_5` int(11) DEFAULT NULL,
  `task_6` int(11) DEFAULT NULL,
  `task_7` int(11) DEFAULT NULL,
  `task_8` int(11) DEFAULT NULL,
  `task_9` int(11) DEFAULT NULL,
  `task_10` int(11) DEFAULT NULL,
  `task_total` int(11) DEFAULT NULL,
  `task_ps` int(11) DEFAULT NULL,
  `task_ws` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_handles`
--

CREATE TABLE `student_handles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `grade_handle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_handles`
--

INSERT INTO `student_handles` (`id`, `student_id`, `teacher_id`, `grade_handle_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '2024-08-14 02:43:19', '2024-08-14 02:43:19'),
(7, 7, 1, 1, '2024-11-24 01:22:41', '2024-11-24 01:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `student_images`
--

CREATE TABLE `student_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_images`
--

INSERT INTO `student_images` (`id`, `student_id`, `image_path`, `created_at`, `updated_at`) VALUES
(16, 1, 'face_images/Aldrin Caballero/0.jpg', '2024-11-01 05:16:26', '2024-11-01 05:16:26'),
(17, 1, 'face_images/Aldrin Caballero/1.jpg', '2024-11-01 05:16:26', '2024-11-01 05:16:26'),
(18, 1, 'face_images/Aldrin Caballero/2.jpg', '2024-11-01 05:16:26', '2024-11-01 05:16:26'),
(25, 7, 'face_images/Aldrin Caballero/0.jpg', '2024-11-24 01:22:41', '2024-11-24 01:22:41'),
(26, 7, 'face_images/Aldrin Caballero/1.jpg', '2024-11-24 01:22:41', '2024-11-24 01:22:41'),
(27, 7, 'face_images/Aldrin Caballero/2.jpg', '2024-11-24 01:22:41', '2024-11-24 01:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `student_notifications`
--

CREATE TABLE `student_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `priority` enum('low','medium','high') NOT NULL DEFAULT 'low',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_notifications`
--

INSERT INTO `student_notifications` (`id`, `type`, `user_id`, `title`, `message`, `is_seen`, `url`, `icon`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'alert', 1, 'Announcement', 'Hello everyone, our prelim is on 10/20/2024, 8:30AM at Anex building.\r\nSee you there guys.', 1, NULL, 'bell', 'medium', '2024-10-04 04:08:56', '2024-10-05 17:49:57'),
(3, 'alert', 1, 'Announcement -Dereck Kertzmann', 'Classes suspension tomorrow because of Typhon, keep safe guys.', 1, NULL, 'bell', 'medium', '2024-10-04 04:29:34', '2024-10-05 17:49:57'),
(5, 'alert', 1, 'Announcement -Dereck Kertzmann', 'Lorem ipsum dolor sit amet', 1, NULL, 'bell', 'medium', '2024-10-04 05:17:07', '2024-10-05 17:49:57'),
(7, 'alert', 1, 'Announcement -Dereck Kertzmann', 'Lorem ipsum dolor sit amet', 1, NULL, 'bell', 'medium', '2024-10-04 05:30:18', '2024-10-05 17:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `student_otp_accounts`
--

CREATE TABLE `student_otp_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `grade_handle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`id`, `student_id`, `subject_id`, `teacher_id`, `grade_handle_id`, `created_at`, `updated_at`) VALUES
(1, 1, 23, 1, 5, '2024-08-14 22:10:57', '2024-08-14 22:10:57'),
(2, 1, 21, 1, 5, '2024-08-14 22:12:17', '2024-08-14 22:12:17'),
(3, 1, 22, 1, 5, '2024-08-14 22:12:39', '2024-08-14 22:12:39'),
(5, 1, 28, 1, 5, '2024-08-15 01:56:04', '2024-08-15 01:56:04'),
(15, 7, 38, 1, 1, '2024-11-24 01:24:30', '2024-11-24 01:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `subject_models`
--

CREATE TABLE `subject_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `grade_handle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_models`
--

INSERT INTO `subject_models` (`id`, `subject`, `day`, `grade_handle_id`, `teacher_id`, `time`, `created_at`, `updated_at`) VALUES
(21, 'Earth and life science', 'Monday', 5, 1, '07:00 AM - 09:00 AM', '2024-08-14 21:22:33', '2024-08-14 21:22:33'),
(22, 'Comprog 1', 'Monday', 5, 1, '10:00 AM - 12:00 PM', '2024-08-14 21:23:12', '2024-08-14 21:23:12'),
(23, 'English', 'Monday', 5, 1, '10:00 PM - 03:00 PM', '2024-08-14 21:24:06', '2024-08-14 21:24:06'),
(28, 'Values', 'Tuesday', 5, 1, '06:55 PM - 07:55 PM', '2024-08-15 01:55:46', '2024-08-15 01:55:46'),
(37, 'Science', 'Monday', 1, 18, '01:25 PM - 06:22 PM', '2024-11-18 05:22:15', '2024-11-18 05:22:15'),
(38, 'Science', 'Monday', 1, 1, '07:30 AM - 08:30 AM', '2024-11-24 01:19:51', '2024-11-24 01:19:51'),
(39, 'Earth and life science', 'Tuesday', 1, 1, '12:00 PM - 01:00 PM', '2024-11-24 03:14:21', '2024-11-24 03:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_accounts`
--

CREATE TABLE `teacher_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `extension_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'Teacher',
  `profile` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_accounts`
--

INSERT INTO `teacher_accounts` (`id`, `id_number`, `name`, `gender`, `position`, `username`, `password`, `extension_name`, `email`, `role`, `profile`, `address`, `phone_number`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '8554812056', 'Dereck Kertzmann', 'Female', 'Teacher 1', 'aldrin02', '$2y$12$B7kGV8tX/hCOLK61F4WCd.Vcjd/RHKJoUD1wYUhyC32S00qdQiVN2', NULL, 'caballeroaldrin02@gmail.com', 'Teacher', 'profiles/1730519263_WIN_20241026_16_52_53_Pro.jpg', '67919 Corwin Island Suite 023Port Enochchester, AL 41977', '09649816857', NULL, 'gCqB6Nn1ZS5N2pFY2FqOah7olytaEX0g2hJsMwxEn9T2CifhA7IxmVxa7avz', '2024-08-14 02:11:23', '2024-11-01 19:47:43'),
(2, '8887376969', 'Elwyn Brown', 'Male', 'Teacher 2', 'shanahan.dennis', '$2y$12$IrbMD7wTXy9a60yxmmrMP.JqIMoU1MrR/0kACn.mGDSea2G0g4Hl.', NULL, 'julianne57@example.org', 'Teacher', NULL, '724 Bogan Dam Apt. 663\nIrvingshire, MN 17007', '09592998551', NULL, NULL, '2024-08-14 02:11:24', '2024-08-14 02:11:24'),
(3, '8741541376', 'Doug Robel', 'Male', 'Teacher 2', 'elyssa19', '$2y$12$5nsIwqmXnKeUJreaqO6mnu4/ZspraoiQdQ2wEWfJHnZ3cBeEexnnq', NULL, 'pansy83@example.org', 'Teacher', NULL, '599 Stoltenberg Parkway Suite 191\nTabithaborough, ME 71153-4475', '09540691222', NULL, NULL, '2024-08-14 02:11:25', '2024-08-14 02:11:25'),
(4, '2025239930', 'Kayli Howell', 'Male', 'Teacher 1', 'amoore', '$2y$12$3lK36ezLoRyyWS2haJJ1gO9wtEk3ns1/14YBF9ZW4eM/mIk637Poy', NULL, 'obrekke@example.org', 'Teacher', NULL, '19047 Stamm Hollow Apt. 298Ressieberg, NM 19943-2706', '09717023064', NULL, NULL, '2024-08-14 02:11:26', '2024-10-27 03:20:39'),
(5, '6150817998', 'Trace Leuschke', 'Male', 'Teacher 1', 'bayer.ena', '$2y$12$iSQd06xShCme1omCcRl5M.ZU95KOMxxyV7uH0ZhkcyGPLYd/BeMc.', NULL, 'hilbert92@example.net', 'Teacher', NULL, '9434 King Tunnel Suite 570\nGusside, NM 54221', '09241511020', NULL, NULL, '2024-08-14 02:11:27', '2024-08-14 02:11:27'),
(6, '1156172394', 'Horace Dare', 'Male', 'Teacher 2', 'bayer.joesph', '$2y$12$Qt3.1CYNzDNPRvNu6F8KluR/GH1QEosEamBZaPIMVkyV0weapLOf6', NULL, 'ankunding.joanny@example.net', 'Teacher', NULL, '64599 Kirsten Mountain\nSchusterfurt, KY 29496-8019', '09374997592', NULL, NULL, '2024-08-14 02:11:28', '2024-08-14 02:11:28'),
(7, '8885465685', 'Prof. Adelle Walsh PhD', 'Female', 'Teacher 3', 'veum.nina', '$2y$12$Xei10pv4vFbITgSH8WT.xOsQHojzOBlVmy3OvUSfrP2RfgOa/.ZrC', NULL, 'zane26@example.com', 'Teacher', NULL, '112 Corwin Pines\nEsmeraldaton, KS 40360-5648', '09119497234', NULL, NULL, '2024-08-14 02:11:29', '2024-08-14 02:11:29'),
(8, '6698089718', 'Dr. Ervin Sipes DVM', 'Female', 'Teacher 1', 'mueller.esmeralda', '$2y$12$OCtwyOYBzUwH6BmFq5uxT./E3KQ2F2I1IUKkclSeV2SXLYFZhdv..', NULL, 'randall.jaskolski@example.org', 'Teacher', NULL, '603 Franecki Forest Apt. 775\nRosaliatown, MI 06371', '09344353984', NULL, NULL, '2024-08-14 02:11:30', '2024-08-14 02:11:30'),
(9, '4908271784', 'Alejandrin Pfannerstill', 'Female', 'Teacher 3', 'sandy73', '$2y$12$ccaMKZ0sF61vfUohr2TYquRU5N5zlMsMpDyOBhsVQf9SXPNWxn5mG', NULL, 'fay.ulices@example.com', 'Teacher', NULL, '3170 Purdy Crescent\nPort Cristobalshire, MI 30240', '09740973007', NULL, NULL, '2024-08-14 02:11:31', '2024-08-14 02:11:31'),
(10, '3187093632', 'Dr. Madisen Kuphal V', 'Male', 'Teacher 1', 'emante', '$2y$12$7dkT./PCV0Dm7aKrZv6i5e6PllAsf3U7pb3OKmYiVmBpm6FqY6/56', NULL, 'zemlak.hudson@example.com', 'Teacher', NULL, '5432 Lydia Trail Suite 110\nMartinmouth, UT 09693', '09429234158', NULL, NULL, '2024-08-14 02:11:32', '2024-08-14 02:11:32'),
(11, '0469396286', 'Amiya Thiel', 'Male', 'Teacher 2', 'feil.alexys', '$2y$12$0qFLFeHHgE0B1F8m0oVJ9.wslVJEWVQDbvGwBxZzeF5AQUeqs.TGS', NULL, 'west.royal@example.net', 'Teacher', NULL, '10192 Mark Heights Suite 458\nMaraport, SD 23884-6957', '09583647749', NULL, NULL, '2024-08-14 02:11:33', '2024-08-14 02:11:33'),
(12, '4167989783', 'Prof. Zora Kiehn', 'Male', 'Teacher 2', 'darrion.murphy', '$2y$12$IvraWNgQPjkbB50HynsZP.bFWqWmIwlhfyZS.X9CZpQ5eo1MvTnUy', NULL, 'clay01@example.net', 'Teacher', NULL, '8793 Schoen Ranch Apt. 229\nWest Sophiachester, WA 25678', '09260268717', NULL, NULL, '2024-08-14 02:11:35', '2024-08-14 02:11:35'),
(13, '0961373224', 'Lucious Gislason', 'Male', 'Teacher 1', 'joanne53', '$2y$12$OFak3ytml73RCG/CKo2gG.1IhYGARgFyiENaw4gMe7ypL2RDIwnXC', NULL, 'zakary46@example.org', 'Teacher', NULL, '32210 Pagac Valley\nWest Aylaburgh, FL 74414-8917', '09695546465', NULL, NULL, '2024-08-14 02:11:36', '2024-08-14 02:11:36'),
(14, '7252299647', 'Mr. Faustino Brekke MD', 'Male', 'Teacher 2', 'hilton75', '$2y$12$z20tZvGNwAMX8.QdxSP32uYnVwCgdQiwvB2aLtvsKimOhuQIjcPOi', NULL, 'angel48@example.org', 'Teacher', NULL, '911 Streich Gardens\nSouth Estellton, SC 88426', '09116873344', NULL, NULL, '2024-08-14 02:11:37', '2024-08-14 02:11:37'),
(15, '0392575902', 'Haven Kemmer I', 'Female', 'Teacher 1', 'ludwig.hermiston', '$2y$12$oxpPMfwiyI8hQ0l918QhcOnddLkJdg858gL0JWDa2RgU3pSseeph6', NULL, 'melisa.haag@example.net', 'Teacher', NULL, '660 Edd Inlet Suite 333\nNorth Kendallbury, NH 97550-6227', '09694762116', NULL, NULL, '2024-08-14 02:11:38', '2024-08-14 02:11:38'),
(16, '2909706964', 'Marlon Hackett', 'Male', 'Teacher 3', 'vkautzer', '$2y$12$eJuKBbjLfCK15DGcgOwM/e4NJjvVEIplpLZmer9Lo9oeBsaKgR58m', NULL, 'garnett.corwin@example.net', 'Teacher', NULL, '32454 Swaniawski Pine Suite 180\nSouth Ervin, KS 11191', '09961140667', NULL, NULL, '2024-08-14 02:11:39', '2024-08-14 02:11:39'),
(17, '7712717955', 'Obie Bednar', 'Male', 'Teacher 3', 'jdaugherty', '$2y$12$ykLq/AVXwOtPPHa596ZpqezlDzJqwXNnFetBOo7TffDTy.Blqbwd.', NULL, 'jorge13@example.com', 'Teacher', NULL, '863 Jacobi Neck Suite 049\nMurphyborough, IL 37035', '09570884720', NULL, NULL, '2024-08-14 02:11:40', '2024-08-14 02:11:40'),
(18, '5908218963', 'Braeden Kris Sr.', 'Male', 'Teacher 1', 'zetta94', '$2y$12$a6Vb8CKKhb8qcpcc1SjP/.5zOsdkv2WNQ8fbqqFIHi/EqoWy3g34G', NULL, 'ryley.dooley@example.org', 'Teacher', NULL, '314 Hane Springs\nNew Hobart, VT 92439', '09838446072', NULL, NULL, '2024-08-14 02:11:41', '2024-08-14 02:11:41'),
(19, '1294937040', 'Hilda Beahan', 'Male', 'Teacher 2', 'stracke.sallie', '$2y$12$g9KwAdNgh9G/40Rln9ZbY.d1Ovaid4TCKzX.Gkcsl7zKXNN/4Mcvy', NULL, 'legros.anika@example.com', 'Teacher', NULL, '362 Davonte Plaza\nNew Jabari, ID 37630-3561', '09538276846', NULL, NULL, '2024-08-14 02:11:42', '2024-08-14 02:11:42'),
(20, '4690426780', 'Etha Koch Jr.', 'Male', 'Teacher 2', 'preston.trantow', '$2y$12$K4cvaA3N784NQHThJ1JFxeAB41eOdloK1oR3BLhEr66XTU7Xz2M8O', NULL, 'maximillia07@example.com', 'Teacher', NULL, '725 Kerluke Skyway\nWest Emeliemouth, NV 88707-8592', '09800488936', NULL, NULL, '2024-08-14 02:11:44', '2024-08-14 02:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_grade_handles`
--

CREATE TABLE `teacher_grade_handles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `strand` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT 'First semester',
  `quarter` varchar(255) DEFAULT 'First quarter',
  `subject` varchar(255) DEFAULT NULL,
  `track` varchar(255) DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_grade_handles`
--

INSERT INTO `teacher_grade_handles` (`id`, `grade`, `strand`, `section`, `semester`, `quarter`, `subject`, `track`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, '11', 'ICT', 'A', 'First semester', 'First quarter', NULL, NULL, 1, '2024-11-24 01:18:47', '2024-11-24 01:18:47'),
(2, '12', 'ICT', 'A', 'First semester', 'First quarter', NULL, NULL, 1, '2024-11-24 01:19:03', '2024-11-24 01:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notifications`
--

CREATE TABLE `teacher_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `priority` enum('low','medium','high') NOT NULL DEFAULT 'low',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_notifications`
--

INSERT INTO `teacher_notifications` (`id`, `type`, `user_id`, `title`, `message`, `is_seen`, `url`, `icon`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'reminder', 11, 'Tenetur consequatur voluptas blanditiis sit.', 'Nesciunt aliquam animi voluptas ad. Culpa ipsa nesciunt voluptates voluptas optio. Repudiandae veniam ut et excepturi. Tenetur sed mollitia est ut sed ut et fuga.', 0, 'https://jacobi.com/aperiam-ut-qui-a-eum.html', 'info-circle', 'high', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(2, 'reminder', 4, 'Maiores corrupti ut voluptatem et consequatur.', 'Similique et ut ullam rem sint velit. Atque nesciunt minima minus cupiditate ea et voluptas. Ea incidunt consectetur iste.', 0, 'http://damore.com/', 'envelope', 'low', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(3, 'alert', 7, 'Corrupti fuga laborum vitae eum sit.', 'Est quod a illum suscipit qui necessitatibus. Ut eum corporis qui esse nemo corrupti et. Laboriosam pariatur autem quia excepturi totam repudiandae. Occaecati voluptate nihil ut voluptates voluptatibus tempore velit atque.', 0, 'http://www.kshlerin.com/', 'envelope', 'medium', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(4, 'alert', 19, 'Aut hic laborum exercitationem.', 'Veritatis expedita voluptatem voluptatem qui. Fugiat animi et numquam esse tenetur blanditiis enim ipsa. Ab porro consectetur facere repudiandae.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(6, 'message', 3, 'Dolor nam sit nihil qui consectetur.', 'Possimus ullam voluptate et cum soluta aut officiis. Aliquam tempore voluptate quis pariatur qui. Deleniti voluptatem perferendis ea harum temporibus molestiae. Voluptatem veritatis tempore et laboriosam et et reiciendis. Vel dolor qui pariatur odit ut.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(7, 'alert', 10, 'Officiis eos vel nam assumenda id commodi.', 'Voluptatem nemo omnis excepturi eum aliquam ratione nisi iste. Repellat labore voluptatibus perspiciatis nihil laboriosam vitae error. Rerum vel fuga quis enim. Reiciendis in neque qui unde nam.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(8, 'message', 17, 'Et culpa sed molestiae numquam aspernatur sunt.', 'Repellendus omnis non mollitia aliquam sunt in. Ut pariatur voluptas incidunt ab. Similique ipsa ipsum velit.', 0, 'http://www.goodwin.com/hic-quibusdam-fugit-ea-necessitatibus-voluptas-reprehenderit', 'info-circle', 'low', '2024-09-07 04:15:17', '2024-09-07 04:15:17'),
(9, 'reminder', 3, 'Et error modi itaque omnis rerum ipsam.', 'Velit eum qui enim sunt et voluptate. Et ut alias voluptatem earum qui est rem. Exercitationem velit facere praesentium. Occaecati excepturi eum soluta.', 0, 'https://www.strosin.com/voluptas-voluptatem-modi-est-debitis-odit-soluta-nostrum', 'bell', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(10, 'alert', 14, 'Qui repellendus rerum quam aut rerum.', 'Odio perferendis natus mollitia enim molestias quia commodi. Qui aliquid saepe maxime. Eaque aperiam voluptatem autem ut. Cum aut necessitatibus et vero maxime omnis rem quidem.', 0, NULL, 'bell', 'medium', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(11, 'reminder', 9, 'Quibusdam earum reiciendis facere nihil inventore.', 'Perferendis voluptatem blanditiis est nemo enim accusamus labore porro. Aut dolores numquam soluta qui. Magni aut dignissimos a praesentium eius est.', 0, 'https://murazik.com/qui-assumenda-eos-commodi-dolore-ullam-est.html', 'envelope', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(12, 'message', 6, 'Quae quod expedita autem nemo.', 'Deleniti possimus omnis quia est est ad est. Aspernatur unde ratione hic cupiditate velit. Quisquam occaecati facilis aspernatur molestiae magnam rerum soluta.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(13, 'alert', 16, 'Nam illum qui dolores nesciunt.', 'Et qui quis sit ab ducimus accusamus minus. Quae at quaerat minima omnis ducimus sequi ea. A omnis voluptatem et provident rerum iste. Aut sed itaque minima.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(14, 'alert', 8, 'Ducimus non illo tempora.', 'Similique ut saepe odio provident possimus adipisci. Iusto dolore perspiciatis quod. Velit quos eos quidem aut dolor velit dicta dolores.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(15, 'reminder', 17, 'Animi temporibus impedit repellendus unde accusantium.', 'Magni neque nihil vero ipsum sed voluptatem eum cum. Fuga tenetur sit iste molestiae nesciunt. Distinctio incidunt ullam a eos eos animi fugiat. Consequatur deleniti incidunt explicabo nam quam praesentium ipsa.', 0, 'http://www.kutch.biz/dolores-similique-at-ipsa-deleniti-enim', 'info-circle', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(16, 'alert', 18, 'Sed quia hic consequatur nihil.', 'Quidem nam aut molestias assumenda cumque. Alias corrupti minima inventore possimus architecto eos fugit temporibus. Necessitatibus veritatis vel sit sint quibusdam eveniet. Est molestiae rerum quia nemo non sit illo.', 0, 'http://runolfsdottir.org/', 'envelope', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(17, 'message', 17, 'Velit ut fugit et eveniet repudiandae voluptatem.', 'Exercitationem qui praesentium perspiciatis unde ab est. Modi doloremque quia sint qui. Veniam maxime porro laudantium ut vitae eligendi in voluptatum.', 0, 'http://sauer.net/veniam-nam-facilis-hic-laudantium-nobis-itaque-alias', 'info-circle', 'medium', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(18, 'message', 13, 'Ullam ut illum numquam repellat molestias iusto.', 'Sint voluptas tempore quas voluptas dignissimos. Qui ex consequatur vel aut. Sit rerum temporibus eius tenetur.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(19, 'message', 14, 'Et eveniet excepturi fugit.', 'Natus maxime quia optio voluptate nam. At ut et qui est dolores. Reiciendis nihil deserunt labore qui animi.', 0, 'http://www.skiles.org/minus-voluptatem-illo-beatae-et-ducimus-temporibus-nulla-ut', 'bell', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(20, 'message', 8, 'Porro tempore nobis vel quaerat quae.', 'Quia possimus sit nemo enim deleniti vitae ullam. Et autem voluptatibus ex magnam ut fugiat. Enim similique nihil sit architecto.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(21, 'reminder', 11, 'Laudantium sit itaque omnis autem labore modi.', 'Sed aliquam aut aut dolore laborum modi. Eum enim vitae cumque omnis ducimus inventore iusto. Eos in recusandae repudiandae libero.', 0, 'https://www.bailey.biz/et-voluptatibus-delectus-dolor-deleniti', 'envelope', 'medium', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(22, 'reminder', 20, 'Dignissimos dolorem rerum omnis.', 'Est voluptatem et dolores et velit aut. Enim voluptate ipsam labore illo. Sint sed ipsam atque animi consectetur ea quisquam unde.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(23, 'message', 19, 'Qui enim in accusamus ut.', 'Beatae quaerat quas nihil corrupti inventore tempore. Ab officia sunt ut quia esse a. Harum distinctio ipsum velit. Dignissimos vero voluptatem nemo et alias reiciendis. Ab nemo qui est quod qui magnam minus.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(24, 'reminder', 17, 'Aliquam blanditiis sit autem fuga et.', 'Voluptas illum atque itaque et soluta ad minus. Sunt qui magni voluptatum omnis qui. Voluptate non dignissimos voluptas amet esse.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(25, 'message', 16, 'Optio rerum ea aperiam aut ullam.', 'Ipsum sit non perferendis minima. Fugit non atque voluptatum fugiat itaque iusto soluta. Laborum officia impedit excepturi.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(26, 'message', 4, 'Et et modi magni est voluptas.', 'Corrupti maxime rem error et animi. Officia recusandae temporibus voluptatum id et omnis. Accusantium error distinctio quos laborum in quibusdam consequatur repudiandae. Quisquam et adipisci facere nobis suscipit nihil libero.', 0, 'http://hill.org/', 'envelope', 'medium', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(27, 'alert', 16, 'Velit et delectus facere.', 'Beatae aut velit quos exercitationem. Quas dignissimos quam iste accusantium et nihil sint.', 0, 'http://www.mraz.org/autem-necessitatibus-a-magnam.html', 'bell', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(28, 'reminder', 6, 'Quia possimus tempore reprehenderit ipsa quo reprehenderit.', 'Porro ut enim et autem officia minus est. Aut harum voluptatem alias eum nostrum. Deleniti commodi earum nisi sit qui sint. Ducimus dolorem dolores voluptatum et a optio.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(29, 'message', 15, 'Ipsa quo quo placeat soluta.', 'Porro dolor aut sunt totam quis itaque odio. Accusantium laborum eos dolore suscipit. Doloremque laudantium ut dolorem voluptates non. Doloremque illo excepturi quis.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(30, 'message', 10, 'Quae consequatur labore neque.', 'Autem sit eum debitis voluptatibus dignissimos ea. Illo quis non architecto dicta sunt.', 0, 'http://www.balistreri.com/nesciunt-fuga-repellat-aut-iste-ut-sed-voluptate.html', 'info-circle', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(31, 'message', 15, 'Assumenda facilis voluptas totam quo sit aut.', 'Modi delectus hic quae eos non. Eaque ab doloribus ut laboriosam optio recusandae nisi. Eos quos vitae officia modi voluptatibus accusantium officiis. A mollitia eos ut et inventore dignissimos.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(32, 'reminder', 16, 'Sit tempora debitis distinctio.', 'Nihil vitae at earum consectetur et distinctio quis. Quidem corrupti itaque est ullam. Qui natus dolorum aut placeat consequuntur accusamus beatae eveniet. Ut explicabo non aspernatur.', 0, NULL, 'bell', 'medium', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(33, 'reminder', 5, 'Architecto commodi quia sint.', 'Amet cumque doloribus culpa tenetur provident consequatur. Aliquam omnis placeat est consequatur. Praesentium molestiae debitis dolorem nostrum. Necessitatibus et harum ratione perferendis nisi.', 0, 'http://www.bashirian.com/dolore-rerum-non-dolores-veniam-molestiae-dignissimos-optio', 'info-circle', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(34, 'message', 15, 'Quo quis quia repellat.', 'Quaerat aut minus error impedit cupiditate aut dicta laudantium. Nisi neque consectetur dolore sit. Illo magni ut eligendi et et quidem. Omnis aut voluptas dolor in.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(35, 'reminder', 8, 'Dolore sed maiores itaque nam vero.', 'Placeat odio omnis dolorum mollitia aut corrupti deleniti hic. Provident quos consequatur dolorem maxime excepturi. Consequatur est ratione doloribus nihil repellendus accusamus est. Est repudiandae cupiditate non et ex saepe. Voluptas dolorem voluptatem voluptatem aut.', 0, 'http://www.dubuque.com/', 'bell', 'medium', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(36, 'message', 17, 'Deleniti iusto perspiciatis excepturi nam molestias.', 'Reprehenderit sed fugiat reprehenderit voluptatem. Sit dignissimos odit architecto quisquam. Quia tempore libero et eos.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(37, 'reminder', 4, 'Numquam et quasi optio non eligendi.', 'Corrupti nostrum atque ducimus reiciendis rerum labore exercitationem iusto. Vel eveniet adipisci eius eum.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(38, 'reminder', 17, 'Non qui aliquid iste vero.', 'Autem vel voluptas sint facilis sint. Nemo sed dolore voluptatem tenetur libero. Soluta et et praesentium exercitationem quas ex qui porro.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(39, 'reminder', 10, 'Rerum non eaque et fugit eos vel.', 'Beatae tenetur optio molestias omnis facilis labore repellat. Non debitis hic distinctio quis. Ut voluptas dolorum cum asperiores suscipit.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(40, 'alert', 13, 'Occaecati voluptatem neque voluptatem autem minus modi.', 'Voluptatem distinctio adipisci consequatur delectus officiis tempore est reiciendis. Et qui sed repellendus rerum nemo aut quia. Porro ex libero totam vero ducimus rem iusto commodi. Ex perspiciatis ut dolores rerum aut velit aliquid cupiditate.', 0, 'http://www.senger.com/suscipit-inventore-accusantium-vel-et', 'envelope', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(41, 'alert', 15, 'Molestiae rerum asperiores iusto molestiae eum porro.', 'Et repudiandae enim rem dolores suscipit aut voluptas. Numquam culpa odio facere quos illum error. Qui rerum aut iste qui et.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(42, 'alert', 4, 'Dolorum et facilis in.', 'Voluptas blanditiis sint rerum dolor odit. Neque omnis dolore incidunt.', 0, 'https://www.parisian.com/aliquid-dolor-nesciunt-doloremque-est', 'info-circle', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(43, 'alert', 5, 'Velit nisi quia reiciendis ratione doloribus.', 'Illum beatae qui corporis et sunt. Sit aut voluptatem provident in doloremque dolorum est. Asperiores perferendis accusamus sit velit perferendis et. Modi ducimus recusandae non ipsum dolores officiis.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(44, 'reminder', 17, 'Ipsam repellendus corrupti amet.', 'Excepturi quibusdam possimus delectus dolorem iusto quo hic. Expedita fuga autem aut nobis fugiat eaque qui enim. Sed et repellat et. Et est tempora modi sequi assumenda quia facilis veniam.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(45, 'message', 19, 'Minus repellendus autem pariatur ipsum ea harum.', 'Est aut et impedit est. Occaecati beatae est et non nam suscipit dolorum. Rem quis nostrum eos dolorum incidunt. Optio voluptates necessitatibus omnis qui earum commodi nihil.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:18', '2024-09-07 04:15:18'),
(46, 'reminder', 15, 'Unde rem aut sed sequi dolorem.', 'Voluptatum occaecati eum quasi culpa voluptate. Id alias fuga incidunt nemo. Libero dolorum quod est magni delectus voluptatem provident officia. Et dolor molestias maxime corporis facilis vitae.', 0, NULL, 'bell', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(47, 'alert', 7, 'Quas iste eveniet dolorem.', 'Consequatur inventore voluptas saepe hic unde et. Explicabo consequatur quos et animi et. Eum excepturi ad voluptatem eos aut quaerat eum. Ipsum beatae possimus rerum explicabo consequatur quasi. Eaque beatae omnis unde deleniti voluptates.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(48, 'message', 15, 'Ex dolores qui amet recusandae est culpa.', 'Velit perspiciatis quisquam earum dolores explicabo et libero. Cupiditate maiores cum sapiente reiciendis inventore. Sint ullam et natus qui et. Dicta rerum consequuntur est iure iste ea.', 0, 'https://www.pfeffer.com/odit-qui-quia-eligendi-ut-at-dolores', 'info-circle', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(49, 'alert', 20, 'Repudiandae molestiae ipsa harum ad qui.', 'Quia dolores error libero et neque nostrum. Saepe commodi ab aut voluptate cumque. Odio quia fugit non velit quia in blanditiis.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(50, 'alert', 8, 'Nihil neque quasi ut suscipit.', 'Laboriosam asperiores nihil laborum aut aut. Consequatur quaerat occaecati aut cumque enim sequi vel. Tempora accusamus qui facilis quo. Quos atque eos consectetur alias laborum quibusdam. Est dolorem et aliquam ut et.', 0, 'http://stark.com/', 'info-circle', 'medium', '2024-09-07 04:15:19', '2024-09-07 04:15:19'),
(52, 'alert', 13, 'Sed quo esse libero facere magni.', 'Inventore voluptatem dignissimos corrupti. Vero in omnis qui repellat.', 0, 'https://www.volkman.com/tempore-aut-possimus-quia-ullam-maxime-autem-deleniti', 'bell', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(53, 'alert', 12, 'Aut magnam impedit quo.', 'Qui odio porro ut aut. Quo et veritatis et laboriosam eos quae. Aut omnis dolores sunt consequatur cupiditate aliquid.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(54, 'alert', 18, 'Sunt consectetur sit eligendi placeat.', 'Ducimus optio est enim explicabo similique. Velit cupiditate voluptate optio quae hic aliquid. Voluptas ratione officiis fuga odit. Voluptates inventore repellendus tempore ut.', 0, 'http://kiehn.biz/', 'info-circle', 'low', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(55, 'reminder', 13, 'Dolorem rerum a exercitationem.', 'Voluptates vero repellendus nesciunt qui odio aut voluptas. Debitis est exercitationem velit fugiat et. Non cumque molestiae sint ipsam nulla beatae voluptatum. Doloremque quasi molestias est consequatur.', 0, 'http://leuschke.biz/inventore-ipsa-temporibus-hic-provident-necessitatibus-nesciunt', 'bell', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(56, 'alert', 14, 'Accusantium molestiae eveniet consequatur quibusdam labore.', 'Illum qui sint cumque voluptatem voluptatum dolorem minima. Esse consequatur sit consequatur illum. Enim repellendus expedita quia nesciunt.', 0, 'http://www.stokes.com/in-ab-voluptatibus-voluptatum-expedita-itaque', 'info-circle', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(57, 'reminder', 3, 'Ipsa qui in quia non ut dolor.', 'Mollitia veritatis sit assumenda asperiores dicta amet. Et ut totam atque porro earum. Voluptatum sed ad ex similique.', 0, 'http://www.schoen.com/', 'envelope', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(58, 'message', 9, 'Vero sunt sed cupiditate voluptates.', 'Aut odio officiis tempora rem aut magni. Veritatis consectetur harum a eligendi qui. Sit sint rerum modi enim.', 0, 'http://marquardt.com/eos-autem-voluptatem-alias-accusantium-alias-fugiat-eaque-debitis', 'info-circle', 'low', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(59, 'alert', 2, 'Debitis qui in ea autem.', 'Sunt et aliquam et voluptas quia rem aut. Dicta deserunt eaque dolore cumque aut facere et. Dolores quae qui enim sint deserunt.', 0, 'http://www.crist.com/reprehenderit-quia-molestias-tenetur-beatae', 'envelope', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(60, 'message', 18, 'Ut corrupti ex inventore quae.', 'Soluta similique est quibusdam. Fugiat provident eaque repellendus nemo nemo amet. Qui est sit voluptas architecto et. Pariatur nemo et et eius labore repellat.', 0, NULL, 'info-circle', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(61, 'reminder', 18, 'Neque nostrum sint ducimus sapiente non distinctio.', 'Quo iusto eligendi officia nihil mollitia inventore sunt. Reprehenderit ut quos rem earum fuga.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(62, 'message', 10, 'Quae blanditiis quis quibusdam.', 'Autem non perferendis minus animi. Et non nobis minus assumenda perspiciatis.', 0, NULL, 'envelope', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(63, 'reminder', 8, 'Voluptatem dolor qui neque.', 'Quidem atque commodi deserunt nesciunt cupiditate. Iusto earum explicabo facere iste quis. Consequatur optio ut possimus soluta et.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(64, 'reminder', 12, 'Id nesciunt delectus ex quo veniam ducimus.', 'Necessitatibus et debitis dolor esse esse et eius. Illum sapiente illum et error molestiae veniam. Officiis eaque aut dolorum ratione. Officia sint dolor et doloremque nostrum voluptatum quibusdam. Ipsam consequatur aspernatur corporis ex ipsa quia.', 0, 'http://www.bradtke.org/pariatur-a-corrupti-voluptatibus-fuga-repudiandae-et.html', 'bell', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(65, 'message', 11, 'Voluptas alias qui aut quas quam.', 'Est odit et impedit placeat quis omnis quisquam voluptatem. Quis non voluptates placeat voluptas. Similique architecto eius repellendus repellat. Et ut qui voluptas quis.', 0, 'http://www.kassulke.info/ullam-omnis-sapiente-quia-animi', 'envelope', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(66, 'alert', 6, 'Ad voluptatibus est molestiae.', 'Et architecto earum et veniam. Dolorum esse tenetur omnis sit.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(67, 'alert', 5, 'Aut harum adipisci eveniet.', 'Mollitia possimus voluptate repudiandae maiores sit dolore. Autem iusto eaque excepturi molestias incidunt. Et voluptas enim omnis quos assumenda.', 0, 'http://crooks.org/tenetur-autem-qui-dolore-voluptas-blanditiis-aliquam-quibusdam-ea.html', 'info-circle', 'low', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(68, 'alert', 4, 'Voluptatibus sed ea culpa fugiat sunt.', 'Occaecati unde recusandae voluptatem. Sit in ut quas molestias corporis. Sapiente sint esse eos vel. Et quia animi doloribus.', 0, 'http://feeney.net/', 'envelope', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(69, 'message', 5, 'Occaecati dolores ab est ullam tempora.', 'Earum doloremque suscipit occaecati est. Doloribus facere consequatur autem facere ut eligendi illo saepe. Consequatur quia optio architecto blanditiis nemo dolor. Est sint vel sit dignissimos consequatur.', 0, 'http://swift.info/quisquam-atque-et-voluptate', 'envelope', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(70, 'alert', 15, 'Perferendis temporibus et et aut error.', 'Molestiae incidunt vel tempore quam accusamus. Quis numquam doloribus libero quisquam. Vel voluptate quae sunt quis.', 0, 'http://durgan.info/', 'bell', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(71, 'alert', 13, 'Nulla molestiae eum voluptas error.', 'Odit ipsa facilis consequatur quasi omnis soluta. Architecto minus temporibus et veniam sed est quis. Non qui et qui molestiae ut dolorum.', 0, 'https://www.howell.com/iure-aut-dicta-ducimus-voluptate-temporibus-velit-voluptatum', 'bell', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(72, 'reminder', 10, 'Architecto quasi est labore nulla blanditiis iste.', 'Error architecto vero quia. Asperiores nemo cumque eum. Voluptate voluptas enim vel quos minima.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(74, 'alert', 4, 'Voluptates vel aut autem aliquam.', 'Repudiandae et ullam aliquam consectetur esse. Mollitia itaque et ab doloremque magnam dicta. Ut voluptatem vel et alias.', 0, NULL, 'envelope', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(75, 'message', 13, 'Et est odit et facilis.', 'Sit tenetur velit assumenda voluptatibus minima. Delectus necessitatibus nemo omnis consectetur voluptate. Sapiente voluptate non adipisci ut similique quas dolor.', 0, 'http://bergnaum.com/et-cum-voluptas-consectetur-quaerat-iure.html', 'bell', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(76, 'alert', 8, 'A rem dolores ullam consequatur officiis sapiente.', 'Architecto provident sint recusandae cum. Deleniti qui aut vel provident explicabo voluptas sed. Veniam molestiae nostrum ullam qui qui esse dolores quia.', 0, 'http://www.welch.com/in-consectetur-quasi-ut-perferendis-modi', 'envelope', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(77, 'alert', 9, 'Laboriosam iusto cupiditate aliquid doloribus.', 'Possimus animi ut voluptate repudiandae. Qui delectus saepe repellendus est rem adipisci a. Dolores magnam ipsam dolore necessitatibus id.', 0, NULL, 'bell', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(78, 'message', 19, 'Minima ratione eos sequi rerum aut ut.', 'Est recusandae magnam alias. Aut eveniet voluptatibus omnis. Inventore ratione incidunt debitis sed nostrum earum.', 0, NULL, 'envelope', 'low', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(79, 'reminder', 8, 'Earum est qui vitae.', 'Non culpa rem quaerat omnis sunt magni. Esse a dolorem voluptas et molestias nobis explicabo.', 0, NULL, 'envelope', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(80, 'alert', 17, 'Molestias culpa dignissimos voluptas pariatur.', 'Eum voluptatem ratione hic reprehenderit atque aperiam. Recusandae quia est voluptates aut eos. Doloremque voluptas sed praesentium veniam. Hic consequatur nam quasi asperiores. Rerum eos doloremque voluptas voluptas similique veniam.', 0, 'http://larkin.com/', 'bell', 'high', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(81, 'alert', 14, 'A facilis est dolores quis.', 'Consequatur sed ipsum dolores culpa. Rerum animi molestiae doloremque sunt et quasi. Facilis fugit nisi labore.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(82, 'reminder', 7, 'Eius fuga est aspernatur repudiandae provident.', 'Eos omnis ipsa molestiae ut est qui et. Et quia libero aut aliquid in reprehenderit. Qui dolor ipsam ea consequatur. Non maxime iste atque aut odio adipisci sit voluptates.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:58', '2024-09-07 04:15:58'),
(83, 'message', 3, 'Incidunt quisquam facilis praesentium est.', 'Quisquam voluptate ipsa autem aliquid incidunt. Deserunt dolore ratione atque quia.', 0, 'http://www.ruecker.com/maiores-autem-iste-voluptas-incidunt-voluptatem-aperiam-ea-dolorum', 'envelope', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(84, 'alert', 15, 'Autem eum minima similique enim quo.', 'Similique accusamus qui quos quas vel quia. Impedit quasi unde quasi tempore error molestias harum est. Iste eum saepe rerum sint deleniti. Delectus cupiditate autem minima sint qui. Consequatur fuga ut itaque cum.', 0, 'http://www.fahey.com/itaque-ipsa-earum-reiciendis-consequuntur-voluptate', 'bell', 'high', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(85, 'reminder', 19, 'Id cumque doloribus nemo cum.', 'Distinctio rem iure quibusdam similique. Neque fuga sit qui rem sapiente cupiditate explicabo. Saepe commodi iusto nemo pariatur eos magni ipsum officiis. Praesentium aut delectus corporis aut commodi.', 0, 'https://www.mcclure.biz/quia-possimus-et-eum-quia-ut-libero', 'bell', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(86, 'alert', 19, 'Est quia ut consequuntur reprehenderit et ipsam.', 'Illo ullam illo harum quod odit earum et modi. Ut provident quisquam nobis et. Aut excepturi velit aliquid est iure vitae eos. Repudiandae aliquid placeat eos occaecati impedit qui. Doloribus et eius voluptatibus qui.', 0, 'http://anderson.com/', 'info-circle', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(87, 'message', 20, 'Fugiat officiis doloremque repellat.', 'Quod quia est inventore et delectus neque deserunt ab. Iusto aut enim eos quis fuga alias veniam consequatur. Dolor molestiae nobis nesciunt repellendus quia qui.', 0, 'http://oconner.info/quaerat-dolores-repudiandae-odio-optio-esse-eaque-quos', 'info-circle', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(88, 'alert', 13, 'Dignissimos et veritatis soluta iusto non.', 'Facere animi officiis id aut eius accusamus esse. Quisquam asperiores quo qui molestiae quasi temporibus. Aut autem rem atque quis tenetur omnis ducimus id. Qui nisi reprehenderit voluptas quaerat doloribus placeat.', 0, 'http://www.huels.com/vel-ullam-vel-autem-aut-occaecati-pariatur.html', 'bell', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(89, 'reminder', 9, 'Porro odio facilis impedit neque accusantium.', 'Laborum quaerat eos quas fugiat. Nostrum animi eum est harum sed unde sunt. Ut id libero quaerat et. Est voluptatibus quia cumque.', 0, NULL, 'bell', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(90, 'message', 16, 'Perferendis quisquam autem enim nihil labore dolor.', 'Laudantium repellat deserunt velit doloremque et id maxime ut. Necessitatibus ducimus sit autem ipsum rerum pariatur laborum. Fugiat et qui qui impedit totam aspernatur commodi. Tempore odit mollitia ab similique.', 0, 'http://www.harris.biz/quis-laborum-cupiditate-quae-quia-molestias-a-magnam', 'envelope', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(91, 'message', 16, 'Doloremque culpa enim ipsam similique.', 'Aut nisi qui qui asperiores. Voluptatibus quibusdam et id in ut et. Vel vel vitae temporibus id repellendus sunt impedit. Pariatur et est omnis aut ipsa vitae.', 0, 'http://www.runte.biz/ipsa-corporis-quaerat-corrupti-accusamus-dolorem-dolore-officiis.html', 'info-circle', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(92, 'message', 4, 'Officiis magnam unde quo.', 'Sint esse animi consectetur eveniet porro. Ut reprehenderit possimus maxime numquam. Quaerat saepe quaerat recusandae consequatur omnis quia ut.', 0, 'http://lynch.com/', 'bell', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(93, 'reminder', 18, 'Perspiciatis velit qui ipsum.', 'Enim et corporis officiis molestiae ducimus et temporibus. Neque dolor quod dolor. Impedit hic cupiditate aut.', 0, 'https://hettinger.com/expedita-voluptas-numquam-iste-possimus-quo-tempora.html', 'envelope', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(94, 'alert', 9, 'Enim quia rerum officiis sint.', 'Ut qui omnis quo odio beatae id corporis. Magnam qui voluptas enim voluptates. Eum et numquam optio at et dignissimos aut unde. Quod dolorum iste similique sed sunt eveniet.', 0, NULL, 'bell', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(95, 'alert', 4, 'Pariatur quisquam officiis natus aut nemo.', 'Architecto voluptas quisquam ipsam. Voluptas occaecati natus consequuntur eos a. Qui dolores dolorem est voluptates vel numquam facere.', 0, NULL, 'info-circle', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(96, 'reminder', 7, 'Occaecati ullam et et temporibus.', 'At sequi qui atque soluta tempore. Earum placeat optio corporis magni. Tenetur sapiente sint aut illo. Delectus provident neque harum impedit et delectus possimus.', 0, NULL, 'bell', 'medium', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(97, 'alert', 6, 'Ut harum et voluptatum.', 'Pariatur aperiam itaque odio. Repellendus facere sit dolores. Placeat consectetur vero sed quidem voluptatem exercitationem aliquid. Modi numquam fugit distinctio vel repellat unde fugit.', 0, 'http://shields.net/', 'info-circle', 'high', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(98, 'reminder', 9, 'Asperiores maiores et voluptatem.', 'Iure blanditiis harum nam tenetur enim. Non laboriosam rem quas voluptatem est non consequatur. Odio voluptas ullam dolor laudantium nihil omnis. Reprehenderit repellat tempora ut eius aut non sed.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(99, 'reminder', 13, 'Inventore commodi qui quia facere est excepturi.', 'Et magni velit velit non sed. Cum similique dignissimos vel est. Itaque dolore quia quia libero. Omnis ab fuga illum facilis vero.', 0, NULL, 'info-circle', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59'),
(100, 'alert', 4, 'Excepturi cum et perferendis enim aliquid.', 'Veritatis laboriosam et cumque et. Nemo qui enim sit exercitationem et accusantium. Voluptates veritatis illum adipisci possimus quia vero. Porro consequatur et dolores ipsa.', 0, 'http://torp.com/dolorem-laudantium-doloremque-reiciendis-perferendis-facere-cumque.html', 'bell', 'low', '2024-09-07 04:15:59', '2024-09-07 04:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_otp_accounts`
--

CREATE TABLE `teacher_otp_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_otp_accounts`
--

INSERT INTO `teacher_otp_accounts` (`id`, `email`, `otp`, `created_at`, `expires_at`) VALUES
(1, 'caballeroaldrin02@gmail.com', '829094', '2024-10-14 22:49:32', '2024-10-14 14:59:19'),
(2, 'caballeroaldrin02@gmail.com', '189856', '2024-10-27 08:16:32', '2024-10-27 00:26:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absents`
--
ALTER TABLE `absents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_accounts_id_number_unique` (`id_number`),
  ADD UNIQUE KEY `admin_accounts_username_unique` (`username`),
  ADD UNIQUE KEY `admin_accounts_email_unique` (`email`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `admin_otp_accounts`
--
ALTER TABLE `admin_otp_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_histories`
--
ALTER TABLE `attendance_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_histories_student_id_foreign` (`student_id`),
  ADD KEY `attendance_histories_subject_model_id_foreign` (`subject_model_id`),
  ADD KEY `attendance_histories_teacher_id_foreign` (`teacher_id`),
  ADD KEY `attendance_histories_grade_handle_id_foreign` (`grade_handle_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `face_recognition_keys`
--
ALTER TABLE `face_recognition_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `face_scans`
--
ALTER TABLE `face_scans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `face_scans_student_id_foreign` (`student_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grading_headers`
--
ALTER TABLE `grading_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guidance_accounts`
--
ALTER TABLE `guidance_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guidance_accounts_id_number_unique` (`id_number`),
  ADD UNIQUE KEY `guidance_accounts_username_unique` (`username`),
  ADD UNIQUE KEY `guidance_accounts_email_unique` (`email`);

--
-- Indexes for table `guidance_notifications`
--
ALTER TABLE `guidance_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guidance_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `guidance_otp_accounts`
--
ALTER TABLE `guidance_otp_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highest_possible_score_grading_sheets`
--
ALTER TABLE `highest_possible_score_grading_sheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_sender_type_index` (`sender_id`,`sender_type`),
  ADD KEY `messages_receiver_id_receiver_type_index` (`receiver_id`,`receiver_type`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `presents`
--
ALTER TABLE `presents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr_generates`
--
ALTER TABLE `qr_generates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seen_announcements`
--
ALTER TABLE `seen_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_accounts`
--
ALTER TABLE `student_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_accounts_id_number_unique` (`id_number`),
  ADD UNIQUE KEY `student_accounts_username_unique` (`username`),
  ADD UNIQUE KEY `student_accounts_email_unique` (`email`);

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_handles`
--
ALTER TABLE `student_handles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_handles_student_id_foreign` (`student_id`),
  ADD KEY `student_handles_grade_handle_id_foreign` (`grade_handle_id`);

--
-- Indexes for table `student_images`
--
ALTER TABLE `student_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_images_student_id_foreign` (`student_id`);

--
-- Indexes for table `student_notifications`
--
ALTER TABLE `student_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_otp_accounts`
--
ALTER TABLE `student_otp_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_subjects_student_id_foreign` (`student_id`),
  ADD KEY `student_subjects_subject_id_foreign` (`subject_id`),
  ADD KEY `student_subjects_grade_handle_id_foreign` (`grade_handle_id`);

--
-- Indexes for table `subject_models`
--
ALTER TABLE `subject_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_accounts`
--
ALTER TABLE `teacher_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teacher_accounts_id_number_unique` (`id_number`),
  ADD UNIQUE KEY `teacher_accounts_username_unique` (`username`),
  ADD UNIQUE KEY `teacher_accounts_email_unique` (`email`);

--
-- Indexes for table `teacher_grade_handles`
--
ALTER TABLE `teacher_grade_handles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_grade_handles_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `teacher_notifications`
--
ALTER TABLE `teacher_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `teacher_otp_accounts`
--
ALTER TABLE `teacher_otp_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absents`
--
ALTER TABLE `absents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `admin_otp_accounts`
--
ALTER TABLE `admin_otp_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance_histories`
--
ALTER TABLE `attendance_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `face_recognition_keys`
--
ALTER TABLE `face_recognition_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `face_scans`
--
ALTER TABLE `face_scans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grading_headers`
--
ALTER TABLE `grading_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guidance_accounts`
--
ALTER TABLE `guidance_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `guidance_notifications`
--
ALTER TABLE `guidance_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `guidance_otp_accounts`
--
ALTER TABLE `guidance_otp_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `highest_possible_score_grading_sheets`
--
ALTER TABLE `highest_possible_score_grading_sheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `presents`
--
ALTER TABLE `presents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qr_generates`
--
ALTER TABLE `qr_generates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT for table `seen_announcements`
--
ALTER TABLE `seen_announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_accounts`
--
ALTER TABLE `student_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_handles`
--
ALTER TABLE `student_handles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_images`
--
ALTER TABLE `student_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student_notifications`
--
ALTER TABLE `student_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_otp_accounts`
--
ALTER TABLE `student_otp_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_subjects`
--
ALTER TABLE `student_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subject_models`
--
ALTER TABLE `subject_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `teacher_accounts`
--
ALTER TABLE `teacher_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teacher_grade_handles`
--
ALTER TABLE `teacher_grade_handles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_notifications`
--
ALTER TABLE `teacher_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `teacher_otp_accounts`
--
ALTER TABLE `teacher_otp_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD CONSTRAINT `admin_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admin_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendance_histories`
--
ALTER TABLE `attendance_histories`
  ADD CONSTRAINT `attendance_histories_grade_handle_id_foreign` FOREIGN KEY (`grade_handle_id`) REFERENCES `teacher_grade_handles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_histories_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student_accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_histories_subject_model_id_foreign` FOREIGN KEY (`subject_model_id`) REFERENCES `subject_models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_histories_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `face_scans`
--
ALTER TABLE `face_scans`
  ADD CONSTRAINT `face_scans_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guidance_notifications`
--
ALTER TABLE `guidance_notifications`
  ADD CONSTRAINT `guidance_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `guidance_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_handles`
--
ALTER TABLE `student_handles`
  ADD CONSTRAINT `student_handles_grade_handle_id_foreign` FOREIGN KEY (`grade_handle_id`) REFERENCES `teacher_grade_handles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_handles_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_images`
--
ALTER TABLE `student_images`
  ADD CONSTRAINT `student_images_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_notifications`
--
ALTER TABLE `student_notifications`
  ADD CONSTRAINT `student_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `student_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD CONSTRAINT `student_subjects_grade_handle_id_foreign` FOREIGN KEY (`grade_handle_id`) REFERENCES `teacher_grade_handles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_subjects_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student_accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subject_models` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_grade_handles`
--
ALTER TABLE `teacher_grade_handles`
  ADD CONSTRAINT `teacher_grade_handles_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_accounts` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `teacher_notifications`
--
ALTER TABLE `teacher_notifications`
  ADD CONSTRAINT `teacher_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `teacher_accounts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
