/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100126
 Source Host           : localhost:3306
 Source Schema         : pets_store

 Target Server Type    : MySQL
 Target Server Version : 100126
 File Encoding         : 65001

 Date: 13/11/2018 20:09:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_dog` int(10) UNSIGNED NULL DEFAULT NULL,
  `id_product` int(10) UNSIGNED NULL DEFAULT NULL,
  `id_post` int(10) UNSIGNED NULL DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slugs` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `comments_id_dog_foreign`(`id_dog`) USING BTREE,
  INDEX `comments_id_product_foreign`(`id_product`) USING BTREE,
  INDEX `comments_id_user_foreign`(`id_user`) USING BTREE,
  INDEX `comments_id_post_foreign`(`id_post`) USING BTREE,
  CONSTRAINT `comments_id_dog_foreign` FOREIGN KEY (`id_dog`) REFERENCES `dogs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `comments_id_post_foreign` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `comments_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `comments_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 3, NULL, NULL, 2, 'abc', 'abc', '2018-11-10 00:00:00', '2018-11-10 00:00:00');
INSERT INTO `comments` VALUES (2, NULL, 2, NULL, 2, 'ngon', 'ngon', NULL, NULL);
INSERT INTO `comments` VALUES (3, NULL, NULL, 6, 1, 'a', NULL, '2018-11-11 15:00:32', '2018-11-11 15:00:32');
INSERT INTO `comments` VALUES (4, NULL, 1, NULL, 1, 'ok', NULL, '2018-11-11 15:03:06', '2018-11-11 15:03:06');
INSERT INTO `comments` VALUES (5, NULL, NULL, 6, 1, 'câu chuyện cảm động', NULL, '2018-11-13 06:29:09', '2018-11-13 06:29:09');

-- ----------------------------
-- Table structure for detail_orders
-- ----------------------------
DROP TABLE IF EXISTS `detail_orders`;
CREATE TABLE `detail_orders`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NULL DEFAULT NULL,
  `id_dog` int(10) UNSIGNED NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `slugs` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `detail_orders_id_order_foreign`(`id_order`) USING BTREE,
  INDEX `detail_orders_id_product_foreign`(`id_product`) USING BTREE,
  INDEX `detail_orders_id_dog_foreign`(`id_dog`) USING BTREE,
  CONSTRAINT `detail_orders_id_dog_foreign` FOREIGN KEY (`id_dog`) REFERENCES `dogs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `detail_orders_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `detail_orders_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_orders
-- ----------------------------
INSERT INTO `detail_orders` VALUES (1, 1, NULL, 7, 1, 14500000, NULL, '2018-11-12 09:48:43', '2018-11-12 09:48:43', 14500000);
INSERT INTO `detail_orders` VALUES (2, 1, NULL, 8, 1, 10000000, NULL, '2018-11-12 09:48:43', '2018-11-12 09:48:43', 10000000);
INSERT INTO `detail_orders` VALUES (3, 2, NULL, 8, 1, 10000000, NULL, '2018-11-12 09:49:57', '2018-11-12 09:49:57', 10000000);
INSERT INTO `detail_orders` VALUES (4, 2, 2, NULL, 1, 50000, NULL, '2018-11-12 09:49:57', '2018-11-12 09:49:57', 50000);
INSERT INTO `detail_orders` VALUES (5, 3, 1, NULL, 1, 100000, NULL, '2018-11-13 02:01:57', '2018-11-13 02:01:57', 100000);
INSERT INTO `detail_orders` VALUES (6, 4, NULL, 14, 2, 46000000, NULL, '2018-11-13 08:51:44', '2018-11-13 08:51:44', 23000000);

-- ----------------------------
-- Table structure for dog_categories
-- ----------------------------
DROP TABLE IF EXISTS `dog_categories`;
CREATE TABLE `dog_categories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `slugs` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `dog_categories_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dog_categories
-- ----------------------------
INSERT INTO `dog_categories` VALUES (1, 'Husky', 'Đại ngáo', NULL, '2018-10-30 02:12:34', '2018-10-30 02:12:34');
INSERT INTO `dog_categories` VALUES (2, 'Corgi', 'Mông to chân ngắn.', NULL, '2018-11-01 13:41:07', '2018-11-01 13:41:07');
INSERT INTO `dog_categories` VALUES (3, 'Alaska', 'Giống chó đến từ Sibiria và Nga, lông dầy, thuộc giống chó cỡ trung.', NULL, '2018-11-01 13:41:20', '2018-11-01 13:41:20');
INSERT INTO `dog_categories` VALUES (4, 'Puddle', 'lông xoăn, có thể đi hai chân', NULL, '2018-11-01 13:41:40', '2018-11-01 13:41:40');
INSERT INTO `dog_categories` VALUES (5, 'Golden', 'Lông dài vàng óng, rất khôn, nguồn gốc từ Anh quốc.', NULL, '2018-11-12 03:22:04', '2018-11-12 03:22:04');

