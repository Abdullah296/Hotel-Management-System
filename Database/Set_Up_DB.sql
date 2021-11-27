CREATE TABLE `Booking`  (
  `Booking_ID` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Booking ID is unique for each booking and auto increments. when a booking will be made this id will be send to client to track his/her booking.',
  `From_Date` date NOT NULL COMMENT 'From_Date is the starting date of booking.',
  `To_Date` date NOT NULL COMMENT 'To_Date is the ending date of a booking.',
  `Booking_Date` date NOT NULL COMMENT 'Booking_Date is represents the date at which this booking were placed.',
  `Price_of_Booking` float(3) UNSIGNED NOT NULL COMMENT 'Price stores the price at which this booking was done.',
  `Room_Number` int UNSIGNED NOT NULL COMMENT 'Forgen Key from Room Table.',
  `User_ID` int UNSIGNED NOT NULL COMMENT 'Forgen Key from User Table',
  PRIMARY KEY (`Booking_ID`)
);

CREATE TABLE `Room`  (
  `Room_Number` int UNSIGNED NOT NULL COMMENT 'A 3 digit Room number 1st digit shows the floor on which room is located, and other 2 digit show number of the room on that floor.',
  `Area` float UNSIGNED NOT NULL COMMENT 'Area of the Room in feet squar',
  `Price` decimal(10, 2) NOT NULL COMMENT 'Booking price of the room in PKR.',
  `Discription` mediumblob NOT NULL COMMENT 'Discription contains all the serivices and full details of the room.',
  `Internet` char(1) CHARACTER SET ascii NOT NULL DEFAULT 'T' COMMENT 'Internet is one of the serivices of the room.\r\n\r\nIt is one char long and can have only two different values T means True and F means False, here True means serivice is available and Flase means service is not available.\r\n\r\nBy Default its value is T.',
  `BathTub` char(1) NOT NULL DEFAULT 'T' COMMENT 'BathTub is one of the serivices of the room.\r\n\r\nIt is one char long and can have only two different values T means True and F means False, here True means serivice is available and Flase means service is not available.\r\n\r\nBy Default its value is T.',
  `NewsPaper` char(1) NOT NULL DEFAULT 'T' COMMENT 'News Paper is one of the serivices of the room.\r\n\r\nIt is one char long and can have only two different values T means True and F means False, here True means serivice is available and Flase means service is not available.\r\n\r\nBy Default its value is T.',
  `Shower` char(1) NOT NULL DEFAULT 'T' COMMENT 'Shower is one of the serivices of the room.\r\n\r\nIt is one char long and can have only two different values T means True and F means False, here True means serivice is available and Flase means service is not available.\r\n\r\nBy Default its value is T.',
  `Iron` char(1) NOT NULL DEFAULT 'T' COMMENT 'Iron is one of the serivices of the room.\r\n\r\nIt is one char long and can have only two different values T means True and F means False, here True means serivice is available and Flase means service is not available.\r\n\r\nBy Default its value is T.',
  `Ironing_Table` char(1) NOT NULL DEFAULT 'T' COMMENT 'Table for ironing is one of the serivices of the room.\r\n\r\nIt is one char long and can have only two different values T means True and F means False, here True means serivice is available and Flase means service is not available.\r\n\r\nBy Default its value is T.',
  PRIMARY KEY (`Room_Number`)
);

CREATE TABLE `User`  (
  `User_ID` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User_ID uniquly identfies a user and auto incremented.',
  `First_Name` varchar(50) NOT NULL COMMENT 'First Name of the user.',
  `Last_Name` varchar(50) NOT NULL COMMENT 'Last Name of the user.',
  `E_mail_ID` varchar(50) NOT NULL COMMENT 'E-mail ID of the user, at this id user will be updated about the booking status.',
  PRIMARY KEY (`User_ID`)
);

ALTER TABLE `Booking` ADD CONSTRAINT `fk_Booking_User_1` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`);
ALTER TABLE `Booking` ADD CONSTRAINT `fk_Booking_Room_1` FOREIGN KEY (`Room_Number`) REFERENCES `Room` (`Room_Number`);

