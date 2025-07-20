<?php
const DB_SERVER = "Localhost";
const DB_USER = "root";
const DB_NAME = "demo1";
const DB_PASS = "";
function connectDb(){
  $conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if($conn->connect_error){
        die('Connection failed: '. $conn->connect_error);//die = echo + exit.
    }
    return $conn;
}