-- FOODEXPRESS PROJECT --

/*
COMMANDS:
\c nameDb --> connect to nameDb
\d nameTable --> description of the table
dropdb nameDb --> drop database
\dt --> List of tables of the database
\l --> List of databases
\!clear --> clear the console
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

CREATE TABLE order (
  Id CHARACTER(6) PRIMARY KEY,
  TimeDelivery TIME NOT NULL,
  DateDelivery DATE NOT NULL,
  isShipped BOOLEAN DEFAULT FALSE,
  Client VARCHAR(64) REFERENCES client(Email),
  Area VARCHAR(8),
  Address VARCHAR(32),
  FOREIGN KEY (Area,Address) REFERENCES shippingarea(Area,Address)
);
