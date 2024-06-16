<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    $id_inap = mysqli_real_escape_string($mysqli, $_POST['id_inap']);
    $id_pasien = mysqli_real_escape_string($mysqli, $_POST['id_pasien']);
    $id_dokter = mysqli_real_escape_string($mysqli, $_POST['id_dokter']);
    $id_obat = mysqli_real_escape_string($mysqli, $_POST['id_obat']);
    $id_kamar = mysqli_real_escape_string($mysqli, $_POST['id_kamar']);
    $diagnosa = mysqli_real_escape_string($mysqli, $_POST['diagnosa']);
    $tgl_masuk = mysqli_real_escape_string($mysqli, $_POST['tgl_masuk']);
    $tgl_keluar = mysqli_real_escape_string($mysqli, $_POST['tgl_keluar']);

    $result = mysqli_query(
        $mysqli,
        "UPDATE rawat_inap SET 
        id_pasien='$id_pasien',
        id_dokter='$id_dokter',
        id_obat='$id_obat',
        id_kamar='$id_kamar',
        diagnosa='$diagnosa',
        tgl_masuk='$tgl_masuk',
        tgl_keluar='$tgl_keluar' 
        WHERE id_inap='$id_inap'"
    );

    header("Location: RawatInap.php");
    exit();
}
?>
