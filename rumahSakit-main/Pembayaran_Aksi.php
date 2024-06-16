<?php
include("koneksi.php");

if(isset($_POST['submit'])) {
    $id_pasien = mysqli_real_escape_string($mysqli, $_POST['id_pasien']);
    $lama_menginap = mysqli_real_escape_string($mysqli, $_POST['lama_menginap']);
    $harga = mysqli_real_escape_string($mysqli, $_POST['harga']);
    $nominal_pembayaran = mysqli_real_escape_string($mysqli, $_POST['nominal_pembayaran']);
    $kembalian = mysqli_real_escape_string($mysqli, $_POST['kembalian']);
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);

    $result = mysqli_query($mysqli, "INSERT INTO tb_pembayaran (id_pasien, lama_menginap, harga, nominal_pembayaran, kembalian, status)
    VALUES ('$id_pasien', '$lama_menginap', '$harga', '$nominal_pembayaran', '$kembalian', '$status')");

    echo "<script>alert('Data Pembayaran Berhasil Ditambahkan');window.location='Pembayaran.php'</script>";
}
?>
