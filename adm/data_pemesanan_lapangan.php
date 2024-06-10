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
                            <h2 class="h3 mb-0 text-gray-800 col-md-8">Data Pemesanan</h2>
                            <a href="export_stock.php" class="btn btn-info btn-sm" role="button">
                                <i class="fas fa-file"></i> Data Retur
                            </a>
                            
                            <a href="export_masuk.php" class="btn btn-primary btn-sm" role="button" >
                                <i class="fas fa-file-export"></i> Export Data
                            </a>
                            
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addIncomingModal" >
                                <i class="fas fa-plus"></i>
                                Pesan Lapangan
                            </button>
                        </div>
                        
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Data - Data Pemesanan
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-striped">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Member</th>
                                                <th>Nama Lapangan</th>
                                                <th>Hari</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = $_SESSION['idUser'];
                                            $dataStock = mysqli_query($conn, "SELECT * FROM data_pesan_lapangan masuk, data_lapangan daftarLapangan, data_user daftarUser, data_hari daftarHari WHERE daftarLapangan.id_lapangan = masuk.id_lapangan && masuk.id_user = daftarUser.id_user && masuk.status = 'diproses' && masuk.id_hari = daftarHari.id_hari");
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($dataStock)) {
                                                $idMasuk = $data['id_pesanan'];
                                                $idLapangan = $data['id_lapangan'];
                                                $namaHari = $data['hari'];
                                                $tanggal = $data['tanggal_pesanan'];
                                                $namaLapangan = $data['nama_lapangan'];
                                                $namaUser = $data['nama_user'];
                                                $foto = $data['foto_pemesanan'];
                                                $keterangan = $data['keterangan'];
                                                $status = $data['status'];
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $tanggal; ?></td>
                                                <td><?= ucwords($namaUser); ?></td>
                                                <td><?= ucwords($namaLapangan); ?></td>
                                                <td><?= $namaHari; ?></td>
                                                <td><?= $keterangan; ?></td>
                                                <td><?= ucwords($status); ?></td>
                                                <td class="d-sm-flex justify-content-between align-items-center" >
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editStockModal<?= $idMasuk ?>" >
                                                        <i class="fas fa-edit"></i> Verifikasi
                                                    </button>
                                                    <input type="hidden" name="idHapus" value="<?= $idMasuk; ?>" />
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteStockModal<?= $idMasuk ?>" >
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- Verifikasi Data Modal -->
                                            <div class="modal fade" id="editStockModal<?= $idMasuk ?>" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" >
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="addModalLabel">
                                                                Verifikasi Data Pesanan
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="idMasuk" value="<?= $idMasuk; ?>" />
                                                                <div class="form-group">
                                                                    <label for="namaUser">Nama User</label>
                                                                    <input type="text" name="namaUser" id="namaUser" value="<?= $namaUser ?>" class="form-control" readonly />
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label for="namaLapangan">Nama Lapangan</label>
                                                                    <input type="text" name="namaLapangan" id="namaLapangan" value="<?= $namaLapangan ?>" class="form-control" readonly />
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="namaHari">Hari</label>
                                                                    <input type="text" name="namaHari" id="namaHari" value="<?= $namaHari ?>" class="form-control" readonly />
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="keterangan">Keterangan</label>
                                                                    <input type="text" name="keterangan" id="keterangan" value="<?= $keterangan ?>" class="form-control" readonly />
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="keterangan">Foto Bukti Pembayaran</label>
                                                                    <input type="image" name="fotoPemesanan" id="fotoPemesanan" value="<?= $foto ?>" class="form-control" readonly />
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="d-sm-flex modal-footer mb-4">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal" >
                                                                    <i class="fas fa-trash"></i> Batal
                                                                </button>
                                                                <button type="submit" class="btn btn-warning" name="verifikasiPesanan" >
                                                                    <i class="fas fa-edit"></i> Verifikasi
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Data Modal -->
                                            <div class="modal fade" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" id="deleteStockModal<?= $idMasuk; ?>" >
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">
                                                                Hapus Pesanan ?
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post">
                                                            <div class="modal-body text-center">
                                                                Apakah anda yakin ingin menghapus Pesanan
                                                                <b>
                                                                    <?= $namaUser ?>
                                                                </b>
                                                                ?
                                                            </div>
                                                            <input type="hidden" name="idHapus" value="<?= $idMasuk; ?>" />
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
    <div class="modal fade" id="addIncomingModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">
                        Pesan Lapangan 
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tanggalIncoming">Tanggal</label>
                            <input type="date" name="tglIncoming" id="tanggalIncoming" placeholder="Tanggal" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label for="namaLapangan">Nama Lapangan</label>
                            <select class="form-control" name="namaLapangan" id="namaLapangan" required >
                                <?php
                                    $dataNamaBarang = mysqli_query($conn, "SELECT * FROM data_lapangan");
                                    while ($fetchArray = mysqli_fetch_array($dataNamaBarang)) {
                                    $idLapangan = $fetchArray['id_lapangan'];
                                    $namaLapangan = $fetchArray['nama_lapangan'];
                                ?>
                                <option value="<?= $idLapangan; ?>">
                                    <?= ucwords($namaLapangan); ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hari">Request Hari</label>
                            <select class="form-control" name="hari" id="hari" required >
                                <?php
                                    $dataNamaBarang = mysqli_query($conn, "SELECT * FROM data_hari");
                                    while ($fetchArray = mysqli_fetch_array($dataNamaBarang)) {
                                    $idHari = $fetchArray['id_hari'];
                                    $namaHari = $fetchArray['hari'];
                                ?>
                                <option value="<?= $idHari; ?>">
                                    <?= ucwords($namaHari); ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fotoPembayaran">Pilih Foto</label>
                            <input type="file" class="form-control-file" name="fotoPembayaran" id="fotoPembayaran" required/>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="textarea" min="0" name="keterangan" id="keterangan" placeholder="Ket. Barang Masuk" class="form-control" required />
                        </div>
                    </div>

                    <div class="d-sm-flex modal-footer justify-content-between mb-4">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-trash"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary" name="pesanLapangan" >
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</html>