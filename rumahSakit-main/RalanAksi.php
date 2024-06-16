<?php
include("koneksi.php");

if(isset($_POST['submit'])) {
    $id_obat = mysqli_real_escape_string($mysqli, $_POST['id_obat']);
    $id_dokter = mysqli_real_escape_string($mysqli, $_POST['id_dokter']);
    $id_pasien = mysqli_real_escape_string($mysqli, $_POST['id_pasien']);
    $diagnosa = mysqli_real_escape_string($mysqli, $_POST['diagnosa']);

    $result = mysqli_query($mysqli, "INSERT INTO rawat_jalan (id_obat, id_dokter, id_pasien, diagnosa) 
    VALUES('$id_obat','$id_dokter','$id_pasien','$diagnosa')");

    if($result) {
        echo "<script>alert('Data Rawat Jalan Berhasil Ditambahkan'); window.location='RawatJalan.php';</script>";
    } else {
        echo "Error: " . $result . "<br>" . mysqli_error($mysqli);
    }
}
?>
