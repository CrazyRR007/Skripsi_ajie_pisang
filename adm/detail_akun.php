<?php
//function untuk connect database
include '../function.php';

//function untuk mengecek sudah login / blm
include '../check.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include "../layout/header.php"?>
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <?php include "sidebar.php"; ?>
            <!-- End Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Page Content -->
                <div id="content">
                    <!-- Topbar -->
                    <?php include "../layout/topbar.php";?>
                    <!-- End Topbar -->
                    <!-- Main Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800 col-md-9">Detail Akun</h1>
                            <a href="akun.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" role="button">
                                <i class="fas fa-arrow-left fa-sm text-white-50"></i>
                                Back to Main Menu
                            </a>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" role="button" data-toggle="modal" data-target="#editAccount<?= $idUser; ?>">
                                <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                                Akun
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 xs-margin-30px-bottom">
                                <div class="team-single-img">
                                    <img class="img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" style="width: 75%"/>
                                    
                                    <!-- Edit Data Modal -->
                                    <div class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" id="editAccount<?= $idUser; ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">
                                                        Edit Data Akun
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="idUser" value="<?= $idUser; ?>"/>

                                                        <div class="form-group">
                                                            <label for="namaUser">Nama Lengkap</label>
                                                            <input type="text" name="namaUser" id="namaUser" value="<?= $namaLengkap; ?>" class="form-control" required/>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="usernameUser">Username</label>
                                                            <input type="text" name="usernameUser" id="usernameUser" value="<?= $username; ?>" class="form-control" required/>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="passwordUser">Password</label>
                                                            <input type="password" name="passwordUser" id="passwordUser" value="<?= $password; ?>" class="form-control" required />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="alamat">Alamat Lengkap</label>
                                                            <input type="textarea" name="alamat" id="alamat" value="<?= $alamat; ?>" class="form-control" required />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="tipeAkun">Divisi</label>
                                                            <select class="form-control" name="tipeAkun" id="tipeAkun" value="<?= $tipeAkun; ?>" required >
                                                                <option>Admin</option>
                                                                <option>Production</option>
                                                                <option>Marketing</option>
                                                                <option>Purchasing</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="d-sm-flex modal-footer mb-4">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal" >
                                                            <i class="fas fa-trash"></i> Batal
                                                        </button>
                                                        <button type=" submit" class="btn btn-warning" name="editAccountAdmin" >
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-9 col-md-8">
                                <div class="team-single-text padding-30px-left sm-no-padding-left">
                                    <div class="contact-info-section margin-40px-tb">
                                        <div class="row">
                                            <div class="col-md-3 col-3">
                                                <strong class="margin-10px-left text-orange">
                                                    Nama Lengkap
                                                </strong>
                                            </div>
                                            <div class="col-md-5 col-5">
                                                <p>
                                                    : <?= ucwords($namaLengkap); ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-3">
                                                <strong class="margin-10px-left text-yellow">
                                                    Username
                                                </strong>
                                            </div>
                                            <div class="col-md-5 col-5">
                                                <p>
                                                    : <?= $username; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-3">
                                                <strong class="margin-10px-left text-green">
                                                    Alamat
                                                </strong>
                                            </div>
                                            <div class="col-md-5 col-5">
                                                <p>
                                                    : <?= $alamat; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-3">
                                                <strong class="margin-10px-left xs-margin-four-left text-purple">
                                                    Divisi
                                                </strong>
                                            </div>
                                            <div class="col-md-5 col-5">
                                                <p>
                                                    : <?= ucwords($tipeAkun); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Main Content -->
                    <div class="card shadow mb-4 m-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Data - Data Akun Lain
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-striped">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Username</th>
                                            <th>Divisi</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $dataUser = mysqli_query($koneksi, "SELECT * FROM data_karyawan WHERE id_karyawan !='$idUser'");
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($dataUser)) {
                                          $idUser = $data['id_karyawan'];
                                          $namaLengkap = $data['nama_karyawan'];
                                          $username = $data['username'];
                                          $password = $data['password'];
                                          $tipeAkun = $data['divisi'];
                                          $alamat = $data['alamat'];
                                        ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= ucwords($namaLengkap); ?></td>
                                            <td><?= $username; ?></td>
                                            <td><?= ucwords($tipeAkun); ?></td>
                                            <td class="d-sm-flex justify-content-around align-items-center">
                                                <a href="detail_akun.php?id=<?= $idUser ?>" class="btn btn-primary" role="button">
                                                    <i class="fas fa-info"></i> Detail
                                                </a>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editAccountModal<?= $idUser; ?>">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <input type="hidden" name="idHapus" value="<?= $idUser; ?>"/>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccountModal<?= $idUser; ?>">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Edit Data Modal -->
                                        <div class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" id="editAccountModal<?= $idUser; ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">
                                                            Edit Data Akun
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="idUser" value="<?= $idUser; ?>"/>
                                                            <div class="form-group">
                                                                <label for="namaUser">Nama Lengkap</label>
                                                                <input type="text" name="namaUser" id="namaUser" value="<?= $namaLengkap; ?>" class="form-control" required/>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="usernameUser">Username</label>
                                                                <input type="text" name="usernameUser" id="usernameUser" value="<?= $username; ?>" class="form-control" required/>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="passwordUser">Password</label>
                                                                <input type="password" name="passwordUser" id="passwordUser" value="<?= $password; ?>" class="form-control" required/>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="alamat">Alamat Lengkap</label>
                                                                <input type="textarea" name="alamat" id="alamat" value="<?= $alamat; ?>" class="form-control" required/>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="tipeAkun">Divisi</label>
                                                                <select class="form-control" name="tipeAkun" id="tipeAkun" value="<?= $tipeAkun; ?>" required>
                                                                    <option>Admin</option>
                                                                    <option>Production</option>
                                                                    <option>Marketing</option>
                                                                    <option>Purchasing</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="d-sm-flex modal-footer mb-4">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                <i class="fas fa-trash"></i> Batal
                                                            </button>
                                                            <button type=" submit" class="btn btn-warning" name="editAccount">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Data Modal -->
                                        <div class="modal fade" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" id="deleteAccountModal<?= $idUser; ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">
                                                            Hapus Akun ?
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post">
                                                        <div class="modal-body text-center">
                                                            Apakah anda yakin ingin menghapus akun
                                                            <b><?= $username ?></b>
                                                            ?
                                                        </div>
                                                        <input type="hidden" name="idHapus" value="<?= $idUser; ?>"/>

                                                        <div class="d-sm-flex modal-footer mb-4">
                                                            <button type=" submit" class="btn btn-danger" name="deleteAccount">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Content -->
                <!-- Footer -->
                <?php include "../layout/footer.php";?>
                <!-- End Footer -->
            </div>
            <!-- End Content Wrapper -->
        </div>
        <!-- End Page Wrapper -->
        <!-- Scroll to Top Button -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- End Scroll to Top Button -->
        <!-- Logout Modal -->
        <?php include "../layout/logout_modal.php";?>
        <!-- End Logout Modal -->

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="../js/demo/datatables-demo.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>
        
        <!-- Add Data Modal -->
        <div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Data Akun</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="namaUser">Nama Lengkap</label>
                                <input type="text" name="namaUser" id="namaUser" placeholder="Nama Lengkap" class="form-control" required />
                            </div>
                            
                            <div class="form-group">
                                <label for="usernameUser">Username</label>
                                <input type="text" name="usernameUser" id="usernameUser" placeholder="example" class="form-control" required />
                            </div>
                            
                            <div class="form-group">
                                <label for="passwordUser">Password</label>
                                <input type="password" name="passwordUser" id="passwordUser" placeholder="********" class="form-control" required/>
                            </div>
                            
                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap</label>
                                <input type="textarea" name="alamat" id="alamat" placeholder="Alamat Lengkap" class="form-control" required/>
                            </div>
                            
                            <div class="form-group">
                                <label for="tipeAkun">Divisi</label>
                                <select class="form-control" name="tipeAkun" id="tipeAkun" required>
                                    <option>Admin</option>
                                    <option>Production</option>
                                    <option>Marketing</option>
                                    <option>Purchasing</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-sm-flex modal-footer justify-content-between mb-4">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fas fa-trash"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-primary" name="addNewAccount">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>