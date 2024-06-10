<?php
// function untuk memulai sesi
session_start();

// function untuk mengakses / connect db_inventory
$conn = mysqli_connect("localhost", "root", "", "dbajie");

// function untuk menambah data akun ke table data_user
if (isset($_POST['addNewAccount'])) {
    $namaUser = $_POST['namaUser'];
    $usernameUser = $_POST['usernameUser'];
    $no_tlp = $_POST['no_tlp'];
    $passwordUser = $_POST['passwordUser'];
    $alamatUser = $_POST['alamat'];

    //encrypt password md5 -> $passwordUser = md5($_POST['passwordUser']);

    $addToUserTable = mysqli_query($conn, "INSERT INTO data_user (nama_user, username, no_tlp, password, alamat, tipe_akun) VALUES ('$namaUser', '$usernameUser', '$no_tlp', '$passwordUser', '$alamatUser', 'member')");

    if ($addToUserTable) {
        echo "Data User BERHASIL di Tambahkan";
    } else {
        echo "Data User GAGAL di Tambahkan";
    }
}

// function untuk mengedit / UPDATE tabel data_user
if (isset($_POST['editAccount'])) {
    $idUser = $_POST['idUser'];
    $namaUser = $_POST['namaUser'];
    $usernameUser = $_POST['usernameUser'];
    $no_tlp = $_POST['no_tlp'];
    $passwordUser = $_POST['passwordUser'];
    $alamatUser = $_POST['alamat'];

    //encrypt password md5 -> $passwordUser = md5($_POST['passwordUser']);

    $editUserTable = mysqli_query($conn, "UPDATE data_user SET nama_user='$namaUser', username='$usernameUser', no_tlp='$no_tlp', password='$passwordUser', alamat='$alamatUser' WHERE id_user='$idUser'");

    if ($editUserTable) {
        echo "Data User BERHASIL di EDIT";
    } else {
        echo "Data User GAGAL di EDIT";
    }
}

// function untuk menghapus / DELETE tabel data_user
if (isset($_POST['deleteAccount'])) {
    $idHapus = $_POST['idHapus'];

    $hapusUserTable = mysqli_query($conn, "DELETE FROM data_user WHERE id_user='$idHapus'");

    if ($hapusUserTable) {
        echo "Data User BERHASIL di HAPUS";
    } else {
        echo "Data User GAGAL di HAPUS";
    }
}

//function untuk menambah data Lapangan ke table data_lapangan
if (isset($_POST['addNewLapangan'])) {
    $idLapangan = $_POST['idBarang'];
    $namaLapangan = $_POST['namaBarang'];
    $alamat = $_POST['alamat'];

    $addToLapanganTable = mysqli_query($conn, "INSERT INTO data_lapangan (id_lapangan, nama_lapangan, alamat) VALUES ('$idLapangan', '$namaLapangan', '$alamat')");

    if ($addToLapanganTable) {
        echo "Data Lapangan BERHASIL di Tambahkan";
    } else {
        echo "Data Lapangan GAGAL di Tambahkan";
    }
}

//function untuk mengedit / UPDATE tabel data_lapangan
if (isset($_POST['editLapangan'])) {
    $idLapangan = $_POST['idBarang'];
    $namaLapangan = $_POST['namaBarang'];
    $alamat = $_POST['alamat'];

    $editLapanganTable = mysqli_query($conn, "UPDATE data_lapangan SET nama_lapangan='$namaLapangan', alamat='$alamat' WHERE id_lapangan='$idLapangan'");

    if ($editLapanganTable) {
        echo "Data Lapangan BERHASIL di EDIT";
    } else {
        echo "Data Lapangan GAGAL di EDIT";
    }
}

// function untuk menghapus / DELETE tabel data_lapangan
if (isset($_POST['deleteLapangan'])) {
    $idHapus = $_POST['idHapus'];

    $hapusLapanganTable = mysqli_query($conn, "DELETE FROM data_lapangan WHERE id_lapangan='$idHapus'");

    if ($hapusLapanganTable) {
        echo "Data Lapangan BERHASIL di HAPUS";
    } else {
        echo "Data Lapangan GAGAL di HAPUS";
    }
}


