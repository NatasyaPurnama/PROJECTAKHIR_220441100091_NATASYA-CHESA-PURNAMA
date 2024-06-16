<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    $id_obat = mysqli_real_escape_string($mysqli, $_POST['id_obat']);
    $nama_obat = mysqli_real_escape_string($mysqli, $_POST['nama_obat']);
    $harga_obat = mysqli_real_escape_string($mysqli, $_POST['harga_obat']);
    $stok = mysqli_real_escape_string($mysqli, $_POST['stok']);

    $query = "CALL update_obat('$id_obat', '$nama_obat', '$harga_obat', '$stok')";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header("Location: Obat.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>
