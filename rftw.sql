-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2014 a las 01:35:10
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `rftw`
--
CREATE DATABASE IF NOT EXISTS `rftw` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rftw`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rft_binpaper`
--

CREATE TABLE IF NOT EXISTS `rft_binpaper` (
  `bp_id` int(11) NOT NULL AUTO_INCREMENT,
  `bp_obj` text NOT NULL,
  `bp_member` text NOT NULL,
  `bp_key` text NOT NULL,
  `bp_code` text NOT NULL,
  `bp_admin` text NOT NULL,
  `bp_date` text NOT NULL,
  `bp_ultdate` text NOT NULL,
  PRIMARY KEY (`bp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rft_downloads`
--

CREATE TABLE IF NOT EXISTS `rft_downloads` (
  `dow_id` int(11) NOT NULL AUTO_INCREMENT,
  `dow_type` text NOT NULL,
  `dow_obj` text NOT NULL,
  `dow_usip` text NOT NULL,
  PRIMARY KEY (`dow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rft_emails`
--

CREATE TABLE IF NOT EXISTS `rft_emails` (
  `em_id` int(11) NOT NULL AUTO_INCREMENT,
  `em_for` text NOT NULL,
  `em_key` text NOT NULL,
  `em_code` text NOT NULL,
  `em_type` text NOT NULL,
  `em_ip` text NOT NULL,
  `em_date` text NOT NULL,
  PRIMARY KEY (`em_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rft_members`
--

CREATE TABLE IF NOT EXISTS `rft_members` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_nick` text NOT NULL,
  `u_avatar` text NOT NULL,
  `u_name` text NOT NULL,
  `u_surname` text NOT NULL,
  `u_pass` text NOT NULL,
  `u_rpass` text NOT NULL,
  `u_key` text NOT NULL,
  `u_code` text NOT NULL,
  `u_ip` text NOT NULL,
  `u_email` text NOT NULL,
  `u_ulactive` text NOT NULL,
  `u_register` text NOT NULL,
  `u_online` text NOT NULL,
  `u_size` text NOT NULL,
  `u_maxsize` text NOT NULL,
  `u_permissions` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Estructura de tabla para la tabla `rft_sessions`
--

CREATE TABLE IF NOT EXISTS `rft_sessions` (
  `s_id` int(15) NOT NULL AUTO_INCREMENT,
  `s_key` varchar(15) NOT NULL,
  `s_user` int(15) DEFAULT '0',
  `s_ip` varchar(40) NOT NULL,
  `s_date` int(10) NOT NULL,
  `s_remember` int(1) DEFAULT '0',
  `s_update` int(12) DEFAULT '0',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rft_settings`
--

CREATE TABLE IF NOT EXISTS `rft_settings` (
  `sts_id` int(11) NOT NULL AUTO_INCREMENT,
  `sts_type` text NOT NULL,
  `sts_content` text NOT NULL,
  `sts_obj` text NOT NULL,
  `sts_hace` text NOT NULL,
  `sts_ult` text NOT NULL,
  PRIMARY KEY (`sts_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rft_uploads`
--

CREATE TABLE IF NOT EXISTS `rft_uploads` (
  `up_id` int(11) NOT NULL AUTO_INCREMENT,
  `up_name` text NOT NULL,
  `up_vname` text NOT NULL,
  `up_img` text NOT NULL,
  `up_size` text NOT NULL,
  `up_vsize` text NOT NULL,
  `up_key` text NOT NULL,
  `up_code` text NOT NULL,
  `up_date` text NOT NULL,
  `up_type` text NOT NULL,
  `up_ftype` text NOT NULL,
  `up_typesize` text NOT NULL,
  `up_user` text NOT NULL,
  `up_state` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`up_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rft_usegurity`
--

CREATE TABLE IF NOT EXISTS `rft_usegurity` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_member` text NOT NULL,
  `us_ukey` text NOT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
