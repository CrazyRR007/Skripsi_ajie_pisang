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
                        <div class="d-sm-flex align-items-center justify-content-between mb-4" >
                            <h2 class="h3 mb-0 text-gray-800 col-md-9">Data Lapangan</h2>
                            <a href="export_stock.php" class="btn btn-primary btn-sm" role="button" >
                                <i class="fas fa-file-export"></i> Export Data
                            </a>
                            
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addStockModal" >
                                <i class="fas fa-plus"></i>Tambah Data
                            </button>
                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                Data - Data Lapangan
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-striped">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>ID Lapangan</th>
                                                <th>Nama Lapangan</th>
                                                <th>Alamat</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $dataStock = mysqli_query($conn, "SELECT * FROM data_lapangan");
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($dataStock)) {
                                                $idBarang = $data['id_lapangan'];
                                                $namaBarang = $data['nama_lapangan'];
                                                $alamat = $data['alamat'];
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $idBarang; ?></td>
                                                <td><?= ucwords($namaBarang); ?></td>
                                                <td><?= $alamat; ?></td>
                                                <td class="d-sm-flex justify-content-between align-items-center" >
                                                    <a href="" class="btn btn-primary" role="button" >
                                                    <i class="fas fa-info"></i> Detail
                                                    </a>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editStockModal<?= $idBarang ?>" >
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <input type="hidden" name="idHapus" value="<?= $idBarang; ?>" />
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteStockModal<?= $idBarang ?>" >
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Edit Data Modal -->
                                            <div class="modal fade" id="editStockModal<?= $idBarang ?>" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" >
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="addModalLabel">
                                                                Edit Data Lapangan
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="idStock" value="<?= $idBarang; ?>" />
                                                                <div class="form-group">
                                                                    <label for="idBarang">ID Lapangan</label>
                                                                    <input type="text" name="idBarang" id="idBarang" value="<?= $idBarang ?>" class="form-control" required />
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label for="namaBarang">Nama Lapangan</label>
                                                                    <input type="text" name="namaBarang" id="namaBarang" value="<?= $namaBarang ?>" class="form-control" required />
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="alamat">alamat</label>
                                                                    <input type="text" name="alamat" id="alamat" placeholder="<?= $alamat ?>" value="<?= $alamat ?>" class="form-control" required />
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="d-sm-flex modal-footer mb-4">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal" >
                                                                    <i class="fas fa-trash"></i> Batal
                                                                </button>
                                                                <button type="submit" class="btn btn-warning" name="editLapangan" >
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Data Modal -->
                                            <div class="modal fade" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" id="deleteStockModal<?= $idBarang; ?>" >
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">
                                                                Hapus Lapangan ?
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body text-center">
                                                                Apakah anda yakin ingin menghapus Lapangan
                                                                <b>
                                                                    <?= $namaBarang ?>
                                                                </b>
                                                                ?
                                                            </div>
                                                            <input type="hidden" name="idHapus" value="<?= $idBarang; ?>" />
                                                            <div class="d-sm-flex modal-footer mb-4">
                                                                <button type=" submit" class="btn btn-danger" name="deleteLapangan" >
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
                    <!-- End Main Content -->
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
    </body>
    <!-- Add Data Modal -->
    <div class="modal fade" id="addStockModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">
                        Tambah Data Lapangan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="idBarang">ID Lapangan</label>
                            <input type="text" name="idBarang" id="idBarang" placeholder="ID Lapangan" class="form-control" required />
                        </div>
                    
                        <div class="form-group">
                            <label for="namaBarang">Nama Lapangan</label>
                            <input type="text" name="namaBarang" id="namaBarang" placeholder="Nama Lapangan" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control" required />
                        </div>
                    </div>
                
                    <div class="d-sm-flex modal-footer justify-content-between mb-4">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-trash"></i>
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary" name="addNewLapangan">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</html>