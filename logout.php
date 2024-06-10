<?php
//function untuk memulai sesi
session_start();

//function untuk memberhentikan sesi (logout)
session_destroy();

//function untuk redirect kembali ke halaman login
header('location:login.php');
?>