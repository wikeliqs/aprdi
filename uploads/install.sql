# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: academy_demo
# Generation Time: 2018-10-09 10:57:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `font_awesome_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `commentable_id` int(11) DEFAULT NULL,
  `commentable_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table course
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `outcomes` longtext COLLATE utf8_unicode_ci,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `section` longtext COLLATE utf8_unicode_ci,
  `requirements` longtext COLLATE utf8_unicode_ci,
  `price` double DEFAULT NULL,
  `discount_flag` int(11) DEFAULT '0',
  `discounted_price` int(11) DEFAULT NULL,
  `level` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `visibility` int(11) DEFAULT NULL,
  `is_top_course` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table enroll
# ------------------------------------------------------------

DROP TABLE IF EXISTS `enroll`;

CREATE TABLE `enroll` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table frontend_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `frontend_settings`;

CREATE TABLE `frontend_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `frontend_settings` WRITE;
/*!40000 ALTER TABLE `frontend_settings` DISABLE KEYS */;

INSERT INTO `frontend_settings` (`id`, `key`, `value`)
VALUES
	(1,'banner_title','Learn on your schedule'),
	(2,'banner_sub_title','Study any topic, anytime. Explore thousands of courses for the lowest price ever!'),
	(4,'about_us','<h2>This is about us</h2>Welcome to Academy. It will help you to learn in a new way'),
	(10,'terms_and_condition','<h2>Terms and Condition</h2>This is the Terms and condition page for your company'),
	(11,'privacy_policy','<h2>Privacy Policy</h2>This is the Privacy Policy page for your company');

