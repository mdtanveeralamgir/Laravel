-- -------------------------------------------------------------
-- TablePlus 4.6.0(406)
--
-- https://tableplus.com/
--
-- Database: laravel
-- Generation Time: 2022-03-11 23:49:02.4920
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `full_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `photos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` int NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `role_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `staff` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `taggables` (
  `tag_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `taggable_id` int NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comments` (`id`, `body`, `commentable_id`, `commentable_type`) VALUES
(1, 'comment_1', 1, 'App\\Models\\Post'),
(2, 'comment_2', 2, 'App\\Models\\Post'),
(3, 'comment_3', 1, 'App\\Models\\User'),
(4, 'comment_4', 2, 'App\\Models\\User');

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BD', NULL, NULL),
(2, 'Canada', NULL, NULL);

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2022_03_04_153102_create_photos_table', 4),
(15, '2022_03_02_153732_create_posts_table', 5),
(16, '2022_03_02_172827_create_roles_table', 5),
(17, '2022_03_02_173059_create_users_roles_table', 5),
(18, '2022_03_03_160928_create_countries_table', 5),
(19, '2022_03_03_161041_add_country_id_column_to_users', 5),
(20, '2022_03_04_153102_create_photo_table', 6),
(21, '2022_03_04_180223_create_comments_table', 6),
(22, '2022_03_04_181315_change_column_name_of_comments', 7),
(23, '2022_03_07_155032_add_commentable_columns_to_comments', 8),
(24, '2022_03_07_172436_create_videos_table', 9),
(25, '2022_03_07_172507_create_tags_table', 9),
(26, '2022_03_07_172519_create_taggables_table', 9),
(27, '2022_03_07_185550_change_column_name_to_tag_id', 10),
(28, '2014_10_12_000000_create_users_table', 11),
(29, '2014_10_12_100000_create_password_resets_table', 11),
(30, '2019_08_19_000000_create_failed_jobs_table', 11),
(31, '2019_12_14_000001_create_personal_access_tokens_table', 11),
(32, '2022_03_09_165136_create_addresses_table', 12),
(33, '2022_03_09_170123_add_timestamps_to_address_table', 13),
(34, '2022_03_11_152151_create_staff_table', 14),
(35, '2022_03_11_152205_create_products_table', 14),
(36, '2022_03_11_171156_timestamps_videos_table', 15),
(37, '2022_03_11_174230_timestamps_tags_table', 16);

INSERT INTO `photos` (`id`, `path`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(1, 'post/1', 1, 'App\\Models\\Post', NULL, NULL),
(2, 'post/2', 2, 'App\\Models\\Post', NULL, NULL),
(3, 'user/1', 1, 'App\\Models\\User', NULL, NULL),
(4, 'user/2', 2, 'App\\Models\\User', NULL, NULL),
(6, 'another.jpg', 1, 'App\\Models\\Staff', NULL, '2022-03-11 16:08:12');

INSERT INTO `posts` (`id`, `user_id`, `body`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Laravel', 'CURD update', NULL, '2022-03-10 16:40:28'),
(2, 1, 'PHP', 'Laravel', NULL, NULL),
(3, 3, 'Insert data using tinker', 'Tinker', '2022-03-08 17:07:12', '2022-03-08 17:07:12'),
(5, 2, 'a lot of work and typing', 'Using obj to insert data', '2022-03-08 17:25:07', '2022-03-08 17:25:07'),
(7, 1, 'mm poly', 'polymorphic', '2022-03-11 16:53:57', '2022-03-11 16:53:57'),
(8, 1, 'mm poly', 'polymorphic', '2022-03-11 16:54:07', '2022-03-11 16:54:07'),
(9, 1, 'mm poly', 'polymorphic', '2022-03-11 16:55:35', '2022-03-11 16:55:35'),
(10, 1, 'mm poly', 'polymorphic', '2022-03-11 16:57:36', '2022-03-11 16:57:36'),
(11, 1, 'mm poly', 'polymorphic', '2022-03-11 17:07:10', '2022-03-11 17:07:10'),
(12, 1, 'mm poly', 'polymorphic', '2022-03-11 17:08:19', '2022-03-11 17:08:19'),
(13, 1, 'mm poly', 'polymorphic', '2022-03-11 17:08:32', '2022-03-11 17:08:32'),
(14, 1, 'mm poly', 'polymorphic', '2022-03-11 17:08:47', '2022-03-11 17:08:47'),
(15, 1, 'mm poly', 'polymorphic', '2022-03-11 17:12:19', '2022-03-11 17:12:19'),
(16, 1, 'mm poly', 'polymorphic', '2022-03-11 17:12:40', '2022-03-11 17:12:40'),
(17, 1, 'mm poly', 'polymorphic', '2022-03-11 17:13:21', '2022-03-11 17:13:21'),
(18, 1, 'mm poly', 'polymorphic', '2022-03-11 17:14:11', '2022-03-11 17:14:11'),
(19, 1, 'mm poly', 'polymorphic', '2022-03-11 17:29:31', '2022-03-11 17:29:31'),
(20, 1, 'mm poly', 'polymorphic', '2022-03-11 17:32:36', '2022-03-11 17:32:36'),
(21, 1, 'mm poly', 'polymorphic', '2022-03-11 17:33:36', '2022-03-11 17:33:36');

INSERT INTO `products` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PHP', '2022-03-11 15:39:49', '2022-03-11 15:39:49'),
(2, 'Laravel', '2022-03-11 15:39:53', '2022-03-11 15:39:53');

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(4, 1, 2, NULL, NULL),
(5, 1, 3, NULL, NULL);

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Admin', '2022-03-10 17:35:47', '2022-03-10 17:35:47'),
(3, 'tech', NULL, NULL);

INSERT INTO `staff` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Opel', '2022-03-11 15:39:03', '2022-03-11 15:39:03'),
(2, 'Aayid', '2022-03-11 15:39:08', '2022-03-11 15:39:08');

INSERT INTO `taggables` (`tag_id`, `taggable_id`, `taggable_type`) VALUES
(1, 18, 'App\\Models\\Post'),
(2, 5, 'App\\Models\\Video'),
(3, 21, 'App\\Models\\Post'),
(4, 6, 'App\\Models\\Video'),
(5, 1, 'App\\Models\\Post'),
(6, 12, 'App\\Models\\Post'),
(7, 14, 'App\\Models\\Post'),
(8, 16, 'App\\Models\\Post'),
(9, 17, 'App\\Models\\Post'),
(10, 2, 'App\\Models\\Post'),
(11, 1, 'App\\Models\\Video'),
(12, 2, 'App\\Models\\Video');

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'tag_1_post', NULL, NULL),
(2, 'tag_2_post', NULL, NULL),
(3, 'updated', NULL, '2022-03-11 17:42:49'),
(4, 'tag_4_video', NULL, NULL);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'opel', 'opel@gmail.com', NULL, '123', NULL, NULL, NULL),
(2, 'shamam', 'shamma@gmal.com', NULL, '123', NULL, NULL, NULL);

INSERT INTO `videos` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'video_1', NULL, NULL),
(2, 'video_2', NULL, NULL),
(3, 'insert mm p', '2022-03-11 17:12:40', '2022-03-11 17:12:40'),
(4, 'insert mm p', '2022-03-11 17:13:21', '2022-03-11 17:13:21'),
(5, 'insert mm p', '2022-03-11 17:14:11', '2022-03-11 17:14:11'),
(6, 'insert mm p', '2022-03-11 17:33:36', '2022-03-11 17:33:36');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;