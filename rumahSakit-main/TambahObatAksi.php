<?php
include("koneksi.php");

if(isset($_POST['submit'])) {
    $nama_obat = mysqli_real_escape_string($mysqli, $_POST['nama_obat']);
    $harga_obat = mysqli_real_escape_string($mysqli, $_POST['harga_obat']);
    $stok = mysqli_real_escape_string($mysqli, $_POST['stok']);

    $result = mysqli_query($mysqli, "INSERT INTO tabel_obat (nama_obat, harga_obat, stok) 
    VALUES('$nama_obat','$harga_obat','$stok')");

    if($result) {
        echo "<script>alert('Data Obat Berhasil Ditambahkan'); window.location='Obat.php';</script>";
    } else {
        echo "Error: " . $result . "<br>" . mysqli_error($mysqli);
    }
}
?>
