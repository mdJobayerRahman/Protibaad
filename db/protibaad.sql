-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 12:31 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `protibaad`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `posted_by` int(20) NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `posted_by`, `posted_at`) VALUES
(22, 'BCL leader, five others held for cheating in teachers’ recruitment test', 'Police arrested six people including a local leader of Bangladesh Chhatra League (BCL) from Magura town for their involvement in cheating in the teachers’ recruitment test on Friday.\r\nThe arrestees are BCL president of the Hossain Shaheed government Suhrawardy College wing Fahim Faisal Rabbi, his cousin Iftekharul Islam Tito, four examinees- Tarana Afroz, Amirul Islam Sohail, Ismat Ara Jharna, and Shahnaz Begum.\r\nAccording to police, a mobile conferencing device in the form of a banking credit card was recovered after searching examinee Tarana Afroz at AG Academy School exam center in Magura Sadar upazila on Friday. Others  were arrested on the basis of her information.\r\n', 'uploads/blog/blog1.jpeg', 10, '2022-04-23 14:38:00'),
(23, 'Hijab row: Sylhet teacher in hiding for a month over ‘false’ allegation', 'A Hindu teacher in Golapganj upazila of Sylhet has been in hiding for the last one month after being framed in a smear campaign that turned his request to remove the niqab (veil on face) into “forced removal” and defamation of Islam.\r\nThe campaign, spearheaded by a classmate of the girl in question on Facebook, sparked an uproar on social media and among locals as the teacher was accused of making derogatory remarks about the Islamic attire for women during a class on March 15.\r\nThe outrage prompted the authorities to form two probe bodies – one under the school governing body and the other by the upazila administration. But the teacher had to flee the area for safety.\r\n', 'uploads/blog/blog2.jpeg', 10, '2022-04-23 14:38:28'),
(24, 'Police ordered to stop arbitrarily search of goods-laden vehicles', 'Field-level police members have been instructed not to stop or impede vehicles carrying goods on the highways or roads without any specific complaint or information.\r\nThe instruction was given during the monthly crime review meeting for the month of February 2022, held at the Police Headquarters in Dhaka on Tuesday.\r\nThe meeting was attended by all the metropolitan commissioners, Range DIGs and district police superintendents with Additional IG (Crime and Operations) M Khurshid Hossain in the chair.\r\n\r\nMentioning the directive, Khurshid Hossain said police are in a tough position to curb extortion during the holy month of Ramadan and the upcoming Eid.\r\nHe also said that the security of shopping malls and markets has to be strengthened with a focus on Ramadan and Eid.\r\nHe stressed the importance of strengthening traffic management to keep the traffic flowing normally.\r\n', 'uploads/blog/blog3.jpeg', 10, '2022-04-23 14:38:57'),
(25, 'hello', 'test', 'uploads/blog/HT_Service_01-removebg-preview.png', 10, '2022-04-23 16:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` varchar(1000) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `crimes`
--

CREATE TABLE `crimes` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `posted_by` int(20) NOT NULL,
  `posted_at` datetime NOT NULL,
  `approve_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crimes`
--

INSERT INTO `crimes` (`id`, `title`, `description`, `image`, `location`, `posted_by`, `posted_at`, `approve_status`) VALUES
(10, 'Fresh clashes erupt between Dhaka College students, New Market traders', 'Fresh clashes erupted between Dhaka College students and New Market traders on Tuesday morning following the confrontation in the wee hours of the day.\r\nWitnesses reported running battles between students and shopkeepers with crude bombs being exploded.\r\n', 'uploads/crime/alert1.jpg', 'New market', 12, '2022-04-23 20:52:22', 1),
(11, 'Murder accused threaten family members of victim in Barisal', 'The family members of a housewife, murdered on April 3 for refusing to pay extortion money in Kashipur area of Barisal, say they are currently living under constant fear of being attacked by the murderers.\r\nGias Uddin, the husband of the woman named Afia Khatun, sued four persons in a case in this connection. Since then, the accused have been asking them to withdraw the case and issuing them life threats.\r\nThe accused are Miraj Mistry, 40, Tauhid Hossain Manu, 40, Nipu Aktee, 25, Jumman Hossain,', 'uploads/crime/blog1.jpeg', 'barisal', 12, '2022-04-23 20:54:00', 1),
(22, 'Travel ban on graft suspects: SC modifies HC ruling on prior court permissio', 'The Supreme Court today modified, with some observations and directions, the High Court ruling that Anti-Corruption Commission (ACC) has to take court permission to impose embargo on corruption suspects or accused from leaving the country.\r\n\r\nThe Appellate Division of the SC, however, did not disclose the observations and directions, saying that those will be included in its written verdict which will be released in 15 days.', '', 'Dhaka', 12, '2022-04-23 22:48:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `missings`
--

CREATE TABLE `missings` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `concern_contact` varchar(255) NOT NULL,
  `approve_status` int(20) NOT NULL DEFAULT 0,
  `posted_by` int(20) NOT NULL,
  `posted_at` datetime(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `missings`
--

INSERT INTO `missings` (`id`, `name`, `age`, `description`, `image`, `concern_contact`, `approve_status`, `posted_by`, `posted_at`) VALUES
(3, 'Jobayer Rahman', '24', 'This guy is missing for the last few weeks .If anyone see him please contact \r\n\r\n', 'uploads/missing/jubayer.jpg', '01712345678', 1, 11, '2022-04-23 20:32:48.00000'),
(5, 'Swapmil Biswas', '23', 'This guy is missing for the last few weeks .If anyone see him please contact ', 'uploads/missing/swapnil.jpg', '01712345678', 1, 11, '2022-04-23 20:43:59.00000'),
(10, 'Mizanur Rahman', '24', 'Missing', 'uploads/missing/mizan.jpg', '01712345678', 1, 12, '2022-04-23 22:50:27.00000');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poll_answers`
--

CREATE TABLE `poll_answers` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `votes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `q_category`
--

CREATE TABLE `q_category` (
  `q_category_id` int(8) NOT NULL,
  `q_category_name` varchar(300) NOT NULL,
  `q_category_des` varchar(400) NOT NULL,
  `q_category_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `q_category`
--

INSERT INTO `q_category` (`q_category_id`, `q_category_name`, `q_category_des`, `q_category_date`) VALUES
(1, 'Educational', 'Educational', '2021-09-17 14:06:34'),
(2, 'Social', 'Social', '2021-09-17 14:07:08'),
(3, 'Civil Rights', 'Civil Rights', '2021-09-17 14:08:13'),
(4, 'Health Care Availability', 'test', '2022-01-23 01:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(300) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_date` datetime NOT NULL DEFAULT current_timestamp(),
  `thread_user_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(191) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(9, 'sharif', 's@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user'),
(10, 'admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'admin'),
(11, 'Shakil', 'shakilahmed4011@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user'),
(12, 'hello', 'hello@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crimes`
--
ALTER TABLE `crimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missings`
--
ALTER TABLE `missings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `crimes`
--
ALTER TABLE `crimes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `missings`
--
ALTER TABLE `missings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
