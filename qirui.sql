-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: 10.66.117.97    Database: db_vronline
-- ------------------------------------------------------
-- Server version	5.6.28-cdb20160902-log

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
-- Current Database: `db_vronline`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `db_vronline` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_vronline`;

--
-- Table structure for table `draft_article`
--

DROP TABLE IF EXISTS `draft_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `draft_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `article_tp` enum('news','video','pc','pic') COLLATE utf8_unicode_ci NOT NULL COMMENT '内容类型:新闻,视频,评测,图片',
  `article_title` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT '标题',
  `article_alias` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT '副标题',
  `article_desc` varchar(400) COLLATE utf8_unicode_ci NOT NULL COMMENT '简要',
  `article_content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `article_category` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '分类',
  `article_tag` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章tag',
  `article_vrhelp` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为助手内容',
  `article_vrhelp_category` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '商店分类',
  `article_cover` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT '配图',
  `article_target_id` int(10) NOT NULL COMMENT '关联id',
  `article_pc_match` tinyint(3) NOT NULL COMMENT '评分',
  `article_pic` text COLLATE utf8_unicode_ci NOT NULL COMMENT '图片1',
  `article_video_tp` tinyint(1) NOT NULL DEFAULT '1' COMMENT '视频类型',
  `article_video_time` int(10) NOT NULL COMMENT '视频时长',
  `article_video_source_tp` tinyint(1) NOT NULL DEFAULT '1' COMMENT '视频链接类型',
  `article_video_source_url` text COLLATE utf8_unicode_ci NOT NULL COMMENT '视频链接',
  `article_video_trans` varchar(128) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '是否转码',
  `article_view_num` int(10) NOT NULL DEFAULT '0' COMMENT '阅读数',
  `article_stat` tinyint(1) NOT NULL DEFAULT '2' COMMENT '文章状态',
  `acticle_review_msg` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '文章审核信息',
  `article_author_id` int(10) NOT NULL COMMENT '作者id',
  `article_author_name` varchar(51) COLLATE utf8_unicode_ci NOT NULL COMMENT '作者姓名',
  `article_source` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vronline' COMMENT '文章来源',
  `vtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `article_mobile_img` text COLLATE utf8_unicode_ci NOT NULL COMMENT '移动端图片',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18521 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `draft_game`
--

DROP TABLE IF EXISTS `draft_game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `draft_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'appid',
  `author_uid` int(11) NOT NULL COMMENT '上传用户uid',
  `author_name` varchar(256) NOT NULL DEFAULT '' COMMENT '上传用户名称',
  `title` varchar(256) NOT NULL DEFAULT '' COMMENT '名称',
  `alias` varchar(256) NOT NULL DEFAULT '' COMMENT '别名',
  `content` text NOT NULL COMMENT '游戏介绍',
  `tag` varchar(128) NOT NULL DEFAULT '' COMMENT '标签',
  `category` varchar(256) NOT NULL DEFAULT '0' COMMENT '分类',
  `device` varchar(256) NOT NULL DEFAULT '' COMMENT '支持设备',
  `mountings` varchar(32) NOT NULL COMMENT '支持配件',
  `platform` varchar(128) NOT NULL COMMENT '游戏平台',
  `space` varchar(128) NOT NULL COMMENT '空间',
  `sell_type` tinyint(1) NOT NULL COMMENT '出售类型',
  `sell` decimal(8,0) NOT NULL COMMENT '售价',
  `original_sell` decimal(8,0) NOT NULL COMMENT '原价',
  `client_size` bigint(25) NOT NULL COMMENT '游戏大小',
  `client_version` varchar(32) NOT NULL DEFAULT '' COMMENT '游戏版本号',
  `language` varchar(128) NOT NULL COMMENT '语言',
  `sys_config` varchar(256) NOT NULL DEFAULT '' COMMENT '系统配置',
  `company_dev` varchar(128) NOT NULL COMMENT '开发公司',
  `company_pub` varchar(128) NOT NULL COMMENT '发行公司',
  `official_url` varchar(256) NOT NULL COMMENT '官方网站',
  `download` varchar(256) NOT NULL COMMENT '下载',
  `steam_id` int(11) NOT NULL COMMENT 'steam id',
  `network` tinyint(4) NOT NULL DEFAULT '0' COMMENT '联网类型，0:单机;1:联网;',
  `publish_stat` tinyint(1) NOT NULL COMMENT '发行状态',
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '发行时间',
  `img_logo` varchar(512) NOT NULL DEFAULT '' COMMENT 'logo',
  `img_slider` text NOT NULL COMMENT 'slider 图片',
  `img_rank` varchar(512) NOT NULL COMMENT 'game',
  `img_icon` varchar(511) NOT NULL COMMENT 'ICON',
  `stat` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态，0:未审核;1:正在审核;3:审核失败;5:审核成功，等待发布;7:发布成功;9:删除、下线;',
  `vtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `ltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  `pic_id` int(11) DEFAULT NULL COMMENT '图库id',
  `video_list` text COMMENT '视频id列表',
  `theme` varchar(256) NOT NULL DEFAULT '0' COMMENT '游戏题材',
  `advantage` varchar(256) NOT NULL DEFAULT '' COMMENT '优点',
  `shortcoming` varchar(256) NOT NULL DEFAULT '' COMMENT '缺点',
  `scoring_index` varchar(256) NOT NULL DEFAULT '5,5,5,5' COMMENT '画面，游戏性，操控性，沉浸度',
  `relation_video` varchar(256) NOT NULL DEFAULT '' COMMENT '关联视频',
  `score` char(4) DEFAULT '0' COMMENT '游戏评分',
  `comment_num` int(11) DEFAULT '0' COMMENT '评论数量',
  `agree_num` int(11) DEFAULT '0' COMMENT '点赞数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1001152 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `meafun_comment`
--

DROP TABLE IF EXISTS `meafun_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meafun_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `uid` varchar(255) NOT NULL COMMENT '评论用户ID',
  `nick` varchar(64) DEFAULT '' COMMENT '评论用户昵称',
  `face` varchar(256) DEFAULT '' COMMENT '评论用户头像',
  `target_id` int(11) NOT NULL DEFAULT '0' COMMENT '评论对象的id',
  `target_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '评论对象类型 1视频 2 游戏 3 新闻 4 图片',
  `parent_id` int(11) NOT NULL COMMENT '评论的目标id 0 代表针对主题评论 1 代表针对评论而评论',
  `reply_uid` int(11) DEFAULT '0' COMMENT '回复用户uid',
  `reply_nick` varchar(255) DEFAULT '0' COMMENT '回复用户昵称',
  `reply_num` int(11) DEFAULT '0' COMMENT '回复数量',
  `content` text NOT NULL COMMENT '评论内容',
  `from_device` tinyint(4) DEFAULT '0' COMMENT '来自设备类型 1 移动网页版 2 iphone客户端 3 andriod客户端',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '评论状态0：未审核，1：审核通过, 2:审核拒绝',
  `isdel` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除 1:删除、0:未删除',
  `created` int(11) NOT NULL COMMENT '创建时间',
  `updated` int(11) NOT NULL COMMENT '修改时间',
  `agreenum` int(11) NOT NULL DEFAULT '0' COMMENT '赞',
  `disagreenum` int(11) NOT NULL DEFAULT '0' COMMENT '踩',
  `path` varchar(255) DEFAULT '' COMMENT '评论父子级关系path 如：|1|2|3|4|',
  PRIMARY KEY (`id`),
  KEY `target` (`target_id`,`target_type`,`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COMMENT='评论表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `meafun_editor_check`
