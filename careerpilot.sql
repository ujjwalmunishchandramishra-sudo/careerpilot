-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2026 at 01:07 PM
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
-- Database: `careerpilot`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `job_id`, `resume`, `status`, `applied_at`) VALUES
(1, 1, 1, NULL, 'Accepted', '2026-06-26 15:22:55'),
(2, 2, 1, NULL, 'Accepted', '2026-06-27 14:05:46'),
(3, 1, 2, NULL, 'Rejected', '2026-06-27 14:13:37'),
(4, 2, 2, NULL, 'Rejected', '2026-06-30 04:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `company` varchar(150) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `job_type` varchar(50) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `company`, `location`, `salary`, `job_type`, `deadline`, `description`, `created_at`) VALUES
(1, 'software engineer', 'google', 'Mumbai', '15 ', NULL, NULL, 'Google is looking for a Software Engineer to join its engineering team. The selected candidate will design, develop, test, and maintain scalable software applications used by millions of users worldwide. You will collaborate with cross-functional teams to build innovative products, write clean and efficient code, troubleshoot technical issues, and contribute to improving system performance and reliability.\r\n\r\nResponsibilities:\r\n• Design and develop high-quality software solutions.\r\n• Write clean, maintainable, and efficient code.\r\n• Debug, test, and optimize applications.\r\n• Collaborate with product managers, designers, and engineers.\r\n• Participate in code reviews and follow software development best practices.\r\n• Continuously learn and adopt new technologies.\r\n\r\nRequirements:\r\n• Bachelor\'s degree in Computer Science, Information Technology, or a related field.\r\n• Strong knowledge of Java, Python, C++, or JavaScript.\r\n• Understanding of Data Structures and Algorithms.\r\n• Knowledge of SQL and database management.\r\n• Familiarity with Git and version control.\r\n• Good problem-solving and communication skills.\r\n\r\nExperience:\r\n• Freshers and candidates with up to 2 years of experience are welcome to apply.\r\n\r\nEmployment Type:\r\n• Full-Time\r\n\r\nBenefits:\r\n• Competitive salary package.\r\n• Health and wellness benefits.\r\n• Learning and career development opportunities.\r\n• Flexible work environment.\r\n• Employee stock options and performance bonuses.', '2026-06-26 14:47:12'),
(2, 'AI engineeer', 'Amazon', 'Mumbai', '15 LPA', NULL, NULL, 'we are hiring we want a brilliant ai expert who can replace our manual functionality also the manual searching or existing manual search by our customer into fully ai  ', '2026-06-27 14:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `resume`, `uploaded_at`) VALUES
(2, 2, 'ticket...pdf', '2026-06-30 04:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','admin') DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'ujjwal mishra', 'ujjwalmunishchandramishra@gmail.com', '$2y$10$eYFDYZNPSYY47751piBFDOZhtoB4EFo1yncWr5zetkpWAV4j6Kv4u', 'admin', '2026-06-26 10:14:53'),
(2, 'rahul', 'rahul@gmail.com', '$2y$10$T7u8MipJMGNPyiFgqvAWsePY1l7TsOII3T0MXF/lta4eIcmQm8gGG', 'student', '2026-06-27 14:04:53'),
(3, 'Aniket mishra', 'Aniket@gmail.com', '$2y$10$5DhK238o0eKn.oiMGEKM.OdfvoQJ2fFLCCXF5Ga705eg6NXE0IDgS', 'admin', '2026-06-28 09:49:08'),
(5, 'raj', 'raj@9326524574', '$2y$10$TagcqIoOPH9RW2Rz9bYLwO0.WJ2dpvaO0MLkJSTNgrQ5YwuErngLS', 'student', '2026-07-07 10:36:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
