<?php
require "../function.php";

$query_get_configuration = "SELECT * FROM data_konfigurasi ";
$result_get_configuration = mysqli_query($conn, $query_get_configuration);
$row_configuration = mysqli_fetch_assoc($result_get_configuration);

?>