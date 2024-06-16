<?php
include("koneksi.php");
$kodekamar = $_GET['id_kamar'];
$result = mysqli_query($mysqli, "DELETE FROM tabel_kamar WHERE
id_kamar = $kodekamar");
header("Location:Kamar.php");
?>
