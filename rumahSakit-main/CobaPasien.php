<!DOCTYPE html>
<html>
<head>
    <title>Informasi Pasien</title>
</head>
<body>

<?php
include_once("koneksi.php");

function checkRawatInapStatus($idPasien) {
    $db_host = 'localhost';
    $db_name = 'rumah_sakit';
    $db_username = 'root';
    $db_password = '';

    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("CALL CheckRawatInapStatus(:idPasien)");
    $stmt->bindParam(':idPasien', $idPasien, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $conn = null;

    return $result['status_rawat'];
}

$idPasien = 4;
$statusRawat = checkRawatInapStatus($idPasien);
echo "Status Rawat: " . $statusRawat;
?>




</body>
</html>
