-- Create the final_project database
DROP DATABASE IF EXISTS final_project;
CREATE DATABASE final_project;
USE final_project;


CREATE TABLE customers (
    customerAccount int NOT NULL AUTO_INCREMENT,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    phone varchar(20) NOT NULL,
    email varchar(50) UNIQUE,
    PRIMARY KEY (customerAccount)
);

INSERT INTO customers VALUES 
(1003, 'Jesica', 'White', '800-555-0444', 'jesica@gmail.com'),
(1005, 'Brian', 'Lorre', '800-555-0459', 'brian@gmail.com'),
(1007, 'Molly', 'Brown', '800-555-5243', '');


CREATE TABLE vehicles (
    vehicleID int NOT NULL AUTO_INCREMENT,
    vinNumber varchar(50) NOT NULL UNIQUE,
    recordedMileage int(255) NOT NULL,
    year int(10) NOT NULL,
    model varchar(50) NOT NULL,
    make varchar(50) NOT NULL,
    customerAccount int NOT NULL,
    PRIMARY KEY (vehicleID, vinNumber)
);

INSERT INTO vehicles VALUES 
(3031, '5S4BOFS78B3267010', 80000, 2015, 'EcoBoost', 'Ford', 1003), 
(3032, '2F3AKSL54C2348112', 200000, 2003, 'Colorado', 'Chevrolet', 1003),
(3033, '3S2BLCN44P3355222', 200000, 2003, 'Montana', 'Chevrolet', 1005),
(3034, '2F4CPNK52P6671243', 40000, 2019, 'Golf', 'Volkswagen', 1005),
(3035, '1C5KAFC21L7891256', 50000, 2018, 'Bora', 'Volkswagen', 1005),
(3036, '2M2FCNL32P8934742', 10000, 2014, 'Cherokee', 'Jeep', 1007),
(3037, '1P8EMFK54C9245814', 50000, 2018, 'Compass', 'Jeep', 1007);


CREATE TABLE tires (
    tireID int NOT NULL AUTO_INCREMENT,
    vehicleID int NOT NULL,
    tirePosition varchar(10) NOT NULL,
    tireCode varchar(50) NOT NULL,
    nameTire varchar(225) NOT NULL,
    dateInstallation DATE,
    numberReplacement int NOT NULL, 
    PRIMARY KEY (tireID)
);

INSERT INTO tires VALUES 
(111, 3031, 'FR', '235/55R1744W', 'Michelin', '', 0), 
(112, 3031, 'FL', '235/50R1832V', 'Michelin', '', 0),
(113, 3031, 'RR', '265/35R2011V', 'Firestone', '2022-09-01', 2), 
(114, 3032, 'FR', '205/50R1793W', 'Falken', '2019-08-03', 1),
(115, 3032, 'FL', '206/60R1842W', 'Falken', '', 0), 
(116, 3032, 'RR', '231/32R1721W', 'Michelin', '2021-05-02', 3), 
(117, 3033, 'FR', '210/50R1994V', 'Yokohama', '', 0),
(118, 3033, 'FL', '230/40R1820W', 'Pirelli', '2016-04-03', 1),
(119, 3033, 'RR', '234/56R1623V', 'Yokohama', '2018-05-01', 1),
(120, 3034, 'FR', '260/34R2211W', 'Falken', '2022-03-06', 1),
(121, 3034, 'FL', '250/32R2312W', 'Toyo', '2023-01-02', 1),
(122, 3034, 'RR', '244/34R2221V', 'Falken', '', 0),
(123, 3035, 'FR', '223/45R4623W', 'Michelin', '2019-02-02', 1),
(124, 3035, 'FL', '248/54R5423W', 'Michelin', '2022-04-03', 1),
(125, 3035, 'RR', '237/41R5522W', 'Pirelli', '', 0),
(126, 3036, 'FR', '235/42R5321V', 'Yokohama', '2021-03-01', 1),
(127, 3036, 'FL', '206/45R5223V', 'Falken', '', 0),
(128, 3036, 'RR', '231/32R1822W', 'Michelin', '2010-02-02', 2),
(129, 3037, 'FL', '235/52R1802W', 'Falken', '2021-04-05', 1),
(130, 3037, 'FR', '230/53R1721W', 'Toyo', '2016-01-06', 1),
(131, 3037, 'RR', '235/45R1710W', 'Falken', '', 0);





CREATE TABLE technicians (
  username    VARCHAR(40)    NOT NULL     UNIQUE,
  passcode    VARCHAR(40)    NOT NULL,
  PRIMARY KEY (username)
);

INSERT INTO technicians VALUES
('kate2023', 'project'),
('jack3023', 'project');


-- Create a user named ec_user
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE TABLE, DROP TABLE
ON *
TO ec_user@localhost
IDENTIFIED BY 'pa55word';


