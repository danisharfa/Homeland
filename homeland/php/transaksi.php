<?php
require '../koneksi/connection.php';
session_start();

// Tambah produk ke keranjang
if (isset($_POST['baddproduct'])) {
    $quantity = $_POST['quantity'];
    $id = $_POST['id'];
    $addp = mysqli_query($conn, "UPDATE tb_produk SET quantity=$quantity+1 WHERE id_produk=$id");
    header("location:../keranjang.php");
}

// remove product per quantity dari keranjang
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    // Mengurangi jumlah produk di keranjang sebanyak 1
    // $_SESSION['keranjang'][$id]--;
    if (isset($_SESSION['keranjang'][$id])) {
        $_SESSION['keranjang'][$id]--;
        if ($_SESSION['keranjang'][$id] <= 0) {
            unset($_SESSION['keranjang'][$id]);
        }
    }

    // Mengupdate quantity produk di database
    mysqli_query($conn, "UPDATE tb_produk SET quantity = quantity - 1 WHERE id_produk = $id");

    // Redirect ke halaman keranjang
    header("location:../keranjang.php");
}

// menambah quantity produk
if (isset($_GET['add'])) {
    $id = $_GET['add'];

    // Menambah jumlah produk di keranjang sebanyak 1
    // $_SESSION['keranjang'][$id]++;
    // Menambah jumlah produk di keranjang sebanyak 1
    if (isset($_SESSION['keranjang'][$id])) {
        $_SESSION['keranjang'][$id]++;
    } else {
        $_SESSION['keranjang'][$id] = 1;
    }

    // Mengupdate quantity produk di database
    mysqli_query($conn, "UPDATE tb_produk SET quantity = quantity + 1 WHERE id_produk = $id");

    // Redirect ke halaman keranjang
    header("location:../keranjang.php");
}

// pembayaran
if (isset($_POST['bbuy'])) {
    $user_id = $_SESSION['id'];
    // Proses pemesanan
    $tanggal_transaksi = date('Y-m-d');
    $hargatotal = 0;

    // Masukkan data pemesanan ke tb_transaksi
    mysqli_query($conn, "INSERT INTO tb_transaksi (id_user, tanggal_transaksi, harga_total) VALUES ('$user_id', '$tanggal_transaksi', '$hargatotal')");
    $id_transaksi = mysqli_insert_id($conn); // Mendapatkan ID transaksi yang baru saja di-generate

    $showUserData = mysqli_query($conn, "SELECT * FROM tb_produk WHERE quantity > 0");
    while ($data = mysqli_fetch_array($showUserData)) {
        $nama_produk = $data['nama'];
        $gambar = $data['gambar'];
        $quantity = $data['quantity'];
        $harga = $data['harga'];

        $total =  $quantity  *  $harga;
        $subtotal = $total + $subtotal;

        // Masukkan data detail pemesanan ke tb_detail_transaksi
        mysqli_query($conn, "INSERT INTO tb_detail_transaksi (id_transaksi, nama_produk, gambar, quantity, harga) VALUES ('$id_transaksi', '$nama_produk', '$gambar', '$quantity', '$harga')");

        $hargatotal = 100000 + $subtotal; // Menghitung harga total
    }

    // Update harga_total pada tb_transaksi
    mysqli_query($conn, "UPDATE tb_transaksi SET harga_total = '$hargatotal' WHERE id_transaksi = '$id_transaksi'");

    // Hapus semua produk di keranjang
    unset($_SESSION['keranjang']);

    // Redirect ke halaman sukses pemesanan
    header("location:../akunsaya.php");
}
