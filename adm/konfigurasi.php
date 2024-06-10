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
                            <h2 class="h3 mb-0 text-gray-800 col-md-8">Konfigurasi</h2>
                            
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addIncomingModal" >
                                <i class="fas fa-plus"></i>
                                Ubah Konfigurasi
                            </button>
                        </div>
                        
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Form konfigurasi
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-striped">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Ukuran Populasi</th>
                                                <th>Tingkat Mutasi</th>
                                                <th>Jumlah Generasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $dataStock = mysqli_query($conn, "SELECT * FROM data_konfigurasi");
                                            while ($data = mysqli_fetch_array($dataStock)) {
                                              $populasi = $data['populationSize'];
                                              $mutasi = $data['mutationRate'];
                                              $generasi = $data['generations'];
                                            ?>
                                            <tr>
                                                <td><?= $populasi ?></td>
                                                <td><?= $mutasi ?></td>
                                                <td><?= $generasi ?></td>
                                            </tr>
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
    <div class="modal fade" id="addIncomingModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">
                        Konfigurasi
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="populationSize">Populasi</label>
                            <input type="text" name="populationSize" id="populationSize" value="<?= $populasi ?>" class="form-control" required />
                        </div>
                        
                        <div class="form-group">
                            <label for="mutationRate">Mutasi</label>
                            <input type="text" name="mutationRate" id="mutationRate" value="<?= $mutasi ?>" class="form-control" required />
                        </div>
                        
                        <div class="form-group">
                            <label for="generations">Generasi</label>
                            <input type="text" name="generations" id="generations" value="<?= $generasi ?>" class="form-control" required />
                        </div>
                    </div>

                    <div class="d-sm-flex modal-footer justify-content-between mb-4">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-trash"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary" name="updateConfig" >
                            <i class="fas fa-plus"></i> konfigurasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</html>