--

DROP TABLE IF EXISTS `meafun_editor_check`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meafun_editor_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '审核状态 1 待审核 2 通过 3 拒绝',
  `uid` int(11) unsigned NOT NULL COMMENT '用户Uid',
  `apply_content` varchar(255) NOT NULL DEFAULT '' COMMENT '认证信息',
  `group` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '编辑分组 1 官方团队 2 认证作者 3 公司认证',
  `created` varchar(255) NOT NULL COMMENT '创建时间',
  `updated` varchar(255) NOT NULL COMMENT '修改时间',
  `real_name` varchar(32) NOT NULL DEFAULT '' COMMENT '真实名字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COMMENT='蜜蜂网认证编辑审核';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `meafun_login_log`
--

DROP TABLE IF EXISTS `meafun_login_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meafun_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户uid',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '登录方式 1 手机 2 邮箱 3 帐号 4 第三方登录',
  `command` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '操作类型 1登陆成功  2登出成功 3登录失败',
  `lastip` varchar(32) NOT NULL DEFAULT '' COMMENT '登录ip',
  `created` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`id`),
  KEY `idx_uid_type_time` (`uid`,`type`,`created`),
  KEY `idx_created` (`created`)
) ENGINE=InnoDB AUTO_INCREMENT=371 DEFAULT CHARSET=utf8 COMMENT='登陆日志表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `meafun_message`
--

DROP TABLE IF EXISTS `meafun_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meafun_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '消息id',
  `uid` varchar(255) NOT NULL COMMENT '用户uid',
  `type` tinyint(4) NOT NULL COMMENT '消息类型： 1 网站公告 2 编辑认证 3 文章审核 ',
  `content` text NOT NULL COMMENT '消息内容',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '消息状态： 0 未读 1 已读 -1 删除',
  `created` int(11) NOT NULL COMMENT '创建时间',
  `updated` int(11) NOT NULL COMMENT '修改时间',
  `title` varchar(255) NOT NULL COMMENT '消息标题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=929 DEFAULT CHARSET=utf8 COMMENT='蜜蜂网消息';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `meafun_register_log`
