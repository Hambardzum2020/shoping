/*
 Navicat Premium Data Transfer

 Source Server         : Ham
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : shopingdb

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 02/03/2020 23:12:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `product_id`(`product_id`) USING BTREE,
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES (31, 21, 8);
INSERT INTO `cart` VALUES (32, 22, 9);
INSERT INTO `cart` VALUES (33, 22, 8);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (8, 'Jeans', '150.000', 'images/1583146710images.jpg');
INSERT INTO `products` VALUES (9, 'Jeans', '25.00', 'images/1583146921images (1).jpg');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (21, 'Franklin', 'franklin@mail.ru', '$2y$10$aEKXhgMy/JCafGQplkTLF.bTJHD9J6datehwYeLbThp9bdzEvy.Ei');
INSERT INTO `users` VALUES (22, 'Jacob', 'j@mail.ru', '$2y$10$vQaG.9tofIHr8VdiUWEmwu7OTJ6N3hLj6A99JMAV7XLO178KWLDcu');

-- ----------------------------
-- Table structure for workers
-- ----------------------------
DROP TABLE IF EXISTS `workers`;
CREATE TABLE `workers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `salary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `specialist` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of workers
-- ----------------------------
INSERT INTO `workers` VALUES (10, 'AAAAA', 'AAAAAAAAAAA', '150.000', 'Designer', 'workersImg/1583175889images (1).jpg');

SET FOREIGN_KEY_CHECKS = 1;
