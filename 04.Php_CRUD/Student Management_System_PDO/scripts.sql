drop database if exists sms;
create database sms;
use sms;

create table admin(
    id int primary key auto_increment,
    username varchar(100) not null unique,
    password varchar(255) not null 
);

insert into admin(username, password) values('admin', md5('admin'));





CREATE TABLE student(
	 id INT PRIMARY KEY  AUTO_INCREMENT,
	 rollno INT NOT NULL UNIQUE,
	 name VARCHAR(100) NOT NULL,
	 city VARCHAR(50) NOT NULL,
	 pcont VARCHAR(14) NOT NULL,
	 standerd INT NOT NULL,
	 image TEXT NOT NULL
	 );




