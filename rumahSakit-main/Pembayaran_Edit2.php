<?php
include("koneksi.php");

if (isset($_POST['submitpembayaran'])) {
    $id_pasien = mysqli_real_escape_string($mysqli, $_POST['id_pasien']);
    $lama_menginap = mysqli_real_escape_string($mysqli, $_POST['lama_menginap']);
    $totalbayar = mysqli_real_escape_string($mysqli, $_POST['harga']);
    $nominal_pembayaran = mysqli_real_escape_string($mysqli, $_POST['nominal_pembayaran']);
    $kembalian = mysqli_real_escape_string($mysqli, $_POST['kembalian']);
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);

    $result = mysqli_query(
        $mysqli,
        "UPDATE tb_pembayaran SET id_pasien='$id_pasien', lama_menginap='$lama_menginap', harga='$totalbayar', nominal_pembayaran='$nominal_pembayaran', kembalian='$kembalian', status='$status' WHERE id_pasien='$id_pasien'"
    );

    header("Location: Pembayaran.php");
}
?>