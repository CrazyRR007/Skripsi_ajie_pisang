<?php
//function untuk connect database
include 'function.php';

//function untuk mengecek sudah login / blm
include 'check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/png" href="img/icons/favicon.ico" />
    <link rel="stylesheet" href="css/style.css" />

    <title>Data Stock Barang</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- template table bootstrap 4 -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <!-- template datatables for export data -->
    <link href="css/datatables.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="h3 mb-0 text-gray-800 col-md-9">Export Data Stock Barang</h2>
                        <a href="stock.php" class="btn btn-danger btn-sm col-md2" role="button"><i
                                class="fas fa-arrow-left"></i> Back to Main Menu</a>

                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive table-striped">
                                <table class="table table-bordered" id="exportData" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $dataStock = mysqli_query($conn, "SELECT * FROM data_stock");
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($dataStock)) {
                                            $idBarang = $data['id_barang'];
                                            $namaBarang = $data['nama_barang'];
                                            $kategoriBarang = $data['kategori'];
                                            $jumlahBarang = $data['qty'];
                                            $hargaSatuan = $data['harga'];
                                            $hargaSatuanRp = "Rp. " . number_format($hargaSatuan, 2, ',', '.');
                                            $totalHarga = $hargaSatuan * $jumlahBarang;
                                            $totalHargaRp = "Rp. " . number_format($totalHarga, 2, ',', '.');
                                            $statusBarang = $data['status'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $i++; ?>
                                                </td>
                                                <td>
                                                    <?= $idBarang; ?>
                                                </td>
                                                <td>
                                                    <?= ucwords($namaBarang); ?>
                                                </td>
                                                <td>
                                                    <?= ucwords($kategoriBarang); ?>
                                                </td>
                                                <td>
                                                    <?= $jumlahBarang; ?>
                                                </td>
                                                <td>
                                                    <?= $hargaSatuanRp; ?>
                                                </td>
                                                <td>
                                                    <?= $totalHargaRp; ?>
                                                </td>
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
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Data Table for Export Data -->
    <script src="js/datatables.min.js"></script>
    <!-- Script for Export Data -->
    <script>
        $(document).ready(function () {
            var table = $('#exportData').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel', title: "Data Stock Barang", text: '<i class="fas fa-file-excel"></i> Excel',
                        className: 'btn btn-primary visible-lg-inline-block'
                    },
                    {
                        extend: 'pdf', title: "Data Stock Barang", text: '<i class="fas fa-file-pdf"></i> PDF',
                        className: 'btn btn-primary visible-lg-inline-block'
                    },
                    {
                        extend: 'print', title: "Data Stock Barang", text: '<i class="fas fa-print"></i> Print',
                        className: 'btn btn-primary visible-lg-inline-block'
                    }
                ]
            });
            table.buttons().container()
                .appendTo('#wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>