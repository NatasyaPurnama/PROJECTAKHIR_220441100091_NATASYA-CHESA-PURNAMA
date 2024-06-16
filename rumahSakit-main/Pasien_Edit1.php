<?php
include("koneksi.php");

if (isset($_POST['submitpasien1'])) {
    $id_pasien = mysqli_real_escape_string($mysqli, $_POST['id_pasien']);
    $namapasien = mysqli_real_escape_string($mysqli, $_POST['namapasien']);
    $no_hp = mysqli_real_escape_string($mysqli, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
    $tgldaftar = mysqli_real_escape_string($mysqli, $_POST['tgldaftar']);

    $result = mysqli_query(
            $mysqli,
            "UPDATE tabel_pasien SET namapasien='$namapasien', tgldaftar='$tgldaftar',no_hp='$no_hp',alamat='$alamat' WHERE id_pasien='$id_pasien'"
        );

        header("Location: Pasien.php");
        exit();
    }
?>
