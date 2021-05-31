/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `wp_redirection_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `match_url` varchar(2000) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `match_data` text COLLATE utf8mb4_unicode_520_ci,
  `regex` int(11) unsigned NOT NULL DEFAULT '0',
  `position` int(11) unsigned NOT NULL DEFAULT '0',
  `last_count` int(10) unsigned NOT NULL DEFAULT '0',
  `last_access` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `status` enum('enabled','disabled') COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'enabled',
  `action_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `action_code` int(11) unsigned NOT NULL,
  `action_data` mediumtext COLLATE utf8mb4_unicode_520_ci,
  `match_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`id`),
  KEY `url` (`url`(191)),
  KEY `status` (`status`),
  KEY `regex` (`regex`),
  KEY `group_idpos` (`group_id`,`position`),
  KEY `group` (`group_id`),
  KEY `match_url` (`match_url`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
