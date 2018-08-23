-- phpMyAdmin SQL Dump
-- version 4.0.10.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018-08-23 20:42:06
-- 服务器版本: 5.1.65-community
-- PHP 版本: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `waxiaoxia`
--

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_about`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_about` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `waxiaoxia_about`
--

INSERT INTO `waxiaoxia_about` (`id`, `content`) VALUES
(1, '<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: " helvetica="" white-space:="" background-color:="">来自五湖四海门派的铁锅牛蛙</p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: " helvetica="" white-space:="" background-color:="">飞跃千里来征服你的胃</p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: " helvetica="" white-space:="" background-color:="">小 侠 推 荐 美 味</p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: " helvetica="" white-space:="" background-color:="">会功夫的蛙，实在不一样</p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: " helvetica="" white-space:="" background-color:="">拳打脚踢你的味蕾让你直点头</p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: " helvetica="" white-space:="" background-color:="">蛙小侠加盟店味道真不错，丝丝入味。在这寒冷的天气吃上这锅色香味俱全的牛蛙火锅，心情那个爽。牛蛙是高蛋白低脂肪的美味，有养心安神补气的功效，胃弱或胃酸过多的便宜多吃多健康。糖油粑粑：红糖水熬出来的，口感细腻，甜度合适，不会觉得特别腻。蛙小侠总部坚持走自己的独特的加盟连锁方式，努力与投资者达成一致，形成双赢的局面。让每一位投资者都能将蛙小侠招商加盟连锁品牌作为自己的事业来经营。总部对加盟商的要求不是很高，属于门槛不高的投资项目。至于如何加盟蛙小侠招商加盟连锁店，蛙小侠加盟费用多少钱，欢迎创业者致电咨询！</p><p><br/></p>');

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_admin`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_admin` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `identity` tinyint(1) NOT NULL COMMENT '1:用户,2:超级用户,3:管理员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `waxiaoxia_admin`
--

INSERT INTO `waxiaoxia_admin` (`id`, `username`, `password`, `identity`) VALUES
(5, 'admin', '1eea36fbd4f4919251e3192dce2da380', 3);

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_article`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_article` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `date` date NOT NULL COMMENT '添加文章的时间',
  `newstime` datetime NOT NULL COMMENT '更新时间',
  `keywords` varchar(60) NOT NULL COMMENT '关键字',
  `description` varchar(1000) NOT NULL COMMENT '文章描述',
  `content` text NOT NULL COMMENT '文章内容',
  `column1` tinyint(1) NOT NULL COMMENT '3:新闻动态,4:成功案例',
  `click` int(9) NOT NULL DEFAULT '0' COMMENT '点击数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `waxiaoxia_article`
--

