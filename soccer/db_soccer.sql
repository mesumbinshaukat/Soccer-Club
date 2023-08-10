-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 11:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `payment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(500) NOT NULL,
  `l_logo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`l_id`, `l_name`, `l_logo`) VALUES
(5, 'Premier League', 'premier-league-logo-symbol-with-name-design-england-football-european-countries-football-teams-illustration-with-purple-background-free-vector.jpg'),
(6, 'Premier League', 'premier-league-logo-symbol-with-name-design-england-football-european-countries-football-teams-illustration-with-purple-background-free-vector.jpg'),
(7, 'Premier League', 'premier-league-logo-symbol-with-name-design-england-football-european-countries-football-teams-illustration-with-purple-background-free-vector.jpg'),
(8, 'Premier League', 'premier-league-logo-symbol-with-name-design-england-football-european-countries-football-teams-illustration-with-purple-background-free-vector.jpg'),
(9, 'Premier League', 'premier-league-logo-symbol-with-name-design-england-football-european-countries-football-teams-illustration-with-purple-background-free-vector.jpg'),
(11, 'FIFA WORLD CUP', 'russia-world-cup (2).jpg0909-0808-232323231691592882'),
(12, 'FIFA WORLD CUP', 'premier-league-logo-symbol-with-name-design-england-football-european-countries-football-teams-illustration-with-purple-background-free-vector.jpg0909-0808-232323231691592978'),
(13, 'FIFA WORLD CUP', 'russia-world-cup (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `leagues_statistics`
--

CREATE TABLE `leagues_statistics` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `league_id` int(11) NOT NULL,
  `match_schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marchandise`
--

CREATE TABLE `marchandise` (
  `p_id` int(11) NOT NULL,
  `p_cat` int(11) NOT NULL,
  `p_name` varchar(500) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marchandise`
--

INSERT INTO `marchandise` (`p_id`, `p_cat`, `p_name`, `p_price`, `p_image`) VALUES
(2, 2, 'abc', 344, '../product_photos/2023-08-09-23-24654_russia2018_logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `match_schedule`
--

CREATE TABLE `match_schedule` (
  `match_id` int(11) NOT NULL,
  `team_1` int(11) NOT NULL,
  `team_2` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(500) NOT NULL,
  `m_league_id` int(11) DEFAULT NULL,
  `m_status` int(11) DEFAULT NULL,
  `team_1_goals` int(11) DEFAULT NULL,
  `team_2_goals` int(11) DEFAULT NULL,
  `player_of_match` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `match_schedule`
--

INSERT INTO `match_schedule` (`match_id`, `team_1`, `team_2`, `date`, `time`, `m_league_id`, `m_status`, `team_1_goals`, `team_2_goals`, `player_of_match`) VALUES
(1, 2, 3, '2023-08-09', '21:00', 6, 2, 3, 1, 4),
(2, 4, 2, '2023-08-09', '01:39', 6, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(111) NOT NULL,
  `p_pic` varchar(111) NOT NULL,
  `p_achievement` int(11) DEFAULT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`p_id`, `p_name`, `p_pic`, `p_achievement`, `team_id`) VALUES
(4, 'Cristiano Ronaldo', '../player_photo/2023-08-09-21-31manchester city.png', NULL, 3),
(5, 'Lionel Messi', '../player_photo/2023-08-09-21-42654_russia2018_logo.jpg', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`c_id`, `c_name`) VALUES
(1, 'Jersey'),
(2, 'Shoes'),
(3, 'Player Posters');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(500) NOT NULL,
  `t_logo` varchar(500) NOT NULL,
  `t_players_count` int(11) NOT NULL,
  `league_acheivment_id` int(11) DEFAULT NULL,
  `total_win` int(11) DEFAULT NULL,
  `total_drawn` int(11) DEFAULT NULL,
  `total_lost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`t_id`, `t_name`, `t_logo`, `t_players_count`, `league_acheivment_id`, `total_win`, `total_drawn`, `total_lost`) VALUES
(2, 'Arsenal', '../team_logo2023-08-09-18-02Arsenal-Logo.png', 14, NULL, NULL, NULL, NULL),
(3, 'Liverpool FC', '../team_logo2023-08-09-18-54Liverpool_FC.png', 15, NULL, NULL, NULL, NULL),
(4, 'Chelsea', '../team_logo2023-08-09-20-46Chelsea_FC.png', 16, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(500) NOT NULL,
  `u_password` varchar(500) NOT NULL,
  `u_profile` varchar(500) NOT NULL,
  `u_contact` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `leagues_statistics`
--
ALTER TABLE `leagues_statistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `league_id` (`league_id`);

--
-- Indexes for table `marchandise`
--
ALTER TABLE `marchandise`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_cat` (`p_cat`);

--
-- Indexes for table `match_schedule`
--
ALTER TABLE `match_schedule`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `team_1` (`team_1`),
  ADD KEY `team_2` (`team_2`),
  ADD KEY `m_league_id` (`m_league_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `p_achievement` (`p_achievement`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `league_acheivment_id` (`league_acheivment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `leagues_statistics`
--
ALTER TABLE `leagues_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marchandise`
--
ALTER TABLE `marchandise`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `match_schedule`
--
ALTER TABLE `match_schedule`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `marchandise` (`p_id`);

--
-- Constraints for table `leagues_statistics`
--
ALTER TABLE `leagues_statistics`
  ADD CONSTRAINT `leagues_statistics_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`t_id`),
  ADD CONSTRAINT `leagues_statistics_ibfk_2` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`l_id`);

--
-- Constraints for table `marchandise`
--
ALTER TABLE `marchandise`
  ADD CONSTRAINT `marchandise_ibfk_1` FOREIGN KEY (`p_cat`) REFERENCES `product_category` (`c_id`);

--
-- Constraints for table `match_schedule`
--
ALTER TABLE `match_schedule`
  ADD CONSTRAINT `match_schedule_ibfk_1` FOREIGN KEY (`team_1`) REFERENCES `team` (`t_id`),
  ADD CONSTRAINT `match_schedule_ibfk_2` FOREIGN KEY (`team_2`) REFERENCES `team` (`t_id`),
  ADD CONSTRAINT `match_schedule_ibfk_3` FOREIGN KEY (`m_league_id`) REFERENCES `leagues` (`l_id`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`t_id`),
  ADD CONSTRAINT `players_ibfk_2` FOREIGN KEY (`p_achievement`) REFERENCES `match_schedule` (`match_id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`league_acheivment_id`) REFERENCES `leagues_statistics` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