-- ----------------------------
-- Table structure for dogs
-- ----------------------------
DROP TABLE IF EXISTS `dogs`;
CREATE TABLE `dogs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sale` int(11) NULL DEFAULT 0,
  `birthday` datetime(0) NULL DEFAULT NULL,
  `height` double NULL DEFAULT NULL,
  `weight` double NULL DEFAULT NULL,
  `photos` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slugs` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_dog_cate` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `dogs_id_dog_cate_foreign`(`id_dog_cate`) USING BTREE,
  CONSTRAINT `dogs_id_dog_cate_foreign` FOREIGN KEY (`id_dog_cate`) REFERENCES `dog_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dogs
-- ----------------------------
INSERT INTO `dogs` VALUES (3, 'Misthy', 15000000, NULL, NULL, '2018-06-24 00:00:00', 50, 25, '[\"1t\\u1ea3i xu\\u1ed1ng (1).jpg\"]', NULL, 2, '2018-11-01 13:45:25', '2018-11-05 03:19:42');
INSERT INTO `dogs` VALUES (4, 'Minhluie', 10000000, NULL, 0, NULL, 43, 14, '[\"1cho-alaska-malamute.jpg\"]', NULL, 3, '2018-11-01 13:45:50', '2018-11-13 08:23:49');
INSERT INTO `dogs` VALUES (5, 'Poodle Miny', 6000000, 'Lông xù đáng yêu, có thể đi hai chân.', 0, NULL, 35, 10, '[\"1t\\u1ea3i xu\\u1ed1ng.jpg\"]', NULL, 4, '2018-11-01 13:46:27', '2018-11-13 08:59:21');
INSERT INTO `dogs` VALUES (6, 'abc', 1200000, NULL, NULL, NULL, 12, 12, '[\"1Pembroke-Welsh-Corgi-On-White-01.jpg\",\"2t\\u1ea3i xu\\u1ed1ng.jpg\"]', NULL, 4, '2018-11-01 14:40:02', '2018-11-01 14:40:02');
INSERT INTO `dogs` VALUES (7, 'Mistan', 15000000, NULL, 14500000, NULL, 35, 25, '[\"120160905-015836-22_600x600.jpg\"]', NULL, 1, '2018-11-03 14:29:39', '2018-11-06 02:19:53');
INSERT INTO `dogs` VALUES (8, 'Minh', 10000000, NULL, NULL, NULL, 24, 9, '[\"1images.jpg\"]', NULL, 1, '2018-11-03 14:33:09', '2018-11-06 02:20:36');
INSERT INTO `dogs` VALUES (13, 'nilo', 14000000, NULL, 13500000, '2018-09-03 00:00:00', 15, 7, '[\"1corgi2.jpg\"]', NULL, 2, '2018-11-06 02:18:28', '2018-11-06 02:18:28');
INSERT INTO `dogs` VALUES (14, 'alini', 12000000, NULL, 11500000, '2018-09-30 00:00:00', 15, 5, '[\"1Pembroke_Welsh_Corgi_SERP.jpg\"]', NULL, 2, '2018-11-06 02:19:12', '2018-11-06 02:19:12');
INSERT INTO `dogs` VALUES (16, 'Lious', 14500000, NULL, 14000000, '2018-06-24 00:00:00', 20, 10, '[\"1Pembroke-Welsh-Corgi-On-White-03.jpg\"]', NULL, 2, '2018-11-06 09:34:41', '2018-11-06 09:34:41');
INSERT INTO `dogs` VALUES (20, 'husky-suny', 10400000, NULL, 9600000, '2018-08-05 00:00:00', 15, 10, '[\"1in2.jpg\"]', NULL, 1, '2018-11-10 16:45:39', '2018-11-12 03:31:09');
INSERT INTO `dogs` VALUES (21, 'Alaska thuan chung', 11000000, 'Thuần chủng', 10500000, '2018-07-31 00:00:00', 20, 7, '[\"1cho-alaska-giant-cho-tot.jpg\"]', NULL, 3, '2018-11-12 03:23:43', '2018-11-12 03:23:43');
INSERT INTO `dogs` VALUES (22, 'Golden-junior', 12000000, NULL, 11000000, '2018-07-29 00:00:00', 24, 10, '[\"1in9.jpg\"]', NULL, 5, '2018-11-12 03:26:05', '2018-11-12 03:29:29');
INSERT INTO `dogs` VALUES (23, 'Corgi-min', 16000000, NULL, 15000000, '2018-06-24 00:00:00', 24, 9.5, '[\"1dog_blog_02-370x250.jpg\"]', NULL, 2, '2018-11-12 03:28:01', '2018-11-12 03:28:01');
INSERT INTO `dogs` VALUES (24, 'Corgi-cute', 16700000, NULL, 16000000, '2018-06-24 00:00:00', 20, 11, '[\"1pet_store_dog_20.jpg\"]', NULL, 2, '2018-11-12 05:42:05', '2018-11-12 05:42:05');
INSERT INTO `dogs` VALUES (25, 'Minh tu ti', 12000000, NULL, NULL, '2018-02-25 00:00:00', 30, 12, '[\"16.jpg\"]', NULL, 1, '2018-11-13 05:45:44', '2018-11-13 05:45:44');
INSERT INTO `dogs` VALUES (26, 'âsasas', 12200000, NULL, 0, '2018-06-24 00:00:00', 40, 24, '[\"1in4.jpg\"]', NULL, 3, '2018-11-13 08:21:48', '2018-11-13 08:21:48');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_10_07_135120_create_dog_categories_table', 1);
INSERT INTO `migrations` VALUES (4, '2018_10_07_135154_create_dogs_table', 1);
INSERT INTO `migrations` VALUES (5, '2018_10_07_135630_create_product_categories_table', 1);
INSERT INTO `migrations` VALUES (6, '2018_10_07_135657_create_products_table', 1);
INSERT INTO `migrations` VALUES (7, '2018_10_07_135806_create_orders_table', 1);
INSERT INTO `migrations` VALUES (8, '2018_10_07_135823_create_detail_orders_table', 1);
INSERT INTO `migrations` VALUES (9, '2018_10_07_150750_create_roles_table', 1);
INSERT INTO `migrations` VALUES (10, '2018_10_07_160123_add_foreign_key_role_to_users_table', 1);
INSERT INTO `migrations` VALUES (11, '2018_10_24_150450_create_posts_table', 1);
INSERT INTO `migrations` VALUES (12, '2018_10_24_151418_create_comments_table', 1);
INSERT INTO `migrations` VALUES (13, '2018_11_04_144609_add_sale_to_products_table', 2);
INSERT INTO `migrations` VALUES (14, '2018_11_05_095243_create_site_config_table', 3);
INSERT INTO `migrations` VALUES (15, '2018_11_07_101245_add_status_to_orders_table', 4);
INSERT INTO `migrations` VALUES (16, '2018_11_07_101710_add_status_to_orders_table', 5);
INSERT INTO `migrations` VALUES (17, '2018_11_10_162817_add_shipping_to_orders_table', 6);
INSERT INTO `migrations` VALUES (18, '2018_11_12_091601_add_name_to_orders_table', 7);
INSERT INTO `migrations` VALUES (19, '2018_11_12_092359_add_price_to_detail_orders_table', 7);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date` datetime(0) NOT NULL,
  `total` bigint(20) NOT NULL,
  `slugs` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT 1,
  `shipping` bigint(20) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `orders_id_user_foreign`(`id_user`) USING BTREE,
  CONSTRAINT `orders_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 'Ha Noi', '0396136933', NULL, '2018-11-12 00:00:00', 24500001, NULL, 1, '2018-11-12 09:48:43', '2018-11-12 14:38:24', 2, 1, 'admin');
INSERT INTO `orders` VALUES (2, 'Ha Noi', '0396136933', NULL, '2018-11-12 00:00:00', 10050001, NULL, 1, '2018-11-12 09:49:57', '2018-11-13 01:39:51', 2, 1, 'admin');
INSERT INTO `orders` VALUES (3, 'Ha Noi', 'a', NULL, '2018-11-13 00:00:00', 100001, NULL, 1, '2018-11-13 02:01:57', '2018-11-13 03:09:41', 2, 1, 'admin');
INSERT INTO `orders` VALUES (4, 'Ha Noi', '0396136933', NULL, '2018-11-13 00:00:00', 23000001, NULL, 1, '2018-11-13 08:51:44', '2018-11-13 08:51:44', 1, 2, 'admin');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `hot` int(11) NOT NULL DEFAULT 1,
  `source` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `author` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slugs` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (6, 'Câu chuyện chú chó trung thành Hachiko đứng sân ga 10 năm đợi chủ', '[\"1dog_blog_04-1170x600.jpg\"]', 'Câu chuyện cảm động về chú chó hơn 9 năm đợi người chủ quá cố ở sân ga rồi ra đi trong niềm tiếc thương của cả nước Nhật', 1, 1, 'http://kenh14.vn/', NULL, '<h2>C&acirc;u chuyện về Hachiko đ&atilde; kh&ocirc;ng c&ograve;n qu&aacute; mới mẻ, thế nhưng dường như mỗi lần được kể lại - đặc biệt l&agrave; trong năm con Ch&oacute; n&agrave;y, n&oacute; vẫn khiến người ta x&uacute;c động v&agrave; kh&acirc;m phục l&ograve;ng trung th&agrave;nh của ch&uacute; ch&oacute; Akita b&eacute; nhỏ n&agrave;y. &quot;Khuyển m&atilde; ch&iacute; t&igrave;nh&quot; - c&acirc;u n&oacute;i n&agrave;y dường như c&oacute; một nửa l&agrave; để n&oacute;i về Hachiko.</h2>\r\n\r\n<p>Chắc hẳn trong số ch&uacute;ng ta kh&ocirc;ng ai c&ograve;n lạ g&igrave; Hachiko - ch&uacute;&nbsp;<a href=\"http://kenh14.vn/cho.html\" target=\"_blank\">ch&oacute;</a>&nbsp;đ&atilde; trở th&agrave;nh biểu tượng của những ch&uacute; ch&oacute; kh&aacute;c, linh vật của&nbsp;<a href=\"http://kenh14.vn/nhat-ban.html\" target=\"_blank\">Nhật Bản</a>&nbsp;đại diện cho sự nhớ thương v&agrave; trung th&agrave;nh của lo&agrave;i động vật n&agrave;y đối với con người - những người bạn th&acirc;n nhất của ch&uacute;ng. Nh&acirc;n dịp năm mới - năm của Ch&oacute;, c&oacute; lẽ ai trong số ch&uacute;ng ta cũng sẽ muốn một lần đọc lại c&acirc;u chuyện về ch&uacute; ch&oacute; n&agrave;y.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2018/2/14/photo-1-1518547328451477289918.jpg\" target=\"_blank\"><img alt=\"Câu chuyện cảm động về chú chó hơn 9 năm đợi người chủ quá cố ở sân ga rồi ra đi trong niềm tiếc thương của cả nước Nhật - Ảnh 1.\" src=\"https://kenh14cdn.com/2018/2/14/photo-1-1518547328451477289918.jpg\" /></a></p>\r\n\r\n<p>Hachiko - ch&uacute; khuyển ch&iacute; t&igrave;nh đ&atilde; đi v&agrave;o lịch sử Nhật Bản.</p>\r\n\r\n<p>Khi mới ra đời v&agrave;o th&aacute;ng 11/1923, ch&uacute; ch&oacute; thuộc giống Akita thuần Nhật cổ n&agrave;y c&oacute; t&ecirc;n l&agrave; Hachi. Hachi được đ&oacute;ng v&agrave;o th&ugrave;ng gỗ v&agrave; gửi t&agrave;u hỏa về miền Nam cho &ocirc;ng chủ mới - gi&aacute;o sư Hidesaburo Ueno, giảng dạy tại trường Đại học Tokyo danh tiếng.V&igrave; nhiều l&yacute; do m&agrave; gi&aacute;o sư Ueno chọn cuộc sống độc th&acirc;n, &ocirc;ng d&agrave;nh hầu hết thời gian rảnh rỗi của m&igrave;nh để dạy dỗ v&agrave; chuyện tr&ograve; với ch&uacute; ch&oacute; Akita Hachi.&nbsp;</p>\r\n\r\n<p>Ch&oacute; l&agrave; lo&agrave;i vật phản ảnh r&otilde; r&agrave;ng nhất sự chăm s&oacute;c của chủ nh&acirc;n. Được gi&aacute;o sư Ueno nu&ocirc;i dưỡng cẩn thận, Hachi nhanh ch&oacute;ng lớn bổng, phổng phao v&agrave; c&oacute; phần to b&eacute;o hơn hẳn so với những ch&uacute; ch&oacute; Akita kh&aacute;c. Đ&ocirc;i bạn một gi&agrave;, một ch&oacute; n&agrave;y thường xuy&ecirc;n s&aacute;nh bước tản bộ c&ugrave;ng nhau tr&ecirc;n con đường ra ga t&agrave;u Shibuya ở gần nh&agrave;; ch&uacute; ch&oacute; Hachi thậm ch&iacute; c&ograve;n chờ đợi cho chủ nh&acirc;n l&ecirc;n t&agrave;u rồi moi về; v&agrave; cứ 3 giờ chiều h&agrave;ng ng&agrave;y, khi t&agrave;u cập bến, Hachi kh&ocirc;ng ngoan đ&atilde; đứng sẵn ở đ&oacute; để đ&oacute;n chủ nh&acirc;n, d&ugrave; cho nắng mưa trưa h&egrave; hay tuyết rơi ngập s&acirc;n.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2018/2/14/photo-1-1518547365292159131817.jpg\" target=\"_blank\"><img alt=\"Câu chuyện cảm động về chú chó hơn 9 năm đợi người chủ quá cố ở sân ga rồi ra đi trong niềm tiếc thương của cả nước Nhật - Ảnh 2.\" src=\"https://kenh14cdn.com/2018/2/14/photo-1-1518547365292159131817.jpg\" /></a></p>\r\n\r\n<p>Đều đặn, việc đ&oacute;n chủ đ&atilde; trở th&agrave;nh nếp sinh hoạt kh&ocirc;ng thể thiếu của Hachi nhỏ b&eacute;.</p>\r\n\r\n<p>Những ng&agrave;y vui vẻ cứ thế k&eacute;o d&agrave;i cho tới một ng&agrave;y nọ, ch&iacute;nh x&aacute;c l&agrave; ng&agrave;y 21/5/1925 định mệnh. Tai họa ập đến khi gi&aacute;o sư Ueno bất ngờ đột quỵ do xuất huyết n&atilde;o khi ngay tr&ecirc;n giảng đường. Thế nhưng Hachi n&agrave;o c&oacute; biết điều đ&oacute;? Ch&uacute; ch&oacute; vẫn vui vẻ chạy ra ga đ&oacute;n chủ, đợi m&atilde;i, đợi m&atilde;i m&agrave; chủ kh&ocirc;ng về. Ng&agrave;y lại ng&agrave;y, Hachi vẫn giữ nguy&ecirc;n th&oacute;i quen chờ đ&oacute;n &ocirc;ng chủ của m&igrave;nh, v&agrave; cứ thế, kh&ocirc;ng quản nắng mưa, Hachi kh&ocirc;ng vắng mặt một ng&agrave;y n&agrave;o tr&ecirc;n s&acirc;n ga Shibuya để chờ đ&oacute;n &ocirc;ng Ueno trong suốt 9 năm, 9 th&aacute;ng v&agrave; 15 ng&agrave;y.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2018/2/14/photo-1-15185474085601349657395.jpg\" target=\"_blank\"><img alt=\"Câu chuyện cảm động về chú chó hơn 9 năm đợi người chủ quá cố ở sân ga rồi ra đi trong niềm tiếc thương của cả nước Nhật - Ảnh 3.\" src=\"https://kenh14cdn.com/2018/2/14/photo-1-15185474085601349657395.jpg\" /></a></p>\r\n\r\n<p>Trong suốt gần 10 năm tiếp theo của cuộc đời m&igrave;nh, Hachiko vẫn kh&ocirc;ng từ bỏ th&oacute;i quen ng&oacute;ng chờ chủ nh&acirc;n ở s&acirc;n ga Shibuya.</p>\r\n\r\n<p>Năm 1932, sau khi Hachi đợi chủ nh&acirc;n được 7 năm, 1 sinh vi&ecirc;n của gi&aacute;o sư Ueno đ&atilde; viết 1 b&agrave;i b&aacute;o kể về c&acirc;u chuyện cảm động n&agrave;y v&agrave; gửi đăng tr&ecirc;n trang nhất tờ Tokyo Asahi. Ngay lập tức c&oacute; rất nhiều người quan t&acirc;m lo lắng cho ch&uacute; ch&oacute; trung th&agrave;nh n&agrave;y. T&ecirc;n của Hachi được đổi th&agrave;nh Hachiko - c&oacute; nghĩa tr&igrave;u mến v&agrave; &acirc;u yếm; cũng từ Hachiko m&agrave; người Nhật th&ecirc;m v&agrave;o từ điển từ mới &quot;chukhen&quot; &ndash; ch&uacute; ch&oacute; nhỏ trung th&agrave;nh. Thậm ch&iacute;, ho&agrave;ng hậu Nhật Bản cũng đ&atilde; d&agrave;nh tặng những lời khen cho Hachi; đồng thời những nh&acirc;n vi&ecirc;n nh&agrave; ga cũng dọn sẵn cho Hachi một ổ l&oacute;t l&ocirc;ng trong ph&ograve;ng trực để ch&uacute; ch&oacute; t&aacute; t&uacute;c qua những ng&agrave;y mưa nắng.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2018/2/14/photo-1-1518547473499469881619.jpg\" target=\"_blank\"><img alt=\"Câu chuyện cảm động về chú chó hơn 9 năm đợi người chủ quá cố ở sân ga rồi ra đi trong niềm tiếc thương của cả nước Nhật - Ảnh 4.\" src=\"https://kenh14cdn.com/2018/2/14/photo-1-1518547473499469881619.jpg\" /></a></p>\r\n\r\n<p>C&acirc;u chuyện về Hachiko c&oacute; một sức lan tỏa mạnh mẽ, tới mức nhiều người d&acirc;n Tokyo đ&atilde; mặc nhi&ecirc;n coi việc chăm s&oacute;c ch&uacute; ch&oacute; nhỏ n&agrave;y trở th&agrave;nh một phần tr&aacute;ch nhiệm của m&igrave;nh.</p>\r\n\r\n<p>Thời gian dần tr&ocirc;i qua, nhiều ng&agrave;y, nhiều th&aacute;ng rồi nhiều năm, Hachiko vẫn c&oacute; mặt đều đặn ở nh&agrave; ga v&agrave;o l&uacute;c 3h chiều, mặc d&ugrave; n&oacute; đ&atilde; bị bệnh vi&ecirc;m khớp v&agrave; đ&atilde; qu&aacute; gi&agrave; yếu. Cuối c&ugrave;ng v&agrave;o ng&agrave;y 8 th&aacute;ng 3 năm 1935, gần 11 năm kể từ ng&agrave;y n&oacute; nh&igrave;n thấy chủ nh&acirc;n lần cuối c&ugrave;ng, người ta t&igrave;m thấy Hachiko - l&uacute;c đ&oacute; đ&atilde; 12 tuổi -nằm gục chết tại ch&iacute;nh c&aacute;i nơi m&agrave; n&oacute; đ&atilde; đứng đợi chủ nh&acirc;n của m&igrave;nh trong suốt nhiều năm. Người ta c&ograve;n đồn rằng, đ&acirc;y l&agrave; con phố trước đ&acirc;y Hachiko chưa từng qua, nhưng x&aacute;c của ch&uacute; lại t&igrave;nh cờ chỉ về hướng mộ gi&aacute;o sư Ueno. Qua đời khi đ&atilde; 12 năm tuổi, khoảng thời gian chờ đợi trong suốt 1 thập kỷ đ&atilde; chiếm trọn cuộc đời Hachiko.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2018/2/14/photo-1-1518547609064898725892.jpg\" target=\"_blank\"><img alt=\"Câu chuyện cảm động về chú chó hơn 9 năm đợi người chủ quá cố ở sân ga rồi ra đi trong niềm tiếc thương của cả nước Nhật - Ảnh 5.\" src=\"https://kenh14cdn.com/2018/2/14/photo-1-1518547609064898725892.jpg\" /></a></p>\r\n\r\n<p>V&agrave;o ng&agrave;y cuối đời, Hachiko vẫn thương tiếc &ocirc;ng chủ tới kh&ocirc;n c&ugrave;ng. Thế nhưng khi ra đi, Hachiko kh&ocirc;ng hề c&ocirc; đơn, khi gần như cả nước Nhật d&otilde;i theo bước ch&acirc;n li&ecirc;n thi&ecirc;n đ&agrave;ng của ch&uacute;.</p>\r\n\r\n<p>C&aacute;i chết của Hachiko được đăng l&ecirc;n trang nhất của rất nhiều tờ b&aacute;o l&uacute;c bấy giờ v&agrave; người ta đ&atilde; d&agrave;nh hẳn một ng&agrave;y để để tang Hachiko. Từ số tiền đ&oacute;ng g&oacute;p của d&acirc;n ch&uacute;ng trong cả nước, người d&acirc;n đ&atilde; thu&ecirc; nh&agrave; đi&ecirc;u khắc Ando Teru để l&agrave;m một bức tượng Hachiko bằng đồng. Khi bức tượng được ho&agrave;n th&agrave;nh v&agrave; được đặt trang trọng ở b&ecirc;n trong s&acirc;n ga, tại ch&iacute;nh vị tr&iacute; n&oacute; đ&atilde; đứng đợi chủ nh&acirc;n trong gần 10 năm.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, v&agrave;i năm sau đ&oacute;, Nhật Bản l&acirc;m v&agrave;o chiến tranh, tất cả những thứ g&igrave; l&agrave; kim loại đều bị lấy đi để l&agrave;m vũ kh&iacute;, kh&ocirc;ng ngoại trừ bức tượng Hachiko. Sau khi chiến tranh kết th&uacute;c, v&agrave;o năm 1948, Hachiko lại một lần nữa được tạc một bức tượng mới. Bức tượng đ&oacute; được đặt ở ga Shibuya cho đến tận ng&agrave;y h&ocirc;m nay.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/2018/2/14/photo-1-1518547674939201360838.jpg\" target=\"_blank\"><img alt=\"Câu chuyện cảm động về chú chó hơn 9 năm đợi người chủ quá cố ở sân ga rồi ra đi trong niềm tiếc thương của cả nước Nhật - Ảnh 6.\" src=\"https://kenh14cdn.com/2018/2/14/photo-1-1518547674939201360838.jpg\" /></a></p>\r\n\r\n<p>Bức tượng đồng đ&uacute;c h&igrave;nh của Hachiko trước cửa ga Shibuya vẫn c&ograve;n ở nguy&ecirc;n đ&oacute; cho tới tận ng&agrave;y nay.</p>\r\n\r\n<p>&nbsp;Đ&oacute; l&agrave; c&acirc;u chuyện của rất nhiều năm về trước, vậy m&agrave; giờ đ&acirc;y, h&igrave;nh ảnh ch&uacute; ch&oacute; trung th&agrave;nh tại quận Nagano, Nhật Bản lại l&agrave;m dấy l&ecirc;n biết bao x&uacute;c cảm trong l&ograve;ng người d&acirc;n Nhật Bản. B&aacute;o ch&iacute; li&ecirc;n tục đăng tải nhiều t&aacute;c phẩm thơ ca nhạc họa về ch&uacute; ch&oacute; trung th&agrave;nh Hachiko. C&aacute;c cửa hiệu gần ga cũng nhanh nhạy cho ra nhiều mặt h&agrave;ng mới như tem thư Hachiko, b&uacute;p b&ecirc; Hachiko... C&aacute;c gi&aacute;o vi&ecirc;n coi Hachiko như tấm gương s&aacute;ng về l&ograve;ng trung th&agrave;nh cho học tr&ograve; noi theo, c&aacute;c nghệ sĩ nổi tiếng cũng bắt đầu t&aacute;n dương ch&uacute;. Cả nước dấy l&ecirc;n phong tr&agrave;o ph&aacute;t triển giống ch&oacute; Akita, những mong gia đ&igrave;nh m&igrave;nh sẽ nu&ocirc;i được một ch&uacute; ch&oacute; trung th&agrave;nh như vậy.</p>', 'hoa-dep', '2018-10-30 01:43:50', '2018-11-12 03:41:58');
