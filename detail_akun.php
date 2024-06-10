<?php
//function untuk connect database
include 'function.php';

//function untuk mengecek sudah login / blm
include 'check.php';

//parsing query id user
$idUser = $_GET['id'];

//parsing informasi detail user dari tabel data_user
$getData = mysqli_query($conn, "SELECT * FROM data_user WHERE id_user='$idUser'");
$fetchArray = mysqli_fetch_array($getData);
$namaLengkap = $fetchArray['nama_lengkap'];
$username = $fetchArray['username'];
$password = $fetchArray['password'];
$email = $fetchArray['email'];
$alamat = $fetchArray['alamat'];
$tipeAkun = $fetchArray['tipe_akun'];
$fotoProfil = $fetchArray['foto_profil'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/png" href="img/icons/favicon.ico" />

    <title>Aplikasi Inventory - Toko Sukses</title>

    <!-- Custom fonts for this template-->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- template table bootstrap 4 -->
    <link
      href="vendor/datatables/dataTables.bootstrap4.min.css"
      rel="stylesheet"
    />
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
<!-- Sidebar -->
      <ul
        class="navbar-nav bg-dark sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!-- Sidebar - Brand -->
        <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
          href="index.php"
        >
          <div class="sidebar-brand-icon">
            <i class="fas fa-store"></i>
          </div>
          <div class="sidebar-brand-text mx-2">Toko Sukses</div>
        </a>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading Data Master -->
        <div class="sidebar-heading">Data Master</div>

        <!-- Nav Item - Data Akun -->
        <li class="nav-item active">
          <a class="nav-link" href="akun.php">
            <i class="fas fa-id-card"></i>
            <span>Data Akun</span></a
          >
        </li>

         <!-- Nav Item - Data Supplier -->
         <li class="nav-item">
          <a class="nav-link" href="supplier.php">
            <i class="fas fa-truck"></i>
            <span>Data Supplier</span></a
          >
        </li>

        <!-- Nav Item - Data Customer -->
        <li class="nav-item">
          <a class="nav-link" href="customer.php">
            <i class="fas fa-users"></i>
            <span>Data Customer</span></a
          >
        </li>

        <!-- Nav Item - Data Stock -->
        <li class="nav-item">
          <a class="nav-link" href="stock.php">
            <i class="fas fa-cubes"></i>
            <span>Data Stock Barang</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading Data Master -->
        <div class="sidebar-heading">Data Transaksi</div>

        <!-- Nav Item - Data Barang Masuk -->
        <li class="nav-item">
          <a class="nav-link" href="barang_masuk.php">
            <i class="fas fa-cube"></i>
            <span>Data Barang Masuk</span></a
          >
        </li>

        <!-- Nav Item - Data Barang Keluar -->
        <li class="nav-item">
          <a class="nav-link" href="barang_keluar.php">
            <i class="fas fa-cube"></i>
            <span>Data Barang Keluar</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading">Laporan</div>

        <!-- Nav Item - Laporan Stok Barang -->
        <li class="nav-item">
          <a class="nav-link" href="">
            <i class="fas fa-file-invoice"></i>
            <span>Laporan Stock Inventory</span></a
          >
        </li>

        <!-- Nav Item - Laporan Barang Masuk -->
        <li class="nav-item">
          <a class="nav-link" href="">
            <i class="fas fa-file-invoice"></i>
            <span>Laporan Barang Masuk</span></a
          >
        </li>

        <!-- Nav Item - Laporan Barang Keluar -->
        <li class="nav-item">
          <a class="nav-link" href="">
            <i class="fas fa-file-invoice"></i>
            <span>Laporan Barang Keluar</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading">Logout</div>

        <!-- Nav Item - Laporan Stok Barang -->
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fas fa-power-off"></i>
            <span>Logout</span></a
          >
        </li>
      </ul>
      <!-- End of Sidebar -->


      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav
            class="navbar navbar-expand navbar-light bg-secondary topbar mb-4 static-top shadow"
          >
            <!-- Sidebar Toggle (Topbar) -->
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form
              class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            >
              <div class="input-group">
                <input
                  type="text"
                  class="form-control bg-light border-0 small"
                  placeholder="Search for..."
                  aria-label="Search"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="searchDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div
                  class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                  aria-labelledby="searchDropdown"
                >
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control bg-light border-0 small"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2"
                      />
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              <!-- Nav Item - Alerts -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="alertsDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-bell fa-fw"></i>
                  <!-- Counter - Alerts -->
                  <span class="badge badge-danger badge-counter"></span>
                </a>
                <!-- Dropdown - Alerts -->
                <div
                  class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="alertsDropdown"
                >
                  <h6 class="dropdown-header">Notifikasi</h6>
                  <a
                    class="dropdown-item text-center small text-gray-500"
                    href="#"
                    >Show All Alerts</a
                  >
                </div>
              </li>

              <!-- Nav Item - Messages -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="messagesDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-envelope fa-fw"></i>
                  <!-- Counter - Messages -->
                  <span class="badge badge-danger badge-counter"></span>
                </a>
                <!-- Dropdown - Messages -->
                <div
                  class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="messagesDropdown"
                >
                  <h6 class="dropdown-header">Pesan</h6>
                  <a
                    class="dropdown-item text-center small text-gray-500"
                    href="#"
                    >Read More Messages</a
                  >
                </div>
              </li>

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="mr-2 d-none d-lg-inline text-white small"
                    >Douglas McGee</span
                  >
                  <img
                    class="img-profile rounded-circle"
                    src="img/undraw_profile.svg"
                  />
                </a>
                <!-- Dropdown - User Information -->
                <div
                  class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown"
                >
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a>
                  <div class="dropdown-divider"></div>
                  <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#logoutModal"
                    name="logout"
                  >
                    <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                    ></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h3 mb-0 text-gray-800 col-md-9">Detail Akun</h1>
              <a
                    href="akun.php"
                    class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                    role="button"
                    ><i class="fas fa-arrow-left fa-sm text-white-50"></i>
                    Back to Main Menu</a
                  >
                  <a
                    href="#"
                    class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"
                    role="button"
                    data-toggle="modal"
                    data-target="#editAccount<?= $idUser; ?>"
                    ><i class="fas fa-edit fa-sm text-white-50"></i> Edit
                    Akun</a
                  >
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 xs-margin-30px-bottom">
                <div class="team-single-img">
                  
                  <img
                    class="img-thumbnail"
                    src="https://bootdey.com/img/Content/avatar/avatar7.png"
                    alt=""
                    style="width: 75%"
                  />

                  <!-- Edit Data Modal -->
                  <div
                    class="modal fade"
                    tabindex="-1"
                    aria-labelledby="editModalLabel"
                    aria-hidden="true"
                    id="editAccount<?= $idUser; ?>"
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
                              <label for="emailUser">Email</label>
                              <input
                                type="email"
                                name="emailUser"
                                id="emailUser"
                                value="<?= $email; ?>"
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

                            <div class="form-group">
                              <label for="tipeAkun">Tipe Akun</label>
                              <select
                                class="form-control"
                                name="tipeAkun"
                                id="tipeAkun"
                                value="<?= $tipeAkun; ?>"
                                required
                              >
                                <option>Super Admin</option>
                                <option>Admin</option>
                                <option>User</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="fotoProfil">Pilih Foto</label>
                              <input
                                type="file"
                                class="form-control-file"
                                name="fotoProfil"
                                id="fotoProfil"
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
                </div>
              </div>

              <div class="col-lg-9 col-md-8">
                <div
                  class="team-single-text padding-30px-left sm-no-padding-left"
                >
                  <div class="contact-info-section margin-40px-tb">
                    <div class="row">
                      <div class="col-md-3 col-3">
                        <strong class="margin-10px-left text-orange">
                          Nama Lengkap</strong
                        >
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
                          Username</strong
                        >
                      </div>
                      <div class="col-md-5 col-5">
                        <p>
                          : <?= $username; ?>
                        </p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3 col-3">
                        <strong class="margin-10px-left text-lightred">
                          Email</strong
                        >
                      </div>
                      <div class="col-md-5 col-5">
                        <p>
                          : <?= $email; ?>
                        </p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3 col-3">
                        <strong class="margin-10px-left text-green">
                          Alamat</strong
                        >
                      </div>
                      <div class="col-md-5 col-5">
                        <p>
                          : <?= $alamat; ?>
                        </p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3 col-3">
                        <strong
                          class="margin-10px-left xs-margin-four-left text-purple"
                        >
                          Tipe Akun</strong
                        >
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
          <!-- /.container-fluid -->
          <div class="card shadow mb-4 m-3">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Data - Data Akun Lain
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
                      <th>Email</th>
                      <th>Tipe Akun</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $dataUser = mysqli_query($conn, "SELECT * FROM data_user WHERE id_user !='$idUser'");
                    $i = 1;
                    while ($data = mysqli_fetch_array($dataUser)) {
                      $idUser = $data['id_user'];
                      $namaLengkap = $data['nama_lengkap'];
                      $username = $data['username'];
                      $email = $data['email'];
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
                                                          <?= $email; ?>
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
                                                                  <label for="emailUser">Email</label>
                                                                  <input
                                                                    type="email"
                                                                    name="emailUser"
                                                                    id="emailUser"
                                                                    value="<?= $email; ?>"
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

                                                                <div class="form-group">
                                                                  <label for="tipeAkun">Tipe Akun</label>
                                                                  <select
                                                                    class="form-control"
                                                                    name="tipeAkun"
                                                                    id="tipeAkun"
                                                                    value="<?= $tipeAkun; ?>"
                                                                    required
                                                                  >
                                                                    <option>Super Admin</option>
                                                                    <option>Admin</option>
                                                                    <option>User</option>
                                                                  </select>
                                                                </div>

                                                                <div class="form-group">
                                                                  <label for="fotoProfil">Pilih Foto</label>
                                                                  <input
                                                                    type="file"
                                                                    class="form-control-file"
                                                                    name="fotoProfil"
                                                                    id="fotoProfil"
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
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-secondary">
          <div class="container my-0">
            <div class="copyright text-center my-auto">
              <span class="text-light"
                >Copyright &copy; Andryan - 31190080</span
              >
            </div>
          </div>
        </footer>
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
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

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
  </body>
</html>
