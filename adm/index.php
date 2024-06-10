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
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                            <button href="export_stock.php" role="button" class="btn btn-success btn-sm" id="generate-jadwal-button" >
                                Generate
                            </button>
                        </div>
                        
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    DataTables Example
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-striped">
                                    <?php
                                    $query_get_genfit = "SELECT best_generation, fitness_score FROM data_jadwal"; //Penerapan View (Bab 3)
                                    $result_get_genfit = mysqli_query($conn, $query_get_genfit);
                                    $row_genfit = mysqli_fetch_assoc($result_get_genfit);
                                    ?>
                                    <P>Generasi Terbaik : <?php echo $row_genfit['best_generation']; ?></P>
                                    <p>Fitness Score : <?php echo $row_genfit['fitness_score']; ?></p>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Member</th>
                                                <th>Nama Lapangan</th>
                                                <th>Hari</th>
                                                <th>Jam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $dataStock = mysqli_query($conn, "SELECT * FROM data_jadwal masuk, data_lapangan daftarLapangan, data_user daftarUser, data_hari daftarHari, data_jam daftarJam
                                                                        WHERE daftarLapangan.id_lapangan = masuk.id_lapangan && masuk.id_user = daftarUser.id_user && masuk.id_hari = daftarHari.id_hari && masuk.id_jam = daftarJam.id_jam");
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($dataStock)) {
                                                $namaUser = $data['nama_user'];
                                                $namaLapangan = $data['nama_lapangan'];
                                                $namaHari = $data['hari'];
                                                $namaJam = $data['jam'];
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= ucwords($namaUser); ?></td>
                                                <td><?= ucwords($namaLapangan); ?></td>
                                                <td><?= $namaHari; ?></td>
                                                <td><?= $namaJam; ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <script>
                            // Fungsi untuk memuat konten melalui AJAX
                            function loadContent(url, isInMain) {
                            fetch(url)
                                .then(response => response.text())
                                .then(data => {
                                if (isInMain) {
                                    document.querySelector(".tabelproduk").innerHTML = data;
                                } else {
                                    document.body.innerHTML = data;
                                }
                                })
                                .catch(error => console.error('Error:', error));
                            }
                            document.getElementById("generate-jadwal-button").addEventListener("click", function(event) {
                            event.preventDefault();
                            loadContent("algoritma_genetika.php");
                        });
                        </script>
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
</html>