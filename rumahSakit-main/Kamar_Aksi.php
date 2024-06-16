<?php
include("koneksi.php");?>

<?php
if(isset($_POST['submit'])) {
 $namakamar = mysqli_real_escape_string($mysqli, $_POST['nama_kamar']);
 $namagedung = mysqli_real_escape_string($mysqli, $_POST['namagedung']);
 $status = mysqli_real_escape_string($mysqli, $_POST['status']);
 $harga = mysqli_real_escape_string($mysqli, $_POST['harga']);

 $result = mysqli_query($mysqli, "INSERT INTO tabel_kamar(nama_kamar, namagedung, status, harga)
VALUES('$namakamar','$namagedung', '$status', '$harga')");

 echo "<script>alert('Data Kamar Berhasil Ditambahkan');window.location='Kamar.php'</script>"; 

}
 
?>