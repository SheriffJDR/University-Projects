-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2023 at 03:36 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `400008020`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_fname` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin_lname` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fname`, `admin_lname`) VALUES
(1, 'Fonz', 'Ygou'),
(2, 'Christie', 'Friskey'),
(3, 'Gizela', 'Gittose'),
(4, 'Noble', 'Milsom'),
(5, 'Gerry', 'Mellor'),
(6, 'Alena', 'Samples'),
(7, 'Terri', 'Lightewood'),
(8, 'Lilas', 'Bruni'),
(9, 'Georgianne', 'Carnaman'),
(10, 'Ebonee', 'Eymer');

-- --------------------------------------------------------

--
-- Table structure for table `admin_credential`
--

DROP TABLE IF EXISTS `admin_credential`;
CREATE TABLE IF NOT EXISTS `admin_credential` (
  `admin_id` int NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_credential`
--

INSERT INTO `admin_credential` (`admin_id`, `password`) VALUES
(6, 'jsFsfg$1asSX');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `application_id` int NOT NULL AUTO_INCREMENT,
  `advisor_id` int NOT NULL,
  `club_id` int NOT NULL,
  `student_id` int NOT NULL,
  `application_status` enum('pending','rejected','accepted') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`application_id`),
  KEY `advisor_id` (`advisor_id`),
  KEY `club_id` (`club_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `advisor_id`, `club_id`, `student_id`, `application_status`, `date`) VALUES
(11, 9, 8, 22, 'rejected', '2023-03-17'),
(12, 2, 6, 20, 'rejected', '2023-03-25'),
(13, 9, 5, 18, 'accepted', '2023-09-24'),
(14, 7, 6, 17, 'rejected', '2022-12-06'),
(15, 5, 8, 24, 'pending', '2023-04-06'),
(16, 1, 4, 18, 'rejected', '2022-12-19'),
(17, 4, 5, 16, 'accepted', '2022-11-25'),
(18, 2, 8, 16, 'pending', '2023-06-18'),
(19, 5, 3, 20, 'pending', '2023-07-22'),
(20, 2, 8, 16, 'accepted', '2023-09-19'),
(32, 3, 2, 16, 'rejected', '2023-11-19'),
(33, 10, 5, 16, 'pending', '2023-11-19'),
(34, 6, 4, 16, 'pending', '2023-11-19'),
(35, 10, 1, 21, 'accepted', '2023-11-20'),
(36, 10, 1, 18, 'pending', '2023-11-20'),
(37, 3, 2, 18, 'pending', '2023-11-20'),
(38, 10, 5, 18, 'pending', '2023-11-20'),
(41, 3, 2, 16, 'pending', '2023-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `attendance_id` int NOT NULL AUTO_INCREMENT,
  `meeting_id` int NOT NULL,
  `student_id` int NOT NULL,
  `attendance_date` date DEFAULT NULL,
  PRIMARY KEY (`attendance_id`),
  KEY `meeting_id` (`meeting_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `meeting_id`, `student_id`, `attendance_date`) VALUES
(1, 3, 25, '2023-08-21'),
(2, 4, 19, '2023-07-23'),
(3, 3, 20, '2023-02-13'),
(4, 1, 17, '2023-06-21'),
(5, 2, 20, '2023-08-10'),
(6, 4, 20, '2023-08-29'),
(7, 1, 25, '2023-01-03'),
(8, 3, 22, '2023-05-13'),
(9, 1, 18, '2022-12-16'),
(10, 4, 20, '2023-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `club_id` int NOT NULL AUTO_INCREMENT,
  `advisor_id` int NOT NULL,
  `club_status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `club_name` varchar(30) NOT NULL,
  `club_description` varchar(1000) NOT NULL,
  `membership_size` int NOT NULL,
  PRIMARY KEY (`club_id`),
  KEY `advisor_id` (`advisor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`club_id`, `advisor_id`, `club_status`, `club_name`, `club_description`, `membership_size`) VALUES
