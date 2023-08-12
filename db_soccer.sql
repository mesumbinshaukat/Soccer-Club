-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 05:09 PM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `payment_id` int(11) NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `item_price` int(100) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`payment_id`, `item_name`, `item_price`, `order_id`) VALUES
(1, 'nike shoes', 300, 2),
(2, 'nike shoes', 300, 3),
(3, 'nike shoes', 300, 4),
(4, 'nike shoes', 300, 5),
(5, 'nike shoes', 300, 6),
(6, 'nike shoes', 300, 7),
(7, 'polo shirt', 450, 7),
(8, 'nike shoes', 300, 8),
(9, 'polo shirt', 450, 8),
(10, 'nike shoes', 300, 9),
(11, 'polo shirt', 450, 9),
(12, 'nike shoes', 300, 10),
(13, 'polo shirt', 450, 10),
(14, 'nike shoes', 300, 11),
(15, 'polo shirt', 450, 11),
(16, 'nike shoes', 300, 12),
(17, 'nike shoes', 300, 13);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_review` varchar(100) NOT NULL,
  `u_message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `u_name`, `u_email`, `u_review`, `u_message`) VALUES
(1, '', '', 'good ', 'good website'),
(2, '', '', 'good ', 'good website'),
(3, '', '', 'good ', 'good'),
(4, '', '', 'good ', 'hehe'),
(5, '', '', 'good ', 'goood products'),
(6, 'unknown user', 'anonymous', 'good ', 'hehe');

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
(3, 2, 'nike shoes', 300, 'product_photos/2023-08-11-23-51img_1.jpg'),
(4, 3, 'polo shirt', 450, 'product_photos/2023-08-11-23-10img_3.jpg');

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
  `Location` varchar(200) NOT NULL,
  `m_league_id` int(11) DEFAULT NULL,
  `m_status` int(11) DEFAULT 0,
  `team_1_goals` int(11) DEFAULT NULL,
  `team_2_goals` int(11) DEFAULT NULL,
  `won_team` int(11) DEFAULT NULL,
  `lost_team` int(11) DEFAULT NULL,
  `drawn` int(11) DEFAULT NULL,
  `player_of_match` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `match_schedule`
--

INSERT INTO `match_schedule` (`match_id`, `team_1`, `team_2`, `date`, `time`, `Location`, `m_league_id`, `m_status`, `team_1_goals`, `team_2_goals`, `won_team`, `lost_team`, `drawn`, `player_of_match`) VALUES
(9, 2, 3, '2023-08-12', '17:52', 'signal-iduna-park', 11, 2, 2, 3, 3, 2, NULL, 10),
(10, 4, 16, '2023-08-13', '05:54', 'krestovsky', 11, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 4, 14, '2023-08-11', '17:53', 'krestovsky', 11, 2, 3, 2, 4, 14, NULL, 0),
(12, 16, 3, '2023-08-11', '17:54', 'saitama-stadium', 11, 2, 2, 2, NULL, NULL, 0, 0);

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
(8, 'Casmiro', 'player_photo/2023-08-10-13-51casmiro mancester united.jpg', 11, 14),
(9, 'Muhammad Salah', 'player_photo/2023-08-10-13-56m salah liverpool.jpg', NULL, 3),
(10, 'William Saliba', 'player_photo/2023-08-10-13-17william saliba livepool.jfif', 9, 3);

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
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_time` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_time`, `user_id`) VALUES
(1, '1947', 1),
(2, '1976', 1),
(3, '1940', 1),
(4, '1974', 1),
(5, '1931', 1),
(6, '1990', 1),
(7, '1988', 1),
(8, '1977', 1),
(9, '1943', 1),
(10, '1957', 1),
(11, '1980', 1),
(12, '1932', 1),
(13, '1943', 1);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(500) NOT NULL,
  `t_logo` varchar(500) NOT NULL,
  `t_players_count` int(11) NOT NULL,
  `league_id` int(11) NOT NULL,
  `total_win` int(11) DEFAULT NULL,
  `total_drawn` int(11) DEFAULT NULL,
  `total_lost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`t_id`, `t_name`, `t_logo`, `t_players_count`, `league_id`, `total_win`, `total_drawn`, `total_lost`) VALUES
(2, 'Arsenal', 'team_logo/Arsenal-Logo.png', 14, 11, NULL, NULL, 1),
(3, 'Liverpool FC', 'team_logo/Liverpool_FC.png', 15, 11, 1, NULL, NULL),
(4, 'Chelsea', 'team_logo/Chelsea_FC.png', 16, 11, 2, NULL, NULL),
(14, 'Manchester United', 'team_logo/2023-08-10-11-52manchester united.jpg', 12, 11, NULL, NULL, 1),
(16, 'zohair ki team', 'team_logo/2023-08-11-19-58logo_4.png', 15, 11, NULL, NULL, NULL);

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
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_password`, `u_profile`, `u_contact`, `user_email`) VALUES
(1, 'sarim khan', '$2y$10$gFcKDYQGjTty3chxQ.EajuK0oVHO5A6lPLswoEhhfJufkXjii/6Dm', 'portfolio.png', 987662223, 'sarimsaleem515@gmail.com'),
(2, 'Username', '$2y$10$xaSmokELAGA5/R5qtJ8HVucfYUdRDTtelHVnqC0kMgWcsK6k9pyli', 'dataset-card (2).png', 2147483647, 'smokeark3@gmail.com');

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
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `m_league_id` (`m_league_id`),
  ADD KEY `won_team` (`won_team`),
  ADD KEY `lost_team` (`lost_team`);

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
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `league_acheivment_id` (`league_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `match_schedule`
--
ALTER TABLE `match_schedule`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `match_schedule_ibfk_3` FOREIGN KEY (`m_league_id`) REFERENCES `leagues` (`l_id`),
  ADD CONSTRAINT `match_schedule_ibfk_4` FOREIGN KEY (`won_team`) REFERENCES `team` (`t_id`),
  ADD CONSTRAINT `match_schedule_ibfk_5` FOREIGN KEY (`lost_team`) REFERENCES `team` (`t_id`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`t_id`),
  ADD CONSTRAINT `players_ibfk_2` FOREIGN KEY (`p_achievement`) REFERENCES `match_schedule` (`match_id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
