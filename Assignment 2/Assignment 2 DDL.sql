/*
-- bookings DDL script - Tables
-- Created by Sue Beale
-- Created on 25 July 2018 @ 7:39 am


*/



/*
	************************************************************
	Dropping table statements
	************************************************************
	
https://dev.mysql.com/doc/refman/8.0/en/example-auto-increment.html  

*/
		

DROP TABLE bookings;
DROP TABLE services;
DROP TABLE serviceTypes;

DROP TABLE userLogon;
DROP TABLE users;
DROP TABLE userType;
DROP TABLE status;
DROP TABLE products;
DROP TABLE productCategory;





/*
	************************************************************
	Creating ALL Booking DATABASE tables
	************************************************************
*/

/* Creating status table */
CREATE TABLE status
(
	statusNO INT auto_increment, 
	statusCode char(2),
	statusDesc varchar(20),
	tableRef varchar(20), /* used to assign status codes to different tables */
	CONSTRAINT status_PK_invalid PRIMARY KEY (statusNO)
);



/* Creating userType table */

CREATE TABLE userType
(
	userType char(1),
	typeDesc varchar(60),
	statusCode char(1),
	CONSTRAINT userType_PK_invalid PRIMARY KEY (userType)
);


/* Creating clients table */
CREATE TABLE users
(
	userID INT(11) auto_increment,
	lastName varchar(60),
	firstName varchar(60),
	email varchar(60),
	phone INT(25),
	statusCode char(1),
	CONSTRAINT users_PK_invalid PRIMARY KEY (userID)
);
ALTER TABLE users AUTO_INCREMENT=1000;


/* Creating userLogon table */
CREATE TABLE userLogon
(
	username varchar(20),
	password varchar(256),
	userID INT(11), /* Staff or Client */
	userType char(1), /* S or C */
	statusCode char(1), /* E or D */
	CONSTRAINT userLogon_PK_invalid PRIMARY KEY (username),
	CONSTRAINT userLogon_UserTypes_FK_invalid FOREIGN KEY(userType) references userType(userType),
	CONSTRAINT userLogon_User_FK_invalid FOREIGN KEY(userID) references users(userID)
);


/* CREATE TABLE serviceTypes table here */
CREATE TABLE serviceTypes
(
	categoryID INT(11) auto_increment,
	categoryName varchar(20),
	CONSTRAINT serviceTypes_PK_invalid PRIMARY KEY (categoryID)
);


/* CREATE TABLE services table here */
CREATE TABLE services
(
	serviceID INT(11),
	categoryID INT(11),
	serviceName varchar(20),
	serviceDescription varchar(100),
	servicePrice FLOAT,
	CONSTRAINT services_PK_invalid PRIMARY KEY (serviceID),
	CONSTRAINT services_serviceTypes_FK_invalid FOREIGN KEY(categoryID) references serviceTypes(categoryID)
);




/* CREATE TABLE bookings table here */
CREATE TABLE bookings
(
	bookingNo INT(11) auto_increment,
	userID INT(11),
	staffID INT(11),
	serviceID INT(11),
	bookingDate DATE,
	statusCode char(1),
	CONSTRAINT bookings_PK_invalid PRIMARY KEY (bookingNo),
	CONSTRAINT bookings_User_FK_invalid FOREIGN KEY(userID) references users(userID),
	CONSTRAINT bookings_services_FK_invalid FOREIGN KEY(serviceID) references services(serviceID)
);




/* CREATE TABLE product category table here */
CREATE TABLE productCategory
(
	productCategoryID INT(11) auto_increment,
	categoryName varchar(20),
	categoryDescription varchar(100),
	CONSTRAINT productCategory_PK_invalid PRIMARY KEY (productCategoryID)
);


/* CREATE TABLE products table here */
CREATE TABLE products
(
	productID INT(11) auto_increment,
	productCategoryID INT(11),
	productName varchar(20),
	productDescription varchar(100),
	productImage varchar(250),
	productPrice FLOAT,
	productQuantity INT(6),
	CONSTRAINT products_PK_invalid PRIMARY KEY (productID),
	CONSTRAINT products_productCategory_FK_invalid FOREIGN KEY(productCategoryID) references productCategory(productCategoryID)
);


/*
	************************************************************
	Show ALL Booking DATABASE tables
	************************************************************
*/
show tables;














