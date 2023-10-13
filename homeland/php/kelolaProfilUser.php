<?php
require '../koneksi/connection.php';

// Delete Account
if (isset($_GET["hapus"])) {
    $id = $_GET['hapus'];
    $delete = mysqli_query($conn, "DELETE FROM tb_user WHERE id = '$id'");

    if ($delete) {
        // Logout pengguna
        session_start();
        session_destroy();

        echo "
        <script>
            alert('User telah berhasil dihapus!');
            window.location.href = '../loginPage.php';
        </script>
        ";
        exit;
    } else {
        echo "
        <script>
            alert('Terjadi kesalahan saat menghapus user!');
            window.location.href = '../akunsaya.php';
        </script>
        ";
        exit;
    }
}


// Update fullname
if (isset($_POST["bupdatefullname"])) {
    $id_user = $_POST["id_user"];
    $fullname = $_POST["tfullname"];
    $edit = mysqli_query($conn, "UPDATE tb_user SET 
                                                fullname ='$_POST[tfullname]'
                                            WHERE id = '$_POST[id_user]'
                                                  ");

    if ($edit) {
        echo "
        <script>
            alert('fullname telah berhasil diupdate!');
            window.location.href = '../akunsaya.php';   
        </script>
    ";
    } else {
        echo "
        <script>
            alert('fullname gagal diupdate!');
            window.location.href = '../akunsaya.php';   
        </script>
    ";
    }
}

// Update email
if (isset($_POST["bupdateemail"])) {
    $id_user = $_POST["id_user"];
    $email = $_POST["temail"];
    $edit = mysqli_query($conn, "UPDATE tb_user SET 
                                                email ='$_POST[temail]'
                                            WHERE id = '$_POST[id_user]'
                                                  ");

    if ($edit) {
        echo "
        <script>
            alert('email telah berhasil diupdate!');
            window.location.href = '../akunsaya.php';   
        </script>
    ";
    } else {
        echo "
        <script>
            alert('email gagal diupdate!');
            window.location.href = '../akunsaya.php';   
        </script>
    ";
    }
}

// Update phonenumber
if (isset($_POST["bupdatephonenumber"])) {
    $id_user = $_POST["id_user"];
    $phonenumber = $_POST["tphonenumber"];
    $edit = mysqli_query($conn, "UPDATE tb_user SET 
                                                phonenumber ='$_POST[tphonenumber]'
                                            WHERE id = '$_POST[id_user]'
                                                  ");

    if ($edit) {
        echo "
        <script>
            alert('phonenumber telah berhasil diupdate!');
            window.location.href = '../akunsaya.php';   
        </script>
    ";
    } else {
        echo "
        <script>
            alert('phonenumber gagal diupdate!');
            window.location.href = '../akunsaya.php';   
        </script>
    ";
    }
}

// Update address
if (isset($_POST["bupdateaddress"])) {
    $id_user = $_POST["id_user"];
    $address = $_POST["taddress"];
    $edit = mysqli_query($conn, "UPDATE tb_user SET 
                                                address ='$_POST[taddress]'
                                            WHERE id = '$_POST[id_user]'
                                                  ");

    if ($edit) {
        echo "
        <script>
            alert('address telah berhasil diupdate!');
            window.location.href = '../akunsaya.php';   
        </script>
    ";
    } else {
        echo "
        <script>
            alert('address gagal diupdate!');
            window.location.href = '../akunsaya.php';   
        </script>
    ";
    }
}

// Update Password
if (isset($_POST["bupdatepassword"])) {
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];
    $id_user = $_POST["id_user"];

    // Cek apakah password lama sesuai dengan yang ada di database
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$id_user'");
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['password'];

    if (!password_verify($oldPassword, $storedPassword)) {
        echo "
        <script>
            alert('Old password salah!');
            window.location.href = '../akunsaya.php';
        </script>
        ";
        exit;
    }

    // Validasi password baru
    if ($newPassword != $confirmPassword) {
        echo "
        <script>
            alert('New password dan confirm password tidak sama!');
            window.location.href = '../akunsaya.php';
        </script>
        ";
        exit;
    }

    // Enkripsi password baru
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update password baru ke database
    $updateResult = mysqli_query($conn, "UPDATE tb_user SET password = '$hashedPassword' WHERE id = '$id_user'");

    if ($updateResult) {
        echo "
        <script>
            alert('Password telah berhasil diupdate!');
            window.location.href = '../akunsaya.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Password gagal diupdate!');
            window.location.href = '../akunsaya.php';
        </script>
        ";
    }
}
