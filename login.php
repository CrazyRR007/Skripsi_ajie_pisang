<?php
//function untuk connect database
require 'function.php';

//function login dengan mencocokkan data dari data_user
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['pass'];

  $checkDatabase = mysqli_query($conn, "SELECT * FROM data_user where username='$username' and password='$password'");
  $data = mysqli_fetch_assoc($checkDatabase);

  if ($data['username'] == $username && $data['password'] == $password) {
    $_SESSION['log'] = 'true';
    $_SESSION['tipe_akun'] = $data['tipe_akun'];
    $_SESSION['idUser'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama_user'];
    switch ($data['tipe_akun']) {
      case "admin":
          header("location:adm/index.php");
          break;
      case "member":
          header("location:usr/index.php");
          break;
  }
  } else {
    header('location:login.php');
  }
} //function mengecek sesi login if

if (!isset($_SESSION['log'])) {

} else {
  switch ($_SESSION['tipe_akun']) {
    case "admin":
        header("location:adm/index.php");
        break;
    case "user":
        header("location:usr/index.php");
        break;
  }
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login Aplikasi Inventory</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" type="image/png" href="img/icons/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css" />
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css" />
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css" />
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="css/util.css" />
  <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>

<body style="background-color: #666666">
  <div class="limiter">
    <div class="container-login100">
        <form method="post" class="login100-form validate-form">
          <span class="login100-form-title p-b-43">
            Login Aplikasi
          </span>
          <div class="form-group">
            Username
            <input type="text" class="form-control form-control-user" id="exampleInputEmail"
              aria-describedby="emailHelp" name="username" placeholder="Enter Email Address..." />
          </div>

          <div class="form-group">
            Password
            <input type="password" class="form-control form-control-user" id="exampleInputPassword"
              placeholder="Password" name="pass" />
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" name="login">Login</button>
          </div>
        </form>
    </div>
  </div>

  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendor/animsition/js/animsition.min.js"></script>
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <script src="js/main.js"></script>
</body>

</html>