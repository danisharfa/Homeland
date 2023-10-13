<?php
require 'koneksi/connection.php';
include 'header.php';
?>

<div class="product_container">
    <div class="product_cards">
        <?php
        $no = 1;
        $showUserData = mysqli_query($conn, "SELECT * FROM tb_produk");
        while ($data = mysqli_fetch_array($showUserData)) {
        ?>
            <div class="row gy-3 my-3">
                <div class="col-sm-6 col-md-4 col-lg-3" id="<?= $no++ ?>">
                    <div class="card" style="width: 250px;">
                        <img src="assets/images/<?= $data["gambar"]; ?>" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title"><?= $data["nama"]; ?></h5>
                            <p class="card-text">Rp<?= $data["harga"]; ?></p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal<?= $no ?>">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Product Detail -->
            <div class="modal fade" id="productModal<?= $no ?>" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                <form action="php/transaksi.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $data["id_produk"]; ?>">
                    <input type="hidden" name="quantity" value="<?php echo $data["quantity"]; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="productModalLabel"><?= $data["nama"]; ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="assets/images/<?= $data["gambar"]; ?>" class="card-img-top" />
                                <p class="card-text">Rp<?= $data["harga"]; ?></p>
                                <p class="card-text"><?= $data["deskripsi"]; ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="baddproduct" class="btn btn-success">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</div>
</div>

<?php
include 'footer.php';
?>