<?php
include("koneksi.php");?>

<?php
if(isset($_POST['submitpasien'])) {
 $namapasien = mysqli_real_escape_string($mysqli, $_POST['namapasien']);
 $no_hp = mysqli_real_escape_string($mysqli, $_POST['no_hp']);
 $alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
 $tgldaftar = mysqli_real_escape_string($mysqli, $_POST['tgldaftar']);

if(empty($namapasien) || empty($no_hp) || empty($alamat) || empty($tgldaftar)) {
        echo "<script>alert('Semua kolom harus diisi.');window.history.back();</script>";
    } else {
        $result = mysqli_query($mysqli, "INSERT INTO tabel_pasien (namapasien, no_hp, alamat, tgldaftar) VALUES('$namapasien','$no_hp', '$alamat', '$tgldaftar')"); 
        if ($result) {
            echo "<script>alert('Data Pasien Berhasil Ditambahkan');window.location='Pasien.php'</script>"; 
        } else {
            echo "<script>alert('Gagal menambahkan data pasien.');window.history.back();</script>";
        }
    }
}
?>