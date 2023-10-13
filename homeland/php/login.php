<?php
session_start();
require '../koneksi/connection.php';

if (isset($_POST['login'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query_sql = "SELECT * FROM tb_user WHERE email = '$email'";
    $result = mysqli_query($conn, $query_sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        //periksa apakah user adalah admin
        if ($row['email'] == "admin@admin.com" && $row['password'] == password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['status'] = "admin";
            header("location: ../admin-dashboard.php"); //halaman admin-dashboard.php hanya dapat diakses oleh admin
        } elseif(password_verify($password, $row['password'])) {
            //jika bukan admin
            $_SESSION['id'] = $row['id'];
            $_SESSION['status'] = "login";
            header("location: ../homepage.php"); //halaman homepage.php dapat diakses oleh semua user yang sudah login
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }
}
