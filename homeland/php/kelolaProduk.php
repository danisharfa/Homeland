<?php
require '../koneksi/connection.php';

// Add
if (isset($_POST['badd'])) {
    $addp = mysqli_query($conn, "INSERT INTO tb_produk (gambar, nama, jenis, harga, deskripsi)
                                   VALUES('$_POST[timage]', 
                                          '$_POST[tname]', 
                                          '$_POST[tcategory]',
                                          '$_POST[tprice]',
                                          '$_POST[tdesc]')
                                           ");
    if ($addp) {
        echo "
        <script>
            alert('produk telah berhasil ditambah!');
            document.location.href = '../admin-dashboard.php';   
        </script>
    ";
    } else {
        echo "
        <script>
            alert('produk gagal ditambah!');
            document.location.href = '../admin-dashboard.php';   
        </script>
    ";
    }                                       
}

// Hapus
if (isset($_GET["hapus"])) {
    $id_produk = $_GET['hapus'];
    $delete = mysqli_query($conn, "DELETE FROM tb_produk 
                                 WHERE id_produk = '$id_produk'
                                ");

    if ($delete) {
        echo "
        <script>
            alert('data produk telah berhasil dihapus!');
            document.location.href = '../admin-dashboard.php';   
        </script>
    ";
    } else {
        echo "
        <script>
            alert('data produk gagal dihapus!');
            document.location.href = '../admin-dashboard.php';   
        </script>
    ";
    }
}

// Update
if (isset($_POST["bupdate"])) {
    $edit = mysqli_query($conn, "UPDATE tb_produk SET 
                                                gambar ='$_POST[timage]',
                                                nama ='$_POST[tname]',
                                                jenis = '$_POST[tcategory]',
                                                harga ='$_POST[tprice]',
                                                deskripsi ='$_POST[tdesc]'
                                            WHERE id_produk = '$_POST[id_produk]'
                                                  ");

    if ($edit) {
        echo "
        <script>
            alert('data produk telah berhasil diupdate!');
            document.location.href = '../admin-dashboard.php';   
        </script>
    ";
    } else {
        echo "
        <script>
            alert('data produk gagal diupdate!');
            document.location.href = '../admin-dashboard.php';   
        </script>
    ";
    }
}