//function untuk menambah data customer ke table data_customer
if (isset($_POST['addNewCustomer'])) {
    $idCustomer = $_POST['idCustomer'];
    $namaCustomer = $_POST['namaCustomer'];
    $alamatCustomer = $_POST['alamatCustomer'];
    $telpCustomer = $_POST['telpCustomer'];

    $addToCustomerTable = mysqli_query($conn, "INSERT INTO data_customer (id_customer, nama_customer, alamat_customer, telp_customer) VALUES ('$idCustomer', '$namaCustomer', '$alamatCustomer', '$telpCustomer')");

    if ($addToCustomerTable) {
        echo "Data Supplier BERHASIL di Tambahkan";
    } else {
        echo "Data Supplier GAGAL di Tambahkan";
    }
}

//function untuk mengedit / UPDATE tabel data_customer
if (isset($_POST['verifikasiPesanan'])) {
    $idMasuk = $_POST['idMasuk'];

    $verifikasiTable = mysqli_query($conn, "UPDATE data_pesan_lapangan SET status = 'terverifikasi' WHERE id_pesanan='$idMasuk'");

    if ($verifikasiTable) {
        echo "Data Pesanan BERHASIL di Verifikasi";
    } else {
        echo "Data Pesanan GAGAL di Verifikasi";
    }
}

// function untuk menghapus / DELETE tabel data_customer
if (isset($_POST['deleteCustomer'])) {
    $idHapus = $_POST['idHapus'];

    $hapusCustomerTable = mysqli_query($conn, "DELETE FROM data_customer WHERE id_customer='$idHapus'");

    if ($hapusCustomerTable) {
        echo "Data Customer BERHASIL di HAPUS";
    } else {
        echo "Data Customer GAGAL di HAPUS";
    }
}

//function untuk menambah data stok barang ke table data_stock
if (isset($_POST['addNewStock'])) {
    $idBarang = $_POST['idBarang'];
    $namaBarang = strtolower($_POST['namaBarang']);
    $kategoriBarang = strtolower($_POST['kategoriBarang']);
    $jumlahBarang = $_POST['jumlahBarang'];
    $hargaSatuan = $_POST['hargaSatuan'];
    $totalHarga = $jumlahBarang * $hargaSatuan;
    $statusBarang = 'tersedia';

    $addToStockTable = mysqli_query($conn, "INSERT INTO data_stock (id_barang, nama_barang, kategori, qty, harga, total_harga, status) VALUES ('$idBarang', '$namaBarang', '$kategoriBarang', '$jumlahBarang', '$hargaSatuan', '$totalHarga', '$statusBarang')");

    if ($addToStockTable) {
        echo "Data Stock BERHASIL di Tambahkan";
    } else {
        echo "Data Stock GAGAL di Tambahkan";
    }
}

//function untuk mengedit / UPDATE tabel data_stock
if (isset($_POST['editStock'])) {
    $idBarang = $_POST['idStock'];
    $namaBarang = strtolower($_POST['namaBarang']);
    $kategoriBarang = strtolower($_POST['kategoriBarang']);
    $jumlahBarang = $_POST['jumlahBarang'];
    $hargaSatuan = $_POST['hargaSatuan'];
    $totalHarga = $jumlahBarang * $hargaSatuan;
    $statusBarang = 'tersedia';

    if ($jumlahBarang > 0) {
        $statusBarang = 'tersedia';
    } else {
        $statusBarang = 'habis';
    }

    $editStockTable = mysqli_query($conn, "UPDATE data_stock SET id_barang='$idBarang', nama_barang='$namaBarang', kategori='$kategoriBarang', qty='$jumlahBarang', harga='$hargaSatuan', total_harga = '$totalHarga', status='$statusBarang' WHERE id_barang='$idBarang'");

    if ($editStockTable) {
        echo "Data Stock BERHASIL di Tambahkan";
    } else {
        echo "Data Stock GAGAL di Tambahkan";
    }
}

// function untuk menghapus / DELETE tabel stock
if (isset($_POST['deleteStock'])) {
    $idHapus = $_POST['idHapus'];

    $hapusSupplierTable = mysqli_query($conn, "DELETE FROM data_stock WHERE id_barang='$idHapus'");

    if ($hapusSupplierTable) {
        echo "Data Stock BERHASIL di HAPUS";
    } else {
        echo "Data Stock GAGAL di HAPUS";
    }
}

