/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `wp_redirection_404` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `url` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `referrer` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `http_code` int(11) unsigned NOT NULL DEFAULT '0',
  `request_method` varchar(10) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `request_data` mediumtext COLLATE utf8mb4_unicode_520_ci,
  `ip` varchar(45) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created` (`created`),
  KEY `referrer` (`referrer`(191)),
  KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
