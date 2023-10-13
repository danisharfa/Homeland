<?php
require '../koneksi/connection.php';

// Delete Account
if (isset($_GET["hapus"])) {
    $id = $_GET['hapus'];
    $delete = mysqli_query($conn, "DELETE FROM tb_user 
                                 WHERE id = '$id'
                                ");

    if ($delete) {
        echo "
        <script>
            alert('user telah berhasil dihapus!');
            window.location.href = '../admin-dashboard.php';   
        </script>
    ";
    } else {
        echo "
        <script>
            alert('user gagal dihapus!');
            window.location.href = '../admin-dashboard.php';   
        </script>
    ";
    }
}

// Update
if (isset($_POST["bupdate"])) {
    $edit = mysqli_query($conn, "UPDATE tb_user SET 
                                                fullname ='$_POST[tfullname]',
                                                email ='$_POST[temail]',
                                                phonenumber ='$_POST[tphonenumber]',
                                                address ='$_POST[taddress]'
                                            WHERE id = '$_POST[id_user]'
                                                  ");

    if ($edit) {
        echo "
        <script>
            alert('data user telah berhasil diupdate!');
            window.location.href = '../admin-dashboard.php';   
        </script>
    ";
    } else {
        echo "
        <script>
            alert('data user gagal diupdate!');
            window.location.href = '../admin-dashboard.php';   
        </script>
    ";
    }
}
