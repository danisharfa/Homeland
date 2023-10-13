<?php
include 'headerAdmin.php';
?>

<section class="p-5 m-5">
  <div class="container">
    <div class="shadow-lg p-4 bg-body-tertiary rounded d-block d-sm-flex">
      <div class="profile-tab-nav border-right">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true"><i class="bi bi-people"></i> Users</button>
          <button class="nav-link" id="v-pills-produk-tab" data-bs-toggle="pill" data-bs-target="#v-pills-produk" type="button" role="tab" aria-controls="v-pills-produk" aria-selected="false"><i class="bi bi-bag"></i> Products</button>
          <button class="nav-link" id="v-pills-transaksi-tab" data-bs-toggle="pill" data-bs-target="#v-pills-transaksi" type="button" role="tab" aria-controls="v-pills-transaksi" aria-selected="false"><i class="bi bi-credit-card"></i> Transactions</button>
        </div>
      </div>

      <div class="tab-content p-4" id="v-pills-tabContent">
        <!-- USER LISTS -->
        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <h3 class="mb-4">User Lists</h3>
          <table class="table table-bordered">
            <thead>
              <tr class="vertical-align: middle;">
                <th scope="col">No.</th>
                <th scope="col">Fullname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $showUserData = mysqli_query($conn, "SELECT * FROM tb_user");
              foreach ($showUserData as $data) :
              ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $data["fullname"]; ?></td>
                  <td><?= $data["email"]; ?></td>
                  <td><?= $data["phonenumber"]; ?></td>
                  <td><?= $data["address"]; ?></td>
                  <td class="button-container-admin">
                    <div class="button-group-admin">
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateDataModal<?= $no ?>">
                        <i class="bi bi-pencil"></i>
                      </button>
                      <a href="php/kelolaAkun.php?hapus=<?= $data["id"]; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapusnya??')"><i class="bi bi-trash"></i></button></a>
                    </div>
                  </td>
                </tr>
                <!-- Modal Update Data User -->
                <div class="modal fade" id="updateDataModal<?= $no ?>" tabindex="-1" aria-labelledby="updateDataLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="fullnameModalLabel">Edit User Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="php/kelolaAkun.php" method="POST">
                        <input type="hidden" name="id_user" value="<?= $data['id'] ?>">
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="fullname" class="col-form-label">Fullname</label>
                            <input type="text" class="form-control" id="fullname" name="tfullname" value="<?= $data["fullname"]; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="temail" value="<?= $data["email"]; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="phonenumber" class="col-form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phonenumber" name="tphonenumber" value="<?= $data["phonenumber"]; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="address" class="col-form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="taddress" value="<?= $data["address"]; ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="bupdate">Update</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
        </div>
      <?php endforeach; ?>
      </tbody>
      </table>
      </div>
      <!-- TRANSACTIONS -->
      <div class="tab-pane fade" id="v-pills-transaksi" role="tabpanel" aria-labelledby="v-pills-transaksi-tab">
        <h3 class="mb-4">Transaction Lists</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">User</th>
              <th scope="col">Tanggal Transaksi</th>
              <th scope="col">Total Belanja</th>
              <th scope="col">Detail</th>
            </tr>
          </thead>
          <?php
          $no = 1;
          $showTransactionData = mysqli_query($conn, "SELECT tb_transaksi.*, tb_user.fullname FROM tb_transaksi INNER JOIN tb_user ON tb_transaksi.id_user = tb_user.id");
          foreach ($showTransactionData as $transdata) :
          ?>
            <tbody>
              <tr>
                <th scope="row"><?= $no++ ?></th>
                <td><?= $transdata["fullname"]; ?></td>
                <td><?= $transdata["tanggal_transaksi"]; ?></td>
                <td><?= $transdata["harga_total"]; ?></td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#infoTransactionModal<?= $no ?>"><i class="bi bi-info-circle"></i></button>
                </td>
              </tr>
              <!-- Modal Transaction Detail -->
              <div class="modal fade" id="infoTransactionModal<?= $no ?>" tabindex="-1" aria-labelledby="infoTransactionLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="fullnameModalLabel">Transaction Detail</h1>
                      <?php $id_transaksi = $transdata['id_transaksi']; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <input type="hidden" name="id_detail_transaksi" value="<?= $transdetail["id_transaksi"]; ?>">
                    <div class="modal-body">
                      <div class="mb-3">
                        <?php
                        $ke = 1;
                        $showTransactionDetail = mysqli_query($conn, "SELECT * FROM tb_detail_transaksi WHERE id_transaksi='$id_transaksi'");
                        foreach ($showTransactionDetail as $transDetail) :
                        ?>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Barang ke-<?= $ke++ ?></label>
                                <img src="assets/images/<?= $transDetail["gambar"]; ?>" style="height:50px; width:50px">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Nama Produk : <?= $transDetail["nama_produk"]; ?></label>
                                <label>Quantity : <?= $transDetail["quantity"]; ?></label>
                                <label>Harga : <?= $transDetail["harga"]; ?></label>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            </tbody>
        </table>
      </div>
      <!-- PRODUCTS  -->
      <div class="tab-pane fade" id="v-pills-produk" role="tabpanel" aria-labelledby="v-pills-produk-tab">
        <h3 class="mb-4">Product Lists</h3>
        <button type="button" class="btn btn-success btn-md" data-bs-toggle="modal" data-bs-target="#addProductModal" style="margin-bottom: 20px;"><i class="bi bi-plus-lg"></i> Add</button>

        <table class="table table-bordered">
          <thead>
            <tr class="vertical-align: middle;">
              <th scope="col">No.</th>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Category</th>
              <th scope="col">Price</th>
              <th scope="col">Description</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $showUserData = mysqli_query($conn, "SELECT * FROM tb_produk");
            foreach ($showUserData as $data) :
            ?>
              <tr>
                <th scope="row"><?= $no++ ?></th>
                <td><img src="assets/images/<?= $data["gambar"]; ?>" style="height:50px; width:50px"></td>
                <td><?= $data["nama"]; ?></td>
                <td><?= $data["jenis"]; ?></td>
                <td>Rp<?= $data["harga"]; ?></td>
                <td><?= $data["deskripsi"]; ?></td>
                <td class="button-container-admin">
                  <div class="button-group-admin">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateProductModal<?= $no ?>">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <a href="php/kelolaProduk.php?hapus=<?= $data["id_produk"]; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapusnya??')"><i class="bi bi-trash"></i></button></a>
                  </div>
                </td>
              </tr>

              <!-- Modal Update Product -->
              <div class="modal fade" id="updateProductModal<?= $no ?>" tabindex="-1" aria-labelledby="updateProductLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="fullnameModalLabel">Edit Product Data</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="php/kelolaProduk.php" method="POST">
                      <input type="hidden" name="id_produk" value="<?= $data['id_produk'] ?>">
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="image"><img src="assets/images/<?= $data["gambar"]; ?>" width="100"></label>
                          <input type="file" id="image" name="timage">
                          <p class="help-block">Pilih Gambar untuk Produk</p>
                        </div>
                        <div class="mb-3">
                          <label for="name" class="col-form-label">Name</label>
                          <input type="text" class="form-control" id="name" name="tname" value="<?= $data["nama"]; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="category" class="col-form-label">Category</label>
                          <select class="form-select" name="tcategory" value="<?= $data["jenis"]; ?>">
                            <option></option>
                            <option value="chair">chair</option>
                            <option value="sofa">sofa</option>
                            <option value="bed">bed</option>
                            <option value="table">table</option>
                            <option value="wardrobe">wardrobe</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="price" class="col-form-label">Price</label>
                          <input type="text" class="form-control" id="price" name="tprice" value="<?= $data["harga"]; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="desc" class="col-form-label">Description</label>
                          <input type="text" class="form-control" id="desc" name="tdesc" value="<?= $data["deskripsi"]; ?>">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" name="bupdate">Update</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
      </div>
    <?php endforeach; ?>
    </tbody>
    </table>
    <!-- Modal Add Product User -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="fullnameModalLabel">Add Product</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="php/kelolaProduk.php" method="POST">
            <input type="hidden" name="id_produk" value="">
            <div class="modal-body">
              <div class="mb-3">
                <label for="image"><img src="assets/images/" width="100"></label>
                <input type="file" id="image" name="timage">
                <p class="help-block">Pilih Gambar untuk Produk</p>
              </div>
              <div class="mb-3">
                <label for="name" class="col-form-label">Name</label>
                <input type="text" class="form-control" name="tname" placeholder="Masukkan nama produk">
              </div>
              <div class="mb-3">
                <label for="category" class="col-form-label">Category</label>
                <select class="form-select" name="tcategory">
                  <option></option>
                  <option value="chair">chair</option>
                  <option value="sofa">sofa</option>
                  <option value="bed">bed</option>
                  <option value="table">table</option>
                  <option value="wardrobe">wardrobe</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="price" class="col-form-label">Price</label>
                <input type="text" class="form-control" name="tprice" placeholder="Masukkan harga">
              </div>
              <div class="mb-3">
                <label for="desc" class="col-form-label">Description</label>
                <input type="text" class="form-control" name="tdesc" placeholder="Masukkan deskripsi">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="badd">Add</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>

<?php
include 'footerLite.php';
?>