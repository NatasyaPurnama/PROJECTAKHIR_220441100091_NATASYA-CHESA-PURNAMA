<?php
include("koneksi.php");?>

<?php
if (isset($_POST['submitkamar1'])) {
 $kodekamar = mysqli_real_escape_string($mysqli, $_POST['id_kamar']);
 $namakamar = mysqli_real_escape_string($mysqli, $_POST['nama_kamar']);
 $namagedung = mysqli_real_escape_string($mysqli, $_POST['namagedung']);
 $status = mysqli_real_escape_string($mysqli, $_POST['status']);
 $harga = mysqli_real_escape_string($mysqli, $_POST['harga']);

 $result = mysqli_query(
 $mysqli,
 "UPDATE tabel_kamar SET nama_kamar='$namakamar', namagedung='$namagedung', status='$status', harga='$harga' WHERE id_kamar='$kodekamar'");

 header("Location: Kamar.php");
 }

?>
