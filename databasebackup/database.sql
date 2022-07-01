/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.20-MariaDB : Database - fyponlineexamportal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fyponlineexamportal` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `fyponlineexamportal`;

/*Table structure for table `admin_users` */

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin_users` */

insert  into `admin_users`(`user_id`,`username`,`password`,`role`) values 
(1,'admin','admin','administrator');

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `answer` varchar(1) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

/*Data for the table `questions` */

insert  into `questions`(`question_id`,`test_id`,`question`,`image`,`option_a`,`option_b`,`option_c`,`option_d`,`answer`) values 
(52,33,'PHP stands for -','questions/','Hypertext Preprocessor',' Pretext Hypertext Preprocessor ','Personal Home Processor ','None of the above','a'),
(53,33,'Variable name in PHP starts with -','questions/','@','$','#','&','b'),
(54,33,'Which of the following is the default file extension of PHP?','questions/','.pdp.','.p','.php','php','c'),
(55,33,'Which of the following is used to display the output in PHP?','questions/','echo','c++','printf','scanf','a'),
(56,33,'Which of the following is used for concatenation in PHP?','questions/','.','+','-','++','b'),
(57,34,'fjdskfjskaj','questions/ravi.jpeg','kj','kll','j','d','a'),
(58,36,'father of algebra','questions/','khizawi','einstein','moosa ','robert hook','a'),
(59,36,'kdsfjksja','questions/','dkfjk','kjk','jlkl','jkljklj','a');

/*Table structure for table `questions_desc` */

DROP TABLE IF EXISTS `questions_desc`;

CREATE TABLE `questions_desc` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question` varchar(400) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20031 DEFAULT CHARSET=latin1;

/*Data for the table `questions_desc` */

insert  into `questions_desc`(`question_id`,`test_id`,`question`,`image`) values 
(20029,33,'What is php?','questions_desc/'),
(20030,34,'what is web programming','questions_desc/ravi1.jpg');

/*Table structure for table `recovery_pin` */

DROP TABLE IF EXISTS `recovery_pin`;

CREATE TABLE `recovery_pin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `pin` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `recovery_pin` */

insert  into `recovery_pin`(`id`,`email`,`pin`) values 
(29,'amir@gmail.com','$2y$10$FM1M0Qw02JXTq9fDO4qdp.VOZXvuBmOvgInsdYUPJqHrBHbTzKEiO'),
(30,'amir@gmail.com','$2y$10$M6wXCnNLv3lNy0vakWit1OTdL1dGRV8dBBk.uhRhf6P/K0KivEP9e');

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(200) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `subjects` */

insert  into `subjects`(`subject_id`,`subject`) values 
(19,'PHP'),
(21,'IC'),
(22,'ALGORITHAM'),
(24,'math');

/*Table structure for table `test` */

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `sdatetime` datetime NOT NULL,
  `edatetime` datetime NOT NULL,
  `test_duration` int(11) NOT NULL,
  `attempts` int(11) NOT NULL,
  `yes_no` varchar(3) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `test` */

insert  into `test`(`test_id`,`subject`,`test_name`,`sdatetime`,`edatetime`,`test_duration`,`attempts`,`yes_no`,`created`) values 
(33,'PHP','Mid Term Test PHP','2022-01-06 11:33:00','2022-01-06 11:44:00',2,2,'Yes','2022-01-05 11:34:17'),
(34,'IC','Final Paper','2022-01-09 22:33:00','2022-01-09 22:40:00',4,1,'Yes','2022-01-09 22:29:07'),
(35,'ALGORITHAM','test','2022-01-10 22:34:00','2022-01-10 22:34:00',2,1,'Yes','2022-01-09 22:34:56'),
(36,'math','mid term exam','2022-01-11 22:39:00','2022-01-11 22:45:00',30,1,'Yes','2022-01-09 22:41:23');

/*Table structure for table `test_result` */

DROP TABLE IF EXISTS `test_result`;

CREATE TABLE `test_result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `right_ans` int(11) NOT NULL,
  `wrong_ans` int(11) NOT NULL,
  `no_attempt` int(11) NOT NULL,
  `score` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `test_result` */

insert  into `test_result`(`result_id`,`test_id`,`user_id`,`right_ans`,`wrong_ans`,`no_attempt`,`score`,`time`) values 
(21,33,29,4,1,0,80,'2022-01-07 00:13:15'),
(22,33,30,5,0,0,100,'2022-01-07 00:18:39'),
(23,33,30,0,0,5,0,'2022-01-07 00:19:07'),
(24,33,29,4,1,0,80,'2022-01-08 13:04:55'),
(25,33,31,5,0,0,100,'2022-01-09 22:19:32'),
(26,34,31,0,1,0,0,'2022-01-09 22:35:58'),
(27,34,30,0,0,1,0,'2022-01-11 01:01:50');

/*Table structure for table `test_result_desc` */

DROP TABLE IF EXISTS `test_result_desc`;

CREATE TABLE `test_result_desc` (
  `result_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `marks` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `test_result_desc` */

insert  into `test_result_desc`(`result_id`,`question_id`,`user_id`,`test_id`,`answer`,`marks`) values 
(21,20029,29,33,'',20),
(22,20029,30,33,'PHP is a programming language. this use at backend in website',20),
(23,20029,30,33,'',0),
(24,20029,29,33,'php is high level language which use as a backend language.',0),
(25,20029,31,33,'php is a language',20),
(26,20030,31,34,'dflksajf',4),
(27,20030,30,34,'',0);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `attempt_test` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`username`,`email`,`password`,`attempt_test`) values 
(29,'Ravi','ravi@gmail.com','63dd3e154ca6d948fc380fa576343ba6',0),
(30,'Amir ','amir@gmail.com','202cb962ac59075b964b07152d234b70',0),
(31,'Mehmoodmehmood','mehmoodali@gmail.com','c444be298dbbaff4d3238d9929eacfb9',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