--

DROP TABLE IF EXISTS `meafun_register_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meafun_register_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `uid` bigint(20) unsigned NOT NULL COMMENT '用户ID',
  `register_method` tinyint(2) unsigned NOT NULL COMMENT '注册方式1手机号 2邮箱 3用户名 4qq 5微信 6新浪微博',
  `created` int(11) NOT NULL COMMENT '注册时间',
  `register_ip` varchar(16) DEFAULT '' COMMENT '注册IP',
  `register_client` varchar(16) DEFAULT '' COMMENT '注册客户端',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COMMENT='用户注册日志表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `meafun_user`
--

DROP TABLE IF EXISTS `meafun_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meafun_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '用户状态 1正常 2禁止',
  `register_source` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '注册来源：1手机号 2邮箱 3用户名 4qq 5微信 6新浪微博',
  `user_name` varchar(32) DEFAULT NULL COMMENT '用户账号，必须唯一',
  `nick_name` varchar(32) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `gender` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户性别 0-female 1-male',
  `signature` varchar(255) NOT NULL DEFAULT '' COMMENT '用户个人签名',
  `mobile` varchar(16) NOT NULL DEFAULT '' COMMENT '手机号码(唯一)',
  `mobile_bind_time` varchar(255) NOT NULL COMMENT '手机号码绑定时间',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱(唯一)',
  `email_bind_time` varchar(255) NOT NULL COMMENT '邮箱绑定时间',
  `face` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `company` varchar(255) NOT NULL DEFAULT '' COMMENT '公司',
  `position` varchar(255) NOT NULL DEFAULT '' COMMENT '职位',
  `qrcode` varchar(255) NOT NULL DEFAULT '' COMMENT '打赏二维码',
  `auth_type` int(4) NOT NULL DEFAULT '0' COMMENT '认证编辑 0 不是认证编辑 1 官方认证 2 认证作者 3 公司认证',
  `created` varchar(255) NOT NULL COMMENT '创建时间',
  `updated` varchar(255) NOT NULL COMMENT '修改时间',
  `real_name` varchar(32) NOT NULL DEFAULT '' COMMENT '真实名字',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile_UNIQUE` (`mobile`),
  UNIQUE KEY `nick_name_UNIQUE` (`nick_name`),
  UNIQUE KEY `user_name_UNIQUE` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COMMENT='用户基础信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `meafun_user_auth`
--

DROP TABLE IF EXISTS `meafun_user_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meafun_user_auth` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) unsigned DEFAULT '0' COMMENT '用户id',
  `identity_type` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '1手机号 2邮箱 3用户名 4qq 5微信 6新浪微博',
  `identifier` varchar(50) NOT NULL DEFAULT '' COMMENT '手机号 邮箱 用户名或第三方应用的唯一标识',
  `certificate` varchar(100) NOT NULL DEFAULT '' COMMENT '密码凭证(站内的保存密码，站外的不保存或保存token)',
  `created` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '绑定时间',
  `updated` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新绑定时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `only` (`uid`,`identity_type`),
  KEY `idx_uid` (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COMMENT='用户授权表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_article`
--

