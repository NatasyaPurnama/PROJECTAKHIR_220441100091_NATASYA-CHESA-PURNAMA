<?php
include("koneksi.php");
$noregistrasi = $_GET['id_pasien'];
$result = mysqli_query($mysqli, "DELETE FROM tabel_pasien WHERE id_pasien = $noregistrasi");
header("Location:Pasien.php");
?>