//function untuk menambah data barang masuk ke table data_pesan_lapangan
if (isset($_POST['pesanLapangan'])) {
    $tanggalLapanganMasuk = $_POST['tglIncoming'];
    $idLapanganMasuk = $_POST['namaLapangan'];
    $hariMasuk = $_POST['hari'];
    $fotoPembayaran = $_POST['fotoPembayaran'];
    $keterangan = $_POST['keterangan'];
    $idUser = $_SESSION['idUser'];

    $addToPesanLapanganTable = mysqli_query($conn, "INSERT INTO data_pesan_lapangan (tanggal_pesanan, id_lapangan, id_user , id_hari, foto_pemesanan, keterangan, status)
    VALUES ('$tanggalLapanganMasuk', '$idLapanganMasuk','$idUser' ,'$hariMasuk', '$fotoPembayaran', '$keterangan', 'diproses')");

    if ($addToPesanLapanganTable) {
        echo "Pesan Lapangan BERHASIL di Tambahkan";
    } else {
        echo "Pesan Lapangan GAGAL di Tambahkan";
    }
}

//function untuk mengedit / UPDATE tabel data_barang_masuk
if (isset($_POST['editIncomingGoods'])) {
    $idMasuk = $_POST['idIncoming'];
    $tanggalBarangMasuk = $_POST['tglIncoming'];
    $idBarangMasuk = $_POST['namaBarang'];
    $idSupplier = $_POST['namaSupplier'];
    $hargaSatuan = $_POST['hargaSatuan'];
    $jumlahBarangBaru = $_POST['jumlahBarang'];
    $totalHarga = $hargaSatuan * $jumlahBarangBaru;
    $keterangan = $_POST['keterangan'];

    $dataBarangMasuk = mysqli_query($conn, "SELECT * FROM data_barang_masuk WHERE id_masuk='$idMasuk'");
    $fetchArray = mysqli_fetch_array($dataBarangMasuk);
    $jumlahBarangLama = $fetchArray['qty_masuk'];
    $totalHargaLama = $fetchArray['total_harga'];

    $cekStockSekarang = mysqli_query($conn, "SELECT * FROM data_stock WHERE id_barang='$idBarangMasuk'");
    $ambilDataStock = mysqli_fetch_array($cekStockSekarang);
    $idStockBarang = $ambilDataStock['id_barang'];
    $jumlahTotalStock = $ambilDataStock['qty'];
    $totalHargaStock = $ambilDataStock['total_harga'];

    //jika jumlah barang masuk > 0 maka proses akan dilanjutkan karena valid
    if ($jumlahBarangBaru > 0) {
        $stockBaru = ($jumlahTotalStock - $jumlahBarangLama) + $jumlahBarangBaru;
        $totalHargaBaru = ($totalHargaStock - $totalHargaLama) + $totalHarga;
        $addToIncomingTable = mysqli_query($conn, "UPDATE data_barang_masuk SET id_barang='$idBarangMasuk', id_supplier='$idSupplier', tanggal='$tanggalBarangMasuk', qty_masuk='$jumlahBarangBaru', harga='$hargaSatuan', total_harga='$totalHarga', keterangan='$keterangan' WHERE id_masuk = '$idMasuk'");

        $addToStockTable = mysqli_query($conn, "UPDATE data_stock SET qty='$stockBaru', total_harga='$totalHargaBaru',status= 'tersedia' WHERE id_barang = '$idBarangMasuk'");

        if ($addToIncomingTable) {
            echo "Data Barang Masuk BERHASIL di EDIT";
        } else {
            echo "Data Barang Masuk GAGAL di EDIT";
        }
    }
}

// function untuk menghapus / DELETE tabel data_barang_masuk
if (isset($_POST['deleteIncoming'])) {
    $idHapus = $_POST['idHapus'];
    $idBarangMasuk = $_POST['idBarang'];

    $cekStockSekarang = mysqli_query($conn, "SELECT * FROM data_stock WHERE id_barang='$idBarangMasuk'");
    $ambilDataStock = mysqli_fetch_array($cekStockSekarang);
    $jumlahTotalStock = $ambilDataStock['qty'];
    $totalHargaStock = $ambilDataStock['total_harga'];

    $dataBarangMasuk = mysqli_query($conn, "SELECT * FROM data_barang_masuk WHERE id_masuk='$idHapus'");
    $fetchArray = mysqli_fetch_array($dataBarangMasuk);
    $jumlahTotalMasuk = $fetchArray['qty_masuk'];
    $totalHargaMasuk = $fetchArray['total_harga'];

    $stockBaru = $jumlahTotalStock - $jumlahTotalMasuk;
    $totalHargaBaru = $totalHargaStock - $totalHargaMasuk;

    $updateStockBarang = mysqli_query($conn, "UPDATE data_stock SET qty='$stockBaru', total_harga='$totalHargaBaru' WHERE id_barang = '$idBarangMasuk'");

    $hapusUserTable = mysqli_query($conn, "DELETE FROM data_barang_masuk WHERE id_masuk='$idHapus'");

    if ($hapusUserTable& $updateStockBarang) {
        echo "Data Barang Masuk BERHASIL di HAPUS";
    } else {
        echo "Data Barang Masuk GAGAL di HAPUS";
    }
}

//function untuk menambah tabel / INSERT data_barang_keluar
if (isset($_POST['addOutcomingGoods'])) {
    $tanggalBarangKeluar = $_POST['tglOutcoming'];
    $idBarangKeluar = $_POST['namaBarang'];
    $jumlahBarangKeluar = $_POST['jumlahBarang'];
    $hargaSatuan = $_POST['hargaSatuan'];
    $totalHarga = $jumlahBarangKeluar * $hargaSatuan;
    $idCustomer = $_POST['namaCustomer'];
    $keterangan = $_POST['keterangan'];

    $cekStockSekarang = mysqli_query($conn, "SELECT * FROM data_stock WHERE id_barang='$idBarangKeluar'");
    $ambilDataStock = mysqli_fetch_array($cekStockSekarang);

    $stockLama = $ambilDataStock['qty'];
    $totalHargaLama = $ambilDataStock['total_harga'];

    //jika stok lama > 0 dan jumlah barang keluar < jumlah stok lama maka data valid dan fungsi akan dilanjutkan
    if ($stockLama > 0 && $jumlahBarangKeluar <= $stockLama) {
        $stockBaru = $stockLama - $jumlahBarangKeluar;
        $totalHargaBaru = $totalHargaLama - $totalHarga;

        $updateStockBarang = mysqli_query($conn, "UPDATE data_stock SET qty='$stockBaru', total_harga='$totalHargaBaru' WHERE id_barang = '$idBarangKeluar'");

        if ($stockBaru == 0) {
            $addToStockTable = mysqli_query($conn, "UPDATE data_stock SET status= 'habis' WHERE id_barang = '$idBarangKeluar'");
        }

        $addToOutcomingTable = mysqli_query($conn, "INSERT INTO data_barang_keluar (tanggal, id_barang, qty_keluar, harga, total_harga, id_customer, keterangan) VALUES ('$tanggalBarangKeluar', '$idBarangKeluar', '$jumlahBarangKeluar', '$hargaSatuan', '$totalHarga', '$idCustomer', '$keterangan')");

        if ($addToOutcomingTable) {
            echo "Data Barang Keluar BERHASIL di Tambahkan";
        } else {
            echo "Data Barang Keluar GAGAL di Tambahkan";
        }
    } else {
        header('location:404.php');
    }
}

//function untuk mengedit / UPDATE tabel data_barang_keluar
if (isset($_POST['editOutcomingGoods'])) {
    $idKeluar = $_POST['idOutcoming'];
    $tanggalBarangKeluar = $_POST['tglOutcoming'];
    $idBarangKeluar = $_POST['namaBarang'];
    $idCustomer = $_POST['namaCustomer'];
    $hargaSatuan = $_POST['hargaSatuan'];
    $jumlahBarangBaru = $_POST['jumlahBarang'];
    $totalHarga = $hargaSatuan * $jumlahBarangBaru;
    $keterangan = $_POST['keterangan'];

    $dataBarangKeluar = mysqli_query($conn, "SELECT * FROM data_barang_keluar WHERE id_keluar='$idKeluar'");
    $fetchArray = mysqli_fetch_array($dataBarangKeluar);
    $jumlahBarangLama = $fetchArray['qty_keluar'];
    $totalHargaLama = $fetchArray['total_harga'];

    $cekStockSekarang = mysqli_query($conn, "SELECT * FROM data_stock WHERE id_barang='$idBarangKeluar'");
    $ambilDataStock = mysqli_fetch_array($cekStockSekarang);
    $idStockBarang = $ambilDataStock['id_barang'];
    $jumlahTotalStock = $ambilDataStock['qty'];
    $totalHargaStock = $ambilDataStock['total_harga'];

    //jika jumlah barang masuk > 0 maka proses akan dilanjutkan karena valid
    if ($jumlahBarangBaru > 0) {
        $stockBaru = ($jumlahTotalStock - $jumlahBarangLama) + $jumlahBarangBaru;
        $totalHargaBaru = ($totalHargaStock - $totalHargaLama) + $totalHarga;

        $addToOutcomingTable = mysqli_query($conn, "UPDATE data_barang_keluar SET id_barang='$idBarangKeluar', id_customer='$idCustomer', tanggal='$tanggalBarangKeluar', qty_keluar='$jumlahBarangBaru', harga='$hargaSatuan', total_harga='$totalHarga', keterangan='$keterangan' WHERE id_keluar = '$idKeluar'");
        $addToStockTable = mysqli_query($conn, "UPDATE data_stock SET qty='$stockBaru', status= 'tersedia', total_harga='$totalHargaBaru' WHERE id_barang = '$idBarangKeluar'");

        if ($addToOutcomingTable) {
            echo "Data Barang Keluar BERHASIL di EDIT";
        } else {
            echo "Data Barang Keluar GAGAL di EDIT";
        }
    }
}

// function untuk menghapus / DELETE tabel data_barang_keluar
if (isset($_POST['deleteOutcoming'])) {
    $idHapus = $_POST['idHapus'];
    $idBarangKeluar = $_POST['idBarang'];

    $cekStockSekarang = mysqli_query($conn, "SELECT * FROM data_stock WHERE id_barang='$idBarangKeluar'");
    $ambilDataStock = mysqli_fetch_array($cekStockSekarang);
    $jumlahTotalStock = $ambilDataStock['qty'];

    $dataBarangKeluar = mysqli_query($conn, "SELECT * FROM data_barang_keluar WHERE id_keluar='$idHapus'");
    $fetchArray = mysqli_fetch_array($dataBarangKeluar);
    $jumlahTotalKeluar = $fetchArray['qty_keluar'];

    $stockBaru = $jumlahTotalStock + $jumlahTotalKeluar;

    $updateStockBarang = mysqli_query($conn, "UPDATE data_stock SET qty='$stockBaru', status='tersedia' WHERE id_barang = '$idBarangKeluar'");

    $hapusUserTable = mysqli_query($conn, "DELETE FROM data_barang_keluar WHERE id_keluar='$idHapus'");

    if ($hapusUserTable& $updateStockBarang) {
        echo "Data Barang Keluar BERHASIL di HAPUS";
    } else {
        echo "Data Barang Keluar GAGAL di HAPUS";
    }
}

// function untuk mengupdate data konfigurasi
if (isset($_POST['updateConfig'])) {
    $populationSize = $_POST['populationSize'];
    $mutationRate = $_POST['mutationRate'];
    $generations = $_POST['generations'];

    $sql = mysqli_query($conn, "SELECT * FROM data_konfigurasi");
    $array = mysqli_fetch_array($sql);

    $dummy = $array['populationSize'];

    $verifikasiTable = mysqli_query($conn, "UPDATE data_konfigurasi SET populationSize = $populationSize, mutationRate = $mutationRate, generations = $generations WHERE populationSize = '$dummy'");

    if ($verifikasiTable) {
        echo "Konfigurasi Berhasil diperbarui";
    } else {
        echo "Konfigurasi Gagal Diperbarui";
    }
}

if (isset($_POST['generateButton'])) {
    
}
?>