/*!40000 ALTER TABLE `frontend_settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table language
# ------------------------------------------------------------

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL AUTO_INCREMENT,
  `phrase` longtext COLLATE utf8_unicode_ci,
  `english` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`phrase_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;

INSERT INTO `language` (`phrase_id`, `phrase`, `english`)
VALUES
	(1,'manage_profile',NULL),
	(140,'category_code',NULL),
	(3,'dashboard',NULL),
	(4,'categories',NULL),
	(5,'courses',NULL),
	(6,'students',NULL),
	(7,'enroll_history',NULL),
	(8,'message',NULL),
	(9,'settings',NULL),
	(10,'system_settings',NULL),
	(11,'frontend_settings',NULL),
	(12,'payment_settings',NULL),
	(13,'manage_language',NULL),
	(14,'edit_profile',NULL),
	(15,'log_out',NULL),
	(16,'first_name',NULL),
	(17,'last_name',NULL),
	(18,'email',NULL),
	(19,'facebook_link',NULL),
	(20,'twitter_link',NULL),
	(21,'linkedin_link',NULL),
	(22,'a_short_title_about_yourself',NULL),
	(23,'biography',NULL),
	(24,'photo',NULL),
	(25,'select_image',NULL),
	(26,'change',NULL),
	(27,'remove',NULL),
	(28,'update_profile',NULL),
	(29,'change_password',NULL),
	(30,'current_password',NULL),
	(31,'new_password',NULL),
	(32,'confirm_new_password',NULL),
	(33,'delete',NULL),
	(34,'cancel',NULL),
	(35,'are_you_sure_to_update_this_information',NULL),
	(36,'yes',NULL),
	(37,'no',NULL),
	(38,'system settings',NULL),
	(39,'system_name',NULL),
	(40,'system_title',NULL),
	(41,'slogan',NULL),
	(42,'system_email',NULL),
	(43,'address',NULL),
	(44,'phone',NULL),
	(45,'youtube_api_key',NULL),
	(46,'get_youtube_api_key',NULL),
	(47,'vimeo_api_key',NULL),
	(48,'purchase_code',NULL),
	(49,'language',NULL),
	(50,'text-align',NULL),
	(51,'update_system_settings',NULL),
	(52,'update_product',NULL),
	(53,'file',NULL),
	(54,'install_update',NULL),
	(55,'system_logo',NULL),
	(56,'update_logo',NULL),
	(57,'get_vimeo_api_key',NULL),
	(58,'add_category',NULL),
	(59,'category_title',NULL),
	(60,'sub_categories',NULL),
	(61,'actions',NULL),
	(62,'action',NULL),
	(63,'manage_sub_categories',NULL),
	(64,'edit',NULL),
	(65,'add_course',NULL),
	(66,'select_category',NULL),
	(67,'title',NULL),
	(68,'category',NULL),
	(69,'#_section',NULL),
	(70,'#_lesson',NULL),
	(71,'#_enrolled_user',NULL),
	(72,'view_course_details',NULL),
	(73,'manage_section',NULL),
	(74,'manage_lesson',NULL),
	(75,'student',NULL),
	(76,'add_student',NULL),
	(77,'name',NULL),
	(78,'date_added',NULL),
	(79,'enrolled_courses',NULL),
	(80,'view_profile',NULL),
	(81,'admin_dashboard',NULL),
	(82,'total_courses',NULL),
	(83,'number_of_courses',NULL),
	(84,'total_lessons',NULL),
	(85,'number_of_lessons',NULL),
	(86,'total_enrollment',NULL),
	(87,'number_of_enrollment',NULL),
	(88,'total_student',NULL),
	(89,'number_of_student',NULL),
	(90,'manage_sections',NULL),
	(91,'manage sections',NULL),
	(92,'course',NULL),
	(93,'add_section',NULL),
	(94,'lessons',NULL),
	(95,'serialize_sections',NULL),
	(96,'add_lesson',NULL),
	(97,'edit_section',NULL),
	(98,'delete_section',NULL),
	(99,'course_details',NULL),
	(100,'course details',NULL),
	(101,'details',NULL),
	(102,'instructor',NULL),
	(103,'sub_category',NULL),
	(104,'enrolled_user',NULL),
	(105,'last_modified',NULL),
	(106,'manage language',NULL),
	(107,'language_list',NULL),
	(108,'add_phrase',NULL),
	(109,'add_language',NULL),
	(110,'option',NULL),
	(111,'edit_phrase',NULL),
	(112,'delete_language',NULL),
	(113,'phrase',NULL),
	(114,'value_required',NULL),
	(115,'frontend settings',NULL),
	(116,'banner_title',NULL),
	(117,'banner_sub_title',NULL),
	(118,'about_us',NULL),
	(119,'blog',NULL),
	(120,'update_frontend_settings',NULL),
	(121,'update_banner',NULL),
	(122,'banner_image',NULL),
	(123,'update_banner_image',NULL),
	(124,'payment settings',NULL),
	(125,'paypal_settings',NULL),
	(126,'client_id',NULL),
	(127,'sandbox',NULL),
	(128,'production',NULL),
	(129,'active',NULL),
	(130,'mode',NULL),
	(131,'stripe_settings',NULL),
	(132,'testmode',NULL),
	(133,'on',NULL),
	(134,'off',NULL),
	(135,'test_secret_key',NULL),
	(136,'test_public_key',NULL),
	(137,'live_secret_key',NULL),
	(138,'live_public_key',NULL),
	(139,'save_changes',NULL),
	(141,'update_phrase',NULL),
	(142,'check',NULL),
	(143,'settings_updated',NULL),
	(144,'checking',NULL),
	(145,'phrase_added',NULL),
	(146,'language_added',NULL),
	(147,'language_deleted',NULL),
	(148,'add course',NULL),
	(149,'add_courses',NULL),
	(150,'add_course_form',NULL),
	(151,'basic_info',NULL),
	(152,'short_description',NULL),
	(153,'description',NULL),
	(154,'level',NULL),
	(155,'beginner',NULL),
	(156,'advanced',NULL),
	(157,'intermediate',NULL),
	(158,'language_made_in',NULL),
	(159,'is_top_course',NULL),
	(160,'outcomes',NULL),
	(161,'category_and_sub_category',NULL),
	(162,'select_a_category',NULL),
	(163,'select_a_category_first',NULL),
	(164,'requirements',NULL),
	(165,'price_and_discount',NULL),
	(166,'price',NULL),
	(167,'has_discount',NULL),
	(168,'discounted_price',NULL),
	(169,'course_thumbnail',NULL),
	(170,'note',NULL),
	(171,'thumbnail_size_should_be_600_x_600',NULL),
	(172,'course_overview_url',NULL),
	(173,'0%',NULL),
	(174,'manage profile',NULL),
	(175,'edit_course',NULL),
	(176,'edit course',NULL),
	(177,'edit_courses',NULL),
	(178,'edit_course_form',NULL),
	(179,'update_course',NULL),
	(180,'course_updated',NULL),
	(181,'number_of_sections',NULL),
	(182,'number_of_enrolled_users',NULL),
	(183,'add section',NULL),
	(184,'section',NULL),
	(185,'add_section_form',NULL),
	(186,'update',NULL),
	(187,'serialize_section',NULL),
	(188,'serialize section',NULL),
	(189,'submit',NULL),
	(190,'sections_have_been_serialized',NULL),
	(191,'select_course',NULL),
	(192,'search',NULL),
	(193,'thumbnail',NULL),
	(194,'duration',NULL),
	(195,'provider',NULL),
	(196,'add lesson',NULL),
	(197,'add_lesson_form',NULL),
	(198,'video_type',NULL),
	(199,'select_a_course',NULL),
	(200,'select_a_course_first',NULL),
	(201,'video_url',NULL),
	(202,'invalid_url',NULL),
	(203,'your_video_source_has_to_be_either_youtube_or_vimeo',NULL),
	(204,'for',NULL),
	(205,'of',NULL),
	(206,'edit_lesson',NULL),
	(207,'edit lesson',NULL),
	(208,'edit_lesson_form',NULL),
	(209,'login',NULL),
	(210,'password',NULL),
	(211,'forgot_password',NULL),
	(212,'back_to_website',NULL),
	(213,'send_mail',NULL),
	(214,'back_to_login',NULL),
	(215,'student_add',NULL),
	(216,'student add',NULL),
	(217,'add_students',NULL),
	(218,'student_add_form',NULL),
	(219,'login_credentials',NULL),
	(220,'social_information',NULL),
	(221,'facebook',NULL),
	(222,'twitter',NULL),
	(223,'linkedin',NULL),
	(224,'user_image',NULL),
	(225,'add_user',NULL),
	(226,'user_update_successfully',NULL),
	(227,'user_added_successfully',NULL),
	(228,'student_edit',NULL),
	(229,'student edit',NULL),
	(230,'edit_students',NULL),
	(231,'student_edit_form',NULL),
	(232,'update_user',NULL),
	(233,'enroll history',NULL),
	(234,'filter',NULL),
	(235,'user_name',NULL),
	(236,'enrolled_course',NULL),
	(237,'enrollment_date',NULL),
	(238,'biography2',NULL),
	(239,'home',NULL),
	(240,'search_for_courses',NULL),
	(241,'total',NULL),
	(242,'go_to_cart',NULL),
	(243,'your_cart_is_empty',NULL),
	(244,'log_in',NULL),
	(245,'sign_up',NULL),
	(246,'what_do_you_want_to_learn',NULL),
	(247,'online_courses',NULL),
	(248,'explore_a_variety_of_fresh_topics',NULL),
	(249,'expert_instruction',NULL),
	(250,'find_the_right_course_for_you',NULL),
	(251,'lifetime_access',NULL),
	(252,'learn_on_your_schedule',NULL),
	(253,'top_courses',NULL),
	(254,'last_updater',NULL),
	(255,'hours',NULL),
	(256,'add_to_cart',NULL),
	(257,'top',NULL),
	(258,'latest_courses',NULL),
	(259,'added_to_cart',NULL),
	(260,'admin',NULL),
	(261,'log_in_to_your_udemy_account',NULL),
	(262,'by_signing_up_you_agree_to_our',NULL),
	(263,'terms_of_use',NULL),
	(264,'and',NULL),
	(265,'privacy_policy',NULL),
	(266,'do_not_have_an_account',NULL),
	(267,'sign_up_and_start_learning',NULL),
	(268,'check_here_for_exciting_deals_and_personalized_course_recommendations',NULL),
	(269,'already_have_an_account',NULL),
	(270,'checkout',NULL),
	(271,'paypal',NULL),
	(272,'stripe',NULL),
	(273,'step',NULL),
	(274,'how_would_you_rate_this_course_overall',NULL),
	(275,'write_a_public_review',NULL),
	(276,'describe_your_experience_what_you_got_out_of_the_course_and_other_helpful_highlights',NULL),
	(277,'what_did_the_instructor_do_well_and_what_could_use_some_improvement',NULL),
	(278,'next',NULL),
	(279,'previous',NULL),
	(280,'publish',NULL),
	(281,'search_results',NULL),
	(282,'ratings',NULL),
	(283,'search_results_for',NULL),
	(284,'category_page',NULL),
	(285,'all',NULL),
	(286,'category_list',NULL),
	(287,'by',NULL),
	(288,'go_to_wishlist',NULL),
	(289,'hi',NULL),
	(290,'my_courses',NULL),
	(291,'my_wishlist',NULL),
	(292,'my_messages',NULL),
	(293,'purchase_history',NULL),
	(294,'user_profile',NULL),
	(295,'already_purchased',NULL),
	(296,'all_courses',NULL),
	(297,'wishlists',NULL),
	(298,'search_my_courses',NULL),
	(299,'students_enrolled',NULL),
	(300,'created_by',NULL),
	(301,'last_updated',NULL),
	(302,'what_will_i_learn',NULL),
	(303,'view_more',NULL),
	(304,'other_related_courses',NULL),
	(305,'updated',NULL),
	(306,'curriculum_for_this_course',NULL),
	(307,'about_the_instructor',NULL),
	(308,'reviews',NULL),
	(309,'student_feedback',NULL),
	(310,'average_rating',NULL),
	(311,'preview_this_course',NULL),
	(312,'includes',NULL),
	(313,'on_demand_videos',NULL),
	(314,'full_lifetime_access',NULL),
	(315,'access_on_mobile_and_tv',NULL),
	(316,'course_preview',NULL),
	(317,'instructor_page',NULL),
	(318,'buy_now',NULL),
	(319,'shopping_cart',NULL),
	(320,'courses_in_cart',NULL),
	(321,'student_name',NULL),
	(322,'amount_to_pay',NULL),
	(323,'payment_successfully_done',NULL),
	(324,'filter_by',NULL),
	(325,'instructors',NULL),
	(326,'reset',NULL),
	(327,'your',NULL),
	(328,'rating',NULL),
	(329,'course_detail',NULL),
	(330,'start_lesson',NULL),
	(331,'show_full_biography',NULL),
	(332,'terms_and_condition',NULL),
	(333,'about',NULL),
	(334,'terms_&_condition',NULL),
	(335,'sub categories',NULL),
	(336,'add_sub_category',NULL),
	(337,'sub_category_title',NULL),
	(338,'add sub category',NULL),
	(339,'add_sub_category_form',NULL),
	(340,'sub_category_code',NULL),
	(341,'data_deleted',NULL),
	(342,'edit_category',NULL),
	(343,'edit category',NULL),
	(344,'edit_category_form',NULL),
	(345,'font',NULL),
	(346,'awesome class',NULL),
	(347,'update_category',NULL),
	(348,'data_updated_successfully',NULL),
	(349,'edit_sub_category',NULL),
	(350,'edit sub category',NULL),
	(351,'sub_category_edit',NULL),
	(352,'update_sub_category',NULL),
	(353,'course_added',NULL),
	(354,'user_deleted_successfully',NULL),
	(355,'private_messaging',NULL),
	(356,'private messaging',NULL),
	(357,'messages',NULL),
	(358,'select_message_to_read',NULL),
	(359,'new_message',NULL),
	(360,'email_duplication',NULL),
	(361,'your_registration_has_been_successfully_done',NULL),
	(362,'profile',NULL),
	(363,'account',NULL),
	(364,'add_information_about_yourself_to_share_on_your_profile',NULL),
	(365,'basics',NULL),
	(366,'add_your_twitter_link',NULL),
	(367,'add_your_facebook_link',NULL),
	(368,'add_your_linkedin_link',NULL),
	(369,'credentials',NULL),
	(370,'edit_your_account_settings',NULL),
	(371,'enter_current_password',NULL),
	(372,'enter_new_password',NULL),
	(373,'re-type_your_password',NULL),
	(374,'save',NULL),
	(375,'update_user_photo',NULL),
	(376,'update_your_photo',NULL),
	(377,'upload_image',NULL),
	(378,'updated_successfully',NULL),
	(379,'invalid_login_credentials',NULL);

/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table lesson
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lesson`;

CREATE TABLE `lesson` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_thread_code` longtext,
  `message` longtext,
  `sender` longtext,
  `timestamp` longtext,
  `read_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table message_thread
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message_thread`;

CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_thread_code` longtext COLLATE utf8_unicode_ci,
  `sender` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `reciever` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`message_thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table payment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table rating
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rating`;

CREATE TABLE `rating` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rating` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ratable_id` int(11) DEFAULT NULL,
  `ratable_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;

INSERT INTO `role` (`id`, `name`, `date_added`, `last_modified`)
VALUES
	(1,'Admin',1234567890,1234567890),
	(2,'User',1234567890,1234567890);

/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table section
# ------------------------------------------------------------

DROP TABLE IF EXISTS `section`;

CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `key`, `value`)
VALUES
	(1,'language','english'),
	(2,'system_name','Academy Learning Club'),
	(3,'system_title','Academy Learning Club'),
	(4,'system_email','admin@example.com'),
	(5,'address','Sydeny, Australia'),
	(6,'phone','+143-52-9933631'),
	(7,'purchase_code',''),
	(8,'paypal','[{\"active\":\"0\",\"mode\":\"sandbox\",\"sandbox_client_id\":\"AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R\",\"production_client_id\":\"1234\"}]'),
	(9,'stripe_keys','[{\"active\":\"0\",\"testmode\":\"on\",\"public_key\":\"pk_test_c6VvBEbwHFdulFZ62q1IQrar\",\"secret_key\":\"sk_test_9IMkiM6Ykxr1LCe2dJ3PgaxS\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}]'),
	(10,'youtube_api_key',''),
	(11,'vimeo_api_key',''),
	(12,'slogan','A course based video CMS'),
	(13,'text_align','left-to-right');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tagable_id` int(11) DEFAULT NULL,
  `tagable_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_links` longtext COLLATE utf8_unicode_ci,
  `biography` longtext COLLATE utf8_unicode_ci,
  `role_id` int(11) DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `watch_history` longtext COLLATE utf8_unicode_ci,
  `wishlist` longtext COLLATE utf8_unicode_ci,
  `title` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
