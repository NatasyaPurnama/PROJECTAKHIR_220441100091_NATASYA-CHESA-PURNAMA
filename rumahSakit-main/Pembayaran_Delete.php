<?php
include("koneksi.php");
$id = $_GET['id_pembayaran'];
$result = mysqli_query($mysqli, "DELETE FROM tb_pembayaran WHERE id_pembayaran = $id");
header("Location:Pembayaran.php");
?>