(1, 10, 'active', 'Aerospace', 'The Aerospace Club is a cutting-edge club that caters to aviation enthusiasts and professionals alike. This comprehensive club offers a range of exclusive benefits, including access to the latest industry news, networking opportunities, and educational resources. With a focus on innovation and collaboration, members can stay up-to-date with advancements in aerospace technology and connect with like-minded individuals. ', 100),
(2, 3, 'inactive', 'Comic', 'Welcome to the Comic Club! We are a group of comic enthusiasts who gather to discuss and explore the fascinating world of comics. Whether you are a die-hard fan or just starting your comic journey, there is a place for you here. Join us for engaging discussions, recommendations, and even the occasional comic book swap. We meet regularly to share our love for comics and connect with like-minded individuals. Come and be a part of our community; together, let\'s celebrate the art and storytelling that makes comics truly special.', 24),
(3, 3, 'active', 'Technology', 'The technology club is a gathering of individuals who share a common interest in all things related to technology. Members come together to discuss and explore new advancements, share their knowledge and experiences, and collaborate on various tech-related projects. The club organizes workshops, seminars, and guest speaker sessions to keep members updated with the latest trends and innovations. It also provides a platform for networking and connecting with like-minded individuals. Whether you\'re a tech enthusiast, student, or professional, the technology club offers a supportive and stimulating environment to further your understanding and passion for technology.', 80),
(4, 6, 'active', 'Health Care', 'The Health Care Club is a community organization dedicated to promoting wellness and providing support for individuals and families in need of healthcare services. Our club organizes various events such as health fairs, workshops, and fundraisers to raise awareness about healthcare issues and raise funds to help those in need. We also collaborate with healthcare professionals to provide educational resources and informational sessions on topics such as preventive care, mental health, and chronic disease management. Join the Health Care Club to make a difference in the lives of others and contribute to the betterment of our community\'s health.', 21),
(5, 10, 'active', 'Art', 'The art club is a place for individuals to gather and express their creativity through various forms of art. Members can engage in activities such as painting, drawing, sculpting, and more. The club provides a supportive and inclusive environment where artists of all skill levels can learn, grow, and collaborate together. Whether you are a seasoned artist or someone just beginning their artistic journey, the art club welcomes everyone who has a passion for art. Join us to explore your artistic talents, meet like-minded individuals, and create beautiful works of art together.', 37),
(6, 4, 'active', 'Music Club', 'The Music Club is a vibrant and lively club that offers a space for music enthusiasts to come together and enjoy live performances. The club is typically designed with a stage area for bands or musicians to perform, as well as a dance floor for patrons to groove to the music. The atmosphere is usually energetic and filled with music lovers of all ages and backgrounds', 36),
(7, 1, 'inactive', 'Religious Studies Club', 'The Religious Studies Club is a club for individuals interested in exploring various religious traditions and their impact on society. This club offers a platform for members to engage in meaningful discussions, attend guest lectures by renowned scholars, and participate in community service projects that promote religious tolerance and understanding. With a diverse range of activities and events, the Religious Studies Club provides a welcoming and inclusive environment for individuals to deepen their knowledge and appreciation of different faiths.', 71),
(8, 9, 'active', 'Gym', '1. With Gym club, users can access a wide range of fitness equipment, including cardio machines, weightlifting equipment, and functional training tools. Our club also offers personalized training programs and expert guidance from certified trainers to help users achieve their fitness goals.\r\n2. Gym Club is equipped with state-of-the-art facilities, including locker rooms, showers, and changing rooms, to ensure that users have a comfortable and hassle-free workout experience. The club welcomes people of all fitness levels, from beginners to advanced athletes.', 83),
(9, 4, 'active', 'Car', '1. Introducing the Car Club, a premium membership program designed for car enthusiasts. With exclusive benefits and privileges, this membership offers a unique experience for those passionate about automobiles.\r\n2. Gain access to a wide range of perks, including discounted rates on car rentals, priority service at partner garages, and invitations to exclusive events and car shows', 78),
(16, 2, 'active', 'Swimming', 'Learn to swim', 23),
(21, 2, 'active', 'Language', 'A language club is a group or organization that provides a platform for individuals to come together and practice or learn a particular language. These clubs typically host meetings, events, or classes where members can engage in conversation, activities, and exercises to improve their language skills. Language clubs can cater to different proficiency levels, from beginners to advanced learners, and may focus on specific languages or be more inclusive in offering various language options. Joining a language club can be a fun and effective way to immerse oneself in a language and connect with like-minded individuals.', 34);

-- --------------------------------------------------------

--
-- Table structure for table `club_membership`
--

