CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `DOB` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `todolist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `check_value` varchar(50) DEFAULT 'false',
  `task` longtext,
  PRIMARY KEY (`id`)
);
