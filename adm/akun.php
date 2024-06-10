<?php
//function untuk connect database
include '../function.php';

//function untuk mengecek sudah login / blm
include '../check.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../layout/header.php"; ?>
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <?php include "sidebar.php"; ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <?php include "../layout/topbar.php"?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div
                        class="d-sm-flex align-items-center justify-content-between mb-4"
                        >
                        <h2 class="h3 mb-0 text-gray-800 col-md-9">Data Akun</h2>
                        <a
                            href="export_akun.php"
                            class="btn btn-primary btn-sm"
                            role="button"
                            ><i class="fas fa-file-export"></i> Export Data</a
                        >

                        <button
                            type="button"
                            class="btn btn-success btn-sm"
                            data-toggle="modal"
                            data-target="#addAccountModal"
                        >
                            <i class="fas fa-plus"></i>
                            Tambah Data
                        </button>
                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                            Data - Data Akun
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-striped">
                            <table
                                class="table table-bordered"
                                id="dataTable"
                                width="100%"
                                cellspacing="0"
                            >
                                <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Username</th>
                                    <th>No Tlp</th>
                                    <th>Tipe Akun</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $dataUser = mysqli_query($conn, "SELECT * FROM data_user");
                                $i = 1;
                                while ($data = mysqli_fetch_array($dataUser)) {
                                    $idUser = $data['id_user'];
                                    $namaLengkap = $data['nama_user'];
                                    $username = $data['username'];
                                    $no_tlp = $data['no_tlp'];
                                    $password = $data['password'];
                                    $tipeAkun = $data['tipe_akun'];
                                    $alamat = $data['alamat'];
                                    ?>
                                                    <tr>
                                                    <td>
                                                        <?= $i++; ?>
                                                    </td>
                                                    <td>
                                                        <?= ucwords($namaLengkap); ?>
                                                    </td>
                                                    <td>
                                                        <?= $username; ?>
                                                    </td>
                                                    <td>
                                                        <?= $no_tlp; ?>
                                                    </td>
                                                    <td>
                                                        <?= ucwords($tipeAkun); ?>
                                                    </td>
                                                    <td
                                                        class="d-sm-flex justify-content-around align-items-center"
                                                    >
                                                        <a
                                                        href="detail_akun.php?id=<?= $idUser ?>"
                                                        class="btn btn-primary"
                                                        role="button"
                                                        ><i class="fas fa-info"></i> Detail</a
                                                        >

                                                        <button
                                                        type="button"
                                                        class="btn btn-warning"
                                                        data-toggle="modal"
                                                        data-target="#editAccountModal<?= $idUser; ?>"
                                                        >
                                                        <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                        <input
                                                        type="hidden"
                                                        name="idHapus"
                                                        value="<?= $idUser; ?>"
                                                        />
                                                        <button
                                                        type="button"
                                                        class="btn btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#deleteAccountModal<?= $idUser; ?>"
                                                        >
                                                        <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </td>
                                                    </tr>

                                                    <!-- Edit Data Modal -->
                                                    <div
                                                    class="modal fade"
                                                    tabindex="-1"
                                                    aria-labelledby="editModalLabel"
                                                    aria-hidden="true"
                                                    id="editAccountModal<?= $idUser; ?>"
                                                    >
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">
                                                            Edit Data Akun
                                                            </h5>
                                                            <button
                                                            type="button"
                                                            class="close"
                                                            data-dismiss="modal"
                                                            aria-label="Close"
                                                            >
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body">
                                                            <input
                                                                type="hidden"
                                                                name="idUser"
                                                                value="<?= $idUser; ?>"
                                                            />

                                                            <div class="form-group">
                                                                <label for="namaUser">Nama Lengkap</label>
                                                                <input
                                                                type="text"
                                                                name="namaUser"
                                                                id="namaUser"
                                                                value="<?= $namaLengkap; ?>"
                                                                class="form-control"
                                                                required
                                                                />
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="usernameUser">Username</label>
                                                                <input
                                                                type="text"
                                                                name="usernameUser"
                                                                id="usernameUser"
                                                                value="<?= $username; ?>"
                                                                class="form-control"
                                                                required
                                                                />
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="no_tlp">No Tlp</label>
                                                                <input
                                                                type="text"
                                                                name="no_tlp"
                                                                id="no_tlp"
                                                                value="<?= $no_tlp; ?>"
                                                                class="form-control"
                                                                required
                                                                />
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="passwordUser">Password</label>
                                                                <input
                                                                type="password"
                                                                name="passwordUser"
                                                                id="passwordUser"
                                                                value="<?= $password; ?>"
                                                                class="form-control"
                                                                required
                                                                />
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="alamat">Alamat Lengkap</label>
                                                                <input
                                                                type="textarea"
                                                                name="alamat"
                                                                id="alamat"
                                                                value="<?= $alamat; ?>"
                                                                class="form-control"
                                                                required
                                                                />
                                                            </div>
                                                            </div>

                                                            <div class="d-sm-flex modal-footer mb-4">
                                                            <button
                                                                type="button"
                                                                class="btn btn-danger"
                                                                data-dismiss="modal"
                                                            >
                                                                <i class="fas fa-trash"></i> Batal
                                                            </button>
                                                            <button
                                                                type=" submit"
                                                                class="btn btn-warning"
                                                                name="editAccount"
                                                            >
                                                                <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <!-- Delete Data Modal -->
                                                    <div
                                                    class="modal fade"
                                                    tabindex="-1"
                                                    aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true"
                                                    id="deleteAccountModal<?= $idUser; ?>"
                                                    >
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">
                                                            Hapus Akun ?
                                                            </h5>
                                                            <button
                                                            type="button"
                                                            class="close"
                                                            data-dismiss="modal"
                                                            aria-label="Close"
                                                            >
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body text-center">
                                                            Apakah anda yakin ingin menghapus akun
                                                            <b>
                                                                <?= $username ?>
                                                            </b>
                                                            ?
                                                            </div>
                                                            <input
                                                            type="hidden"
                                                            name="idHapus"
                                                            value="<?= $idUser; ?>"
                                                            />

                                                            <div class="d-sm-flex modal-footer mb-4">
                                                            <button
                                                                type=" submit"
                                                                class="btn btn-danger"
                                                                name="deleteAccount"
                                                            >
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
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php include "../layout/footer.php"; ?>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
    
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <?php include "../layout/logout_modal.php"?>

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
    </body>

    <!-- Add Data Modal -->
    <div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
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
                            <label for="no_tlp">No Tlp</label>
                            <input type="text" name="no_tlp" id="no_tlp" placeholder="0123456789" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label for="passwordUser">Password</label>
                            <input type="password" name="passwordUser" id="passwordUser" placeholder="********" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <input type="textarea" name="alamat" id="alamat" placeholder="Alamat Lengkap" class="form-control" required />
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
</html>