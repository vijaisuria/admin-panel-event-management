SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isaccess` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `events` (
  `eid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `type` varchar(255) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `participants` (
  `pid` int(255) NOT NULL,
  `eid` int(255) NOT NULL,
  `uid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `uid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);
  
ALTER TABLE `participants`
  ADD PRIMARY KEY (`pid`);
  
ALTER TABLE `events`
  ADD PRIMARY KEY (`eid`);

ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `participants`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `events`
  MODIFY `eid` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT;
  
insert into admin(name,pass,email,isaccess) values("vijai", '1234', "vijai@mit.edu", 1);
    
COMMIT;


