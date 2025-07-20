<?php
include 'connectDb.php';

$conn=connectDb();

$id = $_GET['id'];

$sql = "DELETE FROM accounts WHERE id =$id"; 

if($conn->query($sql) === TRUE){
    header('Location: viewaccount.php');
}else{
    header("Location: viewaccount.php?id=$id");
}