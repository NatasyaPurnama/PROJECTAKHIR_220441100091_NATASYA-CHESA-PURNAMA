<?php
include("koneksi.php");

if(isset($_POST['submitdokter'])) {
    $namadokter = mysqli_real_escape_string($mysqli, $_POST['namadokter']);
    $nohp = mysqli_real_escape_string($mysqli, $_POST['nohp']);
    $spesialis = mysqli_real_escape_string($mysqli, $_POST['spesialis']);
    $jadwal = mysqli_real_escape_string($mysqli, $_POST['jadwal']); 

    $query = "CALL tambah_dokter('$namadokter', '$nohp', '$spesialis', '$jadwal')";
    $result = mysqli_query($mysqli, $query);

    if($result) {
        echo "<script>alert('Data Dokter Berhasil Ditambahkan'); window.location='Dokter.php';</script>"; 
    } else {
        echo "<script>alert('Gagal menambahkan data dokter'); window.location='Dokter.php';</script>";
    }
}
?>
