CREATE DATABASE IF NOT EXISTS `HOSPITAL_DATABASE`;
USE `HOSPITAL_DATABASE`;
CREATE TABLE IF NOT EXISTS `HOSPITAL` (`Hospital_ID`int NOT NULL AUTO_INCREMENT PRIMARY KEY,`Hospital_Name` varchar(255) NOT NULL, `Hospital_Location` varchar(255) NOT NULL);
CREATE TABLE IF NOT EXISTS `DEPARTMENT` (`Dept_ID`varchar(255) NOT NULL PRIMARY KEY,`Dept_Name` varchar(255) NOT NULL, `Hospital_ID` int NOT NULL, `HOD_ID` int, `Patient_Count` int);
CREATE TABLE IF NOT EXISTS `DOCTOR` (`Doctor_ID`int NOT NULL AUTO_INCREMENT PRIMARY KEY, `Doctor_Name` varchar(255) NOT NULL,`Dept_ID` varchar(255) NOT NULL, `Work_Email` varchar(255),`Phone_No` BIGINT,`Doctor_Image` longblob, `Patient_Count` int, `Join_Date` DATE NOT NULL,`Leave_Date` DATE);
CREATE TABLE IF NOT EXISTS `PATIENT` (`Patient_ID`int NOT NULL AUTO_INCREMENT PRIMARY KEY,`Patient_Name` varchar(255) NOT NULL, `Phone_No` BIGINT, `Alt_Phone_No` BIGINT, `Patient_Image` longblob,`Register_Date` DATE NOT NULL);
CREATE TABLE IF NOT EXISTS `PATIENT_RECORD` (`Record_ID`int NOT NULL AUTO_INCREMENT PRIMARY KEY,`Patient_ID`int NOT NULL,`Doctor_ID`int NOT NULL, `Prescription_IMG` longblob NOT NULL, `Tests_IMG` longblob, `Payment` int,`Consultation_Date` DATE NOT NULL );
INSERT INTO hospital VALUES ('Apollo Secunderabad','Pollicetty Towers, St. Johns Road, beside Keyes High School, Secunderabad, Telangana 500003');
INSERT INTO hospital VALUES ('Apollo Jubilee Hills','Rd Number 72, opposite Bharatiya Vidya Bhavan School, Film Nagar, Hyderabad, Telangana 500033');