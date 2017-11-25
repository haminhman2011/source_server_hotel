-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 04:26 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `server_app_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `status` int(4) NOT NULL DEFAULT '1' COMMENT '-1: đã xóa, 1: kích hoạt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `type_menu_id` int(11) DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `module_child`
--

CREATE TABLE `module_child` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `controller` varchar(50) DEFAULT NULL,
  `role` text,
  `module_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `number_of_beds`
--

CREATE TABLE `number_of_beds` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `number_of_beds`
--

INSERT INTO `number_of_beds` (`id`, `name`, `status`) VALUES
(1, 'Phòng 1 giường (2 người)', 1),
(2, 'Phòng 2 giường', 1),
(3, 'Phòng 3 giường', 1),
(4, 'Phòng 4', 1),
(5, 'Phòng 6 giường', 1),
(6, 'Phòng 8 giường', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_menu_in_room_detail`
--

CREATE TABLE `order_menu_in_room_detail` (
  `id` int(11) NOT NULL,
  `order_room_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_room`
--

CREATE TABLE `order_room` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `check_in_date` int(11) DEFAULT NULL,
  `check_out_date` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_room_detail`
--

CREATE TABLE `order_room_detail` (
  `id` int(11) NOT NULL,
  `order_room_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `price_room_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_room`
--

CREATE TABLE `price_room` (
  `id` int(11) NOT NULL,
  `price` int(50) DEFAULT NULL,
  `type` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `permissions` text,
  `note` text,
  `created_date` int(11) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '-1:đã xóa, 0: không kích hoạt, 1: kích hoạt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `number_of_beds_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `syslog`
--

CREATE TABLE `syslog` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `level` tinyint(2) NOT NULL COMMENT '1: Error, 2: Warning, 3: Info; 4: Trace',
  `log_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `syslog`
--

INSERT INTO `syslog` (`id`, `category`, `message`, `prefix`, `level`, `log_time`) VALUES
(1, 'yii\\db\\Exception', 'exception \'PDOException\' with message \'SQLSTATE[42000]: Syntax error or access violation: 1066 Not unique table/alias: \'menu\'\' in C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\db\\Command.php:917\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\db\\Command.php(917): PDOStatement->execute()\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\db\\Command.php(390): yii\\db\\Command->queryInternal(\'fetchColumn\', 0)\n#2 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\db\\Query.php(438): yii\\db\\Command->queryScalar()\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\db\\ActiveQuery.php(339): yii\\db\\Query->queryScalar(\'COUNT(*)\', Object(yii\\db\\Connection))\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\db\\Query.php(319): yii\\db\\ActiveQuery->queryScalar(\'COUNT(*)\', NULL)\n#5 C:\\xampp\\htdocs\\server_app_hotel\\backend\\models\\table\\MenuTable.php(58): yii\\db\\Query->count()\n#6 C:\\xampp\\htdocs\\server_app_hotel\\backend\\models\\table\\MenuTable.php(25): backend\\models\\table\\MenuTable->getModels()\n#7 C:\\xampp\\htdocs\\server_app_hotel\\common\\utils\\table\\TableFacade.php(21): backend\\models\\table\\MenuTable->getData()\n#8 C:\\xampp\\htdocs\\server_app_hotel\\common\\utils\\table\\TableFacade.php(42): common\\utils\\table\\TableFacade->getData()\n#9 C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\MenuController.php(35): common\\utils\\table\\TableFacade->getDataTable()\n#10 [internal function]: backend\\controllers\\MenuController->actionIndexTable()\n#11 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#12 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#13 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(525): yii\\base\\Controller->runAction(\'index-table\', Array)\n#14 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'menu/index-tabl...\', Array)\n#15 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#16 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#17 {main}\n\nNext exception \'yii\\db\\Exception\' with message \'SQLSTATE[42000]: Syntax error or access violation: 1066 Not unique table/alias: \'menu\'\nThe SQL being executed was: SELECT COUNT(*) FROM (SELECT DISTINCT `menu`.* FROM `menu` LEFT JOIN `menu` ON `menu`.`type_menu_id` = `menu`.`id` WHERE `menu`.`status`=1) `c`\' in C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\db\\Schema.php:636\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\db\\Command.php(932): yii\\db\\Schema->convertException(Object(PDOException), \'SELECT COUNT(*)...\')\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\db\\Command.php(390): yii\\db\\Command->queryInternal(\'fetchColumn\', 0)\n#2 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\db\\Query.php(438): yii\\db\\Command->queryScalar()\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\db\\ActiveQuery.php(339): yii\\db\\Query->queryScalar(\'COUNT(*)\', Object(yii\\db\\Connection))\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\db\\Query.php(319): yii\\db\\ActiveQuery->queryScalar(\'COUNT(*)\', NULL)\n#5 C:\\xampp\\htdocs\\server_app_hotel\\backend\\models\\table\\MenuTable.php(58): yii\\db\\Query->count()\n#6 C:\\xampp\\htdocs\\server_app_hotel\\backend\\models\\table\\MenuTable.php(25): backend\\models\\table\\MenuTable->getModels()\n#7 C:\\xampp\\htdocs\\server_app_hotel\\common\\utils\\table\\TableFacade.php(21): backend\\models\\table\\MenuTable->getData()\n#8 C:\\xampp\\htdocs\\server_app_hotel\\common\\utils\\table\\TableFacade.php(42): common\\utils\\table\\TableFacade->getData()\n#9 C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\MenuController.php(35): common\\utils\\table\\TableFacade->getDataTable()\n#10 [internal function]: backend\\controllers\\MenuController->actionIndexTable()\n#11 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#12 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#13 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(525): yii\\base\\Controller->runAction(\'index-table\', Array)\n#14 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'menu/index-tabl...\', Array)\n#15 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#16 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#17 {main}\r\nAdditional Information:\r\nArray\n(\n    [0] => 42000\n    [1] => 1066\n    [2] => Not unique table/alias: \'menu\'\n)\n', 'IP: ::1; UserId: 1', 1, 1509764728),
(2, 'yii\\base\\ErrorException:8', 'exception \'yii\\base\\ErrorException\' with message \'Trying to get property of non-object\' in C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2-gii\\generators\\crud\\Generator.php:219\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2-gii\\generators\\crud\\Generator.php(219): yii\\base\\ErrorHandler->handleError(8, \'Trying to get p...\', \'C:\\\\xampp\\\\htdocs...\', 219, Array)\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2-gii\\controllers\\DefaultController.php(50): yii\\gii\\generators\\crud\\Generator->generate()\n#2 [internal function]: yii\\gii\\controllers\\DefaultController->actionView(\'crud\')\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#5 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(525): yii\\base\\Controller->runAction(\'view\', Array)\n#6 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'gii/default/vie...\', Array)\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#8 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#9 {main}', 'IP: ::1; UserId: 1', 1, 1509767170),
(3, 'yii\\base\\ErrorException:8', 'exception \'yii\\base\\ErrorException\' with message \'Trying to get property of non-object\' in C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2-gii\\generators\\crud\\Generator.php:219\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2-gii\\generators\\crud\\Generator.php(219): yii\\base\\ErrorHandler->handleError(8, \'Trying to get p...\', \'C:\\\\xampp\\\\htdocs...\', 219, Array)\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2-gii\\controllers\\DefaultController.php(50): yii\\gii\\generators\\crud\\Generator->generate()\n#2 [internal function]: yii\\gii\\controllers\\DefaultController->actionView(\'crud\')\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#5 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(525): yii\\base\\Controller->runAction(\'view\', Array)\n#6 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'gii/default/vie...\', Array)\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#8 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#9 {main}', 'IP: ::1; UserId: 1', 1, 1509767215),
(4, 'yii\\base\\ErrorException:8', 'exception \'yii\\base\\ErrorException\' with message \'Trying to get property of non-object\' in C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2-gii\\generators\\crud\\Generator.php:219\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2-gii\\generators\\crud\\Generator.php(219): yii\\base\\ErrorHandler->handleError(8, \'Trying to get p...\', \'C:\\\\xampp\\\\htdocs...\', 219, Array)\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2-gii\\controllers\\DefaultController.php(50): yii\\gii\\generators\\crud\\Generator->generate()\n#2 [internal function]: yii\\gii\\controllers\\DefaultController->actionView(\'crud\')\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#5 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(525): yii\\base\\Controller->runAction(\'view\', Array)\n#6 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'gii/default/vie...\', Array)\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#8 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#9 {main}', 'IP: ::1; UserId: 1', 1, 1509767262),
(5, 'yii\\base\\ErrorException:8', 'exception \'yii\\base\\ErrorException\' with message \'Trying to get property of non-object\' in C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2-gii\\generators\\crud\\Generator.php:219\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2-gii\\generators\\crud\\Generator.php(219): yii\\base\\ErrorHandler->handleError(8, \'Trying to get p...\', \'C:\\\\xampp\\\\htdocs...\', 219, Array)\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2-gii\\controllers\\DefaultController.php(50): yii\\gii\\generators\\crud\\Generator->generate()\n#2 [internal function]: yii\\gii\\controllers\\DefaultController->actionView(\'crud\')\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#5 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(525): yii\\base\\Controller->runAction(\'view\', Array)\n#6 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'gii/default/vie...\', Array)\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#8 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#9 {main}', 'IP: ::1; UserId: 1', 1, 1509767330),
(6, 'yii\\base\\ErrorException:4', 'exception \'yii\\base\\ErrorException\' with message \'syntax error, unexpected end of file, expecting function (T_FUNCTION)\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\HotelMapController.php:22\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}', 'IP: ::1; UserId: 1', 1, 1509937040),
(7, 'yii\\base\\UnknownClassException', 'exception \'yii\\base\\UnknownClassException\' with message \'Unable to find \'backend\\controllers\\KindOfRoomController\' in file: C:\\xampp\\htdocs\\server_app_hotel/backend/controllers/KindOfRoomController.php. Namespace missing?\' in C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\BaseYii.php:296\nStack trace:\n#0 [internal function]: yii\\BaseYii::autoload(\'backend\\\\control...\')\n#1 [internal function]: spl_autoload_call(\'backend\\\\control...\')\n#2 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(635): class_exists(\'backend\\\\control...\')\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(593): yii\\base\\Module->createControllerByID(\'kind-of-room\')\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(519): yii\\base\\Module->createController(\'kind-of-room/in...\')\n#5 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'kind-of-room/in...\', Array)\n#6 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#7 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#8 {main}', 'IP: ::1; UserId: 1', 1, 1509977062),
(8, 'yii\\base\\ErrorException:4', 'exception \'yii\\base\\ErrorException\' with message \'syntax error, unexpected end of file, expecting function (T_FUNCTION)\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\KindOfRoomController.php:25\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}', 'IP: ::1; UserId: 1', 1, 1509977104),
(9, 'yii\\base\\ErrorException:8', 'exception \'yii\\base\\ErrorException\' with message \'Undefined variable: floor\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\kind-of-room\\_form.php:10\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\kind-of-room\\_form.php(10): yii\\base\\ErrorHandler->handleError(8, \'Undefined varia...\', \'C:\\\\xampp\\\\htdocs...\', 10, Array)\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(331): require(\'C:\\\\xampp\\\\htdocs...\')\n#2 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(251): yii\\base\\View->renderPhpFile(\'C:\\\\xampp\\\\htdocs...\', Array)\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(153): yii\\base\\View->renderFile(\'C:\\\\xampp\\\\htdocs...\', Array, Object(backend\\controllers\\KindOfRoomController))\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(383): yii\\base\\View->render(\'_form\', Array, Object(backend\\controllers\\KindOfRoomController))\n#5 C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\KindOfRoomController.php(28): yii\\base\\Controller->render(\'_form\')\n#6 [internal function]: backend\\controllers\\KindOfRoomController->actionCreate()\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#8 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#9 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(525): yii\\base\\Controller->runAction(\'create\', Array)\n#10 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'kind-of-room/cr...\', Array)\n#11 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#12 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#13 {main}', 'IP: ::1; UserId: 1', 1, 1510035613),
(10, 'yii\\base\\ErrorException:8', 'exception \'yii\\base\\ErrorException\' with message \'Undefined variable: floor\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\kind-of-room\\_form.php:37\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\kind-of-room\\_form.php(37): yii\\base\\ErrorHandler->handleError(8, \'Undefined varia...\', \'C:\\\\xampp\\\\htdocs...\', 37, Array)\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(331): require(\'C:\\\\xampp\\\\htdocs...\')\n#2 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(251): yii\\base\\View->renderPhpFile(\'C:\\\\xampp\\\\htdocs...\', Array)\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(153): yii\\base\\View->renderFile(\'C:\\\\xampp\\\\htdocs...\', Array, Object(backend\\controllers\\KindOfRoomController))\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(383): yii\\base\\View->render(\'_form\', Array, Object(backend\\controllers\\KindOfRoomController))\n#5 C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\KindOfRoomController.php(28): yii\\base\\Controller->render(\'_form\')\n#6 [internal function]: backend\\controllers\\KindOfRoomController->actionCreate()\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#8 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#9 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(525): yii\\base\\Controller->runAction(\'create\', Array)\n#10 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'kind-of-room/cr...\', Array)\n#11 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#12 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#13 {main}', 'IP: ::1; UserId: 1', 1, 1510035621),
(11, 'system', 'Đăng nhập vào tài khoản admin thất bại.', 'IP: ::1; UserId: -', 2, 1510366105),
(12, 'yii\\base\\ErrorException:1', 'exception \'yii\\base\\ErrorException\' with message \'Class \'Url\' not found\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\hotel-map\\index.php:190\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}', 'IP: ::1; UserId: 1', 1, 1510368956),
(13, 'yii\\base\\ViewNotFoundException', 'exception \'yii\\base\\ViewNotFoundException\' with message \'The view file does not exist: C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\hotel-map\\modal-update-status-room.php\' in C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php:230\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(153): yii\\base\\View->renderFile(\'C:\\\\xampp\\\\htdocs...\', Array, Object(backend\\controllers\\HotelMapController))\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(413): yii\\base\\View->render(\'modal-update-st...\', Array, Object(backend\\controllers\\HotelMapController))\n#2 C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\HotelMapController.php(29): yii\\base\\Controller->renderPartial(\'modal-update-st...\')\n#3 [internal function]: backend\\controllers\\HotelMapController->actionModalUpdateStatusRoom()\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#5 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#6 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(525): yii\\base\\Controller->runAction(\'modal-update-st...\', Array)\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'hotel-map/modal...\', Array)\n#8 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#9 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#10 {main}', 'IP: ::1; UserId: 1', 1, 1510806893),
(14, 'yii\\base\\ErrorException:8', 'exception \'yii\\base\\ErrorException\' with message \'Undefined variable: room\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\sample-price-list\\index.php:22\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\sample-price-list\\index.php(22): yii\\base\\ErrorHandler->handleError(8, \'Undefined varia...\', \'C:\\\\xampp\\\\htdocs...\', 22, Array)\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(331): require(\'C:\\\\xampp\\\\htdocs...\')\n#2 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(251): yii\\base\\View->renderPhpFile(\'C:\\\\xampp\\\\htdocs...\', Array)\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(153): yii\\base\\View->renderFile(\'C:\\\\xampp\\\\htdocs...\', Array, Object(backend\\controllers\\SamplePriceListController))\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(383): yii\\base\\View->render(\'index\', Array, Object(backend\\controllers\\SamplePriceListController))\n#5 C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\SamplePriceListController.php(24): yii\\base\\Controller->render(\'index\')\n#6 [internal function]: backend\\controllers\\SamplePriceListController->actionIndex()\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#8 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#9 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(525): yii\\base\\Controller->runAction(\'index\', Array)\n#10 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'sample-price-li...\', Array)\n#11 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#12 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#13 {main}', 'IP: ::1; UserId: 1', 1, 1510822138),
(15, 'yii\\base\\ErrorException:2', 'exception \'yii\\base\\ErrorException\' with message \'strpos(): Empty needle\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\layouts\\_menu_left.php:81\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleError(2, \'strpos(): Empty...\', \'C:\\\\xampp\\\\htdocs...\', 81, Array)\n#1 C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\layouts\\_menu_left.php(81): strpos(\'price-by-time/c...\', \'\')\n#2 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(331): require(\'C:\\\\xampp\\\\htdocs...\')\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(251): yii\\base\\View->renderPhpFile(\'C:\\\\xampp\\\\htdocs...\', Array)\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\View.php(212): yii\\base\\View->renderFile(\'C:\\\\xampp\\\\htdocs...\', Array, NULL)\n#5 C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\layouts\\main.php(134): yii\\web\\View->renderAjax(\'_menu_left\')\n#6 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(331): require(\'C:\\\\xampp\\\\htdocs...\')\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(251): yii\\base\\View->renderPhpFile(\'C:\\\\xampp\\\\htdocs...\', Array)\n#8 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(398): yii\\base\\View->renderFile(\'C:\\\\xampp\\\\htdocs...\', Array, Object(backend\\controllers\\PriceByTimeController))\n#9 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(384): yii\\base\\Controller->renderContent(\'<br>\\r\\n<form id=...\')\n#10 C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\PriceByTimeController.php(28): yii\\base\\Controller->render(\'create\')\n#11 [internal function]: backend\\controllers\\PriceByTimeController->actionCreate()\n#12 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#13 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#14 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(525): yii\\base\\Controller->runAction(\'create\', Array)\n#15 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'price-by-time/c...\', Array)\n#16 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#17 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#18 {main}', 'IP: ::1; UserId: 1', 1, 1510825888),
(16, 'yii\\base\\ErrorException:64', 'exception \'yii\\base\\ErrorException\' with message \'Namespace declaration statement has to be the very first statement in the script\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\CustomersAreAtController.php:4\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}', 'IP: ::1; UserId: 1', 1, 1510826197),
(17, 'yii\\base\\ErrorException:2', 'exception \'yii\\base\\ErrorException\' with message \'The use statement with non-compound name \'Yii\' has no effect\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\CustomerOrderRoomController.php:2\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\BaseYii.php(293): yii\\base\\ErrorHandler->handleError(2, \'The use stateme...\', \'C:\\\\xampp\\\\htdocs...\', 2, Array)\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\BaseYii.php(293): yii\\BaseYii::autoload()\n#2 [internal function]: yii\\BaseYii::autoload(\'backend\\\\control...\')\n#3 [internal function]: spl_autoload_call(\'backend\\\\control...\')\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(635): class_exists(\'backend\\\\control...\')\n#5 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(593): yii\\base\\Module->createControllerByID(\'customer-order-...\')\n#6 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(519): yii\\base\\Module->createController(\'customer-order-...\')\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'customer-order-...\', Array)\n#8 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#9 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#10 {main}', 'IP: ::1; UserId: 1', 1, 1510826407),
(18, 'yii\\base\\ErrorException:2', 'exception \'yii\\base\\ErrorException\' with message \'The use statement with non-compound name \'Yii\' has no effect\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\CustomersForgetController.php:3\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\BaseYii.php(293): yii\\base\\ErrorHandler->handleError(2, \'The use stateme...\', \'C:\\\\xampp\\\\htdocs...\', 3, Array)\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\BaseYii.php(293): yii\\BaseYii::autoload()\n#2 [internal function]: yii\\BaseYii::autoload(\'backend\\\\control...\')\n#3 [internal function]: spl_autoload_call(\'backend\\\\control...\')\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(635): class_exists(\'backend\\\\control...\')\n#5 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(593): yii\\base\\Module->createControllerByID(\'customers-forge...\')\n#6 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(519): yii\\base\\Module->createController(\'customers-forge...\')\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'customers-forge...\', Array)\n#8 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#9 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#10 {main}', 'IP: ::1; UserId: 1', 1, 1510826738),
(19, 'yii\\base\\ErrorException:64', 'exception \'yii\\base\\ErrorException\' with message \'Namespace declaration statement has to be the very first statement in the script\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\CustomersForgetController.php:3\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}', 'IP: ::1; UserId: 1', 1, 1510826754),
(20, 'yii\\base\\ErrorException:64', 'exception \'yii\\base\\ErrorException\' with message \'Namespace declaration statement has to be the very first statement in the script\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\CustomersForgetController.php:3\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}', 'IP: ::1; UserId: 1', 1, 1510826837),
(21, 'yii\\base\\ErrorException:2', 'exception \'yii\\base\\ErrorException\' with message \'The use statement with non-compound name \'Yii\' has no effect\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\CustomersForgetController.php:5\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\BaseYii.php(293): yii\\base\\ErrorHandler->handleError(2, \'The use stateme...\', \'C:\\\\xampp\\\\htdocs...\', 5, Array)\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\BaseYii.php(293): yii\\BaseYii::autoload()\n#2 [internal function]: yii\\BaseYii::autoload(\'backend\\\\control...\')\n#3 [internal function]: spl_autoload_call(\'backend\\\\control...\')\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(635): class_exists(\'backend\\\\control...\')\n#5 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(593): yii\\base\\Module->createControllerByID(\'customers-forge...\')\n#6 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(519): yii\\base\\Module->createController(\'customers-forge...\')\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'customers-forge...\', Array)\n#8 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#9 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#10 {main}', 'IP: ::1; UserId: 1', 1, 1510826852),
(22, 'yii\\base\\ErrorException:64', 'exception \'yii\\base\\ErrorException\' with message \'Namespace declaration statement has to be the very first statement in the script\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\CustomersForgetController.php:3\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}', 'IP: ::1; UserId: 1', 1, 1510826905),
(23, 'yii\\base\\ErrorException:64', 'exception \'yii\\base\\ErrorException\' with message \'Namespace declaration statement has to be the very first statement in the script\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\CustomerForgetController.php:3\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}', 'IP: ::1; UserId: 1', 1, 1510826991),
(24, 'yii\\base\\ErrorException:64', 'exception \'yii\\base\\ErrorException\' with message \'Namespace declaration statement has to be the very first statement in the script\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\CustomerAllController.php:3\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}', 'IP: ::1; UserId: 1', 1, 1510827158),
(25, 'yii\\base\\UnknownClassException', 'exception \'yii\\base\\UnknownClassException\' with message \'Unable to find \'backend\\controllers\\CustomerAllController\' in file: C:\\xampp\\htdocs\\server_app_hotel/backend/controllers/CustomerAllController.php. Namespace missing?\' in C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\BaseYii.php:296\nStack trace:\n#0 [internal function]: yii\\BaseYii::autoload(\'backend\\\\control...\')\n#1 [internal function]: spl_autoload_call(\'backend\\\\control...\')\n#2 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(635): class_exists(\'backend\\\\control...\')\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(593): yii\\base\\Module->createControllerByID(\'customer-all\')\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(519): yii\\base\\Module->createController(\'customer-all/in...\')\n#5 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'customer-all/in...\', Array)\n#6 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#7 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#8 {main}', 'IP: ::1; UserId: 1', 1, 1510827172),
(26, 'yii\\base\\ErrorException:8', 'exception \'yii\\base\\ErrorException\' with message \'Undefined variable: floor\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\customer-forget\\create.php:10\nStack trace:\n#0 C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\customer-forget\\create.php(10): yii\\base\\ErrorHandler->handleError(8, \'Undefined varia...\', \'C:\\\\xampp\\\\htdocs...\', 10, Array)\n#1 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(331): require(\'C:\\\\xampp\\\\htdocs...\')\n#2 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(251): yii\\base\\View->renderPhpFile(\'C:\\\\xampp\\\\htdocs...\', Array)\n#3 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\View.php(153): yii\\base\\View->renderFile(\'C:\\\\xampp\\\\htdocs...\', Array, Object(backend\\controllers\\CustomerForgetController))\n#4 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(383): yii\\base\\View->render(\'create\', Array, Object(backend\\controllers\\CustomerForgetController))\n#5 C:\\xampp\\htdocs\\server_app_hotel\\backend\\controllers\\CustomerForgetController.php(31): yii\\base\\Controller->render(\'create\')\n#6 [internal function]: backend\\controllers\\CustomerForgetController->actionCreate()\n#7 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)\n#8 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Controller.php(156): yii\\base\\InlineAction->runWithParams(Array)\n#9 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Module.php(525): yii\\base\\Controller->runAction(\'create\', Array)\n#10 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction(\'customer-forget...\', Array)\n#11 C:\\xampp\\htdocs\\server_app_hotel\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#12 C:\\xampp\\htdocs\\server_app_hotel\\backend\\web\\index.php(22): yii\\base\\Application->run()\n#13 {main}', 'IP: ::1; UserId: 1', 1, 1510827478),
(27, 'yii\\base\\ErrorException:4', 'exception \'yii\\base\\ErrorException\' with message \'syntax error, unexpected \'endfor\' (T_ENDFOR)\' in C:\\xampp\\htdocs\\server_app_hotel\\backend\\views\\hotel-map\\index.php:290\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}', 'IP: ::1; UserId: 1', 1, 1510932227);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_template`
--

CREATE TABLE `tbl_template` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT '1',
  `modified_by` int(11) UNSIGNED DEFAULT NULL,
  `created_date` int(11) UNSIGNED NOT NULL,
  `modified_date` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '-1: đã xóa, 1: kích hoạt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type_menu`
--

CREATE TABLE `type_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_menu`
--

INSERT INTO `type_menu` (`id`, `name`, `status`) VALUES
(1, 'Thức ăn', 1),
(2, 'Đồ uống', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Họ và tên',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_extension` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Số nội bộ',
  `status` tinyint(6) NOT NULL DEFAULT '1' COMMENT '-1: đã xóa, 0: không kích hoạt, 1: kích hoạt',
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `modified_by` int(10) UNSIGNED DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: user thường, 1: admin, 100: super admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `auth_key`, `password_hash`, `token`, `email`, `phone`, `phone_extension`, `status`, `created_date`, `modified_date`, `created_by`, `modified_by`, `last_login`, `role_id`, `type`) VALUES
(1, 'admin', '', '7cQuboiD43v27zFSWgJHTJWIal6tukje', '$2y$13$hLYAOEZJ31jrgw2xeRDQj.I1K//8BybKU3aLpwoSXhbpN3fqA5l.C', 'XGMvl2RJJUB3eGW3y9vJrMFMqmDZ52fI_1497337668', 'phamquanghieu0206@gmail.com', '01682405889', '1', 1, 1392559490, 1497372972, NULL, NULL, 1511580260, NULL, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_menu_id_2` (`type_menu_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_child`
--
ALTER TABLE `module_child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `number_of_beds`
--
ALTER TABLE `number_of_beds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_menu_in_room_detail`
--
ALTER TABLE `order_menu_in_room_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_food_id` (`order_room_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `order_room`
--
ALTER TABLE `order_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_room_detail`
--
ALTER TABLE `order_room_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_room_id` (`order_room_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `modified_by` (`modified_by`);

--
-- Indexes for table `price_room`
--
ALTER TABLE `price_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `floor_id_1` (`floor_id`),
  ADD KEY `number_of_beds_id` (`number_of_beds_id`);

--
-- Indexes for table `syslog`
--
ALTER TABLE `syslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_template`
--
ALTER TABLE `tbl_template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `modified_by` (`modified_by`);

--
-- Indexes for table `type_menu`
--
ALTER TABLE `type_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`token`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `module_child`
--
ALTER TABLE `module_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `number_of_beds`
--
ALTER TABLE `number_of_beds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order_menu_in_room_detail`
--
ALTER TABLE `order_menu_in_room_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_room`
--
ALTER TABLE `order_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_room_detail`
--
ALTER TABLE `order_room_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `syslog`
--
ALTER TABLE `syslog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_template`
--
ALTER TABLE `tbl_template`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_menu`
--
ALTER TABLE `type_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `type_menu_id_2` FOREIGN KEY (`type_menu_id`) REFERENCES `type_menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `module_child`
--
ALTER TABLE `module_child`
  ADD CONSTRAINT `module_child_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`);

--
-- Constraints for table `order_menu_in_room_detail`
--
ALTER TABLE `order_menu_in_room_detail`
  ADD CONSTRAINT `menu_id_3` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_room_id_3` FOREIGN KEY (`order_room_id`) REFERENCES `order_room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_room_detail`
--
ALTER TABLE `order_room_detail`
  ADD CONSTRAINT `order_room_id` FOREIGN KEY (`order_room_id`) REFERENCES `order_room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `floor_id_1` FOREIGN KEY (`floor_id`) REFERENCES `floor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `number_of_beds_id` FOREIGN KEY (`number_of_beds_id`) REFERENCES `number_of_beds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