INSERT INTO `posts` VALUES (9, 'trần thị xuân', '[\"15fad493630d9d08789c8.jpg\"]', 'hiền thối', 1, 1, NULL, NULL, '<p>h&igrave;n h&igrave;n h&igrave;n</p>', 'tran-thi-xuan', '2018-10-30 09:28:28', '2018-11-12 14:32:06');
INSERT INTO `posts` VALUES (10, 'Câu chuyện chú chó trung thành Hachiko đứng sân ga 10 năm đợi chủ', '[\"133642778_795262924003062_8219637209116966912_n.jpg\"]', 'apodwjds', 1, 2, NULL, NULL, '<p>sjduisjkc</p>', 'cau-chuyen-chu-cho-trung-thanh-hachiko-dung-san-ga-10-nam-doi-chu', '2018-10-30 09:36:45', '2018-11-07 09:38:55');
INSERT INTO `posts` VALUES (11, 'Những hình ảnh cười ra nước mắt của lũ \'ngáo\' Husky', '[\"133642778_795262924003062_8219637209116966912_n.jpg\"]', 'Sở hữu một chú chó Husky sẽ đưa bạn từ bất ngờ này đến bất ngờ khác. Người dùng Internet đã chia sẻ những hình ảnh về chú Husky ngổ ngáo của mình.', 1, 1, NULL, NULL, '<p><em><strong>Kh&ocirc;ng cần đồng hồ b&aacute;o thức v&igrave; đ&atilde; c&oacute; Husky.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/2_259977.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/2_259977.jpg\" /></a></p>\r\n\r\n<p><em><strong>Đừng h&ograve;ng giấu ch&uacute;ng điều g&igrave;.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/3_286002.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/3_286002.jpg\" /></a></p>\r\n\r\n<p><em><strong>Ch&uacute;ng sẽ chiếm mọi thời gian...</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/2018/08/13/351/27269596/4_10469931.gif\"><img src=\"https://photo-2-baomoi.zadn.vn/2018/08/13/351/27269596/4_10469931.gif\" /></a></p>\r\n\r\n<p><em><strong>...v&agrave; cả kh&ocirc;ng gian của bạn.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/5_139597.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/5_139597.jpg\" /></a></p>\r\n\r\n<p><em><strong>Bạn phải xem ch&uacute;ng l&agrave; duy nhất...</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/2018/08/13/351/27269596/6_10169813.gif\"><img src=\"https://photo-2-baomoi.zadn.vn/2018/08/13/351/27269596/6_10169813.gif\" /></a></p>\r\n\r\n<p><em><strong>...nếu kh&ocirc;ng ch&uacute;ng sẽ l&agrave;m những tr&ograve; đi&ecirc;n rồ thế n&agrave;y đ&acirc;y.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/7_248664.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/7_248664.jpg\" /></a></p>\r\n\r\n<p><strong><em>Tỏ th&aacute;i độ mọi l&uacute;c.</em></strong></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/2018/08/13/351/27269596/8_2093064.gif\"><img src=\"https://photo-2-baomoi.zadn.vn/2018/08/13/351/27269596/8_2093064.gif\" /></a></p>\r\n\r\n<p><em><strong>V&agrave; l&agrave;m bất cứ điều g&igrave; m&igrave;nh th&iacute;ch.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/9_286414.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/9_286414.jpg\" /></a></p>\r\n\r\n<p><em><strong>Nhưng đ&ocirc;i khi cũng rất đ&aacute;ng y&ecirc;u.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/10_142502.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/10_142502.jpg\" /></a></p>\r\n\r\n<p><em><strong>Hay l&agrave;m những tr&ograve; ngố.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/11_214841.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/11_214841.jpg\" /></a></p>\r\n\r\n<p><em><strong>D&ugrave; rất cố gắng nhưng cũng kh&ocirc;ng thể bỏ được vẻ mặt kh&oacute; ưa.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/12_321015.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/12_321015.jpg\" /></a></p>\r\n\r\n<p><em><strong>Nhưng đ&atilde; nu&ocirc;i rồi th&igrave; chỉ muốn c&oacute; th&ecirc;m nhiều nhiều con ng&aacute;o nữa.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/13_174293.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/13_174293.jpg\" /></a></p>\r\n\r\n<p><em><strong>Chỉ chực chờ chạy trốn.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/14_280421.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/14_280421.jpg\" /></a></p>\r\n\r\n<p><em><strong>Lu&ocirc;n cho bạn nhiều bất ngờ.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/15_164404.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/15_164404.jpg\" /></a></p>\r\n\r\n<p><em><strong>&quot;Đ&egrave; đầu cưỡi cổ&quot; đồng loại.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/16_126835.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/16_126835.jpg\" /></a></p>\r\n\r\n<p><em><strong>Như thế n&agrave;y...</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/17_247896.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/17_247896.jpg\" /></a></p>\r\n\r\n<p><em><strong>Hay thế n&agrave;y.</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/18_261149.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/18_261149.jpg\" /></a></p>\r\n\r\n<p><em><strong>Bạn sẽ phải chia sẻ thức ăn...</strong></em></p>\r\n\r\n<p><a href=\"https://photo-2-baomoi.zadn.vn/w1000_r1/2018/08/13/351/27269596/19_222015.jpg\"><img src=\"https://photo-2-baomoi.zadn.vn/w700_r1/2018/08/13/351/27269596/19_222015.jpg\" /></a></p>\r\n\r\n<p><strong><em>...v&agrave; cả nước uống.</em></strong></p>', 'nhung-hinh-anh-cuoi-ra-nuoc-mat-cua-lu-ngao-husky', '2018-11-02 02:23:57', '2018-11-08 09:11:05');
INSERT INTO `posts` VALUES (13, 'chu thuy hien', '[\"145586089_252753058702489_3561215482583318528_n.jpg\"]', 'adsd', 1, 1, NULL, NULL, '<p>sdsdfssf</p>', 'chu-thuy-hien', '2018-11-08 15:39:59', '2018-11-11 06:33:43');
INSERT INTO `posts` VALUES (15, 'demo', '[\"143065929_1889975607976758_6310285772280823808_n.jpg\"]', 'demolsi', 1, 2, NULL, NULL, '<p>demo</p>', 'demo', '2018-11-10 15:38:29', '2018-11-10 15:39:26');
INSERT INTO `posts` VALUES (16, 'demo lan 2', '[\"140547597_668037683589392_557645131939840000_n.jpg\"]', 'aa', 2, 2, NULL, NULL, '<p>aa</p>', 'demo-lan-2', '2018-11-10 15:41:44', '2018-11-10 15:47:20');
INSERT INTO `posts` VALUES (18, 'About us', '[\"1about.jpg\"]', 'We are the UK’s largest organisation dedicated to protecting and promoting the health and welfare of all dogs.', 1, 1, 'http://7uptheme.com/wordpress/haustiere/flowing-studio-dress-2/', NULL, '<p>Our urban and streetwear fashion place is no Old Navy, Banana Republic or a Walmart clothing store, God forbid. We&rsquo;ve quickly become the Iowa&rsquo;s and Midwest&rsquo;s biggest online retailers. And it&rsquo;s all thanks to our founder&rsquo;s Janine and her store&rsquo;s team great tastes thanks to their remarkable</p>', 'about-us', '2018-11-11 17:35:28', '2018-11-11 17:35:28');

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `slugs` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `product_categories_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES (1, 'Cát', 'dùng cho vệ sinh', NULL, '2018-11-01 03:18:17', '2018-11-12 03:13:18');
INSERT INTO `product_categories` VALUES (2, 'Thức ăn khô', NULL, NULL, '2018-11-01 03:18:25', '2018-11-01 03:18:25');
INSERT INTO `product_categories` VALUES (3, 'Thức ăn ướt', NULL, NULL, '2018-11-12 03:13:06', '2018-11-12 03:13:47');
INSERT INTO `product_categories` VALUES (4, 'Pate', NULL, NULL, '2018-11-12 03:13:56', '2018-11-12 03:13:56');
INSERT INTO `product_categories` VALUES (5, 'Sữa', NULL, NULL, '2018-11-12 03:14:10', '2018-11-12 03:14:10');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `photos` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slugs` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_product_cate` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `sale` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `products_id_product_cate_foreign`(`id_product_cate`) USING BTREE,
  CONSTRAINT `products_id_product_cate_foreign` FOREIGN KEY (`id_product_cate`) REFERENCES `product_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'CÁT VỆ SINH CHO CHÓ MÈO NHẬT BẢN  SUNA', 100000, '2L', '[\"11541992704.jpg\"]', NULL, 1, '2018-11-01 03:19:03', '2018-11-13 07:37:29', 95000);
