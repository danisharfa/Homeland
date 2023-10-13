<?php
require 'koneksi/connection.php';
session_start();

if (!isset($_SESSION['status'])) {
  header("location: login.php");
}

$user_id = $_SESSION['id'];
include 'header.php';
?>

<section class="p-5 m-5">
  <div class="container">
    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded d-block d-sm-flex">
      <?php
      $no = 1;
      $showUserData = mysqli_query($conn, "SELECT * FROM tb_user WHERE id='$user_id'");
      foreach ($showUserData as $data) :
      ?>
        <div class="profile-tab-nav border-right">
          <div class="p-4">
            <h4 class="text-center"><i class="bi bi-person"></i><?= $data["fullname"]; ?></h4>
            <div class="img-circle text-center mb-3">
              <img src="assets/38081873_2318805751470103_1268323427559669760_n.jpg" alt="Image" class="shadow" />
            </div>

          </div>
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">Personal Profile</button>
            <button class="nav-link" id="v-pills-transaksi-tab" data-bs-toggle="pill" data-bs-target="#v-pills-transaksi" type="button" role="tab" aria-controls="v-pills-transaksi" aria-selected="false">Transaction List</button>
            <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="false">Password</button>
            <button class="nav-link" id="v-pills-deleteaccount-tab" data-bs-toggle="pill" data-bs-target="#v-pills-deleteaccount" type="button" role="tab" aria-controls="v-pills-deleteaccount" aria-selected="false">Delete Account</button>
          </div>
        </div>

        <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
          <!-- Personal Profile -->
          <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <h3 class="mb-4">Change Profile</h3>
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Fullname</th>
                  <td><?= $data["fullname"]; ?></td>
                  <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullnameModal">
                      Edit
                    </button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td><?= $data["email"]; ?></td>
                  <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#emailModal">
                      Edit
                    </button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Phonenumber</th>
                  <td><?= $data["phonenumber"]; ?></td>
                  <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#phonenumberModal">
                      Edit
                    </button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Address</th>
                  <td><?= $data["address"]; ?></td>
                  <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addressModal">
                      Edit
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Modal Fullname -->
          <div class="modal fade" id="fullnameModal" tabindex="-1" aria-labelledby="fullnameModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="fullnameModalLabel">Change Fullname</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="php/kelolaProfilUser.php" method="POST">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="fullname" class="col-form-label">Fullname</label>
                      <input type="text" class="form-control" id="fullname" name="tfullname" value="<?= $data["fullname"]; ?>">
                    </div>
                    <input type="hidden" name="id_user" value="<?= $data['id'] ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="bupdatefullname">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Modal Email -->
          <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="emailModalLabel">Change Email</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="php/kelolaProfilUser.php" method="POST">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="email" class="col-form-label">Email</label>
                      <input type="text" class="form-control" id="email" name="temail" value="<?= $data["email"]; ?>">
                    </div>
                    <input type="hidden" name="id_user" value="<?= $data['id'] ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="bupdateemail">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Modal Phone Number -->
          <div class="modal fade" id="phonenumberModal" tabindex="-1" aria-labelledby="phonenumberModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="phonenumberModalLabel">Change Phone Number</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="php/kelolaProfilUser.php" method="POST">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="phonenumber" class="col-form-label">Phone Number</label>
                      <input type="text" class="form-control" id="phonenumber" name="tphonenumber" value="<?= $data["phonenumber"]; ?>">
                    </div>
                    <input type="hidden" name="id_user" value="<?= $data['id'] ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="bupdatephonenumber">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Modal Address -->
          <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="addressModalLabel">Change Address</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="php/kelolaProfilUser.php" method="POST">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="address" class="col-form-label">Address</label>
                      <input type="text" class="form-control" id="address" name="taddress" value="<?= $data["address"]; ?>">
                    </div>
                    <input type="hidden" name="id_user" value="<?= $data['id'] ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="bupdateaddress">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Transaction List  -->
          <div class="tab-pane fade" id="v-pills-transaksi" role="tabpanel" aria-labelledby="v-pills-transaksi-tab">
            <h3 class="mb-4">Transaction List</h3>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Tanggal Transaksi</th>
                  <th scope="col">Harga Total (Sudah termasuk TAX(Rp100.000))</th>
                  <th scope="col">Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $showTransactionData = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE id_user='$user_id'");
                foreach ($showTransactionData as $transdata) :
                ?>
                  <tr>
                    <th scope="row"><?= $no++ ?></th>
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
          <!-- Password -->
          <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
            <h3 class="mb-4">Change Password</h3>
            <form action="php/kelolaProfilUser.php" method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Old password</label>
                    <input type="password" class="form-control" name="oldPassword" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>New password</label>
                    <input type="password" class="form-control" name="newPassword" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Confirm new password</label>
                    <input type="password" class="form-control" name="confirmPassword" required>
                  </div>
                </div>
              </div>
              <input type="hidden" name="id_user" value="<?= $data['id'] ?>">
              <div>
                <button type="submit" class="btn btn-primary" name="bupdatepassword">Update</button>
                <button type="button" class="btn btn-light">Cancel</button>
              </div>
          </div>
          <!-- Delete Account -->
          <div class="tab-pane fade" id="v-pills-deleteaccount" role="tabpanel" aria-labelledby="v-pills-deleteaccount-tab">
            <h3 class="mb-4">Delete Account</h3>
            <div>
              <a href="php/kelolaProfilUser.php?hapus=<?= $data['id']; ?>">
                <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapusnya??')">
                  <i class="bi bi-trash"></i> Delete Account
                </button>
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
include 'footer.php';
?>