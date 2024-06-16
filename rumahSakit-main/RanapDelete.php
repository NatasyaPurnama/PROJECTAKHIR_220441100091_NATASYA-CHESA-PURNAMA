<?php
include("koneksi.php");
$id_inap = $_GET['id_inap'];
$query = "CALL hapus_ranap($id_inap)";
$result = mysqli_query($mysqli, $query);
if ($result) {
    echo "Data rawat inap berhasil dihapus.";
} else {
    echo "Gagal menghapus data rawat inap.";
}
header("Location: RawatInap.php");
?>
