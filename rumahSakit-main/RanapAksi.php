<?php
include("koneksi.php");

if(isset($_POST['submit'])) {
    $id_obat = mysqli_real_escape_string($mysqli, $_POST['id_obat']);
    $id_dokter = mysqli_real_escape_string($mysqli, $_POST['id_dokter']);
    $id_pasien = mysqli_real_escape_string($mysqli, $_POST['id_pasien']);
    $tgl_masuk = mysqli_real_escape_string($mysqli, $_POST['tgl_masuk']);
    $id_kamar = mysqli_real_escape_string($mysqli, $_POST['id_kamar']);
    $diagnosa = mysqli_real_escape_string($mysqli, $_POST['diagnosa']);
    
    if(empty($id_obat) || empty($id_dokter) || empty($id_pasien) || empty($tgl_masuk) || empty($id_kamar) || empty($diagnosa)) {
        echo "<script>alert('Semua kolom harus diisi.');window.history.back();</script>";
    } else {
        $result = mysqli_query($mysqli, "INSERT INTO rawat_inap (id_obat, id_dokter, id_pasien, tgl_keluar, tgl_masuk, id_kamar, diagnosa) 
        VALUES('$id_obat','$id_dokter','$id_pasien',NULL,'$tgl_masuk','$id_kamar','$diagnosa')");
    
        if($result) {
            echo "<script>alert('Data Rawat Inap Berhasil Ditambahkan'); window.location='RawatInap.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data rawat inap.');window.history.back();</script>";
        }
    }
}
?>
