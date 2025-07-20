<?php
    include "connectDb.php";
    $conn = connectDb();
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $confirm = $_POST['confirm'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
$sql = "INSERT INTO accounts (email,password,fullname,phone) VALUES 
        ('$email','$pwd','$fullname','$phone')";
if($conn->query($sql) === TRUE) 
    header('Location: viewaccount.php');
else
    header('Location: createaccount.php');