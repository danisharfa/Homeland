<?php
include "header.php";
require 'koneksi/connection.php';

session_start();

if (!isset($_SESSION['status'])) {
    header("location: login.php");
}

$user_id = $_SESSION['id'];
?>

<div class="cart-page">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <?php
        $no = 1;
        $subtotal = 0;
        $hargatotal = 0;
        $showUserData = mysqli_query($conn, "SELECT * FROM tb_produk where quantity>0");
        while ($data = mysqli_fetch_array($showUserData)) {
            $id_produk = $data['id_produk'];
            $nama_produk = $data['nama'];
            $gambar = $data['gambar'];
            $quantity = isset($_SESSION['keranjang'][$id_produk]) ? $_SESSION['keranjang'][$id_produk] : 0;
            $harga = $data['harga'];
            $total = $quantity * $harga;
            $subtotal += $total;
        ?>
            <tr id="<?= $no++ ?>">
                <td>
                    <div class="cart-info">
                        <img src="assets/images/<?= $data["gambar"]; ?> " style="height: 85px; width: 80px" alt="<?= $data["nama"]; ?>" />
                        <div>
                            <p><?= $data["nama"]; ?></p>
                            <small>Rp<?= $data["harga"]; ?></small>
                            <br />
                            <a href="php/transaksi.php?add=<?= $data['id_produk']; ?>">Add</a>
                            <a href="php/transaksi.php?remove=<?= $data['id_produk']; ?>">Remove</a>
                        </div>
                    </div>
                </td>
                <td><?= $data["quantity"]; ?></td>
                <?php
                $total =  $data["quantity"]  *  $data["harga"];
                ?>
                <td>Rp<?php echo $total ?></td>
            </tr>
            <?php $subtotal = $total + $subtotal; ?>
        <?php } ?>
    </table>

    <div class="total_price">
        <table>
            <form action="php/transaksi.php" method="POST">
                <tr>
                    <td>Subtotal</td>
                    <td>Rp<?php echo $subtotal ?></td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>Rp100.0000</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <?php $hargatotal = 100000 + $subtotal; ?>
                    <td>Rp<?php echo $hargatotal  ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="bbuy" class="btn btn-success" style="width: 100%;">Buy</button>
                    </td>
                </tr>
            </form>
        </table>
    </div>
</div>

<?php
include 'footer.php';
?>