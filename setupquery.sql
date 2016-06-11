-- FOODEXPRESS PROJECT --

/*
COMMANDS:
\c nameDb --> connect to nameDb
\d nameTable --> description of the table
dropdb nameDb --> drop database
\dn --> List of schemas
\dt --> List of tables of the database
\du --> List of Roles (Users)
\l --> List of databases
\!clear --> clear the console
*/

/*
Logical Design (PK _Attribute , FK *Attribute):

CLIENT(_Email,Name,Surname,Password,Telephone)
PURCHASE(_Id,TimeDelivery,DateDelivery,isShipped,Client,*(Area,Address))
SHIPPINGAREA(_(Area,Address),TimeShipping)
INVOICE(_id,FiscalCode,VATNumber,FiscalAddress,SocietyName,*Order)
PLATE(_Title,Photo,Description,Prep,LevelComplexity,Available,Price,Quantity,*Category)
ORDERPLATE(_(*Purchase,*Plate))
CATEGORY(_Name)
WORKLINE(_Id,*Category)

*/
-- #SETUP:

-- create database with name: foodexpress
CREATE DATABASE foodexpress;
CREATE SCHEMA foodexpress;
SET search_path TO foodexpress;

CREATE TABLE client (
  Email VARCHAR(64) PRIMARY KEY,
  Name VARCHAR(32) NOT NULL,
  Surname VARCHAR(32) NOT NULL,
  Password VARCHAR(32) NOT NULL,
  Telephone VARCHAR(16) NOT NULL
);

CREATE TABLE shippingarea (
  Area VARCHAR(8),
  Address VARCHAR(32),
  TimeShipping TIME NOT NULL,
  PRIMARY KEY(Area,Address)
);

CREATE TABLE purchase (
  Id CHARACTER(6) PRIMARY KEY,
  TimeDelivery TIME NOT NULL,
  DateDelivery DATE NOT NULL,
  isShipped BOOLEAN DEFAULT FALSE,
  Client VARCHAR(64) REFERENCES client(Email),
  Area VARCHAR(8),
  Address VARCHAR(32),
  FOREIGN KEY (Area,Address) REFERENCES shippingarea(Area,Address)
);

CREATE TABLE invoice (
  Id CHARACTER(8) PRIMARY KEY,
  FiscalCode VARCHAR(16) NOT NULL,
  VATNumber VARCHAR(11) NOT NULL,
  FiscalAddress VARCHAR(32) NOT NULL,
  SocietyName VARCHAR(64) NOT NULL,
  Purchase CHARACTER(6) REFERENCES purchase(Id)
);

CREATE TABLE category (
  Name VARCHAR(16) PRIMARY KEY
);

CREATE TABLE plate (
  Title VARCHAR(32) PRIMARY KEY,
  Photo VARCHAR(32),
  Description VARCHAR(128) NOT NULL,
  Prep INTEGER NOT NULL,
  LevelComplexity INTEGER NOT NULL,
  Available BOOLEAN DEFAULT FALSE,
  Price DECIMAL(4,2) NOT NULL,
  Quantity INTEGER DEFAULT 0,
  Category VARCHAR(16) REFERENCES category(Name)
);

CREATE TABLE orderplate (
  Purchase CHARACTER(6) REFERENCES purchase(Id),
  Plate VARCHAR(32) REFERENCES plate(Title),
  PRIMARY KEY(Purchase,Plate)
);


CREATE TABLE WORKLINE (
  Id SERIAL PRIMARY KEY,
  Category VARCHAR(16) REFERENCES category(Name)
);
