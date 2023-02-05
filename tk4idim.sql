/*
 Navicat Premium Data Transfer

 Source Server         : my-lepi-service
 Source Server Type    : MySQL
 Source Server Version : 80021
 Source Host           : localhost:3306
 Source Schema         : tk4idim

 Target Server Type    : MySQL
 Target Server Version : 80021
 File Encoding         : 65001

 Date: 06/02/2023 00:17:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `satuan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_pengguna` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (1, 'Kertas HVS', 'asd', 'rim', 1);
INSERT INTO `barang` VALUES (2, 'kertas Polio', '', 'rim', 1);
INSERT INTO `barang` VALUES (3, 'Kertas Koran', '', 'rim', 1);
INSERT INTO `barang` VALUES (4, 'Kertas Pembungkus Makanan', '', 'rim', 1);
INSERT INTO `barang` VALUES (5, 'Baju', '', 'kodi', 1);
INSERT INTO `barang` VALUES (6, 'Celana', '', 'kodi', 1);
INSERT INTO `barang` VALUES (7, 'Rok', '', 'kodi', 1);
INSERT INTO `barang` VALUES (8, 'Sepatu', '', 'kodi', 1);
INSERT INTO `barang` VALUES (9, 'Topi', '', 'kodi', 1);
INSERT INTO `barang` VALUES (10, 'Buku', '', 'lusin', 1);
INSERT INTO `barang` VALUES (11, 'Tas', '', 'lusin', 1);
INSERT INTO `barang` VALUES (12, 'Gelas', '', 'lusin', 1);
INSERT INTO `barang` VALUES (13, 'Piring', '', 'lusin', 1);
INSERT INTO `barang` VALUES (14, 'Ikat Pinggang', '', 'lusin', 1);

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `id_customer` int NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `alamat_customer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `no_hp_customer` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_customer`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES (2, 'Toko Permata Sari', 'Sjadwlijiasd', '087238123891');
INSERT INTO `customer` VALUES (3, 'Toko Jaya', 'Tes alamat jaya', '087282381892');

-- ----------------------------
-- Table structure for hak_akses
-- ----------------------------
DROP TABLE IF EXISTS `hak_akses`;
CREATE TABLE `hak_akses`  (
  `id_akses` int NOT NULL AUTO_INCREMENT,
  `nama_akses` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  PRIMARY KEY (`id_akses`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hak_akses
-- ----------------------------
INSERT INTO `hak_akses` VALUES (1, 'Super Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec mi tellus. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.');
INSERT INTO `hak_akses` VALUES (2, 'General Manager', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec mi tellus. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.');
INSERT INTO `hak_akses` VALUES (3, 'Supervisor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec mi tellus. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.');
INSERT INTO `hak_akses` VALUES (4, 'Account Officer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec mi tellus. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.');
INSERT INTO `hak_akses` VALUES (5, 'Head Store', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec mi tellus. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.');
INSERT INTO `hak_akses` VALUES (6, 'Staff', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec mi tellus. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.');

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `id_pembelian` int NOT NULL AUTO_INCREMENT,
  `jumlah_pembelian` int NULL DEFAULT NULL,
  `harga_beli` double NULL DEFAULT NULL,
  `id_barang` int NULL DEFAULT NULL,
  `id_supplier` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pembelian`) USING BTREE,
  INDEX `id_barang`(`id_barang` ASC) USING BTREE,
  INDEX `id_supplier`(`id_supplier` ASC) USING BTREE,
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES (1, 1000, 30000, 1, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:11');
INSERT INTO `pembelian` VALUES (2, 1000, 30000, 2, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');
INSERT INTO `pembelian` VALUES (3, 1000, 25000, 3, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');
INSERT INTO `pembelian` VALUES (4, 1000, 20000, 4, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');
INSERT INTO `pembelian` VALUES (5, 100, 150000, 5, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');
INSERT INTO `pembelian` VALUES (6, 100, 150000, 6, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');
INSERT INTO `pembelian` VALUES (7, 100, 150000, 7, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');
INSERT INTO `pembelian` VALUES (8, 100, 200000, 8, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');
INSERT INTO `pembelian` VALUES (9, 100, 175000, 9, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');
INSERT INTO `pembelian` VALUES (10, 50, 250000, 10, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');
INSERT INTO `pembelian` VALUES (11, 50, 500000, 11, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');
INSERT INTO `pembelian` VALUES (12, 50, 450000, 12, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');
INSERT INTO `pembelian` VALUES (13, 50, 450000, 13, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');
INSERT INTO `pembelian` VALUES (14, 50, 500000, 14, 5, '2023-02-05 21:35:08', '2023-02-05 21:43:14');

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `id_pengguna` int NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nama_depan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nama_belakang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `id_akses` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`) USING BTREE,
  INDEX `IdAkses`(`id_akses` ASC) USING BTREE,
  CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES (1, 'sadmin', '12345678', 'Super', 'Admin', '081723842834', 'Jl. Raya Kalibata, RT.6/RW.7, Rawajati, Kec. Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12750', 1);
INSERT INTO `pengguna` VALUES (2, 'fikri14', '12345678', 'Fikri', 'Harun', '087716723722', 'Jl. Meruya Ilir Raya 10-107, RT.5/RW.6, Meruya Utara, Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11620', 2);
INSERT INTO `pengguna` VALUES (3, 'budi19', '12345678', 'Budi', 'Rangga', '085672385620', 'Jl. Meruya Selatan 47-77, RT.1/RW.2, Meruya Sel., Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610', 3);
INSERT INTO `pengguna` VALUES (4, 'erick42', '12345678', 'Erick', 'Tono', '081374623938', 'Jl. Boulevard Bar. Raya, RT.18/RW.8, Klp. Gading Bar., Kec. Klp. Gading, Jkt Utara, Daerah Khusus Ibukota Jakarta 14240', 4);
INSERT INTO `pengguna` VALUES (5, 'yudi94', '12345678', 'Yudi', 'Wardhana', '081348277920', 'Jl. Raden Intan Raya, RT.8/RW.14, Klender, Kec. Duren Sawit, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13470', 4);
INSERT INTO `pengguna` VALUES (6, 'firman38', '12345678', 'Firman', 'Adhitama', '087716238424', 'RT.001/RW.002, Pd. Bahar, Kec. Karang Tengah, Kota Tangerang, Banten 15159', 5);
INSERT INTO `pengguna` VALUES (7, 'deri41', '12345678', 'Deri', 'Maman', '089648238472', 'Jl. Kyai Tapa, RT.6/RW.16, Grogol, Kec. Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11440', 5);
INSERT INTO `pengguna` VALUES (8, 'jonathan83', '12345678', 'Jonathan', 'Farel', '085728382189', 'Jl. Pangeran Antasari No.7, RT.6/RW.2, Cipete Sel., Jakarta, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12410', 6);
INSERT INTO `pengguna` VALUES (9, 'iqbal75', '12345678', 'Iqbal', 'Hasan', '081728302930', 'Jl. Lebak Bulus I 18, RT.3/RW.4, Cilandak Bar., Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430', 6);
INSERT INTO `pengguna` VALUES (10, 'romi29', '12345678', 'Romi', 'Ghozali', '087718213923', 'Jl. Raya Daan Mogot, RT.12/RW.13, Cengkareng Tim., Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11730', 6);

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `id_penjualan` int NOT NULL AUTO_INCREMENT,
  `jumlah_penjualan` int NULL DEFAULT NULL,
  `harga_jual` double NULL DEFAULT NULL,
  `id_barang` int NULL DEFAULT NULL,
  `id_customer` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_penjualan`) USING BTREE,
  INDEX `id_barang`(`id_barang` ASC) USING BTREE,
  INDEX `id_pelanggan`(`id_customer` ASC) USING BTREE,
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES (1, 300, 34500, 1, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:11');
INSERT INTO `penjualan` VALUES (2, 600, 34500, 1, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (3, 400, 34500, 2, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (4, 450, 34500, 2, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (5, 100, 34500, 2, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (6, 350, 28750, 3, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (7, 500, 28750, 3, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (8, 250, 23000, 4, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (9, 250, 23000, 4, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (10, 300, 23000, 4, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (11, 41, 172500, 5, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (12, 45, 172500, 5, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (13, 50, 172500, 6, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (14, 25, 172500, 6, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (15, 59, 172500, 7, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (16, 24, 172500, 7, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (17, 50, 230000, 8, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (18, 36, 230000, 8, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (19, 20, 201250, 9, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (20, 40, 201250, 9, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (21, 24, 287500, 10, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (22, 8, 287500, 10, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (23, 10, 287500, 10, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (24, 15, 575000, 11, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (25, 25, 575000, 11, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (26, 12, 517500, 12, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (27, 13, 517500, 12, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (28, 6, 517500, 12, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (29, 20, 517500, 13, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (30, 25, 517500, 13, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (31, 13, 575000, 14, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (32, 23, 575000, 14, 2, '2023-02-05 21:36:13', '2023-02-05 22:12:14');
INSERT INTO `penjualan` VALUES (34, 20, 200000, 7, 2, '2023-02-05 22:28:18', NULL);
INSERT INTO `penjualan` VALUES (35, 20, 20000, 8, 3, '2023-02-05 22:28:29', NULL);
INSERT INTO `penjualan` VALUES (36, 30, 20000, 11, 3, '2023-02-05 22:28:43', NULL);
INSERT INTO `penjualan` VALUES (37, 50, 34500, 1, 3, '2023-02-05 22:50:07', NULL);
INSERT INTO `penjualan` VALUES (38, 25, 42000, 1, 2, '2023-02-05 22:50:32', '2023-02-05 22:59:09');

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `id_supplier` int NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_hp_supplier` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `alamat_supplier` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  PRIMARY KEY (`id_supplier`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (5, 'Supplier 1', '087766367126', 'Tes alamat');
INSERT INTO `supplier` VALUES (6, 'Supplier 2', '08773617838127', 'Tes alamat');

SET FOREIGN_KEY_CHECKS = 1;
