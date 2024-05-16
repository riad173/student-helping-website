-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 04:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprojects`
--

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`id`, `tutor_id`, `title`, `description`, `thumb`, `date`, `status`) VALUES
('hTBVhB46ogyKVvHhS3a8', 'slTFW3KywOK8QDoVhb9L', 'apps', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Fjm3GErofizhcgoxsI0C.jpg', '2024-05-15', 'active');

--
-- Triggers `app`
--
DELIMITER $$
CREATE TRIGGER `app_trigger` AFTER INSERT ON `app` FOR EACH ROW BEGIN
    INSERT INTO playlist_all (id, tutor_id, title, description, thumb, date, status)
    VALUES (NEW.id, NEW.tutor_id, NEW.title, NEW.description, NEW.thumb, NEW.date, NEW.status);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `app_upload`
--

CREATE TABLE `app_upload` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `html` varchar(100) NOT NULL,
  `css` varchar(100) NOT NULL,
  `js` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_upload`
--

INSERT INTO `app_upload` (`id`, `tutor_id`, `playlist_id`, `title`, `description`, `html`, `css`, `js`, `image`, `thumb`, `date`, `status`) VALUES
('3YasPNofHcgd62YjbBEO', 'slTFW3KywOK8QDoVhb9L', 'hTBVhB46ogyKVvHhS3a8', 'dictonary', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Z2oBzMR0X1OZpUSLfTQx.php', 'x1scIJpJYSjSSZlcLRTf.css', 'SPq4ij099dV4hu3w4EBa.js', 's4yMly63lMLz6ZJZVW3W.', 'U6QM9nmLprrxPnE8TrfA.jpg', '2024-05-15', 'active'),
('82O8MOPBEiuFNkzfTds7', 'slTFW3KywOK8QDoVhb9L', 'hTBVhB46ogyKVvHhS3a8', 'textTospeach app html, css', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'nSkFUGMROtuQEVLZLc3k.php', 'aHD4MEZ5zSN9yB2a5p6z.css', 'jQ5VsdukvQWindYf79cW.js', '0EzYQgj77i9ICzRe3Qyo.', 'fDqfyXnMD5O53NNmZynR.jpg', '2024-05-15', 'active'),
('9sFiisP7kfInP0GXta0J', 'slTFW3KywOK8QDoVhb9L', 'hTBVhB46ogyKVvHhS3a8', 'Calculator', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'W9yHYu5ai8bXqH2qgGtN.php', '5sN0cE63MVA060gcTSEJ.css', 'KlsWpvC8Y7G1UPMFORni.js', 'nCoRjNkFKJCOcN12Gt3z.', 'ga3AceVeMgYiwMdOVJJY.jpg', '2024-05-15', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `user_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` varchar(20) NOT NULL,
  `content_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(10) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `video` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `tutor_id`, `playlist_id`, `title`, `description`, `video`, `thumb`, `date`, `status`) VALUES
('6vdaRswm45X4RgulImvB', 'slTFW3KywOK8QDoVhb9L', 'HVcEF2AXNRT8je4scEWg', 'How to made side bar with html, css, and js', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '9hypQBJdLnl2c05L7a0o.mp4', 'UlMZvYQUqJYHclHAdnq6.jpg', '2024-05-15', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `tutor_id`, `title`, `description`, `thumb`, `date`, `status`) VALUES
('HVcEF2AXNRT8je4scEWg', 'slTFW3KywOK8QDoVhb9L', 'video', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '9YyMFAM5ueqUvOTHGWgs.jpg', '2024-05-15', 'active');

--
-- Triggers `courses`
--
DELIMITER $$
CREATE TRIGGER `video_trigger` AFTER INSERT ON `courses` FOR EACH ROW BEGIN
    INSERT INTO playlist_all (id, tutor_id, title, description, thumb, date, status)
    VALUES (NEW.id, NEW.tutor_id, NEW.title, NEW.description, NEW.thumb, NEW.date, NEW.status);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `content_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `tutor_id`, `title`, `description`, `thumb`, `date`, `status`) VALUES
('N7oV2PFwEwlhsEPsgEsV', 'slTFW3KywOK8QDoVhb9L', 'links', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'gcXtHOTqLj4bmrIpvFe9.jpg', '2024-05-15', 'active');

--
-- Triggers `links`
--
DELIMITER $$
CREATE TRIGGER `link_trigger` AFTER INSERT ON `links` FOR EACH ROW BEGIN
    INSERT INTO playlist_all (id, tutor_id, title, description, thumb, date, status)
    VALUES (NEW.id, NEW.tutor_id, NEW.title, NEW.description, NEW.thumb, NEW.date, NEW.status);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `links_upload`
--

CREATE TABLE `links_upload` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `url` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `links_upload`
--

INSERT INTO `links_upload` (`id`, `tutor_id`, `playlist_id`, `title`, `description`, `url`, `thumb`, `date`, `status`) VALUES
('8CXOoyaKDeKUFmos82Ey', 'slTFW3KywOK8QDoVhb9L', 'N7oV2PFwEwlhsEPsgEsV', 'Learn coding', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://www.w3schools.com/', 'HMr71wyNXePdAEaZGafL.jpg', '2024-05-15', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_all`
--

CREATE TABLE `playlist_all` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist_all`
--

INSERT INTO `playlist_all` (`id`, `tutor_id`, `title`, `description`, `thumb`, `date`, `status`) VALUES
('hTBVhB46ogyKVvHhS3a8', 'slTFW3KywOK8QDoVhb9L', 'apps', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Fjm3GErofizhcgoxsI0C.jpg', '2024-05-15', 'active'),
('HVcEF2AXNRT8je4scEWg', 'slTFW3KywOK8QDoVhb9L', 'video', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '9YyMFAM5ueqUvOTHGWgs.jpg', '2024-05-15', 'active'),
('N7oV2PFwEwlhsEPsgEsV', 'slTFW3KywOK8QDoVhb9L', 'links', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'gcXtHOTqLj4bmrIpvFe9.jpg', '2024-05-15', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` varchar(20) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `review` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `rating`, `review`, `date`) VALUES
('Xk3zut7Svh8ExydvMRvS', 4, 'Lorem ipsum dolor sit amet. Et inventore veniam sit itaque natus eum reiciendis commodi quo tempore possimus. Ea quaerat autem id distinctio accusamus sit ipsa tempore id aliquid natus sit vero quae sit amet enim ut rerum ratione. Qui voluptates blanditiis qui eligendi temporibus et architecto sint id saepe minima sit dolores eligendi ea accusantium eligendi eos sequi rerum.\r\n', '2024-05-14 13:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `name`, `profession`, `email`, `password`, `image`) VALUES
('slTFW3KywOK8QDoVhb9L', 'riad', 'developer', 'riad@email.com', '0b75534c8aa3d5b03507ab147ce8a48c058f4663', 'hCJz45XwYmA5fESjHR7K.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`) VALUES
('DjGOhpg0aKRnaICOghBJ', 'riad1', 'riad1@email.com', '0b75534c8aa3d5b03507ab147ce8a48c058f4663', '05gxbmRUo73SzvYp89ZG.png');

-- --------------------------------------------------------

--
-- Table structure for table `video_upload`
--

CREATE TABLE `video_upload` (
  `id` varchar(20) NOT NULL,
  `tutor_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `video` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_upload`
--

INSERT INTO `video_upload` (`id`, `tutor_id`, `playlist_id`, `title`, `description`, `video`, `thumb`, `date`, `status`) VALUES
('6vdaRswm45X4RgulImvB', 'slTFW3KywOK8QDoVhb9L', 'HVcEF2AXNRT8je4scEWg', 'How to made side bar with html, css, and js', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '9hypQBJdLnl2c05L7a0o.mp4', 'UlMZvYQUqJYHclHAdnq6.jpg', '2024-05-15', 'active');

--
-- Triggers `video_upload`
--
DELIMITER $$
CREATE TRIGGER `video_upload_insert_trigger` AFTER INSERT ON `video_upload` FOR EACH ROW BEGIN
    INSERT INTO content (id, tutor_id, playlist_id, title, description, video, thumb, date, status)
    VALUES (NEW.id, NEW.tutor_id, NEW.playlist_id, NEW.title, NEW.description, NEW.video, NEW.thumb, NEW.date, NEW.status);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `app_upload`
--
ALTER TABLE `app_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_id` (`tutor_id`),
  ADD KEY `playlist_id` (`playlist_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_id` (`tutor_id`),
  ADD KEY `playlist_id` (`playlist_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `links_upload`
--
ALTER TABLE `links_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_id` (`tutor_id`),
  ADD KEY `links_upload_ibfk_2` (`playlist_id`);

--
-- Indexes for table `playlist_all`
--
ALTER TABLE `playlist_all`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_upload`
--
ALTER TABLE `video_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_id` (`tutor_id`),
  ADD KEY `playlist_id` (`playlist_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app`
--
ALTER TABLE `app`
  ADD CONSTRAINT `app_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`);

--
-- Constraints for table `app_upload`
--
ALTER TABLE `app_upload`
  ADD CONSTRAINT `app_upload_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`),
  ADD CONSTRAINT `app_upload_ibfk_2` FOREIGN KEY (`playlist_id`) REFERENCES `app` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`);

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`),
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`playlist_id`) REFERENCES `playlist_all` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`);

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`);

--
-- Constraints for table `playlist_all`
--
ALTER TABLE `playlist_all`
  ADD CONSTRAINT `playlist_all_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`);

--
-- Constraints for table `video_upload`
--
ALTER TABLE `video_upload`
  ADD CONSTRAINT `video_upload_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`),
  ADD CONSTRAINT `video_upload_ibfk_2` FOREIGN KEY (`playlist_id`) REFERENCES `playlist_all` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
