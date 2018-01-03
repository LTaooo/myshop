-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 12 月 17 日 13:14
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `onlineshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `good`
--

CREATE TABLE IF NOT EXISTS `good` (
  `goodid` int(11) NOT NULL AUTO_INCREMENT,
  `sortid` int(11) NOT NULL,
  `goodsName` varchar(30) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `photo` varchar(30) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`goodid`),
  KEY `sortid` (`sortid`),
  KEY `goodid` (`goodid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `good`
--

INSERT INTO `good` (`goodid`, `sortid`, `goodsName`, `price`, `photo`, `desc`, `number`) VALUES
(4, 1, '席梦思', 3000, 'go.jpg', '这是好床，快来买吧', 3004),
(10, 3, '天美', 3611, 'bingxiang1.jpg', '优美', 4311),
(12, 6, '华为洗衣机', 3356, 'xiyiji11.jpg', '这是华为生产的洗衣机', 1333),
(13, 5, '格力牌椅子', 3356, 'zhuozi2.jpg', '这是格力生产的洗衣机', 13330),
(14, 4, '腾讯牌桌子', 3356, 'zhuozi1.jpg', '这是格力生产的洗衣机', 13330),
(15, 1, '黑人牌床', 333, 'bed4.jpg', '这是来自于非洲的床', 33333),
(16, 1, '白人牌床', 1, 'bed2.jpg', '如果你没钱就买这个吧', 33333),
(17, 1, '绿巨人牌床', 99999, 'bed3.jpg', '此床巨大无比!', 163),
(18, 2, '腾讯牌衣柜', 100000000, 'yigui2.jpg', '来吧，花钱能使你更强！', 163);

-- --------------------------------------------------------

--
-- 表的结构 `goodsort`
--

CREATE TABLE IF NOT EXISTS `goodsort` (
  `sortid` int(11) NOT NULL AUTO_INCREMENT,
  `sortName` varchar(30) NOT NULL,
  PRIMARY KEY (`sortid`),
  KEY `sortName` (`sortName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `goodsort`
--

INSERT INTO `goodsort` (`sortid`, `sortName`) VALUES
(1, 'bed'),
(3, 'bingxiang'),
(6, 'xiyiji'),
(2, 'yigui'),
(5, 'yizi'),
(4, 'zhuozi');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`orderid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`orderid`, `userid`) VALUES
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 3),
(14, 3);

-- --------------------------------------------------------

--
-- 表的结构 `shoporder`
--

CREATE TABLE IF NOT EXISTS `shoporder` (
  `goodid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `goodscount` int(11) NOT NULL,
  `shoppingdate` datetime NOT NULL,
  KEY `orderid` (`orderid`),
  KEY `goodid` (`goodid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shoporder`
--

INSERT INTO `shoporder` (`goodid`, `orderid`, `goodscount`, `shoppingdate`) VALUES
(16, 3, 1, '2017-12-17 16:32:44'),
(16, 4, 1, '2017-12-17 16:56:08'),
(15, 5, 1, '2017-12-17 17:05:55'),
(15, 6, 1, '2017-12-17 17:23:13'),
(15, 7, 1, '2017-12-17 17:23:41'),
(15, 8, 1, '2017-12-17 17:24:04'),
(15, 9, 1, '2017-12-17 17:26:01'),
(15, 10, 1, '2017-12-17 17:28:52'),
(15, 11, 1, '2017-12-17 17:29:17'),
(15, 12, 1, '2017-12-17 17:30:21'),
(16, 13, 1, '2017-12-17 19:04:52'),
(16, 14, 1, '2017-12-17 19:42:20');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `useremail` varchar(30) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `is_root` tinyint(1) NOT NULL DEFAULT '0',
  `money` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userid`, `userName`, `password`, `sex`, `useremail`, `tel`, `address`, `is_root`, `money`) VALUES
(1, 'root', 'root', 1, 'lt@qq.com', '12345678911', '中国', 1, 66553.1),
(2, 'liutao', 'liutao', 1, 'jj', '132', 'adf', 0, 9868030),
(3, 'xiaoming', 'xiaoming', 0, 'xm@qq.com', '110', 'usa', 0, 99997);

--
-- 限制导出的表
--

--
-- 限制表 `good`
--
ALTER TABLE `good`
  ADD CONSTRAINT `good_ibfk_1` FOREIGN KEY (`sortid`) REFERENCES `goodsort` (`sortid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `shoporder`
--
ALTER TABLE `shoporder`
  ADD CONSTRAINT `shoporder_ibfk_1` FOREIGN KEY (`goodid`) REFERENCES `good` (`goodid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shoporder_ibfk_2` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
