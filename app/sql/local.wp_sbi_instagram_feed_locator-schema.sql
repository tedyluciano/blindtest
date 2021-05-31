/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `wp_sbi_instagram_feed_locator` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `feed_id` varchar(50) NOT NULL DEFAULT '',
  `post_id` bigint(20) unsigned NOT NULL,
  `html_location` varchar(50) NOT NULL DEFAULT 'unknown',
  `shortcode_atts` longtext NOT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feed_id` (`feed_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
