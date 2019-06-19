/*
 Navicat Premium Data Transfer

 Source Server         : MAMP
 Source Server Type    : MySQL
 Source Server Version : 50725
 Source Host           : localhost:8889
 Source Schema         : formula1

 Target Server Type    : MySQL
 Target Server Version : 50725
 File Encoding         : 65001

 Date: 19/06/2019 12:28:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for equipe
-- ----------------------------
DROP TABLE IF EXISTS `equipe`;
CREATE TABLE `equipe`  (
  `codEquip` int(11) NOT NULL AUTO_INCREMENT,
  `codPais` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`codEquip`) USING BTREE,
  INDEX `pais_equipe_fk`(`codPais`) USING BTREE,
  CONSTRAINT `pais_equipe_fk` FOREIGN KEY (`codPais`) REFERENCES `pais` (`codPais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of equipe
-- ----------------------------
BEGIN;
INSERT INTO `equipe` VALUES (1, 1, 'Red Bull'), (2, 3, 'Mercedes');
COMMIT;

-- ----------------------------
-- Table structure for gp
-- ----------------------------
DROP TABLE IF EXISTS `gp`;
CREATE TABLE `gp`  (
  `codGp` int(11) NOT NULL AUTO_INCREMENT,
  `codPais` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`codGp`) USING BTREE,
  INDEX `pais_gp_fk`(`codPais`) USING BTREE,
  CONSTRAINT `pais_gp_fk` FOREIGN KEY (`codPais`) REFERENCES `pais` (`codPais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of gp
-- ----------------------------
BEGIN;
INSERT INTO `gp` VALUES (1, 1, 'GP Bahrein'), (2, 2, 'GP Austrália'), (3, 4, 'GP Monaco'), (4, 3, 'GP Interlagos');
COMMIT;

-- ----------------------------
-- Table structure for pais
-- ----------------------------
DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais`  (
  `codPais` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`codPais`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of pais
-- ----------------------------
BEGIN;
INSERT INTO `pais` VALUES (1, 'Austrália'), (2, 'Bahrain'), (3, 'Brasil'), (4, 'Canadá');
COMMIT;

-- ----------------------------
-- Table structure for piloto
-- ----------------------------
DROP TABLE IF EXISTS `piloto`;
CREATE TABLE `piloto`  (
  `codPiloto` int(11) NOT NULL AUTO_INCREMENT,
  `codEquip` int(11) NOT NULL,
  `codPais` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`codPiloto`, `codEquip`) USING BTREE,
  INDEX `pais_piloto_fk`(`codPais`) USING BTREE,
  INDEX `equipe_piloto_fk`(`codEquip`) USING BTREE,
  CONSTRAINT `equipe_piloto_fk` FOREIGN KEY (`codEquip`) REFERENCES `equipe` (`codEquip`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pais_piloto_fk` FOREIGN KEY (`codPais`) REFERENCES `pais` (`codPais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of piloto
-- ----------------------------
BEGIN;
INSERT INTO `piloto` VALUES (1, 2, 3, 'Felipe Massa'), (2, 1, 3, 'Ayrton Senna'), (3, 1, 1, 'Sergey Sirotkin');
COMMIT;

-- ----------------------------
-- Table structure for pilotogp
-- ----------------------------
DROP TABLE IF EXISTS `pilotogp`;
CREATE TABLE `pilotogp`  (
  `codPiloto` int(11) NOT NULL,
  `codEquip` int(11) NOT NULL,
  `codGp` int(11) NOT NULL,
  `pts` int(11) NOT NULL,
  PRIMARY KEY (`codPiloto`, `codEquip`, `codGp`) USING BTREE,
  INDEX `gp_pilotogp_fk`(`codGp`) USING BTREE,
  CONSTRAINT `gp_pilotogp_fk` FOREIGN KEY (`codGp`) REFERENCES `gp` (`codGp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `piloto_pilotogp_fk` FOREIGN KEY (`codPiloto`, `codEquip`) REFERENCES `piloto` (`codPiloto`, `codEquip`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of pilotogp
-- ----------------------------
BEGIN;
INSERT INTO `pilotogp` VALUES (1, 2, 4, 10), (2, 1, 2, 6), (2, 1, 4, 18), (3, 1, 4, 5);
COMMIT;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `senha` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N'
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci;

-- ----------------------------
-- Records of usuario
-- ----------------------------
BEGIN;
INSERT INTO `usuario` VALUES (1, 'Jeffery', 'jeffery@email.com', 'senh@123', 'N'), (1, 'Leandro', 'leandro@email.com', 'senh@321', 'N'), (2, 'admin', 'admin@admin', 'senh@123', 'S');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