DROP TABLE IF EXISTS `club_membership`;
CREATE TABLE IF NOT EXISTS `club_membership` (
  `membership_id` int NOT NULL AUTO_INCREMENT,
  `club_id` int DEFAULT NULL,
  `student_id` int NOT NULL,
  `activity_status` varchar(10) NOT NULL,
  `enrollment_date` date DEFAULT NULL,
  PRIMARY KEY (`membership_id`),
  KEY `club_id` (`club_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `club_membership`
--

INSERT INTO `club_membership` (`membership_id`, `club_id`, `student_id`, `activity_status`, `enrollment_date`) VALUES
(1, 5, 23, 'active', '2023-10-15'),
(2, 2, 22, 'active', '2023-07-07'),
(3, 9, 17, 'not active', '2023-07-03'),
(4, 3, 17, 'active', '2023-07-04'),
(5, 2, 23, 'not active', '2023-09-30'),
(6, 4, 25, 'not active', '2023-08-03'),
(7, 2, 19, 'not active', '2023-07-06'),
(8, 2, 17, 'active', '2023-08-21'),
(9, 5, 20, 'active', '2023-05-07'),
(10, 4, 18, 'active', '2023-08-22'),
(11, 1, 16, 'active', '2023-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `student_id` int NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`student_id`,`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`student_id`, `email`) VALUES
(17, 'aceller8@diigo.com'),
(17, 'csherrell9@reverbnation.com'),
(16, 'dtezure7@hao123.com'),
(17, 'gblamire2@businessinsider.com'),
(18, 'glacroux0@bandcamp.com'),
(19, 'lmandell6@webeden.co.uk'),
(24, 'mzuan4@illinois.edu'),
(22, 'ppriscott1@nhs.uk'),
(23, 'rcraghead5@cisco.com'),
(24, 'tspellacy3@rakuten.co.jp');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `equip_id` int NOT NULL AUTO_INCREMENT,
  `club_id` int NOT NULL,
  `equip_name` varchar(50) NOT NULL,
  `equip_description` varchar(200) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`equip_id`),
  KEY `club_id` (`club_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equip_id`, `club_id`, `equip_name`, `equip_description`, `quantity`) VALUES
