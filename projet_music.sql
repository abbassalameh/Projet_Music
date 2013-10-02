-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2013 at 02:35 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projet_music`
--
CREATE DATABASE IF NOT EXISTS `projet_music` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projet_music`;

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE IF NOT EXISTS `music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `artist` varchar(40) NOT NULL,
  `album` varchar(40) NOT NULL,
  `cover` varchar(60) NOT NULL,
  `file` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `title`, `artist`, `album`, `cover`, `file`) VALUES
(1, 'skinny_love', 'birdy', 'skinny_love', 'cover/Skinny_love-Birdy.jpg', 'music/Skinny_love-Birdy.mp3'),
(2, 'i_will_wait', 'mumford_and_sons', 'babel', 'cover/I_will_wait-Mumford_and_sons.jpg', 'music/I_will_wait-Mumford_and_sons.mp3'),
(3, 'fader', 'the_temper_trap', 'conditions', 'cover/Fader-The_temper_trap.jpg', 'music/Fader-The_temper_trap.mp3'),
(4, 'you_picked_me_up', 'a_fine_frenzy', 'one_cell_in_the_sea', 'cover/A_fine_frenzy-You_picked_me_up.png', 'music/A_fine_frenzy-You_picked_me_up.mp3'),
(5, 'boston', 'augustana', 'all_the_stars_and_boulevards', 'cover/Augustana-Boston.png', 'music/Augustana-Boston.mp3'),
(6, 'the_funeral', 'band_of_horses', 'everything_all_the_time', 'cover/Band_of_horses-The_funeral.jpg', 'music/Band_of_horses-The_funeral.mp3'),
(7, 'towers', 'bon_iver', 'towers', 'cover/Towers-Bon_iver.jpg', 'music/Towers-Bon_iver.mp3'),
(8, 'little_numbers', 'boy', 'mutual_friends', 'cover/Little_numbers-Boy.jpg', 'music/Little_numbers-Boy.mp3'),
(9, 'just_the_way_you_are', 'boyce_avenue', 'new_accoustiv_sessions', 'cover/Just_the_way_you_are-Boyce_avenue.jpg', 'music/Just_the_way_you_are-Boyce_avenue.mp3'),
(10, 'the_diary_of_jane', 'breaking_benjamin', 'phobia', 'cover/The_diary_of_jane-Breaking_benjamin.jpg', 'music/The_diary_of_jane-Breaking_benjamin.mp3'),
(11, 'fuck_you', 'cee_lo_green', 'fuck_you', 'cover/Fuck_you-Cee_lo_green.jpg', 'music/Fuck_you-Cee_lo_green.mp3'),
(12, 'bruises', 'chairlift', 'bruises', 'cover/Bruises-Chairlift.jpg', 'music/Bruises-Chairlift.mp3'),
(14, 'on_my_way', 'charlie_brown', 'on_my_way', 'cover/On_my_way-Charlie_brown.jpg', 'music/On_my_way-Charlie_brown.mp3'),
(17, 'all_the_world', 'correatown', 'echoes', 'cover/All_the_world-Correatown.jpg', 'music/All_the_world-Correatown.mp3'),
(18, 'navigate_me', 'cute_is_what_we_aim_for', 'rotation', 'cover/Navigate_me-Cute_is_what_we_aim_for.png', 'music/Navigate_me-Cute_is_what_we_aim_for.mp3'),
(19, 'soul_meets_body', 'death_cabe_for_cutie', 'plans', 'cover/Soul_meets_body-Death_cabe_for_cutie.jpg', 'music/Soul_meets_body-Death_cabe_for_cutie.mp3'),
(20, 'blew_my_mind', 'dresses', 'blew_my_mind', 'cover/Blew_my_mind-Dresses.jpg', 'music/Blew_my_mind-Dresses.mp3'),
(21, 'the_writer', 'ellie_goulding', 'lights', 'cover/The_writer-Ellie_goulding.jpg', 'music/The_writer-Ellie_goulding.mp3'),
(22, 'never_say_never', 'fray', 'how_to_save_a_life', 'cover/Never_say_never-Fray.jpg', 'music/Never_say_never-Fray.mp3'),
(24, 'walking_disaster', 'the_wombats', 'the_wombats', 'cover/Walking_disaster-The_wombats.jpg', 'music/Walking_disaster-The_wombats.mp3'),
(25, 'factures', 'cadences', 'cadences', 'cover/Factures-Cadences.jpg', 'music/Factures-Cadences.mp3'),
(26, 'lemon_trees', 'the_young_romans', 'lemon_trees', 'cover/Lemon_trees-The_young_romans.jpg', 'music/Lemon_trees-The_young_romans.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `music_selection`
--

CREATE TABLE IF NOT EXISTS `music_selection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `id_music` int(11) NOT NULL,
  `playlist_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `music_selection`
--

INSERT INTO `music_selection` (`id`, `username`, `id_music`, `playlist_name`) VALUES
(1, 'yuri', 4, 'rock collection'),
(2, 'yuri', 7, 'rock collection'),
(3, 'yuri', 9, 'rock collection'),
(6, 'yuri', 1, 'rock collection'),
(7, 'yuri', 3, 'rock collection'),
(8, 'yuri', 6, 'rock collection');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `playlist_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `username`, `playlist_name`) VALUES
(1, 'yuri', 'rock collection'),
(2, 'yuri', 'other collection'),
(23, 'hello', 'enw');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `country` varchar(40) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`, `country`, `phone`, `email`) VALUES
(2, 'yuri', '5f4dcc3b5aa765d61d8327deb882cf99', '2013-01-01', '961', '70725524', 'yurigh00@gmail.com'),
(4, 'ahmad', '827ccb0eea8a706c4c34a16891f84e7b', '2013-01-01', '961', '6432', 'grigi@bmffd.cdf'),
(7, 'something', '437b930db84b8079c2dd804a71936b5f', '2013-01-01', '961', '702231', 'dsds@fdf.sfd'),
(8, 'hello', '23b431acfeb41e15d466d75de822307c', '2013-01-01', '961', '663453', 'dssf@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
