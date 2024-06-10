<?php
//function untuk mengecek keadaan login
if (isset($_SESSION['log'])) {

} else {
    header('location:../login.php');
}
?>