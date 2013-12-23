-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2013 at 09:35 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `p4_amar15_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `pickup_time` int(11) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `dropoff_location` varchar(255) NOT NULL,
  `vehicle_type` varchar(10) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `total_amount` double NOT NULL,
  `credit_card_no` bigint(16) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`reservation_id`),
  UNIQUE KEY `post_id` (`reservation_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`) VALUES
(14, 1383672977, 1383672977, '9d4530d1e87d0e7efabf799843e909a3377b0634', '8cb2237d0679ca88db6464eac60da96345513964', 0, 0, 'Amar', 'Thatigutla', 'athatigutla@fas.harvard.edu'),
(15, 1383673051, 1383673051, '8238508be8a45e997fe5f451e8fe4c962a21971e', '8cb2237d0679ca88db6464eac60da96345513964', 0, 0, 'Amar 2', 'Thatigutla 2', 'amar@amar15.com'),
(16, 1383685022, 1383685022, 'b5cc3d53f798b2ffc2e8ea3a2399786705c84484', '8cb2237d0679ca88db6464eac60da96345513964', 0, 0, 'Siva', 'Pat', 'siva@siva.com'),
(17, 1383692374, 1383692374, 'fb213e82e61c7e8a7af40e91ede9977cca832f64', '8cb2237d0679ca88db6464eac60da96345513964', 0, 0, 'Venkat', '', 'venkat@venkat.com'),
(18, 1383692405, 1383692405, '458a9b20d7f53a03dc5055594c94da9102253741', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0, 0, 'Venkat', '', 'venkat@venkat.com'),
(19, 1383701042, 1383701042, 'bfb84f7758f034bf45543d49b8c3d857db1d78d1', '8cb2237d0679ca88db6464eac60da96345513964', 0, 0, 'Amarl', 'Thati', 'amarl@amarl.com'),
(20, 1383733867, 1383733867, '80f2813dca055774aab49ae1c33f4ab62994f694', '1540b30a25cd788ef9ed679f4650fbb2746a621c', 0, 0, 'test1', 'test1', 'test1@test1.com'),
(21, 1383749166, 1383749166, '2b9b9234e325ff838b942813dce746b9674e7b6c', '8cb2237d0679ca88db6464eac60da96345513964', 0, 0, 'test2', 'test2', 'test2@test2.com'),
(22, 1383749863, 1383749863, 'd5f911d988580a6fc789b24d5c1f185a79b45271', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0, 0, '', '', ''),
(23, 1383751439, 1383751439, 'bf070285d76247762394c86cb7330d0bdd681e60', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0, 0, '', '', ''),
(24, 1383751865, 1383751865, 'dfb1910d70d729d1171896c6147cd43b2bb7caad', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0, 0, '', '', ''),
(25, 1383751895, 1383751895, '3e978c973e825c6849146e2c91ec7bddb74ceef0', '8cb2237d0679ca88db6464eac60da96345513964', 0, 0, 'dfd', 'fdf', 'amar3@amar15.com'),
(26, 1383753706, 1383769734, '66f44992d68cc3ac8ba2394bb0b92bc2baf4be92', '074899a86a302f223c8760e055a40567f7ae79f1', 0, 0, 'tomc', 'tomc', 'tomc@tomc.com'),
(27, 1383766092, 1383766092, '3d1dc0f1274be9d45ace59041e46064405aebc0a', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0, 0, '', '', ''),
(28, 1383769077, 1383769077, '3fa51744fbc3eb37e031265c86fddfb806050888', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0, 0, '', '', ''),
(29, 1383770924, 1383771208, 'af6b4950b9c31605ba1f37b14b20496e56a882ab', '356a192b7913b04c54574d18c28d46e6395428ab', 0, 0, '1', '1', '1'),
(30, 1383776209, 1383776209, '4d2e683e71ec2320fe8bda5afa3894b046a3a313', '911ddc3b8f9a13b5499b6bc4638a2b4f3f68bf23', 0, 0, 'test5', 'test5', 'test2@test5.com'),
(31, 1383776496, 1383776496, 'bbe6442cc44bafbe661a62b56d10e6b516d85e86', '8cb2237d0679ca88db6464eac60da96345513964', 0, 0, 'Amar', 'Reddy', 'amar@amar16.com'),
(32, 1383776581, 1383776581, '14c0a92e072c458810c820ea619a0af2f8ea4c8b', '54cf1edf1143872699c8b24cfc4bf05ead9e0365', 0, 0, 'Amar', 'Thati', 'amar@amar17.com'),
(33, 1387571311, 1387571311, 'f61a4527f27311a620aacb646a0fe50a22c3fcea', '8b745363386082fb2d591b4a832d94fe6895c226', 0, 0, 'Some', 'User', 'some@gmail.com'),
(34, 1387599949, 1387599949, '57e5f115ef2bff8ec91afcf7be79e47ea934b9f1', 'c1c9f92b79e91edd582882b298fea9353eaa4e4b', 0, 0, 'Andy', 'K', 'andy@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
