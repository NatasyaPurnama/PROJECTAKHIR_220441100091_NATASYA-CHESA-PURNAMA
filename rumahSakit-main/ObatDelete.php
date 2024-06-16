<?php
include("koneksi.php");
$noregistrasi = $_GET['id_obat'];
$result = mysqli_query($mysqli, "DELETE FROM tabel_obat WHERE
id_obat = $noregistrasi");
header("Location:Obat.php");
?>
