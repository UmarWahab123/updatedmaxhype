-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 09:56 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newrich_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'test', '2021-08-09 09:02:10', '2021-08-09 05:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `course_task`
--

CREATE TABLE `course_task` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_task`
--

INSERT INTO `course_task` (`id`, `page_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 6, 'asad', '2021-09-02 02:51:01', '2021-09-02 03:15:12'),
(9, 7, 'test', '2021-09-02 05:30:58', '2021-09-02 05:30:58'),
(10, 7, 'test 1', '2021-09-02 05:30:58', '2021-09-02 05:30:58'),
(11, 7, 'test 3', '2021-09-02 05:30:58', '2021-09-02 05:30:58');

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
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `langid` int(11) NOT NULL,
  `langname` varchar(500) NOT NULL,
  `langcode` varchar(500) NOT NULL,
  `status` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`langid`, `langname`, `langcode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'Active', '2021-02-15 08:34:53', '2021-02-15 08:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `language_translations`
--

CREATE TABLE `language_translations` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `url_shortcut` longtext NOT NULL,
  `redirect_url` longtext NOT NULL,
  `page_title` longtext NOT NULL,
  `leave_headline` longtext NOT NULL,
  `leave_text` longtext NOT NULL,
  `resume_button` longtext NOT NULL,
  `leave_button` longtext NOT NULL,
  `questionB_headline` longtext NOT NULL,
  `questionB_text` longtext NOT NULL,
  `same_headline` longtext NOT NULL,
  `same_text` longtext NOT NULL,
  `restart_button` longtext NOT NULL,
  `strongly_disagree1` longtext NOT NULL,
  `strongly_disagree2` longtext NOT NULL,
  `slightly_disagree1` longtext NOT NULL,
  `slightly_disagree2` longtext NOT NULL,
  `slightly_agree1` longtext NOT NULL,
  `slightly_agree2` longtext NOT NULL,
  `strongly_agree1` longtext NOT NULL,
  `strongly_agree2` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language_translations`
--

INSERT INTO `language_translations` (`id`, `lang_id`, `url_shortcut`, `redirect_url`, `page_title`, `leave_headline`, `leave_text`, `resume_button`, `leave_button`, `questionB_headline`, `questionB_text`, `same_headline`, `same_text`, `restart_button`, `strongly_disagree1`, `strongly_disagree2`, `slightly_disagree1`, `slightly_disagree2`, `slightly_agree1`, `slightly_agree2`, `strongly_agree1`, `strongly_agree2`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'http://localhost/enneagram/maintest/?tid=', 'Enneagram Personality Test', 'Do you really want to leave?', 'If you leave now you will lose your progress and will have to start a new test.', 'RESUME TEST', 'LEAVE', 'You\'re almost done!', 'Please choose the statement most applicable to you.', 'Sorry to interrupt!', 'Unfortunately there is not enough variety in your answers, therefore we won\'t be able to calculate a reliable result for you. Please start the test again and make sure to answer honestly.', 'RESTART TEST', 'STRONGLY Disagree', 'DISAGREE', 'SLIGHTLY DISAGREE', 'DISAGREE', 'SLIGHTLY AGREE', 'AGREE', 'STRONGLY AGREE', 'AGREE', '2021-02-17 02:31:59', '2021-08-06 07:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `type` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `type`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 'test', 3232, 'dsfdfssdg', '2021-08-06 02:16:04', '2021-08-23 04:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` bigint(20) UNSIGNED NOT NULL,
  `receiver` bigint(20) UNSIGNED NOT NULL,
  `message` longtext NOT NULL,
  `readWriteStatus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `message`, `readWriteStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 'afsdafd', 0, '2021-09-01 07:14:30', '2021-09-01 07:14:30'),
(2, 1, 13, 'asda', 0, '2021-09-01 07:17:57', '2021-09-01 07:17:57'),
(3, 1, 13, 'sfdasfdadsfdfsadf', 0, '2021-09-01 07:23:27', '2021-09-01 07:23:27'),
(4, 1, 13, 'dafsfdfsadf', 0, '2021-09-01 07:24:12', '2021-09-01 07:24:12'),
(5, 1, 13, 'dsafasf', 0, '2021-09-01 07:26:30', '2021-09-01 07:26:30'),
(6, 1, 13, 'dfsafdadsf', 0, '2021-09-01 07:26:57', '2021-09-01 07:26:57');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `personalities`
--

CREATE TABLE `personalities` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personalities`
--

INSERT INTO `personalities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Teacher', '2020-08-05 02:26:50', '2020-08-05 02:26:50'),
(2, 'Helper', '2020-08-05 02:27:03', '2020-08-05 02:27:03'),
(3, 'Performer', '2020-08-05 02:27:13', '2020-08-05 02:27:13'),
(4, 'Romantic', '2020-08-05 02:27:33', '2020-08-05 02:27:33'),
(5, 'Investigator', '2020-08-05 02:27:46', '2020-08-05 02:27:46'),
(6, 'Loyalist', '2020-08-05 02:28:03', '2020-08-05 02:28:03'),
(7, 'Enthusiast', '2020-08-05 02:28:38', '2020-08-05 02:28:38'),
(8, 'Challenger', '2020-08-05 02:29:00', '2020-08-05 02:29:00'),
(9, 'Peacemaker', '2020-08-05 02:29:12', '2020-08-05 02:29:12'),
(11, 'test Customer', '2021-08-05 07:58:45', '2021-08-05 07:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `portal_settings`
--

CREATE TABLE `portal_settings` (
  `id` int(11) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `logo` longtext NOT NULL,
  `email` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portal_settings`
--

INSERT INTO `portal_settings` (`id`, `phone`, `logo`, `email`, `created_at`, `updated_at`, `name`, `address`) VALUES
(1, '1155 das', '/uploads/products/1628278242.png', 'dasdasd', '2021-08-05 19:00:00', '2021-08-08 19:00:00', 'asad test', 'asdasdsda');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `type` varchar(500) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `stage` varchar(500) DEFAULT NULL,
  `round` int(11) DEFAULT NULL,
  `is_reverse` int(11) DEFAULT 0,
  `personality_id` int(11) DEFAULT NULL,
  `question2` longtext DEFAULT NULL,
  `statement_a_pid` int(11) DEFAULT NULL,
  `statement_b_pid` int(11) DEFAULT NULL,
  `statement_a_text2` longtext DEFAULT NULL,
  `statement_b_text2` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `type`, `rank`, `stage`, `round`, `is_reverse`, `personality_id`, `question2`, `statement_a_pid`, `statement_b_pid`, `statement_a_text2`, `statement_b_text2`, `created_at`, `updated_at`) VALUES
