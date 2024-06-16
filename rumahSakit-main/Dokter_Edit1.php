<?php
include("koneksi.php");

if (isset($_POST['update1'])) {
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $namadokter = mysqli_real_escape_string($mysqli, $_POST['namadokter']);
    $nohp = mysqli_real_escape_string($mysqli, $_POST['nohp']);
    $spesialis = mysqli_real_escape_string($mysqli, $_POST['spesialis']);
    $jadwal = mysqli_real_escape_string($mysqli, $_POST['jadwal']);

    $result = mysqli_query(
        $mysqli,
        "UPDATE tabel_dokter SET namadokter='$namadokter', nohp='$nohp', spesialis='$spesialis', jadwal='$jadwal' WHERE id='$id'"
    );

    if ($result) {
        header("Location: Dokter.php");
        exit();
    } else {
        echo '<script>alert("Gagal memperbarui data dokter");</script>';
    }
}
?>
