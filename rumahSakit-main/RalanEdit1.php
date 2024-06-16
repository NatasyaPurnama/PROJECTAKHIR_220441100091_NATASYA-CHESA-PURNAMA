<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    $id_jalan = mysqli_real_escape_string($mysqli, $_POST['id_jalan']);
    $id_pasien = mysqli_real_escape_string($mysqli, $_POST['id_pasien']);
    $id_dokter = mysqli_real_escape_string($mysqli, $_POST['id_dokter']);
    $id_obat = mysqli_real_escape_string($mysqli, $_POST['id_obat']);
    $diagnosa = mysqli_real_escape_string($mysqli, $_POST['diagnosa']);

    $result = mysqli_query(
        $mysqli,
        "UPDATE rawat_jalan SET 
        id_pasien='$id_pasien',
        id_dokter='$id_dokter',
        id_obat='$id_obat',
        diagnosa='$diagnosa'
        WHERE id_jalan='$id_jalan'"
    );

    if ($result) {
        echo "<script>alert('Data Rawat Jalan Berhasil Diupdate'); window.location='RawatJalan.php';</script>";
    } else {
        echo "Error: " . $result . "<br>" . mysqli_error($mysqli);
    }
}
?>
