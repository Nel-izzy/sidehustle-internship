<?php
$servername = "localhost";
$username = "admin";
$password = "admin123";
$database = "market";

$conn = mysqli_connect($servername, $username, $password, $database);
//check connection
if(!$conn){
    //die("Connection failed:".mysqli_connect_error());
}else{
    //echo "Database Connected". "<br>";
}

//create database
// $sql = "CREATE DATABASE market";
// if(mysqli_query($conn, $sql)){
//     echo "Database Created";
// }else{
//     echo "Error creating Database ".myqli_error($conn);
// }

//  create users table 

// $sql = "CREATE TABLE Users (
//     userID INT(6) AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(20) NOT NULL,
//     lastname VARCHAR(20) NOT NULL,
//     email VARCHAR(20) NOT NULL,
//     phone VARCHAR(20) NOT NULL,
//     passwd VARCHAR(20) NOT NULL
//     )";
//  if(mysqli_query($conn, $sql)){
//      echo "Table users created";
//  }else{
//      echo "Error creating table: ".mysqli_error($conn);
//  }

 // create products table
//  $sql = "CREATE TABLE Products (
//     prodID INT(6) AUTO_INCREMENT PRIMARY KEY,
//     title VARCHAR(20) NOT NULL,
//     price VARCHAR(20) NOT NULL,
//     img   VARCHAR(100) NOT NULL,
//     userID INT(6) NOT NULL
//     )";
//  if(mysqli_query($conn, $sql)){
//      echo "Table products created";
//  }else{
//      echo "Error creating table: ".mysqli_error($conn);
//  }
 



?>