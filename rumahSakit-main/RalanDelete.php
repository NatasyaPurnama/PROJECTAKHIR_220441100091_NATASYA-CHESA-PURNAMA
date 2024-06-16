<?php
include_once("koneksi.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM rawat_jalan WHERE id_jalan='$id'");
header("Location: rawatjalan.php");
exit();
?>
