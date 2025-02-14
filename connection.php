<?php
$con = mysqli_connect("localhost", "root", "");
$con->select_db("2025_4DCE_A_B");
// {
//     $q = "create table register(
//     id int primary key auto_increment,
//     fullname char(50) not null,
//     email varchar(40) unique key,
//     password varchar(20) not null,
//     mobile bigint(10) not null,
//     state char(20) not null,
//     hobbies char(50) not null,
//     profile_pic varchar(100) not null
//     )";

//     try {
//         if ($con->query($q)) {
//             echo "table created";
//         }
//     } catch (Exception $e) {
//         echo "error in creating table";
//     }
//     // $q = "create database 2025_4DCE_A_B";

// } else {
//     echo "error in connecting to database";
// }
// $q = "create database 2025_4DCE_A_B";
// if ($con->query($q)) {
//     echo "database created";
// } else {
//     echo "error";
// }
