CREATE DATABASE  IF NOT EXISTS `notes` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `notes`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: localhost    Database: note_acmu
-- ------------------------------------------------------
-- Server version	5.5.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `note_ref_tag`
--

DROP TABLE IF EXISTS `note_ref_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `note_ref_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nid` (`nid`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `note_ref_tag`
--

LOCK TABLES `note_ref_tag` WRITE;
/*!40000 ALTER TABLE `note_ref_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `note_ref_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `addtime` datetime DEFAULT NULL,
  `modifytime` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (8,NULL,'<p>没有什么不一样，就是这样不一样，看不到我们有不一样，我们就是不一样。哈哈哈哈哈哈哈</p>','2013-12-31 11:23:17',NULL,1),(2,NULL,'<p>可敬的洛杉矶阿飞 拉开距离就</p>','2013-12-30 09:52:23',NULL,1),(3,NULL,'<p>可敬的洛杉矶阿飞 拉开距离就</p>','2013-12-30 18:08:51',NULL,1),(4,NULL,'<p>可敬的洛杉矶阿飞 拉开距离就</p>','2013-12-30 18:10:11',NULL,1),(5,NULL,'<p>lkjklj</p>','2013-12-31 10:26:38',NULL,1),(6,NULL,'<p>lkjklj</p>','2013-12-31 10:29:09','0000-00-00 00:00:00',1),(7,NULL,'<p>lkjklj</p>','2013-12-31 10:29:16',NULL,1),(9,NULL,'<p>黄花依旧笑春风</p>','2013-12-31 11:25:09',NULL,1),(10,NULL,'<p>我们可以测试日志，日志必须可以被测试的</p>','2013-12-31 11:29:53',NULL,1),(11,NULL,'<p>测试插入代码</p><p><br></p><p><br></p><p><br></p><pre class=\"brush:php;toolbar:false\">&lt;?php\necho \"hello world\";</pre><p><br></p><p><br></p><p><br></p>','2013-12-31 11:49:29',NULL,1),(12,NULL,'<p>明月别枝惊鹊，清风半夜鸣蝉。</p><p>古往今来多无用，逆子乘秋风雨来</p>','2013-12-31 14:48:29',NULL,1),(13,'创维发布酷开品牌4K家庭互联网电视','<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;vertical-align:baseline;\">12月31日消息，<span style=\"font-weight:700;\">创维在上海发布了酷开品牌4K家庭互联网电视酷开U1。全新的酷开U1拥有40寸和58寸两个尺寸，售价分别为2999元和5999元，第一批工程机将在2014年1月1日正式发售。</span>创维酷开U1搭载有天赐系统，采用4K屏幕，分辨率为3840×2160，配备有4K图强引擎Pro图形芯片、2GB内存、8G高速闪存,理论的电视图像处理速度可提升2.89倍，在应用体验上得到了一定得保证。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;text-align:center;\"><a href=\"http://static.cnbetacdn.com/newsimg/2013/1231/29_1iMCuIf1d.jpg\" style=\"color:rgb(0,51,102);text-decoration:none;\"><img alt=\"创维发布酷开U1电视 4K分辨率2999元起售\" src=\"http://static.cnbetacdn.com/newsimg/2013/1231/29_1iMCuIf1d.jpg_w600.jpg\" style=\"border:0px;margin:0px auto;\"></a></p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;\">除了4K屏幕的配备以外，全新的酷开U1在外观上依旧采用了酷开TV简约设计理念，但在细节上得到了一定得改进。例如，该机采用了重新设计的人体工学遥控器、重新定义的天赐极简UI以及外观更加时尚的底座等等。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;text-align:center;\"><a href=\"http://static.cnbetacdn.com/newsimg/2013/1231/29_1iMCuNEZn.jpg\" style=\"color:rgb(0,51,102);text-decoration:none;\"><img alt=\"创维发布酷开U1电视 4K分辨率2999元起售\" src=\"http://static.cnbetacdn.com/newsimg/2013/1231/29_1iMCuNEZn.jpg_w600.jpg\" style=\"border:0px;margin:0px auto;\"></a></p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;\">此外，本次发布的酷开品牌4K家庭互联网电视酷开U1上拥有全国首个4K频道，可为用户提供大量优质的4K节目，能在一定意义上解决4K电视片源的问题。据了解，酷开U1的4K频道内容将和优朋普乐合作，每周更新，并推出一部免费的4K电影供用户下载。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;\">据悉，40寸和58寸两款酷开U1第一批工程机将于2014年1月1日上午十点半开放购买，第二批将于1月13日开放购买。</p><p><br></p>','2013-12-31 14:49:47',NULL,NULL),(14,'圣诞节假期应用促销','<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;vertical-align:baseline;\">现在看来，圣诞节对于应用下载和营收来说，也有着巨大的促进作用。<span style=\"font-weight:700;\">应用分析公司Distimo的最新研究显示，与12月份的平均数字相比：今年圣诞期间，iOS应用的下载量突涨了53%、营收更是增长了56%。</span>不过，与去年相比，这一效应却已经有所回落。Distimo指出，在2011年的时候，应用下载量是同年12月(平均)3倍；到了2012年，下载量比当月(平均)增长了几乎2倍，营收也增长了70%。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;text-align:center;\"><img src=\"http://note.acmu.org/ueditor/php/upload/24471388472622.png\" title=\"Distimo-Xmas-730x455.png\" style=\"border:0px;margin:0px auto;\" alt=\"24471388472622.png\"></p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;text-align:center;\">纵观2013年12月，圣诞期间的应用营收增长，要高于应用下载量的增长。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;\">据<a title=\"\" href=\"http://www.distimo.com/blog/2013_12_christmas-spike-downloads-and-revenue-grew-by-more-than-50/\" style=\"color:rgb(0,51,102);text-decoration:none;\">Distimo</a>表示，今年圣诞期间，令人印象最深刻的是英国地区——其圣诞节当天的应用下载量突涨了161%。至于美国地区，营收亦几乎翻番。然而，曾经的亚洲\"大应用市场\"——如日本和韩国——却几乎没有看到应用下载和营收的波动。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;\">此外，移动公司<a title=\"\" href=\"http://blog.flurry.com/bid/103350/Christmas-Continues-To-Set-App-Download-Records-In-Spite-Of-Slowing-Growth-and-Globalization-of-App-Market\" style=\"color:rgb(0,51,102);text-decoration:none;\">Flurry</a>也发布了其\"喜庆数字\"——圣诞期间，请用下载量亦达到了\"破纪录\"的水平——是12月前三周均值的191%。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;\">与此同时，Flurry的结果与Distimo类似——随着全球应用市场的日渐成熟，其增速有所放缓、下载量亦波动不大。当然，对于那些不拿圣诞当主要节日的国家和地区(比如中国)，这种增长就在一整年的时间里变得更加分散了。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;\">[编译自：<a title=\"\" href=\"http://thenextweb.com/apps/2013/12/31/distimo-christmas-2013-saw-50-spike-in-ios-app-downloads-and-revenue-but-effects-are-slowing/?utm_source=feedburner&amp;utm_medium=feed&amp;utm_campaign=Feed:+TheNextWeb+(The+Next+Web+All+Stories)#!qYGxa\" style=\"color:rgb(0,51,102);text-decoration:none;\">TNW</a> , 来源：<a title=\"\" href=\"http://www.distimo.com/blog/2013_12_christmas-spike-downloads-and-revenue-grew-by-more-than-50/\" style=\"color:rgb(0,51,102);text-decoration:none;\">Distimo</a> , <a title=\"\" href=\"http://www.flurry.com/\" style=\"color:rgb(0,51,102);text-decoration:none;\">Flurry</a>]</p><p><br></p>','2013-12-31 14:50:23',NULL,NULL),(15,'为实现2014财年盈利 索尼决定对子公司EMCS进行裁员','<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;vertical-align:baseline;\">如果索尼想在明年的消费级电子产品业务中盈利，那么现在这家公司必须得再考虑下裁员的问题了。<span style=\"font-weight:700;\">据日经报道称，索尼全资子公司EMCS计划从下个月起开始提前部分中层员工及经理的退休时间。</span>据悉，索尼EMCS公司这一新员工裁减计划将面向那些已经在公司工作了10年或更长时间的40岁及以上岁数的员工。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;text-align:center;\"><img src=\"http://note.acmu.org/ueditor/php/upload/81571388475082.jpg\" title=\"sony-vaio-pro-small.jpg\" style=\"border:0px;margin:0px auto;\" alt=\"81571388475082.jpg\"></p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;\">相关工作将从1月6日正式开始，并于3月底结束。届时，这些将被请辞的员工最晚要在4月底离开公司。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;\">选择接受公司这一安排的员工不但可以得到一<a style=\"color:rgb(0,51,102);\">笔</a>遣散费，而且还能得到公司的再就业推荐信。<a style=\"color:rgb(0,51,102);\">索尼</a>方面表示，他们此次的人员裁减计划并不特定指向某一群体，而是取决于员工的利益。目前，索尼并未公布遣散费的具体数额，不过公司表示它将由员工的在职时间以及年龄所决定，其中最高遣散费可达到10多个月的工资。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;\">据悉，索尼EMCS在日本开设有5个工厂，拥有5000名员工。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;\">索尼总裁平井一夫一直希望能够通过改革重振旗下的电子产业，该公司的目标是能在2014财年实现盈利的目标。今年10月31日，索尼在宣布了公司2013年第二财季净损失193亿日元之后表示，他们将下调2014财年的利润预测数值。</p><p style=\"margin:8px auto 0px;padding:0px;vertical-align:baseline;line-height:26px;text-indent:2em;\">另外据日经报道称，当下消费级电子产品的结构正在发生不断变化，人们将更多的目光投向了智能手机和<a style=\"color:rgb(0,51,102);\">平板</a><a style=\"color:rgb(0,51,102);\">电脑</a>，所以索尼原电子核心业务自然会受到比较大的影响。</p><p><br></p>','2013-12-31 15:31:35',NULL,NULL);
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-31 15:49:49