INSERT INTO `waxiaoxia_article` (`id`, `title`, `date`, `newstime`, `keywords`, `description`, `content`, `column1`, `click`) VALUES
(33, '新闻1', '2018-08-21', '2018-08-21 10:38:56', '456111', '890111', '<p>dsffds........</p>', 3, 5),
(31, '1234567890', '2018-08-22', '2018-08-22 09:30:18', '123', '456222', '<p>阿斯蒂芬222</p>', 4, 2),
(32, '案例2', '2018-08-21', '2018-08-21 13:39:25', '哈哈哈哈', '123423', '<p style="white-space: normal;">牛蛙加盟信任蛙小侠好品牌!在这个以服务为标志的时代，如何提高自身的服务水平，提升客户满意度，是每个商家都必须考虑的问题。作为服务行业的重头戏——餐饮加盟行业，蛙小侠牛蛙时时刻刻将这方面的要求提上了议事日程，要求员工在面对客户时，必须强化服务意识，将客户的需求放在首位。</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 为什么牛蛙加盟蛙小侠品牌值得投资?正如一名牛蛙加盟店主所说，“只有把服务质量提上去了，我们才能赢得更多的消费者前来光顾。”蛙小侠牛蛙一直把“服务”二字放在第一位，是拥有正确走向和远大格局的实力品牌。</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 一个注重服务的餐饮品牌，自然会在众多的牛蛙加盟品牌中脱颖而出。针对消费者对美食的需求，蛙小侠牛蛙品牌在开放加盟之前做了很多卓有成效的调查工作，并且在占有大量事实的基础上，确定了产品的市场定位，以及公司的营销策略。正因为有了这样充足的准备，蛙小侠牛蛙加盟店才把握住了市场的动态和脉络，以不变应万变的姿态牢牢坐稳牛蛙市场。打造真正的美食经典牛蛙，真正让人赞不绝口的美味!</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 当然，蛙小侠牛蛙加盟为消费者提供的服务不只于此，在整个经营过程中，牛蛙加盟品牌十分讲究为消费者提供三优服务，也就是产品优、服务优和环境优。在工作人员的服务态度上，他们始终以职业化的微笑面对每一位客户，让他们真正有宾至如归的感受。而在蛙小侠牛蛙加盟店，环境是十分宽敞明亮的，达到了窗明几净的要求，当消费者在悠扬的乐声里，品味着独特的牛蛙时，他们感觉到的，不仅是食欲上的满足，更有精神上的满足。</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 综合以上的几点，开一家牛蛙加盟店需要的就是选择好品牌，蛙小侠就是值得我们选择的品牌。&nbsp;</p><p><br/></p>', 4, 0),
(30, '案例1', '2018-08-21', '2018-08-21 14:05:53', '', '123456', '<p style="white-space: normal;">牛蛙加盟信任蛙小侠好品牌!在这个以服务为标志的时代，如何提高自身的服务水平，提升客户满意度，是每个商家都必须考虑的问题。作为服务行业的重头戏——餐饮加盟行业，蛙小侠牛蛙时时刻刻将这方面的要求提上了议事日程，要求员工在面对客户时，必须强化服务意识，将客户的需求放在首位。</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 为什么牛蛙加盟蛙小侠品牌值得投资?正如一名牛蛙加盟店主所说，“只有把服务质量提上去了，我们才能赢得更多的消费者前来光顾。”蛙小侠牛蛙一直把“服务”二字放在第一位，是拥有正确走向和远大格局的实力品牌。</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 一个注重服务的餐饮品牌，自然会在众多的牛蛙加盟品牌中脱颖而出。针对消费者对美食的需求，蛙小侠牛蛙品牌在开放加盟之前做了很多卓有成效的调查工作，并且在占有大量事实的基础上，确定了产品的市场定位，以及公司的营销策略。正因为有了这样充足的准备，蛙小侠牛蛙加盟店才把握住了市场的动态和脉络，以不变应万变的姿态牢牢坐稳牛蛙市场。打造真正的美食经典牛蛙，真正让人赞不绝口的美味!</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 当然，蛙小侠牛蛙加盟为消费者提供的服务不只于此，在整个经营过程中，牛蛙加盟品牌十分讲究为消费者提供三优服务，也就是产品优、服务优和环境优。在工作人员的服务态度上，他们始终以职业化的微笑面对每一位客户，让他们真正有宾至如归的感受。而在蛙小侠牛蛙加盟店，环境是十分宽敞明亮的，达到了窗明几净的要求，当消费者在悠扬的乐声里，品味着独特的牛蛙时，他们感觉到的，不仅是食欲上的满足，更有精神上的满足。</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 综合以上的几点，开一家牛蛙加盟店需要的就是选择好品牌，蛙小侠就是值得我们选择的品牌。&nbsp;</p><p><br/></p>', 4, 1),
(37, '0000', '2018-08-23', '2018-08-23 15:49:51', '123', '123', '<p>123</p>', 4, 2),
(36, '321', '2018-08-22', '2018-08-22 09:29:40', '', '', '<p>456</p>', 3, 6);

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_banner`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_banner` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `pic` varchar(120) NOT NULL COMMENT '缩略图',
  `banner_name` varchar(60) NOT NULL COMMENT '1:首页banner_01,2:首页banner_02,3:通用页面',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `waxiaoxia_banner`
--

INSERT INTO `waxiaoxia_banner` (`id`, `pic`, `banner_name`) VALUES
(5, 'upload/0823/banner_common.jpg', '3'),
(4, 'upload/0822/product_1506656532.jpg', '1');

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_column`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_column` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL COMMENT '栏目名称',
  `porder` int(9) NOT NULL COMMENT '排序',
  `model` varchar(11) NOT NULL COMMENT 'common:常规页面,article:普通文章,other:其他',
  `cid` int(1) NOT NULL DEFAULT '0' COMMENT '所属栏目ID',
  `target` varchar(7) NOT NULL COMMENT 'blank:空白页,current:当前页',
  `display` varchar(4) NOT NULL COMMENT 'show:显示,hide:隐藏',
  `catalog` varchar(11) NOT NULL COMMENT '栏目存放的目录',
  `link` varchar(60) NOT NULL COMMENT '默认链接',
  `template` varchar(20) NOT NULL COMMENT '板名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `waxiaoxia_column`
--

