-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2023 at 12:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myradio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password_hash` varchar(255) NOT NULL,
  `admin_password_salt` varchar(255) NOT NULL,
  `is_superadmin` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password_hash`, `admin_password_salt`, `is_superadmin`) VALUES
(9, 'hocine', 'bou-wassim@live.fr', '$2y$10$TtHEdE4sSBzxbRBv7pGBJu2Kj3MFgJD/QHsxINGFe01zzWUXGH6/.', '3d98', 1),
(10, 'yoshi', 'yoshi@gmail.com', '$2y$10$ZkOODQa4Q0Q6ADZPWUYbZeZlLLteg1fvD9xYLhZz4kXWiCl8LL1ju', 'ef3b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `audio_name` varchar(255) NOT NULL,
  `audio_size` int NOT NULL,
  `program_id` int DEFAULT NULL,
  `audio_id` int NOT NULL,
  `audio_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`audio_name`, `audio_size`, `program_id`, `audio_id`, `audio_date`) VALUES
('housaam el atrassi_.mp3', 764176, 2, 8, '2023-09-19'),
('sdfgh_.mp3', 764176, 2, 9, '2023-09-19'),
('azeee.mp3', 764176, 2, 10, '2023-09-19'),
('housamiiii.mp3', 764176, 5, 11, '2023-09-19'),
('last.mp3', 764176, 5, 12, '2023-09-19'),
('meme.mp3', 764176, 2, 13, '2023-09-19'),
('azeazeazezae.mp3', 764176, 5, 14, '2023-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int NOT NULL,
  `radio_id` int NOT NULL,
  `program_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `radio_id`, `program_name`, `program_description`) VALUES
(1, 1, 'القرآن والحياة', 'برنامج أسبوعي يعنى بالقرآن الكريم آياته وسوره واسقاطها على واقع الحياة\r\n'),
(2, 1, 'الدين بين السائل والمجيب', 'برنامج يجيب عن استفسارات المواطنين وانشغالاتهم بالقضايا الشرعية التي تصادفهم في يومياتهم\r\n'),
(4, 1, 'الأسرة و التربية', 'برنامج يعالج مواضيع تربوية نفسية للطفل والمراهق\r\n'),
(5, 1, 'شرعة و منهاجا', 'معالجة واقعية للمواضيع على نهج اللطف والرفق واللين\r\n'),
(6, 1, 'جبر الخواطر', 'فسحة للأمل والنظرة الإيجابية للحياة وقراءتها وفق نواميس الكون\r\n'),
(7, 1, 'هذا جيلنا', 'برنامج موجه للشباب ومرافقتهم في مشاريعهم وتطلعاتهم وابداعتهم\r\n'),
(8, 1, 'نسمات الصباح', 'برنامج صباحي يحوي العديد من الفقرات والأركان تناسب الفترة الصباحية\r\n'),
(9, 1, 'مكارم', 'برنامج حواري تفاعلي يهدف إلى تصحيح الرؤى من جهة دينية لمظاهر وسلوكات الأفراد\r\n'),
(10, 1, 'أصول الفقه علوم ومعارف', 'مقدمات مختصرة وشروح ميسرة في علم أصول الفقه\r\n'),
(11, 1, 'بصائر', 'برنامج تفاعلي يعالج امراض وأعمال القلوب ترغيبا وترهيبا\r\n'),
(16, 1, 'liil', 'yes for no ');

-- --------------------------------------------------------

--
-- Table structure for table `radio`
--

CREATE TABLE `radio` (
  `radio_id` int NOT NULL,
  `radio_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `radio`
--

INSERT INTO `radio` (`radio_id`, `radio_name`) VALUES
(1, 'Chaine 1'),
(2, 'Chaine 2'),
(3, 'Chaine 3'),
(4, 'Radio Internationale'),
(5, 'Radio Coran'),
(6, 'Radio Culture'),
(7, 'Radio Jil-FM'),
(8, 'Radio El Bahdja');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `super_admin_id` int NOT NULL,
  `super_admin_name` varchar(255) NOT NULL,
  `super_admin_email` varchar(255) NOT NULL,
  `super_admin_password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`audio_id`),
  ADD KEY `fk_program` (`program_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `radio_id` (`radio_id`);

--
-- Indexes for table `radio`
--
ALTER TABLE `radio`
  ADD PRIMARY KEY (`radio_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`super_admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `audio_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `radio`
--
ALTER TABLE `radio`
  MODIFY `radio_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `super_admin_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audio`
--
ALTER TABLE `audio`
  ADD CONSTRAINT `fk_program` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`radio_id`) REFERENCES `radio` (`radio_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