(1, 'A', 1, 'Stage 1', 3, 0, 2, 'I feel good when I know other people need me and I can be there for them and actively help them.', NULL, NULL, NULL, NULL, '2020-08-06 02:52:55', '2020-11-18 21:37:12'),
(4, 'A', 2, 'Stage 1', 4, 0, 2, 'I strongly feel other people\'s unexpressed needs and act on them without being asked for it.', NULL, NULL, NULL, NULL, '2020-08-06 04:02:37', '2020-11-18 21:37:40'),
(14, 'A', 5, NULL, NULL, 0, 2, 'I worry that others take me and the things I do for them for granted and don\'t care that much about my needs.', NULL, NULL, NULL, NULL, '2020-08-21 03:33:55', '2020-11-18 21:38:25'),
(15, 'A', 3, NULL, NULL, 0, 2, 'I am generally the \"giver\" in my relationships. It is easier for me to give than to ask for and receive help.', NULL, NULL, NULL, NULL, '2020-08-21 03:34:07', '2020-11-18 21:37:57'),
(16, 'A', 4, NULL, NULL, 1, 2, 'It is easy for me to ask people for the things I need, even if they get annoyed by my requests.', NULL, NULL, NULL, NULL, '2020-08-21 03:34:43', '2020-11-18 21:38:14'),
(17, 'A', 1, NULL, NULL, 0, 1, 'I have a strong conscience – my inner critic is very hard to ignore.', NULL, NULL, NULL, NULL, '2020-08-21 03:34:51', '2020-11-18 21:33:27'),
(18, 'A', 2, NULL, NULL, 0, 1, 'It is hard for me to leave even the smallest mistakes alone and just let it be.', NULL, NULL, NULL, NULL, '2020-08-21 03:38:32', '2020-11-21 16:11:35'),
(19, 'A', 3, NULL, NULL, 0, 1, 'My conscience guides me to do what I think is best and right, even if it is inconvenient and brings me discomfort.', NULL, NULL, NULL, NULL, '2020-08-21 03:39:06', '2020-11-18 21:34:32'),
(20, 'A', 4, NULL, NULL, 0, 1, 'I feel guilty about the times I have gotten angry or lost control over my emotions.', NULL, NULL, NULL, NULL, '2020-08-21 03:39:36', '2020-11-21 16:22:03'),
(21, 'A', 5, NULL, NULL, 1, 1, 'It is easy for me to relax and enjoy, even if I have not yet taken care of all my obligations.', NULL, NULL, NULL, NULL, '2020-08-21 03:39:50', '2020-11-18 21:35:07'),
(22, 'A', 1, NULL, NULL, 0, 3, 'I am sensitive to how my appearance is perceived by others and I can easily change it to connect with others and win them over.', NULL, NULL, NULL, NULL, '2020-08-21 03:40:21', '2020-11-18 21:40:55'),
(23, 'A', 2, NULL, NULL, 0, 3, 'I am efficient and know how to get things done, and I don’t like it when people or circumstances slow me down.', NULL, NULL, NULL, NULL, '2020-08-21 03:41:13', '2020-11-18 21:41:08'),
(24, 'A', 3, NULL, NULL, 0, 3, 'I put a lot of effort into reaching my full potential and want to make the most of my talents.', NULL, NULL, NULL, NULL, '2020-08-21 03:41:48', '2020-11-21 16:19:36'),
(25, 'A', 4, NULL, NULL, 1, 3, 'I am not overly ambitious, so I don\'t let work take up too much space in my life.', NULL, NULL, NULL, NULL, '2020-08-21 03:41:58', '2020-11-18 21:41:36'),
(26, 'A', 5, NULL, NULL, 0, 3, 'It is important for me to be successful and for other people to see me that way.', NULL, NULL, NULL, NULL, '2020-08-21 03:42:10', '2020-11-18 21:41:48'),
(27, 'A', 1, NULL, NULL, 0, 4, 'Being told I\'m odd or weird is welcome proof that I\'m staying true to myself.', NULL, NULL, NULL, NULL, '2020-08-21 03:42:45', '2020-11-18 21:43:53'),
(28, 'A', 2, NULL, NULL, 1, 4, 'I don’t want to stand out too much through my appearance or behavior.', NULL, NULL, NULL, NULL, '2020-08-21 03:42:57', '2020-11-18 21:44:09'),
(29, 'A', 3, NULL, NULL, 0, 4, 'I am longing for other people to understand me, however I have a sense that others will never truly \"get\" me.', NULL, NULL, NULL, NULL, '2020-08-21 03:43:08', '2020-11-18 21:44:21'),
(30, 'A', 4, NULL, NULL, 0, 4, 'I feel my emotions deeply and with great intensity, often to the point that I feel overtaken by them.', NULL, NULL, NULL, NULL, '2020-08-21 03:43:42', '2020-11-18 21:44:36'),
(31, 'A', 5, NULL, NULL, 0, 4, 'I need to show my unique personality more than I feel the need to \"fit in\" and conform.', NULL, NULL, NULL, NULL, '2020-08-21 03:43:54', '2020-11-18 21:44:58'),
(32, 'A', 1, NULL, NULL, 0, 5, 'I take the time to understand things and concepts in very great depth, more than most other people do.', NULL, NULL, NULL, NULL, '2020-09-02 16:13:13', '2020-11-18 21:46:53'),
(34, 'A', 1, NULL, NULL, 0, 7, 'I am really good with the big picture. Detail work, however, stretches my patience.', NULL, NULL, NULL, NULL, '2020-09-02 16:13:56', '2020-11-18 21:53:46'),
(35, 'A', 1, NULL, NULL, 0, 8, 'I can make and communicate tough decisions, even if others don\'t like them.', NULL, NULL, NULL, NULL, '2020-09-02 16:14:10', '2020-11-21 16:09:13'),
(36, 'A', 1, NULL, NULL, 0, 9, 'I like to approach life without haste and hurry in a comfortable manner.', NULL, NULL, NULL, NULL, '2020-09-02 16:14:26', '2020-11-21 16:09:43'),
(37, 'A', 2, NULL, NULL, 0, 5, 'I am a thinker. I enjoy spending a lot of time in my head.', NULL, NULL, NULL, NULL, '2020-09-02 16:15:03', '2020-11-21 16:14:55'),
(38, 'A', 2, NULL, NULL, 0, 6, 'I have been told by others that I am too skeptical when I am just being realistic and cautious.', NULL, NULL, NULL, NULL, '2020-09-02 16:15:49', '2020-11-21 15:52:44'),
(39, 'A', 2, NULL, NULL, 0, 7, 'I naturally blend with the enthusiasm of others, but get distressed when I am around negativity, conflict and anger.', NULL, NULL, NULL, NULL, '2020-09-02 16:16:16', '2020-11-18 21:53:56'),
(40, 'A', 2, NULL, NULL, 1, 8, 'It is easy for me to stand back and let others make decisions.', NULL, NULL, NULL, NULL, '2020-09-02 16:16:30', '2020-11-18 21:56:12'),
(41, 'A', 2, NULL, NULL, 0, 9, 'I feel uncomfortable when situations get too heated or aggressive and tend to withdraw in such moments.', NULL, NULL, NULL, NULL, '2020-09-02 16:16:45', '2020-11-18 21:58:52'),
(42, 'A', 3, NULL, NULL, 0, 5, 'I enjoy searching for answers to difficult and complex questions, and I can spend hours pondering and making sense of the world.', NULL, NULL, NULL, NULL, '2020-09-02 16:17:12', '2020-11-18 21:47:25'),
(43, 'A', 3, NULL, NULL, 0, 6, 'When something goes wrong, I can\'t stop myself from thinking \"this is exactly what I warned about\".', NULL, NULL, NULL, NULL, '2020-09-02 16:17:30', '2020-11-18 21:50:00'),
(44, 'A', 3, NULL, NULL, 0, 7, 'I hate being bored, so I continuously seek new and stimulating people, ideas, or events.', NULL, NULL, NULL, NULL, '2020-09-02 16:18:15', '2020-11-18 21:54:08'),
(45, 'A', 3, NULL, NULL, 0, 8, 'I can come across as tough and forceful, which is why some people see me as intimidating.', NULL, NULL, NULL, NULL, '2020-09-02 16:18:34', '2020-11-21 16:20:49'),
(46, 'A', 3, NULL, NULL, 1, 9, 'When others make me angry I don\'t hesitate to tell them how I feel.', NULL, NULL, NULL, NULL, '2020-09-02 16:18:47', '2020-11-18 21:59:03'),
(47, 'A', 4, NULL, NULL, 1, 5, 'Too much theory feels draining to me.', NULL, NULL, NULL, NULL, '2020-09-02 16:19:46', '2020-11-21 16:23:06'),
(48, 'A', 4, NULL, NULL, 1, 6, 'I rather choose the unpredictable and unknown than the safe and familiar.', NULL, NULL, NULL, NULL, '2020-09-02 16:20:03', '2020-11-18 21:50:17'),
(49, 'A', 4, NULL, NULL, 0, 7, 'Others tell me they appreciate my free-spirited and playful attitude towards life.', NULL, NULL, NULL, NULL, '2020-09-02 16:20:18', '2020-11-18 21:54:20'),
(50, 'A', 4, NULL, NULL, 0, 8, 'I am a strong-willed person who does not back down easily, especially in the face of opposition.', NULL, NULL, NULL, NULL, '2020-09-02 16:20:31', '2020-11-21 16:38:45'),
(51, 'A', 4, NULL, NULL, 0, 9, 'When others upset me, it is hard for me to confront them and clearly express my feelings.', NULL, NULL, NULL, NULL, '2020-09-02 16:20:51', '2020-11-18 21:59:14'),
(52, 'A', 5, NULL, NULL, 0, 5, 'Since I prefer solitude, I can come across to others as self-sufficient and withdrawn.', NULL, NULL, NULL, NULL, '2020-09-02 16:21:14', '2020-11-18 21:47:57'),
(53, 'A', 5, NULL, NULL, 0, 6, 'Safety and security are more important to me than to most people.', NULL, NULL, NULL, NULL, '2020-09-02 16:21:27', '2020-11-18 21:51:02'),
(54, 'A', 5, NULL, NULL, 1, 7, 'I need a high level of predictability in my life, so I persist with things, even when they become boring and mundane.', NULL, NULL, NULL, NULL, '2020-09-02 16:21:38', '2020-11-18 21:54:33'),
(55, 'A', 5, NULL, NULL, 0, 8, 'I am strongly independent and I like to take charge and be in control of situations.', NULL, NULL, NULL, NULL, '2020-09-02 16:22:04', '2020-11-18 21:56:56'),
(56, 'A', 5, NULL, NULL, 0, 9, 'Because I see many points of view, it usually takes time for me to make a decision.', NULL, NULL, NULL, NULL, '2020-09-02 16:22:20', '2020-11-18 22:13:27'),
(57, 'A', 6, NULL, NULL, 0, 1, 'I can come across to others as strict and a little unemotional because I push hard for things to be correct and precise.', NULL, NULL, NULL, NULL, '2020-09-06 21:42:15', '2020-11-18 21:35:25'),
(58, 'A', 6, NULL, NULL, 0, 2, 'I find ways to be important in the lives of other people.', NULL, NULL, NULL, NULL, '2020-09-06 21:42:25', '2020-11-18 21:38:41'),
(59, 'A', 7, NULL, NULL, 0, 2, 'I have the feeling that others don’t do as much for me as I do for them.', NULL, NULL, NULL, NULL, '2020-09-06 21:42:44', '2020-11-18 21:38:56'),
(60, 'A', 8, NULL, NULL, 0, 2, 'Even if it hurts when I feel people don\'t appreciate what I do for them, I don\'t show it.', NULL, NULL, NULL, NULL, '2020-09-06 21:42:56', '2020-11-18 21:39:45'),
(61, 'A', 9, NULL, NULL, 0, 2, 'Throughout most of my life I have put the needs of others before my own needs and wellbeing.', NULL, NULL, NULL, NULL, '2020-09-06 21:43:07', '2020-11-18 21:40:04'),
(62, 'A', 7, NULL, NULL, 0, 1, 'I want to avoid mistakes by all means, which is why I am well-organized and structured and will plan things meticulously.', NULL, NULL, NULL, NULL, '2020-09-06 21:43:22', '2020-11-18 21:35:40'),
(63, 'A', 8, NULL, NULL, 0, 1, 'I feel annoyed when others do not work as hard, precise and thorough as I do.', NULL, NULL, NULL, NULL, '2020-09-06 21:43:34', '2020-11-21 16:39:56'),
(64, 'A', 9, NULL, NULL, 0, 1, 'I have a clear sense of right or wrong, and integrity is very important to me.', NULL, NULL, NULL, NULL, '2020-09-06 21:43:43', '2020-11-18 21:36:09'),
(65, 'A', 6, NULL, NULL, 0, 3, 'Recognition, success and personal image matter to me.', NULL, NULL, NULL, NULL, '2020-09-06 21:44:00', '2020-11-21 16:23:29'),
(66, 'A', 7, NULL, NULL, 0, 3, 'I generally appear even-tempered and calm, even when I am under enormous strain.', NULL, NULL, NULL, NULL, '2020-09-06 21:44:11', '2020-11-18 21:42:17'),
(67, 'A', 8, NULL, NULL, 0, 3, 'I try to be the best at what I do and want to impress and inspire others with my achievements.', NULL, NULL, NULL, NULL, '2020-09-06 21:44:25', '2020-11-21 15:59:17'),
(68, 'A', 9, NULL, NULL, 0, 3, 'I enjoy setting and achieving ambitious goals. Working towards my goals has been a top priority for most of my life.', NULL, NULL, NULL, NULL, '2020-09-06 21:44:34', '2020-11-18 21:42:45'),
(69, 'A', 6, NULL, NULL, 0, 4, 'Melancholy is comfortable for me, so it’s annoying when people constantly try to cheer me up.', NULL, NULL, NULL, NULL, '2020-09-06 21:44:50', '2020-11-18 21:45:12'),
(70, 'A', 7, NULL, NULL, 0, 4, 'I don\'t let it show, but if I\'m with another person who is as unique as I am, I get a bit jealous.', NULL, NULL, NULL, NULL, '2020-09-06 21:45:04', '2020-11-18 21:45:28'),
(71, 'A', 8, NULL, NULL, 0, 4, 'Expressing my \"quirky\" personal style through my clothes, art and home is an important aspect of who I am.', NULL, NULL, NULL, NULL, '2020-09-06 21:45:13', '2020-11-18 21:45:42'),
(72, 'A', 9, NULL, NULL, 0, 4, 'I have to stay true to myself. When I can\'t add my authentic and unique touch to things, I quickly question the use of my involvement.', NULL, NULL, NULL, NULL, '2020-09-06 21:45:25', '2020-11-18 21:45:54'),
(73, 'A', 6, NULL, NULL, 0, 5, 'I want to think, observe and extensively gather information before I go into action.', NULL, NULL, NULL, NULL, '2020-09-06 21:46:10', '2020-11-18 21:48:10'),
(74, 'A', 7, NULL, NULL, 0, 5, 'I feel uncomfortable when people want me to show my feelings or display strong emotions.', NULL, NULL, NULL, NULL, '2020-09-06 21:46:21', '2020-11-18 21:48:21'),
(75, 'A', 8, NULL, NULL, 0, 5, 'I treasure knowledge and quietly do extensive research, but I don\'t necessarily have to share my findings with others.', NULL, NULL, NULL, NULL, '2020-09-06 21:46:34', '2020-11-18 21:48:35'),
(76, 'A', 9, NULL, NULL, 0, 5, 'It generally has been easy for me to concentrate very deeply on my work or whatever I turn my attention to.', NULL, NULL, NULL, NULL, '2020-09-06 21:46:43', '2020-11-18 21:48:48'),
(77, 'A', 6, NULL, NULL, 0, 6, 'I can\'t hold myself from seeing hidden threats and imagining what dangers might arise from any given situation.', NULL, NULL, NULL, NULL, '2020-09-06 21:47:04', '2020-11-18 21:51:14'),
(78, 'A', 7, NULL, NULL, 0, 6, 'I feel more secure obeying people and norms, however there are times when I can\'t hold myself from rebelling.', NULL, NULL, NULL, NULL, '2020-09-06 21:47:13', '2020-11-18 21:51:27'),
(79, 'A', 8, NULL, NULL, 0, 6, 'Change and big decisions make me nervous and worried. But I certainly don’t want anyone else to make decisions for me.', NULL, NULL, NULL, NULL, '2020-09-06 21:47:23', '2020-11-18 21:51:37'),
(80, 'A', 9, NULL, NULL, 0, 6, 'I often feel suspicious of the motives and agendas of people who flatter me.', NULL, NULL, NULL, NULL, '2020-09-06 21:47:36', '2020-11-18 21:51:54'),
(81, 'A', 1, NULL, NULL, 0, 6, 'I enjoy the predictable and safe more than exploring the unknown.', NULL, NULL, NULL, NULL, '2020-09-06 21:48:08', '2020-11-18 21:49:38'),
(82, 'A', 6, NULL, NULL, 0, 7, 'Enjoying life and having fun is more important than discipline and self-control.', NULL, NULL, NULL, NULL, '2020-09-06 21:48:36', '2020-11-18 21:54:44'),
(83, 'A', 7, NULL, NULL, 0, 7, 'When things get boring or predictable, I swiftly pivot to something new, even if the current project is still ongoing.', NULL, NULL, NULL, NULL, '2020-09-06 21:48:46', '2020-11-18 21:54:57'),
(84, 'A', 8, NULL, NULL, 0, 7, 'I enjoy the good things in life and love to get a kick out of things, even if it means that I sometimes overindulge.', NULL, NULL, NULL, NULL, '2020-09-06 21:49:00', '2020-11-18 21:55:08'),
(85, 'A', 9, NULL, NULL, 0, 7, 'Since I need a lot of excitement in life, I love to entertain, travel, and enjoy myself with my friends.', NULL, NULL, NULL, NULL, '2020-09-06 21:49:11', '2020-11-18 21:55:21'),
(86, 'A', 6, NULL, NULL, 0, 8, 'When I see something I feel is unfair, I do not hesitate to call people out on it.', NULL, NULL, NULL, NULL, '2020-09-06 21:50:27', '2020-11-18 21:57:13'),
(87, 'A', 7, NULL, NULL, 0, 8, 'When others are not sure what to do, it’s usually me who takes action.', NULL, NULL, NULL, NULL, '2020-09-06 21:50:37', '2020-11-18 21:57:25'),
(88, 'A', 8, NULL, NULL, 0, 8, 'I want others to tell me the truth and not spare my feelings.', NULL, NULL, NULL, NULL, '2020-09-06 21:50:46', '2020-11-18 21:57:36'),
(89, 'A', 9, NULL, NULL, 0, 8, 'I don’t mind confrontation. I even enjoy pushback – it gives me a challenge to overcome.', NULL, NULL, NULL, NULL, '2020-09-06 21:50:56', '2020-11-18 21:57:48'),
(90, 'A', 6, NULL, NULL, 0, 9, 'When others ask me to do things I don\'t want to do, I frequently struggle to say \"no\" as I don\'t want to trigger a confrontation.', NULL, NULL, NULL, NULL, '2020-09-06 21:51:22', '2020-11-21 15:57:45'),
(91, 'A', 7, NULL, NULL, 0, 9, 'I can be a big procrastinator on projects that challenge my inner peace.', NULL, NULL, NULL, NULL, '2020-09-06 21:51:31', '2020-11-21 16:39:34'),
(92, 'A', 8, NULL, NULL, 0, 9, 'I am often not clear on what I want out of a situation, so I tend to go along with what other people want.', NULL, NULL, NULL, NULL, '2020-09-06 21:51:40', '2020-11-18 22:00:01'),
(93, 'A', 9, NULL, NULL, 0, 9, 'I am such a good listener that I tend to fade into the background in group discussions.', NULL, NULL, NULL, NULL, '2020-09-06 21:51:51', '2020-11-18 22:00:12'),
(199, 'A', 10, NULL, NULL, 0, 1, 'I find it hard to relax and have fun until I have taken care of all my duties.', NULL, NULL, NULL, NULL, '2020-09-28 12:02:56', '2020-11-18 21:36:29'),
(200, 'A', 10, NULL, NULL, 0, 2, 'I have often overextended myself in caring for others at the cost of taking care of myself.', NULL, NULL, NULL, NULL, '2020-09-28 12:03:08', '2020-11-18 21:40:20'),
(201, 'A', 10, NULL, NULL, 0, 3, 'Because I care what others think about me, I want my achievements to be seen.', NULL, NULL, NULL, NULL, '2020-09-28 12:03:21', '2020-11-18 21:43:04'),
(202, 'A', 10, NULL, NULL, 0, 4, 'I have many bittersweet memories of the past and think about past events with great longing and sentimentality.', NULL, NULL, NULL, NULL, '2020-09-28 12:03:32', '2020-11-18 21:46:09'),
(203, 'A', 10, NULL, NULL, 0, 5, 'When I’m on a project, I want to concentrate deeply without any interruptions, so I prefer not to see people while I\'m busy.', NULL, NULL, NULL, NULL, '2020-09-28 12:03:46', '2020-11-18 21:49:03'),
(204, 'A', 10, NULL, NULL, 0, 6, 'I want to trust others, but I have to assess their underlying intentions and motivations first.', NULL, NULL, NULL, NULL, '2020-09-28 12:03:57', '2020-11-18 21:52:06'),
(205, 'A', 10, NULL, NULL, 0, 7, 'I don\'t want to miss out on new and exciting things, so I try to keep my obligations and commitments small.', NULL, NULL, NULL, NULL, '2020-09-28 12:04:08', '2020-11-18 21:55:32'),
(206, 'A', 10, NULL, NULL, 0, 8, 'It is quite hard for me to give way and let others make decisions.', NULL, NULL, NULL, NULL, '2020-09-28 12:04:19', '2020-11-18 21:58:02'),
(207, 'A', 10, NULL, NULL, 0, 9, 'I thrive in a calm and warm environment and will avoid conflict and turmoil at all costs.', NULL, NULL, NULL, NULL, '2020-09-28 12:04:35', '2020-11-18 22:00:23'),
(208, 'B', 1, NULL, NULL, 0, NULL, NULL, 1, 2, 'I have gotten irritated when other people do not listen to what I have told them.', 'I have gotten irritated when other people did not show enough appreciation for what I have done for them.', '2020-11-20 16:06:25', '2020-12-04 13:57:45'),
(209, 'B', 2, NULL, NULL, 0, NULL, NULL, 1, 2, 'I have been concerned that other people’s activities would distract me from my tasks.', 'I have been concerned that I would be left out of other people\'s activities.', '2020-11-20 16:07:32', '2020-11-20 16:09:44'),
(210, 'B', 3, NULL, NULL, 0, NULL, NULL, 1, 2, 'I have tended to feel that real love does not necessarily depend on physical contact.', 'I have tended to give a lot of physical contact to affirm others about how I feel about them.', '2020-11-20 16:10:43', '2020-11-20 16:10:43'),
(211, 'B', 4, NULL, NULL, 0, NULL, NULL, 1, 2, 'Typically, I have been a reserved, serious person who likes discussing issues.', 'Typically, I have been a supportive, giving person, seeking intimacy with others.', '2020-11-20 16:11:09', '2020-11-20 16:11:09'),
(212, 'B', 1, NULL, NULL, 0, NULL, NULL, 1, 3, 'I have tended to be formal, direct and idealistic.', 'I have tended to be diplomatic, charming, and pragmatic.', '2020-11-20 16:11:42', '2020-11-20 16:11:42'),
(213, 'B', 2, NULL, NULL, 0, NULL, NULL, 1, 3, 'Throughout my life, my values and way of living have remained quite consistent.', 'Throughout my life, my values and way of living have changed several times.', '2020-11-20 16:12:37', '2020-11-20 16:12:37'),
(214, 'B', 3, NULL, NULL, 0, NULL, NULL, 1, 3, 'I have taken pride in my ability to take a stand – I have been firm about my convictions.', 'I have taken pride in my ability to be flexible – what is important and suitable often changes.', '2020-11-20 16:13:24', '2020-11-20 16:13:24'),
(215, 'B', 4, NULL, NULL, 0, NULL, NULL, 1, 3, 'For most of my life, being accepted and well-liked has not been a high priority for me.', 'For most of my life, being accepted and well-liked by others have been important to me.', '2020-11-20 16:13:49', '2020-11-20 16:13:49'),
(216, 'B', 1, NULL, NULL, 0, NULL, NULL, 1, 4, 'I have typically been driven and very disciplined.', 'I have typically been too emotional and rather undisciplined.', '2020-11-20 16:14:23', '2020-11-20 16:14:23'),
(217, 'B', 4, NULL, NULL, 0, NULL, NULL, 1, 4, 'I have upset people by telling them what to do.', 'I have upset people by being stand-offish and aloof.', '2020-11-20 16:14:51', '2020-11-20 16:14:51'),
(218, 'B', 2, NULL, NULL, 0, NULL, NULL, 1, 4, 'I have tended to help others see that they are making a mistake.', 'I have tended to not speak up when I have seen others make a mistake.', '2020-11-20 16:16:00', '2020-11-20 16:16:00'),
(219, 'B', 3, NULL, NULL, 0, NULL, NULL, 1, 4, 'For most of my life, I have been a highly structured and responsible person.', 'For most of my life, I have been a highly intuitive and individualistic person.', '2020-11-20 16:16:24', '2020-11-20 16:16:24'),
(220, 'B', 1, NULL, NULL, 0, NULL, NULL, 1, 5, 'I have tended to have strong convictions and a sense of how things should be.', 'I have tended to have serious doubts and have questioned how things seemed to be.', '2020-11-20 16:17:33', '2020-11-20 16:17:33'),
(221, 'B', 2, NULL, NULL, 0, NULL, NULL, 1, 5, 'I have struggled to take it easy and be more flexible.', 'I have struggled to stop pondering alternatives and get practical.', '2020-11-20 16:17:59', '2020-11-20 16:17:59'),
(222, 'B', 3, NULL, NULL, 0, NULL, NULL, 1, 5, 'I have typically been quick to go into action.', 'I have typically been rather slow to go into action.', '2020-11-20 16:18:30', '2020-11-20 16:18:30'),
(223, 'B', 4, NULL, NULL, 0, NULL, NULL, 1, 5, 'I have often perceived others as irresponsible and disorganized.', 'I have often perceived others as demanding and intrusive.', '2020-11-20 16:18:53', '2020-11-20 16:18:53'),
(224, 'B', 1, NULL, NULL, 0, NULL, NULL, 1, 6, 'During most of my life, fulfilling social obligations has seldom been my priority.', 'During most of my life, I have usually taken my social obligations very seriously.', '2020-11-20 16:19:33', '2020-11-20 16:19:33'),
(225, 'B', 4, NULL, NULL, 0, NULL, NULL, 1, 6, 'I have been perceived by others as being too sure of myself.', 'I have been perceived by others as being too unsure of myself.', '2020-11-20 16:20:18', '2020-11-20 16:20:18'),
(226, 'B', 2, NULL, NULL, 0, NULL, NULL, 1, 6, 'In the past, I have struggled with anger, perfectionism, and impatience.', 'In the past, I have struggled with nervousness, insecurity, and doubt.', '2020-11-20 16:20:35', '2020-11-20 16:20:35'),
(227, 'B', 3, NULL, NULL, 0, NULL, NULL, 1, 6, 'I have tended not to compromise what is right even for my friends.', 'I have tended to compromise what is right to stand by my friends.', '2020-11-20 16:21:09', '2020-11-20 16:21:09'),
(228, 'B', 4, NULL, NULL, 0, NULL, NULL, 1, 7, 'I have tended to be free-roaming and tolerating with myself.', 'I have tended to be serious and strict with myself.', '2020-11-20 16:21:51', '2020-11-20 16:21:51'),
(229, 'B', 1, NULL, NULL, 0, NULL, NULL, 1, 7, 'I have generally been guided by my conscience and reason.', 'I have generally been guided by my feelings and impulses.', '2020-11-20 16:22:21', '2020-11-20 16:22:21'),
(230, 'B', 2, NULL, NULL, 0, NULL, NULL, 1, 7, 'During most of my life, I have been self-disciplined and earnest.', 'During most of my life, I have been sociable and outgoing.', '2020-11-20 16:22:44', '2020-11-20 16:22:44'),
(231, 'B', 3, NULL, NULL, 0, NULL, NULL, 1, 7, 'Typically, I have not liked to lose control of myself very much.', 'Typically, I have liked to push the limits and let loose.', '2020-11-20 16:23:03', '2020-11-20 16:23:03'),
(232, 'B', 1, NULL, NULL, 0, NULL, NULL, 1, 8, 'I have tended to be more of a high minded idealist.', 'I have tended to be more of a street-smart survivor.', '2020-11-20 16:23:34', '2020-11-20 16:23:34'),
(233, 'B', 4, NULL, NULL, 0, NULL, NULL, 1, 8, 'My approach to motivate others has been by pointing out the consequences of not following my advice.', 'My approach to motivate others has been by making big plans and big promises.', '2020-11-20 16:23:51', '2020-11-20 16:23:51'),
(234, 'B', 2, NULL, NULL, 0, NULL, NULL, 1, 8, 'Other people have put their trust in me because I am fair and will do what is right.', 'Other people have put their trust in me because I am confident and can watch out for them.', '2020-11-20 16:24:10', '2020-11-20 16:24:10'),
(235, 'B', 3, NULL, NULL, 0, NULL, NULL, 1, 8, 'At times I have upset people by being too uptight.', 'At times I have upset people by being too aggressive.', '2020-11-20 16:24:31', '2020-11-20 16:24:31'),
(236, 'B', 4, NULL, NULL, 0, NULL, NULL, 1, 9, 'I have tended to be too uncompromising and demanding with others.', 'I have tended to give in too easily and let others take the lead.', '2020-11-20 16:24:51', '2020-11-20 16:24:51'),
(237, 'B', 1, NULL, NULL, 0, NULL, NULL, 1, 9, 'I have typically viewed myself as a serious, honorable person.', 'I have typically viewed myself as a sunny, casual person.', '2020-11-20 16:25:10', '2020-11-20 16:25:10'),
(238, 'B', 2, NULL, NULL, 0, NULL, NULL, 1, 9, 'I have often asked myself why people are so happy when there so much in life that is messed up.', 'I have often asked myself why people focus on the negative when there is so much good in life.', '2020-11-20 16:25:35', '2020-11-20 16:25:35'),
(239, 'B', 3, NULL, NULL, 0, NULL, NULL, 1, 9, 'My tendency has been to get things done correctly, even if it made others uncomfortable.', 'My tendency has been to avoid feeling pressured, so I have not liked pressuring anyone else.', '2020-11-20 16:25:59', '2020-11-20 16:25:59'),
(240, 'B', 1, NULL, NULL, 0, NULL, NULL, 2, 3, 'Typically, I have been more relationship-oriented than goal-oriented.', 'Typically, I have been more goal-oriented than relationship-oriented.', '2020-11-20 16:27:13', '2020-11-20 16:27:13'),
(241, 'B', 4, NULL, NULL, 0, NULL, NULL, 2, 3, 'Mostly, I have been a well-meaning supporter.', 'Mostly, I have been a highly-motivated go-getter.', '2020-11-20 16:27:33', '2020-11-20 16:27:33'),
(242, 'B', 2, NULL, NULL, 0, NULL, NULL, 2, 3, 'I have tended towards being too personal and intimate.', 'I have tended towards being too cool and unapproachable.', '2020-11-20 16:27:51', '2020-11-20 16:27:51'),
(243, 'B', 3, NULL, NULL, 0, NULL, NULL, 2, 3, 'I might have insisted on too much closeness with my friends in the past.', 'I might have kept too much distance from my friends in the past.', '2020-11-20 16:28:11', '2020-11-20 16:28:11'),
(244, 'B', 1, NULL, NULL, 0, NULL, NULL, 2, 4, 'Generally, I have been very hospitable and have enjoyed welcoming new friends into my life.', 'Generally, I have been withdrawn and have had difficulty mixing with others.', '2020-11-20 16:28:38', '2020-11-20 16:28:38'),
(245, 'B', 4, NULL, NULL, 0, NULL, NULL, 2, 4, 'Others have noticed me because I have been outgoing, engaging, and interested in them.', 'Others have noticed me because I have been unusual, deep and quiet.', '2020-11-20 16:28:58', '2020-11-20 16:28:58'),
(246, 'B', 2, NULL, NULL, 0, NULL, NULL, 2, 4, 'I have sometimes neglected my well-being and health because of my strong drive to help others.', 'I have sometimes neglected my relationships because of my strong drive to attend to my personal needs.', '2020-11-20 16:29:20', '2020-11-20 16:29:20'),
(247, 'B', 3, NULL, NULL, 0, NULL, NULL, 2, 4, 'I have had the tendency to give my affection too freely, and have wanted to reach out to others.', 'I have had the tendency to withhold my affection, and have wanted others to enter into my world.', '2020-11-20 16:30:31', '2020-11-20 16:30:31'),
(248, 'B', 1, NULL, NULL, 0, NULL, NULL, 2, 5, 'I have typically felt the urge to show affection to people.', 'I have typically felt more comfortable maintaining some distance to people.', '2020-11-20 16:31:24', '2020-11-20 16:31:24'),
(249, 'B', 2, NULL, NULL, 0, NULL, NULL, 2, 5, 'Attending to the needs of others and being of service has been very important to me.', 'Seeking alternative ways of seeing and doing things has been very important to me.', '2020-11-20 16:31:50', '2020-11-20 16:31:50'),
(250, 'B', 4, NULL, NULL, 0, NULL, NULL, 2, 5, 'I have often shown strong emotions to others.', 'I have rarely shown strong emotions to others.', '2020-11-20 16:32:13', '2020-11-20 16:32:13'),
(251, 'B', 3, NULL, NULL, 0, NULL, NULL, 2, 5, 'I have often been so preoccupied with others that I have neglected my own projects.', 'I have often been so absorbed in my own projects that I have become isolated from others.', '2020-11-20 16:32:31', '2020-11-20 16:32:31'),
(252, 'B', 1, NULL, NULL, 0, NULL, NULL, 2, 6, 'I have had the tendency of being too possessive and involved in the lives of loved ones.', 'I have had the tendency of \"testing\" loved ones to see if they were really there for me.', '2020-11-20 16:32:54', '2020-11-20 16:32:54'),
(253, 'B', 4, NULL, NULL, 0, NULL, NULL, 2, 6, 'I have often asked myself how I could get closer to others.', 'I have often asked myself what it is that others want from me.', '2020-11-20 16:33:11', '2020-11-20 16:33:11'),
(254, 'B', 2, NULL, NULL, 0, NULL, NULL, 2, 6, 'I have sometimes upset others by being too intrusive and interfering.', 'I have sometimes upset others by being too evasive and uncommunicative.', '2020-11-20 16:33:29', '2020-11-20 16:33:29'),
(255, 'B', 3, NULL, NULL, 0, NULL, NULL, 2, 6, 'I have tended to be a bit sentimental and mushy.', 'I have tended to be a bit skeptical and cynical.', '2020-11-20 16:33:54', '2020-11-20 16:33:54'),
(256, 'B', 1, NULL, NULL, 0, NULL, NULL, 2, 7, 'I have generally been delighted in how important I am in people\'s lives.', 'I have generally been delighted in my enthusiasm and openness to new experiences.', '2020-11-20 16:34:50', '2020-11-20 16:34:50'),
(257, 'B', 2, NULL, NULL, 0, NULL, NULL, 2, 7, 'I am concerned not to be perceived as a selfish person.', 'I am concerned not to be perceived as a boring person.', '2020-11-20 16:35:08', '2020-11-20 16:35:08'),
(258, 'B', 4, NULL, NULL, 0, NULL, NULL, 2, 7, 'Others like me for my deep caring and personal warmth.', 'Others like me for my unsinkable spirit and resourcefulness.', '2020-11-20 16:35:33', '2020-11-20 16:35:33'),
(259, 'B', 3, NULL, NULL, 0, NULL, NULL, 2, 7, 'During most of my life, I have had a caring heart and strong dedication.', 'During most of my life, I have had a vivid mind and boundless energy.', '2020-11-20 16:35:52', '2020-11-20 16:35:52'),
(260, 'B', 1, NULL, NULL, 0, NULL, NULL, 2, 8, 'Others appreciate me for the attention and encouragement I give them.', 'Others appreciate me for the direction and motivation I give them.', '2020-11-20 16:36:12', '2020-11-20 16:36:12'),
(261, 'B', 4, NULL, NULL, 0, NULL, NULL, 2, 8, 'I have tended to jump in and rescue people.', 'I have tended to show people how to help themselves.', '2020-11-20 16:37:57', '2020-11-20 16:37:57'),
(262, 'B', 2, NULL, NULL, 0, NULL, NULL, 2, 8, 'I have generally enjoyed comforting people and calming them down.', 'I have generally enjoyed challenging people and shaking them up.', '2020-11-20 16:38:21', '2020-11-20 16:38:21'),
(263, 'B', 3, NULL, NULL, 0, NULL, NULL, 2, 8, 'The way I try to present myself to others has typically been more caring than I really am.', 'The way I try to present myself to others has typically been tougher than I really am.', '2020-11-20 16:38:47', '2020-11-20 16:38:47'),
(264, 'B', 4, NULL, NULL, 0, NULL, NULL, 2, 9, 'Typically, I have acted on my feelings and let the \"chips fall where they may\".', 'Typically, I have avoided acting on my feelings as they could stir up more trouble.', '2020-11-20 16:39:13', '2020-11-20 16:39:13'),
(265, 'B', 1, NULL, NULL, 0, NULL, NULL, 2, 9, 'I have tended not to assert myself enough with others.', 'I have tended to come across a bit too intense with others.', '2020-11-20 16:39:33', '2020-11-20 16:39:33'),
(266, 'B', 2, NULL, NULL, 0, NULL, NULL, 2, 9, 'My urge to have others depend on me has caused me trouble with people.', 'My reluctance to get involved has caused me trouble with people.', '2020-11-20 16:39:54', '2020-11-20 16:39:54'),
(267, 'B', 3, NULL, NULL, 0, NULL, NULL, 2, 9, 'I guess, I have been too controlling and involved with people.', 'I guess I have been too uninvolved and passive with people.', '2020-11-20 16:40:12', '2020-11-20 16:40:12'),
(268, 'B', 1, NULL, NULL, 0, NULL, NULL, 3, 4, 'To get the job, I was typically able to put my feelings aside.', 'To get the job, I typically needed to work through my feelings first before I could get going.', '2020-11-20 16:42:02', '2020-11-20 16:42:02'),
(269, 'B', 4, NULL, NULL, 0, NULL, NULL, 3, 4, 'It has generally felt quite natural to me to be at the center of attention.', 'It has generally felt quite strange to me to be at the center of attention.', '2020-11-20 16:42:34', '2020-11-20 16:42:34'),
(270, 'B', 2, NULL, NULL, 0, NULL, NULL, 3, 4, 'I have tended to be even-tempered.', 'I have tended to have strong mood swings.', '2020-11-20 16:43:04', '2020-11-20 16:43:04'),
(271, 'B', 3, NULL, NULL, 0, NULL, NULL, 3, 4, 'In the past, I have rarely let self-doubt stand in my way.', 'In the past, I have often got stuck struggling with self-doubt.', '2020-11-20 16:43:26', '2020-11-20 16:43:26'),
(272, 'B', 1, NULL, NULL, 0, NULL, NULL, 3, 5, 'For most of my life, my tendency has been to make a favorable impression on others.', 'For most of my life, I have cared little about making a favorable impression on others.', '2020-11-20 16:43:48', '2020-11-20 16:43:48'),
(273, 'B', 2, NULL, NULL, 0, NULL, NULL, 3, 5, 'I have typically followed activities that had a considerable potential for reward and personal recognition.', 'I have typically been willing to give up reward and personal recognition if it meant pursuing work I was really interested in.', '2020-11-20 16:44:11', '2020-11-20 16:44:11'),
(274, 'B', 4, NULL, NULL, 0, NULL, NULL, 3, 5, 'I have tended to avoid intimacy when I feared I would be overwhelmed by others’ demands and needs.', 'I have tended to avoid intimacy when I feared I would not be able to live up to others’ expectations of me.', '2020-11-20 16:44:41', '2020-11-20 16:44:41'),
(275, 'B', 3, NULL, NULL, 0, NULL, NULL, 3, 5, 'I have been told that I have often been perceived by others as presentable, even admirable.', 'I have been told that I have been perceived by others as unusual, even odd.', '2020-11-20 16:45:55', '2020-11-20 16:45:55'),
(276, 'B', 1, NULL, NULL, 0, NULL, NULL, 3, 6, 'When I don\'t like people, I have typically tried hard to stay pleasant – despite my feelings.', 'When I don\'t like people, I have typically let them know it — one way or another.', '2020-11-21 14:23:10', '2020-11-21 14:23:10'),
(277, 'B', 4, NULL, NULL, 0, NULL, NULL, 3, 6, 'In moments where I have felt insecure, I have often reacted by becoming dismissive and arrogant.', 'In moments where I have felt insecure, I have often reacted by becoming argumentative and defensive.', '2020-11-21 14:23:27', '2020-11-21 14:23:27'),
(278, 'B', 2, NULL, NULL, 0, NULL, NULL, 3, 6, 'I have not depended on people. I have usually done things on my own.', 'I have depended on my friends, and they know that they can depend on me.', '2020-11-21 14:23:51', '2020-11-21 14:23:51'),
(279, 'B', 3, NULL, NULL, 0, NULL, NULL, 3, 6, 'Despite the setbacks I had, I have usually had a lot of confidence in my abilities.', 'Despite my successes, my tendency has been to doubt my abilities.', '2020-11-21 14:24:06', '2020-11-21 14:24:06'),
(280, 'B', 1, NULL, NULL, 0, NULL, NULL, 3, 7, 'Dealing with details has not been a problem for me.', 'Dealing with details has not been one of my strengths.', '2020-11-21 14:24:33', '2020-11-21 14:24:33'),
(281, 'B', 2, NULL, NULL, 0, NULL, NULL, 3, 7, 'Before I start something new, I have typically asked myself if it will be useful to me.', 'Before I start something new, I have typically asked myself if it will be enjoyable.', '2020-11-21 14:24:56', '2020-11-21 14:24:56'),
(282, 'B', 4, NULL, NULL, 0, NULL, NULL, 3, 7, 'When getting to know someone new, I have usually been imposing and self-assured.', 'When getting to know someone new, I have typically been chatty and entertaining.', '2020-11-21 14:25:14', '2020-11-21 14:25:14'),
(283, 'B', 3, NULL, NULL, 0, NULL, NULL, 3, 7, 'I have typically been focused and persistent in pursuing my goals.', 'I have typically followed various courses of action to see where they lead.', '2020-11-21 14:25:29', '2020-11-21 14:25:29'),
(284, 'B', 1, NULL, NULL, 0, NULL, NULL, 3, 8, 'In situations where I had to confront someone, I have often beaten around the bush too much.', 'In situations where I had to confront someone, I have often been too harsh and direct.', '2020-11-21 14:26:04', '2020-11-21 14:26:04'),
(285, 'B', 2, NULL, NULL, 0, NULL, NULL, 3, 8, 'When I have gotten angry, my tendency has been to distance myself.', 'When I have gotten angry, my tendency has been to tell others off.', '2020-11-21 14:26:24', '2020-11-21 14:26:24'),
(286, 'B', 3, NULL, NULL, 0, NULL, NULL, 3, 8, 'Being valued and admired has generally been important to me.', 'Being autonomous and self-dependent has generally been important to me.', '2020-11-21 14:26:42', '2020-11-21 14:26:42'),
(287, 'B', 4, NULL, NULL, 0, NULL, NULL, 3, 8, 'In the past, I have frequently felt the need to perform with excellence.', 'In the past, I have frequently felt the need to be a pillar of strength.', '2020-11-21 14:27:02', '2020-11-21 14:27:02'),
(288, 'B', 1, NULL, NULL, 0, NULL, NULL, 3, 9, 'Because I get uncomfortable when I don\'t distinguish myself, I have generally wanted to stand out from others.', 'Because I get uncomfortable when I stand out too much, I have generally wanted to fit in with others.', '2020-11-21 14:27:27', '2020-11-21 14:27:27'),
(289, 'B', 2, NULL, NULL, 0, NULL, NULL, 3, 9, 'For most of my life, I have been self-assured and ambitious.', 'For most of my life, I have been unobtrusive and have been happy to go at my own pace.', '2020-11-21 14:27:50', '2020-11-21 14:27:50'),
(290, 'B', 3, NULL, NULL, 0, NULL, NULL, 3, 9, 'I have tended to be too concerned with doing better than others.', 'I have tended to be too concerned with making things okay for others.', '2020-11-21 14:28:10', '2020-11-21 14:28:10'),
(291, 'B', 4, NULL, NULL, 0, NULL, NULL, 3, 9, 'In moments of serious adversity, I have typically felt hardened and determined.', 'In moments of serious adversity, I have typically felt discouraged and resigned.', '2020-11-21 14:28:26', '2020-11-21 14:28:26'),
(292, 'B', 1, NULL, NULL, 0, NULL, NULL, 4, 5, 'My inclination has been to dwell on my feelings and to hold onto them for a long time.', 'My inclination has been to keep my feelings to a minimum and not give them too much attention.', '2020-11-21 14:28:50', '2020-11-21 14:28:50'),
(293, 'B', 2, NULL, NULL, 0, NULL, NULL, 4, 5, 'A lot of my struggles with others stem from my touchiness and taking everything too personally.', 'A lot of my struggles with others stem from my not caring about social conventions.', '2020-11-21 14:29:11', '2020-11-21 14:29:11'),
(294, 'B', 3, NULL, NULL, 0, NULL, NULL, 4, 5, 'I have had the tendency to be self-absorbed and moody.', 'I have had the tendency to be detached and absentminded.', '2020-11-21 14:29:33', '2020-11-21 14:29:33'),
(295, 'B', 4, NULL, NULL, 0, NULL, NULL, 4, 5, 'For most of my life, I have been self-revealing and willing to share my feelings with others.', 'For most of my life, I have been open-minded and willing to try new approaches.', '2020-11-21 14:29:56', '2020-11-21 14:29:56'),
(296, 'B', 1, NULL, NULL, 0, NULL, NULL, 4, 6, 'Generally speaking, I have been imaginative and romantic.', 'Generally speaking, I have been pragmatic and reasonable.', '2020-11-21 14:30:21', '2020-11-21 14:30:21'),
(297, 'B', 2, NULL, NULL, 0, NULL, NULL, 4, 6, 'I have typically relied on my imagination and moments of inspiration.', 'I have typically relied on my perseverance and common sense.', '2020-11-21 14:30:42', '2020-11-21 14:30:42'),
(298, 'B', 3, NULL, NULL, 0, NULL, NULL, 4, 6, 'For most of my life, I did what I wanted to do.', 'For most of my life, I did what I had to do.', '2020-11-21 14:31:06', '2020-11-21 14:31:06'),
(299, 'B', 4, NULL, NULL, 0, NULL, NULL, 4, 6, 'I have had a strong desire to feel balanced.', 'I have had a strong desire to belong.', '2020-11-21 14:31:26', '2020-11-21 14:31:26'),
(300, 'B', 4, NULL, NULL, 0, NULL, NULL, 4, 7, 'Speaking up for myself has generally been difficult for me.', 'Speaking up for myself comes naturally to me.', '2020-11-21 14:32:02', '2020-11-21 14:32:02'),
(301, 'B', 1, NULL, NULL, 0, NULL, NULL, 4, 7, 'In troubled moments, I have tended to ponder my problems.', 'In troubled moments, I have tended to seek distractions for myself.', '2020-11-21 14:32:25', '2020-11-21 14:32:25'),
(302, 'B', 3, NULL, NULL, 0, NULL, NULL, 4, 7, 'I have sometimes missed out because I felt like I was not up to take an opportunity.', 'I have sometimes missed out because I have pursued too many possibilities at the same time.', '2020-11-21 14:33:14', '2020-11-21 14:33:14'),
(303, 'B', 2, NULL, NULL, 0, NULL, NULL, 4, 7, 'My tendency has been to dwell upon things from the past.', 'My tendency has been to anticipate things I am going to do.', '2020-11-21 14:33:36', '2020-11-21 14:33:36'),
(304, 'B', 1, NULL, NULL, 0, NULL, NULL, 4, 8, 'In the past, when conflicts arose, my tendency has been to withdraw.', 'In the past, when conflicts arose, I have seldom backed down.', '2020-11-21 14:33:56', '2020-11-21 14:33:56'),
(305, 'B', 2, NULL, NULL, 0, NULL, NULL, 4, 8, 'I have spent a lot of time exploring my inner world. It has been important to me to understand my feelings.', 'I haven\'t spent a lot of time exploring my inner world. It has been important to me to get things done.', '2020-11-21 14:34:16', '2020-11-21 14:34:16'),
(306, 'B', 3, NULL, NULL, 0, NULL, NULL, 4, 8, 'Being able to describe internal states has been one of my strong suits.', 'Being able to take charge of situations has been one of my strong suits.', '2020-11-21 14:34:50', '2020-11-21 14:34:50'),
(307, 'B', 4, NULL, NULL, 0, NULL, NULL, 4, 8, 'Being strong for others has been hard for me. I have often had difficulties coping with my feelings and fears.', 'Being strong for others has filled a large part in my life. I haven\'t had much time to deal with my feelings and fears.', '2020-11-21 14:35:12', '2020-11-21 14:35:12'),
(308, 'B', 1, NULL, NULL, 0, NULL, NULL, 4, 9, 'My tendency has been to focus too much on myself.', 'My tendency has been to focus too much on others.', '2020-11-21 14:35:50', '2020-11-21 14:35:50'),
(309, 'B', 4, NULL, NULL, 0, NULL, NULL, 4, 9, 'I have often pointed out how different I am from most people, especially my family.', 'I have often pointed out how much I have in common with most people, especially my family.', '2020-11-21 14:36:05', '2020-11-21 14:36:05'),
(310, 'B', 2, NULL, NULL, 0, NULL, NULL, 4, 9, 'Typically, I have had the tendency to be pessimistic.', 'Typically, I have had the tendency to be optimistic.', '2020-11-21 14:36:21', '2020-11-21 14:36:21'),
(311, 'B', 3, NULL, NULL, 0, NULL, NULL, 4, 9, 'I have regularly been attracted to situations that stir up deep, intense emotions.', 'I have regularly been attracted to situations that make me feel calm and at ease.', '2020-11-21 14:36:44', '2020-11-21 14:36:44'),
(312, 'B', 1, NULL, NULL, 0, NULL, NULL, 5, 6, 'I prefer pursuing my personal interests over having stability and security.', 'I prefer having stability and security over pursuing my personal interests.', '2020-11-21 14:37:08', '2020-11-21 14:37:08'),
(313, 'B', 2, NULL, NULL, 0, NULL, NULL, 5, 6, 'I have taken pride in my clarity and objectivity.', 'I have taken pride in my commitment and reliability.', '2020-11-21 14:37:24', '2020-11-21 14:37:24'),
(314, 'B', 4, NULL, NULL, 0, NULL, NULL, 5, 6, 'My thoughts tend to be imaginative – being fed by my curiosity and speculation.', 'My thoughts tend to be practical – often revolving around how to keep things going.', '2020-11-21 14:38:26', '2020-11-21 14:38:26'),
(315, 'B', 3, NULL, NULL, 0, NULL, NULL, 5, 6, 'Typically, I haven\'t had a problem with living on the edge and have tried to depend on others as little as possible.', 'Typically, I have ensured that I had some sort of safety net in place to fall back on.', '2020-11-21 14:38:54', '2020-11-21 14:38:54'),
(316, 'B', 1, NULL, NULL, 0, NULL, NULL, 5, 7, 'I have generally been focused and diligent.', 'I have generally been spontaneous and pleasure-loving.', '2020-11-21 14:39:20', '2020-11-21 14:39:20'),
(317, 'B', 2, NULL, NULL, 0, NULL, NULL, 5, 7, 'When others have put me under pressure, I have usually tended to withdraw.', 'When others have put me under pressure, I have usually tended to become more assertive.', '2020-11-21 14:39:42', '2020-11-21 14:39:42'),
(318, 'B', 4, NULL, NULL, 0, NULL, NULL, 5, 7, 'My style generally has been shaped by sparseness and austerity.', 'My style generally has been shaped by excess and over-doing things.', '2020-11-21 14:39:58', '2020-11-21 14:39:58'),
(319, 'B', 3, NULL, NULL, 0, NULL, NULL, 5, 7, 'I have typically had difficulties connecting with people.', 'I have typically had difficulties with self-discipline.', '2020-11-21 14:40:15', '2020-11-21 14:40:15'),
(320, 'B', 1, NULL, NULL, 0, NULL, NULL, 5, 8, 'In the past, people have often relied on my knowledge and insight.', 'In the past, people have often relied on my decisiveness and strength.', '2020-11-21 14:40:43', '2020-11-21 14:40:43'),
(321, 'B', 2, NULL, NULL, 0, NULL, NULL, 5, 8, 'In moments of turmoil, I have typically stayed on the sidelines.', 'In moments of turmoil, I have typically gotten right into the middle of things.', '2020-11-21 14:41:01', '2020-11-21 14:41:01'),
(322, 'B', 3, NULL, NULL, 0, NULL, NULL, 5, 8, 'My tendency has been to occupy my own little world.', 'My tendency has been to let the world know I am here.', '2020-11-21 14:41:27', '2020-11-21 14:41:27'),
(323, 'B', 4, NULL, NULL, 0, NULL, NULL, 5, 8, 'I have typically preferred pursuing my interests over having practical results.', 'I have typically preferred to be practical and have expected my work to have concrete results.', '2020-11-21 14:41:42', '2020-11-21 14:41:42'),
(324, 'B', 1, NULL, NULL, 0, NULL, NULL, 5, 9, 'I have been drawn to maintaining my independence and exploring tough questions.', 'I have been drawn to maintaining my stability and peace of mind.', '2020-11-21 14:42:00', '2020-11-21 14:42:00'),
(325, 'B', 2, NULL, NULL, 0, NULL, NULL, 5, 9, 'In arguments with my friends, my tendency has often been to press my arguments forcefully.', 'In arguments with my friends, my tendency has often been to let things go and prevent discontent.', '2020-11-21 14:42:13', '2020-11-21 14:42:13'),
(326, 'B', 3, NULL, NULL, 0, NULL, NULL, 5, 9, 'Falling asleep has frequently been difficult for me.', 'Falling asleep has mostly been very easy for me.', '2020-11-21 14:42:40', '2020-11-21 14:42:40'),
(327, 'B', 4, NULL, NULL, 0, NULL, NULL, 5, 9, 'Dwelling on disturbing or frightening topics has often attracted me.', 'Dwelling on disturbing or frightening topics is something I try to avoid.', '2020-11-21 14:42:57', '2020-11-21 14:42:57'),
(328, 'B', 1, NULL, NULL, 0, NULL, NULL, 6, 7, 'Typically, I have been careful and methodical.', 'Typically, I have been adventurous and venturesome.', '2020-11-21 14:43:15', '2020-11-21 14:43:15'),
(329, 'B', 2, NULL, NULL, 0, NULL, NULL, 6, 7, 'I have tended to be cautious, and have tried to prepare for unforeseen problems.', 'I have tended to be spontaneous, and have preferred to deal with problems as they come up.', '2020-11-21 14:43:31', '2020-11-21 14:43:31'),
(330, 'B', 4, NULL, NULL, 0, NULL, NULL, 6, 7, 'In situations where I wasn\'t clear of what to do, I have frequently sought the advice of others.', 'In situations where I wasn\'t clear of what to do, I have typically tried different things to see what worked best for me.', '2020-11-21 14:43:49', '2020-11-21 14:43:49'),
(331, 'B', 3, NULL, NULL, 0, NULL, NULL, 6, 7, 'I have usually preferred things I knew I already liked over trying something new.', 'I have usually preferred trying something new over things that I knew I already liked.', '2020-11-21 14:44:09', '2020-11-21 14:44:09'),
(332, 'B', 1, NULL, NULL, 0, NULL, NULL, 6, 8, 'My tendency has been to be hesitant and cautious.', 'My tendency has been to be hesitant and cautious.', '2020-11-21 14:44:37', '2020-11-21 14:44:37'),
(333, 'B', 4, NULL, NULL, 0, NULL, NULL, 6, 8, 'Me being pessimistic and complaining has sometimes created problems with others.', 'Me being bossy and controlling has sometimes created problems with others.', '2020-11-21 14:44:58', '2020-11-21 14:44:58'),
(334, 'B', 2, NULL, NULL, 0, NULL, NULL, 6, 8, 'Making decisions has frequently been difficult for me.', 'Making decisions has seldom been an issue for me.', '2020-11-21 14:45:16', '2020-11-21 14:45:16'),
(335, 'B', 3, NULL, NULL, 0, NULL, NULL, 6, 8, 'Typically, self-confidence hasn\'t been my strong suit.', 'Typically, self-confidence has come naturally to me.', '2020-11-21 14:45:30', '2020-11-21 14:45:30'),
(336, 'B', 4, NULL, NULL, 0, NULL, NULL, 6, 9, 'I have often found it hard to relax and stop worrying about problems that might arise.', 'I have often found it hard to get myself worked up about problems that might arise.', '2020-11-21 14:45:47', '2020-11-21 14:45:47'),
(337, 'B', 1, NULL, NULL, 0, NULL, NULL, 6, 9, 'Responsibility and duty have been guiding principles for me.', 'Acceptance and harmony have been guiding principles for me.', '2020-11-21 14:46:03', '2020-11-21 14:46:03'),
(338, 'B', 2, NULL, NULL, 0, NULL, NULL, 6, 9, 'I have tended to think of worst case scenarios.', 'I have tended to think that everything will work out fine in the end.', '2020-11-21 14:46:30', '2020-11-21 14:46:30'),
(339, 'B', 3, NULL, NULL, 0, NULL, NULL, 6, 9, 'I have typically been too guarded and distrustful.', 'I have typically been too naïve and open.', '2020-11-21 14:46:48', '2020-11-21 14:46:48');
INSERT INTO `questions` (`id`, `type`, `rank`, `stage`, `round`, `is_reverse`, `personality_id`, `question2`, `statement_a_pid`, `statement_b_pid`, `statement_a_text2`, `statement_b_text2`, `created_at`, `updated_at`) VALUES
(340, 'B', 1, NULL, NULL, 0, NULL, NULL, 7, 8, 'Thoughts of missing out on something new and better have often crossed my mind.', 'Thoughts that someone will take advantage of me if I let down my guard have often crossed my mind.', '2020-11-21 14:47:09', '2020-11-21 14:47:09'),
(341, 'B', 2, NULL, NULL, 0, NULL, NULL, 7, 8, 'One of my biggest strengths has been to come up with new ideas and get people excited about them.', 'One of my biggest strengths has been to organize resources and make things happen.', '2020-11-21 14:47:30', '2020-11-21 14:47:30'),
(342, 'B', 3, NULL, NULL, 0, NULL, NULL, 7, 8, 'Generally, I have been enthusiastic, witty and fast-talking.', 'Generally, I have been straight-talking, deliberate and measured.', '2020-11-21 14:47:48', '2020-11-21 14:47:48'),
(343, 'B', 4, NULL, NULL, 0, NULL, NULL, 7, 8, 'Lacking the self-discipline to focus on what will really fulfill me has been worrisome to me.', 'Not having the resources to fulfill the responsibilities I have taken on has been worrisome to me.', '2020-11-21 14:48:08', '2020-11-21 14:48:08'),
(344, 'B', 1, NULL, NULL, 0, NULL, NULL, 7, 9, 'My approach has been to keep my life exciting, fast-paced, and intense.', 'My approach has been to keep my life peaceful, stable and smooth.', '2020-11-21 14:48:27', '2020-11-21 14:48:27'),
(345, 'B', 4, NULL, NULL, 0, NULL, NULL, 7, 9, 'Generally speaking, I have been a passionate person who has frequently had volatile emotions.', 'Generally speaking, I have been a steady person in whom \"still waters run deep\".', '2020-11-21 14:48:46', '2020-11-21 14:48:46'),
(346, 'B', 2, NULL, NULL, 0, NULL, NULL, 7, 9, 'I have usually gotten anxious if there was a lack of excitement and stimulation.', 'I have usually gotten anxious if there was too much excitement and stimulation.', '2020-11-21 14:49:03', '2020-11-21 14:49:03'),
(347, 'B', 3, NULL, NULL, 0, NULL, NULL, 7, 9, 'One of my main struggles has been to be unable to slow down.', 'One of my main struggles has been to overcome inertia.', '2020-11-21 14:49:23', '2020-11-21 14:49:23'),
(348, 'B', 1, NULL, NULL, 0, NULL, NULL, 8, 9, 'For most of my life, my tendency has been to take on confrontations.', 'For most of my life, my tendency has been to avoid confrontations.', '2020-11-21 14:49:42', '2020-11-21 14:49:42'),
(349, 'B', 2, NULL, NULL, 0, NULL, NULL, 8, 9, 'Usually, my preference has been to take charge.', 'Usually, my preference has been to let other people take charge.', '2020-11-21 14:49:58', '2020-11-21 14:49:58'),
(350, 'B', 4, NULL, NULL, 0, NULL, NULL, 8, 9, 'High-pressure and difficult situations are things I have often enjoyed.', 'High-pressure and difficult situations are things I have tried to avoid.', '2020-11-21 14:50:17', '2020-11-21 14:50:17'),
(351, 'B', 3, NULL, NULL, 0, NULL, NULL, 8, 9, 'I have generally tended to be assertive and determined.', 'I have generally tended to be agreeable and easy-going.', '2020-11-21 14:50:40', '2020-11-21 14:50:40'),
(373, 'A', 12, NULL, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, '2021-08-10 03:22:52', '2021-08-10 03:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `question_translations`
--

CREATE TABLE `question_translations` (
  `trans_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `lang_id` int(11) NOT NULL,
  `question` longtext DEFAULT NULL,
  `statement_a_text` longtext DEFAULT NULL,
  `statement_b_text` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_translations`
--

INSERT INTO `question_translations` (`trans_id`, `question_id`, `lang_id`, `question`, `statement_a_text`, `statement_b_text`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'I feel good when I know other people need me and I can be there for them and actively help them.', NULL, NULL, '2021-05-07 14:33:33', '2021-05-07 14:33:33'),
(2, 4, 1, 'I strongly feel other people\'s unexpressed needs and act on them without being asked for it.', NULL, NULL, '2021-05-07 14:33:33', '2021-05-07 14:33:33'),
(3, 14, 1, 'I worry that others take me and the things I do for them for granted and don\'t care that much about my needs.', NULL, NULL, '2021-05-07 14:33:33', '2021-05-07 14:33:33'),
(4, 15, 1, 'I am generally the \"giver\" in my relationships. It is easier for me to give than to ask for and receive help.', NULL, NULL, '2021-05-07 14:33:33', '2021-05-07 14:33:33'),
(5, 16, 1, 'It is easy for me to ask people for the things I need, even if they get annoyed by my requests.', NULL, NULL, '2021-05-07 14:33:33', '2021-05-07 14:33:33'),
(6, 17, 1, 'I have a strong conscience – my inner critic is very hard to ignore.', NULL, NULL, '2021-05-07 14:33:33', '2021-05-07 14:33:33'),
(7, 18, 1, 'It is hard for me to leave even the smallest mistakes alone and just let it be.', NULL, NULL, '2021-05-07 14:33:33', '2021-05-07 14:33:33'),
(8, 19, 1, 'My conscience guides me to do what I think is best and right, even if it is inconvenient and brings me discomfort.', NULL, NULL, '2021-05-07 14:33:33', '2021-05-07 14:33:33'),
(9, 20, 1, 'I feel guilty about the times I have gotten angry or lost control over my emotions.', NULL, NULL, '2021-05-07 14:33:33', '2021-05-07 14:33:33'),
(10, 21, 1, 'It is easy for me to relax and enjoy, even if I have not yet taken care of all my obligations.', NULL, NULL, '2021-05-07 14:33:33', '2021-05-07 14:33:33'),
(11, 22, 1, 'I am sensitive to how my appearance is perceived by others and I can easily change it to connect with others and win them over.', NULL, NULL, '2021-05-07 14:33:33', '2021-05-07 14:33:33'),
(12, 23, 1, 'I am efficient and know how to get things done, and I don’t like it when people or circumstances slow me down.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(13, 24, 1, 'I put a lot of effort into reaching my full potential and want to make the most of my talents.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(14, 25, 1, 'I am not overly ambitious, so I don\'t let work take up too much space in my life.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(15, 26, 1, 'It is important for me to be successful and for other people to see me that way.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(16, 27, 1, 'Being told I\'m odd or weird is welcome proof that I\'m staying true to myself.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(17, 28, 1, 'I don’t want to stand out too much through my appearance or behavior.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(18, 29, 1, 'I am longing for other people to understand me, however I have a sense that others will never truly \"get\" me.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(19, 30, 1, 'I feel my emotions deeply and with great intensity, often to the point that I feel overtaken by them.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(20, 31, 1, 'I need to show my unique personality more than I feel the need to \"fit in\" and conform.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(21, 32, 1, 'I take the time to understand things and concepts in very great depth, more than most other people do.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(22, 34, 1, 'I am really good with the big picture. Detail work, however, stretches my patience.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(23, 35, 1, 'I can make and communicate tough decisions, even if others don\'t like them.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(24, 36, 1, 'I like to approach life without haste and hurry in a comfortable manner.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(25, 37, 1, 'I am a thinker. I enjoy spending a lot of time in my head.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(26, 38, 1, 'I have been told by others that I am too skeptical when I am just being realistic and cautious.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(27, 39, 1, 'I naturally blend with the enthusiasm of others, but get distressed when I am around negativity, conflict and anger.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(28, 40, 1, 'It is easy for me to stand back and let others make decisions.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(29, 41, 1, 'I feel uncomfortable when situations get too heated or aggressive and tend to withdraw in such moments.', NULL, NULL, '2021-05-07 14:33:34', '2021-05-07 14:33:34'),
(30, 42, 1, 'I enjoy searching for answers to difficult and complex questions, and I can spend hours pondering and making sense of the world.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(31, 43, 1, 'When something goes wrong, I can\'t stop myself from thinking \"this is exactly what I warned about\".', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(32, 44, 1, 'I hate being bored, so I continuously seek new and stimulating people, ideas, or events.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(33, 45, 1, 'I can come across as tough and forceful, which is why some people see me as intimidating.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(34, 46, 1, 'When others make me angry I don\'t hesitate to tell them how I feel.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(35, 47, 1, 'Too much theory feels draining to me.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(36, 48, 1, 'I rather choose the unpredictable and unknown than the safe and familiar.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(37, 49, 1, 'Others tell me they appreciate my free-spirited and playful attitude towards life.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(38, 50, 1, 'I am a strong-willed person who does not back down easily, especially in the face of opposition.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(39, 51, 1, 'When others upset me, it is hard for me to confront them and clearly express my feelings.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(40, 52, 1, 'Since I prefer solitude, I can come across to others as self-sufficient and withdrawn.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(41, 53, 1, 'Safety and security are more important to me than to most people.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(42, 54, 1, 'I need a high level of predictability in my life, so I persist with things, even when they become boring and mundane.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(43, 55, 1, 'I am strongly independent and I like to take charge and be in control of situations.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(44, 56, 1, 'Because I see many points of view, it usually takes time for me to make a decision.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(45, 57, 1, 'I can come across to others as strict and a little unemotional because I push hard for things to be correct and precise.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(46, 58, 1, 'I find ways to be important in the lives of other people.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(47, 59, 1, 'I have the feeling that others don’t do as much for me as I do for them.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(48, 60, 1, 'Even if it hurts when I feel people don\'t appreciate what I do for them, I don\'t show it.', NULL, NULL, '2021-05-07 14:33:35', '2021-05-07 14:33:35'),
(49, 61, 1, 'Throughout most of my life I have put the needs of others before my own needs and wellbeing.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(50, 62, 1, 'I want to avoid mistakes by all means, which is why I am well-organized and structured and will plan things meticulously.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(51, 63, 1, 'I feel annoyed when others do not work as hard, precise and thorough as I do.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(52, 64, 1, 'I have a clear sense of right or wrong, and integrity is very important to me.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(53, 65, 1, 'Recognition, success and personal image matter to me.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(54, 66, 1, 'I generally appear even-tempered and calm, even when I am under enormous strain.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(55, 67, 1, 'I try to be the best at what I do and want to impress and inspire others with my achievements.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(56, 68, 1, 'I enjoy setting and achieving ambitious goals. Working towards my goals has been a top priority for most of my life.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(57, 69, 1, 'Melancholy is comfortable for me, so it’s annoying when people constantly try to cheer me up.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(58, 70, 1, 'I don\'t let it show, but if I\'m with another person who is as unique as I am, I get a bit jealous.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(59, 71, 1, 'Expressing my \"quirky\" personal style through my clothes, art and home is an important aspect of who I am.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(60, 72, 1, 'I have to stay true to myself. When I can\'t add my authentic and unique touch to things, I quickly question the use of my involvement.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(61, 73, 1, 'I want to think, observe and extensively gather information before I go into action.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(62, 74, 1, 'I feel uncomfortable when people want me to show my feelings or display strong emotions.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(63, 75, 1, 'I treasure knowledge and quietly do extensive research, but I don\'t necessarily have to share my findings with others.', NULL, NULL, '2021-05-07 14:33:36', '2021-05-07 14:33:36'),
(64, 76, 1, 'It generally has been easy for me to concentrate very deeply on my work or whatever I turn my attention to.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(65, 77, 1, 'I can\'t hold myself from seeing hidden threats and imagining what dangers might arise from any given situation.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(66, 78, 1, 'I feel more secure obeying people and norms, however there are times when I can\'t hold myself from rebelling.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(67, 79, 1, 'Change and big decisions make me nervous and worried. But I certainly don’t want anyone else to make decisions for me.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(68, 80, 1, 'I often feel suspicious of the motives and agendas of people who flatter me.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(69, 81, 1, 'I enjoy the predictable and safe more than exploring the unknown.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(70, 82, 1, 'Enjoying life and having fun is more important than discipline and self-control.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(71, 83, 1, 'When things get boring or predictable, I swiftly pivot to something new, even if the current project is still ongoing.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(72, 84, 1, 'I enjoy the good things in life and love to get a kick out of things, even if it means that I sometimes overindulge.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(73, 85, 1, 'Since I need a lot of excitement in life, I love to entertain, travel, and enjoy myself with my friends.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(74, 86, 1, 'When I see something I feel is unfair, I do not hesitate to call people out on it.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(75, 87, 1, 'When others are not sure what to do, it’s usually me who takes action.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(76, 88, 1, 'I want others to tell me the truth and not spare my feelings.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(77, 89, 1, 'I don’t mind confrontation. I even enjoy pushback – it gives me a challenge to overcome.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(78, 90, 1, 'When others ask me to do things I don\'t want to do, I frequently struggle to say \"no\" as I don\'t want to trigger a confrontation.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(79, 91, 1, 'I can be a big procrastinator on projects that challenge my inner peace.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(80, 92, 1, 'I am often not clear on what I want out of a situation, so I tend to go along with what other people want.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(81, 93, 1, 'I am such a good listener that I tend to fade into the background in group discussions.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(82, 199, 1, 'I find it hard to relax and have fun until I have taken care of all my duties.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(83, 200, 1, 'I have often overextended myself in caring for others at the cost of taking care of myself.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(84, 201, 1, 'Because I care what others think about me, I want my achievements to be seen.', NULL, NULL, '2021-05-07 14:33:37', '2021-05-07 14:33:37'),
(85, 202, 1, 'I have many bittersweet memories of the past and think about past events with great longing and sentimentality.', NULL, NULL, '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(86, 203, 1, 'When I’m on a project, I want to concentrate deeply without any interruptions, so I prefer not to see people while I\'m busy.', NULL, NULL, '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(87, 204, 1, 'I want to trust others, but I have to assess their underlying intentions and motivations first.', NULL, NULL, '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(88, 205, 1, 'I don\'t want to miss out on new and exciting things, so I try to keep my obligations and commitments small.', NULL, NULL, '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(89, 206, 1, 'It is quite hard for me to give way and let others make decisions.', NULL, NULL, '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(90, 207, 1, 'I thrive in a calm and warm environment and will avoid conflict and turmoil at all costs.', NULL, NULL, '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(91, 208, 1, NULL, 'I have gotten irritated when other people do not listen to what I have told them.', 'I have gotten irritated when other people did not show enough appreciation for what I have done for them.', '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(92, 209, 1, NULL, 'I have been concerned that other people’s activities would distract me from my tasks.', 'I have been concerned that I would be left out of other people\'s activities.', '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(93, 210, 1, NULL, 'I have tended to feel that real love does not necessarily depend on physical contact.', 'I have tended to give a lot of physical contact to affirm others about how I feel about them.', '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(94, 211, 1, NULL, 'Typically, I have been a reserved, serious person who likes discussing issues.', 'Typically, I have been a supportive, giving person, seeking intimacy with others.', '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(95, 212, 1, NULL, 'I have tended to be formal, direct and idealistic.', 'I have tended to be diplomatic, charming, and pragmatic.', '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(96, 213, 1, NULL, 'Throughout my life, my values and way of living have remained quite consistent.', 'Throughout my life, my values and way of living have changed several times.', '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(97, 214, 1, NULL, 'I have taken pride in my ability to take a stand – I have been firm about my convictions.', 'I have taken pride in my ability to be flexible – what is important and suitable often changes.', '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(98, 215, 1, NULL, 'For most of my life, being accepted and well-liked has not been a high priority for me.', 'For most of my life, being accepted and well-liked by others have been important to me.', '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(99, 216, 1, NULL, 'I have typically been driven and very disciplined.', 'I have typically been too emotional and rather undisciplined.', '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(100, 217, 1, NULL, 'I have upset people by telling them what to do.', 'I have upset people by being stand-offish and aloof.', '2021-05-07 14:33:38', '2021-05-07 14:33:38'),
(101, 218, 1, NULL, 'I have tended to help others see that they are making a mistake.', 'I have tended to not speak up when I have seen others make a mistake.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(102, 219, 1, NULL, 'For most of my life, I have been a highly structured and responsible person.', 'For most of my life, I have been a highly intuitive and individualistic person.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(103, 220, 1, NULL, 'I have tended to have strong convictions and a sense of how things should be.', 'I have tended to have serious doubts and have questioned how things seemed to be.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(104, 221, 1, NULL, 'I have struggled to take it easy and be more flexible.', 'I have struggled to stop pondering alternatives and get practical.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(105, 222, 1, NULL, 'I have typically been quick to go into action.', 'I have typically been rather slow to go into action.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(106, 223, 1, NULL, 'I have often perceived others as irresponsible and disorganized.', 'I have often perceived others as demanding and intrusive.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(107, 224, 1, NULL, 'During most of my life, fulfilling social obligations has seldom been my priority.', 'During most of my life, I have usually taken my social obligations very seriously.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(108, 225, 1, NULL, 'I have been perceived by others as being too sure of myself.', 'I have been perceived by others as being too unsure of myself.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(109, 226, 1, NULL, 'In the past, I have struggled with anger, perfectionism, and impatience.', 'In the past, I have struggled with nervousness, insecurity, and doubt.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(110, 227, 1, NULL, 'I have tended not to compromise what is right even for my friends.', 'I have tended to compromise what is right to stand by my friends.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(111, 228, 1, NULL, 'I have tended to be free-roaming and tolerating with myself.', 'I have tended to be serious and strict with myself.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(112, 229, 1, NULL, 'I have generally been guided by my conscience and reason.', 'I have generally been guided by my feelings and impulses.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(113, 230, 1, NULL, 'During most of my life, I have been self-disciplined and earnest.', 'During most of my life, I have been sociable and outgoing.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(114, 231, 1, NULL, 'Typically, I have not liked to lose control of myself very much.', 'Typically, I have liked to push the limits and let loose.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(115, 232, 1, NULL, 'I have tended to be more of a high minded idealist.', 'I have tended to be more of a street-smart survivor.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(116, 233, 1, NULL, 'My approach to motivate others has been by pointing out the consequences of not following my advice.', 'My approach to motivate others has been by making big plans and big promises.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(117, 234, 1, NULL, 'Other people have put their trust in me because I am fair and will do what is right.', 'Other people have put their trust in me because I am confident and can watch out for them.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(118, 235, 1, NULL, 'At times I have upset people by being too uptight.', 'At times I have upset people by being too aggressive.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(119, 236, 1, NULL, 'I have tended to be too uncompromising and demanding with others.', 'I have tended to give in too easily and let others take the lead.', '2021-05-07 14:33:39', '2021-05-07 14:33:39'),
(120, 237, 1, NULL, 'I have typically viewed myself as a serious, honorable person.', 'I have typically viewed myself as a sunny, casual person.', '2021-05-07 14:33:40', '2021-05-07 14:33:40'),
(121, 238, 1, NULL, 'I have often asked myself why people are so happy when there so much in life that is messed up.', 'I have often asked myself why people focus on the negative when there is so much good in life.', '2021-05-07 14:33:40', '2021-05-07 14:33:40'),
(122, 239, 1, NULL, 'My tendency has been to get things done correctly, even if it made others uncomfortable.', 'My tendency has been to avoid feeling pressured, so I have not liked pressuring anyone else.', '2021-05-07 14:33:40', '2021-05-07 14:33:40'),
(123, 240, 1, NULL, 'Typically, I have been more relationship-oriented than goal-oriented.', 'Typically, I have been more goal-oriented than relationship-oriented.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(124, 241, 1, NULL, 'Mostly, I have been a well-meaning supporter.', 'Mostly, I have been a highly-motivated go-getter.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(125, 242, 1, NULL, 'I have tended towards being too personal and intimate.', 'I have tended towards being too cool and unapproachable.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(126, 243, 1, NULL, 'I might have insisted on too much closeness with my friends in the past.', 'I might have kept too much distance from my friends in the past.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(127, 244, 1, NULL, 'Generally, I have been very hospitable and have enjoyed welcoming new friends into my life.', 'Generally, I have been withdrawn and have had difficulty mixing with others.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(128, 245, 1, NULL, 'Others have noticed me because I have been outgoing, engaging, and interested in them.', 'Others have noticed me because I have been unusual, deep and quiet.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(129, 246, 1, NULL, 'I have sometimes neglected my well-being and health because of my strong drive to help others.', 'I have sometimes neglected my relationships because of my strong drive to attend to my personal needs.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(130, 247, 1, NULL, 'I have had the tendency to give my affection too freely, and have wanted to reach out to others.', 'I have had the tendency to withhold my affection, and have wanted others to enter into my world.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(131, 248, 1, NULL, 'I have typically felt the urge to show affection to people.', 'I have typically felt more comfortable maintaining some distance to people.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(132, 249, 1, NULL, 'Attending to the needs of others and being of service has been very important to me.', 'Seeking alternative ways of seeing and doing things has been very important to me.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(133, 250, 1, NULL, 'I have often shown strong emotions to others.', 'I have rarely shown strong emotions to others.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(134, 251, 1, NULL, 'I have often been so preoccupied with others that I have neglected my own projects.', 'I have often been so absorbed in my own projects that I have become isolated from others.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(135, 252, 1, NULL, 'I have had the tendency of being too possessive and involved in the lives of loved ones.', 'I have had the tendency of \"testing\" loved ones to see if they were really there for me.', '2021-05-07 14:33:41', '2021-05-07 14:33:41'),
(136, 253, 1, NULL, 'I have often asked myself how I could get closer to others.', 'I have often asked myself what it is that others want from me.', '2021-05-07 14:33:42', '2021-05-07 14:33:42'),
(137, 254, 1, NULL, 'I have sometimes upset others by being too intrusive and interfering.', 'I have sometimes upset others by being too evasive and uncommunicative.', '2021-05-07 14:33:42', '2021-05-07 14:33:42'),
(138, 255, 1, NULL, 'I have tended to be a bit sentimental and mushy.', 'I have tended to be a bit skeptical and cynical.', '2021-05-07 14:33:42', '2021-05-07 14:33:42'),
(139, 256, 1, NULL, 'I have generally been delighted in how important I am in people\'s lives.', 'I have generally been delighted in my enthusiasm and openness to new experiences.', '2021-05-07 14:33:42', '2021-05-07 14:33:42'),
(140, 257, 1, NULL, 'I am concerned not to be perceived as a selfish person.', 'I am concerned not to be perceived as a boring person.', '2021-05-07 14:33:42', '2021-05-07 14:33:42'),
(141, 258, 1, NULL, 'Others like me for my deep caring and personal warmth.', 'Others like me for my unsinkable spirit and resourcefulness.', '2021-05-07 14:33:42', '2021-05-07 14:33:42'),
(142, 259, 1, NULL, 'During most of my life, I have had a caring heart and strong dedication.', 'During most of my life, I have had a vivid mind and boundless energy.', '2021-05-07 14:33:42', '2021-05-07 14:33:42'),
(143, 260, 1, NULL, 'Others appreciate me for the attention and encouragement I give them.', 'Others appreciate me for the direction and motivation I give them.', '2021-05-07 14:33:42', '2021-05-07 14:33:42'),
(144, 261, 1, NULL, 'I have tended to jump in and rescue people.', 'I have tended to show people how to help themselves.', '2021-05-07 14:33:42', '2021-05-07 14:33:42'),
(145, 262, 1, NULL, 'I have generally enjoyed comforting people and calming them down.', 'I have generally enjoyed challenging people and shaking them up.', '2021-05-07 14:33:42', '2021-05-07 14:33:42'),
(146, 263, 1, NULL, 'The way I try to present myself to others has typically been more caring than I really am.', 'The way I try to present myself to others has typically been tougher than I really am.', '2021-05-07 14:33:42', '2021-05-07 14:33:42'),
(147, 264, 1, NULL, 'Typically, I have acted on my feelings and let the \"chips fall where they may\".', 'Typically, I have avoided acting on my feelings as they could stir up more trouble.', '2021-05-07 14:33:43', '2021-05-07 14:33:43'),
(148, 265, 1, NULL, 'I have tended not to assert myself enough with others.', 'I have tended to come across a bit too intense with others.', '2021-05-07 14:33:43', '2021-05-07 14:33:43'),
(149, 266, 1, NULL, 'My urge to have others depend on me has caused me trouble with people.', 'My reluctance to get involved has caused me trouble with people.', '2021-05-07 14:33:43', '2021-05-07 14:33:43'),
(150, 267, 1, NULL, 'I guess, I have been too controlling and involved with people.', 'I guess I have been too uninvolved and passive with people.', '2021-05-07 14:33:43', '2021-05-07 14:33:43'),
(151, 268, 1, NULL, 'To get the job, I was typically able to put my feelings aside.', 'To get the job, I typically needed to work through my feelings first before I could get going.', '2021-05-07 14:33:43', '2021-05-07 14:33:43'),
(152, 269, 1, NULL, 'It has generally felt quite natural to me to be at the center of attention.', 'It has generally felt quite strange to me to be at the center of attention.', '2021-05-07 14:33:44', '2021-05-07 14:33:44'),
(153, 270, 1, NULL, 'I have tended to be even-tempered.', 'I have tended to have strong mood swings.', '2021-05-07 14:33:44', '2021-05-07 14:33:44'),
(154, 271, 1, NULL, 'In the past, I have rarely let self-doubt stand in my way.', 'In the past, I have often got stuck struggling with self-doubt.', '2021-05-07 14:33:44', '2021-05-07 14:33:44'),
(155, 272, 1, NULL, 'For most of my life, my tendency has been to make a favorable impression on others.', 'For most of my life, I have cared little about making a favorable impression on others.', '2021-05-07 14:33:44', '2021-05-07 14:33:44'),
(156, 273, 1, NULL, 'I have typically followed activities that had a considerable potential for reward and personal recognition.', 'I have typically been willing to give up reward and personal recognition if it meant pursuing work I was really interested in.', '2021-05-07 14:33:44', '2021-05-07 14:33:44'),
(157, 274, 1, NULL, 'I have tended to avoid intimacy when I feared I would be overwhelmed by others’ demands and needs.', 'I have tended to avoid intimacy when I feared I would not be able to live up to others’ expectations of me.', '2021-05-07 14:33:44', '2021-05-07 14:33:44'),
(158, 275, 1, NULL, 'I have been told that I have often been perceived by others as presentable, even admirable.', 'I have been told that I have been perceived by others as unusual, even odd.', '2021-05-07 14:33:44', '2021-05-07 14:33:44'),
(159, 276, 1, NULL, 'When I don\'t like people, I have typically tried hard to stay pleasant – despite my feelings.', 'When I don\'t like people, I have typically let them know it — one way or another.', '2021-05-07 14:33:44', '2021-05-07 14:33:44'),
(160, 277, 1, NULL, 'In moments where I have felt insecure, I have often reacted by becoming dismissive and arrogant.', 'In moments where I have felt insecure, I have often reacted by becoming argumentative and defensive.', '2021-05-07 14:33:45', '2021-05-07 14:33:45'),
(161, 278, 1, NULL, 'I have not depended on people. I have usually done things on my own.', 'I have depended on my friends, and they know that they can depend on me.', '2021-05-07 14:33:45', '2021-05-07 14:33:45'),
(162, 279, 1, NULL, 'Despite the setbacks I had, I have usually had a lot of confidence in my abilities.', 'Despite my successes, my tendency has been to doubt my abilities.', '2021-05-07 14:33:45', '2021-05-07 14:33:45'),
(163, 280, 1, NULL, 'Dealing with details has not been a problem for me.', 'Dealing with details has not been one of my strengths.', '2021-05-07 14:33:45', '2021-05-07 14:33:45'),
(164, 281, 1, NULL, 'Before I start something new, I have typically asked myself if it will be useful to me.', 'Before I start something new, I have typically asked myself if it will be enjoyable.', '2021-05-07 14:33:45', '2021-05-07 14:33:45'),
(165, 282, 1, NULL, 'When getting to know someone new, I have usually been imposing and self-assured.', 'When getting to know someone new, I have typically been chatty and entertaining.', '2021-05-07 14:33:45', '2021-05-07 14:33:45'),
(166, 283, 1, NULL, 'I have typically been focused and persistent in pursuing my goals.', 'I have typically followed various courses of action to see where they lead.', '2021-05-07 14:33:45', '2021-05-07 14:33:45'),
(167, 284, 1, NULL, 'In situations where I had to confront someone, I have often beaten around the bush too much.', 'In situations where I had to confront someone, I have often been too harsh and direct.', '2021-05-07 14:33:45', '2021-05-07 14:33:45'),
(168, 285, 1, NULL, 'When I have gotten angry, my tendency has been to distance myself.', 'When I have gotten angry, my tendency has been to tell others off.', '2021-05-07 14:33:46', '2021-05-07 14:33:46'),
(169, 286, 1, NULL, 'Being valued and admired has generally been important to me.', 'Being autonomous and self-dependent has generally been important to me.', '2021-05-07 14:33:46', '2021-05-07 14:33:46'),
(170, 287, 1, NULL, 'In the past, I have frequently felt the need to perform with excellence.', 'In the past, I have frequently felt the need to be a pillar of strength.', '2021-05-07 14:33:46', '2021-05-07 14:33:46'),
(171, 288, 1, NULL, 'Because I get uncomfortable when I don\'t distinguish myself, I have generally wanted to stand out from others.', 'Because I get uncomfortable when I stand out too much, I have generally wanted to fit in with others.', '2021-05-07 14:33:46', '2021-05-07 14:33:46'),
(172, 289, 1, NULL, 'For most of my life, I have been self-assured and ambitious.', 'For most of my life, I have been unobtrusive and have been happy to go at my own pace.', '2021-05-07 14:33:46', '2021-05-07 14:33:46'),
(173, 290, 1, NULL, 'I have tended to be too concerned with doing better than others.', 'I have tended to be too concerned with making things okay for others.', '2021-05-07 14:33:46', '2021-05-07 14:33:46'),
(174, 291, 1, NULL, 'In moments of serious adversity, I have typically felt hardened and determined.', 'In moments of serious adversity, I have typically felt discouraged and resigned.', '2021-05-07 14:33:46', '2021-05-07 14:33:46'),
(175, 292, 1, NULL, 'My inclination has been to dwell on my feelings and to hold onto them for a long time.', 'My inclination has been to keep my feelings to a minimum and not give them too much attention.', '2021-05-07 14:33:46', '2021-05-07 14:33:46'),
(176, 293, 1, NULL, 'A lot of my struggles with others stem from my touchiness and taking everything too personally.', 'A lot of my struggles with others stem from my not caring about social conventions.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(177, 294, 1, NULL, 'I have had the tendency to be self-absorbed and moody.', 'I have had the tendency to be detached and absentminded.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(178, 295, 1, NULL, 'For most of my life, I have been self-revealing and willing to share my feelings with others.', 'For most of my life, I have been open-minded and willing to try new approaches.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(179, 296, 1, NULL, 'Generally speaking, I have been imaginative and romantic.', 'Generally speaking, I have been pragmatic and reasonable.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(180, 297, 1, NULL, 'I have typically relied on my imagination and moments of inspiration.', 'I have typically relied on my perseverance and common sense.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(181, 298, 1, NULL, 'For most of my life, I did what I wanted to do.', 'For most of my life, I did what I had to do.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(182, 299, 1, NULL, 'I have had a strong desire to feel balanced.', 'I have had a strong desire to belong.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(183, 300, 1, NULL, 'Speaking up for myself has generally been difficult for me.', 'Speaking up for myself comes naturally to me.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(184, 301, 1, NULL, 'In troubled moments, I have tended to ponder my problems.', 'In troubled moments, I have tended to seek distractions for myself.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(185, 302, 1, NULL, 'I have sometimes missed out because I felt like I was not up to take an opportunity.', 'I have sometimes missed out because I have pursued too many possibilities at the same time.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(186, 303, 1, NULL, 'My tendency has been to dwell upon things from the past.', 'My tendency has been to anticipate things I am going to do.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(187, 304, 1, NULL, 'In the past, when conflicts arose, my tendency has been to withdraw.', 'In the past, when conflicts arose, I have seldom backed down.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(188, 305, 1, NULL, 'I have spent a lot of time exploring my inner world. It has been important to me to understand my feelings.', 'I haven\'t spent a lot of time exploring my inner world. It has been important to me to get things done.', '2021-05-07 14:33:47', '2021-05-07 14:33:47'),
(189, 306, 1, NULL, 'Being able to describe internal states has been one of my strong suits.', 'Being able to take charge of situations has been one of my strong suits.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(190, 307, 1, NULL, 'Being strong for others has been hard for me. I have often had difficulties coping with my feelings and fears.', 'Being strong for others has filled a large part in my life. I haven\'t had much time to deal with my feelings and fears.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(191, 308, 1, NULL, 'My tendency has been to focus too much on myself.', 'My tendency has been to focus too much on others.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(192, 309, 1, NULL, 'I have often pointed out how different I am from most people, especially my family.', 'I have often pointed out how much I have in common with most people, especially my family.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(193, 310, 1, NULL, 'Typically, I have had the tendency to be pessimistic.', 'Typically, I have had the tendency to be optimistic.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(194, 311, 1, NULL, 'I have regularly been attracted to situations that stir up deep, intense emotions.', 'I have regularly been attracted to situations that make me feel calm and at ease.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(195, 312, 1, NULL, 'I prefer pursuing my personal interests over having stability and security.', 'I prefer having stability and security over pursuing my personal interests.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(196, 313, 1, NULL, 'I have taken pride in my clarity and objectivity.', 'I have taken pride in my commitment and reliability.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(197, 314, 1, NULL, 'My thoughts tend to be imaginative – being fed by my curiosity and speculation.', 'My thoughts tend to be practical – often revolving around how to keep things going.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(198, 315, 1, NULL, 'Typically, I haven\'t had a problem with living on the edge and have tried to depend on others as little as possible.', 'Typically, I have ensured that I had some sort of safety net in place to fall back on.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(199, 316, 1, NULL, 'I have generally been focused and diligent.', 'I have generally been spontaneous and pleasure-loving.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(200, 317, 1, NULL, 'When others have put me under pressure, I have usually tended to withdraw.', 'When others have put me under pressure, I have usually tended to become more assertive.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(201, 318, 1, NULL, 'My style generally has been shaped by sparseness and austerity.', 'My style generally has been shaped by excess and over-doing things.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(202, 319, 1, NULL, 'I have typically had difficulties connecting with people.', 'I have typically had difficulties with self-discipline.', '2021-05-07 14:33:48', '2021-05-07 14:33:48'),
(203, 320, 1, NULL, 'In the past, people have often relied on my knowledge and insight.', 'In the past, people have often relied on my decisiveness and strength.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(204, 321, 1, NULL, 'In moments of turmoil, I have typically stayed on the sidelines.', 'In moments of turmoil, I have typically gotten right into the middle of things.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(205, 322, 1, NULL, 'My tendency has been to occupy my own little world.', 'My tendency has been to let the world know I am here.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(206, 323, 1, NULL, 'I have typically preferred pursuing my interests over having practical results.', 'I have typically preferred to be practical and have expected my work to have concrete results.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(207, 324, 1, NULL, 'I have been drawn to maintaining my independence and exploring tough questions.', 'I have been drawn to maintaining my stability and peace of mind.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(208, 325, 1, NULL, 'In arguments with my friends, my tendency has often been to press my arguments forcefully.', 'In arguments with my friends, my tendency has often been to let things go and prevent discontent.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(209, 326, 1, NULL, 'Falling asleep has frequently been difficult for me.', 'Falling asleep has mostly been very easy for me.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(210, 327, 1, NULL, 'Dwelling on disturbing or frightening topics has often attracted me.', 'Dwelling on disturbing or frightening topics is something I try to avoid.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(211, 328, 1, NULL, 'Typically, I have been careful and methodical.', 'Typically, I have been adventurous and venturesome.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(212, 329, 1, NULL, 'I have tended to be cautious, and have tried to prepare for unforeseen problems.', 'I have tended to be spontaneous, and have preferred to deal with problems as they come up.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(213, 330, 1, NULL, 'In situations where I wasn\'t clear of what to do, I have frequently sought the advice of others.', 'In situations where I wasn\'t clear of what to do, I have typically tried different things to see what worked best for me.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(214, 331, 1, NULL, 'I have usually preferred things I knew I already liked over trying something new.', 'I have usually preferred trying something new over things that I knew I already liked.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(215, 332, 1, NULL, 'My tendency has been to be hesitant and cautious.', 'My tendency has been to be hesitant and cautious.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(216, 333, 1, NULL, 'Me being pessimistic and complaining has sometimes created problems with others.', 'Me being bossy and controlling has sometimes created problems with others.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(217, 334, 1, NULL, 'Making decisions has frequently been difficult for me.', 'Making decisions has seldom been an issue for me.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(218, 335, 1, NULL, 'Typically, self-confidence hasn\'t been my strong suit.', 'Typically, self-confidence has come naturally to me.', '2021-05-07 14:33:49', '2021-05-07 14:33:49'),
(219, 336, 1, NULL, 'I have often found it hard to relax and stop worrying about problems that might arise.', 'I have often found it hard to get myself worked up about problems that might arise.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(220, 337, 1, NULL, 'Responsibility and duty have been guiding principles for me.', 'Acceptance and harmony have been guiding principles for me.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(221, 338, 1, NULL, 'I have tended to think of worst case scenarios.', 'I have tended to think that everything will work out fine in the end.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(222, 339, 1, NULL, 'I have typically been too guarded and distrustful.', 'I have typically been too naïve and open.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(223, 340, 1, NULL, 'Thoughts of missing out on something new and better have often crossed my mind.', 'Thoughts that someone will take advantage of me if I let down my guard have often crossed my mind.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(224, 341, 1, NULL, 'One of my biggest strengths has been to come up with new ideas and get people excited about them.', 'One of my biggest strengths has been to organize resources and make things happen.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(225, 342, 1, NULL, 'Generally, I have been enthusiastic, witty and fast-talking.', 'Generally, I have been straight-talking, deliberate and measured.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(226, 343, 1, NULL, 'Lacking the self-discipline to focus on what will really fulfill me has been worrisome to me.', 'Not having the resources to fulfill the responsibilities I have taken on has been worrisome to me.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(227, 344, 1, NULL, 'My approach has been to keep my life exciting, fast-paced, and intense.', 'My approach has been to keep my life peaceful, stable and smooth.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(228, 345, 1, NULL, 'Generally speaking, I have been a passionate person who has frequently had volatile emotions.', 'Generally speaking, I have been a steady person in whom \"still waters run deep\".', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(229, 346, 1, NULL, 'I have usually gotten anxious if there was a lack of excitement and stimulation.', 'I have usually gotten anxious if there was too much excitement and stimulation.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(230, 347, 1, NULL, 'One of my main struggles has been to be unable to slow down.', 'One of my main struggles has been to overcome inertia.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(231, 348, 1, NULL, 'For most of my life, my tendency has been to take on confrontations.', 'For most of my life, my tendency has been to avoid confrontations.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(232, 349, 1, NULL, 'Usually, my preference has been to take charge.', 'Usually, my preference has been to let other people take charge.', '2021-05-07 14:33:50', '2021-05-07 14:33:50'),
(233, 350, 1, NULL, 'High-pressure and difficult situations are things I have often enjoyed.', 'High-pressure and difficult situations are things I have tried to avoid.', '2021-05-07 14:33:51', '2021-05-07 14:33:51'),
(234, 351, 1, '', 'I have generally tended to be assertive and determined.', 'I have generally tended to be agreeable and easy-going.', '2021-05-07 14:33:51', '2021-08-10 04:37:36'),
(277, 373, 1, 'test234', '', '', '2021-08-10 03:22:52', '2021-08-10 04:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `result_no` varchar(500) DEFAULT NULL,
  `stage1_questions` int(11) DEFAULT 0,
  `stage2_questions` int(11) DEFAULT 0,
  `stage3_questions` int(11) NOT NULL DEFAULT 0,
  `method1_value` float DEFAULT 0,
  `method2_value` float DEFAULT 0,
  `threshold_value1` float DEFAULT 0,
  `threshold_value2` float DEFAULT 0,
  `mean` text DEFAULT NULL,
  `winner_id` int(11) NOT NULL,
  `mostlikely` int(11) NOT NULL DEFAULT 0,
  `sd` text DEFAULT NULL,
  `discarded` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result_items`
--

CREATE TABLE `result_items` (
  `id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `personality_id` int(11) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `is_reverse` int(11) NOT NULL DEFAULT 0,
  `type` varchar(500) NOT NULL,
  `answer` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_title` varchar(500) NOT NULL,
  `role_access` text DEFAULT NULL,
  `access` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_title`, `role_access`, `access`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, '2021-08-02 03:57:25', '2021-08-02 03:58:50'),
(3, 'Test', NULL, NULL, '2021-08-06 12:50:51', '2021-08-06 12:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `stage1_questions` int(11) DEFAULT 0,
  `stage2_questions` int(11) DEFAULT 0,
  `stage3_questions` int(11) NOT NULL DEFAULT 0,
  `method1_value` float DEFAULT 0,
  `method2_value` float DEFAULT 0,
  `threshold_value1` float DEFAULT 0,
  `threshold_value2` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `stage1_questions`, `stage2_questions`, `stage3_questions`, `method1_value`, `method2_value`, `threshold_value1`, `threshold_value2`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 1.25, 0.41, 0.75, 0.75, '2020-08-05 02:37:55', '2021-08-06 06:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `training_classrooms`
--

CREATE TABLE `training_classrooms` (
  `id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `training_resource`
--

CREATE TABLE `training_resource` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(500) NOT NULL,
  `title` text DEFAULT NULL,
  `benefits` longtext DEFAULT NULL,
  `description` longtext NOT NULL,
  `tags` varchar(500) NOT NULL,
  `share` varchar(500) DEFAULT NULL,
  `access_control` varchar(500) DEFAULT NULL,
  `file_upload` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  `duration` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_resource`
--

INSERT INTO `training_resource` (`id`, `user_id`, `type`, `title`, `benefits`, `description`, `tags`, `share`, `access_control`, `file_upload`, `status`, `duration`, `created_at`, `updated_at`) VALUES
(1, 13, 'tutorial', 'asdf', NULL, 'According to ServerPilot support: “No services, including PHP-FPM, should need to be restarted when deploying new code. Envoyer shouldn’t need to modify any server configurations or restart services.” So go ahead and uncheck Restart FPM After Deployments in the Deployments section.', 'Love,Journey,Process', 'OFF', 'All', '/uploads/tutorials/1629977662-1626618858598.jpg', 'Published', '1 Week', '2021-08-23 02:26:58', '2021-09-02 06:18:22'),
(2, 1, 'tutorial', 'test tur', NULL, 'asdfasfd', 'Love', 'OFF', 'All', '/uploads/tutorials/4a45b8a4-aa7d-4bcc-8924-25215746ec58.jpg', NULL, '2 Week', '2021-08-23 02:27:21', '2021-09-02 06:26:51'),
(4, 0, 'tutorial', 'Web Development', NULL, 'adsf', 'World', 'OFF', 'Exclusive to Premium Members', '/uploads/tutorials/1629974241-photo-1508830524289-0adcbe822b40.jpg', 'Unpublished', '', '2021-08-26 05:37:23', '2021-09-03 07:35:35'),
(5, 1, 'course', 'test course', NULL, 'asdfasfd', 'Love', 'ON', NULL, '/uploads/tutorials/1629974923-131fef7b-3aa4-4092-a0d9-8fb27d8f8b6a.jpg', 'Published', '1 Week', '2021-08-26 05:48:45', '2021-09-02 06:35:54'),
(6, 13, 'video', 'test video', NULL, 'asdf', 'World', 'ON', 'Yearly Only', '/uploads/tutorials/1630671519-Login(1).mp4', 'Unpublished', '1 Week', '2021-08-26 05:49:43', '2021-09-03 07:18:43'),
(7, 13, 'tutorial', 'testing', NULL, 'That’s it. Let’s test the session now. It should start storing the session now. If it’s not, then please follow the other solution as below.', 'Love,World,Motivation', 'OFF', 'Available to All Members', '/uploads/tutorials/1630583067-1st_banner.png', 'Published', '2 Week', '2021-08-26 12:19:27', '2021-09-02 06:44:28'),
(8, 1, 'course', 'asd', 'asads', 'test g', 'Love,Motivation,Journey', 'ON', 'All', '/uploads/tutorials/1630564712-1st_banner.png', 'Unpublished', '1 Week', '2021-09-02 01:38:37', '2021-09-03 02:56:00'),
(10, 1, 'video', 'xbbvx', NULL, 'dsf', '', 'ON', 'All', NULL, 'Published', '1 Week', '2021-09-03 03:14:49', '2021-09-03 03:14:49'),
(11, 13, 'certifiedcourses', 'certified courses', NULL, 'certifiedcourses', 'World', 'ON', 'All', '/uploads/tutorials/1630665291-loginbg.jpg', 'Published', '1 Week', '2021-09-03 05:34:51', '2021-09-03 05:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `trainng_lessons`
--

CREATE TABLE `trainng_lessons` (
  `id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `position` varchar(500) DEFAULT NULL,
  `tags` varchar(500) DEFAULT NULL,
  `file_upload` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainng_lessons`
--

INSERT INTO `trainng_lessons` (`id`, `training_id`, `title`, `position`, `tags`, `file_upload`, `description`, `created_at`, `updated_at`) VALUES
(2, 1, 'page 1', '1', 'World,Journey', '/uploads/pages/1629815076-bannerdiv.png', '<p>Right now we’re testing Super Follows with a very limited audience, so we won’t be sending status updates for pending applications.</p><p>If you meet the minimum requirements, and you’re approved to offer a Super Follows subscription, you’ll receive a notice in your Twitter app, and an email to the address you provided in your application. You’ll need to agree to the&nbsp;<a href=\"http://legal.twitter.com/super-follows-creator-terms\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(27, 149, 224);\">Super Follows Creator Terms</a>&nbsp;to apply.&nbsp;</p><p>Applicants who meet the minimum requirements, but are not selected for the initial test group are automatically placed on a waitlist. They’ll be notified in-app if their application becomes approved.&nbsp;</p><h4><strong>What content will I be expected to offer?</strong></h4><p>Ultimately, the content you create is up to you. Here’s what you can offer your Super Followers for this initial test:</p><ul><li>Badges: Super Followers get badges that identify them as your Super Follower when they reply to your Tweets so it’s easier to connect with them.</li><li>Bonus content: Share unscripted thoughts, ideas, and opinions with extra Tweets, and personal replies only your Super Followers can see.</li></ul>', '2021-08-24 09:24:39', '2021-08-25 04:17:38'),
(6, 8, 'asd', '2', '', '/uploads/pages/1630570493-loginbg.jpg', '<p>as</p>', '2021-09-02 02:51:01', '2021-09-02 03:14:53'),
(7, 5, 'sdfa', '3', 'Motivation', '/uploads/pages/1630570839-notfound.png', '<p>testst</p>', '2021-09-02 03:20:40', '2021-09-02 03:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dp` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `address`, `postal_code`, `city`, `phone`, `status`, `dp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Admin', 'Super', 'Admin', 'admin@gmail.com', NULL, '$2y$10$NmjBpY/WP3tJToReRICcme9cXHukk5M/tEAPBEd2Xb2oWPx56oLGO', NULL, NULL, '', NULL, 'Active', '/uploads/users/dp/1630485460-1st_banner.png', NULL, '2021-07-30 04:20:14', '2021-09-03 06:04:20'),
(13, 3, 'Test 1', 'Test', '1', 'test@gmail.com', NULL, '$2y$10$mzcM5TB7pKMjMYXUS469RedD1BRXDA0yTOa328LZA8c52N2LESesK', 'test', '232', NULL, '12345', 'Active', '/uploads/users/dp/1630485241-notfound.png', NULL, '2021-09-01 02:46:17', '2021-09-03 06:04:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_task`
--
ALTER TABLE `course_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`langid`);

--
-- Indexes for table `language_translations`
--
ALTER TABLE `language_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang_id` (`lang_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

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
-- Indexes for table `personalities`
--
ALTER TABLE `personalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portal_settings`
--
ALTER TABLE `portal_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personality_id` (`personality_id`),
  ADD KEY `statement_a_pid` (`statement_a_pid`),
  ADD KEY `statement_b_pid` (`statement_b_pid`);

--
-- Indexes for table `question_translations`
--
ALTER TABLE `question_translations`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `lang_id` (`lang_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `winner_id` (`winner_id`),
  ADD KEY `mostlikely` (`mostlikely`);

--
-- Indexes for table `result_items`
--
ALTER TABLE `result_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `result_id` (`result_id`),
  ADD KEY `personality_id` (`personality_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_classrooms`
--
ALTER TABLE `training_classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classroom_id` (`classroom_id`),
  ADD KEY `training_id` (`training_id`);

--
-- Indexes for table `training_resource`
--
ALTER TABLE `training_resource`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `trainng_lessons`
--
ALTER TABLE `trainng_lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `traning_id` (`training_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_task`
--
ALTER TABLE `course_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `langid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `language_translations`
--
ALTER TABLE `language_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personalities`
--
ALTER TABLE `personalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `portal_settings`
--
ALTER TABLE `portal_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=374;

--
-- AUTO_INCREMENT for table `question_translations`
--
ALTER TABLE `question_translations`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `result_items`
--
ALTER TABLE `result_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=888;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `training_classrooms`
--
ALTER TABLE `training_classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_resource`
--
ALTER TABLE `training_resource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trainng_lessons`
--
ALTER TABLE `trainng_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_task`
--
ALTER TABLE `course_task`
  ADD CONSTRAINT `course_task_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `trainng_lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `language_translations`
--
ALTER TABLE `language_translations`
  ADD CONSTRAINT `language_translations_ibfk_1` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`langid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`personality_id`) REFERENCES `personalities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`statement_a_pid`) REFERENCES `personalities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_ibfk_3` FOREIGN KEY (`statement_b_pid`) REFERENCES `personalities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `question_translations`
--
ALTER TABLE `question_translations`
  ADD CONSTRAINT `question_translations_ibfk_2` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`langid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_translations_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_translations_ibfk_4` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`langid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`winner_id`) REFERENCES `personalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`mostlikely`) REFERENCES `personalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result_items`
--
ALTER TABLE `result_items`
  ADD CONSTRAINT `result_items_ibfk_1` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training_classrooms`
--
ALTER TABLE `training_classrooms`
  ADD CONSTRAINT `training_classrooms_ibfk_1` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `training_classrooms_ibfk_2` FOREIGN KEY (`training_id`) REFERENCES `training_classrooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainng_lessons`
--
ALTER TABLE `trainng_lessons`
  ADD CONSTRAINT `trainng_lessons_ibfk_1` FOREIGN KEY (`training_id`) REFERENCES `training_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