(1, 2, 'Gloves', 'Tennis Gloves', 65),
(2, 3, 'Goggles', 'Woodwork club goggles', 64),
(3, 9, 'Bat', 'Cricket Club Bat', 81),
(4, 1, 'Ball', 'Cricket Club Ball', 3),
(5, 6, 'Beaker', 'Chemistry beaker', 27),
(6, 8, 'Pads', 'Cricket club pads', 33);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `mat_id` int NOT NULL AUTO_INCREMENT,
  `club_id` int NOT NULL,
  `mat_name` varchar(50) NOT NULL,
  `mat_description` varchar(200) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`mat_id`),
  KEY `club_id` (`club_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`mat_id`, `club_id`, `mat_name`, `mat_description`, `quantity`) VALUES
(9, 9, 'Cloth', 'Polyester Cloth', 66),
(10, 8, 'HCL', 'Hydrochloric Acid', 29),
(11, 3, 'Hot and Cold', 'Hot and Cold Spray', 86),
(12, 9, 'Cloth', 'Silk Cloth', 79);

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

DROP TABLE IF EXISTS `meeting`;
CREATE TABLE IF NOT EXISTS `meeting` (
  `meeting_id` int NOT NULL AUTO_INCREMENT,
  `club_id` int NOT NULL,
  `meeting_time` time NOT NULL,
  `meeting_location` varchar(20) NOT NULL,
  `meeting_day` varchar(10) NOT NULL,
  PRIMARY KEY (`meeting_id`),
  KEY `club_id` (`club_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meeting_id`, `club_id`, `meeting_time`, `meeting_location`, `meeting_day`) VALUES
(1, 1, '22:02:15', 'Amílcar Cabral Inter', 'Tuesday'),
(2, 6, '18:23:48', 'Chicago Meigs Airpor', 'Wednesday'),
(3, 4, '06:33:12', 'Beauregard Regional ', 'Thursday'),
(4, 1, '21:46:36', 'Paris-Le Bourget Air', 'Tuesday'),
(5, 16, '15:49:00', 'Aquatic Center', 'Monday'),
(9, 21, '19:27:00', 'SLT', 'Monday');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `club_id` int NOT NULL,
  `student_id` int NOT NULL,
  `payment_description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `club_id` (`club_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `club_id`, `student_id`, `payment_description`) VALUES
(1, 2, 19, '1 dollar paid'),
(2, 7, 24, '1 dollar every week'),
(3, 5, 25, '1 dollar every week'),
(4, 1, 18, '1 dollar paid'),
(5, 3, 21, '1 dollar every week'),
(6, 7, 22, '1 dollar every week'),
(7, 3, 18, '1 dollar paid'),
(8, 7, 24, '1 dollar every week'),
(9, 3, 23, '1 dollar every week'),
(10, 5, 16, '1 dollar paid');

-- --------------------------------------------------------

--
-- Table structure for table `staff_advisor`
--

DROP TABLE IF EXISTS `staff_advisor`;
CREATE TABLE IF NOT EXISTS `staff_advisor` (
  `advisor_id` int NOT NULL AUTO_INCREMENT,
  `advisor_fname` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `advisor_lname` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`advisor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bg_0900_ai_ci;

--
-- Dumping data for table `staff_advisor`
--

INSERT INTO `staff_advisor` (`advisor_id`, `advisor_fname`, `advisor_lname`) VALUES
(1, 'Mikael', 'Garretson'),
(2, 'Nelie', 'Folling'),
(3, 'Alys', 'Gladdifh'),
(4, 'Osborn', 'Ixer'),
(5, 'Annissa', 'Partington'),
(6, 'Matelda', 'Kerner'),
(7, 'Kathe', 'Hearthfield'),
(8, 'Lyndsey', 'Newell'),
(9, 'Nadiya', 'Findley'),
(10, 'Starla', 'Stichall');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `student_fname` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `student_lname` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `student_class` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_fname`, `student_lname`, `student_class`, `date_of_birth`) VALUES
(16, 'Kaia', 'Dunwoody', '4', '2022-11-03'),
(17, 'Llywellyn', 'Gaylord', '3', '2022-11-21'),
(18, 'Stanislaus', 'Whorall', '2', '2023-09-07'),
(19, 'Frances', 'Paslow', '2', '2023-07-05'),
(20, 'Laural', 'Rowlings', '3', '2023-08-17'),
(21, 'Adler', 'Cartmer', '5', '2023-05-01'),
(22, 'Janaya', 'Critzen', '5', '2023-01-01'),
(23, 'Alexi', 'Turfrey', '5', '2022-12-23'),
(24, 'Hammad', 'Brompton', '1', '2022-10-31'),
(25, 'Morissa', 'Geroldi', '4', '2023-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `student_credential`
--

DROP TABLE IF EXISTS `student_credential`;
CREATE TABLE IF NOT EXISTS `student_credential` (
  `student_id` int NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_credential`
--

INSERT INTO `student_credential` (`student_id`, `password`) VALUES
(16, 'Asdfg$1asdfg'),
(18, 'W#asdHh1asdh'),
(21, '!qSlf899Dfgr');

-- --------------------------------------------------------

--
-- Table structure for table `year_group`
--

DROP TABLE IF EXISTS `year_group`;
CREATE TABLE IF NOT EXISTS `year_group` (
  `club_id` int NOT NULL,
  `allowable_year` varchar(20) NOT NULL,
  PRIMARY KEY (`club_id`,`allowable_year`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `year_group`
--

INSERT INTO `year_group` (`club_id`, `allowable_year`) VALUES
(2, '4'),
(5, '1'),
(6, '1'),
(8, '1'),
(8, '2'),
(8, '4'),
(9, '3'),
(10, '2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_credential`
--
ALTER TABLE `admin_credential`
  ADD CONSTRAINT `admin_credential_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`advisor_id`) REFERENCES `staff_advisor` (`advisor_id`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`),
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`meeting_id`) REFERENCES `meeting` (`meeting_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_ibfk_1` FOREIGN KEY (`advisor_id`) REFERENCES `staff_advisor` (`advisor_id`);

--
-- Constraints for table `club_membership`
--
ALTER TABLE `club_membership`
  ADD CONSTRAINT `club_membership_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`),
  ADD CONSTRAINT `club_membership_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `student_credential`
--
ALTER TABLE `student_credential`
  ADD CONSTRAINT `student_credential_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
