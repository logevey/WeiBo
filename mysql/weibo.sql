-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014-12-15 20:14:20
-- 服务器版本: 5.5.38-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `weibo`
--

-- --------------------------------------------------------

--
-- 表的结构 `attention`
--

CREATE TABLE IF NOT EXISTS `attention` (
  `aedUserName` varchar(20) CHARACTER SET gb2312 NOT NULL COMMENT '被关注人名字',
  `aUserName` varchar(20) CHARACTER SET gb2312 NOT NULL COMMENT '关注人名字',
  PRIMARY KEY (`aedUserName`,`aUserName`),
  KEY `attention_ibfk_2` (`aUserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='关注关系表';

--
-- 转存表中的数据 `attention`
--

INSERT INTO `attention` (`aedUserName`, `aUserName`) VALUES
('log', 'log'),
('test3', 'log'),
('pangzi', 'pangzi'),
('test1', 'test1'),
('test2', 'test2'),
('test3', 'test3'),
('test4', 'test4'),
('pangzi', 'we'),
('we', 'we'),
('wjf', 'we'),
('log', 'wjf'),
('pangzi', 'wjf'),
('test1', 'wjf'),
('test2', 'wjf'),
('wjf', 'wjf');

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `cID` int(5) NOT NULL AUTO_INCREMENT,
  `cContent` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '内容',
  `cWeiboID` int(5) NOT NULL,
  `cUserName` varchar(20) NOT NULL,
  `cTime` datetime NOT NULL COMMENT '时间',
  PRIMARY KEY (`cID`),
  UNIQUE KEY `cID` (`cID`),
  KEY `cReleaseID` (`cWeiboID`,`cUserName`),
  KEY `cUserName` (`cUserName`)
) ENGINE=InnoDB  DEFAULT CHARSET=gb2312 COMMENT='评论表' AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`cID`, `cContent`, `cWeiboID`, `cUserName`, `cTime`) VALUES
(13, 'yes\r\n', 11, 'wjf', '2014-12-13 12:14:55'),
(14, 'yes', 11, 'wjf', '2014-12-13 12:15:09'),
(15, 'fuck', 3, 'wjf', '2014-12-13 12:16:46'),
(16, 'sb', 11, 'we', '2014-12-15 13:10:16');

-- --------------------------------------------------------

--
-- 表的结构 `letter`
--

CREATE TABLE IF NOT EXISTS `letter` (
  `lID` int(5) NOT NULL AUTO_INCREMENT COMMENT '私信ID',
  `ledUserName` varchar(5) NOT NULL COMMENT '接受私信用户名字',
  `lUserName` varchar(5) NOT NULL COMMENT '发送私信用户名字',
  `lContent` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '私信内容',
  `lIsRead` int(1) NOT NULL COMMENT '接收方是否阅读',
  `lTime` datetime NOT NULL,
  PRIMARY KEY (`lID`),
  KEY `ledUserID` (`ledUserName`,`lUserName`),
  KEY `lUserName` (`lUserName`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COMMENT='私信表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uName` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `uPasswd` varchar(20) DEFAULT NULL COMMENT '用户密码',
  `uIntro` varchar(500) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户简介',
  `uLevel` int(2) NOT NULL DEFAULT '0' COMMENT '用户级别',
  `uIsLetter` int(1) NOT NULL DEFAULT '1' COMMENT '是否接受私信',
  PRIMARY KEY (`uName`),
  UNIQUE KEY `uName` (`uName`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COMMENT='用户表';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uName`, `uPasswd`, `uIntro`, `uLevel`, `uIsLetter`) VALUES
('log', 'log', NULL, 0, 1),
('pangzi', 'pangzi', NULL, 0, 1),
('test1', 'test1', NULL, 0, 1),
('test2', 'test2', NULL, 0, 1),
('test3', 'test3', NULL, 0, 1),
('test4', 'test4', NULL, 0, 1),
('we', 'we', '你好！', 0, 1),
('wjf', 'wjf', '屌丝！', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `weibo`
--

CREATE TABLE IF NOT EXISTS `weibo` (
  `wID` int(5) NOT NULL AUTO_INCREMENT COMMENT '发布微薄的ID',
  `wUserName` varchar(20) NOT NULL COMMENT '发布人名字',
  `wContent` varchar(500) CHARACTER SET utf8 DEFAULT NULL COMMENT '发布的文字内容',
  `wTime` datetime NOT NULL COMMENT '发布的时间',
  `wIsTransmit` int(1) NOT NULL DEFAULT '0' COMMENT '是否是转发微薄',
  `wTransmitUserName` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '转发自何人',
  PRIMARY KEY (`wID`),
  KEY `uID` (`wUserName`),
  KEY `wID` (`wID`)
) ENGINE=InnoDB  DEFAULT CHARSET=gb2312 COMMENT='发布微薄表' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `weibo`
--

INSERT INTO `weibo` (`wID`, `wUserName`, `wContent`, `wTime`, `wIsTransmit`, `wTransmitUserName`) VALUES
(3, 'log', '6748', '2014-12-01 00:00:00', 0, ''),
(11, 'wjf', '吴建峰是2b！', '2014-12-13 12:14:34', 0, '');

--
-- 限制导出的表
--

--
-- 限制表 `attention`
--
ALTER TABLE `attention`
  ADD CONSTRAINT `attention_ibfk_1` FOREIGN KEY (`aedUserName`) REFERENCES `user` (`uName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attention_ibfk_2` FOREIGN KEY (`aUserName`) REFERENCES `user` (`uName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`cUserName`) REFERENCES `user` (`uName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`cWeiboID`) REFERENCES `weibo` (`wID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `letter`
--
ALTER TABLE `letter`
  ADD CONSTRAINT `letter_ibfk_2` FOREIGN KEY (`ledUserName`) REFERENCES `user` (`uName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `letter_ibfk_3` FOREIGN KEY (`lUserName`) REFERENCES `user` (`uName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `weibo`
--
ALTER TABLE `weibo`
  ADD CONSTRAINT `weibo_ibfk_1` FOREIGN KEY (`wUserName`) REFERENCES `user` (`uName`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