INSERT INTO `waxiaoxia_column` (`id`, `name`, `porder`, `model`, `cid`, `target`, `display`, `catalog`, `link`, `template`) VALUES
(1, '首页', 0, 'common', 0, 'blank', 'show', '', '', ''),
(2, '蛙小侠', 0, 'common', 0, 'blank', 'show', '', '', ''),
(3, '新闻动态', 0, 'other', 0, 'blank', 'show', '', '', ''),
(4, '成功案例', 0, 'common', 0, 'blank', 'show', '', '', ''),
(5, '蛙小侠美食', 0, 'common', 0, 'blank', 'show', '', '', ''),
(6, '加盟我们', 0, 'common', 0, 'blank', 'show', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_config_system`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_config_system` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `web_name` varchar(60) NOT NULL COMMENT '后台名称',
  `cfg_webname` varchar(60) NOT NULL COMMENT '网站名称',
  `cfg_index_title` varchar(60) NOT NULL COMMENT '首页标题',
  `cfg_keywords` varchar(60) NOT NULL COMMENT '站点关键字',
  `cfg_description` varchar(255) NOT NULL COMMENT '站点描述',
  `cfg_company` varchar(60) NOT NULL COMMENT '公司名称',
  `cfg_address` varchar(60) NOT NULL COMMENT '公司地址',
  `cfg_phone` varchar(30) NOT NULL COMMENT '加盟热线',
  `cfg_icp` varchar(20) NOT NULL COMMENT '网站备案',
  `cfg_53kf` varchar(60) NOT NULL COMMENT '53kf',
  `kfmsg` varchar(100) NOT NULL COMMENT '插入',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `waxiaoxia_config_system`
--

INSERT INTO `waxiaoxia_config_system` (`id`, `web_name`, `cfg_webname`, `cfg_index_title`, `cfg_keywords`, `cfg_description`, `cfg_company`, `cfg_address`, `cfg_phone`, `cfg_icp`, `cfg_53kf`, `kfmsg`) VALUES
(1, '123', '456', '蛙小侠官网_蛙小侠加盟', '2', '3', '4', '5', '6', '7', '', '123698');

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_contact`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_contact` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `waxiaoxia_contact`
--

INSERT INTO `waxiaoxia_contact` (`id`, `content`) VALUES
(1, '<p>1234567890</p>');

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_imgs`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_imgs` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `pic` varchar(120) NOT NULL COMMENT '缩略图',
  `name` varchar(60) NOT NULL COMMENT '图片名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `waxiaoxia_imgs`
--

INSERT INTO `waxiaoxia_imgs` (`id`, `pic`, `name`) VALUES
(5, 'upload/0823/about_us.jpg', 'about_us.jpg'),
(4, 'upload/0823/code.jpg', 'code.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_link`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_link` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `web_name` varchar(120) NOT NULL COMMENT '网站名称',
  `web_address` varchar(1000) NOT NULL COMMENT '网站地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `waxiaoxia_link`
--

INSERT INTO `waxiaoxia_link` (`id`, `web_name`, `web_address`) VALUES
(2, '搞茶官网', 'http://www.sysnaica.com.cn'),
(3, '鹿角巷官网', 'http://www.sysnaica.cn');

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_logo`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_logo` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `pic` varchar(100) NOT NULL COMMENT '缩略图',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `waxiaoxia_logo`
--

INSERT INTO `waxiaoxia_logo` (`id`, `pic`) VALUES
(5, 'upload/0823/logo.png');

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_message`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_message` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `phone` varchar(20) NOT NULL COMMENT '手机号码',
  `message_date` datetime NOT NULL COMMENT '留言的时间',
  `message` varchar(120) NOT NULL COMMENT '留言信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_product`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_product` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL COMMENT '产品名称',
  `pic` varchar(120) NOT NULL COMMENT '缩略图',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `waxiaoxia_product`
--

INSERT INTO `waxiaoxia_product` (`id`, `name`, `pic`) VALUES
(1, '农家手工肠', 'upload/0821/product_1506656503.jpg'),
(2, '清爽薄荷香', 'upload/0823/product_1506656532.jpg'),
(3, '芥末花螺', 'upload/0823/product_1506656514.jpg'),
(4, '青花椒味', 'upload/0823/product_1506656491.jpg'),
(5, '山胡椒味', 'upload/0823/product_1506656473.jpg'),
(6, '变态辣', 'upload/0823/product_1506656450.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `waxiaoxia_sowing_map`
--

CREATE TABLE IF NOT EXISTS `waxiaoxia_sowing_map` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `pic` varchar(120) NOT NULL COMMENT '缩略图',
  `title1` varchar(60) NOT NULL COMMENT '播图标题1',
  `title2` varchar(60) NOT NULL COMMENT '播图标题2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `waxiaoxia_sowing_map`
--

INSERT INTO `waxiaoxia_sowing_map` (`id`, `pic`, `title1`, `title2`) VALUES
(2, 'upload/0821/banner_01.jpg', '多样化选择', '总有一款适合你'),
(3, 'upload/0821/banner_02.jpg', '一站式扶持', '无经验也轻松做老板'),
(4, 'upload/0821/banner_03.jpg', '季节新款不断', '保证利润源源不断');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
