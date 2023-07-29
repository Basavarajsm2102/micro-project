CREATE DATABASE SCHOOL_DB;

USE SCHOOL_DB;

CREATE TABLE STUDENT_TABLE (
    Roll_No INT PRIMARY KEY,
    Full_Name VARCHAR(100),
    Class VARCHAR(20),
    Birth_Date DATE,
    Address VARCHAR(200),
    Enrollment_Date DATE
);
