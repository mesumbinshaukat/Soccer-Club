-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 05:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `item_price` int(200) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_review` varchar(500) NOT NULL,
  `u_message` varchar(500) NOT NULL
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
(1, 'English Premier League', 'league_logo/2023-08-13-11-18download.png'),
(2, 'Spanish La Liga', 'league_logo/2023-08-13-11-05download (1).png'),
(3, 'French League 1', 'league_logo/2023-08-13-11-29download (2).png');

-- --------------------------------------------------------

--
-- Table structure for table `marchandise`
--

CREATE TABLE `marchandise` (
  `p_id` int(11) NOT NULL,
  `p_cat` int(11) NOT NULL,
  `p_name` varchar(500) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marchandise`
--

INSERT INTO `marchandise` (`p_id`, `p_cat`, `p_name`, `p_price`, `p_image`) VALUES
(1, 1, 'Adidas Soccer Shoes', 99, 'product_photos/2023-08-13-17-10adidas2.jpg'),
(2, 1, 'Adidas Black Shoes', 89, 'product_photos/2023-08-13-17-45adidas.jpg'),
(3, 1, 'Nike Soccer Shoes', 75, 'product_photos/2023-08-13-17-47nike.jpg'),
(4, 1, 'Nike Blue Shoes', 86, 'product_photos/2023-08-13-17-26nike2.jpg'),
(5, 1, 'Puma Soccer Shoes', 110, 'product_photos/2023-08-13-17-50puma.jpg'),
(6, 4, 'Nike Soccer ', 25, 'product_photos/2023-08-13-17-33nikefootball.jpg'),
(7, 4, 'Nike Premium Soccer ', 30, 'product_photos/2023-08-13-17-03nikefootball2.jpg'),
(8, 4, 'Adidas Soccer ', 13, 'product_photos/2023-08-13-17-32adidasfootbal.jpg'),
(9, 4, 'Adidas Premium Soccer ', 18, 'product_photos/2023-08-13-17-03adidasfootball2.jpg'),
(10, 4, 'Puma Soccer ', 10, 'product_photos/2023-08-13-17-27pumafootball.jpg'),
(11, 2, 'Ronaldo Jersey', 5, 'product_photos/2023-08-13-17-04ronaldo.jpg'),
(12, 2, 'Messi Jersey', 5, 'product_photos/2023-08-13-17-26messi.jpg'),
(13, 2, 'Ozil Jersey', 5, 'product_photos/2023-08-13-17-46ozil.jpg'),
(14, 2, 'Neymar Jersey', 5, 'product_photos/2023-08-13-17-04neymar.jpg'),
(15, 2, 'Mbappe Jersey', 5, 'product_photos/2023-08-13-17-28mbappe.jpg'),
(16, 3, 'Messi Poster', 8, 'product_photos/2023-08-13-17-03messiplayer.jpg'),
(17, 3, 'Ronaldo Poster', 8, 'product_photos/2023-08-13-17-31ronaldoplayer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `match_schedule`
--

CREATE TABLE `match_schedule` (
  `match_id` int(11) NOT NULL,
  `team_1` int(11) NOT NULL,
  `team_2` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
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
(1, 1, 3, '2023-08-03', '18:00', 'san-siro', 1, 2, 4, 2, 1, 3, NULL, 3),
(2, 4, 1, '2023-08-02', '19:00', 'luzhniki', 1, 2, 2, 4, 1, 4, NULL, 3),
(3, 3, 4, '2023-08-30', '20:00', 'stadio-olimpico', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5, 6, '2023-08-03', '20:30', 'saitama-stadium', 2, 2, 4, 1, 5, 6, NULL, 20),
(5, 7, 5, '2023-02-08', '20:00', 'krestovsky', 2, 2, 1, 3, 5, 7, NULL, 19),
(6, 6, 7, '2023-09-18', '20:40', 'wembley', 2, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 9, 10, '2023-08-02', '06:59', 'luzhniki', 3, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 4, 3, '2023-08-03', '18:45', 'krestovsky', 1, 2, 5, 1, 4, 3, NULL, 11),
(9, 1, 3, '2023-08-30', '19:30', 'wembley', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(500) NOT NULL,
  `p_pic` varchar(500) NOT NULL,
  `p_achievement` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`p_id`, `p_name`, `p_pic`, `p_achievement`, `team_id`) VALUES
(1, 'Aaron Ramsdale', 'player_photo/2023-08-13-11-25Headshot_Ramsdale_1510x850_0.jpg', 0, 1),
(2, 'Ben White', 'player_photo/2023-08-13-11-01Headshot_White_1510x850_0.jpg', 0, 1),
(3, 'Fabio Vieira', 'player_photo/2023-08-13-11-24Headshot_Vieira_1510x850_0.jpg', 2, 1),
(4, 'Leandro Trossard', 'player_photo/2023-08-13-11-46Headshot_Trossard_1510x850_0.jpg', 0, 1),
(5, 'Gabriel Jesus', 'player_photo/2023-08-13-11-12Headshot_Jesus_1510x850_0.jpg', 0, 1),
(6, 'Kepa', 'player_photo/2023-08-13-11-40p109745.png', 0, 3),
(7, 'Benoît Badiashile', 'player_photo/2023-08-13-11-12p242880.png', 0, 3),
(8, 'Enzo Fernández', 'player_photo/2023-08-13-11-40p448047.png', 0, 3),
(9, 'Raheem Sterling', 'player_photo/2023-08-13-11-09p103955.png', 0, 3),
(10, 'Hakim Ziyech', 'player_photo/2023-08-13-11-57p124183.png', 0, 3),
(11, 'Alisson Becker', 'player_photo/2023-08-13-11-47p116535.png', 8, 4),
(12, 'Joe Gomez', 'player_photo/2023-08-13-11-14p171287.png', 0, 4),
(13, 'Stefan Bajcetic', 'player_photo/2023-08-13-11-42p535928.png', 0, 4),
(14, 'Mohamed Salah', 'player_photo/2023-08-13-11-17p118748.png', 0, 4),
(15, 'Diogo Jota', 'player_photo/2023-08-13-11-10p194634.png', 0, 4),
(16, 'Jan Oblak', 'player_photo/2023-08-13-11-37jan-oblak-2016-1618396920-60793.jpg', 0, 5),
(17, 'José María Giménez', 'player_photo/2023-08-13-11-38jose-maria-gimenez-atletico-1635845887-73982.jpg', 0, 5),
(18, 'Mario Hermoso', 'player_photo/2023-08-13-11-46hermoso-atletico-1590680678-39901.jpg', 0, 5),
(19, 'Koke', 'player_photo/2023-08-13-11-50koke-atletico-de-madrid-2022-2023-1676288641-101917.jpg', 5, 5),
(20, 'Antoine Griezmann', 'player_photo/2023-08-13-12-46antoine-griezmann-atletico-madrid-2021-22-1632913141-71838.jpg', 4, 5),
(21, 'Marc-André ter Stegen', 'player_photo/2023-08-13-12-06ter-stegen-barcelona-2022-23-1678693412-103482.jpg', 0, 6),
(22, 'Jules Koundé', 'player_photo/2023-08-13-12-16kounde-jules-2022-france-1670799312-98360.jpg', 0, 6),
(23, 'Iñigo Martínez', 'player_photo/2023-08-13-12-58inigo-martinez-san-sebastian-1501873184-11411.jpg', 0, 6),
(24, 'Sergiño Dest', 'player_photo/2023-08-13-12-10sergino-dest-fc-barcelona-1661845442-91322.jpg', 0, 6),
(25, 'Sergi Roberto', 'player_photo/2023-08-13-12-09sergi-roberto-barcelona-1590674579-39873.jpg', 0, 6),
(26, 'DANI VIVIAN', 'player_photo/2023-08-13-12-51p437554_t174_2023_0_001_000.png', 0, 7),
(27, 'UNAI SIMON', 'player_photo/2023-08-13-12-38p212769_t174_2023_0_001_000.png', 0, 7),
(29, 'MIKEL VESGA', 'player_photo/2023-08-13-12-16p197326_t174_2023_0_001_000.png', 0, 7),
(30, 'ALEX BERENGUER', 'player_photo/2023-08-13-12-43p195385_t174_2023_0_001_000.png', 0, 7),
(31, 'DANIEL GARCÍA CARRILLO', 'player_photo/2023-08-13-12-22p140264_t174_2023_0_001_000.png', 0, 7),
(32, 'Abdoulaye Bamba', 'player_photo/2023-08-13-12-02licensed-image.jpg', 0, 8),
(33, 'Nabil Bentaleb', 'player_photo/2023-08-13-12-49licensed-image (1).jpg', 0, 8),
(34, 'Pierrick Capelle', 'player_photo/2023-08-13-12-22licensed-image (2).jpg', 0, 8),
(35, 'Zinédine Ould Khaled', 'player_photo/2023-08-13-12-59images.jpg', 0, 8),
(36, 'Batista Mendy', 'player_photo/2023-08-13-12-40images (1).jpg', 0, 8),
(37, 'Philipp Köhn', 'player_photo/2023-08-13-12-17philipp-kohn-red-bull-salzburg-1648655738-82954.jpg', 0, 9),
(38, 'Mohammed Salisu', 'player_photo/2023-08-13-12-13mohammed-salisu-real-valladolid-cf-1588228666-37404.jpg', 0, 9),
(39, 'Caio Henrique', 'player_photo/2023-08-13-12-59caio-henrique-as-monaco-2022-1660295642-90048.jpg', 0, 9),
(40, 'Ruben Aguilar', 'player_photo/2023-08-13-12-04ruben-aguilar-as-monaco-1588593562-37599.jpg', 0, 9),
(41, 'Guillermo Maripán ', 'player_photo/2023-08-13-12-36guillermo-maripan-chile-2021-1648637157-82916.jpg', 0, 9),
(42, 'Loïc Perrin', 'player_photo/2023-08-13-12-47loic-perrin-im-trikot-von-as-st-etienne-1552034707-20947.jpg', 0, 10),
(43, 'Julien Sablé', 'player_photo/2023-08-13-12-59licensed-image (3).jpg', 0, 10),
(44, 'Mathieu Debuchy', 'player_photo/2023-08-13-12-52licensed-image (4).jpg', 0, 10),
(45, 'Paul Baysse', 'player_photo/2023-08-13-12-41licensed-image (5).jpg', 0, 10),
(46, 'Habib Maïga', 'player_photo/2023-08-13-12-52RC_Lens_-_FC_Metz_(14-03-2021)_39_(cropped).jpg', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`c_id`, `c_name`) VALUES
(1, 'Shoes'),
(2, 'Jerseys'),
(3, 'Player Posters'),
(4, 'Soccer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_time` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(500) NOT NULL,
  `t_logo` varchar(500) NOT NULL,
  `t_players_count` int(100) NOT NULL,
  `league_id` int(11) NOT NULL,
  `total_win` int(100) NOT NULL,
  `total_lost` int(100) NOT NULL,
  `total_drawn` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`t_id`, `t_name`, `t_logo`, `t_players_count`, `league_id`, `total_win`, `total_lost`, `total_drawn`) VALUES
(1, 'Arsenal', 'team_logo/2023-08-13-11-52Arsenal-Logo.png', 12, 1, 2, 0, 0),
(3, 'Chelsea', 'team_logo/2023-08-13-11-40Chelsea_FC.png', 14, 1, 0, 2, 0),
(4, 'Liverpool FC', 'team_logo/2023-08-13-11-14Liverpool_FC.png', 14, 1, 1, 1, 0),
(5, 'Atletico-Madrid', 'team_logo/2023-08-13-11-58atletico-madrid.png', 13, 2, 2, 0, 0),
(6, 'Barcelona', 'team_logo/2023-08-13-11-16barcelona.png', 14, 2, 0, 1, 0),
(7, 'Athletic', 'team_logo/2023-08-13-11-43athletic.png', 13, 2, 0, 1, 0),
(8, 'Angers-Sco', 'team_logo/2023-08-13-11-54angers-sco.png', 13, 3, 0, 0, 0),
(9, 'As-Monaco', 'team_logo/2023-08-13-11-16as-monaco.png', 14, 3, 0, 0, 0),
(10, 'As-Saint-Etienne', 'team_logo/2023-08-13-11-55as-saint-etienne.png', 14, 3, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(500) NOT NULL,
  `u_password` varchar(500) NOT NULL,
  `u_pofile` varchar(500) NOT NULL,
  `u_contact` int(100) NOT NULL,
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
  ADD KEY `order_id` (`order_id`);

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
-- Indexes for table `marchandise`
--
ALTER TABLE `marchandise`
  ADD PRIMARY KEY (`p_id`);

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
  ADD KEY `team_id` (`team_id`);

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
  ADD KEY `league_id` (`league_id`);

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
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marchandise`
--
ALTER TABLE `marchandise`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `match_schedule`
--
ALTER TABLE `match_schedule`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`);

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
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`t_id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`l_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