DROP TABLE IF EXISTS `t_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `article_tp` enum('news','video','pc','pic') COLLATE utf8_unicode_ci NOT NULL COMMENT '内容类型:新闻,视频,评测,图片',
  `article_title` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT '标题',
  `article_alias` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT '副标题',
  `article_desc` varchar(400) COLLATE utf8_unicode_ci NOT NULL COMMENT '简要',
  `article_content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `article_category` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '分类',
  `article_tag` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章tag',
  `article_vrhelp` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为助手内容',
  `article_vrhelp_category` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '商店分类',
  `article_cover` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT '配图',
  `article_target_id` int(10) NOT NULL COMMENT '关联id',
  `article_pc_match` tinyint(3) NOT NULL COMMENT '评分',
  `article_pic` text COLLATE utf8_unicode_ci NOT NULL COMMENT '图片',
  `article_video_tp` tinyint(1) NOT NULL DEFAULT '1' COMMENT '视频类型',
  `article_video_time` int(10) NOT NULL COMMENT '视频时长',
  `article_video_source_tp` tinyint(1) NOT NULL DEFAULT '1' COMMENT '视频链接类型',
  `article_video_source_url` text COLLATE utf8_unicode_ci NOT NULL COMMENT '视频链接',
  `article_video_trans` varchar(128) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '是否转码',
  `article_view_num` int(10) NOT NULL DEFAULT '1' COMMENT '阅读数量',
  `article_comment_num` int(11) NOT NULL DEFAULT '0' COMMENT '评论数量',
  `article_agree_num` int(10) NOT NULL COMMENT '赞',
  `article_disagree_num` int(10) NOT NULL COMMENT '踩',
  `article_stat` tinyint(1) NOT NULL DEFAULT '2' COMMENT '文章状态',
  `acticle_review_msg` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '文章审核信息',
  `article_author_id` int(10) NOT NULL COMMENT '作者id',
  `article_source` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vronline' COMMENT '文章来源',
  `vtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `article_author_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '作者姓名',
  `article_mobile_img` text COLLATE utf8_unicode_ci NOT NULL COMMENT '移动端图片',
  PRIMARY KEY (`article_id`),
  KEY `author` (`article_author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18521 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_category`
--

DROP TABLE IF EXISTS `t_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tp` tinyint(1) NOT NULL COMMENT '类型',
  `parentid` int(11) NOT NULL COMMENT '父id',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `alias` varchar(50) NOT NULL COMMENT '别名',
  `intro` text NOT NULL COMMENT '描述',
  `initials` char(1) DEFAULT '' COMMENT '拼音首字母',
  PRIMARY KEY (`id`),
  KEY `tp` (`tp`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9032 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_game`
--

DROP TABLE IF EXISTS `t_game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_game` (
  `id` int(11) NOT NULL COMMENT 'appid',
  `author_uid` int(11) NOT NULL COMMENT '上传用户uid',
  `author_name` varchar(256) NOT NULL DEFAULT '' COMMENT '上传用户名称',
  `title` varchar(256) NOT NULL DEFAULT '' COMMENT '名称',
  `alias` varchar(256) NOT NULL DEFAULT '' COMMENT '别名',
  `content` text NOT NULL COMMENT '游戏介绍',
  `tag` varchar(128) NOT NULL DEFAULT '' COMMENT '标签',
  `category` varchar(256) NOT NULL DEFAULT '0' COMMENT '分类',
  `device` varchar(256) NOT NULL DEFAULT '' COMMENT '支持设备',
  `mountings` varchar(32) NOT NULL COMMENT '支持配件',
  `platform` varchar(128) NOT NULL COMMENT '游戏平台',
  `space` varchar(128) NOT NULL COMMENT '空间',
  `sell_type` tinyint(1) NOT NULL COMMENT '出售类型',
  `sell` decimal(8,0) NOT NULL COMMENT '售价',
  `original_sell` decimal(8,0) NOT NULL COMMENT '原价',
  `client_size` bigint(25) NOT NULL COMMENT '游戏大小',
  `client_version` varchar(32) NOT NULL DEFAULT '' COMMENT '游戏版本号',
  `language` varchar(128) NOT NULL COMMENT '语言',
  `sys_config` varchar(256) NOT NULL DEFAULT '' COMMENT '系统配置',
  `company_dev` varchar(128) NOT NULL COMMENT '开发公司',
  `company_pub` varchar(128) NOT NULL COMMENT '发行公司',
  `official_url` varchar(256) NOT NULL COMMENT '官方网站',
  `download` varchar(256) NOT NULL COMMENT '下载',
  `steam_id` int(11) NOT NULL COMMENT 'steam id',
  `network` tinyint(4) NOT NULL DEFAULT '0' COMMENT '联网类型，0:单机;1:联网;',
  `publish_stat` tinyint(1) NOT NULL COMMENT '发行状态',
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '发行时间',
  `img_logo` varchar(512) NOT NULL DEFAULT '' COMMENT 'logo',
  `img_slider` text NOT NULL COMMENT 'slider 图片',
  `img_rank` varchar(512) NOT NULL COMMENT 'game',
  `img_icon` varchar(511) NOT NULL COMMENT 'ICON',
  `stat` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态，0:未审核;1:正在审核;3:审核失败;5:审核成功，等待发布;7:发布成功;9:删除、下线;',
  `vtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `ltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  `pic_id` int(11) DEFAULT NULL COMMENT '图库id',
  `video_list` text COMMENT '视频id列表',
  `theme` varchar(256) NOT NULL DEFAULT '0' COMMENT '游戏题材',
  `advantage` varchar(256) NOT NULL DEFAULT '' COMMENT '优点',
  `shortcoming` varchar(256) NOT NULL DEFAULT '' COMMENT '缺点',
  `scoring_index` varchar(256) NOT NULL DEFAULT '5,5,5,5' COMMENT '画面，游戏性，操控性，沉浸度',
  `relation_video` varchar(256) NOT NULL DEFAULT '' COMMENT '关联视频',
  `score` char(4) DEFAULT '0' COMMENT '游戏评分',
  `comment_num` int(11) DEFAULT '0' COMMENT '评论数量',
  `agree_num` int(11) DEFAULT '0' COMMENT '点赞数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_position`
--

DROP TABLE IF EXISTS `t_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_position` (
  `pos_id` int(10) NOT NULL AUTO_INCREMENT,
  `pos_code` varchar(32) NOT NULL COMMENT '位置代码',
  `pos_group` varchar(12) NOT NULL COMMENT '位置分组',
  `pos_name` varchar(64) NOT NULL COMMENT '位置名称',
  `pos_desc` varchar(256) NOT NULL COMMENT '位置描述',
  `pos_cover` varchar(256) NOT NULL COMMENT '位置图片',
  `pos_stat` tinyint(1) NOT NULL COMMENT '状态，0正常;9删除;	',
  `ltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pos_url` varchar(255) DEFAULT '' COMMENT '推荐位的更多按钮指引的url',
  PRIMARY KEY (`pos_id`),
  UNIQUE KEY `pos_code` (`pos_code`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_spider_url`
--

DROP TABLE IF EXISTS `t_spider_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_spider_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:录入 2:已爬 ',
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1:列表链接 2:内容链接',
  `category` varchar(255) NOT NULL COMMENT '类别',
  `target_id` varchar(255) NOT NULL COMMENT '目标id',
  `isExtract` int(11) DEFAULT '0' COMMENT '0:未提取 1:已提取',
  `host` varchar(255) NOT NULL COMMENT '域名',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `img_list` text NOT NULL COMMENT '图片列表',
  `tag_list` varchar(255) DEFAULT NULL,
  `isStorage` int(11) DEFAULT '0' COMMENT '0:没储存 1:已储存',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `type` (`type`),
  KEY `host` (`host`),
  KEY `url` (`url`),
  KEY `isExtract` (`isExtract`)
) ENGINE=InnoDB AUTO_INCREMENT=135807 DEFAULT CHARSET=utf8 COMMENT='蜘蛛链接库';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_tag`
--

DROP TABLE IF EXISTS `t_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_top`
--

DROP TABLE IF EXISTS `t_top`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_top` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_code` varchar(32) NOT NULL COMMENT '位置代码',
  `tp` enum('news','pc','video','picture','game','banner','pic') NOT NULL COMMENT '内容类型',
  `itemid` int(10) NOT NULL COMMENT '对应id',
  `weight` int(10) NOT NULL COMMENT '权重',
  `title` varchar(128) NOT NULL COMMENT '标题',
  `intro` varchar(256) NOT NULL COMMENT '简介',
  `cover` varchar(256) NOT NULL COMMENT '图片',
  `target_url` varchar(256) NOT NULL COMMENT '链接',
  `stat` tinyint(1) NOT NULL COMMENT '状态',
  `ltime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4013 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_user_grade`
--

DROP TABLE IF EXISTS `t_user_grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_user_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) NOT NULL COMMENT '用户id',
  `targetid` varchar(255) NOT NULL COMMENT '目标id',
  `grade` varchar(255) NOT NULL COMMENT '评分',
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL COMMENT '评分分类:game,',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_video_collect`
--

DROP TABLE IF EXISTS `t_video_collect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_video_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `description` varchar(255) NOT NULL COMMENT '描述',
  `thumbnails` varchar(255) NOT NULL COMMENT '缩略图',
  `videoid` varchar(255) NOT NULL COMMENT 'youtube的videoid',
  `video_path` varchar(255) NOT NULL COMMENT '视频地址',
  `type` varchar(255) NOT NULL COMMENT '分类',
  `is_releas` int(11) NOT NULL DEFAULT '0' COMMENT '0:未发布 1:发布',
  `created_at` int(11) NOT NULL COMMENT '采集时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5206 DEFAULT CHARSET=utf8 COMMENT='视频采集';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_vr_accessory`
--

DROP TABLE IF EXISTS `t_vr_accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_vr_accessory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '配件名称',
  `introduce` varchar(255) DEFAULT NULL COMMENT '配件介绍',
  `price` int(11) DEFAULT NULL COMMENT '价格',
  `images` text COMMENT '图片',
  `url` varchar(255) DEFAULT NULL COMMENT '配件链接',
  `brand_id` int(11) NOT NULL COMMENT '品牌id',
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:审核中 1:上架 2:下架',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_vr_brand`
--

DROP TABLE IF EXISTS `t_vr_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_vr_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '品牌名称',
  `logo` varchar(255) NOT NULL COMMENT '品牌logo',
  `url` varchar(255) NOT NULL COMMENT '品牌链接',
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0:审核中 1:上架 2:下线',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_vr_device`
--

DROP TABLE IF EXISTS `t_vr_device`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_vr_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '设备名称',
  `price` varchar(255) DEFAULT NULL COMMENT '设备价格',
  `introduce` text COMMENT '设备简介',
  `images` text COMMENT '产品图片',
  `url` varchar(255) DEFAULT NULL COMMENT '产品链接',
  `merit` varchar(255) DEFAULT NULL COMMENT '优点',
  `defect` varchar(255) DEFAULT NULL COMMENT '缺点',
  `type` int(11) DEFAULT NULL COMMENT '1:分体 2:一体 3:移动',
  `dpi` varchar(255) DEFAULT NULL COMMENT '分辨率',
  `fov` varchar(255) DEFAULT NULL COMMENT '视角场',
  `delay` varchar(255) DEFAULT NULL COMMENT '延迟',
  `weight` varchar(255) DEFAULT NULL COMMENT '重量',
  `rr` varchar(255) DEFAULT NULL COMMENT '刷新率',
  `sensor` varchar(255) DEFAULT NULL COMMENT '传感器',
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:审核中 1:上架 2:下架',
  `brand_id` int(11) NOT NULL COMMENT '品牌id',
  `system` varchar(255) NOT NULL,
  `cpu` varchar(255) NOT NULL,
  `gpu` varchar(255) NOT NULL,
  `memory` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_vr_device_expand`
--

DROP TABLE IF EXISTS `t_vr_device_expand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_vr_device_expand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL COMMENT '设备id',
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设备的扩展参数';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_vr_device_grade`
--

DROP TABLE IF EXISTS `t_vr_device_grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_vr_device_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL COMMENT '设备id',
  `dedizzy` varchar(255) DEFAULT NULL COMMENT '抗晕能力',
  `gameplay` varchar(255) DEFAULT NULL COMMENT '游戏性',
  `light` varchar(255) DEFAULT NULL COMMENT '轻便度',
  `gamecount` varchar(255) DEFAULT NULL COMMENT '游戏数量',
  `clarity` varchar(255) DEFAULT NULL COMMENT '清晰度',
  `smooth` varchar(255) DEFAULT NULL COMMENT '流畅度',
  `facade` varchar(255) DEFAULT NULL COMMENT '外观',
  `comfort` varchar(255) DEFAULT NULL COMMENT '舒适度',
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设备评分';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_writer`
--

DROP TABLE IF EXISTS `t_writer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_writer` (
  `writer_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '作家id',
  `writer_name` varchar(64) NOT NULL COMMENT '作家名称',
  `writer_intro` varchar(256) NOT NULL COMMENT '作家简介',
  `writer_desc` text NOT NULL COMMENT '作家描述',
  `writer_cover` varchar(256) NOT NULL COMMENT '作家头像',
  `stat` tinyint(1) NOT NULL,
  `ltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`writer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10018 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-10  9:49:42
