-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 11:14 PM
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
-- Database: `catty`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `timestamp`, `post_id`, `user_id`) VALUES
(3, 'Prvi koment.', '2023-05-28 12:30:22', 77, 20),
(4, 'ddsadsa', '2023-05-28 12:38:12', 78, 20),
(5, 'daddasdasd', '2023-05-28 12:44:55', 78, 20),
(6, 'dsdasdadasdsdsddsadasdadasdadasadasdsadadasdsadas', '2023-05-28 12:45:00', 78, 20),
(7, 'sdsaddsadasdasdsadsdas', '2023-05-28 12:45:03', 78, 20),
(8, 'sadasdsdsdsa', '2023-05-28 12:45:04', 78, 20),
(9, 'daasdasd sds sdsa asdas as dsdasd s d', '2023-05-28 12:46:36', 77, 20),
(10, 'dsadasdas  d', '2023-05-28 12:46:38', 77, 20),
(11, ' da dsa dad asdas', '2023-05-28 12:46:40', 77, 20),
(12, 'edadsadsa', '2023-05-28 12:50:17', 77, 20),
(13, 'dasdsadda', '2023-05-28 12:50:19', 77, 20),
(14, 'asddsadas', '2023-05-28 12:50:20', 77, 20),
(15, 'adsadsadsa', '2023-05-28 12:50:22', 77, 20),
(16, 'dsaddsadsa', '2023-05-28 12:50:24', 77, 20),
(21, 'asdasdas', '2023-05-28 20:03:51', 93, 38),
(22, 'sadasdas', '2023-05-28 20:03:52', 93, 38);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` text DEFAULT NULL,
  `photo_url` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `thread_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `photo_url`, `user_id`, `thread_id`) VALUES
(77, 'My BIGG fluffy cat', 'Today my BIGGGG CAT decided to jump on table and broke it...... ;;;;;(((((', '', 20, 1),
(78, 'Very sweet cat', 'My cat is just the best can we appreciate this image.', 'post_images/64722acab1d8c_download.jpg', 20, 1),
(79, 'Test CAt :)', 'cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt caT cat CAt CAT cAt :)', '', 20, 1),
(87, 'Chilling', '', 'post_images/6473b061dd439_article-the-daily-activities-of-your-cat.jpg', 32, 1),
(88, 'UGLY CAT', '', 'post_images/6473b0900f958_sub-buzz-7104-1522956870-3.jpg', 34, 7),
(89, 'LOOK HOW CUTE SHE LOOKS', '', 'post_images/6473b0bea4c09_hairless-cats11.jpg', 34, 7),
(90, 'How can a small cat be so ugly?', '', 'post_images/6473b0d98030e_8617244306_1bf51865c3_z.jpg', 34, 7),
(91, 'SMALL CAT', '', 'post_images/6473b101bbc8b_maxresdefault.jpg', 35, 1),
(92, 'Look at my cutie', '', 'post_images/6473b11cd62b9_shutterstock_796071583.jpg', 35, 4),
(93, 'My tiger', '', 'post_images/6473b23553810_sddefault.jpg', 37, 6),
(94, 'I don\'t have a cat, but I would love to have one. ', 'Pls.', '', 38, 1),
(95, 'Can somebody post a big Cat', 'Please post BIGGGGG CAT', '', 38, 3),
(96, 'Can somebody post a small cat pls', 'pls', '', 38, 5);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `title`, `description`) VALUES
(1, 'CatDaily', 'There you should post your cat every single day.'),
(3, 'Big Cat', 'There you should post a BIG CAT.'),
(4, 'Cute Cat', 'There you should post your cute cat.'),
(5, 'Small Cat', 'There you should post your small cat.'),
(6, 'Exotic Cat', 'There you should post your exotic cat.'),
(7, 'NSFW cat', ';)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catname` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `catavatar` text DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `catname`, `password`, `salt`, `catavatar`, `email`, `admin`) VALUES
(20, 'Miki909', '52b86d01246cc7d75d9f02ee6f8cfbf2bb2a31ba1341cfda6d783b67b74b5f43', 'a1f901611fdd9e3e981faa20563f8338', '/catty/assets/catavatar/catavatar1.jpg', 'miki@catty.com', 0),
(32, 'Lil Kitty', '044d016b0fcaad851d1e93e0304c63c5ef3f79dde9ccde50218ea2a59e98c073', '0bf1b522f0313c19f6814c9c2feb0e27', '/catty/assets/catavatar/catavatar3.jpg', 'lil.kitty@gmail.com', 0),
(34, 'STONKS', '593d960d7de469438f886622ae7700c0fb79d8482f1bef1e3e9d7cc1c3a84de9', '7b8be98a11b0184468b165f9bae17363', '/catty/assets/catavatar/catavatar5.jpg', 'stonks@gmail.com', 0),
(35, 'Cat123', '301a4a917a0f6787516dc8f2ac9694017639432b3e1e6d32e088acc8f153d8ca', '294b050ab3b1a85e5f7525b407834938', '/catty/assets/catavatar/catavatar4.jpg', 'cat@kitty.com', 0),
(36, 'Kitty', 'c8502ceeb0af4c3e3ad5d4bcfbf1fef3f4b1d7e52ef1d88a510530fa9f5beb26', '297ff04443972b3ad123ec4a91e1efd4', '/catty/assets/catavatar/catavatar5.jpg', 'bm@gmail.com', 0),
(37, 'TIGER', '167db0e49ee25726a2041005a30b16444d778410b42ce210235ae729173e66c0', '9e8873b5cff968158e93d4cea80e2898', '/catty/assets/catavatar/catavatar5.jpg', 'tiger@gmail.com', 0),
(38, 'CAtty', 'e8f655536af6ecb846caf8032a9320bb7df26f9e7abd411887e3244581d0e9c6', '5a45263e7175560945a32430ea1b420d', '/catty/assets/catavatar/catavatar3.jpg', 'cat@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_comments_users` (`user_id`),
  ADD KEY `fk_comments_posts` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_posts_threads` (`thread_id`),
  ADD KEY `fk_posts_users` (`user_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_threads` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_posts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
