<?php
session_start();
require '../koneksi/connection.php';

if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query_sql = "INSERT INTO tb_user (fullname, email, phonenumber, address, password) 
              VALUES ('$fullname', '$email', '$phonenumber', '$address','$password')";

    if (mysqli_query($conn, $query_sql)) {
        header("Location: ../loginPage.php");
    } else {
        echo "Registration failed: " . mysqli_error($conn);
    }
}
