/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `wp_sbi_instagram_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_on` datetime DEFAULT NULL,
  `instagram_id` varchar(1000) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `time_stamp` datetime DEFAULT NULL,
  `top_time_stamp` datetime DEFAULT NULL,
  `json_data` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `media_id` varchar(1000) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `sizes` varchar(1000) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `aspect_ratio` decimal(4,2) NOT NULL DEFAULT '0.00',
  `images_done` tinyint(1) NOT NULL DEFAULT '0',
  `last_requested` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