INSERT INTO `products` VALUES (2, 'Royal Canin Junior', 50000, '1kg', '[\"11541992761.jpg\"]', NULL, 2, '2018-11-01 03:19:36', '2018-11-12 03:19:21', NULL);
INSERT INTO `products` VALUES (4, 'Pate Mini Pháp', 40000, NULL, '[\"11541992671.jpg\"]', NULL, 4, '2018-11-12 03:17:51', '2018-11-12 03:17:51', NULL);
INSERT INTO `products` VALUES (5, 'Pedigree Puppy chicken 150g', 15000, NULL, '[\"11541992841.jpg\"]', NULL, 3, '2018-11-12 03:20:41', '2018-11-12 03:20:41', NULL);
INSERT INTO `products` VALUES (6, 'Sunpet', 50000, NULL, '[\"11542096521.jpg\"]', NULL, 1, '2018-11-13 08:08:41', '2018-11-13 08:08:41', NULL);
INSERT INTO `products` VALUES (7, 'me-o', 85000, 'Được làm từ Sodium Bentonite có khả năng hút hẩm và hút mùi hôi.', '[\"11542096643.jpg\"]', NULL, 1, '2018-11-13 08:10:43', '2018-11-13 08:10:43', 75000);
INSERT INTO `products` VALUES (8, 'asas', 100000, 'aa', '[\"11542097798.jpg\"]', NULL, 1, '2018-11-13 08:29:58', '2018-11-13 08:30:44', 0);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slugs` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'This is admin.', NULL, '2018-10-29 02:59:21', '2018-10-29 02:59:21');
INSERT INTO `roles` VALUES (2, 'user', 'This is user.', NULL, '2018-10-29 02:59:21', '2018-10-29 02:59:21');

-- ----------------------------
-- Table structure for site_config
-- ----------------------------
DROP TABLE IF EXISTS `site_config`;
CREATE TABLE `site_config`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of site_config
-- ----------------------------
INSERT INTO `site_config` VALUES (10, 0, 'site_mail', 'pets-shop@gmail.com', '2018-11-05 14:35:43', '2018-11-05 14:35:43');
INSERT INTO `site_config` VALUES (12, 0, 'site_phone', '0971006294', '2018-11-07 07:17:54', '2018-11-07 07:17:54');
INSERT INTO `site_config` VALUES (13, 0, 'site_address', '45 Võ Chí Công', '2018-11-07 07:17:54', '2018-11-07 07:17:54');
INSERT INTO `site_config` VALUES (14, 0, 'site_name', 'Pets shop', '2018-11-08 09:20:41', '2018-11-08 09:20:41');
INSERT INTO `site_config` VALUES (15, 0, 'site_icon', 'aaaa', '2018-11-08 09:21:47', '2018-11-08 09:21:47');
INSERT INTO `site_config` VALUES (19, 0, 'site_facebook', 'https://www.facebook.com/lienn.lienn', '2018-11-12 03:05:10', '2018-11-12 03:05:10');
INSERT INTO `site_config` VALUES (20, 0, 'site_gmail', 'https://mail.google.com/mail/u/0/', '2018-11-12 03:05:37', '2018-11-12 03:05:37');
INSERT INTO `site_config` VALUES (21, 0, 'site_twitter', 'https://twitter.com/i/notifications', '2018-11-12 03:06:27', '2018-11-12 03:06:27');
INSERT INTO `site_config` VALUES (22, 0, 'site_instagram', 'https://www.instagram.com/', '2018-11-12 03:06:52', '2018-11-12 03:06:52');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `slugs` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_role` int(10) UNSIGNED NOT NULL DEFAULT 2,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_id_role_foreign`(`id_role`) USING BTREE,
  CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@gmail.com', NULL, '$2y$10$xqloGhiLctNjYPHU2XTUBex6gbEGm6lYeSG2AvoS3rkaRrnlSE/QG', 'Ha Noi', '0396136933', NULL, NULL, NULL, 1, 'Xp4cEtkx08uk0zHL0kiZfIXllKGWypM17txK5Vx9ZBVtzGM70yO0f77wk4ZF', '2018-10-29 02:59:22', '2018-10-29 02:59:22');
INSERT INTO `users` VALUES (2, 'Hoàng Thị Liên', 'hoanglien1201@gmail.com', NULL, '$2y$10$7w1THHcFarToZaQHFPXuB.bo315vL6YsxoZ1aakynu7d0FpgaEgUq', 'Đào Nguyên, An Thượng, Hoài Đức, Hà Nội', '0971006294', NULL, NULL, NULL, 2, 'rQPCVHC7SNqK6lZ4nIOVG6SLRVomJXZydvsLQNFY0RNDMhOxu0aj9lSyTrL9', '2018-11-04 16:04:30', '2018-11-04 16:04:30');

SET FOREIGN_KEY_CHECKS = 1;
